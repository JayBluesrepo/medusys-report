<?php
    echo view('includes/header-obstetric',$patient, $pre, $precheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
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
                        <th id="pre-op-head">Speciality</th>
                        <th id="pre-op-head">Operation/Procedure Category</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['speciality']; ?> - <?php echo $info['speciality_other']; ?></td>
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
                        <th id="pre-op-head">ASA</th>
                        <th id="pre-op-head">Gravida/Parity</th>
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
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="">Surgery List</th>
                        <th id="">Category of LSCS</th>
                        <th id="">Indication options:</th>
                    </tr>
                </thead>
                <tbody>

                <?php if(strpos($info['surgery_list_options'], '(LSCS)') !== false) { 
                      $lscs = explode(",", $info['surgery_list_options']);
                    ?>
                    <tr>
                        <td><?php echo $lscs[0] ?></td>
                        <td><?php echo $lscs[1] ?></td>
                        <td><?php echo $lscs[2] ?></td>
                    </tr>

                <?php }else{ ?>
                    <tr>
                        <td><?php echo $info['surgery_list_options']." - ".$info['surgery_list_other']; ?></td>
                    </tr>

                <?php } ?>
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
                    <?php $other = explode(",",$info['other']); 
                        if($other[0] != '' || $other[1] != '' || $other[2] != ''){
                    ?>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td>Yes</td>
                        </tr>
                    <?php
                        foreach($other as $key=>$val){ ?>
                        <tr>
                            <td class="bg-pat2"></td>
                            <td><?php echo $val; ?></td>
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
                   
                    <?php $other1 = explode(",",$info['obstetric_other']); 
                        if($other1[0] != '' || $other1[1] != '' || $other1[2] != ''){
                    ?>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td>Yes</td>
                        </tr>
                    <?php
                        foreach($other1 as $key=>$val){ ?>
                        <tr>
                            <td class="bg-pat2"></td>
                            <td><?php echo $val; ?></td>
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
                    
                    <?php $other2 = explode(",",$info['foetal_other']); 
                        if($other2[0] != '' || $other2[1] != '' || $other2[2] != ''){
                    ?>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td>Yes</td>
                        </tr>
                    <?php
                        foreach($other2 as $key=>$val){ ?>
                        <tr>
                            <td class="bg-pat2"></td>
                            <td><?php echo $val; ?></td>
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
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="">Gestational Age/Term</th>
                        <!-- <th id="">Cervical Dilation </th>
                        <th id="">Onset of Labour</th> -->
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['gestational_age']; ?></td>
                        <!-- <td>-</td>
                        <td>-</td> -->
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
    <!-- <h5><b>Clinical Standards</b></h5>
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
    </div> --><!--preop-table2-->
    <div class="preop-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Anaesthesia Administered</td>
                        <td><?php echo $info['anaesthesia_administered']; ?></td>
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
                    <h4 class="modal-title">Edit Pre-Op</h4>
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
                                    <select class="form-control" id="speciality" name="speciality" onchange="checkspl()">
                                        <option value=''>Select</option>
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
                                        <select class="form-control" id="category_lscs" name="category_lscs">
                                            <option value="">Select</option>
                                            <option><b>Category 1</b>: Urgent threat to the life or the health of a woman or fetus.</option>
                                            <option><b>Category 2</b>: Maternal or foetal compromise but not immediately life threatening.</option>
                                            <option><b>Category 3</b>: Needing earlier than planned delivery but without currently evident maternal or foetal compromise.</option>
                                            <option><b>Category 4</b>: At a time acceptable to both the woman and the caesarean section team</option>
                                        </select>
                                    </div>
                                    <label>Indication options:</label>
                                    <div class="form-group">
                                        <select class="form-control" id="indication_options" name="indication_options">
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
                        <!-- <div class="row pt">
                            <div class="col-sm-2">
                                <label>Minimally invasive
                                    <div class="tooltip-2">
                                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <div class="right-2">
                                            <div class="text-content-2">
                                                <h6>Thoroscopic&nbsp;,&nbsp;laproscopic&nbsp;,&nbsp;arthoscopic with or without semi-open.</h6>
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
                        </div> --><!--row-->
                        <div class="row pt">
                            <div class="col-sm-2"><label>ASA<span class="mandat">*</span></label></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control" id="asa" name="asa" onchange="checkasa()">
                                        <option value=''>Select</option>
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
                                        <option value=''>Select</option>
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
                                        <!-- <li>
                                            <div class="togle">
                                                <label>Other</label>
                                                <div class= "box_1">
                                                    <input type="text"  name="other[]" value="<?php echo $info['other']; ?>" style="border-radius: 20px;" >
                                                </div>
                                            </div>
                                        </li> -->
                                        <li>
                                        <div class="togle">
                                            <label>Other</label>
                                        <?php
                                        $co_morbid_array = array();
                                        $co_morbid_array =  explode(",",$info['other']);
                                        if(count($co_morbid_array) > 0)
                                        {

                                        ?>
                                            <div class= "box_1">
                                                <input type="checkbox" class="switch_1 other_field"value="Yes" onclick="other_field()" checked>   
                                            </div>
                                        </div>
                                        </li> 
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


                                        <?php } ?>
                                        </li>
                                        <?php }  ?>
                                        
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
                                        
                                        <!-- <li>
                                            
                                            <div class="togle">
                                                <label>Other</label>
                                                <div class= "box_1">
                                                    <input type="text"  name="obstetric_other[]" value="<?php echo $info['obstetric_other']; ?>" style="border-radius: 20px;" >
                                                </div>
                                            </div>
                                        </li> -->
                                        <li>
                                             <div class="togle">
                                                <label>Other</label> 
                                          
                                        <!-- <input type="hidden" class="switch_1" value="No" > -->
                                         
                                        <?php $obstetric = array();
                                        $obstetric_array =  explode(",",$info['obstetric_other']);
                                        if(count($obstetric_array) > 0)
                                        {
                                                   ?>
                                                    <div class= "box_1">
                                                        <input type="checkbox" class="switch_1 obstetric_other_field"value="Yes" onclick="obstetric_field()" checked>
                                                            
                                                    </div>
                                            </div>
                                        </li> 
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
                                        <!-- <li>
                                            <div class="togle">
                                                <label>Other</label>
                                                <div class= "box_1">
                                                    <input type="text"  name="foetal_other[]" value="<?php echo $info['foetal_other']; ?>" style="border-radius: 20px;" >
                                                </div>
                                            </div>
                                        </li> -->

                                        <li>
                                            <div class="togle">
                                                <label>Other</label>

                                                <?php $obstetric = array();
                            $foetal_other_array =  explode(",",$info['foetal_other']);
                            if(count($foetal_other_array) > 0)
                            {
                                ?>
                                     <div class= "box_1">
                                            <input type="checkbox" class="switch_1 foetal_other_chick" value="Yes" onclick="foetal_other_field()" checked>
                                        </div>
                                            <li id="proced-plus" class="other-li foetal_other_box">
                                            <?php
                                            $x = 0;
                                            for($x = 0; $x < 3 ; $x++){
                                            ?> 


                                                <div class="row mt-2"><div class="col-sm-12" id="proced-plus" style="display:flex;"><input type="text"  name="foetal_other[]" class="foetal_other_input" value = "<?php echo $foetal_other_array[$x]; ?>" style="border-radius: 20px;" >
                                                </div>
                                            </div>

                                            
                                        <?php }   ?>
                                    </li>
                                    <?php } ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-2"><label>Gestational Age/Term<span class="mandat">*</span></label></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <select class="form-control gestational_age_term gestati" name="gestational_age" onchange="gestational_age1()">
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
                                    <select class="form-control anaesthesia_admin" name="anaesthesia_administered">
                                        <option value=''>Select</option>
                                        <option>CNB</option>
                                        <option>GA</option>
                                        <option>PNB alone with or without sedation</option>
                                    </select>
                                </div>
                            </div>
                        </div><!--row-->
                        <!-- <div class="row pt">
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
                                    </ul>
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
                                    </ul>
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
                        </div> --><!--row-->
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
</script>

<script>

    var z10 = "<?php echo $info['gravida']; ?>";
    $('.gravida_parity').val(z10);

    var z11 = "<?php echo $info['surgery_list_options']; ?>";
    var z11_split = z11.split(',');
    // alert(z11_split[0]);
    var z12 = "<?php echo $info['surgery_list_other']; ?>";

    // alert(z12);

    if(z11_split[0] == 'Lower Segment Caesarean Section (LSCS)'){
        $('#surgery_list').val(z11_split[0]);
        $('#category_lscs').val(z11_split[1]);
        $('#indication_options').val(z11_split[2]);
        $('.category_lscs').show();

    }else if(z11_split[0] == 'Other'){
        $('#surgery_list').val(z11_split[0]);
        $('#surgery_list_other').val(z12);
        $('#surgery_list_other').show();
    }else{
        $('#surgery_list').val(z11_split[0]);
    }
    
    // id="indication_options" - 2
    // id="category_lscs" - 1
    // id="surgery_list" - 0


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
        }
        else{
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
</script>
<script type="text/javascript">
    $('#xyz').val("<?php echo $info['surgery']; ?>");

    

// $(document).ready(function(){
    $('#edit-preop').submit(function(e){
        e.preventDefault();
        var aa = '', dd = '', gg ='', hh = '', ii ='', bb = '';
        var spl = $('#speciality').val();    
        var prs = $('#Purpose').val();
        var asa = $('#asa').val();
        var gravida = $('.gravida_parity').val();
        var gestati = $('.gestati').val();
        var surgery_list = $('#surgery_list').val(); 

        if(gestati != '')
            ii = true;
        else{
            $('.gestational_msg').show();
            toastr.error('Please select Gestational Age/Term option');
        }

        if(surgery_list != ''){
            bb =true;
        }else{
            $('.spl101').show();
            toastr.error('Please enter surgery list');
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
        
        if((spl != ''))
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
        
        if((aa) && (dd) && gg && hh && ii && bb){
            var formData = new FormData(this);
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("editPreop-obstetrics")?>',
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
    var w120 = "<?php echo $info['speciality_other']; ?>";

	if(w == 'Other'){
		$('#speciality').val(w);
		$('.speciality_other').val(w120);
		$('.speciality_other').show();

	}else{
		$('#speciality').val(w);
	}

    var x = "<?php echo $info['surgery_location']; ?>";
    $('#sur_location').val(x);
    var y = "<?php echo $info['asa']; ?>";
    $('#asa').val(y);
    var z = "<?php echo $info['purpose']; ?>";
    $('#Purpose').val(z);

    var v = "<?php echo $info['operation_cate']; ?>";
    if(v=="Emergency"){
        $('#option-1')[0].checked = true;
    }else{
        $('#option-2')[0].checked = true;
    }
    var v10 = "<?php echo $info['gestational_age']; ?>";
    $('.gestational_age_term').val(v10);

    var v11 = "<?php echo $info['anaesthesia_administered']; ?>";
    $('.anaesthesia_admin').val(v11);

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

    // function checksur(){
    //  var sur = $('#surgery').val();
    //  if((sur != '')){
    //      $('.sur').hide();
    //  }
    // }
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
    echo view('includes/footer-obstetric');    
?>