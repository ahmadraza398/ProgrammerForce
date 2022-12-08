<?php
// ALL header file and methods
header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *'); 
header('Access-Contro-Allow-Methods: PUT'); 

$data = json_decode(file_get_contents("php://input"), true);

include "config.php";

// REST PASSWORD CREDENTIALS
$email = $data['email'];
$oldPassword = $data['password'];
$newPassword = $data['password'];
$encyptedpassword = md5($newPassword);
// FOR SQL
$checkUser =  "SELECT email, password FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $checkUser) or die("Check User For Reset Password  Query Failed");
$result2= mysqli_fetch_assoc($result);

if ($email=$result2['email'])
 {
    $sql = "UPDATE users SET password='$encyptedpassword' WHERE email = '$email' ";
    if (mysqli_query($conn, $sql))
     {
        echo json_encode(array('message' => 'Password Reset Successfully on email : ' . $email, 'status' => 'true')); //  accociated array in json format
    } 
    else {
    echo json_encode(array('message' => 'User Not found on email : ' . $email, 'status' => 'false')); //  accociated array in json format
}

}


