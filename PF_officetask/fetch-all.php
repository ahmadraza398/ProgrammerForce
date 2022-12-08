<?php
// ALL header file and methods
header('Content-Type: application/json'); //3 party  access this api 
header('Access-Control-Allow-Origin: *'); 
header('Access-Contro-Allow-Methods: GET'); // use api GET method

include "config.php";

$sql = "SELECT id ,name,email,password,age, gender, image FROM users";
$result = mysqli_query($conn, $sql) or die("Fetch All Query Failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); // Accociated array in json format
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No Record found', 'status' => 'false')); //  Accociated array for json format
}
