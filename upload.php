<?php


if(isset($_POST["submit"])){
  
  $totalFiles = count($_FILES['photo']['name']);
  $filesArray = array();

  for($i = 0; $i < $totalFiles; $i++){
    $imageName = $_FILES["photo"]["name"][$i];
    

    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));

    $newImageName = uniqid() . '.' . $imageExtension;

    move_uploaded_file(.'uploads/' . $newImageName);
    $filesArray[] = $newImageName;
  }

  $filesArray = json_encode($filesArray);
  $query = "INSERT INTO pets ('pet_image') VALUES ('$filesArray')";
  mysqli_query($conn, $query);
  echo
  "
  <script>
    alert('Successfully Added');
    document.location.href = 'pets.php';
  </script>
  ";
}
?>

