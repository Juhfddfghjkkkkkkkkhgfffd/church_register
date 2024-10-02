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

// Fetch members from the database
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT id, name, phone_number, role, gender, ministry_type FROM ministry_members WHERE name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-image: url('https://penttvonline.com/wp-content/uploads/2022/05/Untitled-2-2-1-2000x1125-1.jpg');
            background-size: cover;
            background-attachment: fixed;
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
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.8);
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
        
        .btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        
        .btn-edit {
            background-color: #007bff;
        }
        
        .btn-edit:hover {
            background-color: #0056b3;
        }
        
        .btn-delete {
            background-color: #dc3545;
        }
        
        .btn-delete:hover {
            background-color: #c82333;
        }
        
        .back-btn {
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            background-color: #4CAF50;
        }
        
        .back-btn:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
    <h2>MENS & WOMENS MINISTRIES</h2>
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
            <th>Role</th>
            <th>Gender</th>
            <th>Ministry Type</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["id"]. "</td>
                        <td>" . $row["name"]. "</td>
                        <td>" . $row["phone_number"]. "</td>
                        <td>" . $row["role"]. "</td>
                        <td>" . $row["gender"]. "</td>
                        <td>" . $row["ministry_type"]. "</td>
                        <td>
                            <a href='edit_user.php?id=" . $row["id"] . "' class='btn btn-edit'>Edit</a>
                            <a href='delete_user.php?id=" . $row["id"] . "' class='btn btn-delete' onclick='return confirm(\"Are you sure you want to delete this user?\")'>Delete</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No users found</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <p><a href="add_user.php" class="back-btn">Go back</a></p>
    <p><a href="Admin page.php" class="back-btn">back to Dashboard</a></p>
</body>
</html>
