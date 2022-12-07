<?php 
	$name = session()->get('name');
	$email = session()->get('email');
	$gamer_id = session()->get('gamer_id');

?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/flow.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/intlTelInput.css'); ?>"/>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/countrySelect.css'); ?>"/>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/w3.css'); ?>"/>
	 <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url('public/assets/images/fav_icon_new.jpg');?>' />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/simpleMobileMenu-1.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!------------------------------JS-------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/toastr/toastr.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css');?>">
</head>
<body>
	<!----------------------------------------------------------->
	<section class="header">
		<div class="row">
			<div class="col-sm-3">
				<a href=""><img src="<?php echo base_url('public/assets/images/logo-new.jpg'); ?>" id="logo" class="img-fluid d-block"></a>
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-6"> 
				<div class="right-menu">
					<ul>
						<li><a href="<?php echo base_url("Gas")?>" data-toggle="tooltip-1" title="Home"><img src="<?php echo base_url('public/assets/images/Home-Icon.png'); ?>" style=""></a>&nbsp;</li>
						<li><a href="help-center.html" data-toggle="tooltip-1" title="Help center"><img src="<?php echo base_url('public/assets/images/help_center_2.png'); ?>" style=""></a>&nbsp;</li>
                          <li><a href="<?php echo base_url('dashboard');?>" data-toggle="tooltip-1" title="Dashboard"><img src="<?php echo base_url('public/assets/images/dashboard_icon.png'); ?>" style="width:40px;"></a></li>
						
						<div class="w3-dropdown-hover">
							<li><a href="" class="w3-button"><img src="<?php echo base_url('public/assets/images/user.png'); ?>"></a><?php echo $name; ?><i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
							<div class="w3-dropdown-content w3-bar-block w3-border">
						     	<p><b><?php echo $gamer_id; ?></b></p>
						     	<p><?php echo $email; ?></p>
						     	<a  href="<?php echo base_url('My-Account');?>">Manage my account</a>
						    </div>
					    </div>
					<li><a href="<?php echo base_url('log-out');?>"><img src="<?php echo base_url('public/assets/images/logout.png'); ?>"></a>Logout</li>
					</ul>
				</div> 
			</div>
		</div><!--row-->
	</section>

	
