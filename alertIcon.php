<?php 
   include('includes/db.php');

   if(isset($_POST["submit_alert"]))
   {
     $alert_email = htmlspecialchars($_POST["alert_email"]);
     if(empty($alert_email))
     {
        $errormsg = "An email Required";
     }
     else
     {
        if(filter_var($alert_email, FILTER_VALIDATE_EMAIL))
        {
          $CheckExist = $db->prepare('SELECT * FROM alert_email WHERE email_alert = ?');
          $CheckExist->execute(array($alert_email));
          $email_count = $CheckExist->rowCount();

          if($email_count = 0)
          {
            $query_alert = $db->prepare("INSERT INTO alert_email (email_alert) VALUES (?)");
            $query_alert->execute(array($alert_email));
            $success = "Thank You. For registering";
           
          }
          else
          {
            $errormsg = "Email exists already";
          }          
        }
        else
        {
           $errormsg = "Valid Email required";
        }
     }
   }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
    <style type="text/css">
    #btnAlert
    {
        left: 0px;
        bottom:0px;
        margin-left: 20px;
        margin-bottom: 45px;
        z-index: 9999;
        position: fixed;
        height: 50px;width: 50px;border-radius: 50%;
        font-size: 20px;
        text-align: center;
        background-color:#78073a;
        color:white;
        box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
        -webkit-box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
        transition: 0.5s;
    }
    #btnAlert:hover
    {
        background-color: #4e0626;
        color: white;
    }
    .alert_box
    {
        display: none;
        position: fixed;
        z-index: 9999;
        margin-bottom: 10px;
        margin-left: 10px;
        width: 300px;
        height: 220px;
        background-color: #7f0a0a;
        border-radius: 10px;
        left: 0;
        bottom: 0;
    }
    .alert_form
    {
        padding: 10px;
    }
    #after_menu
    {
        width: 100%;
        height: 120px;
        text-align: center;
        color: white;
        background: #68001f; 
        background: -moz-linear-gradient(left, #68001f 0%, #590019 53%, #a00063 100%); 
        background: -webkit-linear-gradient(left, #68001f 0%,#590019 53%,#a00063 100%); 
        background: linear-gradient(to right, #68001f 0%,#590019 53%,#a00063 100%); 
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#68001f', endColorstr='#a00063',GradientType=1 ); 
    }
    .all_new_cars_title
    {
        font-size: 30px;
    }
    .alert_form p
    {
        font-style: italic;
        font-size: 11px;
        color: white;
        font-weight: bold;
        text-align: center;
    }
    .alert_form input
    {
        border-radius:0px;
    }
        .btn_alert_submit
    {
        background-color: #640707;
        border:solid 1px white;
        color: white;
        border-radius: 0px;
        transition: 0.5s;
        width: 100%;
        transition: 1s;
    }
    .btn_alert_submit:hover
    {
       background-color: #350404;
       color: white;
    }
    .btn_close
    {
        color: white;
        font-size: 17px;
        transition: 0.5s;
        z-index: 9999;position: fixed;
    }
    .btn_close:hover
    {
        padding: 3px 5px;background-color:white;color:black;
    }
    #myError_msg
    {
        background-color: #78073a;
        width: 280px;
        padding: 5px;color:white;
        -webkit-animation-duration:2s; 
        bottom: 0px;
        left: 0px;
        margin-bottom: 30px;
        margin-left: 30px;
        z-index: 9999;
        position: fixed;
        text-align: center;
        box-shadow: -2px 1px 3px 0px rgba(0,0,0,0.75);
    }
    #success_msg
    {
        background-color: #235409;
        width: 280px;
        padding: 5px;color:white;
        -webkit-animation-duration:2s; 
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
    ?>
     <?php 
       if(isset($success))
       {
         ?>
          <p id="success_msg" class="animated slideInLeft"><i class="icon ion-alert-circled"></i> <?= $success;?></p>
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
</script>
<script type="text/javascript">
      setTimeout('msgError()',4000);
      function msgError(){
        $("#myError_msg").hide();
        $("#alert_box").fadeIn(500);
        $("#btnAlert").fadeOut(100);
      }
</script>
<script type="text/javascript">
      setTimeout('msgError()',4000);
      function msgError(){
        $("#success_msg").fadeOut(1000);
        //$("#alert_box").fadeIn(500);
        //$("#btnAlert").fadeOut(100);
      }
</script>
