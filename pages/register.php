<?php
include '../includes/db.php'; // Ensure this file has a valid database connection
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields exist in $_POST before accessing the
    var_dump($_POST);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    // Ensure this key matches the input field name

    if(empty($name) || empty($email) || empty($phone) || empty($password)) {
        echo "all fields are required";
    }

    // Validate password length (must be exactly 8 characters)
    if (strlen($password) !== 8) {
        die("Error: Password must be exactly 8 characters long.");
    }
    if($password !== $confirmpassword) {
        die("error: password does not match");
    }
    if (!preg_match('/^[0-9]{10}$/',$phone)) {
        die("error: please enter a valid  10-digit phone number");
    }

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO users (name, email, phone,  password) VALUES (?, ?, ?, ?)");
    
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone,  $hashed_password);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
        
        $_SESSION['user_id'] = $conn->insert_id;
        header("Location: login.php"); // Redirect to the homepage
        exit();
    }
   
    // Close statement
    $stmt->close();
}
// Close database connection
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
            background-color: #800020;
            color: #FFD700;
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #556B2F;
            overflow: hidden;
        }
        nav a {
            color: #FFFDD0;
            padding: 14px 20px;
            text-decoration: none;
            float: left;
        }
        nav a:hover {
            background-color: #F5DEB3;
            color: #800020;
        }
        .content {
            padding: 20px;
        }
        .registration-container {
            background-color: #FAEBD7;
            padding: 20px;
            width: 350px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            margin-top: 50px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #008080;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #005F5F;
        }
        footer {
            background-color: #800020;
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
  
    
    <center>
        <div class="registration-container">
            <h2>Register</h2>
            <form action="register.php" method="POST" id="registrationForm">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter a password">
                </div>
                <div class="form-group">
                    <label for="confirmpassword">Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" required placeholder="Confirm your password">
                </div>
                <button type="submit">Register</button>
            </form>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </center>
</body>
</html>
