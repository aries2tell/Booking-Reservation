<?php
// Establish a connection to your database
$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Query to select all distinct reasons from the bookings table
$query = "SELECT DISTINCT reason FROM bookings";

// Execute the query
$result = $mysqli->query($query);

// Check if the query was executed successfully
if (!$result) {
    die("Error: " . $mysqli->error);
}

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output the reasons
    echo "<h2>Reasons:</h2>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>" . $row['reason'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No reasons found.";
}

// Close the result set
$result->free();

// Close the database connection
$mysqli->close();
?>
