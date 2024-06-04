<?php
session_start();

// Default date set to today
$date = date('Y-m-d');

// Check if a date is passed through GET request
if(isset($_GET['date'])){
    $date = $_GET['date'];
}

$msg = ''; // Initialize an empty message variable

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    // Check if 'timeSlot' is set and not empty before accessing it
    if(isset($_POST['timeSlot']) && !empty($_POST['timeSlot'])) {
        $timeSlot = $_POST['timeSlot']; 
    } else {
        // If no time slot is selected, display an error message
        $msg = "<div class='alert alert-danger'>Please select a time slot</div>";
    }

    // Capture the selected reason from the form
    if(isset($_POST['reason'])) {
        $reason = $_POST['reason'];
        // If "Other" is selected, use the value from the "Other Reason" input field
        if($reason === "Other" && isset($_POST['other_reason'])) {
            $reason = $_POST['other_reason'];
        }
    } else {
        $reason = ""; // Set a default value if no reason is selected
    }

    if(!empty($timeSlot)) {
        $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');

        // Check for connection errors
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $stmt = $mysqli->prepare("INSERT INTO bookings (name, email, date, time_slot, reason) VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $name, $email, $date, $timeSlot, $reason);
        $stmt->execute();

        // Check if the query was executed successfully
        if ($stmt->error) {
            $msg = "<div class='alert alert-danger'>Error: " . $stmt->error . "</div>";
        } else {
            $msg = "<div class='alert alert-success'>Booking Successful</div>";
        }

        $stmt->close();
        $mysqli->close();
    }
    
    // Store booked dates in session data
    $_SESSION['booked_dates'][] = $date;
    
    // Redirect back to calendar page
    header("Location: calendar.php");
    exit();
}

// Function to generate time slots
function generateTimeSlots($start, $end, $interval) {
    $start = strtotime($start);
    $end = strtotime($end);
    $interval = strtotime('+' . $interval . ' minutes', 0);

    $slots = array();

    for ($i = $start; $i <= $end; $i += $interval) {
        $slots[] = date('h:i A', $i);
    }

    return $slots;
}

// Define start time, end time, and interval for time slots
$start = "08:00 AM";
$end = "05:00 PM";
$interval = 30;

// Generate time slots
$timeSlots = generateTimeSlots($start, $end, $interval);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Calendar</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('bg.png');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
        }
        .form-container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        .form-container h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-back {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-back:hover {
            background-color: #5a6268;
            border-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 form-container">
                <h1>Book for Date: <?php echo date('m/d/Y', strtotime($date)); ?></h1>
                <?php echo $msg; ?>
                <form action="book.php?date=<?php echo $date; ?>" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="name">Name & Section</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="reason">Reason</label>
                                    <select class="form-control" name="reason" id="reason" onchange="checkReason(this.value)">
                                        <option value="" disabled selected>Select a Reason</option>
                                        <option value="Meeting">Meeting</option>
                                        <option value="Appointment">Appointment</option>
                                        <option value="Event">Event</option>
                                        <!-- Add more options as needed -->
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" class="form-control" name="other_reason" id="other_reason" placeholder="Enter Other Reason" style="display: none;">
                                </div>
                            </div>
                        </div>
                    </div>

                                    <script>
                                        function checkReason(value) {
                                            if (value === "Other") {
                                                document.getElementById("other_reason").style.display = "block";
                                                document.getElementById("other_reason").setAttribute("required", "required");
                                            } else {
                                                document.getElementById("other_reason").style.display = "none";
                                                document.getElementById("other_reason").removeAttribute("required");
                                            }
                                        }
                                    </script>

                    <input type="hidden" name="date" value="<?php echo $date; ?>">
                    <div class="form-group">
                        <label for="timeSlot">Select Time Slot</label>
                        <select class="form-control" name="timeSlot" id="timeSlot" required>
                            <option value="" disabled selected>Select Time Slot</option>
                            <?php foreach ($timeSlots as $slot) : ?>
                                <option value="<?php echo $slot; ?>"><?php echo $slot; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary btn-block" type="submit" name="submit">Submit</button>

                </form>
                <br>

            </div>
        </div>
    </div>
</body>
</html>
