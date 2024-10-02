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

// Retrieve data from the other_announcements table
$sql = "SELECT id, announcement_text, created_at FROM other_announcements ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Other Announcements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://as1.ftcdn.net/v2/jpg/01/42/30/34/1000_F_142303441_Y5XAlJmhg2sLfTL2xNa7kySroGAzqczF.jpg');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1000px;
            overflow-y: auto;
            max-height: 90vh;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .announcement {
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }
        .announcement p {
            margin: 0;
            color: #555;
        }
        .announcement .date {
            font-size: 0.9em;
            color: #999;
            text-align: right;
        }
        .delete_button {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete_button:hover {
            background-color: #c82333;
        }
        .back_button {
            width: 100%;
            padding: 10px;
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
    <div class="container">
        <h2>Other Announcements</h2>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='announcement'>
                        <p>" . nl2br($row["announcement_text"]) . "</p>
                        <div class='date'>" . $row["created_at"] . "</div>
                        <form action='delete_other_announcement.php' method='post' style='display:inline;'>
                            <input type='hidden' name='id' value='" . $row["id"] . "'>
                            <input type='submit' value='Delete' class='delete_button' onclick='return confirm(\"Are you sure you want to delete this announcement?\");'>
                        </form>
                      </div>";
            }
        } else {
            echo "<p>No other announcements found.</p>";
        }
        $conn->close();
        ?>
        <a href="view_announcements.php" class="back_button">Go Back</a>
    </div>
</body>
</html>
