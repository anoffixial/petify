<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include('inc\head.php');
    ?>
    <title>Admin Login</title>
  <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 10%;
            margin-left:18%;
            width: 30%;
        }
        input[type="tel"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid black;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .picture{
            width:28%;
            box-shadow: 5px 10px #888888;
            margin-top:-29%;
            margin-left: 60%;
        }
    </style>  
</head>
<body>
    <?php include('inc\navbar.php'); ?>

    <div class="container">
        <h2>Admin Login</h2>
        <form method="post" action="adminlogging.php">
            
            <label for="id">Admin id :</label>
            <input type="tel" name="adminid" required><br>

            <label for="password">Password:</label>
            <input type="password" name="adminpassword" required><br>

            <input type="submit" value="Login">
        </form>
        <br>Not an admin ? <br>
        
        <a href="login.php">Login Now</a><br>

    </div>

    <div class="picture">
        <img src="pic/login.jpg" height="100%" width="100%">
    </div>
</body>
</html>
