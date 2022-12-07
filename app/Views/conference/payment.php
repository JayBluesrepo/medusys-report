<?php 
	echo view("includes/header-mels"); 
	$Email = session()->get('mail');
	$fname = $otpmatched['f_name'];
	$mobile = $otpmatched['mobile'];
?>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
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
	<i class="fa fa-circle-thin fa-lg mr-2" aria-hidden="true"></i>
</div>

<section class="payment">
	<div class="container">
		<div class="row">
			<div class="col-sm-6" style="padding:0;">
				<div class="payment-bg-img">
					<div class="reg-left-img">
			 			<img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>">
			 		</div>
			 		<div class="reg-right-img">
			 			<img src="<?php echo base_url('public/assets/images/Arrow-Design.png');?>">
			 		</div>
			 		<div class="reg-content-2">
			 			<h3>Please complete <br> the payment </h3>
			 			<p>Annual Subscription fee of Rs 3000/- includes access to GAS-Medusys App along with GAS membership. This software is subscribed to you on a non-exclusive, non-assignable, and nontransferable basis. MEDUSYS strives to protect the security and privacy of the users and its product.</p>
			 		</div>
			 		<div class="bottom-img-2">
			 			<div class="row">
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Arrow-Design-2.png');?>" style="padding-top: 140%;"></div>
			 				<div class="col-sm-6"><img src="<?php echo base_url('public/assets/images/payment-img.png');?>" class="img-fluid d-block mx-auto"></div>
			 				<div class="col-sm-3"><img src="<?php echo base_url('public/assets/images/Circle-Design.png');?>" style="padding-top: 90%;"></div>
			 			</div>
			 		</div>
				</div><!--payment-bg-img-->
			</div><!--col-6-->
			<div class="col-sm-6" style="padding:0;">
				<div class="payment-form">
					<form>
						<h3>Payment Method</h3>
						<!-- <a href="<?php //echo base_url('registration/Razorpay'); ?>">Pay from Cards/Banks or UPI</a> -->
						<button id="rzp-button1">Pay from Cards/Banks or UPI</button>
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6">
								<div class="btn-otp">
									<button type="button" onclick='goback()' class="btn-otp">Cancel</button>
								</div>
							</div>
						</div><!--row-->
					</form>
				</div>
			</div><!--col-6-->
		</div><!--row-->
	</div>
</section>
	<?php
        $merchant_order_id  = "ABC-".date("YmdHis");
        $amount             = 3000;
	?>

<script>
	function goback(){
		location.href = '<?php echo base_url("Registration")?>';
	}
</script>	
<script>
	var amt = '<?php echo $amount; ?>';
	var orderid = '<?php echo $merchant_order_id; ?>';
	var options = {
		"key": "rzp_live_s5Af1lyKMeMzZP", // Enter the Key ID generated from the Dashboard
		"amount": "300000", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
		"currency": "INR",
		"name": "Medusys",
		"description": "Transaction",
		"image": "<?php echo base_url('public/assets/images/medusys.jpg');?>",
		"handler": function (response){
			// $.ajax({
			// 	type : "POST",
			//     url : '<?php  echo base_url("pay")?>',
			// 	data : {pay_id:orderid, amount:amt, transaction_id:response.razorpay_payment_id},
			//     success:function(response){
			//         response = jQuery.parseJSON(response);
			//         if(response.result==1){
			//             toastr.success('Thank You','Payment done. UserName and Password is sent to your email....'); 
			//             window.setTimeout(function() {
			// 					window.location = '<?php echo base_url("Thankyou")?>';
			// 			}, 2000); 
			//         }
			//         else
			//             toastr["error"](response.message);
			//     }
			// });
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("pay")?>',
				data : {pay_id:orderid, amount:amt, transaction_id:response.razorpay_payment_id},
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
					swal({
					title: "Welcome!",
					text: "Thank you for registering! Your new account is ready. check your mail for credentials.",
					type: "success",
					confirmButtonText: "Okay"
				},
					function(isConfirm){   
						if(isConfirm){
							$(".sweet-alert").hide();
							$(".sweet-overlay").hide();
							window.location = '<?php echo base_url("Thankyou")?>';
						}
						else 
						{
						$(".sweet-alert").hide();
						$(".sweet-overlay").hide();
						}
					});
					}
					else
						toastr["error"](response.message);
				}
			});
		},
		"prefill": {
			"name": "<?php echo $fname; ?>",
			"email": "<?php echo $Email; ?>",
			"contact": "<?php echo $mobile; ?>"
		},
		"notes": {
			soolegal_order_id: "<?php echo $merchant_order_id; ?>",
		},
		"theme": {
			"color": "#3399cc"
		}
	};
	var rzp1 = new Razorpay(options);
	document.getElementById('rzp-button1').onclick = function(e){
		rzp1.open();
		e.preventDefault();
	}
</script>

<?php echo view("includes/footer-mels"); ?>

<style type="text/css">
	.payment{
		 font-family: 'Montserrat', sans-serif!important;
	}	 
	#modal-inner{
		width: 500px!important;
	}
	#rzp-button1{
		width:500px!important;
	}
</style>