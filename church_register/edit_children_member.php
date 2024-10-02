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

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM children_ministry_members WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $parent_phone_number = $_POST['parent_phone_number'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $sql = "UPDATE children_ministry_members SET name='$name', parent_phone_number='$parent_phone_number', age='$age', gender='$gender' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
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
    <title>Edit Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://penttvonline.com/wp-content/uploads/2022/06/Web-Size-15-2000x1125-1.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
        }
        .login-form {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-form label {
            display: block;
            margin-bottom: 10px;
        }
        .login-form input[type="text"] {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .login-form input[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .login-form input[type="submit"]:hover {
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
    <div class="login-form">
        <h2>Edit Member</h2>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Name:</label>
            <input type="text" name="name" value="<?php echo $row['name']; ?>">
            <label for="parent_phone_number">Parent's Phone Number:</label>
            <input type="text" name="parent_phone_number" value="<?php echo $row['parent_phone_number']; ?>">
            <label for="age">Age:</label>
            <input type="text" name="age" value="<?php echo $row['age']; ?>">
            <label for="gender">Gender:</label>
            <input type="text" name="gender" value="<?php echo $row['gender']; ?>">
            <input type="submit" name="update" value="Update">
        </form>
    </div>
    <a href="view_children_members.php" class="back_button">Go Back</a>
</body>
</html>