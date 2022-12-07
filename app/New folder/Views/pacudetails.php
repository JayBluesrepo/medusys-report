<?php
    echo view('includes/header',$patient, $post, $postcheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>

 <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

<section class="pacu-details">
    <div class="row">
        <div class="col-sm-8"></div>
        <div class="col-sm-4">
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
                        <td class="bg-pat2">Post Procedure</td>
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
                        <td class="bg-pat2">Post Procedure</td>
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
                        <td class="bg-pat2">Post Procedure</td>
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
    <h4><b>Post-Op Care Unit / Recovery</b></h4>
    <h6 class="pt">Analgesia Supplement in Recovery</h6>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">Intravenous Opiodis</td>
                    </tr>
                    <?php
                        $intras = $info['intravenous_opioids'];
                        if($intras == 'Yes'){
                            $intra_name = $info['intra_name_dose'];
                            $intra_name_dose = json_decode($intra_name, true);
                            foreach($intra_name_dose as $key=>$val){  
                    ?>
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
                            <td class="bg-pat2">Intravenous Opiodis</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">Oral Opiodis</td>
                    </tr>
                    <?php
                        $orals = $info['oral_opioids'];
                        if($orals == 'Yes'){
                            $oral_name = $info['oral_name_dose'];
                            $oral_name_dose = json_decode($oral_name, true);
                            foreach($oral_name_dose as $key=>$val){  
                    ?>
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
                            <td class="bg-pat2">Oral Opiodis</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">Tramadol</td>
                    </tr>
                    <?php
                        $trama = $info['tramadol'];
                        if($trama == 'Yes'){
                            $tram_name = $info['tram_name_dose'];
                            $tram_name_dose = json_decode($tram_name, true);
                            foreach($tram_name_dose as $key=>$val){  
                    ?>
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
                            <td class="bg-pat2">Tramadol</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">NSAID</td>
                    </tr>
                    <?php
                        $nsaid = $info['nsaid'];
                        if($nsaid == 'Yes'){
                            $nsa_name = $info['nsa_name_dose'];
                            $nsa_name_dose = json_decode($nsa_name, true);
                            foreach($nsa_name_dose as $key=>$val){  
                    ?>
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
                            <td class="bg-pat2">NSAID</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">Paracetemol</td>
                    </tr>
                    <?php
                        $paracetamol = $info['paracetamol'];
                        if($paracetamol == 'Yes'){
                            $para_name = $info['para_name_dose'];
                            $para_name_dose = json_decode($para_name, true);
                            foreach($para_name_dose as $key=>$val){  
                    ?>
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
                            <td class="bg-pat2">Paracetemol</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">Other</td>
                    </tr>
                    <?php
                        $other = $info['other'];
                        if($other == 'Yes'){
                            $other_name = $info['other_name_dose'];
                            $other_name_dose = json_decode($other_name, true);
                            foreach($other_name_dose as $key=>$val){  
                    ?>
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
                            <td class="bg-pat2">Other</td>
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
                                <span>Post Procedure</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="ps_postproc" name="ps_postproc">
                                    <option>Select pain score on arrival</option>
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
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>30 Min</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="ps_30mins" name="ps_30mins">
                                    <option>Select pain score in 30 min</option>
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
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>One Hour</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="ps_1hr" name="ps_1hr">
                                    <option>Select pain score in one hour</option>
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
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>Post Procedure</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="nvs_postproc" name="nvs_postproc">
                                    <option>Select score at arrival</option>
                                    <option>0-No Nausea</option>
                                    <option>1-Mild Nausea not requiring treatment</option>
                                    <option>2-Vomiting</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>30 Min</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="nvs_30mins" name="nvs_30mins">
                                    <option>Select score at 30 min</option>
                                    <option>0-No Nausea</option>
                                    <option>1-Mild Nausea not requiring treatment</option>
                                    <option>2-Vomiting</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>One Hour</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" id="nvs_1hr" name="nvs_1hr">
                                    <option>Select score at 1 hour</option>
                                    <option>0-No Nausea</option>
                                    <option>1-Mild Nausea not requiring treatment</option>
                                    <option>2-Vomiting</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <h5><b>Sedation Score (1-3)</b></h5>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>Post Procedure</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" name="ss_postproc" id="ss_postproc">
                                    <option>Select sedation score on arrival</option>
                                    <option>0-Awake</option>
                                    <option>1-Mild,easy to rouse</option>
                                    <option>2-Moderate,eay to rouse, unable to remain...</option>
                                    <option>3-Difficult to rouse</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>30 Min</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" name="ss_30mins" id="ss_30mins">
                                    <option>Select sedation score in 30 min</option>
                                    <option>0-Awake</option>
                                    <option>1-Mild,easy to rouse</option>
                                    <option>2-Moderate,eay to rouse, unable to remain...</option>
                                    <option>3-Difficult to rouse</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2">
                                <span>One Hour</span>
                            </div>
                            <div class="col-sm-5">
                                <select class="form-control" name="ss_1hr" id="ss_1hr">
                                    <option>Select sedation score in 30 min</option>
                                    <option>0-Awake</option>
                                    <option>1-Mild,easy to rouse</option>
                                    <option>2-Moderate,eay to rouse, unable to remain...</option>
                                    <option>3-Difficult to rouse</option>
                                    <option>Unable to score</option>
                                </select>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!--row-->
                        <div class="row" style="padding-top:12px;">
                            <div class="col-sm-4"><label>Time Spent in Recovery (mins)</label></div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="time_spent" value="<?php echo $info['time_spent']; ?>">
                            </div>
                            <div class="col-sm-4"></div>
                        </div><!--row-->
                        <h5><b>Analgesia Supplement in Recovery</b></h5>
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
                                            <div class="tooltip-10">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-10">
                                                    <div class="text-content-10">
                                                        <h6>Intravenous Opioids includes but not restricted to Fenatanyl,morphine,oxycodone,pethidina,Pentazocina,<br>bupranorphina,butorphenol,nalbuphine,hydromorphine,<br>hydrocodone,tapentadol.All dosages must be entered in milligram equvivalent only.</h6>
                                                        <i></i>
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
                                                            <input type="text" class="form-control" name="intra_name[]"  value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label>Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control" name="intra_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
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
                                                        <h6>Oral Opiodis includes but not restricted to codine,morphine,oxycodone,hydromorphine,<br>hydrocodone,tapentadol.All dosages must be entered in milligram equvivalent only.</h6>
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
                                                            <input type="text" class="form-control" name="oral_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control" name="oral_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
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
                                                            <input type="text" class="form-control" name="tram_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control" name="tram_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
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
                                                            <input type="text" class="form-control" name="nsa_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control" name="nsa_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
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
                                                            <input type="text" class="form-control" name="para_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control" name="para_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
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
                                 <div class="tooltip-13">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-13">
                                        <div class="text-content-13">
                                            <h6>If user enter % and vol(ml) only.The mg is calculated using the formula mg=(concentration*vol in ml*10 . However the user should be able to edit the mg and enter the mg directly.)</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>      
                                </h5>
                                <h6 style="margin-bottom:15px;"><b>LA Regimen </b>
                                 <div class="tooltip-14">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-14">
                                        <div class="text-content-14">
                                            <h6>Local Anasthetic solution(%) & volume(ml)-Ropivacaine,Bupivacaine,Levobupivacaine,Lignocaine plain,Lignocaine with or without adrenaline.</h6>
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
                                            <div class="pacu-1"><p>Bupivacaine</p></div>
                                            <div class="pacu-1-x">
                                                <select class="form-control" name="bupivacaine" id="bupivacaine">
                                                    <option value=''>Select</option>
                                                    <option>Without Adrenaline</option>
                                                    <option>With Adrenaline</option>
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
                                            <div class="pacu-1"><p>Levobupivacaine</p></div>
                                            <div class="pacu-1-x">
                                                <select class="form-control" name="levobupivacaine" id="levobupivacaine">
                                                    <option value=''>Select</option>
                                                    <option>Without Adrenaline</option>
                                                    <option>With Adrenaline</option>
                                                </select>
                                            </div>
                                            <div class="pacu-1" id="id">
                                                <input type="number" class="form-control" name="levo_per" id="levo_per"><span style="padding-top:5px;">%</span>
                                            </div>
                                            <div class="pacu-1" id="id">
                                                <input type="number" class="form-control" name="levo_ml" id="levo_ml"><span style="padding-top:5px;">ml</span>
                                            </div>
                                            <div class="pacu-1" id="id">
                                                <input type="text" class="form-control" name="levo_mg" id="levo_mg"><span style="padding-top:5px;">mg</span>
                                            </div>
                                        </div><!--pac-box-->
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
                                                <input type="number" class="form-control" name="ligno_per" id="ligno_per"><span style="padding-top:5px;">%</span>
                                            </div>
                                            <div class="pacu-1" id="id">
                                                <input type="number" class="form-control" name="ligno_ml" id="ligno_ml"><span style="padding-top:5px;">ml</span>
                                            </div>
                                            <div class="pacu-1" id="id">
                                                <input type="text" class="form-control" name="ligno_mg" id="ligno_mg"><span style="padding-top:5px;">mg</span>
                                            </div>
                                        </div><!--pac-box-->
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="hidden" class="form-check-input" value="No" name="la_repeat">
                                                <input type="checkbox" class="form-check-input" id="rep" value="Yes" name="la_repeat" onclick="repeats()">Repeat Block
                                                <div class="tooltip-14">
                                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                    <div class="right-14">
                                                        <div class="text-content-14">
                                                            <h6>Local Anasthetic solution(%) & volume(ml)-Ropivacaine,Bupivacaine,Levobupivacaine,Lignocaine plain,Lignocaine with or without adrenaline.</h6>
                                                            <i></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div><!--row-->
                                <div class="repeats">
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-10">
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Ropivacaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_ropi" id="repeat_ropi">
                                                        <option>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repropi_per" id="repropi_per"><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repropi_ml" id="repropi_ml"><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="repropi_mg" id="repropi_mg"><span style="padding-top:5px;">mg</span>
                                                </div>
                                            </div><!--pac-box-->
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Bupivacaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_bupi" id="repeat_bupi">
                                                        <option>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repbupi_per" id="repbupi_per"><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repbupi_ml" id="repbupi_ml"><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="repbupi_mg" id="repbupi_mg"><span style="padding-top:5px;">mg</span>
                                                </div>
                                            </div><!--pac-box-->
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Levobupivacaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_levo" id="repeat_levo">
                                                        <option>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="replevo_per" id="replevo_per"><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="replevo_ml" id="replevo_ml"><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="replevo_mg" id="replevo_mg"><span style="padding-top:5px;">mg</span>
                                                </div>
                                            </div><!--pac-box-->
                                            <div class="pac-box">
                                                <div class="pacu-1"><p>Lignocaine</p></div>
                                                <div class="pacu-1-x">
                                                    <select class="form-control" name="repeat_ligno" id="repeat_ligno">
                                                        <option>Select</option>
                                                        <option>Without Adrenaline</option>
                                                        <option>With Adrenaline</option>
                                                    </select>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repligno_per" id="repligno_per"><span style="padding-top:5px;">%</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="number" class="form-control" name="repligno_ml" id="repligno_ml"><span style="padding-top:5px;">ml</span>
                                                </div>
                                                <div class="pacu-1" id="id">
                                                    <input type="text" class="form-control" name="repligno_mg" id="repligno_mg"><span style="padding-top:5px;">mg</span>
                                                </div>
                                            </div><!--pac-box-->
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
                                                            <input type="text" class="form-control" name="other_name[]" value="<?php echo $val['name']; ?>">&nbsp&nbsp
                                                            <label >Dosage&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                            <input type="number" class="form-control" name="other_dose[]" value="<?php echo $val['dose']; ?>">&nbsp&nbsp
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
                        <h6><b>Vasopressor Use in Recovery</b></h6>
                        <div class="row">
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
		    $(".intra").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="intra_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="intra_dose[]">&nbsp&nbsp<button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add2").click(function(){
        if(j<3){
            j++;
		    $(".oral").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="oral_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="oral_dose[]">&nbsp&nbsp<button type="button" class="btn remove2"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add3").click(function(){
        if(k<3){
            k++;
		    $(".tramadol").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="tram_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="tram_dose[]">&nbsp&nbsp<button type="button" class="btn remove3"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add4").click(function(){
        if(l<3){
            l++;
		    $(".nsa").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="nsa_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="nsa_dose[]">&nbsp&nbsp<button type="button" class="btn remove4"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add5").click(function(){
        if(m<3){
            m++;
		    $(".para").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="para_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="para_dose[]">&nbsp&nbsp<button type="button" class="btn remove5"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
        }
    });
    $(".add6").click(function(){
        if(n<3){
            n++;
		    $(".other").append('<div class="row" style="padding-top:15px;"><div class="col-sm-12" id="id"><label >Name</label><input type="text" class="form-control" name="other_name[]">&nbsp&nbsp<label >Dosage</label><input type="number" class="form-control" name="other_dose[]">&nbsp&nbsp<button type="button" class="btn remove6"><i class="fa fa-times" aria-hidden="true"></i></button></div></div>');
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

function recov(){
    var reco = $('#reco').is(':checked');
    if(!reco){
        $('.analgesia').hide();
    }
    else{
        $(".analgesia").show();
    }
}
function intra(){
    var opi = $('#opi').is(':checked');
    if(!opi){
        $('.intra').hide();
    }
    else{
        $(".intra").show();
    }
}
function oral(){
    var ora = $('#ora').is(':checked');
    if(!ora){
        $('.oral').hide();
    }
    else{
        $(".oral").show();
    }
}
function tramadol(){
    var tra = $('#tra').is(':checked');
    if(!tra){
        $('.tramadol').hide();
    }
    else{
        $(".tramadol").show();
    }
}
function nsa(){
    var nid = $('#nid').is(':checked');
    if(!nid){
        $('.nsa').hide();
    }
    else{
        $(".nsa").show();
    }
}
function para(){
    var temo = $('#temo').is(':checked');
    if(!temo){
        $('.para').hide();
    }
    else{
        $(".para").show();
    }
}
function regi(){
    var reg = $('#reg').is(':checked');
    if(!reg){
        $('.regi').hide();
        $(".drop").hide();
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
    }
    else{
        $(".other").show();
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
$('#repropi_per').keyup(function(){
    var r_per = $('#repropi_per').val();
    var r_ml = $('#repropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#repropi_mg').val(cc);
});
$('#repropi_ml').keyup(function(){
    var r_per = $('#repropi_per').val();
    var r_ml = $('#repropi_ml').val();
    var aa = (r_per)/100;
    var bb = (r_ml)*10;
    var cc =(aa*bb);
    $('#repropi_mg').val(cc);
});
$('#repbupi_per').keyup(function(){
    var b_per = $('#repbupi_per').val();
    var b_ml = $('#repbupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#repbupi_mg').val(ff);
});
$('#repbupi_ml').keyup(function(){
    var b_per = $('#repbupi_per').val();
    var b_ml = $('#repbupi_ml').val();
    var dd = (b_per)/100;
    var ee = (b_ml)*10;
    var ff =(dd*ee);
    $('#repbupi_mg').val(ff);
});
$('#replevo_per').keyup(function(){
    var l_per = $('#replevo_per').val();
    var l_ml = $('#replevo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#replevo_mg').val(ii);
});
$('#replevo_ml').keyup(function(){
    var l_per = $('#replevo_per').val();
    var l_ml = $('#replevo_ml').val();
    var gg = (l_per)/100;
    var hh = (l_ml)*10;
    var ii =(gg*hh);
    $('#replevo_mg').val(ii);
});
$('#repligno_per').keyup(function(){
    var li_per = $('#repligno_per').val();
    var li_ml = $('#repligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#repligno_mg').val(ll);
});
$('#repligno_ml').keyup(function(){
    var li_per = $('#repligno_per').val();
    var li_ml = $('#repligno_ml').val();
    var jj = (li_per)/100;
    var kk = (li_ml)*10;
    var ll =(jj*kk);
    $('#repligno_mg').val(ll);
});
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
        url : '<?php  echo base_url("PacuDetails/edit_postop")?>',
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
