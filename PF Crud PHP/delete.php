<?php

include "conn.php";
$sid = $_GET['sid'];

$sql = "DELETE FROM students WHERE sid=$sid";

if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
