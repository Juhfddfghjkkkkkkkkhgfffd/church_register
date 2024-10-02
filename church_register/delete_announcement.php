<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "church_register";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

// SQL to delete a record
$sql = "DELETE FROM announcements WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
header("Location: display_announcements.php");
exit();
?>
