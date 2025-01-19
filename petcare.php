<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Petcare section</title><?php include('inc\head.php'); ?>
</head>

<body>
<?php
include('inc\db.php'); 

?>
<style>
  a{
    text-decoration: none;
  }
  body {
    font-family: Arial, sans-serif;
   /* display: flex;
    justify-content: center;
    align-items: center;*/
    height: 100vh;
    margin: 0;
   /* background-color: #f0f0f0;*/
  }


  .header h1 {
    background-color: #4CAF50;
    color: whitesmoke;
    display: flex;
    justify-content: center; /* Horizontally center the image */
    align-items: center; /* Vertically center the image */
    width: 100%; /* Adjust container width as needed */
    height: 100px; /* Adjust container height as needed */
    margin: 50px auto; /* Adjust margin as needed */
 }
  .image-container {
    display: flex;
    justify-content: center; /* Horizontally center the image */
    align-items: center; /* Vertically center the image */
    width: 100%; /* Adjust container width as needed */
    height: 500px; /* Adjust container height as needed */
    margin: 50px auto; /* Adjust margin as needed */
 }

 .image-container img {
    max-width: 100%;
    max-height: 100%;
    border-radius: 8px;
 }

  .text-overlay {
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 24px;
    font-weight: bold;
    text-transform:capitalize;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 8px;
  }

  .text-overlay1 {
    position: absolute ;

    margin: auto;
   /* bottom: 80%;*/
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
    border-radius: 8px;
  }

  /*.button-container {
    text-align: center;
  }*/

  .large-button {
    width: 50%;
    position: relative;
    display: block;
    margin: 10px auto;
    padding: 10px 10px;
    font-size: 18px;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 8px;
    background-color: #4CAF50;
    color: whitesmoke;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .large-button:hover {
    background-color: #53d657;
  }

  .button-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .button-text {
    text-align: center;
    flex-grow: 1;
  }

  .left-image {
    width: 80px; /* Adjust image size as needed */
    height: 100%;
  }

  .left-image img {
    border-radius: 5%;
    align-content: end;
    display: block;
    max-width: 100%;
    max-height: 100%;
  }

  .right-text {
    color: black;
    font-size: 10px;
  }

  .overlay {
    position: absolute;
    margin-left:25% ;
    left: 0;
    width: 50%;
    text-align: center;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 20px;
    box-sizing: border-box;
    color: white;
 }

 .overlay h2 {
    font-size: 2.5em;
    margin-bottom: 10px;
 }

 .overlay p {
    font-size: 1.2em;
    margin-bottom: 20px;
 }

 .overlay button {
    margin: auto;
    padding: 10px 20px;
    font-size: 1.2em;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
 }

 .overlay button:hover {
    background-color: #45a049;
 }

</style>
<body>
<?php include('inc\navbar.php'); ?>
    <div class="header"> <h1>  Pet Care</h1></div>

    <div class="image-container">
        <img src="pic/petcare.jpg" alt="Image">
        <div class="text-overlay"><h4> Are you a new pet parent, or looking to bolster your pet care skills? Read on for grooming guides, nutrition information, safety tips and more</h4></div>
      </div>
  <div class="button-container">
    <button class="large-button" >
        <div class="button-content">
          <div class="left-image"><img src="pic/shiro.jpg" alt="Left Image"></div>
          <div class="button-text"><a href="https://dogwithblog.in/pune-animal-shelters-and-emergency-helplines/"><h1>Dog Care</h1></a></div>
          <span class="right-text">Click to know more...</span>
        </div>
    </button>
    <button class="large-button">
        <div class="button-content">
          <div class="left-image"><img src="pic/cat1.jpg" alt="Left Image"></div>
          <div class="button-text"> <a href="https://dogwithblog.in/pune-animal-shelters-and-emergency-helplines/"><h1>Cat Care</h1></a></div>
          <span class="right-text">Click to know more...</span>
        </div>
    </button>
    <button class="large-button">
        <div class="button-content">
          <div class="left-image"><img src="pic/snowball.jpg" alt="Left Image"></div>
          <div class="button-text"> <a href="https://dogwithblog.in/pune-animal-shelters-and-emergency-helplines/"><h1>Rabbit Care</h1></a></div>
          <span class="right-text">Click to know more...</span>
        </div>
    </button>
    <button class="large-button">
        <div class="button-content">
          <div class="left-image"><img src="pic/charlie4.jpg" alt="Left Image"></div>
          <div class="button-text"> <a href="https://pakshimitra.org/bird-census-index"><h1>Bird Care</h1></a></div>
          <span class="right-text">Click to know more...</span>
        </div>
    </button>
      
  </div>

    <div class="image-container">
        <img src="pic/puppies.avif" alt="Image" width="80%">
        <div class="overlay">
            <h2>CAN'T ADOPT?</h2>
            <a href="donate.php"><button>DONATE</button></a>
             <p> They need you..</p>
        </div>
    </div>
  
</body>
<?php include('inc\footer.html'); ?>
</html>
