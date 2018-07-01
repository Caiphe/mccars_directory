<?php 
   include('includes/db.php');

   if(isset($_POST["submit_alert"]))
   {
     $alert_email = htmlspecialchars($_POST["alert_email"]);

     if(empty($_POST["alert_email"])){
        $errormsg = "valid Email Required";
     }else{
       if(filter_var($alert_email, FILTER_VALIDATE_EMAIL) === false)
       {
        $errormsg = "valid Email Required";
       }
       else{
        $CheckExist = $db->prepare('SELECT * FROM alert_email WHERE email_alert = ?');
        $CheckExist->execute(array($alert_email));
        $email_count = $CheckExist->rowCount();

        if($email_count == 0)
        {
          $query_alert = $db->prepare("INSERT INTO alert_email (email_alert) VALUES (?)");
          $query_alert->execute(array($alert_email));
          $success = "Successfully Registered. Thanks";
        }
        if($email_count > 0)
        {
            $errormsg = "Email exists already";
        }        
       }
       
     }
   }

?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/alert.css">
    <style type="text/css">
    #suc_message
    {
        background-color: #235409;
        padding: 5px 10px;
        color:white;
        -webkit-animation-duration:2s; 
        -moz-animation-duration:2s; 
        -o-animation-duration:2s; 
        animation-duration: 2s;
        bottom: 0px;
        left: 0px;
        margin-bottom: 30px;
        margin-left: 10px;
        z-index: 9999;
        position: fixed;
        text-align: center;
        box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
    }
    
</style>
</head>
<body>
    <a class="btn btn-default" id="btnAlert"><i class="icon ion-ios-bell"></i></a>
    <?php 
       if(isset($errormsg))
       {
         ?>
          <p id="myError_msg" class="animated slideInLeft"><i class="icon ion-alert-circled"></i> <?= $errormsg;?></p>
         <?php
       }
    
       else if(isset($success))
       {
         ?>
          <p id="suc_message" class="animated slideInLeft"><i class="ionicon ion-ios-checkmark-outline"></i> <?php echo $success;?></p>
         <?php
       }
    ?>
    <div class="alert_box alert alert-dismissible" id="alert_box" >
        <button type="button" class="close btn_close" data-dismiss="alert">&times;</button>
        <div class="alert_form">
        <h3 class="animated headShake" id="bell_icon" style="color: white;" align="center"><i class="icon ion-ios-bell " ></i> &nbsp; Get Alerts</h3>
        <p>Get instant notification of new vehicles listed on mccars</p>
          <form method="POST" >
            <div class="form-group">
             <input type="email" name="alert_email" id="alert_email" placeholder="Alert Email" class="form-control" required="required">
            </div>
            <div class="form-group">
                <button type="submit" id="submit_alert" name="submit_alert" class="btn btn-default btn_alert_submit">Submit</button>
            </div>

          </form>
         </div>

     </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $("#btnAlert").click(function(){
            $("#alert_box").fadeIn(2000);
            $("#alert_email").focus();
            $("#btnAlert").hide();
        });
        $(".btn_close").click(function(){
            $("#alert_box").fadeOut(500);
            $("#btnAlert").fadeIn(1000);
        });
    });

      setTimeout('msgError()',4000);
      function msgError(){
        $("#myError_msg").hide();
        $("#alert_box").fadeIn(500);
        $("#btnAlert").fadeOut(100);
      }

      setTimeout('msgError()',4000);
      function msgError(){
        $("#suc_message").fadeOut(1000);
      }
</script>
