<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://thecophq.org/wp-content/uploads/2020/07/Ameny3_3D-8-1-768x768.jpg');
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
        <h2>ADD NEW USER (Ministry Type)</h2>
        <form action="add_user.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" required><br><br>
            
            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required><br><br>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br><br>
            
            <label for="ministry_type">Ministry Type:</label>
            <input type="text" id="ministry_type" name="ministry_type" required><br><br>
            
            <input type="submit" name="submit" value="Register">
        </form>
        <a href="Mens&women.php" class="back_button">View Ministry Type</a>
        <a href="Admin page.php" class="back_button">Go back</a>
        <?php
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
            if (isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['role']) && isset($_POST['gender']) && isset($_POST['ministry_type'])) {
                // Prepare and bind
                $stmt = $conn->prepare("INSERT INTO ministry_members (name, phone_number, role, gender, ministry_type) VALUES (?, ?, ?, ?, ?)");
                if ($stmt === false) {
                    die("Prepare failed: " . $conn->error);
                }
                $stmt->bind_param("sssss", $name, $phone_number, $role, $gender, $ministry_type);

                // Set parameters and execute
                $name = $_POST['name'];
                $phone_number = $_POST['phone_number'];
                $role = $_POST['role'];
                $gender = $_POST['gender'];
                $ministry_type = $_POST['ministry_type'];

                if ($stmt->execute()) {
                    echo "New user registered successfully!";
                } else {
                    echo "Error: " . $stmt->error;
                }

                $stmt->close();
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
