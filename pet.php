<html>
    <head>
    <?php include('inc\head.php'); 
        include('inc\db.php');  ?>
    <title>Pet info </title>
    <style>
        h2{
                color:green;
                font-family:Geneva, Single Day;
            }
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            }

            .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            }

            .product {
            display: flex;
            }

            .product-image {
            flex: 1;
            }

            .product-image img {
            max-width: 100%;
            height: auto;
            }

            .product-details {
            flex: 1;
            display: inline-flexbox;
            padding-left: 15%;
            padding-right: 0%;
            margin:-30% 2% 0% 23%;
            }

            .product-title {
            font-size: 24px;
            margin-bottom: 10px;
            }

            .product-price {
            font-size: 20px;
            color: #B12704;
            }

            .product-description {
            margin-bottom: 20px;
            }

            .product-description p{
                font-size: larger;
            }

            .product-description ul {
            list-style-type: none;
            padding: 0;
            }

            .product-description ul li {
            margin-bottom: 5px;
            }

            

            .product-actions input[type="submit"]{
                font-size: large;
                font-family: Single Day;
                color: white;
                text-align: center;
                display:inline flex;
                background-color: green;
                padding:10px 130px 10px;
                border-radius: 3%;
                width: 350px;
                height: 50px ;
                margin-left: 50%;
                margin-top: auto;
            }

            .adopt:hover {
            background-color: red;
            }

            /* slideshow */
            * {box-sizing:content-box}
                body {font-family: Verdana, sans-serif; margin-left: 30%;}
                img {vertical-align:middle;}


                .slideshow-container {
                width: 400px; /* Adjust width as needed */
                height: 500px; /* Adjust height as needed */
                position: relative;
                margin: 0 0 0 5%; /* Center the slideshow horizontally */
                overflow: hidden;
                }

                .mySlides {
                display: none;
                }

                .mySlides img {
                width: 100%; /* Make the image responsive */
                height: auto;
                }

                .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 50%;
                width: auto; /* Adjust width as needed */
                padding: 16px;
                color: white;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                background-color: rgba(0,0,0,0.5); /* Add background color for better visibility */
                border-radius: 50%; /* Make the buttons circular */
                }

                .next {
                right: 0;
                }

                
                .prev:hover, .next:hover {
                background-color: rgba(0,0,0,0.8);
                }

                .dot {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: flex;
                transition: background-color 0.6s ease;
                
                }

                .active, .dot:hover {
                background-color: #717171;
                }

                #dots{
                    display:inline-flex;
                    align-self: center;
                    margin-top: -5%;
                    margin-bottom: 0%;
                    margin-left: -63%;
                    margin-right: 20%;
                    padding-left: 80%;
                    padding-right: 20%;
                }
    </style>
    </head>
    <?php
        $id=$_REQUEST['pet_id'];
        $_SESSION['pet_id']=$id;
        $sql = "SELECT * FROM pets where pet_id='$id'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $name=$row['pet_name'];$gender=$row['gender'];$rescued=$row['rescued'];$price=$row['pet_price'];
                $category=$row['category'];$breed=$row['breed'];$age=$row['age'];$vaccine=$row['vaccine'];$image=$row['pet_image'];
                $decs=$row['decs'];$shelterid=$row['shelter_id'];$pet_id=$row['pet_id'];
            }
        }
    $pet_id=$id;
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

    if( NULL == $id || $result->num_rows <= 0 ) {
          echo "<script>alert('Something went wrong'); window.location.href='pets.php'; </script>";
    }
    ?>

    <div class="slideshow-container">

        <?php
        
            $sqll = "SELECT image_data FROM pet_images where pet_id = $pet_id";
            $resultl = $conn->query($sqll);
            if ($resultl->num_rows > 0) {
                while ($row = $resultl->fetch_assoc()) {
                    // Output each image
                    echo '<div class="mySlides fade">';
                    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image_data']) . '" alt="Uploaded Image">';
                    echo '</div>';
                }
            } else {
                echo "No images uploaded yet.";
            }
        ?>

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>

    <div style="text-align:center" id="dots" >
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        function plusSlides(n) {
        showSlides(slideIndex += n);
        }
        
        function currentSlide(n) {
        showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        }
    </script>


    <div class="product-details">
        <h2 style="font-size:xx-large;"  class="product-title"><?php echo $name ?></h2>
        <p  class="product-price">₹<?php echo $price ?></p>

            <div class="product-description">
                    <p><?php echo $decs ?></p>
                    <ul>
                        <li><b>Age:</b> <?php echo $age ?></li>
                        <li><b>Breed:</b> <?php echo $breed ?></li>
                        <li><b>Gender:</b> <?php echo $gender ?></li>
                        <li><b>Rescued:</b> <?php echo $rescued ?></li>
                    </ul>
            </div>
                
            <div class="product-actions">
                <form method="GET" action="application.php">
                    <input type="hidden" name="pet_id" value="<?php echo $pet_id; ?>" >
                <input type="submit" class="adoptnow" value="Adopt Now" >
                </form>
            </div>

    </div>
    <br>
    <div class="vaccines" style="margin:auto 25% auto 5% " >
        <h2><?php echo $name . "'s Vaccine Records " ?></h2> 

        <p><?php 
            $vaccine2 = str_replace(',', ',<br>', $vaccine);
            echo $vaccine2 ?> 
        </p>

        <h2> Category  </h2> 
            <p><?php echo $category  ?>
        </p>


    </div>

    <h1> Need some guide with your next friend ? </h1>
    <div class="petcarecontainer">
            <div class="pet-card">
                <img src="pic\dog.jpg" alt="Pet 1"  width="100%" >
                <div class="pet-info">
                    <h2>DOG CARE</h2><br>
                    <p>Learn about caring for your new dog!!</p>
                </div>
                <button class="learn-button" onclick="location.href='additional/dogcare.html'">LEARN MORE</button>
            </div>
            <div class="pet-card">
                <img src="pic\cat2.jpg" alt="Pet 2" width="100%">
                <div class="pet-info">
                    <h2>CAT CARE</h2><br>
                    <p>Learn about caring for your new cat!! </p>
                </div>
                <button class="learn-button" onclick="location.href='additional/catcare.html'">LEARN MORE</button>
            </div>
            <div class="pet-card">
                <img src="pic\ducks.jpg" alt="Pet 3" width="100%">
                <div class="pet-info">
                    <h2>OTHER PETS</h2><br>
                    <p>Learn about caring for your new pet!! </p>
                </div>
                <button class="learn-button" onclick="location.href='additional/petcare.html'">LEARN MORE</button>
            </div>

    </div>

    <h1> Meet some more cute pets </h1>
    <table class="product-table">
        <?php
        $sqll = "SELECT * FROM pets";
        $resultt= $conn->query($sqll);
        
        if ($resultt->num_rows > 0) {
                    $count = 0;
                    while ($row = $resultt->fetch_assoc()) {
                        if ($count % 2== 0) {
                            echo "<tr>";
                        }
                        echo "<td>";  
                        $pet_id=$row['pet_id'];
                        include('inc\fetchimg.php');
                        echo "<p style='font-size:x-large; font-family:Single Day';>" . $row["pet_name"] . "</p>" . "";
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
                        echo "<input type='submit' name='application' value='Know More' style='background-color:green';>" ;
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

        

</script>
</body>
<footer>
  <?php include('inc\footer.html'); ?>
</footer>
</html>
