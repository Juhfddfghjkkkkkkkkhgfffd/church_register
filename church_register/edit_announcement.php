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
    $day = $_POST['day'];
    $date = $_POST['date'];
    $opening_prayer = $_POST['opening_prayer'];
    $worship = $_POST['worship'];
    $sermon = $_POST['sermon'];
    $intensive_prayer = $_POST['intensive_prayer'];
    $offertory_fundraising = $_POST['offertory_fundraising'];
    $conductor = $_POST['conductor'];
    $remarks_ministry = $_POST['remarks_ministry'];

    $sql = "UPDATE announcements SET day='$day', date='$date', opening_prayer='$opening_prayer', worship='$worship', sermon='$sermon', intensive_prayer='$intensive_prayer', offertory_fundraising='$offertory_fundraising', conductor='$conductor', remarks_ministry='$remarks_ministry' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
    header("Location: display_announcements.php");
    exit();
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM announcements WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://i.ytimg.com/vi/nMNt5WmH3DQ/maxresdefault.jpg');
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
            width: 600px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
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
            margin-top: 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        .back_button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Announcement</h2>
        <form action="edit_announcement.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            
            <label for="day">Day:</label>
            <input type="text" id="day" name="day" value="<?php echo $row['day']; ?>" required><br><br>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $row['date']; ?>" required><br><br>
            
            <label for="opening_prayer">Opening Prayer:</label>
            <input type="text" id="opening_prayer" name="opening_prayer" value="<?php echo $row['opening_prayer']; ?>"><br><br>
            
            <label for="worship">Worship:</label>
            <input type="text" id="worship" name="worship" value="<?php echo $row['worship']; ?>"><br><br>
            
            <label for="sermon">Sermon:</label>
            <input type="text" id="sermon" name="sermon" value="<?php echo $row['sermon']; ?>"><br><br>
            
            <label for="intensive_prayer">Intensive Prayer:</label>
            <input type="text" id="intensive_prayer" name="intensive_prayer" value="<?php echo $row['intensive_prayer']; ?>"><br><br>
            
            <label for="offertory_fundraising">Offertory/Fundraising:</label>
            <input type="text" id="offertory_fundraising" name="offertory_fundraising" value="<?php echo $row['offertory_fundraising']; ?>"><br><br>
            
            <label for="conductor">Conductor:</label>
            <input type="text" id="conductor" name="conductor" value="<?php echo $row['conductor']; ?>"><br><br>
            
            <label for="remarks_ministry">Remarks Ministry:</label>
            <input type="text" id="remarks_ministry" name="remarks_ministry" value="<?php echo $row['remarks_ministry']; ?>"><br><br>
            
            <input type="submit" name="submit" value="Update Announcement">
        </form>
        <a href="display_announcements.php" class="back_button">Go Back</a>
    </div>
</body>
</html>
