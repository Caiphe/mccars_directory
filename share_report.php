<?php 


   $first_name = trim(htmlspecialchars($_POST["first_name"]));
   $second_name =trim(htmlspecialchars($_POST["second_name"]));
   $contact_number = trim(htmlspecialchars($_POST["contact_number"]));
   $email_address = trim(htmlspecialchars($_POST["email_address"]));
   $contact_message = trim(htmlspecialchars($_POST["contact_message"]));

   if(!empty($first_name) && !empty($second_name) && !empty($contact_number) && !empty($email_address) && !empty($contact_message))
   {
   	  if(filter_var($email_address, FILTER_VALIDATE_EMAIL) === false){
	     echo = "Valid Email required";
	   }
	   if(!preg_match("/^[0-9]*$/",$contact_number)){
          echo = '<p class="error_message">Only numbers required on your Contact Number</p>';
          unset($contact_number);
       }
   $toEmail = 'mardesign1@gmail.com';
             $subject = 'mccars Post share';
             $body = '<h2>CoNTACT REQUEST</h2>
	         <h4>Name</h4><p>'.$first_name.'</p>
	         <h4>Surname</h4><p>'.$second_name.'</p>
	         <h4>Contact Number</h4><p>'.$contact_number.'</p>
	         <h4>Email</h4><p>'.$email_address.'</p>
	         <h4>Message</h4><p>'.$contact_message.'</p>';
             $headers = "MINE-Version:1.0"."\r\n";
             $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
             $headers .= "From :".$first_name."<".$contact_number.">" ."\r\n";

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