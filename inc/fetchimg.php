<html>
    <head>
        <style>
            .dbimg img{
                max-height: 400px;
                max-width: 500px;
            }
        </style>
    </head>

<body>
    <div class="dbimg">
        <?php
            $sqll = "SELECT image_data FROM pet_images where pet_id = $pet_id LIMIT 1";
            $resultl = $conn->query($sqll);
        if ($resultl->num_rows > 0) {
            while ($roww = $resultl->fetch_assoc()) {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($roww['image_data']) . '" alt="Pet Image" height="50% width="50%">';

            }  
        } 
        else {
                echo "No images uploaded yet.";
            }
        ?>
    </div>

</body>
</html>