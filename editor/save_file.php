<?php include '../theme/header.php'; // header.php ?>
<?php
  if($_POST)
  {
    $code = $_POST['code'];
    $way = $_POST['file_way'];
    code_update($way, $code);
  }else{}
?>
