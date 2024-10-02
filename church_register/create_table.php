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

// SQL to create table
$sql = "CREATE TABLE announcements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    day VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    opening_prayer VARCHAR(255),
    worship VARCHAR(255),
    sermon VARCHAR(255),
    intensive_prayer VARCHAR(255),
    offertory_fundraising VARCHAR(255),
    conductor VARCHAR(255),
    remarks_ministry VARCHAR(255)
)";

if ($conn->query($sql) === TRUE) {
    echo "Table announcements created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
