<?php
    echo view('includes/header',$patient, $pre, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>
 <!--  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script> -->
<!-----------------------------------------ADD PRE-OP START------------------------->
<div role="tabpanel" class="tab-pane" id="profile">
	<section class="add-preop">
		<form id="add-preop">
			<h3>Add Pre-op</h3>
			<div class="row">
				<div class="col-sm-2"><label>Speciality<span class="mandat">*</span></label></div>
				<div class="col-sm-6">
					<div class="form-group">
						<select class="form-control" id="speciality" name="speciality" onfocusout="checkspl()">
							<option>Select</option>
							<option>General Surgery</option>
							<option>Gynaecology</option>
							<option>Orthopaedics</option>
							<option>Plastic surgery</option>
							<option>Cardiothoracic surgery</option>
							<option>Vascular Surgery</option>
							<option>Neuro-spine</option>
							<option>Urology</option>
							<option>Other</option>
						</select>
						<small class="spl" style="color:red; display:none;">Please enter speciality</small>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Surgery Location<span class="mandat">*</span></label></div>
				<div class="col-sm-6">
					

					<!-- <input type="text" class="form-control" name="sur_location" id="sur_location" list="sur_location_datalist" placeholder="--Select--" onfocusout="checksul()" > -->
					<select  class="form-control" name="sur_location" id="sur_location" onfocusout="checksul()">		
						<option value="select">select</option>				
						<?php
						    foreach($master_type as $key=>$master){
								
						?>
							
						    <option value= "<?php echo $master['id']; ?>-<?php echo $master['master_type']; ?>"><?php echo $master['master_type']; ?></option>
                         	
                        <?php
                         }
						?>
					</select>
					<small class="sul" style="color:red; display:none;">Please enter surgery location</small>

				</div>
				<div class="col-sm-4"></div>
			</div><!--row-->
			<div class="row mb-3">
				<div class="col-sm-2"><label>Surgery</label></div>
				<div class="col-sm-10">
					<!-- <input type="text" class="form-control" name="surgery">
					<input list="browsers" class="form-control" name="browser" id="browser" style="margin:15px 0;">
					<datalist id="browsers">
					<option value="Edge">
					<option value="Firefox">
					<option value="Chrome">
					<option value="Opera">
					<option value="Safari">
					</datalist> -->
					<input type="text" list="surgery_option" class="form-control" id="surgery_option_input" placeholder="--Select--" name="surgery" >
					
					<datalist id="surgery_option" >
										
						
					</datalist>
					<small class="sur" style="color:red; display:none;">Please enter surgery</small>
				</div>
				<!-- <div class="col-sm-4"></div> -->
			</div><!--row-->
			<!-- <div class="row pt">
				<div class="col-sm-2"></div>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="">
				</div>
			</div> -->
			<div class="row">
				<div class="col-sm-2">
					<label>Minimally invasive
     					<div class="tooltip-2">
						   <i class="fa fa-info-circle" aria-hidden="true"></i>
						    <div class="right-2">
						        <div class="text-content-2">
						            <h6>Thoroscopic,laproscopic,arthoscopic with or without semi-open.</h6>
						            <i></i>
						        </div>
						    </div>
						</div>
     				</label>
				</div>
				<div class="col-sm-4 pt" id="add-minimal">
					<div class= "box_1">
						<input type="hidden" class="switch_1" value="No" name="min_invas">
						<input type="checkbox" class="switch_1"  value="Yes" name="min_invas">
					</div>
				</div>
				<div >
				</div>
				<div class="col-sm-6"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-3">
					<label>Operation/Procedure Category<span class="mandat">*</span></label>
				</div>
				<div class="col-sm-4">
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Emergency" id="option-1" name="optradio">Emergency
						</label>
					</div>
					<div class="form-check-inline">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Elective" id="option-2" name="optradio">Elective
						</label>
					</div>
					<div class="form-check-inline">
						<small class="opc" style="color:red; display:none;">Please enter operation/procedure category</small>
					</div>
				</div>
				<div class="col-sm-5"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>ASA</label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control" name="asa">
							<option>Select</option>
							<option>ASA 1</option>
							<option>ASA 2</option>
							<option>ASA 3</option>
							<option>ASA 4</option>

						</select>
					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Co-morbid Conditions</label></div>
				<div class="col-sm-10">
					<div class="t-switch">
						<ul>
							<li>
								<div class="togle">
									<label>Diabetes Mellitus</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Mellitus">
										<input type="checkbox" class="switch_1" value="Yes" name="Mellitus">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>CVS disease</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="CVS">
										<input type="checkbox" class="switch_1" value="Yes" name="CVS">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Respiratory disease</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Respi">
										<input type="checkbox" class="switch_1" value="Yes" name="Respi">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul>
							<li>
								<div class="togle">
									<label>Fever / Infection</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Fever">
										<input type="checkbox" class="switch_1" value="Yes" name="Fever">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Renal Disorders</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Renal">
										<input type="checkbox" class="switch_1" value="Yes" name="Renal">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<!-- <label>Bleeding disorder<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="For Bleeding disorder includes but not limited to Anti-Coagulation/Coagulopathy, Anti-platelet agent/platelet disorder, Vascular disorder"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->
									<label>Bleeding disorder
		         					<div class="tooltip-3">
									   <i class="fa fa-info-circle" aria-hidden="true"></i>
									    <div class="right-3">
									        <div class="text-content-3">
									            <h6>For Bleeding disorder includes but not limited to Anti-Coagulation/Coagulopathy, Anti-platelet agent/platelet disorder, Vascular disorder.</h6>
									            <i></i>
									        </div>
									    </div>
									</div>
		         				</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Bleed">
										<input type="checkbox" class="switch_1" value="Yes" name="Bleed">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul>
							<li>
								<div class="togle">
									<label>Anaemia</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Anaemia">
										<input type="checkbox" class="switch_1" value="Yes" name="Anaemia">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Malignancy</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Malignancy">
										<input type="checkbox" class="switch_1" value="Yes" name="Malignancy">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Spine/back problems</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Spine">
										<input type="checkbox" class="switch_1" value="Yes" name="Spine">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul>
							<li>
								<div class="togle">
									<label>Neurological disorders</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Neuro">
										<input type="checkbox" class="switch_1" value="Yes" name="Neuro">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Other</label>
									<div class= "box_1">
										<input type="text"  name="other" style="border-radius: 20px;" >
									</div>
								</div>
							</li>
							
						</ul><!-------------------->
					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Purpose of CNB<span class="mandat">*</span></label></div>
				<div class="col-sm-4">
					<select class="form-control" id="Purpose" name="Purpose" onfocusout="checkprs()">
						<option>Select</option>
						<option>Sole/Primary Anaesthetic</option>
						<option>For Analgesia only</option>
					</select>
					<small class="prs" style="color:red; display:none;">Please enter purpose</small>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Clinical Standards</label></div>
				<div class="col-sm-8">
					<div class="t-switch">
						<ul>
							<li style="width:50%;">
								<div class="togle">
									<label>Basic Monitoring (ECG, BP or Pulse Oximetry)</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Monitoring">
										<input type="checkbox" class="switch_1" value="Yes" name="Monitoring">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul>
							<li style="width:44%;">
								<div class="togle">
									<label style="width:initial">Resuscitation Equipment Available</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Resusci">
										<input type="checkbox" class="switch_1" value="Yes" name="Resusci">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul>
							<li style="width:50%;">
								<div class="togle">
									<label>Lipid Rescue Available</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Lipid">
										<input type="checkbox" class="switch_1" value="Yes" name="Lipid">
									</div>
								</div>
							</li>
						</ul>
						<ul>
							<li style="width:50%;">
								<div class="togle">
									<label>Time Out / Correct Side Check Done</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Timeout">
										<input type="checkbox" class="switch_1" value="Yes" name="Timeout">
									</div>
								</div>
							</li>
						</ul>
						<ul>
							<li style="width:50%;">
								<div class="togle">
									<label style="">Consent Taken</label>
									<div class="box_1">
										<input type="hidden" class="switch_1" value="No" name="Consent">
										<input type="checkbox" class="switch_1" value="Yes" name="Consent">
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-2"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-9"></div>
				<div class="col-sm-3">
					<button type="submit" class="btn-save">Save</button>
					<!-- <button type="button" class="btn-close">Close</button> -->
				</div>
			</div><!--row-->
		</form>
	</section><!--add-preop--->
</div>
                	 	 	<!--------------------------------------PRE-OP-DETAILS-------------------------->	
                	 	 		

                	 	 	<!--------------------------------edit preop---------------------------------->

                	 	 	<!----------------------------------------ADD PRE-OP END---------------------------->
<script type="text/javascript">
	function checkspl(){
		var spl = $('#speciality').val();
		if((spl != 'Select')){
			$('.spl').hide();
		}
	}
	function checksul(){
		var sul = $('#sur_location').val();

		if((sul != 'Select')){
			$('.sul').hide();
		}

		$.ajax({
			type : 'POST',
			url : '<?php  echo base_url("Preop/search_option")?>',
			data : {sul:sul},

			success:function(response){
				// console.log(response);
				response=jQuery.parseJSON(response);

				console.log(response);
				if(response.result== 1){  
					
					$('#surgery_option').empty();
					$('#surgery_option_input').val('');

					for(var i=0; i<response.message.length; i++){
						var mode = '';
						mode +='<option>'+response.message[i].name+'</option>';

						$('#surgery_option').append(mode);
					}				
				}
				else 
				{
					// toastr["error"](response.message);
				}
			}

		});
	}
	function checksur(){
		var sur = $('#surgery_option_input').val();
		if((sur != '')){
			$('.sur').hide();
		}
	}
	function checkprs(){
		var prs = $('#Purpose').val();
		if((prs != '')){
			$('.prs').hide();
		}
	}
	$("input[name='optradio']").change(function(){
		$('.opc').hide();
	});
$(document).ready(function(){
	$('#add-preop').submit(function(e){
		e.preventDefault();
		var aa = '', bb = '', cc = '', dd = '', ee = '';
		var spl = $('#speciality').val();
		var sul = $('#sur_location').val();
		var sur = $('#surgery_option_input').val();
		var prs = $('#Purpose').val();
		if((spl != 'Select'))
			aa = true;
		else{
			$('.spl').show();
			toastr.error('please select speciality');
		}
		if((sul != ''))
			bb = true;
		else{
			$('.sul').show();
			toastr.error('please select surgery location');
		}
		if((sur != ''))
			cc = true;
		else{
			$('.sur').show();
			toastr.error('please enter surgery');
		}
		if (!document.getElementById('option-1').checked && !document.getElementById('option-2').checked) { 
			$('.opc').show();
			toastr.error('please enter operation/procedure category'); 
		}
		else
			dd = true;
		if((prs != 'Select'))
			ee = true;
		else{
			$('.prs').show();
			toastr.error('please enter purpose');
		}
		if((aa) && (bb) && (cc) && (dd) && (ee)){
			var formData = new FormData(this);
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("Preop/add_preop")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);
						$('#add-preop')[0].reset();
						window.location = '<?php echo base_url("PreopDetails")?>?id='+response.msg;
					}
					else
						toastr["error"](response.message);
				}
			});
		}
	});
});
</script>
<?php
    echo view('includes/footer');    
?>


