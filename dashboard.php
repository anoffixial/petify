<?php
include('inc\db.php');
?>

<html>
    <head>
    <?php
        include('inc\head.php');
    ?>
    <title>Admin Dashboard</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background-color: #333;
        color: white;
        padding: 10px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    tr:hover {
        background-color: #ddd;
    }

    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 10px 20px;
        max-width: 1000px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
    }

    a{
        text-decoration: none;
        color: #ddd;
    }
    .invoice-table {
            width: 1320px;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
</style>

</head>


<body>
<?php
include('inc\adminnavbar.php');
?>

<h1> Welcome, Admin <?php echo $_SESSION['name']; ?> </h1>

<table>
  <tr>
    <th>Item</th>
    <th>Count</th>
  </tr>
  
  <tr>
    <td>No. of Users</td>
    <td><?php
            $sql="SELECT COUNT(*) AS name FROM users;";
            $result = mysqli_query($conn, $sql);

            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["name"];
                }
            } else {
                echo "0 results";
            }
    ?>
    </td> 
  </tr>
  <tr>
    <td>No. of Pets</td>
    <td><?php
            $sql="SELECT COUNT(*) AS pet_name FROM pets;";
            $result = mysqli_query($conn, $sql);

            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["pet_name"];
                }
            } else {
                echo "0 results";
            }
    ?>
    </td>  
  </tr>
  <tr>
    <td>No. of Products</td>
    <td><?php
    $sql="SELECT COUNT(*) AS name FROM products;";
            $result = mysqli_query($conn, $sql);

            if ($result && $result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo $row["name"];
                }
            } else {
                echo "0 results";
            } 
        ?>
    </td> 
  </tr>
</table>

<a href="add_item.php"><button class="button"> Add Product </button></a>
<a href="add_pets.php"><button class="button"> Add Pets </button></a>


<table class="invoice-table">
            <tr>
                <th>User Id</th>
                <th>User Name</th>
                <th>Phone No</th>
                <th>Address</th>
                <!--<th><b>AMOUNT</b></th>-->
             </tr>
             <br>
             <br>
             <?php
             
             $usql = "SELECT * FROM users";
             $uresult = $conn->query($usql);
               if ($uresult->num_rows > 0) {
                 while ($row = $uresult->fetch_assoc())  {
                    echo"<tr>";
                    echo "<td>";echo $row ['user_id']; echo"</td> ";
                    echo "<td>";echo $row ['name']; echo"</td> ";
                    echo "<td>";echo $row ['phone']; echo"</td> ";
                    echo "<td >";echo $row ['addr']; echo"</td> ";
                    echo"</tr>";
                }}
             ?>

    



</body>
</html>




