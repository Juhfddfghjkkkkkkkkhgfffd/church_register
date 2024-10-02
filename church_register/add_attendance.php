<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://mybrytfmonline.com/wp-content/uploads/2020/09/IMG-20200608-WA0036.jpg');
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
        <h2>EBENEZER MOUNTAINS ATTENDANCE RECORDS</h2>
        <form action="add_attendance.php" method="post">
            <label for="name">Name of Ministry:</label>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="number">Total Number of Attendance:</label>
            <input type="text" id="number" name="number" required><br><br>
            
            <label for="attendance_date">Date:</label>
            <input type="date" id="attendance_date" name="attendance_date" required><br><br>
            
            <input type="submit" name="submit" value="Record Attendance">
        </form>
        <a href="view_attendance.php" class="back_button">View Attendance Records</a>
        <a href="admin page.php" class="back_button">Go back</a>
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
            if (isset($_POST['name']) && isset($_POST['number']) && isset($_POST['attendance_date'])) {
                $name = $conn->real_escape_string($_POST['name']);
                $number = $conn->real_escape_string($_POST['number']);
                $attendance_date = $conn->real_escape_string($_POST['attendance_date']);

                $sql = "INSERT INTO Attendance (Name, Number, AttendanceDate) VALUES ('$name', '$number', '$attendance_date')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p style='color: green;'>Attendance recorded successfully</p>";
                } else {
                    echo "<p style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p style='color: red;'>All fields are required.</p>";
            }

            $conn->close();
        }
        ?>
    </div>
</body>
</html>
