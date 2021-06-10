<?php include 'header.php';
include 'dbconnect.php';
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

        if(isset($_REQUEST['edit_id'])){
          $recv_id = $_REQUEST['edit_id'];
          $get_info = "SELECT * FROM user_info where id=$recv_id";
          $select_info = mysqli_query($con,$get_info);
          while($rows = mysqli_fetch_assoc($select_info)){

            ?>
            <form action="update.php" method="post">
            <input type="text" name="username" value="<?php echo $rows['username'];?>" placeholder="username"/>
            <input type="email" name="email" value="<?php echo $rows['email'];?>" placeholder="email"/>
            <input type="password" name="password" value="<?php echo $rows['password'];?>" placeholder="password"/>
            <input type="submit" name= "submit" value="update data"/>

            <input type="hidden" name= "hidden_id" value="<?php echo $recv_id;?>"/>
            </form>
            <?php
          }
          }

        ?>
        <!--<form action="index.php" method="post">
        <input type="text" name="username" placeholder="username"/>
        <input type="email" name="email" placeholder="email"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="submit" value="submit"/>
      </form>-->


      </section>
      <section class="footeroption">
        <?php include 'date.php';?>
        <h2>www.trainig with live project</h2>
      </section>
      </div>
      </body>
      </html>
