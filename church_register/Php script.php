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

// SQL to add missing columns
$sql = "ALTER TABLE announcements 
        ADD COLUMN IF NOT EXISTS opening_prayer VARCHAR(255),
        ADD COLUMN IF NOT EXISTS worship VARCHAR(255),
        ADD COLUMN IF NOT EXISTS sermon VARCHAR(255),
        ADD COLUMN IF NOT EXISTS intensive_prayer VARCHAR(255),
        ADD COLUMN IF NOT EXISTS offertory_fundraising VARCHAR(255),
        ADD COLUMN IF NOT EXISTS conductor VARCHAR(255),
        ADD COLUMN IF NOT EXISTS remarks_ministry VARCHAR(255)";

if ($conn->query($sql) === TRUE) {
    echo "Columns added successfully";
} else {
    echo "Error adding columns: " . $conn->error;
}

$conn->close();
?>
