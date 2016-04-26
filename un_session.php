<?php
  session_start();
  session_destroy();
  $url = 'http://'.$_SERVER['SERVER_NAME'].'/workspace';
  header("Location: ". $url ."/panel/lockscreen.php");
?>
