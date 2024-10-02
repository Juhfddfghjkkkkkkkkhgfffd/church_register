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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Delete the announcement
    $sql = "DELETE FROM other_announcements WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Announcement deleted successfully";
    } else {
        echo "Error deleting announcement: " . $conn->error;
    }

    $conn->close();
    header("Location: view_other_announcements.php");
    exit();
}
?>
