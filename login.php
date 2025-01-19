<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="nav/pets.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>User Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 10%;
            margin-left: 18%;
            width: 30%;
        }

        input[type="number"],
        input[type="password"],
        input[type="submit"] {
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

        .picture {
            width: 28%;
            box-shadow: 5px 10px #888888;
            margin-top: -29%;
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
        <h2>Login</h2>
        <form method="post" action="logging.php" id="login">

            <label for="number">Phone Number :</label>
            <input type="number" id="number" name="number" maxlength="10" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <input type="submit" value="Login">
        </form>
        <br>New User ? <br>

        <a href="register.php">Register Now</a><br>

        <a href="admin.php">Admin Login </a>
    </div>

    <script>
        document.getElementById("login").addEventListener("submit", function(event) {
            var phoneNumberInput = document.getElementById("number");
            var phoneNumber = phoneNumberInput.value;


            if (!/^[0-9]{10}$/.test(phoneNumber)) {
                alert("Please enter a 10-digit phone number without spaces or special characters.");
                event.preventDefault();
            }
            if (!/^[6-9][0-9]{9}$/.test(phoneNumber)) {
                alert("Phone numbers should start from 6, 7, 8, or 9 ");
                event.preventDefault();
            }
        });
    </script>

    <div class="picture">
        <img src="pic/login.jpg" height="100%" width="100%">
    </div>
</body>

</html>