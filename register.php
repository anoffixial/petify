<!DOCTYPE html>
<html lang="en">
<head>
<?php include('inc\head.php'); ?>
    <title>Register User</title>

  <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 10%;
            margin-left:18%;
            width: 30%;
        }
        input[type="text"],input[type="number"], input[type="password"], input[type="submit"] {
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
            box-shadow: 5px 5px #888888;
            margin-top:-34%;
            margin-left: 60%;
        }
    </style>  
</head>
<body>
<?php
include('inc\db.php'); 
  include('inc\navbar.php'); 
?>

    <div class="container">
        
    <h2>Register</h2>
          <form action="registering.php" method="POST" id="register">
          
            <label for="username">Name :</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="number">Phone Number :</label>
            <input type="number" id="number" name="number" maxlength="10" pattern="[6-9][0-9]{9}" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Register">
          </form>
          <br>Exsisting User ? <br>
        <a href="login.php">Login Now</a>
      </div>

    <script>
        document.getElementById("register").addEventListener("submit", function(event) {
        var phoneNumberInput = document.getElementById("number");
        var phoneNumber = phoneNumberInput.value;
  
        // Check if the phone number contains any special characters
        if (!/^[0-9]{10}$/.test(phoneNumber)) {
            alert("Please enter a 10-digit phone number without spaces or special characters.");
            event.preventDefault(); // Prevent form submission
        }
        if (!/^[6-9][0-9]{9}$/.test(phoneNumber)) {
        alert("Phone numbers should start from 6, 7, 8, or 9 without spaces or special characters.");
        event.preventDefault(); // Prevent form submission
        }
        });
    </script>

    <div class="picture">
        <img src="pic\cat1.jpg" height="80%" width="100%">
    </div>
</body>
</html>
