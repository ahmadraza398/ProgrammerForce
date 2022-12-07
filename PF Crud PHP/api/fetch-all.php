<?php
header('Content-Type: application/json'); //3 party  access this api 
header('Access-Control-Allow-Origin: *'); //*means all website access this api
header('Access-Contro-Allow-Methods: GET'); // use api POST method

include "config.php";

$sql = "SELECT sid ,sname, scontact, scnic, courses, grades FROM students
INNER JOIN Courses ON students.cid = courses.cid
INNER JOIN Grades ON students.gid = grades.gid;";
$result = mysqli_query($conn, $sql) or die("Fetch All Query Failed");

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); // to convert in accociated array for json format
    echo json_encode($output);
} else {
    echo json_encode(array('message' => 'No Record found', 'status' => 'false')); // to convert in accociated array for json format
}
