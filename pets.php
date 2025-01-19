<?php
include('inc\db.php'); 
$sql = "SELECT * FROM pets";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Petify : Browse Pets</title>
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

<?
    if(isset('button')){
        echo "pressed";
    }

?>
<main>
<table class="product-table">
<?php

 
 if ($result->num_rows > 0) {
            $count = 0;
            while ($row = $result->fetch_assoc()) {
                if ($count % 2== 0) {
                    echo "<tr>";
                }
                echo "<td>";  
                $pet_id=$row['pet_id'];
                include('inc\fetchimg.php');
                echo "<p>" . $row["pet_name"] . "</p>" . "";
                echo  $row["breed"] ;
                echo "<br>Rescued: " . $row["rescued"] ;
                echo "<br> Age - " . $row["age"] . " Years old </br>";
                echo "<form method='GET' action='pet.php'>";
                echo "<input type='hidden' id='pet_id' name='pet_id' value='" . $row["pet_id"] . "'>"; ?> <br> <?php
                if(isset($_SESSION['name'])){
                    if($_SESSION['name']=="1"){
                        echo "<input type='button' name='delete' value='Delete from Database'> <br>" ;
                    }
                }
                echo "<input type='submit' name='application' value='Know More'>" ;
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
		

        $conn->close();
        ?>
				  
			


</table>
	
</main>

</body>

<footer>
  <?php include('inc\footer.html'); ?>
</footer>
</html>

