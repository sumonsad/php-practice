<?php
$to_mail = "biswazit.chem@gmail.com";
$subject = "simple email test via php";
$body = "hi biswazit how are you?";
$headers = "From: sumonraiyan22518@gmail.com";

if(mail($to_mail, $subject, $body, $headers)){
  echo "Email successfully send to $to_mail....";
}else{
  echo "Email sending failed";
}
?>
