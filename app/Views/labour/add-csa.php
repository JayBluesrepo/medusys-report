<?php
    echo view('includes/header-labour',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
<section class="epidural">
<h3>Add CSA - Continuous Spinal Anaesthesia</h3>
    <form id="add_csa">
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
                <div class="col-sm-2"><label>CNB done by<span class="mandat mr-3">*</span>
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
                        <option  value = "">Select</option>
                        <option value="Consultant" >Consultant</option>
                        <option value="Trainee">Trainee</option>
                    </select>
                    <div class="" id = "consultant" style="color:red; display:none;">
                        <small class="cnbdone" style="color:red;">select the option</small>
                        <select class="form-control cnb_done_by2" id="cnb_by2" style="margin: 15px 0;"  name="cnb_done_by2">       
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
	<label class="pt-3">Patient status during Neuraxial Block<span class="mandat">*</span></label>&nbsp
    <small class="psn" style="color:red; display:none;">please choose patient status</small>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-7">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="Awake" onclick="hide()" id="option-1" name="optradio">Awake
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="Sedation" onclick="show()" id="option-2" name="optradio">Sedation
                    </label>
                </div>
                <div class="pts" style="padding-top:10px;">
                    <select class="form-control" id="sed" name="sedation_if" readonly>
                        <option value=''>Select</option>
                        <option>1-Mild easy to rouse</option>
                        <option>2-Moderate,easy to rouse,unable to remain awake</option>
                        <option>3-Difficult to rouse</option>
                    </select>
                </div>
                
                <div class="form-check">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="GA" name="optradio" id="option-3" onclick="hide()" >GA
                    </label>
                </div>
            </div>
            <div class="col-sm-3"></div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label style="font-size:13px;">Patient Position<span class="mandat">*</span></label></div>
            <div class="col-sm-4">
                <select class="form-control" id="patient_pos" name="patient_pos" onchange="checkpos()">
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
            <div class="col-sm-2"><label>Asepsis<span class="mandat">*</span></label><br><small class="asep" style="color:red; display:none;">please select asepsis</small></div>
            <div class="col-sm-10">
                <div class="t-switch">
                    <ul>
                        <li>
                            <div class="togle">
                                <label>Wearing cap and mask</label>
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="wearing_mask">
                                    <input type="checkbox" class="switch_1" value="Yes" id="wearing_mask" name="wearing_mask" onclick="checkasep()">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="togle">
                                <label>Hand washing</label>
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="hand_washing">
                                    <input type="checkbox" class="switch_1" value="Yes" id="hand_washing" name="hand_washing" onclick="checkasep()">
                                </div>
                            </div>
                        </li>
                    </ul><!-------------------->
                    <ul style="margin-bottom:0;">
                        <li>
                            <div class="togle">
                                <label>Sterile gown</label>
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="sterile_gown">
                                    <input type="checkbox" class="switch_1" value="Yes" id="sterile_gown" name="sterile_gown" onclick="checkasep()">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="togle">
                                <label>Sterile draping</label>
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="sterile_draping">
                                    <input type="checkbox" class="switch_1" value="Yes" id="sterile_draping" name="sterile_draping" onclick="checkasep()">
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
                <select class="form-control" id="skin_prep" name="skin_prep" onchange="checkskin()">
                    <option value=''>Select</option>
                    <option>Alcohol</option>
                    <option>Chlorhexidine</option>
                    <option>Betadine</option>
                    <option>Combinations</option>
                    <option>Other</option>
                </select>
                <small class="skp" style="color:red; display:none;">please enter skin prep
                     <input type="text" class="form-control skin_prep_other"  id = "skin_prep_other" name="skin_prep_other" style="margin-top: 12px;">

                </small>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->    
        <div class="row pt">
            <div class="col-sm-2"><span><b>CSA</b><span class="mandat">*</span></span></div>
            <div class="col-sm-4">
                <select class="form-control" id="csa" name="csa" onchange="checkcsa()">
                    <option value=''>Select</option>
                    <option>Accidental</option>
                    <option>Intentional</option>
                </select>
                <small class="csacheck" style="color:red; display:none;">please enter csa</small>
            </div>
            <div class="col-sm-5"></div>
        </div><!--row-->
        <!-- <h5><b>Epidural<span class="mandat">*</span></b></h5> -->
        <div class="row pt">
            <div class="col-sm-2"><label>Anatomical Landmark</label></div>
            <div class="col-sm-4">
                <select class="form-control" id="anatomical_landmark" name="anatomical_landmark">
                    <option value=''>Select</option>
                    <option>Easily Palpable</option>
                    <option>Poorly Palpable</option>
                    <option>Non Palpable</option>
                </select>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"> <label><b>Ultrasound</b></label></div>
            <div class="col-sm-4">
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="ultrasoun">
                    <input type="checkbox" class="switch_1" id="ult" value="Yes" name="ultrasoun" onclick="ultra()">
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
        <div class="ultrasound mb-3">
            <div class="row pt">
                <div class="col-sm-2"></div>
                <div class="col-sm-2"><span>Probe Cover</span></div>
                <div class="col-sm-4">
                    <select class="form-control" name="probe_cover">
                        <option value=''>Select probe cover</option>
                        <option>Yes</option>
                        <option>No</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div><!--row-->
            <div class="row pt">
                <div class="col-sm-2"></div>
                <div class="col-sm-2"><span>Image Quality</span></div>
                <div class="col-sm-4">
                    <select class="form-control" name="image_quality">
                        <option value=''>Select image quality</option>
                        <option>Good</option>
                        <option>Average</option>
                        <option>Poor</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div><!--row-->
        </div>
        <div class="row pt">
            <div class="col-sm-3"><label style="">CSA Spinal Level</label></div>
            <div class="col-sm-3">
                <input type="text" class="form-control text-center" id="epidu" name="csa_spinal_level" readonly>
            </div>
            <div class="col-sm-3">
                
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control text-center" id="csa_type" name="csa_spinal_level_name" readonly>
            </div>
        </div><!--row-->
        <h5 style="position: relative;top: 179px;" class="csa-tag"><b>Click on the appropriate <br> CSA level here</b></h5>
        <div class="row human-skeleton pt-3">
            <div class="col-sm-12">
                <img src="<?php echo base_url('public/assets/images/Spinal-new-img.png'); ?>" class="img-fluid d-block mx-auto">
                <button type="button" class="btn q" id="spinal-new-btn" value="T1-2">T1-2</button>
                <button type="button" class="btn q" id="spinal-new-btn1" value="T2-3">T2-3</button>
                <button type="button" class="btn q" id="spinal-new-btn2" value="T3-4">T3-4</button>
                <button type="button" class="btn q" id="spinal-new-btn3" value="T4-5">T4-5</button>
                <button type="button" class="btn q" id="spinal-new-btn4" value="T5-6">T5-6</button>
                <button type="button" class="btn q" id="spinal-new-btn5" value="T6-7">T6-7</button>
                <button type="button" class="btn q" id="spinal-new-btn6" value="T7-8">T7-8</button>
                <button type="button" class="btn q" id="spinal-new-btn7" value="T8-9">T8-9</button>
                <button type="button" class="btn q" id="spinal-new-btn8" value="T9-10">T9-10</button>
                <button type="button" class="btn q" id="spinal-new-btn9" value="T10-11">T10-11</button>
                <button type="button" class="btn q" id="spinal-new-btn10" value="T11-12">T11-12</button>
                <button type="button" class="btn q" id="spinal-new-btn11" value="T12-L1">T12-L1</button>
                <button type="button" class="btn q" id="spinal-new-btn12" value="L1-2">L1-2</button>
                <button type="button" class="btn q" id="spinal-new-btn13" value="L2-3">L2-3</button>
                <button type="button" class="btn q" id="spinal-new-btn14" value="L3-4">L3-4</button>
                <button type="button" class="btn q" id="spinal-new-btn15" value="L4-5">L4-5</button>
                <button type="button" class="btn q" id="spinal-new-btn16" value="L5-S1">L5-S1</button>
            </div>
        </div><!--row-->
        <label><b> Spinal Needle Brand,Type and Size</b></label>
        <div class="row pt-2">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Spinal Needle Brand</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 pt-2">
                        <select class="form-control" id="need" name="needle_brand" onclick="needle()">
                        <option value="">Select</option>
                        <?php
                            foreach($spinal_needle_brand as $key=>$master){
                        ?>
                            
                            <option><?php echo $master['name']; ?></option>
                            
                        <?php
                        }
                        ?>
                        <option value="Other">Other</option>
                        </select>
                        <div class="needle">
                            <input type="text" class="form-control" name="needle_brand_other" style="margin-top: 12px;">
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Spinal Needle Type</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 pt-2">
                        <select class="form-control" id="ty" name="needle_type" onclick="type1()">
                        <option value="">Select</option>
                        <?php
                            foreach($spinal_needle_type as $key=>$master){
                        ?>
                            
                            <option><?php echo $master['name']; ?></option>
                            
                        <?php
                        }
                        ?>
                        <option value="Other">Other</option>
                        </select>
                        <div class="type">
                            <input type="text" class="form-control" name="needle_type_other" style="margin-top: 12px;">
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Spinal Needle Size</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4 pt-2">
                        <select class="form-control" name="needle_size">
                            <option value=''>Select needle size</option>
                            <option>16G</option>
                            <option>17G</option>
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
                <select class="form-control" name="approach">
                    <option value=''>Select</option>
                    <option>Midline</option>
                    <option>Paramedian</option>
                </select>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label>Number Of Attempts</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="no_attempts">
                    <option value=''>Select</option>
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
            <div class="col-sm-2"><label>Spinal Catheter Type</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="catheter_type">
                    <option value=''>Select</option>
                    <option>Epidural Catheter</option>
                    <option>Micro Catheter</option>
                </select>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label>Catheter mark at skin(cm)</label></div>
            <div class="col-sm-3">
                <input type="number" class="form-control" name="catheter_skin_mark">
            </div>
            <div class="col-sm-7"></div>
        </div><!--row--><br>
        <div class="row">
            <div class="col-sm-2"><label>Labour LA Regimen</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="la_regimen">
                    <option value=''>Select</option> 
                    <option>Continuous Infusion</option>
                    <option>Intermittent Bolus</option>
                    <option>PCEA (Patient Controlled Epidural Analgesia)</option>
                </select>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
       <!--  <h5 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption<a href="#" data-toggle="tooltip"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></b></h5> -->
       <h5 class="pt-4"><b>Total Labour LA & Adjuvant Consumption</b>
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
                
                <div class="procedure-cse spinal_anaesthe_box">
                    <span class="mb-2"><b>Local Anaesthetic</b></span>
                        <div class="pac-box">
                            <div class="pacu-1"><p>Lignocaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="spinal_lignoca_option1">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_persent1" name="spinal_lignoca_persent1" onkeyup="persentage('alert1')"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_ml1" name="spinal_lignoca_ml1" ><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control spinal_mg1" name="spinal_lignoca_mg1" ><span style="padding-top:5px;">mg</span>
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
                                <select class="form-control" name="spinal_bupivaca_option2">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_persent2" name="spinal_bupivaca_persent2" onkeyup="persentage('alert2')"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_ml2" name="spinal_bupivaca_ml2" ><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control spinal_mg2" name="spinal_bupivaca_mg2" ><span style="padding-top:5px;">mg</span>
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
                            <div class="pacu-1"><p>Ropivacaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="spinal_ropivaca_option3">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_persent3" name="spinal_ropivaca_persent3" onkeyup="persentage('alert3')"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_ml3" name="spinal_ropivaca_ml3" ><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control spinal_mg3" name="spinal_ropivaca_mg3" ><span style="padding-top:5px;">mg</span>
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
                            <div class="pacu-1"><p>Prilocaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="spinal_priloca_option4">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_persent4" name="spinal_priloca_persent4" onkeyup="persentage('alert4')"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_ml4" name="spinal_priloca_ml4" ><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control spinal_mg4" name="spinal_priloca_mg4" ><span style="padding-top:5px;">mg</span>
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
                        <div class="pac-box">
                            <div class="pacu-1"><p>2-chloroprocaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="spinal_2chloropro_option5">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_persent5" name="spinal_2chloropro_persent5" onkeyup="persentage('alert5')"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_ml5" name="spinal_2chloropro_ml5" ><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control spinal_mg5" name="spinal_2chloropro_mg5" ><span style="padding-top:5px;">mg</span>
                            </div>
                            <i onclick="clean5()" class="fa fa-times" id="clear5" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
                        </div><!--pac-box-->
                        <div class="pac-box" id="persentage_tage4" style="padding:0; display:none;">
                            <div class="pacu-1"></div>
                            <div class="pacu-1-x"></div>
                            <div class="pacu-1">
                                <small  style="color:red;text-align:center;">should be from 0 to 4</small>
                            </div>
                            <div class="pacu-1"></div>
                            <div class="pacu-1"></div>														
                        </div>
                        <!-- <p>Other</p> -->
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="spinal_anaesth_other">
                                <input type="checkbox" class="form-check-input spinal_anaesth_other" value="Yes" name="spinal_anaesth_other" >Other
                            </label>
                        </div>
                        <div class="pac-box spinal_anaesth_other_option" style="display:none;">
                            <div class="pacu-1"><input type="text" class="form-control" name="local_anaesthetic"></div>
                            <div class="pacu-1-x">
                                <!-- <input type="text" class="form-control spinal_anaesth_other_input" name="spinal_other_input6"> -->
                                <select class="form-control spinal_anaesth_other_input" name="spinal_other_input6">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_persent6" name="spinal_other_persent6" onkeyup="persentage('alert6')"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control spinal_ml6" name="spinal_other_ml6" ><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control spinal_mg6" name="spinal_other_mg6" ><span style="padding-top:5px;">mg</span>
                            </div>
                            <i onclick="clean6()" class="fa fa-times" id="clear6" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
                        </div><!--pac-box-->
                        <div class="pac-box" id="persentage_tage5" style="padding:0; display:none;">
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
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <label><b>Adjuvant</b>
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
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="ajuvant_status">
                    <input type="checkbox" class="switch_1 epidural_adjuvant"  id = "epidural_adjuvant1" value="Yes" name="ajuvant_status" onclick="epidural_adjuvant()">  
                </div>
                
                <div class="pt epidural_adjuvant_check" id="proced-plus" style="display:none;">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="epidural_opioid_status">
                            <input type="checkbox" class="form-check-input epidural_opioid" value="Yes" id = "Opioid" name="epidural_opioid_status"  onclick="epidural_opioid()">Opioid
                        </label>
                    </div>
                    <div class="opioid append_fun mt-2"  style="display:none;">
                        <div class="row" style="margin-left:3%;">
                            <div class="col-sm-5"><span>Opioid Name</span></div>
                            <div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]"><button type="button" class="btn add2" ><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                        </div><!--row-->
                        <div class="row pt" style="margin-left:3%;">
                            <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="epidural_opioid_dose[]"></div>
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
                    <div class="col-sm-7"><input type="number" class="form-control epidural_clonidne_input" name="epidural_clonidne_dose" placeholder="mcgm"  readonly></div>
                    </div><!--row-->
                    <div class="row pt">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input epidural_dexme" value="">Dexmeditomidine with Dose(mcgm)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7"><input type="number" class="form-control epidural_dexme_input " name="epidural_dexmedito_dose" placeholder="mcgm" readonly></div>
                    </div><!--row-->
                    <div class="row pt">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input epidural_dexamethasone" value="">Dexamethasone with Dose(mg)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7"><input type="number" class="form-control epidural_dexamethasone_input" placeholder="mg" name="epidural_dexametha_dose" readonly></div>
                    </div><!--row-->
                    <div class="row pt">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input epidural_trama" value="">Tramadol with Dose(mg)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7"><input type="number" class="form-control epidural_trama_input" name="epidural_tramadol_dose" placeholder="mg" readonly></div>
                    </div><!--row-->
                    <div class="row pt">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input epidural_ketamine" value="">Ketamine with Dose(mg)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7"><input type="number" class="form-control epidural_ketamine_input" name="epidural_ketamine_dose" placeholder="mg" readonly></div>
                    </div><!--row-->
                    <div class="row pt">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input epidural_midazolam" value="">Midazolam with dose(mg)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7"><input type="number" class="form-control epidural_midazolam_input" name="epidural_midazolam_dose" placeholder="mg" readonly></div>
                    </div><!--row-->


                    <div class="row pt">
                    <div class="col-sm-5">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input epidural_adrenaline" value="">Adrenaline(Epinephrine)(mcmg)
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-7"><input type="number" class="form-control epidural_adrenaline_input" name="epidural_adrenaline_dose" placeholder="mcmg" readonly></div>
                    </div>
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
                                <div class="col-sm-7"><input type="number" class="form-control" name="epidural_aj_dose[]"></div>
                                <div class="col-sm-1"></div>
                            </div>
                        </div>
                    </div>
                    </div><!--row-->
                </div>
            </div>
        </div>
        <h5 class="bt"></h5>
        <label class="pt"><b>Analgesia supplementation required  &nbsp;&nbsp;&nbsp; (<span id="analgesis"> NO </span>)</label></b>
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
                    <input type="hidden" class="switch_1" value="No" name="asr_status">
                    <input type="checkbox" class="switch_1 spinal_analgesia_supplement" value="Yes" name="asr_status" id="ana" onclick="analgesia()">
                </div>
                <div class="analg-box spinal_analgesia_supplement_box" style="display:none;">
                    <div class="form-check">
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
                                    <div class="col-sm-7"><input type="number" class="form-control op_remove" name="asr_opioid_dose_spinal[]"></div>
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
                                    <div class="col-sm-3"><label>Adjuvnat Name</label></div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control aj_remove " name="asr_name_aj" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                <div class="row pt">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label>Adjuvnat Dose(mg)</label></div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control aj_remove" name="asr_name_dose" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div>

                        <!-- <div class="spinal_multi_model_box" style="display:none;"> -->
                            <!-- <div class="form-check" style="margin-left: 5%;">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="asr_ketamine">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="asr_ketamine">Ketamine
                                </label>
                            </div> -->
                           <!--  <div class="form-check" style="margin-left: 5%;">
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
                                    <div class="col-sm-3"><label>Adjuvnat Name</label></div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="asr_name_aj" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                <div class="row pt">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label>Adjuvnat Dose(mg)</label></div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="asr_name_dose" >
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div> -->
                        <!-- </div> -->
                    </div>	
                </div>
            </div><!--col-10-->
        </div><!--row-->

		<label class="pt"><b>Technical complications &nbsp;&nbsp;&nbsp; (<span id="teche"> NO </span>)</b>
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
                    <ul style="margin-bottom:0px;padding-left: 0; display:none;">    
                        <li>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="tc_none">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_none">None
                                </label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!--row-->

        <label class="pt"><b>Acute complications &nbsp;&nbsp;&nbsp; (<span id="acutes"> NO </span>)</b>
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
                    <input type="hidden" class="switch_1" value="No" name="ac_status">
                    <input type="checkbox" class="switch_1" id="acu" value="Yes" name="ac_status" id="acu" onclick="acute()">
                </div>
                <div class="acute">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_last">
                            <input type="checkbox" class="form-check-input ac_last" value="Yes" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_radicular_pain">
                            <input type="checkbox" class="form-check-input ac_radicular_pain" value="Yes" name="ac_radicular_pain">Radicular Pain (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_paresthesia_pain">
                            <input type="checkbox" class="form-check-input ac_paresthesia_pain" value="Yes" name="ac_paresthesia_pain">Paresthesia(needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_bloody_tap">
                            <input type="checkbox" class="form-check-input ac_bloody_tap" value="Yes" name="ac_bloody_tap">Bloody Tap (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_hypotension">
                            <input type="checkbox" class="form-check-input ac_hypotension" value="Yes" name="ac_hypotension">Hypotension<!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                            <input type="checkbox" class="form-check-input ac_total_spinal" value="Yes" name="ac_total_spinal">Total Spinal<!--  <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_respi_arrest">
                            <input type="checkbox" class="form-check-input ac_respi_arrest" value="Yes" name="ac_respi_arrest">Respiratory Arrest
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
                            <input type="checkbox" class="form-check-input maternal_fever" value="Yes" name="maternal_fever">Maternal Fever
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
                            <input type="checkbox" class="form-check-input" id="ot" value="Yes" name="ac_other" onclick="other3()">Other
                        </label> 
                        <input type="text" class="form-control" name="ac_other_input" id="ot1" style="width: 30%;" readonly>
                       
                    </div>
                    <div class="form-check" style="display:none;">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_none">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_none">None
                        </label>
                    </div>
                </div><!--acute ends-->
            </div>
        </div><!--row-->
        <label class="pt"><b>Success<span class="mandat">*</span></b>
        <!-- <div class="tooltip-6">
           <i class="fa fa-info-circle" aria-hidden="true"></i>
            <div class="right-6">
                <div class="text-content-6">
                    <h6>Please consider the purpose of CNB along with the below definition. <br><br> Purpose of CNB : <br> 1. Sole/Primary anaesthetic <br> 2. Analgesic purpose only<br><br>Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade.</h6>
                    <i></i>
                </div>
            </div>
        </div> -->      
        &nbsp;<small class="succes" style="color:red; display:none;">please choose success status</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="com" value="Complete Success" name="success_option" onclick="complete()">Complete Success
                    <div class="tooltip-20">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <div class="right-20">
                                <div class="text-content-20">
                                     <h6><b>Complete Success:</b> <br>Complete analgesia with pain scores VNRS>75%reduction within 45 min of Epidural placement and bolus dose. High patient satisfaction.</h6>
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
                               <h6><b>Failure:</b> <br>VNRS reduction<25%,no discernible sensory level, requires re-siting, abandonment, dural puncture or very dis-satisfied patient.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div><!--row-->
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
        <label class="pt"><b>Sensory Level</b><span class="mandat">*</span></label>
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
                <select class="form-control" name="motor_level" id="motor_level" onchange="checkmotor()">
                    <option value=''>Select</option>
                    <option style="padding-bottom: 5px;">0&nbsp;&nbsp;(Free movement of legs and feet)</option>
                    <option style="padding-bottom: 5px;">1&nbsp;&nbsp;(Just able to fix knees with free movement of feet)</option>
                    <option style="padding-bottom: 5px;">2&nbsp;&nbsp;(Unable to flex Knees,but with free movement of feet)</option>
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
                <li><input type="text" class="form-control" name="onset_surgical"></li>
                <li><label>mins</label></li>
            </ul>
        </div>
        <div class="duration">
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
                        <input type="hidden" class="switch_1" value="No" name="vasopressor">
                        <input type="checkbox" class="switch_1" value="Yes" name="vasopressor">
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
</section><!--epidural-->

<script>

    function analgesia(){
        var ana = $('#ana').is(':checked');
        if(!ana){
            var asr_spinal_inhalation = $('.asr_spinal_inhalation').is(':checked');
            var spinal_iv_analgesia = $('.spinal_iv_analgesia').is(':checked');
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
        if(!tech){

            var complication_equipment = $('.complication_equipment').is(':checked');

            var complication_multi_attempts = $('.complication_multi_attempts').is(':checked');

            var complication_2nd_anaesthe = $('.complication_2nd_anaesthe').is(':checked');

            var complication_failure_space = $('.complication_failure_space').is(':checked');

            var complication_catheter = $('.complication_catheter').is(':checked');
            
            
            var spinal_technical_other = $('.spinal_technical_other').is(':checked');
            if(complication_equipment){
                toastr.error('Please Uncheck Equipment related');
                $('#tech').attr("checked",true);
                document.getElementById("tech").checked = true;
            }
            else if(complication_multi_attempts){
                toastr.error('Please Uncheck Multiple attempts');
                $('#tech').attr("checked",true);
                document.getElementById("tech").checked = true;
            }
            else if(complication_2nd_anaesthe){
                toastr.error('Please Uncheck 2nd Anaesthetist');
                $('#tech').attr("checked",true);
                document.getElementById("tech").checked = true;
            }
            else if(complication_failure_space){
                toastr.error('Please Uncheck Technique abandoned/failure to find space');
                $('#tech').attr("checked",true);
                document.getElementById("tech").checked = true;
            }
            else if(complication_catheter){
                toastr.error('Please Uncheck Catheter related');
                $('#tech').attr("checked",true);
                document.getElementById("tech").checked = true;
            }
            else if(spinal_technical_other){
                toastr.error('Please Uncheck Others');
                $('#tech').attr("checked",true);
                
                document.getElementById("tech").checked = true;
            }
            else{
                $('.technical').hide();
                $("#teche").text('NO');
                $('.complication_other').val('');
                // $('.complication_equipment').prop("checked",false);
                // $('.complication_multi_attempts').prop("checked",false);
                // $('.complication_2nd_anaesthe').prop("checked",false);
                // $('.complication_failure_space').prop("checked",false);
                // $('.complication_catheter').prop("checked",false);
                // $('.spinal_technical_other').prop("checked",false);
                $('.complication_other').val('');
                $('.spinal_technical_input').hide();
                // $("#othe1").attr("readonly", true);
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
            var ac_last = $('.ac_last').is(':checked');
            var ac_radicular_pain = $('.ac_radicular_pain').is(':checked');
             var ac_paresthesia_pain = $('.ac_paresthesia_pain').is(':checked');

             var ac_bloody_tap = $('.ac_bloody_tap').is(':checked');
             var ac_hypotension = $('.ac_hypotension').is(':checked');
             var ac_nausea = $('.ac_nausea').is(':checked');
             var ac_vomiting = $('.ac_vomiting').is(':checked');
             var ac_high_block = $('.ac_high_block').is(':checked');
             var ac_subdural_block = $('.ac_subdural_block').is(':checked');
             var ac_total_spinal = $('.ac_total_spinal').is(':checked');
             var ac_respi_arrest = $('.ac_respi_arrest').is(':checked');

             var ac_cardiac_arrest = $('.ac_cardiac_arrest').is(':checked');
             var maternal_fever = $('.maternal_fever').is(':checked');
             var foetal_CTG = $('.foetal_CTG').is(':checked');
             var ot = $('#ot').is(':checked');
             

            if(ac_last){
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
                $('.ac_last').prop("checked",false);
                $('.ac_radicular_pain').prop("checked",false);
                $('.ac_paresthesia_pain').prop("checked",false);
                $('.ac_bloody_tap').prop("checked",false);
                $('.ac_hypotension').prop("checked",false);
                $('.ac_nausea').prop("checked",false);
                $('.ac_vomiting').prop("checked",false);
                $('.ac_high_block').prop("checked",false);
                $('.ac_subdural_block').prop("checked",false);
                $('.ac_total_spinal').prop("checked",false);
                $('.ac_respi_arrest').prop("checked",false);
                $('.ac_cardiac_arrest').prop("checked",false);
                $('#ot').prop("checked",false);
                // $('#ac_ca_arrest').prop("checked",false);
                // $('#ot').prop("checked",false);
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
<script type="text/javascript">
$(document).ready(function(){
    $('.needle').hide();
    $('.type').hide();
    $('.ultrasound').hide();
    $(".pts").hide();
    $('.adjuvant').hide();
    $('.opioid').hide();
    // $('.other1').hide();
    $('.analgesia').hide();
    $('.gesia').hide();
    $('.opioids').hide();
    $('.multianal').hide();
    $('.adjuncts').hide();
    // $('.technical').hide();
    $('.acute').hide();
});
$(document).ready(function(){
    var j=1;
    var k=1;
    var l=1;
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".opioid").append('<div class="row1"><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]" ><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="epidural_opioid_dose[]" ></div></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".other1").append('<div class="row2"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="epidural_aj_name[]"><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="epidural_aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
        }
    });
    $(".add6").click(function(){
        if(l<3){
            l++;
		    $(".spinal_opioid_supplemen_box").append('<div class="row3"><div class="row" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name_spinal[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control op_remove" name="asr_opioid_dose_spinal[]" ></div></div></div>');
        }
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
});
// $(".q"). click(function() {
//     var button = $(this).val();
//     var split_button = button.split(',');
//     // alert(split_button[0]);
//     $(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");
//     $('#epidu').val(split_button[0]);
//     $('#level_name').val(split_button[1]);
// });
$(".q"). click(function() {
    var button = $(this).val();
    $(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");
    $('#epidu').val(button);
    var firstChar = button.charAt(0);
    if(firstChar == 'T'){
        $('#csa_type').val('Thoracic');
    }
    if(firstChar == 'L'){
        $('#csa_type').val('Lumbar');
    }
});
$('.spinal_anaesth_other').click(function(){
    var epidural_clonidne =$('.spinal_anaesth_other').is(':checked');		
    if(!epidural_clonidne){			
        $(".spinal_anaesth_other_option").hide();
    }
    else{
        $('.spinal_anaesth_other_option').show();
    }
});
$(".spinal_persent1").focusout(function(){
    var li_per = $('.spinal_persent1').val();
    var li_ml = $('.spinal_ml1').val();
    var li_mg = $('.spinal_mg1').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var mg =(li_per*bb);
        $('.spinal_mg1').val(mg);
        $('#clear1').show();
        $('.spinal_persent1').attr("readonly", true);
        $('.spinal_ml1').attr("readonly", true);
        $('.spinal_mg1').attr("readonly", true);
    }
    else if(li_per && li_mg){
        var aa = li_mg/li_per;
        var li_total = aa/10;
        $('.spinal_ml1').val(li_total);
        $('#clear1').show();
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
        $('#clear1').show();
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
            $('#clear1').show();
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
        $('#clear1').show();
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
            $('#clear1').show();
            $('.spinal_persent1').attr("readonly", true);
            $('.spinal_ml1').attr("readonly", true);
            $('.spinal_mg1').attr("readonly", true);
        }
    }
});
function clean1(){
    $('.spinal_persent1').val('');
    $('.spinal_ml1').val('');
    $('.spinal_mg1').val('');
    $('.spinal_persent1').removeAttr("readonly");
    $('.spinal_ml1').removeAttr("readonly");
    $('.spinal_mg1').removeAttr("readonly");
    $('#clear1').hide();
}
$(".spinal_persent2").focusout(function(){
    var b_per = $('.spinal_persent2').val();
    var b_ml = $('.spinal_ml2').val();
    var b_mg = $('.spinal_mg2').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var mg =(b_per*bb);
        $('.spinal_mg2').val(mg);
        $('#clear2').show();
        $('.spinal_persent2').attr("readonly", true);
        $('.spinal_ml2').attr("readonly", true);
        $('.spinal_mg2').attr("readonly", true);
    }
    else if(b_per && b_mg){
        var aa = b_mg/b_per;
        var b_total = aa/10;
        $('.spinal_ml2').val(b_total);
        $('#clear2').show();
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
        $('#clear2').show();
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
            $('#clear2').show();
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
        $('#clear2').show();
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
            $('#clear2').show();
            $('.spinal_persent2').attr("readonly", true);
            $('.spinal_ml2').attr("readonly", true);
            $('.spinal_mg2').attr("readonly", true);
        }
    }
});
function clean2(){
    $('.spinal_persent2').val('');
    $('.spinal_ml2').val('');
    $('.spinal_mg2').val('');
    $('.spinal_persent2').removeAttr("readonly");
    $('.spinal_ml2').removeAttr("readonly");
    $('.spinal_mg2').removeAttr("readonly");
    $('#clear2').hide();
}
$(".spinal_persent3").focusout(function(){
    var r_per = $('.spinal_persent3').val();
    var r_ml = $('.spinal_ml3').val();
    var r_mg = $('.spinal_mg3').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var mg =(r_per*bb);
        $('.spinal_mg3').val(mg);
        $('#clear3').show();
        $('.spinal_persent3').attr("readonly", true);
        $('.spinal_ml3').attr("readonly", true);
        $('.spinal_mg3').attr("readonly", true);
    }
    else if(r_per && r_mg){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('.spinal_ml3').val(r_total);
        $('#clear3').show();
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
        $('#clear3').show();
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
            $('#clear3').show();
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
        $('#clear3').show();
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
            $('#clear3').show();
            $('.spinal_persent3').attr("readonly", true);
            $('.spinal_ml3').attr("readonly", true);
            $('.spinal_mg3').attr("readonly", true);
        }
    }
});
function clean3(){
    $('.spinal_persent3').val('');
    $('.spinal_ml3').val('');
    $('.spinal_mg3').val('');
    $('.spinal_persent3').removeAttr("readonly");
    $('.spinal_ml3').removeAttr("readonly");
    $('.spinal_mg3').removeAttr("readonly");
    $('#clear3').hide();
}
$(".spinal_persent4").focusout(function(){
    var p_per = $('.spinal_persent4').val();
    var p_ml = $('.spinal_ml4').val();
    var p_mg = $('.spinal_mg4').val();
    if(p_per && p_ml){
        var bb = (p_ml)*10;
        var mg =(p_per*bb);
        $('.spinal_mg4').val(mg);
        $('#clear4').show();
        $('.spinal_persent4').attr("readonly", true);
        $('.spinal_ml4').attr("readonly", true);
        $('.spinal_mg4').attr("readonly", true);
    }
    else if(p_per && p_mg){
        var aa = p_mg/p_per;
        var p_total = aa/10;
        $('.spinal_ml4').val(p_total);
        $('#clear4').show();
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
        $('#clear4').show();
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
            $('#clear4').show();
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
        $('#clear4').show();
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
            $('#clear4').show();
            $('.spinal_persent4').attr("readonly", true);
            $('.spinal_ml4').attr("readonly", true);
            $('.spinal_mg4').attr("readonly", true);
        }
    }
});
function clean4(){
    $('.spinal_persent4').val('');
    $('.spinal_ml4').val('');
    $('.spinal_mg4').val('');
    $('.spinal_persent4').removeAttr("readonly");
    $('.spinal_ml4').removeAttr("readonly");
    $('.spinal_mg4').removeAttr("readonly");
    $('#clear4').hide();
}
$(".spinal_persent5").focusout(function(){
    var chl_per = $('.spinal_persent5').val();
    var chl_ml = $('.spinal_ml5').val();
    var chl_mg = $('.spinal_mg5').val();
    if(chl_per && chl_ml){
        var bb = (chl_ml)*10;
        var mg =(chl_per*bb);
        $('.spinal_mg5').val(mg);
        $('#clear5').show();
        $('.spinal_persent5').attr("readonly", true);
        $('.spinal_ml5').attr("readonly", true);
        $('.spinal_mg5').attr("readonly", true);
    }
    else if(chl_per && chl_mg){
        var aa = chl_mg/chl_per;
        var cl_total = aa/10;
        $('.spinal_ml5').val(cl_total);
        $('#clear5').show();
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
        $('#clear5').show();
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
            $('#clear5').show();
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
        $('#clear5').show();
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
            $('#clear5').show();
            $('.spinal_persent5').attr("readonly", true);
            $('.spinal_ml5').attr("readonly", true);
            $('.spinal_mg5').attr("readonly", true);
        }
    }
});
function clean5(){
    $('.spinal_persent5').val('');
    $('.spinal_ml5').val('');
    $('.spinal_mg5').val('');
    $('.spinal_persent5').removeAttr("readonly");
    $('.spinal_ml5').removeAttr("readonly");
    $('.spinal_mg5').removeAttr("readonly");
    $('#clear5').hide();
}
$(".spinal_persent6").focusout(function(){
    var ot_per = $('.spinal_persent6').val();
    var ot_ml = $('.spinal_ml6').val();
    var ot_mg = $('.spinal_mg6').val();
    if(ot_per && ot_ml){
        var bb = (ot_ml)*10;
        var mg =(ot_per*bb);
        $('.spinal_mg6').val(mg);
        $('#clear6').show();
        $('.spinal_persent6').attr("readonly", true);
        $('.spinal_ml6').attr("readonly", true);
        $('.spinal_mg6').attr("readonly", true);
    }
    else if(ot_per && ot_mg){
        var aa = ot_mg/ot_per;
        var o_total = aa/10;
        $('.spinal_ml6').val(o_total);
        $('#clear6').show();
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
        $('#clear6').show();
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
            $('#clear6').show();
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
        $('#clear6').show();
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
            $('#clear6').show();
            $('.spinal_persent6').attr("readonly", true);
            $('.spinal_ml6').attr("readonly", true);
            $('.spinal_mg6').attr("readonly", true);
        }
    }
});
function clean6(){
    $('.spinal_persent6').val('');
    $('.spinal_ml6').val('');
    $('.spinal_mg6').val('');
    $('.spinal_persent6').removeAttr("readonly");
    $('.spinal_ml6').removeAttr("readonly");
    $('.spinal_mg6').removeAttr("readonly");
    $('#clear6').hide();
}
function persentage(type){
    var limit = $('.spinal_persent1').val();
    var limit1 = $('.spinal_persent2').val();
    var limit2 = $('.spinal_persent3').val();
    var limit3 = $('.spinal_persent4').val();
    var limit4 = $('.spinal_persent5').val();
    var limit5 = $('.spinal_persent6').val();

    if(type == 'alert1'){
        if((limit >= 0 && limit <= 4) && limit != ''){			
            $('#persentage_tage').hide();
            $('.spinal_persent1').css('border-color','').css('background','');
        }else{	
			$('.spinal_persent1').val('');		
            $('#persentage_tage').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent1').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert2'){
        if((limit1 >= 0 && limit1 <= 4) && limit1 != ''){			
            $('#persentage_tage1').hide();
            $('.spinal_persent2').css('border-color','').css('background','');

        }else{	
			$('.spinal_persent2').val('');		
            $('#persentage_tage1').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent2').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert3'){
        if((limit2 >= 0 && limit2 <= 4) && limit2 != ''){			
            $('#persentage_tage2').hide();
            $('.spinal_persent3').css('border-color','').css('background','');
        }else{	
			$('.spinal_persent3').val('');		
            $('#persentage_tage2').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent3').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert4'){
        if((limit3 >= 0 && limit3 <= 4) && limit3 != ''){			
            $('#persentage_tage3').hide();
            $('.spinal_persent4').css('border-color','').css('background','');

        }else{
			$('.spinal_persent4').val('');			
            $('#persentage_tage3').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent4').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert5'){
        if((limit4 >= 0 && limit4 <= 4) && limit4 != ''){			
            $('#persentage_tage4').hide();
            $('.spinal_persent5').css('border-color','').css('background','');

        }else{
			$('.spinal_persent5').val('');			
            $('#persentage_tage4').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent5').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert6'){
        if((limit5 >= 0 && limit5 <= 4) && limit5 != ''){			
            $('#persentage_tage5').hide();
            $('.spinal_persent6').css('border-color','').css('background','');

        }else{	
			$('.spinal_persent6').val('');		
            $('#persentage_tage5').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent6').css('border-color','red').css('background','#FFCCCB');
        }	
    }						
}
function show(){
    $(".pts").show();
    $('#sed').removeAttr("readonly");
}
function hide(){
    $(".pts").hide();
}
function needle(){
    var need = $('#need').val();
    if(need == 'Other'){
        $('.needle').show();
    }
    else{
        $(".needle").hide();
    }
}
function type1(){
    var ty = $('#ty').val();
    if(ty == 'Other'){
        $('.type').show();
    }
    else{
        $(".type").hide();
    }
}
function ultra(){
    var ult = $('#ult').is(':checked');
    if(!ult){
        $('.ultrasound').hide();
    }
    else{
        $(".ultrasound").show();
    }
}
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
    $('.epidural_adrenaline').click(function(){
		var epidural_clonidne =$('.epidural_adrenaline').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_adrenaline_input").attr("readonly", true);
		}
		else{
			$('.epidural_adrenaline_input').removeAttr("readonly");
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
    $('.spinal_analgesia_supplement').click(function(){
		var epidural_clonidne =$('.spinal_analgesia_supplement').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_analgesia_supplement_box").hide();
		}
		else{
			$('.spinal_analgesia_supplement_box').show();
            $('.supple').hide();
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
    $('.spinal_opioid_supplemen').click(function(){
		var epidural_clonidne =$('.spinal_opioid_supplemen').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_opioid_supplemen_box").hide();
		}
		else{
			$('.spinal_opioid_supplemen_box').show();
		}
	});
    // $('.spinal_multi_model').click(function(){
	// 	var epidural_clonidne =$('.spinal_multi_model').is(':checked');		
	// 	if(!epidural_clonidne){
    //     	$(".spinal_multi_model_box").hide();
	// 	}
	// 	else{
	// 		$('.spinal_multi_model_box').show();
	// 	}
	// });
    $('.spinal_adju').click(function(){
		var epidural_clonidne =$('.spinal_adju').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_adju_box").hide();
		}
		else{
			$('.spinal_adju_box').show();
		}
	});
    $('.tech_complication_check').click(function(){
		var epidural_clonidne =$('.tech_complication_check').is(':checked');		
		if(!epidural_clonidne){
        	$(".tech_complication_checkbox").hide();
		}
		else{
			$('.tech_complication_checkbox').show();
            $('.techie').hide();
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
$('#epidural_clonidne').click(function(){
    var epidural_clonidne =$('#epidural_clonidne').is(':checked');		
    if(!epidural_clonidne){
        $(".epidural_clonidne_input").attr("readonly", true);
    }
    else{
        $('.epidural_clonidne_input').removeAttr("readonly");
    }
});
function epidural_opioid(){		
    var epidural_opioid = $('.epidural_opioid').is(':checked'); 
    if(!epidural_opioid){
        $('.opioid').hide();
    }else{
        $('.opioid').show();
    }
}
function epidural_adjuvant(){
    var epidural_adjuvant = $('.epidural_adjuvant').is(':checked');
    if(!epidural_adjuvant){

        var Opioid = $('#Opioid').is(':checked');
        var epidural_clonidne = $('#epidural_clonidne').is(':checked');
        var epidural_dexme = $('.epidural_dexme').is(':checked');
       
        var epidural_dexamethasone = $('.epidural_dexamethasone').is(':checked');

        var epidural_trama = $('.epidural_trama').is(':checked');

        var epidural_ketamine = $('.epidural_ketamine').is(':checked');
        var epidural_midazolam = $('.epidural_midazolam').is(':checked');
        var epidural_adrenaline = $('.epidural_adrenaline').is(':checked');
        var epidural_other = $('.epidural_other').is(':checked');

        if(Opioid){
            toastr.error('Please Uncheck Opioid..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        else if(epidural_clonidne){
            toastr.error('Please Uncheck Clonidne with Dose..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        else if(epidural_dexme){
            toastr.error('Please Uncheck dexme..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        else if(epidural_dexamethasone){
            toastr.error('Please Uncheck Dexamethasone with Dose..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }

        else if(epidural_trama){
            toastr.error('Please Uncheck trama..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        else if(epidural_ketamine){
            toastr.error('Please Uncheck ketamine..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        else if(epidural_midazolam){
            toastr.error('Please Uncheck midazolam..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        else if(epidural_adrenaline){
            toastr.error('Please Uncheck adrenaline..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true; 
        }

        else if(epidural_other){
            toastr.error('Please Uncheck other..');
            $('#epidural_adjuvant1').attr("checked",true);
            document.getElementById("epidural_adjuvant1").checked = true;
        }
        
        
        else{
            $('.epidural_adjuvant_check').hide();
        }
    }else{
        $('.epidural_adjuvant_check').show();
    }
}


// function acute(){
//     var acu = $('#acu').is(':checked');
//     if(!acu){
//         $('.acute').hide();
//     }
//     else{
//         $(".acute").show();
//         $('.acuted').hide();
//     }
// }
function other3(){
    var ot = $('#ot').is(':checked');
    if(!ot){
        $("#ot1").attr("readonly", true);
        $("#ot1").val('');
    }
    else{
        $('#ot1').removeAttr("readonly");
       
    }
}
$('.epidural_other').click(function(){
    var epidural_clonidne =$('.epidural_other').is(':checked');		
    if(!epidural_clonidne){			
        $(".epidural_other_box").hide();
    }
    else{
        $('.epidural_other_box').show();
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
    $("input[name='optradio']").change(function(){
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
    function checkasep(){
        var wearing = $('#wearing_mask').is(':checked');
        var sterile = $('#sterile_gown').is(':checked');
        var hand = $('#hand_washing').is(':checked');
        var drap = $('#sterile_draping').is(':checked');
        if((wearing) || (sterile) || (hand) || (drap)){
            $('.asep').hide();
        }
	}
    function checkskin(){
		var skin = $('#skin_prep').val();
        // alert(skin); 
        if((skin == 'Other')){
            $('.skp').show();
            $('#skin_prep_other').val('');
        }
        else{
            $('.skp').hide();
            $('#skin_prep_other').val('');
        }
	}
    function checkcsa(){
		var csa = $('#csa').val();
		if((csa != '')){
			$('.csacheck').hide();
		}
	}
    function checkmotor(){
		var mot = $('#motor_level').val();
		if((mot != '')){
			$('.motro').hide();
		}
	}
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
$(document).ready(function(){
    $('#add_csa').submit(function(e){
        e.preventDefault();
        var aa = '', bb = '', cc = '', dd = '', ee = '', ff = '', gg = '', hh = '', ii = '', jj = '';
        var pat_pos = $('#patient_pos').val();
        var skp = $('#skin_prep').val();
        var csa = $('#csa').val();
        var motor = $('#motor_level').val();
        if((pat_pos != ''))
            aa = true;
        else{
            $('.pat').show();
            toastr.error('please select patient position');
        }
        if((skp != ''))
            bb = true;
        else{
            $('.skp').show();
            toastr.error('please select skin preparation');
        }
        if((csa != ''))
            jj = true;
        else{
            $('.csacheck').show();
            toastr.error('please select csa');
        }
        if(!document.getElementById('option-1').checked && !document.getElementById('option-2').checked && !document.getElementById('option-3').checked){ 
            $('.psn').show();
            toastr.error('please choose patient status'); 
        }
        else{
            cc = true;
        }
        var wearing = $('#wearing_mask').is(':checked');
        var sterile = $('#sterile_gown').is(':checked');
        var hand = $('#hand_washing').is(':checked');
        var drap = $('#sterile_draping').is(':checked');
        if(!(wearing) && !(sterile) && !(hand) && !(drap)){
            $('.asep').show();
            toastr.error('please select asepsis');
        }
        else{
            dd = true;
        }
        if((motor != ''))
            ee = true;
        else{
            $('.motro').show();
            toastr.error('please select motor level');
        }
        // var anal = $('.spinal_analgesia_supplement').is(':checked');
        // if(!(anal)){
        //     $('.supple').show();
        //     toastr.error('please select analgesia supplementation');
        // }
        // else{
        //     ff = true;
        // }
        // var tech = $('.tech_complication_check').is(':checked');
        // if(!(tech)){
        //     $('.techie').show();
        //     toastr.error('please select technical complications');
        // }
        // else{
        //     gg = true;
        // }
        // var acute = $('#acu').is(':checked');
        // if(!(acute)){
        //     $('.acuted').show();
        //     toastr.error('please select acute complications');
        // }
        // else{
        //     hh = true;
        // }
        if (!document.getElementById('com').checked && !document.getElementById('par').checked && !document.getElementById('fail').checked) { 
            $('.succes').show();
            toastr.error('please choose success status'); 
        }
        else{
            ii = true;
        }
        if((aa) && (bb) && (cc) && (dd) && (ee) && (ii) && (jj)){

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
            else {
                var formData = new FormData(this);
                formData.append('final1',final1);
    			formData.append('final2',final2);			
    			formData.append('final3',final3);			
    			formData.append('final4',final4);			
    			formData.append('final5',final5);			
    			formData.append('final6',final6);

                $(".Save").text("Submitting...");
                $(".Save").attr("disabled", true);

                $.ajax({
                    type : 'POST',
                    url : '<?php  echo base_url("labour-csa-procedure")?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response = jQuery.parseJSON(response);
                        
                        if(response.result==1){
                            toastr["success"](response.message);
                            $('#add_csa')[0].reset();   
                            window.location = '<?php echo base_url("labour/CSA_add_view")?>?id='+response.msg;     
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
