<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>

<section class="add-csa-view">
    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
            <button type="button" class="btn-edit" data-toggle="modal" data-target="#edit-csa-page" style="margin:5px;">Edit</button>
            <!-- <button type="button" class="btn-close">Delete</button> -->
        </div>
    </div><!--row-->
    <div class="csa-view-cont">
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Patient status During Neuraxial Block</td>
                            <td><?php echo $info['patient_status']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Patient Position</td>
                            <td><?php echo $info['patient_position']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Asepsis</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Wearing cap and mask</td>
                            <td><?php echo $info['wearing_mask']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Hand washing</td>
                            <td><?php echo $info['hand_washing']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Sterile gown</td>
                            <td><?php echo $info['sterile_gown']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Sterile draping</td>
                            <td><?php echo $info['sterile_draping']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Skin Prep</td>
                            <td><?php echo $info['skin_prep']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Continuous Spinal Anaesthesia (CSA)</b></h4>
        <h5 class="pt"><b>CSA</b></h5>
        <div class="csa-view-card1">
            <div class="card-header">
                <h5><b>CSA</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['csa']; ?></p>
            </div>
        </div><!--csa-view-card1-->
        <h4 class="pt"><b>Anatomical Landmark</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Anatomical Landmark</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['anatomical_landmark']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>CSA Spinal Level</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b><?php echo $info['spinal_level_name']; ?></b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['spinal_level']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Needle Brand,Type and Size</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <ul>
                    <li><b>Needle Brand</b></li>
                    <li><b> Needle Type</b></li>
                    <li><b> Needle Size</b></li>
                </ul>
            </div>
            <div class="card-body">
                <ul>
                    <li><span><?php echo $info['needle_brand']; ?></span></li>
                    <li><span><?php echo $info['needle_type']; ?></span></li>
                    <li><span><?php echo $info['needle_size']; ?></span></li>
                </ul>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Approach</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Approach</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['approach']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Number of Attempts</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Number of Attempts</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['no_attempts']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Spinal Catheter Type</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Spinal Catheter Type</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['catheter_type']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Catheter mark at Skin (cm) </b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Catheter mark at Skin (cm) </b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['catheter_mark']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Test Dose</b></h4>
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Intra Operative LA Regimen</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['la_regimen']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption</b></h4>
        <div class="csa-view-table2">
            <div class="table-responsive">
            <table class="table">
                    <thead>
                        <tr>
                            <th>Solution</th>
                            <th>Dosage(%)</th>
                            <th>Dosage(ml)</th>
                            <th>Dosage(mg)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><?php 
                                $spinal_lig = $info['lignocaline'];
                                $spinal_lignoca = explode(",",$spinal_lig);
                            ?>
                            <td>Lignocaine  - <?php echo $spinal_lignoca[0]; ?></td>
                            <td><?php echo $spinal_lignoca[1]; ?></td>
                            <td><?php echo $spinal_lignoca[2]; ?></td>
                            <td><?php echo $spinal_lignoca[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $spinal_bupi= $info['bupivacaine'];
                                $spinal_bupivaca = explode(",",$spinal_bupi);
                            ?>
                            <td>Bupivacaine Plain  - <?php echo $spinal_bupivaca[0]; ?></td>
                            <td><?php echo $spinal_bupivaca[1]; ?></td>
                            <td><?php echo $spinal_bupivaca[2]; ?></td>
                            <td><?php echo $spinal_bupivaca[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $spinal_ropi= $info['rupivacaine'];
                                $spinal_ropivaca = explode(",",$spinal_ropi);
                            ?>
                            <td>Ropivacaine  - <?php echo $spinal_ropivaca[0]; ?></td>
                            <td><?php echo $spinal_ropivaca[1]; ?></td>
                            <td><?php echo $spinal_ropivaca[2]; ?></td>
                            <td><?php echo $spinal_ropivaca[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $spinal_pri= $info['prilocaine'];
                                $spinal_priloca = explode(",",$spinal_pri);
                            ?>
                            <td>Prilocaine  - <?php echo $spinal_priloca[0]; ?></td>
                            <td><?php echo $spinal_priloca[1]; ?></td>
                            <td><?php echo $spinal_priloca[2]; ?></td>
                            <td><?php echo $spinal_priloca[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $spinal_2chlo= $info['chloroprocaine'];
                                $spinal_2chlorop = explode(",",$spinal_2chlo);
                            ?>
                            <td>2-chloroprocaine  - <?php echo $spinal_2chlorop[0]; ?></td>
                            <td><?php echo $spinal_2chlorop[1]; ?></td>
                            <td><?php echo $spinal_2chlorop[2]; ?></td>
                            <td><?php echo $spinal_2chlorop[3]; ?></td>
                        </tr>
                        <tr>
                            <td>Other</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><?php 
                                $other_spi= $info['other_la'];
                                $other_spinal = explode(",",$other_spi);
                            ?>
                            <td style="border:0;"><?php echo $other_spinal[0]; ?></td>
                            <td style="border:0;"><?php echo $other_spinal[1]; ?></td>
                            <td style="border:0;"><?php echo $other_spinal[2]; ?></td>
                            <td style="border:0;"><?php echo $other_spinal[3]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table-->
        <h4 class="pt"><b>Adjuvant</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2"  style="border:0;">Opioid</td>
                            <td style="border:0;"><?php echo $info['opioid_aj']; ?></td>
                        </tr>
                        <?php	
                            if($info['opioid_aj'] == 'Yes'){						
                            $aj_spinal_op = $info['opioid_aj_name_dose'];
                            $aj_spinal_opioid = json_decode($aj_spinal_op, true);
                            
                            foreach($aj_spinal_opioid as $key=>$val){	                           																 
						?>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Dose(microgram equivalent)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                        <?php
                            }} else{
                        ?>
                        <tr>
                            <td class="bg-pat2" style="border:0; display:none;">Opioid Name</td>
                            <td style="border:0; display:none;"></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0; display:none;">Opioid Dose(microgram equivalent)</td>
                            <td style="border:0; display:none;"></td>
                        </tr>
                        <?php }?>
                        <tr>
                            <td class="bg-pat2">Clonidne with Dose(mcgm)</td>
                            <td><?php echo $info['clonidne_aj']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Dexmeditomidine with Dose(mcgm)</td>
                            <td><?php echo $info['dexmeditomidine_aj']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Dexamethasone with Dose(mg)</td>
                            <td><?php echo $info['dexamethasone_aj']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Tramadol with Dose(mg)</td>
                            <td><?php echo $info['tramadol_aj']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ketamine with Dose(mg)</td>
                            <td><?php echo $info['ketamine_aj']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Midazolam with Dose(mg)</td>
                            <td><?php echo $info['midazolam_aj']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td><?php echo $info['aj']; ?></td>
                        </tr>
                        <?php	
                            if($info['aj'] == 'Yes'){					
                            $aj_spinal_op = $info['other_aj_name_dose'];
                            $aj_spinal_opioid = json_decode($aj_spinal_op, true);
                            
                            foreach($aj_spinal_opioid as $key=>$val){	                           																 
						?>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                        <?php
                            }} else{
                        ?>
                        <tr>
                            <td class="bg-pat2" style="border:0; display:none;">Adjuvant Name</td>
                            <td style="border:0; display:none;"></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0; display:none;">Adjuvant Dose(mg)</td>
                            <td style="border:0; display:none;"></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Analgesia supplementation required</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Inhalation Analgesia</td>
                            <td><?php echo $info['asr_inhalation']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">IV analgesia</td>
                            <td><?php echo $info['asr_iv_analgesia']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Opioids</td>
                            <td></td>
                        </tr>
                        <?php	                            				
                            $aj_spinal_op = $info['asr_opioid_name_dose'];
                            $aj_spinal_opioid = json_decode($aj_spinal_op, true);
                            
                            foreach($aj_spinal_opioid as $key=>$val){	                           																 
						?>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Dose(microgram equivalent)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td class="bg-pat2">Multi-modal Analgesia Ketamine Other</td>
                            <td><?php echo $info['asr_multi_model']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ketamine</td>
                            <td><?php echo $info['asr_ketamine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2"  style="border:0;">IV adjuncts</td>
                            <td style="border:0;"></td>
                        </tr>
                        <?php	                            				
                            $aj_spinal_op = $info['asr_other_name_dose'];
                            $aj_spinal_opioid = json_decode($aj_spinal_op, true);
                            
                            foreach($aj_spinal_opioid as $key=>$val){	                           																 
						?>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Technical Complications</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Equipment Related</td>
                            <td><?php echo $info['tc_equipment']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Multiple attempts</td>
                            <td><?php echo $info['tc_multiple_attempts']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">2nd Anaesthetist</td>
                            <td><?php echo $info['tc_2_anaesthetist']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Technique abandoned/failure to find sapce</td>
                            <td><?php echo $info['tc_failure_space']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Catheter related</td>
                            <td><?php echo $info['tc_catheter_related']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td>No</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Acute Complications</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        
                        <tr>
                            <td class="bg-pat2">Local Anaesthetic systemic toxicity(LAST)</td>
                            <td><?php echo $info['ac_last']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Respiratory Arrest</td>
                            <td><?php echo $info['ac_respiratory_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Cardiac Arrest</td>
                            <td><?php echo $info['ac_cardiac_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Radicular Pain (needle/catheter)</td>
                            <td><?php echo $info['ac_radicular_pain']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Paresthesia (needle/catheter)</td>
                            <td><?php echo $info['ac_paresthesia_pain']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Bloody Tap ( needle/catheter)</td>
                            <td><?php echo $info['ac_bloody_tap']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Wet Tap/Dural puncture (Needle/Catheter)</td>
                            <td><?php echo $info['tc_catheter_related']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Hypotension</td>
                            <td><?php echo $info['ac_hypotension']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Nausea</td>
                            <td><?php echo $info['ac_nausea']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Vomiting</td>
                            <td><?php echo $info['ac_vomiting']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">High Block</td>
                            <td><?php echo $info['ac_high_block']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Subdural Block</td>
                            <td><?php echo $info['ac_subdural_block']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Motor Block</td>
                            <td><?php echo $info['tc_catheter_related']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Total Spinal</td>
                            <td><?php echo $info['ac_total_spinal']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Accidental Dural Puncture</td>
                            <td><?php echo $info['tc_catheter_related']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td><?php echo $info['ac_other']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Success</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <?php if(($success_status[0]) == 'Partial Success'){ ?>
                                
                            <tr>
                                <td class="bg-pat2">Partial Success</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td class="bg-pat2" style="border:0;">Onset</td>
                                <td style="border:0;" ><?php echo $info['success_onset']; ?></td>
                            </tr>
                            
                        <?php }elseif(($success_status[0]) == 'Complete Success'){ ?>
                            <tr>
                                <td class="bg-pat2">Complete Success</td>
                                <td>Yes</td>
                            </tr>
                            <tr>
                                <td class="bg-pat2" style="border:0;">Onset</td>
                                <td style="border:0;" ><?php echo $info['success_onset']; ?></td>
                            </tr>
                        <?php }else{ ?>
                            <tr>
                                <td class="bg-pat2">Failure</td>
                                <td>Yes</td>
                            </tr>    
                        <?php }; ?>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Sensory Level</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Cold</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Touch</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Pin Prick</td>
                            <td>No</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <div class="body-img">
            <div class="row">
                <div class="col-sm-3">
                    <h5><b>Level To Cold</b></h5>
                    <p><span style="margin: 0 30px 0 0;">Highest Level</span>Highest Level</p>
                    <p>LEFT:<span style="color:red;margin: 0 65px 0 0;">T2</span>RIGHT:<span style="color:red;">T2</span></p>
                    <p><span style="margin: 0 30px 0 0;">Lowest Level</span>Lowest Level</p>
                    <p>LEFT:<span style="color:red;margin: 0 65px 0 0;">L1</span>RIGHT:<span style="color:red;">L2</span></p>
                </div>
                <div class="col-sm-4">
                    <div class="csa-view-sensor-table">
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
                    </div><!--csa-view-sensor-table-->
                </div>
                <div class="col-sm-5">
                    <img src="<?php echo base_url('assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto">
                </div>
            </div><!--row-->
        </div><!--body-img-->
        <h4 class="pt"><b>Motor Level (Bromage Score)</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Selected</td>
                            <td><?php echo $info['motor_level']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Duration of Surgery Mins</td>
                            <td><?php echo $info['duration_surgery']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Blood Loss ml</td>
                            <td><?php echo $info['blood_loss']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Vasopressor Use</td>
                            <td><?php echo $info['vasopressor_use']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <div class="bromo-img">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6"><img src="<?php echo base_url('assets/images/Bromo.png'); ?>" class="img-fluid d-block mx-auto"></div>
                <div class="col-sm-3"></div>
            </div><!--row-->
        </div><!--bromo-img-->
    </div><!--csa-view-cont-->
</section><!--add-csa-view-->	

<!------------------------------------------EDIT-CSA-START---------------------------->
<section class="edit-csa">
        <!-- The Modal -->
        <div class="modal fade" id="edit-csa-page">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header" id="add-header">
                <h4 class="modal-title">Edit CSA - Continous Spinal Anaesthesia</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <form id="csa_modal_update">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" >

                    <label>Patient status during Neuraxial Block<span class="mandat">*</span></label>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="awake_e" value="Awake" name="patient_status_e" onclick="hide()">Awake
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="sedation_e" value="Sedation" name="patient_status_e" onclick="show()">Sedation
                                </label>
                            </div>
                            <div class="pt" id="option_e" style="display:none;">
                                <select class="form-control" id="sedation_opt_e" name="sedation_opt_e">
                                    <option>Select</option>
                                    <option>1-Mild easy to rouse</option>
                                    <option>2-Moderate,easy to rouse,unable to remain awake</option>
                                    <option>3-Difficult to rouse</option>
                                </select>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ga_e" value="GA" name="patient_status_e" onclick="hide()">GA
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label style="font-size:13px;">Patient Position<span class="mandat">*</span></label></div>
                        <div class="col-sm-4">
                            <select class="form-control" id="patient_position_e" name="patient_position_e">
                                <option>Select</option>
                                <option>Lateral</option>
                                <option>Sitting</option>
                                <option>Prone</option>
                            </select>
                        </div>
                        <div class="col-sm-4"></div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Asepsis<span class="mandat">*</span></label></div>
                        <div class="col-sm-10">
                            <div class="t-switch">
                                <ul>
                                    <li>
                                        <div class="togle">
                                            <label>Wearing cap and mask</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="wearing_mask_e">
                                                <input type="checkbox" class="switch_1" id="wearing_mask_e" value="Yes" name="wearing_mask_e">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="togle">
                                            <label>Hand washing</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="hand_washing_e">
                                                <input type="checkbox" class="switch_1" value="Yes" id="hand_washing_e" name="hand_washing_e">
                                            </div>
                                        </div>
                                    </li>
                                </ul><!-------------------->
                                <ul>
                                    <li>
                                        <div class="togle">
                                            <label>Sterile gown</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="sterile_gown_e">
                                                <input type="checkbox" class="switch_1" value="Yes" id="sterile_gown_e" name="sterile_gown_e"> 
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="togle">
                                            <label>Sterile draping</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="sterile_draping_e">
                                                <input type="checkbox" class="switch_1" value="Yes" id="sterile_draping_e" name="sterile_draping_e">
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
                            <select class="form-control" id="skin_prep_e" name="skin_prep_e">
                                <option>Select</option>
                                <option>Alcohol</option>
                                <option>Chlorhexidine</option>
                                <option>Betadine</option>
                                <option>Combinations</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                <!-- 	<h5 class="pt"><b>Continous Spinal Anaesthesia(CSA)</b><span class="mandat">*</span></h5> -->
                    <div class="row pt">
                        <div class="col-sm-2"><span><b>CSA</b><span class="mandat">*</span></span></div>
                        <div class="col-sm-5">
                            <select class="form-control" id="csa_e" name="csa_e">
                                <option>Select</option>
                                <option>Accidental</option>
                                <option>Intentional</option>
                            </select>
                        </div>
                        <div class="col-sm-5"></div>
                    </div><!--row-->
                    <!-- <h5><b>Epidural<span class="mandat">*</span></b></h5> -->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Anatomical Landmark<span class="mandat">*</span></label></div>
                        <div class="col-sm-4">
                            <select class="form-control" id="landmark_e" name="landmark_e">
                                <option>Select</option>
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
                                <input type="hidden" class="switch_1" value="No" name="epidural_ultra_sound">
                                <input type="checkbox" class="switch_1" value="Yes" id="epidural_ultra_sound" name="epidural_ultra_sound" onclick="ultra()">
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                    <div class="epidural_ultrasound" style="display:none;">
                        <div class="row pt">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"><span>Probe Cover</span></div>
                            <div class="col-sm-4">
                                <select class="form-control" id="epidural_probe_cover" name="epidural_probe_cover">
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
                                <select class="form-control" id="epidural_image_quality" name="epidural_image_quality">
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
                    <!-- <div class="row"> -->
                        <div class="col-sm-3"><h5 style="font-weight:bold;">CSA Spinal Level</h5></div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control text-center" id="epidu" name="csa_spinal_level" readonly>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control text-center" id="level_name" name="csa_spinal_level_name" readonly>
                        </div>
                        <div class="col-sm-4"></div>
                    <!-- </div>row -->
                    </div><!--row-->
                    <div class="row human-skeleton">
                        <div class="col-sm-12">
                            <img src="assets/images/Spinal-new-img.png" class="img-fluid d-block mx-auto">
                            <button type="button" class="btn q T1-2" id="spinal-new-btn" value="T1-2">T1-2</button>
                            <button type="button" class="btn q T2-3" id="spinal-new-btn1" value="T2-3">T2-3</button>
                            <button type="button" class="btn q T3-4" id="spinal-new-btn2" value="T3-4">T3-4</button>
                            <button type="button" class="btn q T4-5" id="spinal-new-btn3" value="T4-5">T4-5</button>
                            <button type="button" class="btn q T5-6" id="spinal-new-btn4" value="T5-6">T5-6</button>
                            <button type="button" class="btn q T6-7" id="spinal-new-btn5" value="T6-7">T6-7</button>
                            <button type="button" class="btn q T7-8" id="spinal-new-btn6" value="T7-8">T7-8</button>
                            <button type="button" class="btn q T8-9" id="spinal-new-btn7" value="T8-9">T8-9</button>
                            <button type="button" class="btn q T9-10" id="spinal-new-btn8" value="T9-10">T9-10</button>
                            <button type="button" class="btn q T10-11" id="spinal-new-btn9" value="T10-11">T10-11</button>
                            <button type="button" class="btn q T11-12" id="spinal-new-btn10" value="T11-12">T11-12</button>
                            <button type="button" class="btn q T12-L1" id="spinal-new-btn11" value="T12-L1">T12-L1</button>
                            <button type="button" class="btn q L1-2" id="spinal-new-btn12" value="L1-2">L1-2</button>
                            <button type="button" class="btn q L2-3" id="spinal-new-btn13" value="L2-3">L2-3</button>
                            <button type="button" class="btn q L3-4" id="spinal-new-btn14" value="L3-4">L3-4</button>
                            <button type="button" class="btn q L4-5" id="spinal-new-btn15" value="L4-5">L4-5</button>
                            <button type="button" class="btn q L5-S1" id="spinal-new-btn16" value="L5-S1">L5-S1</button>
                        </div>
                    </div><!--row-->
                    <label><b>Spinal Needle Brand,Type and Size</b></label>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <span>Select Spinal Needle Brand</span>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4 pt">
                                    <select class="form-control spinal_needel_brand_other" name="spinal_needel_brand">
                                        <option value="Select">Select</option>
                                        <?php
                                            foreach($spinal_needle_brand as $key=>$master){
                                        ?>
                                            
                                            <option><?php echo $master['name']; ?></option>
                                            
                                        <?php
                                        }
                                        ?>
                                        <option value="Other">Other</option>
                                    </select>
                                    <input type="text" class="form-control spinal_needel_brand_other_input" name="spinal_needel_brand_input" style="margin-top: 12px; display:none; ">
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <span>Select  Spinal Needle Type</span>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4 pt">
                                <select class="form-control spinal_needel_type_other" name="spinal_needel_type">
									<option value="Select">Select</option>
									<?php
										foreach($spinal_needle_type as $key=>$master){
									?>
										
										<option><?php echo $master['name']; ?></option>
										
									<?php
									}
									?>
									<option value="Other">Other</option>
								</select>
								<input type="text" class="form-control spinal_needel_type_other_input" name="spinal_needel_type_input" style="margin-top: 12px; display:none; ">
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <span>Select  Spinal Needle Size</span>
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4 pt">
                                    <select class="form-control spinal_needle_size" name="spinal_needle_size">
                                        <option>Select needle size</option>
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
                            <select class="form-control spinal_approach" name="spinal_approach">
                                <option>Select</option>
                                <option>Midline</option>
                                <option>Paramedian</option>
                            </select>
                        </div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Number of Attempts</label></div>
                        <div class="col-sm-4">
                            <select class="form-control spinal_attempts" name="spinal_attempts">
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
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                    <div class="row">
                        <div class="col-sm-3"><label>Select Spinal Catheter Type</label></div>
                        <div class="col-sm-4">
                            <select class="form-control catheter_type" name="catheter_type">
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
                            <input type="text" class="form-control skin_mark" name="skin_mark">
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Intra Operative LA Regimen</label></div>
                        <div class="col-sm-4">
                            <select class="form-control la_regimen" name="la_regimen">
                                <option>Select</option>
                                <option>Continous Infusion</option>
                                <option>Intermitten Bolus</option>
                            </select>
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                  <!--   <h5 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption<a href="#" data-toggle="tooltip"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></b></h5> -->
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
                            <span><b>Local Anaesthetic</b></span>
                            <div class="procedure-cse">
                            <div class="pac-box">
                                <div class="pacu-1"><p>Lignocaine</p></div>
                                    <div class="pacu-1-x">
                                        <select class="form-control spinal_option1" name="spinal_lignoca_option1">
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
                                        <select class="form-control spinal_option2" name="spinal_bupivaca_option2">
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
                                        <select class="form-control spinal_option3" name="spinal_ropivaca_option3">
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
                                        <select class="form-control spinal_option4" name="spinal_priloca_option4">
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
                                        <select class="form-control spinal_option5" name="spinal_2chloropro_option5">
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
                                        <input type="checkbox" class="form-check-input spinal_anaesth_other" value="Yes" name="spinal_anaesth_other">Other
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
							<input type="checkbox" class="switch_1 epidural_adjuvant" onclick="epidural_adjuvant()">
						</div>
						
						<div class="pt epidural_adjuvant_check" id="proced-plus" style="display:none;">

							<div class="form-check">
								<label class="form-check-label">
								<input type="checkbox" class="form-check-input epidural_opioid" value="Opioid"  onclick="epidural_opioid()">Opioid
								</label>
							</div>
							<div class="opioid append_fun mt-2"  style="display:none;">
								<div class="row" style="margin-left:3%;">									
									<button type="button" class="btn add2" ><i class="fa fa-plus" aria-hidden="true"></i></button>
								</div><!--row-->
                                <div class="opioid">
                                    <?php 
                                        $zk = $info['opioid_aj_name_dose'];
                                        $aj_epidural_other = json_decode($zk, true);                                     
                                        foreach($aj_epidural_other as $key=>$val){
                                    ?>      
                                        <div class="row11 mt-2">
                                            <div class="row" style="margin-left:3%;">
                                                <div class="col-sm-5"><span>Opioid Name</span></div>
                                                <div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]" value="<?php echo $val['name']; ?>"><button type="button" class="btn remove22"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                            </div><!--row-->
                                            <div class="row pt" style="margin-left:3%;">
                                                <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                                <div class="col-sm-7"><input type="text" class="form-control" name="epidural_opioid_dose[]" value="<?php echo $val['dose']; ?>"></div>
                                            </div><!--row-->
                                        </div>
                                    <?php
                                        } 
                                    ?>
                                </div>
								
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
								<div class="other1 epidural_other_box"  style="display:none;">
									<div class="row pt">
										<!-- <div class="col-sm-4"></div> -->
										<button id="proced-plus" type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button>
										<!-- <div class="col-sm-1"></div> -->
									</div>
                                    <div class="other9">
                                        <?php 
                                            $zk = $info['other_aj_name_dose'];
                                            $aj_epidural_other = json_decode($zk, true);                                     
                                            foreach($aj_epidural_other as $key=>$val){
                                        ?>      <div class="row21">
                                                    <div class="row pt">
                                                        <div class="col-sm-4"><span>Adjuvant Name</span></div>
                                                        <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="epidural_aj_name[]" value="<?php echo $val['name']; ?>"><button type="button" class="btn remove33"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                        <div class="col-sm-1"></div>
                                                    </div>
                                                    <div class="row pt">
                                                        <div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div>
                                                        <div class="col-sm-7"><input type="text" class="form-control" name="epidural_aj_dose[]" value="<?php echo $val['dose']; ?>"></div>
                                                        <div class="col-sm-1"></div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--other1 ends-->
									
								</div>
							    </div>
							    </div><!--row-->
						    </div>
					    </div>
                    </div><!--row-->

                    <label class="pt"><b>Analgesia supplementation required<span class="mandat">*</span></b></label>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10" style="">
						<div class= "box_1">
							<input type="checkbox" class="switch_1 spinal_analgesia_supplement">
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
											<button type="button" class="btn add6" id="proced-plus" ><i class="fa fa-plus" aria-hidden="true"></i></button>
										</div><!--row-->
                                        <div class="opioids">
                                            <?php                                                
                                                $ws = $info['asr_opioid_name_dose'];
                                                $kk = json_decode($ws, true);                                               
                                                foreach($kk as $key=>$val){
                                            ?>      <div class="row51">
                                                        <div class="row" style="margin-left: 3%;">
                                                            <div class="col-sm-5">
                                                                <span>Opioid Name</span>
                                                            </div>
                                                            <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name_spinal[]" value="<?php echo $val['name']; ?>"><button type="button" class="btn remove66"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                        </div><!--row-->
                                                        <div class="row pt" style="margin-left: 3%;">
                                                            <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                                            <div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose_spinal[]" value="<?php echo $val['dose']; ?>"></div>
                                                        </div><!--row-->
                                                    </div>
                                            <?php
                                                } 
                                            ?>
                                        </div><!--opioids ends-->
										
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
											<input type="checkbox" class="form-check-input asr_ketamine" value="Yes" name="asr_ketamine">Ketamine
										</label>
									</div>
									<!-- <div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_dexmedetomi">
											<input type="checkbox" class="form-check-input asr_dexmedetomi" value="Yes" name="asr_dexmedetomi">Dexmedetomidine
										</label>
									</div>
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_clonidine">
											<input type="checkbox" class="form-check-input asr_clonidine" value="Yes" name="asr_clonidine">Clonidine
										</label>
									</div>
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_tramadol">
											<input type="checkbox" class="form-check-input asr_tramadol" value="Yes" name="asr_tramadol">Tramadol
										</label>
									</div>
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_magnesium">
											<input type="checkbox" class="form-check-input asr_magnesium" value="Yes" name="asr_magnesium">Magnesium
										</label>
									</div> -->
									<div class="form-check" style="margin-left: 5%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_other_iv">
											<input type="checkbox" class="form-check-input spinal_adju" value="Yes" name="asr_other_iv">Other IV Adjuncts
										</label>
									</div>
									<div class="spinal_adju_box mt-2" style="display:none;">
                                        <?php
                                            $bg = $info['asr_other_name_dose'];
                                            $bg1 = json_decode($bg, true);
                                            foreach($bg1 as $key=>$val){
                                        ?>
										<div class="row">
											<div class="col-sm-1"></div>
											<div class="col-sm-3"><label>Adjuvnat Name</label></div>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="asr_name_aj" value="<?php echo $val['name']; ?>">
											</div>
											<div class="col-sm-4"></div>
										</div>
										<div class="row pt">
											<div class="col-sm-1"></div>
											<div class="col-sm-3"><label>Adjuvnat Dose(mg)</label></div>
											<div class="col-sm-4">
												<input type="text" class="form-control" name="asr_name_dose" value="<?php echo $val['dose']; ?>">
											</div>
											<div class="col-sm-4"></div>
										</div>
                                        <?php 
                                        }
                                        ?>
									</div>
								</div>
							</div>	
						</div>
					</div><!--col-10-->
                    </div><!--row-->
                    <label class="pt"><b>Technical complications<span class="mandat">*</span></b> <!-- <a href="#" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label>
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
                                </ul>
                                <ul style="margin-bottom:0px;padding-left: 0;">    
                                    <li style="display:none;" class="spinal_technical_input">
                                        <input type="text" class="form-control complication_other" name="complication_other" >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--row-->
                    <h4 class="pt"><b>Acute complications<span class="mandat">*</span></b></h4>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                            <div class= "box_1">
                                <input type="checkbox" class="switch_1 spinal_acute_multi_option">
                            </div>
                            <div class="spinal_acute_multi_option_box" style="display:none;">
                                <!-- <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_epidural_resited">
                                        <input type="checkbox" class="form-check-input ac_epidural_resited" value="Yes" name="ac_epidural_resited">Epidural re-sited
                                    </label>
                                </div> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_last">
                                        <input type="checkbox" class="form-check-input ac_last" value="Yes" name="ac_last">Local Anaesthetic systemic toxicity(LAST)
                                    </label>
                                </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_rasicular_pain">
                                        <input type="checkbox" class="form-check-input ac_rasicular_pain" value="Yes" name="ac_rasicular_pain">Radicular Pain (needle/catheter)
                                    </label>
                                </div>
                                 <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_paresthesia_pain">
                                        <input type="checkbox" class="form-check-input ac_paresthesia_pain" value="Yes" name="ac_paresthesia_pain">Paresthesia Pain (needle/catheter)
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
                                        <input type="hidden" class="switch_1" value="No" name="ac_respira_arrest">
                                        <input type="checkbox" class="form-check-input ac_respira_arrest" value="Yes" name="ac_respira_arrest">Respiratory Arrest
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_cardiac_arrest">
                                        <input type="checkbox" class="form-check-input ac_cardiac_arrest" value="Yes" name="ac_cardiac_arrest">Cardiac Arrest
                                    </label>
                                </div>
                                <!-- <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_wet_tap">
                                        <input type="checkbox" class="form-check-input ac_wet_tap" value="Yes" name="ac_wet_tap">Wet Tap/Dural puncture (needle/catheter)
                                    </label>
                                </div> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_hypotension">
                                        <input type="checkbox" class="form-check-input ac_hypotension" value="Yes" name="ac_hypotension">Hypotension <!-- <a href="#" data-toggle="tooltip"  title="hi"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                                        <input type="checkbox" class="form-check-input ac_high_block" value="Yse" name="ac_high_block">High Block
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_subdural_block">
                                        <input type="checkbox" class="form-check-input ac_subdural_block" value="Yes" name="ac_subdural_block">Subdural Block
                                    </label>
                                </div>
                                <!-- <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_motor_block">
                                        <input type="checkbox" class="form-check-input ac_motor_block" value="Yes" name="ac_motor_block">Motor Block
                                    </label>
                                </div> -->
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_total_spinal">
                                        <input type="checkbox" class="form-check-input ac_total_spinal" value="Yes" name="ac_total_spinal">Total Spinal
                                    </label>
                                </div>
                                <!-- <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_accidental">
                                        <input type="checkbox" class="form-check-input ac_accidental" value="Yes" name="ac_accidental">Accidental Dural Puncture
                                    </label>
                                </div> -->
                                <div class="form-check" style="display: flex;">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_other">
                                        <input type="checkbox" class="form-check-input spinal_acute_other" value="Yes" name="ac_other">Other
                                    </label>
                                    <input type="text" class="form-control spinal_acute_other_input ml-3" name="ac_other_input" style="width: 30%;display:none;">
                                </div>
                            </div>
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
                            <img src="<?php echo base_url('assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto">
                        </div>
                    </div><!--row-->
                    <h4><b>Motor Level (Bromage Score)<span class="mandat">*</span></b></h4>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-6">
                            <select class="form-control motor_level" name="motor_level">
                                <option>Select</option>
                                <option>0(Free movement of legs and feet)</option>
                                <option>1(Just able to fix knees with free movement of feet)</option>
                                <option>2(Unable to flex Knees,but with free movement of feet)</option>
                                <option>3(Unable to move legs or feet)</option>
                            </select>
                            <img src="<?php echo base_url('assets/images/Bromo.png'); ?>" class="img-fluid d-block mx-auto">
                        </div>
                        <div class="col-sm-3"></div>
                    </div><!--row-->
                    <div class="duration">
                        <ul>
                            <li><label>Onset of surgical Anaesthesia</label></li>
                            <li><input type="text" class="form-control surgical_onset" name="surgical_onset"></li>
                            <li><label>mins</label></li>
                        </ul>
                    </div><!--row-->
                    <div class="duration">
                    <ul>
                            <li><label>Duration of Surgery</label></li>
                            <li><input type="text" class="form-control duration_of_surgery" name="duration_of_surgery"></li>
                            <li><label>mins</label></li>
                        </ul>
                    </div><!--row-->
                    <div class="duration">
                    <ul>
                            <li><label>Blood Loss</label></li>
                            <li><input type="text" class="form-control blood_loss" name="blood_loss"></li>
                            <li><label>ml</label></li>
                        </ul>
                    </div><!--row-->
                    <div class="duration">
                        <ul>
                            <li><label>Vasopressor Use</label></li>
                            <li>
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="vasopressor_use">
                                    <input type="checkbox" class="switch_1 vasopressor_use" value="Yes" name="vasopressor_use">
                                </div>
                            </li>
                        </ul>
                    </div><!--row-->
                    <div class="row">
                        <div class="col-sm-7"></div>
                        <div class="col-sm-5">
                            <button type="button" class="btn-save">update</button>
                            <button type="button" class="btn-close" id="cls">Close</button>
                        </div>
                    </div><!--row-->
                </form>
            </div><!--modal-body-->
            
    
            </div>
        </div>
        </div>
</section><!--edit-combined-spinal-->
<!------------------------------------------EDIT-COMBINED-SPINAL-START---------------------------->

<script>
    function show(){
        $("#option_e").show();
    }
    function hide(){
        $("#option_e").hide();
    }
    var patient_status1 = "<?php echo $info['patient_status']; ?>";
    var patient_status = patient_status1.split(' - ');
    // alert(patient_status[0]);     
    if(patient_status[0] == "Awake"){
        $('#awake_e')[0].checked = true;
        $('#option_e').hide();
    }else if(patient_status[0]=="Sedation"){
        $('#sedation_e')[0].checked = true;
        $('#option_e').show();
        $('#sedation_opt_e').val(patient_status[1]);
    }else{
        $('#ga_e')[0].checked = true;
        $('#option_e').hide();
    }
    var patient_position = "<?php echo $info['patient_position']; ?>"; 
    $('#patient_position_e').val(patient_position);

    var wearing_mask = "<?php echo $info['wearing_mask']; ?>";
    var hand_washing = "<?php echo $info['hand_washing']; ?>";
    var sterile_gown = "<?php echo $info['sterile_gown']; ?>";
    var sterile_draping = "<?php echo $info['sterile_draping']; ?>";
    if(wearing_mask =="Yes"){
        $('#wearing_mask_e').attr("checked",true);
    }
    if(hand_washing =="Yes"){
        $('#hand_washing_e').attr("checked",true);
    }
    if(sterile_gown =="Yes"){
        $('#sterile_gown_e').attr("checked",true);
    }
    if(sterile_draping =="Yes"){
        $('#sterile_draping_e').attr("checked",true);
    }
    var skin_prepartion = "<?php echo $info['skin_prep']; ?>";
    var csa = "<?php echo $info['csa']; ?>";
    var anatomical_landmark = "<?php echo $info['anatomical_landmark']; ?>";
    $('#skin_prep_e').val(skin_prepartion);
    $('#csa_e').val(csa);
    $('#landmark_e').val(anatomical_landmark);

    function ultra(){
        var ult = $('#epidural_ultra_sound').is(':checked');
        if(!ult){
            $('.epidural_ultrasound').hide();
        }
        else{ 
            $(".epidural_ultrasound").show();
        }
    }

    var ultrasound = "<?php echo $info['ultra_sound']; ?>";
    var probe = "<?php echo $info['probe_cover']; ?>";
    var image = "<?php echo $info['image_quality']; ?>";
    if(ultrasound == "Yes"){
        $('#epidural_ultra_sound').attr("checked",true);
        $('.epidural_ultrasound').show();
        $('#epidural_probe_cover').val(probe);
        $('#epidural_image_quality').val(image);
    }
    var spinal_level = "<?php echo $info['spinal_level']; ?>";
    var spinal_level_name = "<?php echo $info['spinal_level_name']; ?>";

	$('#level_name').val(spinal_level_name);
    $('#epidu').val(spinal_level);
    $('.'+spinal_level).css("background", "red").css("color", "white");

$(".q"). click(function() {
    var button = $(this).val();
    $(this).css("background", "red").css("color", "white").siblings().css("background", "white").css("color", "black");
    $('#epidu').val(button);
    var firstChar = button.charAt(0);
    if(firstChar == 'T'){
        $('#level_name').val('Thoracic');
    }
    if(firstChar == 'L'){
        $('#level_name').val('Lumbar');
    }
});

    $('.spinal_needel_brand_other').change(function(){

        var input = $('.spinal_needel_brand_other').val();	

        if(input == "Other"){
            $('.spinal_needel_brand_other_input').show();		
        }else{
            $('.spinal_needel_brand_other_input').hide();					
        }		
    });

    $('.spinal_needel_type_other').change(function(){

        var input = $('.spinal_needel_type_other').val();	

        if(input == "Other"){
            $('.spinal_needel_type_other_input').show();		
        }else{
            $('.spinal_needel_type_other_input').hide();					
        }		
    });

    var spinal_needle_brand1 = "<?php echo $info['needle_brand']; ?>";
    var spinal_needle_brand = spinal_needle_brand1.split(' - ');   

    if(spinal_needle_brand[0] == 'Other'){
        $('.spinal_needel_brand_other_input').show();
        $('.spinal_needel_brand_other_input').val(spinal_needle_brand1[1]);   
        $('.spinal_needel_brand_other').val(spinal_needle_brand1[0]);
    }else{
        $('.spinal_needel_brand_other').val(spinal_needle_brand);            
    }

    var spinal_needle_type1 = "<?php echo $info['needle_type']; ?>";
    var spinal_needle_type = spinal_needle_type1.split(' - ');

    if(spinal_needle_type[0] == 'Other'){
        $('.spinal_needel_type_other_input').show();
        $('.spinal_needel_type_other_input').val(spinal_needle_type1[1]);   
        $('.spinal_needel_type_other').val(spinal_needle_type1[0]);
    }else{
        $('.spinal_needel_type_other').val(spinal_needle_type);
    }

    var sns = "<?php echo $info['needle_size']; ?>";
    $('.spinal_needle_size').val(sns);
    var sa = "<?php echo $info['approach']; ?>";
    $('.spinal_approach').val(sa);
    var sat = "<?php echo $info['no_attempts']; ?>"; 
    $('.spinal_attempts').val(sat);

    var catheter_type = "<?php echo $info['catheter_type']; ?>"; 
    var catheter_mark = "<?php echo $info['catheter_mark']; ?>"; 
    var la_regimen = "<?php echo $info['la_regimen']; ?>"; 

    $('.catheter_type').val(catheter_type);
    $('.skin_mark').val(catheter_mark);
    $('.la_regimen').val(la_regimen);

    $('.spinal_anaesth_other').click(function(){
		var epidural_clonidne =$('.spinal_anaesth_other').is(':checked');		
		if(!epidural_clonidne){			
        	$(".spinal_anaesth_other_option").hide();
		}
		else{
			$('.spinal_anaesth_other_option').show();
		}
	});

    var spinal_lig = '<?php echo $info['lignocaline']; ?>';
    var spinal_lignocaine = spinal_lig.split(',');  
    $('.spinal_option1').val(spinal_lignocaine[0]);
    $('.spinal_persent1').val(spinal_lignocaine[1]);
    $('.spinal_ml1').val(spinal_lignocaine[2]);
    $('.spinal_mg1').val(spinal_lignocaine[3]);

    var spinal_bupi = '<?php echo $info['bupivacaine']; ?>';
    var spinal_bupivaca = spinal_bupi.split(',');  
    $('.spinal_option2').val(spinal_bupivaca[0]);
    $('.spinal_persent2').val(spinal_bupivaca[1]);
    $('.spinal_ml2').val(spinal_bupivaca[2]);
    $('.spinal_mg2').val(spinal_bupivaca[3]);

    var spinal_ropi = '<?php echo $info['rupivacaine']; ?>';
    var spinal_ropivaca = spinal_ropi.split(',');  
    $('.spinal_option3').val(spinal_ropivaca[0]);
    $('.spinal_persent3').val(spinal_ropivaca[1]);
    $('.spinal_ml3').val(spinal_ropivaca[2]);
    $('.spinal_mg3').val(spinal_ropivaca[3]);

    var spinal_pri = '<?php echo $info['prilocaine']; ?>';
    var spinal_priloca = spinal_pri.split(',');  
    $('.spinal_option4').val(spinal_priloca[0]);
    $('.spinal_persent4').val(spinal_priloca[1]);
    $('.spinal_ml4').val(spinal_priloca[2]);
    $('.spinal_mg4').val(spinal_priloca[3]);

    var spinal_2chlor = '<?php echo $info['chloroprocaine']; ?>';
    var spinal_2chloropro = spinal_2chlor.split(',');  
    $('.spinal_option5').val(spinal_2chloropro[0]);
    $('.spinal_persent5').val(spinal_2chloropro[1]);
    $('.spinal_ml5').val(spinal_2chloropro[2]);
    $('.spinal_mg5').val(spinal_2chloropro[3]);

    var spinal_oth = '<?php echo $info['other_la']; ?>';
    var spinal_other_an = spinal_oth.split(',');  
    $('.spinal_anaesth_other_input').val(spinal_other_an[0]);
    $('.spinal_persent6').val(spinal_other_an[1]);
    $('.spinal_ml6').val(spinal_other_an[2]);
    $('.spinal_mg6').val(spinal_other_an[3]);

   
    if(spinal_other_an[1] != ''){
        $('.spinal_anaesth_other').attr("checked",true);
        $('.spinal_anaesth_other_option').show();
    }

    $(".spinal_ml1").keyup(function(){
		var persent = $('.spinal_persent1').val();
		var ml = $('.spinal_ml1').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg1').val(mg);
	});
	$(".spinal_persent1").keyup(function(){
		var persent = $('.spinal_persent1').val();
		var ml = $('.spinal_ml1').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg1').val(mg);
	});

	$(".spinal_ml2").keyup(function(){
		var persent = $('.spinal_persent2').val();
		var ml = $('.spinal_ml2').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg2').val(mg);
	});
	$(".spinal_persent2").keyup(function(){
		var persent = $('.spinal_persent2').val();
		var ml = $('.spinal_ml2').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg2').val(mg);
	});

	$(".spinal_ml3").keyup(function(){
		var persent = $('.spinal_persent3').val();
		var ml = $('.spinal_ml3').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg3').val(mg);
	});
	$(".spinal_persent3").keyup(function(){
		var persent = $('.spinal_persent3').val();
		var ml = $('.spinal_ml3').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg3').val(mg);
	});

	$(".spinal_ml4").keyup(function(){
		var persent = $('.spinal_persent4').val();
		var ml = $('.spinal_ml4').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg4').val(mg);
	});
	$(".spinal_persent4").keyup(function(){
		var persent = $('.spinal_persent4').val();
		var ml = $('.spinal_ml4').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg4').val(mg);
	});

	$(".spinal_ml5").keyup(function(){
		var persent = $('.spinal_persent5').val();
		var ml = $('.spinal_ml5').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg5').val(mg);
	});
	$(".spinal_persent5").keyup(function(){
		var persent = $('.spinal_persent5').val();
		var ml = $('.spinal_ml5').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg5').val(mg);
	});

	$(".spinal_ml6").keyup(function(){
		var persent = $('.spinal_persent6').val();
		var ml = $('.spinal_ml6').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg6').val(mg);
	});
	$(".spinal_persent6").keyup(function(){
		var persent = $('.spinal_persent6').val();
		var ml = $('.spinal_ml6').val();
		var div = persent;
		var multi = ml*10;
		var mg = div*multi;
		$('.spinal_mg6').val(mg);
	});

    function epidural_adjuvant(){
		var epidural_adjuvant = $('.epidural_adjuvant').is(':checked');
        if(!epidural_adjuvant){
            $('.epidural_adjuvant_check').hide();
        }else{
            $('.epidural_adjuvant_check').show();
        }
	}
    function epidural_opioid(){		
		var epidural_opioid = $('.epidural_opioid').is(':checked'); 
		if(!epidural_opioid){
            $('.opioid').hide();
        }else{
            $('.opioid').show();
        }
	}

    $(document).ready(function(){

        var j=1,n=1;

        $(".add2").click(function(){
			if(j<3){
				j++;
				$(".append_fun").append('<div class="row1 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]" ><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_opioid_dose[]" ></div></div></div>');
			}
		});
        $(".add6").click(function(){
			if(n<3){
				n++;
				$(".spinal_opioid_supplemen_box").append('<div class="row5 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus"  style="display:flex;"><input type="text" class="form-control" name="asr_opioid_name_spinal[]" ><button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose_spinal[]" ></div></div></div>');
			}
		});
        $(document).on('click','.remove2',function(){
			j--;
			$(this).closest('.row1').remove();
		});
        $(document).on('click','.remove6',function(){
			n--;
			$(this).closest('.row5').remove();
		});
        $(document).on('click','.remove22',function(){
            $(this).closest('.row11').remove();
        });
        $(document).on('click','.remove66',function(){
			l--;
			$(this).closest('.row51').remove();
		});
    });

    var ccc = "<?php echo $info['opioid_name']; ?>";
    var qqq = "<?php echo $info['clonidina_dose']; ?>";
    var vcs = "<?php echo $info['dexmeditomidine_dose']; ?>";
    var qrq = "<?php echo $info['dexamephasone_dose']; ?>";
    var mm = "<?php echo $info['tramadol_dose']; ?>";
    var mu = "<?php echo $info['kepamine_dose']; ?>";
    var qvc = "<?php echo $info['midazolam_dose']; ?>";
    // var qtq = "<?php echo $info['other7']; ?>";
    if((ccc)||(qqq)||(vcs)||(qrq)||(mm)||(mu)||(qvc)){
        $('.epidural_adjuvant').attr("checked",true);
        $('.epidural_adjuvant_check').show();
    }
   

    var caa = "<?php echo $info['opioid_aj']; ?>";
    if(caa == 'Yes'){
        $('.epidural_opioid').attr("checked",true);
        $('.append_fun').show();       
    }
    var cl = "<?php echo $info['clonidne_aj']; ?>";
    if(cl){
        $('#epidural_clonidne').attr("checked",true);
        $('.epidural_clonidne_input').removeAttr("readonly");
        $('.epidural_clonidne_input').val(cl);
    }
    var dexs = "<?php echo $info['dexmeditomidine_aj']; ?>";
    if(dexs){
        $('.epidural_dexme').attr("checked",true);
        $('.epidural_dexme_input').removeAttr("readonly");
        $('.epidural_dexme_input').val(dexs);
    }
    var dexas = "<?php echo $info['dexamethasone_aj']; ?>";
    if(dexas){
        $('.epidural_dexamethasone').attr("checked",true);
        $('.epidural_dexamethasone_input').removeAttr("readonly");
        $('.epidural_dexamethasone_input').val(dexas);
    }
    var trams = "<?php echo $info['tramadol_aj']; ?>";
    if(trams){
        $('.epidural_trama').attr("checked",true);
        $('.epidural_trama_input').removeAttr("readonly");
        $('.epidural_trama_input').val(trams);
    }
    var ketas = "<?php echo $info['ketamine_aj']; ?>";
    if(ketas){
        $('.epidural_ketamine').attr("checked",true);
        $('.epidural_ketamine_input').removeAttr("readonly");
        $('.epidural_ketamine_input').val(ketas);
    }
    var midas = "<?php echo $info['midazolam_aj']; ?>";
    if(midas){
        $('.epidural_midazolam').attr("checked",true);
        $('.epidural_midazolam_input').removeAttr("readonly");
        $('.epidural_midazolam_input').val(midas);
    }
    
    var cz = '<?php echo $info['aj']; ?>';
    // var obj = jQuery.parseJSON(cz);  
    if(cz == 'Yes'){
        $('.epidural_other').attr("checked",true);			
        $('.epidural_other_box').show();
    }
    $('#epidural_clonidne').click(function(){
		var epidural_clonidne =$('#epidural_clonidne').is(':checked');		
		if(!epidural_clonidne){
        	$(".epidural_clonidne_input").attr("readonly", true);
		}
		else{
			$('.epidural_clonidne_input').removeAttr("readonly");
		}
	});
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
	// $('.epidural_adrenaline').click(function(){
	// 	var epidural_clonidne =$('.epidural_adrenaline').is(':checked');		
	// 	if(!epidural_clonidne){
    //     	$(".epidural_adrenaline_input").attr("readonly", true);
	// 	}
	// 	else{
	// 		$('.epidural_adrenaline_input').removeAttr("readonly");
	// 	}
	// });
	$('.epidural_other').click(function(){
		var epidural_clonidne =$('.epidural_other').is(':checked');		
		if(!epidural_clonidne){			
        	$(".epidural_other_box").hide();
		}
		else{
			$('.epidural_other_box').show();
		}
	});

    var ccc = "<?php echo $info['opioid_aj']; ?>";
    var qqq = "<?php echo $info['clonidne_aj']; ?>";
    var vcs = "<?php echo $info['dexmeditomidine_aj']; ?>";
    var qrq = "<?php echo $info['dexamethasone_aj']; ?>";
    var mm = "<?php echo $info['tramadol_aj']; ?>";
    var mu = "<?php echo $info['ketamine_aj']; ?>";
    var qvc = "<?php echo $info['midazolam_aj']; ?>";
   
    if((ccc == 'Yes')||(qqq)||(vcs)||(qrq)||(mm)||(mu)||(qvc)){
        $('.epidural_adjuvant').attr("checked",true);
        $('.epidural_adjuvant_check').show();
    }

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

    var csc = "<?php echo $info['asr_inhalation']; ?>";
    var qsq = "<?php echo $info['asr_iv_analgesia']; ?>";
    if((csc == "Yes")||(qsq == "Yes")){
        $('.spinal_analgesia_supplement').attr("checked",true);
        $('.spinal_analgesia_supplement_box').show();
    }
    if(csc == 'Yes'){
        $('.asr_spinal_inhalation').attr('checked',true);
    }
    if(qsq == 'Yes'){
        $('.spinal_iv_analgesia').attr('checked',true);
		$('.spinal_iv_analgesia_box').show();
    }
    var ere = '<?php echo $info['asr_opioid_name_dose']; ?>';
    var ere_obj = jQuery.parseJSON(ere);  
    if(ere_obj[0].name){
        $('.spinal_opioid_supplemen').attr('checked',true);
		$('.spinal_opioid_supplemen_box').show();
    }

    var df = '<?php echo $info['asr_multi_model']; ?>';
    if(df == 'Yes'){
        $('.spinal_multi_model').attr('checked',true);
		$('.spinal_multi_model_box').show();
    }
    var dg = '<?php echo $info['asr_ketamine']; ?>'; 
    if(dg == 'Yes'){
        $('.asr_ketamine').attr('checked',true);		
    }
    var dh = '<?php echo $info['asr_dexmedetomidine']; ?>'; 
    if(dh == 'Yes'){
        $('.asr_dexmedetomi').attr('checked',true);		
    }
    var dk = '<?php echo $info['asr_clonidine']; ?>'; 
    if(dk == 'Yes'){
        $('.asr_clonidine').attr('checked',true);		
    }
    var dl = '<?php echo $info['asr_tramadol']; ?>'; 
    if(dl == 'Yes'){
        $('.asr_tramadol').attr('checked',true);		
    }
    var de = '<?php echo $info['asr_magnesium']; ?>'; 
    if(de == 'Yes'){
        $('.asr_magnesium').attr('checked',true);		
    }
    var db = '<?php echo $info['asr_other_name_dose']; ?>'; 
    var db_obj = jQuery.parseJSON(db);  

    if(db_obj[0].name){
        $('.spinal_adju').attr('checked',true);	
		$('.spinal_adju_box').show();
    }

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

    var aq = '<?php echo $info['tc_equipment'] ?>';
    if(aq == 'Yes'){
        $('.complication_equipment').attr('checked',true);			
    }
    var ae = '<?php echo $info['tc_multiple_attempts'] ?>';
    if(ae == 'Yes'){
        $('.complication_multi_attempts').attr('checked',true);			
    }
    var aw = '<?php echo $info['tc_2_anaesthetist'] ?>';
    if(aw == 'Yes'){
        $('.complication_2nd_anaesthe').attr('checked',true);			
    }
    var au = '<?php echo $info['tc_failure_space'] ?>';
    if(au == 'Yes'){
        $('.complication_failure_space').attr('checked',true);			
    }
    var ai = '<?php echo $info['tc_catheter_related'] ?>';
    if(ai == 'Yes'){
        $('.complication_catheter').attr('checked',true);			
    }
    var ap = '<?php echo $info['tc_other'] ?>';
    var ap_split = ap.split(',');
    // alert(ap_split[0]);   
    if(ap_split[0] == 'Yes'){
        $('.spinal_technical_other').attr('checked',true);		
        $('.spinal_technical_input').show();
        $('.complication_other').val(ap_split[1]);
    }
    if(aq || ae || aw || au || ai || ap ){
        $('.tech_complication_check').attr('checked',true);		
        $('.tech_complication_checkbox').show();	
    }
    $('.spinal_acute_multi_option').click(function(){
		var epidural_clonidne =$('.spinal_acute_multi_option').is(':checked');		
		if(!epidural_clonidne){
        	$(".spinal_acute_multi_option_box").hide();
		}
		else{
			$('.spinal_acute_multi_option_box').show();
		}
	});

    // var z1 = '<?php echo $info['ac_epidural_resited'] ?>';
    var z2 = '<?php echo $info['ac_last'] ?>';
    var z3 = '<?php echo $info['ac_respiratory_arrest'] ?>';
    var z4 = '<?php echo $info['ac_cardiac_arrest'] ?>';
    var z5 = '<?php echo $info['ac_radicular_pain'] ?>';
    var z6 = '<?php echo $info['ac_paresthesia_pain'] ?>';
    var z7 = '<?php echo $info['ac_bloody_tap'] ?>';
    // var z8 = '<?php echo $info['ac_wet_tap'] ?>';
    var z9 = '<?php echo $info['ac_hypotension'] ?>';
    var z10 = '<?php echo $info['ac_nausea'] ?>';
    var z11 = '<?php echo $info['ac_vomiting'] ?>';
    var z12 = '<?php echo $info['ac_high_block'] ?>';
    var z13 = '<?php echo $info['ac_subdural_block'] ?>';
    // var z14 = '<?php echo $info['ac_moto_block'] ?>';
    var z15 = '<?php echo $info['ac_total_spinal'] ?>';
    // var z16 = '<?php echo $info['ac_accidental_dural'] ?>';
    var z17 = '<?php echo $info['ac_other'] ?>';
    var z17_split = z17.split(','); 
    // var z18 = '<?php echo $info['ac_other_input'] ?>';

    // if(z1 == 'Yes'){
    //     $('.ac_epidural_resited').attr('checked',true);			
    // }
    if(z2 == 'Yes'){
        $('.ac_last').attr('checked',true);			
    }
    if(z3 == 'Yes'){
        $('.ac_respira_arrest').attr('checked',true);			
    }
    if(z4 == 'Yes'){
        $('.ac_cardiac_arrest').attr('checked',true);			
    }
    if(z5 == 'Yes'){
        $('.ac_rasicular_pain').attr('checked',true);			
    }
    if(z6 == 'Yes'){
        $('.ac_paresthesia_pain').attr('checked',true);			
    }
    if(z7 == 'Yes'){
        $('.ac_bloody_tap').attr('checked',true);			
    }
    // if(z8 == 'Yes'){
    //     $('.ac_wet_tap').attr('checked',true);			
    // }
    if(z9 == 'Yes'){
        $('.ac_hypotension').attr('checked',true);			
    }
    if(z10 == 'Yes'){
        $('.ac_nausea').attr('checked',true);			
    }
    if(z11 == 'Yes'){
        $('.ac_vomiting').attr('checked',true);			
    }
    if(z12 == 'Yes'){
        $('.ac_high_block').attr('checked',true);			
    }
    if(z13 == 'Yes'){
        $('.ac_subdural_block').attr('checked',true);			
    }
    // if(z14 == 'Yes'){
    //     $('.ac_motor_block').attr('checked',true);			
    // }
    if(z15 == 'Yes'){
        $('.ac_total_spinal').attr('checked',true);			
    }
    // if(z16 == 'Yes'){
    //     $('.ac_accidental').attr('checked',true);			
    // }
    if(z17_split[0] == 'Yes'){
        $('.spinal_acute_other').attr('checked',true);
        $('.spinal_acute_other_input').show();	
        $('.spinal_acute_other_input').val(z17_split[1]);
    }

    if(z2 || z3 || z4 || z5 || z6 || z7 || z9 || z10 || z11 || z12 || z13 || z15 || z17[0]){
        
        $('.spinal_acute_multi_option').attr('checked',true);
        $('.spinal_acute_multi_option_box').show();
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

    var yt = "<?php echo $info['success']; ?>";
    var yz = "<?php echo $info['success_onset']; ?>";
    if(yt=="Complete Success"){
        $('#com')[0].checked = true;
        $("#com1").attr("readonly", false);
        $("#com1").val(yz);
    }else if(yt=="Partial Success"){
        $('#par')[0].checked = true;
        $("#par1").attr("readonly", false);
        $("#par1").val(yz);
    }else{
        $('#fail')[0].checked = true;
    }

    var qe = '<?php echo $info['motor_level']; ?>';
    $('.motor_level').val(qe);
    var qt = '<?php echo $info['onset_surgical_anaesthesia']; ?>';
    $('.surgical_onset').val(qt);
    var qt = '<?php echo $info['duration_surgery']; ?>';
    $('.duration_of_surgery').val(qt);
    var qo = '<?php echo $info['blood_loss']; ?>';
    $('.blood_loss').val(qo);
    var qp = '<?php echo $info['vasopressor_use']; ?>';
    if(qp == 'Yes'){
        $('.vasopressor_use').attr('checked',true);			
    }

</script>


<?php
    echo view('includes/footer');    
?>
