<?php
 session_start();
 if(isset($_POST["btn_submit"]))
 {
 	$username = htmlspecialchars($_POST["username"]);
 	$password = htmlspecialchars($_POST["password"]);
  $password = sha1($password);
    $myUsername = "admin";
    $myPass = "2438f48b835e7c7ec3defb0a4b114ce50228bcd9";
 	if(!empty($username) && !empty($_POST["password"]))
 	{
       if($username == $myUsername && $password == $myPass)
       {
       	 $_SESSION["username"] = 'Vicky MD';
       	 header('location:index.php');
       }
       else
       {
          $errorMessage ="Wrong username or Password";
       }
 	}
 	else
 	{
        $errorMessage = "Username & Password Required";
 	}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keyword" content="">
  <title>Admin_LOGIN</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>

<body class="login_big">
  <div class="container">
    <form class="login-form" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <p class="adminLog animated zoom" style="text-align: center;font-size: 30px;color: black;">ADMIN LOGIN</p>
        <?php
           if(isset($errorMessage))
           {
           	 ?>
           	   <p style="text-align:center;color:#fff;background-color: #930e0e;padding: 5px;" id="ErrorMessage"><?php echo $errorMessage; ?></p>
           	 <?php
           }
        ?>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" name="username" id="username" class="form-control" placeholder="Username" autofocus>
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" name="password" is="password" class="form-control" placeholder="Password">
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btn_submit" id="btn_submit">Login</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">          
        </div>
    </div>
  </div>
</body>
</html>
<script type="text/javascript">
  setTimeout('errormessage()',3000);
  function errormessage(){
    $("#ErrorMessage").hide("slow");
  }
</script>
