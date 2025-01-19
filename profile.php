<?php
include('inc\db.php');
?>

<html>
<?php include('inc\head.php'); ?>
<head>
<title>User Profile</title>
<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 20px;
        max-width: 1000px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }
</style>
</head>

<body>
    <?php include('inc\navbar.php'); ?>
    <h1>Welcome, <?php echo $_SESSION['name']; ?> </h1>

    <a href="orders.php"><button class="button"> Your Orders </button></a><br>
    <a href="adoptions.php"><button class="button"> Your Adoptions </button></a>


    
</body>





<!-- <?php include('inc\footer.html'); ?> -->
</html>