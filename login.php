<?php include 'header.php';
setcookie("visited", "", time() -3600);
?>
<?php
$error = "";
if(isset($_REQUEST['submit'])){
  $usrName = $_REQUEST['username'];
  $usrPass = $_REQUEST['password'];
  include 'dbconnect.php';
  $query ="SELECT * FROM login_check WHERE username='$usrName' and password = '$usrPass'";
  $result = mysqli_query($con,$query);
  $count = mysqli_num_rows($result);
  if($count > 0){
    $row = mysqli_fetch_assoc($result);
    print_r($row);
  }else{
    $error = "Enter your correct login details";
  }
}
?>
<div id="layoutAuthentication">
<div id="layoutAuthentication_content">
  <main>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
              <h3 class="text-center font-weight-light my-4">Login</h3>
            </div>
            <div class="card-body">
              <form action="" method="post">
                <div class="form-group">
                  <label class="small mb-1" for="inputEmailAddress">Username</label>
                  <input type="username" name="username" class="form-control py-4" id="inputEmailAddress" placeholder="Enter Username">
                </div>
                <div class="form-group">
                  <label class="small mb-1" for="inputPassword">Password</label>
                  <input type="password" name="password" class="form-control py-4" id="inputPassword" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="rememberPasswordCheck" placeholder="Enter Password">
                  <label class="custom-control-label" for="rememberPasswordCheck">Remember Password</label>
                  </div>
                </div>
                <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                  <a class="small" href="password.html">Forgot Password?</a>
                  <input class = "btn btn-primary" type="submit" name="submit" value="Login">
                </div>
                <center><?php echo $error;?></center>
                </form>
              </div>
              <div class="card-footer text-center">
                <div class="small">
                  <a href="register.php">Need an account? Sign up</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
</div>



<?php include 'footer.php';
?>
