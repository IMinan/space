<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="http://wedesignthemes.com/html/role/images/post-images/profile-img4.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Minan</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="<?php echo get_url(); ?>/panel/editor/editor.php" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="file" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
            <button style='margin-top: 0;' type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
          </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active">
          <a href="<?php echo get_url(); ?>/panel">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Tutorial</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> JavaScript</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> PHP</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> CSS</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> HTLML</a></li>
          </ul>
        </li>

        <li>
          <a href="<?php echo get_url(); ?>/editor/file_list.php">
            <i class="fa fa-code"></i> <span>Htdocs</span>
          </a>
        </li>

        <li>
          <a href="<?php echo get_url(); ?>/un_session.php">
            <i class="fa fa-adjust"></i> <span>sleep</span>
          </a>
        </li>

        <li>
          <a href="<?php echo get_url(); ?>/calendar.php">
            <i class="fa fa-calendar"></i> <span>calendar</span>
          </a>
        </li>

        <li>
          <a href="<?php echo get_url(); ?>/note.php">
            <i class="fa fa-edit"></i> <span>Note</span>
          </a>
        </li>

        <li>
          <a href="<?php echo get_url(); ?>/message.php">
            <i class="fa fa-comments"></i> <span>Message</span>
            <small class="label pull-right bg-green">0</small>
          </a>
        </li>

        <li>
          <a href="<?php echo get_url(); ?>/mail.php">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">0</small>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
