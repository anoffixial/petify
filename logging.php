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

$in_phone = $_POST['number'];
$in_pass = $_POST['password'];

if (strlen($in_phone) < 10 || strlen($in_phone) > 10) {
    echo '<script>alert("Phone number must be exactly 10 digits long."); window.location.href = "login.php";</script>';
} else {
$sql = "SELECT * FROM users WHERE phone='$in_phone'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($in_pass, $row['password'])) {
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['phone']=$row['phone'];
        
        $redirect_url = isset($_POST['redirect_url']) ? $_POST['redirect_url'] : 'petify.php';
        header("Location: $redirect_url");
        exit();
        // header("Location: petify.php"); 
        // exit();
    } else {
    echo '<script>alert("Invalid Password"); window.location.href = "login.php";</script>';
    exit();
    }
} else {
    echo '<script>alert("User not Found"); window.location.href = "login.php";</script>';
    exit();
}
}

mysqli_close($conn);
?>
