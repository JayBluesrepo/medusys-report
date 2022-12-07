<?php
    echo view('includes/header-obstetric',$patient, $eco, $preo, $posto, $follo, $proccheck, $feedcheck, $focus, $allcheck, $old_check, $old_check);    
?>                	 	
 <!--  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script> -->              
                         <!----------------------------------E-CONSENT START----------------------------->

		<div role="tabpanel" class="tab-pane" id="consent">
			<section class="e-consent">
				<form id="consent-form">
					<!-- <h5><b>Patient E-Consent</b><a href="#" data-toggle="tooltip" data-placement="bottom" title="This section can be used to send electronic consent form to patients by email for use of their data in the quality improvement activity."><i class="fa fa-info-circle" aria-hidden="true"></i></a></h5> -->
					<h5><b>Patient E-Consent</b>
    		 			<div class="tooltip-1">
						   <i class="fa fa-info-circle" aria-hidden="true"></i>
						    <div class="right-1">
						        <div class="text-content-1">
						            <h6>This section can be used to send electronic consent form to patients by email for use of their data in the quality improvement activity.</h6>
						            <i></i>
						        </div>
						    </div>
						</div>
    		 		</h5>

					<p>I hereby give consent to the doctor to utilise my de-identified clinical data from routine activity on Medusys app towards improvement in safety and quality.</p>

					<p>I also give consent to obtain e-feedback regarding patient related outcome measures.</p>

					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-4 custom-check">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="agree" onclick="show()" id="agree" value="agree" checked>
								<label class="form-check-label" for="agree">Agree</label>
							</div>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="optout" id="optout" onclick="hide()" value="optout">
								<label class="form-check-label" for="optout">Opt-out</label>
							</div>
						</div>
						<div class="col-sm-4"></div>
					</div><!--row-->

					<p style="border-bottom: 1px solid lightgrey;padding-bottom: 10px;"><i>Following is the text sent to patients for their consent. Do type an optional message that will also be added to the consent document which will be emailed to the patient.</i></p>

					<div class="row" id="opt_next" style="display:none;">
							<div class="col-sm-10"></div>
							<!-- <div class="col-sm-2"><button type="button" onclick="next_page()" >Next</button></div> -->
					</div>
					

					<div class="email-to-patient">
						<h5><b>Consent Email to Patients</b></h5>
						<h6><b>Hello Sir / Madam,</b></h6>
						<p style="text-align: initial;">Please note that you have provided consent to the doctor to utilize your de-identified clinical data from routine activity on Medusys app towards improvement in safety and quality.</p>
						<h6><b>Message</b></h6>
						<div class="text-patient">
							<input type="text" name="message">
						</div>
						<h6 id="consent-tag"><b>Thank You</b></h6>
						<h6 id="consent-tag"><b>Medusys - Global Anasthaesia Society</b></h6>
						<h6><b>Healthcare Team</b></h6>
						<div class="row">
							<div class="col-sm-10"></div>
							<div class="col-sm-2"><button type="submit">Send Email</button></div>
						</div>
					</div>
				</form>
			</section><!--e-consent-->	
		</div><!---Tab2--->
	<script>

		function show(){
			$(".email-to-patient").show();
			$( "#optout" ).prop( "checked", false );
			$('#opt_next').hide();
			$('.test1').show();			

    	}
		function hide(){
			$(".email-to-patient").hide();
			$( "#agree" ).prop( "checked", false );
			$('#opt_next').show();
			$('.test1').hide();	

    	}
    	function next_page(){
    		location.href = '<?php echo base_url('Preop'); ?>';
    		
    	}
	</script>

<!----------------------------------E-CONSENT START----------------------------->

<script>
	$('#consent-form').submit(function(e){
        e.preventDefault();
		// alert('hi');
		var formData= new FormData(this);
		$.ajax({
			type : "POST",
			data : formData,
			url : "<?php echo base_url("e-mail-obstetrics") ?>",
			contentType: false,
			processData: false,
			success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
					toastr["success"](response.message);   
					$('#consent-form')[0].reset();
					window.location = '<?php echo base_url("obstetrics/E_consentView")?>?id='+response.msg;                  
                }
                else {
					toastr["error"](response.message);
				}                   
            }

		});
	});
</script>

<style type="text/css">
#opt_next button{
	float: right;
    background-color: #2499DB;
    border: 0;
    padding: 5px 30px;
    border-radius: 20px;
    color: #fff;
    cursor: pointer;
    margin-top: 20px;
 }   
</style>

<?php
    echo view('includes/footer-obstetric');    
?>
