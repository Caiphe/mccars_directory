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
  <link rel="stylesheet" type="text/css" href="css/advertise.css">
  <style>


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
                 <a class="btn btn-default click_advert_p2" href="advert_p1.php">CLICK HERE TO ADVERTISE</a>
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
