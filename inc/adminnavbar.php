<html>
<head>
<?php include('inc\head.php'); ?>
</head>

<?php
$username = "root";
$password = "";
$database="petify";
$conn = mysqli_connect("localhost", $username, $password, $database);

mysqli_select_db($conn,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<body>
<div class="navbar">
            
    <a href="" class="logo"><img src="nav/pets.png">Petify</a>
    <ul>
    <li><a href="dashboard.php"><img src="nav/home.png"  class="icon">Dashboard</a></li>
    <li class="dropdown"><a href="pets.php"><img src="nav/dog.png"  class="icon">Pets</a></li>
        
    <li><a href="products.php"><img src="nav/prod.png"  class="icon">Products</a></li>
        <?php
    if(isset($_SESSION['name'])){ ?>
        <li><a href="dashboard.php"><img src="nav/person.png"  class="icon">Admin <?php echo $_SESSION['name']; ?> </a></li>
        <li><a href="logout.php"><img src="nav/login.png"  class="icon">Logout</a></li>
    <?php } else { ?>
        <li><a href="login.php"><img src="nav/login.png"  class="icon">Login</a></li>
    <?php } ?>
    </ul>
</div>
</body>
</html>