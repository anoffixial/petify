
 <?php include('inc\head.php'); 
 include('inc\db.php');  


//if(isset($_POST['submit_application'])) {
  
   

    /*$user_id = $_SESSION['user_id']; 
    $pet_id = $_SESSION['pet_id'];
    $insert_invoice_sql = "INSERT INTO pet_invoice (pet_id, user_id,) VALUES ('$pet_id', '$user_id')";
    $presult = $conn->query($insert_invoice_sql);
    

    //mysqli_query($conn, $insert_invoice_sql);*/     
        

?>
<html>
<head>
    <title>Pet Adoption Invoice</title>
    <?php include('inc\head.php'); ?>
    <style>
        .invoice-container {
            align-self: center;
            /* max-width: 800px; */
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .invoice-total {
            font-weight: bold;
            text-align: right;
        }
        .clear-cart-btn {
            padding: 10px ;
            margin:auto auto auto auto;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            background-color: black;
            width: 200px;
            color: white;
        }

        .clear-cart-btn:hover {
         background-color: #da190b;
        }

    
    </style>
</head>
<body>
    <div class="invoice-container">
       

        <div class="invoice-header">
            <h2>Pet Adoption Invoice</h2>
            <h3 align='left'>User details</h3> 
        </div>
         <table class="invoice-table">
            <tr>
                <th>User Id</th>
                <th>User Name</th>
                <th>Phone No</th>
                <th>Address</th>
                <!--<th><b>AMOUNT</b></th>-->
             </tr>
             <?php
             $user_id = $_SESSION['user_id']; ; 
             $usql = "SELECT * FROM users where user_id='$user_id'";
             $uresult = $conn->query($usql);
               if ($uresult->num_rows > 0) {
                 while ($row = $uresult->fetch_assoc())  {
            
              
                echo"<tr>";
                echo "<td>";echo $row ['user_id']; echo"</td> ";
                echo "<td>";echo $row ['name']; echo"</td> ";
                echo "<td>";echo $row ['phone']; echo"</td> ";
                echo "<td rowspan='2'>";echo $row ['addr']; echo"</td> ";
                
            
             echo"</tr>";
             
             }}
             ?>
            
        </table>
   

        <table class="invoice-table">
        <h3 align='left'>Product details</h3> 
            <tr>
                <th>Pet Name</th>
                <th>Breed</th>
                <th>Age</th>
                <th>Rescued</th>
                <th>Category</th>
                <th>Amount</th>
             </tr>
             <?php
             $pet_id = $_SESSION['pet_id']; ; 
             $sql = "SELECT * FROM pets where pet_id='$pet_id'";
             $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc())  {
            
              
                echo"<tr>";
                echo "<td>";echo $row ['pet_name']; echo"</td> ";
                echo "<td>";echo $row ['breed']; echo"</td> ";
                echo "<td>";echo $row ['age']; echo"</td> ";
                echo "<td>";echo $row ['rescued']; echo"</td> ";
                echo "<td>";echo $row ['category']; echo"</td> ";
                echo "<td>";echo $row ['pet_price']; echo"</td> ";
                //pet price is already fetched here 
                 
                
                 
             echo"</tr>";
             
             }}
             ?>
            
        </table>
       <!-- <div class="invoice-total">
            <p><strong>Total Amount: ₹
        </div>-->
    </div>
    <br>
    <div>
    <a href="adoptions.php"><button class="clear-cart-btn">View all Adoptions</button></a>
    <a href="products.php"><button class="clear-cart-btn">Buy Pet Products</button></a>
    <a href="pets.php"><button class="clear-cart-btn">Return to Pets Page</button></a>
    <a href="petify.php"><button class="clear-cart-btn" style="background-color: green;">Return Homepage</button></a>
    </div>
</body>
</html>

<?php


if($result) {
    $psql =" SELECT * FROM pets where pet_id={$_SESSION['pet_id']}";
    $presult = mysqli_query($conn,$psql);
    mysqli_data_seek ($presult, 0);
        while ($row = mysqli_fetch_assoc($presult)){ 
                 $pet_price = $row ['pet_price'];
                 $pet_name =  $row ['pet_name'];
                 $gender =  $row ['gender'];
                 $age = $row ['age'];
                 $rescued = $row ['rescued'];
                 $category = $row ['category'];
        }
                // $breed = $row ['breed'];

    $insert_invoice_sql = "INSERT INTO pet_invoice (user_id,pet_id,pet_name,gender,age,rescued,category,pet_price) VALUES ('{$_SESSION['user_id']}','{$_SESSION['user_id']}','$pet_name','$gender','$age','$rescued','$category','$pet_price')";
    $presult = mysqli_query($conn,$insert_invoice_sql);
    

    $pet_id = $_SESSION['pet_id'];
    $delete_pet_img_sql = "DELETE FROM pet_images WHERE pet_id = $pet_id";
    mysqli_query($conn, $delete_pet_img_sql);
    $pet_id = $_SESSION['pet_id'];
    $delete_pet_sql = "DELETE FROM pets WHERE pet_id = $pet_id";
    mysqli_query($conn, $delete_pet_sql);
    }

?>