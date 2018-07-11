<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?php echo base_url('assets/dahsboard/'); ?>img/logo-alt.png"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
 
    <link type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>css/app.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>css/custom.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>vendors/datatables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>vendors/datatables/css/buttons.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/dahsboard/'); ?>css/responsive.dataTables.css">
    <script src="<?php echo base_url('assets/dahsboard/'); ?>js/app.js" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/dahsboard/") ?>/js/jquery.dataTables.min.js"></script> 
    <!-- end of global css -->
</head>

<body>
<!-- header logo: style can be found in header-->
<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="<?php echo site_url('admin'); ?>" class="logo">
            <!-- Add the class icon to your logo image or logo icon to add the margining -->
            <img src="<?php echo base_url('assets/beranda/'); ?>img/logo-alt.png" alt="logo"/>
        </a>
        <!-- Header Navbar: style can be found in header-->
        <!-- Sidebar toggle button-->
        <!-- Sidebar toggle button-->
        <div>
            <a href="javascript:void(0)" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button"> <i
                    class="fa fa-fw fa-bars"></i>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"> <i
                            class="fa  fa-fw fa-bell-o black"></i>
                        <span class="label label-danger">3</span>
                    </a>
                    <ul class="dropdown-menu dropdown-notifications table-striped">
                        <li>
                            <a href="" class="notification striped-col">
                                <img class="notif-image img-circle" src="<?php echo base_url('assets/dahsboard/'); ?>img/authors/avatar7.jpg" alt="avatar-image">
                                <div class="notif-body"><strong>Anderson</strong> shared post from
                                    <strong>Ipsum</strong>.
                                    <br>
                                    <small>Just Now</small>
                                </div>
                                <span class="label label-success label-mini msg-lable">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="notification">
                                <img class="notif-image img-circle" src="<?php echo base_url('assets/dahsboard/'); ?>img/authors/avatar6.jpg" alt="avatar-image">
                                <div class="notif-body"><strong>Williams</strong> liked <strong>Lorem Ipsum</strong>
                                    typesetting.
                                    <br>
                                    <small>5 minutes ago</small>
                                </div>
                                <span class="label label-success label-mini msg-lable">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="notification striped-col">
                                <img class="notif-image img-circle" src="<?php echo base_url('assets/dahsboard/'); ?>img/authors/avatar5.jpg" alt="avatar-image">
                                <div class="notif-body">
                                    <strong>Robinson</strong> started follwing <strong>Trac Theme</strong>.
                                    <br>
                                    <small>14/10/2014 1:31 pm</small>
                                </div>
                                <span class="label label-success label-mini msg-lable">New</span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="notification">
                                <img class="notif-image img-circle" src="<?php echo base_url('assets/dahsboard/'); ?>img/authors/avatar1.jpg" alt="avatar-image">
                                <div class="notif-body">
                                    <strong>Franklin</strong> Liked <strong>Trending Designs</strong> Post.
                                    <br>
                                    <small>5 days ago</small>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer"><a href="javascript:void(0)">View All messages</a></li>
                    </ul>
                </li>
                <!-- User Account: style can be found in dropdown-->
                <li class="dropdown user user-menu">
                    <a href="javascript:void(0)" class="dropdown-toggle padding-user" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/dahsboard/'); ?>img/authors/user.jpg" class="img-circle img-responsive pull-left" alt="User Image">
                        <div class="riot">
                            <div>
                                <i class="caret"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User name-->
                        <li class="user-name text-center">
                            <span>Jayson Wiley</span>
                        </li>
                        <!-- Menu Body -->
                        <li class="p-t-3">
                            <a href="user_profile.html">
                                Profile<i class="fa fa-fw fa-user pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="edit_user.html">
                                Settings <i class="fa fa-fw fa-cog pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="lockscreen.html">
                                Lock <i class="fa fa-fw fa-lock pull-right"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('login/logout_admin'); ?>">
                                Logout <i class="fa fa-fw fa-sign-out pull-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-aside">
        <!-- sidebar: style can be found in sidebar-->
        <section class="sidebar">
            <div id="menu" role="navigation">
                <div class="nav_profile">
                    <div class="media profile-left">
                        <a class="pull-left profile-thumb" href="javascript:void(0)">
                            <img src="<?php echo base_url('assets/dahsboard/'); ?>img/authors/user.jpg" class="img-circle" alt="User Image">
                        </a>
                        <div class="content-profile">
                            <h4 class="media-heading">
                                Jayson Wiley
                            </h4>
                            <p>Admin</p>
                        </div>
                    </div>
                </div>
                <ul class="navigation">
                    <li <?php if ($subtitle=='Beranda') {
                        echo 'class="active"';
                    } ?>>
                        <a href="<?php echo site_url('admin'); ?>">
                            <i class="menu-icon fa fa-fw fa-home"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="menu-dropdown">
                        <a href="#">
                            <i class="menu-icon fa fa-bar-chart-o"></i>
                            <span>Charts</span> <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="flot_knob_charts.html">
                                    <i class="fa fa-fw fa-area-chart"></i> Flot & Knob Charts
                                </a>
                            </li>
                            <li>
                                <a href="advanced_charts.html">
                                    <i class="fa fa-fw fa-line-chart"></i> Advanced Charts
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown  <?php if ($subtitle=='Reguler I'||$subtitle=='Reguler II'||$subtitle=='Samawa'||$subtitle=='Nusantara') {
                        echo 'active';
                    } ?>"">
                        <a href="#"> <i class="menu-icon fa fa-table"></i>
                            <span>Data Pendaftar</span>
                            <span class="fa arrow">
                                </span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if ($subtitle=='Reguler I') {
                        echo 'class="active"';
                    } ?>>
                                <a href="<?php echo site_url('ad_reguler') ?>">
                                    <i class="fa fa-fw fa-tasks"></i> Reguler I
                                </a>
                            </li>
                            <li <?php if ($subtitle=='Reguler II') {
                        echo 'class="active"';
                    } ?>>
                                <a href="advanced_tables.html">
                                    <i class="fa fa-fw fa-tasks"></i> Reguler II
                                </a>
                            </li>
                            <li <?php if ($subtitle=='Samawa') {
                        echo 'class="active"';
                    } ?>>
                                <a href="responsive_datatables.html">
                                    <i class="fa fa-fw fa-tasks"></i> Samawa
                                </a>
                            </li>
                            <li <?php if ($subtitle=='Nusantara') {
                        echo 'class="active"';
                    } ?>>
                                <a href="responsive_datatables.html">
                                    <i class="fa fa-fw fa-tasks"></i> Nusantara
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-dropdown <?php if ($subtitle=='Fakultas'||$subtitle=='Prodi'||$subtitle=='Agama'||$subtitle=='Pendidikan') {
                        echo 'active';
                    } ?>">
                        <a href="#">
                            <i class="menu-icon fa fa-sitemap"></i>
                            <span>Data Master</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li <?php if ($subtitle=='Fakultas') {
                        echo 'class="active"';
                    } ?>>
                                <a href="<?php echo site_url('m_fakultas'); ?>">
                                    <i class="fa fa-fw fa-building"></i> Fakultas
                                </a>
                            </li>
                            <li <li <?php if ($subtitle=='Prodi') {
                        echo 'class="active"';
                    } ?>>
                                <a href="<?php echo site_url('m_prodi'); ?>">
                                    <i class="fa fa-fw fa-bank"></i> Prodi
                                </a>
                            </li>
                            <li <li <?php if ($subtitle=='Agama') {
                        echo 'class="Agama"';
                    } ?>>
                                <a href="<?php echo site_url('m_agama'); ?>">
                                    <i class="fa fa-fw fa-circle-o"></i> Agama
                                </a>
                            </li>
                            <li <li <?php if ($subtitle=='Pendidikan') {
                        echo 'class="active"';
                    } ?>>
                                <a href="<?php echo site_url('m_pendidikan'); ?>">
                                    <i class="fa fa-fw fa-graduation-cap"></i> Pendidikan
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- / .navigation -->
            </div>
            <!-- menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <aside class="right-aside view-port-height">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1><?php echo $subtitle; ?></h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php echo $content; ?>
        </section>
        <!-- /.content -->
    </aside>
    <!-- /.right-side -->
</div>
<!-- ./wrapper -->
<!-- global js -->

<!-- end of page level js -->
</body>

</html>
