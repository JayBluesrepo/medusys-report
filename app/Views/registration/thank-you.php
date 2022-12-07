<?php echo view("includes/header-mels"); ?>

<div class="top-dots">
	<?php if($usercheck){ ?>
		<i class="fa fa-check-circle-o fa-lg mr-2" aria-hidden="true" style="color:green;"></i>
	<?php }else{ ?>
		<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
	<?php }; ?>
	<?php if($otpmatched){ ?>
		<i class="fa fa-check-circle-o fa-lg mr-2" aria-hidden="true" style="color:green;"></i>
	<?php }else{ ?>
		<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
	<?php }; ?>
</div>

<section class="thank-you">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="thank-design">
					<div class="reg-left-img">
			 			<img src="<?php echo base_url('public/assets/images/thank-u-img-4.png');?>">
			 		</div>
			 		<div class="reg-right-img" id="right">
			 			<img src="<?php echo base_url('public/assets/images/thank-u-img.png');?>">
			 		</div>
			 		<div class="row lg">
			 			<div class="col-sm-3"></div>
			 			<div class="col-sm-8">
			 				<img src="<?php echo base_url('public/assets/images/thank-u-img-7.png');?>" class="img-fluid d-block mx-auto">
			 			</div>
			 			<div class="col-sm-3"></div>
			 		</div>
			 		<div class="thank-u-mid">
			 			<h1>Thank you for registering</h1>
			 			<img src="<?php echo base_url('public/assets/images/thank-u-img-6.png');?>"><br>
			 			<img src="<?php echo base_url('public/assets/images/thank-u-img-3.png');?>">
			 			<h2 class="login-head-tag">Login details and payment invoice have been mailed to the registered Email ID</h2>
			 			<p class="mobile-app-tag">Download App into your Mobile Phone or Tablet</p>
			 			<a href="https://play.google.com/store/apps/details?id=com.medusys.medusysapp" target="_blank" class="mobile-app-tag"><img src="<?php echo base_url('public/assets/images/thank-u-img-8.png');?>"></a>
			 		</div>
					 <div class="row" id="thank-u" style="text-align:center;display:block;">
						<p>Click below to proceed to login page.</p><br>
						<a href="<?php echo base_url("login")?>">Login<i class="fa fa-arrow-right" aria-hidden="true"></i></a>
					 </div>
			 		<div class="reg-left-img">
			 			<img src="<?php echo base_url('public/assets/images/thank-u-imgs.png');?>">
			 		</div>
			 		<div class="reg-right-img">
			 			<img src="<?php echo base_url('public/assets/images/thank-u-img-4.png');?>" class="thank-4">
			 		</div>
				</div>
			</div>
		</div><!--row-->
	</div>
</section>

<?php echo view("includes/footer-mels"); ?>


<style type="text/css">
	.thank-you{
		 font-family: 'Montserrat', sans-serif!important;
	}
</style>