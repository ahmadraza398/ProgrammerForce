<?php
// ALL header file and methods
header('Content-Type: application/json'); 
header('Access-Control-Allow-Origin: *');
header('Access-Contro-Allow-Methods: PUT'); 
include "config.php";
$data = json_decode(file_get_contents("php://input"), true);
// UPDATE CREDENTIALS
$id = $data['id'];
$name = $data['name'];
$email = $data['email'];
$age = $data['age'];
$gender = $data['gender'];
$image = $data['image'];
$password = $data['password'];
$encyptedpassword = md5($password);

//FOR TOKEN
if (isset($_COOKIE['token'])) {
    $sql = "UPDATE users SET name='$name', email='$email', password='$encyptedpassword', age=$age, gender='$gender' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo json_encode(array('message' => 'User Profile Updated', 'status' => 'true')); //  accociated array in json format
    } else {
        echo json_encode(array('message' => ' Profile Updated Falied!!', 'status' => 'false')); // accociated array in json format
    }
} else {
    echo json_encode(array('message' => 'You Are Not Autheticated', 'status' => 'false'));
}

