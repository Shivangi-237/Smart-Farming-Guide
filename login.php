<?php
//require 'db.php';
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
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT username, password FROM users WHERE username = '$username'");
    /*$stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);*/

    /*if ($username && password_verify($password, $username['password'])) {
        $_SESSION['user_id'] = $username['id'];
        $_SESSION['username'] = $username['username'];
        header("Location: ../dashboard.html");
    } else {
        echo "Invalid username or password!";
    }*/

    echo $username;
    echo $password;
if($result->num_rows>0){
      while($row=$result->fetch_assoc())
      {
        if($row['username']==$username && $row['password']==$password){
        echo 'You are a validated user';
        header("Location: http://localhost/smart-farming/dh.html");}
      else{
        echo 'Wrong password';
      }
}
}
else echo 'User does not exist';
}
?>