<?php include 'header.php';
setcookie("visited", "", time() -3600);
?>
      <section class="mainsection">
        <hr>
        upload image
        <span style="float:right">
          <?php
          date_default_timezone_set('Asia/Dhaka');
          echo "Time:".date("h:i:sa");
          ?>
        </span>
        <hr>

<?php
$con=mysqli_connect('localhost','root','','users') or die('database not connected'.mysqli_error());

//start insert data

$name = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$rec_file = $_FILES['upload_image'];

$image_name = $rec_file['name'];
$image_tmp_name = $rec_file['tmp_name'];

if(!empty($image_name)){
$loc = "profile_pic/";

if(move_uploaded_file($image_tmp_name,$loc.$image_name)){
header("location:index.php");
}

}else{
  echo "your file is empty";
}

if($name && $email && $password){

$sql = "INSERT INTO user_info(profile_pic,  username,email,password,gender,country)VALUES('$image_name','$name','$email','$password','$gender','$country')";

if(!mysqli_query($con,$sql)){
  echo "data not inserted";
}else{
echo "data inserted";
}
}else{
  echo "any field can not be blank";
}
//end of insert data.
?>
