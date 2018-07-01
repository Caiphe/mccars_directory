<?php
  session_start();
  include('includes/db.php');
  include('includes/header.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<style type="text/css">
		 .error_entry
		 {
		 	color: #a60101;
		 }
	</style>
</head>
<body>		
	<div class="container-fluid" id="after_menu_gradiant">	
	</div>
	
	<div class="w3-container myMainCont">
		<br>
		<div class="container myContactDetail">
		<div class="container">
			<p class="cont_Main"><b>&nbsp;&nbsp;CONTACT US</b></p>

			
			<div class="col-md-4 " align="center">
				<div class="contact_div">
				<p><i class="icon ion-ios-location-outline"></i></p>
				<p class="details">27 Grundel Glenmore Durban 4001</p>
				</div>
			</div>
			<div class="col-md-4 " align="center">
			    <div class="contact_div">
				<p><i class="icon ion-ios-telephone-outline" ></i></p>
				<p class="details">+27 (0) 74 902 6530</p>
		        </div>
			</div>
			<div class="col-md-4 " align="center">
			    <div class="contact_div">
				<p><i class="icon ion-ios-email-outline" ></i></p>
				<p class="details">info@mccars.com</p>
		        </div>
			</div>
		</div>
		<br><br>
	</div>
    
		<div class="container">
		 <div class="row">
		  <br>

		    <div class="col-md-6">
		    	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3459.4273777598632!2d30.969044614870956!3d-29.880783781942146!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1ef7aa3bd4423245%3A0x16cb08ed5625c6c0!2s27+Grundel+Rd%2C+Carrington+Heights%2C+Berea%2C+4001!5e0!3m2!1sen!2sza!4v1525550328939" width="100%" height="350" frameborder="0" style="border:1px solid #000;box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2), 0 1px 2px 0 rgba(0, 0, 0, 0.14);" allowfullscreen></iframe>
		 	</div>
		 	<div class="col-md-6">
		 		
		 		<form method="POST" name="myContactForm" id="myContactForm">
		 		<p class="cont_Main"><b>GET IN TOUCH</b></p>
		 			
		 				<div class="row">
		 					<div class="col-md-6 col-sm-6">
		 						<input type="text" name="frst_name" id="frst_name" placeholder="First Name" class="form-control" value=""> 
		 						<span class="error_entry" id="error_frstName"></span>
		 					</div>
		 					<div class="col-md-6 col-sm-6">
		 						<input type="text" name="scnd_name" id="scnd_name"  placeholder="Second Name" class="form-control" value="">
		 						<span class="error_entry" id="error_sndName"></span>
		 					</div>
		 				</div>
		 		
		 				<div class="row">
		 					<div class="col-md-6 col-sm-6">
		 						<input type="email" name="cont_email" id="cont_email"  placeholder="Email address" class="form-control" value=""> 
		 						<span class="error_entry" id="error_email"></span>
		 					</div>
		 					<div class="col-md-6 col-sm-6">
		 						<input type="number" name="cont_number" id="cont_number"  placeholder="Contact Number " class="form-control" value="">
		 						<span class="error_entry" id="error_contact"></span>
		 					</div>
		 				</div>
		 			
		 				<textarea name="message" id="message" cols="4" rows="4" class="form-control" placeholder="Type your message Here..." value=""></textarea>
		 				<span class="error_entry" id="error_message"></span>
		 		
		 			
		 				<button type="submit" name="btn_submit" id="btn_submit" class="btn btn-default btn-block btn_contact"><i class="ion-android-mail"></i>   SUBMIT					
		 				</button>
		 		
		 		</form>
		 	</div>
		 	
		 </div>
	</div>
	<br><br>
 </div>
 <?php include('alertIcon.php') ?>
</body>
<?php include('includes/footer.php') ?>
</html>
<script type="text/javascript">
  setTimeout('msgError()',4000);
  function msgError(){
    $("#msg_error").hide(1000);
  }
</script>
<script type="text/javascript">
	$(document).ready(function(){
	   //$("#frst_name").focus();
       $("#error_frstName").hide();
       $("#error_sndName").hide();
       $("#error_email").hide();
       $("#error_contact").hide();
       $("#error_message").hide();

       var er_name = false;
       var er_scng = false;
       var er_email = false;
       var er_cont = false;
       var er_message = false;

       $("#frst_name").focusout(function(){
       	  check_firstname();
       });

       $("#scnd_name").focusout(function(){
       	 check_secondname();
       });

        $("#cont_email").focusout(function(){
       	 check_email();
       });

       $("#cont_number").focusout(function(){
       	 check_contact();
       });
       
       $("#message").focusout(function(){
       	 check_message();
       });


       function check_firstname()
       {
       	 var frst_name = $("#frst_name").val();
       	 if(frst_name === '')
       	 {
       	 	$("#frst_name").css('border','solid 1px #a60101');
       	 	$("#error_frstName").fadeIn(1000);
       	 	$("#error_frstName").html('<i class="ionicon ion-alert"></i> First Name Required');
       	 	 var er_name = true;
       	 }else{
       	 	$("#frst_name").css('border','solid 1px #096a10');
       	 	$("#error_frstName").fadeOut(1000);
       	 }
       }

       function check_secondname()
       {
       	 var scnd_name = $("#scnd_name").val();
       	 if(scnd_name === '')
       	 {
       	 	$("#scnd_name").css('border','solid 1px #a60101');
       	 	$("#error_sndName").fadeIn(1000);
       	 	$("#error_sndName").html('<i class="ionicon ion-alert"></i> Second Name Required');
       	 	er_scng = true;
       	 }else{
       	 	$("#scnd_name").css('border','solid 1px #096a10');
       	 	$("#error_sndName").fadeOut(1000);
       	 }
       }

       function check_email()
       {
       	 var cont_email = $("#cont_email").val();
       	 if(cont_email === '')
       	 {
       	 	$("#cont_email").css('border','solid 1px #a60101');
       	 	$("#error_email").fadeIn(1000);
       	 	$("#error_email").html('<i class="ionicon ion-alert"></i> Email Required');
       	 	er_email = true;
       	 }else{
       	 	$("#cont_email").css('border','solid 1px #096a10');
       	 	$("#error_email").fadeOut(1000);
       	 }
       }

       function check_contact()
       {
       	 var cont_number = $("#cont_number").val();
       	 if(cont_number === '')
       	 {
       	 	$("#cont_number").css('border','solid 1px #a60101');
       	 	$("#error_contact").fadeIn(1000);
       	 	$("#error_contact").html('<i class="ionicon ion-alert"></i> Contact Number Required');
       	 	er_cont = true;
       	 }else{
       	 	$("#cont_number").css('border','solid 1px #096a10');
       	 	$("#error_contact").fadeOut(1000);
       	 }
       }

       function check_message()
       {
       	 var message = $("#message").val();
       	 if(message === '')
       	 {
       	 	$("#message").css('border','solid 1px #a60101');
       	 	$("#error_message").fadeIn(1000);
       	 	$("#error_message").html('<i class="ionicon ion-alert"></i> Say something to us');
       	 	er_message = true;
       	 }else{
       	 	$("#cont_number").css('border','solid 1px #096a10');
       	 	$("#error_message").fadeOut(1000);
       	 }
       }

       $("#myContactForm").submit(function(){
        er_name = false;
        er_scng = false;
        er_email = false;
        er_cont = false;
        er_message = false;

        check_firstname();
        check_secondname();
        check_email();
        check_contact();
        check_message();

        if(er_name == false && er_scng == false && er_email == false  && er_cont == false && er_message== false)
        {
          return true;
        }else
        {
          return false;
        }
     });
	});
</script>
<script type="text/javascript">
	/*$(document).ready(function(){
		 $("#myContactForm").on('submit',function(event){
       	event.preventDefault();
       	  if($("#frst_name") !== "" && $("#scnd_name")!== '' && $("#cont_number")!== '' && $("#cont_email")!=='' && $('#message'))
       	  {
       	  	 var contact_form = $("#frst_name");
       	  	$.ajax({
               method:'POST',
               url:'contact_engine.php',
               data:contact_form,
               success function(data){
               	 $("#msg_error").html(data);
               }
       	  	});
       	  }
       });
</script>