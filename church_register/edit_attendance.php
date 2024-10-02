<?php
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
    $sql = "SELECT * FROM Attendance WHERE AttendanceID=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found!";
        exit();
    }
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $date = $_POST['date'];

    $sql = "UPDATE Attendance SET Name='$name', Number='$number', AttendanceDate='$date' WHERE AttendanceID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href='edit_attendance.php?id=$id';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://churchsoftware.com.br/blog/wp-content/uploads/2017/02/maxresdefault-764x512.jpg');
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
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        form input {
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
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
    <div class="container">
        <h2>Edit Attendance Record</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo isset($row['AttendanceID']) ? $row['AttendanceID'] : ''; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo isset($row['Name']) ? $row['Name'] : ''; ?>"><br>
            <label for="number">Number:</label>
            <input type="text" name="number" value="<?php echo isset($row['Number']) ? $row['Number'] : ''; ?>"><br>
            <label for="date">Date:</label>
            <input type="date" name="date" value="<?php echo isset($row['AttendanceDate']) ? $row['AttendanceDate'] : ''; ?>"><br>
            <button type="submit" name="update">Update</button>
        </form>
        <a href="view_attendance.php" class="back_button">Go Back</a>
    </div>
</body>
</html>
