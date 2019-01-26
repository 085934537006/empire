<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Empire</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("assets/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">
	<!--date picker -->
	<link href="<?php echo base_url("assets/datepicker3.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url("assets/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url("assets/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">
    <!-- sweet-alert --> 
    <link href="<?php echo base_url("assets/vendors/sweetalert/sweetalert.css"); ?>" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url("assets/build/css/custom.min.css"); ?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
             <a href="<?php echo site_url('admin/dashboard'); ?>" class="site_title"><i class="fa fa-car"></i> <span>Empire</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">
                    <img src="<?= base_url('assets/images/pp.svg'); ?>" alt="..." class="img-circle profile_img">
                </div>
                <div class="profile_info">
                    <span>Selamat Datang,</span>
                    <h2><?php echo $this->session->userdata('first_name'); ?></h2>
                </div>
                <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Halaman Depan</a></li>
                  <?php if($this->session->userdata('adminlevel') > 1) : ?>
                  <li><a href="<?php echo site_url('admin/dashboard'); ?>"><i class="fa fa-home"></i> Dashboard </a></li>
                  <?php endif; ?>
                  <li><a><i class="fa fa-edit"></i> User <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                    <?php if($this->session->userdata('adminlevel') == 2) : ?>
                      <li><a href="<?php echo site_url('admin/user/add'); ?>">Buat Baru</a></li>
                      <li><a href="<?php echo site_url('admin/user'); ?>">Tampil User</a></li>
                    <?php endif; ?>
                      <li><a href="<?php echo site_url('admin/user/edit/' . $this->session->userdata('id')); ?>">Edit User</a></li>
                    </ul>
                  </li>
                  
                  <?php if($this->session->userdata('adminlevel') == 2) : ?>
                    <li>
                        <a><i class="fa fa-desktop"></i>Merek &amp; Model <span class="fa fa-chevron-down"></span></a>

                        <ul class="nav child_menu">
                          <li><a href="<?php echo site_url('admin/manufacturers');?>">Merek</a></li>
                          <li><a href="<?php echo site_url('admin/car_model');?>">Model</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                  <li><a><i class="fa fa-table"></i> Mobil <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo site_url('admin/vehicles'); ?>">Daftar Mobil</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?= $this->session->userdata('first_name'); ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    
                    <li><a href="<?php echo site_url('admin/dashboard/logout'); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->