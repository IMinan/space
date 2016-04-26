<?php include '../theme/header.php'; // header.php ?>
<?php if (isset($_POST['file'])) {
  $file = $_POST['file'];
  $code = $_POST['code'];

  code_update($file, $code);
} ?>
