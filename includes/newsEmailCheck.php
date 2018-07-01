<?php
  include('includes/db.php');
  if(isset($_POST["email"]))
  {

      $emailCheck=$db->prepare('SELECT * FROM newsletteremail WHERE email = ?');
      $emailCheck->execute(array($_POST["email"]));
      $count = $emailCheck->rowCount();
      if($count == 1)
      {
         echo '<p id="error_check">Email Exist already</p>';
      }

  }


  /*if(isset($_POST["btnNewsLetter"]))
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
  }*/
?>