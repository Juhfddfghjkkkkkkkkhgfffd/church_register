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

// Fetch youth members
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT id, name, phone_number, `group`, gender FROM youth_ministry_members WHERE name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youth Ministry Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://www.penteagle.org/wp-content/uploads/2022/06/thecopym_ministry-to-teens-relaunch_84-scaled.jpg');
            background-size: cover;
            background-attachment: fixed;
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
        
        .search-container {
            float: right;
            margin-bottom: 20px;
        }
        
        .search-container input[type=text] {
            padding: 6px;
            font-size: 17px;
            border: none;
        }
        
        .search-container button {
            padding: 6px 10px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }
        
        .search-container button:hover {
            background: #ccc;
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
            text-decoration: none;
            cursor: pointer;
        }
        
        .button:hover {
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
        <h2>Ebenezer Mountains Assembly Youth Ministry Members</h2>
        <div class="search-container">
            <form action="" method="GET">
                <input type="text" placeholder="Search by name.." name="search">
                <button type="submit">Search</button>
            </form>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Group</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["name"] . "</td>
                            <td>" . $row["phone_number"] . "</td>
                            <td>" . $row["group"] . "</td>
                            <td>" . $row["gender"] . "</td>
                            <td>
                                <a href='edit_youth_member.php?id=" . $row["id"] . "' class='button'>Edit</a>
                                <a href='delete_youth_member.php?id=" . $row["id"] . "' class='button'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No members found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <a href="add_youth_member.php" class="back_button">Back to Youth ministry</a>
        <a href="Admin page.php" class="back_button">Back to Dashboard</a>
    </div>
</body>
</html>
