<?php
$con=mysqli_connect('localhost','root','','users') or die('database not connected'.mysqli_error());

$recv = $_REQUEST['id'];
$rec_file_name = $_REQUEST['prpfile_pic'];
$query = "DELETE FROM user_info WHERE id = $recv";
$run_delete_query = mysqli_query($con,$query);
if ($run_delete_query) {
  unlink("profile_pic/$rec_file_name");
  header("location: index.php?deleted");
}
?>
