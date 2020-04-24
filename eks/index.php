<!DOCTYPE html>
<html>
<head>
<title>EKS Auto</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body bgcolor="#1e2e47">

<center>
<div>
<img src="logo_top.jpg" class="logo">
</div>
<div class="header">
    <a class="active" href=".">Home</a>
    <a href="inventory.php">Inventory</a>
    <a href="applyforloan.php">Loan Application</a>
    <a href="about.html">About Us</a>
    <a href="contactus.php">Contact Us</a>
    <a href="login.php">Dealer Login</a>
</div>

<div style="padding-left:20px">
<h1>Welcome to EKS Auto!</h1>
</div>
<h3>These are just some of the cars we have:</h3>
<!-- Container for the image gallery -->

<div class="container">

  <!-- Full-width images with number text -->
  <div class="car_slides">
    <div class="numbertext">1 / 8</div>
      <img src="home_audi.jpg" style="width:500px;height:400px">
  </div>

  <div class="car_slides">
    <div class="numbertext">2 / 8</div>
      <img src="home_bmw1.jpg" style="width:500px;height:400px">
  </div>

  <div class="car_slides">
    <div class="numbertext">3 / 8</div>
      <img src="home_ford1.jpg" style="width:500px;height:400px">
  </div>
 
 <div class="car_slides">
    <div class="numbertext">4 / 8</div>
      <img src="home_mercedes.jpg" style="width:500px;height:400px">
  </div>
  
  <div class="car_slides">
    <div class="numbertext">5 / 8</div>
      <img src="home_maserati.jpg" style="width:500px;height:400px">
  </div>
  
  <div class="car_slides">
    <div class="numbertext">6 / 8</div>
      <img src="home_vw.jpg" style="width:500px;height:400px">
  </div>
  
  <div class="car_slides">
    <div class="numbertext">7 / 8</div>
      <img src="home_honda.jpg" style="width:500;height:400px">
  </div>
  
  <div class="car_slides">
    <div class="numbertext">8 / 8</div>
      <img src="home_toyota.jpg" style="width:500px;height:400px">
  </div>
  
  
    <!-- Image text -->
  <div class="caption-container">
    <p id="caption"></p>
  </div>
  
    <div class="row">
      <img class="demo cursor" src="home_audi.jpg" style="width:150px;height:100px" onclick="currentSlide(1)" alt="Audi">
      <img class="demo cursor" src="home_bmw1.jpg" style="width:150px;height:100px" onclick="currentSlide(2)" alt="BMW">
      <img class="demo cursor" src="home_ford1.jpg" style="width:150px;height:100px" onclick="currentSlide(3)" alt="Ford">
    <img class="demo cursor" src="home_mercedes.jpg" style="width:150px;height:100px" onclick="currentSlide(4)" alt="Mercedes">
    <img class="demo cursor" src="home_maserati.jpg" style="width:150px;height:100px" onclick="currentSlide(5)" alt="Maserati">
    <img class="demo cursor" src="home_vw.jpg" style="width:150px;height:100px" onclick="currentSlide(6)" alt="VolksWagen">
    <img class="demo cursor" src="home_honda.jpg" style="width:150px;height:100px" onclick="currentSlide(7)" alt="Honda">
    <img class="demo cursor" src="home_toyota.jpg" style="width:150px;height:100px" onclick="currentSlide(8)" alt="Toyota">
    </div>

  </div>
</div>
 
 <script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("car_slides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
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
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<br>
<h5>Copyright &copy; 2019 EKS Auto</h5>
</center>
</body>
</html>