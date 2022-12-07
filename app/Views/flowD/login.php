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
	<!------------------------------JS-------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
</head>
<body>
	<section class="login-flow">
		<div class="container">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="login-box">
						<div class="row">
							<div class="col-sm-5">
								<div class="login-left">
									<img src="<?php echo base_url('public/assets/images/login_design_2.png'); ?>" class="img-fluid">
								</div>
							</div>
							<div class="col-sm-7">
								<div class="login-right">
									<img src="<?php echo base_url('public/assets/images/logo-new.jpg'); ?>" class="img-fluid d-block mx-auto" style="width: 60%;">
									<img src="<?php echo base_url('public/assets/images/icon.png'); ?>" class="img-fluid d-block mx-auto">
									<h4 class="txt-center"><b>Login</b></h4>
									<form>
										<label>Email</label>
										<div class="form-group">
											<input type="text" class="form-control" name="">
										</div>
										<label>Password</label>
										<div class="form-group">
											<input type="password" class="form-control" name="">
										</div>
										<div class="form-check">
										  <label class="form-check-label">
										    <input type="checkbox" class="form-check-input" value="">Remember Me
										  </label>
										  <a href="" style="margin-left: 45%;" id="forgot">Forgot Password?</a>
										</div>
										<button type="button" class="btn">Login</button>
										<div class="new-user">
											<a href="">New User ? Create Account</a>
										</div>
										<div class="row links">
											<div class="col-sm-4">
												<a href=""><img src="assets/images/icon-1.png"></a>
												<p>Privacy Policy</p>
											</div>
											<div class="col-sm-4">
												<a href=""><img src="assets/images/icon-2.png"></a>
												<p>T&C Contact Us</p>
											</div>
											<div class="col-sm-4">
												<a href=""><img src="assets/images/icon-3.png"></a>
												<p>Info & Help</p>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</div>
	</section>	
</body>
</html>