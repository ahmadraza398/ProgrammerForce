<?php
// ALL header file and methods
header('Content-Type: application/json'); //3 party  access api in json format
header('Access-Control-Allow-Origin: *'); 
header('Access-Contro-Allow-Methods: DELETE'); // use api DELETE method

$data = json_decode(file_get_contents("php://input"), true); // it return data in json format
// delete CREDENTIALS
$id = $data['id'];

include "config.php";

$sql = "DELETE FROM users  WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'users Record Deleted', 'status' => 'true')); // Accociated array in json format  
} else {
    echo json_encode(array('message' => ' users Record not Deleted', 'status' => 'false')); //  Accociated array in json format
}
