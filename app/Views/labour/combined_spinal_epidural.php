<?php
    echo view('includes/header-labour',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    

?>   

<!--  <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script> -->

<section class="comb-spinal-epi">
	<h3>Add Combined Spinal Epidural</h3>
			<form id="combined_spinal_epidural_block">
				<div class="add-patient" id="">
		            <div class="row">
		                <div class="col-sm-2"><label>Procedure Date and Time<span class="mandat">*</span></label></div>
		                <div class="col-sm-4">
		                    <div class="form-group">                                       
		                        <div class="input-group date" id="datePicker5">
		                            <input type="text" class="form-control date_time_m" style="border-radius: 15px;" id='datetimepicker1' name="date_m" required>
		                            <span class="input-group-addon" style="margin-left: 20px;"><i class="fa fa-calendar" aria-hidden="true"></i></span>
		                        </div>
		                        <div class="input-group date" id="timePicker5">
		                            <input type="text" class="form-control time_m" style="border-radius: 15px;margin-top: 12px;" name="time_m" required>
		                            <span class="input-group-addon" style="margin-left: 20px;margin-top: 12px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-sm-6"></div>
		            </div><!--row-->
		            <div class="row">
		                <div class="col-sm-2"><label>CNB done by<span class="mandat">*</span>
		                 <div class="tooltip" id="tip">
		                   <i class="fa fa-info-circle" aria-hidden="true"></i>
		                    <div class="right">
		                        <div class="text-content">
		                            <h6>Junior Consultant < 5 years experience , Senior  Consultant > 5 years experience , Junior Trainee < 2 years experience , <br>Senior Trainee > 2 years experience.</h6>
		                            <i></i>
		                        </div>
		                    </div>
		                </div>   
		                </label></div>
		                <div class="col-sm-4">
		                     <select class="form-control cnb_done_by1" id="cnb_by1" name="cnb_done_by1" onchange="selectcnb()" required>
                        <option value="" >Select</option>
                        <option value="Consultant">Consultant</option>
                        <option value="Trainee">Trainee</option>
                    </select>
                    <div class="" id = "consultant" >
                        <small class="cnbdone" style="color:red; display:none;">select the option</small>
                        <select class="form-control cnb_done_by2" id="cnb_by2" style="margin: 15px 0;"  name="cnb_done_by2" required>       
                        </select> 
                    </div>
		                 
		                </div>
		                <div class="col-sm-6">
		                    <small class="cnbdone" style="color:red; display:none;">select the option</small>
		                </div>
		            </div><!--row-->
		            <div class="row pt-3">
		                <div class="col-sm-2"><label>Supervision<span class="mandat">*</span></label></div>
		                <div class="col-sm-4">
		                    <select class="form-control supervision" name="supervision" onchange='checksupervision()' required>
		                        <option value="">Select</option>
		                        <option value="Direct Supervision">Direct Supervision</option>
		                        <option value="Independent Supervision">Independent Supervision</option>
		                    </select>
		                    <small class="supervision1" style="color:red; display:none; margin-left:20px;">select the option</small>
		                </div>
		                <div class="col-sm-6"></div>
		            </div><!--row-->
				</div><!--add-patient-->
				
				<label class="pt-3">Patient status during Neuraxial Block<span class="mandat">*</span></label>
				<small class="psn" style="color:red; display:none;">please choose patient status</small>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Awake" id="option-1" name="neuraxial_block" onclick="hide()">Awake
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Sedation" id="option-2" name="neuraxial_block" onclick="show()">Sedation
							</label>
						</div>
						<div class="pt sedation_option" style="display:none;">
							<select class="form-control neuraxial_block_option" name="neuraxial_block_option" >
								<option value=''>Select</option>
								<option>1-Mild easy to rouse</option>
								<option>2-Moderate,easy to rouse,unable to remain awake</option>
								<option>3-Difficult to rouse</option>
							</select>
						</div>
						
						<div class="form-check">
						<label class="form-check-label">
						<input type="radio" class="form-check-input" value="GA" id="option-3" name="neuraxial_block" onclick="hide()">GA
						</label>
						</div>
						
					</div>
					<div class="col-sm-2"></div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label style="font-size:13px;">Patient Position<span class="mandat">*</span></label></div>
					<div class="col-sm-4">
						<select class="form-control" id='patient_pos' name="patient_position" onchange="checkpos()">
							<option value=''>Select</option>
							<option>Lateral</option>
							<option>Sitting</option>
							<option>Prone</option>
						</select>
						<small class="pat" style="color:red; display:none;">please select patient position</small>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label>Asepsis<span class="mandat">*</span></label></div>
					<div class="col-sm-10">
						<div class="t-switch">
							<ul>
								<li>
									<div class="togle">
										<label>Wearing cap and mask</label>
										<div class= "box_1">
											<input type="hidden" class="switch_1" value="No" name="wear_mask">
											<input type="checkbox" class="switch_1" value="Yes" name="wear_mask">
										</div>
									</div>
								</li>
								<li>
									<div class="togle">
										<label>Hand washing</label>
										<div class= "box_1">
											<input type="hidden" class="switch_1" value="No" name="hand_washing">
											<input type="checkbox" class="switch_1" value="Yes" name="hand_washing">
										</div>
									</div>
								</li>
							</ul><!-------------------->
							<ul class="mb-0">
								<li>
									<div class="togle">
										<label>Sterile gown</label>
										<div class= "box_1">
											<input type="hidden" class="switch_1" value="No" name="sterile_gown">
											<input type="checkbox" class="switch_1" value="Yes" name="sterile_gown">
										</div>
									</div>
								</li>
								<li>
									<div class="togle">
										<label>Sterile draping</label>
										<div class= "box_1">
											<input type="hidden" class="switch_1" value="No" name="sterile_draping">
											<input type="checkbox" class="switch_1" value="Yes" name="sterile_draping">

										</div>
									</div>
								</li>
							</ul><!-------------------->	
						</div>
					</div>
				</div><!--row-->
				<div class="row mb-2">
            <div class="col-sm-2"><label>Skin Prep<span class="mandat">*</span></label></div>
            <div class="col-sm-4">
                <select class="form-control" id="skin_prep" name="skin_prep" onchange ="checkskin()" >
                    <option value=''>Select</option>
                    <option>Alcohol</option> 
                    <option>Chlorhexidine</option>
                    <option>Betadine</option>
                    <option>Combinations</option>
                    <option>Other</option>
                </select>
                <small class="skp" style="color:red; display:none;">please enter skin prep</small>
                <input type="text" class="form-control skin_prep_other mt-4" style='display:none;'  id = "skin_prep_other" name="skin_prep_other" style="margin-top: 12px;">                 
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
				
				<div class="row pt">
					<div class="col-sm-2"><span><b>CSE Technique</b><span class="mandat">*</span></span></div>
					<div class="col-sm-5"> 
						<select class="form-control cse_technique" name="cse_technique" onchange="condition()" required>   
							<option value=''>Select</option>
							<option >Single Interspace Technique (Needle through Needle)</option>
							<option >Double Interspace Technique</option>
							<option >DPE:Dural Puncture Epidural Technique</option>
						</select>
					</div>
					<div class="col-sm-5"></div>
				</div><!--row-->
				<!-- <h5><b>Epidural<span class="mandat">*</span></b></h5> -->
				<div class="row pt">
					<div class="col-sm-2"><label>Anatomical Landmark<span class="mandat"></span></label></div>
					<div class="col-sm-4">
						<select class="form-control" name="anatomical_landmark">
							<option value=''>Select</option>
							<option >Easily Palpable</option>
							<option >Poorly Palpable</option>
							<option >Non Palpable</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<h5 style="margin-top:12px;"><b>Vertebral Level</b></h5><br>
				<div class="row">
					<div class="col-sm-3" id="cse-tag"><h5 style="text-align:end;"><b>Epidural Level</b></h5></div>
					<div class="col-sm-6"> 
						<!-- <input type="text" class="form-control text-center epidural" name="epidural_level_input" readonly>  -->
					</div>
					<div class="col-sm-3"><h5><b>Spinal Level</b></h5></div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-1"></div>
					<div class="col-sm-3 pb-4">
						<input type="text" class="form-control text-center epidural1" name="epidural_level_input" style="margin-bottom:10px;" readonly>
						<input type="text" class="form-control text-center epidural_level_name" name="epidural_level_input_name" readonly>
					</div>
					<div class="col-sm-5"></div>
					<div class="col-sm-3 pb-4">
						<input type="text" class="form-control text-center spinal_level_input" name="spinal_level_input" style="margin-bottom:10px;" readonly>
						<input type="text" class="form-control text-center spinal_level_input_name" name="spinal_level_input_name" readonly>
					</div>
				</div>
				<h5 style="position: relative;top: 50px;"><b>Click on the appropriate <br> epidural level here</b></h5>
					<h5 style="position: relative;top:0px;left: 670px;"><b>Click on the appropriate <br> spinal level here</b></h5>
				<div class="row human-skeleton">
					<div class="col-sm-12">
						<div class="new-skeleton-img">
							<img src="<?php echo base_url('public/assets/images/CSE-new.png'); ?>" class="img-fluid d-block mx-auto">
							<button type="button" class="btn epidural_level" value="C1-2,Cervical" id="cse-btn">C1-2</button>
							<button type="button" class="btn epidural_level" value="C2-3,Cervical" id="cse-btn1">C2-3</button>
							<button type="button" class="btn epidural_level" value="C3-4,Cervical" id="cse-btn2">C3-4</button>
							<button type="button" class="btn epidural_level" value="C4-5,Cervical" id="cse-btn3">C4-5</button>
							<button type="button" class="btn epidural_level" value="C5-6,Cervical" id="cse-btn4">C5-6</button>
							<button type="button" class="btn epidural_level" value="C6-7,Cervical" id="cse-btn5">C6-7</button>
							<button type="button" class="btn epidural_level" value="C7-T1,Cervical" id="cse-btn6">C7-T1</button>
							<button type="button" class="btn epidural_level" value="T1-2,Thoracic" id="cse-btn7">T1-2</button>
							<button type="button" class="btn epidural_level" value="T2-3,Thoracic" id="cse-btn8">T2-3</button>
							<button type="button" class="btn epidural_level" value="T3-4,Thoracic" id="cse-btn9">T3-4</button>
							<button type="button" class="btn epidural_level" value="T4-5,Thoracic" id="cse-btn10">T4-5</button>
							<button type="button" class="btn epidural_level" value="T5-6,Thoracic" id="cse-btn11">T5-6</button>
							<button type="button" class="btn epidural_level" value="T6-7,Thoracic" id="cse-btn12">T6-7</button>
							<button type="button" class="btn epidural_level" value="T7-8,Thoracic" id="cse-btn13">T7-8</button>
							<button type="button" class="btn epidural_level" value="T8-9,Thoracic" id="cse-btn14">T8-9</button>
							<button type="button" class="btn epidural_level" value="T9-10,Thoracic" id="cse-btn15">T9-10</button>
							<button type="button" class="btn epidural_level" value="T10-11,Thoracic" id="cse-btn16">T10-11</button>
							<button type="button" class="btn epidural_level" value="T11-12,Thoracic" id="cse-btn17">T11-12</button>
							<button type="button" class="btn epidural_level" value="T12-L1,Thoracic" id="cse-btn18">T12-L1</button>
							<button type="button" class="btn epidural_level" value="L1-2,Lumbar" id="cse-btn19">L1-2</button>
							<button type="button" class="btn epidural_level" value="L2-3,Lumbar" id="cse-btn20">L2-3</button>
							<button type="button" class="btn epidural_level" value="L3-4,Lumbar" id="cse-btn21">L3-4</button>
							<button type="button" class="btn epidural_level" value="L4-5,Lumbar" id="cse-btn22">L4-5</button>
							<button type="button" class="btn epidural_level" value="L5-S1,Lumbar" id="cse-btn23">L5-S1</button>
							<button type="button" class="btn epidural_level" value="Caudal,Caudal" id="cse-btn24">Caudal</button>
							<div>
								<button type="button" class="btn spinal_level" value="T1-2,Thoracic" id="cse-btn25">T1-2</button>
								<button type="button" class="btn spinal_level" value="T2-3,Thoracic" id="cse-btn26">T2-3</button>
								<button type="button" class="btn spinal_level" value="T3-4,Thoracic" id="cse-btn27">T3-4</button>
								<button type="button" class="btn spinal_level" value="T4-5,Thoracic" id="cse-btn28">T4-5</button>
								<button type="button" class="btn spinal_level" value="T5-6,Thoracic" id="cse-btn29">T5-6</button>
								<button type="button" class="btn spinal_level" value="T6-7,Thoracic" id="cse-btn30">T6-7</button>
								<button type="button" class="btn spinal_level" value="T7-8,Thoracic" id="cse-btn31">T7-8</button>
								<button type="button" class="btn spinal_level" value="T8-9,Thoracic" id="cse-btn32">T8-9</button>
								<button type="button" class="btn spinal_level" value="T9-10,Thoracic" id="cse-btn33">T9-10</button>
								<button type="button" class="btn spinal_level" value="T10-11,Thoracic" id="cse-btn34">T10-11</button>
								<button type="button" class="btn spinal_level" value="T11-12,Thoracic" id="cse-btn35">T11-12</button>
								<button type="button" class="btn spinal_level" value="T12-L1,Thoracic" id="cse-btn36">T12-L1</button>
								<button type="button" class="btn spinal_level" value="L1-2,Lumbar" id="cse-btn37">L1-2</button>
								<button type="button" class="btn spinal_level" value="L2-3,Lumbar" id="cse-btn38">L2-3</button>
								<button type="button" class="btn spinal_level" value="L3-4,Lumbar" id="cse-btn39">L3-4</button>
								<button type="button" class="btn spinal_level" value="L4-5,Lumbar" id="cse-btn40">L4-5</button>
								<button type="button" class="btn spinal_level" value="L5-S1,Lumbar" id="cse-btn41">L5-S1</button>	
							</div>
						</div>
						<div class="new-skeleton-img-single" style="display:none;">
							<img src="<?php echo base_url('public/assets/images/cse-single.png'); ?>" class="img-fluid d-block mx-auto">
							<button type="button" class="btn spinal_level_single" value="C1-2,Cervical" id="cse-single-btn">C1-2</button>
							<button type="button" class="btn spinal_level_single" value="C2-3,Cervical" id="cse-single-btn-1">C2-3</button>
							<button type="button" class="btn spinal_level_single" value="C3-4,Cervical" id="cse-single-btn-2">C3-4</button>
							<button type="button" class="btn spinal_level_single" value="C4-5,Cervical" id="cse-single-btn-3">C4-5</button>
							<button type="button" class="btn spinal_level_single" value="C5-6,Cervical" id="cse-single-btn-4">C5-6</button>
							<button type="button" class="btn spinal_level_single" value="C6-7,Cervical" id="cse-single-btn-5">C6-7</button>
							<button type="button" class="btn spinal_level_single" value="C7-T1,Cervical" id="cse-single-btn-6">C7-T1</button>
							<button type="button" class="btn spinal_level_single" value="T1-2,Thoracic" id="cse-single-btn-7">T1-2</button>
							<button type="button" class="btn spinal_level_single" value="T2-3,Thoracic" id="cse-single-btn-8">T2-3</button>
							<button type="button" class="btn spinal_level_single" value="T3-4,Thoracic" id="cse-single-btn-9">T3-4</button>
							<button type="button" class="btn spinal_level_single" value="T4-5,Thoracic" id="cse-single-btn-10">T4-5</button>
							<button type="button" class="btn spinal_level_single" value="T5-6,Thoracic" id="cse-single-btn-11">T5-6</button>
							<button type="button" class="btn spinal_level_single" value="T6-7,Thoracic" id="cse-single-btn-12">T6-7</button>
							<button type="button" class="btn spinal_level_single" value="T7-8,Thoracic" id="cse-single-btn-13">T7-8</button>
							<button type="button" class="btn spinal_level_single" value="T8-9,Thoracic" id="cse-single-btn-14">T8-9</button>
							<button type="button" class="btn spinal_level_single" value="T9-10,Thoracic" id="cse-single-btn-15">T9-10</button>
							<button type="button" class="btn spinal_level_single" value="T10-11,Thoracic" id="cse-single-btn-16">T10-11</button>
							<button type="button" class="btn spinal_level_single" value="T11-12,Thoracic" id="cse-single-btn-17">T11-12</button>
							<button type="button" class="btn spinal_level_single" value="T12-L1,Thoracic" id="cse-single-btn-18">T12-L1</button>
							<button type="button" class="btn spinal_level_single" value="L1-2,Lumbar" id="cse-single-btn-19">L1-2</button>
							<button type="button" class="btn spinal_level_single" value="L2-3,Lumbar" id="cse-single-btn-20">L2-3</button>
							<button type="button" class="btn spinal_level_single" value="L3-4,Lumbar" id="cse-single-btn-21">L3-4</button>
							<button type="button" class="btn spinal_level_single" value="L4-5,Lumbar" id="cse-single-btn-22">L4-5</button>
							<button type="button" class="btn spinal_level_single" value="L5-S1,Lumbar" id="cse-single-btn-23">L5-S1</button>
							<button type="button" class="btn spinal_level_single" value="Caudal,Caudal" id="cse-single-btn-24">Caudal</button>
						</div>															
					</div>
				</div><!--row-->
				<h4><b>Epidural Section of CSE</b></h4>
				<label class="pt">Ultrasound</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<div class= "box_1">
							<input type="hidden" class="switch_1" value="No" name="ultrasound_check_box">
							<input type="checkbox" class="switch_1 ultrasound" name="ultrasound_check_box" value="Yes" onclick="ultrasound_hide()">
						</div>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<div class="row pt ultrasound_check" style="display:none;">
					<div class="col-sm-2"></div>
					<div class="col-sm-2"><span>Probe Cover</span></div>
					<div class="col-sm-4">
						<select class="form-control" name="probe_cover">
							<option value = "">Select probe cover</option>
							<option >Yes</option>
							<option >No</option>
						</select>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<div class="row pt ultrasound_check" style="display:none;">
					<div class="col-sm-2"></div>
					<div class="col-sm-2"><span>Image Quality</span></div>
					<div class="col-sm-4">
						<select class="form-control" name="image_quality">
							<option value = "">Select image quality</option>
							<option >Good</option>
							<option >Average</option>
							<option >Poor</option>
						</select>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<label class="pt">Needle Brand,Type and Size</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span class="pt">Select Needle Brand</span>
						<div class="row pt-2">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control epidural_needel_brand_other" onchange="needel_brand()" name="epidural_brand">
									<option value = "">Select Needle Brand</option>									
									<?php
										foreach($epidural_needle_brand as $key=>$master){
									?>
										
										<option><?php echo $master['name']; ?></option>
										
									<?php
									}
									?>
									<option>Other</option>

								</select>
								<input type="text" class="form-control epidural_needel_brand_other_input" name="epidural_brand_input" style="margin-top: 12px; display:none;">
							</div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select Epidural Needle Type</span>
						<div class="row pt-2">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control epidural_needel_type_other" name="epidural_needle_type">
									<option value = "">Select Needle Type</option>
									<!-- <option>Touhy</option>
									<option>Crawford</option>
									<option>Hustead</option> -->
									<?php
										foreach($epidural_needle_type as $key=>$master){
									?>
										
										<option><?php echo $master['name']; ?></option>
										
									<?php
									}
									?>
									<option>Other</option>
								</select>
								<input type="text" class="form-control epidural_needel_type_other_input" name="epidural_needle_input" style="margin-top: 12px; display:none;">
							</div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select Epidural Needle Size</span>
						<div class="row pt-2">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control" name="epidural_needle_size">
									<option value = "">Select needle size</option>
									<option>16G</option>
									<option>17G</option>
									<option>18G</option>
									<option>19G</option>
									<option>20G</option>
									<option>21G</option>
									<option>22G</option>
									<option>23G</option>
									<option>24G</option>
								</select>
							</div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div><!--row-->
				<label class="pt-4">Epidural Technique</label>
				<div class="row mb-2">
					<div class="col-sm-2"></div>
					<div class="col-sm-6">
						<div class="form-check">
							<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="lor_saline" id="epidural_lor_saline" value="LOR Saline">LOR Saline
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="lor_air" id="epidural_lor_air" value="LOR Air">LOR Air
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
							<input type="checkbox" class="form-check-input" name="hanging_drop" id="epidural_hang_drop" value="Hanging Drop">Hanging Drop
							</label>
						</div>
						<div class="form-check" id="proced-plus" style="display:flex;">
							<label class="form-check-label" style="margin-right:8px;">
							<input type="checkbox" class="form-check-input"  id="other" onclick="oth()">Other
							</label>
							<!-- <div class="other_input">
							 <input type="text" class="form-control" name="">
							 <button><i class="fa fa-plus" aria-hidden="true"></i></button>
							</div> -->
							<div class="other_input" style="display:none;">
								<div id="proced-plus" style="display:flex;">
									<input type="text" class="form-control" name="others[]">
									<button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<div class="row pt mb-2">
					<div class="col-sm-2"><label>Approach</label></div>
					<div class="col-sm-4">
						<select class="form-control epidural_approach" name="epidural_approach" >
							<option value="">Select</option>
							<option >Midline</option>
							<option >Paramedian</option>
						</select>
					</div>
				</div><!--row-->
				<div class="row pt mb-2">
					<div class="col-sm-2"><label>Number Of Attempts</label></div>
					<div class="col-sm-4">
						<select class="form-control epidural_no_attempts" name="epidural_no_attempts">
							<option value="">Select</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
						</select>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label>Epidural Depth(cm)</label></div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="epidural_depth">
					</div>
				</div><!--row-->
				<label>Technique</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input" id="epidural_single" value="Single Shot" name="epidural_tech">Single Shot
							</label>							
						</div>
						<div class="form-check">
							<label class="form-check-label">
								<input type="radio" class="form-check-input catheter" onclick="catheter()" value="Catheter" name="epidural_tech" >Catheter
							</label>
						</div>
						<div class="pt catheter_fild" style="display:flex; display:none;">
							<span>Catheter mark at Skin (cm)</span>
							<input type="text" class="form-control" name="epidural_catheter"  style="width:30%;margin-top: 10px;">
						</div>
					</div>
					
				</div><!--row-->
				<div class="row mt-4 pb-2">
					<div class="col-sm-2"><label>Test Dose</label></div>
					<div class="col-sm-4">
						<div class= "box_1">
							<!-- <input type="checkbox" class="switch_1"> -->
							<input type="hidden" class="switch_1" value="No" name="test_dose_check_box">
							<input type="checkbox" class="switch_1" name="test_dose_check_box" value="Yes">
						</div>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<div class="row pt-2">
					<div class="col-sm-2"><label>Labour LA Regimen</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="epidural_intra_operative">
							<option value="">Select</option>
							<option >Continous Infusion</option>
							<option>Intermittent Bolus</option>
							<option>PCEA (Patient Controlled Epidural Analgesia)</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<!-- <label class="pt" style="margin-bottom:10px;">Total Intra Operative LA & Adjuvant Consumption<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->

				<h5 class="pt-4"><b>Total Labour LA & Adjuvant Consumption</b>
		 			<div class="tooltip-4">
					   <i class="fa fa-info-circle" aria-hidden="true"></i>
					    <div class="right-4">
					        <div class="text-content-4">
					            <h6>This includes Test Dose, Initial Dose and Total Intra Operative Use</h6>
					            <i></i>
					        </div>
					    </div>
					</div>
		 		</h5>

				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<label>Local Anaesthetic</label>
						<small class="persentage_tage" style="color:red; text-align:center; margin: 0 0 9px 37%; display:none;">should be from 0 to 4</small>
						<div class="pac-box">
							<div class="pacu-1"><p>Ropivacaine</p></div>
							<div class="pacu-1-x">
								<select class="form-control" name="epidural_ropiva">
									<option value=''>Select</option>
									<option >Without Adrenaline</option>
									<option >With Adrenaline</option>
								</select>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_persent1" name="epidural_ropiva_persent" onkeyup="persentage('alert1')"  ><span style="padding-top:5px;">%</span>	
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_ml1" name="epidural_ropiva_ml" ><span style="padding-top:5px;">ml</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="text" class="form-control epidural_mg1" name="epidural_ropiva_mg" ><span style="padding-top:5px;">mg</span>
							</div>
							<i onclick="clean1()" class="fa fa-times" id="clear1" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
						</div><!--pac-box-->
						<div class="pac-box" id="persentage_tage" style="padding:0; display:none;">
							<div class="pacu-1"></div>
							<div class="pacu-1-x"></div>
							<div class="pacu-1">
							<small  style="color:red;text-align:center;">should be from 0 to 4</small>
							</div>
							<div class="pacu-1"></div>
							<div class="pacu-1"></div>														
						</div>
						<div class="pac-box">
							<div class="pacu-1"><p>Bupivacaine</p></div>
							<div class="pacu-1-x">
								<select class="form-control" name="epidural_bupiva">
									<option value=''>Select</option>
									<option >Without Adrenaline</option>
									<option >With Adrenaline</option>
								</select>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_persent2" name="epidural_bupiva_persent" onkeyup="persentage('alert2')" ><span style="padding-top:5px;">%</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_ml2" name="epidural_bupiva_ml" ><span style="padding-top:5px;">ml</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="text" class="form-control epidural_mg2" name="epidural_bupiva_mg" ><span style="padding-top:5px;">mg</span>
							</div>
							<i onclick="clean2()" class="fa fa-times" id="clear2" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
						</div><!--pac-box-->
						<div class="pac-box" id="persentage_tage1" style="padding:0; display:none;">
							<div class="pacu-1"></div>
							<div class="pacu-1-x"></div>
							<div class="pacu-1">
							<small  style="color:red;text-align:center;">should be from 0 to 4</small>
							</div>
							<div class="pacu-1"></div>
							<div class="pacu-1"></div>														
						</div>
						<div class="pac-box">
							<div class="pacu-1"><p>Levobupivacaine</p></div>
							<div class="pacu-1-x">
								<select class="form-control" name="epidural_levabup">
									<option value=''>Select</option>
									<option >Without Adrenaline</option>
									<option >With Adrenaline</option>
								</select>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_persent3" name="epidural_levabup_persent" onkeyup="persentage('alert3')" ><span style="padding-top:5px;">%</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_ml3" name="epidural_levabup_ml" ><span style="padding-top:5px;">ml</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="text" class="form-control epidural_mg3" name="epidural_levabup_mg" ><span style="padding-top:5px;">mg</span>
							</div>
							<i onclick="clean3()" class="fa fa-times" id="clear3" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
						</div><!--pac-box-->
						<div class="pac-box" id="persentage_tage2" style="padding:0; display:none;">
							<div class="pacu-1"></div>
							<div class="pacu-1-x"></div>
							<div class="pacu-1">
							<small  style="color:red;text-align:center;">should be from 0 to 4</small>
							</div>
							<div class="pacu-1"></div>
							<div class="pacu-1"></div>														
						</div>
						<div class="pac-box">
							<div class="pacu-1"><p>Lignocaine</p></div>
							<div class="pacu-1-x">
								<select class="form-control" name="epidural_lignoca">
									<option value=''>Select</option>
									<option >Without Adrenaline</option>
									<option >With Adrenaline</option>
								</select>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_persent4" name="epidural_lignoca_persent" onkeyup="persentage('alert4')" ><span style="padding-top:5px;">%</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_ml4" name="epidural_lignoca_ml" ><span style="padding-top:5px;">ml</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="text" class="form-control epidural_mg4" name="epidural_lignoca_mg" ><span style="padding-top:5px;">mg</span>
							</div>
							<i onclick="clean4()" class="fa fa-times" id="clear4" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
						</div><!--pac-box-->
						<div class="pac-box" id="persentage_tage3" style="padding:0; display:none;">
							<div class="pacu-1"></div>
							<div class="pacu-1-x"></div>
							<div class="pacu-1">
							<small  style="color:red;text-align:center;">should be from 0 to 4</small>
							</div>
							<div class="pacu-1"></div>
							<div class="pacu-1"></div>														
						</div>
					</div><!--col-10-->
				</div><!--row-->

				<div class="row pt">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<label>Adjuvant Epidural
						 <div class="tooltip-23">
				           <i class="fa fa-info-circle" aria-hidden="true"></i>
				            <div class="right-23">
				                <div class="text-content-23">
				                    <h6>All options need to be unchecked <br> to make selection No.</h6>
				                    <i></i>
				                </div>
				            </div>
				        </div>    		
						</label>
						<div class= "box_1" style="">
							<input type="checkbox" id = "epidural_adj" class="switch_1 epidural_adjuvant" onclick="epidural_adjuvant()">
						</div>
						
						<div class="pt epidural_adjuvant_check" id="proced-plus" style="display:none;">

							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input epidural_opioid" value="Opioid"  onclick="epidural_opioid()">Opioid
								</label>
							</div>
							<div class="opioid append_fun mt-2"  style="display:none;">
								<div class="row" style="margin-left:3%;">
									<div class="col-sm-5"><span>Opioid Name</span></div>
									<div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]"><button type="button" class="btn add2" ><i class="fa fa-plus" aria-hidden="true"></i></button></div>
								</div><!--row-->
								<div class="row pt" style="margin-left:3%;">
									<div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
									<div class="col-sm-7"><input type="text" class="form-control" name="epidural_opioid_dose[]"></div>
								</div><!--row-->
							</div>	
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input" id="epidural_clonidne" value="">Clonidne with Dose(mcgm)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_clonidne_input" name="epidural_clonidne_dose" placeholder="mcgm"  readonly></div>
							</div><!--row-->
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_dexme" value="">Dexmeditomidine with Dose(mcgm)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_dexme_input " name="epidural_dexmedito_dose" placeholder="mcgm" readonly></div>
							</div><!--row-->
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_dexamethasone" value="">Dexamethasone with Dose(mg)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_dexamethasone_input" placeholder="mg" name="epidural_dexametha_dose" readonly></div>
							</div><!--row-->
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_trama" value="">Tramadol with Dose(mg)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_trama_input" name="epidural_tramadol_dose" placeholder="mg" readonly></div>
							</div><!--row-->
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_ketamine" value="">Ketamine with Dose(mg)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_ketamine_input" name="epidural_ketamine_dose" placeholder="mg" readonly></div>
							</div><!--row-->
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_midazolam" value="">Midazolam with dose(mg)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_midazolam_input" name="epidural_midazolam_dose" placeholder="mg" readonly></div>
							</div><!--row-->
							<!-- <div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_adrenaline" value="">Adrenaline(Epinephrine)(mcmg)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_adrenaline_input" name="epidural_adrenaline_dose" placeholder="mcmg" readonly></div>
							</div>  row-->
							<div class="row">
							<div class="col-sm-8">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_other" value="">Other
									</label>
								</div>
								<div class="other1 epidural_other_box" style="display:none;">
									<div class="row pt">
										<div class="col-sm-4"><span>Adjuvant Name</span></div>
										<div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="epidural_aj_name[]"> <button type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
										<div class="col-sm-1"></div>
									</div>
									<div class="row pt">
										<div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div>
										<div class="col-sm-7"><input type="text" class="form-control" name="epidural_aj_dose[]"></div>
										<div class="col-sm-1"></div>
									</div>
								</div>
							</div>
							</div><!--row-->
						</div>
					</div>
				</div><!--row-->
				<h5 class="bt"></h5>
				<!-- <h4 style="margin-bottom:25px;"><b>Spinal section of CSE<span class="mandat">*</span></b></h4> -->
				<!-- <div class="row">
					<div class="col-sm-2"><label>Anatomical Landmark</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="spinal_landmark">
							<option >Select</option>
							<option >Easily Palpable</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="row">
					<div class="col-sm-2"><label>Spinal Level</label></div>
					<div class="col-sm-2"><input type="text" class="form-control text-center spinal_level_input" name="spinal_level_input" readonly> </div>
					<div class="col-sm-8"></div>
				</div>
				<div class="row human-skeleton">
					<div class="col-sm-12">
						<img src="<?php echo base_url('public/assets/images/Lev.png'); ?>" class="img-fluid d-block mx-auto">
						<button type="button" class="btn spinal_level" value="C1-2" >C1-2</button>
						<button type="button" class="btn spinal_level" value="C2-3" id="c2-3">C2-3</button>
						<button type="button" class="btn spinal_level" value="C3-4" id="c2-4">C3-4</button>
						<button type="button" class="btn spinal_level" value="C4-5" id="c2-5">C4-5</button>
						<button type="button" class="btn spinal_level" value="C5-6" id="c2-6">C5-6</button>
						<button type="button" class="btn spinal_level" value="C6-7" id="c2-7">C6-7</button>
						<button type="button" class="btn spinal_level" value="C7-T1" id="c2-8">C7-T1</button>
						<button type="button" class="btn spinal_level" value="T1-2" id="c2-9">T1-2</button>
						<button type="button" class="btn spinal_level" value="T2-3" id="c2-10">T2-3</button>
						<button type="button" class="btn spinal_level" value="T3-4" id="c2-11">T3-4</button>
						<button type="button" class="btn spinal_level" value="T4-5" id="c2-12">T4-5</button>
						<button type="button" class="btn spinal_level" value="T5-6" id="c2-13">T5-6</button>
						<button type="button" class="btn spinal_level" value="T6-7" id="c2-14">T6-7</button>
						<button type="button" class="btn spinal_level" value="T7-8" id="c2-15">T7-8</button>
						<button type="button" class="btn spinal_level" value="T8-9" id="c2-16">T8-9</button>
						<button type="button" class="btn spinal_level" value="T9-10" id="c2-17">T9-10</button>
						<button type="button" class="btn spinal_level" value="T10-11" id="c2-18">T10-11</button>
						<button type="button" class="btn spinal_level" value="T11-12" id="c2-19">T11-12</button>
						<button type="button" class="btn spinal_level" value="T12-L1" id="c2-20">T12-L1</button>
						<button type="button" class="btn spinal_level" value="L1-2" id="c2-21">L1-2</button>
						<button type="button" class="btn spinal_level" value="L2-3" id="c2-22">L2-3</button>
						<button type="button" class="btn spinal_level" value="L3-4" id="c2-23">L3-4</button>
						<button type="button" class="btn spinal_level" value="L4-5" id="c2-24">L4-5</button>
						<button type="button" class="btn spinal_level" value="L5-S1" id="c2-25">L5-S1</button>
						<button type="button" class="btn spinal_level" value="Caudal" id="c2-26">Caudal</button>
					</div>
				</div> -->
				<h4 class="pt-4" style="margin-bottom:20px;"><b>Spinal section of CSE</b></h4>
				<label>Spinal Needle Type and Size</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select Spinal Needle Brand</span>
						<div class="row pt-2">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control spinal_needel_brand_other" name="spinal_needel_brand">
									<option value="">Select Needle Brand</option>
									<?php
										foreach($spinal_needle_brand as $key=>$master){
									?>
										
										<option><?php echo $master['name']; ?></option>
										
									<?php
									}
									?>
									<option value="Other">Other</option>
								</select>
								<input type="text" class="form-control spinal_needel_brand_other_input" name="spinal_needel_brand_input" style="margin-top: 12px; display:none; ">
							</div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select  Spinal Needle Type</span>
						<div class="row pt-2">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control spinal_needel_type_other" name="spinal_needel_type">
									<option value="">Select Needle Type</option>
									<?php
										foreach($spinal_needle_type as $key=>$master){
									?>
										
										<option><?php echo $master['name']; ?></option>
										
									<?php
									}
									?>
									<option value="Other">Other</option>
								</select>
								<input type="text" class="form-control spinal_needel_type_other_input" name="spinal_needel_type_input" style="margin-top: 12px; display:none; ">
							</div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div><!--row-->
				<div class="row pt mb-2">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select  Spinal Needle Size</span>
						<div class="row pt-2">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control" name="spinal_needle_size">
									<option value = "">Select needle size</option>
									<option>18G</option>
									<option>19G</option>
									<option>20G</option>
									<option>21G</option>
									<option>22G</option>
									<option>23G</option>
									<option>24G</option>
									<option>25G</option>
									<option>26G</option>
									<option>27G</option>
									<option>28G</option>
									<option>29G</option>
									<option>30G</option>
									<option>31G</option>
									<option>32G</option>
								</select>
							</div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label>Approach</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="spinal_approach">
							<option value="">Select</option>
							<option>Midline</option>
							<option>Paramedian</option>
						</select>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label>Number of Attempts</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="spinal_no_attempts">
							<option value="">Select</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<label class="pt-3">Spinal Local Anaesthetic</label>
				<div class="row" style="display:none;">
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
						<div class= "box_1">
							<input type="hidden" class="switch_1" value="No" name="spinal_anaesthetic">
							<input type="checkbox" class="switch_1 spinal_anaesthe" value="Yes" name="spinal_anaesthetic" >
						</div>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<div class="row pt-1">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						
						<div class="procedure-cse spinal_anaesthe_box" >
							<span class="mb-2"><b></b></span>
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Lignocaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_lignoca_option1">
											<option value=''>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_persent1" name="spinal_lignoca_persent1" onkeyup="percentage('alert1')"><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_ml1" name="spinal_lignoca_ml1" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg1" name="spinal_lignoca_mg1" ><span style="padding-top:5px;">mg</span>
									</div>
									<i onclick="cleans1()" class="fa fa-times" id="clears1" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
								</div><!--pac-box-->
								<div class="pac-box" id="percentage_tage" style="padding:0; display:none;">
									<div class="pacu-1"></div>
									<div class="pacu-1-x"></div>
									<div class="pacu-1">
										<small  style="color:red;text-align:center;">should be from 0 to 4</small>
									</div>
									<div class="pacu-1"></div>
									<div class="pacu-1"></div>														
								</div>
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Bupivacaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_bupivaca_option2">
											<option value=''>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_persent2" name="spinal_bupivaca_persent2" onkeyup="percentage('alert2')"><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_ml2" name="spinal_bupivaca_ml2" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg2" name="spinal_bupivaca_mg2" ><span style="padding-top:5px;">mg</span>
									</div>
									<i onclick="cleans2()" class="fa fa-times" id="clears2" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
								</div><!--pac-box-->
								<div class="pac-box" id="percentage_tage1" style="padding:0; display:none;">
									<div class="pacu-1"></div>
									<div class="pacu-1-x"></div>
									<div class="pacu-1">
										<small  style="color:red;text-align:center;">should be from 0 to 4</small>
									</div>
									<div class="pacu-1"></div>
									<div class="pacu-1"></div>														
								</div>
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Ropivacaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_ropivaca_option3">
											<option value=''>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_persent3" name="spinal_ropivaca_persent3" onkeyup="percentage('alert3')"><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_ml3" name="spinal_ropivaca_ml3" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg3" name="spinal_ropivaca_mg3" ><span style="padding-top:5px;">mg</span>
									</div>
									<i onclick="cleans3()" class="fa fa-times" id="clears3" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
								</div><!--pac-box-->
								<div class="pac-box" id="percentage_tage2" style="padding:0; display:none;">
									<div class="pacu-1"></div>
									<div class="pacu-1-x"></div>
									<div class="pacu-1">
										<small  style="color:red;text-align:center;">should be from 0 to 4</small>
									</div>
									<div class="pacu-1"></div>
									<div class="pacu-1"></div>														
								</div>
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Prilocaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_priloca_option4">
											<option value=''>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_persent4" name="spinal_priloca_persent4" onkeyup="percentage('alert4')"><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_ml4" name="spinal_priloca_ml4" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg4" name="spinal_priloca_mg4" ><span style="padding-top:5px;">mg</span>
									</div>
									<i onclick="cleans4()" class="fa fa-times" id="clears4" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
								</div><!--pac-box-->
								<div class="pac-box" id="percentage_tage3" style="padding:0; display:none;">
									<div class="pacu-1"></div>
									<div class="pacu-1-x"></div>
									<div class="pacu-1">
										<small  style="color:red;text-align:center;">should be from 0 to 4</small>
									</div>
									<div class="pacu-1"></div>
									<div class="pacu-1"></div>														
								</div>
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>2-chloroprocaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_2chloropro_option5">
											<option value=''>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_persent5" name="spinal_2chloropro_persent5" onkeyup="percentage('alert5')"><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_ml5" name="spinal_2chloropro_ml5" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg5" name="spinal_2chloropro_mg5" ><span style="padding-top:5px;">mg</span>
									</div>
									<i onclick="cleans5()" class="fa fa-times" id="clears5" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
								</div><!--pac-box-->
								<div class="pac-box" id="percentage_tage4" style="padding:0; display:none;">
									<div class="pacu-1"></div>
									<div class="pacu-1-x"></div>
									<div class="pacu-1">
										<small  style="color:red;text-align:center;">should be from 0 to 4</small>
									</div>
									<div class="pacu-1"></div>
									<div class="pacu-1"></div>														
								</div>
								<!-- <p>Other</p> -->
								<div class="form-check" style="background-color: #F2F2F2!important;">
									<label class="form-check-label">
										<input type="hidden" class="switch_1" value="No" name="spinal_anaesth_other">
										<input type="checkbox" class="form-check-input spinal_anaesth_other" value="Yes" name="spinal_anaesth_other" >Other
									</label>
								</div>
								<div class="pac-box spinal_anaesth_other_option" style="display:none;background-color: #F2F2F2!important;">
									<div class="pacu-1"><input type="text" class="form-control" name="local_anaesthetic"></div>
									<div class="pacu-1-x">
										<select class="form-control spinal_anaesth_other_input" name="spinal_other_input6">
											<option value=''>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_persent6" name="spinal_other_persent6" onkeyup="percentage('alert6')"><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="number" class="form-control spinal_ml6" name="spinal_other_ml6" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg6" name="spinal_other_mg6" ><span style="padding-top:5px;">mg</span>
									</div>
									<i onclick="cleans6()" class="fa fa-times" id="clears6" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
								</div><!--pac-box-->
								<div class="pac-box" id="percentage_tage5" style="padding:0; display:none;">
									<div class="pacu-1"></div>
									<div class="pacu-1-x"></div>
									<div class="pacu-1">
										<small  style="color:red;text-align:center;">should be from 0 to 4</small>
									</div>
									<div class="pacu-1"></div>
									<div class="pacu-1"></div>														
								</div>
						</div><!--procedure-cse-->
					</div>
				</div><!--row-->
			
				<div class="row pt">
					<div class="col-sm-2">
						<label>Adjuvant
						 <div class="tooltip-23">
				           <i class="fa fa-info-circle" aria-hidden="true"></i>
				            <div class="right-23">
				                <div class="text-content-23">
				                    <h6>All options need to be unchecked <br> to make selection No.</h6>
				                    <i></i>
				                </div>
				            </div>
				        </div>    		
						</label>
					</div>
					<div class="col-sm-2"> 
						<div class= "box_1">
							<input type="checkbox" class="switch_1 spinal_adjuvant"  id="adju" onclick="adjuvant_spinal()">
						</div>
					</div>
					<div class="col-sm-8"></div>
				</div><!--row-->
				<div class="row spinal_adjuvant_box" style="display:none;" >
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class="pt" id="proced-plus" style="border: 1px solid lightgrey;border-radius: 8px;padding: 10px;">
								<div class="form-check mt-0">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input spinal_opioid_check" >Opioid
									</label>
								</div>
								<div class="opioid spinal_opioid mt-2" style="display:none;" >
									<div class="row" style="margin-left:3%;">
										<div class="col-sm-5"><span>Opioid Name</span></div>
										<div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="spinal_opioid_name[]"><button type="button" class="btn add4" ><i class="fa fa-plus" aria-hidden="true"></i></button></div>
									</div><!--row-->
									<div class="row pt" style="margin-left:3%;">
										<div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
										<div class="col-sm-7"><input type="text" class="form-control" name="spinal_opioid_dose[]"></div>
									</div><!--row-->
								</div>
								<div class="row pt">
									<div class="col-sm-5">
										<div class="form-check">
											<label class="form-check-label">
											<input type="checkbox" class="form-check-input spinal_clonidne" value="">Clonidne with Dose(mcgm)
											</label>
										</div>
									</div>
									<div class="col-sm-7"><input type="text" class="form-control spinal_clonidne_input" placeholder="mcgm" name="spinal_clonidne_dose" readonly></div>
								</div><!--row-->
								<div class="row pt">
								<div class="col-sm-5"> 
									<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input spinal_dexmedito" value="">Dexmeditomidine with Dose(mcgm)
										</label>
									</div>
								</div>
								<div class="col-sm-7"><input type="text" class="form-control spinal_dexmedito_input" name="spinal_dexmedito_dose" placeholder="mcgm" readonly></div>
								</div><!--row-->
								<div class="row pt">
								<div class="col-sm-5">
									<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input spinal_dexametha" value="">Dexamethasone with Dose(mg)
										</label>
									</div>
								</div>
								<div class="col-sm-7"><input type="text" class="form-control spinal_dexametha_input" name="spinal_dexametha_dose" placeholder="mg" readonly></div>
								</div><!--row-->
								<div class="row pt">
								<div class="col-sm-5">
									<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input spinal_tramadol" value="">Tramadol with Dose(mg)
										</label>
									</div>
								</div>
								<div class="col-sm-7"><input type="text" class="form-control spinal_tramadol_input" name="spinal_tramadol_dose" placeholder="mg" readonly></div>
								</div><!--row-->

								 <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="keta" onclick="ketamine()">Ketamine with dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                             <div class="col-sm-7"><input type="number" class="form-control" name="spinal_ketamin_dose" id="keta1" placeholder="mg" readonly></div>
                                        </div><!--row-->


                                         <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input"  id="mida" onclick="Midazolam()">Midazolam with dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="number" class="form-control" name="spinal_midazolam_dose" id="mida1" placeholder="mg" readonly></div>
                                        </div><!--row-->


								
								<div class="row pt">
								<div class="col-sm-5">
									<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input spinal_adrenaline" value="">Adrenaline(Epinephrine)(mcmg)
										</label>
									</div>
								</div>
								<div class="col-sm-7"><input type="text" class="form-control spinal_adrenaline_input" name="spinal_adrenaline_dose" placeholder="mcmg" readonly></div>
								</div><!--row-->
								<div class="row">
								<div class="col-sm-8">
									<div class="form-check">
										<label class="form-check-label">
										<input type="checkbox" class="form-check-input spinal_other" value="">Other
										</label>
									</div>
									<div class="spinal_other_box" style="display:none;">
										<div class="row pt">
											<div class="col-sm-4"><span>Adjuvant Name</span></div>
											<div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="spinal_aj_name[]" > <button type="button" class="btn add5" ><i class="fa fa-plus" aria-hidden="true"></i></button></div>
											<div class="col-sm-1"></div>
										</div>
										<div class="row pt">
											<div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div>
											<div class="col-sm-7"><input type="text" class="form-control" name="spinal_aj_dose[]" ></div>
											<div class="col-sm-1"></div>
										</div>
									</div>
								</div>
							</div><!--row-->
						</div>
					</div><!--col-10-->
				</div><!--row-->
					<h5 class="bt"></h5>
				<label class="pt">Analgesia supplementation required &nbsp;&nbsp;&nbsp; (<span id="analgesis"> NO </span>)</label></b>
				 <div class="tooltip-23">
		           <i class="fa fa-info-circle" aria-hidden="true"></i>
		            <div class="right-23">
		                <div class="text-content-23">
		                    <h6>All options need to be unchecked <br> to make selection No.</h6>
		                    <i></i>
		                </div>
		            </div>
		        </div>    
				</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class= "box_1 p-2">
							<input type="checkbox" class="switch_1 spinal_analgesia_supplement" id="ana" onclick="analgesia()">
						</div>
						<div class="analg-box spinal_analgesia_supplement_box" style="display:none;">
							<div class="form-check mt-0">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="asr_spinal_inhalation">
									<input type="checkbox" class="form-check-input asr_spinal_inhalation" name="asr_spinal_inhalation" value="Yes">Inhalation Analgesia
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="asr_spinal_iv_analgesia">
									<input type="checkbox" class="form-check-input spinal_iv_analgesia" value="Yes" name="asr_spinal_iv_analgesia">IV Analgesia
								</label>
							</div>
							<div class="spinal_iv_analgesia_box" style="display:none;">

								<div class="form-check" style="margin-left: 3%;">
									<label class="form-check-label">
										<input type="hidden" class="switch_1" value="No" name="asr_opioids_spinal">
										<input type="checkbox" class="form-check-input spinal_opioid_supplemen" value="Yes" name="asr_opioids_spinal">Opioids
									</label>
								</div>
									<div class="spinal_opioid_supplemen_box  mt-2" style="display:none;" >
										<div class="row" style="margin-left:3%;">
											<div class="col-sm-5"><span>Opioid Name</span></div>
											<div class="col-sm-7" id="proced-plus" style="display:flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name_spinal[]"><button type="button" class="btn add6" ><i class="fa fa-plus" aria-hidden="true"></i></button></div>
										</div><!--row-->
										<div class="row pt" style="margin-left:3%;">
											<div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
											<div class="col-sm-7"><input type="text" class="form-control op_remove" name="asr_opioid_dose_spinal[]"></div>
										</div><!--row-->
									</div>
									<div class="form-check" style="margin-left: 3%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_multi_modal">
											<input type="checkbox" class="form-check-input spinal_multi_model" value="Yes" name="asr_multi_modal">Paracetamol / Anti-Inflammatories
										</label>
									</div>
									<div class="form-check" style="margin-left: 3%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_ketamine">
											<input type="checkbox" class="form-check-input asr_ketamine" value="Yes" name="asr_ketamine">Ketamine
										</label>
									</div>
									<div class="form-check" style="margin-left: 3%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_other_iv">
											<input type="checkbox" class="form-check-input spinal_adju" value="Yes" name="asr_other_iv">Other IV Adjuncts
										</label>
									</div>
									<div class="spinal_adju_box mt-2" style="display:none;">
										<div class="row">
											<div class="col-sm-1"></div>
											<div class="col-sm-3"><label>Adjuvant Name</label></div>
											<div class="col-sm-4">
												<input type="text" class="form-control aj_remove" name="asr_name_aj" >
											</div>
											<div class="col-sm-4"></div>
										</div>
										<div class="row pt">
											<div class="col-sm-1"></div>
											<div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
											<div class="col-sm-4">
												<input type="text" class="form-control aj_remove" name="asr_name_dose" >
											</div>
											<div class="col-sm-4"></div>
										</div>
									</div>
								<div class="spinal_multi_model_box" style="display:none;">
									<!-- <div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_ketamine">
											<input type="checkbox" class="form-check-input" value="Yes" name="asr_ketamine">Ketamine
										</label>
									</div> -->
									<!-- <div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_dexmedetomi">
											<input type="checkbox" class="form-check-input" value="Yes" name="asr_dexmedetomi">Dexmedetomidine
										</label>
									</div>
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_clonidine">
											<input type="checkbox" class="form-check-input" value="Yes" name="asr_clonidine">Clonidine
										</label>
									</div>
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_tramadol">
											<input type="checkbox" class="form-check-input" value="Yes" name="asr_tramadol">Tramadol
										</label>
									</div>
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_magnesium">
											<input type="checkbox" class="form-check-input" value="Yes" name="asr_magnesium">Magnesium
										</label>
									</div> -->
									<!-- <div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_other_iv">
											<input type="checkbox" class="form-check-input spinal_adju" value="Yes" name="asr_other_iv">Other IV Adjuncts
										</label>
									</div>
									<div class="spinal_adju_box mt-2" style="display:none;">
										<div class="row">
											<div class="col-sm-1"></div>
											<div class="col-sm-3"><label>Adjuvant Name</label></div>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="asr_name_aj" >
											</div>
											<div class="col-sm-4"></div>
										</div>
										<div class="row pt">
											<div class="col-sm-1"></div>
											<div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="asr_name_dose" >
											</div>
											<div class="col-sm-4"></div>
										</div>
									</div> -->
								</div>
							</div>	
						</div>
					</div><!--col-10-->
				</div><!--row-->
				<label class="pt">Technical complications &nbsp;&nbsp;&nbsp; (<span id="teche"> NO </span>)</b>
				 <div class="tooltip-23">
		           <i class="fa fa-info-circle" aria-hidden="true"></i>
		            <div class="right-23">
		                <div class="text-content-23">
		                    <h6>All options need to be unchecked <br> to make selection No.</h6>
		                    <i></i>
		                </div>
		            </div>
		        </div>    		
				</label> 
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 tech_complication_check" id="tech" onclick="technical()">
						</div>
						<div class="tech-compli tech_complication_checkbox" style="display:none;">
							<ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="tc_failure_spinal_component">
											<input type="checkbox" class="form-check-input tc_failure_spinal_component" value="Yes" name="tc_failure_spinal_component">Failure of spinal component
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_equipment">
											<input type="checkbox" class="form-check-input complication_equipment" value="Yes" name="complication_equipment">Equipment related
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_multi_attempts">
											<input type="checkbox" class="form-check-input complication_multi_attempts" value="Yes" name="complication_multi_attempts">Multiple attempts
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_2nd_anaesthe">
											<input type="checkbox" class="form-check-input complication_2nd_anaesthe" value="Yes" name="complication_2nd_anaesthe">2nd Anaesthetist
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_failure_space">
											<input type="checkbox" class="form-check-input complication_failure_space" value="Yes" name="complication_failure_space">Technique abandoned/failure to find space
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_catheter">
											<input type="checkbox" class="form-check-input complication_catheter" value="Yes" name="complication_catheter">Catheter related
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_other_check">
											<input type="checkbox" class="form-check-input spinal_technical_other" value="Yes" name="complication_other_check">Other
										</label>
									</div>
								</li>
								<li style="display:none;" class="spinal_technical_input">
									<input type="text" class="form-control complication_other" name="complication_other" >
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								
							</ul>

							<ul style="margin-bottom:0px;padding-left: 0; display:none;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_none">
											<input type="checkbox" class="form-check-input" value="Yes" name="complication_none">None
										</label>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div><!--row-->				
				<label class="pt">Acute complications &nbsp;&nbsp;&nbsp; (<span id="acutes"> NO </span>)</b>
				 <div class="tooltip-23">
		           <i class="fa fa-info-circle" aria-hidden="true"></i>
		            <div class="right-23">
		                <div class="text-content-23">
		                    <h6>All options need to be unchecked <br> to make selection No.</h6>
		                    <i></i>
		                </div>
		            </div>
		        </div>    		
				</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 spinal_acute_multi_option" id="acu" onclick="acute()">
						</div>
						<div class="spinal_acute_multi_option_box" style="display:none;">
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="intrathecal_migration">
									<input type="checkbox" class="form-check-input intrathecal_migration" value="Yes" name="intrathecal_migration">Intrathecal migration of Epidural cathetr.. 
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_epidural_resited">
									<input type="checkbox" class="form-check-input ac_epidural_resited" value="Yes" name="ac_epidural_resited">Epidural re-sited
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_last">
									<input type="checkbox" class="form-check-input ac_last" value="Yes" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_rasicular_pain">
									<input type="checkbox" class="form-check-input ac_rasicular_pain" value="Yes" name="ac_rasicular_pain">Radicular Pain (needle/catheter)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_paresthesia_pain">
									<input type="checkbox" class="form-check-input ac_paresthesia_pain" value="Yes" name="ac_paresthesia_pain">Paresthesia  (needle/catheter)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_bloody_tap">
									<input type="checkbox" class="form-check-input ac_bloody_tap" value="Yes" name="ac_bloody_tap">Bloody Tap (needle/catheter)
								</label>
							</div>
							<!-- <div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_bloody_tap">
									<input type="checkbox" class="form-check-input" value="Yes" name="">Intrathecal migration of epidural catheter
								</label>
							</div> -->
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_hypotension"> 
									<input type="checkbox" class="form-check-input ac_hypotension" value="Yes" name="ac_hypotension">Hypotension <!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="20% drop from baseline or SBP,90mmHg"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
									<div class="tooltip-5">
									   <i class="fa fa-info-circle" aria-hidden="true"></i>
									    <div class="right-5">
									        <div class="text-content-5">
									            <h6>20% drop from baseline or SBP,90mmHg.</h6>
									            <i></i>
									        </div>
									    </div>
									</div>
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_nausea">
									<input type="checkbox" class="form-check-input ac_nausea" value="Yes" name="ac_nausea">Nausea
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_vomiting">
									<input type="checkbox" class="form-check-input ac_vomiting" value="Yes" name="ac_vomiting">Vomiting
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_high_block">
									<input type="checkbox" class="form-check-input ac_high_block" value="Yes" name="ac_high_block">High Block <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_subdural_block">
									<input type="checkbox" class="form-check-input ac_subdural_block" value="Yes" name="ac_subdural_block">Subdural Block
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_total_spinal">
									<input type="checkbox" class="form-check-input ac_total_spinal" value="Yes" name="ac_total_spinal">Total Spinal <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_respira_arrest">
									<input type="checkbox" class="form-check-input ac_respira_arrest" value="Yes" name="ac_respira_arrest">Respiratory Arrest
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_cardiac_arrest">
									<input type="checkbox" class="form-check-input ac_cardiac_arrest" value="Yes" name="ac_cardiac_arrest">Cardiac Arrest
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="maternal_fever">
									<input type="checkbox" class="form-check-input maternal_fever" value="Yes" 
									name="maternal_fever">Maternal Fever
									<div class="tooltip-5">
									   <i class="fa fa-info-circle" aria-hidden="true"></i>
									    <div class="right-5">
									        <div class="text-content-5">
									            <h6>Temperature > 38dec C or 100.4 deg F</h6>
									            <i></i>
									        </div>
									    </div>
									</div>
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="foetal_CTG">
									<input type="checkbox" class="form-check-input foetal_CTG" value="Yes" name="foetal_CTG">Acute Foetal CTG Changes / Deceleration needing intervention
								</label>
							</div>
							<div class="form-check" style="display: flex;">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_other">
									<input type="checkbox" class="form-check-input spinal_acute_other" value="Yes" name="ac_other"  id = "ac_other">Other
								</label>
								<input type="text" class="form-control spinal_acute_other_input ml-3" name="ac_other_input" style="width: 30%;display:none;"> 
							</div>
							<div class="form-check" style="display:none;">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_none">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_none">None
								</label>
							</div>
						</div>
					</div>
				</div><!--row-->
				<label class="pt">Success<span class="mandat">*</span>
				<!-- <div class="tooltip-6">
				   <i class="fa fa-info-circle" aria-hidden="true"></i>
				    <div class="right-6">
				        <div class="text-content-6">
				            <h6>Please consider the purpose of CNB along with the below definition. <br><br> Purpose of CNB : <br> 1. Sole/Primary anaesthetic <br> 2. Analgesic purpose only<br><br>Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade.</h6>
							<i></i>
				        </div>
				    </div>
				</div>	 -->
				</label>
				&nbsp;<small class="succes" style="color:red; display:none;">please choose success status</small></label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-6">
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" id="com" value="Complete Success" name="success_option" data-placement="bottom" onclick="complete()">Complete Success
							<div class="tooltip-20">
							   <i class="fa fa-info-circle" aria-hidden="true"></i>
							    <div class="right-20">
							        <div class="text-content-20">
							            <h6><b>Complete Success:</b> <br>Complete analgesia with pain scores VNRS>75%reduction within 45 min of Epidural placement and bolus dose. High patient satisfaction</h6>
										<i></i>
							        </div>
							    </div>
							</div>
							</label>
						</div>
						<ul class="success-list pt-2">
							<li>Onset</li>
							<li><input type="text" class="form-control" name="comp1ete_success_onset" id="com1" readonly></li>
							<li>(Mins)</li>
						</ul>
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" id="par" value="Partial Success" name="success_option" onclick="partial()">Partial Success
							<div class="tooltip-21">
							   <i class="fa fa-info-circle" aria-hidden="true"></i>
							    <div class="right-21">
							        <div class="text-content-21">
							          <h6><b>Partial Succes</b>:<br>pain scoresVNRS 25-75% reduction, requires further top-up, alternative analgesia to improve quality of analgesia. Moderate patient satisfaction scores</h6>
									<i></i>
							        </div>
							    </div>
							</div>
							</label>
						</div>
						<ul class="success-list pt-2">
							<li>Onset</li>
							<li><input type="text" class="form-control" name="partial_success_onset" id="par1" readonly></li>
							<li>(Mins)</li>
						</ul>
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Failure" name="success_option" id="fail" onclick="failure()">Failure
							<div class="tooltip-9">
							   <i class="fa fa-info-circle" aria-hidden="true"></i>
							    <div class="right-9">
							        <div class="text-content-9">
							            <h6><b>Failure:</b> <br> VNRS reduction<25%,no discernible sensory level, requires re-siting, abandonment, dural puncture or very dis-satisfied patient.</h6>
										<i></i>
							        </div>
							    </div>
							</div>
							</label>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<label class="pt">Sensory Level<span class="mandat">*</span></label>
				
				<div class="modal fade" id="work">
					<div class="modal-dialog modal-md">
						<div class="modal-content">	
							
							<div class="index-color d-flex mt-3">
								<ul>
									<li><div class="highest"></div></li>
									<li><span>Highest Sensory Level</span></li>
								</ul>
								<ul>
									<li><div class="lowest"></div></li>
									<li><span>Lowest Sensory Level</span></li>
								</ul>
							</div>
							<!-- Modal body -->
							<div class="modal-body" style="text-align:center;">	
								<input type="hidden" id="numbers">						
								<input type="hidden" id="ids">
								<input type="hidden" id="values">
								<button type="button" class="btn-red" onclick="refer('red')">Red</button>
								<button type="button" class="btn-green" onclick="refer('green')">Green</button>
								<!-- <button type="button" class="btn-white" onclick="refer('white')">White</button> -->
							</div>					
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="sensor-table">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th></th>
											<th colspan="2">Cold</th>
											<th colspan="2">Touch</th>
											<th colspan="2">Pin Prick</th>
										</tr>
										<tr>
											<th></th>
											<th>L</th>
											<th>R</th>
											<th>L</th>
											<th>R</th>
											<th>L</th>
											<th>R</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>C2</td>
											<td class="selection" onclick="tog('cold-L-c2','1')" id="cold-L-c2"></td>
											<td  onclick="tog('cold-R-c2','1')" id="cold-R-c2"></td>
											<td  onclick="tog('Touch-L-c2','1')" id="Touch-L-c2"></td>
											<td  onclick="tog('Touch-R-c2','1')" id="Touch-R-c2"></td>
											<td  onclick="tog('pinprick-L-c2','1')" id="pinprick-L-c2"></td>
											<td  onclick="tog('pinprick-R-c2','1')" id="pinprick-R-c2"></td>
										</tr>
										<tr>
											<td>C3</td>
											<td class="selection" onclick="tog('cold-L-c3','2')" id="cold-L-c3"></td>
											<td  onclick="tog('cold-R-c3','2')" id="cold-R-c3"></td>
											<td  onclick="tog('Touch-L-c3','2')" id="Touch-L-c3"></td>
											<td  onclick="tog('Touch-R-c3','2')" id="Touch-R-c3"></td>
											<td  onclick="tog('pinprick-L-c3','2')" id="pinprick-L-c3"></td>
											<td  onclick="tog('pinprick-R-c3','2')" id="pinprick-R-c3"></td>
										</tr>
										<tr>
											<td>C4</td>
											<td class="selection" onclick="tog('cold-L-c4','3')" id="cold-L-c4"></td>
											<td  onclick="tog('cold-R-c4','3')" id="cold-R-c4"></td>
											<td  onclick="tog('Touch-L-c4','3')" id="Touch-L-c4"></td>
											<td  onclick="tog('Touch-R-c4','3')" id="Touch-R-c4"></td>
											<td  onclick="tog('pinprick-L-c4','3')" id="pinprick-L-c4"></td>
											<td  onclick="tog('pinprick-R-c4','3')" id="pinprick-R-c4"></td>
										</tr>
										<tr>
											<td>C5</td>
											<td class="selection" onclick="tog('cold-L-c5','4')" id="cold-L-c5"></td>
											<td  onclick="tog('cold-R-c5','4')" id="cold-R-c5"></td>
											<td  onclick="tog('Touch-L-c5','4')" id="Touch-L-c5"></td>
											<td  onclick="tog('Touch-R-c5','4')" id="Touch-R-c5"></td>
											<td  onclick="tog('pinprick-L-c5','4')" id="pinprick-L-c5"></td>
											<td  onclick="tog('pinprick-R-c5','4')" id="pinprick-R-c5"></td>
										</tr>
										<tr>
											<td>C6</td>
											<td class="selection" onclick="tog('cold-L-c6','5')" id="cold-L-c6"></td>
											<td  onclick="tog('cold-R-c6','5')" id="cold-R-c6"></td>
											<td  onclick="tog('Touch-L-c6','5')" id="Touch-L-c6"></td>
											<td  onclick="tog('Touch-R-c6','5')" id="Touch-R-c6"></td>
											<td  onclick="tog('pinprick-L-c6','5')" id="pinprick-L-c6"></td>
											<td  onclick="tog('pinprick-R-c6','5')" id="pinprick-R-c6"></td>
										</tr>
										<tr>
											<td>C7</td>
											<td class="selection" onclick="tog('cold-L-c7','6')" id="cold-L-c7"></td>
											<td  onclick="tog('cold-R-c7','6')" id="cold-R-c7"></td>
											<td  onclick="tog('Touch-L-c7','6')" id="Touch-L-c7"></td>
											<td  onclick="tog('Touch-R-c7','6')" id="Touch-R-c7"></td>
											<td  onclick="tog('pinprick-L-c7','6')" id="pinprick-L-c7"></td>
											<td  onclick="tog('pinprick-R-c7','6')" id="pinprick-R-c7"></td>
										</tr>
										<tr>
											<td>C8</td>
											<td class="selection" onclick="tog('cold-L-c8','7')" id="cold-L-c8"></td>
											<td  onclick="tog('cold-R-c8','7')" id="cold-R-c8"></td>
											<td  onclick="tog('Touch-L-c8','7')" id="Touch-L-c8"></td>
											<td  onclick="tog('Touch-R-c8','7')" id="Touch-R-c8"></td>
											<td  onclick="tog('pinprick-L-c8','7')" id="pinprick-L-c8"></td>
											<td  onclick="tog('pinprick-R-c8','7')" id="pinprick-R-c8"></td>
										</tr>
										
										<tr>
											<td>T1</td>
											<td class="selection" onclick="tog('cold-L-t1','8')" id="cold-L-t1"></td>
											<td  onclick="tog('cold-R-t1','8')" id="cold-R-t1"></td>
											<td  onclick="tog('Touch-L-t1','8')" id="Touch-L-t1"></td>
											<td  onclick="tog('Touch-R-t1','8')" id="Touch-R-t1"></td>
											<td  onclick="tog('pinprick-L-t1','8')" id="pinprick-L-t1"></td>
											<td  onclick="tog('pinprick-R-t1','8')" id="pinprick-R-t1"></td>
										</tr>
										<tr>
											<td>T2</td>
											<td class="selection" onclick="tog('cold-L-t2','9')" id="cold-L-t2"></td>
											<td  onclick="tog('cold-R-t2','9')" id="cold-R-t2"></td>
											<td  onclick="tog('Touch-L-t2','9')" id="Touch-L-t2"></td>
											<td  onclick="tog('Touch-R-t2','9')" id="Touch-R-t2"></td>
											<td  onclick="tog('pinprick-L-t2','9')" id="pinprick-L-t2"></td>
											<td  onclick="tog('pinprick-R-t2','9')" id="pinprick-R-t2"></td>
										</tr>
										<tr>
											<td>T3</td>
											<td class="selection" onclick="tog('cold-L-t3','10')" id="cold-L-t3"></td>
											<td  onclick="tog('cold-R-t3','10')" id="cold-R-t3"></td>
											<td  onclick="tog('Touch-L-t3','10')" id="Touch-L-t3"></td>
											<td  onclick="tog('Touch-R-t3','10')" id="Touch-R-t3"></td>
											<td  onclick="tog('pinprick-L-t3','10')" id="pinprick-L-t3"></td>
											<td  onclick="tog('pinprick-R-t3','10')" id="pinprick-R-t3"></td>
										</tr>
										<tr>
											<td>T4</td>
											<td class="selection" onclick="tog('cold-L-t4','11')" id="cold-L-t4"></td>
											<td  onclick="tog('cold-R-t4','11')" id="cold-R-t4"></td>
											<td  onclick="tog('Touch-L-t4','11')" id="Touch-L-t4"></td>
											<td  onclick="tog('Touch-R-t4','11')" id="Touch-R-t4"></td>
											<td  onclick="tog('pinprick-L-t4','11')" id="pinprick-L-t4"></td>
											<td  onclick="tog('pinprick-R-t4','11')" id="pinprick-R-t4"></td>
										</tr>
										<tr>
											<td>T5</td>
											<td class="selection" onclick="tog('cold-L-t5','12')" id="cold-L-t5"></td>
											<td  onclick="tog('cold-R-t5','12')" id="cold-R-t5"></td>
											<td  onclick="tog('Touch-L-t5','12')" id="Touch-L-t5"></td>
											<td  onclick="tog('Touch-R-t5','12')" id="Touch-R-t5"></td>
											<td  onclick="tog('pinprick-L-t5','12')" id="pinprick-L-t5"></td>
											<td  onclick="tog('pinprick-R-t5','12')" id="pinprick-R-t5"></td>
										</tr>
										<tr>
											<td>T6</td>
											<td class="selection" onclick="tog('cold-L-t6','13')" id="cold-L-t6"></td>
											<td  onclick="tog('cold-R-t6','13')" id="cold-R-t6"></td>
											<td  onclick="tog('Touch-L-t6','13')" id="Touch-L-t6"></td>
											<td  onclick="tog('Touch-R-t6','13')" id="Touch-R-t6"></td>
											<td  onclick="tog('pinprick-L-t6','13')" id="pinprick-L-t6"></td>
											<td  onclick="tog('pinprick-R-t6','13')" id="pinprick-R-t6"></td>
										</tr>
										<tr>
											<td>T7</td>
											<td class="selection" onclick="tog('cold-L-t7','14')" id="cold-L-t7"></td>
											<td  onclick="tog('cold-R-t7','14')" id="cold-R-t7"></td>
											<td  onclick="tog('Touch-L-t7','14')" id="Touch-L-t7"></td>
											<td  onclick="tog('Touch-R-t7','14')" id="Touch-R-t7"></td>
											<td  onclick="tog('pinprick-L-t7','14')" id="pinprick-L-t7"></td>
											<td  onclick="tog('pinprick-R-t7','14')" id="pinprick-R-t7"></td>
										</tr>
										<tr>
											<td>T8</td>
											<td class="selection" onclick="tog('cold-L-t8','15')" id="cold-L-t8"></td>
											<td  onclick="tog('cold-R-t8','15')" id="cold-R-t8"></td>
											<td  onclick="tog('Touch-L-t8','15')" id="Touch-L-t8"></td>
											<td  onclick="tog('Touch-R-t8','15')" id="Touch-R-t8"></td>
											<td  onclick="tog('pinprick-L-t8','15')" id="pinprick-L-t8"></td>
											<td  onclick="tog('pinprick-R-t8','15')" id="pinprick-R-t8"></td>
										</tr>
										<tr>
											<td>T9</td>
											<td class="selection" onclick="tog('cold-L-t9','16')" id="cold-L-t9"></td>											
											<td  onclick="tog('cold-R-t9','16')" id="cold-R-t9"></td>
											<td  onclick="tog('Touch-L-t9','16')" id="Touch-L-t9"></td>
											<td  onclick="tog('Touch-R-t9','16')" id="Touch-R-t9"></td>
											<td  onclick="tog('pinprick-L-t9','16')" id="pinprick-L-t9"></td>
											<td  onclick="tog('pinprick-R-t9','16')" id="pinprick-R-t9"></td>
										</tr>
										<tr>
											<td>T10</td>
											<td class="selection" onclick="tog('cold-L-t10','17')" id="cold-L-t10"></td>											
											<td  onclick="tog('cold-R-t10','17')" id="cold-R-t10"></td>
											<td  onclick="tog('Touch-L-t10','17')" id="Touch-L-t10"></td>
											<td  onclick="tog('Touch-R-t10','17')" id="Touch-R-t10"></td>
											<td  onclick="tog('pinprick-L-t10','17')" id="pinprick-L-t10"></td>
											<td  onclick="tog('pinprick-R-t10','17')" id="pinprick-R-t10"></td>
										</tr>
										<tr>
											<td>T11</td>
											<td class="selection" onclick="tog('cold-L-t11','18')" id="cold-L-t11"></td>											
											<td  onclick="tog('cold-R-t11','18')" id="cold-R-t11"></td>
											<td  onclick="tog('Touch-L-t11','18')" id="Touch-L-t11"></td>
											<td  onclick="tog('Touch-R-t11','18')" id="Touch-R-t11"></td>
											<td  onclick="tog('pinprick-L-t11','18')" id="pinprick-L-t11"></td>
											<td  onclick="tog('pinprick-R-t11','18')" id="pinprick-R-t11"></td>
										</tr>
										<tr>
											<td>T12</td>
											<td class="selection" onclick="tog('cold-L-t12','19')" id="cold-L-t12"></td>											
											<td  onclick="tog('cold-R-t12','19')" id="cold-R-t12"></td>
											<td  onclick="tog('Touch-L-t12','19')" id="Touch-L-t12"></td>
											<td  onclick="tog('Touch-R-t12','19')" id="Touch-R-t12"></td>
											<td  onclick="tog('pinprick-L-t12','19')" id="pinprick-L-t12"></td>
											<td  onclick="tog('pinprick-R-t12','19')" id="pinprick-R-t12"></td>
										</tr>
										<tr>
											<td>L1</td>
											<td class="selection" onclick="tog('cold-L-l1','20')" id="cold-L-l1"></td>											
											<td  onclick="tog('cold-R-l1','20')" id="cold-R-l1"></td>
											<td  onclick="tog('Touch-L-l1','20')" id="Touch-L-l1"></td>
											<td  onclick="tog('Touch-R-l1','20')" id="Touch-R-l1"></td>
											<td  onclick="tog('pinprick-L-l1','20')" id="pinprick-L-l1"></td>
											<td  onclick="tog('pinprick-R-l1','20')" id="pinprick-R-l1"></td>
										</tr>
										<tr>
											<td>L2</td>
											<td class="selection" onclick="tog('cold-L-l2','21')" id="cold-L-l2"></td>										
											<td  onclick="tog('cold-R-l2','21')" id="cold-R-l2"></td>
											<td  onclick="tog('Touch-L-l2','21')" id="Touch-L-l2"></td>
											<td  onclick="tog('Touch-R-l2','21')" id="Touch-R-l2"></td>
											<td  onclick="tog('pinprick-L-l2','21')" id="pinprick-L-l2"></td>
											<td  onclick="tog('pinprick-R-l2','21')" id="pinprick-R-l2"></td>
										</tr>
										<tr>
											<td>L3</td>
											<td class="selection" onclick="tog('cold-L-l3','22')" id="cold-L-l3"></td>											
											<td  onclick="tog('cold-R-l3','22')" id="cold-R-l3"></td>
											<td  onclick="tog('Touch-L-l3','22')" id="Touch-L-l3"></td>
											<td  onclick="tog('Touch-R-l3','22')" id="Touch-R-l3"></td>
											<td  onclick="tog('pinprick-L-l3','22')" id="pinprick-L-l3"></td>
											<td  onclick="tog('pinprick-R-l3','22')" id="pinprick-R-l3"></td>
										</tr>
										<tr>
											<td>L4</td>
											<td class="selection" onclick="tog('cold-L-l4','23')" id="cold-L-l4"></td>											
											<td  onclick="tog('cold-R-l4','23')" id="cold-R-l4"></td>
											<td  onclick="tog('Touch-L-l4','23')" id="Touch-L-l4"></td>
											<td  onclick="tog('Touch-R-l4','23')" id="Touch-R-l4"></td>
											<td  onclick="tog('pinprick-L-l4','23')" id="pinprick-L-l4"></td>
											<td  onclick="tog('pinprick-R-l4','23')" id="pinprick-R-l4"></td>
										</tr>
										<tr>
											<td>L5</td>
											<td class="selection" onclick="tog('cold-L-l5','24')" id="cold-L-l5"></td>											
											<td  onclick="tog('cold-R-l5','24')" id="cold-R-l5"></td>
											<td  onclick="tog('Touch-L-l5','24')" id="Touch-L-l5"></td>
											<td  onclick="tog('Touch-R-l5','24')" id="Touch-R-l5"></td>
											<td  onclick="tog('pinprick-L-l5','24')" id="pinprick-L-l5"></td>
											<td  onclick="tog('pinprick-R-l5','24')" id="pinprick-R-l5"></td>
										</tr>
										<tr>
											<td>S1</td>
											<td class="selection" onclick="tog('cold-L-s1','25')" id="cold-L-s1"></td>											
											<td  onclick="tog('cold-R-s1','25')" id="cold-R-s1"></td>
											<td  onclick="tog('Touch-L-s1','25')" id="Touch-L-s1"></td>
											<td  onclick="tog('Touch-R-s1','25')" id="Touch-R-s1"></td>
											<td  onclick="tog('pinprick-L-s1','25')" id="pinprick-L-s1"></td>
											<td  onclick="tog('pinprick-R-s1','25')" id="pinprick-R-s1"></td>
										</tr>
										<tr>
											<td>S2</td>
											<td class="selection" onclick="tog('cold-L-s2','26')" id="cold-L-s2"></td>											
											<td  onclick="tog('cold-R-s2','26')" id="cold-R-s2"></td>
											<td  onclick="tog('Touch-L-s2','26')" id="Touch-L-s2"></td>
											<td  onclick="tog('Touch-R-s2','26')" id="Touch-R-s2"></td>
											<td  onclick="tog('pinprick-L-s2','26')" id="pinprick-L-s2"></td>
											<td  onclick="tog('pinprick-R-s2','26')" id="pinprick-R-s2"></td>
										</tr>
										<tr>
											<td>S3</td>
											<td class="selection" onclick="tog('cold-L-s3','27')" id="cold-L-s3"></td>											
											<td  onclick="tog('cold-R-s3','27')" id="cold-R-s3"></td>
											<td  onclick="tog('Touch-L-s3','27')" id="Touch-L-s3"></td>
											<td  onclick="tog('Touch-R-s3','27')" id="Touch-R-s3"></td>
											<td  onclick="tog('pinprick-L-s3','27')" id="pinprick-L-s3"></td>
											<td  onclick="tog('pinprick-R-s3','27')" id="pinprick-R-s3"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div><!--sensor-table-->
						
					</div>
					<div class="col-sm-6">
						<div class="sens-cont">
							<p>Choose atleast one mode of testing and enter the highest and lowest sensory level for right and left side.<br> You can choose more than one mode,but please make sure you complete highest and lowest level for left and right side.</p>
						</div>
						<div class="index-color">
							<ul>
								<li><div class="highest"></div></li>
								<li><span>Highest Sensory Level</span></li>
							</ul>
							<ul>
								<li><div class="lowest"></div></li>
								<li><span>Lowest Sensory Level</span></li>
							</ul>
						</div>
						<img src="<?php echo base_url('public/assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto" style="margin-top: 42%;">
					</div>
				</div><!--row-->
				<h4><b>Motor Level (Bromage Score)<span class="mandat">*</span></b></h4>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<select class="form-control" id="motor_level" name="motor_level" onchange="checkmotor()">
							<option value=''>Select</option>
							<option>0&nbsp;&nbsp;(Free movement of legs and feet)</option>
							<option>1&nbsp;&nbsp;(Just able to fix knees with free movement of feet)</option>
							<option>2&nbsp;&nbsp;(Unable to flex Knees,but with free movement of feet)</option>
							<option>3&nbsp;&nbsp;(Unable to move legs or feet)</option>
						</select>
						<small class="motro" style="color:red; display:none;">please enter motor level</small>
						<img src="<?php echo base_url('public/assets/images/Bromo.png'); ?>" class="img-fluid d-block mx-auto">
					</div>
					<div class="col-sm-3"></div>
				</div><!--row-->
				<!-- <div class="duration">
					<ul>
						<li><label>Onset of surgical Anaesthesia</label></li>
						<li><input type="text" class="form-control" name="onset_of_surgical"></li>
						<li><label>mins</label></li>
					</ul>
					<ul>
						<li><label>Duration of Surgery</label></li>
						<li><input type="text" class="form-control" name="duration_surgery"></li>
						<li><label>mins</label></li>
					</ul>
				</div>
				<div class="duration">
					<ul>
						<li><label>Blood Loss</label></li>
						<li><input type="text" class="form-control" name="blood_loss"></li>
						<li><label>ml</label></li>
					</ul>
				</div> -->
				<div class="duration">
					<ul>
						<li><label>Vasopressor Use</label></li>
						<li>
							<div class= "box_1">
								<input type="hidden" class="switch_1" value="No" name="vasopressor_use">
								<input type="checkbox" class="switch_1" value="Yes" name="vasopressor_use">
							</div>
						</li>
					</ul>
				</div><!--row-->
				<div class="row">
					<div class="col-sm-9"></div>
					<div class="col-sm-3">
						<button type="submit" class="btn-save Save">Save</button>
						<!-- <button type="button" class="btn-close">Reset</button> -->
					</div>
				</div><!--row-->
			</form>
</section><!--comb-spinal-epi-->

<script>

	$("input[name='neuraxial_block']").change(function(){
		$('.psn').hide();
	});

    $("input[name='success_option']").change(function(){
		$('.succes').hide();
	});


	function checkpos(){
		var pos = $('#patient_pos').val();
		if((pos != '')){
			$('.pat').hide();
		}
	}

	function checkmotor(){
		var mot = $('#motor_level').val();
		if((mot != '')){
			$('.motro').hide();
		}
	}
</script>

<script>

    // var subjectObject = {
    //     "Consultant": {
    //         "Junior Consultant" : ["Junior Consultant", "Senior Consultant"],
    //         "Senior Consultant" : ["Junior Consultant", "Senior Consultant"]
    //     }, 
    //     "Trainee" : {
    //         "Junior Trainee" : ["Junior Trainee", "Senior Trianee"],
    //         "Senior Trianee" : ["Junior Trainee", "Senior Trianee"]
    //     } 
    // }
    // window.onload = function(){
        
    //     var subjectSel = document.getElementById("cnb_done_by1");
    //     var topicSel = document.getElementById("cnb_done_by2");
        

    //     for (var x in subjectObject) {
    //         subjectSel.options[subjectSel.options.length] = new Option(x, x);
    //     }
    //     subjectSel.onchange = function() {
            
    //         topicSel.length = 1;
           
    //         for (var y in subjectObject[this.value]) {
    //         topicSel.options[topicSel.options.length] = new Option(y, y);
    //         }
    //     }
        
    // }

	function selectcnb(){
        var sele = document.getElementById("cnb_by1").value;
        if(sele == "Trainee"){
            $('#consultant').show();
            $("#cnb_by2").empty();
            var str = ""
            str += "<option>Junior Trainee</option>";
            str += "<option>Senior Trainee</option>";
           
            $("#cnb_by2").append(str);
        }
        else if(sele == "Consultant"){
            $('#consultant').show();
            $("#cnb_by2").empty();
            var str = ""
            str += "<option>Junior Consultant</option>";
            str += "<option>Senior Consultant</option>";
           
            $("#cnb_by2").append(str);
           
            
        }
    }
</script>



<script>

	function show(){	
		$('.sedation_option').show();		
	}
	function hide(){
		$('.sedation_option').hide();	
	}

function analgesia(){ 
    var ana = $('#ana').is(':checked');
        var asr_spinal_inhalation = $('.asr_spinal_inhalation').is(':checked');
        var spinal_iv_analgesia = $('.spinal_iv_analgesia').is(':checked');

        if(!ana){
            if(asr_spinal_inhalation){ 
                toastr.error('Please Uncheck Inhalation Analgesia');
                $('#ana').attr("checked",true);
                document.getElementById("ana").checked = true;
            }
            else if(spinal_iv_analgesia){
                toastr.error('Please Uncheck IV Analgesia'); 
                $('#ana').attr("checked",true);
                document.getElementById("ana").checked = true;
            }
            else{
                $('.analgesia').hide();
                $("#analgesis").text(' NO ');
                $('.asr_spinal_inhalation').prop("checked",false);
                $('.spinal_iv_analgesia').prop("checked",false);
                $('.spinal_opioid_supplemen').prop("checked",false);
                $('.spinal_multi_model').prop("checked",false);
                $('.asr_ketamine').prop("checked",false);
                $('.spinal_adju').prop("checked",false);
                $('.op_remove').val('');
                $('.aj_remove').val('');
                // $('#asr_other_iv_dose').val('');
                $('.spinal_iv_analgesia_box').hide();
                $('.spinal_opioid_supplemen_box').hide();
                $('.spinal_adju_box').hide();
            }
        }
        else{
            $(".analgesia").show();
            $("#analgesis").text(' YES ');
        }
    }


	function technical(){
    var tech = $('#tech').is(':checked');

    var tc_failure_spinal_component =  $('.tc_failure_spinal_component').is(':checked');
    var tc_equipment = $('.complication_equipment').is(':checked');
    var tc_multiple = $('.complication_multi_attempts').is(':checked');
    var tc_2_anaestsetist = $('.complication_2nd_anaesthe').is(':checked');
    var tc_abondoned = $('.complication_failure_space').is(':checked');

    var complication_catheter = $('.complication_catheter').is(':checked');


    var othe = $('.spinal_technical_other').is(':checked');

    if(!tech){
        if(tc_failure_spinal_component){
            toastr.error('Please Uncheck Failure of spinal component');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }

        else if(tc_equipment){
            toastr.error('Please Uncheck Equipment related, needle related');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }
        else if(tc_multiple){
            toastr.error('Please Uncheck Multiple attempts');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }
        else if(tc_2_anaestsetist){
            toastr.error('Please Uncheck 2nd Anaesthetist');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }
        else if(tc_abondoned){
            toastr.error('Please Uncheck Technique abandoned/failure to find space');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        } 
        else if(tc_abondoned){
            toastr.error('Please Uncheck Technique abandoned/failure to find space');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }
        else if(complication_catheter){
            toastr.error('Please Uncheck complication catheter');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }  
        else if(othe){
            toastr.error('Please Uncheck other');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }
        else{
            $('.technical').hide();
            $("#teche").text(' NO ');
            $('#tc_equipment').prop("checked",false);
            $('#tc_multiple').prop("checked",false);
            $('#tc_2_anaestsetist').prop("checked",false);
            $('#tc_abondoned').prop("checked",false);
            $('#othe').prop("checked",false);
            $('#othe1').val('');
            $("#othe1").attr("readonly", true);
        }
    }
    else{ 
        $(".technical").show();
        $("#teche").text(' YES ');
    }
}

function acute(){
    var acu = $('#acu').is(':checked');
    if(!acu){

    	var ac_epidural_resited = $('.ac_epidural_resited').is(':checked');
    	var ac_last = $('.ac_last').is(':checked');
    	
        var ac_radicular_pain = $('.ac_rasicular_pain').is(':checked');
        var ac_paresthesia_pain = $('.ac_paresthesia_pain').is(':checked'); 

        var ac_bloody_tap = $('.ac_bloody_tap').is(':checked');
        var ac_hypotension = $('.ac_hypotension').is(':checked');
        var ac_nausea = $('.ac_nausea').is(':checked');
        var ac_vomiting = $('.ac_vomiting').is(':checked');
        var ac_high_block = $('.ac_high_block').is(':checked');
        var ac_subdural_block = $('.ac_subdural_block').is(':checked');
        var ac_total_spinal = $('.ac_total_spinal').is(':checked');
        var ac_respi_arrest = $('.ac_respira_arrest').is(':checked'); 

        var ac_cardiac_arrest = $('.ac_cardiac_arrest').is(':checked');
        var maternal_fever = $('.maternal_fever').is(':checked');
        var foetal_CTG = $('.foetal_CTG').is(':checked');
        var ot = $('#ac_other').is(':checked');
        var intrathecal_migration = $('.intrathecal_migration').is(':checked');


			if(intrathecal_migration){ 
                toastr.error('Please Uncheck Intrathecal migration of Epidural cathetr');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
        	else if(ac_epidural_resited){ 
                toastr.error('Please Uncheck re-sited');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_last){
                toastr.error('Please Uncheck Local Anaesthetic systemic toxicity');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_radicular_pain){
                toastr.error('Please Uncheck Radicular Pain');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_paresthesia_pain){
                toastr.error('Please Uncheck Paresthesia Pain');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_bloody_tap){
                toastr.error('Please Uncheck Bloody Tap');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_hypotension){
                toastr.error('Please Uncheck Hypotension');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_nausea){
                toastr.error('Please Uncheck Nausea');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_vomiting){
                toastr.error('Please Uncheck Vomiting');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_high_block){
                toastr.error('Please Uncheck High Block');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_subdural_block){
                toastr.error('Please Uncheck Subdural Block');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_total_spinal){
                toastr.error('Please Uncheck Total Spinal');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_respi_arrest){
                toastr.error('Please Uncheck Respiratory Arrest');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(ac_cardiac_arrest){
                toastr.error('Please Uncheck Cardiac Arrest');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(maternal_fever){
                toastr.error('Please Uncheck Maternal Fever');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else if(foetal_CTG){
                toastr.error('Please Uncheck Acute Foetal CTG Changes');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            // else if(foetal_CTG){
            //     toastr.error('Please Uncheck Acute Foetal CTG Changes');
            //     $('#acu').attr("checked",true);
            //     document.getElementById("acu").checked = true;
            // }
            else if(ot){
                toastr.error('Please Uncheck Others');
                $('#acu').attr("checked",true);
                document.getElementById("acu").checked = true;
            }
            else{
                $('.acute').hide();
                $("#acutes").text(' NO ');
                $('#ac_radi_pain').prop("checked",false);
                $('#ac_parestsesia').prop("checked",false);
                $('#ac_bloody_tap').prop("checked",false);
                $('#ac_hypoten').prop("checked",false);
                $('#ac_nausea').prop("checked",false);
                $('#ac_vomit').prop("checked",false);
                $('#ac_high_block').prop("checked",false);
                $('#ac_sb_block').prop("checked",false);
                $('#ac_total_spinal').prop("checked",false);
                $('#ac_re_arrest').prop("checked",false);
                $('#ac_ca_arrest').prop("checked",false);
                $('#ac_other').prop("checked",false);
                $('#ot1').val('');
                $("#ot1").attr("readonly", true);
            }
    }
    else{
        $(".acute").show();
        $("#acutes").text(' YES ');
    }
} 
</script>

<script>

	function tog(key,id,number) {
		// alert(key);
		// alert(id);
		// alert(number);
		// var valu = key;
		// var val_sc = valu.split('-');
		// $('#'+val_sc[0]).attr("disabled", true);
	

		$('#ids').val(id);
		$('#values').val(key);		
		$('#numbers').val(number);

		
		$('#work').modal("show");	
		
		
	}
	var final1 = [];
	var final2 = [];
	var final3 = [];
	var final4 = [];
	var final5 = [];
	var final6 = [];


	function refer(key1){
		// alert(key1);

		$('#work').modal("hide");
	
		var block1 = $('#values').val();
		// var block2 = block+'-'+block1;
		var number = parseInt($('#numbers').val());


	
		// var z1 = 24 - number;
		var ids1 = ['cold-L-c2','cold-L-c3','cold-L-c4','cold-L-c5','cold-L-c6','cold-L-c7','cold-L-c8',
		 			'cold-L-t1','cold-L-t2','cold-L-t3','cold-L-t4','cold-L-t5','cold-L-t6','cold-L-t7',
					 'cold-L-t8','cold-L-t9','cold-L-t10','cold-L-t11','cold-L-t12',
					 'cold-L-l1','cold-L-l2','cold-L-l3','cold-L-l4','cold-L-l5','cold-L-s1','cold-L-s2','cold-L-s3'];

		var ids2 = ['cold-R-c2','cold-R-c3','cold-R-c4','cold-R-c5','cold-R-c6','cold-R-c7','cold-R-c8',
		 			'cold-R-t1','cold-R-t2','cold-R-t3','cold-R-t4','cold-R-t5','cold-R-t6','cold-R-t7',
					 'cold-R-t8','cold-R-t9','cold-R-t10','cold-R-t11','cold-R-t12',
					 'cold-R-l1','cold-R-l2','cold-R-l3','cold-R-l4','cold-R-l5','cold-R-s1','cold-R-s2','cold-R-s3'];

		var ids3 = ['Touch-L-c2','Touch-L-c3','Touch-L-c4','Touch-L-c5','Touch-L-c6','Touch-L-c7','Touch-L-c8',
		 			'Touch-L-t1','Touch-L-t2','Touch-L-t3','Touch-L-t4','Touch-L-t5','Touch-L-t6','Touch-L-t7',
					 'Touch-L-t8','Touch-L-t9','Touch-L-t10','Touch-L-t11','Touch-L-t12',
					 'Touch-L-l1','Touch-L-l2','Touch-L-l3','Touch-L-l4','Touch-L-l5','Touch-L-s1','Touch-L-s2','Touch-L-s3'];

		var ids4 = ['Touch-R-c2','Touch-R-c3','Touch-R-c4','Touch-R-c5','Touch-R-c6','Touch-R-c7','Touch-R-c8',
		 			'Touch-R-t1','Touch-R-t2','Touch-R-t3','Touch-R-t4','Touch-R-t5','Touch-R-t6','Touch-R-t7',
					 'Touch-R-t8','Touch-R-t9','Touch-R-t10','Touch-R-t11','Touch-R-t12',
					 'Touch-R-l1','Touch-R-l2','Touch-R-l3','Touch-R-l4','Touch-R-l5','Touch-R-s1','Touch-R-s2','Touch-R-s3'];

		var ids5 = ['pinprick-L-c2','pinprick-L-c3','pinprick-L-c4','pinprick-L-c5','pinprick-L-c6','pinprick-L-c7','pinprick-L-c8',
		 			'pinprick-L-t1','pinprick-L-t2','pinprick-L-t3','pinprick-L-t4','pinprick-L-t5','pinprick-L-t6','pinprick-L-t7',
					 'pinprick-L-t8','pinprick-L-t9','pinprick-L-t10','pinprick-L-t11','pinprick-L-t12',
					 'pinprick-L-l1','pinprick-L-l2','pinprick-L-l3','pinprick-L-l4','pinprick-L-l5','pinprick-L-s1','pinprick-L-s2','pinprick-L-s3'];

		var ids6 = ['pinprick-R-c2','pinprick-R-c3','pinprick-R-c4','pinprick-R-c5','pinprick-R-c6','pinprick-R-c7','pinprick-R-c8',
		 			'pinprick-R-t1','pinprick-R-t2','pinprick-R-t3','pinprick-R-t4','pinprick-R-t5','pinprick-R-t6','pinprick-R-t7',
					 'pinprick-R-t8','pinprick-R-t9','pinprick-R-t10','pinprick-R-t11','pinprick-R-t12',
					 'pinprick-R-l1','pinprick-R-l2','pinprick-R-l3','pinprick-R-l4','pinprick-R-l5','pinprick-R-s1','pinprick-R-s2','pinprick-R-s3'];

		// alert(ids2.indexOf(block1));


		if(ids1.includes(block1)){
			// alert(block1);

			// alert('column-1');
			if(key1 == 'red'){	

				if(ids1.indexOf(block1) == 26){
					toastr.error('Higher sensory level Cant be so low..');
					return;
				}

				final1.length = 0;
				for(var i = 0; i < 27 ; i++){
					$('#'+ids1[i]).css('background-color',"white");	
				
				}

				final1.push(block1); // INDEX
				final1.push(key1); //COLOR
				var index = ids1.indexOf(block1);
				console.log(final1);
				toastr.success('Higher sensory level Is added sucessfully....');
				$('#'+block1).css('background-color',"red");

			}
			else if(key1 == 'green'){

				var redkey = final1[0];
				var redindex = ids1.indexOf(redkey);

				var greenindex = ids1.indexOf(block1);
				if(final1.indexOf('red') == -1){

					toastr.error('Select highest sensory level first');						
				}
				else if(greenindex <= redindex){
					toastr.error('Lower sensory level  Cant be above the highest sensory level');
				}
				else{

					toastr.success('Lower sensory level Is added sucessfully....');

					var index = final1.indexOf(key1);
					
					if(index == -1){
						final1.push(block1); // INDEX
						final1.push(key1); //COLOR
						$('#'+block1).css('background-color',"green");
					}
					else{

						$('#'+final1[index-1]).css('background-color',"white");
						final1[index-1] = block1; // INDEX
						final1[index] = key1;//COLOR
						$('#'+block1).css('background-color',"green");
					}
					console.log(final1);
					
				}
				
			}

			// alert(final1);

		}else if(ids2.includes(block1)){	

			// alert('column-2');

			// alert(block1);

			if(key1 == 'red'){	

				if(ids2.indexOf(block1) == 26){
					toastr.error('Higher sensory level Cant be so low..');
					return;
				}

				final2.length = 0;
				for(var i = 0; i < 27 ; i++){
					$('#'+ids2[i]).css('background-color',"white");	

				}

				final2.push(block1); // INDEX
				final2.push(key1); //COLOR
				var index = ids2.indexOf(block1);
				console.log(final2);
				toastr.success('Higher sensory level Is added sucessfully....');
				$('#'+block1).css('background-color',"red");

			}else if(key1 == 'green'){

				var redkey = final2[0];
				var redindex = ids2.indexOf(redkey);

				var greenindex = ids2.indexOf(block1);
				if(final2.indexOf('red') == -1){

					toastr.error('Select highest sensory level first');						
				}
				else if(greenindex <= redindex){
					toastr.error('Lower sensory level  Cant be above the highest sensory level');
				}
				else{

					toastr.success('Lower sensory level Is added sucessfully....');

					var index = final2.indexOf(key1);
					
					if(index == -1){
						final2.push(block1); // INDEX
						final2.push(key1); //COLOR
						$('#'+block1).css('background-color',"green");
					}
					else{

						$('#'+final2[index-1]).css('background-color',"white");
						final2[index-1] = block1; // INDEX
						final2[index] = key1;//COLOR
						$('#'+block1).css('background-color',"green");
					}
					console.log(final2);					
				}
			}
		}else if(ids3.includes(block1)){	

			// alert('column-2');

			// alert(block1);

			if(key1 == 'red'){	

				if(ids3.indexOf(block1) == 26){
					toastr.error('Higher sensory level Cant be so low..');
					return;
				}

				final3.length = 0;
				for(var i = 0; i < 27 ; i++){
					$('#'+ids3[i]).css('background-color',"white");	

				}

				final3.push(block1); // INDEX
				final3.push(key1); //COLOR
				var index = ids3.indexOf(block1);
				console.log(final3);
				toastr.success('Higher sensory level Is added sucessfully....');
				$('#'+block1).css('background-color',"red");

			}else if(key1 == 'green'){

				var redkey = final3[0];
				var redindex = ids3.indexOf(redkey);

				var greenindex = ids3.indexOf(block1);
				if(final3.indexOf('red') == -1){

					toastr.error('Select highest sensory level first');						
				}
				else if(greenindex <= redindex){
					toastr.error('Lower sensory level  Cant be above the highest sensory level');
				}
				else{

					toastr.success('Lower sensory level Is added sucessfully....');

					var index = final3.indexOf(key1);
					
					if(index == -1){
						final3.push(block1); // INDEX
						final3.push(key1); //COLOR
						$('#'+block1).css('background-color',"green");
					}
					else{

						$('#'+final3[index-1]).css('background-color',"white");
						final3[index-1] = block1; // INDEX
						final3[index] = key1;//COLOR
						$('#'+block1).css('background-color',"green");
					}
					console.log(final3);					
				}
			}
		}else if(ids4.includes(block1)){	

			// alert('column-2');

			// alert(block1);

			if(key1 == 'red'){	

				if(ids4.indexOf(block1) == 26){
					toastr.error('Higher sensory level Cant be so low..');
					return;
				}

				final4.length = 0;
				for(var i = 0; i < 27 ; i++){
					$('#'+ids4[i]).css('background-color',"white");	

				}

				final4.push(block1); // INDEX
				final4.push(key1); //COLOR
				var index = ids4.indexOf(block1);
				console.log(final4);
				toastr.success('Higher sensory level Is added sucessfully....');
				$('#'+block1).css('background-color',"red");

			}else if(key1 == 'green'){

				var redkey = final4[0];
				var redindex = ids4.indexOf(redkey);

				var greenindex = ids4.indexOf(block1);
				if(final4.indexOf('red') == -1){

					toastr.error('Select highest sensory level first');						
				}
				else if(greenindex <= redindex){
					toastr.error('Lower sensory level  Cant be above the highest sensory level');
				}
				else{

					toastr.success('Lower sensory level Is added sucessfully....');

					var index = final4.indexOf(key1);
					
					if(index == -1){
						final4.push(block1); // INDEX
						final4.push(key1); //COLOR
						$('#'+block1).css('background-color',"green");
					}
					else{

						$('#'+final4[index-1]).css('background-color',"white");
						final4[index-1] = block1; // INDEX
						final4[index] = key1;//COLOR
						$('#'+block1).css('background-color',"green");
					}
					console.log(final4);					
				}
			}
		}else if(ids5.includes(block1)){	

			// alert('column-2');

			// alert(block1);

			if(key1 == 'red'){	

				if(ids5.indexOf(block1) == 26){
					toastr.error('Higher sensory level Cant be so low..');
					return;
				}

				final5.length = 0;
				for(var i = 0; i < 27 ; i++){
					$('#'+ids5[i]).css('background-color',"white");	

				}

				final5.push(block1); // INDEX
				final5.push(key1); //COLOR
				var index = ids5.indexOf(block1);
				console.log(final5);
				toastr.success('Higher sensory level Is added sucessfully....');
				$('#'+block1).css('background-color',"red");

			}else if(key1 == 'green'){

				var redkey = final5[0];
				var redindex = ids5.indexOf(redkey);

				var greenindex = ids5.indexOf(block1);
				if(final5.indexOf('red') == -1){

					toastr.error('Select highest sensory level first');						
				}
				else if(greenindex <= redindex){
					toastr.error('Lower sensory level  Cant be above the highest sensory level');
				}
				else{

					toastr.success('Lower sensory level Is added sucessfully....');

					var index = final5.indexOf(key1);
					
					if(index == -1){
						final5.push(block1); // INDEX
						final5.push(key1); //COLOR
						$('#'+block1).css('background-color',"green");
					}
					else{

						$('#'+final5[index-1]).css('background-color',"white");
						final5[index-1] = block1; // INDEX
						final5[index] = key1;//COLOR
						$('#'+block1).css('background-color',"green");
					}
					console.log(final5);					
				}
			}
		}else if(ids6.includes(block1)){	

			// alert('column-2');

			// alert(block1);

			if(key1 == 'red'){	

				if(ids6.indexOf(block1) == 26){
					toastr.error('Higher sensory level Cant be so low..');
					return;
				}

				final6.length = 0;
				for(var i = 0; i < 27 ; i++){
					$('#'+ids6[i]).css('background-color',"white");	

				}

				final6.push(block1); // INDEX
				final6.push(key1); //COLOR
				var index = ids6.indexOf(block1);
				console.log(final6);
				toastr.success('Higher sensory level Is added sucessfully....');
				$('#'+block1).css('background-color',"red");

			}else if(key1 == 'green'){

				var redkey = final6[0];
				var redindex = ids6.indexOf(redkey);

				var greenindex = ids6.indexOf(block1);
				if(final6.indexOf('red') == -1){

					toastr.error('Select highest sensory level first');						
				}
				else if(greenindex <= redindex){
					toastr.error('Lower sensory level  Cant be above the highest sensory level');
				}
				else{

					toastr.success('Lower sensory level Is added sucessfully....');

					var index = final6.indexOf(key1);
					
					if(index == -1){
						final6.push(block1); // INDEX
						final6.push(key1); //COLOR
						$('#'+block1).css('background-color',"green");
					}
					else{

						$('#'+final6[index-1]).css('background-color',"white");
						final6[index-1] = block1; // INDEX
						final6[index] = key1;//COLOR
						$('#'+block1).css('background-color',"green");
					}
					console.log(final6);					
				}
			}
		}
		
	}		
	
</script>
<style>
	
	.btn-red{
	background-color: #FF0000!important;
	border: 0;
	cursor: pointer!important;
	}
	.btn-green{
	background-color: #008000!important;
	border: 0;
	cursor: pointer!important;
	}
	.btn-white{
	background-color: #fff!important;
	border: 1px solid #000;
	cursor: pointer!important;
	}
	
	
</style>

<script>
	function show(){	
		$('.sedation_option').show();		
	}
	
	
	// ----------------------------------------level showing button function------------------------------------------------

	function condition(){
		var condition = $('.cse_technique').val();
		// alert(condition);
		if(condition == 'Single Interspace Technique (Needle through Needle)'){
			$('.new-skeleton-img-single').show();
			$('.new-skeleton-img').hide();

			$('.epidural1').val('');
			$('.epidural_level_name').val('');
			$('.spinal_level_input').val('');
			$('.spinal_level_input_name').val('');

			$(".spinal_level_single"). click(function() {
				var spinal_single_level = $(this).val();				
				var spinal_single_level_split = 	spinal_single_level.split(',');	
				$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
				$('.epidural1').val(spinal_single_level_split[0]);
				$('.epidural_level_name').val(spinal_single_level_split[1]);
				$('.spinal_level_input').val(spinal_single_level_split[0]);
				$('.spinal_level_input_name').val(spinal_single_level_split[1]);
			});

			
		}else{
			$('.new-skeleton-img-single').hide();
			$('.new-skeleton-img').show();
			$('.epidural1').val('');
			$('.epidural_level_name').val('');
			$('.spinal_level_input').val('');
			$('.spinal_level_input_name').val('');

			$(".epidural_level"). click(function() {
				var epidural_level = $(this).val();
				var epidural_level_split = 	epidural_level.split(',');	
				$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
				$('.epidural1').val(epidural_level_split[0]);
				$('.epidural_level_name').val(epidural_level_split[1]);

			});

			$(".spinal_level"). click(function() {
				var spinal_level = $(this).val();	
				var spinal_level_split = spinal_level.split(',');	
				// alert(spinal_level_split[0]);
				$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
				$('.spinal_level_input').val(spinal_level_split[0]);
				$('.spinal_level_input_name').val(spinal_level_split[1]);

			});
		}
	}
	// ----------------------------------------level showing button function (END)-------------------------------------------------
	function needel_brand(){
		var condition = $('.cse_technique').val();
		var x = $('.epidural_needel_brand_other').val();
			// alert(x);
		if(condition == 'Single Interspace Technique (Needle through Needle)'){
			
			$('.spinal_needel_brand_other').val(x);
		}
	}
	

	function ultrasound_hide(){
		var ultrasound_check = $('.ultrasound').is(':checked');
		if(!ultrasound_check){
            $('.ultrasound_check').hide();
        }else{
            $('.ultrasound_check').show();
        }
	} 
	function oth(){		
		var oth = $('#other').is(':checked');
		if(!oth){
			$('.other_input').hide();
		}
		else{
			$(".other_input").show();
		}
	}
	// ----------------------------------------only append function -----------------------------------
	$(document).ready(function(){
		var i=1, j=1, k=1, l=1, m=1, n=1;

		$(".add1").click(function(){			
			if(i<2){
				i++;
				$(".other_input").append('<div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text" class="form-control "  name="others[]"><button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
			}
    	});
		$(".add2").click(function(){
			if(j<3){
				j++;
				$(".append_fun").append('<div class="row1 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]" ><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_opioid_dose[]" ></div></div></div>');
			}
		});
		$(".add3").click(function(){
			if(k<3){
				k++;
				$(".other1").append('<div class="row2"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="epidural_aj_name[]"><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
			}
		});
		$(".add4").click(function(){
			if(l<3){
				l++;
				$(".spinal_opioid").append('<div class="row3 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="spinal_opioid_name[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="spinal_opioid_dose[]" ></div></div></div>');
			}
		});
		$(".add5").click(function(){
			if(m<3){
				m++;
				$(".spinal_other_box").append('<div class="row4"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="spinal_aj_name[]"><button type="button" class="btn remove5"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="spinal_aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
			}
		});		
		$(".add6").click(function(){
			if(n<3){
				n++;
				$(".spinal_opioid_supplemen_box").append('<div class="row5 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus"  style="display:flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name_spinal[]" ><button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control op_remove" name="asr_opioid_dose_spinal[]" ></div></div></div>');
			}
		});
		$(document).on('click','.remove1',function(){  
			i--;
			$(this).closest('.row').remove();
		});
		$(document).on('click','.remove2',function(){
			j--;
			$(this).closest('.row1').remove();
		});
		$(document).on('click','.remove3',function(){
			k--;
			$(this).closest('.row2').remove();
		});
		$(document).on('click','.remove4',function(){
			l--;
			$(this).closest('.row3').remove();
		});
		$(document).on('click','.remove5',function(){
			m--;
			$(this).closest('.row4').remove();
		});
		$(document).on('click','.remove6',function(){
			n--;
			$(this).closest('.row5').remove();
		});
	});	
// ---------------------------------------------append function (END)-----------------------------------------------------

	function catheter(){		
		var catheter = $('.catheter').is(':checked');
		if(!catheter){
			$('.catheter_fild').hide();
		}
		else{
			$(".catheter_fild").show();
		}
	}
	$('#epidural_single').click(function(){
		var epidural_clonidne =$('#epidural_single').is(':checked');		
		if(!epidural_clonidne){
        	$(".catheter_fild").show();
		}
		else{
			$('.catheter_fild').hide();
		}
	});

	function adjuvant_spinal(){
		var spinal_adjuvant = $('.spinal_adjuvant').is(':checked');

        if(!spinal_adjuvant){ 
        	var Opioid = $('.spinal_opioid_check').is(':checked');
	        var epidural_clonidne = $('.spinal_clonidne').is(':checked');
	        var epidural_dexme = $('.spinal_dexmedito').is(':checked');
	       
	        var epidural_dexamethasone = $('.spinal_dexametha').is(':checked');

	        var epidural_trama = $('.spinal_tramadol').is(':checked');

	      	var epidural_ketamine = $('#keta').is(':checked');
	        var epidural_midazolam = $('#mida').is(':checked');

	        var epidural_adrenaline = $('.spinal_adrenaline').is(':checked');
	        var epidural_other = $('.spinal_other').is(':checked');

	        if(Opioid){
	            toastr.error('Please Uncheck Opioid..');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else if(epidural_clonidne){
	            toastr.error('Please Uncheck Clonidne with Dose..');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else if(epidural_dexme){
	            toastr.error('Please Uncheck Dexmeditomidine with Dose..');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else if(epidural_dexamethasone){
	            toastr.error('Please Uncheck Dexamethasone with Dose..');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }

	        else if(epidural_trama){
	            toastr.error('Please Uncheck Tramadol with Dose');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else if(epidural_ketamine){
	            toastr.error('Please Uncheck Ketamine with Dose');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else if(epidural_midazolam){
	            toastr.error('Please Uncheck Midazolam with Dose');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else if(epidural_adrenaline){
	            toastr.error('Please Uncheck Adrenaline(Epinephrine)');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true; 
	        }

	        else if(epidural_other){
	            toastr.error('Please Uncheck other..');
	            $('#adju').attr("checked",true);
	            document.getElementById("adju").checked = true;
	        }
	        else{
	        	$('.spinal_adjuvant_box').hide();
	        }
	    }
	    else{
            $('.spinal_adjuvant_box').show();

        }
	}
	function epidural_adjuvant(){
		var epidural_adjuvant = $('.epidural_adjuvant').is(':checked');

        if(!epidural_adjuvant){ 
        	var Opioid = $('.epidural_opioid').is(':checked');
	        var epidural_clonidne = $('#epidural_clonidne').is(':checked');
	        var epidural_dexme = $('.epidural_dexme').is(':checked');
	       
	        var epidural_dexamethasone = $('.epidural_dexamethasone').is(':checked');

	        var epidural_trama = $('.epidural_trama').is(':checked');

	        var epidural_ketamine = $('.epidural_ketamine').is(':checked');
	        var epidural_midazolam = $('.epidural_midazolam').is(':checked');
	        //var epidural_adrenaline = $('.epidural_adrenaline').is(':checked');
	        var epidural_other = $('.epidural_other').is(':checked');

	        if(Opioid){
	            toastr.error('Please Uncheck Opioid..');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        else if(epidural_clonidne){
	            toastr.error('Please Uncheck Clonidne with Dose..');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        else if(epidural_dexme){
	            toastr.error('Please Uncheck Dexmeditomidine with Dose..');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        else if(epidural_dexamethasone){
	            toastr.error('Please Uncheck Dexamethasone with Dose..');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }

	        else if(epidural_trama){
	            toastr.error('Please Uncheck Tramadol with Dose');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        else if(epidural_ketamine){
	            toastr.error('Please Uncheck Ketamine with Dose');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        else if(epidural_midazolam){
	            toastr.error('Please Uncheck Midazolam with Dose');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        // else if(epidural_adrenaline){
	        //     toastr.error('Please Uncheck Adrenaline(Epinephrine)');
	        //     $('#epidural_adj').attr("checked",true);
	        //     document.getElementById("epidural_adj").checked = true; 
	        // }

	        else if(epidural_other){
	            toastr.error('Please Uncheck other..');
	            $('#epidural_adj').attr("checked",true);
	            document.getElementById("epidural_adj").checked = true;
	        }
	        else{
	        	$('.epidural_adjuvant_check').hide();
	        }
	    }
	    else{
            $('.epidural_adjuvant_check').show();

        }
	}
	function epidural_opioid(){		
		var epidural_opioid = $('.epidural_opioid').is(':checked'); 
		if(!epidural_opioid){
            $('.opioid').hide();
        }else{
            $('.opioid').show();
        }
	}
	$('#epidural_clonidne').click(function(){
		var epidural_clonidne =$('#epidural_clonidne').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_clonidne_input").attr("readonly", true);
		}
		else{
			$('.epidural_clonidne_input').removeAttr("readonly");
		}
	});
	$('.epidural_needel_brand_other').change(function(){

		var input = $('.epidural_needel_brand_other').val();	

		if(input == "Other"){
            $('.epidural_needel_brand_other_input').show();		
		}else{
            $('.epidural_needel_brand_other_input').hide();					
		}		
	});
	$('.epidural_needel_type_other').change(function(){		

		var input = $('.epidural_needel_type_other').val();	
		// alert(input);

		if(input == "Other"){
			$('.epidural_needel_type_other_input').show();		
		}else{
			$('.epidural_needel_type_other_input').hide();					
		}
	});
	$('.epidural_dexme').click(function(){
		var epidural_clonidne =$('.epidural_dexme').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_dexme_input").attr("readonly", true);
		}
		else{
			$('.epidural_dexme_input').removeAttr("readonly");
		}
	});
	$('.epidural_dexamethasone').click(function(){
		var epidural_clonidne =$('.epidural_dexamethasone').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_dexamethasone_input").attr("readonly", true);
		}
		else{
			$('.epidural_dexamethasone_input').removeAttr("readonly");
		}
	});
	$('.epidural_trama').click(function(){
		var epidural_clonidne =$('.epidural_trama').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_trama_input").attr("readonly", true);
		}
		else{
			$('.epidural_trama_input').removeAttr("readonly");
		}
	});
	$('.epidural_ketamine').click(function(){
		var epidural_clonidne =$('.epidural_ketamine').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_ketamine_input").attr("readonly", true);
		}
		else{
			$('.epidural_ketamine_input').removeAttr("readonly");
		}
	});
	$('.epidural_midazolam').click(function(){
		var epidural_clonidne =$('.epidural_midazolam').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_midazolam_input").attr("readonly", true);
		}
		else{
			$('.epidural_midazolam_input').removeAttr("readonly");
		}
	}); 
	// $('.epidural_adrenaline').click(function(){
	// 	var epidural_clonidne =$('.epidural_adrenaline').is(':checked');		
	// 	if(!epidural_clonidne){
 //        	$(".epidural_adrenaline_input").attr("readonly", true);
	// 	}
	// 	else{
	// 		$('.epidural_adrenaline_input').removeAttr("readonly");
	// 	}
	// });
	$('.epidural_other').click(function(){
		var epidural_clonidne =$('.epidural_other').is(':checked');		
		if(!epidural_clonidne){			
        	$(".epidural_other_box").hide();
		}
		else{
			$('.epidural_other_box').show();
		}
	});
	// $(".spinal_level"). click(function() {
	// 	var spinal_level = $(this).val();	
	// 	var spinal_level_split = spinal_level.split(',');	
	// 	// alert(spinal_level_split[0]);
	// 	$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
	// 	$('.spinal_level_input').val(spinal_level_split[0]);
	// 	$('.spinal_level_input_name').val(spinal_level_split[1]);

	// });
	$('.spinal_anaesth_other').click(function(){
		var epidural_clonidne =$('.spinal_anaesth_other').is(':checked');		
		if(!epidural_clonidne){			
        	$(".spinal_anaesth_other_option").hide();
		}
		else{
			$('.spinal_anaesth_other_option').show();
		}
	});
	// $('.spinal_anaesthe').click(function(){
	// 	var epidural_clonidne =$('.spinal_anaesthe').is(':checked');		
	// 	if(!epidural_clonidne){			
    //     	$(".spinal_anaesthe_box").hide();
	// 	}
	// 	else{
	// 		$('.spinal_anaesthe_box').show();
	// 	}
	// });
	$('.spinal_opioid_check').click(function(){
		var epidural_clonidne =$('.spinal_opioid_check').is(':checked');		
		if(!epidural_clonidne){			
        	$(".spinal_opioid").hide();
		}
		else{
			$('.spinal_opioid').show();
		}
	});
	$('.spinal_other').click(function(){
		var epidural_clonidne =$('.spinal_other').is(':checked');		
		if(!epidural_clonidne){			
        	$(".spinal_other_box").hide();
		}
		else{
			$('.spinal_other_box').show();
		}
	});
	$('.spinal_clonidne').click(function(){
		var epidural_clonidne =$('.spinal_clonidne').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_clonidne_input").attr("readonly", true);
		}
		else{
			$('.spinal_clonidne_input').removeAttr("readonly");
		}
	});
	$('.spinal_dexmedito').click(function(){
		var epidural_clonidne =$('.spinal_dexmedito').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_dexmedito_input").attr("readonly", true);
		}
		else{
			$('.spinal_dexmedito_input').removeAttr("readonly");
		}
	});
	$('.spinal_dexametha').click(function(){
		var epidural_clonidne =$('.spinal_dexametha').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_dexametha_input").attr("readonly", true);
		}
		else{
			$('.spinal_dexametha_input').removeAttr("readonly");
		}
	});
	$('.spinal_tramadol').click(function(){
		var epidural_clonidne =$('.spinal_tramadol').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_tramadol_input").attr("readonly", true);
		}
		else{
			$('.spinal_tramadol_input').removeAttr("readonly");
		}
	});
	$('.spinal_adrenaline').click(function(){
		var epidural_clonidne =$('.spinal_adrenaline').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_adrenaline_input").attr("readonly", true);
		}
		else{
			$('.spinal_adrenaline_input').removeAttr("readonly");
		}
	});
	$('.spinal_adjuvant').click(function(){
		var epidural_clonidne =$('.spinal_adjuvant').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_adjuvant_box").hide();
		}
		else{
			$('.spinal_adjuvant_box').show();
		}
	});
	$('.spinal_opioid_supplemen').click(function(){
		var epidural_clonidne =$('.spinal_opioid_supplemen').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_opioid_supplemen_box").hide();
		}
		else{
			$('.spinal_opioid_supplemen_box').show();
		}
	});
	$('.spinal_adju').click(function(){
		var epidural_clonidne =$('.spinal_adju').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_adju_box").hide();
		}
		else{
			$('.spinal_adju_box').show();
		}
	});
	$('.spinal_multi_model').click(function(){
		var epidural_clonidne =$('.spinal_multi_model').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_multi_model_box").hide();
		}
		else{
			$('.spinal_multi_model_box').show();
		}
	});
	$('.spinal_iv_analgesia').click(function(){
		var epidural_clonidne =$('.spinal_iv_analgesia').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_iv_analgesia_box").hide();
		}
		else{
			$('.spinal_iv_analgesia_box').show();
		}
	});
	$('.spinal_analgesia_supplement').click(function(){
		var epidural_clonidne =$('.spinal_analgesia_supplement').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_analgesia_supplement_box").hide();
		}
		else{
			$('.spinal_analgesia_supplement_box').show();
		}
	});
	$('.spinal_technical_other').click(function(){
		var epidural_clonidne =$('.spinal_technical_other').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_technical_input").hide();
		}
		else{
			$('.spinal_technical_input').show();
		}
	});
	$('.tech_complication_check').click(function(){
		var epidural_clonidne =$('.tech_complication_check').is(':checked');		
		if(!epidural_clonidne){
        	$(".tech_complication_checkbox").hide();
		}
		else{
			$('.tech_complication_checkbox').show();
		}
	});
	$('.spinal_acute_other').click(function(){
		var epidural_clonidne =$('.spinal_acute_other').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_acute_other_input").hide();
		}
		else{
			$('.spinal_acute_other_input').show();
		}
	});
	$('.spinal_acute_multi_option').click(function(){
		var epidural_clonidne =$('.spinal_acute_multi_option').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_acute_multi_option_box").hide();
		}
		else{
			$('.spinal_acute_multi_option_box').show();
		}
	});
// -------------------------------------------------calculation for mg convertion--------------------------------

	// $(".epidural_ml1").keyup(function(){
	// 	var persent = $('.epidural_persent1').val();
	// 	var ml = $('.epidural_ml1').val();
	// 	// var div = (persent/100);
	// 	var multi = ml*10;
	// 	var mg = (persent*multi);
	// 	$('.epidural_mg1').val(mg);
	// });	
	// $(".epidural_persent1").keyup(function(){
	// 	var persent = $('.epidural_persent1').val();
	// 	var ml = $('.epidural_ml1').val();
	// 	var div = persent;
	// 	var multi = ml*10;
	// 	var mg = (div*multi);
	// 	$('.epidural_mg1').val(mg);
	// });
	// // $('.epidural_mg1').keyup(function(){
	// // 	$('.epidural_persent1').val('');
	// // 	$('.epidural_ml1').val('');
	// // 	// r_mg = $('.epidural_mg1').val();
	// // 	var mg = $('.epidural_mg1').val();
	// // 	var ml_mg = mg/10;
	// // 	var ml = $('.epidural_ml1').val(ml_mg);
	// // 	// $('.epidural_persent1').val('1');
	// // });

	// $('.epidural_mg1').keyup(function(){   

	// 	// $('.epidural_persent1').val('');
	// 	// $('.epidural_ml1').val('');
	// 	var mg = $('.epidural_mg1').val();
	// 	var pers = $('.epidural_persent1').val();
	// 	var total = mg/pers;
	// 	var g_total = total/10;
	// 	$('.epidural_ml1').val(g_total);
	// 	console.log(g_total);
	// });

	// $('.epidural_persent1').keyup(function(){
	// 	var per = $('.epidural_persent1').val();
	// 	var mg = $('.epidural_mg1').val();
	// 	var aa = mg/per;
	// 	var g_total1 = aa/10;
	// 	$('.epidural_ml1').val(g_total1);
	// });

	
	function persentage(type){
		var limit = $('.epidural_persent1').val();
		var limit1 = $('.epidural_persent2').val();
		var limit2 = $('.epidural_persent3').val();
		var limit3 = $('.epidural_persent4').val();
		
		if(type == 'alert1'){
			if((limit >= 0 && limit <= 4) && limit != ''){			
				$('#persentage_tage').hide();
				$('.epidural_persent1').css('border-color','').css('background','');
			}else{	
				$('.epidural_persent1').val('');		
				$('#persentage_tage').show();
				toastr.error('should be from 0 to 4');
				// $('.epidural_persent1').css('border-color','red').css('background','#FFCCCB');
			}
		}else if(type == 'alert2'){
			if((limit1 >= 0 && limit1 <= 4) && limit1 != ''){			
				$('#persentage_tage1').hide();
				$('.epidural_persent2').css('border-color','').css('background','');

			}else{	
				$('.epidural_persent2').val('');		
				$('#persentage_tage1').show();
				toastr.error('should be from 0 to 4');
				// $('.epidural_persent2').css('border-color','red').css('background','#FFCCCB');
			}
		}else if(type == 'alert3'){
			if((limit2 >= 0 && limit2 <= 4) && limit2 != ''){			
				$('#persentage_tage2').hide();
				$('.epidural_persent3').css('border-color','').css('background','');
			}else{
				$('.epidural_persent3').val('');			
				$('#persentage_tage2').show();
				toastr.error('should be from 0 to 4');
				// $('.epidural_persent3').css('border-color','red').css('background','#FFCCCB');
			}	
		}else if(type == 'alert4'){
			if((limit3 >= 0 && limit3 <= 4) && limit3 != ''){			
				$('#persentage_tage3').hide();
				$('.epidural_persent4').css('border-color','').css('background','');

			}else{
				$('.epidural_persent4').val('');			
				$('#persentage_tage3').show();
				toastr.error('should be from 0 to 4');
				// $('.epidural_persent4').css('border-color','red').css('background','#FFCCCB');
			}	
		}	
	}
function percentage(type){
    var limit = $('.spinal_persent1').val();
    var limit1 = $('.spinal_persent2').val();
    var limit2 = $('.spinal_persent3').val();
    var limit3 = $('.spinal_persent4').val();
    var limit4 = $('.spinal_persent5').val();
    var limit5 = $('.spinal_persent6').val();

    if(type == 'alert1'){
        if((limit >= 0 && limit <= 4) && limit != ''){			
            $('#percentage_tage').hide();
            $('.spinal_persent1').css('border-color','').css('background','');
        }else{	
			$('.spinal_persent1').val('');		
            $('#percentage_tage').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent1').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert2'){
        if((limit1 >= 0 && limit1 <= 4) && limit1 != ''){			
            $('#percentage_tage1').hide();
            $('.spinal_persent2').css('border-color','').css('background','');

        }else{	
			$('.spinal_persent2').val('');		
            $('#percentage_tage1').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent2').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert3'){
        if((limit2 >= 0 && limit2 <= 4) && limit2 != ''){			
            $('#percentage_tage2').hide();
            $('.spinal_persent3').css('border-color','').css('background','');
        }else{	
			$('.spinal_persent3').val('');		
            $('#percentage_tage2').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent3').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert4'){
        if((limit3 >= 0 && limit3 <= 4) && limit3 != ''){			
            $('#percentage_tage3').hide();
            $('.spinal_persent4').css('border-color','').css('background','');

        }else{
			$('.spinal_persent4').val('');			
            $('#percentage_tage3').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent4').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert5'){
        if((limit4 >= 0 && limit4 <= 4) && limit4 != ''){			
            $('#percentage_tage4').hide();
            $('.spinal_persent5').css('border-color','').css('background','');

        }else{
			$('.spinal_persent5').val('');			
            $('#percentage_tage4').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent5').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert6'){
        if((limit5 >= 0 && limit5 <= 4) && limit5 != ''){			
            $('#percentage_tage5').hide();
            $('.spinal_persent6').css('border-color','').css('background','');

        }else{	
			$('.spinal_persent6').val('');		
            $('#percentage_tage5').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent6').css('border-color','red').css('background','#FFCCCB');
        }	
    }						
}
$(".epidural_persent1").focusout(function(){
    var r_per = $('.epidural_persent1').val();
    var r_ml = $('.epidural_ml1').val();
    var r_mg = $('.epidural_mg1').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var mg =(r_per*bb);
        $('.epidural_mg1').val(mg);
        $('#clear1').show();
        $('.epidural_persent1').attr("readonly", true);
        $('.epidural_ml1').attr("readonly", true);
        $('.epidural_mg1').attr("readonly", true);
    }
    else if(r_per && r_mg){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('.epidural_ml1').val(r_total);
        $('#clear1').show();
        $('.epidural_persent1').attr("readonly", true);
        $('.epidural_ml1').attr("readonly", true);
        $('.epidural_mg1').attr("readonly", true);
    }
});
$(".epidural_ml1").focusout(function(){
    var r_per = $('.epidural_persent1').val();
    var r_ml = $('.epidural_ml1').val();
    var r_mg = $('.epidural_mg1').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var mg =(r_per*bb);
        $('.epidural_mg1').val(mg);
        $('#clear1').show();
        $('.epidural_persent1').attr("readonly", true);
        $('.epidural_ml1').attr("readonly", true);
        $('.epidural_mg1').attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var percent = (r_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}
		else{
			$('.epidural_persent1').val(percent);
			$('#clear1').show();
			$('.epidural_persent1').attr("readonly", true);
			$('.epidural_ml1').attr("readonly", true);
			$('.epidural_mg1').attr("readonly", true);
		}
    }
});
$(".epidural_mg1").focusout(function(){
    var r_per = $('.epidural_persent1').val();
    var r_ml = $('.epidural_ml1').val();
    var r_mg = $('.epidural_mg1').val();
    if(r_mg && r_per){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('.epidural_ml1').val(r_total);
        $('#clear1').show();
        $('.epidural_persent1').attr("readonly", true);
        $('.epidural_ml1').attr("readonly", true);
        $('.epidural_mg1').attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var percent = (r_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent1').val(percent);
			$('#clear1').show();
			$('.epidural_persent1').attr("readonly", true);
			$('.epidural_ml1').attr("readonly", true);
			$('.epidural_mg1').attr("readonly", true);
		}
    }
});
function clean1(){
    $('.epidural_persent1').val('');
    $('.epidural_ml1').val('');
    $('.epidural_mg1').val('');
    $('.epidural_persent1').removeAttr("readonly");
    $('.epidural_ml1').removeAttr("readonly");
    $('.epidural_mg1').removeAttr("readonly");
    $('#clear1').hide();
}
$(".epidural_persent2").focusout(function(){
    var b_per = $('.epidural_persent2').val();
    var b_ml = $('.epidural_ml2').val();
    var b_mg = $('.epidural_mg2').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var mg =(b_per*bb);
        $('.epidural_mg2').val(mg);
        $('#clear2').show();
        $('.epidural_persent2').attr("readonly", true);
        $('.epidural_ml2').attr("readonly", true);
        $('.epidural_mg2').attr("readonly", true);
    }
    else if(b_per && b_mg){
        var aa = b_mg/b_per;
        var b_total = aa/10;
        $('.epidural_ml2').val(b_total);
        $('#clear2').show();
        $('.epidural_persent2').attr("readonly", true);
        $('.epidural_ml2').attr("readonly", true);
        $('.epidural_mg2').attr("readonly", true);
    }
});
$(".epidural_ml2").focusout(function(){
    var b_per = $('.epidural_persent2').val();
    var b_ml = $('.epidural_ml2').val();
    var b_mg = $('.epidural_mg2').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var mg =(b_per*bb);
        $('.epidural_mg2').val(mg);
        $('#clear2').show();
        $('.epidural_persent2').attr("readonly", true);
        $('.epidural_ml2').attr("readonly", true);
        $('.epidural_mg2').attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var percent = (b_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent2').val(percent);
			$('#clear2').show();
			$('.epidural_persent2').attr("readonly", true);
			$('.epidural_ml2').attr("readonly", true);
			$('.epidural_mg2').attr("readonly", true);
		}
    }
});
$(".epidural_mg2").focusout(function(){
    var b_per = $('.epidural_persent2').val();
    var b_ml = $('.epidural_ml2').val();
    var b_mg = $('.epidural_mg2').val();
    if(b_mg && b_per){
        var aa = b_mg/b_per;
        var b_total = aa/10;
        $('.epidural_ml2').val(b_total);
        $('#clear2').show();
        $('.epidural_persent2').attr("readonly", true);
        $('.epidural_ml2').attr("readonly", true);
        $('.epidural_mg2').attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var percent = (b_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent2').val(percent);
			$('#clear2').show();
			$('.epidural_persent2').attr("readonly", true);
			$('.epidural_ml2').attr("readonly", true);
			$('.epidural_mg2').attr("readonly", true);
		}
    }
});
function clean2(){
    $('.epidural_persent2').val('');
    $('.epidural_ml2').val('');
    $('.epidural_mg2').val('');
    $('.epidural_persent2').removeAttr("readonly");
    $('.epidural_ml2').removeAttr("readonly");
    $('.epidural_mg2').removeAttr("readonly");
    $('#clear2').hide();
}
$(".epidural_persent3").focusout(function(){
    var l_per = $('.epidural_persent3').val();
    var l_ml = $('.epidural_ml3').val();
    var l_mg = $('.epidural_mg3').val();
    if(l_per && l_ml){
        var bb = (l_ml)*10;
        var mg =(l_per*bb);
        $('.epidural_mg3').val(mg);
        $('#clear3').show();
        $('.epidural_persent3').attr("readonly", true);
        $('.epidural_ml3').attr("readonly", true);
        $('.epidural_mg3').attr("readonly", true);
    }
    else if(l_per && l_mg){
        var aa = l_mg/l_per;
        var l_total = aa/10;
        $('.epidural_ml3').val(l_total);
        $('#clear3').show();
        $('.epidural_persent3').attr("readonly", true);
        $('.epidural_ml3').attr("readonly", true);
        $('.epidural_mg3').attr("readonly", true);
    }
});
$(".epidural_ml3").focusout(function(){
    var l_per = $('.epidural_persent3').val();
    var l_ml = $('.epidural_ml3').val();
    var l_mg = $('.epidural_mg3').val();
    if(l_per && l_ml){
        var bb = (l_ml)*10;
        var mg =(l_per*bb);
        $('.epidural_mg3').val(mg);
        $('#clear3').show();
        $('.epidural_persent3').attr("readonly", true);
        $('.epidural_ml3').attr("readonly", true);
        $('.epidural_mg3').attr("readonly", true);
    }
    else if(l_mg && l_ml){
        var bb = (l_ml)*10;
        var percent = (l_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent3').val(percent);
			$('#clear3').show();
			$('.epidural_persent3').attr("readonly", true);
			$('.epidural_ml3').attr("readonly", true);
			$('.epidural_mg3').attr("readonly", true);
		}
    }
});
$(".epidural_mg3").focusout(function(){
    var l_per = $('.epidural_persent3').val();
    var l_ml = $('.epidural_ml3').val();
    var l_mg = $('.epidural_mg3').val();
    if(l_mg && l_per){
        var aa = l_mg/l_per;
        var l_total = aa/10;
        $('.epidural_ml3').val(l_total);
        $('#clear3').show();
        $('.epidural_persent3').attr("readonly", true);
        $('.epidural_ml3').attr("readonly", true);
        $('.epidural_mg3').attr("readonly", true);
    }
    else if(l_mg && l_ml){
        var bb = (l_ml)*10;
        var percent = (l_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent3').val(percent);
			$('#clear3').show();
			$('.epidural_persent3').attr("readonly", true);
			$('.epidural_ml3').attr("readonly", true);
			$('.epidural_mg3').attr("readonly", true);
		}
    }
});
function clean3(){
    $('.epidural_persent3').val('');
    $('.epidural_ml3').val('');
    $('.epidural_mg3').val('');
    $('.epidural_persent3').removeAttr("readonly");
    $('.epidural_ml3').removeAttr("readonly");
    $('.epidural_mg3').removeAttr("readonly");
    $('#clear3').hide();
}
$(".epidural_persent4").focusout(function(){
    var li_per = $('.epidural_persent4').val();
    var li_ml = $('.epidural_ml4').val();
    var li_mg = $('.epidural_mg4').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var mg =(li_per*bb);
        $('.epidural_mg4').val(mg);
        $('#clear4').show();
        $('.epidural_persent4').attr("readonly", true);
        $('.epidural_ml4').attr("readonly", true);
        $('.epidural_mg4').attr("readonly", true);
    }
    else if(li_per && li_mg){
        var aa = li_mg/li_per;
        var p_total = aa/10;
        $('.epidural_ml4').val(p_total);
        $('#clear4').show();
        $('.epidural_persent4').attr("readonly", true);
        $('.epidural_ml4').attr("readonly", true);
        $('.epidural_mg4').attr("readonly", true);
    }
});
$(".epidural_ml4").focusout(function(){
    var li_per = $('.epidural_persent4').val();
    var li_ml = $('.epidural_ml4').val();
    var li_mg = $('.epidural_mg4').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var mg =(li_per*bb);
        $('.epidural_mg4').val(mg);
        $('#clear4').show();
        $('.epidural_persent4').attr("readonly", true);
        $('.epidural_ml4').attr("readonly", true);
        $('.epidural_mg4').attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var percent = (li_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent4').val(percent);
			$('#clear4').show();
			$('.epidural_persent4').attr("readonly", true);
			$('.epidural_ml4').attr("readonly", true);
			$('.epidural_mg4').attr("readonly", true);
		}
    }
});
$(".epidural_mg4").focusout(function(){
    var li_per = $('.epidural_persent4').val();
    var li_ml = $('.epidural_ml4').val();
    var li_mg = $('.epidural_mg4').val();
    if(li_mg && li_per){
        var aa = li_mg/li_per;
        var p_total = aa/10;
        $('.epidural_ml4').val(p_total);
        $('#clear4').show();
        $('.epidural_persent4').attr("readonly", true);
        $('.epidural_ml4').attr("readonly", true);
        $('.epidural_mg4').attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var percent = (li_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.epidural_persent4').val(percent);
			$('#clear4').show();
			$('.epidural_persent4').attr("readonly", true);
			$('.epidural_ml4').attr("readonly", true);
			$('.epidural_mg4').attr("readonly", true);
		}
    }
});
function clean4(){
    $('.epidural_persent4').val('');
    $('.epidural_ml4').val('');
    $('.epidural_mg4').val('');
    $('.epidural_persent4').removeAttr("readonly");
    $('.epidural_ml4').removeAttr("readonly");
    $('.epidural_mg4').removeAttr("readonly");
    $('#clear4').hide();
}
// ----------------------------------------------------calculation conver to mg (END)---------------------------------------

$(".spinal_persent1").focusout(function(){
    var li_per = $('.spinal_persent1').val();
    var li_ml = $('.spinal_ml1').val();
    var li_mg = $('.spinal_mg1').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var mg =(li_per*bb);
        $('.spinal_mg1').val(mg);
        $('#clears1').show();
        $('.spinal_persent1').attr("readonly", true);
        $('.spinal_ml1').attr("readonly", true);
        $('.spinal_mg1').attr("readonly", true);
    }
    else if(li_per && li_mg){
        var aa = li_mg/li_per;
        var li_total = aa/10;
        $('.spinal_ml1').val(li_total);
        $('#clears1').show();
        $('.spinal_persent1').attr("readonly", true);
        $('.spinal_ml1').attr("readonly", true);
        $('.spinal_mg1').attr("readonly", true);
    }
});
$(".spinal_ml1").focusout(function(){
    var li_per = $('.spinal_persent1').val();
    var li_ml = $('.spinal_ml1').val();
    var li_mg = $('.spinal_mg1').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var mg =(li_per*bb);
        $('.spinal_mg1').val(mg);
        $('#clears1').show();
        $('.spinal_persent1').attr("readonly", true);
        $('.spinal_ml1').attr("readonly", true);
        $('.spinal_mg1').attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var percent = (li_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent1').val(percent);
			$('#clears1').show();
			$('.spinal_persent1').attr("readonly", true);
			$('.spinal_ml1').attr("readonly", true);
			$('.spinal_mg1').attr("readonly", true);
		}
    }
});
$(".spinal_mg1").focusout(function(){
    var li_per = $('.spinal_persent1').val();
    var li_ml = $('.spinal_ml1').val();
    var li_mg = $('.spinal_mg1').val();
    if(li_mg && li_per){
        var aa = li_mg/li_per;
        var li_total = aa/10;
        $('.spinal_ml1').val(li_total);
        $('#clears1').show();
        $('.spinal_persent1').attr("readonly", true);
        $('.spinal_ml1').attr("readonly", true);
        $('.spinal_mg1').attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var percent = (li_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent1').val(percent);
			$('#clears1').show();
			$('.spinal_persent1').attr("readonly", true);
			$('.spinal_ml1').attr("readonly", true);
			$('.spinal_mg1').attr("readonly", true);
		}
    }
});
function cleans1(){
    $('.spinal_persent1').val('');
    $('.spinal_ml1').val('');
    $('.spinal_mg1').val('');
    $('.spinal_persent1').removeAttr("readonly");
    $('.spinal_ml1').removeAttr("readonly");
    $('.spinal_mg1').removeAttr("readonly");
    $('#clears1').hide();
}
$(".spinal_persent2").focusout(function(){
    var b_per = $('.spinal_persent2').val();
    var b_ml = $('.spinal_ml2').val();
    var b_mg = $('.spinal_mg2').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var mg =(b_per*bb);
        $('.spinal_mg2').val(mg);
        $('#clears2').show();
        $('.spinal_persent2').attr("readonly", true);
        $('.spinal_ml2').attr("readonly", true);
        $('.spinal_mg2').attr("readonly", true);
    }
    else if(b_per && b_mg){
        var aa = b_mg/b_per;
        var b_total = aa/10;
        $('.spinal_ml2').val(b_total);
        $('#clears2').show();
        $('.spinal_persent2').attr("readonly", true);
        $('.spinal_ml2').attr("readonly", true);
        $('.spinal_mg2').attr("readonly", true);
    }
});
$(".spinal_ml2").focusout(function(){
    var b_per = $('.spinal_persent2').val();
    var b_ml = $('.spinal_ml2').val();
    var b_mg = $('.spinal_mg2').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var mg =(b_per*bb);
        $('.spinal_mg2').val(mg);
        $('#clears2').show();
        $('.spinal_persent2').attr("readonly", true);
        $('.spinal_ml2').attr("readonly", true);
        $('.spinal_mg2').attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var percent = (b_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent2').val(percent);
			$('#clears2').show();
			$('.spinal_persent2').attr("readonly", true);
			$('.spinal_ml2').attr("readonly", true);
			$('.spinal_mg2').attr("readonly", true);
		}
    }
});
$(".spinal_mg2").focusout(function(){
    var b_per = $('.spinal_persent2').val();
    var b_ml = $('.spinal_ml2').val();
    var b_mg = $('.spinal_mg2').val();
    if(b_mg && b_per){
        var aa = b_mg/b_per;
        var b_total = aa/10;
        $('.spinal_ml2').val(b_total);
        $('#clears2').show();
        $('.spinal_persent2').attr("readonly", true);
        $('.spinal_ml2').attr("readonly", true);
        $('.spinal_mg2').attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var percent = (b_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent2').val(percent);
			$('#clears2').show();
			$('.spinal_persent2').attr("readonly", true);
			$('.spinal_ml2').attr("readonly", true);
			$('.spinal_mg2').attr("readonly", true);
		}
    }
});
function cleans2(){
    $('.spinal_persent2').val('');
    $('.spinal_ml2').val('');
    $('.spinal_mg2').val('');
    $('.spinal_persent2').removeAttr("readonly");
    $('.spinal_ml2').removeAttr("readonly");
    $('.spinal_mg2').removeAttr("readonly");
    $('#clears2').hide();
}
$(".spinal_persent3").focusout(function(){
    var r_per = $('.spinal_persent3').val();
    var r_ml = $('.spinal_ml3').val();
    var r_mg = $('.spinal_mg3').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var mg =(r_per*bb);
        $('.spinal_mg3').val(mg);
        $('#clears3').show();
        $('.spinal_persent3').attr("readonly", true);
        $('.spinal_ml3').attr("readonly", true);
        $('.spinal_mg3').attr("readonly", true);
    }
    else if(r_per && r_mg){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('.spinal_ml3').val(r_total);
        $('#clears3').show();
        $('.spinal_persent3').attr("readonly", true);
        $('.spinal_ml3').attr("readonly", true);
        $('.spinal_mg3').attr("readonly", true);
    }
});
$(".spinal_ml3").focusout(function(){
    var r_per = $('.spinal_persent3').val();
    var r_ml = $('.spinal_ml3').val();
    var r_mg = $('.spinal_mg3').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var mg =(r_per*bb);
        $('.spinal_mg3').val(mg);
        $('#clears3').show();
        $('.spinal_persent3').attr("readonly", true);
        $('.spinal_ml3').attr("readonly", true);
        $('.spinal_mg3').attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var percent = (r_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent3').val(percent);
			$('#clears3').show();
			$('.spinal_persent3').attr("readonly", true);
			$('.spinal_ml3').attr("readonly", true);
			$('.spinal_mg3').attr("readonly", true);
		}
    }
});
$(".spinal_mg3").focusout(function(){
    var r_per = $('.spinal_persent3').val();
    var r_ml = $('.spinal_ml3').val();
    var r_mg = $('.spinal_mg3').val();
    if(r_mg && r_per){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('.spinal_ml3').val(r_total);
        $('#clears3').show();
        $('.spinal_persent3').attr("readonly", true);
        $('.spinal_ml3').attr("readonly", true);
        $('.spinal_mg3').attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var percent = (r_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent3').val(percent);
			$('#clears3').show();
			$('.spinal_persent3').attr("readonly", true);
			$('.spinal_ml3').attr("readonly", true);
			$('.spinal_mg3').attr("readonly", true);
		}
    }
});
function cleans3(){
    $('.spinal_persent3').val('');
    $('.spinal_ml3').val('');
    $('.spinal_mg3').val('');
    $('.spinal_persent3').removeAttr("readonly");
    $('.spinal_ml3').removeAttr("readonly");
    $('.spinal_mg3').removeAttr("readonly");
    $('#clears3').hide();
}
$(".spinal_persent4").focusout(function(){
    var p_per = $('.spinal_persent4').val();
    var p_ml = $('.spinal_ml4').val();
    var p_mg = $('.spinal_mg4').val();
    if(p_per && p_ml){
        var bb = (p_ml)*10;
        var mg =(p_per*bb);
        $('.spinal_mg4').val(mg);
        $('#clears4').show();
        $('.spinal_persent4').attr("readonly", true);
        $('.spinal_ml4').attr("readonly", true);
        $('.spinal_mg4').attr("readonly", true);
    }
    else if(p_per && p_mg){
        var aa = p_mg/p_per;
        var p_total = aa/10;
        $('.spinal_ml4').val(p_total);
        $('#clears4').show();
        $('.spinal_persent4').attr("readonly", true);
        $('.spinal_ml4').attr("readonly", true);
        $('.spinal_mg4').attr("readonly", true);
    }
});
$(".spinal_ml4").focusout(function(){
    var p_per = $('.spinal_persent4').val();
    var p_ml = $('.spinal_ml4').val();
    var p_mg = $('.spinal_mg4').val();
    if(p_per && p_ml){
        var bb = (p_ml)*10;
        var mg =(p_per*bb);
        $('.spinal_mg4').val(mg);
        $('#clears4').show();
        $('.spinal_persent4').attr("readonly", true);
        $('.spinal_ml4').attr("readonly", true);
        $('.spinal_mg4').attr("readonly", true);
    }
    else if(p_mg && p_ml){
        var bb = (p_ml)*10;
        var percent = (p_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent4').val(percent);
			$('#clears4').show();
			$('.spinal_persent4').attr("readonly", true);
			$('.spinal_ml4').attr("readonly", true);
			$('.spinal_mg4').attr("readonly", true);
		}
    }
});
$(".spinal_mg4").focusout(function(){
    var p_per = $('.spinal_persent4').val();
    var p_ml = $('.spinal_ml4').val();
    var p_mg = $('.spinal_mg4').val();
    if(p_mg && p_per){
        var aa = p_mg/p_per;
        var p_total = aa/10;
        $('.spinal_ml4').val(p_total);
        $('#clears4').show();
        $('.spinal_persent4').attr("readonly", true);
        $('.spinal_ml4').attr("readonly", true);
        $('.spinal_mg4').attr("readonly", true);
    }
    else if(p_mg && p_ml){
        var bb = (p_ml)*10;
        var percent = (p_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent4').val(percent);
			$('#clears4').show();
			$('.spinal_persent4').attr("readonly", true);
			$('.spinal_ml4').attr("readonly", true);
			$('.spinal_mg4').attr("readonly", true);
		}
    }
});
function cleans4(){
    $('.spinal_persent4').val('');
    $('.spinal_ml4').val('');
    $('.spinal_mg4').val('');
    $('.spinal_persent4').removeAttr("readonly");
    $('.spinal_ml4').removeAttr("readonly");
    $('.spinal_mg4').removeAttr("readonly");
    $('#clears4').hide();
}
$(".spinal_persent5").focusout(function(){
    var chl_per = $('.spinal_persent5').val();
    var chl_ml = $('.spinal_ml5').val();
    var chl_mg = $('.spinal_mg5').val();
    if(chl_per && chl_ml){
        var bb = (chl_ml)*10;
        var mg =(chl_per*bb);
        $('.spinal_mg5').val(mg);
        $('#clears5').show();
        $('.spinal_persent5').attr("readonly", true);
        $('.spinal_ml5').attr("readonly", true);
        $('.spinal_mg5').attr("readonly", true);
    }
    else if(chl_per && chl_mg){
        var aa = chl_mg/chl_per;
        var cl_total = aa/10;
        $('.spinal_ml5').val(cl_total);
        $('#clears5').show();
        $('.spinal_persent5').attr("readonly", true);
        $('.spinal_ml5').attr("readonly", true);
        $('.spinal_mg5').attr("readonly", true);
    }
});
$(".spinal_ml5").focusout(function(){
    var chl_per = $('.spinal_persent5').val();
    var chl_ml = $('.spinal_ml5').val();
    var chl_mg = $('.spinal_mg5').val();
    if(chl_per && chl_ml){
        var bb = (chl_ml)*10;
        var mg =(chl_per*bb);
        $('.spinal_mg5').val(mg);
        $('#clears5').show();
        $('.spinal_persent5').attr("readonly", true);
        $('.spinal_ml5').attr("readonly", true);
        $('.spinal_mg5').attr("readonly", true);
    }
    else if(chl_mg && chl_ml){
        var bb = (chl_ml)*10;
        var percent = (chl_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent5').val(percent);
			$('#clears5').show();
			$('.spinal_persent5').attr("readonly", true);
			$('.spinal_ml5').attr("readonly", true);
			$('.spinal_mg5').attr("readonly", true);
		}
    }
});
$(".spinal_mg5").focusout(function(){
    var chl_per = $('.spinal_persent5').val();
    var chl_ml = $('.spinal_ml5').val();
    var chl_mg = $('.spinal_mg5').val();
    if(chl_mg && chl_per){
        var aa = chl_mg/chl_per;
        var cl_total = aa/10;
        $('.spinal_ml5').val(cl_total);
        $('#clears5').show();
        $('.spinal_persent5').attr("readonly", true);
        $('.spinal_ml5').attr("readonly", true);
        $('.spinal_mg5').attr("readonly", true);
    }
    else if(chl_mg && chl_ml){
        var bb = (chl_ml)*10;
        var percent = (chl_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent5').val(percent);
			$('#clears5').show();
			$('.spinal_persent5').attr("readonly", true);
			$('.spinal_ml5').attr("readonly", true);
			$('.spinal_mg5').attr("readonly", true);
		}
    }
});
function cleans5(){
    $('.spinal_persent5').val('');
    $('.spinal_ml5').val('');
    $('.spinal_mg5').val('');
    $('.spinal_persent5').removeAttr("readonly");
    $('.spinal_ml5').removeAttr("readonly");
    $('.spinal_mg5').removeAttr("readonly");
    $('#clears5').hide();
}
$(".spinal_persent6").focusout(function(){
    var ot_per = $('.spinal_persent6').val();
    var ot_ml = $('.spinal_ml6').val();
    var ot_mg = $('.spinal_mg6').val();
    if(ot_per && ot_ml){
        var bb = (ot_ml)*10;
        var mg =(ot_per*bb);
        $('.spinal_mg6').val(mg);
        $('#clears6').show();
        $('.spinal_persent6').attr("readonly", true);
        $('.spinal_ml6').attr("readonly", true);
        $('.spinal_mg6').attr("readonly", true);
    }
    else if(ot_per && ot_mg){
        var aa = ot_mg/ot_per;
        var o_total = aa/10;
        $('.spinal_ml6').val(o_total);
        $('#clears6').show();
        $('.spinal_persent6').attr("readonly", true);
        $('.spinal_ml6').attr("readonly", true);
        $('.spinal_mg6').attr("readonly", true);
    }
});
$(".spinal_ml6").focusout(function(){
    var ot_per = $('.spinal_persent6').val();
    var ot_ml = $('.spinal_ml6').val();
    var ot_mg = $('.spinal_mg6').val();
    if(ot_per && ot_ml){
        var bb = (ot_ml)*10;
        var mg =(ot_per*bb);
        $('.spinal_mg6').val(mg);
        $('#clears6').show();
        $('.spinal_persent6').attr("readonly", true);
        $('.spinal_ml6').attr("readonly", true);
        $('.spinal_mg6').attr("readonly", true);
    }
    else if(ot_mg && ot_ml){
        var bb = (ot_ml)*10;
        var percent = (ot_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent6').val(percent);
			$('#clears6').show();
			$('.spinal_persent6').attr("readonly", true);
			$('.spinal_ml6').attr("readonly", true);
			$('.spinal_mg6').attr("readonly", true);
		}
    }
});
$(".spinal_mg6").focusout(function(){
    var ot_per = $('.spinal_persent6').val();
    var ot_ml = $('.spinal_ml6').val();
    var ot_mg = $('.spinal_mg6').val();
    if(ot_mg && ot_per){
        var aa = ot_mg/ot_per;
        var o_total = aa/10;
        $('.spinal_ml6').val(o_total);
        $('#clears6').show();
        $('.spinal_persent6').attr("readonly", true);
        $('.spinal_ml6').attr("readonly", true);
        $('.spinal_mg6').attr("readonly", true);
    }
    else if(ot_mg && ot_ml){
        var bb = (ot_ml)*10;
        var percent = (ot_mg/bb);
		if(percent > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
			$('.spinal_persent6').val(percent);
			$('#clears6').show();
			$('.spinal_persent6').attr("readonly", true);
			$('.spinal_ml6').attr("readonly", true);
			$('.spinal_mg6').attr("readonly", true);
		}
    }
});
function cleans6(){
    $('.spinal_persent6').val('');
    $('.spinal_ml6').val('');
    $('.spinal_mg6').val('');
    $('.spinal_persent6').removeAttr("readonly");
    $('.spinal_ml6').removeAttr("readonly");
    $('.spinal_mg6').removeAttr("readonly");
    $('#clears6').hide();
}
// -----------------------------------------------spinal script start--------------------------------------

	$('.spinal_needel_brand_other').change(function(){

		var input = $('.spinal_needel_brand_other').val();	

		if(input == "Other"){
			$('.spinal_needel_brand_other_input').show();		
		}else{
			$('.spinal_needel_brand_other_input').hide();					
		}		
	});
	$('.spinal_needel_type_other').change(function(){

		var input = $('.spinal_needel_type_other').val();	

		if(input == "Other"){
			$('.spinal_needel_type_other_input').show();		
		}else{
			$('.spinal_needel_type_other_input').hide();					
		}		
	});

	function complete(){
		$("#com1").attr("readonly", false);
		$("#par1").attr("readonly", true);
		$("#par").prop("checked", false);
		$("#fail").prop("checked", false);
	}
	function partial(){
		$("#par1").attr("readonly", false);
		$("#com1").attr("readonly", true);
		$("#com").prop("checked", false);
		$("#fail").prop("checked", false);
	}
	function failure(){
		$("#par1").attr("readonly", true);
		$("#com1").attr("readonly", true);
		$("#com").prop("checked", false);
		$("#par").prop("checked", false);
	}

// ------------------------------------------------procedure start-------------------------------------------


	$(document).ready(function(){
		$('#combined_spinal_epidural_block').submit(function(e){
			e.preventDefault();
			var lor_sal = '', air = '', hang = '';
			// var ww = $('#other').is(':checked');			
			var xx = $('#epidural_lor_saline').is(':checked');
			var yy = $('#epidural_lor_air').is(':checked');
			var zz = $('#epidural_hang_drop').is(':checked');
			if(xx){
				lor_sal = $('#epidural_lor_saline').val();
			}
			if(yy){
				air = $('#epidural_lor_air').val();
			}
			if(zz){
				hang = $('#epidural_hang_drop').val();
			}

			var i = 0;

			if(final1 != '' || final2 != ''){
				if(final1.length != 4 || final1 == ''){
					i = 1;
				} 
				else if(final2.length != 4 || final2 == ''){
					
					i = 1;
				}
			}

			if(final3 != '' || final4 != ''){
				if(final3.length != 4 || final3 == ''){
					
					i = 1;
				} 
				else if(final4.length != 4 || final4 == ''){
					
					i = 1;
				}
			}

			if(final5 != '' || final6 != '' ){
				if(final5.length != 4 || final5 == ''){
					
					i = 1;
				} 
				else if(final6.length != 4 || final6 == ''){
					
					i = 1;
				}
			}
            
			if(final1 == '' && final2 == '' && final3 == '' && final4 == '' && final5 == '' && final6 == ''){
					i = 1;
			}
			if(i == 1){  
				toastr.error('Sensory Levels are incomplete.. Please enter Highest and lowest level...');
			}   
        	else{

				var aa = '',cc = '', bb = '', jj ='', ii ='', ee = '';
				var pat_pos = $('#patient_pos').val();
				var skp = $('#skin_prep').val();
				var csa = $('.cse_technique').val();
				var motor = $('#motor_level').val();

				if(!document.getElementById('option-1').checked && !document.getElementById('option-2').checked && !document.getElementById('option-3').checked){ 
					$('.psn').show();
					toastr.error('please choose patient status'); 
				}
				else{
					cc = true;
				}
				if(pat_pos != '')
					aa = true;
				else{
					$('.pat').show();
					toastr.error('please select patient position');
				}
				if(skp != '')
					bb = true;
				else{
					$('.skp').show();
					toastr.error('please select skin preparation');
				}
				if(csa != '')
					jj = true;
				else{
					// $('.csacheck').show();
					toastr.error('please select cse');
				}

				if (!document.getElementById('com').checked && !document.getElementById('par').checked && !document.getElementById('fail').checked) { 
					$('.succes').show();
					toastr.error('please choose success status'); 
				}
				else{
					ii = true;
				}
				if(motor != '')
					ee = true;
				else{
					$('.motro').show();
					toastr.error('please select motor level');
				}

				if(cc && aa && bb && jj && ii && ee){

					var formData = new FormData(this);
					formData.append('lor_saline',lor_sal);
					formData.append('lor_air',air);
					formData.append('hanging_drop',hang);			
					formData.append('final1',final1);
					formData.append('final2',final2);			
					formData.append('final3',final3);			
					formData.append('final4',final4);			
					formData.append('final5',final5);			
					formData.append('final6',final6);	
					
					$(".Save").text("Submitting...");
					$(".Save").attr("disabled", true);

					$.ajax({
						type : "POST",
						url : '<?php  echo base_url("labour-add-combined-procedure")?>',
						data : formData,
						contentType: false,
						processData: false,
						success:function(response){
							response = jQuery.parseJSON(response);
							if(response.result==1){
								toastr["success"](response.message);

								$('#combined_spinal_epidural_block')[0].reset();
								window.location = '<?php echo base_url("labour/combinedSpinalView")?>?id='+response.msg;					
							}
							else{
								toastr["error"](response.message);						
							}
						}
					});
				}

				
			}
		});

	});
</script>

<script src="<?php echo base_url('public/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script type="text/javascript">
    var today = new Date();
    var minDate = today.setDate(today.getDate());

    $('#datePicker5').datetimepicker({
    useCurrent: false,
    format: "DD/MM/YYYY",
    minDate: 0
    });

    var firstOpen = true;
    var time;

    $('#timePicker5').datetimepicker({useCurrent: false,format: "hh:mm A"}).on('dp.show', function() {
    if(firstOpen) {
        time = moment().startOf('day');
        firstOpen = false;
    } else {
        time = "01:00 PM"
    }
    
    $(this).data('DateTimePicker').date(time);
    });

    function selectcnb(){
        var sele = document.getElementById("cnb_by1").value;
        if(sele == "Trainee"){
            $('#consultant').show();
            $("#cnb_by2").empty();
            var str = ""
            str += "<option>Junior Trainee</option>";
            str += "<option>Senior Trainee</option>";
           
            $("#cnb_by2").append(str);
            
           
        }
        else if(sele == "Consultant"){
            $('#consultant').show();
            $("#cnb_by2").empty();
            var str = ""
            str += "<option>Junior Consultant</option>";
            str += "<option>Senior Consultant</option>";
           
            $("#cnb_by2").append(str);
           
            
        }
    }

    // function checkskin(){
    //     var skin = $('#skin_prep').val();
    //     // alert(skin); 
    //     if((skin == 'Other')){
    //         $('.skp').show();
    //         $('#skin_prep_other').val('');
    //     }
    //     else{
    //         $('.skp').hide();
    //         $('#skin_prep_other').val('');
    //     }
    // }

	function checkskin(){

		var skin = $('#skin_prep').val();
		if((skin != '')){
			$('.skp').hide();
		}

		var skin_prep_other = $('#skin_prep').val();

		if(skin_prep_other == 'Other'){
			$('#skin_prep_other').show();
		}else{
			$('#skin_prep_other').hide();
			$('#skin_prep_other').val('');
		}
	}

    function Midazolam(){
	    var mida = $('#mida').is(':checked');
	    if(!mida){
	        $("#mida1").attr("readonly", true);
	    }
	    else{
	        $('#mida1').removeAttr("readonly");
	    }
	}

	function ketamine(){
	    var keta = $('#keta').is(':checked');
	    if(!keta){
	        $("#keta1").attr("readonly", true);
	    }
	    else{
	        $('#keta1').removeAttr("readonly");
	    }
	}
</script>


<?php
    echo view('includes/footer-labour');    

?>



<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
	}
</style>

