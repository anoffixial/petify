<?php

$username = "root";
$password = "";
$database="petify";
$conn = mysqli_connect("localhost", $username, $password, $database);

mysqli_select_db($conn,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$number = $_POST['number'];
$name = $_POST['name'];
$pass=$_POST['password'];
$password = password_hash($pass, PASSWORD_DEFAULT);

if (strlen($number) < 10 || strlen($number) > 10) {
    echo '<script>alert("Phone number must be exactly 10 digits long."); window.location.href = "register.php";</script>';
} else {
//$sql = "INSERT INTO admins (admin_id,admin_password) VALUES ('$name','$password')";

$checkph = "SELECT * FROM users WHERE phone = '$number'";
$checkph_result = mysqli_query($conn, $checkph);

if (mysqli_num_rows($checkph_result) > 0) {
    echo '<script>alert("Phone number already exists. Try a different number."); window.location.href = "register.php";</script>';
} else {
    $sql = "INSERT INTO users (password,phone,name) VALUES ('$password','$number','$name')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}
mysqli_close($conn);
?>
