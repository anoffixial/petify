<!DOCTYPE html>
<html>
<head>
  <title>Petify : Pet Adoption Stop</title>
  <?php include('inc\head.php'); ?>
</head>

<body>
<?php
include('inc\db.php'); 
include('inc\navbar.php'); 
?>
    
<div class="slideshow-container">

    <div class="mySlides fade">
      <img src="pic\pic4.jpg" height="100%" width="100%">
    </div>
    
    <div class="mySlides fade">
      <img src="pic\pic2.jpg" height="100%" width="100%">
    </div>
    
    <div class="mySlides fade">
      <img src="pic\pic3.jpg" height="100%" width="100%">
    </div>

    <div class="mySlides fade">
      <img src="pic\pic1.jpg" height="100%" width="100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
    
<div style="text-align:center">
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

    
<div class="welcome">
  <h1>Welcome to Petify !!</h1>
</div>

<div class="brief">
        <img src="pic/brief.jpg" height="100%" width="100%">

        <p>
            Petify is a user-friendly Pet Adoption Stop.
            We aim in giving a second chance for our pets with the help of adopters like you!! 💗
            <br><br>
            Whether you're seeking a playful pup, a cuddly kitten, or a gentle senior pet,
            our website offers a diverse range of adoptable animals waiting to bring joy into your life. 
            <br><br>
            Browse through profiles, learn about each pet's personality and needs, and embark on the rewarding journey of pet adoption today!
            From energetic pups eager for adventures to serene felines seeking a cozy lap to curl up on,
            there's a furry friend for every lifestyle and preference. 
            <br><br>
            Join us in making a difference in the lives of these deserving animals and experience the joy of adoption firsthand.🛟
        </p>
        <br><br>

        <a href="pets.php"><button><b>Adopt Now</b></button></a>

</div>
<br><br><br>
  
<h1>Our Petting Guide </h1>
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


<div class="welcome">
 <h1>Our Stories !!</h1>
</div>


<table id="rev_slider">
  <tbody>
    <tr>
    <td><img src="pic\review1.jpg" height="50%" width="40%"></td>
    <td>
    <div id="slider">
      <div id="outerbox"> 
          <div id="sliderbox">
              <img src="pic\oursto1.jpg" height="100%" width="50%">
              <img src="pic\oursto2.jpg" height="100%" width="50%">
              <img src="pic\oursto3.jpg" height="100%" width="50%">
              <img src="pic\oursto4.jpg" height="100%" width="50%">
              <img src="pic\oursto5.jpg" height="100%" width="50%">
          </div>
      </div>  
    </div>
    </td>
    </tr>
  </tbody>
</table>
    
<div class="faqcontainer">
  <h1>Frequently Asked Questions</h1>
  <details>
    <summary>How does the adoption process work?</summary>
    <div>
    Users can choose from number of rescued or sheltered pets on Petify, and can submit requests to us.
    </div>
  </details>
  <details>
    <summary>What is the adoption fee?</summary>
    <div>
    It's completely free to adopt rescued pets. Sheltered pets have an adoption fee.
    </div>
  </details>
  <details>
    <summary>Can I see photos and profiles of available pets online?</summary>
    <div>
    Yes. Every pet has their own dedicated pages with all their hobbies and important health records.
    </div>
  </details>
  <details>
    <summary>Do you offer any assistance with transitioning the pet to its new home?</summary>
    <div>
    No. We help in connecting you with your loved pet.
    </div>
  </details>
  <details>
    <summary>What should I do if I have additional questions or concerns?</summary>
    <div>
    We are open with additional queries. Visit <a href="contact.html">Contact Us</a> for further steps.
    </div>
  </details>
</div>





<br>
<footer>
  <?php include('inc\footer.html'); ?>
  <!-- <div class="footer">
    <p>&copy; 2024 Petify. All rights reserved. | 
        <a href="privacy-policy.html">Privacy Policy</a> | 
        <a href="terms-of-service.html">Terms of Service</a> | 
        <a href="contact.php">Contact Us</a>
    </p>
  </div> -->
</footer>

</body>
</html>