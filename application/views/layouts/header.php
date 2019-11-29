<!DOCTYPE html>
<html lang="en">
<head>
    <title>RJ STATE | <?php 
    if (!empty($header_title)) {
       echo $header_title;
   } ?>

</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
<meta name="author" content="Potenza Global Solutions" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<!-- app favicon -->

<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/img/favicon.ico">
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<!-- plugin stylesheets -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/vendors.css" />
<!-- app style -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/pagination.css" />

</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="<?php echo base_url(); ?>/assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->
            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="index.html">
                            <img src="<?php echo base_url(); ?>/assets/img/logo.png" class="img-fluid logo-desktop" alt="logo" />
                            <img src="<?php echo base_url(); ?>/assets/img/logo-icon.png" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            <ul class="navbar-nav nav-left">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link sidebar-toggle">
                                        <i class="ti ti-align-right"></i>
                                    </a>
                                </li>
                                
                                
                                <li class="nav-item full-screen d-none d-lg-block" id="btnFullscreen">
                                    <a href="javascript:void(0)" class="nav-link expand">
                                        <i class="icon-size-fullscreen"></i>
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav nav-right ml-auto">


                                <li class="nav-item">
                                    <a class="nav-link search" href="javascript:void(0)">
                                        <i class="ti ti-search"></i>
                                    </a>
                                    <div class="search-wrapper">
                                        <div class="close-btn">
                                            <i class="ti ti-close"></i>
                                        </div>
                                        <div class="search-content">
                                            <form>
                                                <div class="form-group">
                                                    <i class="ti ti-search magnifier"></i>
                                                    <input type="text" class="form-control autocomplete" placeholder="Search Here" id="autocomplete-ajax" autofocus="autofocus">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="<?php echo base_url(); ?>/assets/img/avtar/02.jpg" alt="avtar-img">
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">

                                                        <?php 
                                                        if (isset($this->session->userdata['logged_data'])) {
                                                      
                                                            echo $this->session->userdata['logged_data']['username'];
                                                        
                                                      }else{
                                                       
                                                        redirect(base_url("login"));
                                                    }
                                                    ?>
                                                    
                                                </h4>
                                                <small class="text-white">
                                                   <?php 
                                                    if (isset($this->session->userdata['logged_data'])) {
                                                      
                                                            echo $this->session->userdata['logged_data']['email'];
                                                        
                                                      }else{
                                                       
                                                        redirect(base_url("login"));
                                                    }
                                                   ?>
                                               </small>
                                           </div>
                                           <a href="<?php echo base_url('logout'); ?>" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                            class="zmdi zmdi-power"></i></a>
                                        </div>
                                    </div>
                                    <div class="p-4">
                                        <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                            <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-envelope pr-2 text-primary"></i> Inbox
                                                <span class="badge badge-primary ml-auto">6</span>
                                            </a>



                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">RJ STATE</li>
                            <li class="active">
                                <a class="has-arrow" href='<?php echo base_url(); ?>Home' aria-expanded="false">
                                    <i class="nav-icon ti ti-rocket"></i>
                                    <span class="nav-title">Dashboards</span>
                                    <!--  <span class="nav-label label label-danger">9</span> -->
                                </a>

                            </li>


                            <li>

                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i class="nav-icon  ti ti-trello"></i> <span class="nav-title">Area Master</span> <!-- <span class="nav-label label label-success">New</span> --> </a>
                                <ul aria-expanded="false">
                                    <li class="scoop-hasmenu">
                                        <a class="has-arrow" href="javascript: void(0);">Country</a>
                                        <ul aria-expanded="false">
                                            <li> <a href="<?php echo base_url(); ?>CountryCreate">Add new Country</a> </li>
                                            <li> <a href="<?php echo base_url(); ?>CountryList">Country List</a> </li>
                                        </ul>
                                    </li>
                                    <li class="scoop-hasmenu">
                                        <a class="has-arrow" href="javascript: void(0);">State</a>
                                        <ul aria-expanded="false">
                                            <li> <a href="<?php echo base_url(); ?>StateCreate">Add new State</a> </li>
                                            <li> <a href="<?php echo base_url(); ?>StateList">State List</a> </li>
                                        </ul>
                                    </li>
                                    <li class="scoop-hasmenu">
                                        <a class="has-arrow" href="javascript: void(0);">City</a>
                                        <ul aria-expanded="false">
                                            <li> <a href="<?php echo base_url(); ?>CityCreate">Add new City</a> </li>
                                            <li> <a href="<?php echo base_url(); ?>CityList">City List</a> </li>
                                        </ul>
                                    </li>

                                </ul>
                            </li>

                            <li>
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false"> <i class="nav-icon  ti ti-user"></i> <span class="nav-title">Users</span> <!-- <span class="nav-label label label-success">New</span> --> </a>
                                <ul aria-expanded="false">
                                    <li> <a href="widget-chart.html">Customers</a> </li>

                                    <li> <a href="widget-list.html">Agents</a> </li>

                                    <li> <a href="widget-social.html">Property Owners</a> </li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->