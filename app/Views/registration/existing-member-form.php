<?php echo view("includes/header-mels"); ?>

<div class="top-dots">
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
			 			<p>Please enter your registration details below along with assigned <b>GAMER ID</b> Number and press Register Now.  You will be prompted to validate your email id by entering OTP sent to your email.</p>
			 			<p>Annual Subscription includes access to GAS-Medusys App for one year, which includes individual modules in  patient management system, clinical databases, and CME. </p>
			 			<p>This software is subscribed annually to you on a non-exclusive, non-assignable, and nontransferable basis. MEDUSYS strives to protect the security and privacy of the users and its product.</p>
			 			<p class="mb-0">For any queries please contact:
			 			<p class="mb-0"><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=drgmurthy@medusys.in" target="_blank"><b>drgmurthy@medusys.in</b></a></p>	
			 			<p><a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=prashanth@medusys.in" target="_blank"><b>prashanth@medusys.in</b></a></p>
			 			<p>Upon successful completion of registration, login details will be emailed to your email.</p>
			 			<p>Thanks <br> Medusys Team</p>
			 		</div>
			 		<div class="bottom-img" style="padding-top:26%;">
			 			<div class="row">
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Arrow-Design-2.png');?>" class="arrow-2" style="padding-top: 140%;"></div>
			 				<div class="col-sm-6"><img src="<?php echo base_url('public/assets/images/login-design.png');?>" class="img-fluid d-block mx-auto"></div>
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>" class="circle" style="padding-top: 90%;"></div>
			 			</div>
			 		</div>
			 	</div>
			 </div><!--col-6-->
			 <div class="col-sm-6" style="padding:0;">
			 	<div class="new-reg-form">
			 		<form id="existing-user">
			 			<h3><b>Register</b></h3>
			 			<div class="switch">
			 				<h4><b>Existing GAS Member</b></h4>
			 				<div class="togle">
	         					<div class= "box_1">
									<input type="checkbox" class="switch_1" id="new" onclick="new_user()" checked>
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
						<!-- <label>Gamer ID</label>
             			<input type="text" class="form-control" name="gamer_id" style="width:75%;" id="gamer_id" onfocusout="check_id()" required>
						 <small class="gamer1" style="color:red; display:none;">enter proper gamer-Id</small> -->
						 <label>Gamer ID</label>
						<div class="" style="display:flex;">
							<input type="text" class="form-control" value="GAMER"  style="width:20%;" readonly>
							<input type="text" class="form-control" name="gamer_id" id="gamer_id" onfocusout="check_id()" style="width:30%;" required>
						</div>
						<small class="gamer1" style="color:red; display:none;">enter proper gamer-Id</small>
						<div class="">
							<label>First Name</label>
							<input type="text" class="form-control" name="f_name">
						</div>
			 			<label>Last Name</label>
			 			<input type="text" class="form-control" name="l_name">
			 			<label>Mobile</label>
			 			<div class="row">
			 				<div class="col-sm-12"><input id="phone" name="mobile" class="form-control" type="tel"></div>
			 				<!-- <div class="col-sm-9"><input type="text" class="form-control" name=""></div> -->
			 			</div>
			 			<label>Email</label>
			 			<input type="text" class="form-control patient_email_id" name="email" onfocusout="checkemail()" required>
						 <small class="email" style="color:red;display:none;">enter correct email-Id</small>
						 <div class="">
			 				<label>Hospital</label>
			 				<input type="text" class="form-control" name="hospital">
						</div>
			 			<label>City</label>
			 			<input type="text" class="form-control" name="city">
			 			<label>Country</label><br>
			 			<input type="text" class="form-control" id="country_selector" name="country" style="width:145%!important;">
			 			<div class="form-check">
						  <label class="form-check-label">
						    <input type="checkbox" class="form-check-input" id="term" onclick="checkterms()">Agree with Terms & Conditions
						  </label>
						</div>
						<small class="terms" style="color:red; display:none;">please tick the checkbox</small>
						<h5><b>USER TERMS</b></h5>
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

<script type="text/javascript" src="<?php echo base_url('public/assets/js/countrySelect.js'); ?>"></script>
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

<script type="text/javascript">
	$("#country_selector").countrySelect();

	function checkemail(){
        var email = $('.patient_email_id').val();
		if(email){
			if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
				$('.email').hide();
				$.ajax({
					type : 'POST',
					url  : '<?php echo base_url("checkMail")?>',
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
	function new_user(){
		var newuser = $('#new').is(':checked');
		if(!newuser){
			window.location = '<?php echo base_url("Registration")?>';
		}	
	}
	function check_id(){

		var gamer = 'GAMER';
		var id_gamer_value = $('#gamer_id').val();
		var id_gamer = gamer+''+id_gamer_value;
		// alert(id_gamer);

		if(id_gamer){
			$.ajax({
				type : 'POST',
				url  : '<?php echo base_url("existingMember")?>',
				data : {id_gamer:id_gamer},           

				success:function(response){

					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message); 
						// $('.gamer1').hide();                   
					}
					else{
						toastr["error"](response.message);
						// $('.gamer1').show();                   
					} 
				}
			});
		}
	}
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#existing-user').submit(function(e){
		e.preventDefault();
		var abc = '';
		var gamer = $(".gamer1").is(":hidden");
		var mail = $(".email").is(":hidden");
		if(!(gamer)){
			toastr.error('enter gamer-Id please');
        }
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
		if((abc) && (gamer) && (mail)){
			var formData = new FormData(this);
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("checkUser")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);   
						window.setTimeout(function() {
							window.location = '<?php echo base_url("Check-User-OTP")?>';
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


<?php echo view("includes/footer-mels"); ?>


<style type="text/css">
.new-reg-main{
	 font-family: 'Montserrat', sans-serif!important;
}	 
</style>
