<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

<section class="add-csa-view">
    <div class="row">
        <div class="col-sm-10"> <h4 class="pt"><b>Continuous Spinal Anaesthesia (CSA)</b></h4></div>
        <div class="col-sm-2">
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
                            <td class="bg-pat2">Procedure Date and Time</td>
                            <td><?php echo 'Date : '.date("d-m-Y",strtotime($info['procedure_date'])).'   Time: '.$info['time']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">CNB Done by</td>
                            <td><?php echo $info['cnb2']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Supervision</td>
                            <td><?php echo $info['supervision']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Patient status During Neuraxial Block</td>
                            <td><?php echo $info['patient_status']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Patient Position</td>
                            <td><?php echo $info['patient_position']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2"><b>Asepsis</b></td>
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
                            <td class="bg-pat2">Skin Prep</td>
                            <td><?php echo $info['skin_prep']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->

        <h4 class="pt"><b>Ultra Sound</b></h4>
            <div class="epidural-card2">
                <div class="card-header">
                    <ul>
                        <li><b>Probe Cover</b></li>
                        <li><b>Image Quality</b></li>
                    </ul>
                </div>
                <div class="card-body">
                    <ul>
                        <li><span><?php echo $info['probe_cover']; ?></span></li>
                        <li><span><?php echo $info['image_quality']; ?></span></li>
                    </ul>
                </div>
            </div><!--epidural-card2-->
     
     <!--    <h5 class="pt"><b>CSA</b></h5> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>CSA</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['csa']; ?></p>
            </div>
        </div><!--csa-view-card1-->
     <!--    <h4 class="pt"><b>Anatomical Landmark</b></h4> -->
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
      <!--   <h4 class="pt"><b>Needle Brand,Type and Size</b></h4> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <ul>
                    <li><b>Spinal Needle Brand</b></li>
                    <li><b>Spinal Needle Type</b></li>
                    <li><b>Spinal Needle Size</b></li>
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
     <!--    <h4 class="pt"><b>Approach</b></h4> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Approach</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['approach']; ?></p>
            </div>
        </div><!--csa-view-card2-->
       <!--  <h4 class="pt"><b>Number of Attempts</b></h4> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Number of Attempts</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['no_attempts']; ?></p>
            </div>
        </div><!--csa-view-card2-->
     <!--    <h4 class="pt"><b>Spinal Catheter Type</b></h4> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Spinal Catheter Type</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['catheter_type']; ?></p>
            </div>
        </div><!--csa-view-card2-->
       <!--  <h4 class="pt"><b>Catheter mark at Skin (cm) </b></h4> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Catheter mark at Skin (cm) </b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['catheter_mark']; ?></p>
            </div>
        </div><!--csa-view-card2-->
     <!--    <h4 class="pt"><b>Test Dose</b></h4> -->
        <div class="csa-view-card2">
            <div class="card-header">
                <h5><b>Intra Operative LA Regimen</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['la_regimen']; ?></p>
            </div>
        </div><!--csa-view-card2-->
        <h4 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption</b></h4>
        <h5><b>Local Anaesthetic</b></h5>
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
                                if( $other_spinal[0] != ''){
                            ?>
                                <td style="border:0;"><?php echo $other_spinal[0]; ?> - <?php echo $other_spinal[1]; ?></td>
                                <td style="border:0;"><?php echo $other_spinal[2]; ?></td>
                                <td style="border:0;"><?php echo $other_spinal[3]; ?></td>
                                <td style="border:0;"><?php echo $other_spinal[4]; ?></td>
                            <?php } else{ ?>
                                <td><b>NO</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            <?php } ?>
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
                            <td class="bg-pat2">Adrenaline(Epinephrine)(mcmg)</td>
                            <td><?php echo $info['']; ?></td>
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
                        
                        <?php	                            				
                            $aj_spinal_op = $info['asr_opioid_name_dose'];
                            $aj_spinal_opioid = json_decode($aj_spinal_op, true);
                            if($aj_spinal_opioid[0]['name'] != ''){
                        ?>
                        <tr>
                            <td class="bg-pat2">Opioids</td>
                            <td>Yes</td>
                        </tr>
                        <?php
                            
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
                        <?php }}else{ ?>

                            <tr>
                                <td class="bg-pat2">Opioids</td>
                                <td>No</td>
                            </tr>

                        <?php } ?>
                       <!--  <tr>
                            <td class="bg-pat2">Multi-modal Analgesia</td>
                            <td><?php echo $info['asr_multi_model']; ?></td>
                        </tr> -->
                         <tr>
                            <td class="bg-pat2">Paracetamol / Anti-Inflammatories</td>
                            <td><?php echo $info['asr_multi_model']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ketamine</td>
                            <td><?php echo $info['asr_ketamine']; ?></td>
                        </tr>
                       
                        <?php	                            				
                            $aj_spinal_op = $info['asr_other_name_dose'];
                            $aj_spinal_opioid = json_decode($aj_spinal_op, true);
                            if($aj_spinal_opioid[0]['name'] != ''){
                        ?>
                            <tr>
                                <td class="bg-pat2" >Other IV adjuncts</td>
                                <td >Yes</td>
                            </tr>
                        <?php
                            
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
                        <?php } } else{?>
                            <tr>
                                <td class="bg-pat2" >Other IV adjuncts</td>
                                <td >No</td>
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
                       <!--  <tr>
                            <td class="bg-pat2">None</td>
                            <td><?php echo $info['complication_none']; ?></td>
                        </tr> -->
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
                        <?php 
                            $oth = $info['tc_other'];
                            $oth1 = explode(',',$oth);
                            if($oth1[0] == 'Yes'){
                        ?>   
                            <!-- <tr>
                                <td class="bg-pat2">Other</td>
                                <td>Yes</td>
                            </tr>                      -->
                        <tr>
                            <td class="bg-pat2">Other - Yes</td>
                            <td><?php echo $oth1[1]; ?></td>
                        </tr>
                        <?php }else{ ?>
                            <tr>
                                <td class="bg-pat2">Other</td>
                                <td>No</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <h4 class="pt"><b>Acute Complications</b></h4>
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                       <!--  <tr>
                            <td class="bg-pat2">None</td>
                            <td><?php echo $info['ac_none']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Local Anaesthetic systemic toxicity(LAST)</td>
                            <td><?php echo $info['ac_last']; ?></td>
                      <!--  </tr>
                        <tr>
                            <td class="bg-pat2">Respiratory Arrest</td>
                            <td><?php echo $info['ac_respiratory_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Cardiac Arrest</td>
                            <td><?php echo $info['ac_cardiac_arrest']; ?></td> ---->
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
                            <td class="bg-pat2">Respiratory Arrest</td>
                            <td><?php echo $info['ac_respiratory_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Cardiac Arrest</td>
                            <td><?php echo $info['ac_cardiac_arrest']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Other</td>
                            <td><?php echo $info['ac_other']; ?></td>
                        </tr> -->
                        <?php 
                            $oth = $info['ac_other'];
                            $oth1 = explode(',',$oth);
                            if($oth1[0] == 'Yes'){
                        ?>   
                            <!-- <tr>
                                <td class="bg-pat2">Other</td>
                                <td>Yes</td>
                            </tr>                      -->
                        <tr>
                            <td class="bg-pat2">Other - Yes</td>
                            <td><?php echo $oth1[1]; ?></td>
                        </tr>
                        <?php }else{ ?>
                            <tr>
                                <td class="bg-pat2">Other</td>
                                <td>No</td>
                            </tr>
                        <?php } ?>
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
        <!-- <div class="csa-view-table1">
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
        </div> -->
        <div class="body-img">
            <div class="row">
                <div class="col-sm-4">
                   <!--  <h5><b>Level To Cold</b></h5> -->
                    <!-- <p><span style="margin: 0 30px 0 0;">Highest Level</span>Highest Level</p>
                    <p>LEFT:<span style="color:red;margin: 0 65px 0 0;">T2</span>RIGHT:<span style="color:red;">T2</span></p>
                    <p><span style="margin: 0 30px 0 0;">Lowest Level</span>Lowest Level</p>
                    <p>LEFT:<span style="color:red;margin: 0 65px 0 0;">L1</span>RIGHT:<span style="color:red;">L2</span></p> -->
                    <div class="t-1">
                        <h5><b>Cold</b></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>L</th>
                                        <th>R</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:50%;">Higher Sensory Level</td>
                                        <?php if( $info['sl_cold_l'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_cold_l'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);                                            
                                            ?>
                                            <td style="color:red;"><p> <?php echo $high_sub[2]; ?></p></td>                                            
                                        <?php } ?>  

                                        <?php if( $info['sl_cold_r'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_cold_r'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);                                            
                                            ?>
                                            <td style="color:red;"><p> <?php echo $high_sub[2]; ?></p></td>                                            
                                        <?php } ?>  
                                       
                                    </tr>
                                    <tr>
                                        <td style="width:50%;">Low Sensory Level</td>
                                        
                                        <?php if( $info['sl_cold_l'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_cold_l'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]); 
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $low_sub[2]; ?></p></td>                                            
                                        <?php } ?>  

                                        <?php if( $info['sl_cold_r'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_cold_r'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]); 
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $low_sub[2]; ?></p></td>                                            
                                        <?php } ?>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--t-1-->
                    <div class="t-1">
                        <h5><b>Touch</b></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>L</th>
                                        <th>R</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:50%;">Higher Sensory Level</td>
                                        <?php if( $info['sl_touch_l'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_touch_l'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);                                            
                                            ?>
                                            <td style="color:red;"><p> <?php echo $high_sub[2]; ?></p></td>                                            
                                        <?php } ?>  

                                        <?php if( $info['sl_touch_r'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_touch_r'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);                                            
                                            ?>
                                            <td style="color:red;"><p> <?php echo $high_sub[2]; ?></p></td>                                            
                                        <?php } ?> 
                                       
                                    </tr>
                                    <tr>
                                       
                                        <td style="width:50%;">Low Sensory Level</td>
                                      
                                        <?php if( $info['sl_touch_l'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_touch_l'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]); 
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $low_sub[2]; ?></p></td>                                            
                                        <?php } ?>  

                                        <?php if( $info['sl_touch_r'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_touch_r'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);  
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $low_sub[2]; ?></p></td>                                            
                                        <?php } ?>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--t-1-->
                    <div class="t-1">
                        <h5><b>Pin Prick</b></h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>L</th>
                                        <th>R</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:50%;">Higher Sensory Level</td>
                                        <?php if( $info['sl_pinpriek_l'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_pinpriek_l'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);                                            
                                            ?>
                                            <td style="color:red;"><p> <?php echo $high_sub[2]; ?></p></td>                                            
                                        <?php } ?>  

                                        <?php if( $info['sl_pinpriek_r'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_pinpriek_r'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);    
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $high_sub[2]; ?></p></td>                                            
                                        <?php } ?> 
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td style="width:50%;">Low Sensory Level</td>
                                       
                                        <?php if( $info['sl_pinpriek_l'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_pinpriek_l'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]); 
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $low_sub[2]; ?></p></td>                                            
                                        <?php } ?>  

                                        <?php if( $info['sl_pinpriek_r'] == '' ) { ?>
                                            <td><p>   - </p></td>
                                        <?php } else{ 
                                            $a = $info['sl_pinpriek_r'];
                                            $xa = explode(',',$a);
                                            $high_sub = explode('-',$xa[0]);      
                                            $low_sub = explode('-',$xa[2]);                                           
                                            ?>
                                            <td style="color:red;"><p> <?php echo $low_sub[2]; ?></p></td>                                            
                                        <?php } ?>  
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--t-1-->
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
                                        <td>C2</td>
                                        <td id="m-cold-L-c2"></td>
                                        <td id="m-cold-R-c2"></td>
                                        <td id="m-Touch-L-c2"></td>
                                        <td id="m-Touch-R-c2"></td>
                                        <td id="m-pinprick-L-c2"></td>
                                        <td id="m-pinprick-R-c2"></td>
                                    </tr>
                                    <tr>
                                        <td>C3</td>
                                        <td id="m-cold-L-c3"></td>
                                        <td id="m-cold-R-c3"></td>
                                        <td id="m-Touch-L-c3"></td>
                                        <td id="m-Touch-R-c3"></td>
                                        <td id="m-pinprick-L-c3"></td>
                                        <td id="m-pinprick-R-c3"></td>
                                    </tr>
                                    <tr>
                                        <td>C4</td>
                                        <td id="m-cold-L-c4"></td>
                                        <td id="m-cold-R-c4"></td>
                                        <td id="m-Touch-L-c4"></td>
                                        <td id="m-Touch-R-c4"></td>
                                        <td id="m-pinprick-L-c4"></td>
                                        <td id="m-pinprick-R-c4"></td>
                                    </tr>
                                    <tr>
                                        <td>C5</td>
                                        <td id="m-cold-L-c5"></td>
                                        <td id="m-cold-R-c5"></td>
                                        <td id="m-Touch-L-c5"></td>
                                        <td id="m-Touch-R-c5"></td>
                                        <td id="m-pinprick-L-c5"></td>
                                        <td id="m-pinprick-R-c5"></td>
                                    </tr>
                                    <tr>
                                        <td>C6</td>
                                        <td id="m-cold-L-c6"></td>
                                        <td id="m-cold-R-c6"></td>
                                        <td id="m-Touch-L-c6"></td>
                                        <td id="m-Touch-R-c6"></td>
                                        <td id="m-pinprick-L-c6"></td>
                                        <td id="m-pinprick-R-c6"></td>
                                    </tr>
                                    <tr>
                                        <td>C7</td>
                                        <td id="m-cold-L-c7"></td>
                                        <td id="m-cold-R-c7"></td>
                                        <td id="m-Touch-L-c7"></td>
                                        <td id="m-Touch-R-c7"></td>
                                        <td id="m-pinprick-L-c7"></td>
                                        <td id="m-pinprick-R-c7"></td>
                                    </tr>
                                    <tr>
                                        <td>C8</td>
                                        <td id="m-cold-L-c8"></td>
                                        <td id="m-cold-R-c8"></td>
                                        <td id="m-Touch-L-c8"></td>
                                        <td id="m-Touch-R-c8"></td>
                                        <td id="m-pinprick-L-c8"></td>
                                        <td id="m-pinprick-R-c8"></td>
                                    </tr>
                                    
                                    <tr>
                                        <td>T1</td>
                                        <td id="m-cold-L-t1"></td>
                                        <td id="m-cold-R-t1"></td>
                                        <td id="m-Touch-L-t1"></td>
                                        <td id="m-Touch-R-t1"></td>
                                        <td id="m-pinprick-L-t1"></td>
                                        <td id="m-pinprick-R-t1"></td>
                                    </tr>
                                    <tr>
                                        <td>T2</td>
                                        <td id="m-cold-L-t2"></td>
                                        <td id="m-cold-R-t2"></td>
                                        <td id="m-Touch-L-t2"></td>
                                        <td id="m-Touch-R-t2"></td>
                                        <td id="m-pinprick-L-t2"></td>
                                        <td id="m-pinprick-R-t2"></td>
                                    </tr>
                                    <tr>
                                        <td>T3</td>
                                        <td id="m-cold-L-t3"></td>
                                        <td id="m-cold-R-t3"></td>
                                        <td id="m-Touch-L-t3"></td>
                                        <td id="m-Touch-R-t3"></td>
                                        <td id="m-pinprick-L-t3"></td>
                                        <td id="m-pinprick-R-t3"></td>
                                    </tr>
                                    <tr>
                                        <td>T4</td>
                                        <td id="m-cold-L-t4"></td>
                                        <td id="m-cold-R-t4"></td>
                                        <td id="m-Touch-L-t4"></td>
                                        <td id="m-Touch-R-t4"></td>
                                        <td id="m-pinprick-L-t4"></td>
                                        <td id="m-pinprick-R-t4"></td>
                                    </tr>
                                    <tr>
                                        <td>T5</td>
                                        <td id="m-cold-L-t5"></td>
                                        <td id="m-cold-R-t5"></td>
                                        <td id="m-Touch-L-t5"></td>
                                        <td id="m-Touch-R-t5"></td>
                                        <td id="m-pinprick-L-t5"></td>
                                        <td id="m-pinprick-R-t5"></td>
                                    </tr>
                                    <tr>
                                        <td>T6</td>
                                        <td id="m-cold-L-t6"></td>
                                        <td id="m-cold-R-t6"></td>
                                        <td id="m-Touch-L-t6"></td>
                                        <td id="m-Touch-R-t6"></td>
                                        <td id="m-pinprick-L-t6"></td>
                                        <td id="m-pinprick-R-t6"></td>
                                    </tr>
                                    <tr>
                                        <td>T7</td>
                                        <td id="m-cold-L-t7"></td>
                                        <td id="m-cold-R-t7"></td>
                                        <td id="m-Touch-L-t7"></td>
                                        <td id="m-Touch-R-t7"></td>
                                        <td id="m-pinprick-L-t7"></td>
                                        <td id="m-pinprick-R-t7"></td>
                                    </tr>
                                    <tr>
                                        <td>T8</td>
                                        <td id="m-cold-L-t8"></td>
                                        <td id="m-cold-R-t8"></td>
                                        <td id="m-Touch-L-t8"></td>
                                        <td id="m-Touch-R-t8"></td>
                                        <td id="m-pinprick-L-t8"></td>
                                        <td id="m-pinprick-R-t8"></td>
                                    </tr>
                                    <tr>
                                        <td>T9</td>
                                        <td id="m-cold-L-t9"></td>											
                                        <td id="m-cold-R-t9"></td>
                                        <td id="m-Touch-L-t9"></td>
                                        <td id="m-Touch-R-t9"></td>
                                        <td id="m-pinprick-L-t9"></td>
                                        <td id="m-pinprick-R-t9"></td>
                                    </tr>
                                    <tr>
                                        <td>T10</td>
                                        <td id="m-cold-L-t10"></td>											
                                        <td id="m-cold-R-t10"></td>
                                        <td id="m-Touch-L-t10"></td>
                                        <td id="m-Touch-R-t10"></td>
                                        <td id="m-pinprick-L-t10"></td>
                                        <td id="m-pinprick-R-t10"></td>
                                    </tr>
                                    <tr>
                                        <td>T11</td>
                                        <td id="m-cold-L-t11"></td>											
                                        <td id="m-cold-R-t11"></td>
                                        <td id="m-Touch-L-t11"></td>
                                        <td id="m-Touch-R-t11"></td>
                                        <td id="m-pinprick-L-t11"></td>
                                        <td id="m-pinprick-R-t11"></td>
                                    </tr>
                                    <tr>
                                        <td>T12</td>
                                        <td id="m-cold-L-t12"></td>											
                                        <td id="m-cold-R-t12"></td>
                                        <td id="m-Touch-L-t12"></td>
                                        <td id="m-Touch-R-t12"></td>
                                        <td id="m-pinprick-L-t12"></td>
                                        <td id="m-pinprick-R-t12"></td>
                                    </tr>
                                    <tr>
                                        <td>L1</td>
                                        <td id="m-cold-L-l1"></td>											
                                        <td id="m-cold-R-l1"></td>
                                        <td id="m-Touch-L-l1"></td>
                                        <td id="m-Touch-R-l1"></td>
                                        <td id="m-pinprick-L-l1"></td>
                                        <td id="m-pinprick-R-l1"></td>
                                    </tr>
                                    <tr>
                                        <td>L2</td>
                                        <td id="m-cold-L-l2"></td>										
                                        <td id="m-cold-R-l2"></td>
                                        <td id="m-Touch-L-l2"></td>
                                        <td id="m-Touch-R-l2"></td>
                                        <td id="m-pinprick-L-l2"></td>
                                        <td id="m-pinprick-R-l2"></td>
                                    </tr>
                                    <tr>
                                        <td>L3</td>
                                        <td id="m-cold-L-l3"></td>											
                                        <td id="m-cold-R-l3"></td>
                                        <td id="m-Touch-L-l3"></td>
                                        <td id="m-Touch-R-l3"></td>
                                        <td id="m-pinprick-L-l3"></td>
                                        <td id="m-pinprick-R-l3"></td>
                                    </tr>
                                    <tr>
                                        <td>L4</td>
                                        <td id="m-cold-L-l4"></td>											
                                        <td id="m-cold-R-l4"></td>
                                        <td id="m-Touch-L-l4"></td>
                                        <td id="m-Touch-R-l4"></td>
                                        <td id="m-pinprick-L-l4"></td>
                                        <td id="m-pinprick-R-l4"></td>
                                    </tr>
                                    <tr>
                                        <td>L5</td>
                                        <td id="m-cold-L-l5"></td>											
                                        <td id="m-cold-R-l5"></td>
                                        <td id="m-Touch-L-l5"></td>
                                        <td id="m-Touch-R-l5"></td>
                                        <td id="m-pinprick-L-l5"></td>
                                        <td id="m-pinprick-R-l5"></td>
                                    </tr>
                                        <td>S1</td>
                                        <td id="m-cold-L-s1"></td>											
                                        <td id="m-cold-R-s1"></td>
                                        <td id="m-Touch-L-s1"></td>
                                        <td id="m-Touch-R-s1"></td>
                                        <td id="m-pinprick-L-s1"></td>
                                        <td id="m-pinprick-R-s1"></td>
                                    </tr>
                                    <tr>
                                        <td>S2</td>
                                        <td id="m-cold-L-s2"></td>											
                                        <td id="m-cold-R-s2"></td>
                                        <td id="m-Touch-L-s2"></td>
                                        <td id="m-Touch-R-s2"></td>
                                        <td id="m-pinprick-L-s2"></td>
                                        <td id="m-pinprick-R-s2"></td>
                                    </tr>
                                    <tr>
                                        <td>S3</td>
                                        <td id="m-cold-L-s3"></td>											
                                        <td id="m-cold-R-s3"></td>
                                        <td id="m-Touch-L-s3"></td>
                                        <td id="m-Touch-R-s3"></td>
                                        <td id="m-pinprick-L-s3"></td>
                                        <td id="m-pinprick-R-s3"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div><!--csa-view-sensor-table-->
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo base_url('public/assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto">
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
                    </tbody>
                </table>
            </div>
        </div><!--csa-view-table1-->
        <div class="bromo-img">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6"><img src="<?php echo base_url('public/assets/images/Bromo.png'); ?>" class="img-fluid d-block mx-auto"></div>
                <div class="col-sm-3"></div>
            </div><!--row-->
        </div><!--bromo-img-->
        <div class="csa-view-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Onset of surgical anaesthesia</td>
                            <td><?php echo $info['onset_surgical_anaesthesia']; ?></td>
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

                    <div class="add-patient" id="">
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
                                <select class="form-control cnb_done_by1" id="cnb_by1" name="cnb_done_by1" onchange="selectcnb1()" required>
                                    <option value="">Select</option>
                                    <option value="Consultant">Consultant</option>
                                    <option value="Trainee">Trainee</option>
                                </select>
                                
                                <select class="form-control cnb_done_by2" id="cnb_by2"  style="margin: 15px 0;"  name="cnb_done_by2" required>
                                    <option value="">Select</option>                            
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

                    <label>Patient status during Neuraxial Block<span class="mandat">*</span></label>
                    <small class="psn" style="color:red; display:none;">please choose patient status</small>
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
                            <div class="pt" id="option_e" style="display:none;padding-top: 10px;">
                                <select class="form-control" id="sedation_opt_e" name="sedation_opt_e">
                                    <option value=''>Select</option>
                                    <option>1-Mild easy to rouse</option>
                                    <option>2-Moderate,easy to rouse,unable to remain awake</option>
                                    <option>3-Difficult to rouse</option>
                                </select>
                            </div>
                            <!-- <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ga_e" value="GA" name="patient_status_e" onclick="hide()">GA
                                </label>
                            </div> -->
                            <?php if($ga  == 'Sole/Primary Anaesthetic') {?>
                            <div class="form-check" style="display:none;">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ga_e" value="GA" name="patient_status_e" onclick="hide()" >GA
                                </label>
                            </div>
                            <?php } else{ ?>
                                <div class="form-check">
                                <label class="form-check-label">
                                <input type="radio" class="form-check-input" id="ga_e" value="GA" name="patient_status_e" onclick="hide()" >GA
                                </label>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-sm-4"></div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label style="font-size:13px;">Patient Position<span class="mandat">*</span></label></div>
                        <div class="col-sm-4">
                            <select class="form-control" id="patient_position_e" name="patient_position_e" onchange="checkpos()">
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
                                                <input type="hidden" class="switch_1" value="No" name="wearing_mask_e">
                                                <input type="checkbox" class="switch_1" id="wearing_mask_e" value="Yes" name="wearing_mask_e" onclick="checkasep()">
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="togle">
                                            <label>Hand washing</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="hand_washing_e">
                                                <input type="checkbox" class="switch_1" value="Yes" id="hand_washing_e" name="hand_washing_e" onclick="checkasep()">
                                            </div>
                                        </div>
                                    </li>
                                </ul><!-------------------->
                                <ul style="margin-bottom:0;">
                                    <li>
                                        <div class="togle">
                                            <label>Sterile gown</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="sterile_gown_e">
                                                <input type="checkbox" class="switch_1" value="Yes" id="sterile_gown_e" name="sterile_gown_e" onclick="checkasep()"> 
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="togle">
                                            <label>Sterile draping</label>
                                            <div class= "box_1">
                                                <input type="hidden" class="switch_1" value="No" name="sterile_draping_e">
                                                <input type="checkbox" class="switch_1" value="Yes" id="sterile_draping_e" name="sterile_draping_e" onclick="checkasep()">
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
                            <select class="form-control" id="skin_prep_e" name="skin_prep_e" onchange="checkskin()">
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
                <!-- 	<h5 class="pt"><b>Continous Spinal Anaesthesia(CSA)</b><span class="mandat">*</span></h5> -->
                    <div class="row pt">
                        <div class="col-sm-2"><span><b>CSA</b><span class="mandat">*</span></span></div>
                        <div class="col-sm-5">
                            <select class="form-control" id="csa_e" name="csa_e" onchange='csa_class()'>
                                <option value=''>Select</option>
                                <option>Accidental</option>
                                <option>Intentional</option>
                            </select>
                            <small class="csa_class" style="color:red; display:none;">please enter CSA option</small>               

                        </div>
                        <div class="col-sm-5"></div>
                    </div><!--row-->
                    <!-- <h5><b>Epidural<span class="mandat">*</span></b></h5> -->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Anatomical Landmark<span class="mandat"></span></label></div>
                        <div class="col-sm-4">
                            <select class="form-control" id="landmark_e" name="landmark_e">
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
                                <input type="hidden" class="switch_1" value="No" name="epidural_ultra_sound">
                                <input type="checkbox" class="switch_1" value="Yes" id="epidural_ultra_sound" name="epidural_ultra_sound" onclick="ultra()">
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                    <div class="epidural_ultrasound" style="display:none;margin-bottom: 15px;">
                        <div class="row pt">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"><span>Probe Cover</span></div>
                            <div class="col-sm-4">
                                <select class="form-control" id="epidural_probe_cover" name="epidural_probe_cover">
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
                                <select class="form-control" id="epidural_image_quality" name="epidural_image_quality">
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
                    <!-- <div class="row"> -->
                        <div class="col-sm-3"><label>CSA Spinal Level</label></div>
                        <div class="col-sm-3 pb-3">
                            <input type="text" class="form-control text-center" id="epidu" name="csa_spinal_level" readonly>
                        </div>
                        <div class="col-sm-3">
                           
                        </div>
                        <div class="col-sm-3">
                             <input type="text" class="form-control text-center" id="level_name" name="csa_spinal_level_name" readonly>
                        </div>
                    <!-- </div>row -->
                    </div><!--row-->
                     <h5 style="position: relative;top: 179px;" class="csa-tag"><b>Click on the appropriate <br> CSA level here</b></h5>
                    <div class="row human-skeleton">
                        <div class="col-sm-12">
                            <img src="<?php echo base_url('public/assets/images/Spinal-new-img.png'); ?>" class="img-fluid d-block mx-auto">
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
                            <div class="row mb-4">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4 pt">
                                    <select class="form-control spinal_needle_size" name="spinal_needle_size">
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
                    <div class="row pt mb-4">
                        <div class="col-sm-2"><label>Approach</label></div>
                        <div class="col-sm-4">
                            <select class="form-control spinal_approach" name="spinal_approach">
                                <option value=''>Select</option>
                                <option>Midline</option>
                                <option>Paramedian</option>
                            </select>
                        </div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Number of Attempts</label></div>
                        <div class="col-sm-4">
                            <select class="form-control spinal_attempts" name="spinal_attempts">
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
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Spinal Catheter Type</label></div>
                        <div class="col-sm-4">
                            <select class="form-control catheter_type" name="catheter_type">
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
                            <input type="number" class="form-control skin_mark" name="skin_mark">
                        </div>
                        <div class="col-sm-7"></div>
                    </div><!--row-->
                    <div class="row pt">
                        <div class="col-sm-2"><label>Intra Operative LA Regimen</label></div>
                        <div class="col-sm-4">
                            <select class="form-control la_regimen" name="la_regimen">
                                <option value=''>Select</option>
                                <option>Continous Infusion</option>
                                <option>Intermittent Bolus</option>
                            </select>
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                  <!--   <h5 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption<a href="#" data-toggle="tooltip"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></b></h5> -->
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
                            <span><b>Local Anaesthetic</b></span>
                            <div class="procedure-cse">
                            <div class="pac-box">
                                <div class="pacu-1"><p>Lignocaine</p></div>
                                    <div class="pacu-1-x">
                                        <select class="form-control spinal_option1" name="spinal_lignoca_option1">
                                            <option value=''>Select</option>
                                            <option>Heavy</option>
                                            <option>Iso/Hypobaric</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_persent1" name="spinal_lignoca_persent1" onkeyup="persentage('alert1')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_ml1" name="spinal_lignoca_ml1" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control spinal_mg1" name="spinal_lignoca_mg1" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean1()" class="fa fa-times" id="clear1" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                        <select class="form-control spinal_option2" name="spinal_bupivaca_option2">
                                            <option value=''>Select</option>
                                            <option>Heavy</option>
                                            <option>Iso/Hypobaric</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_persent2" name="spinal_bupivaca_persent2" onkeyup="persentage('alert2')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_ml2" name="spinal_bupivaca_ml2" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control spinal_mg2" name="spinal_bupivaca_mg2" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean2()" class="fa fa-times" id="clear2" title="clear" aria-hidden="true" style="margin-top: 10px; color:#1974A7;cursor: pointer;"></i>
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
                                        <select class="form-control spinal_option3" name="spinal_ropivaca_option3">
                                            <option value=''>Select</option>
                                            <option>Heavy</option>
                                            <option>Iso/Hypobaric</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_persent3" name="spinal_ropivaca_persent3" onkeyup="persentage('alert3')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_ml3" name="spinal_ropivaca_ml3" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control spinal_mg3" name="spinal_ropivaca_mg3" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean3()" class="fa fa-times" id="clear3" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                        <select class="form-control spinal_option4" name="spinal_priloca_option4">
                                            <option value=''>Select</option>
                                            <option>Heavy</option>
                                            <option>Iso/Hypobaric</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_persent4" name="spinal_priloca_persent4" onkeyup="persentage('alert4')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_ml4" name="spinal_priloca_ml4" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control spinal_mg4" name="spinal_priloca_mg4" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean4()" class="fa fa-times" id="clear4" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                        <select class="form-control spinal_option5" name="spinal_2chloropro_option5">
                                            <option value=''>Select</option>
                                            <option>Heavy</option>
                                            <option>Iso/Hypobaric</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_persent5" name="spinal_2chloropro_persent5" onkeyup="persentage('alert5')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_ml5" name="spinal_2chloropro_ml5" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control spinal_mg5" name="spinal_2chloropro_mg5" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean5()" class="fa fa-times" id="clear5" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                        <input type="checkbox" class="form-check-input spinal_anaesth_other" value="Yes" name="spinal_anaesth_other">Other
                                    </label>
                                </div>
                                <div class="pac-box spinal_anaesth_other_option" style="display:none;">
                                    <div class="pacu-1"><input type="text" class="form-control la" name="local_anaesthetic"></div>
                                    <div class="pacu-1-x">
                                        <!-- <input type="text" class="form-control spinal_anaesth_other_input" name="spinal_other_input6"> -->
                                        <select class="form-control spinal_anaesth_other_input" name="spinal_other_input6">
                                            <option value=''>Select</option>
                                            <option>Heavy</option>
                                            <option>Iso/Hypobaric</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_persent6" name="spinal_other_persent6" onkeyup="persentage('alert6')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control spinal_ml6" name="spinal_other_ml6" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control spinal_mg6" name="spinal_other_mg6" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean6()" class="fa fa-times" id="clear6" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
							<input type="checkbox" class="switch_1 epidural_adjuvant" value="Yes" name="ajuvant_status" id = "epidural_adjuvant1" onclick="epidural_adjuvant()">
						</div>
						
						<div class="pt epidural_adjuvant_check" id="proced-plus" style="display:none;">

							<div class="form-check">
								<label class="form-check-label">
                                    <input type="hidden" class="switch_1" value="No" name="epidural_opioid_status">
								    <input type="checkbox" class="form-check-input epidural_opioid" value="Yes" name="epidural_opioid_status" onclick="epidural_opioid()">Opioid
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
							<div class="row pt">
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input epidural_adrenaline" value="">Adrenaline(Epinephrine)(mcmg)
                                        </label>
                                    </div>
                                </div>
							    <div class="col-sm-7"><input type="text" class="form-control epidural_adrenaline_input" name="epidural_adrenaline_dose" placeholder="mcmg" readonly></div>
							</div>
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

                    <h5 class="bt"></h5>

                    <label class="pt"><b>Analgesia supplementation required<span class="mandat"></span></b>
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
                        <div class="col-sm-10" style="">
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
									<!-- <div class="form-check" style="margin-left: 3%;">
										<label class="form-check-label">
											<input type="hidden" class="switch_1" value="No" name="asr_multi_modal">
											<input type="checkbox" class="form-check-input spinal_multi_model" value="Yes" name="asr_multi_modal">Multi-Modal Analgesia
										</label>
									</div> -->
                                    <div class="form-check" style="margin-left: 3%;">
                                        <label class="form-check-label">
                                            <input type="hidden" class="switch_1" value="No" name="asr_multi_modal">
                                            <input type="checkbox" class="form-check-input spinal_multi_model" value="Yes" name="asr_multi_modal">Paracetamol / Anti-Inflammatories
                                        </label>
                                    </div>
								<div class="spinal_multi_model_box" >
									<div class="form-check" style="margin-left: 3%;">
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
									<div class="form-check" style="margin-left: 3%;">
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
                    <label class="pt"><b>Technical complications<span class="mandat"></span></b>
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
                                <!-- <ul style="margin-bottom:0px;padding-left: 0;">    
                                    <li>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="hidden" class="switch_1" value="No" name="tc_none">
                                                <input type="checkbox" class="form-check-input" id="tc_none" value="Yes" name="tc_none">None
                                            </label>
                                        </div>
                                    </li>
                                </ul> -->
                            </div>
                        </div>
                    </div><!--row-->
                    <label class="pt"><b>Acute complications<span class="mandat"></span></b>
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
                                <input type="checkbox" class="switch_1 spinal_acute_multi_option" value="Yes" name="ac_status" id="acu" onclick="acute()">
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
                                        <input type="checkbox" class="form-check-input ac_paresthesia_pain" value="Yes" name="ac_paresthesia_pain">Paresthesia(needle/catheter)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_bloody_tap">
                                        <input type="checkbox" class="form-check-input ac_bloody_tap" value="Yes" name="ac_bloody_tap">Bloody Tap (needle/catheter)
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
                               <!--  <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ac_none">
                                        <input type="checkbox" class="form-check-input" id="ac_none" value="Yes" name="ac_none">None
                                    </label>
                                </div> -->
                            </div>
                        </div>
                    </div><!--row-->
                    <label class="pt"><b>Success<span class="mandat">*</span></b>
                      <div class="tooltip-6">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <div class="right-6">
                                <div class="text-content-6">
                                    <h6>Please consider the purpose of CNB along with the below definition. <br><br> Purpose of CNB : <br> 1. Sole/Primary anaesthetic <br> 2. Analgesic purpose only<br><br>Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade.</h6>
                                    <i></i>
                                </div>
                            </div>
                        </div>  
                    </label>
                    &nbsp;<small class="succes" style="color:red; display:none;">please choose success status</small></label>
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
                                            <h6><b>Complete Success:</b> <br>With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.<br><br>Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.<br><br>If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal.</h6>
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

                            <div class="sensory_box" style="display:none;">

                                <div class="index-color d-flex mt-3" style="margin-top:15%;">
                                    <ul>
                                        <li><div class="highest"></div></li>
                                        <li><span>Highest Sensory Level</span></li>
                                    </ul>
                                    <ul>
                                        <li><div class="lowest"></div></li>
                                        <li><span>Lowest Sensory Level</span></li>
                                    </ul>
                                </div>
                                <input type="hidden" id="numbers">						
                                <input type="hidden" id="ids">
                                <input type="hidden" id="values">
                                <button type="button" class="btn-red" onclick="refer('red')">Red</button>
                                <button type="button" class="btn-green" onclick="refer('green')">Green</button>
                            </div>
                                
                            <img src="<?php echo base_url('public/assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto" style="margin-top:25%;">

                            <div class="sensory_box" style="display:none;margin-top:15%;">

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
                                <input type="hidden" id="numbers">						
                                <input type="hidden" id="ids">
                                <input type="hidden" id="values">
                                <button type="button" class="btn-red" onclick="refer('red')">Red</button>
                                <button type="button" class="btn-green" onclick="refer('green')">Green</button>
                            </div>
                        </div>
                    </div><!--row-->
                    <h4><b>Motor Level (Bromage Score)<span class="mandat">*</span></b></h4>
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-7">
                            <select class="form-control motor_level" name="motor_level" onchange="checkmotor()">
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
                            <button type="submit" class="btn-save update">update</button>
                            <button type="button" class="btn-close" id="cls" data-dismiss="modal">Close</button>
                        </div>
                    </div><!--row-->
                </form>
            </div><!--modal-body-->
            
    
            </div>
        </div>
        </div>
</section><!--edit-combined-spinal-->

<script>

    

    $("input[name='optradio']").change(function(){
		$('.psn').hide();
	});

    $("input[name='optradio2']").change(function(){
		$('.succes').hide();
	});

    function checkpos(){
		var pos = $('#patient_position_e').val();
		if(pos != ''){
			$('.pat').hide();
		}
	}

    $("input[name='patient_status_e']").change(function(){
		$('.psn').hide();
	});
    
    function checkasep(){
        var wearing = $('#wearing_mask_e').is(':checked');
        var sterile = $('#sterile_gown_e').is(':checked');
        var hand = $('#hand_washing_e').is(':checked');
        var drap = $('#sterile_draping_e').is(':checked');
        if(wearing || sterile || hand || drap){
            $('.asep').hide();
        }
	}

    function csa_class(){
        var csa_e = $('#csa_e').val();
        if(csa_e != ''){
            $('.csa_class').hide();
        }
    }

    function checkmotor(){
		var mot = $('.motor_level').val();
		if((mot != '')){
			$('.motro').hide();
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
                $('.complication_other').val('');
                $('.technical').hide();
                $("#teche").text(' NO ');
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
   
</script>

<script>

    function checkskin(){
		var skin = $('#skin_prep_e').val();
		if((skin != '')){
			$('.skp').hide();
		}

        var skin_prep_other = $('#skin_prep_e').val();

        if(skin_prep_other == 'Other'){
            $('#skin_prep_other').show();
        }else{
            $('#skin_prep_other').hide();
            $('#skin_prep_other').val('');
        }
	}

    function selectcnb1(){ 
        // var sele = document.getElementById("cnb_done_by1").value;
        var sele = $('#cnb_by1').val();
        // alert(sele);
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

    var procedure_date = "<?php echo date("d-m-Y",strtotime($info['procedure_date'])); ?>";
    //toastr.error(procedure_date);
    var procedure_time = "<?php echo $info['time']; ?>";
    var cnb1 = "<?php echo $info['cnb1']; ?>";
    var cnb2 = "<?php echo $info['cnb2']; ?>";
    var supervision = "<?php echo $info['supervision']; ?>";

    $('.date_time_m').val(procedure_date);
    $('.time_m').val(procedure_time);
    $('.cnb_done_by1').val(cnb1);
    if(cnb1 == 'Trainee'){
        $('#consultant').show();
        $("#cnb_by2").empty();
        var str = ""
        str += "<option>Junior Trainee</option>";
        str += "<option>Senior Trainee</option>";
           
        $("#cnb_by2").append(str);
    }
    else{
        $('#consultant').show();
        $("#cnb_by2").empty();
        var str = "" 
        str += "<option>Junior Consultant</option>";
        str += "<option>Senior Consultant</option>";
        $("#cnb_by2").append(str);
    }
    $('#cnb_by2').val(cnb2);
    $('.supervision').val(supervision);

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
         var ac_respi_arrest = $('.ac_respira_arrest').is(':checked');

         var ac_cardiac_arrest = $('.ac_cardiac_arrest').is(':checked');
         var maternal_fever = $('.maternal_fever').is(':checked');
         var ac_rasicular_pain = $('.ac_rasicular_pain').is(':checked');
         var ot = $('.spinal_acute_other').is(':checked');
         

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
        else if(ac_rasicular_pain){
            toastr.error('Please Uncheck Radicular Pain');
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
    
    var sl_cold_l = "<?php echo $info['sl_cold_l']; ?>";
    var sl_cold_r = "<?php echo $info['sl_cold_r']; ?>";
    var sl_touch_l = "<?php echo $info['sl_touch_l']; ?>";
    var sl_touch_r = "<?php echo $info['sl_touch_r']; ?>";
    var sl_pinpriek_l = "<?php echo $info['sl_pinpriek_l']; ?>";
    var sl_pinpriek_r = "<?php echo $info['sl_pinpriek_r']; ?>";

    if(sl_cold_l != ''){
        var sl_cold_l_split = sl_cold_l.split(',');

        $('#'+'m-'+sl_cold_l_split[0]+'').css("background",sl_cold_l_split[1]);
        $('#'+'m-'+sl_cold_l_split[2]+'').css("background",sl_cold_l_split[3]);
    }
    if(sl_cold_r != ''){        
        var sl_cold_r_split = sl_cold_r.split(',');

        $('#'+'m-'+sl_cold_r_split[0]+'').css("background",sl_cold_r_split[1]);
        $('#'+'m-'+sl_cold_r_split[2]+'').css("background",sl_cold_r_split[3]);
    }
    if(sl_touch_l != ''){
        var sl_touch_l_split = sl_touch_l.split(',');

        $('#'+'m-'+sl_touch_l_split[0]+'').css("background",sl_touch_l_split[1]);
        $('#'+'m-'+sl_touch_l_split[2]+'').css("background",sl_touch_l_split[3]);
    }
    if(sl_touch_r != ''){
        var sl_touch_r_split = sl_touch_r.split(',');

        $('#'+'m-'+sl_touch_r_split[0]+'').css("background",sl_touch_r_split[1]);
        $('#'+'m-'+sl_touch_r_split[2]+'').css("background",sl_touch_r_split[3]);
    }
    if(sl_pinpriek_l != ''){
        var sl_pinpriek_l_split = sl_pinpriek_l.split(',');

        $('#'+'m-'+sl_pinpriek_l_split[0]+'').css("background",sl_pinpriek_l_split[1]);
        $('#'+'m-'+sl_pinpriek_l_split[2]+'').css("background",sl_pinpriek_l_split[3]);
    }
    if(sl_pinpriek_r != ''){
        var sl_pinpriek_r_split = sl_pinpriek_r.split(',');

        $('#'+'m-'+sl_pinpriek_r_split[0]+'').css("background",sl_pinpriek_r_split[1]);
        $('#'+'m-'+sl_pinpriek_r_split[2]+'').css("background",sl_pinpriek_r_split[3]);
    } 

</script>

<!-- -------------------------------model---------------------------- -->
<script>
    var sl_cold_l = "<?php echo $info['sl_cold_l']; ?>";
    var sl_cold_r = "<?php echo $info['sl_cold_r']; ?>";
    var sl_touch_l = "<?php echo $info['sl_touch_l']; ?>";
    var sl_touch_r = "<?php echo $info['sl_touch_r']; ?>";
    var sl_pinpriek_l = "<?php echo $info['sl_pinpriek_l']; ?>";
    var sl_pinpriek_r = "<?php echo $info['sl_pinpriek_r']; ?>";
    var sl_cold_l_split = sl_cold_l.split(',');
    var sl_cold_r_split = sl_cold_r.split(',');
    var sl_touch_l_split = sl_touch_l.split(',');
    var sl_touch_r_split = sl_touch_r.split(',');
    var sl_pinpriek_l_split = sl_pinpriek_l.split(',');
    var sl_pinpriek_r_split = sl_pinpriek_r.split(',');
    if(sl_cold_l != ''){

        $('#'+sl_cold_l_split[0]+'').css("background",sl_cold_l_split[1]);
        $('#'+sl_cold_l_split[2]+'').css("background",sl_cold_l_split[3]);
        
    }
    if(sl_cold_r != ''){        

        $('#'+sl_cold_r_split[0]+'').css("background",sl_cold_r_split[1]);
        $('#'+sl_cold_r_split[2]+'').css("background",sl_cold_r_split[3]);

        
    }
    if(sl_touch_l != ''){

        $('#'+sl_touch_l_split[0]+'').css("background",sl_touch_l_split[1]);
        $('#'+sl_touch_l_split[2]+'').css("background",sl_touch_l_split[3]);

        
    }
    if(sl_touch_r != ''){

        $('#'+sl_touch_r_split[0]+'').css("background",sl_touch_r_split[1]);
        $('#'+sl_touch_r_split[2]+'').css("background",sl_touch_r_split[3]);

       
    }
    if(sl_pinpriek_l != ''){

        $('#'+sl_pinpriek_l_split[0]+'').css("background",sl_pinpriek_l_split[1]);
        $('#'+sl_pinpriek_l_split[2]+'').css("background",sl_pinpriek_l_split[3]);       
    }
    if(sl_pinpriek_r != ''){

        $('#'+sl_pinpriek_r_split[0]+'').css("background",sl_pinpriek_r_split[1]);
        $('#'+sl_pinpriek_r_split[2]+'').css("background",sl_pinpriek_r_split[3]);        
    } 
    final4 = [];
    final4 = [sl_touch_r_split[0],sl_touch_r_split[1],sl_touch_r_split[2],sl_touch_r_split[3]];
    final3 = [];
    final3 = [sl_touch_l_split[0],sl_touch_l_split[1],sl_touch_l_split[2],sl_touch_l_split[3]];
    final2 = [];
    final2 = [sl_cold_r_split[0],sl_cold_r_split[1],sl_cold_r_split[2],sl_cold_r_split[3]];
    final1 = [];
    final1 = [sl_cold_l_split[0],sl_cold_l_split[1],sl_cold_l_split[2],sl_cold_l_split[3]];
    final5 = [];
    final5 = [sl_pinpriek_l_split[0],sl_pinpriek_l_split[1],sl_pinpriek_l_split[2],sl_pinpriek_l_split[3]];
    final6 = [];
    final6 = [sl_pinpriek_r_split[0],sl_pinpriek_r_split[1],sl_pinpriek_r_split[2],sl_pinpriek_r_split[3]];

</script>
<!-- --------------------------------------model end---------------------------------------------------------- -->

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

		
		$('.sensory_box').show();	
		
		
	}
	// var final1 = [];
	// var final2 = [];
	// var final3 = [];
	// var final4 = [];
	// var final5 = [];
	// var final6 = [];
   

	function refer(key1){
		// alert(key1);

		$('.sensory_box').hide();
	
		var block1 = $('#values').val();
		// var block2 = block+'-'+block1;
		var number = parseInt($('#numbers').val());

        // alert(final1);
	
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

<style>
    .sensory_box{
        margin-bottom: 10%;
        text-align: center;
        box-shadow: 0px 0px 5px lightgrey;
        padding: 20px;
    }
</style>

<!------------------------------------------EDIT-COMBINED-SPINAL-START---------------------------->

<script>
    function show(){
        $("#option_e").show();
    }
    function hide(){
        $("#option_e").hide();
    }
    $("input[name='success_option']").change(function(){
		$('.succes').hide();
	});
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

    // var skin_prepartion = "<?php echo $info['skin_prep']; ?>";
    // $('#skin_prep_e').val(skin_prepartion);

    var aa100 = "<?php echo $info['skin_prep']; ?>";
    // $('#skin_prep').val(aa);

    const myArray = aa100.split(",");
    //toastr.error(myArray[0]);
    if(myArray[0] == 'Other'){
        $('#skin_prep_e').val(myArray[0]);
        $('#skin_prep_other').val(myArray[1]);
        $('#skin_prep_other').show(); 
    }
    else{
        $('#skin_prep_e').val(myArray[0]);
    }

    var csa = "<?php echo $info['csa']; ?>";
    var anatomical_landmark = "<?php echo $info['anatomical_landmark']; ?>";
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
    // alert(spinal_level);
	$('#level_name').val(spinal_level_name);
    $('#epidu').val(spinal_level);
    if(spinal_level != ''){
        $('.'+spinal_level).css("background", "red").css("color", "white");
    }

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
function persentage(type){
    var limit = $('.spinal_persent1').val();
    var limit1 = $('.spinal_persent2').val();
    var limit2 = $('.spinal_persent3').val();
    var limit3 = $('.spinal_persent4').val();
    var limit4 = $('.spinal_persent5').val();
    var limit5 = $('.spinal_persent6').val();

    if(type == 'alert1'){
        if((limit >= -1 && limit <= 4) && limit != ''){			
            $('#persentage_tage').hide();
            $('.spinal_persent1').css('border-color','').css('background','');
        }else{	
			$('.spinal_persent1').val('');		
            $('#persentage_tage').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent1').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert2'){
        if((limit1 >= -1 && limit1 <= 4) && limit1 != ''){			
            $('#persentage_tage1').hide();
            $('.spinal_persent2').css('border-color','').css('background','');

        }else{	
			$('.spinal_persent2').val('');		
            $('#persentage_tage1').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent2').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert3'){
        if((limit2 >= -1 && limit2 <= 4) && limit2 != ''){			
            $('#persentage_tage2').hide();
            $('.spinal_persent3').css('border-color','').css('background','');
        }else{	
			$('.spinal_persent3').val('');		
            $('#persentage_tage2').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent3').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert4'){
        if((limit3 >= -1 && limit3 <= 4) && limit3 != ''){			
            $('#persentage_tage3').hide();
            $('.spinal_persent4').css('border-color','').css('background','');

        }else{
			$('.spinal_persent4').val('');			
            $('#persentage_tage3').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent4').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert5'){
        if((limit4 >= -1 && limit4 <= 4) && limit4 != ''){			
            $('#persentage_tage4').hide();
            $('.spinal_persent5').css('border-color','').css('background','');

        }else{
			$('.spinal_persent5').val('');			
            $('#persentage_tage4').show();
			toastr.error('should be from 0 to 4');
            // $('.spinal_persent5').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert6'){
        if((limit5 >= -1 && limit5 <= 4) && limit5 != ''){			
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
        $('.spinal_needel_brand_other_input').val(spinal_needle_brand[1]);   
        $('.spinal_needel_brand_other').val(spinal_needle_brand[0]);
    }else{
        $('.spinal_needel_brand_other').val(spinal_needle_brand1);            
    }

    var spinal_needle_type1 = "<?php echo $info['needle_type']; ?>";    
    var spinal_needle_type = spinal_needle_type1.split(' - ');

    if(spinal_needle_type[0] == 'Other'){
        $('.spinal_needel_type_other_input').show();
        $('.spinal_needel_type_other_input').val(spinal_needle_type[1]);   
        $('.spinal_needel_type_other').val(spinal_needle_type[0]);
    }else{
        $('.spinal_needel_type_other').val(spinal_needle_type1);
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
    $('.la').val(spinal_other_an[0]);
    $('.spinal_anaesth_other_input').val(spinal_other_an[1]);
    $('.spinal_persent6').val(spinal_other_an[2]);
    $('.spinal_ml6').val(spinal_other_an[3]);
    $('.spinal_mg6').val(spinal_other_an[4]);

   
    if(spinal_other_an[1] != ''){
        $('.spinal_anaesth_other').attr("checked",true);
        $('.spinal_anaesth_other_option').show();
    }

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

    // function epidural_adjuvant(){
	// 	var epidural_adjuvant = $('.epidural_adjuvant').is(':checked');
    //     if(!epidural_adjuvant){
    //         $('.epidural_adjuvant_check').hide();
    //     }else{
    //         $('.epidural_adjuvant_check').show();
    //     }
	// }

    function epidural_adjuvant(){
        var epidural_adjuvant = $('.epidural_adjuvant').is(':checked');
        if(!epidural_adjuvant){

            var Opioid = $('.epidural_opioid').is(':checked');
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
                toastr.error('Please Uncheck Clonidne with Dose..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true;
            }
            else if(epidural_dexme){
                toastr.error('Please Uncheck dexme..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true;
            }
            else if(epidural_dexamethasone){
                toastr.error('Please Uncheck Dexamethasone with Dose..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true;
            }

            else if(epidural_trama){
                toastr.error('Please Uncheck trama..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true;
            }
            else if(epidural_ketamine){
                toastr.error('Please Uncheck ketamine..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true;
            }
            else if(epidural_midazolam){
                toastr.error('Please Uncheck midazolam..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true;
            }
            else if(epidural_adrenaline){
                toastr.error('Please Uncheck adrenaline..')
                $('#epidural_adjuvant1').attr("checked",true);
                document.getElementById("epidural_adjuvant1").checked = true; 
            }

            else if(epidural_other){
                toastr.error('Please Uncheck other..')
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

    function epidural_opioid(){		
		var epidural_opioid = $('.epidural_opioid').is(':checked'); 
		if(!epidural_opioid){
            $('.opioid').hide();
        }else{
            $('.opioid').show();
        }
	}

    $(document).ready(function(){

        var j=1,n=1,k=1;

        $(".add2").click(function(){
			if(j<3){
				j++;
				$(".append_fun").append('<div class="row1 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="epidural_opioid_name[]" ><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_opioid_dose[]" ></div></div></div>');
			}
		});
        $(".add3").click(function(){
            if(k<3){
                k++;
                $(".other1").append('<div class="row2"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="epidural_aj_name[]"><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="epidural_aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
            }
        });
        $(".add6").click(function(){
			if(n<3){
				n++;
				$(".spinal_opioid_supplemen_box").append('<div class="row5 mt-2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus"  style="display:flex;"><input type="text" class="form-control" name="asr_opioid_name_spinal[]" ><button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose_spinal[]" ></div></div></div>');
			}
		});
        $(document).on('click','.remove3',function(){
            k--;
            $(this).closest('.row2').remove();
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
    var othee101 = '<?php echo $info['other_aj_name_dose']; ?>';
    var othee = jQuery.parseJSON(othee101);
   
    if((ccc == 'Yes')||(qqq)||(vcs)||(qrq)||(mm)||(mu)||(qvc) || othee[0]['name'] != ''){
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
		// $('.spinal_multi_model_box').show();
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
    // var gt = "<?php echo $info['complication_none']; ?>";
    // if(gt == 'Yes'){
    //     $('#tc_none').attr('checked',true);			
    // }
    if(aq == 'Yes' || ae == 'Yes' || aw == 'Yes' || au == 'Yes' || ai == 'Yes' || ap_split[0] == 'Yes'){
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
    var xz = "<?php echo $info['ac_none']; ?>";
    if(xz == "Yes"){
        $('#ac_none').attr("checked",true);
    }
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

    if(z2 == 'Yes' || z3 == 'Yes' || z4 == 'Yes' || z5 == 'Yes' || z6 == 'Yes' || z7 == 'Yes' || z9 == 'Yes' || z10 == 'Yes' || z11 == 'Yes' || z12 == 'Yes' || z13 == 'Yes' || z15 == 'Yes' || z17_split[0] == 'Yes' || xz == 'Yes'){
        
        $('.spinal_acute_multi_option').attr('checked',true);
        $('.spinal_acute_multi_option_box').show();
    }

    $('.spinal_acute_other').click(function(){
        var z_101 = $('.spinal_acute_other').is(':checked');

        if(z_101 == true){
            $('.spinal_acute_other_input').show();
        }else{
            $('.spinal_acute_other_input').hide();
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

<script>    
    $('#csa_modal_update').submit(function(e){
        e.preventDefault(); 

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

            var cc ='', aa = '',dd = '', bb = '', zz = '', ii ='' , ee = '';
            var pat_pos = $('#patient_position_e').val();
            var skp = $('#skin_prep_e').val();
            var csa_e = $('#csa_e').val();
            var motor = $('.motor_level').val();


            if(csa_e == ''){
                $('.csa_class').show();
                toastr.error('please select CSA option'); 
            // alert(csa_e);


            }else{
                zz = true;
            }

            if (!document.getElementById('awake_e').checked && !document.getElementById('sedation_e').checked && !document.getElementById('ga_e').checked) { 
                $('.psn').show();
                toastr.error('please choose patient status'); 
            }
            else{
                cc = true;
            }           

            if(pat_pos != '')
                aa = true;
            else{
                $('.pat').show();
                toastr.error('please select patient position');
            }

            var wearing = $('#wearing_mask_e').is(':checked');
            var sterile = $('#sterile_gown_e').is(':checked');
            var hand = $('#hand_washing_e').is(':checked');
            var drap = $('#sterile_draping_e').is(':checked');
            if(!(wearing) && !(sterile) && !(hand) && !(drap)){
                $('.asep').show();
                toastr.error('please select asepsis');
            }
            else{
                dd = true;
            }
            if((skp != ''))
                bb = true;
            else{
                $('.skp').show();
                toastr.error('please select skin preparation');
            }
            if (!document.getElementById('com').checked && !document.getElementById('par').checked && !document.getElementById('fail').checked) { 
                $('.succes').show();
                toastr.error('please choose success status'); 
            }
            else{
                ii = true;
            }
             
            if((motor != ''))
                ee = true;
            else{
                $('.motro').show();
                toastr.error('please select motor level');
            }

            if(cc && aa && dd && bb && zz && ii && ee){
                var formData = new FormData(this);
                formData.append('final1',final1);
                formData.append('final2',final2);			
                formData.append('final3',final3);			
                formData.append('final4',final4);			
                formData.append('final5',final5);			
                formData.append('final6',final6);
                $(".update").text("Updating...");
                $(".update").attr("disabled", true);
                
                $.ajax({
                    type : 'POST',
                    url : '<?php  echo base_url("updateCsa")?>',
                    data : formData,
                    contentType: false,
                    processData: false,
                    success:function(response){
                        response = jQuery.parseJSON(response);
                        if(response.result==1){
                            toastr["success"](response.message);
                            $("#csa_modal_update").modal("hide");
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
           
        }
        
    });
</script>

<!---------------------date-time------------------------->
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
