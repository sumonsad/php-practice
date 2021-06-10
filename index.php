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
        <form action="check.php" method="post">
        <center>
          <input type="text" name="username" placeholder="username">
          <input type="password" name="password" placeholder="password"><br><br>
          <input type="submit" name="submit" value="login">
        </center>
        </form>
        
        <form action="" method="post">
        <input type="text" name="search_name" placeholder="search your name"/>
        <input type="submit" name = "search" value="search"/>
      </form><br><br>
<?php

$con=mysqli_connect('localhost','root','','users') or die('database not connected'.mysqli_error());

// if(isset($_REQUEST['search'])){
//   $rec_name =  $_REQUEST['search_name'];

// start insert data
//
// $name = $_POST['username'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// if($name&&$email&&$password){
//
// $sql = "INSERT INTO user_info(username,email,password)VALUES('$name','$email','$password')";
//
// if(!mysqli_query($con,$sql)){
//   echo "data not inserted";
// }else{
// echo "data inserted";
// }
// }else{
//   echo "any field can not be blank";
// }
// end of insert data.

//start show data

// $query = "SELECT * FROM user_info WHERE username LIKE '%$rec_name%'";
$query = "SELECT * FROM user_info";

$adanprodhan = mysqli_query($con, $query);
$count = mysqli_num_rows($adanprodhan);
if($count>0){
  if(isset($_REQUEST['deleted'])){
    echo "<font color='red'>Data deleted</font>";
  }
  if(isset($_REQUEST['delete_m_data'])){
    $chk_data = $_REQUEST['check_data'];
    $all_marked = implode(",",$chk_data);
    $query = "DELETE FROM user_info WHERE id in($all_marked)";
    $run_delete_query = mysqli_query($con,$query);
  }
  ?>

  <form action="insert.php" method="post" enctype="multipart/form-data">
  <input type="text" name="username" placeholder="username"/>
  <input type="email" name="email" placeholder="email"/>
  <input type="password" name="password" placeholder="password"/>
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="female">Female
  <select name="country">
    <option value="">select your country</option>
    <option value="Bangladesh">Bangladesh</option>
    <option value="USA">USA</option>
  </select>
  <input type="file" name="upload_image" value="upload"/>
  <input type="submit" value="submit"/>
</form>
<br><br>
<form  action="" method="post">
  <table style="text-align:center">
    <thead>
      <tr>
        <th>Serial Number</th>
        <th>id</th>
        <th>Profiles</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>action</th>
        <th><input type="submit" name="delete_m_data" value="M_delete"></th>
        <th>gender</th>
        <th>country</th>
      </tr>
    </thead>
<?php
$serial_number = 0;
while($rows = mysqli_fetch_assoc($adanprodhan)){
  // echo "{$row['id']}";
  // echo "<br>";
  //
  // echo "{$row['username']}";
  // echo "<br>";

  $id= $rows['id'];
  $profile_pic = $rows['profile_pic'];
  $username= $rows['username'];
  $email= $rows['email'];
  $password= $rows['password'];
  $gender= $rows['gender'];
  $country= $rows['country'];
  $serial_number++;
  ?>

  <tbody>
    <tr>
      <td><?php echo $serial_number;?></td>
      <td><?php echo $id;?></td>
      <td><img width="50px" height="50px" src="profile_pic/<?php echo $profile_pic;?>"></td>
      <td><?php echo $username;?></td>
      <td><?php echo $email;?></td>
      <td><?php echo $password;?></td>
      <td><a href="edit.php?edit_id=<?php echo $id;?>">EDIT</a>||<a onclick ="return confirm('Are you sure?')"

        href="delete.php?id=<?php echo $id;?>& $profile_pic=<?php echo $profile_pic;?>">DELETE</a></td>
        <td><input type="checkbox" name="check_data[]" value="<?php echo $id;?>"></td>
        <td><?php echo $gender;?></td>
        <td><?php echo $country;?></td>
    </tr>
  </tbody>
  <?php
}
?>
</table>
</form>
<?php
//echo "$count";
}else{
  echo "you have dont any data";
}
//}

//mysqli_select_db("users");
// }
?>
</div>
<?php include 'footer.php';
?>
