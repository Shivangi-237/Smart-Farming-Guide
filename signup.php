<?php
/*require 'db.php';*/
$host = 'localhost'; // Default MySQL host
$dbname = 'smart-farming'; // Ensure this matches the database name
$username = 'root'; // Default XAMPP MySQL username
$password = ''; // Default XAMPP MySQL password (empty)

$conn=new mysqli($host, $username, $password, $dbname);
if($conn->connect_error)
{
    die("Database connection failed: " . $conn->connect_error);
}
echo "connected successfully";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')");
    /*$stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);*/

    if ($stmt) {
        echo "Registration successful! <a href='../index.html'>Login here</a>";
    } else {
        echo "Registration failed!";
    }
}
?>