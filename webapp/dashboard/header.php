<?php

    session_start();

    if(isset($_SESSION['admin'])){
        $token = $_SESSION['admin'];
        $username = $_SESSION['username'];
    }

    if(!(isset($_SESSION['admin']) AND isset($_SESSION['username']))){
        session_destroy();
        header("Location: ../omes/index.php");
        die();
    }

    if(isset($_GET['action'])){
        if($_GET['action'] == "logout"){
        session_destroy();
        header("Location: ../omes/index.php");
        die();
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title><?php echo $current_page;?> » Online Mock Examination System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="template/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link href="template/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="../sweetalert/dist/sweetalert2.min.css">

    <link rel="stylesheet" href="template/css/style.css">
    <link rel="stylesheet" href="template/css/skin.css">

    <!-- Pick date -->
    <link rel="stylesheet" href="vendor/pickadate/themes/default.css">
    <link rel="stylesheet" href="vendor/pickadate/themes/default.date.css">

</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <img class="logo-abbr" src="template/images/logo-white-2.png" alt="">
                <img class="logo-compact" src="template/images/logo-text-white.png" alt="">
                <img class="brand-title" src="template/images/logo-text-white.png" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">

                        </div>

                        <style>
                            #hover_menu:hover {
                              background-color: #0c223a;
                            }
                        </style>
                        <ul class="navbar-nav header-right" >
                            <li class="nav-item dropdown header-profile" id="hover_menu">
                                <a class="nav-link bell ai-icon" class="nav-link" href="#" role="button" data-toggle="dropdown">
                                     <span class="ml-2"><?php echo $username;?> </span>
                                     <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="account.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Account Settings </span>
                                    </a>
                                    <a class="dropdown-item ai-icon logout-auto">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="ai-icon" href="index.php" aria-expanded="false">
                            <i class="la la-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <?php 
                    if($_SESSION['admin'] == 1){
                    ?>            
                    <li><a class="ai-icon" href="tokens.php" aria-expanded="false">
                            <i class="la la-ticket"></i>
                            <span class="nav-text">Manage Tokens</span>
                        </a>
                    </li>
                    <li><a class="ai-icon" href="courses.php" aria-expanded="false">
                            <i class="la la-graduation-cap"></i>
                            <span class="nav-text">Manage Courses</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-list-alt"></i>
                            <span class="nav-text">Exams</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="exams.php">Manage Exams</a></li>
                            <li><a href="exams_questions.php">Exam Questions</a></li>
                            <?php 
                            if($_SESSION['admin'] == 1){
                            ?>  
                            <li><a href="exams_results.php">Exam Results</a></li>
                            <?php
                            }
                            ?>
                            <li><a href="exams_actionlogs.php">Action Logs</a></li>
                        </ul>
                    </li>
                    <li><a href="account.php" aria-expanded="false">
                            <i class="la la-desktop"></i>
                            <span class="nav-text">Account Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">