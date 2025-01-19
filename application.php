
<?php
include('inc\db.php'); 


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


$addr = $house_type = $pet_info = $exper = $lives = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $addr = isset($_POST['addr']) ? $_POST['addr'] : '';
    $house_type  = isset($_POST['house']) ? $_POST['house'] : '';
    $pet_info =  isset($_POST['pet_info']) ? $_POST['pet_info'] : '';
    $exper =  isset($_POST['experience']) ? $_POST['experience'] : '';
    $lives = isset($_POST['lives']) ? $_POST['lives'] : '';
}

if(!empty($addr) && !empty($house_type) && !empty($exper) && !empty($lives))   {
    $sql = "INSERT INTO requests (pet_id, user_id, addr, house, pet_info, experience, lives) 
    VALUES ('{$_SESSION['pet_id']}', '{$_SESSION['user_id']}', '$addr', '$house_type', '$pet_info', '$exper', '$lives')";

    $checkaddr="SELECT addr FROM users where user_id={$_SESSION['user_id']} ";
    $checkaddr_result = mysqli_query($conn, $checkaddr);

    if( mysqli_fetch_column($checkaddr_result) == null ){
        $sql2 = "UPDATE users SET addr='$addr' WHERE user_id='{$_SESSION['user_id']}'";
        mysqli_query($conn, $sql2);
    }

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Application submitted successfully'); window.location.href = 'pet_invoice.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Application</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
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
        button {
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
    if(isset($_SESSION['name'])){
            if($_SESSION['name']=="1"){
                include('inc\adminnavbar.php');
            }else{
                include('inc\navbar.php');
            } 
        }else{
            include('inc\navbar.php');
        }
?>

<div class="container">
    <h2>Adoption Application</h2>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      
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
        
        <label for="pet_info">Information of Current Pet (if any):</label>
        <textarea id="pet_info" name="pet_info"></textarea>
        
        <label for="experience">Petting Experience:</label>
        <select id="experience" name="experience" required>
            <option value="">Select</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
            
        </select>
        
    

        
        <label for="lives">Will you be adopting as a family or alone?</label>
        <select id="lives" name="lives" required>
            <option value="">Select</option>
            <option value="Family">Family</option>
            <option value="Alone">Alone</option>
            <option value="Others">Others</option>
        </select>
        
        

        <button type="submit">Submit Application</button>
    </form>
</div>

</body>
<br><br>
<footer>
  <?php include('inc\footer.html'); ?>
</footer>
</html>
