<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
 <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>

<section class="epidural">
<h3>Add Epidural</h3>
    <form id="add-epi">
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
                    <select class="form-control cnb_done_by1" id="done_by1" name="cnb_done_by1" onchange="selectcnb()" required>
                        <option value="" selected="selected">Select</option>
                        <!-- <option value="Consultant">Consultant</option>
                        <option value="Trainee">Trainee</option> -->
                    </select>
                    
                    <select class="form-control cnb_done_by2" id="done_by2"  style="margin: 15px 0;"  name="cnb_done_by2" required>
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
	<label>Patient status during Neuraxial Block<span class="mandat">*</span></label>&nbsp
    <small class="psn" style="color:red; display:none;">please choose patient status</small>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
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
                <div class="pts pt-2">
                    <select class="form-control" id="sed" name="sedation_if" style="width: 350px;" readonly>
                        <option value=''>Select</option>
                        <option>1-Mild easy to rouse</option>
                        <option>2-Moderate,easy to rouse,unable to remain awake</option>
                        <option>3-Difficult to rouse</option>
                    </select>
                </div>
                <?php if($ga  == 'Sole/Primary Anaesthetic') {?>
                <div class="form-check" style="display:none;">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="" name="" onclick="" >GA
                    </label>
                </div>
                <?php } else{ ?>
                    <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="GA" name="optradio" id="option-3" onclick="hide()" >GA
                    </label>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-4"></div>
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
                    <ul class="mb-0">
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
        <div class="row mb-2">
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
                <small class="skp" style="color:red; display:none;">please enter skin prep</small>
                <input type="text" class="form-control mt-3" style="display:none;" id="skin_prep_other" name="skin_prep_other">
            </div>
            <div class="col-sm-6"></div>
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
            <div class="col-sm-3"><label style="">Epidural Level</label></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-7"></div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control text-center epidural1" name="epidural_level" id="epidu" style="margin-bottom:10px;" readonly>
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control text-center spinal_level_input" name="epidural_type" id="epid_type" style="margin-bottom:10px;" readonly>
            </div>
        </div>
          <h5 style="position: relative;top: 179px;" class="epi-tag"><b>Click on the appropriate <br> Epidural level here</b></h5>
        <div class="row human-skeleton">
            <div class="col-sm-12">
                <img src="<?php echo base_url('public/assets/images/Lev.png'); ?>" class="img-fluid d-block mx-auto">
                <button type="button" class="btn q" id="c1-2" value="C1-2">C1-2</button>
                <button type="button" class="btn q" id="c2-3" value="C2-3">C2-3</button>
                <button type="button" class="btn q" id="c2-4" value="C3-4">C3-4</button>
                <button type="button" class="btn q" id="c2-5" value="C4-5">C4-5</button>
                <button type="button" class="btn q" id="c2-6" value="C5-6">C5-6</button>
                <button type="button" class="btn q" id="c2-7" value="C6-7">C6-7</button>
                <button type="button" class="btn q" id="c2-8" value="C7-T1">C7-T1</button>
                <button type="button" class="btn q" id="c2-9" value="T1-2">T1-2</button>
                <button type="button" class="btn q" id="c2-10" value="T2-3">T2-3</button>
                <button type="button" class="btn q" id="c2-11" value="T3-4">T3-4</button>
                <button type="button" class="btn q" id="c2-12" value="T4-5">T4-5</button>
                <button type="button" class="btn q" id="c2-13" value="T5-6">T5-6</button>
                <button type="button" class="btn q" id="c2-14" value="T6-7">T6-7</button>
                <button type="button" class="btn q" id="c2-15" value="T7-8">T7-8</button>
                <button type="button" class="btn q" id="c2-16" value="T8-9">T8-9</button>
                <button type="button" class="btn q" id="c2-17" value="T9-10">T9-10</button>
                <button type="button" class="btn q" id="c2-18" value="T10-11">T10-11</button>
                <button type="button" class="btn q" id="c2-19" value="T11-12">T11-12</button>
                <button type="button" class="btn q" id="c2-20" value="T12-L1">T12-L1</button>
                <button type="button" class="btn q" id="c2-21" value="L1-2">L1-2</button>
                <button type="button" class="btn q" id="c2-22" value="L2-3">L2-3</button>
                <button type="button" class="btn q" id="c2-23" value="L3-4">L3-4</button>
                <button type="button" class="btn q" id="c2-24" value="L4-5">L4-5</button>
                <button type="button" class="btn q" id="c2-25" value="L5-S1">L5-S1</button>
                <button type="button" class="btn q" id="c2-26" value="Caudal">Caudal</button>
            </div>
        </div><!--row-->
        <label>Ultrasound</label>
        <div class="row p-2">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="ultra_sound">
                    <input type="checkbox" class="switch_1" value="Yes" name="ultra_sound" id="ult" onclick="ultra()">
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
        <div class="ultrasound">
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
        <label class="pt-2">Needle Brand,Type and Size</label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Epidural Needle Brand</span>
                <div class="row pt-2">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <select class="form-control" name="needle_brand" id="need" onclick="needle()">
                            <option value=''>Select needle brand</option>
                            <?php
                                foreach($epidural_needle_brand as $key=>$master){
                            ?>
                            <option><?php echo $master['name']; ?></option>
                            <?php
                                }
                            ?>
                            <option>Other</option>
                        </select>
                        <div class="needle">
                            <input type="text" class="form-control" name="Other1" style="margin-top: 12px;">
                        </div>
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
                        <select class="form-control" name="needle_type" id="ty" onclick="type1()">
                            <option value=''>Select needle type</option>
                            <?php
                                foreach($epidural_needle_type as $key=>$master){
                            ?>
                            <option><?php echo $master['name']; ?></option>
                            <?php
                                }
                            ?>
                            <option>Other</option>
                        </select>
                        <div class="type">
                            <input type="text" class="form-control" name="other6" style="margin-top: 12px;">
                        </div>
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
                        <select class="form-control" id="size" name="needle_size">
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
                    <input type="checkbox" class="form-check-input" id="lor_sal" value="LOR Saline">LOR Saline
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="air" value="LOR Air">LOR Air
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="hang" value="Hanging Drop">Hanging Drop
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" style="margin-right:8px;">
                        <input type="checkbox" class="form-check-input" id="oth" onclick="other()">Other
                    </label>
                </div>
                <div class="other">
                    <div class="row">
                    <div class="col-sm-6" id="proced-plus" style="display:flex;">
                        <input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="others[]">
                        <button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-sm-6"></div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div><!--row-->
        <div class="row pt mb-2">
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
                <!-- <input type="number" class="form-control" name="no_attempts" id="no_attempts" onchange="attempts()"> -->
                <select class="form-control" name="no_attempts" id="no_attempts" onchange="attempts()">
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
                <small class="attempts" style="color:red; display:none;">please do not enter value more than 20</small>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label>Epidural Depth(cm)</label></div>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="epidral_depth">
            </div>
        </div><!--row-->
        <label class="pt-2">Technique</label>
        <div class="row mb-2">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="single" onclick="hide2()" value="Single Shot" name="optradio1">Single Shot
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="cath" onclick="catheter()" value="Catheter" name="optradio1">Catheter
                    </label>
                </div>
                <div class="catheter">
                    <div class="pt" style="display:flex;">
                        <span>Catheter mark at Skin (cm)</span>
                        <input type="number" class="form-control" name="cath_mark" style="width:30%;margin-left:20px;">
                    </div>
                </div>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label>Test Dose</label></div>
            <div class="col-sm-4">
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="test_dose">
                    <input type="checkbox" class="switch_1" value="Yes" name="test_dose">
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
        <div class="ptb"></div>
        <div class="row">
            <div class="col-sm-2"><label>Intra Operative LA Regimen</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="la_regimen">
                    <option value=''>Select</option>
                    <option>Continous Infusion</option>
                    <option>Intermittent Bolus</option>
                </select>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
       <!--  <label class="pt">Total Intra Operative LA & Adjuvant Consumption<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->
       <h5 class=""><b>Total Intra Operative LA & Adjuvant Consumption</b>
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
                <div class="pac-box">
                    <div class="pacu-1"><p>Ropivacaine</p></div>
                    <div class="pacu-1-x">
                        <select class="form-control" name="ropivacaine">
                            <option value=''>Select</option>
                            <option>Without Adrenaline</option>
                            <option>With Adrenaline</option>
                        </select>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="ropi_per" id="ropi_per" onkeyup="persentage('alert1')"><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="ropi_ml" id="ropi_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="ropi_mg" id="ropi_mg" ><span style="padding-top:5px;">mg</span>
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
                        <select class="form-control" name="bupivacaine">
                            <option value=''>Select</option>
                            <option>Without Adrenaline</option>
                            <option>With Adrenaline</option>
                        </select>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="bupi_per" id="bupi_per" onkeyup="persentage('alert2')"><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="bupi_ml" id="bupi_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="bupi_mg" id="bupi_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                    <i onclick="clean2()" class="fa fa-times" id="clear2" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
                </div><!--pac-box-->
                <div class="pac-box" id="persentage_tage1" style="padding:0; display:none;">
                    <div class="pacu-1"></div>
                    <div class="pacu-1-x"></div>
                    <div class="pacu-1">
                        <small style="color:red;text-align:center;">should be from 0 to 4</small>
                    </div>
                    <div class="pacu-1"></div>
                    <div class="pacu-1"></div>														
				</div>
                <div class="pac-box">
                    <div class="pacu-1"><p>Levobupivacaine</p></div>
                    <div class="pacu-1-x">
                        <select class="form-control" name="levobupivacaine">
                            <option value=''>Select</option>
                            <option>Without Adrenaline</option>
                            <option>With Adrenaline</option>
                        </select>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="levo_per" id="levo_per" onkeyup="persentage('alert3')"><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="levo_ml" id="levo_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="levo_mg" id="levo_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                    <i onclick="clean3()" class="fa fa-times" id="clear3" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
                </div><!--pac-box-->
                <div class="pac-box" id="persentage_tage2" style="padding:0; display:none;">
                    <div class="pacu-1"></div>
                    <div class="pacu-1-x"></div>
                    <div class="pacu-1">
                        <small style="color:red;text-align:center;">should be from 0 to 4</small>
                    </div>
                    <div class="pacu-1"></div>
                    <div class="pacu-1"></div>														
				</div>
                <div class="pac-box">
                    <div class="pacu-1"><p>Lignocaine</p></div>
                    <div class="pacu-1-x">
                        <select class="form-control" name="Lignocaine">
                            <option value=''>Select</option>
                            <option>Without Adrenaline</option>
                            <option>With Adrenaline</option>
                        </select>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="ligno_per" id="ligno_per" onkeyup="persentage('alert4')"><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="ligno_ml" id="ligno_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="ligno_mg" id="ligno_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                    <i onclick="clean4()" class="fa fa-times" id="clear4" title="clear" aria-hidden="true" style="margin-top: 10px; display:none; color:#1974A7;cursor: pointer;"></i>
                </div><!--pac-box-->
                <div class="pac-box" id="persentage_tage3" style="padding:0; display:none;">
                    <div class="pacu-1"></div>
                    <div class="pacu-1-x"></div>
                    <div class="pacu-1">
                        <small style="color:red;text-align:center;">should be from 0 to 4</small>
                    </div>
                    <div class="pacu-1"></div>
                    <div class="pacu-1"></div>														
				</div>
            </div><!--col-10-->
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
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
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="adju" onclick="adjuvant()">
                </div>
            </div>
        </div>
        <div class="adjuvant">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" id="opio" onclick="opioid()">Opioid
                        </label>
                    </div>
                    <div class="pt" id="proced-plus" style="">
                        <div class="opioid">
                            <div class="row" style="margin-left:3%;">
                                <div class="col-sm-5"><span>Opioid Name</span></div>
                                <div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="opioid_name[]"><button type="button" class="btn add2"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                            </div><!--row-->
                            <div class="row pt" style="margin-left:3%;">
                                <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                <div class="col-sm-7"><input type="number" class="form-control" name="opioid_dose[]"></div>
                            </div><!--row-->
                        </div>
                        <div class="row pt">
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="clon" onclick="Clonidne()">Clonidne with Dose(mcgm)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="clonidne" id="clon1" placeholder="mcgm" readonly></div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="dex" onclick="Dexmeditomidine()">Dexmeditomidine with Dose(mcgm)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="dexmeditomidine" id="dex1" placeholder="mcgm" readonly></div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="dexa" onclick="Dexamethasone()">Dexamethasone with Dose(mg)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="dexamethasone" id="dexa1" placeholder="mg" readonly></div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="tram" onclick="Tramadol()">Tramadol with Dose(mg)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="tramadol" id="tram1" placeholder="mg" readonly></div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="keta" onclick="ketamine()">Ketamine with dose(mg)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="ketamin" id="keta1" placeholder="mg" readonly></div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-5">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="mida" onclick="Midazolam()">Midazolam with dose(mg)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="midazolam" id="mida1" placeholder="mg" readonly></div>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="form-check-input" value="No" name="Other7">
                                        <input type="checkbox" class="form-check-input" value="Yes" name="Other7" id="oth1" onclick="other1()">Other
                                    </label>
                                </div>
                                <div class="other1">
                                    <div class="row pt">
                                        <div class="col-sm-4"><span>Adjuvant Name</span></div>
                                        <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="aj_name[]"> <button type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="row pt">
                                        <div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div>
                                        <div class="col-sm-7"><input type="number" class="form-control" name="aj_dose[]"></div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!--row-->
                    </div>
                </div><!--col-sm-10-->
            </div><!--row-->
        </div><!--adjuvant-->
	<h5 class="bt"></h5>
       <label class="pt">Analgesia supplementation required &nbsp;&nbsp;&nbsp; (<span id="analgesis"> NO </span>)
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
                    <input type="hidden" class="form-check-input" value="No" name="analgesia_none">
                    <input type="checkbox" class="switch_1" id="ana" onclick="analgesia()" value="Yes" name="analgesia_none">
                </div>
                <div class="analgesia">
                    <div class="analg-box">
                        <div class="form-check mt-0">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="in_analgesia">
								<input type="checkbox" class="form-check-input" value="Yes" id="in_analgesia" name="in_analgesia">Inhalation Analgesia
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="asr_iv_analgesia">
                                <input type="checkbox" class="form-check-input" value="Yes" name="asr_iv_analgesia" id="gesi" onclick="gesia()">IV Analgesia
                            </label>
                        </div>
                        <div class="gesia">
                            <div class="form-check" style="margin-left: 3%;">
                                <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="Opioids">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="Opioids" id="opi" onclick="opioids()">Opioids
                                </label>
                            </div>
                            <div class="opioids">
                                <div class="row pt" style="margin-left: 3%;">
                                    <div class="col-sm-5">
                                        <span>Opioid Name</span>
                                    </div>
                                    <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name[]"><button type="button" class="btn add4"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                                </div><!--row-->
                                <div class="row pt" style="margin-left: 3%;">
                                    <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                    <div class="col-sm-7"><input type="number" class="form-control op_remove" name="asr_opioid_dose[]"></div>
                                </div><!--row-->
                            </div><!--opioids ends-->
                            <div class="form-check" style="margin-left: 3%;">
                                <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="asr_multimode">
                                <input type="checkbox" class="form-check-input" value="Yes" id="asr_multimode" name="asr_multimode">Paracetamol / Anti-Inflammatories
                                </label>
                            </div>
                            <div class="form-check" style="margin-left: 3%;">
                                <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="Ketamine1">
                                <input type="checkbox" class="form-check-input" value="Yes" id="Ketamine1" name="Ketamine1">Ketamine
                                </label>
                            </div>
                            
                               <!--  <div class="form-check" style="margin-left: 5%;">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="Dexmedeto">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="Dexmedeto">Dexmedetomidine
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left: 5%;">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="Cloni">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="Cloni">Clonidine
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left: 5%;">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="Trama">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="Trama">Tramadol
                                    </label>
                                </div>
                                <div class="form-check" style="margin-left: 5%;">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="Magnes">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="Magnes">Magnesium
                                    </label>
                                </div> -->
                            <div class="form-check" style="margin-left: 3%;">
                                <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="adjunc" onclick="adjuncts()">Other IV Adjuncts
                                </label>
                            </div>
                            <div class="adjuncts">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label>Adjuvant Name</label></div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" id="asr_other_iv_name" name="asr_other_iv_name">
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                                <div class="row pt">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
                                    <div class="col-sm-4">
                                        <input type="number" class="form-control" id="asr_other_iv_dose" name="asr_other_iv_dose">
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </div><!--adjuncts ends-->
                        </div><!--gesia ends-->
                    </div><!--analg-box ends-->
                </div><!--analgesia ends-->
            </div><!--col-10-->
        </div><!--row-->
		<label class="pt">Technical complications <!-- <a href="#" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> --> &nbsp;&nbsp;&nbsp; (<span id="teche"> NO </span>)
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
                    <input type="hidden" class="form-check-input" value="No" name="tc_none">
                    <input type="checkbox" class="switch_1" id="tech" onclick="technical()" value="Yes" name="tc_none">
                </div>
                <div class="technical">
                    <div class="tech-compli">
                        <!-- <ul style="margin-bottom:0px;padding-left: 0;">    
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_none">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_none">None
                                    </label>
                                </div>
                            </li>
                        </ul> -->
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_equipment">
                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_equipment" name="tc_equipment">Equipment related
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_multiple">
                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_multiple" name="tc_multiple">Multiple attempts
                                    </label>
                                </div>
                            </li>
                         </ul>
                         <ul style="margin-bottom:0px;padding-left: 0;">   
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_2_anaestsetist">
                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_2_anaestsetist" name="tc_2_anaestsetist">2nd Anaesthetist
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_abondoned">
                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_abondoned" name="tc_abondoned">Technique abandoned/failure to find space
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">    
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_catheter">
                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_catheter" name="tc_catheter">Catheter related
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_other">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_other" id="othe" onclick="other2()">Other
                                    </label>
                                </div>
                            </li>
                            <li>
                                <input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" id="othe1" name="other4" readonly>
                            </li>
                        </ul>
                        
                    </div>
                </div><!--technical ends-->    
            </div>
        </div><!--row-->
        <label class="pt">Acute complications &nbsp;&nbsp;&nbsp; (<span id="acutes"> NO </span>)
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
                    <input type="hidden" class="form-check-input" value="No" name="ac_none">
                    <input type="checkbox" class="switch_1" id="acu" onclick="acute()" value="Yes" name="ac_none">
                </div>
                <div class="acute">
                    <!-- <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_none">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_none">None
                        </label>
                    </div> -->
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_last">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_last" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_radi_pain">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_radi_pain" name="ac_radi_pain">Radicular Pain (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_parestsesia">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_parestsesia" name="ac_parestsesia">Paresthesia(needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_bloody_tap">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_bloody_tap" name="ac_bloody_tap">Bloody Tap (needle/catheter)
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_intra_cath">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_intra_cath" name="ac_intra_cath">Intrathecal migration of epidural catheter
                        </label>
                    </div>
                   <!--  <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_wet_tap">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_wet_tap" name="ac_wet_tap">Wet Tap/dural puncture (needle/catheter)
                        </label>
                    </div> -->
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_hypoten">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_hypoten" name="ac_hypoten">Hypotension<!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="20% drop from baseline or SBP,90mmHg"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                        <input type="hidden" class="form-check-input" value="No" name="ac_nausea">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_nausea" name="ac_nausea">Nausea
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_vomit">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_vomit" name="ac_vomit">Vomiting
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_high_block">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_high_block" name="ac_high_block">High Block <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_sb_block">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_sb_block" name="ac_sb_block">Subdural Block
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_total_spinal">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_total_spinal" name="ac_total_spinal">Total Spinal<!--  <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_re_arrest">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_re_arrest" name="ac_re_arrest">Respiratory Arrest
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_ca_arrest">
                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_ca_arrest" name="ac_ca_arrest">Cardiac Arrest
                        </label>
                    </div>
                    <div class="form-check" style="display: flex;">
                        <label class="form-check-label pr-2">
                        <input type="hidden" class="form-check-input" value="No" name="ac_other">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_other" id="ot" onclick="other3()">Other
                        </label>
                        <input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="other5" id="ot1" style="width: 30%;" readonly>
                    </div>
                   <!--  <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_ep_resited">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_ep_resited">Epidural re-sited
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_wet_tap">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_wet_tap">Wet Tap/Dural puncture (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_motor_block">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_motor_block">Motor Block
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_adp">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_adp">Accidental Dural Puncture
                        </label>
                    </div> -->
                </div><!--acute ends-->
            </div>
        </div><!--row-->
        <label class="pt">Success<span class="mandat">*</span><!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade."><i class="fa fa-info-circle" aria-hidden="true"></i></a>
         -->
         <div class="tooltip-6">
           <i class="fa fa-info-circle" aria-hidden="true"></i>
            <div class="right-6">
                <div class="text-content-6">
                     <h6>Please consider the purpose of CNB along with the below definition. <br><br> Purpose of CNB : <br> 1. Sole/Primary anaesthetic <br> 2. Analgesic purpose only<br><br>Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade.</h6>
                    <i></i>
                </div>
            </div>
        </div>  
         &nbsp;<small class="succes" style="color:red; display:none;">please choose success status</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-6">
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="com" value="Complete Success" name="optradio2" onclick="complete()">Complete Success<!-- <a href="#" class="tip" data-toggle="tooltip"  title="Complete Success: With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                    <div class="tooltip-7">
                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <div class="right-7">
                            <div class="text-content-7">
                                <h6><b>Complete Success:</b> <br>With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.<br><br>Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.<br><br>If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <ul class="success-list pt-2">
                    <li>Onset</li>
                    <li><input type="number" class="form-control" name="comp1" id="com1" readonly></li>
                    <li>(Mins)</li>
                </ul>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" id="par" value="Partial Success" name="optradio2" onclick="partial()">Partial Success<!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Partial Succes: With the above block success definition being satisfied, the purpose of CNB is being met with some additional intravenous analgesics / inhalationals including but not restricted to LA infiltration, opioids, ketamine, hypnotics.If used as analgesic purpose only, the cumulative intra-operative and postoperative pain and opioids requirements are moderate."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                    <div class="tooltip-8">
                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <div class="right-8">
                            <div class="text-content-8">
                               <h6><b>Partial Succes</b>:<br> With the above block success definition being satisfied, the purpose of CNB is being met with some additional intravenous analgesics / inhalationals including but not restricted to LA infiltration , opioids , ketamine , hypnotics.<br><br>If used as analgesic purpose only, the cumulative intra-operative and postoperative pain and opioids requirements are moderate.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <ul class="success-list pt-2">
                    <li>Onset</li>
                    <li><input type="number" class="form-control" name="part" id="par1" readonly></li>
                    <li>(Mins)</li>
                </ul>
                <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="Failure" name="optradio2" id="fail" onclick="failure()">Failure<!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Failure: Defined as failure to enter the required space, failure to achieve required sensory /motor block. Conversion to GA or very high opioid/ ketamine or hypnotic requirements."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                    <div class="tooltip-9">
                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <div class="right-9">
                            <div class="text-content-9">
                                <h6><b>Failure:</b> <br> Defined as failure to enter the required space, failure to achieve required sensory /motor block. Conversion to GA or very high opioid/ ketamine or hypnotic requirements.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div><!--row-->
        <label class="pt">Sensory Level<span class="mandat">*</span><!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Content not provided"><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label>
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
            <div class="col-sm-7">
                <select class="form-control" name="motor_level" id="motor_level" onchange="checkmotor()">
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
        <div class="duration">
            <ul>
                <li><label>Onset of surgical Anaesthesia</label></li>
                <li><input type="number" class="form-control" name="surgical_anaesthesia"></li>
                <li><label>mins</label></li>
            </ul>
        </div><!--row-->
        <div class="duration">
            <ul>
                <li><label>Duration of Surgery</label></li>
                <li><input type="number" class="form-control" name="surgery_duration"></li>
                <li><label>mins</label></li>
            </ul>
        </div><!--row-->
        <div class="duration">
            <ul>
                <li><label>Blood Loss</label></li>
                <li><input type="number" class="form-control" name="blood_loss"></li>
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
            <div class="col-sm-9"></div>
            <div class="col-sm-3">
                <button type="submit" class="btn-save Save">Save</button>
                <!-- <button type="button" class="btn-close">Reset</button> -->
            </div>
        </div><!--row-->
	</form>
</section><!--epidural-->

<script>
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
        
        var subjectSel = document.getElementById("done_by1");
        var topicSel = document.getElementById("done_by2");
        

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

        // alert('work');
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
    $('.other').hide();
    $('.catheter').hide();
    $('.adjuvant').hide();
    $('.opioid').hide();
    $('.other1').hide();
    $('.analgesia').hide();
    $('.gesia').hide();
    $('.opioids').hide();
   // $('.multianal').hide();
    $('.adjuncts').hide();
    $('.technical').hide();
    $('.acute').hide();
});
$(document).ready(function(){
    var i=1;
    var j=1;
    var k=1;
    var l=1;
    $(".add1").click(function(){
        if(i<3){
            i++;
		    $(".other").append('<div class="row pt"><div class="col-sm-6" id="proced-plus" style="display:flex;"><input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="others[]"><button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-6"></div></div>');
        }
    });
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".opioid").append('<div class="row1 pt"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="opioid_name[]"><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="opioid_dose[]"></div></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".other1").append('<div class="row2"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="aj_name[]"><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
        }
    });
    $(".add4").click(function(){
        if(l<3){
            l++;
		    $(".opioids").append('<div class="row3"><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control op_remove" name="asr_opioid_dose[]"></div></div></div>');
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
});
function persentage(type){
    var limit = $('#ropi_per').val();
    var limit1 = $('#bupi_per').val();
    var limit2 = $('#levo_per').val();
    var limit3 = $('#ligno_per').val();

    if(type == 'alert1'){
        if((limit >= -1 && limit <= 4) && limit != ''){			
            $('#persentage_tage').hide();
            $('#ropi_per').css('border-color','').css('background','');
        }else{	
            $('#ropi_per').val('');		
            $('#persentage_tage').show();
            toastr.error('should be from 0 to 4');
            // $('#ropi_per').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert2'){
        if((limit1 >= -1 && limit1 <= 4) && limit1 != ''){			
            $('#persentage_tage1').hide();
            $('#bupi_per').css('border-color','').css('background','');

        }else{	
            $('#bupi_per').val('');		
            $('#persentage_tage1').show();
            toastr.error('should be from 0 to 4');
            // $('#bupi_per').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert3'){
        if((limit2 >= -1 && limit2 <= 4) && limit2 != ''){			
            $('#persentage_tage2').hide();
            $('#levo_per').css('border-color','').css('background','');
        }else{	
            $('#levo_per').val('');		
            $('#persentage_tage2').show();
            toastr.error('should be from 0 to 4');
            // $('#levo_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert4'){
        if((limit3 >= -1 && limit3 <= 4) && limit3 != ''){			
            $('#persentage_tage3').hide();
            $('#ligno_per').css('border-color','').css('background','');

        }else{			
            $('#ligno_per').val('');
            $('#persentage_tage3').show();
            toastr.error('should be from 0 to 4');
            // $('#ligno_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }		
}
$(".q"). click(function() {
    var button = $(this).val();
    $(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");
    $('#epidu').val(button);
    var firstChar = button.charAt(0);
    if(firstChar == 'C'){
        $('#epid_type').val('Cervical');
    }
    if(firstChar == 'T'){
        $('#epid_type').val('Thoracic');
    }
    if(firstChar == 'L'){
        $('#epid_type').val('Lumbar');
    }
    if(button == 'Caudal'){
        $('#epid_type').val('Caudal');
    }
});
$('#ropi_per').focusout(function(){
    var r_per = $('#ropi_per').val();
    var r_mg = $('#ropi_mg').val();
    var r_ml = $('#ropi_ml').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var cc =(r_per*bb);
        $('#ropi_mg').val(cc);
        $('#clear1').show();
        $("#ropi_per").attr("readonly", true);
        $("#ropi_ml").attr("readonly", true);
        $("#ropi_mg").attr("readonly", true);
    }
    else if(r_per && r_mg){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('#ropi_ml').val(r_total);
        $('#clear1').show();
        $("#ropi_per").attr("readonly", true);
        $("#ropi_ml").attr("readonly", true);
        $("#ropi_mg").attr("readonly", true);
    }
});
$('#ropi_ml').focusout(function(){
    var r_ml = $('#ropi_ml').val();
    var r_mg = $('#ropi_mg').val();
    var r_per = $('#ropi_per').val(); 
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var cc =(r_per*bb);
        $('#ropi_mg').val(cc);
        $('#clear1').show();
        $("#ropi_per").attr("readonly", true);
        $("#ropi_ml").attr("readonly", true);
        $("#ropi_mg").attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var cc = (r_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#ropi_per').val(cc);
            $('#clear1').show();
            $("#ropi_per").attr("readonly", true);
            $("#ropi_ml").attr("readonly", true);
            $("#ropi_mg").attr("readonly", true);
        }
    }
});
$('#ropi_mg').focusout(function(){
    var r_ml = $('#ropi_ml').val();
    var r_mg = $('#ropi_mg').val();
    var r_per = $('#ropi_per').val(); 
    if(r_mg && r_per){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('#ropi_ml').val(r_total);
        $('#clear1').show();
        $("#ropi_per").attr("readonly", true);
        $("#ropi_ml").attr("readonly", true);
        $("#ropi_mg").attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var cc = (r_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#ropi_per').val(cc);
            $('#clear1').show();
            $("#ropi_per").attr("readonly", true);
            $("#ropi_ml").attr("readonly", true);
            $("#ropi_mg").attr("readonly", true);
        }
    }
});
function clean1(){
    $('#ropi_per').val('');
    $('#ropi_ml').val('');
    $('#ropi_mg').val('');
    $('#ropi_per').removeAttr("readonly");
    $('#ropi_ml').removeAttr("readonly");
    $('#ropi_mg').removeAttr("readonly");
    $('#clear1').hide();
}
$('#bupi_per').focusout(function(){
    var b_per = $('#bupi_per').val();
    var b_mg = $('#bupi_mg').val();
    var b_ml = $('#bupi_ml').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var cc =(b_per*bb);
        $('#bupi_mg').val(cc);
        $('#clear2').show();
        $("#bupi_per").attr("readonly", true);
        $("#bupi_ml").attr("readonly", true);
        $("#bupi_mg").attr("readonly", true);
    }
    else if(b_per && b_mg){
        var aa = b_mg/b_per;
        var r_total = aa/10;
        $('#bupi_ml').val(r_total);
        $('#clear2').show();
        $("#bupi_per").attr("readonly", true);
        $("#bupi_ml").attr("readonly", true);
        $("#bupi_mg").attr("readonly", true);
    }
});
$('#bupi_ml').focusout(function(){
    var b_ml = $('#bupi_ml').val();
    var b_mg = $('#bupi_mg').val();
    var b_per = $('#bupi_per').val(); 
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var cc =(b_per*bb);
        $('#bupi_mg').val(cc);
        $('#clear2').show();
        $("#bupi_per").attr("readonly", true);
        $("#bupi_ml").attr("readonly", true);
        $("#bupi_mg").attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var cc = (b_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#bupi_per').val(cc);
            $('#clear2').show();
            $("#bupi_per").attr("readonly", true);
            $("#bupi_ml").attr("readonly", true);
            $("#bupi_mg").attr("readonly", true);
        }
    }
});
$('#bupi_mg').focusout(function(){
    var b_ml = $('#bupi_ml').val();
    var b_mg = $('#bupi_mg').val();
    var b_per = $('#bupi_per').val(); 
    if(b_mg && b_per){
        var aa = b_mg/b_per;
        var r_total = aa/10;
        $('#bupi_ml').val(r_total);
        $('#clear2').show();
        $("#bupi_per").attr("readonly", true);
        $("#bupi_ml").attr("readonly", true);
        $("#bupi_mg").attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var cc = (b_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#bupi_per').val(cc);
            $('#clear2').show();
            $("#bupi_per").attr("readonly", true);
            $("#bupi_ml").attr("readonly", true);
            $("#bupi_mg").attr("readonly", true);
        }
    }
});
function clean2(){
    $('#bupi_per').val('');
    $('#bupi_ml').val('');
    $('#bupi_mg').val('');
    $('#bupi_per').removeAttr("readonly");
    $('#bupi_ml').removeAttr("readonly");
    $('#bupi_mg').removeAttr("readonly");
    $('#clear2').hide();
}
$('#levo_per').focusout(function(){
    var l_per = $('#levo_per').val();
    var l_mg = $('#levo_mg').val();
    var l_ml = $('#levo_ml').val();
    if(l_per && l_ml){
        var bb = (l_ml)*10;
        var cc =(l_per*bb);
        $('#levo_mg').val(cc);
        $('#clear3').show();
        $("#levo_per").attr("readonly", true);
        $("#levo_ml").attr("readonly", true);
        $("#levo_mg").attr("readonly", true);
    }
    else if(l_per && l_mg){
        var aa = l_mg/l_per;
        var r_total = aa/10;
        $('#levo_ml').val(r_total);
        $('#clear3').show();
        $("#levo_per").attr("readonly", true);
        $("#levo_ml").attr("readonly", true);
        $("#levo_mg").attr("readonly", true);
    }
});
$('#levo_ml').focusout(function(){
    var l_ml = $('#levo_ml').val();
    var l_mg = $('#levo_mg').val();
    var l_per = $('#levo_per').val(); 
    if(l_per && l_ml){
        var bb = (l_ml)*10;
        var cc =(l_per*bb);
        $('#levo_mg').val(cc);
        $('#clear3').show();
        $("#levo_per").attr("readonly", true);
        $("#levo_ml").attr("readonly", true);
        $("#levo_mg").attr("readonly", true);
    }
    else if(l_mg && l_ml){
        var bb = (l_ml)*10;
        var cc = (l_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#levo_per').val(cc);
            $('#clear3').show();
            $("#levo_per").attr("readonly", true);
            $("#levo_ml").attr("readonly", true);
            $("#levo_mg").attr("readonly", true);
        }
    }
});
$('#levo_mg').focusout(function(){
    var l_ml = $('#levo_ml').val();
    var l_mg = $('#levo_mg').val();
    var l_per = $('#levo_per').val(); 
    if(l_mg && l_per){
        var aa = l_mg/l_per;
        var r_total = aa/10;
        $('#levo_ml').val(r_total);
        $('#clear3').show();
        $("#levo_per").attr("readonly", true);
        $("#levo_ml").attr("readonly", true);
        $("#levo_mg").attr("readonly", true);
    }
    else if(l_mg && l_ml){
        var bb = (l_ml)*10;
        var cc = (l_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#levo_per').val(cc);
            $('#clear3').show();
            $("#levo_per").attr("readonly", true);
            $("#levo_ml").attr("readonly", true);
            $("#levo_mg").attr("readonly", true);
        }
    }
});
function clean3(){
    $('#levo_per').val('');
    $('#levo_ml').val('');
    $('#levo_mg').val('');
    $('#levo_per').removeAttr("readonly");
    $('#levo_ml').removeAttr("readonly");
    $('#levo_mg').removeAttr("readonly");
    $('#clear3').hide();
}
$('#ligno_per').focusout(function(){
    var li_per = $('#ligno_per').val();
    var li_mg = $('#ligno_mg').val();
    var li_ml = $('#ligno_ml').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var cc =(li_per*bb);
        $('#ligno_mg').val(cc);
        $('#clear4').show();
        $("#ligno_per").attr("readonly", true);
        $("#ligno_ml").attr("readonly", true);
        $("#ligno_mg").attr("readonly", true);
    }
    else if(li_per && li_mg){
        var aa = li_mg/li_per;
        var r_total = aa/10;
        $('#ligno_ml').val(r_total);
        $('#clear4').show();
        $("#ligno_per").attr("readonly", true);
        $("#ligno_ml").attr("readonly", true);
        $("#ligno_mg").attr("readonly", true);
    }
});
$('#ligno_ml').focusout(function(){
    var li_ml = $('#ligno_ml').val();
    var li_mg = $('#ligno_mg').val();
    var li_per = $('#ligno_per').val(); 
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var cc =(li_per*bb);
        $('#ligno_mg').val(cc);
        $('#clear4').show();
        $("#ligno_per").attr("readonly", true);
        $("#ligno_ml").attr("readonly", true);
        $("#ligno_mg").attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var cc = (li_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#ligno_per').val(cc);
            $('#clear4').show();
            $("#ligno_per").attr("readonly", true);
            $("#ligno_ml").attr("readonly", true);
            $("#ligno_mg").attr("readonly", true);
        }
    }
});
$('#ligno_mg').focusout(function(){
    var li_ml = $('#ligno_ml').val();
    var li_mg = $('#ligno_mg').val();
    var li_per = $('#ligno_per').val(); 
    if(li_mg && li_per){
        var aa = li_mg/li_per;
        var r_total = aa/10;
        $('#ligno_ml').val(r_total);
        $('#clear4').show();
        $("#ligno_per").attr("readonly", true);
        $("#ligno_ml").attr("readonly", true);
        $("#ligno_mg").attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var cc = (li_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#ligno_per').val(cc);
            $('#clear4').show();
            $("#ligno_per").attr("readonly", true);
            $("#ligno_ml").attr("readonly", true);
            $("#ligno_mg").attr("readonly", true);
        }
    }
});
function clean4(){
    $('#ligno_per').val('');
    $('#ligno_ml').val('');
    $('#ligno_mg').val('');
    $('#ligno_per').removeAttr("readonly");
    $('#ligno_ml').removeAttr("readonly");
    $('#ligno_mg').removeAttr("readonly");
    $('#clear4').hide();
}
function attempts(){
    var att = $('#no_attempts').val();
    if(att>20){
        $('.attempts').show();
        toastr.error('please do not enter value more than 20');
    }
    else
        $('.attempts').hide();
}
function show(){
    $(".pts").show();
    $('#sed').removeAttr("readonly");
}
function hide(){
    $(".pts").hide();
}
function hide2(){
    $('.catheter').hide();
    $( "#cath" ).prop("checked", false);
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
function other(){
    var oth = $('#oth').is(':checked');
    if(!oth){
        $('.other').hide();
    }
    else{
        $(".other").show();
    }
}
function catheter(){
    $('.catheter').show();
    $("#single").prop( "checked", false);
}

function adjuvant(){ 
    var adju = $('#adju').is(':checked');
    if(!adju){

        var Opioid = $('#opio').is(':checked');
        var epidural_clonidne = $('#clon').is(':checked');
        var epidural_dexme = $('#dex').is(':checked');
       
        var epidural_dexamethasone = $('#dexa').is(':checked');

        var epidural_trama = $('#tram').is(':checked');

        var epidural_ketamine = $('#keta').is(':checked');
        var epidural_midazolam = $('#mida').is(':checked');
        var epidural_adrenaline = $('#adre').is(':checked');
        var epidural_other = $('#oth1').is(':checked');

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
            $('.adjuvant').hide();
        }
    }else{
        $('.adjuvant').show();
    }
    
}

function opioid(){
    var opio = $('#opio').is(':checked');
    if(!opio){
        $('.opioid').hide();
    }
    else{
        $(".opioid").show();
    }
}
function other1(){
    var oth1 = $('#oth1').is(':checked');
    if(!oth1){
        $('.other1').hide();
    }
    else{
        $(".other1").show();
    }
}
function Clonidne(){
    var clon = $('#clon').is(':checked');
    if(!clon){
        $("#clon1").attr("readonly", true);
    }
    else{
        $('#clon1').removeAttr("readonly");
    }
}
function Dexmeditomidine(){
    var dex = $('#dex').is(':checked');
    if(!dex){
        $("#dex1").attr("readonly", true);
    }
    else{
        $('#dex1').removeAttr("readonly");
    }
}
function Dexamethasone(){
    var dexa = $('#dexa').is(':checked');
    if(!dexa){
        $("#dexa1").attr("readonly", true);
    }
    else{
        $('#dexa1').removeAttr("readonly");
    }
}
function Tramadol(){
    var tram = $('#tram').is(':checked');
    if(!tram){
        $("#tram1").attr("readonly", true);
    }
    else{
        $('#tram1').removeAttr("readonly");
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
function Midazolam(){
    var mida = $('#mida').is(':checked');
    if(!mida){
        $("#mida1").attr("readonly", true);
    }
    else{
        $('#mida1').removeAttr("readonly");
    }
}
// function analgesia(){
//     var ana = $('#ana').is(':checked');
//     if(!ana){
//         $('.analgesia').hide();
//         $("#analgesis").text(' NO ');
//         $('#in_analgesia').prop("checked",false);
//         $('#gesi').prop("checked",false);
//         $('#opi').prop("checked",false);
//         $('#asr_multimode').prop("checked",false);
//         $('#Ketamine1').prop("checked",false);
//         $('#adjunc').prop("checked",false);
//         $('.op_remove').val('');
//         $('#asr_other_iv_name').val('');
//         $('#asr_other_iv_dose').val('');
//         $('.gesia').hide();
//         $('.opioids').hide();
//         $('.adjuncts').hide();
//     }
//     else{
//         $(".analgesia").show();
//         $("#analgesis").text(' YES ');
//     }
// }

function analgesia(){
    var ana = $('#ana').is(':checked');
    if(!ana){
        var asr_spinal_inhalation = $('#in_analgesia').is(':checked');
        var spinal_iv_analgesia = $('#gesi').is(':checked');
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
            $('#in_analgesia').prop("checked",false);
            $('#gesi').prop("checked",false);
            $('#opi').prop("checked",false);
            $('#multi').prop("checked",false);
            $('#Ketamine1').prop("checked",false);
            $('#adjunc').prop("checked",false);
            $('.op_remove').val('');
            $('#asr_other_iv_name').val('');
            $('#asr_other_iv_dose').val('');
            $('.gesia').hide();
            $('.opioids').hide();
            $('.adjuncts').hide();
        }
    }
    else{
        $(".analgesia").show();
        $("#analgesis").text(' YES ');
    }
}

function gesia(){
    var gesi = $('#gesi').is(':checked');
    if(!gesi){
        $('.gesia').hide();
    }
    else{
        $(".gesia").show();
    }
}
function opioids(){
    var opi = $('#opi').is(':checked');
    if(!opi){
        $('.opioids').hide();
    }
    else{
        $(".opioids").show();
    }
}

function adjuncts(){
    var adjunc = $('#adjunc').is(':checked');
    if(!adjunc){
        $('.adjuncts').hide();
    }
    else{
        $(".adjuncts").show();
    }
}

function technical(){
    var tech = $('#tech').is(':checked');

    var tc_equipment = $('#tc_equipment').is(':checked');
    var tc_multiple = $('#tc_multiple').is(':checked');
    var tc_2_anaestsetist = $('#tc_2_anaestsetist').is(':checked');
    var tc_abondoned = $('#tc_abondoned').is(':checked');
    var tc_catheter = $('#tc_catheter').is(':checked');

    var othe = $('#othe').is(':checked');

    if(!tech){
        if(tc_equipment){
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
        else if(tc_catheter){
            toastr.error('Please Uncheck Catheter related');
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

function other2(){
    var othe = $('#othe').is(':checked');
    if(!othe){
        $("#othe1").attr("readonly", true);
    }
    else{
        $('#othe1').removeAttr("readonly");
    }
}

function acute(){
    var acu = $('#acu').is(':checked'); 
    if(!acu){

        var ac_radicular_pain = $('#ac_radi_pain').is(':checked');
        var ac_paresthesia_pain = $('#ac_parestsesia').is(':checked'); 
        var ac_last = $('#ac_last').is(':checked'); 

        
        var ac_bloody_tap = $('#ac_bloody_tap').is(':checked');
        var ac_hypotension = $('#ac_hypoten').is(':checked');
        var ac_nausea = $('#ac_nausea').is(':checked');
        var ac_vomiting = $('#ac_vomit').is(':checked');
        var ac_high_block = $('#ac_high_block').is(':checked');
        var ac_subdural_block = $('#ac_sb_block').is(':checked');
        var ac_total_spinal = $('#ac_total_spinal').is(':checked');
        var ac_respi_arrest = $('#ac_re_arrest').is(':checked'); 

        var ac_cardiac_arrest = $('#ac_ca_arrest').is(':checked');
        var maternal_fever = $('#maternal_fever').is(':checked');
        var ac_intra_cath = $('#ac_intra_cath').is(':checked');
        var ot = $('#ot').is(':checked');
        if(ac_last){

            // toastr.error('please choose patient status');

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
        else if(ac_intra_cath){
            toastr.error('Please Uncheck Intrathecal migration of epidural catheter');
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

function other3(){
    var ot = $('#ot').is(':checked');
    if(!ot){
        $("#ot1").attr("readonly", true);
    }
    else{
        $('#ot1').removeAttr("readonly");
    }
}
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
    $("input[name='optradio2']").change(function(){
		$('.succes').hide();
	});
    function checkpos(){
		var pos = $('#patient_pos').val();
		if((pos != '')){
			$('.pat').hide();
		}
	}
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
    function checkmotor(){
		var mot = $('#motor_level').val();
		if((mot != '')){
			$('.motro').hide();
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
    
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#add-epi').submit(function(e){
		e.preventDefault();
        var aa = '', bb = '', cc = '', dd = '', ee = '', ii = '';
        var pat_pos = $('#patient_pos').val();
        var skp = $('#skin_prep').val();
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
        if(!document.getElementById('option-1').checked && !document.getElementById('option-2').checked){ 
			if(document.getElementById('option-3').checked){
                cc = true;
            }else{
                $('.psn').show();
                toastr.error('please choose patient status');
            }
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

        if (!document.getElementById('com').checked && !document.getElementById('par').checked && !document.getElementById('fail').checked) { 
			$('.succes').show();
			toastr.error('please choose success status'); 
		}
		else{
			ii = true;
        }
        var lor_sal = '', air = '', hang = '';
        var xx = $('#lor_sal').is(':checked');
        var yy = $('#air').is(':checked');
        var zz = $('#hang').is(':checked');
        if(xx){
            lor_sal = $('#lor_sal').val();
        }
        if(yy){
            air = $('#air').val();
        }
        if(zz){
            hang = $('#hang').val();
        }
        if((aa) && (bb) && (cc) && (dd) && (ee) && (ii)){

            var i = 0;
            if(final1[1] == 'red' || final1[3] == 'green'|| final2[1] == 'red' || 
                final2[3] == 'green'){
                if(final1[1] != 'red' || final1[3] != 'green') {
                    i = 1;
                } 
                if(final2[1] != 'red' || final2[3] != 'green'){
                    i = 1;
                }
            }

            if(final3[1] == 'red' || final3[3] == 'green'|| final4[1] == 'red' ||final4[3] == 'green'){ 
                if(final3[1] != 'red' || final3[3] != 'green') {
                    i = 1;
                } 
                if(final4[1] != 'red' || final4[3] != 'green'){
                    
                    i = 1;
                }
            }

            if(final5[1] == 'red' || final5[3] == 'green'|| final6[1] == 'red' ||
                final6[3] == 'green'){ 
                if(final5[1] != 'red' || final5[3] != 'green') {
                    i = 1;
                } 
                if(final6[1] != 'red' || final6[3] != 'green'){
                    
                    i = 1;
                }
            }
            if(final1 == '' && final2 == '' && final3 == '' && final4 == '' && final5 == '' && final6 == ''){
                i = 1;
            }
            if(i == 1){
                toastr.error('Sensory Levels are incomplete.. Please enter Highest and lowest level...');
            }else{
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
                    url : '<?php  echo base_url("addEpi")?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response = jQuery.parseJSON(response);
                        if(response.result==1){
                            toastr["success"](response.message);
                            $('#add-epi')[0].reset();   
                            window.location = '<?php echo base_url("cnb/EpiDetails")?>?id='+response.msg;     
                        }
                        else
                            toastr["error"](response.message);
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
    minDate:0
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
    echo view('includes/footer');    
?>
<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
	}
</style>
