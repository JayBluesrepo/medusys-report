<?php
    echo view('includes/header-labour',$patient, $pre, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);  
    
?>
 <!--  <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script> -->
<!-----------------------------------------ADD PRE-OP START------------------------->
<div role="tabpanel" class="tab-pane" id="profile">
	<section class="add-preop" id="pre-pro">
		<form id="add-preop">
			<h3>Add Pre-procedure</h3>
			<div class="row">
				<div class="col-sm-2"><label>Speciality<span class="mandat">*</span></label></div>
				<div class="col-sm-6">
					<div class="form-group">
						<select class="form-control" id="speciality" name="speciality" readonly>
							
							<option>Obstetrics</option>
							<!-- <option>General Surgery</option>
							<option>Gynaecology</option>
							<option>Orthopaedics</option>
							<option>Plastic surgery</option>
							<option>Cardiothoracic surgery</option>
							<option>Vascular Surgery</option>
							<option>Neuro-spine</option>
							<option>Urology</option>
							<option>Other</option> -->
						</select>
						<small class="spl" style="color:red; display:none;">Please enter speciality</small>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-3">
					<label>Operation/Procedure Category<span class="mandat">*</span></label>
				</div>
				<div class="col-sm-4 pt-3">
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
			<div class="row pt">
				<div class="col-sm-2"><label>ASA<span class="mandat">*</span></label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control asa" name="asa" onchange="checkasa()">
							<option value="" >Select</option>
							<option value="ASA 1" >ASA 1</option>
							<option value="ASA 2" >ASA 2</option>
							<option value="ASA 3" >ASA 3</option>
							<option value="ASA 4" >ASA 4</option>

						</select>
						<div class="form-check-inline">
							<small class="asa_error" style="color:red; display:none;">Please Select ASA Option</small>
						</div>
					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Gravida/Parity<span class="mandat">*</span></label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control gravida_parity" name="gravida_parity" onchange="gra_par()">
							<option value="" >Select</option>
							<option value="Nulliparous" >Nulliparous</option>
							<option value="Multiparous" >Multiparous</option>
						</select>
						<div class="form-check-inline">
							<small class="gravida_parity_error" style="color:red; display:none;">Please Select Gravida/Parity Option</small>
						</div>
					</div>
				</div>
			</div><!--row-->
			<div class="row pt">
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
									<label>CVS Disease</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="CVS">
										<input type="checkbox" class="switch_1" value="Yes" name="CVS">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Respiratory Disease</label>
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
									<label>Neurological Disorders</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Neuro">
										<input type="checkbox" class="switch_1" value="Yes" name="Neuro">
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
									<label>Spine/back Deformities</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Spine">
										<input type="checkbox" class="switch_1" value="Yes" name="Spine">
									</div>
								</div>
							</li>
						</ul><!----------------->
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
									<!-- <label>Bleeding disorder<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="For Bleeding disorder includes but not limited to Anti-Coagulation/Coagulopathy, Anti-platelet agent/platelet disorder, Vascular disorder"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->
									<label>Bleeding Disorder
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
							<li>
								<div class="togle">
									<label>Anaemia</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Anaemia">
										<input type="checkbox" class="switch_1" value="Yes" name="Anaemia">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul style="margin-bottom:0px;">
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
									<label>Other</label>
									<div class= "box_1">
										<!-- <input type="hidden" class="switch_1" value="No" name="other"> -->
										<input type="checkbox" class="switch_1 other_field" value="Yes" onclick="other_field()">
									</div>
								</div>
							</li>
							<li id="proced-plus" class="other-li other_input" style="display:none;">
								<input type="text" class="clean" name="other[]" style="border-radius: 20px;" >
								<button type="button" class="btn add1" ><i class="fa fa-plus" aria-hidden="true"></i></button>
							</li>
						</ul><!-------------------->
					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Obstetric Conditions</label></div>
				<div class="col-sm-10">
					<div class="t-switch">
						<ul>
							<li>
								<div class="togle">
									<label>Gestational Diabetes</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="gestational_diabetes">
										<input type="checkbox" class="switch_1" value="Yes" name="gestational_diabetes">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>PIH, Pre-Eclampsia</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="pih">
										<input type="checkbox" class="switch_1" value="Yes" name="pih">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Eclampsia</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="eclampsia">
										<input type="checkbox" class="switch_1" value="Yes" name="eclampsia">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul>
							<li>
								<div class="togle">
									<label>Previous LSCS</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="lscs">
										<input type="checkbox" class="switch_1" value="Yes" name="lscs">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Placental Abnormalities</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="placental_abnormalities">
										<input type="checkbox" class="switch_1" value="Yes" name="placental_abnormalities">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Premature Rupture of Membranes</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="premature_rupture">
										<input type="checkbox" class="switch_1" value="Yes" name="premature_rupture">
									</div>
								</div>
							</li>
						</ul><!----------------->
						<ul>	
							<li>
								<div class="togle">
									<label>Previous Failed Epidural</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="previous_failed">
										<input type="checkbox" class="switch_1" value="Yes" name="previous_failed">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>Other</label>
									<div class= "box_1">
										<!-- <input type="hidden" class="switch_1" value="No" > -->
										<input type="checkbox" class="switch_1 obstetric_other_field" value="Yes" onclick="obstetric_field()">
									</div>
								</div>
							</li>
							<li id="proced-plus" class="other-li obstetric_other_field_box" style="display:none;">
								<input type="text"  name="obstetric_other[]" class="obstetric_other_input" style="border-radius: 20px;" >
								<button type="button" class="btn add2" ><i class="fa fa-plus" aria-hidden="true"></i></button>
							</li>
						</ul><!-------------------->
					</div>
				</div><!--col--10-->
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Foetal Conditions</label></div>
				<div class="col-sm-10">
					<div class="t-switch">
						<ul>
							<li>
								<div class="togle">
									<label>Malposition</label>
									<div class="box_1">
										<input type="hidden" class="switch_1" value="No" name="malposition">
										<input type="checkbox" class="switch_1" value="Yes" name="malposition">
									</div>
								</div>
							</li>
							<li>
								<div class="togle">
									<label>IUGR</label>
									<div class="box_1">
										<input type="hidden" class="switch_1" value="No" name="iugr">
										<input type="checkbox" class="switch_1" value="Yes" name="iugr">
									</div>
								</div>
							</li>
						</ul>
						<ul>
							<li style="width:83%;">
								<div class="togle">
									<label>Large for gestational age(includes macrosomia)</label>
									<div class="box_1">
										<input type="hidden" class="switch_1" value="No" name="large_gestational">
										<input type="checkbox" class="switch_1" value="Yes" name="large_gestational">
									</div>
								</div>
							</li>
						</ul>
						<ul>	
							<li>
								<div class="togle">
									<label>Other</label>
									<div class= "box_1">
										<!-- <input type="hidden" class="switch_1" value="No" name="foetal_other"> -->
										<input type="checkbox" class="switch_1 foetal_other_chick" value="Yes" onclick="foetal_other_field()">
									</div>
								</div>
							</li>
							<li id="proced-plus" class="other-li foetal_other_box" style="display:none;">
								<input type="text"  name="foetal_other[]" class="foetal_other_input" style="border-radius: 20px;" >
								<button type="button" class="btn add3" ><i class="fa fa-plus" aria-hidden="true"></i></button>
							</li>
						</ul>
					</div>
				</div>
			</div><!--row-->
			
			<div class="row">
				<div class="col-sm-2"><label>Gestational Age/Term</label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control" name="gestational_age">
							<option value="">Select</option>
							<option value="Pre-Term">Pre-Term</option>
							<option value="Term">Term</option>
							<option value="Post-Term">Post-Term</option>
						</select>
					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2">
					<label style="width:120%;">Cervical Dilation
					<div class="tooltip-3">
					   <i class="fa fa-info-circle" aria-hidden="true"></i>
					    <div class="right-3">
					        <div class="text-content-3">
					            <h6>Cervical dilation documented as close as possible before or after epidural insertion.</h6>
					            <i></i>
					        </div>
					    </div>
					</div>	
					</label>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control" name="cervical">
							<option value="" >Select</option>
							<option value="< 3cm" >< 3cm</option>
							<option value="3-7cm" >3-7cm</option>
							<option value="> 7cm" >> 7cm</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2">
					<label style="width:118%;">Onset of Labour
						<div class="tooltip-3">
						   <i class="fa fa-info-circle" aria-hidden="true"></i>
						    <div class="right-3">
						        <div class="text-content-3">
						            <h6>An induced labour includes - prostaglandins, artificial rupture of membranes use of oxytocin prior to contractions</h6>
						            <i></i>
						        </div>
						    </div>
						</div>	
					</label>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control" name="onset_labour">
							<option value="" >Select</option>
							<option value="Spontaneous" >Spontaneous</option>
							<option value="Induced" >Induced</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6"></div>
			</div><!--row-->
			<div class="row p-3">
				<div class="col-sm-2"><label>Type of Labour Analgesia :</label></div>
				<div class="col-sm-4">
					<label>Pharmacological :</label>
					<div class="form-check">
					  <label class="form-check-label">
					  	<input type="hidden" class="form-check-input" value="No" name="entonox">
					    <input type="checkbox" class="form-check-input" value="Yes" name="entonox">Nitrous oxide (Entonox)
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
					  	<input type="hidden" class="form-check-input" value="No" name="atypical">
					    <input type="checkbox" class="form-check-input" value="Yes" name="atypical">Opioids and atypical opioids
					    <div class="tooltip-3">
						   <i class="fa fa-info-circle" aria-hidden="true"></i>
						    <div class="right-3">
						        <div class="text-content-3">
						            <h6>Opioids :<br> include but not restricted to pentazocine, fentanyl, morphine, hydromorphone, Tramadol, pethidine etc</h6>
						            <i></i>
						        </div>
						    </div>
						</div>
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
					  	<input type="hidden" class="form-check-input" value="No" name="pnb">
					    <input type="checkbox" class="form-check-input" value="Yes" name="pnb">Peripheral Nerve Block (PNB)
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="cnb">
					    <input type="checkbox" class="form-check-input" value="Yes" name="cnb">Central Neuraxial Block
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="pharma_other">
					    <input type="checkbox" class="form-check-input pharma_other" value="Yes" name="pharma_other">Other
					  </label>
					</div><!---->
					<div class="pharma_other_box" style="display:none;">
					  <label class="form-check-label" id="proced-plus">						
					    <input type="text" id="pharma_other_input" name="pharma_other_input[]" style="border-radius:20px;">
					    <button type="button" class="btn add6" ><i class="fa fa-plus" aria-hidden="true"></i></button>
					  </label>
					</div><!---->
				</div>
				<div class="col-sm-4">
					<label>Non-Pharmacological :</label>
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="biofeed">
					    <input type="checkbox" class="form-check-input" value="Yes" name="biofeed">Hypnosis/Biofeedback
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="acupressure">
					    <input type="checkbox" class="form-check-input" value="Yes" name="acupressure">Acupuncture/Acupressure
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="tens">
					    <input type="checkbox" class="form-check-input" value="Yes" name="tens">TENS
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="relaxation">
					    <input type="checkbox" class="form-check-input" value="Yes" name="relaxation">Relaxation Techniques
					  </label>
					</div><!---->
					<div class="form-check">
					  <label class="form-check-label">
						<input type="hidden" class="form-check-input" value="No" name="non_pharma_other">
					    <input type="checkbox" class="form-check-input non_pharma_other" value="Yes" name="non_pharma_other">Other
					  </label>
					</div><!---->
					<div class="non_pharma_other_box" style="display:none;">
					  <label class="form-check-label" id="proced-plus">						
					    <input type="text" id="non_pharma_other_input" name="non_pharma_other_input[]" style="border-radius:20px;">
					     <button type="button" class="btn add7" ><i class="fa fa-plus" aria-hidden="true"></i></button>
					  </label>
					</div><!---->
				</div>
				<div class="col-sm-2"></div>
			</div><!--row-->
			<div class="row pt">
				<div class="col-sm-2"><label>Clinical Standards<span class="mandat">*</span></label><small class="clinic" style="color:red; display:none;">please select clinical standard</small></div>
				<div class="col-sm-8">
					<div class="t-switch">
						<ul>
							<li style="width:50%;">
								<div class="togle">
									<label>Basic Monitoring (ECG, BP or Pulse Oximetry)</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Monitoring">
										<input type="checkbox" class="switch_1" value="Yes" id="Monitoring" name="Monitoring" onclick="checkclinic()">
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
										<input type="checkbox" class="switch_1" value="Yes" id="Resusci" name="Resusci" onclick="checkclinic()">
									</div>
								</div>
							</li>
						</ul><!-------------------->
						<ul style="margin-bottom:23px;">
							<li style="width:50%;">
								<div class="togle">
									<label>Lipid Rescue Available</label>
									<div class= "box_1">
										<input type="hidden" class="switch_1" value="No" name="Lipid">
										<input type="checkbox" class="switch_1" value="Yes" id="Lipid" name="Lipid" onclick="checkclinic()">
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
										<input type="checkbox" class="switch_1" value="Yes" id="Timeout" name="Timeout" onclick="checkclinic()">
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
										<input type="checkbox" class="switch_1" value="Yes" id="Consent" name="Consent" onclick="checkclinic()">
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
					<button type="submit" class="btn-save Save">Save</button>
					<!-- <button type="button" class="btn-close">Close</button> -->
				</div>
			</div><!--row-->
		</form>
	</section><!--add-preop--->
</div>

<script>
	function checkasa(){
		var asa1 = $('.asa').val();
		if(asa1 != ''){
			$('.asa_error').hide();
		}
	}

	function gra_par(){
		var asa1 = $('.gravida_parity').val();
		if(asa1 != ''){
			$('.gravida_parity_error').hide();
		}
	}
</script>

<script>
	$(document).ready(function(){
		var i = 1, j = 1 , k=1; l = 1; m = 1;
		$(".add1").click(function(){			
			if(i<3){
				i++;
				$(".other_input").append('<div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text" class="clean" name="other[]" style="border-radius: 20px;" ><button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
			}
    	});
		$(".add2").click(function(){			
			if(j<3){
				j++;
				$(".obstetric_other_field_box").append('<div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text"  name="obstetric_other[]" class="obstetric_other_input" style="border-radius: 20px;" ><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
			}
    	});
		$(".add3").click(function(){			
			if(k<3){
				k++;
				$(".foetal_other_box").append('<div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text"  name="foetal_other[]" class="foetal_other_input" style="border-radius: 20px;" ><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
			}
    	});

    	$(".add6").click(function(){			
			if(l<3){
				l++;
				$(".pharma_other_box").append('<div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text"  name="pharma_other_input[]" id = "pharma_other_input" class="pharma_other_input" style="border-radius: 20px;" ><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
			}
    	});

    	$(".add7").click(function(){			
			if(m < 3){
				m++;
				$(".non_pharma_other_box").append('<div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text"  name="non_pharma_other_input[]" id = "non_pharma_other_input" class="non_pharma_other_input" style="border-radius: 20px;" ><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
			}
    	});
		$(document).on('click','.remove1',function(){  
			i--;
			$(this).closest('.row').remove();
		});
		$(document).on('click','.remove2',function(){  
			j--;
			$(this).closest('.row').remove();
		});
		$(document).on('click','.remove3',function(){  
			k--;
			$(this).closest('.row').remove();
		});
	});
</script>
                	 	 	
							
<script type="text/javascript">

	

	function other_field(){
		var other_field = $('.other_field').is(':checked');	
        if(other_field == true){
            $('.other_input').show();
        }else{
            $('.other_input').hide();
			$('.clean').val('');
        }
	}

	function obstetric_field(){
		var obstetric_other_field = $('.obstetric_other_field').is(':checked');	

		if(obstetric_other_field == true){
            $('.obstetric_other_field_box').show();
        }else{
            $('.obstetric_other_field_box').hide();
			$('.obstetric_other_input').val('');
        }
	}

	function foetal_other_field(){
		var foetal_other_chick = $('.foetal_other_chick').is(':checked');	

		if(foetal_other_chick == true){
            $('.foetal_other_box').show();
        }else{
            $('.foetal_other_box').hide();
			$('.foetal_other_input').val('');
        }
	}

	$('.pharma_other').click(function(){
		var other =$('.pharma_other').is(':checked');		
		if(!other){			
			$(".pharma_other_box").hide();
			$('#pharma_other_input').val('');
		}
		else{
			$('.pharma_other_box').show();
		}
	});

	
	$('.non_pharma_other').click(function(){
		var other =$('.non_pharma_other').is(':checked');		
		if(!other){			
			$(".non_pharma_other_box").hide();
			$('#non_pharma_other_input').val('');
		}
		else{
			$('.non_pharma_other_box').show();
		}
	});

	$('#clear').hide();
	
	function checkclinic(){
        var Monitoring = $('#Monitoring').is(':checked');
        var Resusci = $('#Resusci').is(':checked');
        var Lipid = $('#Lipid').is(':checked');
        var Timeout = $('#Timeout').is(':checked');
		var Consent = $('#Consent').is(':checked');
        if((Monitoring) || (Resusci) || (Lipid) || (Timeout) || (Consent)){
            $('.clinic').hide();
        }
	}
	
	
	$("input[name='optradio']").change(function(){
		$('.opc').hide();
	});

	$(document).ready(function(){
		$('#add-preop').submit(function(e){
			e.preventDefault();
			var dd = '',ff = '',ee = '',aa = '';		
			var sur = $('#surgery_option_input').val();
			var asa = $('.asa').val();	
			var gravida_parity = $('.gravida_parity').val();		

			
			if (!document.getElementById('option-1').checked && !document.getElementById('option-2').checked) { 
				$('.opc').show();
				toastr.error('please enter operation/procedure category'); 
			}
			else
				dd = true;
			if((asa != ''))
				ee = true;
			else{
				$('.asa_error').show();
				toastr.error('Please Select ASA');
			}
			if(gravida_parity != ''){
				aa = true;
			}else{
				$('.gravida_parity_error').show();
				toastr.error('Please Select Gravida/Parity Option');
			}
			var Monitoring = $('#Monitoring').is(':checked');
			var Resusci = $('#Resusci').is(':checked');
			var Lipid = $('#Lipid').is(':checked');
			var Timeout = $('#Timeout').is(':checked');
			var Consent = $('#Consent').is(':checked');
			if(!(Monitoring) && !(Resusci) && !(Lipid) && !(Timeout) && !(Consent)){
				$('.clinic').show();
				toastr.error('please select clinical standard');
			}
			else{
				ff = true;
			}
			if((dd) && (ff) && (ee) && aa){
				var formData = new FormData(this);
				$(".Save").text("Submitting...");
				$(".Save").attr("disabled", true);
				$.ajax({					
					type : "POST",
					url : '<?php  echo base_url("add-pre-procedure")?>',
					data : formData,
					contentType: false,
					processData: false,
					success:function(response){
						response = jQuery.parseJSON(response);
						if(response.result==1){
							toastr["success"](response.message);
							$('#add-preop')[0].reset();
							window.location = '<?php echo base_url("labour/PreopDetails")?>?id='+response.msg;
						}
						else{
							toastr["error"](response.message);
						}
					}
				});
			}
		});
	});
</script>
<?php
    echo view('includes/footer-labour');    
?>


<style type="text/css">
	.other-li{
		width: 33%!important;
	}
</style>


