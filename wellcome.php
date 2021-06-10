<?php
session_start();
if($_SESSION['username']==true){
  if((time() - $_SESSION['current_timestamp'])>10){
    header("location:logout.php");
  }else{
    echo "wellcome ".$_SESSION['username'];
    echo "<a href='logout.php'>Logout</a>";
  }
}else{
  header("location:text.php");
}
?>
