<?php
include('inc\db.php');


#check if cart is empty
$checkprod="SELECT * FROM cart WHERE user_id={$_SESSION['user_id']} ";
$checkprod_result = mysqli_query($conn, $checkprod);

if( mysqli_fetch_assoc($checkprod_result) == null ){
    echo "<script> alert('No items to generate invoice :( '); window.location.href = 'cart.php'; </script> ";
}else{


#check if address is empty
$checkaddr="SELECT addr FROM users where user_id={$_SESSION['user_id']} ";
$checkaddr_result = mysqli_query($conn, $checkaddr);
    
if( mysqli_fetch_column($checkaddr_result) == null ){
    echo "<script> alert('Please enter address before checkout'); window.location.href = 'address.php'; </script> ";
}else{



$get_cart_items_sql = "SELECT c.id AS cart_id, p.name, p.price, c.quantity_ordered FROM cart c INNER JOIN products p ON c.prod_id = p.prod_id WHERE c.user_id={$_SESSION['user_id']}";
$cart_items_result = mysqli_query($conn, $get_cart_items_sql);


$total_amount = 0;
while($row = mysqli_fetch_assoc($cart_items_result)) {
    $total_amount += $row['price'] * $row['quantity_ordered'];
}

$insert_invoice_sql = "INSERT INTO invoices (user_id, total_amount) VALUES ('{$_SESSION['user_id']}', '$total_amount')";
mysqli_query($conn, $insert_invoice_sql);


$timestamp = date('Y-m-d H:i:s');
mysqli_data_seek($cart_items_result, 0);
while($row = mysqli_fetch_assoc($cart_items_result)) {
    $product_name = mysqli_real_escape_string($conn, $row['name']);
    $product_price = $row['price'];
    $quantity_ordered = $row['quantity_ordered'];
    $insert_item_sql = "INSERT INTO items_bought (user_id, product_name, price, quantity_ordered, timestamp) VALUES ('{$_SESSION['user_id']}', '$product_name', '$product_price',  '$quantity_ordered', '$timestamp')";
    mysqli_query($conn, $insert_item_sql);
}

$clear_cart_sql = "TRUNCATE TABLE cart";
mysqli_query($conn, $clear_cart_sql);
?>

<html>
<head>
    <title>Product Invoice</title>
    <?php include('inc\head.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            /* max-width: 800px; */
            margin: 0 auto;
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

        .clear-cart-btn ,.print-button{
            padding: 10px ;
            margin:auto auto auto auto;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            background-color: green;
            width: 200px;
            color: white;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
    <h2 align="center">Product Invoice</h2>
    <h3 align="left">User details</h3> 
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

        <!-- <div class="invoice-header">
            <h2>Invoice</h2>
            <div class="user-info">
            <p align="left"><b>Customer Name: </b><?php echo $_SESSION['name']; ?></p>
            <p align="left"><b>Contact Number: </b><?php echo $_SESSION['phone']; ?></p>
            </div>
        </div> -->
        <table class="invoice-table">
        <h3 align="left">Product details</h3> 
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity Ordered</th>
                <th>Total</th>
            </tr>
            <?php
            mysqli_data_seek($cart_items_result, 0); 
            while($row = mysqli_fetch_assoc($cart_items_result)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity_ordered']; ?></td>
                <td>₹<?php echo $row['price'] * $row['quantity_ordered']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <div class="invoice-total">
            <p><strong>Total Amount: ₹<?php echo $total_amount; ?></strong></p>
        </div>
    </div>
    <button class="print-button" onclick="window.print()">Print Invoice</button>
    <a href="products.php"><button class="clear-cart-btn">Shop more</button></a>
    <a href="orders.php"><button class="clear-cart-btn">View Orders</button></a>
    <a href="petify.php"><button class="clear-cart-btn">Return to Homepage</button></a>

</body>
</html>

<?php 
}
}
?>