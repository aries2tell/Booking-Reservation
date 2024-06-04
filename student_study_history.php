<?php
// Connect to the database
$mysqli = new mysqli('localhost', 'root', '', 'bookingcalendar');

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Execute SQL query to select all rows and columns from the studybook table
$sql = "SELECT * FROM studybook";
$result = $mysqli->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;

        }
        
        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table th, .table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
        }
        .banner{
    width: 100%;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url(aries.jpg);
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
    </style>
</head>
<body>
<div class="banner">
        <div class="navbar">
            <ul>
                <li><a href="study_booking.php">Back</a></li>
                <li><a href="student_study_history.php">VIEW HISTORY</a></li>
            </ul>
        </div>
        <?php
// Check if there are rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table class='table'>";
    echo "<thead><tr><th>ID</th><th>Name</th><th>Time In</th><th>Section</th></tr></thead>";
    echo "<tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["name"]."</td>";
        echo "<td>".$row["time"]."</td>";
        echo "<td>".$row["section"]."</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "0 results";
}

// Check if the "Clear History" button was clicked
if (isset($_POST['clear_history'])) {
    // Execute SQL query to delete all records from the studybook table
    $clear_sql = "DELETE FROM studybook";
    if ($mysqli->query($clear_sql) === TRUE) {
        echo "All history cleared successfully";
    } else {
        echo "Error clearing history: " . $mysqli->error;
    }
}

// Close the database connection
$mysqli->close();
?>
      
        <!-- Clear History Button -->
        <form method="post">
            <button type="submit" name="clear_history" class="btn btn-danger">Clear History</button>
        </form>
    </div>

</body>
</html>
