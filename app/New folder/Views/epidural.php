<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>
 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>



<section class="epidural">
<h3>Add Epidural</h3>
    <form id="add-epi">
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
        <div class="row">
            <div class="col-sm-3"><h5 style="font-weight:bold;">Epidural Level</h5></div>
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
        <div class="row human-skeleton">
            <div class="col-sm-12">
                <img src="assets/images/Lev.png" class="img-fluid d-block mx-auto">
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
        <div class="row">
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
        <label>Needle Brand,Type and Size</label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Epidural Needle Brand</span>
                <div class="row">
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
                <div class="row">
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
                <div class="row">
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
                    <div class="col-sm-6" id="proced-plus" style="display:flex;">
                        <input type="text" class="form-control" name="others[]">
                        <button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                    <div class="col-sm-6"></div>
                </div>
            </div>
            <div class="col-sm-4"></div>
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
                <input type="number" class="form-control" name="no_attempts" id="no_attempts" onfocusout="attempts()">
                <small class="attempts" style="color:red; display:none;">please do not enter value more than 20</small>
            </div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"><label>Epidural Depth(cm)</label></div>
            <div class="col-sm-4">
                <input type="number" class="form-control" name="epidral_depth">
            </div>
        </div><!--row-->
        <label>Technique</label>
        <div class="row">
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
                        <input type="number" class="form-control" name="cath_mark" style="width:30%;">
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
                    <option>Intermitten Bolus</option>
                </select>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
       <!--  <label class="pt">Total Intra Operative LA & Adjuvant Consumption<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->
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
                        <input type="number" class="form-control" name="ropi_per" id="ropi_per" ><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="ropi_ml" id="ropi_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="ropi_mg" id="ropi_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                </div><!--pac-box-->
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
                        <input type="number" class="form-control" name="bupi_per" id="bupi_per" ><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="bupi_ml" id="bupi_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="bupi_mg" id="bupi_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                </div><!--pac-box-->
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
                        <input type="number" class="form-control" name="levo_per" id="levo_per" ><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="levo_ml" id="levo_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="levo_mg" id="levo_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                </div><!--pac-box-->
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
                        <input type="number" class="form-control" name="ligno_per" id="ligno_per" ><span style="padding-top:5px;">%</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="number" class="form-control" name="ligno_ml" id="ligno_ml" ><span style="padding-top:5px;">ml</span>
                    </div>
                    <div class="pacu-1" id="id">
                        <input type="text" class="form-control" name="ligno_mg" id="ligno_mg" ><span style="padding-top:5px;">mg</span>
                    </div>
                </div><!--pac-box-->
            </div><!--col-10-->
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <label>Adjuvant</label>
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
        <label class="pt">Analgesia supplementation required<span class="mandat">*</span>&nbsp<small class="supple" style="color:red; font-style: oblique; display:none;">please select analgesia supplementation</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="ana" onclick="analgesia()" >
                </div>
                <div class="analgesia">
                    <div class="analg-box">
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="in_analgesia">
								<input type="checkbox" class="form-check-input" value="Yes" name="in_analgesia">Inhalation Analgesia
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
                                <div class="row" style="margin-left: 3%;">
                                    <div class="col-sm-5">
                                        <span>Opioid Name</span>
                                    </div>
                                    <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name[]"><button type="button" class="btn add4"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                                </div><!--row-->
                                <div class="row pt" style="margin-left: 3%;">
                                    <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                    <div class="col-sm-7"><input type="number" class="form-control" name="asr_opioid_dose[]"></div>
                                </div><!--row-->
                            </div><!--opioids ends-->
                            <div class="form-check" style="margin-left: 3%;">
                                <label class="form-check-label">
                                <input type="hidden" class="form-check-input" value="No" name="asr_multimode">
                                <input type="checkbox" class="form-check-input" value="Yes" name="asr_multimode" id="multi" onclick="multianal()">Multi-Modal Analgesia
                                </label>
                            </div>
                            <div class="multianal">
                                <div class="form-check" style="margin-left: 5%;">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="Ketamine1">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="Ketamine1">Ketamine
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
                                <div class="form-check" style="margin-left: 5%;">
                                    <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="adjunc" onclick="adjuncts()">Other IV Adjuncts
                                    </label>
                                </div>
                                <div class="adjuncts">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3"><label>Adjuvant Name</label></div>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" name="asr_other_iv_name">
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="row pt">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="asr_other_iv_dose">
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                </div><!--adjuncts ends-->
                            </div><!--multianal ends-->
                        </div><!--gesia ends-->
                    </div><!--analg-box ends-->
                </div><!--analgesia ends-->
            </div><!--col-10-->
        </div><!--row-->
		<label class="pt">Technical complications<span class="mandat">*</span> <!-- <a href="#" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->&nbsp<small class="techie" style="color:red; font-style: oblique; display:none;">please select technical complications</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="tech" onclick="technical()">
                </div>
                <div class="technical">
                    <div class="tech-compli">
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_equipment">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_equipment">Equipment related
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_multiple">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_multiple">Multiple attempts
                                    </label>
                                </div>
                            </li>
                         </ul>
                         <ul style="margin-bottom:0px;padding-left: 0;">   
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_2_anaestsetist">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_2_anaestsetist">2nd Anaesthetist
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_abondoned">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_abondoned">Technique abandoned/failure to find space
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">    
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_catheter">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_catheter">Catheter related
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
                        </ul>
                        <ul style="margin-bottom:0px;padding-left: 0;">    
                            <li>
                                <input type="text" class="form-control" id="othe1" name="other4" readonly>
                            </li>
                        </ul>
                    </div>
                </div><!--technical ends-->    
            </div>
        </div><!--row-->
        <label class="pt">Acute complications<span class="mandat">*</span>&nbsp<small class="acuted" style="color:red; font-style: oblique; display:none;">please select acute complications</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="acu" onclick="acute()">
                </div>
                <div class="acute">
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_last">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_radi_pain">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_radi_pain">Radicular Pain (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_parestsesia">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_parestsesia">Paresthesia Pain (needle/catheter)
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_bloody_tap">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_bloody_tap">Bloody Tap (needle/catheter)
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_intra_cath">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_intra_cath">Intrathecal migration of epidural catheter
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_hypoten">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_hypoten">Hypotension<!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="20% drop from baseline or SBP,90mmHg"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_nausea">Nausea
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_vomit">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_vomit">Vomiting
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_high_block">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_high_block">High Block <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_sb_block">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_sb_block">Subdural Block
                        </label>
                    </div>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_total_spinal">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_total_spinal">Total Spinal<!--  <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_re_arrest">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_re_arrest">Respiratory Arrest
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_ca_arrest">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_ca_arrest">Cardiac Arrest
                        </label>
                    </div>
                    <div class="form-check" style="display: flex;">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_other">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_other" id="ot" onclick="other3()">Other
                        </label>
                        <input type="text" class="form-control" name="other5" id="ot1" style="width: 30%;" readonly>
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
                    <h6>Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade.</h6>
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
                                <h6>Complete Success: With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <ul class="success-list">
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
                                <h6>Partial Succes: With the above block success definition being satisfied, the purpose of CNB is being met with some additional intravenous analgesics / inhalationals including but not restricted to LA infiltration, opioids, ketamine, hypnotics.If used as analgesic purpose only, the cumulative intra-operative and postoperative pain and opioids requirements are moderate.</h6>
                                <i></i>
                            </div>
                        </div>
                    </div>
                    </label>
                </div>
                <ul class="success-list">
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
                <select class="form-control" name="motor_level" id="motor_level" onfocusout="checkmotor()">
                    <option>Select</option>
                    <option>0(Free movement of legs and feet)</option>
                    <option>1(Just able to fix knees with free movement of feet)</option>
                    <option>2(Unable to flex Knees,but with free movement of feet)</option>
                    <option>3(Unable to move legs or feet)</option>
                </select>
                <small class="motro" style="color:red; display:none;">please enter motor level</small>
                <img src="assets/images/Bromo.png" class="img-fluid d-block mx-auto">
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
                <button type="submit" class="btn-save">Save</button>
                <!-- <button type="button" class="btn-close">Reset</button> -->
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
    $('.other').hide();
    $('.catheter').hide();
    $('.adjuvant').hide();
    $('.opioid').hide();
    $('.other1').hide();
    $('.analgesia').hide();
    $('.gesia').hide();
    $('.opioids').hide();
    $('.multianal').hide();
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
		    $(".other").append('<div class="row"><div class="col-sm-6" id="proced-plus" style="display:flex;"><input type="text" class="form-control" name="others[]"><button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-6"></div></div>');
        }
    });
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".opioid").append('<div class="row1"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="opioid_name[]"><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="opioid_dose[]"></div></div></div>');
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
		    $(".opioids").append('<div class="row3"><div class="row" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="asr_opioid_dose[]"></div></div></div>');
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
$('#ropi_per').keyup(function(){
    var r_per = $('#ropi_per').val();
    var r_ml = $('#ropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#ropi_mg').val(cc);
});
$('#ropi_ml').keyup(function(){
    var r_per = $('#ropi_per').val();
    var r_ml = $('#ropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#ropi_mg').val(cc);
});
$('#bupi_per').keyup(function(){
    var b_per = $('#bupi_per').val();
    var b_ml = $('#bupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#bupi_mg').val(ff);
});
$('#bupi_ml').keyup(function(){
    var b_per = $('#bupi_per').val();
    var b_ml = $('#bupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#bupi_mg').val(ff);
});
$('#levo_per').keyup(function(){
    var l_per = $('#levo_per').val();
    var l_ml = $('#levo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#levo_mg').val(ii);
});
$('#levo_ml').keyup(function(){
    var l_per = $('#levo_per').val();
    var l_ml = $('#levo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#levo_mg').val(ii);
});
$('#ligno_per').keyup(function(){
    var li_per = $('#ligno_per').val();
    var li_ml = $('#ligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#ligno_mg').val(ll);
});
$('#ligno_ml').keyup(function(){
    var li_per = $('#ligno_per').val();
    var li_ml = $('#ligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#ligno_mg').val(ll);
});
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
        $('.adjuvant').hide();
    }
    else{
        $(".adjuvant").show();
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
function analgesia(){
    var ana = $('#ana').is(':checked');
    if(!ana){
        $('.analgesia').hide();
    }
    else{
        $(".analgesia").show();
        $('.supple').hide();
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
function multianal(){
    var multi = $('#multi').is(':checked');
    if(!multi){
        $('.multianal').hide();
    }
    else{
        $(".multianal").show();
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
    if(!tech){
        $('.technical').hide();
    }
    else{
        $(".technical").show();
        $('.techie').hide();
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
        $('.acute').hide();
    }
    else{
        $(".acute").show();
        $('.acuted').hide();
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
		if((pos != 'Select')){
			$('.pat').hide();
		}
	}
	function checkskin(){
		var skin = $('#skin_prep').val();
		if((skin != 'Select')){
			$('.skp').hide();
		}
	}
    function checkmotor(){
		var mot = $('#motor_level').val();
		if((mot != 'Select')){
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
        var aa = '', bb = '', cc = '', dd = '', ee = '', ff = '', gg = '', hh = '', ii = '';
        var pat_pos = $('#patient_pos').val();
        var skp = $('#skin_prep').val();
		var motor = $('#motor_level').val();
        if((pat_pos != 'Select'))
			aa = true;
		else{
			$('.pat').show();
			toastr.error('please select patient position');
		}
		if((skp != 'Select'))
			bb = true;
		else{
			$('.skp').show();
			toastr.error('please select skin preparation');
		}
        if (!document.getElementById('option-1').checked && !document.getElementById('option-2').checked && !document.getElementById('option-3').checked) { 
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
        if((motor != 'Select'))
			ee = true;
		else{
			$('.motro').show();
			toastr.error('please select motor level');
		}
        var anal = $('#ana').is(':checked');
        if(!(anal)){
            $('.supple').show();
			toastr.error('please select analgesia supplementation');
        }
        else{
            ff = true;
        }
        var tech = $('#tech').is(':checked');
        if(!(tech)){
            $('.techie').show();
			toastr.error('please select technical complications');
        }
        else{
            gg = true;
        }
        var acute = $('#acu').is(':checked');
        if(!(acute)){
            $('.acuted').show();
			toastr.error('please select acute complications');
        }
        else{
            hh = true;
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
        if((aa) && (bb) && (cc) && (dd) && (ee) && (ff) && (gg) && (hh) && (ii)){
            var formData = new FormData(this);
            formData.append('lor_saline',lor_sal);
            formData.append('lor_air',air);
            formData.append('hanging_drop',hang);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("Epidural/add_epi")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){
                        toastr["success"](response.message);
                        $('#add-epi')[0].reset();   
                        window.location = '<?php echo base_url("EpiDetails")?>?id='+response.msg;     
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
    echo view('includes/footer');    
?>