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
    $other_announcements = $_POST['other_announcements'];

    $sql = "INSERT INTO other_announcements (announcement_text) VALUES ('$other_announcements')";

    if ($conn->query($sql) === TRUE) {
        echo "Other announcements saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: view_other_announcements.php");
    exit();
}
?>
