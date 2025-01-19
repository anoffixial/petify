<?php
include('inc\db.php');

$itemName = $gender = $category = $description = $price = $rescued =  $photo = $age = $vaccine = $shelter = $breed= "";
$itemNameErr =$genderErr = $categoryErr = $descriptionErr = $priceErr = $rescuedErr = $photoErr = $ageErr = $vaccineErr = $shelterErr = 
$breedErr = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["item-name"])) {
        $itemNameErr = "Pet name is required";
    } else {
        $itemName = test_input($_POST["item-name"]);
    }

    if (empty($_POST["category"])) {
        $categoryErr = "Category is required";
    } else {
        $category = test_input($_POST["category"]);
    }
    
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
    }

    if (empty($_POST["rescued"])) {
        $rescuedErr = "Rescued is required";
    } else {
        $rescued = test_input($_POST["rescued"]);
    }

    if (empty($_POST["shelter"])) {
        $shelterErr = "Shelter is required";
    } else {
        $shelter = test_input($_POST["shelter"]);
    }

    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    } else {
        $description = test_input($_POST["description"]);
    }

    if (empty($_POST["breed"])) {
        $breedErr = "Breed is required";
    } else {
        $breed = test_input($_POST["breed"]);
    }

    if (empty($_POST["price"])) {
        $price="Resued Pets have no fee";
    } else {
        $price = test_input($_POST["price"]);
    }

    if (empty($_POST["age"])) {
        $ageErr = "Age is required";
    } else {
        $age = test_input($_POST["age"]);
    }

    if (empty($_POST["vaccine"])) {
        $vaccineErr = "Vaccine is required";
    } else {
        $vaccine = test_input($_POST["vaccine"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


if (!empty($itemName) && !empty($category) && !empty($description) && !empty($age) && !empty($vaccine)) {
    $sql = "INSERT INTO pets (pet_name, gender,rescued,pet_price,category,breed,age,vaccine,decs,shelter_id) 
        VALUES ('$itemName', '$gender', '$rescued', '$price', '$category' , '$breed' , '$age', '$vaccine' , '$description' , '$shelter' )";

    if ($conn->query($sql) === TRUE) {
        $petid= $conn->insert_id;
        echo "<script>alert('Pet Added Successfully')</script>";
        if (empty($_FILES["photo"]["name"])) {
            $photoErr = "Photo is required";
            } else {
            foreach ($_FILES['photo']['tmp_name'] as $key => $tmp_name) {
                $image_data = addslashes(file_get_contents($_FILES['photo']['tmp_name'][$key]));
                $sql = "INSERT INTO pet_images (pet_id, image_data) VALUES ($petid, '$image_data')";
                if ($conn->query($sql) !== TRUE) {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        
    } else {
        echo "Error in inserting id " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('inc\head.php'); ?>
    <title>Admin : Add Pets</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

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
        

        .footer p {
            font-size: 14px;
        }
    </style>
</head>
<body>
<?php
  include('inc\adminnavbar.php'); 
?>
    
    <section class="add-items">
        <h1>Add Pets</h1>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="item-name">Pet Name:</label>
                <input type="text" id="item-name" name="item-name" value="<?php echo $itemName; ?>" required>
                <span class="error"><?php echo $itemNameErr; ?></span>
            </div>
                
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="" <?php if(empty($gender)) echo 'selected'; ?>>Select Gender</option>
                    <option value="Male" <?php if($gender == 'Male') echo 'selected'; ?>>Male</option>
                    <option value="Female" <?php if($gender == 'Female') echo 'selected'; ?>>Female</option>
                </select>
                <span class="error"><?php echo $genderErr; ?></span>
            </div>

            <div class="form-group">
                <label for="rescued">Rescued :</label>
                <select id="rescued" name="rescued" onchange="togglePriceInput()" required>
                    <option value="" <?php if(empty($category)) echo 'selected'; ?>>Select Rescued</option>
                    <option value="Yes" <?php if($rescued == 'Yes') echo 'selected'; ?>>Yes</option>
                    <option value="No" <?php if($rescued == 'Female') echo 'selected'; ?>>No</option>
                </select>
                <span class="error"><?php echo $rescuedErr; ?></span>
            </div>

            <div class="form-group">
                <label for="price" id="pricename">Pet Price:</label>
                <input type="number" id="price" name="price" value="<?php echo $price; ?>" >
                <span class="error"><?php echo $priceErr; ?></span>
            </div>

            <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="" <?php if(empty($category)) echo 'selected'; ?>>Select category</option>
                    <option value="Dog" <?php if($category == 'Dog') echo 'selected'; ?>>Dog</option>
                    <option value="Cat" <?php if($category == 'Cat') echo 'selected'; ?>>Cat</option>
                    <option value="Bird" <?php if($category == 'Bird') echo 'selected'; ?>>Bird</option>
                    <option value="Fish" <?php if($category == 'Fish') echo 'selected'; ?>>Fish</option>
                    <option value="Rabbit" <?php if($category == 'Rabbit') echo 'selected'; ?>>Rabbit</option>
                </select>
                <span class="error"><?php echo $categoryErr; ?></span>
            </div>

            <div class="form-group">
                <label for="breed" id="breed">Pet Breed:</label>
                <input type="text" id="breed" name="breed" value="<?php echo $breed; ?>" >
                <span class="error"><?php echo $breedErr; ?></span>
            </div>

            <div class="form-group">
                <label for="age" id="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo $age; ?>" required>
                <span class="error"><?php echo $ageErr; ?></span>
            </div>

            <div class="form-group">
                <label for="vaccine">Vaccine:</label>
                <textarea id="vaccine" name="vaccine" rows="3" required><?php echo $vaccine; ?></textarea>
                <span class="error"><?php echo $vaccineErr; ?></span>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>
                <span class="error"><?php echo $descriptionErr; ?></span>
            </div>
            
            <div class="form-group">
                <label for="shelter">Shelter  :</label>
                <select id="shelter" name="shelter" required>
                    <option value="" <?php if(empty($shelter)) echo 'selected'; ?>>Select Shelter</option>
                    <option value="1" <?php if($shelter == "1") echo 'selected'; ?>>1</option>
                    <option value="2" <?php if($shelter == '2') echo 'selected'; ?>>2</option>
                    <option value="3" <?php if($shelter == '3') echo 'selected'; ?>>3</option>
                </select>
                <span class="error"><?php echo $shelterErr; ?></span>
            </div>

            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" id="photo" name="photo[]" accept="image/*" multiple required>
                <span class="error"><?php echo $photoErr; ?></span>
            </div>
            <button type="submit">Add Pet</button>
        </form>
    </section>


    <script>
    function togglePriceInput() {
        var rescuedValue = document.getElementById("rescued").value;
        var priceInput = document.getElementById("price");

        if (rescuedValue === "Yes") {
            priceInput.style.display = "none";
            document.getElementById("price").removeAttribute("required");
            document.getElementById("pricename").removeAttribute("label");
            
        } else {
            priceInput.style.display = "block";
            document.getElementById("price").setAttribute("required", "required");
        }
    }
    </script>


    <br><br>
    <footer class="footer">
        <p>&copy; 2024 Petify All rights reserved.</p>
    </footer>
</body>
</html>