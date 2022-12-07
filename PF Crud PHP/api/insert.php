<?php

header('Content-Type: application/json'); //3 party who access this api to teel them that it return data in json format
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: POST'); // use api POST method


$formData = stripcslashes(file_get_contents("php://input")); //Clean retrieve data from db or html form //php:input use what we get data in any fromat it read that data
//echo $formData;
$data = json_decode($formData, true);
//print_r($data);

$name = $data['sname'];
$contact = $data['scontact'];
$cnic = $data['scnic'];
$course = $data['courses'];
$grades = $data['grades'];

include "config.php";

$sql = "INSERT INTO students (sname, scontact, scnic, cid, gid)
VALUES ('$name', '$contact', '$cnic', $course, '$grades')";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student Record inserted', 'status' => 'true')); // to convert in accociated array for json format
} else {
    echo json_encode(array('message' => 'Student Record not inserted', 'status' => 'false')); // to convert in accociated array for json format
}
