<?php
// Include the database configuration file
require_once 'database.php';

// Check if user ID is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the user ID from the URL parameter
    $userId = $_GET['id'];

    // Fetch user data based on the ID
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Display the user data in a form for editing
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit User</title>
            <style>
                form {
                    width: 50%;
                    margin: auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }
                label {
                    display: block;
                    margin-bottom: 10px;
                }
                input[type="text"],
                input[type="email"],
                input[type="password"] {
                    width: 100%;
                    padding: 8px;
                    margin-bottom: 20px;
                }
                button {
                    padding: 10px 20px;
                    background-color: #007bff;
                    color: #fff;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
            </style>
        </head>
        <body>
            <h2>Edit User</h2>
            <form action="update_user.php" method="post">
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <label for="username">New Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>">
                <label for="email">New Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
                <label for="password">New Password:</label>
                <input type="password" id="password" name="password">
                <button type="submit">Update</button>
            </form>
        </body>
        </html>

        <?php
    } else {
        // If the user does not exist, display an error message
        echo "User not found.";
    }

    // Close the statement
    $stmt->close();
} else {
    // If user ID is not set or empty, redirect back to admin.php or display an error message
    echo "User ID not provided.";
}

// Close the database connection
$conn->close();
?>
