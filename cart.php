<!DOCTYPE html>
<html>
<head>
    
    <title>Petify : Shopping Cart</title>
    <?php include('inc\head.php'); ?>
    
	<style>
        /* Style for the cart table */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-table th,
        .cart-table td {
            padding: 10px;
            text-align: left;
        }

        .cart-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .cart-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }



        /* Style for buttons */
        .cart-buttons {
            margin-top: 20px;
        }

        .checkout-btn,
        .clear-cart-btn {
            padding: 10px 20px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .checkout-btn {
            width: 200px;
            margin-top: 30%;
            margin-left: 0%;
            margin-right: 0%;
            background-color: #4CAF50;
            color: white;
        }

        .checkout-btn:hover {
            background-color: #45a049;
        }

        .clear-cart-btn {

            background-color: black;
            width: 200px;
            margin-top: 30%;
            margin-left: 0%;
            margin-right: 0%;
            color: white;
        }

        .clear-cart-btn:hover {
            background-color: #da190b;
        }

        .remove{
            text-align: center;
            width: 150px;
            margin:2px auto auto auto;
            background-color: red;
            color: white;
        }
    
    </style>
</head>








<?php
include('inc\db.php');

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to login page
    header("Location: login.php");
    exit();
}





// Check if cart and invoices tables exist, if not create them
/*$create_cart_table_sql = "CREATE TABLE IF NOT EXISTS cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prod_id INT,
    quantity_ordered INT
)";
mysqli_query($conn, $create_cart_table_sql);

$create_invoices_table_sql = "CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    total_amount DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
mysqli_query($conn, $create_invoices_table_sql);*/

// Add 
if(isset($_POST['add_to_cart'])) {
    if($_POST['prod_id']==null){
        echo "Product Doesn't Exist";
    }else{
    $prod_id = $_POST['prod_id'];
    $user_id=$_SESSION['user_id'];
    $quantity_ordered = 1; // Default 1

    // if already exists in cart
    $check_product_sql = "SELECT * FROM cart WHERE prod_id=$prod_id and user_id=$user_id";
    $check_product_result = mysqli_query($conn, $check_product_sql);
    if(mysqli_num_rows($check_product_result) > 0) {
        // already exists... redirect to cart
        header("Location: cart.php");
        exit();
    } else {
        // Insert into cart
        $insert_cart_sql = "INSERT INTO cart (prod_id, quantity_ordered,user_id) VALUES ('$prod_id', '$quantity_ordered',{$_SESSION['user_id']})";
        mysqli_query($conn, $insert_cart_sql);
    }
}
}

// Remove 
if(isset($_GET['remove_from_cart'])) {
    $cart_id = $_GET['remove_from_cart'];
    $delete_cart_sql = "DELETE FROM cart WHERE id=$cart_id AND user_id={$_SESSION['user_id']}";
    mysqli_query($conn, $delete_cart_sql);
}

// Checkout - Remove prods
if(isset($_POST['checkout'])) {
    $clear_cart_sql = "DELETE * FROM CART WHERE user_id={$_SESSION['user_id']}";
    mysqli_query($conn, $clear_cart_sql);
}

if(isset($_POST['update_quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity_ordered = $_POST['quantity_ordered'];

    $update_cart_sql = "UPDATE cart SET quantity_ordered=$quantity_ordered WHERE id=$cart_id AND user_id={$_SESSION['user_id']}";
    mysqli_query($conn, $update_cart_sql);
}




// Display
$get_cart_items_sql = "SELECT c.id AS cart_id, p.name, p.price, c.quantity_ordered FROM cart c INNER JOIN products p ON c.prod_id = p.prod_id WHERE c.user_id={$_SESSION['user_id']}";
$cart_items_result = mysqli_query($conn, $get_cart_items_sql);
?>


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
    <div class="cart_ container">
    <h1>Shopping Cart</h1>
    <table  class= "cart-table">
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>act</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($cart_items_result)):  ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td>
                <form method="POST" action="">
                    <input type="hidden" name="cart_id" value="<?php echo $row['cart_id']; ?>">
                    <input type="number" name="quantity_ordered" value="<?php echo $row['quantity_ordered']; ?>" min="1" onchange="this.form.submit()">
                    <input type="hidden" name="update_quantity" value="1">
                </form>
            </td>
            <td><?php echo $row['price'] * $row['quantity_ordered']; ?></td>
            <td><a href="?remove_from_cart=<?php echo $row['cart_id']; ?>"><button class="remove" align="center"><b>Remove</b></button></a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    </div>
    <table allign="center"><tr><td>
       <a href="invoice.php"><button  class="checkout-btn"><b>Checkout</b></button></a></td>
      <td> <a href="products.php"><button class="clear-cart-btn"><b>Go to Shop</b></button></a></td></tr>
    </table>
</body>
</html>


