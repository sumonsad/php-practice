<?php
session_start();
session_destroy();

header("location:text.php?data_send");
?>
