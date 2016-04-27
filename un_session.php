<?php
  session_start();
  session_destroy();
  $url = 'http://'.$_SERVER['SERVER_NAME'].'/space';
  header("Location: ". $url ."/lockscreen.php");
?>
