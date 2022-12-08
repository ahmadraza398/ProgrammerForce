<?php
// ALL header file and methods
header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Contro-Allow-Methods: POST'); 


$formData = stripcslashes(file_get_contents("php://input")); 
$data = json_decode($formData, true);

include "config.php";

// LOGIN CREDENTIALS
$email = $data['email'];
$password = $data['password'];
$encyptedpassword = md5($password);

// FOR Token
$token = "token";
$bytes = random_bytes(20);
$tokenValue = bin2hex($bytes);
// FOR SQL

$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$encyptedpassword'";
$result = mysqli_query($conn, $sql) or die("Check Login Query Failed");

if (mysqli_num_rows($result) > 0) {
    echo json_encode(array('message' => 'User successful login', 'status' => 'true'));
    setcookie($token, $tokenValue, time() + 7200, "/");
    echo json_encode(array('token' => $token, 'tokenValue' => $tokenValue));
} else {
    echo json_encode(array('message' => 'login failed!!', 'status' => 'false')); 
}








