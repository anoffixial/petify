<?php
include('inc\db.php'); 


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if(isset($_POST['addr'])){
    $addr=$_POST['addr'];
    $sql = "UPDATE users SET addr='$addr' WHERE user_id='{$_SESSION['user_id']}'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Address submitted successfully'); window.location.href = 'cart.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<html>
<head><title>Address Form</title>
<?php include('inc\head.php'); ?>

<style>
    .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .button {
            margin-top: 20px;
            margin-left: 67%;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
</style>

</head>

<body>
    <?php
        include('inc\navbar.php');
    ?>

<div class="container">
    <h2>Address</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="addr">Address:</label>         
        <input type="text" id="addr" name="addr" required>

        <label for="house">House Type:</label>
        <select id="house" name="house" required>
            <option value="">Select</option>
            <option value="Apartment">Apartment</option>
            <option value="House">House</option>
            <option value="Condo">Condo</option>
            <option value="Others">Others</option>
        </select>

        <label for="lives">Will you be adopting as a family or alone?</label>
        <select id="lives" name="lives" required>
            <option value="">Select</option>
            <option value="Family">Family</option>
            <option value="Alone">Alone</option>
            <option value="Others">Others</option>
        </select>

        <br>
        <button type="submit" class="button">Submit Address</button>
    </form>
</div>
</body>
<br><br>
<footer>
  <?php include('inc\footer.html'); ?>
</footer>
</html>