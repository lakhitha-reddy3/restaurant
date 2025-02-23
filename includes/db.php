<?php
$host = "localhost";  // Change if necessary
$user = "root";       // Change if necessary
$password = "";       // Change if necessary
$dbname = "restaurant";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
      "Database Connected Successfully!<br/>";
}
?>