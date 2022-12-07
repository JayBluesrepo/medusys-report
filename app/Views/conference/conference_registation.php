<?php
    echo view('includes/flow-header');    
?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>


<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">


<section class="registration-flow">
    <div class="row">
        <div class="col-sm-3">
             <div class="conference-left">
                <ul>
                    <li><a href="">Conferences & Workshops</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('conference-workshops');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="conference-right">
                 <div class="con-head">
                    <div class="row" id="conf-bt">
                        <div class="col-sm-5">
                            <div class="conf-left-text">
                                <h5>Conferences & Workshops</h5>
                            </div>
                        </div>
                     <!--   <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="search" name="">
                        </div> -->
                    </div><!----->
                 </div>
                 <div class="next d-sm-none">
                     <a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Next</a>
                 </div>
                <header class="cf pt-4">
                    <div class="navigation">
                        <nav>
                            <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                            <ul class="mobimenu">
                                <li><a href="<?php echo base_url('/Conference-Details?id='.$val['conference_id']); ?>">About</a></li>
                                <li ><a href="<?php echo base_url('/Programs?id='.$val['conference_id']); ?>">Program Schedule</a></li>
                                <li><a href="<?php echo base_url('/Faculty-Details?id='.$val['conference_id']); ?>">Faculty</a></li>
                                <li class="conf-act"><a href="<?php echo base_url('/Registration-Details?id='.$val['conference_id']); ?>">Registration</a></li>  
                                <li ><a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Attend</a></li>
                                <li><a href="<?php echo base_url('/Feedback?id='.$val['conference_id']); ?>">Feedback</a></li>
                                <li><a href="<?php echo base_url('/Certificate?id='.$val['conference_id']); ?>">Certificate</a></li> 
                            </ul>
                        </nav>
                    </div>
                </header>
            </div><!--conference-right--->
            <div class="container">
                <div class="col-12 pt-5">
                  <p class="ft"><b>We appreciate your interest in attending this conference.</b></p>
                  <p class="ft"><b>Please find the Registration fee details given below.  We request you to make the payment to activate the Attend, Feedback and Certificate Tabs.</b></p>
                  <p class="ft"><b>Your Name and other credentials will be same as GAS Medusys Membership.</b></p>  
                </div>
               
                    <div class="row pt-5">
                        <div class="col-sm-8">
                            <div class="table-responsive">
				<input type = "hidden" value = "<?php echo $val['conference_id']; ?>" name = "conference_id">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td><p><?php echo $val['title']; ?></p></td>
                                        </tr>
                                        <tr>
                                            <td>Registration Fee</td>
                                            <td><p><?php echo $val['reg_fee']; ?></p></td>
                                        </tr>
                                        <tr>
                                            <td>Registration Details</td>
                                            <td><p><?php echo $val['reg_details']; ?></p></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div><!----------->
                    <?php if($val['reg_fee'] > 0){
                    	if($payment['amount'] > 0){
                    		?>
                    		<div class="row pt-5">
	                        <div class="col-sm-3"></div>
	                        <div class="col-sm-6" style="text-align: center;">
	                            <button> <a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Already Paid...Please Attend</a></button>
	                        </div>
	                        <div class="col-sm-3"></div>
	                    ``</div>
	                    <?php
                    	}
                    	else{
                    	?> 
	                    <div class="row pt-5">
	                        <div class="col-sm-3"></div>
	                        <div class="col-sm-6" style="text-align: center;">
	                            <p>Pay securely via Card/Net Banking/UPI/Wallet via Razor pay.</p>
	                             <button id="rzp-button1">Pay from Cards/Banks or UPI</button>
	                        </div>
	                        <div class="col-sm-3"></div>
	                    </div><!------>
	                    <?php
	                	}
                	}
                	else{
                		?>
                		<div class="row pt-5">
	                        <div class="col-sm-3"></div>
	                        <div class="col-sm-6" style="text-align: center;">
	                            <button> <a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Attend</a></button>
	                        </div>
	                        <div class="col-sm-3"></div>
	                    </div><!------>	
	                    <?php
                	}
                	?>
                
            </div>
        </div><!--col--9-->
    </div>  
</section>


</section>
	<?php
        $merchant_order_id  = "ABC-".date("YmdHis");
        $amount             = $val['reg_fee'];
	?>

<script>
	function goback(){
		location.href = '<?php echo base_url("Registration")?>';
	}
</script>	
<script>
	var amt = '<?php echo $amount; ?>';
	var amount_pay = '<?php echo ((int)$amount*(int)100); ?>';
	var orderid = '<?php echo $val['conference_id']; ?>';
	var options = {
		"key": "rzp_live_s5Af1lyKMeMzZP", // Enter the Key ID generated from the Dashboard
		"amount": amount_pay, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
		"currency": "INR",
		"name": "Medusys",
		"description": "Medusys - Conference",
		"image": "<?php echo base_url('public/assets/images/medusys.jpg');?>",
		"handler": function (response){
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("Conference-pay")?>',
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
							window.location = '<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>';
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

		var conf_id = '<?php echo $val['conference_id']; ?>';
		// alert(conf_id);

		$.ajax({
			type : "POST",
			url : '<?php  echo base_url("conferenceAttendUser")?>?id='+conf_id,
			// data : formData,		
		});
	}

	// $('#rzp-button1').click(function(){
	// 	// alert('hi');

	// });
</script>

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
<?php
    echo view('includes/flow-footer');    
?>