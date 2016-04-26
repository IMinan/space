<?php session_start(); ?>
<?php
  if(file_exists('_inc/functions.php')) { include('_inc/functions.php'); }
  elseif(file_exists('../_inc/functions.php')) { include('../_inc/functions.php'); }
  elseif(file_exists('../../_inc/functions.php')) { include('../../_inc/functions.php'); }
  elseif(file_exists('../../../_inc/functions.php')) { include('../../../_inc/functions.php'); }
  else { include('../../../_inc/functions.php'); }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Lockscreen</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?php echo get_url(); ?>/panel/theme/dist/css/AdminLTE.min.css">
    <!-- Bootstrap.css -->
    <link rel="stylesheet" href="<?php echo get_url(); ?>/panel/theme/css/bootstrap.css">
    <!-- font-awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo get_url(); ?>/panel/theme/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- focus -->
    <script type="text/javascript"> $(document).ready(function(){ $('.form-control').focus();} ); </script>
  </head>
  <body class=" lockscreen" style="background-size: cover; color: #fff; background-image: url('theme/image/<?php echo rand(1,9); ?>.jpg')">
    <!-- Automatic element centering -->
    <div class="lockscreen-wrapper">
      <!-- User name -->
      <div class="lockscreen-name" style="font-size: 20px;margin-top: 300px;"><b>Minan</b></div>
      <!-- START LOCK SCREEN ITEM -->
      <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
          <img src="http://promo.tr.leagueoflegends.com/assets/harrowing-2014/img/icon-large.jpg" alt="User Image">
        </div>
        <!-- /.lockscreen-image -->
        <?php
          if($_POST)
          {
            $lockscreen = $_POST['lockscreen'];
            $password = '190125';
            if($lockscreen == $password)
            {
              $_SESSION['login'] = true;
              header("Location: ". get_url() ."/panel");
            }else{
              header("Location: ". get_url() ."/panel/lockscreen.php");
            }
          }
         ?>
        <!-- lockscreen credentials (contains the form) -->
        <form class="lockscreen-credentials" method="post" action="">
          <div class="input-group">
            <input type="password" name="lockscreen" class="form-control" placeholder="password">
            <div class="input-group-btn">
              <button class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
            </div>
          </div>
        </form><!-- /.lockscreen credentials -->
    </div><!-- /.center -->
  </body>
</html>
