<!DOCTYPE html>
<html>

    <head>
        
        <title>Sistem Penyewaan Lahan atau Perairan</title>
        
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/logo.png">
        <link href="<?php echo base_url();?>assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/morris/morris.css">
        <!-- DataTables -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url();?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-muted">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a class="logo">
                        <span>
                           <img src="<?php echo base_url();?>assets/images/dishub.png" alt="" height="75">
                        </span>
                        <i>
                            <img src="<?php echo base_url();?>assets/images/logo-kominfo.png" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">


                        
 <li><!-- <img src="<?php echo base_url();?>assets/images/cic.png" alt="" height="70" width="154">--></li>
                        
                          <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="<?php echo base_url(). 'login/logout' ?>"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                        <li class="d-none d-sm-block">
                            
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu side-menu-light">
                <div class="slimscroll-menu" id="remove-scroll">



<div class="user-details">
                        <div class="float-left mr-2">
                            <img src="<?php echo base_url('assets/images/users/'.$myuser->foto) ?>" alt="" class="thumb-md rounded-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                       <font color="#0285b4"><b><?=$this->session->userdata('nm_user') ?> </b></font>
                                    
                               
                                
                            </div>
                            
                            <p class="text-white"><font color="#0285b4"><?=$this->session->userdata('level') ?></font></p>
                        </div>
                    </div>


                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">

                            <?php if ($this->session->userdata('level')=="Administrator") { ?>
                          
                            <li>
                                <a href="<?php echo site_url();?>adm/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><font color=""><i class="fas fa-folder"></i></font><span> Data Master<span class="float-right menu-arrow"><i class="mdi mdi-plus"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="<?php echo site_url();?>adm/jenis_retribusi"><i class="fas fa-angle-double-right"></i> &nbsp;Jenis Retribusi</a></li>
                                    <li><a href="<?php echo site_url();?>adm/retribusi"><i class="fas fa-angle-double-right"></i> &nbsp;Retribusi</a></li>
                                    <li><a href="<?php echo site_url();?>adm/wilayah"><i class="fas fa-angle-double-right"></i> &nbsp;Lokasi</a></li>
                                    <li><a href="<?php echo site_url();?>adm/alokasi"><i class="fas fa-angle-double-right"></i> &nbsp;Alokasi Retribusi</a></li>
                                </ul>
                            </li>

                             <li>
                                <a href="<?php echo site_url();?>adm/pelanggan" class="waves-effect">
                                    <font color=""><i class="fas fa-address-book"></i></font><span> Pelanggan</span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo site_url();?>adm/pengajuan" class="waves-effect">
                                    <font color=""><i class="fas fa-folder-open"></i></font><span> Pengajuan Sewa</span>
                                </a>
                            </li>

                        
                             <li>
                                <a href="<?php echo site_url();?>adm/user" class="waves-effect">
                                    <font color=""><i class="fas fa-users"></i></font><span> Users</span>
                                </a>
                            </li>

                             <?php }else if ($this->session->userdata('level')=="Pelanggan") { ?>

                                <li>
                                <a href="<?php echo site_url();?>pelanggan/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>

                             <li>
                                <a href="<?php echo site_url();?>pelanggan/pengajuan" class="waves-effect">
                                    <font color=""><i class="fas fa-folder-open"></i></font><span> Pengajuan</span>
                                </a>
                            </li>

                    
                          <?php }else if ($this->session->userdata('level')=="UPTD") { ?>

                                <li>
                                <a href="<?php echo site_url();?>uptd/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>   

                            <li>
                                <a href="<?php echo site_url();?>uptd/pengajuan" class="waves-effect">
                                    <font color=""><i class="fas fa-folder-open"></i></font><span> Pengajuan</span>
                                </a>
                            </li>

                             <?php }else if ($this->session->userdata('level')=="Dishub") { ?>

                                <li>
                                <a href="<?php echo site_url();?>dishub/dashboard" class="waves-effect">
                                    <font color=""><i class="fas fa-chart-line"></i></font><span> Dashboard </span>
                                </a>
                            </li>                       

                                 <?php } ?>

                                 <li>
                                <a href="<?php echo base_url(). 'login/logout' ?>" class="waves-effect">
                                    <font color=""><i class="fas fa-sign-out-alt"></i></font><span> Logout</span>
                                </a>
                            </li>                                          
                           

                           

                            
                        </ul>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->