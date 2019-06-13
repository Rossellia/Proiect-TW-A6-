<?php
require 'constants.php';

$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn->connect_error){
    die('Database error:' . $conn->connect_error);
}
$conn2 = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if($conn2->connect_error){
    die('Database error:' . $conn2->connect_error);
}

$conn->query("SET NAMES utf8");
$conn2->query("SET NAMES utf8");
?>