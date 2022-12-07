<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>

<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

<section class="add-spinal-view">
    <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <button type="button" class="btn-edit" data-toggle="modal" id="edi_spi" style="margin:5px;">Edit</button>
            <!-- <button type="button" class="btn-close">Delete</button> -->
        </div>
    </div><!--row-->
    <div class="view-spinal-cont">
        <div class="view-spinal-table1">
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
                            <td><?php echo $info['skin_prepartion']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--spinal-table1-->
        <h4 class="pt"><b>Spinal Anaesthesia</b></h4>
        <div class="view-spinal-card2">
            <div class="card-header">
                <h5><b>Anatomical Landmark</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['anatomical_landmark']; ?></p>
            </div>
        </div><!--view-spinal-card2-->
        <h4 class="pt"><b>Spinal Level</b></h4>
        <div class="view-spinal-card2">
            <div class="card-header">
                <h5><b><?php echo $info['spinal_level_name']; ?></b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['spinal_level']; ?></p>
            </div>
        </div><!--view-spinal-card2-->
        <h4 class="pt"><b>Spinal Needle Brand,Type and Size</b></h4>
        <div class="view-spinal-card2">
            <div class="card-header">
                <ul>
                    <li><b>Needle Brand</b></li>
                    <li><b>Needle Type</b></li>
                    <li><b>Needle Size</b></li>
                </ul>
            </div>
            <div class="card-body">
                <ul><?php if($n_brand){ ?>
                        <li><span><?php echo $info['other4']; ?></span></li>
                    <?php }else{ ?>
                        <li><span><?php echo $info['needle_brand']; ?></span></li>
                    <?php }; ?>
                    <?php if($n_type){ ?>
                        <li><span><?php echo $info['other6']; ?></span></li>
                    <?php }else{ ?>
                        <li><span><?php echo $info['needle_type']; ?></span></li>
                    <?php }; ?>
                    <li><span><?php echo $info['needle_size']; ?></span></li>
                </ul>
            </div>
        </div><!--view-spinal-card2-->
        <h4 class="pt"><b>Approach</b></h4>
        <div class="view-spinal-card2">
            <div class="card-header">
                <h5><b>Approach</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['approach']; ?></p>
            </div>
        </div><!--view-spinal-card2-->
        <h4 class="pt"><b>Number of Attempts</b></h4>
        <div class="view-spinal-card2">
            <div class="card-header">
                <h5><b>Number of Attempts</b></h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['no_attempts']; ?></p>
            </div>
        </div><!--view-spinal-card2-->
        <h4 class="pt"><b>Spinal Anaesthetic</b></h4>
        <div class="view-spinal-table2">
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
                                $z = $info['la_lignocaine'];
                                $cc = explode(",",$z);
                            ?>
                            <td>Lignocaine - <?php echo $cc[0]; ?></td>
                            <td><?php echo $cc[1]; ?></td>
                            <td><?php echo $cc[2]; ?></td>
                            <td><?php echo $cc[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $y = $info['la_bupivacaine'];
                                $dd = explode(",",$y);
                            ?>
                            <td>Bupivacaine - <?php echo $dd[0]; ?></td>
                            <td><?php echo $dd[1]; ?></td>
                            <td><?php echo $dd[2]; ?></td>
                            <td><?php echo $dd[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $x = $info['la_ropivacaine'];
                                $ee = explode(",",$x);
                            ?>
                            <td>Ropivacaine - <?php echo $ee[0]; ?></td>
                            <td><?php echo $ee[1]; ?></td>
                            <td><?php echo $ee[2]; ?></td>
                            <td><?php echo $ee[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $w = $info['la_prilocaine'];
                                $ff = explode(",",$w);
                            ?>
                            <td>Prilocaine - <?php echo $ff[0]; ?></td>
                            <td><?php echo $ff[1]; ?></td>
                            <td><?php echo $ff[2]; ?></td>
                            <td><?php echo $ff[3]; ?></td>
                        </tr>
                        <tr><?php 
                                $v = $info['la_2-chloroprocaine'];
                                $gg = explode(",",$v);
                            ?>
                            <td>2-chloroprocaine - <?php echo $gg[0]; ?></td>
                            <td><?php echo $gg[1]; ?></td>
                            <td><?php echo $gg[2]; ?></td>
                            <td><?php echo $gg[3]; ?></td>
                        </tr>
                        <tr>
                            <td>Other</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><?php 
                                $u = $info['la_otheraine'];
                                $hh = explode(",",$u);
                            ?>
                            <td><?php echo $hh[0]; ?></td>
                            <td><?php echo $hh[1]; ?></td>
                            <td><?php echo $hh[2]; ?></td>
                            <td><?php echo $hh[3]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--view-spine-table-->
        <h4 class="pt"><b>Adjuvant</b></h4>
        <div class="view-spinal-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2"  style="border:0;">Opioid</td>
                            <td style="border:0;"></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Name</td>
                            <td style="border:0;"><?php echo $info['opioid_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Dose(microgram equivalent)</td>
                            <td style="border:0;"><?php echo $info['opioid_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Clonidne with Dose(mcgm)</td>
                            <td><?php echo $info['clonidina_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Dexmeditomidine with Dose(mcgm)</td>
                            <td><?php echo $info['dexmeditomidine_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Dexamephasone with Dose(mcgm)</td>
                            <td><?php echo $info['dexamephasone_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Tramadol with Dose(mg)</td>
                            <td><?php echo $info['tramadol_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Adrenaline with Dose(mcgm)</td>
                            <td><?php echo $info['adrenaline_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td><?php echo $info['other7']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Name</td>
                            <td style="border:0;"><?php echo $info['aj_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Dose(mg)</td>
                            <td style="border:0;"><?php echo $info['aj_dose']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--view-spinal-table1-->
        <h4 class="pt"><b>Analgesia supplementation required</b></h4>
        <div class="view-spinal-table1">
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
                        <tr>
                            <td class="bg-pat2">Opioids</td>
                            <td><?php echo $info['opioids']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Name</td>
                            <td style="border:0;"><?php echo $info['asr_opioid_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Opioid Dose(microgram equivalent)</td>
                            <td style="border:0;"><?php echo $info['asr_opioid_dose']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Multi-modal</td>
                            <td><?php echo $info['asr_multimode']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ketamine</td>
                            <td><?php echo $info['asr_ketamine']; ?></td>
                        </tr>
                        <!-- <tr>
                            <td class="bg-pat2">Dexmedetomidine</td>
                            <td><?php //echo $info['asr_dexmedetomidine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Clonidine</td>
                            <td><?php //echo $info['asr_clonidine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Tramadol</td>
                            <td><?php //echo $info['asr_tramadol']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Magnesium</td>
                            <td><?php //echo $info['asr_magnesium']; ?></td>
                        </tr> -->
                        <tr>
                            <td class="bg-pat2"  style="border:0;">IV adjuncts</td>
                            <td style="border:0;"></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Name</td>
                            <td style="border:0;"><?php echo $info['asr_other_iv_name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Adjuvant Dose(mg)</td>
                            <td style="border:0;"><?php echo $info['asr_other_iv_dose']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--view-spinal-table1-->
        <h4 class="pt"><b>Technical Complications</b></h4>
        <div class="view-spinal-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
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
                            <td class="bg-pat2">Technique abandoned/failure to find sapce</td>
                            <td><?php echo $info['tc_abondoned']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Catheter related</td>
                            <td><?php echo $info['tc_catheter']; ?></td>
                        </tr>
                        <tr><?php if($t_other){ ?>
                                <td class="bg-pat2">Other</td>
                            <?php }else{ ?>
                                <td class="bg-pat2"><?php echo $info['other5']; ?></td>
                            <?php }; ?>
                            <td><?php echo $info['tc_other']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--view-spinal-table1-->
        <h4 class="pt"><b>Acute Complications</b></h4>
        <div class="view-spinal-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Respiratory Arrest</td>
                            <td><?php echo $info['ac_re_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Cardiac Arrest</td>
                            <td><?php echo $info['ac_ca_arrest']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Radicular Pain (needle/catheter)</td>
                            <td><?php echo $info['ac_radi_pain']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Paresthesia Pain (needle/catheter)</td>
                            <td><?php echo $info['ac_parestsesia']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Bloody Tap ( needle/catheter)</td>
                            <td><?php echo $info['ac_bloody_tap']; ?></td>
                        </tr>
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
                        <tr><?php if($a_other){ ?>
                                <td class="bg-pat2">Other</td>
                            <?php }else{ ?>
                                <td class="bg-pat2"><?php echo $info['other2']; ?></td>
                            <?php }; ?>
                            <td><?php echo $info['ac_other']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--view-spinal-table1-->
        <h4 class="pt"><b>Success</b></h4>
        <div class="view-spinal-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr><?php if(($s_stat[0]) == 'Partial Success'){ ?>
                                <td class="bg-pat2">Partial Success</td>
                                <td>Yes</td>
                            <?php }elseif(($s_stat[0]) == 'Complete Success'){ ?>
                                <td class="bg-pat2">Complete Success</td>
                                <td>Yes</td>
                            <?php }else{ ?>
                                <td class="bg-pat2">Failure</td>
                                <td>Yes</td>
                            <?php }; ?>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Onset</td>
                            <td style="border:0;"><?php echo $info['onset']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div><!--view-spinal-table1-->
        <h4 class="pt"><b>Sensory Level</b></h4>
        <div class="view-spinal-table1">
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
        </div><!--view-spinal-table1-->
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
                    <div class="view-sensor-table">
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
                    </div><!--view-sensor-table-->
                </div>
                <div class="col-sm-5">
                    <img src="assets/images/Dermo.png" class="img-fluid d-block mx-auto">
                </div>
            </div><!--row-->
        </div><!--body-img-->
        <h4 class="pt"><b>Motor Level (Bromage Score)</b></h4>
        <div class="view-spinal-table1">
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="bg-pat2">Selected</td>
                            <td><?php echo $info['motor_level']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Surgical Anaesthesia Onset</td>
                            <td><?php echo $info['surgical_anaesthesia']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Duration of Surgery Mins</td>
                            <td><?php echo $info['surgery_duration']; ?></td>
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
        </div><!--view-spinal-table1-->
        <div class="bromo-img">
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6"><img src="assets/images/Bromo.png" class="img-fluid d-block mx-auto"></div>
                <div class="col-sm-3"></div>
            </div><!--row-->
        </div><!--bromo-img-->
    </div><!--view-spinal-cont-->
</section><!--view-spinal-view-->
<!---------------------------------------EDIT-SPINAL-PAGE------------------------>
<section class="edit-spinal-page">
    <!-- The Modal -->
    <div class="modal" id="edit-spinal-page">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" id="add-header">
                    <h4 class="modal-title">EDIT-SPINAL</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit-spinal">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" required>
                        <label>Patient status during Neuraxial Block<span class="mandat">*</span></label>&nbsp
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
                                <div class="pts">
                                    <select class="form-control" id="sedi" name="sedation_if">
                                        <option value=''>Select</option>
                                        <option>1-Mild easy to rouse</option>
                                        <option>2-Moderate,easy to rouse,unable to remain awake</option>
                                        <option>3-Difficult to rouse</option>
                                    </select>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" id="option-3" value="GA" name="optradio" onclick="hide()">GA
                                    </label>
                                </div>
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
                                    <ul>
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
                        <div class="row">
                            <div class="col-sm-2"><label>Skin Prep<span class="mandat">*</span></label></div>
                            <div class="col-sm-4">
                                <select class="form-control" id="skin_prep" name="skin_prep" onfocusout="checkskin()">
                                    <option>Select</option>
                                    <option>Alcohol</option>
                                    <option>Chlorhexitine</option>
                                    <option>Betadine</option>
                                    <option>Combinations</option>
                                    <option>Other</option>
                                </select>
                                <small class="skp" style="color:red; display:none;">please enter skin prep</small>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        
                        <!-- <h5><b>Spinal Anasthesia<span class="mandat">*</span></b></h5> -->
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
                            <div class="col-sm-3"><h5 class="pt"><b>Spinal Level</b></h5></div>
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
                               <!--  <img src="assets/images/Lev.png" class="img-fluid d-block mx-auto">
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
                                <button type="button" class="btn q Caudal" id="c2-26" value="Caudal">Caudal</button> -->
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
                        <label><b>Needle Brand,Type and Size</label>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <label>Select Needle Brand</label>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="need" name="needle_brand" onclick="needle()">
                                            <option value=''>Select</option>
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
                                <label>Select Spinal Needle Type</label>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="ty" name="needle_type" onclick="type1()">
                                            <option value=''>Select</option>
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
                                <label>Select Spinal Needle Size</label>
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
                                <input type="number" class="form-control" name="no_attempts" id="no_attempts" value="<?php echo $info['no_attempts']; ?>" onfocusout="attempts()">
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
                        <div class="spinal" style="box-shadow: initial!important;">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-11">
                                    <span><b>Local Anaesthetic</b></span>
                                    <div class="procedure-cse" style="margin:20px;">
                                        <div class="pac-box">
                                            <div class="pacu-1"><p>Lignocaine</p></div>
                                            <div class="pacu-1-x">
                                                <select class="form-control" id="lignocaine" name="lignocaine">
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
                                                <select class="form-control" id="bupivacaine" name="bupivacaine">
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
                                                <select class="form-control" id="ropivacaine" name="ropivacaine">
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
                                                <select class="form-control" id="prilocaine" name="prilocaine">
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
                                                <select class="form-control" id="chloroprocaine" name="chloroprocaine">
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
                                        <p>Other</p>
                                        <div class="pac-box">
                                            <div class="pacu-1"><p>Name</p></div>
                                            <div class="pacu-1-x">
                                                <input type="text" class="form-control" id="otheraine" name="oth_name">
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
                                <label><b>Adjuvant</b></label>
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
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="opio" onclick="opioid()">Opioid
                                        </label>
                                        <span class="plus2" id="proced-plus"><button type="button" class="btn add2"><i class="fa fa-plus" aria-hidden="true"></i></button></span>
                                    </div>
                                    <div class="pt" id="proced-plus" style="">
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
                                            <div class="col-sm-7"><input type="text" class="form-control" name="clonidne" id="clon1" value="<?php echo $info['clonidina_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="dex" onclick="Dexmeditomidine()">Dexmeditomidine with Dose(mcgm)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="text" class="form-control" name="dexmeditomidine" id="dex1" value="<?php echo $info['dexmeditomidine_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="dexa" onclick="Dexamethasone()">Dexamethasone with Dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="text" class="form-control" name="dexamethasone" id="dexa1" value="<?php echo $info['dexamephasone_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="tram" onclick="Tramadol()">Tramadol with Dose(mg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="text" class="form-control" name="tramadol" id="tram1" value="<?php echo $info['tramadol_dose']; ?>" readonly></div>
                                        </div><!--row-->
                                        <div class="row pt">
                                            <div class="col-sm-5">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" id="adre" onclick="Adrenaline()">Adrenaline(Epinephrine)(mcmg)
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"><input type="text" class="form-control" name="adrenal" id="adre1" value="<?php echo $info['adrenaline_dose']; ?>" readonly></div>
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
                                                                <div class="col-sm-7"><input type="text" class="form-control" name="aj_dose[]" value="<?php echo $ts[$key]; ?>"></div>
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
                                </div>
                            </div>
                        </div><!--Adjuvant ends-->
                        <label class="pt"><b>Analgesia supplementation required<span class="mandat">*</span></b>&nbsp<small class="supple" style="color:red; font-style: oblique; display:none;">please select analgesia supplementation</small></label>
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
                                                            <div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name[]" value="<?php echo $val; ?>"><button type="button" class="btn remove44"><i class="fa fa-times" aria-hidden="true"></i></button></div>
                                                        </div><!--row-->
                                                        <div class="row pt" style="margin-left: 3%;">
                                                            <div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div>
                                                            <div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose[]" value="<?php echo $ss[$key]; ?>"></div>
                                                        </div><!--row-->
                                                    </div>
                                            <?php
                                                } 
                                            ?>
                                            </div><!--opioids ends-->
                                            <div class="form-check" style="margin-left: 3%;">
                                                <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="asr_multimode">
                                                    <input type="checkbox" class="form-check-input" value="Yes" name="asr_multimode" id="multi" onclick="multianal()">Multi-Modal Analgesia
                                                </label>
                                            </div>
                                            <div class="multianal">
                                                <div class="form-check" style="margin-left: 25px;">
                                                    <label class="form-check-label">
                                                        <<input type="hidden" class="form-check-input" value="No" name="Ketamine1">
                                                        <input type="checkbox" class="form-check-input" value="Yes" id="ket" name="Ketamine1">Ketamine
                                                    </label>
                                                </div>
                                               <!--  <div class="form-check" style="margin-left: 5%;">
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
                                                            <input type="text" class="form-control" name="asr_other_iv_name" value="<?php echo $info['asr_other_iv_name']; ?>">
                                                        </div>
                                                        <div class="col-sm-4"></div>
                                                    </div>
                                                    <div class="row pt">
                                                        <div class="col-sm-1"></div>
                                                        <div class="col-sm-3"><label>Adjuvant Dose(mg)</label></div>
                                                        <div class="col-sm-4">
                                                            <input type="text" class="form-control" name="asr_other_iv_dose" value="<?php echo $info['asr_other_iv_dose']; ?>">
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
                        <label class="pt"><b>Technical complications<span class="mandat">*</span></b> <!-- <a href="#" data-toggle="tooltip"  title=""><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->&nbsp;<small class="techie" style="color:red; font-style: oblique; display:none;">please select technical complications</small></label>
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
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_equipment" name="tc_equipment">Equipment related
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul style="margin-bottom:0;padding-left: 0;">
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="tc_multiple">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_multiple" name="tc_multiple">Multiple attempts
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul style="margin-bottom:0;padding-left: 0;"> 
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="tc_2_anaestsetist">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_2_anaestsetist" name="tc_2_anaestsetist">2nd Anaesthetist
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul style="margin-bottom:0;padding-left: 0;">
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="tc_abondoned">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_abondoned" name="tc_abondoned">Technique abandoned/failure to find space
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul style="margin-bottom:0;padding-left: 0;">    
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="tc_catheter">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_catheter" name="tc_catheter">Catheter related
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul style="margin-bottom:0;padding-left: 0;">
                                            <li>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                    <input type="hidden" class="form-check-input" value="No" name="tc_other">
                                                    <input type="checkbox" class="form-check-input" value="Yes" id="tc_other" name="tc_other" onclick="other2()">Other
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul style="margin-bottom:0;padding-left: 0;">    
                                            <li>
                                                <input type="text" class="form-control" id="othe1" name="other4" value="<?php echo $info['other5']; ?>" readonly>
                                            </li>
                                        </ul>
                                    </div>
                                </div><!--technical ends--> 
                            </div>
                        </div><!--row-->
                        <label class="pt"><b>Acute complications<span class="mandat">*</span></b>&nbsp<small class="acuted" style="color:red; font-style: oblique; display:none;">please select acute complications</small></label>
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_re_arrest" name="ac_re_arrest">Respiratory Arrest
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label class="form-check-label">
                                        <input type="hidden" class="form-check-input" value="No" name="ac_ca_arrest">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_ca_arrest" name="ac_ca_arrest">Cardiac Arrest
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
                                        <input type="hidden" class="form-check-input" value="No" name="ac_hypoten">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_hypoten" name="ac_hypoten">Hypotension <!-- <a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="20% drop from baseline or SBP,90mmHg"><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_high_block" name="ac_high_block">High Block
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_total_spinal" name="ac_total_spinal">Total Spinal
                                        </label>
                                    </div>
                                    <div class="form-check" style="display: flex;">
                                        <label class="form-check-label">
                                        <input type="hidden" class="form-check-input" value="No" name="ac_other">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="ac_other" name="ac_other" onclick="other3()">Other
                                        </label>
                                        <input type="text" class="form-control" name="other5" id="ot1" style="width: 30%;" value="<?php echo $info['other2']; ?>" readonly>
                                    </div>
                                </div><!--acute ends-->
                            </div>
                        </div><!--row-->
                        <label class="pt"><b>Success<span class="mandat">*</span></b><!-- <a href="#" data-toggle="tooltip" data-placement="bottom" class="tip" title="Please consider the purpose of CNB along with the below definition Purpose of CNB 1: Sole/Primary anaesthetic 2: Analgesic purpose only.Success is defined as successful puncture and injection of Local anaesthetics in the desired neuraxial space along with development of block characteristics of sensory and/or motor blockade."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                                    <input type="radio" class="form-check-input" id="com" value="Complete Success" name="optradio2" onclick="complete()">Compelete Success<!-- <a href="#" class="tip" data-toggle="tooltip"  title="Complete Success: With the above condition being met, the purpose of CNB should be met adequately without any significant requirements of intravenous or inhalational anaesthetics, hypnotics and analgesics to perform the surgery.Use of the above agents in minimal amounts to provide patient comfort for incidental discomfort is acceptable.If used as analgesic purpose only, the cumulative intra-operative and postoperative opioids requirements should be nil or very minimal."><i class="fa fa-info-circle" aria-hidden="true"></i></a> -->
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
                                                <h6>Partial Succes: With the above block success definition being satisfied, the purpose of CNB is being met with some additional intravenous analgesics / inhalationals including but not restricted to LA infiltration, opioids, ketamine, hypnotics.If used as analgesic purpose only, the cumulative intra-operative and postoperative pain and opioids requirements are moderate.</h6>
                                                <i></i>
                                            </div>
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                <ul class="success-list">
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
                                    <div class= "box_1">
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
                                <button type="button" class="btn-close">Reset</button>
                            </div>
                        </div><!--row-->
                    </form>	
                </div><!--modal-body-->
            </div>
        </div>
    </div>
</section><!--edit-spinal-page-->
<script type="text/javascript">
    $(document).ready(function(){
    var j=1;
    var k=1;
    var l=1;
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".opioid").append('<div class="row2"><div class="row" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" style="display:flex;"><input type="text" class="form-control" name="opioid_name[]"><button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left:3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="opioid_dose[]"></div></div></div>');
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
		    $(".opioids").append('<div class="row4"><div class="row" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Name</span></div><div class="col-sm-7" id="proced-plus" style="display: flex;"><input type="text" class="form-control" name="asr_opioid_name[]" ><button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div><div class="row pt" style="margin-left: 3%;"><div class="col-sm-5"><span>Opioid Dose(microgram equivalent)</span></div><div class="col-sm-7"><input type="text" class="form-control" name="asr_opioid_dose[]"></div></div></div>');
        }
    });
    $(document).on('click','.remove2',function(){
        j--;
        $(this).closest('.row2').remove();
    });
    $(document).on('click','.remove22',function(){
        $(this).closest('.row11').remove();
    });
    $(document).on('click','.remove3',function(){
        k--;
        $(this).closest('.row3').remove();
    });
    $(document).on('click','.remove33',function(){
        $(this).closest('.row21').remove();
    });
    $(document).on('click','.remove4',function(){
        l--;
        $(this).closest('.row4').remove();
    });
    $(document).on('click','.remove44',function(){
        $(this).closest('.row22').remove();
    });
});
$(document).ready(function(){
    $('.needle').hide();
    $('.type').hide();
    $(".spinal").hide();
    $('.adjuvant').hide();
    $('.opioid').hide();
    $('.other1').hide();
    $('.plus2').hide();
    $('.plus3').hide();
    $('.plus4').hide();
    $('.technical').hide();
    $('.acute').hide();
    var vc = "<?php echo $info['needle_brand']; ?>";
    var qq = "<?php echo $info['other4']; ?>";
    $('#need').val(vc);
    if(vc == 'Other'){
        $('.needle').show();
        $('#Other1').val(qq);   
    }
    var wa = "<?php echo $info['needle_type']; ?>";
    var xq = "<?php echo $info['other6']; ?>";
    $('#ty').val(wa);
    if(wa == 'Other'){
        $('.type').show();
        $('#other6').val(xq);   
    }
    var ccc = "<?php echo $info['la_lignocaine']; ?>";
    var qqq = "<?php echo $info['la_bupivacaine']; ?>";
    var vcs = "<?php echo $info['la_ropivacaine']; ?>";
    var qrq = "<?php echo $info['la_prilocaine']; ?>";
    var mm = "<?php echo $info['la_2-chloroprocaine	']; ?>";
    var mu = "<?php echo $info['la_otheraine']; ?>";
    if((ccc)||(qqq)||(vcs)||(qrq)||(mm)||(mu)){
        $('#spin').attr("checked",true);
        $('.spinal').show();
    }
    var eee = "<?php echo $info['opioid_name']; ?>";
    var uuu = "<?php echo $info['clonidina_dose']; ?>";
    var vvv = "<?php echo $info['dexmeditomidine_dose']; ?>";
    var sqq = "<?php echo $info['dexamephasone_dose']; ?>";
    var mmm = "<?php echo $info['tramadol_dose']; ?>";
    var mur = "<?php echo $info['adrenaline_dose']; ?>";
    var qtq = "<?php echo $info['other7']; ?>";
    if((eee)||(uuu)||(vvv)||(sqq)||(mmm)||(mur)||(qtq)){
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
        $('#multi').attr("checked",true);
        $('.multianal').show();
    }
    var kz = "<?php echo $info['asr_other_iv_name']; ?>";
    if(kz){
        $('#adjunc').attr("checked",true);
        $('.adjuncts').show();
    }
    var gc = "<?php echo $info['tc_equipment']; ?>";
    var gq = "<?php echo $info['tc_multiple']; ?>";
    var gs = "<?php echo $info['tc_2_anaestsetist']; ?>";
    var gr = "<?php echo $info['tc_abondoned']; ?>";
    var gm = "<?php echo $info['tc_catheter']; ?>";
    var gu = "<?php echo $info['tc_other']; ?>";
    if((gc == "Yes")||(gq == "Yes")||(gs == "Yes")||(gr == "Yes")||(gm == "Yes")||(gu == "Yes")){
        $('#tech').attr("checked",true);
        $('.technical').show();
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
    var xb = "<?php echo $info['ac_re_arrest']; ?>";
    var xd = "<?php echo $info['ac_ca_arrest']; ?>";
    var xe = "<?php echo $info['ac_radi_pain']; ?>";
    var xf = "<?php echo $info['ac_parestsesia']; ?>";
    var xg = "<?php echo $info['ac_bloody_tap']; ?>";
    var xj = "<?php echo $info['ac_hypoten']; ?>";
    var xk = "<?php echo $info['ac_nausea']; ?>";
    var xl = "<?php echo $info['ac_vomit']; ?>";
    var xm = "<?php echo $info['ac_high_block']; ?>";
    var xn = "<?php echo $info['ac_sb_block']; ?>";
    var xp = "<?php echo $info['ac_totla_spinal']; ?>";
    var xr = "<?php echo $info['ac_other']; ?>";
    if((xb == "Yes")||(xd == "Yes")||(xe == "Yes")||(xf == "Yes")
    ||(xg == "Yes")||(xj == "Yes")||(xk == "Yes")||(xl == "Yes")
    ||(xm == "Yes")||(xn == "Yes")||(xp == "Yes")||(xr == "Yes")){
        $('#acu').attr("checked",true);
        $('.acute').show();
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
    if(xp == "Yes"){
        $('#ac_total_spinal').attr("checked",true);
    }
    if(xr == "Yes"){
        $('#ac_other').attr("checked",true);
        $("#ot1").attr("readonly", false);
    }
});
$('#edi_spi').click(function(){
    $("#edit-spinal-page").modal("show");
});
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
    if(firstChar == 'T'){
        $('#spin_type').val('Thoracic');
    }
    if(firstChar == 'L'){
        $('#spin_type').val('Lumbar');
    }
});
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
var ww = "<?php echo $info['patient_position']; ?>";
$('#patient_pos').val(ww);
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
var xx = "<?php echo $info['anatomical_landmark']; ?>";
$('#skin_prep').val(aa);
$('#anatomical_landmark').val(xx);
var bb = "<?php echo $info['spinal_level']; ?>";
var cj = "<?php echo $info['spinal_level_name']; ?>";
$('#epidu').val(bb);
$('#spin_type').val(cj);
$('.'+bb+'').css("background", "red").css("color", "white");
var wq = "<?php echo $info['needle_size']; ?>";
$('#size').val(wq);
var an = "<?php echo $info['approach']; ?>";
$('#approach').val(an);
function attempts(){
    var att = $('#no_attempts').val();
    if(att>20){
        $('.attempts').show();
        toastr.error('please do not enter value more than 20');
    }
    else
        $('.attempts').hide();
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
var ligno = "<?php echo $info['la_lignocaine']; ?>";
var ligno_split = ligno.split(',');  
$('#lignocaine').val(ligno_split[0]);
$('#ligno_per').val(ligno_split[1]);
$('#ligno_ml').val(ligno_split[2]);
$('#ligno_mg').val(ligno_split[3]);

var bupi = "<?php echo $info['la_bupivacaine']; ?>";
var bupi_split = bupi.split(',');  
$('#bupivacaine').val(bupi_split[0]);
$('#bupi_per').val(bupi_split[1]);
$('#bupi_ml').val(bupi_split[2]);
$('#bupi_mg').val(bupi_split[3]);

var ropi = "<?php echo $info['la_ropivacaine']; ?>";
var ropi_split = ropi.split(',');  
$('#ropivacaine').val(ropi_split[0]);
$('#ropi_per').val(ropi_split[1]);
$('#ropi_ml').val(ropi_split[2]);
$('#ropi_mg').val(ropi_split[3]);  

var pril = "<?php echo $info['la_prilocaine']; ?>";
var pril_split = pril.split(',');  
$('#prilocaine').val(pril_split[0]);
$('#pril_per').val(pril_split[1]);
$('#pril_ml').val(pril_split[2]);
$('#pril_mg').val(pril_split[3]);  

var chloro = "<?php echo $info['la_2-chloroprocaine']; ?>";
var chloro_split = chloro.split(',');  
$('#chloroprocaine').val(chloro_split[0]);
$('#chloro_per').val(chloro_split[1]);
$('#chloro_ml').val(chloro_split[2]);
$('#chloro_mg').val(chloro_split[3]);  

var otherai = "<?php echo $info['la_otheraine']; ?>";
var othera_split = otherai.split(',');  
$('#otheraine').val(othera_split[0]);
$('#oth_per').val(othera_split[1]);
$('#oth_ml').val(othera_split[2]);
$('#oth_mg').val(othera_split[3]);  

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
function other1(){
    var oth1 = $('#oth1').is(':checked');
    if(!oth1){
        $('.other1').hide();
    }
    else{
        $(".other1").show();
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
function other3(){
    var ot = $('#ac_other').is(':checked');
    if(!ot){
        $("#ot1").attr("readonly", true);
    }
    else{
        $('#ot1').removeAttr("readonly");
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
var adren = "<?php echo $info['adrenaline_dose']; ?>";
if(adren){
    $('#adre').attr("checked",true);
    $('#adre1').removeAttr("readonly");
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
$('#edit-spinal').submit(function(e){
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
        $(".update").text("Updating...");
        $(".update").attr("disabled", true);
        $.ajax({
            type : "POST",
            url : '<?php  echo base_url("SpinalDetails/edit_spinal")?>',
            data : formData,
            contentType: false,
            processData: false,
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);
                    $("#edit-spinal-page").modal("hide");
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
</script>
<?php
    echo view('includes/footer');    
?>