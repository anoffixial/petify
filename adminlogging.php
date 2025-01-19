<?php

$username = "root";
$password = "";
$database="petify";
$conn = mysqli_connect("localhost", $username, $password, $database);

mysqli_select_db($conn,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

$in_id = $_POST['adminid'];
$in_pass = $_POST['adminpassword'];


$sql = "SELECT * FROM admins WHERE admin_id='$in_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($in_pass, $row['admin_password'])) {
        $_SESSION['name'] = $row['admin_id'];
        header("Location: dashboard.php"); 
        exit();
    } else {
    ?>
    <script>
    alert ('Invalid Password')
    </script>
    <?php
    exit();
    }
} else {
    ?>
    <script>
    alert ('User not Found')
    </script>
    <?php
    exit();
}

mysqli_close($conn);
?>
