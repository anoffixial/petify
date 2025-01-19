<?php 

include('inc\db.php');

$get_cart_items_sql=" SELECT * FROM items_bought WHERE user_id={$_SESSION['user_id']} ";
$cart_items_result = mysqli_query($conn, $get_cart_items_sql);

if (mysqli_num_rows($cart_items_result) == 0) {
    echo '<script>alert("No Orders Placed Yet."); window.location.href = "products.php";</script>';
  }else{


$total_amount = 0;
while($row = mysqli_fetch_assoc($cart_items_result)) {
    $total_amount += $row['price'] * $row['quantity_ordered'];
}
?>


<head>
    <?php include('inc\head.php'); ?>
    <title>Your Orders</title>
    <style>
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
    </style>
</head>
<body>
    <?php include('inc\navbar.php'); ?>
<div class="invoice-container">
        <div class="invoice-header"> 
            <h2>Your Orders</h2>
        </div>
        <table class="invoice-table">
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity Ordered</th>
                <th colspan='2'>Date and Time </th>
                <th colspan='2'>Total</th>
            </tr>
            <?php
            mysqli_data_seek($cart_items_result, 0); 
            while($row = mysqli_fetch_assoc($cart_items_result)): ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td><?php echo $row['quantity_ordered']; ?></td>
                <td colspan='2'><?php echo $row['timestamp']; ?></td>
                <td colspan='2'>₹<?php echo $row['price'] * $row['quantity_ordered']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <div class="invoice-total">
            <p><strong>Total Amount: ₹<?php echo $total_amount; ?></strong></p>
        </div>
    </div>
</body>

<footer>
    <br><BR><br><BR><br><BR>
  <?php include('inc\footer.html'); ?>
</footer>

<?php

            }

?>