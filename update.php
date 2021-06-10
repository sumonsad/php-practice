<?php include 'header.php';
setcookie("visited", "", time() -3600);
?>
      <section class="mainsection">
        <hr>
        php file handling
        <span style="float:right">
          <?php
          date_default_timezone_set('Asia/Dhaka');
          echo "Time:".date("h:i:sa");
          ?>
        </span>
        <hr>

<?php
$con=mysqli_connect('localhost','root','','users') or die('database not connected'.mysqli_error());

if(isset($_REQUEST['submit'])){
  $user = $_REQUEST['username'];
  $email = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  $hidden_id = $_REQUEST['hidden_id'];

  $update_query = "UPDATE user_info SET username='$user', email='$email',password='$password' where id =  $hidden_id";

  $final_update_query = mysqli_query($con,$update_query);
  if($final_update_query){
    header("location:index.php?updated");
  }
}

?>
