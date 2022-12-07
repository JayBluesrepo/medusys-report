<?php
    echo view('includes/header-obstetric',$patient, $pre, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
 <!--  <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script> -->
<!-----------------------------------------ADD PRE-OP START------------------------->
<div role="tabpanel" class="tab-pane" id="profile">
	<section class="add-preop" id="pre-pro">
		<form id="add-preop">
			<h3>Add Pre-Op</h3>
			<div class="row">
				<div class="col-sm-2"><label>Speciality<span class="mandat">*</span></label></div>
				<div class="col-sm-6">
					<div class="form-group">
						<select class="form-control" id="speciality" name="speciality" onchange="checkspl()">
							<option value="">Select</option>
							<option>Obstetrics</option>
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
						<input type="text" class="form-control mt-3 speciality_other" name="speciality_other" style="display:none;">
						<small class="spl" style="color:red; display:none;">Please enter speciality</small>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Surgery List<span class="mandat">*</span></label></div>
				<div class="col-sm-6">
					<div class="form-group">
						<select class="form-control" id="surgery_list" name="surgery_list" onchange="surgery()">
							<option value="">Select</option>
							<option>Lower Segment Caesarean Section (LSCS)</option>
							<option>Manual Removal of Placenta</option>
							<option>Insertion/Removal of Cervical Stitch</option>
							<option>Intra-uterine procedure on Foetus</option>
							<option>Management of Haemorrhage</option>
							<option>Other</option>
						</select>
						<small class="spl101" style="color:red; display:none;">Please enter surgery list</small>
					</div>
					<div class="category_lscs" style="display:none;">
						<label>Category of LSCS</label>
						<div class="form-group">
							<select class="form-control" name="category_lscs">
								<option value="">Select</option>
								<option><b>Category 1</b>: Urgent threat to the life or the health of a woman or fetus.</option>
								<option><b>Category 2</b>: Maternal or foetal compromise but not immediately life threatening.</option>
								<option><b>Category 3</b>: Needing earlier than planned delivery but without currently evident maternal or foetal compromise.</option>
								<option><b>Category 4</b>: At a time acceptable to both the woman and the caesarean section team</option>
							</select>
						</div>
						<label>Indication options:</label>
						<div class="form-group">
							<select class="form-control" name="indication_options">
								<option value="">Select</option>
								<option>Elective repeat</option>
								<option>Non-reassuring foetal status</option>
								<option>Failed instrumental delivery</option>
								<option>Foetal malpresentation</option>
								<option>Placental abnormality</option>
								<option>Multiple pregnancy</option>
								<option>Foetal abnormality</option>
								<option>Maternal physiological condition: PET, sepsis, bleeding, obesity</option>
							</select>
						</div>
					</div>
					<ul class='row' id="surgery_list_other" style="display:none; list-style-type:none;">
					<li>
						<input type="text" class="form-control"  name="surgery_list_other[]" style=" display: inline; width:300px;">
						<button type="button" class="btn btn-circle surgery_add" ><i class="fa fa-plus" aria-hidden="true"></i></button>
					</li>
					</ul>

					<input type="text" class="form-control" id="surgery_list_other" name="surgery_list_other" style="display:none; width:300px;">
					
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
							<option value="">Select</option>
							<option>ASA 1</option>
							<option>ASA 2</option>
							<option>ASA 3</option>
							<option>ASA 4</option>
						</select>
						<small class="asa_msg" style="color:red; display:none;">Please select ASA option</small>

					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Gravida/Parity<span class="mandat">*</span></label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control gravida_parity" name="gravida_parity" onchange="gravida_parity1()">
							<option value="">Select</option>
							<option>Nulliparous</option>
							<option>Multiparous</option>
						</select>
						<small class="gravida_msg" style="color:red; display:none;">Please select Gravida/Parity option</small>
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
									<label>Neurological disorders</label>
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
									<label>Spine/back deformities</label>
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
							<li id="proced-plus" class="other-li other_input ob-preop-li" id="" style="display:none;">
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
							<li id="proced-plus" class="other-li obstetric_other_field_box ob-preop-li" style="display:none;">
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
							<li id="proced-plus" class="other-li foetal_other_box ob-preop-li" style="display:none;">
								<input type="text"  name="foetal_other[]" class="foetal_other_input" style="border-radius: 20px;" >
								<button type="button" class="btn add3" ><i class="fa fa-plus" aria-hidden="true"></i></button>
							</li>
						</ul>
					</div>
				</div>
			</div><!--row-->
			<!-- <div class="row pt">
				<div class="col-sm-2"><label>Purpose of CNB<span class="mandat">*</span></label></div>
				<div class="col-sm-4">
					<select class="form-control" id="Purpose" name="Purpose" onfocusout="checkprs()">
						<option>Select</option>
						<option>Sole/Primary Anaesthetic</option>
						<option>For Analgesia only</option>
					</select>
					<small class="prs" style="color:red; display:none;">Please enter purpose</small>
				</div>
			</div> --><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Gestational Age/Term<span class="mandat">*</span></label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control gestati" name="gestational_age" onchange="gestational_age1()">
							<option value="">Select</option>
							<option>Pre-Term</option>
							<option>Term</option>
							<option>Post-Term</option>
						</select>
						<small class="gestational_msg" style="color:red; display:none;">Please select Gestational Age/Term option</small>
					</div>
				</div>
			</div><!--row-->
			<div class="row">
				<div class="col-sm-2"><label>Anaesthesia Administered</label></div>
				<div class="col-sm-4">
					<div class="form-group">
						<select class="form-control" name="anaesthesia_administered">
							<option value="">Select</option>
							<option>CNB</option>
							<option>GA</option>
							<option>PNB alone with or without sedation</option>
						</select>
					</div>
				</div>
			</div>
			
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

<script>

	function checkspl(){
		var spl = $('#speciality').val();
		if((spl != '')){
			$('.spl').hide();
		}

		if(spl == 'Other'){
			$('.speciality_other').show();
		}else{
			$('.speciality_other').hide();
			$('.speciality_other').val('');
		}

	}

	function checkasa(){
		var asa1 = $('.asa').val();
		if(asa1 != ''){
			$('.asa_msg').hide();
		}
	}

	function gravida_parity1(){
		var gravida_parity = $('.gravida_parity').val();
		if(gravida_parity != ''){
			$('.gravida_msg').hide();
		}
	}

	function gestational_age1(){
		var gestati = $('.gestati').val();
		if(gestati != ''){
			$('.gestational_msg').hide();
		}
	}

	$(document).ready(function(){
		var i = 1, j = 1 , k=1; l = 1;
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

    	$(".surgery_add").click(function(){			
			if(l<3){
				l++;
				$("#surgery_list_other").append('<div class="row mt-2"><input type="text" class="form-control"  name="surgery_list_other[]" style=" display: inline;  width:300px;"><button type="button" class="btn btn-circle surgery_remove" ><i class="fa fa-minus" aria-hidden="true"></i></button></div>');
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
		$(document).on('click','.surgery_remove',function(){  
			l--;
			$(this).closest('.row').remove();
		});
	});
</script>

<script>

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
</script>

<script>
	
	function surgery(){
		var surgery = $('#surgery_list').val();
		if(surgery != ''){
			$('.spl101').hide();
		}

		if(surgery == 'Lower Segment Caesarean Section (LSCS)'){
			$('.category_lscs').show();
		}else{
			$('.category_lscs').hide();
		}
		if(surgery == 'Other'){
			$('#surgery_list_other').show();
		}else{
			$('#surgery_list_other').hide();
		} 
	}
</script>

<script type="text/javascript">	
	
	
	$("input[name='optradio']").change(function(){
		$('.opc').hide();
	});

	$(document).ready(function(){
		$('#add-preop').submit(function(e){
			e.preventDefault();
			var aa = '',dd = '',gg = '', hh = '', ii = '', bb = '';
			var spl = $('#speciality').val();
			var asa = $('.asa').val();
			var gravida = $('.gravida_parity').val();
			var gestati = $('.gestati').val();
			var surgery_list = $('#surgery_list').val(); 

			if(surgery_list != ''){
				bb =true;
			}else{
				$('.spl101').show();
				toastr.error('Please enter surgery list');
			}

			if(gestati != '')
				ii = true;
			else{
				$('.gestational_msg').show();
				toastr.error('Please select Gestational Age/Term option');
			}

			if(gravida != '')
				hh = true;
			else{
				$('.gravida_msg').show();
				toastr.error('Please select Gravida/Parity option');
			}

			if(asa != '')
				gg = true;
			else{
				$('.asa_msg').show();
				toastr.error('please select ASA option');
			}
			
			if(spl != '')
				aa = true;
			else{
				$('.spl').show();
				toastr.error('please select speciality');
			}
			if (!document.getElementById('option-1').checked && !document.getElementById('option-2').checked) { 
				$('.opc').show();
				toastr.error('please enter operation/procedure category'); 
			}
			else
				dd = true;
			
			if((aa) && (dd) && gg && hh && ii && bb){
				var formData = new FormData(this);
				$.ajax({
					type : "POST",
					url : '<?php  echo base_url("add-preop-obstetrics")?>',
					data : formData,
					contentType: false,
					processData: false,
					success:function(response){
						response = jQuery.parseJSON(response);
						if(response.result==1){
							toastr["success"](response.message);
							$('#add-preop')[0].reset();
							window.location = '<?php echo base_url("obstetrics/PreopDetails")?>?id='+response.msg;
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
    echo view('includes/footer-obstetric');    
?>



