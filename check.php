<?php
if(isset($_REQUEST['submit'])){
$con=mysqli_connect('localhost','root','','users') or die('database not connected'.mysqli_error());

  $usrName = $_REQUEST['username'];
  $usrPass = $_REQUEST['password'];

  $query = "SELECT * FROM login_check WHERE username = '$usrName' && password = '$usrPass'";

$result = mysqli_query($con,$query);

$row_count = mysqli_num_rows($result);
if($row_count){
  echo "login success";
}else{
  echo "login failed";
}
}

?>
