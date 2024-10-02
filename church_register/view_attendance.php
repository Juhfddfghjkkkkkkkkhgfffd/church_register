<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance Records</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://c4.wallpaperflare.com/wallpaper/497/749/252/animation-cartoon-family-spongebob-wallpaper-preview.jpg');
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
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            padding: 5px 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .delete_button {
            background-color: #dc3545;
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
            margin-top: 10px;
        }
        .back_button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>EBENEZER MOUNTAINS ASSEMBLY ATTENDANCE RECORDS</h2>
        <table>
            <tr>
                <th>Attendance ID</th>
                <th>Name of Ministry</th>
                <th>Number of Attendance for today</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
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

            // Fetch attendance records
            $sql = "SELECT AttendanceID, Name, Number, AttendanceDate FROM Attendance";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["AttendanceID"] . "</td>
                            <td>" . $row["Name"] . "</td>
                            <td>" . $row["Number"] . "</td>
                            <td>" . $row["AttendanceDate"] . "</td>
                            <td>
                                <a href='edit_attendance.php?id=" . $row["AttendanceID"] . "' class='button'>Edit</a>
                                <a href='delete_attendance.php?id=" . $row["AttendanceID"] . "' class='button delete_button'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="add_attendance.php" class="back_button">Add Attendance</a>
        <a href="add_attendance.php" class="back_button">Go back</a>
    </div>
</body>
</html>
