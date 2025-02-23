<?php
include '../includes/db.php';
session_start(); // Ensure the path is correct

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    var_dump($_POST);
    // Capture form inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $rating = isset($_POST['rating']);
    $comment = trim($_POST['comment']);

    // Ensure all fields are filled
    if (empty($name) || empty($email) || empty($rating) || empty($comment)) {
        echo "all fields are required";
    }
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, comment) VALUES (?, ?, ?, ?)");
        if (!$stmt === false) {
            die("Prepare failed: " . $conn->error); // Debugging
        }

        $stmt->bind_param("ssis", $name, $email, $rating, $comment);

        if ($stmt->execute()) {
            echo "<h3>Thank you for your feedback!</h3>";
         } else {
                echo "Error: " . $stmt->error;
                $_SESSION['user_id'] = $conn->insert_id;
            header("Location: index.php"); // Redirect to the homepage
            exit();
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
            background-color: #800020; /* Deep Burgundy */
            color: #FFD700; /* Gold */
            text-align: center;
            padding: 20px;
        }
        h1 {
            margin: 0;
        }
        nav {
            background-color: #556B2F; /* Warm Olive Green */
            overflow: hidden;
        }
        nav a {
            color: #FFFDD0; /* Cream */
            padding: 14px 20px;
            text-decoration: none;
            float: left;
            font-weight: bold;
        }
        nav a:hover {
            background-color: #F5DEB3; /* Light Gold */
            color: #800020; /* Burgundy */
        }
        .content {
            padding: 20px;
        }
        footer {
            background-color: #800020; /* Deep Burgundy */
            color: #FFD700; /* Gold */
            text-align: center;
            padding: 10px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        form {
            background-color: #FAEBD7; /* Soft Beige */
            padding: 20px;
            border-radius: 10px;
            width: 50%;
            margin: auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #008080; /* Deep Teal */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #006666;
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
        <form>
        <h1>Customer Feedback</h1>

        <form  action="feedback.php" method="POST" id="feedbackForm">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>

            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            <br><br>

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" required></textarea>
            <br><br>

            <button type="submit">Submit Feedback</button>
        
    </form>
        <h2>Recent Feedback</h2>
        <div id="feedbackList"></div>

        <script src="script.js"></script>

    </center>
</body>
</html>
