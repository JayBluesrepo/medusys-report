<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url('assets/images/fav_icon.jpg');?>">
	<!------------------------------JS-------------------------------------->
	<!-- <script type="text/javascript" src="<?php// echo base_url('assets/js/bootstrap.min.js');?>"></script> -->
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js');?>"></script>
</head>
<body>
	<section class="login">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="login-form">
						<form id="loginform">
							<img src="<?php echo base_url('assets/images/logo-new.jpg');?>" class="img-fluid d-block mx-auto" style="width: 60%;">
							<h5><b>LOG IN</b></h5>
							<div class="form-group">
								<i class="fa fa-user fa-lg" id="user-icon" aria-hidden="true"></i>
								<input type="text" class="form-control" name="username" id="username" required>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<div class="input-group-append" style="margin-top: -30px;margin-left: 345px;">
									<span onclick="password_show_hide();">
										<i class="fa fa-eye d-none" id="hide_eye"></i>
										<i class="fa fa-eye-slash" id="show_eye"></i>
									</span>
								</div>
							</div>
							<div class="form-check mt-5" style="text-align:initial;">
							  <label class="form-check-label">
							    <input type="checkbox" class="form-check-input" value="">Remember Me
							  </label>
							</div>
							<div class="row" style="padding-top:10px;">
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<button type="submit" class="form-control btn btn-primary submit">Login</button>
								</div>
								<div class="col-sm-3"></div>
							</div>
							<div class="row" style="padding-top:30px;">
								<div class="col-sm-3"></div>
								<div class="col-sm-6">
									<a href="">Forgot Password?</a>
								</div>
								<div class="col-sm-3"></div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-sm-7"></div>
			</div><!--row-->
		</div>
	</section>

<script type="text/javascript">
	function password_show_hide() {

		var x = document.getElementById("password");
		var show_eye = document.getElementById("show_eye");
		var hide_eye = document.getElementById("hide_eye");
		hide_eye.classList.remove("d-none");
		if (x.type === "password") {
			x.type = "text";
			show_eye.style.display = "none";
			hide_eye.style.display = "block";
		} else {
			x.type = "password";
			show_eye.style.display = "block";
			hide_eye.style.display = "none";
		}
	}
</script>
<script src="<?php echo base_url('assets/toastr/toastr.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/toastr/toastr.min.css');?>">
<script type="text/javascript">
	$(document).ready(function(){	
		$('#loginform').submit(function(e){  
			e.preventDefault();
			formdata = new FormData($(this)[0]);
			$(".submit").text("Loading...");
			$(".submit").attr('disabled','disabled');
			$.ajax({
				type   : 'post',
				url    : '<?php echo base_url("Login")?>',
				data   : formdata, 
				contentType: false,
				processData: false,
				success:function(response){
		  			console.log(response);
					response = jQuery.parseJSON(response);
					if(response.result==1){	 
						toastr.success('Welcome to RAD','Log in Successfully', {timeOut: 1000});
						window.setTimeout(function() {
							window.location = '<?php echo base_url("Dashboard")?>';
						}, 2000);
					}
					else if(response.result==2){
						$(".submit").removeAttr('disabled');
						$(".submit").text("Sign-in");
						toastr["error"](response.message);
					}
					else if(response.result==3){
						$(".submit").removeAttr('disabled');
						$(".submit").text("Sign-in");
						toastr["error"](response.message);
					}
					else if(response.result==0)
					{
						$(".submit").removeAttr('disabled');
						$(".submit").text("Sign-in");
						toastr["error"](response.message);
					}
	  			}
			});
	   	});   
	}); 
</script>
</body>
</html>
