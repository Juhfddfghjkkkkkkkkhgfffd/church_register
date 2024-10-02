<?php
session_start();
$admin_id = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST["admin_id"];
    $correct_admin_id = "admin123"; // For demonstration purposes

    if ($admin_id == $correct_admin_id) {
        $_SESSION['admin_id'] = $admin_id;
        header('Location: Admin page.php');
        exit();
    } else {
        $error_message = "Invalid admin ID. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Roboto;
            background-image: url('https://thecophq.org/wp-content/uploads/2022/11/2024-Theme-Banner-Blue-scaled.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }
        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 29vw;
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-sizing: border-box;
        }
        .center h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }
        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }
        .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }
        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }
        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #adadad;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
        }
        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0px;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }
        .txt_field input:focus ~ label,
        .txt_field input:valid ~ label {
            top: -5px;
            color: #2691d9;
        }
        .txt_field input:focus ~ span::before,
        .txt_field input:valid ~ span::before {
            width: 100%;
        }
        .pass {
            margin: -5px 0 20px 5px;
            color: #a6a6a6;
            cursor: pointer;
        }
        .pass:hover {
            text-decoration: underline;
        }
        input[type="Submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            border-radius: 25px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
        }
        input[type="Submit"]:hover {
            background: #2691d9;
            color: #e9f4fb;
            transition: .5s;
        }
        .signup_link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }
        .signup_link a {
            color: #2691d9;
            text-decoration: none;
        }
        .signup_link a:hover {
            text-decoration: underline;
        }
        .HomeAbout {
            width: 100vw;
            height: 25vh;
        }
    </style>
</head>
<body>
    <div class="center">
        <h1>Church Admin Login</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="txt_field">
                <input type="text" name="admin_id" required>
                <label for="admin_id">Admin ID:</label>
                <span></span>
            </div>
            <input name="submit" type="Submit" value="Login">
            <div class="signup_link">
                <a href="add_member.php">Church page</a>
            </div>
            <?php
            if (!empty($error_message)) {
                echo "<p style='color:red; text-align:center;'>$error_message</p>";
            }
            ?>
        </form>
    </div>
</body>
</html>
https://www.roadiemusic.com/blog/wp-content/uploads/2020/10/Webp.net-resizeimage-1-2.jpg