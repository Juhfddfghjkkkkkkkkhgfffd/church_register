<?php
session_start();
$church_ids = array("Ebenezer@12", "67890", "34567", "45678", "78901"); // Add more church IDs to this array
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["church_id"])) {
        $church_id = $_POST["church_id"];

        if (in_array($church_id, $church_ids)) {
            $_SESSION['church_id'] = $church_id;
            header('Location: register.php');
            exit();
        } else {
            $error_message = "Invalid church ID. Please try again.";
        }
    } else {
        $error_message = "Church ID is required.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Church Member Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Roboto;
            background-image: url('https://thecophq.org/wp-content/uploads/2019/01/Morning-Session-21.jpg');
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
    <h1 style="<?php if (isset($_SESSION['church_id'])) { echo 'color:  BLUE;'; } ?>">WELCOME TO THE CHURCH OF PENTECOST (EBENEZER MOUNTAINS ASSEMBLY)CHURCH ID</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="church_id">Church ID:</label>
            <input type="text" name="church_id" required>
            <br><br>
            <input name="submit" type="Submit" value="Login">
            <br>
            <br>
            <a href="Admin.php">Admin</a>
            <?php if ($error_message): ?>
                <p style="color: red;"><?php echo $error_message; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>

