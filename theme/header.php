<?php session_start(); ?>
<?php
  if(file_exists('_inc/functions.php')) { include('_inc/functions.php'); }
  elseif(file_exists('../_inc/functions.php')) { include('../_inc/functions.php'); }
  elseif(file_exists('../../_inc/functions.php')) { include('../../_inc/functions.php'); }
  elseif(file_exists('../../../_inc/functions.php')) { include('../../../_inc/functions.php'); }
  else { include('../../../_inc/functions.php'); }

  is_login();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FireCoder</title>

    <?php include 'head.php'; ?>
  </head>
  <body class="hold-transition skin-green sidebar-mini">
  <div class="wait"></div>
  <div id="code_alert" class="success">
    <div><img src="https://bigfix.me/content/loading.gif" alt=""  style="width: 50px; height: 50px; margin-top: -20px;"/></div>
  </div>
  
    <div id="code_alert" class="success">
      <div><i class="fa fa-check"></i></div>
    </div>
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo get_url(); ?>/index.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>F</b>C</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>FireCoder</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown messages-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope-o"></i><span class="label label-green">9</span></a></li>
              <li class="dropdown notifications-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o"></i><span class="label label-yellow">0</span></a></li>
              <li class="dropdown tasks-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-flag-o"></i><span class="label label-danger">0</span></a>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="http://wedesignthemes.com/html/role/images/post-images/profile-img4.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Minan</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="http://wedesignthemes.com/html/role/images/post-images/profile-img4.jpg" class="img-circle" alt="User Image">
                    <p>
                      Minan - Web Developer
                      <small>Member since Nov. 2016</small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
