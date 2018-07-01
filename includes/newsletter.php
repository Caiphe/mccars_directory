<?php
  include('includes/db.php');
  if(isset($_POST["btnNewsLetter"]))
  {
  	$newsletter_email = htmlspecialchars($_POST["email"]);
  	if(empty($_POST["email"]) && !filter_var($newsletter_email, FILTER_VALIDATE_EMAIL))
  	{
      $myEmailError =  "A valid email is required";
  	}
  	else
  	{
  	  $checkEmail=$db->prepare('SELECT * FROM newsletteremail WHERE email = ?');
      $checkEmail->execute(array($newsletter_email));
  	  $count = $checkEmail->rowCount();
  	  if($count == 1)
  	  {
  	  	$myEmailError = "Oooops!! This email exist already. Try Again";
  	  	unset($newsletter_email);
  	  }
  	  else
  	  {
  	  	$sqlInsert =$db->prepare("INSERT INTO newsletteremail(email) VALUES(?)");
        $sqlInsert->execute(array($newsletter_email));
        unset($newsletter_email);
        $registered_succ =" Successfully Registered ";
  	  }     
  	}
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/newsLetter.css">
</head>
<body>
	<p class="reg_text">Sign up for Our newsletter !!!</p>
 			<form method="POST" id="myForm" name="myForm" >
 				<input type="email" class="" name="email" id="email" placeholder="Email address"> &nbsp;
 				<button type="submit" name="btnNewsLetter" id="btnNewsLetter" class=" btn btn-default"> 
 					<i class=""></i> REGISTER</button><br>
                  <div class="email_error_js" id="email_error_js"></div>
 			  </form>

 			   <?php
                 if(isset($registered_succ))
                 {
                 	?>
                 	<div class="animated slideInLeft success_msg_animation"  id="successMsg" name="successMsg">
                 	 <p class="Newsletter_error "><i class="icon ion-android-checkmark-circle"></i> <?php echo $registered_succ ?></p> 
                 	</div>
                 	<?php
                 }
 			   ?>
 			    
 			    <?php
                 if(isset($myEmailError))
                 {
                  ?>
                 <div class="animated slideInLeft error_msg_animation" id="newsletter_error_msg">
                  <p class="newsletter_erro"><i class="icon ion-alert"></i> <?php echo $myEmailError ?></p>
                 </div>
                 <?php
                 }
 			   ?>		
</body>
</html>