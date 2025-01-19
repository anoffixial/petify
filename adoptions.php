<?php 

include('inc\db.php');

$get_pet_sql=" SELECT * FROM pet_invoice WHERE user_id={$_SESSION['user_id']} ";
$items_result = mysqli_query($conn, $get_pet_sql);

if (mysqli_num_rows($items_result) == 0) {
  echo '<script>alert("No Adoptions Processed Yet."); window.location.href = "pets.php";</script>';
}else{

?>
<html>
<head>
    <?php include('inc\head.php'); ?>
    <title>Your Adoptions</title>
  
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
            <h2>Pets Adopted</h2>
        </div>
      
        <table class="invoice-table">
            <tr>
                <th>Pet Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Rescued</th>
                <th>Catogery</th>
                <th colspan='2'>Date and Time </th>
                <th colspan='2'>Total</th>
            </tr>
            <?php
            mysqli_data_seek($items_result, 0); 
            while($row = mysqli_fetch_assoc($items_result)): ?>
            <tr>
                <td><?php echo $row['pet_name']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td><?php echo $row['age']; ?></td>
                <td><?php echo $row['rescued']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td colspan='2'><?php echo $row['timestamp']; ?></td>
                <td colspan='2'>₹<?php echo $row['pet_price'] ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
  </div>
</div>



</body>

<footer>
    <br><br><br><BR><br><BR><br><BR>
  <?php include('inc\footer.html'); ?>
</footer>
</html>

<?php

}

?>