<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Ministry Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://piwckasoa.org/wp-content/uploads/2023/07/youth-week.jpg');
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
        input[type="text"], select {
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
        <h2>ADD NEW YOUTH MEMBER</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required><br><br>
            
            <label for="group">Group:</label>
            <input type="text" id="group" name="group" required><br><br>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>
            
            <input type="submit" name="submit" value="Register">
        </form>
        <a href="view_youth_members.php" class="back_button">View youth members</a>
        <a href="Admin page.php" class="back_button">Back to Dashboard</a>
        <?php
        // Enable error reporting
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            // Check if form fields are set
            if (isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['group']) && isset($_POST['gender'])) {
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO youth_ministry_members (name, phone_number, `group`, gender) VALUES (?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt->bind_param("ssss", $name, $phone_number, $group, $gender);

                // Set parameters and execute
                $name = $_POST['name'];
                $phone_number = $_POST['phone_number'];
                $group = $_POST['group'];
                $gender = $_POST['gender'];
                if ($stmt->execute()) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
                $conn->close();
            } else {
                echo "All fields are required.";
            }
        }
        ?>
    </div>
</body>
</html>
