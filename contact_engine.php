<style type="text/css">
	.error_message
	{
		padding: 10px;text-align: center;color:white;
		background-color: #a60101;
	}
</style>
<?php 
   // Check form submit
  if(filter_has_var(INPUT_POST,'btn_submit'))
  {
  	$frst_name = htmlspecialchars($_POST["frst_name"]);
  	$scnd_name = htmlspecialchars($_POST["scnd_name"]);
  	$cont_email = htmlspecialchars($_POST["cont_email"]);
  	$cont_number = htmlspecialchars($_POST["cont_number"]);
  	$message = htmlspecialchars($_POST["message"]);
    
    if(!empty($frst_name) && !empty($scnd_name) && !empty($cont_email) && !empty($cont_number) && !empty($message))
    {    // VALIDATE EMAIL
    	 if(filter_var($cont_email, FILTER_VALIDATE_EMAIL) === false)
    	 {
            echo = "Valid Email required";
    	 }
    	 if(!preg_match("/^[a-zA-Z]*$/",$frst_name))
    	 {
            echo ='<p class="error_message">Only letters accepted on your Name</p>';
            unset($frst_name);
    	 }
    	 if(!preg_match("/^[a-zA-Z]*$/",$scnd_name))
    	 {
    	 	echo = '<p class="error_message">Only letters requiredfor your surname</p>';
    	 	unset($scnd_name);
    	 }
    	 if(!preg_match("/^[0-9]*$/",$cont_number))
    	 {
            echo = '<p class="error_message">Only numbers required on your Contact Number</p>';
            unset($cont_number);
    	 }
    	 if($msg ='')
    	 {
             $toEmail = 'mardesign1@gmail.com';
             $subject = 'Contact Form mcmcars.com'.$frst_name;
             $body = '<h2>CoNTACT REQUEST</h2>
	              <h4>Name</h4><p>'.$frst_name.'</p>
	              <h4>Email</h4><p>'.$cont_email.'</p>
	              <h4>Message</h4><p>'.$message.'</p>
             ';
             $headers = "MINE-Version:1.0"."\r\n";
             $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
             $headers .= "From :".$frst_name."<".$cont_email.">" ."\r\n";

             if(mail($toEmail, $subject, $body, $headers)){
             	echo = '<p class="sucess_message">Your email has been sent</p>';
             }else
             {
             	echo = '<p class="error_message">Your email was not sent</p>';
             }

    	 }

    }else
    {
       echo = '<p class="error_message">All fields are required</>';
    }
?>