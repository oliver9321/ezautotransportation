<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?=NOMBRE_APLICATION?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="ezautotransportation" name="description" />
    <meta content="transportarion,auto,motocicle" name="ofermin" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="plugins/jquery-steps/jquery.steps.css">
    
    <script src="assets/js/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/datatable/datatables.min.css"/>
    <script type="text/javascript" src="assets/datatable/pdfmake.min.js"></script>
    <script type="text/javascript" src="assets/datatable/vfs_fonts.js"></script>
    <script type="text/javascript" src="assets/datatable/datatables.min.js"></script>

    <style>
     .select2-container--open {
            z-index: 9999999 !important;
        }
        .inputpadding{
            padding-top: 15px;
        }

    </style>
</head>

<body>

    <!-- Left Sidenav -->
    <div class="left-sidenav">
        <!-- LOGO -->
        <div class="brand">
                     <?php echo($_SESSION['UserOnline']->Profile == "admin") ? '<a href="index.php?c=Dashboard&a=Index" class="logo">':' <a href="index.php?c=Dashboard&a=Manager" class="logo">' ?>
                  <span class="text-secondary">
                     <b><?=SYSTEM_NAME?></b>
                    </span>
                <span>
                       <!-- <img src="assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                        <img src="assets/images/logo-dark.png" alt="logo-large" class="logo-lg logo-dark">-->
                    </span>
            </a>
        </div>
        <!--end logo-->
        <div class="menu-content h-100" data-simplebar>
            <ul class="metismenu left-sidenav-menu">
                <li class="menu-label mt-0">Components</li>

                <li>
                <?php echo($_SESSION['UserOnline']->Profile == "admin") ? '<a href="?c=Dashboard&a=Index"> <i class="fa fa-desktop align-self-center menu-icon"></i><span>Dashboard</span></a>':'<a href="?c=Dashboard&a=Manager"> <i class="fa fa-desktop align-self-center menu-icon"></i><span>Dashboard</span></a>' ?>
                </li>

                <?php if($_SESSION['UserOnline']->Profile == "admin" || $_SESSION['UserOnline']->Profile == "manager") { ?>

                    <li>
                    <a href="index.php?c=Quotes&a=Index"><i class="fa fa-file-alt align-self-center menu-icon"></i><span>Quotes List</span></a>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa fa-users align-self-center menu-icon"></i><span>Customers</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Customers&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Customers&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="index.php?c=Orders&a=Index"><i class="fa fa-file align-self-center menu-icon"></i><span>Order List</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-truck align-self-center menu-icon"></i><span>Trucker Company</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=companyServices&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=companyServices&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>

                
                <li>
                    <a href="javascript: void(0);"><i  class="fa fa-bus align-self-center menu-icon"></i><span>Drivers</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Drivers&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Drivers&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-car align-self-center menu-icon"></i><span>Vehicles</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Vehicles&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Vehicles&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>


                <?php } ?>

                <?php if($_SESSION['UserOnline']->Profile == "admin") { ?>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-book align-self-center menu-icon"></i><span>Payments List</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=Payments&a=Index"><i class="ti-control-record"></i>General Report</a></li>
                       <!-- <li class="nav-item"><a class="nav-link" href="index.php?c=Payments&a=Summary"><i class="ti-control-record"></i>Summary Report</a></li>-->
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);"><i class="fa fa-check-circle align-self-center menu-icon"></i><span>Status Orders </span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=orderStatus&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=orderStatus&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-check-square align-self-center menu-icon"></i><span>Users Profiles</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=userProfiles&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=userProfiles&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);"><i class="fa fa-user-circle align-self-center menu-icon"></i><span>Users</span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li class="nav-item"><a class="nav-link" href="index.php?c=users&a=Index"><i class="ti-control-record"></i>List</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?c=users&a=Edit"><i class="ti-control-record"></i>Create</a></li>
                    </ul>
                </li>

                <?php } ?>


                <hr class="hr-dashed hr-menu">
               <!-- <li class="menu-label my-2">Components</li>-->

            </ul>
         
        </div>
    </div>
    <!-- end left-sidenav-->


    <div class="page-wrapper">

  
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-end mb-0">

                <?php if(isset($countPendingQuotes)){?>
                   <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i data-feather="bell" class="align-self-center topbar-icon"></i>
                            <span class="badge bg-danger rounded-pill noti-icon-badge"><?= isset($countPendingQuotes)  ? $countPendingQuotes : '' ?></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

                            <h6 class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                Notifications <span class="badge bg-primary rounded-pill"></span>
                            </h6>
                            <div class="notification-menu" data-simplebar>
                              
                                <a href="index.php?c=quotes&a=index" class="dropdown-item py-3">
                                   <!-- <small class="float-end text-muted ps-2">2 min ago</small>-->
                                    <div class="media">
                                        <div class="avatar-md bg-soft-danger">
                                            <i data-feather="info" class="align-self-center icon-xs"></i>
                                        </div>
                                        <div class="media-body align-self-center ms-2 text-truncate">
                                            <h6 class="my-0 fw-normal text-dark">Your have (<?= isset($countPendingQuotes)  ? $countPendingQuotes : '' ?>) quote's pending</h6>
                                            <!--<small class="text-muted mb-0">Dummy text of the printing and industry.</small>-->
                                        </div>
                                    
                                    </div>
                                   
                                </a>
                           
                            </div>
                      
                            <!--<a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>-->
                        </div>
                    </li>
                  <?php  }  ?>

                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <span class="ms-1 nav-user-name hidden-sm"><?= $_SESSION['UserOnline']->Name ?></span>
                            <img src="assets/images/logoTransport.png" alt="profile-user" class="rounded-circle thumb-xs" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item btn btn-danger" href="index.php?c=Login&a=Logout"><i data-feather="power" class="align-self-center icon-xs icon-dual me-1"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <!--end topbar-nav-->

                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="nav-link button-menu-mobile">
                                <i data-feather="menu" class="align-self-center topbar-icon"></i>
                            </button>
                    </li>
                    <li class="creat-btn">
                        <div class="nav-link">
                            <a class="btn btn-sm btn-sm btn-soft-dark" href="index.php?c=Orders&a=order"><i class="fas fa-plus me-2"></i>NEW ORDER</a>
                            <a class="btn btn-sm btn-sm btn-soft-primary" href="index.php?c=Orders&a=index"><i class="fas fa-list me-2"></i>ORDER LIST</a>
                            <a class="btn btn-sm btn-sm btn-soft-info" href="index.php?c=Quotes&a=index"><i class="fas fa-list me-2"></i>QUOTE LIST</a>
                            <!--<button type="button" class="btn btn-sm btn-soft-primary" data-bs-toggle="modal" data-bs-target="#ModalNewOrder"></button>-->
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <!-- Page Content-->
        <div class="page-content bg-light">
     
           <div class="position-fixed end-50 top-0" style=" z-index: 1 !important;">
                    <div id="toastSuccess" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast-success">
                                <!-- Message from js -->
                            </div>
                        </div>
                    </div>
                    <div id="toastError" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast-error">
                                <!-- Message from js -->
                            </div>
                        </div>
                    </div>

                    <div id="toastWarning" class="toast align-items-center text-white bg-warning border-0" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body toast-warning">
                                <!-- Message from js -->
                            </div>
                        </div>
                    </div>
                </div>
               
            <div class="container">

            