<?php
    echo view('includes/header',$patient, $pre, $precheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>

<!--  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script> -->

<section class="pre-op-details"><br>
    <div class="row">
        <div class="col-sm-7"></div>
        <div class="col-sm-5" style="text-align:end;">
            <button type="button" class="btn-edit" id="edit" data-toggle="modal" >Edit</button>
            <!-- <button type="button" class="btn-delete">Delete</button> -->
        </div>
    </div><!--row-->
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="pre-op-head">Speciality</th>
                        <th id="pre-op-head">Surgery Location</th>
                        <th id="pre-op-head">Surgery</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['speciality']; ?></td>
                        <td><?php echo $info['surgery_location']; ?></td>
                        <td><?php echo $info['surgery']; ?></td>
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
                        <th id="pre-op-head">Minimally invasive</th>
                        <th id="pre-op-head">Operation/Procedure Category</th>
                        <th id="pre-op-head">ASA</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['minimally_invasive']; ?></td>
                        <td><?php echo $info['category']; ?></td>
                        <td><?php echo $info['asa']; ?></td>
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
                        <td class="bg-pat2">Spine/back problems</td>
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
                    <tr>
                        <td class="bg-pat2">Other</td>
                        <td><?php echo $info['other']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--preop-table2-->
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="">Purpose of CNB</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['purpose']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
    <h5><b>Clinical Standards</b></h5>
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
                        <td class="bg-pat2">Consent Taken/td>
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
                    <h4 class="modal-title">Edit Preop</h4>
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
									<select class="form-control" id="speciality" name="speciality">
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
							<!-- <input type="text" class="form-control" name="sur_location" id="sur_location" value="<?php echo $info['surgery_location']; ?>" list="sur_location_datalist" placeholder="--Select--"  onfocusout="checksul()"> -->
								<select class="form-control" name="sur_location" id="sur_location" value="<?php echo $info['surgery_location']; ?>" onfocusout="checksul()">		
									<option>select</option>				
									<?php
										foreach($master_type as $key=>$master){
									?>
										
										<option><?php echo $master['master_type']; ?></option>
										
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
							<div class="col-sm-6">
								<input type="text" list="surgery_option" class="form-control" id="surgery_option_input" value="<?php echo $info['surgery']; ?>" name="surgery">
									<!-- <input list="browsers" class="form-control" name="browser" id="browser" style="margin:15px 0;"> -->
								<datalist id="surgery_option">
									
								
								</datalist>
							</div>
							<div class="col-sm-4"></div>
						</div><!--row-->
						<div class="row">
							<div class="col-sm-2">
								<!-- <label>Minimally invasive<span class="mandat">*</span><a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Thoracoscopic, laparoscopic, arthroscopic with or without semi-open"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->
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
							<div class="col-sm-4" id="add-minimal">
								<div class= "box_1">
									<input type="hidden" class="switch_1" value="No" name="min_invas">
									<input type="checkbox" class="switch_1" id="min_invas" value="Yes" name="min_invas">
								</div>
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
							</div>
							<div class="col-sm-5"></div>
						</div><!--row-->
						<div class="row">
							<div class="col-sm-2"><label>ASA</label></div>
							<div class="col-sm-4">
								<div class="form-group">
									<select class="form-control" id="asa" name="asa">
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
												<label>Fever / Infection</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Fever">
													<input type="checkbox" class="switch_1" id="Fever" value="Yes" name="Fever">
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
													<input type="checkbox" class="switch_1" id="Bleed" value="Yes" name="Bleed">
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
													<input type="checkbox" class="switch_1" id="Anaemia" value="Yes" name="Anaemia">
												</div>
											</div>
										</li>
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
											<div class="togle">
												<label id="">Spine/back problems</label>
												<div class= "box_1">
													<input type="hidden" class="switch_1" value="No" name="Spine">
													<input type="checkbox" class="switch_1" id="Spine" value="Yes" name="Spine">
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
												<label>Other</label>
												<div class= "box_1">
													<input type="text"  name="other" value="<?php echo $info['other']; ?>" style="border-radius: 20px;" >
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
								<select class="form-control" id="Purpose" name="Purpose">
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
									<ul>
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
<script type="text/javascript">
// $(document).ready(function(){
	$('#edit-preop').submit(function(e){
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
		if(!document.getElementById('option-1').checked && !document.getElementById('option-2').checked){ 
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
			$(".update").text("Updating...");
			$(".update").attr("disabled", true);
			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("PreopDetails/edit_preop")?>',
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
    var x = "<?php echo $info['surgery_location']; ?>";
    $('#sur_location').val(x);
    var y = "<?php echo $info['asa']; ?>";
    $('#asa').val(y);
    var z = "<?php echo $info['purpose']; ?>";
    $('#Purpose').val(z);

    var v = "<?php echo $info['category']; ?>";
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
	function checkspl(){
		var spl = $('#speciality').val();
		if((spl != 'Select')){
			$('.spl').hide();
		}
	}
	function checksul(){
		var sul = $('#sur_location').val();
		// alert(sul);
		if((sul != '')){
			$('.sul').hide();
		}

		$.ajax({
			type : 'POST',
			url : '<?php  echo site_url("PreopDetails/search_option")?>',
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
		var sur = $('#surgery').val();
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
</script>
<?php
    echo view('includes/footer');    
?>