<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title>Medusys</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/sharath.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/website.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Roboto&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Roboto&family=Updock&display=swap" rel="stylesheet">
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url('public/assets/images/fav_icon_new.jpg');?>' />
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/checkout.css'); ?>"/> -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/payment.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/simpleMobileMenu.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/intlTelInput.css'); ?>"/>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/countrySelect.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/sweet_alert/sweet-alert.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css');?>">
	<!------------------------------JS-------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/toastr/toastr.min.js');?>"></script>
	<script src="<?php echo base_url('public/assets/sweet_alert/sweet-alert.js');?>"></script>
    
    
</head>
<body>
	<!----------------------------------------header----------------------------->
	<!-- <section class="top-info">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-6">
					<div class="top-left">
						<ul>
							<li><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=healthcare@medusyspty.com" target="_blank"><i class="fa fa-envelope-o" aria-hidden="true"></i>contact@medusys.in</a></li>
							<li><a href="tel:+919686200393"><i class="fa fa-phone" aria-hidden="true"></i>+919686200393</a></li>
							<li><a href="tel:+61 424357122"><i class="fa fa-phone" aria-hidden="true"></i>+61 424357122</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-3">
					<div class="top-right">
						<ul>
							<li><a href=""><i class="fa fa-google-plus fa-lg" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-facebook fa-lg" aria-hidden="true"></i></a></li>
							<li><a href=""><i class="fa fa-twitter fa-lg" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!----------------------------------------header----------------------------->

	<!---------------------------------------menu-------------------------------->
	<!-- <section class="menu">
			<div class="row">
				<div class="col-sm-2">
					<div class="logo">
						<img src="<?php echo base_url('public/assets/images/logo-new.jpg'); ?>" class="img-fluid d-block mx-auto">
					</div>
				</div>
				<div class="col-sm-10">
					<header class="cf">
					
						<div class="navigation">
							<nav>
								<a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
								<ul class="mobimenu">
									<li><a href="https://www.medusys.in/">Home</a></li>
									<li><a href="https://www.medusys.in/about-us.html">About</a></li>
									<li><a href="https://www.medusys.in/products.html">Product</a></li>
									<li><a href="<?php echo base_url('Registration'); ?>">Registration</a></li>
									<li><a href="<?php echo base_url('login'); ?>">Member login</a></li>
									<li><a href="">MeLS</a></li>
									<li><a href="">Publications</a></li>
									<li><a href="">User Guide</a></li>
									<li><a href="">Faq</a></li>
									<li><a href="">Contact</a></li>
								</ul>
							</nav>
						</div>
					</header>
				</div>
			</div>
	</section> -->
	<!---------------------------------------menu-------------------------------->


		<!-------------------------------------------------------------------->
<header class="nav-header">	
	<section class="head-1">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<div class="head-left">
						<ul>
							<li><span><img src="<?php echo base_url('public/assets/images/header-icon-1.png'); ?>"></span>Mon-Sun 0900-2100</li>
							<li><span><img src="<?php echo base_url('public/assets/images/header-icon-2.png'); ?>"></span><a href="tel:+91 9686200393">+91 9686200393, +61&nbsp;&nbsp;424357122</a></li>
							<li><span><img src="<?php echo base_url('public/assets/images/header-icon-3.png'); ?>"></span><a href="mailto:contact@medusys.in">contact@medusys.in</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="social-icons">
						<ul>
							<li><a href=""><img src="<?php echo base_url('public/assets/images/header-icon-4.png'); ?>"></a></li>
							<li><a href=""><img src="<?php echo base_url('public/assets/images/header-icon-5.png'); ?>"></a></li>
							<li><a href=""><img src="<?php echo base_url('public/assets/images/header-icon-6.png'); ?>"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--------------------------------------------------------------------->

	<!--------------------------------------------------------------------->
	<section class="head-nav">
		<div class="container">
			<div class="row" id="mobile-reg-head">
				<div class="col-sm-6">
					<a href="http://localhost/medusys/index.html"><img src="<?php echo base_url('public/assets/images/web-logo.png'); ?>"></a>
				</div>
				<div class="col-sm-2">
					<div class="head-nav-right">
						<p><img src="<?php echo base_url('public/assets/images/tick.png'); ?>">Trusted By<br><span>30,000+ Doctors</span></p>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="head-nav-right">
						<p><img src="<?php echo base_url('public/assets/images/tick.png'); ?>">Countries<br><span>70+</span></p>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="head-nav-right">
						<p><img src="<?php echo base_url('public/assets/images/tick.png'); ?>">Number #1<br><span>Best E-Health Care App</span></p>
					</div>	
				</div>
			</div><!--row-->
			<div class="row pt-4">
				<div class="col-sm-10">
					<div class="menu-web">
						<header class="cf">
							<div class="navigation">
								<nav>
									<a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
									<ul class="mobimenu nav-sidebar">
										<li><a href="index.html" class="active">Home</a></li>
										<li><a href="http://localhost/medusys/about-us.html">About Us</a></li>
										<li><a href="http://localhost/medusys/approach.html">Our Approach</a></li>
										<li><a href="">Client Case studies</a></li>
					                    <li><a href="http://localhost/medusys/products.html">Our Products</a></li>
					                  <!--   <li><a href="<?php echo base_url('Registration'); ?>">Registration</a></li> -->
					                  <!--   <li><a href="<?php echo base_url('login'); ?>">Members Login</a></li> -->
					                 	<li class="dropdown" id="new-drop"> 
											<a href="" class="dropdown-toggle" data-toggle="dropdown">Login &nbsp; <span class="glyphicon glyphicon-chevron-down"></span> </a>
											<ul class="dropdown-menu" id="drop">
												<li><a href="http://localhost/medusys/login">Member Login</a></li>
												<li><a href="http://localhost/medusys/admin/login">Admin Login</a></li>
											</ul>
										</li>
					                    <!-- <li><a href="http://localhost/medusys/contact-us.html">Contact</a></li> -->
					                      <li class="dropdown" id="new-drop"> 
											<a  class="dropdown-toggle click_help" data-toggle="dropdown">Help Center &nbsp; <span class="glyphicon glyphicon-chevron-down"></span> </a>
											<ul class="dropdown-menu" id="drop">
												<li><a href="contact-us.php">Contact Us</a></li>
												<!-- <li><a href="">Admin Login</a></li> -->
											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</header>
					</div>
				</div><!--col-10-->
				<div class="col-sm-2" id="mobile-reg-button">
					<div class="contact-tag">
						<a href="<?php echo base_url('Registration'); ?>">Registration</a>
					</div>
				</div>
			</div><!--row-->
		</div>
	</section>
</header>	
	<!--------------------------------------------------------------------->


	<!---------------- Menu Drodown --------------------->
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$('.mobimenu li.dropdown').hover(function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
			}, function() {
			  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
			});			
		});
	</script>
<!---------------- Menu Drodown --------------------->	


<script type="text/javascript">
	$('.click_help').click(function(){
		// windows.location.href = 
		window.location.href = "help-center.html";
	});
</script>


<style type="text/css">
	#drop li {
	    width: 170px;
	    height: 15px;
    }
    @media only screen and (min-width:320px) and (max-width:640px){
    	 #new-drop .dropdown-menu{
        	background-color: #000;
    	}
    }
    .click_help{
		    cursor: pointer;
    		color: #007EB1!important;		
	}
</style>