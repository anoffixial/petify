<?php
include('inc\db.php'); 

// Retrieve products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Check if form is submitted for adding to cart
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        // Process adding to cart here
      $product_id = $_POST['product_id'];
        echo '<script>alert("Product added to cart!");</script>';
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Petify : Browse Products</title>
    <?php include('inc\head.php'); ?>
	<style>
        
        .product {
            border: 0px  #ccc;
            padding: 10px;
            margin-bottom: 20px;
        }
        .product img {
            width: 100px;
            height: 100px;
        }
        .product-table input[type="submit"]{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            background-color: green;
        }
        p{
            font-size:x-large;
            text-align: center;
            font-family:Geneva, Single Day;
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


<main>
<table class="product-table">
<?php

 
 if ($result->num_rows > 0) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                // Start a new row after every 3rd record
                if ($count % 2== 0) {
                    echo "<tr>";
                }
                echo "<td>";  
                  echo "<img src='pic/" . $row["image"] . "' alt='" . $row["name"] . "' height='50%' width='50%' >";
                  echo "<p>" . $row["name"] . "</p>" . "";
                  echo "<br>Price: ₹ " . $row["price"] . "</br>";
                  echo "<br>" . $row["decs"] . "</br>";
                  echo "<form method='post' action='cart.php'>";
                  echo "<input type='hidden' name='prod_id' value='" . $row["prod_id"] . "'>"; ?> <br> <?php
                  echo "<input type='hidden' name='quantity' value='" . $row["quantity"] . "'>";
                  echo "<input type='submit' name='add_to_cart' value='Add to Cart'>";
                  echo "</form>";
			      echo"</td>";
                if ($count % 2 == 1) {
                    echo "</tr>";
                }
                $count++;
            }
            // If there are remaining records, close the row
            if ($count % 3 != 0) {
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No records found</td></tr>";
        }
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add_to_cart'])) {
        // Process adding to cart here
        $product_id = $_POST['product_id'];
        echo '<script>alert("Product added to cart!");</script>';
    }
}
        $conn->close();
        ?>
				  
			


</table>
	
</main>

</body>
<footer>
  <?php include('inc\footer.html'); ?>
</footer>
</html>

