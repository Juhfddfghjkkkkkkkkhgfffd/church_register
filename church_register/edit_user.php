<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

// Check if id is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch member details
    $sql = "SELECT name, phone_number, role, gender, ministry_type FROM ministry_members WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $phone_number = $row['phone_number'];
        $role = $row['role'];
        $gender = $row['gender'];
        $ministry_type = $row['ministry_type'];
    } else {
        echo "No member found with this ID.";
        exit;
    }
} else {
    echo "No ID provided.";
    exit;
}

// Update member details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone_number = $_POST['phone_number'];
    $role = $_POST['role'];
    $gender = $_POST['gender'];
    $ministry_type = $_POST['ministry_type'];

    $sql = "UPDATE ministry_members SET name='$name', phone_number='$phone_number', role='$role', gender='$gender', ministry_type='$ministry_type' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: Mens&women.php"); // Redirect to your dashboard page after update
        exit;
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
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://thecophq.org/wp-content/uploads/2021/04/3K2A6462.jpg');
            background-size: cover;
            background-attachment: fixed;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #333;
        }
        input[type=text], select {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        input[type=submit]:hover {
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
        <h2>Edit User</h2>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>
            
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo $phone_number; ?>" required><br><br>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" value="<?php echo $role; ?>" required><br><br>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male" <?php if ($gender == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if ($gender == 'Female') echo 'selected'; ?>>Female</option>
            </select><br><br>
            
            <label for="ministry_type">Ministry Type:</label>
            <input type="text" id="ministry_type" name="ministry_type" value="<?php echo $ministry_type; ?>" required><br><br>
            
            <input type="submit" value="Update">
        </form>
        <a href="Mens&women.php" class="back_button">Back to MW</a>
    </div>
</body>
</html>
