<?php

$itemName = $description = $price = $photo = "";
$itemNameErr =  $descriptionErr = $priceErr = $photoErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (empty($_POST["item-name"])) {
        $itemNameErr = "Item name is required";
    } else {
        $itemName = test_input($_POST["item-name"]);
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    } else {
        $description = test_input($_POST["description"]);
    }

    if (empty($_POST["price"])) {
        $priceErr = "Price is required";
    } else {
        $price = test_input($_POST["price"]);
    }

    if (empty($_FILES["photo"]["name"])) {
        $photoErr = "Photo is required";
    } else {
        
        $targetDir = "uploads/";
        
        $photoName = basename($_FILES["photo"]["name"]);
        
        $targetFilePath = $targetDir . $photoName;
        
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Photo uploaded successfully
            // You can store $targetFilePath in the database or perform further processing
        } else {
            $photoErr = "Error uploading photo";
        }
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include('inc\db.php');

// Insert form data into database table
if (!empty($itemName) && !empty($description) && !empty($price) && !empty($photoName)) {
    $sql = "INSERT INTO products (name,decs, price, image) VALUES ('$itemName','$description', '$price', '$photoName')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Pet Added Successfully')</script>";
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
    <title>Admin : Add Products</title>
    <link rel="stylesheet" href="style.css">
    <style>
       
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }


        /* Add Items Form Styles */
        .add-items {
            margin-top: 50px;
        }

        .add-items h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .add-items .form-group {
            margin-bottom: 20px;
        }

        .add-items label {
            font-weight: bold;
        }

        .add-items input[type="text"],
        .add-items input[type="number"],
        .add-items textarea,
        .add-items select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .add-items button {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .add-items button:hover {
            background-color: #555;
        }

        /* Footer Styles */
        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        .footer p {
            font-size: 14px;
        }
    </style>
</head>
<body>

<?php
    include('inc\adminnavbar.php');
?>
    

    <!-- Add Items Form -->
    <section class="add-items">
        <h1>Add Product</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Product Name : </label>
                <input type="text" id="item-name" name="item-name" value="<?php echo $itemName; ?>" required>
                <span class="error"><?php echo $itemNameErr; ?></span>
            </div>
            <div class="form-group">
                <label for="description">Description : </label>
                <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
                <span class="error"><?php echo $descriptionErr; ?></span>
            </div>
            <div class="form-group">
                <label for="price">Price : </label>
                <input type="number" id="price" name="price" value="<?php echo $price; ?>" required>
                <span class="error"><?php echo $priceErr; ?></span>
            </div>
            <!-- New photo upload field -->
            <div class="form-group">
                <label for="photo">Photo : </label>
                <input type="file" id="photo" name="photo" accept="image/*" required>
                <span class="error"><?php echo $photoErr; ?></span>
            </div>
            <button type="submit">Add Product</button>
        </form>
    </section>

   
</body>
</html>
