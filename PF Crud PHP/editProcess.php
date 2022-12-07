<?php
include "conn.php";

$sid = $_GET['sid'];
$name = $_POST["sname"];
$contact = $_POST["scontact"];
$cnic= $_POST["scnic"];
$course= $_POST["courses"];
$grades= $_POST["grades"];

$sql = "UPDATE students SET sname='$name', scontact ='$contact', scnic='$cnic',cid='$course', gid='$grades' WHERE sid=$sid";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
