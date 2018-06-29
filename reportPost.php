<?php 
  //var_dump(time());
  $user_name = htmlspecialchars($_POST["user_name"]);
  $contact_report = htmlspecialchars($_POST["contact_report"]);
  $message_report = htmlspecialchars($_POST["message_report"]);

  if(!emapty($user_name) AND !empty($contact_report) AND !empty($message_report))
  {
   $toEmail = 'mardesign1@gmail.com';
   $subject = 'Contact Form mcmcars.com'.$user_name;
   $body = '<h2>CONTACT REQUEST</h2>
   <h4>Name</h4><p>'.$user_name.'</p>
   <h4>Email</h4><p>'.$contact_report.'</p>
   <h4>Message</h4><p>'.$message_report.'</p>';
   $headers = "MINE-Version:1.0"."\r\n";
   $headers .= "Content-Type:text/html;charset=UTF-8"."\r\n";
   $headers .= "From :".$user_name."<".$contact_report.">" ."\r\n";

   if(mail($toEmail, $subject, $body, $headers))
   {
      $succ_message = '
       <p style="color:#0C7627;text-align:centre;">Your email has been sent
       </p>
      ';

   }else
   {
     $succ_message = '<p style="color:#610606 ;text-algn:centre;">Your email was not sent</p>';
   }
  }
   else
  {
  	//$succ_message ="Valid Email Required";
  	$succ_message = '<p style="color:#610606 ;text-algn:centre;">Valid Email Required</p>';
  }
  unset($user_name);
  unset($contact_report);
  unset($message_report);

  

?>