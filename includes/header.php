<?php 
  include('db.php');
  include('includes/flav.php');
  include('links.php');
  //unset($_SESSION["username"]);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/header.css">
  <style type="text/css">

  </style>
</head>
<body>
  <div class=" before_header">
   <div class="header_contact">
  	 <span class="contact_number" style=""> <i class="icon ion-ios-telephone"></i>+27 (0) 74 902 6530</span> &nbsp;
  	 <span class=""> <i class="icon ion-ios-email"></i> info@mccars.co.za</span>
  </div>
  <div class="header_social"> 
  	 <span class=""> <i class="icon ion-social-facebook"></i></span>&nbsp;
  	 <span class=""> <i class="icon ion-social-twitter"></i></span>&nbsp;
  	 <span class=""> <i class="icon ion-social-googleplus"></i></span>&nbsp;
     <?php 
       if(isset($_SESSION["name"]))
        {
          ?>
            <div class="dropdown">
              <button class="dropbtn"><i class="icon ion-ios-contact-outline"></i> Hi <?= $_SESSION["name"] ?>
              <i class="ionicon ion-chevron-down" id="down_chevron"></i><i class="ionicon ion-chevron-up" id="up_chevron"></i> </button>
              <div class="dropdown-content animated slideInRight">
                <a href="profile.php"><i class="icon ion-ios-contact-outline"></i> Profile</a>
                <a href="#"><i class="icon ion-edit"></i> Settings</a>
                <a href="#"><i class="icon ion-chatbubbles"></i> News</a>
                <a href="logout.php" class="logout"><i class="icon ion-log-out" ></i> Logout</a>
              </div>
            </div>
          <?php
        }else
        {
          ?>
          <a class="button log_in" href="signin.php"> <i class="icon ion-ios-unlocked"></i> Login</a>
          
          <?php
        }
     ?>
  </div>
  </div>

<header class="fixed-top">
  <div class="container" id="myFirstCont">
    <div class="container">
     <a href="index.php"><h1 class="logo"><img src="img/logo.png"></h1></a>
    <nav class="site-nav">
        <ul>
          <!--<i class="fa fa-envelope site-nav--icon"></i>-->
          <li><a href="index.php">Home</a></li> 
          <li><a href="newCars.php">New Cars</a></li>
          <li><a href="usedCars.php">Used Cars</a></li>
          <li><a href="onSale.php">On Sale</a></li>
          <!--<li><a href="lostCars.php">Stolen Cars</a></li>ionicon ion-chevron-down-->
          <li><a href="lostCars.php">News & Reviews <i class="ionicon ion-chevron-down"></i></a></li>
          <li><a href="advertise.php">Advertise</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a class="button log_in" id="btn_login_small_screen" href="signin.php"> <i class="icon ion-ios-contact-outline"></i> Login</a></li>
        </ul> 
    </nav>
    <div class="menu-toggle">
      <div class="hamburger"></div>
    </div>
  </div>
  
</div>
</header>
</body>
</html>
<script type="text/javascript">
  $('.menu-toggle').click(function() {
  $('.site-nav').toggleClass('site-nav--open', 500);
  $(this).toggleClass('open');
});
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $(".dropbtn").on('hover',function(){
      $(".dropdown-content").fadeIn(1000);
    });
  });
</script>