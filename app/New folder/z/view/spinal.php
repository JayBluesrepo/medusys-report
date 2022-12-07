<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>
 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

<section class="epidural">
<h3>Add Spinal</h3>
    <form id="add-spine">
	<label>Patient status during Neuraxial Block<span class="mandat">*</span></label>
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
                <select class="form-control" name="patient_pos" id="patient_pos" onfocusout="checkpos()">
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
            <div class="col-sm-3"><h5>Spinal Level</h5></div>
            <div class="col-sm-2"></div>
            <div class="col-sm-7"></div>
        </div><!--row-->
        <div class="row pt">
            <div class="col-sm-1"></div>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="spinal_level" id="epidu" style="margin-bottom:10px;" readonly>
                <input type="text" class="form-control" name="spinal_type" id="spin_type" readonly>
            </div>
            <div class="col-sm-5"></div>
            <div class="col-sm-3">
                
            </div>
        </div>
        <div class="row human-skeleton">
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
        <label><b>Needle Brand,Type and Size</b></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <span>Select Spinal Needle Brand</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <select class="form-control" id="need" name="needle_brand" onclick="needle()">
                            <option value=''>Select needle brand</option>
                            <?php
                                foreach($spinal_needle_brand as $key=>$master){
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
                <span>Select Spinal Needle Type</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <select class="form-control" id="ty" name="needle_type" onclick="type1()">
                            <option value=''>Select needle type</option>
                            <?php
                                foreach($spinal_needle_type as $key=>$master){
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
                <span>Select Spinal Needle Size</span>
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-4">
                        <select class="form-control" id="size" name="needle_size">
                            <option value=''>Select needle size</option>
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
                <input type="number" class="form-control" name="no_attempts" id="no_attempts" onfocusout="attempts()">
                <small class="attempts" style="color:red; display:none;">please do not enter value more than 20</small>
            </div>
        </div><!--row-->
        <div class="row">
            <div class="col-sm-2"><label>Spinal Anaesthetic</label></div>
            <div class="col-sm-4">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="spin" onclick="spinal()">
                </div>
            </div>
            <div class="col-sm-6"></div>
        </div><!--row-->
        <div class="spinal" style="box-shadow:initial;">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <span><b>Local Anaesthetic</b></span>
                    <div class="procedure-cse" style="margin-right: 15px;">
                        <div class="pac-box">
                            <div class="pacu-1"><p>Lignocaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="lignocaine">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="ligno_per" id="ligno_per"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="ligno_ml" id="ligno_ml"><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control" name="ligno_mg" id="ligno_mg"><span style="padding-top:5px;">mg</span>
                            </div>
                        </div><!--pac-box-->
                        <div class="pac-box">
                            <div class="pacu-1"><p>Bupivacaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="bupivacaine">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="bupi_per" id="bupi_per"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="bupi_ml" id="bupi_ml"><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control" name="bupi_mg" id="bupi_mg"><span style="padding-top:5px;">mg</span>
                            </div>
                        </div><!--pac-box-->
                        <div class="pac-box">
                            <div class="pacu-1"><p>Ropivacaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="ropivacaine">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="ropi_per" id="ropi_per"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="ropi_ml" id="ropi_ml"><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control" name="ropi_mg" id="ropi_mg"><span style="padding-top:5px;">mg</span>
                            </div>
                        </div><!--pac-box-->
                        <div class="pac-box">
                            <div class="pacu-1"><p>Prilocaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="prilocaine">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="pril_per" id="pril_per"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="pril_ml" id="pril_ml"><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control" name="pril_mg" id="pril_mg"><span style="padding-top:5px;">mg</span>
                            </div>
                        </div><!--pac-box-->
                        <div class="pac-box">
                            <div class="pacu-1"><p>2-chloroprocaine</p></div>
                            <div class="pacu-1-x">
                                <select class="form-control" name="chloroprocaine">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="chloro_per" id="chloro_per"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="chloro_ml" id="chloro_ml"><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control" name="chloro_mg" id="chloro_mg"><span style="padding-top:5px;">mg</span>
                            </div>
                        </div><!--pac-box-->
                        <p></p>
                        <div class="pac-box">
                            <div class="pacu-1"><p>Other</p></div>
                           <!--  <div class="pacu-1-x">
                                <input type="text" class="form-control" name="oth_name">
                            </div> -->
                            <div class="pacu-1-x">
                                <select class="form-control" name="">
                                    <option value=''>Select</option>
                                    <option>Heavy</option>
                                    <option>Iso/Hypobaric</option>
                                </select>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="oth_per" id="oth_per"><span style="padding-top:5px;">%</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="number" class="form-control" name="oth_ml" id="oth_ml"><span style="padding-top:5px;">ml</span>
                            </div>
                            <div class="pacu-1" id="id">
                                <input type="text" class="form-control" name="oth_mg" id="oth_mg"><span style="padding-top:5px;">mg</span>
                            </div>
                        </div><!--pac-box-->
                    </div><!--procedure-cse-->
                </div>
            </div><!--row-->
        </div><!--spinal ends-->
        <div class="row pt">
            <div class="col-sm-2">
                <label>Adjuvant</label>
            </div>
            <div class="col-sm-2">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="adju" onclick="adjuvant()">
                </div>
            </div>
            <div class="col-sm-8"></div>
        </div><!--row-->
        <div class="adjuvant">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <div class="pt" id="proced-plus" style="">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="opio" onclick="opioid()">Opioid
                            </label>
                        </div>
                        <div class="opioid">
                            <div class="row" style="margin-left: 3%;">
                                <div class="col-sm-5">
                                    <span>Opioid Name</span>
                                </div>
                                <div class="col-sm-7" style="display: flex;"><input type="text" class="form-control" name="opioid_name[]" ><button type="button" class="btn add2"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                            </div><!--row-->
                            <div class="row pt" style="margin-left: 3%;">
                                <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                <div class="col-sm-7"><input type="number" class="form-control" name="opioid_dose[]" ></div>
                            </div><!--row-->
                        </div><!--opioid ends-->
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
                                    <input type="checkbox" class="form-check-input" id="adre" onclick="Adrenaline()">Adrenaline(Epinephrine)(mcmg)
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-7"><input type="number" class="form-control" name="adrenal" id="adre1" placeholder="mcgm" readonly></div>
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
                                        <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="aj_name[]" > <button type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="row pt">
                                        <div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div>
                                        <div class="col-sm-7"><input type="number" class="form-control" name="aj_dose[]" ></div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                </div>
                            </div>
                        </div><!--row-->
                    </div>
                </div><!--col-10-->
            </div><!--row-->
        </div><!--adjuvant ends-->
        <label class="pt">Analgesia supplementation required<span class="mandat">*</span>&nbsp<small class="supple" style="color:red; font-style: oblique; display:none;">please select analgesia supplementation</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="ana" onclick="analgesia()">
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
                                    <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name[]" ><button type="button" class="btn add4"><i class="fa fa-plus" aria-hidden="true"></i></button></div>
                                </div><!--row-->
                                <div class="row pt" style="margin-left: 3%;">
                                    <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                    <div class="col-sm-7"><input type="number" class="form-control" name="asr_opioid_dose[]" ></div>
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
                                            <input type="text" class="form-control" name="asr_other_iv_name" >
                                        </div>
                                        <div class="col-sm-4"></div>
                                    </div>
                                    <div class="row pt">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" name="asr_other_iv_dose" >
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
		<label class="pt">Technical complications<span class="mandat">*</span><!--  <a href="#" class="tip" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->&nbsp<small class="techie" style="color:red; font-style: oblique; display:none;">please select technical complications</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="tech" onclick="technical()">
                </div>
                <div class="technical">
                    <div class="tech-compli">
                        <ul style="margin-bottom:0;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_equipment">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_equipment">Equipment related
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0;padding-left: 0;">    
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_multiple">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_multiple">Multiple attempts
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0;padding-left: 0;">    
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_2_anaestsetist">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_2_anaestsetist">2nd Anaesthetist
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_abondoned">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_abondoned">Technique abandoned/failure to find space
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0;padding-left: 0;">    
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_catheter">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_catheter">Catheter related
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0;padding-left: 0;">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="hidden" class="form-check-input" value="No" name="tc_other">
                                    <input type="checkbox" class="form-check-input" value="Yes" name="tc_other" id="othe" onclick="other2()">Other
                                    </label>
                                </div>
                            </li>
                        </ul>
                        <ul style="margin-bottom:0;padding-left: 0;">    
                            <li>
                                <input type="text" class="form-control" id="othe1" name="other4" readonly>
                            </li>
                        </ul>
                    </div>
                </div><!--technical ends-->    
            </div>
        </div><!--row-->
        <label class="pt">Acute complications<span class="mandat">*</span>&nbsp;<small class="acuted" style="color:red; font-style: oblique; display:none;">please select acute complications</small></label>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <div class= "box_1">
                    <input type="checkbox" class="switch_1" id="acu" onclick="acute()">
                </div>
                <div class="acute">
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
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_total_spinal">Total Spinal <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
                        </label>
                    </div>
                    <div class="form-check" style="display: flex;">
                        <label class="form-check-label">
                        <input type="hidden" class="form-check-input" value="No" name="ac_other">
                        <input type="checkbox" class="form-check-input" value="Yes" name="ac_other" id="ot" onclick="other3()">Other
                        </label>
                        <input type="text" class="form-control" name="other5" id="ot1" style="width: 30%;" readonly>
                    </div>
                </div><!--acute ends-->
            </div>
        </div><!--row-->
        <label class="pt">Success<span class="mandat">*</span> <!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade."><i class="fa fa-info-circle" aria-hidden="true"></i></a> --> 
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
                    <input type="radio" class="form-check-input" id="fail" value="Failure" name="optradio2" onclick="failure()">Failure<!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Failure: Defined as failure to enter the required space, failure to achieve required sensory /motor block. Conversion to GA or very high opioid/ ketamine or hypnotic requirements."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
    $(".pts").hide();
    $('.needle').hide();
    $('.type').hide();
    $(".spinal").hide();
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
    var j=1;
    var l=1;
    var k=1;
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
		    $(".opioids").append('<div class="row3"><div class="row" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name[]"><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="number" class="form-control" name="asr_opioid_dose[]"></div></div></div>');
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
function attempts(){
    var att = $('#no_attempts').val();
    if(att>20){
        $('.attempts').show();
        toastr.error('please do not enter value more than 20');
    }
    else
        $('.attempts').hide();
}
$(".q"). click(function() {
    var button = $(this).val();
    $(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");
    $('#epidu').val(button);
    var firstChar = button.charAt(0);
    if(firstChar == 'T'){
        $('#spin_type').val('Thoracic');
    }
    if(firstChar == 'L'){
        $('#spin_type').val('Lumbar');
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
$('#pril_per').keyup(function(){
    var p_per = $('#pril_per').val();
    var p_ml = $('#pril_ml').val();
    var gg = (p_per)/100;
    var hh = (p_ml)*10;
    var ii =(gg*hh);
    $('#pril_mg').val(ii);
});
$('#pril_ml').keyup(function(){
    var p_per = $('#pril_per').val();
    var p_ml = $('#pril_ml').val();
    var gg = (p_per)/100;
    var hh = (p_ml)*10;
    var ii =(gg*hh);
    $('#pril_mg').val(ii);
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
$('#chloro_per').keyup(function(){
    var chl_per = $('#chloro_per').val();
    var chl_ml = $('#chloro_ml').val();
    var mm = (chl_per)/100;
    var nn = (chl_ml)*10;
    var oo =(mm*nn);
    $('#chloro_mg').val(oo);
});
$('#chloro_ml').keyup(function(){
    var chl_per = $('#chloro_per').val();
    var chl_ml = $('#chloro_ml').val();
    var mm = (chl_per)/100;
    var nn = (chl_ml)*10;
    var oo =(mm*nn);
    $('#chloro_mg').val(oo);
});
$('#oth_per').keyup(function(){
    var ot_per = $('#oth_per').val();
    var ot_ml = $('#oth_ml').val();
    var pp = (ot_per)/100;
    var qq = (ot_ml)*10;
    var rr =(pp*qq);
    $('#oth_mg').val(rr);
});
$('#oth_ml').keyup(function(){
    var ot_per = $('#oth_per').val();
    var ot_ml = $('#oth_ml').val();
    var pp = (ot_per)/100;
    var qq = (ot_ml)*10;
    var rr =(pp*qq);
    $('#oth_mg').val(rr);
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
function spinal(){
    var spin = $('#spin').is(':checked');
    if(!spin){
        $('.spinal').hide();
    }
    else{
        $(".spinal").show();
    }
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
function Adrenaline(){
    var adre = $('#adre').is(':checked');
    if(!adre){
        $("#adre1").attr("readonly", true);
    }
    else{
        $('#adre1').removeAttr("readonly");
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
    $('#add-spine').submit(function(e){
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
        if((aa) && (bb) && (cc) && (dd) && (ee) && (ff) && (gg) && (hh) && (ii)){
            var formData = new FormData(this);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("Spinal/add_spin")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){
                        toastr["success"](response.message);
                        $('#add-spine')[0].reset(); 
                        window.location = '<?php echo base_url("SpinalDetails")?>?id='+response.msg;
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