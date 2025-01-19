
<!DOCTYPE html>
<html>
<head>
    
    <title>Petify : About Us</title>
    <link rel="shortcut icon" href="nav/pets.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();
$username = "root";
$password = "";
$database="petify";
$conn = mysqli_connect("localhost", $username, $password, $database);

mysqli_select_db($conn,$database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<body>
<?php
  include('inc\navbar.php'); 
?>

    <div class="about">
        
        <img src="logo/Petify-logos_black.png"width="100%"> 
        
        <p>
            Petify is an online Pet Adoption Website. Our vision is to provide homes for all needy pets. 
            <br>
            We provide a number of adoption options including Rescued pets. Adopters are given a walk through their pets' medical history 
            (includes vaccinations and allergies).<br><br>
            Petify also provides Pet Care products so, adopters and even existing pet owners can use our services.<br>
            Users can filter and search their dream pet using Petify's filtering features.
            <br>

        </p>
        
    </div>

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

    <h2>Contact Us : </h2> 
<div class="about2">
    <p> WhatsApp Us : <a href="https://wa.me/7397966220"><img src="pic\wa.png" width="4%" ></a><br><br>
    Get in touch with mail : <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWslzBnZsPfVVCKzkvGngKLgpWsQfCJKwVDkNlWpRZcCrLVLggslGzhDzdbqDFXCsbLqQGJcQ"><img src="pic\gm.png" width="4%"></a><br><br>
    DM us : <a href="https://instagram.com/amartxyanair"><img src="pic\ig.png" width="4%"></a></p>
</div>


<?php include('inc\footer.html'); ?>
</body>
</html>