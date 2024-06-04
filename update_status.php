<?php
// Include the database configuration file
require_once './database.php';

// Function to update user account
function updateUser($conn, $userId, $newUsername, $newEmail, $newPassword) {
    // Update the user account in the database
    $sql = "UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $newUsername, $newEmail, $newPassword, $userId);
    $stmt->execute();
    $stmt->close();

    // Update the view history account (assuming you have a separate table for this)
    $sql = "INSERT INTO view_history (user_id, action) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $action = "User account with ID $userId was updated.";
    $stmt->bind_param("is", $userId, $action);
    $stmt->execute();
    $stmt->close();
}

// Check if status and bookingId are set in the POST request
if (isset($_POST['status']) && isset($_POST['bookingId'])) {
    // Retrieve status and bookingId from POST data
    $status = $_POST['status'];
    $bookingId = $_POST['bookingId'];

    // Update status in the database based on the bookingId
    // Perform SQL update query here

    // Sample update query (replace with your actual update query)
    $sql = "UPDATE bookings SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $bookingId);
    $stmt->execute();
    $stmt->close();

    // Check if user account update is also requested
    if (isset($_POST['id'], $_POST['username'], $_POST['email'], $_POST['password'])) {
        // Get user account data from POST data
        $userId = $_POST['id'];
        $newUsername = $_POST['username'];
        $newEmail = $_POST['email'];
        $newPassword = $_POST['password'];

        // Call updateUser function to update user account
        updateUser($conn, $userId, $newUsername, $newEmail, $newPassword);
    }

    // Redirect or perform other actions after updating status and/or user account
}
?>
