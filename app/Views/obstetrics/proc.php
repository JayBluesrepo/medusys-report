<?php
    echo view('includes/header-obstetric',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
	<!-------------------------------------------PROCEDURE START----------------------->
<div role="tabpanel" class="tab-pane" id="messages">
    
    

    <?php if($preo['anaesthesia_administered']  != 'GA') {?>

        <br><h4><b>Please select the procedure done on the patient to enter details.</b></h4>


        <div class="procedure-buttons">
            <div class="row">
                <a href="<?php echo base_url('obstetrics/combinedSpinalEpidural'); ?>" class="btn-procedure" id="a">Combined Spinal Epidural</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('obstetrics/Epidural'); ?>" class="btn-procedure" id="b"> Epidural</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('obstetrics/Spinal'); ?>" class="btn-procedure" id="c">Spinal</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('obstetrics/CSA_add'); ?>" class="btn-procedure" id="d">CSA - Continous Spinal Anaesthesia</a>
            </div>
        </div><!--procedure-buttons-->

    <?php }else{ ?>
        <!-- <h1>hello</h1> -->

        <div class="ga">
            <form id="ga_procedure">
                <div class="add-patient" id="">
                    
                    <h3 class="mb-4"><b>GA</b></h3>
                    <div class="row">
                        <div class="col-sm-2"><label>Procedure Date and Time<span class="mandat">*</span></label></div>
                        <div class="col-sm-4">
                            <div class="form-group">                                       
                                <div class="input-group date" id="datePicker5">
                                    <input type="text" class="form-control date_time_m" style="border-radius: 15px;" id='datetimepicker1' name="date_time_m" required>
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
                        <div class="col-sm-2"><label>GA done by<span class="mandat">*</span>
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
                            <select class="form-control cnb_done_by1 ga_done_by1" id="ga_done_by1" name="ga_done_by1" onchange="selectcnb()" required>
                                <option value="" selected="selected">Select</option>
                                <!-- <option value="Consultant">Consultant</option>
                                <option value="Trainee">Trainee</option> -->
                            </select>
                            <div class="col-sm-6">
                                <small class="cnbdone" style="color:red; display:none;">select the option</small>
                            </div>
                            <select class="form-control cnb_done_by2 ga_done_by2" id="ga_done_by2"  style="margin: 15px 0;"  name="ga_done_by2" required>
                                <option value="" selected="selected">Select</option>                            
                                <!-- <option value="Junior Consultant">Junior Consultant</option>
                                <option value="Senior Consultant">Senior Consultant</option>
                                <option value="Junior Trainee">Junior Trainee</option>
                                <option value="Senior Trianee">Senior Trianee</option>   -->
                            </select>
                        
                        </div>
                        <div class="col-sm-6">
                            <small class="cnbdone" style="color:red; display:none;">select the option</small>
                        </div>
                    </div><!--row-->
                    <div class="row">
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
                <label><b>GA:</b></label>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="ga_inhalational" name="ga_inhalational" value="Inhalational"><b>Inhalational</b>
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="ga_tiva" name="ga_tiva" value="Intravenous (TIVA)"><b>Intravenous (TIVA)</b>
                        </label>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div><!--row-->
                <div class="row pt-4">
                    <div class="col-sm-2"><label><b>Airway Management</b>
                        <div class="tooltip-22" id="tip">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <div class="right-22">
                                <div class="text-content-22">
                                    <h6>Examples include but not limited to <br><br> 1st Gen SGA: Simple breathing tube, usually with some form of mask or opening at the larynx. Examples: Classic LMA, LMA-Unique, SureSeal LM,CobraPLA. Laryngeal Tube Airway, etc. <br><br> 2nd Gen SGA: Above, plus provision for gastric drainage and improved protection against aspiration. Examples: Combitube, Proseal LMA, LMA Supreme, gel, LTS-D, AuraGain <br><br> 3rd Gen SGA (proposed): Above, plus incorporates dynamic sealing mechanism. Examples: Baska, Elisha and 3gLM</h6>
                                    <i></i>
                                </div>
                            </div>
                        </div>  
                    </label></div>
                   
                    <div class="col-sm-3">
                        <select class="form-control airway_option" name="airway_management1" style="border-radius: 15px;" onchange="airway()">
                            <option value="">Select</option>
                            <option>LMA</option>
                            <option>Endotracheal tube</option>
                        </select>
                        <!-- <small class="supervision1" style="color:red; display:none; margin-left:20px;">select the option</small> -->
                        <select class="form-control gen mt-3" name="airway_management2" style="border-radius: 15px; display:none;">
                            <option value="">Select</option>
                            <option>1st Gen</option>
                            <option>2nd Gen</option>
                            <option>3rd Gen</option>
                        </select>                        
                    </div>
                    <div class="col-sm-7"></div>
                </div><!--row-->
                <div class="row pt-5">
                    <div class="col-sm-2"><label><b>Opioids Prior to delivery </b></label></div>
                    <div class="col-sm-2">
                        <div class= "box_1">
							<input type="hidden" class="switch_1" value="No" name="opioids_delivery">
                            <input type="checkbox" class="switch_1" value="Yes" name="opioids_delivery">
                        </div>
                    </div>
                    <div class="col-sm-8"></div>
                </div><!---->
                <div class="row pt-5">
                    <div class="col-sm-2"><label><b>Intra-op Analgesia</b></label></div>
                    <div class="col-sm-4 p-0">
                        <div class="form-check" style="font-size: 16px;margin-top: 0;">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="intra_op_analgesia">
                            <b></b><input type="checkbox" class="switch_1 ml-4" name="intra_op_analgesia" id="intra_op_analgesia" value="Yes" onclick="ia_show()">
                        </label>
                    </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row" id="intra_op_analgesia_box" style="display:none;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_opioids">
                                    <input type="checkbox" class="form-check-input ia_opioids" value="Yes" name="ia_opioids"><b>Opioids</b>
                                </label>
                            </div>
                        </div>
                        <div class="row pt-3 ia_opioids_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2">
                                <label><b>Name</b></label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_opioids_name[]">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label><b>Dosage</b></label>
                            </div>
                            <div class="col-sm-4">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="ia_opioids_dose[]">
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_paracetamol">
                                    <input type="checkbox" class="form-check-input ia_paracetamol" value="Yes" name="ia_paracetamol"><b>Paracetamol</b>
                                </label>
                            </div>
                        </div>
                        <div class="row pt-3 ia_paracetamol_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2">
                                <label><b>Name</b></label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_paracetamol_name[]">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label><b>Dosage</b></label>
                            </div>
                            <div class="col-sm-4">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="ia_paracetamol_dose[]">
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_nsaids">
                                    <input type="checkbox" class="form-check-input ia_nsaids" value="Yes" name="ia_nsaids"><b>NSAIDS</b>
                                </label>
                            </div>
                        </div>
                        <div class="row pt-3 ia_nsaids_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2">
                                <label><b>Name</b></label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_nsaids_name[]">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label><b>Dosage</b></label>
                            </div>
                            <div class="col-sm-4">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="ia_nsaids_dose[]">
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_ketamine">
                                    <input type="checkbox" class="form-check-input ia_ketamine" value="Yes" name="ia_ketamine"><b>Ketamine</b>
                                </label>
                            </div>
                        </div>
                        <div class="row pt-3 ia_ketamine_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2">
                                <label><b>Name</b></label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_ketamine_name[]">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label><b>Dosage</b></label>
                            </div>
                            <div class="col-sm-4">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="ia_ketamine_dose[]">
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_tramadol">
                                    <input type="checkbox" class="form-check-input ia_tramadol" value="Yes" name="ia_tramadol"><b>Tramadol</b>
                                </label>
                            </div>
                        </div>
                        <div class="row pt-3 ia_tramadol_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2">
                                <label><b>Name</b></label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_tramadol_name[]">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label><b>Dosage</b></label>
                            </div>
                            <div class="col-sm-4">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="ia_tramadol_dose[]">
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_nerveblock">
                                    <input type="checkbox" class="form-check-input ia_nerveblock" value="Yes" name="ia_nerveblock"><b>Nerve Block</b>
                                </label>
                            </div>
                        </div>
                         <div class="row pt-3 ia_nerveblock_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2">
                                <label><b>Name</b></label>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_nerveblock_name[]">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label><b>Dosage</b></label>
                            </div>
                            <div class="col-sm-4">
                                 <div class="form-group">
                                    <input type="number" class="form-control" name="ia_nerveblock_dose[]">
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="ia_others">
                                    <input type="checkbox" class="form-check-input ia_others" value="Yes" name="ia_others"><b>Others</b>
                                </label>
                            </div>
                        </div>
                        <div class="row ia_others_box" id="ga-input" style="display:none;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="ia_others_input">
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                       
                <div class="row pt-4">
                    <div class="col-sm-2">
                        <label> <b>Complications</b></label>
                    </div>
                    <div class="col-sm-6">
                         <div class="form-check" style="font-size: 16px;">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="complications">
                               <input type="checkbox" class="switch_1" value="Yes" name="complications" id="complications" onclick="c_show()">
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div><!--row-->
                <div class="row" id="complications_box" style="display:none;">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 p-0">
                        
                        <div class="form-check">
                        <label class="form-check-label">
							<input type="hidden" class="switch_1" value="No" name="c_aspiration">                            
                            <input type="checkbox" class="form-check-input" value="Yes" name="c_aspiration"><b>Aspiration</b>
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
							<input type="hidden" class="switch_1" value="No" name="c_difficult_intubation">                            
                            <input type="checkbox" class="form-check-input" value="Yes" name="c_difficult_intubation"><b>Difficult intubation</b>
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
							<input type="hidden" class="switch_1" value="No" name="c_failed">                            
                            <input type="checkbox" class="form-check-input" value="Yes" name="c_failed"><b>Failed intubation</b>
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
							<input type="hidden" class="switch_1" value="No" name="c_bronchospasm">                            
                            <input type="checkbox" class="form-check-input" value="Yes" name="c_bronchospasm"><b>Bronchospasm</b>
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
							<input type="hidden" class="switch_1" value="No" name="c_desaturation">                            
                            <input type="checkbox" class="form-check-input" value="Yes" name="c_desaturation"><b>Desaturation</b>
                        </label>
                        </div>
                        <div class="form-check">
                        <label class="form-check-label">
							<input type="hidden" class="switch_1" value="No" name="c_awarenese">                            
                            <input type="checkbox" class="form-check-input" value="Yes" name="c_awarenese"><b>Awareness</b>
                        </label>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                          <button type="submit" class="btn-save mt-4">Submit</button>
                    </div>
                </div>
            </form>
        </div><!--GA--->

        <script>

    function selectcnb(){
        var cnbdone = $('.cnb_done_by1').val();
        if(cnbdone != ''){
            $('.cnbdone').hide();
        }
    }

    function checksupervision(){
        var supervision = $('.supervision').val();
        if(supervision != ''){
            $('.supervision1').hide();
        }
    }

    var subjectObject = {
        "Consultant": {
            "Junior Consultant" : ["Junior Consultant", "Senior Consultant"],
            "Senior Consultant" : ["Junior Consultant", "Senior Consultant"]
        }, 
        "Trainee" : {
            "Junior Trainee" : ["Junior Trainee", "Senior Trianee"],
            "Senior Trianee" : ["Junior Trainee", "Senior Trianee"]
        } 
    }
    window.onload = function(){
        
        var subjectSel = document.getElementById("ga_done_by1");
        var topicSel = document.getElementById("ga_done_by2");
        

        for (var x in subjectObject) {
            subjectSel.options[subjectSel.options.length] = new Option(x, x);
        }
        subjectSel.onchange = function() {
            
            topicSel.length = 1;
           
            for (var y in subjectObject[this.value]) {
            topicSel.options[topicSel.options.length] = new Option(y, y);
            }
        }
        
    }
</script>

    <?php } ?>

</div><!--Tab4-->




<script>

    function airway(){
        var lma = $('.airway_option').val();
        // alert(lma);
        if(lma == 'LMA'){
            $('.gen').show();
        }else{
            $('.gen').hide();
            $('.gen').val('');
        }

    }    

    function c_show(){
        var condition1 = $('#complications').is(':checked');	
       
        if(condition1 == true){
            $('#complications_box').show();
        }else{
            $('#complications_box').hide();
        }
    }

    $(document).ready(function(){
        $('#ga_procedure').submit(function(e){
			e.preventDefault();
            // alert('hi');
            var lor_sal = '', air = '';
			var ww = $('#other').is(':checked');			
			var xx = $('#ga_inhalational').is(':checked');
			var yy = $('#ga_tiva').is(':checked');
			
			if(xx){
				lor_sal = $('#ga_inhalational').val();
			}
			if(yy){
				air = $('#ga_tiva').val();
			}
			
			var formData = new FormData(this);
			formData.append('ga_inhalational',lor_sal);
			formData.append('ga_tiva',air);										

			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("add-ga-obstetrics")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);
						$('#ga_procedure')[0].reset();
						window.location = '<?php echo base_url("obstetrics/GaDetails")?>?id='+response.msg;					
					}
					else{
						toastr["error"](response.message);						
					}
				}
			});
        });
    });

</script>

<script>  

    var epid = '<?php echo $epid['dr_id']; ?>';
    if(epid != ''){ 
        $('#epi').hide();
        // $('#epi'). prop('disabled', true); 
        $("#d").removeAttr("href");       
        $( "#d" ).removeClass('btn-procedure');
        $( "#d" ).addClass('btn-procedure1');

        $("#c").removeAttr("href");       
        $( "#c" ).removeClass('btn-procedure');
        $( "#c" ).addClass('btn-procedure1');

        $("#a").removeAttr("href");       
        $( "#a" ).removeClass('btn-procedure');
        $( "#a" ).addClass('btn-procedure1');
    }

    var spin = '<?php echo $spin['dr_id']; ?>';
    if(spin != ''){ 
        // $('#spin').hide();
        $("#d").removeAttr("href");       
        $( "#d" ).removeClass('btn-procedure');
        $( "#d" ).addClass('btn-procedure1');

        $("#b").removeAttr("href");       
        $( "#b" ).removeClass('btn-procedure');
        $( "#b" ).addClass('btn-procedure1');

        $("#a").removeAttr("href");       
        $( "#a" ).removeClass('btn-procedure');
        $( "#a" ).addClass('btn-procedure1');
    }

    var cse = '<?php echo $cse['dr_id']; ?>';
    if(cse != ''){ 
        // $('#cse').hide();
        $("#d").removeAttr("href");       
        $( "#d" ).removeClass('btn-procedure');
        $( "#d" ).addClass('btn-procedure1');

        $("#b").removeAttr("href");       
        $( "#b" ).removeClass('btn-procedure');
        $( "#b" ).addClass('btn-procedure1');

        $("#c").removeAttr("href");       
        $( "#c" ).removeClass('btn-procedure');
        $( "#c" ).addClass('btn-procedure1');
    }

    var csa = '<?php echo $csa['dr_id']; ?>';   
    if(csa != '' ){ 
        // $('#csa').hide();
        $("#a").removeAttr("href");       
        $( "#a" ).removeClass('btn-procedure');
        $( "#a" ).addClass('btn-procedure1');

        $("#b").removeAttr("href");       
        $( "#b" ).removeClass('btn-procedure');
        $( "#b" ).addClass('btn-procedure1');

        $("#c").removeAttr("href");       
        $( "#c" ).removeClass('btn-procedure');
        $( "#c" ).addClass('btn-procedure1');
     
    }
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
</script>

	
    

<script>

    function ia_show(){     
		
        var condition = $('#intra_op_analgesia').is(':checked');	
       
        if(!condition){

            var ia_opioids = $('.ia_opioids').is(':checked');
            var ia_paracetamol = $('.ia_paracetamol').is(':checked');
            var ia_nsaids = $('.ia_nsaids').is(':checked');
            var ia_ketamine = $('.ia_ketamine').is(':checked');
            var ia_tramadol = $('.ia_tramadol').is(':checked');
            var ia_nerveblock = $('.ia_nerveblock').is(':checked');
            var ia_others = $('.ia_others').is(':checked');

            if(ia_opioids){

                toastr.error('Please Uncheck Opioids..');
                document.getElementById("intra_op_analgesia").checked = true;

            }else if(ia_paracetamol){
                toastr.error('Please Uncheck Paracetamol..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_nsaids){
                toastr.error('Please Uncheck NSAIDS..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_ketamine){
                toastr.error('Please Uncheck Ketamine..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_tramadol){
                toastr.error('Please Uncheck Tramadol..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_nerveblock){
                toastr.error('Please Uncheck Nerve Block..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_others){
                toastr.error('Please Uncheck Others..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else{
                $('#intra_op_analgesia_box').hide();
            }
            
        }else{
            $('#intra_op_analgesia_box').show();
        }

    }

    
    $('.ia_opioids').click(function(){
        var ia_opioids = $('.ia_opioids').is(':checked');

        if(ia_opioids == true){
            $('.ia_opioids_box').show();
        }else{
            $('.ia_opioids_box').hide();
        }
    });

    $('.ia_paracetamol').click(function(){
        var ia_paracetamol = $('.ia_paracetamol').is(':checked');

        if(ia_paracetamol == true){
            $('.ia_paracetamol_box').show();
        }else{
            $('.ia_paracetamol_box').hide();
        }
    });

    $('.ia_nsaids').click(function(){
        var ia_nsaids = $('.ia_nsaids').is(':checked');

        if(ia_nsaids == true){
            $('.ia_nsaids_box').show();
        }else{
            $('.ia_nsaids_box').hide();
        }
    });

    $('.ia_ketamine').click(function(){
        var ia_ketamine = $('.ia_ketamine').is(':checked');

        if(ia_ketamine == true){
            $('.ia_ketamine_box').show();
        }else{
            $('.ia_ketamine_box').hide();
        }
    });

    $('.ia_tramadol').click(function(){
        var ia_tramadol = $('.ia_tramadol').is(':checked');

        if(ia_tramadol == true){
            $('.ia_tramadol_box').show();
        }else{
            $('.ia_tramadol_box').hide();
        }
    });

    $('.ia_nerveblock').click(function(){
        var ia_nerveblock = $('.ia_nerveblock').is(':checked');

        if(ia_nerveblock == true){
            $('.ia_nerveblock_box').show();
        }else{
            $('.ia_nerveblock_box').hide();
        }
    });

    $('.ia_others').click(function(){
        var ia_others = $('.ia_others').is(':checked');

        if(ia_others == true){
            $('.ia_others_box').show();
        }else{
            $('.ia_others_box').hide();
        }
    });
</script>


<?php
    echo view('includes/footer-obstetric');    
?>