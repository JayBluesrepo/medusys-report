<?php
    echo view('includes/header-labour',$patient, $pre, $precheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

<!--  <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script> -->

<section class="pre-op-details"><br>
    <div class="row">
        <div class="col-sm-7"></div>
        <div class="col-sm-5" style="text-align:end;">
            <button type="button" class="btn-edit" id="edit" data-toggle="modal">Edit</button>
            <!-- <button type="button" class="btn-delete">Delete</button> -->
        </div>
    </div><!--row-->
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="pre-op-head"><b>Speciality</b></th>
                        <th id="pre-op-head"><b>Operation/Procedure Category</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['speciality']; ?></td>
                        <td><?php echo $info['operation_cate']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
               			<th id="pre-op-head"><b>ASA</b></th>
                        <th id="pre-op-head"><b>Gravida/Parity</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['asa']; ?></td>
                        <td><?php echo $info['gravida']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
    <h5><b>Co-morbid Conditions</b></h5>
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Diabetes Mellitus</td>
                        <td><?php echo $info['diabetes_mellitus']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">CVS disease</td>
                        <td><?php echo $info['cvs_disease']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Respiratory disease</td>
                        <td><?php echo $info['respiratory_disease']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Neurological disorders</td>
                        <td><?php echo $info['neurological_disorder']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Renal Disorders</td>
                        <td><?php echo $info['renal_disorder']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Spine/back deformities</td>
                        <td><?php echo $info['spin_back_problem']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Fever/Infection</td>
                        <td><?php echo $info['fever_infection']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Bleeding disorder</td>
                        <td><?php echo $info['bleeding_disorder']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Anaemia</td>
                        <td><?php echo $info['anaemia']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Malignancy</td>
                        <td><?php echo $info['malignancy']; ?></td>
                    </tr>                 
					<?php 
						$othea = $info['other'];
						$othea1 = explode(",",$othea);
						if($othea == ''){
					?>
						<tr>
							<td class="bg-pat2">Other</td>
							<td>No</td>
						</tr>
					<?php 
						}else{
							foreach($othea1 as $key=>$val){					
					?>
						<tr>
							<td class="bg-pat2">Other - Yes</td>
							<td><?php echo $val; ?></td>
						</tr>
					<?php }} ?>
                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
    <h5 class="pt-3"><b>Obstetric Conditions</b></h5>
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Gestational diabetes</td>
                        <td><?php echo $info['gestational_diabetes']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">PIH, pre-eclampsia</td>
                        <td><?php echo $info['pih']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Eclampsia</td>
                        <td><?php echo $info['eclampsia']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Previous LSCS</td>
                        <td><?php echo $info['lscs']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Placental abnormalities</td>
                        <td><?php echo $info['placental']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Premature rupture of membranes</td>
                        <td><?php echo $info['premature']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Previous failed epidural</td>
                        <td><?php echo $info['previous']; ?></td>
                    </tr>
					<?php 
						$oth = $info['obstetric_other'];
						$oth1 = explode(",",$oth);
						if($oth == ''){
					?>
						<tr>
							<td class="bg-pat2">Other</td>
							<td>No</td>
						</tr>
					<?php 
						}else{
							foreach($oth1 as $key=>$val){					
					?>
						<tr>
							<td class="bg-pat2">Other - Yes</td>
							<td><?php echo $val; ?></td>
						</tr>
					<?php }} ?>
                    
                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
    <h5 class="pt-3"><b>Foetal Conditions</b></h5>
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Malposition</td>
                        <td><?php echo $info['malposition']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">IUGR</td>
                        <td><?php echo $info['lugr']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Large for gestational age(includes macrosomia)</td>
                        <td><?php echo $info['large_gestational']; ?></td>
                    </tr>
                  
					<?php 
						$othe = $info['foetal_other'];
						$othe1 = explode(",",$othe);
						if($othe == ''){
					?>
						<tr>
							<td class="bg-pat2">Other</td>
							<td>No</td>
						</tr>
					<?php 
						}else{
							foreach($othe1 as $key=>$val){					
					?>
						<tr>
							<td class="bg-pat2">Other - Yes</td>
							<td><?php echo $val; ?></td>
						</tr>
					<?php }} ?>
                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id=""><b>Gestational Age/Term</b></th>
                        <th id=""><b>Cervical Dilation</b></th>
                        <th id=""><b>Onset of Labour</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['gestational_age']; ?></td>
                        <td><?php echo $info['cervical']; ?></td>
                        <td><?php echo $info['onset_labour']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
    <h5><b>Type of Labour Analgesia:</b></h5>
	<label class="pt-2"><b>Pharmacological</b></label>
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Nitrous oxide (Entonox)</td>
                        <td><?php echo $info['entonox']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Opioids and atypical opioids </td>
                        <td><?php echo $info['atypical']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Peripheral Nerve Block (PNB)</td>
                        <td><?php echo $info['pnb']; ?></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2">Central Neuraxial Block</td>
                        <td><?php echo $info['cnb']; ?></td>
                    </tr>
                   

					<?php 
						$pharmacological_array = explode(",",$info['pharmacological_other']);
						if($pharmacological_array[0] == 'Yes'){
					?>	
					<tr>
						<td class="bg-pat2">Other</td>
						<!-- <td>Yes</td> -->
					</tr>
					<?php foreach($pharmacological_array as $key=>$val){ ?>
						<tr>
							<td class="bg-pat2"></td>
							<td><?php echo $val ?></td>
						</tr>
					<?php }}else{ ?>	

						<tr>
							<td class="bg-pat2">Other</td>
							<td>No</td>
						</tr>

					<?php } ?>
                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
    <label class="pt-2"><b>Non-Pharmacological</b></label>
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Hypnosis/Biofeedback</td>
                        <td><?php echo $info['bio_feedback']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Acupuncture/Acupressure</td>
                        <td><?php echo $info['acupressure']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">TENS</td>
                        <td><?php echo $info['tens']; ?></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2">Relaxation Techniques</td>
                        <td><?php echo $info['relaxation']; ?></td>
                    </tr>


					<?php 
						$non_pharma_other_array = explode(",",$info['non_pharma_other']);
						if($non_pharma_other_array[0] == 'Yes'){
					?>	
					<tr>
						<td class="bg-pat2">Other</td>
						<!-- <td>Yes</td> -->
					</tr>
					<?php foreach($non_pharma_other_array as $key=>$val){ ?>
						<tr>
							<td class="bg-pat2"></td>
							<td><?php echo $val ?></td>
						</tr>
					<?php }}else{ ?>	

						<tr>
							<td class="bg-pat2">Other</td>
							<td>No</td>
						</tr>

					<?php } ?>

                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
    
    <h5 class="pt-3"><b>Clinical Standards</b></h5>
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Basic Monitoring (ECG, BP or Pulse Oximetry)</td>
                        <td><?php echo $info['basic_monitering']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Resuscitation Equipment Available</td>
                        <td><?php echo $info['resuscitation_eq']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Lipid Rescue Available</td>
                        <td><?php echo $info['lipid_rescue']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Time Out / Correct Side Check Done</td>
                        <td><?php echo $info['timeout']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Consent Taken</td>
                        <td><?php echo $info['consent_taken']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
</section><!--pre-op-details-->
<section class="edit-preop">
    <div class="modal fade" id="myModal3">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
        
        <!-- Modal Header -->
                <div class="modal-header" id="add-header">
                    <h4 class="modal-title">Edit Pre-procedure</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
        <!-- Modal body -->
                <div class="modal-body">
                	<form id="edit-preop">
					<input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" required>
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
									<select class="form-control" id="asa" name="asa" onchange="checkasa()">
										<option value="" >Select</option>
										<option>ASA 1</option>
										<option>ASA 2</option>
										<option>ASA 3</option>
										<option>ASA 4</option>
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
									<select class="form-control" name="gravida_parity" id="gravida_parity" onchange="gra_par()">
										<option value="" >Select</option>
										<option>Nulliparous</option>
										<option>Multiparous</option>
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
													<input type="checkbox" class="switch_1" id="Mellitus" value="Yes" name="Mellitus">
												</div>
											</div>
										</li>
										<li>
											<div class="togle">
												<label>CVS disease</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="CVS">
													<input type="checkbox" class="switch_1" id="CVS" value="Yes" name="CVS">
												</div>
											</div>
										</li>
										<li>
											<div class="togle">
												<label>Respiratory disease</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Respi">
													<input type="checkbox" class="switch_1" id="Respi" value="Yes" name="Respi">
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
													<input type="checkbox" class="switch_1" id="Neuro" value="Yes" name="Neuro">
												</div>
											</div>
										</li>
										<li>
											<div class="togle">
												<label>Renal Disorders</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Renal">
													<input type="checkbox" class="switch_1" id="Renal" value="Yes" name="Renal">
												</div>
											</div>
										</li>
										<li>
											<div class="togle">
												<label id="">Spine/back deformities</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Spine">
													<input type="checkbox" class="switch_1" id="Spine" value="Yes" name="Spine">
												</div>
											</div>
										</li>
									</ul><!------------->
									<ul>	
										<li>
											<div class="togle">
												<label>Fever / Infection</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Fever">
													<input type="checkbox" class="switch_1" id="Fever" value="Yes" name="Fever">
												</div>
											</div>
										</li>
										<li>
											<div class="togle">
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
													<input type="checkbox" class="switch_1" id="Bleed" value="Yes" name="Bleed">
												</div>
											</div>
										</li>
										<li>
											<div class="togle">
												<label>Anaemia</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Anaemia">
													<input type="checkbox" class="switch_1" id="Anaemia" value="Yes" name="Anaemia">
												</div>
											</div>
										</li>
									</ul><!-------------------->
									<ul class="mb-0">
										<li>
											<div class="togle">
												<label>Malignancy</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Malignancy">
													<input type="checkbox" class="switch_1" id="Malignancy" value="Yes" name="Malignancy">
												</div>
											</div>
										</li>
										<li>
                                            <label style="display:flex;">Other
                                             <div class= "box_1 ml-3">
                                                <input type="checkbox" class="switch_1 other_field"value="Yes" onclick="other_field()" checked>   
                                            </div>     
                                            </label>
                                            <?php
                                            $co_morbid_array = array();
                            $co_morbid_array =  explode(",",$info['other']);
                            if(count($co_morbid_array) > 0)
                                 {

                                       ?>

                                        
                                        <?php
                                        ?>
                                        <li id="proced-plus" class="other-li other_input">
                                            <?php
                                            $x = 0;
                                            for($x = 0; $x < 3; $x++){
                                            ?>

                                        <div class="row mt-2">
                                            <div class="col-sm-12" id="proced-plus" style="display:flex;">
                                            <input type="text" class="clean" name="other[]" style="border-radius: 20px;" value = "<?php echo $co_morbid_array[$x]; ?>" >
                                            </div>
                                        </div>


											 <?php
                                        }
                                    ?>
                                    </li>
                                    <?php
                                    }
                                    ?>
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
                                                <label>Gestational diabetes</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="gestational_diabetes">
                                                    <input type="checkbox" class="switch_1" value="Yes" id="gestational_diabetes" name="gestational_diabetes">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>PIH, pre-eclampsia</label>
                                                <div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="pih">
													<input type="checkbox" class="switch_1" value="Yes" id="pih" name="pih">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>Eclampsia</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="eclampsia">
                                                    <input type="checkbox" class="switch_1" value="Yes" id='eclampsia' name="eclampsia">
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
                                                    <input type="checkbox" class="switch_1" id="lscs" value="Yes" name="lscs">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>Placental abnormalities</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="placental_abnormalities">
                                                    <input type="checkbox" class="switch_1" id="placental_abnormalities" value="Yes" name="placental_abnormalities">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>Premature rupture of membranes</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="premature_rupture">
                                                    <input type="checkbox" class="switch_1" id="premature_rupture" value="Yes" name="premature_rupture">
                                                </div>
                                            </div>
                                        </li>
                                    </ul><!----------------->
                                    <ul>    
                                        <li>
                                            <div class="togle">
                                                <label>Previous failed epidural</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="previous_failed">
                                                    <input type="checkbox" class="switch_1" id="previous_failed" value="Yes" name="previous_failed">
                                                </div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            
                                           <label style="display:flex;">Other
                                            <div class= "box_1 ml-3">
                                                <input type="checkbox" class="switch_1 obstetric_other_field"value="Yes" onclick="obstetric_field()" checked>
                                                
                                            </div> 
                                           </label> 
                                          
                                        <!-- <input type="hidden" class="switch_1" value="No" > -->
                                         
                            <?php $obstetric = array();
                            $obstetric_array =  explode(",",$info['obstetric_other']);
                            if(count($obstetric_array) > 0)
                            {
                                       ?>
                                        
                                       <li id="proced-plus" class="other-li obstetric_other_field_box">
                                        <?php
                                            $x = 0;
                                            for($x = 0; $x < 3 ; $x++){
                                            ?>
                                        <div class="row mt-2">
                                            <div class="col-sm-12" id="proced-plus" style="display:flex;">
                                            <input type="text"  name="obstetric_other[]" class="obstetric_other_input" value = "<?php echo $obstetric_array[$x]; ?>"
                                            style="border-radius: 20px;" >
                                        </div>
                                    </div>

                                        <?php
                                        }
                                    ?>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                            
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
                                                    <input type="checkbox" class="switch_1" id="malposition" value="Yes" name="malposition">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>IUGR</label>
                                                <div class="box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="iugr">
                                                    <input type="checkbox" class="switch_1" id="iugr" value="Yes" name="iugr">
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
                                                    <input type="checkbox" class="switch_1" id="large_gestational" value="Yes" name="large_gestational">
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul>    
                                        <li>
                                            <div class="togle">
                                                <label style="display:flex;">Other
                                                <div class= "box_1 ml-3">
                                                    <input type="checkbox" class="switch_1 foetal_other_chick" value="Yes" onclick="foetal_other_field()" checked>
                                                </div>    
                                                </label>

                                                <?php $obstetric = array();
                            $foetal_other_array =  explode(",",$info['foetal_other']);
                            if(count($foetal_other_array) > 0)
                            {
                                ?>
                                     
                                            <li id="proced-plus" class="other-li foetal_other_box">
                                            <?php
                                            $x = 0;
                                            for($x = 0; $x < 3 ; $x++){
                                            ?> 


                                                <div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text"  name="foetal_other[]" class="foetal_other_input" value = "<?php echo $foetal_other_array[$x]; ?>" style="border-radius: 20px;" >
                                                </div>
                                            </div>

                                            
                                        <?php
                                        }
                                    ?>
                                    </li>
                                    <?php
                                    }
                                    ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--row-->
						<div class="row">
							<div class="col-sm-2"><label>Gestational Age/Term<span class="mandat"></span></label></div>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" id="gestational_age" name="gestational_age">
										<option value="" >Select</option>
										<option>Pre-Term</option>
										<option>Term</option>
										<option>Post-Term</option>
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
									<select class="form-control" id="cervical" name="cervical">
										<option value="" >Select</option>
										<option>< 3cm</option>
										<option>3-7cm</option>
										<option>> 7cm</option>
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
									<select class="form-control" id="onset_labour" name="onset_labour">
										<option value="" >Select</option>
										<option>Spontaneous</option>
										<option>Induced</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6"></div>
						</div><!--row-->
						<div class="row p-3">
							<div class="col-sm-2"><label>Type of Labour Analgesia:</label></div>
							<div class="col-sm-4">
								<label>Pharmacological:</label>
								<div class="form-check">
								  <label class="form-check-label">
								  	<input type="hidden" class="form-check-input" value="No" name="entonox">
					    			<input type="checkbox" class="form-check-input" id="entonox" value="Yes" name="entonox">Nitrous oxide (Entonox)
								  </label>
								</div><!---->
								<div class="form-check">
								  	<label class="form-check-label">
								  		<input type="hidden" class="form-check-input" value="No" name="atypical">
					    				<input type="checkbox" class="form-check-input" id="atypical" value="Yes" name="atypical">Opioids and atypical opioids
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
					    				<input type="checkbox" class="form-check-input" id="pnb" value="Yes" name="pnb">Peripheral Nerve Block (PNB)
								  </label>
								</div><!---->
								<div class="form-check">
								  <label class="form-check-label">
								  	<input type="hidden" class="form-check-input" value="No" name="cnb">
					    			<input type="checkbox" class="form-check-input" id="cnb" value="Yes" name="cnb">Central Neuraxial Block
								  </label>
								</div><!---->
								<div class="form-check">
									<label class="form-check-label">
										<input type="hidden" class="form-check-input" value="No" name="pharma_other">
										<input type="checkbox" class="form-check-input pharma_other" value="Yes" name="pharma_other">Other
									</label>
								</div><!---->
								<div class="pharma_other_box" style="display:none;">
									<label class="form-check-label">						
										<input type="text" id="pharma_other_input1" name="pharma_other_input[]" style="border-radius:20px; margin: 10px 0 0 25px;">
									</label>
                                    <label class="form-check-label">                        
                                        <input type="text" id="pharma_other_input2" name="pharma_other_input[]" style="border-radius:20px; margin: 10px 0 0 25px;">
                                    </label>
                                    <label class="form-check-label">                        
                                        <input type="text" id="pharma_other_input3" name="pharma_other_input[]" style="border-radius:20px; margin: 10px 0 0 25px;">
                                    </label>
								</div><!---->
							</div>
							<div class="col-sm-4">
								<label>Non-Pharmacological:</label>
								<div class="form-check">
								  <label class="form-check-label">
								  		<input type="hidden" class="form-check-input" value="No" name="biofeed">
					    				<input type="checkbox" class="form-check-input" id="biofeed" value="Yes" name="biofeed">Hypnosis/Biofeedback
								  </label>
								</div><!---->
								<div class="form-check">
								  <label class="form-check-label">
								  	<input type="hidden" class="form-check-input" value="No" name="acupressure">
					    			<input type="checkbox" class="form-check-input" value="Yes" id="acupressure" name="acupressure">Acupuncture/Acupressure
								  </label>
								</div><!---->
								<div class="form-check">
								  <label class="form-check-label">
								  	<input type="hidden" class="form-check-input" value="No" name="tens">
					    			<input type="checkbox" class="form-check-input" id="tens" value="Yes" name="tens">TENS
								  </label>
								</div><!---->
								<div class="form-check">
								  <label class="form-check-label">
								  	<input type="hidden" class="form-check-input" value="No" name="relaxation">
					    			<input type="checkbox" class="form-check-input" id="relaxation" value="Yes" name="relaxation">Relaxation Techniques
								  </label>
								</div><!---->
								<div class="form-check">
									<label class="form-check-label">
										<input type="hidden" class="form-check-input" value="No" name="non_pharma_other">
										<input type="checkbox" class="form-check-input non_pharma_other" value="Yes" name="non_pharma_other">Other
									</label>
								</div><!---->
								<div class="non_pharma_other_box" style="display:none;">
									<label class="form-check-label">						
										<input type="text" id="non_pharma_other_input1" name="non_pharma_other_input[]" style="border-radius:20px; margin: 10px 0 0 25px;">
									</label>
                                    <label class="form-check-label">                        
                                        <input type="text" id="non_pharma_other_input2" name="non_pharma_other_input[]" style="border-radius:20px; margin: 10px 0 0 25px;">
                                    </label>
                                    <label class="form-check-label">                        
                                        <input type="text" id="non_pharma_other_input3" name="non_pharma_other_input[]" style="border-radius:20px; margin: 10px 0 0 25px;">
                                    </label>
								</div><!---->
							</div>
							<div class="col-sm-2"></div>
						</div><!--row-->
						<div class="row pt">
							<div class="col-sm-2"><label>Clinical Standards</label></div>
							<div class="col-sm-8">
								<div class="t-switch">
									<ul>
										<li style="width:50%;">
											<div class="togle">
												<label>Basic Monitoring (ECG, BP or Pulse Oximetry)</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Monitoring">
													<input type="checkbox" class="switch_1" value="Yes" id="Monitoring" name="Monitoring">
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
													<input type="checkbox" class="switch_1" value="Yes" id="Resusci" name="Resusci">
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
													<input type="checkbox" class="switch_1" value="Yes" id="Lipid" name="Lipid">
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
													<input type="checkbox" class="switch_1" value="Yes" id="Timeout" name="Timeout">
												</div>
											</div>
										</li>
									</ul>
									<ul class="mb-0">
										<li style="width:50%;">
											<div class="togle">
												<label style="">Consent Taken</label>
												<div class="box_1">
													<input type="hidden" class="switch_1" value="No" name="Consent">
													<input type="checkbox" class="switch_1" value="Yes" id="Consent" name="Consent">
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-sm-2"></div>
						</div><!--row-->
						<div class="row">
							<div class="col-sm-7"></div>
							<div class="col-sm-5">
								<button type="submit" class="btn-save update">Update</button>
								<button type="button" class="btn-close" id="cls">Close</button>
							</div>
						</div><!--row-->
					</form>
                </div><!--modal-body-->
            </div>
        </div>
    </div>
</section>

<script>
	function checkasa(){
		var asa1 = $('#asa').val();
		if(asa1 != ''){
			$('.asa_error').hide();
		}
	}

	function gra_par(){
		var asa1 = $('#gravida_parity').val();
		if(asa1 != ''){
			$('.gravida_parity_error').hide();
		}
	}
</script>

<script>

	$('.pharma_other').click(function(){
		var other =$('.pharma_other').is(':checked');		
		if(!other){			
			$(".pharma_other_box").hide();
			$('#pharma_other_input1').val('');
            $('#pharma_other_input2').val('');
            $('#pharma_other_input3').val('');
		}
		else{
			$('.pharma_other_box').show();
		}
	});

	
	$('.non_pharma_other').click(function(){
		var other =$('.non_pharma_other').is(':checked');		
		if(!other){			
			$(".non_pharma_other_box").hide();
			$('#non_pharma_other_input1').val('');
            $('#non_pharma_other_input2').val('');
            $('#non_pharma_other_input3').val('');
		}
		else{
			$('.non_pharma_other_box').show();
		}
	});

    var w1 = "<?php echo $info['gravida']; ?>";
    $('#gravida_parity').val(w1);

	var new_entry1 = "<?php echo $info['gestational_diabetes']; ?>";
	var new_entry2 = "<?php echo $info['pih']; ?>";
	var new_entry3 = "<?php echo $info['eclampsia']; ?>";
	var new_entry4 = "<?php echo $info['lscs']; ?>";
	var new_entry5 = "<?php echo $info['placental']; ?>";
	var new_entry6 = "<?php echo $info['premature']; ?>";
	var new_entry7 = "<?php echo $info['previous']; ?>";	
	var new_entry8 = "<?php echo $info['malposition']; ?>";
	var new_entry9 = "<?php echo $info['lugr']; ?>";
	var new_entry10 = "<?php echo $info['large_gestational']; ?>";	


    if(new_entry1=="Yes"){
        $('#gestational_diabetes').attr("checked",true);
    }
	if(new_entry2=="Yes"){
        $('#pih').attr("checked",true);
    }
	if(new_entry3=="Yes"){
        $('#eclampsia').attr("checked",true);
    }
	if(new_entry4=="Yes"){
        $('#lscs').attr("checked",true);
    }
	if(new_entry5=="Yes"){
        $('#placental_abnormalities').attr("checked",true);
    }
	if(new_entry6=="Yes"){
        $('#premature_rupture').attr("checked",true);
    }
	if(new_entry7=="Yes"){
        $('#previous_failed').attr("checked",true);
    }
	if(new_entry8=="Yes"){
        $('#malposition').attr("checked",true);
    }
	if(new_entry9=="Yes"){
        $('#iugr').attr("checked",true);
    }
	if(new_entry10=="Yes"){
        $('#large_gestational').attr("checked",true);
    }

	var w2 = "<?php echo $info['gestational_age']; ?>";
	var w3 = "<?php echo $info['cervical']; ?>";
	var w4 = "<?php echo $info['onset_labour']; ?>";

    $('#gestational_age').val(w2);
    $('#cervical').val(w3);
    $('#onset_labour').val(w4);

	var new_2entry1 = "<?php echo $info['entonox']; ?>";
	var new_2entry2 = "<?php echo $info['atypical']; ?>";
	var new_2entry3 = "<?php echo $info['pnb']; ?>";
	var new_2entry4 = "<?php echo $info['cnb']; ?>";
	var new_2entry5 = "<?php echo $info['pharmacological_other']; ?>";
	var split_new1 = new_2entry5.split(',');  
	
	if(new_2entry1=="Yes"){
        $('#entonox').attr("checked",true);
    }
	if(new_2entry2=="Yes"){
        $('#atypical').attr("checked",true);
    }
	if(new_2entry3=="Yes"){
        $('#pnb').attr("checked",true);
    }
	if(new_2entry4=="Yes"){
        $('#cnb').attr("checked",true);
    }
	if(split_new1[0]=="Yes"){
        $('.pharma_other').attr("checked",true);
        $('#pharma_other_input1').val(split_new1[1]);
		$('#pharma_other_input2').val(split_new1[2]);
        $('#pharma_other_input3').val(split_new1[3]);
		$('.pharma_other_box').show();
    }


	var new_2entry6 = "<?php echo $info['bio_feedback']; ?>";
	var new_2entry7 = "<?php echo $info['acupressure']; ?>";
	var new_2entry8 = "<?php echo $info['tens']; ?>";
	var new_2entry9 = "<?php echo $info['relaxation']; ?>";
	var new_2entry10 = "<?php echo $info['non_pharma_other']; ?>";
	var split_new2 = new_2entry10.split(',');  

	// alert(split_new2[0]);
	if(new_2entry6=="Yes"){
        $('#biofeed').attr("checked",true);
    }
	if(new_2entry7=="Yes"){
        $('#acupressure').attr("checked",true);
    }
	if(new_2entry8=="Yes"){
        $('#tens').attr("checked",true);
    }
	if(new_2entry9=="Yes"){
        $('#relaxation').attr("checked",true);
    }
	if(split_new2[0]=="Yes"){ 
        $('.non_pharma_other').attr("checked",true);
		$('#non_pharma_other_input1').val(split_new2[1]);
        $('#non_pharma_other_input2').val(split_new2[2]);
        $('#non_pharma_other_input3').val(split_new2[3]);
		$('.non_pharma_other_box').show();
    }




</script>
<script type="text/javascript">
	$('#xyz').val("<?php echo $info['surgery']; ?>");

	// $('#clear').hide();
	function clean(){

		
		$('#xyz').val('');
		$('#xyz').hide();
		$('#surgery_option_input').val('');
		$('#clear').hide();
	}
	function checksur(){
		
		var sur = $('#surgery_option_input').val();
		$('#xyz').val(sur);
		$('#xyz').show();
		$('#clear').show();		
	}

// $(document).ready(function(){
	$('#edit-preop').submit(function(e){
		e.preventDefault();
		var aa = '',dd = '', ee = '', cc = '';
		var spl = $('#speciality').val();
		var asa = $('#asa').val();	
		var gravida_parity = $('#gravida_parity').val();		


		if((asa != ''))
			ee = true;
		else{
			$('.asa_error').show();
			toastr.error('Please Select ASA');
		}

		if(gravida_parity != ''){
			cc = true;
		}else{
			$('.gravida_parity_error').show();
			toastr.error('Please Select Gravida/Parity Option');
		}
		
		if(spl != '')
			aa = true;
		else{
			$('.spl').show();
			toastr.error('please select speciality');
		}
		
		if(!document.getElementById('option-1').checked && !document.getElementById('option-2').checked){ 
			$('.opc').show();
			toastr.error('please enter operation/procedure category'); 
		}
		else
			dd = true;
	
		if((aa) && (dd) && ee && cc){
			var formData = new FormData(this);
			$(".update").text("Updating...");
			$(".update").attr("disabled", true);
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("edit-pre-procedure")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);
						$("#myModal3").modal("hide");
						$('.update').removeAttr("disabled");
						$(".update").text("Save");
						history.go(0); 
					}
					else{
						toastr["error"](response.message);
						$('.update').removeAttr("disabled");
						$(".update").text("Update");
					}
				}
			});
		}
	});
// });
</script>
<script>
    var w = "<?php echo $info['speciality']; ?>";
    $('#speciality').val(w);
  
    var y = "<?php echo $info['asa']; ?>";
    $('#asa').val(y);
  

    var v = "<?php echo $info['operation_cate']; ?>";
    if(v=="Emergency"){
        $('#option-1')[0].checked = true;
    }else{
        $('#option-2')[0].checked = true;
    }

    var a = "<?php echo $info['minimally_invasive']; ?>";
	var b = "<?php echo $info['diabetes_mellitus']; ?>";
	var c = "<?php echo $info['cvs_disease']; ?>";
	var d = "<?php echo $info['respiratory_disease']; ?>";
	var e = "<?php echo $info['neurological_disorder']; ?>";
	var f = "<?php echo $info['renal_disorder']; ?>";
	var g = "<?php echo $info['spin_back_problem']; ?>";
	var h = "<?php echo $info['fever_infection']; ?>";
	var i = "<?php echo $info['bleeding_disorder']; ?>";
	var j = "<?php echo $info['anaemia']; ?>";
	var k = "<?php echo $info['malignancy']; ?>";

	var l = "<?php echo $info['basic_monitering']; ?>";
	var m = "<?php echo $info['resuscitation_eq']; ?>";
	var n = "<?php echo $info['lipid_rescue']; ?>";
	var o = "<?php echo $info['timeout']; ?>";
	var p = "<?php echo $info['consent_taken']; ?>";

    if(a=="Yes"){
        $('#min_invas').attr("checked",true);
    }
	if(b=="Yes"){
        $('#Mellitus').attr("checked",true);
    }
	if(c=="Yes"){
        $('#CVS').attr("checked",true);
    }
	if(d=="Yes"){
        $('#Respi').attr("checked",true);
    }
	if(e=="Yes"){
        $('#Neuro').attr("checked",true);
    }
	if(f=="Yes"){
        $('#Renal').attr("checked",true);
    }
	if(g=="Yes"){
        $('#Spine').attr("checked",true);
    }
	if(h=="Yes"){
        $('#Fever').attr("checked",true);
    }
	if(i=="Yes"){
        $('#Bleed').attr("checked",true);
    }
	if(j=="Yes"){
        $('#Anaemia').attr("checked",true);
    }
	if(k=="Yes"){
        $('#Malignancy').attr("checked",true);
    }
	if(l=="Yes"){
        $('#Monitoring').attr("checked",true);
    }
	if(m=="Yes"){
        $('#Resusci').attr("checked",true);
    }
	if(n=="Yes"){
        $('#Lipid').attr("checked",true);
    }
	if(o=="Yes"){
        $('#Timeout').attr("checked",true);
    }
	if(p=="Yes"){
        $('#Consent').attr("checked",true);
    }
	$('#cls').click(function(){
        $("#myModal3").modal("hide");
    });
    $('#edit').click(function(){
        $("#myModal3").modal("show");
    });
	

	
	
	$("input[name='optradio']").change(function(){
		$('.opc').hide();
	});
</script>
<script type="text/javascript">
        
    function obstetric_field(){
        var obstetric_other_field = $('.obstetric_other_field').is(':checked'); 
        if(obstetric_other_field == true){
            $('.obstetric_other_field_box').show();
        }
        else{
            $('.obstetric_other_field_box').hide();
            $('.obstetric_other_input').val('');
            
            
        }
    }

    function other_field(){
        var other_field = $('.other_field').is(':checked'); 
        if(other_field == true){
            $('.other_input').show();
        }else{
            $('.other_input').hide();
            $('.clean').val('');
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
</script>
<?php
    echo view('includes/footer-labour');    
?>