<?php
// ALL header file and methods
header('Content-Type: application/json'); //access api 
header('Access-Control-Allow-Origin: *'); 
header('Access-Contro-Allow-Methods: POST'); 


$formData = stripcslashes(file_get_contents("php://input")); 
$data = json_decode($formData, true);

include "config.php";

// FORGET PASSWORD CREDENTIALS
$email = $data['email'];
$password = $data['password'];
$encyptedpassword = md5($password);
// FOR SQL
$getEmail = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $getEmail) or die("Get Email Query Failed");

if (mysqli_num_rows($result) > 0) {
    $sql = "UPDATE users SET  password='$encyptedpassword' WHERE email='$email'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('message' => 'New Password Set Successfully for email ' . $email, 'status' => 'true')); //  Accociated array in json format
    } else {
        echo json_encode(array('message' => 'New Password Set Successfully', 'status' => 'false')); // Accociated array in json format
    }
} else {
    echo json_encode(array('message' => 'User Not found', 'status' => 'false')); //  Accociated array in json format
}