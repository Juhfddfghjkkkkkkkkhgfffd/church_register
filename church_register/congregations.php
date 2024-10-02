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
$sql = "SELECT id, name, phone_number, date_registered FROM congregants WHERE name LIKE '%$search%'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://thecophq.org/wp-content/uploads/2023/03/331769588_605424008105373_761505066586426463_n-1024x1024.jpg');
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
        
        .table {
            width: 80%;
            margin: 40px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: rgba(255, 255, 255, 0.8);
        }
        
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        
        .table th {
            background-color: #f0f0f0;
        }
        
        .table tr:nth-child(even) {
            background-color: #fff;
        }
        
        .table tr:nth-child(odd) {
            background-color: #f9f9f9;
        }
        
        .edit-btn, .delete-btn {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        
        .edit-btn {
            background-color: #4CAF50;
            color: #fff;
        }
        
        .delete-btn {
            background-color: #e74c3c;
            color: #fff;
        }
        
        .back-btn {
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #4CAF50;
            color: #fff;
            margin: 20px auto;
            display: block;
            text-align: center;
            width: 150px;
        }
    </style>
</head>
<body>
<h2 style="color: white;">EBENEZER MOUNTAINS ASSEMBLY CONGREGATION REGISTER</h2>
    <div class="search-container">
        <form action="" method="GET">
            <input type="text" placeholder="Search by name.." name="search">
            <button type="submit">Search</button>
        </form>
    </div>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1' class='table'><tr><th>Name</th><th>Phone Number</th><th>Date Registered</th><th>Actions</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["name"]. "</td>
                    <td>" . $row["phone_number"]. "</td>
                    <td>" . $row["date_registered"]. "</td>
                    <td>
                        <a href='edit.php?id=" . $row["id"] . "' class='edit-btn'>Edit</a> | 
                        <a href='delete.php?id=" . $row["id"] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this member?\")'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No members found.";
    }

    $conn->close();
    ?>
    
    <p><a href="Admin page.php" class="back-btn">Back to Dashboard</a></p>
</body>
</html>
