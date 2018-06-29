<?php
  include('includes/db.php');
  if(isset($_POST["btnNewsLetter"]))
  {
  	$newsletter_email = htmlspecialchars($_POST["email"]);
  	if(empty($_POST["email"]) && !filter_var($newsletter_email, FILTER_VALIDATE_EMAIL))
  	{
      $error_msg =  "A valid email is required";
  	}
  	else
  	{
  	  $checkEmail=$db->prepare('SELECT * FROM newsletteremail WHERE email = ?');
      $checkEmail->execute(array($newsletter_email));
  	  $count = $checkEmail->rowCount();
  	  if($count == 1)
  	  {
  	  	$error_msg = "Oooops!! This email exist already. Try Again";
  	  	unset($newsletter_email);
  	  }
  	  else
  	  {
  	  	$sqlInsert =$db->prepare("INSERT INTO newsletteremail(email) VALUES(?)");
        $sqlInsert->execute(array($newsletter_email));
        unset($newsletter_email);
        $successMsg ="Your are now registered for our newsletter";
  	  }     
  	}
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" scr="js/jquery-3.3.1.min.js"></script>
	<style type="text/css">
		.myTableContact
		{
			margin-left: 38px;
			margin-bottom: 20px;
		}
		.social_footer
		{
			margin-top: 10px;
		}
		.social_footer li
		{
		  right: 0;
		  text-decoration: none;
		  list-style: none;
		  list-style-type: none;
		  color: #EBECEB;
		  margin-left: 20px;
		  display: inline-table;
		  font-size: 17px;
		  padding: 5px 13px;
		  border:solid 1px #EBECEB;
		  border-radius:20px;
		  transition: 0.5s;
		}
		.social_footer li:hover
		{
		  opacity: 0.5;
		  background-color:#EBECEB;
		  color: black;
		}
		.social_footer li a
		{
		  color: #EBECEB;
		  transition: 0.5s;
		}
		.social_footer li a:hover
		{
			color: black;
		}
	</style>
</head>
<body>
 <!--CAR LOGOS-->
 <div class="container-fluid" style="background-color: #7f0a0a;height:3px;"></div>
 <div class="container">
 	<div class="row all_car_logos" >
 		<div class="col-md-2 col-sm-2">
 			<a href="#" class="thumbnail "><img src="icons/icon1.png"></a>
 		</div>
 		<div class="col-md-2 col-sm-4">
 			<a href="#" class="thumbnail "><img src="icons/icon2.png"></a>
 		</div>
 		<div class="col-md-2 col-sm-2">
 			<a href="#" class="thumbnail "><img src="icons/icon7.png"></a>
 		</div>
 		<div class="col-md-2 col-sm-2">
 			<a href="#" class="thumbnail "><img src="icons/icon4.png"></a>
 		</div>
 		<div class="col-md-2 col-sm-2">
 			<a href="#" class="thumbnail "><img src="icons/icon8.png"></a>
 		</div>
 		<div class="col-md-2 col-sm-2">
 			<a href="#" class="thumbnail "><img src="icons/icon9.png"></a>
 		</div>
 	</div>
 </div>
 <div class="container-fluid myNewLetter" >
 	<div class="w3-row">
 		<div class="w3-half" align="center">
 			<p class="reg_text">Sign up for Our newsletter !!!</p>
 			<form method="POST" id="myForm" name="myForm" onsubmit="return Validation()">
 				<input type="email" class="" name="email" id="email" placeholder="Email address"> &nbsp;
 				<button type="submit" name="btnNewsLetter" id="btnNewsLetter" class=" btn btn-default"> 
 					<i class=""></i> REGISTER</button><br>
                  <div class="email_error_js" id="email_error_js"></div>
 			  </form>
 			   <?php
                 if(isset($successMsg))
                 {
                 	?>
                 	<div class="animated slideInLeft success_msg_animation"  id="successMsg" name="successMsg">
                 	 <p class="Newsletter_error "><i class="icon ion-android-checkmark-circle"></i> <?php echo $successMsg ?></p> 
                 	</div>
                 	<?php
                 }
 			   ?>
 			    
 			    <?php
                 if(isset($error_msg))
                 {
                  ?>
                 <div class="animated slideInLeft error_msg_animation" id="newsletter_error_msg">
                  <p class="newsletter_erro"><i class="icon ion-alert"></i> <?php echo $error_msg ?></p>
                 </div>
                 <?php
                 }
 			   ?>

 		</div>
 		<div class="w3-half" align="center">
 			<p class="newletterText">
 				Buying a car is not always easy. <br> At mccars.com all is made easy and posible for you!!<br>Just Get in touch with us
 			</p>
 		</div>
 	</div>
 </div>
	<footer class="myFooter">
		<br><br>
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xsm-6">
				<ul class="footer_ul">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">About Us</a></li>
					<li><a href="#">Our Services</a></li>
					<li><a href="#">Contact us</a></li>
					<li><a href="signup.php">Sign up</a></li>
					<li><a href="signin.php">Sign in</a></li>
					<li><a href="#">Update Profile</a></li>
					<li><a href="#">Terms & Conditions</a></li>
				</ul>
			   </div>
			   <div class="col-md-3 col-sm-3 col-xsm-6">
				<ul class="footer_ul">
					<li><a href="#">All Cars</a></li>
					<li><a href="#">Category</a></li>
					<li><a href="#">Model</a></li>
					<li><a href="#">Makes</a></li>
					<li><a href="newCars.php">News Cars</a></li>
					<li><a href="usedCars.php">Used Cars</a></li>
					<li><a href="onSale.php">Cars On Sale</a></li>
					<li><a href="#">Reviews</a></li>
					<li><a href="#">Book test Drive</a></li>
				</ul>
			   </div>
			   <div class="col-md-3 col-sm-3 col-xsm-6">
				<ul class="footer_ul">
					<li><a href="#void">Ballito</a></li>
					<li><a href="#">Benoni</a></li>
					<li><a href="durbanCars.php">Durban</a></li>
					<li><a href="#">Germiston</a></li>
					<li><a href="#">Johannesburg</a></li>
					<li><a href="#void">Limpopo</a></li>
					<li><a href="#void">Pinetown</a></li>
					<li><a href="#void">Western Cap</a></li>
					<li><a href="#">Westville</a></li>
				</ul>
			   </div>
			   <div class="col-md-3 col-sm-3 col-xsm-6">
				<table class="myTableContact">
					<tr>
						<td><b>Cell</b> </td>
						<td>&nbsp;: +27 (0) 74 902 6530 </td>
					</tr>
					<tr>
						<td><b>Tel</b> </td>
						<td>&nbsp;: 031 605 3250</td>
					</tr>
					<tr>
						<td><b>Fax</b> </td>
						<td>&nbsp;: +27 (0) 74 902 6530 </td>
					</tr>
					<tr>
						<td><b>Email</b> </td>
						<td>&nbsp;: info@mccars.co.za </td>
					</tr>
				</table>
				<a class="thumbnail" href="index.php" class="#" id="footer_logo" ><img src="img/footerLogo2.png"></a>
			   </div>
			</div>
		</div>
	</footer>
	<div class="container-fluid container-domain" align="center"><br>
        <div>
          <ul class="social_footer">
          	<li><a href="#"><i class="icon ion-social-facebook"></i></a></li>
          	<li><a href="#"><i class="icon ion-social-twitter"></i></i></a></li>
          	<li><a href="#"><i class="icon ion-social-googleplus"></i></a></li>
          </ul>
	    </div>
		<p class="footerLastText">Copy Right 2018 | All Rights reserved | @ www.mcccars.co.za </p>
	<br><br>
	</div>
	<?php include('scroll.php') ?>
</body>
</html>
<script type="text/javascript">
	 var email = document.forms["myForm"]["email"];
     var email_error = document.getElementById("email_error_js");
     email.addEventListener("blur", emailVerify,true);

     function Validation()
     {
     	if(email.value == "")
     	{
     		email.style.border = "solid 1px #7f0a0a";
     		email_error.textContent = "Valid Email Required";
		    email.focus();
		    return false;
     	}
     }
     function emailVerify()
     {
     	if(email.value != "")
     	{
     		email.style.border = "solid 1px #1f6b2f";
     		email_error.innerHTML ="";
     		return true;
     	}
     }
</script>
<script type="text/javascript">
	 setTimeout('hideMsg()', 4000);
  function hideMsg(){
    $("#newsletter_error_msg").hide("3000");
}
</script>
<script type="text/javascript">
	 setTimeout('cach()', 3000);
  function cach(){
    $("#successMsg").hide("4000");
}
</script>
