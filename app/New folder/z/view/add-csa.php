<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>
<section class="epidural">
<h3>Add CSA - Continous Spinal Anaesthesia</h3>
    <form id="add_csa">
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
                <div class="pts">
                    <select class="form-control" id="sed" name="sedation_if" readonly>
                        <option value=''>Select</option>
                        <option>1-Mild easy to rouse</option>
                        <option>2-Moderate,easy to rouse,unable to remain awake</option>
                        <option>3-Difficult to rouse</option>
                    </select>
                </div>
                <?php if($ga  == 'Sole/Primary Anaesthetic') {?>
                <div class="form-check" style="display:none;">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="GA" name="optradio" onclick="hide()" >GA
                    </label>
                </div>
                <?php } else{ ?>
                    <div class="form-check">
                    <label class="form-check-label">
                    <input type="radio" class="form-check-input" value="GA" name="optradio" onclick="hide()" >GA
                    </label>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-4"></div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label style="font-size:13px;">Patient Position<span class="mandat">*</span></label></div>
            <div class="col-sm-4">
                <select class="form-control" id="patient_pos" name="patient_pos" onfocusout="checkpos()">
                    <option>Select</option>
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
                    <ul>
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
                <select class="form-control" id="skin_prep" name="skin_prep" onfocusout="checkskin()">
                    <option>Select</option>
                    <option>Alcohol</option>
                    <option>Chlorhexidine</option>
                    <option>Betadine</option>
                    <option>Combinations</option>
                    <option>Other</option>
                </select>
                <small class="skp" style="color:red; display:none;">please enter skin prep</small>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->    
        <div class="row pt">
            <div class="col-sm-2"><span><b>CSA</b><span class="mandat">*</span></span></div>
            <div class="col-sm-4">
                <select class="form-control" name="csa">
                    <option>Select</option>
                    <option>Accidental</option>
                    <option>Intentional</option>
                </select>
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
        <label><b>Ultrasound</b></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="ultrasoun">
                    <input type="checkbox" class="switch_1" id="ult" value="Yes" name="ultrasoun" onclick="ultra()">
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
                        <option>Select probe cover</option>
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
                        <option>Select image quality</option>
                        <option>Good</option>
                        <option>Average</option>
                        <option>Poor</option>
                    </select>
                </div>
                <div class="col-sm-4"></div>
            </div><!--row-->
        </div>
        <div class="row pt">
            <div class="col-sm-3"><h5 style="font-weight:bold;">CSA Spinal Level</h5></div>
            <div class="col-sm-2">
                <input type="text" class="form-control text-center" id="epidu" name="csa_spinal_level" readonly>
            </div>
            <div class="col-sm-3">
                <input type="text" class="form-control text-center" id="csa_type" name="csa_spinal_level_name" readonly>
            </div>
            <div class="col-sm-4"></div>
        </div><!--row-->
        <div class="row human-skeleton pt-3">
            <div class="col-sm-12">
                <img src="assets/images/Spinal-new-img.png" class="img-fluid d-block mx-auto">
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
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Spinal Needle Brand</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <select class="form-control" id="need" name="needle_brand" onclick="needle()">
                            <option>Select needle brand</option>
                            <option>B-Braun</option>
                            <option>Vygon</option>
                            <option>Polymed</option>
                            <option>Portex</option>
                            <option>Top</option>
                            <option>BD</option>
                            <option>Parjunk</option>
                            <option>Romsons</option>
                            <option>Other</option>
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
                    <div class="col-sm-4">
                        <select class="form-control" id="ty" name="needle_type" onclick="type1()">
                            <option>Select needle type</option>
                            <option>Touhy</option>
                            <option>Crawford</option>
                            <option>Hustead</option>
                            <option>Other</option>
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
                    <div class="col-sm-4">
                        <select class="form-control" name="needle_size">
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
                    <option>Select</option>
                    <option>Midline</option>
                    <option>Paramedian</option>
                </select>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label>Number Of Attempts</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="no_attempts">
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
        <div class="row">
            <div class="col-sm-3"><label>Select Spinal Catheter Type</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="catheter_type">
                    <option>Select</option>
                    <option>Epidural Catheter</option>
                    <option>Micro Catheter</option>
                </select>
            </div>
            <div class="col-sm-5"></div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-3"><label>Catheter mark at skin(cm)</label></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="catheter_skin_mark">
            </div>
            <div class="col-sm-6"></div>
        </div><!--row--><br>
        <div class="row">
            <div class="col-sm-2"><label>Intra Operative LA Regimen</label></div>
            <div class="col-sm-4">
                <select class="form-control" name="la_regimen">
                    <option>Select</option>
                    <option>Continous Infusion</option>
                    <option>Intermitten Bolus</option>
                </select>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
       <!--  <h5 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption<a href="#" data-toggle="tooltip"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></b></h5> -->
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
                
                <div class="procedure-cse spinal_anaesthe_box">
                    <span class="mb-2"><b>Local Anaesthetic</b></span>
                        <div class="pac-box">
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
                        <div class="pac-box">
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
                        <div class="pac-box">
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
                        <div class="pac-box">
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
                        <div class="pac-box">
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
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="spinal_anaesth_other">
                                <input type="checkbox" class="form-check-input spinal_anaesth_other" value="Yes" name="spinal_anaesth_other" >Other
                            </label>
                        </div>
                        <div class="pac-box spinal_anaesth_other_option" style="display:none;">
                            <div class="pacu-1"><p>Name</p></div>
                            <div class="pacu-1-x">
                                <!-- <input type="text" class="form-control spinal_anaesth_other_input" name="spinal_other_input6"> -->
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
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <label><b>Adjuvant</b></label>
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="ajuvant_status">
                    <input type="checkbox" class="switch_1 epidural_adjuvant" value="Yes" name="ajuvant_status" onclick="epidural_adjuvant()">
                </div>
                
                <div class="pt epidural_adjuvant_check" id="proced-plus" style="display:none;">

                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="epidural_opioid_status">
                            <input type="checkbox" class="form-check-input epidural_opioid" value="Yes" name="epidural_opioid_status"  onclick="epidural_opioid()">Opioid
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
                    </div>row -->
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
        </div>
        <label class="pt"><b>Analgesia supplementation required<span class="mandat">*</span></b></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="asr_status">
                    <input type="checkbox" class="switch_1 spinal_analgesia_supplement" value="Yes" name="asr_status">
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
                            <div class="form-check" style="margin-left: 5%;">
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
                            </div>
                        </div>
                    </div>	
                </div>
            </div><!--col-10-->
        </div><!--row-->

		<label class="pt"><b>Technical complications<span class="mandat">*</span></b><!--  <a href="#" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1 tech_complication_check">
                </div>
                <div class="tech-compli tech_complication_checkbox" style="display:none;">
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

        <label class="pt"><b>Acute complications<span class="mandat">*</span></b></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="hidden" class="switch_1" value="No" name="ac_status">
                    <input type="checkbox" class="switch_1" id="acu" value="Yes" name="ac_status" onclick="acute()">
                </div>
                <div class="acute">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_last">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_radicular_pain">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_radicular_pain">Radicular Pain (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_paresthesia_pain">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_paresthesia_pain">Paresthesia Pain (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_bloody_tap">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_bloody_tap">Bloody Tap (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_hypotension">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_hypotension">Hypotension<!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_high_block">High Block <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_total_spinal">Total Spinal<!--  <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_respi_arrest">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_respi_arrest">Respiratory Arrest
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_cardiac_arrest">
                            <input type="checkbox" class="form-check-input" value="Yes" name="ac_cardiac_arrest">Cardiac Arrest
                        </label>
                    </div>
                    <div class="form-check" style="display: flex;">
                        <label class="form-check-label">
                            <input type="hidden" class="switch_1" value="No" name="ac_other">
                            <input type="checkbox" class="form-check-input" id="ot" value="Yes" name="ac_other" onclick="other3()">Other
                        </label>
                        <input type="text" class="form-control" name="ac_other_input" id="ot1" style="width: 30%;" readonly>
                    </div>
                </div><!--acute ends-->
            </div>
        </div><!--row-->
        <label class="pt"><b>Success<span class="mandat">*</span></b>
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
                    <input type="radio" class="form-check-input" id="com" value="Complete Success" name="success_option" onclick="complete()">Complete Success
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
                    <input type="radio" class="form-check-input" id="par" value="Partial Success" name="success_option" onclick="partial()">Partial Success
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
                    <input type="radio" class="form-check-input" value="Failure" name="success_option" id="fail" onclick="failure()">Failure
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

        <label class="pt"><b>Sensory Level</b><span class="mandat">*</span><a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Content not provided"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label>
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
                                    <td>C1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C5</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C6</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C7</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>C8</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T2</td>
                                    <td id="bg-t2"></td>
                                    <td id="bg-t2"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T5</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T6</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T7</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T8</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T9</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T10</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T11</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>T12</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>L1</td>
                                    <td id="bg-l1"></td>
                                    <td id="bg-l1"></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>L2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>L3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>L4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>L5</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            </table>
                    </div>
                </div><!--sensor-table-->
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
            </div>
            <div class="col-sm-6">
                <img src="assets/images/Dermo.png" class="img-fluid d-block mx-auto">
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
                <img src="assets/images/Bromo.png" class="img-fluid d-block mx-auto">
            </div>
            <div class="col-sm-3"></div>
        </div><!--row-->
        <div class="duration">
            <ul>
                <li><label>Onset of surgical Anaesthesia</label></li>
                <li><input type="text" class="form-control" name="onset_surgical"></li>
                <li><label>mins</label></li>
            </ul>
        </div><!--row-->
        <div class="duration">
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
                        <input type="hidden" class="switch_1" value="No" name="vasopressor">
                        <input type="checkbox" class="switch_1" value="Yes" name="vasopressor">
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
</section><!--epidural-->
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
		    $(".opioid").append('<div class="row1"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]" ><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_opioid_dose[]" ></div></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".other1").append('<div class="row2"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="epidural_aj_name[]"><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
        }
    });
    $(".add6").click(function(){
        if(l<3){
            l++;
		    $(".spinal_opioid_supplemen_box").append('<div class="row3"><div class="row" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name_spinal[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose_spinal[]" ></div></div></div>');
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
$(".spinal_ml1").keyup(function(){
    var persent = $('.spinal_persent1').val();
    var ml = $('.spinal_ml1').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg1').val(mg);
});
$(".spinal_persent1").keyup(function(){
    var persent = $('.spinal_persent1').val();
    var ml = $('.spinal_ml1').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg1').val(mg);
});

$(".spinal_ml2").keyup(function(){
    var persent = $('.spinal_persent2').val();
    var ml = $('.spinal_ml2').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg2').val(mg);
});
$(".spinal_persent2").keyup(function(){
    var persent = $('.spinal_persent2').val();
    var ml = $('.spinal_ml2').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg2').val(mg);
});

$(".spinal_ml3").keyup(function(){
    var persent = $('.spinal_persent3').val();
    var ml = $('.spinal_ml3').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg3').val(mg);
});
$(".spinal_persent3").keyup(function(){
    var persent = $('.spinal_persent3').val();
    var ml = $('.spinal_ml3').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg3').val(mg);
});

$(".spinal_ml4").keyup(function(){
    var persent = $('.spinal_persent4').val();
    var ml = $('.spinal_ml4').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg4').val(mg);
});
$(".spinal_persent4").keyup(function(){
    var persent = $('.spinal_persent4').val();
    var ml = $('.spinal_ml4').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg4').val(mg);
});

$(".spinal_ml5").keyup(function(){
    var persent = $('.spinal_persent5').val();
    var ml = $('.spinal_ml5').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg5').val(mg);
});
$(".spinal_persent5").keyup(function(){
    var persent = $('.spinal_persent5').val();
    var ml = $('.spinal_ml5').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg5').val(mg);
});

$(".spinal_ml6").keyup(function(){
    var persent = $('.spinal_persent6').val();
    var ml = $('.spinal_ml6').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg6').val(mg);
});
$(".spinal_persent6").keyup(function(){
    var persent = $('.spinal_persent6').val();
    var ml = $('.spinal_ml6').val();
    var div = (persent/100);
    var multi = ml*10;
    var mg = div*multi;
    $('.spinal_mg6').val(mg);
});
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
    $('.spinal_multi_model').click(function(){
		var epidural_clonidne =$('.spinal_multi_model').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_multi_model_box").hide();
		}
		else{
			$('.spinal_multi_model_box').show();
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
    $('.tech_complication_check').click(function(){
		var epidural_clonidne =$('.tech_complication_check').is(':checked');		
		if(!epidural_clonidne){
        	$(".tech_complication_checkbox").hide();
		}
		else{
			$('.tech_complication_checkbox').show();
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
        $('.epidural_adjuvant_check').hide();
    }else{
        $('.epidural_adjuvant_check').show();
    }
}


function acute(){
    var acu = $('#acu').is(':checked');
    if(!acu){
        $('.acute').hide();
    }
    else{
        $(".acute").show();
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
    function checkpos(){
		var pos = $('#patient_pos').val();
		if((pos != 'Select')){
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
		if((skin != 'Select')){
			$('.skp').hide();
		}
	}
</script>

<script>
    $(document).ready(function(){
        $('#add_csa').submit(function(e){
		    e.preventDefault();

            var formData = new FormData(this);
            $.ajax({
                type : 'POST',
                url : '<?php  echo base_url("CSA_add/csa_procedure")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    
                    if(response.result==1){
                        toastr["success"](response.message);
                        $('#add_csa')[0].reset();   
                        window.location = '<?php echo base_url("CSA_add_view")?>?id='+response.msg;     
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
