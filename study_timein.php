<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $date = $_POST['date'];
    $name = $_POST['name'];
    $time = $_POST['time'];
    $section = $_POST['section'];

    // Save booking information into the database
    $mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');
    $stmt = $mysqli->prepare("INSERT INTO studybook (name, date, time, section) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $name, $date, $time, $section);
    if ($stmt->execute()) {
        // Add booked date to session
        if (!isset($_SESSION['booked_dates'])) {
            $_SESSION['booked_dates'] = array();
        }
        $_SESSION['booked_dates'][] = $date;

        // Redirect to the calendar page
        header('Location: study_booking.php');
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Date</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Book a Date</h2>
        <?php if (isset($_GET['date'])): ?>
            <form action="study_timein.php" method="post">
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="text" id="date" name="date" class="form-control" value="<?php echo $_GET['date']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="section">Section:</label>
                    <input type="text" id="section" name="section" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Book</button>
            </form>
        <?php else: ?>
            <p>Error: No date provided.</p>
        <?php endif; ?>
    </div>
</body>
</html>
