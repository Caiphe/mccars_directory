<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
* {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}
.packages_price
{
  width: 60%;
  background-color: #fff;
}
.my_real_card
{
  padding: 10px;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 8px 0 rgba(0, 0, 0, 0.19);
  min-width: 100%;
}
.packages_price h4
{
  font-size: 25px;
}
.feature_header
{
  width: 100%;
  background: #082277;
  padding: 3px;
  color: white;
  font-size: 30px;
}
.feature_footer1
{
  background: #082277;
  height: 10px;
}
.feature_header2
{
  width: 100%;
  background: #f7b000;
  padding: 3px;
  color: white;
  font-size: 30px;
}
.feature_footer2
{
  background: #f7b000;
  height: 10px;
}
.click_advert_p1
{
  border-radius: 0px;
  padding: 7px 15px;
  border:solid 1px #082277;
  transition: 1s;
  color: #082277;
  background-color: transparent ;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 4px 0 rgba(0, 0, 0, 0.19);
}
.click_advert_p1:hover
{
  background:#082277;
  background-color: #082277;
  color: white;
  border:solid 1px #fff;
}
.click_advert_p2
{
  border-radius: 0px;
  padding: 7px 15px;
  border:solid 1px #f7b000;
  transition: 1s;
  color: #f7b000;
  background-color: transparent ;
  box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 4px 0 rgba(0, 0, 0, 0.19);
}
.click_advert_p2:hover
{
  background:#f7b000;
  background-color: #f7b000;
  color: white;
  border:solid 1px #fff;
}
.stars_small
{
  font-size: 17px;
  color: #dbdad8;
}
.stars_medium
{
  font-size: 22px;
  color: #d9d9d9;
}
.stars_large
{
  font-size: 27px;
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.why_mccars
{
  color: #7f0a0a;
}
.why_mccars_div h3
{
  color: #082277;
}
.packages h3
{
  color: #616161;
  font-weight: bold;
}
.myMainCont
{
  margin-top: 3px;
}
.mychevron
{
  margin-top: 100px;
  background-color: transparent;
}

</style>
</head>
<!--img/advertise.jpg-->
    <body class="">
      <div class="container-fluid myMainCont">
        <div class="container">
          <div class="">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
          <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/advertise2.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
           <div class="item">
            <img src="img/advertise1.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="img/advertise4.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
          <div class="item">
            <img src="img/advertise3.jpg" alt="">
            <div class="carousel-caption">
            </div>
          </div>
        </div>
      </div>
  </div>
        </div>


	  <div class="container " align="center" style="background-color:white;">
       <div class="container " >
        <div class="packages_price">
            <div class="row">
               <div class="col-md-6 col-md-12">
                <br>
                   <div class="my_real_card">
                    <div class="feature_header" >
                       <i class="icon ion-star stars_small"></i> 
                       <i class="icon ion-star stars_large"></i> <i class="icon ion-star stars_large"></i>
                       <i class="icon ion-star stars_small"></i>
                       <h4>FEATURED</h4>
                    </div>
                      <div align="center" class="packages">
                         <i class="icon ion-checked "></i>
                         <h3>14 days</h3>
                         <h3>R150.00</h3>
                      </div>
                       <br>
                       <div class="feature_footer1"></div>
                   </div>
                   <br>
                   <div align="center">
                 <a class="btn btn-default click_advert_p1" href="advert_p1.php">CLICK HERE TO ADVERTISE</a>
               </div>
               </div>
               <div class="col-md-6 col-md-12">
                <br>
                 <div class="my_real_card">
                  <div class="feature_header2">
                      <i class="icon ion-star stars_small"></i> 
                      <i class="icon ion-star stars_medium"></i> <i class="icon ion-star stars_large"></i> 
                      <i class="icon ion-star stars_medium"></i> 
                      <i class="icon ion-star stars_small"></i>
                     <h4>FEATURED PLUS</h4>
                  </div>
                      <div align="center " class="packages">
                         <i class="icon ion-checked"></i>
                         <h3>30 days</h3>
                         <h3>R250.00</h3>
                      </div>
                      
                  <br>
                  <div class="feature_footer2"></div>

               </div>
               <br>
               <div align="center">
                 <a class="btn btn-default click_advert_p2" href="advert_p2.php">CLICK HERE TO ADVERTISE</a>
               </div>
                   </div>               
            </div>
   </div>
   
 </div></div>
<div class="container why_mccars_div"  align="center" style="background-color: white;">
  <h2 class="why_mccars">Why mccars.co.za?</h2>
  <hr>
  <div class="row">
     <div class="col-md-4">
         <h2><i class="icon ion-ios-contact-outline"></i></h2>
         <h3>Over 4 Thousands Buyers</h3>
         <p>From our website your ad can beseen by over 4 thousands buyers around South Africa</p>
     </div>
      <div class="col-md-4">
         <h2><i class="icon ion-card"></i></h2>
         <h3>Affordable Packages</h3>
         <p>Our pricing is reasonable, affordabe and will not empty your wallet!!!</p>
     </div>
      <div class="col-md-4">
        <h2><i class="icon ion-ios-unlocked"></i></h2>
         <h3>Save & Secure</h3>
         <p>At mccars.co.za we take pride inprotecting our clients and their data </p>
     </div>
  </div>
  <hr>
  <div class="row">
     <div class="col-md-4">
         <h2><i class="icon ion-android-settings"></i></h2>
         <h3>Reliable & Efficient</h3>
         <p>From our website your ad can reach over 4 thousands buyers around South Africa</p>
     </div>
      <div class="col-md-4">
         <h2><i class="icon ion-android-contacts"></i></h2>
         <h3>Great Services</h3>
         <p>From our website your ad can reach over 4 thousands buyers around South Africa</p>
     </div>
      <div class="col-md-4">
        <h2><i class="icon ion-laptop"></i></h2>
         <h3>New Technology</h3>
         <p>From our website your ad can reach over 4 thousands buyers around South Africa</p>
     </div>
  </div>
  <hr>
</div>

</div>
</body>
<?php include('alertIcon.php') ?>
<?php include('includes/footer.php') ?>
</html>

<script>
$(document).ready(function(){
    // Activate Carousel
    $("#myCarousel").carousel();
    
    // Enable Carousel Indicators
    $(".item1").click(function(){
        $("#myCarousel").carousel(0);
    });
    $(".item2").click(function(){
        $("#myCarousel").carousel(1);
    });
    $(".item3").click(function(){
        $("#myCarousel").carousel(2);
    });
    $(".item4").click(function(){
     $("#myCarousel").carousel(3);
    });
    
    // Enable Carousel Controls
    $(".left").click(function(){
        $("#myCarousel").carousel("prev");
    });
    $(".right").click(function(){
        $("#myCarousel").carousel("next");
    });
});
</script>
