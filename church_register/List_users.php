<?php
// Database connection
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

// Fetch members from the database
$sql = "SELECT id, name, phone_number, gender FROM congregants";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>Name</th><th>Phone Number</th><th>Gender</th><th>Actions</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"]. "</td>
                <td>" . $row["phone_number"]. "</td>
                <td>" . $row["gender"]. "</td>
                <td>
                    <a href='edit_user.php?id=" . $row["id"] . "'>Edit</a> | 
                    <a href='delete_user.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No users found.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Users</title>
</head>
<body>
    <p><a href="your_dashboard_page.php">Back to Dashboard</a></p>
</body>
</html>
