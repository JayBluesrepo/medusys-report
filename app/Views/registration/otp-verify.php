<?php 
	echo view("includes/header-mels"); 
	$Email = session()->get('mail');
?>

<div class="top-dots">
	<?php if($usercheck){ ?>
		<i class="fa fa-check-circle-o fa-lg mr-2" aria-hidden="true" style="color:green;"></i>
	<?php }else{ ?>
		<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
	<?php }; ?>
	<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
</div>

<section class="otp">
	<div class="container">
		<div class="row">
			<div class="col-sm-6" style="padding:0;">
				<div class="otp-bg-img">
					<div class="reg-left-img">
			 			<img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>">
			 		</div>
			 		<div class="reg-right-img">
			 			<img src="<?php echo base_url('public/assets/images/Arrow-Design.png');?>">
			 		</div>
			 		<div class="reg-content-1">
			 			<h3>Enter your <br> OTP</h3>
			 			<p>An OTP is sent to your registered email id. Please enter the OTP to verify your email to proceed.</p>
			 		</div>
			 		<div class="bottom-img-1">
			 			<div class="row">
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Arrow-Design-2.png');?>" style="padding-top: 140%;" class="arrow-2"></div>
			 				<div class="col-sm-6"><img src="<?php echo base_url('public/assets/images/login-design.png');?>" class="img-fluid d-block mx-auto"></div>
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>" style="padding-top: 90%;" class="circle"></div>
			 			</div>
			 		</div>
				</div><!--otp-bg-img-->
			</div><!--col-6-->
			<div class="col-sm-6" style="padding:0;">
				<div class="otp-verification">
					<form id="check-otp">
						<h3><b>Enter the OTP to verify Email-ID</b></h3>
						<p>Your ID: <span><?php echo $Email ?></span></p>
						<div class="otp-number">
							<input type="number" class="form-control" name="one" maxlength="1" oninput="inputInsideOtpInput(this)">
							<input type="number" class="form-control" name="two" maxlength="1" oninput="inputInsideOtpInput(this)">
							<input type="number" class="form-control" name="three" maxlength="1" oninput="inputInsideOtpInput(this)">
							<input type="number" class="form-control" name="four" maxlength="1" oninput="inputInsideOtpInput(this)">
							<input type="number" class="form-control" name="five" maxlength="1" oninput="inputInsideOtpInput(this)">
							<input type="number" class="form-control" name="six" maxlength="1" oninput="inputInsideOtpInput(this)">
						</div>
						<button type="button" id="mail2" class="btn-resend">Resend OTP</button><br><br>
						<button type="submit" class="btn-regis">Submit</button>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6">
								<div class="btn-otp">
										<button type="button" onclick="goBack()" class="btn-otp">Back</button>
										<!-- <button type="button" class="btn-otp">Cancel</button> -->
									</div>
							</div>
						</div><!--row-->
					</form>
				</div>
			</div><!--col-6-->
		</div><!--row-->
	</div>
</section>

<script>
	
	function inputInsideOtpInput(el) {
		if (el.value.length > 1){
			el.value = el.value[el.value.length - 1];
		}
		try {
			if(el.value == null || el.value == ""){
				this.foucusOnInput(el.previousElementSibling);
			}else {
				this.foucusOnInput(el.nextElementSibling);
			}
		}catch (e) {
			console.log(e);
		}
	}

	function foucusOnInput(ele){
		ele.focus();
		let val = ele.value;
		ele.value = "";
		// ele.value = val;
		setTimeout(()=>{
			ele.value = val;
		})
	}

</script>
<script type="text/javascript">
	function goBack() {
		location.href = '<?php echo base_url("Existing_Member")?>';
	}
	$('#mail2').click(function(){
        $.ajax({
			type : "POST",
            url : '<?php  echo base_url("Resend-otp")?>',
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr.success('check your e-mail','Email has been sent again'); 
                    window.setTimeout(function() {
						history.go(0);
					}, 2000);
                }
                else
                    toastr["error"](response.message);
            }
        });
    });
	$(document).ready(function(){
    	$('#check-otp').submit(function(e){
			e.preventDefault();
			var formData = new FormData(this);
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("checkOtp")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);   
						window.setTimeout(function() {
							window.location = '<?php echo base_url("Thankyou")?>';
						}, 2000);     
					}
					else{
						$('#check-otp')[0].reset();
						toastr["error"](response.message);
					}
				}
			});
		});
	});
</script>

<?php echo view("includes/footer-mels"); ?>


<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
	}

	.otp{
		 font-family: 'Montserrat', sans-serif!important;
	}	 


</style>

