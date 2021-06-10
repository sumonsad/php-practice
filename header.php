<?php
$fonts = "verdana";
$bgcolor = "#444";
$errname = $erremail = $errwebsite = $errgender = "";
$name = $email = $website = $comment = $gender ="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if(empty($_POST["name"])){
    $errname = "<span style='color:red'>Name is required.</span>";
  }else{
    $name     = validate($_POST["name"]);
  }
  if(empty($_POST["email"])){
    $erremail = "<span style='color:red'>Email is required.</span>";
  }elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
    $erremail = "<span style='color:red'>Invalid Email Format.</span>";
  }else{
    $email     = validate($_POST["email"]);
  }
  if(empty($_POST["website"])){
    $errwebsite = "<span style='color:red'>Website is required.</span>";
  }elseif(!filter_var($_POST["website"],FILTER_VALIDATE_URL)){
    $errwebsite = "<span style='color:red'>Invalid website Format.</span>";
  }else{
    $website     = validate($_POST["website"]);
  }
  if(empty($_POST["gender"])){
    $errgender = "<span style='color:red'>Gender is required.</span>";
  }else{
    $gender     = validate($_POST["gender"]);
  }
}
function validate($data){
  $data=trim($data);
  $data=stripcslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>php Fundamental</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
