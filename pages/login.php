<?php
session_start();
include('../includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
var_dump($_POST);
  $username = $_POST['username'];
  $password = $_POST['password'];

  $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
$sql_check = "SELECT 1 FROM users LIMIT 1";
if ($conn->query($sql_check) === FALSE) {
    die("Error: Table 'fix1' does not exist in the database.");
}

// Debugging: Check SQL errors
$stmt = $conn->prepare("SELECT password FROM users WHERE name = ?");
if ($stmt === false) {
    die("SQL Prepare failed: " . $conn->error); // Debugging output
}
  $stmt->bind_param("s", $username);
  $stmt->execute();
  $stmt->store_result();

    "SQL Query Executed Successfully!<br>";

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();
         echo "User Found!<br>";

        // Verify password
        if (password_verify($password, $hashed_password)) {
           echo "Login successfull";
        } else {
            echo "Invalid password!";
            $_SESSION['user_id'] = $id;
            header("Location: index.php");
              exit();
        }
    }
 
    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRAL TRATTORIA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('http://localhost/restaurant/images/restaurantbackground.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #800000;
            color: #FFD700;
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #006400;
            overflow: hidden;
        }
        nav a {
            color: #FFCC00;
            padding: 14px 20px;
            text-decoration: none;
            float: left;
        }
        nav a:hover {
            background-color: #F5F5DC;
            color: #800000;
        }
        .content {
            padding: 20px;
        }
        .login-container {
            background-color: #FFF5E1;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        .btn {
            background-color: #003366;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #001F4D;
        }
        footer {
            background-color: #800000;
            color: #FFD700;
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <img align="left" src="http://localhost/restaurant/images/logo.webp" class="left-align" width="100">
        <h1>𝑷𝑹𝑨𝑳 𝑻𝑹𝑨𝑻𝑻𝑶𝑹𝑰𝑨</h1>
    </header>
    <nav>
        <a href="index.php">HOME</a>
        <a href="login.php">LOGIN</a>
        <a href="menu.php">MENU</a>
        <a href="mycart.php">MY CART</a>
        <a href="feedback.php">FEEDBACK</a>
    </nav>
    <br>
    <br>
    <br>
    <br><br>
    <br>
    <center>
        <div class="login-container">
            <h2>LOGIN</h2>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter your username" required><br/><br/>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password" required><br/><br/>
                </div>
                <button type="submit" class="btn">Login</button>
                <p>Don't have an account? <a href="register.php">Register here</a></p>
            </form>
        </div>
    </center>
</body>
</html>
