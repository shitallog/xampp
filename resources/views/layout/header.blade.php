<?php $active_menu = session('active_menu'); ?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Quickway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

    <link href="{{ asset('assets/libs/chartist/chartist.min.css')}}" rel="stylesheet">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/notify/css/jquery.growl.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/libs/notify/css/notifIt.css')}}" rel="stylesheet" />
    <!-- DataTables -->
    <link href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
        type="text/css">

    <!-- Responsive datatable examples -->
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
        rel="stylesheet" type="text/css">
    <script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
</head>

<body data-sidebar="dark">

    <!-- Begin page -->
    <div id="layout-wrapper">


        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box">
                        <a href="{{route('admin-dashboard')}}" class="logo logo-dark">
                            <span class="logo-sm">
                                <h3 style="margin-top: 25px;color: #fff;">Quickway</h3>
                            </span>
                            <span class="logo-lg">
                                <h3 style="margin-top: 25px;color: #fff;">Quickway</h3>
                            </span>
                        </a>

                        <a href="{{route('admin-dashboard')}}" class="logo logo-light">
                            <span class="logo-sm">
                                <h3 style="margin-top: 25px;color: #fff;">Quickway</h3>
                            </span>
                            <span class="logo-lg">
                                <h3 style="margin-top: 25px;color: #fff;">Quickway</h3>
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect"
                        id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                </div>

                <div class="d-flex">
                    <!-- App Search-->
                    <form class="app-search d-none d-lg-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="fa fa-search"></span>
                        </div>
                    </form>

                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                            aria-labelledby="page-header-search-dropdown">

                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..."
                                            aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i
                                                    class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="dropdown d-none d-lg-inline-block">
                        <button type="button" class="btn header-item noti-icon waves-effect"
                            data-bs-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>


                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <p style="margin-top: 15px;font-weight: 600;">Admin</p>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="#"><i
                                    class="mdi mdi-account-circle font-size-17 align-middle me-1"></i> Profile</a>
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i
                                    class="bx bx-power-off font-size-17 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="<?php if($active_menu == '1') { echo 'mm-active';}?>">
                            <a href="{{route('admin-dashboard')}}" class="waves-effect">
                                <i class="ti-home"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li
                            class="<?php if($active_menu == '2' || $active_menu == '3' || $active_menu == '4' || $active_menu == '5' || $active_menu == '6' || $active_menu == '10') { echo 'mm-active';}?>">
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect <?php if($active_menu == '2' || $active_menu == '3' || $active_menu == '4' || $active_menu == '5' || $active_menu == '6' || $active_menu == '10') { echo 'mm-active';}?>">
                                <i class="ti-package"></i>
                                <span>Master</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li class="<?php if($active_menu == '2') { echo 'mm-active';}?>"><a
                                        href="{{route('service-master')}}">Service</a></li>
                                <li class="<?php if($active_menu == '3') { echo 'mm-active';}?>"><a
                                        href="{{route('product-master')}}">Product</a></li>
                                <li class="<?php if($active_menu == '4') { echo 'mm-active';}?>"><a
                                        href="{{route('pincode-master')}}">Pincode</a></li>
                                <!-- <li class="<?php if($active_menu == '5') { echo 'mm-active';}?>"><a
                                        href="{{route('LTL-master')}}">LTL TAT</a></li>
                                <li class="<?php if($active_menu == '6') { echo 'mm-active';}?>"><a
                                        href="{{route('pickupboy-master')}}">Pickup Boy</a></li> -->
                                <!--<li class="<?php if($active_menu == '10') { echo 'mm-active';}?>"><a href="{{route('vendor-master')}}">Vendor</a></li>--->
                            </ul>
                        </li>
                        <!-- <li class="<?php if($active_menu == '7' || $active_menu == '8') { echo 'mm-active';}?>">
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect <?php if($active_menu == '7' || $active_menu == '8') { echo 'mm-active';}?>">
                                <i class="ti-user"></i>
                                <span>Client</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li class="<?php if($active_menu == '7') { echo 'mm-active';}?>"><a
                                        href="{{route('client-add')}}">Add Client</a></li>
                                <li class="<?php if($active_menu == '8') { echo 'mm-active';}?>"><a
                                        href="{{route('client-list')}}">Client List</a></li>
                            </ul>
                        </li>

                        <li
                            class="<?php if($active_menu == '9' || $active_menu == '11' || $active_menu == '12' || $active_menu == '13' || $active_menu == '14' || $active_menu == '15') { echo 'mm-active';}?>">
                            <a href="javascript: void(0);"
                                class="has-arrow waves-effect <?php if($active_menu == '9' || $active_menu == '11' || $active_menu == '12' || $active_menu == '13' || $active_menu == '14' || $active_menu == '15') { echo 'mm-active';}?>">
                                <i class="ti-package"></i>
                                <span>Forward Order</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li class="<?php if($active_menu == '9') { echo 'mm-active';}?>"><a
                                        href="{{route('all-pending-order')}}">Pending Order</a></li>
                                <li class="<?php if($active_menu == '11') { echo 'mm-active';}?>"><a href="#">Ready To
                                        Ship</a></li>
                                <li class="<?php if($active_menu == '12') { echo 'mm-active';}?>"><a href="#">Ready For
                                        Pickup</a></li>
                                <li class="<?php if($active_menu == '13') { echo 'mm-active';}?>"><a href="#">In
                                        Trasit</a></li>
                                <li class="<?php if($active_menu == '14') { echo 'mm-active';}?>"><a href="#">RTO
                                        In-Transit</a></li>
                                <li class="<?php if($active_menu == '15') { echo 'mm-active';}?>"><a href="#">All
                                        Shipment</a></li>
                            </ul>
                        </li> -->

                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Left Sidebar End -->