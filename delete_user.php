<?php
// Include the database configuration file
require_once 'database.php';

// Check if user ID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the user ID from the URL parameter
    $userId = $_GET['id'];

    // Prepare and execute the SQL query to delete the user with the specified ID
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // If deletion is successful, redirect back to admin.php
        header("Location: admin.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error deleting user: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // If user ID is not set or empty, redirect back to admin.php
    header("Location: admin.php");
    exit();
}

// Close the database connection
$conn->close();
?>
