<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/flow.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/w3.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jquery-jvectormap-2.0.2.css'); ?>"/>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jsvectormap.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/jsvectormap.min.css'); ?>"/>
    <!------------------------------JS-------------------------------------->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-jvectormap-uk-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jvector-maps.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/Chart.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jsvectormap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jsvectormap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/world.js'); ?>"></script>
</head>
<body>
    <!----------------------------------------------------------->
    <section class="header">
        <div class="row">
            <div class="col-sm-3">
                <a href=""><img src="<?php echo base_url('assets/images/logo-new.jpg'); ?>" id="logo" class="img-fluid d-block"></a>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-3">
                <div class="right-menu">
                    <ul>
                        <li><a href=""><img src="<?php echo base_url('assets/images/logout.png'); ?>"></a>Logout</li>
                        <div class="w3-dropdown-hover">
                            <li><a href="" class="w3-button"><img src="<?php echo base_url('assets/images/user.png'); ?>"></a>User<i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <p><b>User001</b></p>
                                <p>User001@gmail.com</p>
                                <a href="">Manage my account</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div><!--row-->
    </section>


<section class="dashboard">
    <div class="row">
        <div class="col-sm-2" style="padding: 0;">
            <div class="dashboard-left">
                <h4><b>Dashboard</b></h4>
                <h5><b>Setup</b><!-- <i class="fa fa-angle-down fa-lg" aria-hidden="true"></i> --></h5>
                <div class="menu-list">
                    <ul>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-1-dashboard.png');?>">Super Admin</a></li>
                        <li style="width:123%;"><a href=""><img src="<?php echo base_url('assets/images/icon-2-dashboard.png');?>">Organization/Hospital</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-3-dashboard.png');?>">Speciality</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-4-dashboard.png');?>">Doctor Details</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-5-dashboard.png');?>">PMS Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-6-dashboard.png');?>">Clinical Database Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-7-dashboard.png');?>">MeLS Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-8-dashboard.png');?>">Access Control</a></li>    
                    </ul>
                    <h6><b>Manage/View</b><!-- <i class="fa fa-angle-down fa-lg" aria-hidden="true"></i> --></h6>
                    <ul>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-5-dashboard.png');?>">PMS Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-6-dashboard.png');?>">Clinical Database Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('assets/images/icon-7-dashboard.png');?>">MeLS Module</a></li>
                    </ul>
                </div>
            </div>
        </div>
        