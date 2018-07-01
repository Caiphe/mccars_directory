<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');
  
  if(isset($_POST["signupSubmit"]))
  {
     $frstname = htmlspecialchars($_POST["frstname"]);
     $contat_number = htmlspecialchars($_POST["contat_number"]);
     $email_address = htmlspecialchars($_POST["email_address"]);
     $username = htmlspecialchars($_POST["username"]);
     $password = htmlspecialchars($_POST["password"]);
     $confirm_password = htmlspecialchars($_POST["confirm_password"]);
     $password = sha1($password);
     $confirm_password = sha1($confirm_password);

     //UNIQUE USERCODE
     $rand = rand(10000, 100000);
     $username_sha1 = sha1($username);
     //$unic_car_code = ($car_code.$date.$rand);
     $usercode =($username_sha1.$rand.microtime());

     if(!empty($frstname) AND !empty($contat_number) AND !empty($username) AND !empty($password) AND !empty($confirm_password))
     {
      if(!filter_var($email_address,FILTER_VALIDATE_EMAIL))
      {
        $insert_error = "Valid email required";
      }
       else
       {
          $checkUsername = $db->prepare('SELECT * FROM users WHERE username = ?');
          $checkUsername ->execute(array($username));
          $countUsername = $checkUsername->rowCount();

          if($countUsername == 0)
          {
            $checkEmail = $db->prepare('SELECT * FROM users WHERE email = ?');
            $checkEmail->execute(array($email_address));
            $emailCount = $checkEmail->rowCount();

            if($emailCount == 0)
            {
              $insertQuery = $db->prepare('INSERT INTO users(frstname, contact,email, username, pass, user_code) VALUES(?, ?, ?, ?, ?, ?)');
              $insertQuery->execute(array($frstname, $contat_number, $email_address, $username, $password, $usercode ));
              $insert_success ="You are registered ";
              unset($frstname);
              unset($contact_number);
              unset($email_address);
              unset($username);
              unset($password);
          }else
          {
             $insert_error ="Email Exist already";
          }
            
          }
          else{
            $insert_error ="Username exists already";
          }
        }
     }
     else
     {
       $insert_error ="User not inserted";
     }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>sign_up</title>
  <link rel="stylesheet" type="text/css" href="css/signup.css">
  <style type="text/css">
     input{
      width: 100%;
     }
  </style>
</head>
<body>		
	<div class="container-fluid" id="after_menu_gradiant">  
  </div>
	<div class="w3-container  myMainCont">
		<div class="reg_form" >
		  <form method="POST" id="form_submit" >
        <p class="log">SIGN UP</p>
        <p id="success_error"></p>
              <?php if(isset($insert_success))
                {
                   ?>
                   <p class="success_insert"><?= $insert_success ?></p>
                <?php
                }
                ?>
                <?php if(isset($insert_error))
                {
                   ?>
                   <p class="error_insert"><?= $insert_error ?></p>
                   <?php
                }
              ?>
           <div class="form-group">
             <input type="text" name="frstname"  id="frstname" placeholder="Name" maxlength="20" value="<?php echo isset($frstname) ? $frstname:''; ?>">
             <span class="signup_error" id="name_error"></span>
           </div> 
           <div class="form-group">
             <input type="number" name="contat_number"  id="contat_number" placeholder="Contact Number">
             <span class="signup_error" id="contact_error" value="<?php echo isset($contat_number) ?  $contact_number:''; ?>"></span>
           </div>
            <div class="form-group">
             <input type="email" name="email_address"  id="email_address" placeholder="Email Address">
             <span class="signup_error" id="em_error" value="<?php echo isset($email_address) ? $email_address:''; ?>"></span>
           </div>
           <div class="form-group">
             <input type="text" name="username"  id="username" placeholder="Username" maxlength="20">
             <span class="signup_error" id="username_error" value="<?php echo isset($username) ? $username:''; ?>"></span>
           </div>
           <div class="form-group">
             <input type="password" name="password"  id="password" placeholder="Password" maxlength="20">
             <span class="signup_error" id="password_error" value="<?php echo isset($password) ? $password:''; ?>"></span>
           </div>
           <div class="form-group">
             <input type="password" name="confirm_password"  id="confirm_password" placeholder="Confirm Password">
             <span class="signup_error" id="confrim_error" maxlength="20"></span>
           </div>
        
             <div class="row">
             	<div class="col-md-6">
             		<button type="submit" name="signupSubmit" id="signupSubmit" class="btn btn-default btn-block"><i class="icon ion-ios-plus"></i> REGISTER</button>
             	</div>
             	<div class="col-md-6">
             		<a type="submit" href="signin.php" name="loginBtn" id="loginBtn" class="btn btn-default btn-block"><i class="icon ion-ios-contact-outline"></i> LOGIN</a>
             	</div>
             </div>
	     </form>
		</div>
		<br>
 </div>

</body>
<?php include('alertIcon.php') ?>
<?php include('includes/footer.php') ?>
</html>
<script type="text/javascript">
   $(document).ready(function(){
      $("#name_error").hide();
      $("#contact_error").hide();
      $("#em_error").hide();
      $("#username_error").hide();
      $("#password_error").hide();
      $("#confrim_error").hide();

      var error_name = false;
      var error_contact = false;
      var error_email = false;
      var error_username = false;
      var error_pass = false;
      var error_confirm = false;

      $("#frstname").focusout(function(){
      check_name();
      });

      $("#contat_number").focusout(function(){
      check_contact();
      });

      $("#email_address").focusout(function(){
      check_email();
      });

      $("#username").focusout(function(){
      check_username();
      });

      $("#password").focusout(function(){
      check_password();
      });

      $("#confirm_password").focusout(function(){
      check_confirm();
      });
     
     function check_name()
     {
       var frstname = $("#frstname").val().length;
       if(frstname < 5 || frstname > 20)
       {
          $("#name_error").fadeIn(1000);
          $("#name_error").css('color','#7f0707');
          $("#frstname").css('border','solid 1px #7f0707');
          $("#name_error").html("5 to 20 Characteres Required");
          error_name = true;
       }else{
           $("#name_error").fadeOut(500);
           $("#frstname").css('border','solid 1px #105f0e');
          
       }
     }

     function check_contact()
     {
       var contat_number = $("#contat_number").val();
       if(contat_number === '')
       {
          $("#contact_error").fadeIn(1000);
          $("#contact_error").css('color','#7f0707');
          $("#contat_number").css('border','solid 1px #7f0707');
          $("#contact_error").html("Contact Number Required");
          error_contact = true;
       }else{
         $("#contact_error").fadeOut(500);
         $("#contat_number").css('border','solid 1px #105f0e');
         
       }
     }

      function check_email()
     {
       var email_address = $("#email_address").val();
       var pattern =/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
       if(pattern.test(email_address) && email_address !== '')
       {
         $("#em_error").fadeOut(500);
         $("#em_error").css('border','solid 1px green');
       }else{
          $("#em_error").fadeIn(1000);
          $("#em_error").css('color','#7f0707',);
          $("#email_address").css('border','solid 1px #7f0707');
          $("#em_error").html("Valid Email required");
          error_contact = true;
         
       }
     }

     function check_username()
     {
       var username = $("#username").val().length;
       if(username < 5 || username > 20)
       {
          $("#username_error").fadeIn(1000);
          $("#username_error").css('color','#7f0707','font-size','25px');
          $("#username").css('border','solid 1px #7f0707');
          $("#username_error").html("5 to 20 Characteres required");
          error_username = true;
       }else
       {
         $("#username_error").fadeOut(500);
         $("#username").css('border','solid 1px #105f0e');
       }
     }

     function check_password()
     {
       var password = $("#password").val().length;
       if(password < 5 || password > 20)
       {
          $("#password_error").fadeIn(1000);
          $("#password_error").css('color','#7f0707','font-size','25px');
          $("#password").css('border','solid 1px #7f0707');
          $("#password_error").html("5 to 20 Characteres Required");
          error_pass = true;
       }else{
         $("#password_error").fadeOut(500);
         $("#password").css('border','solid 1px #105f0e');
         
       }
     }
     function check_confirm()
     {
       var confirm_password = $("#confirm_password").val();
       var password = $("#password").val();

       if(confirm_password === '')
       {
          $("#confrim_error").fadeIn(1000);
          $("#confrim_error").css('color','#7f0707','font-size','25px');
          $("#confirm_password").css('border','solid 1px #7f0707');
          $("#confrim_error").html("Confirm Your password");
          error_pass = true;
       }else
       {
         if(confirm_password != password)
         {
          $("#confrim_error").fadeIn(1000);
          $("#confrim_error").css('color','#7f0707','font-size','25px');
          $("#confirm_password").css('border','solid 1px #7f0707');
          $("#confrim_error").html("Passwords don't match");
          $("#signupSubmit").disabled() == true;
         }
         else
         {
           $("#confrim_error").fadeOut(500);
           $("#confirm_password").css('border','solid 1px #105f0e');
        }
       }
      }
     $("#form_submit").submit(function(){
        error_name = false;
        error_contact = false;
        error_email = false;
        error_username = false;
        error_pass = false;
        error_confirm = false;

        check_name();
        check_contact();
        check_username();
        check_email();
        check_password();
        check_confirm();

        if(error_name == false && error_contact == false && error_email == false  && error_username == false && error_pass== false && error_confirm == false )
        {
          return true;
        }else{
          return false;
        }
     });
      
      /*$("#form_submit").on('submit',function(event){
          event.preventDefault();
           
             if($("#frstname") != '' && $("#contat_number")!= '' && $("#username")!= '' && $("#password") != '' && $("#confirm_password") != '')
             {
              var form_submit = $("#form_submit").val();
                $.ajax({
                 method:"POST",
                 url:".php",
                 data : form_submit,
                 success:function(html){
                     $("#success_error").html(html);
                  }
               });
             }
        });*/
   });
</script>
<script type="text/javascript">
      setTimeout('success_Msg()',4000);
      function success_Msg(){
        $(".success_insert").fadeOut(100);
      }

      setTimeout('msgError()',4000);
      function msgError(){
        $(".error_insert").fadeOut(2000);
      }
</script>

