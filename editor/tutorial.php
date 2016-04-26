<?php include 'theme/header.php'; //default admin header ?>
  <?php include 'theme/sidebar.php'; // header.php ?>

  <div class="content-wrapper">
    <?php
      $homepage = file_get_contents('http://w3schools.com/html/html_styles.asp');
      echo $homepage;
    ?>
  </div>
<?php include 'theme/footer.php'; // header.php ?>
