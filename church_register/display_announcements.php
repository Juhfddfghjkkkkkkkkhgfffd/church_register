<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Announcements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://as1.ftcdn.net/v2/jpg/01/42/30/34/1000_F_142303441_Y5XAlJmhg2sLfTL2xNa7kySroGAzqczF.jpg');
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
            overflow-y: auto;
            max-height: 90vh;
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
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .button {
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 5px;
        }
        .edit_button {
            background-color: #ffc107;
        }
        .delete_button {
            background-color: #dc3545;
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
        }
        .back_button:hover {
            background-color: #0056b3;
        }
        .actions {
            display: flex;
            gap: 10px;
        }
        .other_announcements {
            margin-top: 20px;
        }
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }
        .submit_button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        .submit_button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Church Announcements</h2>
        <table>
            <tr>
                <th>Day</th>
                <th>Date</th>
                <th>Opening Prayer</th>
                <th>Worship</th>
                <th>Sermon</th>
                <th>Intensive Prayer</th>
                <th>Offertory/Fundraising</th>
                <th>Conductor</th>
                <th>Remarks Ministry</th>
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

            // Retrieve data from the announcements table
            $sql = "SELECT id, day, date, opening_prayer, worship, sermon, intensive_prayer, offertory_fundraising, conductor, remarks_ministry FROM announcements";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["day"] . "</td>
                            <td>" . $row["date"] . "</td>
                            <td>" . $row["opening_prayer"] . "</td>
                            <td>" . $row["worship"] . "</td>
                            <td>" . $row["sermon"] . "</td>
                            <td>" . $row["intensive_prayer"] . "</td>
                            <td>" . $row["offertory_fundraising"] . "</td>
                            <td>" . $row["conductor"] . "</td>
                            <td>" . $row["remarks_ministry"] . "</td>
                            <td class='actions'>
                                <a href='edit_announcement.php?id=" . $row["id"] . "' class='button edit_button'>Edit</a>
                                <a href='delete_announcement.php?id=" . $row["id"] . "' class='button delete_button'>Delete</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No announcements found</td></tr>";
            }

            $conn->close();
            ?>
        </table>
        <div class="other_announcements">
            <h3>Other Announcements</h3>
            <form action="save_other_announcements.php" method="post">
                <textarea name="other_announcements" rows="5" placeholder="Type other announcements here..."></textarea>
                <input type="submit" value="Save Announcements" class="submit_button">
            </form>
        </div>
        <a href="view_other_announcements.php" class="back_button">view other announcements</a>
    </div>
</body>
</html>
