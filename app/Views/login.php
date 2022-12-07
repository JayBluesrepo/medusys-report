<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no,width=device-width, initial-scale=1,maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/main.css'); ?>">
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
									<form id="loginform">
										<label>Email</label>
										<div class="form-group mb-3">
											<!-- <input type="text" class="form-control" name=""> -->
											<input type="text" class="form-control mail" name="username" id="username" onfocusout="check_email()" required>
											<input type="hidden" class="form-control" id="permission">

										</div>
										<label>Password</label>
										<div class="form-group">
											<!-- <input type="password" class="form-control" name=""> -->
											<input type="password" class="form-control" id="password" name="password" placeholder="Password">
											<div class="input-group-append" id="eye-login" style="margin-top: -25px;margin-left: 345px;">
												<span onclick="password_show_hide();">
													<i class="fa fa-eye d-none" id="hide_eye"></i>
													<i class="fa fa-eye-slash" id="show_eye"></i>
												</span>
											</div>
										</div>
										<div class="form-check mt-4" id="forgot">
										  <!-- <label class="form-check-label">
										    <input type="checkbox" class="form-check-input" id = "remember" name = "remember" value="">Remember Me
										  </label> -->
										  <a onclick="Forgot()" class="login-forgot" style="/*margin-left: 40%;*/cursor: pointer;" >Forgot Password?</a>
										</div>
										<button type="submit" class="btn submit">Login</button>
										<div class="new-user">
											<a href="<?php echo base_url('Registration'); ?>">New User ? Create Account</a>
										</div>
										<div class="row links">
											<?php
											$googleDocs = "https://docs.google.com/viewer?url=";
											?>
											<div class="col-sm-4">
												<a href="<?php echo $googleDocs.base_url('public/Medusys_Privacy_Policy.pdf');?>" target="_blank"><img src="<?php echo base_url('public/assets/images/icon-1.png'); ?>"></a>
												<p>Privacy Policy</p>
											</div>
											<div class="col-sm-4">
												<a href="<?php echo $googleDocs.base_url('public/Medusys_Terms_Conditions_Policy.pdf');?>" target="_blank"><img src="<?php echo base_url('public/assets/images/icon-2.png'); ?>"></a>
												<p>T&C</p>
											</div>
											<div class="col-sm-4">
												<a href="help-center.html"><img src="<?php echo base_url('public/assets/images/icon-3.png'); ?>"></a>
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
   //          	alert('hello');
   //              localStorage.usrname = '';
   //              localStorage.password = '';
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
				url    : '<?php echo base_url("Login")?>',
				data   : formdata, 
				contentType: false,
				processData: false,
				success:function(response){
		  			console.log(response);
					response = jQuery.parseJSON(response);
					if(response.result==1){	 
						toastr.success('Welcome to MEDUSYS','Log in Successfully', {timeOut: 1000});

						console.log(response.login_count);

						if(response.login_count == 0){
							window.setTimeout(function() {
								window.location = '<?php echo base_url("dashboard")?>';
							}, 2000);
						}else{
							window.setTimeout(function() {
								window.location = '<?php echo base_url("Gas")?>';
							}, 2000);
						}
						
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
					else if(response.result==4)
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

<script>

	function check_email(){
		var email = $('.mail').val();
        // alert(email);

        $.ajax({
            type : 'POST',
            url  : '<?php echo base_url("check-email-login")?>',
            data : {email:email},           

            success:function(response){

                response = jQuery.parseJSON(response);
                if(response.result==1){
                    // toastr["error"](response.message);  
					$('#permission').val(0);                         
                }
                else{
                    // toastr["error"](response.msg);  
					$('#permission').val(1);                         
                } 

            }
        });
	}
	 
	function Forgot(){
		
		var email = $('.mail').val();
		var permission = $('#permission').val();

		// alert(permission);
		// if(email == ''){
		// 	toastr.error('Enter Email');
		// }
		if(permission == 1){

			toastr.error('Register to login');			

		}else if(email == ''){
			toastr.error('Enter Email');
		}else{

			$.ajax({
				type : 'POST',
				url  : '<?php echo base_url("Forgot-Password")?>',
				data : {email:email}, 

				success:function(response){

					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);
						window.location = '<?php echo base_url("registration/Forgot_OTP")?>';
						// document.querySelector(".patient_id").style.borderColor = "red";
						// document.querySelector(".patient_id").style.backgroundColor  = "#ffe6e6";                    
					}
					else{
						toastr["error"](response.message);
						// document.querySelector(".patient_id").style.borderColor = "green";
						// document.querySelector(".patient_id").style.backgroundColor  = "#e6ffe6";                   
					} 

				}
			});
			
		}
	}

</script>
</body>
</html>

