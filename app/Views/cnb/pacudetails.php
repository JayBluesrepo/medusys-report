<?php
    echo view('includes/header',$patient, $post, $postcheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

 <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script>

<section class="pacu-details">
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <button type="button" class="btn-edit" data-toggle="modal" id="edi_pac"  style="margin:5px;">Edit</button>
          <!--   <button type="button" class="btn-close">Delete Patient</button> -->
        </div>
    </div>
    <h4><b>Pain Score</b></h4>
    <h6>Pain Score(0-10)(0:Min,10:Max)</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Arrival</td>
                        <td><?php echo $info['ps_postproc']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">30 Min</td>
                        <td><?php echo $info['ps_30mins']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">One Hour</td>
                        <td><?php echo $info['ps_1hr']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h6 class="pt">Nausea & Vomiting Score(0-3)</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Arrival</td>
                        <td><?php echo $info['nvs_postproc']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">30 Min</td>
                        <td><?php echo $info['nvs_30mins']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">One Hour</td>
                        <td><?php echo $info['nvs_1hr']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h6 class="pt">Sedation Score (1-3)</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Arrival</td>
                        <td><?php echo $info['ss_postproc']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">30 Min</td>
                        <td><?php echo $info['ss_30mins']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">One Hour</td>
                        <td><?php echo $info['ss_1hr']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h6 class="pt">Time spent in Recovery</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Time spent in Recovery</td>
                        <td><?php echo $info['time_spent']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h4 class='mt-4'><b>Post-Op Care Unit / Recovery</b></h4>
    <h6 class="pt">Analgesia Supplement in Recovery</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    
                    <?php
                        $intras = $info['intravenous_opioids'];
                        if($intras == 'Yes'){
                            $intra_name = $info['intra_name_dose'];
                            $intra_name_dose = json_decode($intra_name, true);
                            foreach($intra_name_dose as $key=>$val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Intravenous Opiodis</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2"><b>Intravenous Opiodis</b></td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                   
                    <?php
                        $orals = $info['oral_opioids'];
                        if($orals == 'Yes'){
                            $oral_name = $info['oral_name_dose'];
                            $oral_name_dose = json_decode($oral_name, true);
                            foreach($oral_name_dose as $key=>$val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Oral Opiodis</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Oral Opiodis</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    
                    <?php
                        $trama = $info['tramadol'];
                        if($trama == 'Yes'){
                            $tram_name = $info['tram_name_dose'];
                            $tram_name_dose = json_decode($tram_name, true);
                            foreach($tram_name_dose as $key=>$val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Tramadol</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Tramadol</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    
                    <?php
                        $nsaid = $info['nsaid'];
                        if($nsaid == 'Yes'){
                            $nsa_name = $info['nsa_name_dose'];
                            $nsa_name_dose = json_decode($nsa_name, true);
                            foreach($nsa_name_dose as $key=>$val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">NSAID</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">NSAID</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    
                    <?php
                        $paracetamol = $info['paracetamol'];
                        if($paracetamol == 'Yes'){
                            $para_name = $info['para_name_dose'];
                            $para_name_dose = json_decode($para_name, true);
                            foreach($para_name_dose as $key=>$val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Paracetemol</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Paracetemol</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    
                    <?php
                        $other = $info['other'];
                        if($other == 'Yes'){
                            $other_name = $info['other_name_dose'];
                            $other_name_dose = json_decode($other_name, true);
                            foreach($other_name_dose as $key=>$val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Other</td>
                            <td>Yes</td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Name</td>
                            <td style="border:0;"><?php echo $val['name']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2" style="border:0;">Dose(mg)</td>
                            <td style="border:0;"><?php echo $val['dose']; ?></td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Other</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h6 class="pt">LA Regimen</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">LA Regimen</td>
                        <td><?php echo $info['la_regimen_select']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <?php if($info['la_regimen'] == 'Yes'){ ?>

        <h5 class="pt"><b>Total PACU (Recovery) LA & Adjuvant Consumption</b></h5>
        <h6 class="pt"><b>LA Regimen</b></h6>
        <div class="pac-table">
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
        </div><!--pac-table-->
        <div class="repeat">
            <h6 class="pt"><b>Repeat Block</b></h6>
            <div class="pac-table">
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
                            <tr>
                                <?php 
                                    $u = $info['la_repeat_ropi'];
                                    $ee = explode(",",$u);
                                ?>
                                <td>Ropivacaine - <?php echo $ee[0]; ?></td>
                                <td><?php echo $ee[1]; ?></td>
                                <td><?php echo $ee[2]; ?></td>
                                <td><?php echo $ee[3]; ?></td>
                            </tr>
                            <tr>
                                <?php 
                                    $v = $info['la_repeat_bupi'];
                                    $ff = explode(",",$v);
                                ?>
                                <td>Ropivacaine - <?php echo $ff[0]; ?></td>
                                <td><?php echo $ff[1]; ?></td>
                                <td><?php echo $ff[2]; ?></td>
                                <td><?php echo $ff[3]; ?></td>
                            </tr>
                            <tr>
                                <?php 
                                    $r = $info['la_repeat_levo'];
                                    $gg = explode(",",$r);
                                ?>
                                <td>Ropivacaine - <?php echo $gg[0]; ?></td>
                                <td><?php echo $gg[1]; ?></td>
                                <td><?php echo $gg[2]; ?></td>
                                <td><?php echo $gg[3]; ?></td>
                            </tr>
                            <tr>
                                <?php 
                                    $s = $info['la_repeat_ligno'];
                                    $hh = explode(",",$s);
                                ?>
                                <td>Ropivacaine - <?php echo $hh[0]; ?></td>
                                <td><?php echo $hh[1]; ?></td>
                                <td><?php echo $hh[2]; ?></td>
                                <td><?php echo $hh[3]; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div><!--pac-table-->
        </div><!--repeat ends-->

    <?php }else{ ?>
        
    <?php } ?>
    
    <h6 class="pt"><b>Vasopressor Use in Recovery</b></h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Vasopressor Use in Recovery</td>
                        <td><?php echo $info['vasopressor_use_in_recovery']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
</section>
<!---------------------------EDIT-PACU-START------------------------>
<section class="edit-pacu">
    <!-- The Modal -->
    <div class="modal fade" id="pacu-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" id="add-header">
                    <h4 class="modal-title">Edit Post-Op Care Unit/Recovery</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit-postop">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" required>
                        <h5><b>Pain Score (0-10) (0:Min,10:Max)</b></h5>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>Arrival</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="ps_postproc" name="ps_postproc">
                                    <option value=''>Select pain score on arrival</option>
                                    <option>0</option>
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
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>30 Min</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="ps_30mins" name="ps_30mins">
                                    <option value=''>Select pain score in 30 min</option>
                                    <option>0</option>
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
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>One Hour</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="ps_1hr" name="ps_1hr">
                                    <option value=''>Select pain score in one hour</option>
                                    <option>0</option>
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
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <h5><b>Nausea & Vomiting Score (0-3)</b></h5>
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>Arrival</span>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="nvs_postproc" name="nvs_postproc">
                                    <option value=''>Select score at arrival</option>
                                    <option>0-No Nausea</option>
                                    <option>1-Mild Nausea not requiring treatment</option>
                                    <option>2-Vomiting</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>30 Min</span>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="nvs_30mins" name="nvs_30mins">
                                    <option value=''>Select score at 30 min</option>
                                    <option>0-No Nausea</option>
                                    <option>1-Mild Nausea not requiring treatment</option>
                                    <option>2-Vomiting</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>One Hour</span>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="nvs_1hr" name="nvs_1hr">
                                    <option value=''>Select score at 1 hour</option>
                                    <option>0-No Nausea</option>
                                    <option>1-Mild Nausea not requiring treatment</option>
                                    <option>2-Vomiting</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-2"></div>
                        </div><!--row-->
                        <h5><b>Sedation Score (1-3)</b></h5>
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>Arrival</span>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" name="ss_postproc" id="ss_postproc">
                                    <option value=''>Select sedation score on arrival</option>
                                    <option>0-Awake</option>
                                    <option>1-Mild, easy to rouse</option>
                                    <option>2-Moderate, easy to rouse, unable to remain</option>
                                    <option>3-Difficult to rouse</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-1"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>30 Min</span>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" name="ss_30mins" id="ss_30mins">
                                    <option value=''>Select sedation score in 30 min</option>
                                    <option>0-Awake</option>
                                    <option>1-Mild, easy to rouse</option>
                                    <option>2-Moderate, easy to rouse, unable to remain</option>
                                    <option>3-Difficult to rouse</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-1"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>One Hour</span>
                            </div>
                            <div class="col-sm-7">
                                <select class="form-control" name="ss_1hr" id="ss_1hr">
                                    <option value=''>Select sedation score in 30 min</option>
                                    <option>0-Awake</option>
                                    <option>1-Mild, easy to rouse</option>
                                    <option>2-Moderate, easy to rouse, unable to remain</option>
                                    <option>3-Difficult to rouse</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-1"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:15px;">
                            <div class="col-sm-4"><label>Time Spent in Recovery (mins)</label></div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="time_spent" value="<?php echo $info['time_spent']; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                        </div><!--row-->
                        <h5><b>Analgesia Supplement in Recovery</b>
                         <div class="tooltip-23">
                           <i class="fa fa-info-circle" aria-hidden="true"></i>
                            <div class="right-23">
                                <div class="text-content-23">
                                    <h6>All options need to be unchecked <br> to make selection No.</h6>
                                    <i></i>
                                </div>
                            </div>
                        </div>     
                        </h5>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-6">
                                <div class= "box_1">
                                    <input type="checkbox" class="switch_1" id="reco" onclick="recov()">
                                </div>
                            </div>
                        </div>
                        <div class="analgesia">
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="form-check" id="id">
                                        <label class="form-check-label">
                                            <input type="hidden" class="form-check-input" value="No" name="intra_op">
                                            <input type="checkbox" class="form-check-input" id="opi" value="Yes" name="intra_op" onclick="intra()">Intravenous Opioids
                                            <!-- <div class="tooltip-10">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-10">
                                                    <div class="text-content-10">
                                                        <h6>Intravenous Opioids includes but not restricted to Fenatanyl,morphine,oxycodone,pethidina,Pentazocina,<br>bupranorphina,butorphenol,nalbuphine,hydromorphine,<br>hydrocodone,tapentadol.All dosages must be entered in milligram equvivalent only.</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="tooltip-10" id="pacu-intra1">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-10" id="pacu-intra" style="min-width:421px;">
                                                    <div class="text-content-10" id="pacu-i">
                                                        <h6>Intravenous Opioids includes but not restricted to Fenatanyl&nbsp;,&nbsp;morphine&nbsp;,&nbsp;oxycodone&nbsp;,&nbsp;pethidina&nbsp;,&nbsp;Pentazocina&nbsp;,<br>bupranorphina&nbsp;,&nbsp;butorphenol&nbsp;,&nbsp;nalbuphine&nbsp;,&nbsp;hydromorphine&nbsp;,<br>hydrocodone&nbsp;,tapentadol.<br><br>All dosages must be entered in milligram equvivalent only.</h6><i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                        <button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="intra">
                                        <?php 
                                            $zk = $info['intra_name_dose'];
                                            $intra_name_dose = json_decode($zk, true);                                     
                                            foreach($intra_name_dose as $key=>$val){
                                        ?>      <div class="row11">    
                                                    <div class="row" style="padding-top:15px;">
                                                        <div class="col-sm-12" id="id">
                                                            <label>Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="text" class="form-control remove_supplement1" name="intra_name[]"  value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label>Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control remove_supplement1" name="intra_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
                                                            <button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--intra ends-->
                                    <div class="form-check" id="id">
                                        <label class="form-check-label">
                                            <input type="hidden" class="form-check-input" value="No" name="oral_op">
                                            <input type="checkbox" class="form-check-input" id="ora" value="Yes" name="oral_op" onclick="oral()">Oral Opiodis
                                            <div class="tooltip-11">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-11">
                                                    <div class="text-content-11">
                                                        <h6>Oral Opiodis includes but not restricted to codine&nbsp;,&nbsp;morphine&nbsp;,&nbsp;oxycodone&nbsp;,&nbsp;hydromorphine,<br>hydrocodone&nbsp;,&nbsp;tapentadol.<br><br>All dosages must be entered in milligram equvivalent only.</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                    
                                        <button type="button" class="btn add2"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="oral">
                                        <?php 
                                            $zs = $info['oral_name_dose'];
                                            $oral_name_dose = json_decode($zs, true);                                     
                                            foreach($oral_name_dose as $key=>$val){
                                        ?>      <div class="row12">
                                                    <div class="row" style="padding-top:15px;">
                                                        <div class="col-sm-12" id="id">
                                                            <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="text" class="form-control remove_supplement2" name="oral_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control remove_supplement2" name="oral_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
                                                            <button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--oral ends-->
                                    <div class="form-check" id="id">
                                        <label class="form-check-label">
                                            <input type="hidden" class="form-check-input" value="No" name="tram">
                                            <input type="checkbox" class="form-check-input" id="tra" value="Yes" name="tram" onclick="tramadol()">Tramadol
                                            <div class="tooltip-12">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-12">
                                                    <div class="text-content-12">
                                                        <h6>All dosages must be entered in milligram equvivalent only</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                                        <button type="button" class="btn add3"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="tramadol">
                                        <?php 
                                            $zw = $info['tram_name_dose'];
                                            $tram_name_dose = json_decode($zw, true);                                     
                                            foreach($tram_name_dose as $key=>$val){
                                        ?>      <div class="row13">
                                                    <div class="row" style="padding-top:15px;">
                                                        <div class="col-sm-12" id="id">
                                                            <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="text" class="form-control remove_supplement3" name="tram_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control remove_supplement3" name="tram_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
                                                            <button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--tramadol ends-->
                                    <div class="form-check" id="id">
                                        <label class="form-check-label">
                                            <input type="hidden" class="form-check-input" value="No" name="nsaid">
                                            <input type="checkbox" class="form-check-input" id="nid" value="Yes" name="nsaid" onclick="nsa()">NSAID
                                            <div class="tooltip-12">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-12">
                                                    <div class="text-content-12">
                                                        <h6>All dosages must be entered in milligram equvivalent only</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                            
                                        <button type="button" class="btn add4"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="nsa">
                                        <?php 
                                            $za = $info['nsa_name_dose'];
                                            $nsa_name_dose = json_decode($za, true);                                     
                                            foreach($nsa_name_dose as $key=>$val){
                                        ?>      <div class="row21">
                                                    <div class="row" style="padding-top:15px;">
                                                        <div class="col-sm-12" id="id">
                                                            <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="text" class="form-control remove_supplement4" name="nsa_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control remove_supplement4" name="nsa_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
                                                            <button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--nsa ends-->
                                    <div class="form-check" id="id">
                                        <label class="form-check-label">
                                            <input type="hidden" class="form-check-input" value="No" name="paracetemol">
                                            <input type="checkbox" class="form-check-input" id="temo" value="Yes" name="paracetemol" onclick="para()">Paracetemol
                                            <div class="tooltip-12">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-12">
                                                    <div class="text-content-12">
                                                        <h6>All dosages must be entered in milligram equvivalent only</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </label>
                         
                                        <button type="button" class="btn add5"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                    <div class="para">
                                        <?php 
                                            $zt = $info['para_name_dose'];
                                            $para_name_dose = json_decode($zt, true);                                     
                                            foreach($para_name_dose as $key=>$val){
                                        ?>      <div class="row22">
                                                    <div class="row" style="padding-top:15px;">
                                                        <div class="col-sm-12" id="id">
                                                            <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="text" class="form-control remove_supplement5" name="para_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control remove_supplement5" name="para_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
                                                            <button type="button" class="btn remove5"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--para ends-->
                                    <div class="form-check" id="id">
                                        <label class="form-check-label">
                                            <input type="hidden" class="form-check-input" value="No" name="la_regi">
                                            <input type="checkbox" class="form-check-input" id="reg" value="Yes" name="la_regi" onclick="regi()">LA Regimen
                                        </label>
                                    </div>
                                </div><!--col-10-->
                            </div><!--row-->
                            <div class="regi">
                                <div class="row pt">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="dro" name="la_regimen_select" onclick="drop()">
                                            <option value=''>Select</option>
                                            <option>Intermittent Bolus</option>
                                            <option>LA Infusion</option>
                                            <option>PCEA</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-6"></div>
                                </div>
                            </div>
                            <div class="drop">
                                <h5 class="pt"><b>Total PACU (Reovery) LA & Adjuvant Consumption </b>
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
                                <h6 style="margin-bottom:15px;margin-top: 15px;"><b>LA Regimen </b>
                                 <div class="tooltip-14">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-14">
                                        <div class="text-content-14">
                                            <h6 style="text-align:left!important;">Local &nbsp; Anasthetic solution (%) & volume(ml)-Ropivacaine&nbsp;,&nbsp;Bupivacaine,&nbsp;Levobupivacaine&nbsp;,&nbsp;<br>Lignocaine plain&nbsp;,&nbsp;Lignocaine with or without adrenaline.</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>   
                                </h6>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <h6><b>Local Anaesthetic</b></h6>
                                        <div class="pac-box">
                                            <div class="pacu-1"><p>Ropivacaine</p></div>
                                            <div class="pacu-1-x">
                                                <select class="form-control" name="ropivacaine" id="ropivacaine">
                                                    <option value=''>Select</option>
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
                                                <select class="form-control" name="bupivacaine" id="bupivacaine">
                                                    <option value=''>Select</option>
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
                                                <small  style="color:red;text-align:center;">should be from 0 to 4</small>
                                            </div>
                                            <div class="pacu-1"></div>
                                            <div class="pacu-1"></div>														
                                        </div>
                                        <div class="pac-box">
                                            <div class="pacu-1"><p>Levobupivacaine</p></div>
                                            <div class="pacu-1-x">
                                                <select class="form-control" name="levobupivacaine" id="levobupivacaine">
                                                    <option value=''>Select</option>
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
                                                <input type="text" class="form-control" name="levo_mg" id="levo_mg" readonly><span style="padding-top:5px;">mg</span>
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
                                            <div class="pacu-1"><p>Lignocaine</p></div>
                                            <div class="pacu-1-x">
                                                <select class="form-control" name="Lignocaine" id="Lignocaine">
                                                    <option value=''>Select</option>
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
                                                <small  style="color:red;text-align:center;">should be from 0 to 4</small>
                                            </div>
                                            <div class="pacu-1"></div>
                                            <div class="pacu-1"></div>														
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="hidden" class="form-check-input" value="No" name="la_repeat">
                                                <input type="checkbox" class="form-check-input" id="rep" value="Yes" name="la_repeat" onclick="repeats()">Repeat Block
                                                <div class="tooltip-14">
                                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <div class="right-14">
                                                        <div class="text-content-14">
                                                            <h6 style="text-align:left!important;">Local &nbsp; Anasthetic solution (%) & volume(ml)-Ropivacaine&nbsp;,&nbsp;Bupivacaine,&nbsp;Levobupivacaine&nbsp;,&nbsp;<br>Lignocaine plain&nbsp;,&nbsp;Lignocaine with or without adrenaline.</h6>
                                                            <i></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div><!--row-->
                                <div class="repeats" style="padding-top:15px;">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Ropivacaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_ropi" id="repeat_ropi">
                                                        <option value=''>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repropi_per" id="repropi_per" onkeyup="persentage('alert5')" readonly><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repropi_ml" id="repropi_ml" readonly><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="repropi_mg" id="repropi_mg" readonly><span style="padding-top:5px;">mg</span>
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
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Bupivacaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_bupi" id="repeat_bupi">
                                                        <option value=''>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repbupi_per" id="repbupi_per" onkeyup="persentage('alert6')" readonly><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repbupi_ml" id="repbupi_ml" readonly><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="repbupi_mg" id="repbupi_mg" readonly><span style="padding-top:5px;">mg</span>
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
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Levobupivacaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_levo" id="repeat_levo">
                                                        <option value=''>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="replevo_per" id="replevo_per" onkeyup="persentage('alert7')" readonly><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="replevo_ml" id="replevo_ml" readonly><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="replevo_mg" id="replevo_mg" readonly><span style="padding-top:5px;">mg</span>
                                                </div>
                                                <i onclick="clean7()" class="fa fa-times" id="clear7" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
                                            </div><!--pac-box-->
                                            <div class="pac-box" id="persentage_tage6" style="padding:0; display:none;">
                                                <div class="pacu-1"></div>
                                                <div class="pacu-1-x"></div>
                                                <div class="pacu-1">
                                                    <small  style="color:red;text-align:center;">should be from 0 to 4</small>
                                                </div>
                                                <div class="pacu-1"></div>
                                                <div class="pacu-1"></div>														
                                            </div>
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Lignocaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_ligno" id="repeat_ligno">
                                                        <option value=''>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repligno_per" id="repligno_per" onkeyup="persentage('alert8')" readonly><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repligno_ml" id="repligno_ml" readonly><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="repligno_mg" id="repligno_mg" readonly><span style="padding-top:5px;">mg</span>
                                                </div>
                                                <i onclick="clean8()" class="fa fa-times" id="clear8" title="clear" aria-hidden="true" style="margin-top: 10px;  color:#1974A7;cursor: pointer;"></i>
                                            </div><!--pac-box-->
                                            <div class="pac-box" id="persentage_tage7" style="padding:0; display:none;">
                                                <div class="pacu-1"></div>
                                                <div class="pacu-1-x"></div>
                                                <div class="pacu-1">
                                                    <small  style="color:red;text-align:center;">should be from 0 to 4</small>
                                                </div>
                                                <div class="pacu-1"></div>
                                                <div class="pacu-1"></div>														
                                            </div>
                                        </div>
                                    </div><!--row-->
                                </div><!--repeat ends-->
                            </div><!--drop ends-->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <label class="form-check-label" id="id">
                                            <input type="hidden" class="form-check-input" value="No" name="othered">
                                            <input type="checkbox" class="form-check-input" id="oth" value="Yes" name="othered" onclick="other()">Other
                                            <div class="tooltip-15">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-15">
                                                    <div class="text-content-15">
                                                        <h6>All dosages must be entered in milligram equvivalent only</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn add6"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                        </label>
                                    </div>
                                    <div class="other">
                                        <?php 
                                            $zj = $info['other_name_dose'];
                                            $other_name_dose = json_decode($zj, true);                                     
                                            foreach($other_name_dose as $key=>$val){
                                        ?>      <div class="row23">
                                                    <div class="row" style="padding-top:15px;">
                                                        <div class="col-sm-12" id="id">
                                                            <label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="text" class="form-control remove_supplement6" name="other_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control remove_supplement6" name="other_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
                                                            <button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            } 
                                        ?>
                                    </div><!--other ends-->
                                </div>
                            </div><!--row-->
                        </div><!--analgesia ends-->
                        <h6 class="pt-4"><b>Vasopressor Use in Recovery</b></h6>
                        <div class="row pt-2">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <div class= "box_1">
                                    <input type="hidden" class="switch_1" value="No" name="vasopressor">
                                    <input type="checkbox" class="switch_1" value="Yes" id="vasopressor" name="vasopressor">
                                </div>
                            </div>
                            <div class="col-sm-8"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5 pt">
                                <button type="submit" class="btn-save update">Update</button>
                                <button type="button" class="btn-close" id="clos">Close</button>
                            </div>
                        </div><!--row-->			
                    </form>
                </div><!--modal-body-->
            </div><!--modal-content-->
        </div>
    </div>
</section><!--edit-pacu-->
<!--------------------------EDIT-PACU-END--------------------------->
<script type="text/javascript">
$(document).ready(function(){
    var i=1;
    var j=1;
    var k=1;
    var l=1;
    var m=1;
    var n=1;
	$(".add1").click(function(){
        if(i<3){
            // alert(i);
            i++;
		    $(".intra").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control remove_supplement1" name="intra_name[]">&nbsp&nbsp<label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" class="form-control remove_supplement1" name="intra_dose[]">&nbsp&nbsp<button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".oral").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control remove_supplement2" name="oral_name[]">&nbsp&nbsp<label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" class="form-control remove_supplement2" name="oral_dose[]">&nbsp&nbsp<button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".tramadol").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control remove_supplement3" name="tram_name[]">&nbsp&nbsp<label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" class="form-control remove_supplement3" name="tram_dose[]">&nbsp&nbsp<button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add4").click(function(){
        if(l<3){
            l++;
		    $(".nsa").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control remove_supplement4" name="nsa_name[]">&nbsp&nbsp<label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" class="form-control remove_supplement4" name="nsa_dose[]">&nbsp&nbsp<button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add5").click(function(){
        if(m<3){
            m++;
		    $(".para").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control remove_supplement5" name="para_name[]">&nbsp&nbsp<label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" class="form-control remove_supplement5" name="para_dose[]">&nbsp&nbsp<button type="button" class="btn remove5"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add6").click(function(){
        if(n<3){
            n++;
		    $(".other").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="text" class="form-control remove_supplement6" name="other_name[]">&nbsp&nbsp<label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="number" class="form-control remove_supplement6" name="other_dose[]">&nbsp&nbsp<button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });

    $(document).on('click','.remove1',function(){
        i--;
        // alert(i);
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove2',function(){
        j--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove3',function(){
        k--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove4',function(){
        l--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove5',function(){
        m--;
        $(this).closest('.row').remove();
    });
    $(document).on('click','.remove6',function(){
        n--;
        $(this).closest('.row').remove();
    });
});	 
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('.analgesia').hide();
    $('.intra').hide();
    $('.oral').hide();
    $('.tramadol').hide();
    $('.nsa').hide();
    $('.para').hide();
    $('.regi').hide();
    $('.drop').hide();
    $('.repeat').hide();
    $('.other').hide();
    $('.repeats').hide();
    $('.add1').hide();
    $('.add2').hide();
    $('.add3').hide();
    $('.add4').hide();
    $('.add5').hide();
    $('.add6').hide();
    var cc = "<?php echo $info['repeat']; ?>";
    if(cc=="Yes"){
        $('.repeat').show();
    }
    var gc = "<?php echo $info['intravenous_opioids']; ?>";
    var gq = "<?php echo $info['oral_opioids']; ?>";
    var gs = "<?php echo $info['tramadol']; ?>";
    var gr = "<?php echo $info['nsaid']; ?>";
    var gm = "<?php echo $info['paracetamol']; ?>";
    var gu = "<?php echo $info['la_regimen']; ?>";
    var gk = "<?php echo $info['other']; ?>";
    if((gc == "Yes")||(gq == "Yes")||(gs == "Yes")||(gr == "Yes")||(gm == "Yes")||(gu == "Yes")||(gk == "Yes")){
        $('#reco').attr("checked",true);
        $('.analgesia').show();
    }
    if(gc=="Yes"){
        $('#opi').attr("checked",true);
        $('.intra').show();
        $('.add1').show();
    }
    if(gq=="Yes"){
        $('#ora').attr("checked",true);
        $('.oral').show();
        $('.add2').show();
    }
    if(gs=="Yes"){
        $('#tra').attr("checked",true);
        $('.tramadol').show();
        $('.add3').show();
    }
    if(gr=="Yes"){
        $('#nid').attr("checked",true);
        $('.nsa').show();
        $('.add4').show();
    }
    if(gm=="Yes"){
        $('#temo').attr("checked",true);
        $('.para').show();
        $('.add5').show();
    }
    if(gk=="Yes"){
        $('#oth').attr("checked",true);
        $('.other').show();
        $('.add6').show();
    }
    var cn = "<?php echo $info['la_regimen_select']; ?>";
    if(gu=="Yes"){
        $('#reg').attr("checked",true);
        $('.regi').show();
        $('#dro').val(cn);
        $('.drop').show();
        if(cc=="Yes"){
            $('#rep').attr("checked",true);
            $('.repeats').show();
        }
    }
});
$("#clos").click(function(){
    $("#pacu-edit").modal("hide");
});
function persentage(type){
    var limit = $('#ropi_per').val();
    var limit1 = $('#bupi_per').val();
    var limit2 = $('#levo_per').val();
    var limit3 = $('#ligno_per').val();
    var limit4 = $('#repropi_per').val();
    var limit5 = $('#repbupi_per').val();
    var limit6 = $('#replevo_per').val();
    var limit7 = $('#repligno_per').val();

    if(type == 'alert1'){
        if((limit >= 0 && limit <= 4) && limit != ''){			
            $('#persentage_tage').hide();
            $('#ropi_per').css('border-color','').css('background','');
        }else{	
            $('#ropi_per').val('');		
            $('#persentage_tage').show();
            toastr.error('should be from 0 to 4');
            // $('#ropi_per').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert2'){
        if((limit1 >= 0 && limit1 <= 4) && limit1 != ''){			
            $('#persentage_tage1').hide();
            $('#bupi_per').css('border-color','').css('background','');

        }else{	
            $('#bupi_per').val('');		
            $('#persentage_tage1').show();
            toastr.error('should be from 0 to 4');
            // $('#bupi_per').css('border-color','red').css('background','#FFCCCB');
        }
    }else if(type == 'alert3'){
        if((limit2 >= 0 && limit2 <= 4) && limit2 != ''){			
            $('#persentage_tage2').hide();
            $('#levo_per').css('border-color','').css('background','');
        }else{	
            $('#levo_per').val('');		
            $('#persentage_tage2').show();
            toastr.error('should be from 0 to 4');
            // $('#levo_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert4'){
        if((limit3 >= 0 && limit3 <= 4) && limit3 != ''){			
            $('#persentage_tage3').hide();
            $('#ligno_per').css('border-color','').css('background','');

        }else{			
            $('#ligno_per').val('');
            $('#persentage_tage3').show();
            toastr.error('should be from 0 to 4');
            // $('#ligno_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert5'){
        if((limit4 >= 0 && limit4 <= 4) && limit4 != ''){			
            $('#persentage_tage4').hide();
            $('#repropi_per').css('border-color','').css('background','');

        }else{
            $('#repropi_per').val('');			
            $('#persentage_tage4').show();
            toastr.error('should be from 0 to 4');
            // $('#repropi_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert6'){
        if((limit5 >= 0 && limit5 <= 4) && limit5 != ''){			
            $('#persentage_tage5').hide();
            $('#repbupi_per').css('border-color','').css('background','');

        }else{	
            $('#repbupi_per').val('');		
            $('#persentage_tage5').show();
            toastr.error('should be from 0 to 4');
            // $('#repbupi_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert7'){
        if((limit6 >= 0 && limit6 <= 4) && limit6 != ''){			
            $('#persentage_tage6').hide();
            $('#replevo_per').css('border-color','').css('background','');

        }else{	
            $('#replevo_per').val('');		
            $('#persentage_tage6').show();
            toastr.error('should be from 0 to 4');
            // $('#replevo_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }else if(type == 'alert8'){
        if((limit7 >= 0 && limit7 <= 4) && limit7 != ''){			
            $('#persentage_tage7').hide();
            $('#repligno_per').css('border-color','').css('background','');

        }else{	
            $('#repligno_per').val('');		
            $('#persentage_tage7').show();
            toastr.error('should be from 0 to 4');
            // $('#repligno_per').css('border-color','red').css('background','#FFCCCB');
        }	
    }			
}
var cc = "<?php echo $info['ps_postproc']; ?>";
var dd = "<?php echo $info['ps_30mins']; ?>";
var ee = "<?php echo $info['ps_1hr']; ?>";
var ff = "<?php echo $info['nvs_postproc']; ?>";
var gg = "<?php echo $info['nvs_30mins']; ?>";
var hh = "<?php echo $info['nvs_1hr']; ?>";
var ii = "<?php echo $info['ss_postproc']; ?>";
var jj = "<?php echo $info['ss_30mins']; ?>";
var kk = "<?php echo $info['ss_1hr']; ?>";
$('#ps_postproc').val(cc);
$('#ps_30mins').val(dd);
$('#ps_1hr').val(ee);
$('#nvs_postproc').val(ff);
$('#nvs_30mins').val(gg);
$('#nvs_1hr').val(hh);
$('#ss_postproc').val(ii);
$('#ss_30mins').val(jj);
$('#ss_1hr').val(kk);
var cs = "<?php echo $info['vasopressor_use_in_recovery']; ?>";
if(cs == "Yes"){
    $('#vasopressor').attr("checked",true);
}
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

var repeat_ropi = "<?php echo $info['la_repeat_ropi']; ?>";
var repeat_ropi_split = repeat_ropi.split(',');  
$('#repeat_ropi').val(repeat_ropi_split[0]);
$('#repropi_per').val(repeat_ropi_split[1]);
$('#repropi_ml').val(repeat_ropi_split[2]);
$('#repropi_mg').val(repeat_ropi_split[3]);  

var repeat_bupi = "<?php echo $info['la_repeat_bupi']; ?>";
var repeat_bupi_split = repeat_bupi.split(',');  
$('#repeat_bupi').val(repeat_bupi_split[0]);
$('#repbupi_per').val(repeat_bupi_split[1]);
$('#repbupi_ml').val(repeat_bupi_split[2]);
$('#repbupi_mg').val(repeat_bupi_split[3]);

var repeat_levo = "<?php echo $info['la_repeat_levo']; ?>";
var repeat_levo_split = repeat_levo.split(',');  
$('#repeat_levo').val(repeat_levo_split[0]);
$('#replevo_per').val(repeat_levo_split[1]);
$('#replevo_ml').val(repeat_levo_split[2]);
$('#replevo_mg').val(repeat_levo_split[3]);

var repeat_ligno = "<?php echo $info['la_repeat_ligno']; ?>";
var repeat_ligno_split = repeat_ligno.split(',');  
$('#repeat_ligno').val(repeat_ligno_split[0]);
$('#repligno_per').val(repeat_ligno_split[1]);
$('#repligno_ml').val(repeat_ligno_split[2]);
$('#repligno_mg').val(repeat_ligno_split[3]);

// function recov(){
//     var reco = $('#reco').is(':checked');
//     if(!reco){
//         $('.analgesia').hide();
//     }
//     else{
//         $(".analgesia").show();
//     }
// }

function recov(){

    var opi = $('#opi').is(':checked');
    var ora = $('#ora').is(':checked');
    var tra = $('#tra').is(':checked');
    var nid = $('#nid').is(':checked');
    var temo = $('#temo').is(':checked');
    var oth = $('#oth').is(':checked');

    if(opi == false && ora == false && tra == false && nid == false && temo == false && oth == false){

        var reco = $('#reco').is(':checked');

        
        if(!reco){
            $('.analgesia').hide();

            $('.remove_supplement').val('');
            $('.intra').hide();
            $("#opi").prop('checked', false); 
            $('.oral').hide();
            $("#ora").prop('checked', false); 
            $('.tramadol').hide();
            $("#tra").prop('checked', false); 
            $('.nsa').hide();
            $("#nid").prop('checked', false); 
            $('.para').hide();
            $("#temo").prop('checked', false); 
            $('.other').hide();
            $("#oth").prop('checked', false); 
            $('.drop').hide();
            $('.regi').hide();
            $('#dro').val('');
            $("#reg").prop('checked', false); 
        }else{
            $(".analgesia").show();
        }

    }else{
        alert("all the options need to be uncheck to make selection NO....");
        $("#reco").prop('checked', true); 

    }   
}

function intra(){
    var opi = $('#opi').is(':checked');
    if(!opi){
        $('.intra').hide();
        $('.add1').hide();
        $('.remove_supplement1').val('');
    }
    else{
        $(".intra").show();
        $('.add1').show();

    }
}
function oral(){
    var ora = $('#ora').is(':checked');
    if(!ora){
        $('.oral').hide();
        $('.add2').hide();
        $('.remove_supplement2').val('');
    }
    else{
        $(".oral").show();
        $('.add2').show();
    }
}
function tramadol(){
    var tra = $('#tra').is(':checked');
    if(!tra){
        $('.tramadol').hide();
        $('.add3').hide();
        $('.remove_supplement3').val('');
    }
    else{
        $(".tramadol").show();
        $('.add3').show();
    }
}
function nsa(){
    var nid = $('#nid').is(':checked');
    if(!nid){
        $('.nsa').hide();
        $('.add4').hide();
        $('.remove_supplement4').val('');
    }
    else{
        $(".nsa").show();
        $('.add4').show();
    }
}
function para(){
    var temo = $('#temo').is(':checked');
    if(!temo){
        $('.para').hide();
        $('.add5').hide();
        $('.remove_supplement5').val('');

    }
    else{
        $(".para").show();
        $('.add5').show();

    }
}
function regi(){
    var reg = $('#reg').is(':checked');
    if(!reg){
        $('.regi').hide();
        $(".drop").hide();
        $('#dro').val('');
    }
    else{
        $(".regi").show();
    }
}
function drop(){
    var dro = $('#dro').val();
    if(dro != ''){
        $('.drop').show();
    }
    else{
        $(".drop").hide();
    }
}
function repeats(){
    var rep = $('#rep').is(':checked');
    if(!rep){
        $('.repeats').hide();
    }
    else{
        $(".repeats").show();
    }
}
function other(){
    var oth = $('#oth').is(':checked');
    if(!oth){
        $('.other').hide();
        $('.add6').hide();
        $('.remove_supplement6').val('');
    }
    else{
        $(".other").show();
        $('.add6').show();

    }
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
$('#repropi_per').focusout(function(){
    var r_per = $('#repropi_per').val();
    var r_mg = $('#repropi_mg').val();
    var r_ml = $('#repropi_ml').val();
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var cc =(r_per*bb);
        $('#repropi_mg').val(cc);
        $('#clear5').show();
        $("#repropi_per").attr("readonly", true);
        $("#repropi_ml").attr("readonly", true);
        $("#repropi_mg").attr("readonly", true);
    }
    else if(r_per && r_mg){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('#repropi_ml').val(r_total);
        $('#clear5').show();
        $("#repropi_per").attr("readonly", true);
        $("#repropi_ml").attr("readonly", true);
        $("#repropi_mg").attr("readonly", true);
    }
});
$('#repropi_ml').focusout(function(){
    var r_ml = $('#repropi_ml').val();
    var r_mg = $('#repropi_mg').val();
    var r_per = $('#repropi_per').val(); 
    if(r_per && r_ml){
        var bb = (r_ml)*10;
        var cc =(r_per*bb);
        $('#repropi_mg').val(cc);
        $('#clear5').show();
        $("#repropi_per").attr("readonly", true);
        $("#repropi_ml").attr("readonly", true);
        $("#repropi_mg").attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var cc = (r_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#repropi_per').val(cc);
            $('#clear5').show();
            $("#repropi_per").attr("readonly", true);
            $("#repropi_ml").attr("readonly", true);
            $("#repropi_mg").attr("readonly", true);
        }
    }
});
$('#repropi_mg').focusout(function(){
    var r_ml = $('#repropi_ml').val();
    var r_mg = $('#repropi_mg').val();
    var r_per = $('#repropi_per').val(); 
    if(r_mg && r_per){
        var aa = r_mg/r_per;
        var r_total = aa/10;
        $('#repropi_ml').val(r_total);
        $('#clear5').show();
        $("#repropi_per").attr("readonly", true);
        $("#repropi_ml").attr("readonly", true);
        $("#repropi_mg").attr("readonly", true);
    }
    else if(r_mg && r_ml){
        var bb = (r_ml)*10;
        var cc = (r_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#repropi_per').val(cc);
            $('#clear5').show();
            $("#repropi_per").attr("readonly", true);
            $("#repropi_ml").attr("readonly", true);
            $("#repropi_mg").attr("readonly", true);
        }
    }
});
function clean5(){
    $('#repropi_per').val('');
    $('#repropi_ml').val('');
    $('#repropi_mg').val('');
    $('#repropi_per').removeAttr("readonly");
    $('#repropi_ml').removeAttr("readonly");
    $('#repropi_mg').removeAttr("readonly");
    $('#clear5').hide();
}
$('#repbupi_per').focusout(function(){
    var b_per = $('#repbupi_per').val();
    var b_mg = $('#repbupi_mg').val();
    var b_ml = $('#repbupi_ml').val();
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var cc =(b_per*bb);
        $('#repbupi_mg').val(cc);
        $('#clear6').show();
        $("#repbupi_per").attr("readonly", true);
        $("#repbupi_ml").attr("readonly", true);
        $("#repbupi_mg").attr("readonly", true);
    }
    else if(b_per && b_mg){
        var aa = b_mg/b_per;
        var r_total = aa/10;
        $('#repbupi_ml').val(r_total);
        $('#clear6').show();
        $("#repbupi_per").attr("readonly", true);
        $("#repbupi_ml").attr("readonly", true);
        $("#repbupi_mg").attr("readonly", true);
    }
});
$('#repbupi_ml').focusout(function(){
    var b_ml = $('#repbupi_ml').val();
    var b_mg = $('#repbupi_mg').val();
    var b_per = $('#repbupi_per').val(); 
    if(b_per && b_ml){
        var bb = (b_ml)*10;
        var cc =(b_per*bb);
        $('#repbupi_mg').val(cc);
        $('#clear6').show();
        $("#repbupi_per").attr("readonly", true);
        $("#repbupi_ml").attr("readonly", true);
        $("#repbupi_mg").attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var cc = (b_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#repbupi_per').val(cc);
            $('#clear6').show();
            $("#repbupi_per").attr("readonly", true);
            $("#repbupi_ml").attr("readonly", true);
            $("#repbupi_mg").attr("readonly", true);
        }
    }
});
$('#repbupi_mg').focusout(function(){
    var b_ml = $('#repbupi_ml').val();
    var b_mg = $('#repbupi_mg').val();
    var b_per = $('#repbupi_per').val(); 
    if(b_mg && b_per){
        var aa = b_mg/b_per;
        var r_total = aa/10;
        $('#repbupi_ml').val(r_total);
        $('#clear6').show();
        $("#repbupi_per").attr("readonly", true);
        $("#repbupi_ml").attr("readonly", true);
        $("#repbupi_mg").attr("readonly", true);
    }
    else if(b_mg && b_ml){
        var bb = (b_ml)*10;
        var cc = (b_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#repbupi_per').val(cc);
            $('#clear6').show();
            $("#repbupi_per").attr("readonly", true);
            $("#repbupi_ml").attr("readonly", true);
            $("#repbupi_mg").attr("readonly", true);
        }
    }
});
function clean6(){
    $('#repbupi_per').val('');
    $('#repbupi_ml').val('');
    $('#repbupi_mg').val('');
    $('#repbupi_per').removeAttr("readonly");
    $('#repbupi_ml').removeAttr("readonly");
    $('#repbupi_mg').removeAttr("readonly");
    $('#clear6').hide();
}
$('#replevo_per').focusout(function(){
    var l_per = $('#replevo_per').val();
    var l_mg = $('#replevo_mg').val();
    var l_ml = $('#replevo_ml').val();
    if(l_per && l_ml){
        var bb = (l_ml)*10;
        var cc =(l_per*bb);
        $('#replevo_mg').val(cc);
        $('#clear7').show();
        $("#replevo_per").attr("readonly", true);
        $("#replevo_ml").attr("readonly", true);
        $("#replevo_mg").attr("readonly", true);
    }
    else if(l_per && l_mg){
        var aa = l_mg/l_per;
        var r_total = aa/10;
        $('#replevo_ml').val(r_total);
        $('#clear7').show();
        $("#replevo_per").attr("readonly", true);
        $("#replevo_ml").attr("readonly", true);
        $("#replevo_mg").attr("readonly", true);
    }
});
$('#replevo_ml').focusout(function(){
    var l_ml = $('#replevo_ml').val();
    var l_mg = $('#replevo_mg').val();
    var l_per = $('#replevo_per').val(); 
    if(l_per && l_ml){
        var bb = (l_ml)*10;
        var cc =(l_per*bb);
        $('#replevo_mg').val(cc);
        $('#clear7').show();
        $("#replevo_per").attr("readonly", true);
        $("#replevo_ml").attr("readonly", true);
        $("#replevo_mg").attr("readonly", true);
    }
    else if(l_mg && l_ml){
        var bb = (l_ml)*10;
        var cc = (l_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#replevo_per').val(cc);
            $('#clear7').show();
            $("#replevo_per").attr("readonly", true);
            $("#replevo_ml").attr("readonly", true);
            $("#replevo_mg").attr("readonly", true);
        }
    }
});
$('#replevo_mg').focusout(function(){
    var l_ml = $('#replevo_ml').val();
    var l_mg = $('#replevo_mg').val();
    var l_per = $('#replevo_per').val(); 
    if(l_mg && l_per){
        var aa = l_mg/l_per;
        var r_total = aa/10;
        $('#replevo_ml').val(r_total);
        $('#clear7').show();
        $("#replevo_per").attr("readonly", true);
        $("#replevo_ml").attr("readonly", true);
        $("#replevo_mg").attr("readonly", true);
    }
    else if(l_mg && l_ml){
        var bb = (l_ml)*10;
        var cc = (l_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#replevo_per').val(cc);
            $('#clear7').show();
            $("#replevo_per").attr("readonly", true);
            $("#replevo_ml").attr("readonly", true);
            $("#replevo_mg").attr("readonly", true);
        }
    }
});
function clean7(){
    $('#replevo_per').val('');
    $('#replevo_ml').val('');
    $('#replevo_mg').val('');
    $('#replevo_per').removeAttr("readonly");
    $('#replevo_ml').removeAttr("readonly");
    $('#replevo_mg').removeAttr("readonly");
    $('#clear7').hide();
}
$('#repligno_per').focusout(function(){
    var li_per = $('#repligno_per').val();
    var li_mg = $('#repligno_mg').val();
    var li_ml = $('#repligno_ml').val();
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var cc =(li_per*bb);
        $('#repligno_mg').val(cc);
        $('#clear8').show();
        $("#repligno_per").attr("readonly", true);
        $("#repligno_ml").attr("readonly", true);
        $("#repligno_mg").attr("readonly", true);
    }
    else if(li_per && li_mg){
        var aa = li_mg/li_per;
        var r_total = aa/10;
        $('#repligno_ml').val(r_total);
        $('#clear8').show();
        $("#repligno_per").attr("readonly", true);
        $("#repligno_ml").attr("readonly", true);
        $("#repligno_mg").attr("readonly", true);
    }
});
$('#repligno_ml').focusout(function(){
    var li_ml = $('#repligno_ml').val();
    var li_mg = $('#repligno_mg').val();
    var li_per = $('#repligno_per').val(); 
    if(li_per && li_ml){
        var bb = (li_ml)*10;
        var cc =(li_per*bb);
        $('#repligno_mg').val(cc);
        $('#clear8').show();
        $("#repligno_per").attr("readonly", true);
        $("#repligno_ml").attr("readonly", true);
        $("#repligno_mg").attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var cc = (li_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#repligno_per').val(cc);
            $('#clear8').show();
            $("#repligno_per").attr("readonly", true);
            $("#repligno_ml").attr("readonly", true);
            $("#repligno_mg").attr("readonly", true);
        }
    }
});
$('#repligno_mg').focusout(function(){
    var li_ml = $('#repligno_ml').val();
    var li_mg = $('#repligno_mg').val();
    var li_per = $('#repligno_per').val(); 
    if(li_mg && li_per){
        var aa = li_mg/li_per;
        var r_total = aa/10;
        $('#repligno_ml').val(r_total);
        $('#clear8').show();
        $("#repligno_per").attr("readonly", true);
        $("#repligno_ml").attr("readonly", true);
        $("#repligno_mg").attr("readonly", true);
    }
    else if(li_mg && li_ml){
        var bb = (li_ml)*10;
        var cc = (li_mg/bb);
        if(cc > 4){
			toastr.error('percentage value is greater than 4 so please enter different mg, ml values');
		}else{
            $('#repligno_per').val(cc);
            $('#clear8').show();
            $("#repligno_per").attr("readonly", true);
            $("#repligno_ml").attr("readonly", true);
            $("#repligno_mg").attr("readonly", true);
        }
    }
});
function clean8(){
    $('#repligno_per').val('');
    $('#repligno_ml').val('');
    $('#repligno_mg').val('');
    $('#repligno_per').removeAttr("readonly");
    $('#repligno_ml').removeAttr("readonly");
    $('#repligno_mg').removeAttr("readonly");
    $('#clear8').hide();
}
$('#edi_pac').click(function(){
    $("#pacu-edit").modal("show");
}); 
</script>
<script type="text/javascript">
$('#edit-postop').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $(".update").text("Updating...");
    $(".update").attr("disabled", true);
    $.ajax({
        type : "POST",
        url : '<?php  echo base_url("editPostop")?>',
        data : formData,
        contentType: false,
        processData: false,
        success:function(response){
            response = jQuery.parseJSON(response);
            if(response.result==1){
                toastr["success"](response.message);
                $("#pacu-edit").modal("hide");
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
