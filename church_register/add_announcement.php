<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Announcement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://media.istockphoto.com/id/1339453124/photo/hands-raising-concert-hands-raising-for-religion-background.jpg?s=612x612&w=0&k=20&c=0dgMX2xb026UGe3F-AeITVJvfVZr7WjIJI4a4GJ3Q2Y=');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 120vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 800px;
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
        <h2>ADD NEW ANNOUNCEMENT</h2>
        <form action="" method="post">
            <label for="day">Day:</label>
            <input type="text" id="day" name="day" required><br><br>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>
            
            <label for="opening_prayer">Opening Prayer:</label>
            <input type="text" id="opening_prayer" name="opening_prayer"><br><br>
            
            <label for="worship">Worship:</label>
            <input type="text" id="worship" name="worship"><br><br>
            
            <label for="sermon">Sermon:</label>
            <input type="text" id="sermon" name="sermon"><br><br>
            
            <label for="intensive_prayer">Intensive Prayer:</label>
            <input type="text" id="intensive_prayer" name="intensive_prayer"><br><br>
            
            <label for="offertory_fundraising">Offertory/Fundraising:</label>
            <input type="text" id="offertory_fundraising" name="offertory_fundraising"><br><br>
            
            <label for="conductor">Conductor:</label>
            <input type="text" id="conductor" name="conductor"><br><br>
            
            <label for="remarks_ministry">Remarks Ministry:</label>
            <input type="text" id="remarks_ministry" name="remarks_ministry"><br><br>
            
            <input type="submit" name="submit" value="Add Announcement">
        </form>
        <a href="view_announcements.php" class="back_button">View</a>
    </div>

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

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO announcements (day, date, opening_prayer, worship, sermon, intensive_prayer, offertory_fundraising, conductor, remarks_ministry) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("sssssssss", $day, $date, $opening_prayer, $worship, $sermon, $intensive_prayer, $offertory_fundraising, $conductor, $remarks_ministry);

        // Set parameters and execute
        $day = $_POST['day'];
        $date = $_POST['date'];
        $opening_prayer = $_POST['opening_prayer'];
        $worship = $_POST['worship'];
        $sermon = $_POST['sermon'];
        $intensive_prayer = $_POST['intensive_prayer'];
        $offertory_fundraising = $_POST['offertory_fundraising'];
        $conductor = $_POST['conductor'];
        $remarks_ministry = $_POST['remarks_ministry'];

        if ($stmt->execute()) {
            echo "New announcement added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
