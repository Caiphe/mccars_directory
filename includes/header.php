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
  <style type="text/css">
     #btn_login_small_screen
     {
         padding: 4px 10px;
         display: none;
     }
     .contact_number
     {
     	 color:white;
       text-decoration-style: none;
     	 text-decoration-line: none;
     	 text-decoration:none;
     }
     #hello_user
     {
       background-color: #eb8a0d;
       color: white;transition: 1s;
     }
     #hello_user:hover
     {
        background-color: #eb8a0d;
        opacity: 0.7;  
     }
     .dropbtn 
     {
        //background-color: #F3A509;
        background-color:transparent;
        border: solid 1px white;
        color: white;
        padding: 7px 20px;
        font-size: 16px;
        margin-top: -10px;
        transition:0.5s;
        border-radius: 20px;
      }

      .dropdown 
      {
        position: relative;
        display: inline-block;
        margin-bottom: 10px;
        z-index: 9999999999999;
      }

      .dropdown-content 
      {
        margin-top: 8px;
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 130px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      .dropdown-content a 
      {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition:1s;
        border-bottom: solid 1px #D5D5D5;
      }
      .dropdown-content a:hover 
      {
        background-color:#82817D;
        color:#fff;
      }

      .dropdown:hover .dropdown-content 
      {
        display: block;
      }

      .dropdown:hover .dropbtn 
      {
        background-color: #F3A509;
      }
      .dropdown-content::after
      {
          content: "";
          position: absolute;
          bottom: 100%;
          right: 70%;
          margin-left: -10px;
          border-width: 10px;
          border-style: solid;
          border-color:  transparent transparent #fff transparent;
          z-index: 9999;
      }
      .logout
      {
        background-color:#A7A7A5;
        color: white;
      }
      .myLogin_cont
      {
         background-color:#D6D5D0;
         min-width: 120px;border-radius: 10px;
      }
      .myLogin_cont:hover
      {
        background-color:white;
        min-width: 120px;border-radius: 10px;
      }


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
              <button class="dropbtn"><i class="icon ion-ios-contact-outline"></i> <?= $_SESSION["name"] ?></button>
              <div class="dropdown-content">
                <a href="profile.php"><i class="icon ion-ios-contact-outline"></i> Profile</a>
                <a href="#"><i class="icon ion-edit"></i> Setings</a>
                <a href="#"><i class="icon ion-chatbubbles"></i> News</a>
                <a href="logout.php" class="logout"><i class="icon ion-log-out" ></i> Logout</a>
              </div>
            </div>
          <?php
        }else
        {
          ?>
          <a class="button log_in" href="signin.php"> <i class="icon ion-ios-contact-outline"></i> Login</a>
          
          <?php
        }
     ?>
  </div>
  </div>

<header>
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
          <li><a href="lostCars.php">Stolen Cars</a></li>
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