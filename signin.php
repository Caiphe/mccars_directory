<?php
  session_start();
  include('includes/db.php');
  
  if(isset($_POST["submit_singin"]))
  {
     $username = htmlspecialchars($_POST["username"]);
     $password = htmlspecialchars($_POST["password"]);
     $password = sha1($password);

     if(empty($_POST["username"]) OR empty($_POST["password"]))
     {
       $errorMsg ="username & password required";
     }
     if(!empty($_POST["username"]) AND !empty($_POST["password"]))
     {
       $sqlLogin = $db->prepare('SELECT * FROM users WHERE username  =? AND password =?');
       $sqlLogin->execute(array($username, $password));
       $logCount=$sqlLogin->rowCount();

       if($logCount > 0)
       {
         while($row = $sqlLogin->fetch())
         {
             //header('location:index.php');
           $errorMsg ="You exists man";
           $_SESSION["name"] = $row["frstname"];
           $_SESSION["contact"] = $row["contact"];
           $_SESSION["email"] = $row["email"];
           $_SESSION["username"] = $row["username"];
           $_SESSION["date_time"] = $row["date_time"];
           header('location:usedCars.php');
             
         }
       }else
       {
          $errorMsg ="Yes you are false";
       }

     }
  }
 

  include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
</head>
<body class="myMainCont">
<div class="container-fluid" id="after_menu_gradiant">  
  </div>		
	<div class="w3-container  " >
		<div class="container-fluid" id="myMain">
      <div class="w3-container">
        <br><br><br>
      </div>
	 	<div class="box" id="box"> 	 	 	
	 	 	 	 <p class="log">LOGIN</p>
	 	 	 	<br><br>
	 	 	 	<form method="POST" id="myForm" name="myForm" onmouseleave="return validation()">

          <div id="sign_error"></div>
          <?php 
             if(isset($errorMsg))
             {
               ?>
               <p><?php echo $errorMsg ?></p>
               <?php
             }
          ?>

	 	 	 		<div class="form-group">
	 	 	 			<input type="text" name="username" id="username"   required="" onload="ChangeColor()">
	 	 	 			<label id="myLabel"><i class="icon ion-ios-contact" style="font-size: 14px;"></i> Username</label>
	 	 	 		</div>
	 	 	 		<div class="form-group">
	 	 	 			<input type="password" name="password" id="password"  required="">
	 	 	 			<label id="myLabel"><i class="icon ion-key"></i> Password</label>
	 	 	 		</div>
	 	 	 		<div class="form-group">
	 	 	 			<div class="row">
	 	 	 				<div class="col-md-6">
	 	 	 					<button class="btn btn-default btn-block" name="submit_singin" id="submit_singin" type="submit"><i class="icon ion-ios-unlocked-outline"></i> SIGN IN</button>
	 	 	 				</div>
	 	 	 				<div class="col-md-6">
	 	 	 					<a class="btn btn-default btn-block" href="signup.php" name="submit_register" id="submit_register" type="submit"><i class="icon ion-ios-contact-outline"></i> REGISTER</a>
	 	 	 				</div>
	 	 	 			</div>
            <div id="error"></div>
	 	 	 		</div>
	 	 	 	</form>
	 	 	 	<p id="fortgot"><a href="#void" class="forgot_pass">Forgot Password</a></p>
        <br>
	 	 	 </div>
 </div>
 </div>
</body>
<?php include('includes/footer.php') ?>

</html>
<script type="text/javascript">
    var usernameField = document.forms["myForm"]["username"]; 
    var passwordField = document.forms["myForm"]["password"];

    function validation()
    {
       if(usernameField.value != "")
       {
         usernameField.style.border = "2px solid #29577a";
         return true;
       }
       else if(usernameField.value == "")
       {
         usernameField.style.border ="1px solid #615E5E";
       }
       if(passwordField.value != "")
       {
         passwordField.style.border = "2px solid #29577a";
         return true;
       }
       else if(passwordField.value == "")
       {
         passwordField.style.border ="1px solid #615E5E";
       }
    }
</script>

