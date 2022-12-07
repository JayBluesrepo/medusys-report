<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    

?>   

<!--  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script> -->

<section class="comb-spinal-epi">
	<h3>Add Combined Spinal Epidural</h3>
			<form id="combined_spinal_epidural_block">
				<label>Patient status during Neuraxial Block<span class="mandat">*</span></label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-6">
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Awake" name="neuraxial_block" onclick="hide()">Awake
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Sedation" name="neuraxial_block" onclick="show()">Sedation
							</label>
						</div>
						<div class="pt sedation_option" style="display:none;">
							<select class="form-control neuraxial_block_option" name="neuraxial_block_option" >
								<option>Select</option>
								<option>1-Mild easy to rouse</option>
								<option>2-Moderate,easy to rouse,unable to remain awake</option>
								<option>3-Difficult to rouse</option>
							</select>
						</div>
						<?php if($ga  == 'Sole/Primary Anaesthetic') {?>
						<div class="form-check" style="display:none;">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="GA" name="neuraxial_block" onclick="hide()" >GA
							</label>
						</div>
						<?php } else{ ?>
							<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="GA" name="neuraxial_block" onclick="hide()" >GA
							</label>
							</div>
						<?php } ?>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label style="font-size:13px;">Patient Position<span class="mandat">*</span></label></div>
					<div class="col-sm-4">
						<select class="form-control" name="patient_position">
							<option>Select</option>
							<option>Lateral</option>
							<option>Sitting</option>
							<option>Prone</option>
						</select>
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
							<ul>
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
				<div class="row">
					<div class="col-sm-2"><label>Skin Prep<span class="mandat">*</span></label></div>
					<div class="col-sm-4">
						<select class="form-control" name="skin_prep">
							<option >Select</option>
							<option >Alcohol</option>
							<option >Chlorhexidine</option>
							<option >Betadine</option>
							<option >Combinations</option>
							<option >Other</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				
				<div class="row pt">
					<div class="col-sm-2"><span><b>CSE Technique</b><span class="mandat">*</span></span></div>
					<div class="col-sm-5"> 
						<select class="form-control cse_technique" name="cse_technique" onfocusout="condition()">
							<option >Select</option>
							<option >Single Interspace Technique(Needle through Needle)</option>
							<option >Double Interspace Technique</option>
							<option >DPE:Dural Puncture Epidural Technique</option>
						</select>
					</div>
					<div class="col-sm-5"></div>
				</div><!--row-->
				<!-- <h5><b>Epidural<span class="mandat">*</span></b></h5> -->
				<div class="row pt">
					<div class="col-sm-2"><label>Anatomical Landmark<span class="mandat">*</span></label></div>
					<div class="col-sm-4">
						<select class="form-control" name="anatomical_landmark">
							<option >Select</option>
							<option >Easily Palpable</option>
							<option >Poorly Palpable</option>
							<option >Non Palpable</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<div class="row">
					<div class="col-sm-3"><h5><b>Epidural Level</b></h5></div>
					<div class="col-sm-2"> 
						<!-- <input type="text" class="form-control text-center epidural" name="epidural_level_input" readonly>  -->
					</div>
					<div class="col-sm-7"><h5 style="text-align:right;"><b>Spinal Level</b></h5></div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-1"></div>
					<div class="col-sm-3">
						<input type="text" class="form-control text-center epidural1" name="epidural_level_input" style="margin-bottom:10px;" readonly>
						<input type="text" class="form-control text-center epidural_level_name" name="epidural_level_input_name" readonly>
					</div>
					<div class="col-sm-5"></div>
					<div class="col-sm-3">
						<input type="text" class="form-control text-center spinal_level_input" name="spinal_level_input" style="margin-bottom:10px;" readonly>
						<input type="text" class="form-control text-center spinal_level_input_name" name="spinal_level_input_name" readonly>
					</div>
				</div>
				<div class="row human-skeleton">
					<div class="col-sm-12">
						<div class="new-skeleton-img">
							<img src="<?php echo base_url('assets/images/CSE-new.png'); ?>" class="img-fluid d-block mx-auto">
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
							<option >Select probe cover</option>
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
							<option >Select image quality</option>
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
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control epidural_needel_brand_other" name="epidural_brand">
									<option>Select Needle Brand</option>									
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
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control epidural_needel_type_other" name="epidural_needle_type">
									<option>Select Needle Type</option>
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
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4">
								<select class="form-control" name="epidural_needle_size">
									<option>Select needle size</option>
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
				<label>Epidural Technique</label>
				<div class="row">
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
				<div class="row pt">
					<div class="col-sm-2"><label>Approach</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="epidural_approach">
							<option >Select</option>
							<option >Midline</option>
							<option >Paramedian</option>
						</select>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label>Number Of Attempts</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="epidural_no_attempts">
							<option>Select</option>
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
				<div class="row mt-3">
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
				<div class="row">
					<div class="col-sm-2"><label>Intra Operative LA Regimen</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="epidural_intra_operative">
							<option >Select</option>
							<option >Continous Infusion</option>
							<option>Intermitten Bolus</option>
						</select>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<!-- <label class="pt" style="margin-bottom:10px;">Total Intra Operative LA & Adjuvant Consumption<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->

				<h5 class="bt"><b>Total Intra Operative LA & Adjuvant Consumption</b>
		 			<div class="tooltip-4">
					   <i class="fa fa-info-circle" aria-hidden="true"></i>
					    <div class="right-4">
					        <div class="text-content-4">
					            <h6>This includes Test Dose,Initial Dose and Total Intra Operative Use</h6>
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
									<option >Select</option>
									<option >Without Adrenaline</option>
									<option >With Adrenaline</option>
								</select>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_persent1" name="epidural_ropiva_persent" onkeyup="persentage('alert1')" ><span style="padding-top:5px;">%</span>	
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_ml1" name="epidural_ropiva_ml" ><span style="padding-top:5px;">ml</span>
							</div>
							<div class="pacu-1" id="id">
								<input type="number" class="form-control epidural_mg1" name="epidural_ropiva_mg" ><span style="padding-top:5px;">mg</span>
							</div>
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
									<option >Select</option>
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
								<input type="number" class="form-control epidural_mg2" name="epidural_bupiva_mg" ><span style="padding-top:5px;">mg</span>
							</div>
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
									<option >Select</option>
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
								<input type="number" class="form-control epidural_mg3" name="epidural_levabup_mg" ><span style="padding-top:5px;">mg</span>
							</div>
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
									<option >Select</option>
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
								<input type="number" class="form-control epidural_mg4" name="epidural_lignoca_mg" ><span style="padding-top:5px;">mg</span>
							</div>
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
						<label>Adjuvant</label>
						<div class= "box_1" style="margin-bottom:15px;">
							<input type="checkbox" class="switch_1 epidural_adjuvant" onclick="epidural_adjuvant()">
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
							<div class="row pt">
							<div class="col-sm-5">
								<div class="form-check">
									<label class="form-check-label">
									<input type="checkbox" class="form-check-input epidural_adrenaline" value="">Adrenaline(Epinephrine)(mcmg)
									</label>
								</div>
							</div>
							<div class="col-sm-7"><input type="text" class="form-control epidural_adrenaline_input" name="epidural_adrenaline_dose" placeholder="mcmg" readonly></div>
							</div><!--row-->
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
						<img src="<?php echo base_url('assets/images/Lev.png'); ?>" class="img-fluid d-block mx-auto">
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
				<label>Spinal Needle Type and Size</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select Spinal Needle Brand</span>
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4 pt">
								<select class="form-control spinal_needel_brand_other" name="spinal_needel_brand">
									<option value="Select">Select Needle Brand</option>
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
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4 pt">
								<select class="form-control spinal_needel_type_other" name="spinal_needel_type">
									<option value="Select">Select Needle Type</option>
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
				<div class="row pt">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<span>Select  Spinal Needle Size</span>
						<div class="row">
							<div class="col-sm-2"></div>
							<div class="col-sm-4 pt">
								<select class="form-control" name="spinal_needle_size">
									<option>Select needle size</option>
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
							<option>Select</option>
							<option>Midline</option>
							<option>Paramedian</option>
						</select>
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2"><label>Number of Attempts</label></div>
					<div class="col-sm-4">
						<select class="form-control" name="spinal_no_attempts">
							<option>Select</option>
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
				<div class="row">
					<div class="col-sm-2"><label>Spinal Anaesthetic</label></div>
					<div class="col-sm-4">
						<div class= "box_1">
							<input type="hidden" class="switch_1" value="No" name="spinal_anaesthetic">
							<input type="checkbox" class="switch_1 spinal_anaesthe" value="Yes" name="spinal_anaesthetic" >
						</div>
					</div>
					<div class="col-sm-6"></div>
				</div><!--row-->
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						
						<div class="procedure-cse spinal_anaesthe_box" style="display:none;">
							<span class="mb-2"><b>Local Anaesthetic</b></span>
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Lignocaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_lignoca_option1">
											<option>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_persent1" name="spinal_lignoca_persent1" ><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_ml1" name="spinal_lignoca_ml1" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg1" name="spinal_lignoca_mg1" ><span style="padding-top:5px;">mg</span>
									</div>
								</div><!--pac-box-->
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Bupivacaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_bupivaca_option2">
											<option>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_persent2" name="spinal_bupivaca_persent2" ><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_ml2" name="spinal_bupivaca_ml2" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg2" name="spinal_bupivaca_mg2" ><span style="padding-top:5px;">mg</span>
									</div>
								</div><!--pac-box-->
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Ropivacaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_ropivaca_option3">
											<option>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_persent3" name="spinal_ropivaca_persent3" ><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_ml3" name="spinal_ropivaca_ml3" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg3" name="spinal_ropivaca_mg3" ><span style="padding-top:5px;">mg</span>
									</div>
								</div><!--pac-box-->
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>Prilocaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_priloca_option4">
											<option>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_persent4" name="spinal_priloca_persent4" ><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_ml4" name="spinal_priloca_ml4" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg4" name="spinal_priloca_mg4" ><span style="padding-top:5px;">mg</span>
									</div>
								</div><!--pac-box-->
								<div class="pac-box" style="background-color: #F2F2F2!important;">
									<div class="pacu-1"><p>2-chloroprocaine</p></div>
									<div class="pacu-1-x">
										<select class="form-control" name="spinal_2chloropro_option5">
											<option>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_persent5" name="spinal_2chloropro_persent5" ><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_ml5" name="spinal_2chloropro_ml5" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg5" name="spinal_2chloropro_mg5" ><span style="padding-top:5px;">mg</span>
									</div>
								</div><!--pac-box-->
								<!-- <p>Other</p> -->
								<div class="form-check" style="background-color: #F2F2F2!important;">
									<label class="form-check-label">
										<input type="hidden" class="switch_1" value="No" name="spinal_anaesth_other">
										<input type="checkbox" class="form-check-input spinal_anaesth_other" value="Yes" name="spinal_anaesth_other" >Other
									</label>
								</div>
								<div class="pac-box spinal_anaesth_other_option" style="display:none;background-color: #F2F2F2!important;">
									<div class="pacu-1"><p></p></div>
									<div class="pacu-1-x">
										<select class="form-control spinal_anaesth_other_input" name="spinal_other_input6">
											<option>Select</option>
											<option>Heavy</option>
											<option>Iso/Hypobaric</option>
										</select>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_persent6" name="spinal_other_persent6" ><span style="padding-top:5px;">%</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_ml6" name="spinal_other_ml6" ><span style="padding-top:5px;">ml</span>
									</div>
									<div class="pacu-1" id="id">
										<input type="text" class="form-control spinal_mg6" name="spinal_other_mg6" ><span style="padding-top:5px;">mg</span>
									</div>
								</div><!--pac-box-->
						</div><!--procedure-cse-->
					</div>
				</div><!--row-->
				<div class="row pt">
					<div class="col-sm-2">
						<label>Adjuvant</label>
					</div>
					<div class="col-sm-2">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 spinal_adjuvant">
						</div>
					</div>
					<div class="col-sm-8"></div>
				</div><!--row-->
				<div class="row spinal_adjuvant_box" style="display:none;" >
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class="pt" id="proced-plus" style="border: 1px solid lightgrey;border-radius: 8px;padding: 10px;">
								<div class="form-check">
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
				<label class="pt">Analgesia supplementation required<span class="mandat">*</span></label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 spinal_analgesia_supplement">
						</div>
						<div class="analg-box spinal_analgesia_supplement_box" style="display:none;">
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="asr_spinal_inhalation">
									<input type="checkbox" class="form-check-input" name="asr_spinal_inhalation" value="Yes">Inhalation Analgesia
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
											<div class="col-sm-7" id="proced-plus" style="display:flex;"><input type="text" class="form-control" name="asr_opioid_name_spinal[]"><button type="button" class="btn add6" ><i class="fa fa-plus" aria-hidden="true"></i></button></div>
										</div><!--row-->
										<div class="row pt" style="margin-left:3%;">
											<div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
											<div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose_spinal[]"></div>
										</div><!--row-->
									</div>
									<div class="form-check" style="margin-left: 3%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_multi_modal">
											<input type="checkbox" class="form-check-input spinal_multi_model" value="Yes" name="asr_multi_modal">Multi-Modal Analgesia
										</label>
									</div>
								<div class="spinal_multi_model_box" style="display:none;">
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_ketamine">
											<input type="checkbox" class="form-check-input" value="Yes" name="asr_ketamine">Ketamine
										</label>
									</div>
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
									<div class="form-check" style="margin-left: 5%;">
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
									</div>
								</div>
							</div>	
						</div>
					</div><!--col-10-->
				</div><!--row-->
				<label class="pt">Technical complications<span class="mandat">*</span> <!-- <a href="#" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 tech_complication_check">
						</div>
						<div class="tech-compli tech_complication_checkbox" style="display:none;">
							<!-- <ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="">
											<input type="checkbox" class="form-check-input" value="Yes" name="">Failure of spinal component
										</label>
									</div>
								</li>
							</ul> -->
							<ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_equipment">
											<input type="checkbox" class="form-check-input" value="Yes" name="complication_equipment">Equipment related
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_multi_attempts">
											<input type="checkbox" class="form-check-input" value="Yes" name="complication_multi_attempts">Multiple attempts
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_2nd_anaesthe">
											<input type="checkbox" class="form-check-input" value="Yes" name="complication_2nd_anaesthe">2nd Anaesthetist
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_failure_space">
											<input type="checkbox" class="form-check-input" value="Yes" name="complication_failure_space">Technique abandoned/failure to find space
										</label>
									</div>
								</li>
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li>
									<div class="form-check">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="complication_catheter">
											<input type="checkbox" class="form-check-input" value="Yes" name="complication_catheter">Catheter related
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
							</ul>
							<ul style="margin-bottom:0px;padding-left: 0;">	
								<li style="display:none;" class="spinal_technical_input">
									<input type="text" class="form-control" name="complication_other" >
								</li>
							</ul>
						</div>
					</div>
				</div><!--row-->				
				<label class="pt">Acute complications<span class="mandat">*</span></label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-10">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 spinal_acute_multi_option">
						</div>
						<div class="spinal_acute_multi_option_box" style="display:none;">
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_epidural_resited">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_epidural_resited">Epidural re-sited
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_last">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_rasicular_pain">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_rasicular_pain">Radicular Pain (needle/catheter)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_paresthesia_pain">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_paresthesia_pain">Paresthesia  (needle/catheter)
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_bloody_tap">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_bloody_tap">Bloody Tap (needle/catheter)
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
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_hypotension">Hypotension <!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="20% drop from baseline or SBP,90mmHg"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_nausea">Nausea
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_vomiting">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_vomiting">Vomiting
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_high_block">
									<input type="checkbox" class="form-check-input" value="Yse" name="ac_high_block">High Block <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_subdural_block">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_subdural_block">Subdural Block
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_total_spinal">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_total_spinal">Total Spinal <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_respira_arrest">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_respira_arrest">Respiratory Arrest
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_cardiac_arrest">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_cardiac_arrest">Cardiac Arrest
								</label>
							</div>
							<!-- <div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_wet_tap">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_wet_tap">Wet Tap/Dural puncture (needle/catheter)
								</label>
							</div>
							
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_motor_block">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_motor_block">Motor Block
								</label>
							</div>
							
							<div class="form-check">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_accidental">
									<input type="checkbox" class="form-check-input" value="Yes" name="ac_accidental">Accidental Dural Puncture
								</label>
							</div> -->
							<div class="form-check" style="display: flex;">
								<label class="form-check-label">
									<input type="hidden" class="switch_1" value="No" name="ac_other">
									<input type="checkbox" class="form-check-input spinal_acute_other" value="Yes" name="ac_other">Other
								</label>
								<input type="text" class="form-control spinal_acute_other_input ml-3" name="ac_other_input" style="width: 30%;display:none;">
							</div>
						</div>
					</div>
				</div><!--row-->
				<label class="pt">Success<span class="mandat">*</span><!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
				<div class="tooltip-6">
				   <i class="fa fa-info-circle" aria-hidden="true"></i>
				    <div class="right-6">
				        <div class="text-content-6">
				            <h6>Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade.</h6>
				            <i></i>
				        </div>
				    </div>
				</div>	
				</label>
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-6">
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" id="com" value="Complete Success" name="success_option" data-placement="bottom" onclick="complete()">Complete Success<!-- <a href="#" class="tip" data-toggle="tooltip"  title="Complete Success: With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
							<div class="tooltip-7">
								   <i class="fa fa-info-circle" aria-hidden="true"></i>
								    <div class="right-7">
								        <div class="text-content-7">
								            <h6>Complete Success: With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal.</h6>
								            <i></i>
								        </div>
								    </div>
								</div>
							</label>
						</div>
						<ul class="success-list">
							<li>Onset</li>
							<li><input type="text" class="form-control" name="comp1ete_success_onset" id="com1" readonly></li>
							<li>(Mins)</li>
						</ul>
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" id="par" value="Partial Success" name="success_option" onclick="partial()">Partial Success<!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Partial Succes: With the above block success definition being satisfied, the purpose of CNB is being met with some additional intravenous analgesics / inhalationals including but not restricted to LA infiltration, opioids, ketamine, hypnotics.If used as analgesic purpose only, the cumulative intra-operative and postoperative pain and opioids requirements are moderate."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
							<div class="tooltip-8">
							   <i class="fa fa-info-circle" aria-hidden="true"></i>
							    <div class="right-8">
							        <div class="text-content-8">
							            <h6>Partial Succes: With the above block success definition being satisfied, the purpose of CNB is being met with some additional intravenous analgesics / inhalationals including but not restricted to LA infiltration, opioids, ketamine, hypnotics.If used as analgesic purpose only, the cumulative intra-operative and postoperative pain and opioids requirements are moderate.</h6>
							            <i></i>
							        </div>
							    </div>
							</div>
							</label>
						</div>
						<ul class="success-list">
							<li>Onset</li>
							<li><input type="text" class="form-control" name="partial_success_onset" id="par1" readonly></li>
							<li>(Mins)</li>
						</ul>
						<div class="form-check">
							<label class="form-check-label">
							<input type="radio" class="form-check-input" value="Failure" name="success_option" id="fail" onclick="failure()">Failure<!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Failure: Defined as failure to enter the required space, failure to achieve required sensory /motor block. Conversion to GA or very high opioid/ ketamine or hypnotic requirements."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
							<div class="tooltip-9">
							   <i class="fa fa-info-circle" aria-hidden="true"></i>
							    <div class="right-9">
							        <div class="text-content-9">
							            <h6>Failure: Defined as failure to enter the required space, failure to achieve required sensory /motor block. Conversion to GA or very high opioid/ ketamine or hypnotic requirements.</h6>
							            <i></i>
							        </div>
							    </div>
							</div>
							</label>
						</div>
					</div>
					<div class="col-sm-4"></div>
				</div><!--row-->
				<label class="pt">Sensory Level<span class="mandat">*</span><a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Content not provided"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label>
				
				<div class="modal fade" id="work">
					<div class="modal-dialog modal-md">
						<div class="modal-content">					
							<!-- Modal body -->
							<div class="modal-body" style="text-align:center;">							
								<input type="hidden" id="rahul">
								<input type="hidden" id="rahul1">
								<button type="button" class="btn-red" onclick="refer('red')">Red</button>
								<button type="button" class="btn-green" onclick="refer('green')">Green</button>
								<button type="button" class="btn-white" onclick="refer('white')">White</button>
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
											<td onclick="tog('C2-L-cold','c2')" id="c2"></td>
											<td onclick="tog('C2-R-cold','c21')" id="c21"></td>
											<td onclick="tog('C2-L-Touch','c22')" id="c22"></td>
											<td onclick="tog('C2-R-Touch','c23')" id="c23"></td>
											<td onclick="tog('C2-L-Pinprick','c24')" id="c24"></td>
											<td onclick="tog('C2-R-Pinprick','c25')" id="c25"></td>
										</tr>
										<tr>
											<td>C3</td>
											<td onclick="tog('C3-L-cold','c3')" id="c3"></td>
											<td onclick="tog('C3-R-cold','c31')" id="c31"></td>
											<td onclick="tog('C3-L-Touch','c32')" id="c32"></td>
											<td onclick="tog('C3-R-Touch','c33')" id="c33"></td>
											<td onclick="tog('C3-L-Pinprick','c34')" id="c34"></td>
											<td onclick="tog('C3-R-Pinprick','c35')" id="c35"></td>
										</tr>
										<tr>
											<td>C4</td>
											<td onclick="tog('C4-L-cold','c4')" id="c4"></td>
											<td onclick="tog('c4-R-cold','c41')" id="c41"></td>
											<td onclick="tog('c4-L-Touch','c42')" id="c42"></td>
											<td onclick="tog('c4-R-Touch','c43')" id="c43"></td>
											<td onclick="tog('c4-L-Pinprick','c44')" id="c44"></td>
											<td onclick="tog('c4-R-Pinprick','c45')" id="c45"></td>
										</tr>
										<tr>
											<td>C5</td>
											<td onclick="tog('c5-L-cold','c5')" id="c5"></td>
											<td onclick="tog('c5-R-cold','c51')" id="c51"></td>
											<td onclick="tog('c5-L-Touch','c52')" id="c52"></td>
											<td onclick="tog('c5-R-Touch','c53')" id="c53"></td>
											<td onclick="tog('c5-L-Pinprick','c54')" id="c54"></td>
											<td onclick="tog('c5-R-Pinprick','c55')" id="c55"></td>
										</tr>
										<tr>
											<td>C6</td>
											<td onclick="tog('c6-L-cold','c6')" id="c6"></td>
											<td onclick="tog('c6-R-cold','c61')" id="c61"></td>
											<td onclick="tog('c6-L-Touch','c62')" id="c62"></td>
											<td onclick="tog('c6-R-Touch','c63')" id="c63"></td>
											<td onclick="tog('c6-L-Pinprick','c64')" id="c64"></td>
											<td onclick="tog('c6-R-Pinprick','c65')" id="c65"></td>
										</tr>
										<tr>
											<td>C7</td>
											<td onclick="tog('c7-L-cold','c7')" id="c7"></td>
											<td onclick="tog('c7-R-cold','c71')" id="c71"></td>
											<td onclick="tog('c7-L-Touch','c72')" id="c72"></td>
											<td onclick="tog('c7-R-Touch','c73')" id="c73"></td>
											<td onclick="tog('c7-L-Pinprick','c74')" id="c74"></td>
											<td onclick="tog('c7-R-Pinprick','c75')" id="c75"></td>
										</tr>
										<tr>
											<td>C8</td>
											<td onclick="tog('c8-L-cold','c8')" id="c8"></td>
											<td onclick="tog('c8-R-cold','c81')" id="c81"></td>
											<td onclick="tog('c8-L-Touch','c82')" id="c82"></td>
											<td onclick="tog('c8-R-Touch','c83')" id="c83"></td>
											<td onclick="tog('c8-L-Pinprick','c84')" id="c84"></td>
											<td onclick="tog('c8-R-Pinprick','c85')" id="c85"></td>
										</tr>
										
										<tr>
											<td>T1</td>
											<td onclick="tog('t1-L-cold','t1')" id="t1"></td>
											<td onclick="tog('t1-R-cold','t11')" id="t11"></td>
											<td onclick="tog('t1-L-Touch','t12')" id="t12"></td>
											<td onclick="tog('t1-R-Touch','t13')" id="t13"></td>
											<td onclick="tog('t1-L-Pinprick','t14')" id="t14"></td>
											<td onclick="tog('t1-R-Pinprick','t15')" id="t15"></td>
										</tr>
										<tr>
											<td>T2</td>
											<td onclick="tog('t2-L-cold','t2')" id="t2"></td>
											<td onclick="tog('t2-R-cold','t21')" id="t21"></td>
											<td onclick="tog('t2-L-Touch','t22')" id="t22"></td>
											<td onclick="tog('t2-R-Touch','t23')" id="t23"></td>
											<td onclick="tog('t2-L-Pinprick','t24')" id="t24"></td>
											<td onclick="tog('t2-R-Pinprick','t25')" id="t25"></td>
										</tr>
										<tr>
											<td>T3</td>
											<td onclick="tog('t3-L-cold','t3')" id="t3"></td>
											<td onclick="tog('t3-R-cold','t31')" id="t31"></td>
											<td onclick="tog('t3-L-Touch','t32')" id="t32"></td>
											<td onclick="tog('t3-R-Touch','t33')" id="t33"></td>
											<td onclick="tog('t3-L-Pinprick','t34')" id="t34"></td>
											<td onclick="tog('t3-R-Pinprick','t35')" id="t35"></td>
										</tr>
										<tr>
											<td>T4</td>
											<td onclick="tog('t4-L-cold','t4')" id="t4"></td>
											<td onclick="tog('t4-R-cold','t41')" id="t41"></td>
											<td onclick="tog('t4-L-Touch','t42')" id="t42"></td>
											<td onclick="tog('t4-R-Touch','t43')" id="t43"></td>
											<td onclick="tog('t4-L-Pinprick','t44')" id="t44"></td>
											<td onclick="tog('t4-R-Pinprick','t45')" id="t45"></td>
										</tr>
										<tr>
											<td>T5</td>
											<td onclick="tog('t5-L-cold','t5')" id="t5"></td>
											<td onclick="tog('t5-R-cold','t51')" id="t51"></td>
											<td onclick="tog('t5-L-Touch','t52')" id="t52"></td>
											<td onclick="tog('t5-R-Touch','t53')" id="t53"></td>
											<td onclick="tog('t5-L-Pinprick','t54')" id="t54"></td>
											<td onclick="tog('t5-R-Pinprick','t55')" id="t55"></td>
										</tr>
										<tr>
											<td>T6</td>
											<td onclick="tog('t6-L-cold','t6')" id="t6"></td>
											<td onclick="tog('t6-R-cold','t61')" id="t61"></td>
											<td onclick="tog('t6-L-Touch','t62')" id="t62"></td>
											<td onclick="tog('t6-R-Touch','t63')" id="t63"></td>
											<td onclick="tog('t6-L-Pinprick','t64')" id="t64"></td>
											<td onclick="tog('t6-R-Pinprick','t65')" id="t65"></td>
										</tr>
										<tr>
											<td>T7</td>
											<td onclick="tog('t7-L-cold','t7')" id="t7"></td>
											<td onclick="tog('t7-R-cold','t71')" id="t71"></td>
											<td onclick="tog('t7-L-Touch','t72')" id="t72"></td>
											<td onclick="tog('t7-R-Touch','t73')" id="t73"></td>
											<td onclick="tog('t7-L-Pinprick','t74')" id="t74"></td>
											<td onclick="tog('t7-R-Pinprick','t75')" id="t75"></td>
										</tr>
										<tr>
											<td>T8</td>
											<td onclick="tog('t8-L-cold','t8')" id="t8"></td>
											<td onclick="tog('t8-R-cold','t81')" id="t81"></td>
											<td onclick="tog('t8-L-Touch','t82')" id="t82"></td>
											<td onclick="tog('t8-R-Touch','t83')" id="t83"></td>
											<td onclick="tog('t8-L-Pinprick','t84')" id="t84"></td>
											<td onclick="tog('t8-R-Pinprick','t85')" id="t85"></td>
										</tr>
										<tr>
											<td>T9</td>
											<td onclick="tog('t9-L-cold','t9')" id="t9"></td>
											<td onclick="tog('t9-R-cold','t91')" id="t91"></td>
											<td onclick="tog('t9-L-Touch','t92')" id="t92"></td>
											<td onclick="tog('t9-R-Touch','t93')" id="t93"></td>
											<td onclick="tog('t9-L-Pinprick','t94')" id="t94"></td>
											<td onclick="tog('t9-R-Pinprick','t95')" id="t95"></td>
										</tr>
										<tr>
											<td>T10</td>
											<td onclick="tog('t10-L-cold','t10')" id="t10"></td>
											<td onclick="tog('t10-R-cold','t101')" id="t101"></td>
											<td onclick="tog('t10-L-Touch','t102')" id="t102"></td>
											<td onclick="tog('t10-R-Touch','t103')" id="t103"></td>
											<td onclick="tog('t10-L-Pinprick','t104')" id="t104"></td>
											<td onclick="tog('t10-R-Pinprick','t105')" id="t105"></td>
										</tr>
										<tr>
											<td>T11</td>
											<td onclick="tog('t11-L-cold','t11a')" id="t11a"></td>
											<td onclick="tog('t11-R-cold','t111')" id="t111"></td>
											<td onclick="tog('t11-L-Touch','t112')" id="t112"></td>
											<td onclick="tog('t11-R-Touch','t113')" id="t113"></td>
											<td onclick="tog('t11-L-Pinprick','t114')" id="t114"></td>
											<td onclick="tog('t11-R-Pinprick','t115')" id="t115"></td>
										</tr>
										<tr>
											<td>T12</td>
											<td onclick="tog('t12-L-cold','t12a')" id="t12a"></td>
											<td onclick="tog('t12-R-cold','t121')" id="t121"></td>
											<td onclick="tog('t12-L-Touch','t122')" id="t122"></td>
											<td onclick="tog('t12-R-Touch','t123')" id="t123"></td>
											<td onclick="tog('t12-L-Pinprick','t124')" id="t124"></td>
											<td onclick="tog('t12-R-Pinprick','t125')" id="t125"></td>
										</tr>
										<tr>
											<td>L1</td>
											<td onclick="tog('l1-L-cold','l1')" id="l1"></td>
											<td onclick="tog('l1-R-cold','l11')" id="l11"></td>
											<td onclick="tog('l1-L-Touch','l12')" id="l12"></td>
											<td onclick="tog('l1-R-Touch','l13')" id="l13"></td>
											<td onclick="tog('l1-L-Pinprick','l14')" id="l14"></td>
											<td onclick="tog('l1-R-Pinprick','l15')" id="l15"></td>
										</tr>
										<tr>
											<td>L2</td>
											<td onclick="tog('l2-L-cold','l2')" id="l2"></td>
											<td onclick="tog('l2-R-cold','l21')" id="l21"></td>
											<td onclick="tog('l2-L-Touch','l22')" id="l22"></td>
											<td onclick="tog('l2-R-Touch','l23')" id="l23"></td>
											<td onclick="tog('l2-L-Pinprick','l24')" id="l24"></td>
											<td onclick="tog('l2-R-Pinprick','l25')" id="l25"></td>
										</tr>
										<tr>
											<td>L3</td>
											<td onclick="tog('l3-L-cold','l3')" id="l3"></td>
											<td onclick="tog('l3-R-cold','l31')" id="l31"></td>
											<td onclick="tog('l3-L-Touch','l32')" id="l32"></td>
											<td onclick="tog('l3-R-Touch','l33')" id="l33"></td>
											<td onclick="tog('l3-L-Pinprick','l34')" id="l34"></td>
											<td onclick="tog('l3-R-Pinprick','l35')" id="l35"></td>
										</tr>
										<tr>
											<td>L4</td>
											<td onclick="tog('l4-L-cold','l4')" id="l4"></td>
											<td onclick="tog('l4-R-cold','l41')" id="l41"></td>
											<td onclick="tog('l4-L-Touch','l42')" id="l42"></td>
											<td onclick="tog('l4-R-Touch','l43')" id="l43"></td>
											<td onclick="tog('l4-L-Pinprick','l44')" id="l44"></td>
											<td onclick="tog('l4-R-Pinprick','l45')" id="l45"></td>
										</tr>
										<tr>
											<td>L5</td>
											<td onclick="tog('l5-L-cold','l5')" id="l5"></td>
											<td onclick="tog('l5-R-cold','l51')" id="l51"></td>
											<td onclick="tog('l5-L-Touch','l52')" id="l52"></td>
											<td onclick="tog('l5-R-Touch','l53')" id="l53"></td>
											<td onclick="tog('l5-L-Pinprick','l54')" id="l54"></td>
											<td onclick="tog('l5-R-Pinprick','l55')" id="l55"></td>
										</tr>
									</tbody>
									</table>
							</div>
						</div><!--sensor-table-->
						
					</div>
					<div class="col-sm-6">
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
						<img src="<?php echo base_url('assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto" style="margin-top: 42%;">
					</div>
				</div><!--row-->
				<h4><b>Motor Level (Bromage Score)<span class="mandat">*</span></b></h4>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<select class="form-control" name="motor_level">
							<option>Select</option>
							<option>0(Free movement of legs and feet)</option>
							<option>1(Just able to fix knees with free movement of feet)</option>
							<option>2(Unable to flex Knees,but with free movement of feet)</option>
							<option>3(Unable to move legs or feet)</option>
						</select>
						<img src="<?php echo base_url('assets/images/Bromo.png'); ?>" class="img-fluid d-block mx-auto">
					</div>
					<div class="col-sm-3"></div>
				</div><!--row-->
				<div class="duration">
					<ul>
						<li><label>Onset of surgical Anaesthesia</label></li>
						<li><input type="text" class="form-control" name=""></li>
						<li><label>mins</label></li>
					</ul>
					<ul>
						<li><label>Duration of Surgery</label></li>
						<li><input type="text" class="form-control" name="duration_surgery"></li>
						<li><label>mins</label></li>
					</ul>
				</div><!--row-->
				<div class="duration">
					<ul>
						<li><label>Blood Loss</label></li>
						<li><input type="text" class="form-control" name="blood_loss"></li>
						<li><label>ml</label></li>
					</ul>
				</div><!--row-->
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
					<div class="col-sm-7"></div>
					<div class="col-sm-5">
						<button type="submit" class="btn-save">Save</button>
						<button type="button" class="btn-close">Reset</button>
					</div>
				</div><!--row-->
			</form>
</section><!--comb-spinal-epi-->

<script>
	var final = [];
	function tog(key,id) {
		// alert(key);
		// alert(id);
		$('#rahul').val(id);
		$('#rahul1').val(key);

		
		$('#work').modal("show");
		// index = final.indexOf(key);
		// if(index == -1){

		// }
		// else{
		// 	final.push(key);
		// 	final.push('NOT_SELECTED');
		// }
		// final.filter((item, 
        //     index) => final.indexOf(item) === index);
		
		
	}
	function refer(key1){
		// alert(key1);
		$('#work').modal("hide");
		var block = $('#rahul').val();
		var block1 = $('#rahul1').val();
		var block2 = block+'-'+block1;
		index = final.indexOf(block2);
		if(index == -1){
			
			final.push(block2); // INDEX
			final.push(key1); //COLOR
		}
		else{
			final[index+1] = key1;
		}
		// var name = $('rahul1').val();
		$('#'+block).css('background-color',key1);
		console.log(final);
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
	function hide(){
		$('.sedation_option').hide();	
	}
	
	// ----------------------------------------level showing button function------------------------------------------------

	// function condition(){
	//  	var condition = $('.cse_technique').val();
	// 	// alert(condition);

	// 	if(condition == 'Single Interspace Technique(Needle through Needle)'){
	// 		// alert('work');
	// 		$(".epidural_level"). click(function() {
	// 			var epidural_level = $(this).val();
	// 			var epidural_level_split = 	epidural_level.split(',');	
	// 			$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
	// 			$('.epidural1').val(epidural_level_split[0]);
	// 			$('.epidural_level_name').val(epidural_level_split[1]);
	// 			$('.spinal_level_input').val(epidural_level_split[0]);
	// 			$('.spinal_level_input_name').val(epidural_level_split[1]);
	// 		});

	// 		$(".spinal_level"). click(function() {
	// 			var spinal_level = $(this).val();	
	// 			var spinal_level_split = spinal_level.split(',');	
	// 			// alert(spinal_level_split[0]);
	// 			$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
	// 			$('.spinal_level_input').val(spinal_level_split[0]);
	// 			$('.spinal_level_input_name').val(spinal_level_split[1]);
	// 			$('.epidural1').val(spinal_level_split[0]);
	// 			$('.epidural_level_name').val(spinal_level_split[1]);
	// 		});
	// 	}else{

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
	// 	}

	// }

	// $(".spinal_level"). click(function() {
	// 	var spinal_level = $(this).val();	
	// 	var spinal_level_split = spinal_level.split(',');	
	// 	// alert(spinal_level_split[0]);
	// 	$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
	// 	$('.spinal_level_input').val(spinal_level_split[0]);
	// 	$('.spinal_level_input_name').val(spinal_level_split[1]);

	// });

	// $(".epidural_level"). click(function() {
	// 	var epidural_level = $(this).val();
	// 	var epidural_level_split = 	epidural_level.split(',');	
	// 	$(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");		
	// 	$('.epidural1').val(epidural_level_split[0]);
	// 	$('.epidural_level_name').val(epidural_level_split[1]);

	// });
	// ----------------------------------------level showing button function (END)-------------------------------------------------

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
				$(".spinal_opioid_supplemen_box").append('<div class="row5 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus"  style="display:flex;"><input type="text" class="form-control" name="asr_opioid_name_spinal[]" ><button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose_spinal[]" ></div></div></div>');
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

	function epidural_adjuvant(){
		var epidural_adjuvant = $('.epidural_adjuvant').is(':checked');
        if(!epidural_adjuvant){
            $('.epidural_adjuvant_check').hide();
        }else{
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
	$('.epidural_adrenaline').click(function(){
		var epidural_clonidne =$('.epidural_adrenaline').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_adrenaline_input").attr("readonly", true);
		}
		else{
			$('.epidural_adrenaline_input').removeAttr("readonly");
		}
	});
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
	$('.spinal_anaesthe').click(function(){
		var epidural_clonidne =$('.spinal_anaesthe').is(':checked');		
		if(!epidural_clonidne){			
        	$(".spinal_anaesthe_box").hide();
		}
		else{
			$('.spinal_anaesthe_box').show();
		}
	});
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
	var r_mg = 0;
	var r_mg1 = 0;
	var r_mg2 = 0;
	var r_mg3 = 0;


	$(".epidural_ml1").keyup(function(){
		var persent = $('.epidural_persent1').val();
		var ml = $('.epidural_ml1').val();
		// var div = (persent/100);
		var multi = ml*10;
		var mg = (persent*multi) ;
		$('.epidural_mg1').val(mg);
	});	
	$(".epidural_persent1").keyup(function(){
		var persent = $('.epidural_persent1').val();
		var ml = $('.epidural_ml1').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi);
		$('.epidural_mg1').val(mg);
	});
	$('.epidural_mg1').keyup(function(){
		$('.epidural_persent1').val('');
		$('.epidural_ml1').val('');
		// r_mg = $('.epidural_mg1').val();
	});
	

	function persentage(type){
		var limit = $('.epidural_persent1').val();
		var limit1 = $('.epidural_persent2').val();
		var limit2 = $('.epidural_persent3').val();
		var limit3 = $('.epidural_persent4').val();


		if(type == 'alert1'){

			if(limit <= 4){			
				$('#persentage_tage').hide();
				$('.epidural_persent1').css('border-color','').css('background','');
			}else{			
				$('#persentage_tage').show();
				$('.epidural_persent1').css('border-color','red').css('background','#FFCCCB');
			}
		}else if(type == 'alert2'){
			if(limit1 <= 4){			
				$('#persentage_tage1').hide();
				$('.epidural_persent2').css('border-color','').css('background','');

			}else{			
				$('#persentage_tage1').show();
				$('.epidural_persent2').css('border-color','red').css('background','#FFCCCB');
			}
		}else if(type == 'alert3'){
			if(limit2 <= 4){			
				$('#persentage_tage2').hide();
				$('.epidural_persent3').css('border-color','').css('background','');
			}else{			
				$('#persentage_tage2').show();
				$('.epidural_persent3').css('border-color','red').css('background','#FFCCCB');
			}	
		}else if(type == 'alert4'){
			if(limit3 <= 4){			
				$('#persentage_tage3').hide();
				$('.epidural_persent4').css('border-color','').css('background','');

			}else{			
				$('#persentage_tage3').show();
				$('.epidural_persent4').css('border-color','red').css('background','#FFCCCB');
			}	
		}
		
		
	}

	$(".epidural_ml2").keyup(function(){
		var persent = $('.epidural_persent2').val();
		var ml = $('.epidural_ml2').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(r_mg1);
		$('.epidural_mg2').val(mg);
	});
	$(".epidural_persent2").keyup(function(){
		var persent = $('.epidural_persent2').val();
		var ml = $('.epidural_ml2').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(r_mg1);
		$('.epidural_mg2').val(mg);
	});

	$('.epidural_mg2').keyup(function(){
		$('.epidural_persent2').val('');
		$('.epidural_ml2').val('');
		r_mg1 = $('.epidural_mg2').val();
	});

	$(".epidural_ml3").keyup(function(){
		var persent = $('.epidural_persent3').val();
		var ml = $('.epidural_ml3').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(r_mg2);
		$('.epidural_mg3').val(mg);
	});
	$(".epidural_persent3").keyup(function(){
		var persent = $('.epidural_persent3').val();
		var ml = $('.epidural_ml3').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(r_mg2);
		$('.epidural_mg3').val(mg);
	});
	$('.epidural_mg3').keyup(function(){
		$('.epidural_persent3').val('');
		$('.epidural_ml3').val('');
		r_mg2 = $('.epidural_mg3').val();
	});

	$(".epidural_ml4").keyup(function(){
		var persent = $('.epidural_persent4').val();
		var ml = $('.epidural_ml4').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(r_mg3);
		$('.epidural_mg4').val(mg);
	});
	$(".epidural_persent4").keyup(function(){
		var persent = $('.epidural_persent4').val();
		var ml = $('.epidural_ml4').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(r_mg3);
		$('.epidural_mg4').val(mg);
	});
	$('.epidural_mg4').keyup(function(){
		$('.epidural_persent4').val('');
		$('.epidural_ml4').val('');
		r_mg3 = $('.epidural_mg4').val();
	});
// ----------------------------------------------------calculation conver to mg (END)---------------------------------------

	var s_mg = 0;
	var s_mg1 = 0;
	var s_mg2 = 0;
	var s_mg3 = 0;
	var s_mg4 = 0;
	var s_mg5 = 0;



	$(".spinal_ml1").keyup(function(){
		var persent = $('.spinal_persent1').val();
		var ml = $('.spinal_ml1').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg);
		$('.spinal_mg1').val(mg);
	});
	$(".spinal_persent1").keyup(function(){
		var persent = $('.spinal_persent1').val();
		var ml = $('.spinal_ml1').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg);
		$('.spinal_mg1').val(mg);
	});

	$('.spinal_mg1').keyup(function(){
		$('.spinal_persent1').val('');
		$('.spinal_ml1').val('');
		s_mg = $('.spinal_mg1').val();
	});

	$(".spinal_ml2").keyup(function(){
		var persent = $('.spinal_persent2').val();
		var ml = $('.spinal_ml2').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg1);
		$('.spinal_mg2').val(mg);
	});
	$(".spinal_persent2").keyup(function(){
		var persent = $('.spinal_persent2').val();
		var ml = $('.spinal_ml2').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg1);
		$('.spinal_mg2').val(mg);
	});

	$('.spinal_mg2').keyup(function(){
		$('.spinal_persent2').val('');
		$('.spinal_ml2').val('');
		s_mg1 = $('.spinal_mg2').val();
	});

	$(".spinal_ml3").keyup(function(){
		var persent = $('.spinal_persent3').val();
		var ml = $('.spinal_ml3').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg2);
		$('.spinal_mg3').val(mg);
	});
	$(".spinal_persent3").keyup(function(){
		var persent = $('.spinal_persent3').val();
		var ml = $('.spinal_ml3').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg2);
		$('.spinal_mg3').val(mg);
	});
	$('.spinal_mg3').keyup(function(){
		$('.spinal_persent3').val('');
		$('.spinal_ml3').val('');
		s_mg2 = $('.spinal_mg3').val();
	});

	$(".spinal_ml4").keyup(function(){
		var persent = $('.spinal_persent4').val();
		var ml = $('.spinal_ml4').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg3);
		$('.spinal_mg4').val(mg);
	});
	$(".spinal_persent4").keyup(function(){
		var persent = $('.spinal_persent4').val();
		var ml = $('.spinal_ml4').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg3);
		$('.spinal_mg4').val(mg);
	});
	$('.spinal_mg4').keyup(function(){
		$('.spinal_persent4').val('');
		$('.spinal_ml4').val('');
		s_mg3 = $('.spinal_mg4').val();
	});

	$(".spinal_ml5").keyup(function(){
		var persent = $('.spinal_persent5').val();
		var ml = $('.spinal_ml5').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg4);
		$('.spinal_mg5').val(mg);
	});
	$(".spinal_persent5").keyup(function(){
		var persent = $('.spinal_persent5').val();
		var ml = $('.spinal_ml5').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg4);
		$('.spinal_mg5').val(mg);
	});
	$('.spinal_mg5').keyup(function(){
		$('.spinal_persent5').val('');
		$('.spinal_ml5').val('');
		s_mg4 = $('.spinal_mg5').val();
	});

	$(".spinal_ml6").keyup(function(){
		var persent = $('.spinal_persent6').val();
		var ml = $('.spinal_ml6').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg5);
		$('.spinal_mg6').val(mg);
	});
	$(".spinal_persent6").keyup(function(){
		var persent = $('.spinal_persent6').val();
		var ml = $('.spinal_ml6').val();
		var div = persent;
		var multi = ml*10;
		var mg = (div*multi) + parseInt(s_mg5);
		$('.spinal_mg6').val(mg);
	});
	$('.spinal_mg6').keyup(function(){
		$('.spinal_persent6').val('');
		$('.spinal_ml6').val('');
		s_mg5 = $('.spinal_mg6').val();
	});
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
				lor_sal = $('#epidural_lor_air').val();
			}
			if(yy){
				air = $('#epidural_lor_saline').val();
			}
			if(zz){
				hang = $('#epidural_hang_drop').val();
			}
		
			var formData = new FormData(this);
			formData.append('lor_saline',lor_sal);
			formData.append('lor_air',air);
			formData.append('hanging_drop',hang);			
			formData.append('final',final);			

			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("combinedSpinalEpidural/add_combined_procedure")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);

						$('#combined_spinal_epidural_block')[0].reset();
						window.location = '<?php echo base_url("combinedSpinalView")?>?id='+response.msg;					
					}
					else{
						toastr["error"](response.message);						
					}
				}
			});
		});
	});
</script>


<?php
    echo view('includes/footer');    

?>