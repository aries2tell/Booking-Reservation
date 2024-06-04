<?php
// Include the database configuration file
require_once './database.php'; // If the file is in the same directory

// Function to get all bookings
function getAllBookings($conn) {
    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);
    $bookings = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookings[] = $row;
        }
    }
    return $bookings;
}

// Get all bookings
$bookings = getAllBookings($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - View Bookings</title>
   

    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }

        *{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
.banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(1.jpg);
    background-size: cover;
    background-position: center;
    
}

.navbar{
    width: 85%;
    margin: auto;
    padding: 35px 0;
    display: flex;
    justify-content:space-between ;
}

.logo{
    width: 120px;
    cursor: pointer;
}

.navbar ul li{
    list-style: none;
    display: inline-block;
    margin: 0 20px;
    position: relative; 
}

.navbar ul li a{
    text-decoration: none;
    color: #fff;
    text-transform: uppercase;
}

.navbar ul li::after{
    content: '';
    height: 3px;
    width: 0;
    background: #009688;
    position: absolute;
    left: 0;
    bottom: -10px;
    transition: 0.5s;
}

.navbar ul li:hover::after{
    width: 100%;
}


   
   </style>
</head>
<body>
<div class="banner">
        <div class="navbar">
            <img src="shit.jpg" class="logo">
            <ul>
                <li><a href="admin_study.php">Study Room History</a></li>
                <li><a href="admin.php">Collab Bookings</a></li>
                <li><a href="view_history_admin.php">view History</a></li>
                <li><a href="delete_booking.php">Delete Bookings</a></li>
                <li><a href="admin_users.php">Manage Accounts</a></li>
                <li><a href="login_form.php">Logout</a></li> <!-- Added logout link -->
            </ul>
        </div>

        <h1 style="color: white;">Collab Room Booking History</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Date</th>
            <th>Time Slot</th>
            <th>Reason</th>
            <th>Status</th>
        </tr>
        <?php foreach ($bookings as $booking) : ?>
            <tr data-id="<?= $booking['id'] ?>">
                <!-- Display booking details -->
                <td><?= $booking['id'] ?></td>
                <td><?= $booking['name'] ?></td>
                <td><?= date('Y-m-d', strtotime($booking['date'])) ?></td>
                <td><?= $booking['time_slot'] ?></td>
                <td><?= isset($booking['reason']) ? $booking['reason'] : "N/A" ?></td>
                <td>
                    <?php
                    // Display status
                    if (!isset($booking['status']) || empty($booking['status'])) {
                        echo "Pending"; // Display pending if status is not set or empty
                    } else {
                        echo $booking['status'];
                    }
                    ?>
                </td>
                <td class="action">
                    <!-- Add any action buttons if needed -->
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
