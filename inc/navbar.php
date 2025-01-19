<html>
<head>
<?php include('inc\head.php'); ?>
    <style>
        /* Dropdown Button */
        .dropbtn {
            background-color: transparent;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            text-align: center;
            display: none;
            position: absolute;
            background-color: #CEFFD3;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {background-color: #f1f1f1;}

        /* Show the dropdown menu on hover */
        .show {display:block;}

    </style>    
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

// function errorHandleOnPage() {

// }



?>

<body>
<div class="navbar">
            
    <a href="petify.php" class="logo"><img src="nav/pets.png">Petify</a>
    <ul>
    <li><a href="petify.php"><img src="nav/home.png"  class="icon">Home</a></li>
    <li><a href="pets.php"><img src="nav/dog.png"  class="icon">Pets</a></li>
    <li><a href="products.php"><img src="nav/prod.png"  class="icon">Products</a></li>
    <li><a href="about.php"><img src="nav/about.png"  class="icon">About</a></li>
    <li><a href="petcare.php"><img src="nav/help.png"  class="icon">Pet Care</a></li>
        <?php
    if(isset($_SESSION['name'])){ ?>
        <li><a href="cart.php"><img src="nav/cart.png"  class="icon" width="30%">Cart</a></li>
        <li class="dropdown">
            <a href="#" class="dropbtn" onclick="toggleDropdown(event)"><img src="nav/person.png" class="icon"><?php echo $_SESSION['name']; ?></a>
                <div id="dropdownMenu" class="dropdown-content">
                    <a href="orders.php" ><img src="nav/orders.png" width="20%">Orders</a>
                    <a href="adoptions.php" ><img src="nav/adoptions.png" width="20%">Adoptions</a>
                    <a href="logout.php"><img src="nav/login.png">Logout</a>
                </div>
            </li>
    <?php } else { ?>
        <li><a href="login.php"><img src="nav/login.png"  class="icon">Login</a></li>
    <?php } ?>
    </ul>
</div>
</body>

<script>
    function toggleDropdown(event) {
        event.preventDefault();
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.classList.toggle("show");
    

        // Check if dropdown goes out of screen
    var rect = dropdownMenu.getBoundingClientRect();
    if (rect.right > window.innerWidth) {
        dropdownMenu.style.right = "0";
    }
    if (rect.left < 0) {
        dropdownMenu.style.left = "0";
    }
}

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                    openDropdown.style.left = null; // Reset left position
                    openDropdown.style.right = null;
                }
            }
        }
    }
</script>

</html>