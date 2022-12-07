<?php echo view("includes/header-mels"); ?>

<div class="top-dots">
	<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
	<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
	<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
</div>

<section class="new-reg-main">
	<div class="container">
		<div class="row">
			 <div class="col-sm-6" style="padding:0;">
			 	<div class="reg-form-bg">
			 		<div class="reg-left-img">
			 			<img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>">
			 		</div>
			 		<div class="reg-right-img">
			 			<img src="<?php echo base_url('public/assets/images/Arrow-Design.png');?>">
			 		</div>
			 		<div class="reg-content">
			 			<h3>Welcome to Medusys Registration Page</h3>
			 			<p>Please enter your registration details below and press Register Now.  You will be prompted to validate your email id by entering OTP sent to your email.</p>
			 			<p>Then you will be directed to payments page to make payment towards GAS Membership and annual subscription for accessing Medusys-GAS App.</p>
			 			<p>Annual Subscription fee of Rs 3000/- includes access to GAS-Medusys App  for one year, which includes individual modules in patient management system, clinical databases, and CME.</p>
			 			<p>This software is subscribed annually to you on a non-exclusive, non-assignable, and nontransferable basis. MEDUSYS strives to protect the security and privacy of the users and its product.</p>
			 			<p>Upon successful completion of registration and payment, login details will be emailed to your email.</p>
			 			<p>Thanks <br> Medusys Team</p>
			 		</div>
			 		<div class="bottom-img">
			 			<div class="row">
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Arrow-Design-2.png');?>" class="arrow-2" style="padding-top: 140%;"></div>
			 				<div class="col-sm-6"><img src="<?php echo base_url('public/assets/images/login-design.png');?>" class="img-fluid d-block mx-auto"></div>
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>" class="circle" style="padding-top: 90%;"></div>
			 			</div>
			 		</div>
			 	</div><!--reg-form-bg-->
			 </div><!--col-6-->
			 <div class="col-sm-6" style="padding:0;">
			 	<div class="new-reg-form">
			 		<form id="new-user">
			 			<h3><b>Register</b></h3>
			 			<div class="switch">
			 				<h4><b>Existing GAS Member</b></h4>
			 				<div class="togle">
	         					<div class= "box_1">
									<input type="checkbox" class="switch_1" id="exist" onclick="existing()">
								</div>
							</div>
			 			</div>
			 			<p>Select</p>
			 			<div class="form-group">
			 				<select class="form-control" id="" name="member" style="width:30%;">
						        <option>Doctor</option>
						        <option></option>
						        <option></option>
						        <option></option>
						    </select>
			 			</div>
			 			<label>First Name</label>
			 			<input type="text" class="form-control" name="f_name">
			 			<label>Last Name</label>
			 			<input type="text" class="form-control" name="l_name">
			 			<label>Mobile</label>
			 			<div class="row">
			 				<div class="col-sm-12"><input id="phone" name="mobile" class="form-control" type="tel" style="width: 145%;"></div>
			 			</div>
			 			<label>Email</label>
			 			<input type="text" class="form-control patient_email_id" name="email"  onfocusout="checkemail()" required>
						<small class="email" style="color:red;display:none;">enter correct email-Id</small>
						<div class="">
							<label>Hospital</label>
							<input type="text" class="form-control" name="hospital">
						</div>
			 			<label>City</label>
			 			<input type="text" class="form-control" name="city">
			 			<label>Country</label><br>
			 			<input type="text" class="form-control" id="country_selector" name="country" style="width: 145%;">
			 			<div class="form-check">
						  <label class="form-check-label">
						    <input type="checkbox" class="form-check-input" id="term" onclick="checkterms()">Agree with Terms & Conditions
						  </label>
						</div>
						<small class="terms" style="color:red; display:none;">please tick the checkbox</small>
						<h5 class="user-tag"><b>USER TERMS</b></h5>
						<div class="agmt-links">
							<ul>
							<?php
							$googleDocs = "https://docs.google.com/viewer?url=";
							?>
								<li><a href="<?php echo $googleDocs.base_url('public/Medusys_Subscription_Agreement.pdf');?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Subscription Details</a></li>
								<li><a href="<?php echo $googleDocs.base_url('public/Medusys_Refund_Cancellation_Policy.pdf');?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Refund,Cancellation,Return,Shipping Policy</a></li>
								<li><a href="<?php echo $googleDocs.base_url('public/Medusys_Terms_Conditions_Policy.pdf');?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Terms & Conditions</a></li>
								<li><a href="<?php echo $googleDocs.base_url('public/Medusys_Privacy_Policy.pdf');?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Privacy Policy</a></li>
								<li><a href="<?php echo $googleDocs.base_url('public/Medusys_End_User_License_Agreement.pdf');?>" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>End User License Agreement(EULA)</a></li>
							</ul>
						</div>
						<button type="submit" class="btn-regis">Register Now</button>
			 		</form>
			 	</div><!--new-reg-form-->
			 </div><!--col-6-->
		</div><!--row-->
	</div><!--container-->
</section>


<?php echo view("includes/footer-mels"); ?>

<style type="text/css">
.new-reg-main{
	 font-family: 'Montserrat', sans-serif!important;
}	 
</style>

<script type="text/javascript" src="<?php echo base_url('public/assets/js/intlTelInput.js'); ?>"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      autoPlaceholder: "on",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
    
      utilsScript: "<?php echo base_url('public/assets/js/utils.js'); ?>",

    });
  </script>

  <script type="text/javascript" src="<?php echo base_url('public/assets/js/countrySelect.js'); ?>"></script>
<script type="text/javascript">
	$("#country_selector").countrySelect();

	function existing(){
		var exist = $('#exist').is(':checked');
		if(exist){
			window.location = '<?php echo base_url("Existing_Member")?>';
		}	
	}

	function checkemail(){
        var email = $('.patient_email_id').val();
		if(email){
			if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
				$('.email').hide();
				$.ajax({
					type : 'POST',
					url  : '<?php echo base_url("check-mail")?>',
					data : {email:email},           

					success:function(response){

						response = jQuery.parseJSON(response);
						if(response.result==0){
							toastr["error"](response.message); 
							$('.email').show();                   
						}
						else{
							toastr["success"](response.message);
							$('.email').hide();                   
						} 

					}
				});
			}else{
				$('.email').show();	
			}
		}
    }
	function checkterms(){
		var terms = $('#term').is(':checked');
		if((terms)){
            $('.terms').hide();
        }
	}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#new-user').submit(function(e){
		e.preventDefault();
		var abc = '';
		var mail = $(".email").is(":hidden");
		if(!(mail)){
			toastr.error('email id already exist');
        }
		var terms = $('#term').is(':checked');
		if(!(terms)){
            $('.terms').show();
			toastr.error('Agree to the terms and conditions. Please!');
        }
        else{
            abc = true;
        }
		if((abc) && (mail)){
			var formData = new FormData(this);
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("addUser")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);   
						window.setTimeout(function() {
							window.location = '<?php echo base_url("New-User-OTP")?>';
						}, 2000);     
					}
					else
						toastr["error"](response.message);	
				}
			});
		}
	});
});
</script>