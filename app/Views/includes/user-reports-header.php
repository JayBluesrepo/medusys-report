<?php 
	$name = session()->get('name');
	$email = session()->get('email');
	$gamer_id = session()->get('gamer_id');

?>	

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/reports.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/font-awesome.min.css');?>"/>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/w3.css'); ?>"/>
<!-- 	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> -->
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>

</head>
<body>
	
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
						<li><a href="<?php echo base_url('log-out');?>" data-toggle="tooltip-1" title="Dashboard"><img src="<?php echo base_url('public/assets/images/dashboard_icon.png'); ?>"></a></li>
						<div class="w3-dropdown-hover">
							<li><a href="" class="w3-button"><img src="<?php echo base_url('public/assets/images/user.png'); ?>"></a><?php echo $name; ?><i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
							<div class="w3-dropdown-content w3-bar-block w3-border">
						     	<p><b><?php echo $gamer_id; ?></b></p>
						     	<p><?php echo $email; ?></p>
						     	<a href="<?php echo base_url('My-Account');?>">Manage my account</a>
						    </div>
					    </div>
					    <li><a href="<?php echo base_url('log-out');?>"><img src="<?php echo base_url('public/assets/images/logout.png'); ?>"></a>Logout</li>
					</ul>
				</div>
			</div>
		</div><!--row-->
	</section>


	<section class="reports-side-bar">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-side-menu">
					<div class="main-tag">
						<a href="">User Reports</a>
					</div>
					<div class="main-tag-sub">
						<p>Audit Reports</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('user-n-report');?>">Audit Results</a></li>
					</ul>
					<div class="main-tag-sub">
						<p>Patient Characteristics</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('user-demography');?>">Patient Demography</a></li>
						<li><a href="<?php echo base_url('user-asa');?>">ASA Classification</a></li>
						<li><a href="<?php echo base_url('user-morbid');?>">Co-Morbid Conditions</a></li>
					</ul>
					<div class="main-tag-sub">
						<p>Procedure</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('user-safety');?>">Clinical Safety Standards</a></li>
						<!-- <li><a href="https://medusys.in/safety');?>">Clinical Safety Standards</a></li> -->
						<li><a >Surgery Details</a></li>
						<ul class="list-a">
							<li><a href="<?php echo base_url('user-surgery');?>">Surgery Details</a></li>
							<!-- <li><a href="https://medusys.in/speciality">Surgical Specialty</a></li> -->
							<!-- <li><a href="https://medusys.in/location">Surgical Location</a></li> -->
							<li><a href="<?php echo base_url('user-speciality');?>">Surgical Specialty</a></li>
							<li><a href="<?php echo base_url('user-location');?>">Surgical Location</a></li>
							<li><a href="<?php echo base_url('user-purpose');?>">Purpose of CNB</a></li>
							<li><a href="<?php echo base_url('user-anasthetic');?>">Anaesthetist Experience</a></li>
							<li><a href="<?php echo base_url('user-supervision');?>">Supervision</a></li>
							<li><a href="<?php echo base_url('user-patient_status');?>">Patient Status During Procedure</a></li>
							<li><a href="<?php echo base_url('user-sedation');?>">Sedation Score</a></li>
							<li><a href="<?php echo base_url('user-Patientpositon');?>">Patient Position During CNB</a></li>
						</ul>
						<li><a >Techniques</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-cse-technique');?>">CSE Technique</a></li>
							<li><a href="<?php echo base_url('user-csa-technique');?>">CSA Technique</a></li>
						</ul>
						<li><a >Other Procedure Characteristics</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-sterility_features');?>">Sterility Features & Skin Prep</a></li>
							<li><a href="<?php echo base_url('user-ultra_sound');?>">Ultrasound Use & Image Quality</a></li>
							<li><a href="<?php echo base_url('user-vertibral-intraspace');?>">Vertebral Interspace Level</a></li>
							<li><a href="<?php echo base_url('user-anatomical');?>">Anatomical Landmark</a></li>
							<li><a href="<?php echo base_url('user-approach');?>">Approach</a></li>
							<li><a href="<?php echo base_url('user-no-attempts');?>">Number of Attempts</a></li>
						</ul>
						<!-- <li><a href="<?php echo base_url('technique');?>">Epidural Technique</a></li> -->
						<li><a >Needle Details</a></li>
						<ul>
							<!-- <li><a href="<?php echo base_url('epidural-needle');?>">Needle Details Type & Size</a></li> -->
							<!-- <li><a href="<?php echo base_url('spinal-needle');?>">Spinal Needle Details Type & size</a></li>
							<li><a href="<?php echo base_url('csa-needle');?>">CSA Needle Details Type & size</a></li> -->
							<li><a href="<?php echo base_url('user-needle_brand');?>">Needle Brand</a></li>
						</ul>
						<li><a >LA Utilisation</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-epiduralLA');?>">Epidural LA</a></li>
							<li><a href="<?php echo base_url('user-csaLA');?>">CSA LA</a></li>
						</ul>
						<li><a >Total Intra Operative LA Dosage</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-epidural-component-single-dose');?>">Epidural Component Single Dose</a></li>
							<li><a href="<?php echo base_url('user-epidural-component-sala-dose');?>">Epidural Component  SALA Combo Dose</a></li>
							<li><a href="<?php echo base_url('user-spinal-component-single-dose');?>">Spinal Component Single Dose</a></li>
							<li><a href="<?php echo base_url('user-spinal-component-combo-dose');?>">Spinal Component Combo Dose</a></li>
							<li><a href="<?php echo base_url('user-epidural-single-dose');?>">Epidural Single Dose</a></li>
							<li><a href="<?php echo base_url('user-epidural-sala-combo-dose');?>">Epidural SALA Combo Dose</a></li>
							<li><a href="<?php echo base_url('user-spinal-dose');?>">Spinal Component Single Dose</a></li>
							<li><a href="<?php echo base_url('user-spinal-combo-dose');?>">Spinal Component Combo Dose</a></li>
							<li><a href="<?php echo base_url('user-csa-component-single-dose');?>">CSA Component Single Dose</a></li>
						</ul>
						<li><a >Adjuvant Usage</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-component-adjuvant');?>">Component Adjuvant</a></li>
							<!-- <li><a href="<?php echo base_url('user-spinal-component-adjuvant');?>">Spinal Component Adjuvant</a></li>
							<li><a href="<?php echo base_url('user-epidural-adjuvant');?>">Epidural Adjuvant</a></li>
							<li><a href="<?php echo base_url('user-spinal-adjuvant');?>">Spinal Adjuvant</a></li>
							<li><a href="<?php echo base_url('user-csa-adjuvant');?>">CSA Adjuvant</a></li> -->
						</ul>
						<!-- <li><a href="">Sensory & Motor Block</a></li> -->
						<!-- <ul>
							<li><a href="<?php echo base_url('user-median-sensory');?>">Median Sensory & Motor Level</a></li>
							<li><a href="<?php echo base_url('user-motor-block');?>">Motor Block Bromage Score</a></li>
						</ul> -->
					</ul>
					<div class="main-tag-sub">
						<p>Outcomes</p>
					</div>
					<ul class="list-a">
						<li><a >Procedure Outcomes</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-procedure-success');?>">Procedure Success</a></li>
							<li><a href="<?php echo base_url('user-technical-problems');?>">Technical Problems</a></li>
							<li><a href="<?php echo base_url('user-acute-problems');?>">Acute Problems</a></li>
							<li><a href="<?php echo base_url('user-OP-Analgesia');?>">Intra Op Analgesia Supplementation</a></li>
							<li><a href="<?php echo base_url('user-IV-Supplements');?>">IV Supplementation</a></li> 
							<li><a href="<?php echo base_url('user-Outcome-characteristics');?>">Other Outcome Characteristics</a></li>
						</ul>
						<li><a >PACU Outcomes</a></li>
						<ul>
							<li><a href="<?php echo base_url('user-Pain-Score');?>">Pain Scores</a></li>
							<li><a href="<?php echo base_url('user-Nausea');?>">Nausea and Vomiting Scores</a></li>
							<li><a href="<?php echo base_url('user-Sedation-Scores');?>">Sedation Scores</a></li>
							<li><a href="<?php echo base_url('user-Recovery');?>">Time Spent in Recovery</a></li>
							<li><a href="<?php echo base_url('user-Analgesia');?>">Analgesia</a></li>
						</ul>
					</ul>
					<div class="main-tag-sub">
						<p>Follow-Up</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('user-stay-duration');?>">Duration of Stay</a></li>
						<li><a href="<?php echo base_url('user-late-complication');?>">Late Complications</a></li>
					</ul>
					<div class="main-tag-sub">
						<p>Feedback</p>
					</div>
				</div><!--left-side-menu-->
			</div><!--col--3-->
			
		
