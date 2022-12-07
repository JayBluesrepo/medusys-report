<?php 
    $name = session()->get('name');
    $email = session()->get('email');
    $gamer_id = session()->get('gamer_id');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <title></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/flow.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/w3.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/jquery-jvectormap-2.0.2.css'); ?>"/>
     <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/jsvectormap.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/jsvectormap.min.css'); ?>"/>
    <!------------------------------JS-------------------------------------->
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-jvectormap-uk-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jvector-maps.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/Chart.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jsvectormap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jsvectormap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/world.js'); ?>"></script>
</head>
<body>
    <!----------------------------------------------------------->
    <section class="header">
        <div class="row">
            <div class="col-sm-3">
                <a href=""><img src="<?php echo base_url('public/assets/images/logo-new.jpg'); ?>" id="logo" class="img-fluid d-block"></a>
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-4">
                <div class="right-menu">
                    <ul>
                    <li><a href="<?php echo base_url("Gas")?>" data-toggle="tooltip-1" title="Home"><img src="<?php echo base_url('public/assets/images/Home-Icon.png'); ?>" style=""></a>&nbsp;</li>
                       <li><a href="https://medusys.in/help-center.html" data-toggle="tooltip-1" title="Help center"><img src="<?php echo base_url('public/assets/images/help_center_2.png'); ?>" style=""></a>&nbsp;</li>
                        <div class="w3-dropdown-hover">
                            <li><a href="" class="w3-button"><img src="<?php echo base_url('public/assets/images/user.png'); ?>"></a><?php echo $name; ?><i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <p><b><?php echo $gamer_id; ?></b></p>
                                <p><?php echo $email; ?></p>
                                <a href="<?php echo base_url('My-Account'); ?>">Manage my account</a>
                            </div>
                        </div>
                        <li><a href="<?php echo base_url('log-out');?>"><img src="<?php echo base_url('public/assets/images/logout.png'); ?>"></a>Logout</li>
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
                        <!-- <li><a href=""><img src="<?php echo base_url('public/assets/images/icon-1-dashboard.png');?>">Super Admin</a></li>
                        <li style="width:123%;"><a href=""><img src="<?php echo base_url('public/assets/images/icon-2-dashboard.png');?>">Organization/Hospital</a></li> -->
                        <li><a href="<?php echo base_url('Speciality');?>"><img src="<?php echo base_url('public/assets/images/icon-3-dashboard.png');?>">Speciality</a></li>
                        <li><a href="<?php echo base_url('My-Account');?>"><img src="<?php echo base_url('public/assets/images/icon-4-dashboard.png');?>">Doctor Details</a></li>
                        <li><a href="<?php echo base_url('Patient-Management-System');?>"><img src="<?php echo base_url('public/assets/images/icon-5-dashboard.png');?>">PMS Module</a></li>
                        <li><a href="<?php echo base_url('Clinic-Databases');?>"><img src="<?php echo base_url('public/assets/images/icon-6-dashboard.png');?>">Clinical Database Module</a></li>
                        <li><a href="<?php echo base_url('Mels-Cme');?>"><img src="<?php echo base_url('public/assets/images/icon-7-dashboard.png');?>">MeLS Module</a></li>
                        <!-- <li><a href=""><img src="<?php echo base_url('public/assets/images/icon-8-dashboard.png');?>">Access Control</a></li>     -->
                    </ul>
                    <!-- <h6><b>Manage/View</b></h6>
                    <ul>
                        <li><a href=""><img src="<?php echo base_url('public/assets/images/icon-5-dashboard.png');?>">PMS Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('public/assets/images/icon-6-dashboard.png');?>">Clinical Database Module</a></li>
                        <li><a href=""><img src="<?php echo base_url('public/assets/images/icon-7-dashboard.png');?>">MeLS Module</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
        