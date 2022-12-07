<?php
include "conn.php";

$name = $_POST["sname"];
$contact = $_POST["scontact"];
$cnic= $_POST["scnic"];
$course= $_POST["course"];
$grades= $_POST["grades"];


$sql = "INSERT INTO students SET
        sname='$name', scontact ='$contact', scnic='$cnic',cid='$course', gid='$grades'";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
