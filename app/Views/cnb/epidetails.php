<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

 <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>

<section class="epidural-view">
    <div class="row">
        <div class="col-sm-10"><h3><b>Epidural</b></h3></div>
        <div class="col-sm-2">
            <button type="button" class="btn-edit" data-toggle="modal" id="edi_ep"  style="margin:5px;">Edit</button>
            <!-- <button type="button" class="btn-close">Delete</button> -->
        </div>
    </div><!--row-->
    <div class="epidural-cont">
        <div class="epidural-table1">
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
                       <!--  <tr>
                            <td class="bg-pat2"></td>
                            <td></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Skin Prep</td>
                            <td><?php echo $info['skin_prepartion']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
      <!--   <h4 class="pt"><b>Epidural</b></h4> -->
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b>Anatomical Landmark</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['anatomical_landmark']; ?></p>
            </div>
        </div><!--epidural-card2-->
        <h4 class="pt"><b>Epidural Level</b></h4>
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b><?php echo $info['epidural_level_name']; ?></b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['epedural_level']; ?></p>
            </div>
        </div><!--epidural-card2-->
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
       <!--  <h4 class="pt"><b>Needle Brand,Type and Size</b></h4> -->
        <div class="epidural-card2">
            <div class="card-header">
                <ul>
                    <li><b>Epidural Needle Brand</b></li>
                    <li><b>Epidural Needle Type</b></li>
                    <li><b>Epidural Needle Size</b></li>
                </ul>
            </div>
            <div class="card-body">
                <ul><?php if($n_brand){ ?>
                        <li><span>other - <?php echo $info['other4']; ?></span></li>
                    <?php }else{ ?>
                        <li><span><?php echo $info['needle_brand']; ?></span></li>
                    <?php }; ?>
                    <?php if($n_type){ ?>
                        <li><span>other - <?php echo $info['other6']; ?></span></li>
                    <?php }else{ ?>
                        <li><span><?php echo $info['needle_type']; ?></span></li>
                    <?php }; ?>
                    <li><span><?php echo $info['needle_size']; ?></span></li>
                </ul>
            </div>
        </div><!--epidural-card2-->
       <!--  <h4 class="pt"><b>Epidural Technique</b></h4> -->
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b>Epidural Technique</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['lor_saline']; ?> - <?php echo $info['lor_air']; ?> - <?php echo $info['hanging_drop']; ?> -<?php if($info['others'] != ''){ ?> Other - <?php echo $info['others']; ?> <?php }?></p>
            </div>
        </div><!--epidural-card2-->
       <!--  <h4 class="pt"><b>Approach</b></h4> -->
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b>Approach</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['approach']; ?></p>
            </div>
        </div><!--epidural-card2-->
       <!--  <h4 class="pt"><b>Number of Attempts</b></h4> -->
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b>Number of Attempts</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['no_attempts']; ?></p>
            </div>
        </div><!--epidural-card2-->
      <!--   <h4 class="pt"><b>Epidural Depth(cm)</b></h4> -->
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b>Epidural Depth(cm)</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['epidral_depth']; ?></p>
            </div>
        </div><!--epidural-card2-->
       <!--  <h4 class="pt"><b> Technique</b></h4> -->
        <div class="epidural-card2">
            <?php if($cath){ ?>
                <div class="card-header">
                    <ul>
                        <li><b>Technique</b></li>
                        <li><b>Skin(cm)</b></li>
                    </ul>
                </div>
                <div class="card-body">
                    <ul>
                        <li><span><?php echo $info['technique']; ?></span></li>
                        <li><span><?php echo $info['cath_mark']; ?></span></li>
                    </ul>
                </div>
            <?php }else{ ?>
                <div class="card-header">
                    <ul>
                        <li><b>Technique</b></li>
                    </ul>
                </div>
                <div class="card-body">
                    <ul>
                        <li><span><?php echo $info['technique']; ?></span></li>
                    </ul>
                </div>
            <?php }; ?>
        </div><!--epidural-card2-->
       <!--  <h4 class="pt"><b>Test Dose</b></h4> -->
        <div class="combined-spinal-card2">
            <div class="card-header">
                <h5><b>Test Dose</b></h5>
            </div>
            <div class="card-body">
              <p>Yes</p>   
            </div>
        </div>
        <div class="epidural-card2">
            <div class="card-header">
                <h5><b>Intra Operative LA Regimen</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['la_regimen']; ?></p>
            </div>
        </div><!--epidural-card2-->
        <h4 class="pt"><b>Total Intra Operative LA & Adjuvant Consumption</b></h4>
        <h5 class="pt"><b>Local Anaesthetic</b></h5>
        <div class="epidural-table2">
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
                                $z = $info['la_ropivacaine'];
                                $cc = explode(",",$z);
                            ?>
                            <td>Ropivacaine - <?php echo $cc[0]; ?></td>
                            <td><?php echo $cc[1]; ?></td>
                            <td><?php echo $cc[2]; ?></td>
                            <td><?php echo $cc[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $y = $info['la_bupivacaine'];
                                $bb = explode(",",$y);
                            ?>
                            <td>Bupivacaine - <?php echo $bb[0]; ?></td>
                            <td><?php echo $bb[1]; ?></td>
                            <td><?php echo $bb[2]; ?></td>
                            <td><?php echo $bb[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $x = $info['la_levobupivacaine'];
                                $aa = explode(",",$x);
                            ?>
                            <td>Levobupivacaine - <?php echo $aa[0]; ?></td>
                            <td><?php echo $aa[1]; ?></td>
                            <td><?php echo $aa[2]; ?></td>
                            <td><?php echo $aa[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $w = $info['la_lignocaine'];
                                $dd = explode(",",$w);
                            ?>
                            <td>Lignocaine - <?php echo $dd[0]; ?></td>
                            <td><?php echo $dd[1]; ?></td>
                            <td><?php echo $dd[2]; ?></td>
                            <td><?php echo $dd[3]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table-->
        <h4 class="pt"><b>Adjuvant</b></h4>
        <div class="epidural-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                       
                        
                        <?php
                            $op_nam = $info['opioid_name'];
                            $op_dos = $info['opioid_dose'];
                            if($op_nam){
                                $op_name = explode(",",$op_nam);
                                $op_dose = explode(",",$op_dos);
                        ?>
                         <tr>
                            <td class="bg-pat2"  style="border:0;">Opioid</td>
                            <td style="border:0;">Yes</td>
                        </tr>

                        <?php
                                foreach($op_name as $key=>$val){  
                        ?>
                                    <tr>
                                        <td class="bg-pat2" style="border:0;">Opioid Name</td>
                                        <td style="border:0;"><?php echo $val; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-pat2" style="border:0;">Opioid Dose(microgram equivalent)</td>
                                        <td style="border:0;"><?php echo $op_dose[$key]; ?></td>
                                    </tr>
                        <?php
                                }
                            }else{
                        ?>
                                <tr>
                                    <td class="bg-pat2">Opioid</td>
                                    <td>No</td>
                                </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td class="bg-pat2">Clonidne with Dose(mcgm)</td>
                            <td><?php echo $info['clonidina_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Dexmeditomidine with Dose(mcgm)</td>
                            <td><?php echo $info['dexmeditomidine_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Dexamethasone with Dose(mcgm)</td>
                            <td><?php echo $info['dexamephasone_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Tramadol with Dose(mg)</td>
                            <td><?php echo $info['tramadol_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ketamine with Dose(mg)</td>
                            <td><?php echo $info['kepamine_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Midazolam with Dose(mg)</td>
                            <td><?php echo $info['midazolam_dose']; ?></td>
                        </tr>
                        
                        
                        <?php
                            $aj_nam = $info['aj_name'];
                            $aj_dos = $info['aj_dose'];
                            $other7 = $info['other7'];
                        ?>
                            
                        <?php
                            if($other7 == 'Yes'){
                                $aj_name = explode(",",$aj_nam);
                                $aj_dose = explode(",",$aj_dos);

                        ?>

                            <tr> 
                                <td class="bg-pat2">Other</td>
                                <td><?php echo $info['other7']; ?></td>
                            </tr>

                        <?php
                                foreach($aj_name as $key=>$val){  
                        ?>
                                    <tr>
                                        <td class="bg-pat2" style="border:0;">Adjuvant Name</td>
                                        <td style="border:0;"><?php echo $val; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-pat2" style="border:0;">Adjuvant Dose(mg)</td>
                                        <td style="border:0;"><?php echo $aj_dose[$key]; ?></td>
                                    </tr>
                        <?php
                                }
                            }else{
                        ?>
                                <tr>
                                    <td class="bg-pat2">Other</td>
                                    <td><?php echo $info['other7']; ?></td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
        <h4 class="pt"><b>Analgesia supplementation required</b></h4>
        <div class="epidural-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Inhalation Analgesia</td>
                            <td><?php echo $info['in_analgesia']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">IV analgesia</td>
                            <td><?php echo $info['asr_iv_analgesia']; ?></td>
                        </tr>
                        
                        
                        
                        <?php
                            $asr_opioid_nam = $info['asr_opioid_name'];
                            $asr_opioid_dos = $info['asr_opioid_dose'];
                            $opioids = $info['opioids'];
                            if($opioids == 'Yes'){
                        ?>
                                <tr>
                                    <td class="bg-pat2">Opioids</td>
                                    <td><?php echo $info['opioids']; ?></td>
                                </tr>

                        <?php
                                $asr_opioid_name = explode(",",$asr_opioid_nam);
                                $asr_opioid_dose = explode(",",$asr_opioid_dos);
                                foreach($asr_opioid_name as $key=>$val){  
                        ?>
                                    <tr>
                                        <td class="bg-pat2" style="border:0;">Opioid Name</td>
                                        <td style="border:0;"><?php echo $val; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-pat2" style="border:0;">Opioid Dose(microgram equivalent)</td>
                                        <td style="border:0;"><?php echo $asr_opioid_dose[$key]; ?></td>
                                    </tr>
                        <?php
                                }
                            }else{
                        ?>
                                <tr>
                                    <td class="bg-pat2">Opioids</td>
                                    <td><?php echo $info['opioids']; ?></td>
                                </tr>
                        <?php
                            }
                        ?>
                        <tr>
                            <td class="bg-pat2">Paracetamol / Anti-Inflammatories</td>
                            <td><?php echo $info['asr_multimode']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ketamine</td>
                            <td><?php echo $info['asr_ketamine']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Dexmedetomidine</td>
                            <td><?php// echo $info['asr_dexmedetomidine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Clonidine</td>
                            <td><?php// echo $info['asr_clonidine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Tramadol</td>
                            <td><?php// echo $info['asr_tramadol']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Magnesium</td>
                            <td><?php// echo $info['asr_magnesium']; ?></td>
                        </tr> -->
                        
                        <?php
                            $asr_other_iv_name = $info['asr_other_iv_name'];
                        ?>
                        
                        <?php
                            if($asr_other_iv_name){
                        ?>

                                <tr>
                                    <td class="bg-pat2" style="border:0;">Other IV adjuncts</td>
                                    <td style="border:0;">Yes</td>
                                </tr>
                                <tr>
                                    <td class="bg-pat2" style="border:0;">Adjuvant Name</td>
                                    <td style="border:0;"><?php echo $info['asr_other_iv_name']; ?></td>
                                </tr>
                                <tr>
                                    <td class="bg-pat2" style="border:0;">Adjuvant Dose(mg)</td>
                                    <td style="border:0;"><?php echo $info['asr_other_iv_dose']; ?></td>
                                </tr>
                        <?php
                            }
                            else{
                        ?>
                                <tr>
                                    <td class="bg-pat2">Other IV adjuncts</td>
                                    <td>No</td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
        <h4 class="pt"><b>Technical Complications</b></h4>
        <div class="epidural-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <!-- <tr>
                            <td class="bg-pat2">None</td>
                            <td><?php echo $info['complication_none']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Equipment Related</td>
                            <td><?php echo $info['tc_equipment']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Multiple attempts</td>
                            <td><?php echo $info['tc_multiple']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">2nd Anaesthetist</td>
                            <td><?php echo $info['tc_2_anaestsetist']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Technique abandoned/failure to find space</td>
                            <td><?php echo $info['tc_abondoned']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Catheter related</td>
                            <td><?php echo $info['tc_catheter']; ?></td>
                        </tr> 
                        <tr><?php if($t_other){ ?>
                                <td class="bg-pat2">Other</td>
                            <?php }else{ ?>
                                <td class="bg-pat2">Other - <?php echo $info['other5']; ?></td>
                            <?php }; ?>
                            <td><?php echo $info['tc_other']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
        <h4 class="pt"><b>Acute Complications</b></h4>
        <div class="epidural-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <!-- <tr>
                            <td class="bg-pat2">None</td>
                            <td><?php echo $info['ac_none']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Local Anaesthetic systemic toxicity(LAST)</td>
                            <td><?php echo $info['ac_last']; ?></td>
                       </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Respiratory Arrest</td>
                            <td><?php //echo $info['ac_re_arrest']; ?></td>
                        </tr> -->
                        <!-- <tr>
                            <td class="bg-pat2">Cardiac Arrest</td>
                            <td><?php// echo $info['ac_ca_arrest']; ?></td> ---->
                        <!-- </tr>  -->
                        <tr>
                            <td class="bg-pat2">Radicular Pain (needle/catheter)</td>
                            <td><?php echo $info['ac_radi_pain']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Paresthesia (needle/catheter)</td>
                            <td><?php echo $info['ac_parestsesia']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Bloody Tap ( needle/catheter)</td>
                            <td><?php echo $info['ac_bloody_tap']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Intrathecal migration of epidural catheter</td>
                            <td><?php echo $info['ac_intra_cath']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Wet Tap/Dural puncture (Needle/Catheter)</td>
                            <td><?php echo $info['ac_wet_tap']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2">Hypotension</td>
                            <td><?php echo $info['ac_hypoten']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Nausea</td>
                            <td><?php echo $info['ac_nausea']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Vomiting</td>
                            <td><?php echo $info['ac_vomit']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">High Block</td>
                            <td><?php echo $info['ac_high_block']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Subdural Block</td>
                            <td><?php echo $info['ac_sb_block']; ?></td>
                        
                        </tr>
                        <tr>
                            <td class="bg-pat2">Total Spinal</td>
                            <td><?php echo $info['ac_totla_spinal']; ?></td>
                        </tr>
                         <tr>
                            <td class="bg-pat2">Respiratory Arrest</td>
                            <td><?php echo $info['ac_re_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Cardiac Arrest</td>
                            <td><?php echo $info['ac_ca_arrest']; ?></td>
                        </tr>
                        <tr><?php if($a_other){ ?>
                                <td class="bg-pat2">Other</td>
                            <?php }else{ ?>
                                <td class="bg-pat2">Other - <?php echo $info['other2']; ?></td>
                            <?php }; ?>
                            <td><?php echo $info['ac_other']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
        <h4 class="pt"><b>Success</b></h4>
        <div class="epidural-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>                      
                            <?php if(($s_stat[0]) == 'Partial Success'){ ?>
                                <tr>
                                    <td class="bg-pat2">Partial Success</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td class="bg-pat2" style="border:0;">Onset</td>
                                    <td style="border:0;" ><?php echo $info['onset']; ?></td>
                                </tr>
                            <?php }elseif(($s_stat[0]) == 'Complete Success'){ ?>
                                <tr>
                                    <td class="bg-pat2">Complete Success</td>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <td class="bg-pat2" style="border:0;">Onset</td>
                                    <td style="border:0;" ><?php echo $info['onset']; ?></td>
                                </tr>
                            <?php }else{ ?>
                                <tr>
                                    <td class="bg-pat2">Failure</td>
                                    <td>Yes</td>
                                </tr>
                            <?php }; ?>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2" style="border:0;">Onset</td>
                            <td style="border:0;"><?php// echo $info['onset']; ?></td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
        <h4 class="pt"><b>Sensory Level</b></h4>
        <!-- <div class="epidural-table1">
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
                    <div class="epidural-sensor-table">
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
                    </div><!--epidural-sensor-table-->
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo base_url('public/assets/images/Dermo.png'); ?>" class="img-fluid d-block mx-auto">
                </div>
            </div><!--row-->
        </div><!--body-img-->
        <h4 class="pt"><b>Motor Level (Bromage Score)</b></h4>
        <div class="epidural-table1">
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
        </div><!--epidural-table1-->
        <div class="bromo-img">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6"><img src="<?php echo base_url('public/assets/images/Bromo.png'); ?>" class="img-fluid d-block mx-auto"></div>
                <div class="col-sm-3"></div>
            </div><!--row-->
        </div><!--bromo-img-->
         <div class="epidural-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Onset of Surgical Anaesthesia(mins)</td>
                            <td><?php echo $info['surgical_anaesthesia']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Duration of Surgery (mins)</td>
                            <td><?php echo $info['surgery_duration']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Blood Loss (ml)</td>
                            <td><?php echo $info['blood_loss']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Vasopressor Use</td>
                            <td><?php echo $info['vasopressor_use']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--epidural-table1-->
    </div><!--epidural-cont-->
</section><!--epidural-view-->
<section class="edit-epidural-page">
    <!-- The Modal -->
    <div class="modal fade" id="edit-epidural">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header" id="add-header">
                    <h4 class="modal-title">EDIT EPIDURAL</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit-epi">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" required>
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
                                    <select class="form-control cnb_done_by1" id="cnb_by1" name="cnb_done_by1" onchange="selectcnb()" required>
                                        <option value="" selected="selected">Select</option>
                                        <option value="Consultant">Consultant</option>
                                        <option value="Trainee">Trainee</option>
                                    </select>
                                    <div class="" id = "consultant" style="color:red; display:none;">
                                        <select class="form-control cnb_done_by2" id="cnb_by2" style="margin: 15px 0;"  name="cnb_done_by2" required>       
                                        </select> 
                                    </div> 
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
                                    <input type="radio" class="form-check-input" id="option-1" value="Awake" name="optradio" onclick="hide()">Awake
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" id="option-2" value="Sedation" name="optradio" onclick="show()">Sedation
                                    </label>
                                </div>
                                <div class="pts pt-2">
                                    <select class="form-control" id="sedi" name="sedation_if" style="width: 350px;">
                                        <option value=''>Select</option>
                                        <option>1-Mild easy to rouse</option>
                                        <option>2-Moderate,easy to rouse,unable to remain awake</option>
                                        <option>3-Difficult to rouse</option>
                                    </select>
                                </div>
                                <?php if($ga  == 'Sole/Primary Anaesthetic') {?>
                                <div class="form-check" style="display:none;">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="GA" id="option-3" name="optradio" onclick="hide()" >GA
                                    </label>
                                </div>
                                <?php } else{ ?>
                                    <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="GA" id="option-3" name="optradio" onclick="hide()" >GA
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
                                    <option value="">Select</option>
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
													<input type="checkbox" class="switch_1" id="wearing_mask" value="Yes" name="wearing_mask" onclick="checkasep()">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>Hand washing</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="hand_washing">
													<input type="checkbox" class="switch_1" id="hand_washing" value="Yes" name="hand_washing" onclick="checkasep()">
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
													<input type="checkbox" class="switch_1" id="sterile_gown" value="Yes" name="sterile_gown" onclick="checkasep()">
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="togle">
                                                <label>Sterile draping</label>
                                                <div class= "box_1">
                                                    <input type="hidden" class="switch_1" value="No" name="sterile_draping">
													<input type="checkbox" class="switch_1" id="sterile_draping" value="Yes" name="sterile_draping" onclick="checkasep()">
                                                </div>
                                            </div>
                                        </li>
                                    </ul><!-------------------->	
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row mb-2 pt-2">
                            <div class="col-sm-2"><label>Skin Prep<span class="mandat">*</span></label></div>
                            <div class="col-sm-4">
                                <select class="form-control" id="skin_prep" name="skin_prep" onchange="checkskin()">
                                    <option value="">Select</option>
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
                        <div class="row pt-2">
                            <div class="col-sm-3"><label>Epidural Level</label></div>
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
                                <button type="button" class="btn q C1-2" id="c1-2" value="C1-2">C1-2</button>
                                <button type="button" class="btn q C2-3" id="c2-3" value="C2-3">C2-3</button>
                                <button type="button" class="btn q C3-4" id="c2-4" value="C3-4">C3-4</button>
                                <button type="button" class="btn q C4-5" id="c2-5" value="C4-5">C4-5</button>
                                <button type="button" class="btn q C5-6" id="c2-6" value="C5-6">C5-6</button>
                                <button type="button" class="btn q C6-7" id="c2-7" value="C6-7">C6-7</button>
                                <button type="button" class="btn q C7-T1" id="c2-8" value="C7-T1">C7-T1</button>
                                <button type="button" class="btn q T1-2" id="c2-9" value="T1-2">T1-2</button>
                                <button type="button" class="btn q T2-3" id="c2-10" value="T2-3">T2-3</button>
                                <button type="button" class="btn q T3-4" id="c2-11" value="T3-4">T3-4</button>
                                <button type="button" class="btn q T4-5" id="c2-12" value="T4-5">T4-5</button>
                                <button type="button" class="btn q T5-6" id="c2-13" value="T5-6">T5-6</button>
                                <button type="button" class="btn q T6-7" id="c2-14" value="T6-7">T6-7</button>
                                <button type="button" class="btn q T7-8" id="c2-15" value="T7-8">T7-8</button>
                                <button type="button" class="btn q T8-9" id="c2-16" value="T8-9">T8-9</button>
                                <button type="button" class="btn q T9-10" id="c2-17" value="T9-10">T9-10</button>
                                <button type="button" class="btn q T10-11" id="c2-18" value="T10-11">T10-11</button>
                                <button type="button" class="btn q T11-12" id="c2-19" value="T11-12">T11-12</button>
                                <button type="button" class="btn q T12-L1" id="c2-20" value="T12-L1">T12-L1</button>
                                <button type="button" class="btn q L1-2" id="c2-21" value="L1-2">L1-2</button>
                                <button type="button" class="btn q L2-3" id="c2-22" value="L2-3">L2-3</button>
                                <button type="button" class="btn q L3-4" id="c2-23" value="L3-4">L3-4</button>
                                <button type="button" class="btn q L4-5" id="c2-24" value="L4-5">L4-5</button>
                                <button type="button" class="btn q L5-S1" id="c2-25" value="L5-S1">L5-S1</button>
                                <button type="button" class="btn q Caudal" id="c2-26" value="Caudal">Caudal</button>
                            </div>
                        </div><!--row-->
                        <label><b>Ultrasound</label>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="ultra_sound">
									<input type="checkbox" class="switch_1" id="ultra_sound" value="Yes" name="ultra_sound" onclick="ultra()">
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <div class="ultrasound">
                            <div class="row pt">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"><label>Probe Cover</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="probe_cover" name="probe_cover">
                                        <option value=''>Select probe cover</option>
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </div>
                                <div class="col-sm-4"></div>
                            </div><!--row-->
                            <div class="row pt">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-2"><label>Image Quality</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="image_quality" name="image_quality">
                                        <option value=''>Select image quality</option>
                                        <option>Good</option>
                                        <option>Average</option>
                                        <option>Poor</option>
                                    </select>
                                </div>
                                <div class="col-sm-4"></div>
                            </div><!--row-->
                        </div>
                        <label class="pt-3 mb-3"><b>Needle Brand,Type and Size</label>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <label>Select Epidural Needle Brand</label>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="need" name="needle_brand" onclick="needle()">
                                            <option value=''>Select</option>
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
                                            <input type="text" class="form-control" name="Other1" id="Other1" style="margin-top: 12px;">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"></div>
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <label>Select Epidural Needle Type</label>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="ty" name="needle_type" onclick="type1()">
                                            <option value=''>Select</option>
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
                                            <input type="text" class="form-control" name="other6" id="other6" style="margin-top: 12px;">
                                        </div>
                                    </div>
                                    <div class="col-sm-6"></div>
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <label>Select Epidural Needle Size</label>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="size" name="needle_size">
                                            <option value=''>Select</option>
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
                        <label><b>Epidural Technique</label>
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
                                <div class="form-check" style="margin-bottom: 5px;">
                                    <label class="form-check-label" style="margin-right:163px;">
                                        <input type="checkbox" class="form-check-input" id="oth" onclick="other()">Other
                                    </label>
                                    <span class="plus1" id="proced-plus"><button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button></span>
                                </div>
                                <div class="other">
                                <?php 
                                    $z = $info['others'];
                                    $w = explode("-",$z);
                                    foreach($w as $val){
                                ?>      <div class="row1">
                                            <div id="proced-plus" style="display:flex; margin-bottom: 10px;">
                                                <input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="others[]" value="<?php echo $val; ?>" style="width:220px;">
                                                <button type="button" class="btn remove11"><i class="fa fa-times" aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                <?php
                                    } 
                                ?>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div><!--row-->
                        <div class="row pt mb-2">
                            <div class="col-sm-2"><label>Approach</label></div>
                            <div class="col-sm-4">
                                <select class="form-control" id="approach" name="approach">
                                    <option value=''>Select</option>
                                    <option>Midline</option>
                                    <option>Paramedian</option>
                                </select>
                            </div>
                        </div><!--row-->
                        <div class="row pt">
                            <div class="col-sm-2"><label>Number Of Attempts</label></div>
                            <div class="col-sm-4">
                                <!-- <input type="number" class="form-control" name="no_attempts" id="no_attempts" value="<?php echo $info['no_attempts']; ?>" onchange="attempts()"> -->
                                <select class="form-control" name="no_attempts" id="no_attempts" onchange="attempts()">
                                    <option value="">Select</option>
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
                                <input type="number" class="form-control" value="<?php echo $info['epidral_depth']; ?>" name="epidral_depth">
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
                                        <input type="number" class="form-control cath_mark" name="cath_mark"  style="width:30%;">
                                    </div>
                                </div>
                            </div>
                        </div><!--row-->
                        <div class="row p-3">
                            <div class="col-sm-2"><label>Test Dose</label></div>
                            <div class="col-sm-4">
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="test_dose">
									<input type="checkbox" class="switch_1" id="test_dose" value="Yes" name="test_dose">
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-2"><label>Intra Operative LA Regimen</label></div>
                            <div class="col-sm-4">
                                <select class="form-control" id="la_regimen" name="la_regimen">
                                    <option value="">Select</option>
                                    <option>Continous Infusion</option>
                                    <option>Intermittent Bolus</option>
                                </select>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                       <!--  <label class="pt"><b>Total Intra Operative LA & Adjuvant Consumption<a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="This includes Test Dose,Initial Dose and Total Intra Operative Use"><i class="fa fa-info-circle" aria-hidden="true"></i></a></b></label> -->
                       <h5 class=""><b>Total Intra Operative LA & Adjuvant Consumption</b>
                        <div class="tooltip-4">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <div class="right-4">
                                <div class="text-content-4">
                                    <h6>This includes Test Dose , Initial Dose and Total Intra Operative Use</h6>
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
                                        <select class="form-control" id="ropivacaine" name="ropivacaine">
                                            <option value="">Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="ropi_per" id="ropi_per" onkeyup="persentage('alert1')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="ropi_ml" id="ropi_ml" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="ropi_mg" id="ropi_mg" readonly><span style="padding-top:5px;">mg</span>
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
                                        <select class="form-control" id="bupivacaine" name="bupivacaine">
                                            <option value="">Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="bupi_per" id="bupi_per" onkeyup="persentage('alert2')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="bupi_ml" id="bupi_ml" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="bupi_mg" id="bupi_mg" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean2()" class="fa fa-times" id="clear2" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                        <select class="form-control" id="levobupivacaine" name="levobupivacaine">
                                            <option value="">Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="levo_per" id="levo_per" onkeyup="persentage('alert3')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="levo_ml" id="levo_ml" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control"name="levo_mg" id="levo_mg" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean3()" class="fa fa-times" id="clear3" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                        <select class="form-control" id="Lignocaine" name="Lignocaine">
                                            <option value="">Select</option>
                                            <option>Without Adrenaline</option>
                                            <option>With Adrenaline</option>
                                        </select>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="ligno_per" id="ligno_per" onkeyup="persentage('alert4')" readonly><span style="padding-top:5px;">%</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="number" class="form-control" name="ligno_ml" id="ligno_ml" readonly><span style="padding-top:5px;">ml</span>
                                    </div>
                                    <div class="pacu-1" id="id">
                                        <input type="text" class="form-control" name="ligno_mg" id="ligno_mg" readonly><span style="padding-top:5px;">mg</span>
                                    </div>
                                    <i onclick="clean4()" class="fa fa-times" id="clear4" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
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
                                <label><b>Adjuvant
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
                                <div class= "box_1 p-2">
                                    <input type="checkbox" class="switch_1" id="adju" onclick="adjuvant()">
                                </div>
                                <div class="adjuvant" style="border:1px solid lightgrey;border-radius: 8px;padding: 12px;">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="opio" onclick="opioid()">Opioid
                                        </label>
                                    </div>

                                    <div class="pt" id="proced-plus" style="">
                                        <span class="plus2" id="proced-plus"><button type="button" class="btn add2"><i class="fa fa-plus" aria-hidden="true"></i></button></span>

                                        <div class="opioid">
                                        <?php 
                                            $zz = $info['opioid_name'];
                                            $ww = $info['opioid_dose'];
                                            $k = explode(",",$zz);
                                            $t = explode(",",$ww);
                                            foreach($k as $key=>$val){
                                        ?>      <div class="row11">
                                                    <div class="row" style="margin-left:3%;">
                                                        <div class="col-sm-5"><span>Opioid Name</span></div>
                                                        <div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="opioid_name[]" value="<?php echo $val; ?>"><button type="button" class="btn remove22"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                    </div><!--row-->
                                                    <div class="row pt" style="margin-left:3%;">
                                                        <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                                        <div class="col-sm-7"><input type="text" class="form-control" name="opioid_dose[]" value="<?php echo $t[$key]; ?>"></div>
                                                    </div><!--row-->
                                                </div>
                                            <?php
                                                } 
                                            ?>
                                        </div>
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="clon" onclick="Clonidne()">Clonidne with Dose(mcgm)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="number" class="form-control" name="clonidne" id="clon1" value="<?php echo $info['clonidina_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="dex" onclick="Dexmeditomidine()">Dexmeditomidine with Dose(mcgm)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="number" class="form-control" name="dexmeditomidine" id="dex1" value="<?php echo $info['dexmeditomidine_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="dexa" onclick="Dexamethasone()">Dexamethasone with Dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="number" class="form-control" name="dexamethasone" id="dexa1" value="<?php echo $info['dexamephasone_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="tram" onclick="Tramadol()">Tramadol with Dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="number" class="form-control" name="tramadol" id="tram1" value="<?php echo $info['tramadol_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="keta" onclick="ketamine()">Ketamine with dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="number" class="form-control" name="ketamin" id="keta1" value="<?php echo $info['kepamine_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="mida" onclick="Midazolam()">Midazolam with dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="text" class="form-control" name="midazolam" id="mida1" value="<?php echo $info['midazolam_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="hidden" class="form-check-input" value="No" name="Other7">
                                                        <input type="checkbox" class="form-check-input" value="Yes" name="Other7" id="oth1" onclick="other1()">Other
                                                    </label>
                                                    <span class="plus3" id="proced-plus"><button type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button></span>
                                                </div>
                                                <div class="other1">
                                                <?php 
                                                    $zk = $info['aj_name'];
                                                    $wk = $info['aj_dose'];
                                                    $ks = explode(",",$zk);
                                                    $ts = explode(",",$wk);
                                                    foreach($ks as $key=>$val){
                                                ?>      <div class="row21">
                                                            <div class="row pt">
                                                                <div class="col-sm-4"><span>Adjuvant Name</span></div>
                                                                <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="aj_name[]" value="<?php echo $val; ?>"><button type="button" class="btn remove33"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                                <div class="col-sm-1"></div>
                                                            </div>
                                                            <div class="row pt">
                                                                <div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div>
                                                                <div class="col-sm-7"><input type="number" class="form-control" name="aj_dose[]" value="<?php echo $ts[$key]; ?>"></div>
                                                                <div class="col-sm-1"></div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        } 
                                                    ?>
                                                </div><!--other1 ends-->
                                            </div>
                                        </div><!--row-->
                                    </div>
                                </div><!--Adjuvant ends-->
                            </div>
                        </div><!--row-->
                        <label class="pt"><b>Analgesia supplementation required</b> &nbsp;&nbsp;&nbsp; (<span id="analgesis"> NO </span>)
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
                                <div class= "box_1 p-2">
                                    <input type="hidden" class="form-check-input" value="No" name="analgesia_none">
                                    <input type="checkbox" class="switch_1" id="ana" onclick="analgesia()"  value="Yes" name="analgesia_none">
                                </div>
                                <div class="analgesia">
                                    <div class="analg-box">
                                        <div class="form-check">
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
                                                <span class="plus4" id="proced-plus"><button type="button" class="btn add4"><i class="fa fa-plus" aria-hidden="true"></i></button></span>
                                            </div>
                                            <div class="opioids">
                                            <?php 
                                                $zs = $info['asr_opioid_name'];
                                                $ws = $info['asr_opioid_dose'];
                                                $kk = explode(",",$zs);
                                                $ss = explode(",",$ws);
                                                foreach($kk as $key=>$val){
                                            ?>      <div class="row22">
                                                        <div class="row" style="margin-left: 3%;">
                                                            <div class="col-sm-5">
                                                                <span>Opioid Name</span>
                                                            </div>
                                                            <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name[]" value="<?php echo $val; ?>"><button type="button" class="btn remove44"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                        </div><!--row-->
                                                        <div class="row pt" style="margin-left: 3%;">
                                                            <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                                            <div class="col-sm-7"><input type="number" class="form-control op_remove" name="asr_opioid_dose[]" value="<?php echo $ss[$key]; ?>"></div>
                                                        </div><!--row-->
                                                    </div>
                                            <?php
                                                } 
                                            ?>
                                            </div><!--opioids ends-->
                                            <div class="form-check" style="margin-left: 3%;">
                                                <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="asr_multimode">
                                                    <input type="checkbox" class="form-check-input" value="Yes" name="asr_multimode" id="asr_multimode">Paracetamol / Anti-Inflammatories
                                                </label>
                                            </div>
                                            <div class="form-check" style="margin-left: 1.5%;">
                                                <label class="form-check-label">
                                                    <<input type="hidden" class="form-check-input" value="No" name="Ketamine1">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="ket" name="Ketamine1">Ketamine
                                                </label>
                                            </div>
                                            <!-- <div class="form-check" style="margin-left: 5%;">
                                                <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="Dexmedeto">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="dexs" name="Dexmedeto">Dexmedetomidine
                                                </label>
                                            </div>
                                            <div class="form-check" style="margin-left: 5%;">
                                                <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="Cloni">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="clos" name="Cloni">Clonidine
                                                </label>
                                            </div>
                                            <div class="form-check" style="margin-left: 5%;">
                                                <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="Trama">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tras" name="Trama">Tramadol
                                                </label>
                                            </div>
                                            <div class="form-check" style="margin-left: 5%;">
                                                <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="Magnes">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="mags" name="Magnes">Magnesium
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
                                                        <input type="text" class="form-control" name="asr_other_iv_name" id="asr_other_iv_name" value="<?php echo $info['asr_other_iv_name']; ?>">
                                                    </div>
                                                    <div class="col-sm-4"></div>
                                                </div>
                                                <div class="row pt">
                                                    <div class="col-sm-1"></div>
                                                    <div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
                                                    <div class="col-sm-4">
                                                        <input type="number" class="form-control" name="asr_other_iv_dose" id="asr_other_iv_dose" value="<?php echo $info['asr_other_iv_dose']; ?>">
                                                    </div>
                                                    <div class="col-sm-4"></div>
                                                </div>
                                            </div><!--adjuncts ends-->
                                        </div><!--gesia ends-->
                                    </div><!--analg-box ends-->
                                </div><!--analgesia ends-->
                            </div><!--col-10-->
                        </div><!--row-->
                        <label class="pt"><b>Technical complications</b> &nbsp;&nbsp;&nbsp; (<span id="teche"> NO </span>)
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
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_none" name="tc_none">None
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
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_other" name="tc_other" id="tc_other" onclick="other2()">Other
                                                    </label>
                                                </div>
                                            </li>
                                             <li>
                                                <input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" id="othe1" value="<?php echo $info['other5']; ?>" name="other4" readonly>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--technical ends--> 
                            </div>
                        </div><!--row-->
                        <label class="pt"><b>Acute complications</b> &nbsp;&nbsp;&nbsp; (<span id="acutes"> NO </span>)
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_none" name="ac_none">None
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_parestsesia" name="ac_parestsesia">Paresthesia Pain (needle/catheter)
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
                                    <!-- <div class="form-check">
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_other" name="ac_other" id="ac_other" onclick="other3()">Other
                                        </label>
                                        <input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="other5" id="ot1" value="<?php echo $info['other2']; ?>" style="width: 30%;" readonly>
                                    </div>
                                    
                                </div><!--acute ends-->
                            </div>
                        </div><!--row-->
                        <label class="pt"><b>Success<span class="mandat">*</span></b><!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                                    <li><input type="text" class="form-control" name="comp1" id="com1" readonly></li>
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
                                    <li><input type="text" class="form-control" name="part" id="par1" readonly></li>
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
                        <label class="pt"><b>Sensory Level</b><span class="mandat">*</span><!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Content not provided"><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label>
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
                        <label><b>Motor Level (Bromage Score)<span class="mandat">*</span></b></label>
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-7">
                                <select class="form-control" name="motor_level" id="motor_level" onchange="checkmotor()">
                                    <option value="">Select</option>
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
                                <li><input type="text" class="form-control" name="surgical_anaesthesia" value="<?php echo $info['surgical_anaesthesia']; ?>"></li>
                                <li><label>mins</label></li>
                            </ul>
                        </div><!--row-->
                        <div class="duration">
                            <ul>
                                <li><label>Duration of Surgery</label></li>
                                <li><input type="text" class="form-control" name="surgery_duration" value="<?php echo $info['surgery_duration']; ?>"></li>
                                <li><label>mins</label></li>
                            </ul>
                        </div><!--row-->
                        <div class="duration">
                            <ul>
                                <li><label>Blood Loss</label></li>
                                <li><input type="text" class="form-control" name="blood_loss" value="<?php echo $info['blood_loss']; ?>"></li>
                                <li><label>ml</label></li>
                            </ul>
                        </div><!--row-->
                        <div class="duration">
                            <ul>
                                <li><label>Vasopressor Use</label></li>
                                <li>
                                    <div class="box_1">
                                        <input type="hidden" class="switch_1" value="No" name="vasopressor_use">
                                        <input type="checkbox" class="switch_1" value="Yes" id="vasopressor_use" name="vasopressor_use">
                                    </div>
                                </li>
                            </ul>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn-save update">Update</button>
                                <button type="button" class="btn-close" data-dismiss="modal">Close</button>
                            </div>
                        </div><!--row-->
                    </form>
                </div><!--modal-body-->
            
            </div>
        </div>
    </div>
</section>

<!-- ----------------------------------------------------view page------------------ -->
<script>

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

    var procedure_date = "<?php echo date("d-m-Y",strtotime($info['procedure_date'])); ?>";
    //alert(procedure_date);
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
<!-- -------------------------------vie page end----------------------------------------- -->


<script type="text/javascript">

var attem ="<?php echo $info['no_attempts']; ?>";
$('#no_attempts').val(attem);

$(document).ready(function(){
    var i=1;
    var j=1;
    var k=1;
    var l=1;
    $(".add1").click(function(){
        if(i<3){
            i++;
		    $(".other").append('<div class="row pt"><div class="col-sm-12" id="proced-plus" style="display:flex; margin-bottom:10px;"><input onkeydown="return /[a-z]/i.test(event.key)" class="form-control" name="others[]" style="width:220px;"><button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".opioid").append('<div class="row2"><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="opioid_name[]"><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="opioid_dose[]"></div></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".other1").append('<div class="row3"><div class="row pt"><div class="col-sm-4"><span>Adjuvant Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="aj_name[]"><button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-1"></div></div><div class="row pt"><div class="col-sm-4"><span>Adjuvant Dose(mg)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="aj_dose[]"></div><div class="col-sm-1"></div></div></div>');
        }
    });
    $(".add4").click(function(){
        if(l<3){
            l++;
		    $(".opioids").append('<div class="row4"><div class="row" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control op_remove" name="asr_opioid_name[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control op_remove" name="asr_opioid_dose[]"></div></div></div>');
        }
    });
    $(document).on('click','.remove1',function(){
        i--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove2',function(){
        j--;
        $(this).closest('.row2').remove();
    });
    $(document).on('click','.remove3',function(){
        k--;
        $(this).closest('.row3').remove();
    });
    $(document).on('click','.remove4',function(){
        l--;
        $(this).closest('.row4').remove();
    });
    $(document).on('click','.remove11',function(){
        $(this).closest('.row1').remove();
    });
    $(document).on('click','.remove22',function(){
        $(this).closest('.row11').remove();
    });
    $(document).on('click','.remove33',function(){
        $(this).closest('.row21').remove();
    });
    $(document).on('click','.remove44',function(){
        $(this).closest('.row22').remove();
    });
});
$(document).ready(function(){
    $('.ultrasound').hide();
    $('.needle').hide();
    $('.type').hide();
    $('.other').hide();
    $('.plus1').hide();
    $('.plus2').hide();
    $('.plus3').hide();
    $('.plus4').hide();
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
    var cc = "<?php echo $info['ultrasound']; ?>";
    var dd = "<?php echo $info['probe_cover']; ?>";
    var ee = "<?php echo $info['image_quality']; ?>";
    if(cc=="Yes"){
        $('#ultra_sound').attr("checked",true);
        $('.ultrasound').show();
        $('#probe_cover').val(dd);
        $('#image_quality').val(ee);
    }
    var wa = "<?php echo $info['needle_type']; ?>";
    var xq = "<?php echo $info['other6']; ?>";
    $('#ty').val(wa);
    if(wa == 'Other'){
        $('.type').show();
        $('#other6').val(xq);   
    }
    var vc = "<?php echo $info['needle_brand']; ?>";
    var qq = "<?php echo $info['other4']; ?>";
    $('#need').val(vc);
    if(vc == 'Other'){
        $('.needle').show();
        $('#Other1').val(qq);   
    }
    var ca = "<?php echo $info['others']; ?>";
    if(ca){
        $('#oth').attr("checked",true);
        $(".other").show();
        $('.plus1').show();
    }


    // var tt = "<?php echo $info['technique']; ?>";
    // if(tt=="Single Shot"){
    //     $('#single')[0].checked = true;
    //     $('.catheter').hide();
    // }else{
    //     $('#cath')[0].checked = true;
    //     $('.catheter').show();
    // }


    var epidural_tech = "<?php echo $info['technique']; ?>";
    var epidural_technique = epidural_tech.split(',');    

    // alert(epidural_tech);

    if(epidural_technique[0] == ''){
        // alert('-');

        if(epidural_technique[0] == "Single Shot"){
            $('#single')[0].checked = true;
            $('.catheter').hide();
        }else{
          
            $('.cath_mark').val(epidural_technique[1]);
        }

    }else{

        // alert('hi');

        if(epidural_technique[0] == "Single Shot"){
            $('#single')[0].checked = true;
            $('.catheter').hide();
        }else{
            $('#cath')[0].checked = true;
            $('.catheter').show();
            $('.cath_mark').val(epidural_technique[1]);
        }

    }


    var ccc = '<?php echo $info['opioid_name']; ?>';
    var ccc101 = ccc.split(',');
    // alert(ccc101[0]['name']);
    var qqq = "<?php echo $info['clonidina_dose']; ?>";
    var vcs = "<?php echo $info['dexmeditomidine_dose']; ?>";
    var qrq = "<?php echo $info['dexamephasone_dose']; ?>";
    var mm = "<?php echo $info['tramadol_dose']; ?>";
    var mu = "<?php echo $info['kepamine_dose']; ?>";
    var qvc = "<?php echo $info['midazolam_dose']; ?>";
    var qtq = "<?php echo $info['other7']; ?>";
    if(ccc101[0] != '' || (qqq)||(vcs)||(qrq)||(mm)||(mu)||(qvc)|| qtq == 'Yes'){
        $('#adju').attr("checked",true);
        $('.adjuvant').show();
    }
    var caa = "<?php echo $info['opioid_name']; ?>";
    if(caa){
        $('#opio').attr("checked",true);
        $('.opioid').show();
        $('.plus2').show();
    }
    var cz = "<?php echo $info['other7']; ?>";
    if(cz=="Yes"){
        $('#oth1').attr("checked",true);
        $('.other1').show();
        $('.plus3').show();
    }
    var csc = "<?php echo $info['in_analgesia']; ?>";
    var qsq = "<?php echo $info['asr_iv_analgesia']; ?>";
    if((csc == "Yes")||(qsq == "Yes")){
        $('#ana').attr("checked",true);
        $('.analgesia').show();
        $("#analgesis").text(' YES ');
    }
    var be = "<?php echo $info['asr_iv_analgesia']; ?>";
    if(be=="Yes"){
        $('#gesi').attr("checked",true);
        $('.gesia').show();
    }
    var bk = "<?php echo $info['opioids']; ?>";
    if(bk=="Yes"){
        $('#opi').attr("checked",true);
        $('.opioids').show();
        $('.plus4').show();
    }
    var kj = "<?php echo $info['asr_multimode']; ?>";
    if(kj=="Yes"){
        $('#asr_multimode').attr("checked",true);
    }
    var kz = "<?php echo $info['asr_other_iv_name']; ?>";
    if(kz){
        $('#adjunc').attr("checked",true);
        $('.adjuncts').show();
    }
    //var gg = "<?php echo $info['complication_none']; ?>";
    var gc = "<?php echo $info['tc_equipment']; ?>";
    var gq = "<?php echo $info['tc_multiple']; ?>";
    var gs = "<?php echo $info['tc_2_anaestsetist']; ?>";
    var gr = "<?php echo $info['tc_abondoned']; ?>";
    var gm = "<?php echo $info['tc_catheter']; ?>";
    var gu = "<?php echo $info['tc_other']; ?>";
    // var gt = "<?php echo $info['complication_none']; ?>";
    if((gc == "Yes")||(gq == "Yes")||(gs == "Yes")||(gr == "Yes")||(gm == "Yes")||(gu == "Yes")){
        $('#tech').attr("checked",true);
        $('.technical').show();
        $("#teche").text(' YES ');
    }
    if(gc == "Yes"){
        $('#tc_equipment').attr("checked",true);
    }
    if(gq == "Yes"){
        $('#tc_multiple').attr("checked",true);
    }
    if(gs == "Yes"){
        $('#tc_2_anaestsetist').attr("checked",true);
    }
    if(gr == "Yes"){
        $('#tc_abondoned').attr("checked",true);
    }
    if(gm == "Yes"){
        $('#tc_catheter').attr("checked",true);
    }
    if(gu == "Yes"){
        $('#tc_other').attr("checked",true);
        $("#othe1").attr("readonly", false);
    }
    // if(gt == "Yes"){
    //     $('#tc_none').attr("checked",true);
    // }
    var xc = "<?php echo $info['ac_ep_resited']; ?>";
    var xa = "<?php echo $info['ac_last']; ?>";
    var xb = "<?php echo $info['ac_re_arrest']; ?>";
    var xd = "<?php echo $info['ac_ca_arrest']; ?>";
    var xe = "<?php echo $info['ac_radi_pain']; ?>";
    var xf = "<?php echo $info['ac_parestsesia']; ?>";
    var xg = "<?php echo $info['ac_bloody_tap']; ?>";
    var xh = "<?php echo $info['ac_intra_cath']; ?>";
    // var xi = "<?php echo $info['ac_wet_tap']; ?>";
    var xj = "<?php echo $info['ac_hypoten']; ?>";
    var xk = "<?php echo $info['ac_nausea']; ?>";
    var xl = "<?php echo $info['ac_vomit']; ?>";
    var xm = "<?php echo $info['ac_high_block']; ?>";
    var xn = "<?php echo $info['ac_sb_block']; ?>";
    var xo = "<?php echo $info['ac_motor_block']; ?>";
    var xp = "<?php echo $info['ac_totla_spinal']; ?>";
    var xq = "<?php echo $info['ac_adp']; ?>";
    var xr = "<?php echo $info['ac_other']; ?>";
    // var xz = "<?php echo $info['ac_none']; ?>";
    if((xc == "Yes")||(xa == "Yes")||(xb == "Yes")||(xd == "Yes")||(xe == "Yes")||(xf == "Yes")
    ||(xg == "Yes")||(xh == "Yes")||(xj == "Yes")||(xk == "Yes")||(xl == "Yes")
    ||(xm == "Yes")||(xn == "Yes")||(xo == "Yes")||(xp == "Yes")||(xq == "Yes")||(xr == "Yes")){
        $('#acu').attr("checked",true);
        $('.acute').show();
        $("#acutes").text(' YES ');
    }
    if(xc == "Yes"){
        $('#ac_ep_resited').attr("checked",true);
    }
    if(xa == "Yes"){
        $('#ac_last').attr("checked",true);
    }
    if(xb == "Yes"){
        $('#ac_re_arrest').attr("checked",true);
    }
    if(xd == "Yes"){
        $('#ac_ca_arrest').attr("checked",true);
    }
    if(xe == "Yes"){
        $('#ac_radi_pain').attr("checked",true);
    }
    if(xf == "Yes"){
        $('#ac_parestsesia').attr("checked",true);
    }
    if(xg == "Yes"){
        $('#ac_bloody_tap').attr("checked",true);
    }
    if(xh == "Yes"){
        $('#ac_intra_cath').attr("checked",true);
    }
    // if(xi == "Yes"){
    //     $('#ac_wet_tap').attr("checked",true);
    // }
    if(xj == "Yes"){
        $('#ac_hypoten').attr("checked",true);
    }
    if(xk == "Yes"){
        $('#ac_nausea').attr("checked",true);
    }
    if(xl == "Yes"){
        $('#ac_vomit').attr("checked",true);
    }
    if(xm == "Yes"){
        $('#ac_high_block').attr("checked",true);
    }
    if(xn == "Yes"){
        $('#ac_sb_block').attr("checked",true);
    }
    if(xo == "Yes"){
        $('#ac_motor_block').attr("checked",true);
    }
    if(xp == "Yes"){
        $('#ac_total_spinal').attr("checked",true);
    }
    if(xq == "Yes"){
        $('#ac_adp').attr("checked",true);
    }
    if(xr == "Yes"){
        $('#ac_other').attr("checked",true);
        $("#ot1").attr("readonly", false);
    }
    // if(xz == "Yes"){
    //     $('#ac_none').attr("checked",true);
    // }
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
}
function hide(){
    $(".pts").hide();
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
$('#edi_ep').click(function(){
    $("#edit-epidural").modal("show");
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
var ww = "<?php echo $info['patient_position']; ?>";
$('#patient_pos').val(ww);
var v = "<?php echo $info['patient_status']; ?>";
var pos_v = v.split(' -> ');
if(v=="Awake"){
    $('#option-1')[0].checked = true;
    $('.pts').hide();
}else if(v=="GA"){
    $('#option-3')[0].checked = true;
    $('.pts').hide();
}else{
    $('#option-2')[0].checked = true;
    $('.pts').show();
    $('#sedi').val(pos_v[1]);
}
var a = "<?php echo $info['wearing_mask']; ?>";
var b = "<?php echo $info['hand_washing']; ?>";
var c = "<?php echo $info['sterile_gown']; ?>";
var d = "<?php echo $info['sterile_draping']; ?>";
if(a=="Yes"){
    $('#wearing_mask').attr("checked",true);
}
if(b=="Yes"){
    $('#hand_washing').attr("checked",true);
}
if(c=="Yes"){
    $('#sterile_gown').attr("checked",true);
}
if(d=="Yes"){
    $('#sterile_draping').attr("checked",true);
}
var aa = "<?php echo $info['skin_prepartion']; ?>";
// $('#skin_prep').val(aa);

const myArray = aa.split(",");
//alert(myArray[0]);
if(myArray[0] == 'Other'){
    $('#skin_prep').val(myArray[0]);
    $('#skin_prep_other').val(myArray[1]);
    $('#skin_prep_other').show(); 
}
else{
    $('#skin_prep').val(myArray[0]);
}

var xx = "<?php echo $info['anatomical_landmark']; ?>";
$('#anatomical_landmark').val(xx);
var bb = "<?php echo $info['epedural_level']; ?>";
var cj = "<?php echo $info['epidural_level_name']; ?>";

if(bb != ''){
    $('#epidu').val(bb);
}
$('#epid_type').val(cj);
if(bb != ''){
    $('.'+bb+'').css("background", "red").css("color", "white");

}
var wq = "<?php echo $info['needle_size']; ?>";
$('#size').val(wq);
function ultra(){
    var ult = $('#ultra_sound').is(':checked');
    if(!ult){
        $('.ultrasound').hide();
    }
    else{
        $(".ultrasound").show();
    }
}
var as = "<?php echo $info['lor_saline']; ?>";
var bs = "<?php echo $info['lor_air']; ?>";
var cs = "<?php echo $info['hanging_drop']; ?>";
if(as=="LOR Saline"){
    $('#lor_sal').attr("checked",true);
}
if(bs=="LOR Air"){
    $('#air').attr("checked",true);
}
if(cs=="Hanging Drop"){
    $('#hang').attr("checked",true);
}
function other(){
    var oth = $('#oth').is(':checked');
    if(!oth){
        $('.other').hide();
        $('.plus1').hide();
    }
    else{
        $(".other").show();
        $('.plus1').show();
    }
}
function other2(){
    var othe = $('#tc_other').is(':checked');
    if(!othe){
        $("#othe1").attr("readonly", true);
    }
    else{
        $('#othe1').removeAttr("readonly");
    }
}
var an = "<?php echo $info['approach']; ?>";
$('#approach').val(an);
function hide2(){
    $('.catheter').hide();
    $( "#cath" ).prop("checked", false);
}
function catheter(){
    $('.catheter').show();
    $("#single").prop("checked", false);
}
var bns = "<?php echo $info['test_dose']; ?>";
if(bns=="Yes"){
    $('#test_dose').attr("checked",true);
}
var sns = "<?php echo $info['la_regimen']; ?>";
// console.log(sns);
$('#la_regimen').val(sns);
var ropi = "<?php echo $info['la_ropivacaine']; ?>";
var ropi_split = ropi.split(',');  
$('#ropivacaine').val(ropi_split[0]);
$('#ropi_per').val(ropi_split[1]);
$('#ropi_ml').val(ropi_split[2]);
$('#ropi_mg').val(ropi_split[3]);  

var bupi = "<?php echo $info['la_bupivacaine']; ?>";
var bupi_split = bupi.split(',');  
$('#bupivacaine').val(bupi_split[0]);
$('#bupi_per').val(bupi_split[1]);
$('#bupi_ml').val(bupi_split[2]);
$('#bupi_mg').val(bupi_split[3]);

var levo = "<?php echo $info['la_levobupivacaine']; ?>";
var levo_split = levo.split(',');  
$('#levobupivacaine').val(levo_split[0]);
$('#levo_per').val(levo_split[1]);
$('#levo_ml').val(levo_split[2]);
$('#levo_mg').val(levo_split[3]);

var ligno = "<?php echo $info['la_lignocaine']; ?>";
var ligno_split = ligno.split(',');  
$('#Lignocaine').val(ligno_split[0]);
$('#ligno_per').val(ligno_split[1]);
$('#ligno_ml').val(ligno_split[2]);
$('#ligno_mg').val(ligno_split[3]);

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
        $('.plus2').hide();

    }
    else{
        $(".opioid").show();
        $('.plus2').show();

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
var cl = "<?php echo $info['clonidina_dose']; ?>";
if(cl){
    $('#clon').attr("checked",true);
    $('#clon1').removeAttr("readonly");
}
var dexs = "<?php echo $info['dexmeditomidine_dose']; ?>";
if(cl){
    $('#dex').attr("checked",true);
    $('#dex1').removeAttr("readonly");
}
var dexas = "<?php echo $info['dexamephasone_dose']; ?>";
if(dexas){
    $('#dexa').attr("checked",true);
    $('#dexa1').removeAttr("readonly");
}
var trams = "<?php echo $info['tramadol_dose']; ?>";
if(trams){
    $('#tram').attr("checked",true);
    $('#tram1').removeAttr("readonly");
}
var ketas = "<?php echo $info['kepamine_dose']; ?>";
if(ketas){
    $('#keta').attr("checked",true);
    $('#keta1').removeAttr("readonly");
}
var midas = "<?php echo $info['midazolam_dose']; ?>";
if(midas){
    $('#mida').attr("checked",true);
    $('#mida1').removeAttr("readonly");
}
function other1(){
    var oth1 = $('#oth1').is(':checked');
    if(!oth1){
        $('.other1').hide();
        $('.plus3').hide();
    }
    else{
        $(".other1").show();
        $('.plus3').show();
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
//         $('#ket').prop("checked",false);
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

var ae = "<?php echo $info['in_analgesia']; ?>";
if(ae=="Yes"){
    $('#in_analgesia').attr("checked",true);
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
        $('.plus4').hide();
    }
    else{
        $(".opioids").show();
        $('.plus4').show();
    }
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
var zc = "<?php echo $info['asr_ketamine']; ?>";
var zq = "<?php echo $info['asr_dexmedetomidine']; ?>";
var zt = "<?php echo $info['asr_clonidine']; ?>";
var zn = "<?php echo $info['asr_tramadol']; ?>";
var zm = "<?php echo $info['asr_magnesium']; ?>";
if(zc=="Yes"){
    $('#ket').attr("checked",true);
}
if(zq=="Yes"){
    $('#dexs').attr("checked",true);
}
if(zt=="Yes"){
    $('#clos').attr("checked",true);
}
if(zn=="Yes"){
    $('#tras').attr("checked",true);
}
if(zm=="Yes"){
    $('#mags').attr("checked",true);
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
// function technical(){
//     var tech = $('#tech').is(':checked');
//     if(!tech){
//         $('.technical').hide();
//         $("#teche").text(' NO ');
//         $('#tc_equipment').prop("checked",false);
//         $('#tc_multiple').prop("checked",false);
//         $('#tc_2_anaestsetist').prop("checked",false);
//         $('#tc_abondoned').prop("checked",false);
//         $('#tc_catheter').prop("checked",false);
//         $('#tc_other').prop("checked",false);
//         $('#othe1').val('');
//         $("#othe1").attr("readonly", true);
//     }
//     else{
//         $(".technical").show();
//         $("#teche").text(' YES ');
//     }
// }

function technical(){
    var tech = $('#tech').is(':checked');

    var tc_equipment = $('#tc_equipment').is(':checked');
    var tc_multiple = $('#tc_multiple').is(':checked');
    var tc_2_anaestsetist = $('#tc_2_anaestsetist').is(':checked');
    var tc_abondoned = $('#tc_abondoned').is(':checked');
    var othe = $('#tc_other').is(':checked');
    var tc_catheter = $('#tc_catheter').is(':checked');


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
        else if(tc_abondoned){
            toastr.error('Please Uncheck Technique abandoned/failure to find space');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }  
        else if(othe){
            toastr.error('Please Uncheck other');
            $('#tech').attr("checked",true);
            document.getElementById("tech").checked = true;
        }
        else if(tc_catheter){
            toastr.error('Please Uncheck Catheter related');
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
// function acute(){
//     var acu = $('#acu').is(':checked');
//     if(!acu){
//         $('.acute').hide();
//         $("#acutes").text(' NO ');
//         $('#ac_last').prop("checked",false);
//         $('#ac_radi_pain').prop("checked",false);
//         $('#ac_parestsesia').prop("checked",false);
//         $('#ac_bloody_tap').prop("checked",false);
//         $('#ac_intra_cath').prop("checked",false);
//         $('#ac_wet_tap').prop("checked",false);
//         $('#ac_hypoten').prop("checked",false);
//         $('#ac_nausea').prop("checked",false);
//         $('#ac_vomit').prop("checked",false);
//         $('#ac_high_block').prop("checked",false);
//         $('#ac_sb_block').prop("checked",false);
//         $('#ac_total_spinal').prop("checked",false);
//         $('#ac_re_arrest').prop("checked",false);
//         $('#ac_ca_arrest').prop("checked",false);
//         $('#ac_other').prop("checked",false);
//         $('#ot1').val('');
//         $("#ot1").attr("readonly", true);
//     }
//     else{
//         $(".acute").show();
//         $("#acutes").text(' YES ');    
//     }
// }

function acute(){
    var acu = $('#acu').is(':checked');
    if(!acu){

        var ac_radicular_pain = $('#ac_radi_pain').is(':checked');
        var ac_paresthesia_pain = $('#ac_parestsesia').is(':checked'); 

        var ac_bloody_tap = $('#ac_bloody_tap').is(':checked');
        var ac_hypotension = $('#ac_hypoten').is(':checked');
        var ac_nausea = $('#ac_nausea').is(':checked');
        var ac_vomiting = $('#ac_vomit').is(':checked');
        var ac_high_block = $('#ac_high_block').is(':checked');
        var ac_subdural_block = $('#ac_sb_block').is(':checked');
        var ac_total_spinal = $('#ac_total_spinal').is(':checked');
        var ac_respi_arrest = $('#ac_re_arrest').is(':checked'); 
        var ac_last = $('#ac_last').is(':checked'); 
  
        var ac_cardiac_arrest = $('#ac_ca_arrest').is(':checked');
        var maternal_fever = $('#maternal_fever').is(':checked');
        var ac_intra_cath = $('#ac_intra_cath').is(':checked');
        var ot = $('#ac_other').is(':checked');
        if(ac_last){
            toastr.error('Please Uncheck Acute Local Anaesthetic systemic toxicity');
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
        else if(ac_intra_cath){
            toastr.error('Please Uncheck Intrathecal migration of epidural catheter');
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
    var ot = $('#ac_other').is(':checked');
    if(!ot){
        $("#ot1").attr("readonly", true);
    }
    else{
        $('#ot1').removeAttr("readonly");
    }
}
var yt = "<?php echo $info['success_status']; ?>";
var yz = "<?php echo $info['onset']; ?>";
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
var yy = "<?php echo $info['motor_level']; ?>";
$('#motor_level').val(yy);
var zx = "<?php echo $info['vasopressor_use']; ?>";
if(zx=="Yes"){
    $('#vasopressor_use').attr("checked",true);
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
	// function checkskin(){
	// 	var skin = $('#skin_prep').val();
	// 	if((skin != '')){
    //         alert('hide');
	// 		$('.skp').hide();
	// 	}
	// }

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
$('#edit-epi').submit(function(e){
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
        else if(final1 == ',,,' && final2 == ',,,' && final3 == ',,,' && 
        final4 == ',,,' && final5 == ',,,' && final6 == ',,,'){
            i = 1;
        } 
        if(i == 1){
            toastr.error('Sensory Levels are incomplete.. Please enter Highest and lowest level...');
        }   
        else {
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
            $(".update").text("Updating...");
            $(".update").attr("disabled", true);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("editEpidu")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){
                        toastr["success"](response.message);
                        $("#edit-epidural").modal("hide");
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
