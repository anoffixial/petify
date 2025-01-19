<?php
session_start();
$username = "root";
$password = "";
$database="petify";
$conn = mysqli_connect("localhost", $username, $password, $database);

mysqli_select_db($conn,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>