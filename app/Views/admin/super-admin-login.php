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
<section class="super-login">
	<div class="img">
		 <img src="<?php echo base_url('public/assets/images/medusys-right-img.png');?>" style="position: absolute;right: 0;top: 22px;">
		 <img src="<?php echo base_url('public/assets/images/medusys-left-img.png');?>" style="position: absolute;top: 400px;">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<img src="<?php echo base_url('public/assets/images/m-logo.png');?>" class="img-fluid d-block mx-auto">
				 	<div class="super-login-box">
				 	 	<img src="<?php echo base_url('public/assets/images/icon.png');?>" class="img-fluid d-block mx-auto">
				 	 	<h4>Login</h4>
						<form id="loginform">
							<label>Email</label>
							<div class="form-group">
								<input type="text" class="form-control mail" name="username" id="username" required>
							</div>
							<label>Password</label>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<div class="input-group-append" id="eye-login" style="margin-top: -25px;margin-left: 450px;">
									<span onclick="password_show_hide();">
										<i class="fa fa-eye d-none" id="hide_eye"></i>
										<i class="fa fa-eye-slash" id="show_eye"></i>
									</span>
								</div>
							</div>
							<!-- <div class="login-footer">
								<div class="form-check">
								<label class="form-check-label">
									<input type="checkbox" class="form-check-input" id = "remember" name = "remember" value="">Remember Me
								</label>
								</div>
							</div> -->
							<div class="row">
								<div class="col-sm-4"></div>
								<div class="col-sm-4" style="text-align: center;"><button type="submit" class="btn submit">Login</button></div>
								<div class="col-sm-4"></div>
							</div>
						</form>
				 	</div>
				</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</section>

<script>
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



<script src="<?php echo base_url('public/assets/toastr/toastr.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css');?>">

<script type="text/javascript">

	$(document).ready(function(){	

		 // $('#remember').click(function() {
   //          if ($('#remember').is(':checked')) {
   //              localStorage.username = $('#username').val();
   //              localStorage.password = $('#password').val();
               
   //              localStorage.chkbx = $('#remember').val();
   //          } else {
   //              localStorage.usrname = '';
   //            	localStorage.password = '';
   //              localStorage.chkbx = '';
   //          }
   //      });

		 // if (localStorage.username && localStorage.username != '') {
   //          $('#remember').attr('checked', 'checked');
   //          $('#username').val(localStorage.username);
   //          $('#password').val(localStorage.password);
           
   //      } else {
   //          $('#remember').removeAttr('checked');
   //          $('#username').val('');
   //          $('#password').val('');
   //      }




		$('#loginform').submit(function(e){  
			e.preventDefault();
			formdata = new FormData($(this)[0]);
			$(".submit").text("Loading...");
			$(".submit").attr('disabled','disabled');
			$.ajax({
				type   : 'post',
				url    : '<?php echo base_url("Super-Admin-Login")?>',
				data   : formdata, 
				contentType: false,
				processData: false,
				success:function(response){
		  			console.log(response);
					response = jQuery.parseJSON(response);
					if(response.result==1){	

						toastr.success('Welcome to MEDUSYS','SUPER ADMIN', {timeOut: 1000});
						// console.log(response.login_count);
						window.setTimeout(function() {
							window.location = '<?php echo base_url("Super-Admin-Dashboard")?>';
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
					else if(response.result==0){
						$(".submit").removeAttr('disabled');
						$(".submit").text("Sign-in");
						toastr["error"](response.message);
					}
					else if(response.result==4){
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