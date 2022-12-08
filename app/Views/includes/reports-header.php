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
						<a href="">Consolidated Reports</a>
					</div>
					<div class="main-tag-sub">
						<p>Audit Reports</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('n_report');?>">Audit Results</a></li>
					</ul>
					<div class="main-tag-sub">
						<p>Patient Characteristics</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('demography');?>">Patient Demography</a></li>
						<li><a href="<?php echo base_url('asa');?>">ASA Classification</a></li>
						<li><a href="<?php echo base_url('morbid');?>">Co-Morbid Conditions</a></li>
					</ul>
					<div class="main-tag-sub">
						<p>Procedure</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('safety');?>">Clinical Safety Standards</a></li>
						<!-- <li><a href="https://medusys.in/safety');?>">Clinical Safety Standards</a></li> -->
						<li>Surgery Details</li>
						<ul class="list-a">
							<li><a href="<?php echo base_url('surgery');?>">Surgery Details</a></li>							
							<li><a href="<?php echo base_url('speciality');?>">Surgical Specialty</a></li>
							<li><a href="<?php echo base_url('location');?>">Surgical Location</a></li>
							<li><a href="<?php echo base_url('purpose');?>">Purpose of CNB</a></li>
							<li><a href="<?php echo base_url('anasthetic');?>">Anaesthetist Experience</a></li>
							<li><a href="<?php echo base_url('supervision');?>">Supervision</a></li>
							<li><a href="<?php echo base_url('patient_status');?>">Patient Status During Procedure</a></li>
							<li><a href="<?php echo base_url('sedation');?>">Sedation Score</a></li>
							<li><a href="<?php echo base_url('Patientpositon');?>">Patient Position During CNB</a></li>
						</ul>
						<li>Techniques</li>
						<ul>
							<li><a href="<?php echo base_url('cse-technique');?>">CSE Technique</a></li>
							<li><a href="<?php echo base_url('csa-technique');?>">CSA Technique</a></li>
						</ul>
						<li>Other Procedure Characteristics</li>
						<ul>
							<li><a href="<?php echo base_url('sterility_features');?>">Sterility Features & Skin Prep</a></li>
							<li><a href="<?php echo base_url('ultra_sound');?>">Ultrasound Use & Image Quality</a></li>
							<li><a href="<?php echo base_url('vertibral-intraspace');?>">Vertebral Interspace Level</a></li>
							<li><a href="<?php echo base_url('anatomical');?>">Anatomical Landmark</a></li>
							<li><a href="<?php echo base_url('approach');?>">Approach</a></li>
							<li><a href="<?php echo base_url('no-attempts');?>">Number of Attempts</a></li>
						</ul>
						<!-- <li><a href="<?php echo base_url('technique');?>">Epidural Technique</a></li> -->
						<li>Needle Details</li>
						<ul>
							<!-- <li><a href="<?php echo base_url('epidural-needle');?>">Needle Details Type & Size</a></li> -->
							<!-- <li><a href="<?php echo base_url('spinal-needle');?>">Spinal Needle Details Type & size</a></li>
							<li><a href="<?php echo base_url('csa-needle');?>">CSA Needle Details Type & size</a></li> -->
							<li><a href="<?php echo base_url('needle_brand');?>">Needle Brand</a></li>
						</ul>
						<li>LA Utilisation</li>
						<ul>
							<li><a href="<?php echo base_url('epiduralLA');?>">Epidural Space LA</a></li>
							<li><a href="<?php echo base_url('csaLA');?>">Spinal Space LA</a></li>
						</ul>
						<li>Total Intra Operative LA Dosage</li>
						<ul>
							<li><a href="<?php echo base_url('epidural-component-single-dose');?>">Epidural Component Single Dose</a></li>
							<li><a href="<?php echo base_url('epidural-component-sala-dose');?>">Epidural Component  SALA Combo Dose</a></li>
							<li><a href="<?php echo base_url('spinal-component-single-dose');?>">Spinal Component Single Dose</a></li>
							<li><a href="<?php echo base_url('spinal-component-combo-dose');?>">Spinal Component Combo Dose</a></li>
							<li><a href="<?php echo base_url('epidural-single-dose');?>">Epidural Single Dose</a></li>
							<li><a href="<?php echo base_url('epidural-sala-combo-dose');?>">Epidural SALA Combo Dose</a></li>
							<li><a href="<?php echo base_url('spinal-dose');?>">Spinal Component Single Dose</a></li>
							<li><a href="<?php echo base_url('spinal-combo-dose');?>">Spinal Component Combo Dose</a></li>
							<li><a href="<?php echo base_url('csa-component-single-dose');?>">CSA Component Single Dose</a></li>
						</ul>
						<li>Adjuvant Usage</li>
						<ul>
							<li><a href="<?php echo base_url('component-adjuvant');?>">Component Adjuvant</a></li>
							<!-- <li><a href="<?php echo base_url('spinal-component-adjuvant');?>">Spinal Component Adjuvant</a></li>
							<li><a href="<?php echo base_url('epidural-adjuvant');?>">Epidural Adjuvant</a></li>
							<li><a href="<?php echo base_url('spinal-adjuvant');?>">Spinal Adjuvant</a></li>
							<li><a href="<?php echo base_url('csa-adjuvant');?>">CSA Adjuvant</a></li> -->
						</ul>
						<!-- <li><a href="">Sensory & Motor Block</a></li> -->
						<!-- <ul>
							<li><a href="<?php echo base_url('median-sensory');?>">Median Sensory & Motor Level</a></li>
							<li><a href="<?php echo base_url('motor-block');?>">Motor Block Bromage Score</a></li>
						</ul> -->
					</ul>
					<div class="main-tag-sub">
						<p>Outcomes</p>
					</div>
					<ul class="list-a">
						<li>Procedure Outcomes</li>
						<ul>
							<li><a href="<?php echo base_url('procedure-success');?>">Procedure Success</a></li>
							<li><a href="<?php echo base_url('technical-problems');?>">Technical Problems</a></li>
							<li><a href="<?php echo base_url('acute-problems');?>">Acute Problems</a></li>
							<li><a href="<?php echo base_url('OP-Analgesia');?>">Intra Op Analgesia Supplementation</a></li>
							<li><a href="<?php echo base_url('IV-Supplements');?>">IV Supplementation</a></li> 
							<li><a href="<?php echo base_url('Outcome-characteristics');?>">Other Outcome Characteristics</a></li>
						</ul>
						<li>PACU Outcomes</li>
						<ul>
							<li><a href="<?php echo base_url('Pain-Score');?>">Pain Scores</a></li>
							<li><a href="<?php echo base_url('Nausea');?>">Nausea and Vomiting Scores</a></li>
							<li><a href="<?php echo base_url('Sedation-Scores');?>">Sedation Scores</a></li>
							<li><a href="<?php echo base_url('Recovery');?>">Time Spent in Recovery</a></li>
							<li><a href="<?php echo base_url('Analgesia');?>">Analgesia</a></li>
						</ul>
					</ul>
					<div class="main-tag-sub">
						<p>Follow-Up</p>
					</div>
					<ul class="list-a">
						<li><a href="<?php echo base_url('stay-duration');?>">Duration of Stay</a></li>
						<li><a href="<?php echo base_url('late-complication');?>">Late Complications</a></li>
					</ul>
					<div class="main-tag-sub">
						<p>Feedback</p>
					</div>
				</div><!--left-side-menu-->
			</div><!--col--3-->
			
		
