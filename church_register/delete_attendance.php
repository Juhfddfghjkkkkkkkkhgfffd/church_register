<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "church_register"; // Using the same database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete attendance record
    $sql = "DELETE FROM Attendance WHERE AttendanceID = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Attendance record deleted successfully!";
    } else {
        echo "Error deleting attendance record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Attendance</title>
    <style>
        .back_button {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .back_button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <a href="view_attendance.php" class="back_button">Go Back</a>
</body>
</html>
