<?php
    echo view('includes/header-obstetric',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

<section class="view-proc-ga pt-5" >
    <div class="row">
        <div class="col-sm-7"></div>
        <div class="col-sm-5" style="text-align:end;">
            <button type="button" class="btn-edit" id="edit" data-toggle="modal" data-target="#edit-ga">Edit</button>
        </div>
    </div><!--row-->
    <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="">Procedure Date and Time</th>
                        <th id="">GA done by</th>
                        <th id="">Supervision</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo 'Date : '.date("d-m-Y",strtotime($info['procedure_date']))  .' Time: '.$info['time']; ?></td>
                        <td><?php echo $info['ga_done_by2']; ?></td>
                        <td><?php echo $info['supervision']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
        <h5><b>GA</b>:</h5>
        <div class="preop-table">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th id="">GA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        <th id="">Opioids Prior to delivery</th>
                        <th>Airway Management</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $info['ga_inhalational']; ?> - <?php echo $info['ga_tiva']; ?></td>
                        <td><?php echo $info['opioids_delivery']; ?></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div><!--table-responsive-->
    </div><!--preop-table-->
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Intra-op Analgesia</td>
                        <td><?php echo $info['intra_op_analgesia']; ?></td>
                    </tr>
                     
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                   <!--  <tr>
                        <td>Intra-op Analgesia</td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td class="bg-pat2">Opioids</td>
                        <td><?php echo $info['ia_opioids']; ?></td>
                    </tr>

                    <?php
                        if($info['ia_opioids'] == 'Yes'){
                        $ia_opioids_name_dose = $info['ia_opioids_name_dose'];
                        $n_d = json_decode($ia_opioids_name_dose,true);
                        foreach($n_d as $key=>$val){
                    ?>
                    <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td><?php echo $val['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td><?php echo $val['dose']; ?></td>
                    </tr>
                    <?php } }?>
                    <tr>
                        <td class="bg-pat2">Paracetamol</td>
                        <td><?php echo $info['ia_paracetamol']; ?></td>
                    </tr>
                    <?php
                        if($info['ia_paracetamol'] == 'Yes'){
                        $ia_paracetamol_name_dose = $info['ia_paracetamol_name_dose'];
                        $n_d = json_decode($ia_paracetamol_name_dose,true);
                        foreach($n_d as $key=>$val){
                    ?>
                    <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td><?php echo $val['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td><?php echo $val['dose']; ?></td>
                    </tr>
                    <?php } }?>

                    <tr>
                        <td class="bg-pat2">NSAIDS</td>
                        <td><?php echo $info['ia_nsaids']; ?></td>
                    </tr>
                    <?php
                        if($info['ia_nsaids'] == 'Yes'){
                        $ia_nsaids_name_dose = $info['ia_nsaids_name_dose'];
                        $n_d = json_decode($ia_nsaids_name_dose,true);
                        foreach($n_d as $key=>$val){
                    ?>
                    <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td><?php echo $val['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td><?php echo $val['dose']; ?></td>
                    </tr>
                    <?php } }?>


                    <tr>
                        <td class="bg-pat2">Ketamine</td>
                        <td><?php echo $info['ia_ketamine']; ?></td>
                    </tr>
                    <?php
                        if($info['ia_nsaids'] == 'Yes'){
                        $ia_ketamine_name_dose = $info['ia_ketamine_name_dose'];
                        $n_d = json_decode($ia_ketamine_name_dose,true);
                        foreach($n_d as $key=>$val){
                    ?>
                    <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td><?php echo $val['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td><?php echo $val['dose']; ?></td>
                    </tr>
                    <?php } }?>

                    <tr>
                        <td class="bg-pat2">Tramadol</td>
                        <td><?php echo $info['ia_tramadol']; ?></td>
                    </tr>
                    <?php
                        if($info['ia_nsaids'] == 'Yes'){
                        $ia_tramadol_name_dose = $info['ia_tramadol_name_dose'];
                        $n_d = json_decode($ia_tramadol_name_dose,true);
                        foreach($n_d as $key=>$val){
                    ?>
                    <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td><?php echo $val['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td><?php echo $val['dose']; ?></td>
                    </tr>
                    <?php } }?>

                    <tr>
                        <td class="bg-pat2">Nerve Block</td>
                        <td><?php echo $info['ia_nerveblock']; ?></td>
                    </tr>
                    <?php
                        if($info['ia_nsaids'] == 'Yes'){
                        $ia_nerveblock_name_dose = $info['ia_nerveblock_name_dose'];
                        $n_d = json_decode($ia_nerveblock_name_dose,true);
                        foreach($n_d as $key=>$val){
                    ?>
                    <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td><?php echo $val['name']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td><?php echo $val['dose']; ?></td>
                    </tr>
                    <?php } }?>

                    <!-- <tr>
                        <td class="bg-pat2">Others</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2 pl-5">Name</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2 pl-5">Dosage</td>
                        <td></td>
                    </tr> -->
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Complications</td>
                        <td></td>
                    </tr>
                     
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                   <!--  <tr>
                        <td>Intra-op Analgesia</td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td class="bg-pat2">Aspiration</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Difficult intubation</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2">Failed intubation</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2">Bronchospasm</td>
                        <td></td>
                    </tr>
                     <tr>
                        <td class="bg-pat2">Desaturation</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Awareness</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->

    <!---------------------------------------------------------->
    <div class="modal fade" id="edit-ga">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" id="add-header">
            <h4 class="modal-title">Edit GA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <div class="ga">
                <form id="ga_edit">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" required>

                    <div class="add-patient" id="">                       
                        <div class="row">
                            <div class="col-sm-2"><label>Procedure Date and Time<span class="mandat">*</span></label></div>
                            <div class="col-sm-4">
                                <div class="form-group">                                       
                                    <div class="input-group date" id="datePicker5">
                                        <input type="text" class="form-control date_time_m" style="border-radius: 15px;" id='datetimepicker1' name="date_time_m">
                                        <span class="input-group-addon" style="margin-left: 20px;"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                    </div>
                                    <div class="input-group date" id="timePicker5">
                                        <input type="text" class="form-control time_m" style="border-radius: 15px;margin-top: 12px;" name="time_m">
                                        <span class="input-group-addon" style="margin-left: 20px;margin-top: 12px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-2"><label>GA done by<span class="mandat">*</span>
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
                                <select class="form-control cnb_done_by1 ga_done_by1" id="ga_done_by1" name="ga_done_by1" onchange="selectcnb()">
                                    <option value="">Select</option>
                                    <option value="Consultant">Consultant</option>
                                    <option value="Trainee">Trainee</option>
                                </select>
                                <div class="col-sm-6">
                                    <small class="cnbdone" style="color:red; display:none;">select the option</small>
                                </div>
                                <select class="form-control cnb_done_by2 ga_done_by2" id="ga_done_by2"  style="margin: 15px 0;"  name="ga_done_by2">
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
                                <select class="form-control supervision" name="supervision" onchange='checksupervision()'>
                                    <option value="">Select</option>
                                    <option value="Direct Supervision">Direct Supervision</option>
                                    <option value="Independent Supervision">Independent Supervision</option>
                                </select>
                                <small class="supervision1" style="color:red; display:none; margin-left:20px;">select the option</small>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                    </div><!--add-patient-->

                    <h5><b>GA</b>:</h5>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4">
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="ga_inhalational" name="ga_inhalational" value="Inhalational"><b>Inhalational</b>
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" id="ga_tiva" name="ga_tiva" value="Intravenous (TIVA)"><b>Intravenous (TIVA)</b>
                            </label>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div><!--row-->
                    <div class="row pt-4">
                        <div class="col-sm-2"><label><b>Airway Management</b>
                            <div class="tooltip-22" id="tip">
                                <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <div class="right-22">
                                    <div class="text-content-22">
                                        <h6>Examples include but not limited to <br><br> 1st Gen SGA: Simple breathing tube, usually with some form of mask or opening at the larynx. Examples: Classic LMA, LMA-Unique, SureSeal LM,CobraPLA. Laryngeal Tube Airway, etc. <br><br> 2nd Gen SGA: Above, plus provision for gastric drainage and improved protection against aspiration. Examples: Combitube, Proseal LMA, LMA Supreme, gel, LTS-D, AuraGain <br><br> 3rd Gen SGA (proposed): Above, plus incorporates dynamic sealing mechanism. Examples: Baska, Elisha and 3gLM</h6>
                                        <i></i>
                                    </div>
                                </div>
                            </div>  
                        </label></div>
                    
                        <div class="col-sm-3">
                            <select class="form-control airway_option" name="airway_management1" style="border-radius: 15px;" onchange="airway()">
                                <option value="">Select</option>
                                <option>LMA</option>
                                <option>Endotracheal tube</option>
                            </select>
                            <!-- <small class="supervision1" style="color:red; display:none; margin-left:20px;">select the option</small> -->
                            <select class="form-control gen mt-3" name="airway_management2" style="border-radius: 15px; display:none;">
                                <option value="">Select</option>
                                <option>1st Gen</option>
                                <option>2nd Gen</option>
                                <option>3rd Gen</option>
                            </select>                        
                        </div>
                        <div class="col-sm-7"></div>
                    </div><!--row-->


                    <div class="row pt-5">
                        <div class="col-sm-2"><label><b>Opioids Prior to delivery </b></label></div>
                        <div class="col-sm-2">
                            <div class= "box_1">
                                <input type="hidden" class="switch_1" value="No" name="opioids_delivery">
                                <input type="checkbox" class="switch_1" id="opioids_delivery" value="Yes" name="opioids_delivery">
                            </div>
                        </div>
                        <div class="col-sm-8"></div>
                    </div><!---->

                    <div class="row pt-5">
                        <div class="col-sm-2"><label><b>Intra-op Analgesia</b></label></div>
                        <div class="col-sm-4 p-0">
                            <div class="form-check" style="font-size: 16px;margin-top: 0;">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="intra_op_analgesia">
                                <b></b><input type="checkbox" class="switch_1 ml-4" name="intra_op_analgesia" id="intra_op_analgesia" value="Yes" onclick="ia_show()">
                            </label>
                        </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>


                    <div class="row" id="intra_op_analgesia_box" style="display:none;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_opioids">
                                        <input type="checkbox" class="form-check-input ia_opioids" value="Yes" name="ia_opioids"><b>Opioids</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row pt-3 ia_opioids_box" id="ga-input" style="display:none;">
                                <?php 
                                    $bg = $info['ia_opioids_name_dose'];
                                    $bg1 = json_decode($bg, true);
                                    foreach($bg1 as $key=>$val){
                                ?>
                                <div class="col-sm-2">
                                    <label><b>Name</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ia_opioids_name[]" value="<?php echo $val['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label><b>Dosage</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="ia_opioids_dose[]" value="<?php echo $val['dose']; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div><!--row-->
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_paracetamol">
                                        <input type="checkbox" class="form-check-input ia_paracetamol" value="Yes" name="ia_paracetamol"><b>Paracetamol</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row pt-3 ia_paracetamol_box" id="ga-input" style="display:none;">
                                <?php 
                                    $ia_paracetamol = $info['ia_paracetamol_name_dose'];
                                    $ia_paracetamol1 = json_decode($ia_paracetamol, true);
                                    foreach($ia_paracetamol1 as $key=>$val){
                                ?>
                                <div class="col-sm-2">
                                    <label><b>Name</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ia_paracetamol_name[]" value="<?php echo $val['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label><b>Dosage</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="ia_paracetamol_dose[]" value="<?php echo $val['dose']; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div><!--row-->
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_nsaids">
                                        <input type="checkbox" class="form-check-input ia_nsaids" value="Yes" name="ia_nsaids"><b>NSAIDS</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row pt-3 ia_nsaids_box" id="ga-input" style="display:none;">
                                <?php 
                                    $ia_nsaids = $info['ia_nsaids_name_dose'];
                                    $ia_nsaids1 = json_decode($ia_nsaids, true);
                                    foreach($ia_nsaids1 as $key=>$val){
                                ?>
                                <div class="col-sm-2">
                                    <label><b>Name</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ia_nsaids_name[]" value="<?php echo $val['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label><b>Dosage</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="ia_nsaids_dose[]" value="<?php echo $val['dose']; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div><!--row-->
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_ketamine">
                                        <input type="checkbox" class="form-check-input ia_ketamine" value="Yes" name="ia_ketamine"><b>Ketamine</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row pt-3 ia_ketamine_box" id="ga-input" style="display:none;">
                                <?php 
                                    $ia_ketamine = $info['ia_ketamine_name_dose'];
                                    $ia_ketamine1 = json_decode($ia_ketamine, true);
                                    foreach($ia_ketamine1 as $key=>$val){
                                ?>
                                <div class="col-sm-2">
                                    <label><b>Name</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ia_ketamine_name[]" value="<?php echo $val['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label><b>Dosage</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="ia_ketamine_dose[]" value="<?php echo $val['dose']; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div><!--row-->
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_tramadol">
                                        <input type="checkbox" class="form-check-input ia_tramadol" value="Yes" name="ia_tramadol"><b>Tramadol</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row pt-3 ia_tramadol_box" id="ga-input" style="display:none;">
                                <?php 
                                    $ia_tramadol = $info['ia_tramadol_name_dose'];
                                    $ia_tramadol1 = json_decode($ia_tramadol, true);
                                    foreach($ia_tramadol1 as $key=>$val){
                                ?>
                                <div class="col-sm-2">
                                    <label><b>Name</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ia_tramadol_name[]" value="<?php echo $val['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label><b>Dosage</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="ia_tramadol_dose[]" value="<?php echo $val['dose']; ?>">
                                    </div>
                                </div>
                                <?php }?>
                            </div><!--row-->
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_nerveblock">
                                        <input type="checkbox" class="form-check-input ia_nerveblock" value="Yes" name="ia_nerveblock"><b>Nerve Block</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row pt-3 ia_nerveblock_box" id="ga-input" style="display:none;">
                                <?php 
                                    $ia_nerveblock = $info['ia_nerveblock_name_dose'];
                                    $ia_nerveblock1 = json_decode($ia_nerveblock, true);
                                    foreach($ia_nerveblock1 as $key=>$val){
                                ?>
                                <div class="col-sm-2">
                                    <label><b>Name</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ia_nerveblock_name[]" value="<?php echo $val['name']; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <label><b>Dosage</b></label>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="ia_nerveblock_dose[]" value="<?php echo $val['dose']; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div><!--row-->
                            <div class="row">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="ia_others">
                                        <input type="checkbox" class="form-check-input ia_others" value="Yes" name="ia_others"><b>Others</b>
                                    </label>
                                </div>
                            </div>
                            <div class="row ia_others_box" id="ga-input" style="display:none;">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control ia_others_input" name="ia_others_input">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div>
                        <div class="col-sm-4"></div>
                    </div>


                    <div class="row pt-4">
                            <div class="col-sm-2">
                                <label> <b>Complications</b></label>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-check" style="font-size: 16px;">
                                    <label class="form-check-label">
                                        <input type="hidden" class="switch_1" value="No" name="complications">
                                    <input type="checkbox" class="switch_1" value="Yes" name="complications" id="complications" onclick="c_show()">
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div><!--row-->
                        <div class="row" id="complications_box" style="display:none;">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-4 p-0">
                            
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="c_aspiration">                            
                                <input type="checkbox" class="form-check-input c_aspiration" value="Yes" name="c_aspiration"><b>Aspiration</b>
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="c_difficult_intubation">                            
                                <input type="checkbox" class="form-check-input c_difficult_intubation" value="Yes" name="c_difficult_intubation"><b>Difficult intubation</b>
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="c_failed">                            
                                <input type="checkbox" class="form-check-input c_failed" value="Yes" name="c_failed"><b>Failed intubation</b>
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="c_bronchospasm">                            
                                <input type="checkbox" class="form-check-input c_bronchospasm" value="Yes" name="c_bronchospasm"><b>Bronchospasm</b>
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="c_desaturation">                            
                                <input type="checkbox" class="form-check-input c_desaturation" value="Yes" name="c_desaturation"><b>Desaturation</b>
                            </label>
                            </div>
                            <div class="form-check">
                            <label class="form-check-label">
                                <input type="hidden" class="switch_1" value="No" name="c_awarenese">                            
                                <input type="checkbox" class="form-check-input c_awarenese" value="Yes" name="c_awarenese"><b>Awareness</b>
                            </label>
                            </div>
                        </div>
                        <div class="col-sm-6"></div>
                    </div>
                    <button type="submit" class="btn-save mt-4">Update</button>
                </form>
            </div><!--GA--->
            </div><!--modal--body-->


        </div>
        </div>
    </div><!---edit-ga-->

</section>

<script src="<?php echo base_url('public/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script type="text/javascript">
    var today = new Date();
    var minDate = today.setDate(today.getDate());

    $('#datePicker5').datetimepicker({
    useCurrent: false,
    format: "DD/MM/YYYY",
    minDate: 0
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


<script>

    // function selectcnb(){
    //     var cnbdone = $('.cnb_done_by1').val();
    //     if(cnbdone != ''){
    //         $('.cnbdone').hide();
    //     }
    // }

    function selectcnb(){

        var sele = document.getElementById("ga_done_by1").value;
        if(sele == "Trainee"){
            $('#consultant').show();
            $("#ga_done_by2").empty();
            var str = ""
            str += "<option>Junior Trainee</option>";
            str += "<option>Senior Trainee</option>";
        
            $("#ga_done_by2").append(str);
        }
        else if(sele == "Consultant"){
            $('#consultant').show();
            $("#ga_done_by2").empty();
            var str = ""
            str += "<option>Junior Consultant</option>";
            str += "<option>Senior Consultant</option>";
        
            $("#ga_done_by2").append(str);
        
            
        }
    }

    function checksupervision(){
        var supervision = $('.supervision').val();
        if(supervision != ''){
            $('.supervision1').hide();
        }
    }

    // var subjectObject = {
    //     "Consultant": {
    //         "Junior Consultant" : ["Junior Consultant", "Senior Consultant"],
    //         "Senior Consultant" : ["Junior Consultant", "Senior Consultant"]
    //     }, 
    //     "Trainee" : {
    //         "Junior Trainee" : ["Junior Trainee", "Senior Trianee"],
    //         "Senior Trianee" : ["Junior Trainee", "Senior Trianee"]
    //     } 
    // }
    // window.onload = function(){
        
    //     var subjectSel = document.getElementById("ga_done_by1");
    //     var topicSel = document.getElementById("ga_done_by2");
        

    //     for (var x in subjectObject) {
    //         subjectSel.options[subjectSel.options.length] = new Option(x, x);
    //     }
    //     subjectSel.onchange = function() {
            
    //         topicSel.length = 1;
        
    //         for (var y in subjectObject[this.value]) {
    //         topicSel.options[topicSel.options.length] = new Option(y, y);
    //         }
    //     }
        
    // }
</script>

<script>

    function airway(){
        var lma = $('.airway_option').val();
        // alert(lma);
        if(lma == 'LMA'){
            $('.gen').show();
        }else{
            $('.gen').hide();
            $('.gen').val('');
        }
    }  

    function c_show(){
        var condition1 = $('#complications').is(':checked');	
       
        if(condition1 == true){
            $('#complications_box').show();
        }else{
            $('#complications_box').hide();
        }
    }

    function ia_show(){     
		
        var condition = $('#intra_op_analgesia').is(':checked');	
       
        if(!condition){

            var ia_opioids = $('.ia_opioids').is(':checked');
            var ia_paracetamol = $('.ia_paracetamol').is(':checked');
            var ia_nsaids = $('.ia_nsaids').is(':checked');
            var ia_ketamine = $('.ia_ketamine').is(':checked');
            var ia_tramadol = $('.ia_tramadol').is(':checked');
            var ia_nerveblock = $('.ia_nerveblock').is(':checked');
            var ia_others = $('.ia_others').is(':checked');

            if(ia_opioids){

                alert('Please Uncheck Opioids..');
                document.getElementById("intra_op_analgesia").checked = true;

            }else if(ia_paracetamol){
                alert('Please Uncheck Paracetamol..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_nsaids){
                alert('Please Uncheck NSAIDS..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_ketamine){
                alert('Please Uncheck Ketamine..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_tramadol){
                alert('Please Uncheck Tramadol..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_nerveblock){
                alert('Please Uncheck Nerve Block..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else if(ia_others){
                alert('Please Uncheck Others..');
                document.getElementById("intra_op_analgesia").checked = true;
            }else{
                $('#intra_op_analgesia_box').hide();
            }
            
        }else{
            $('#intra_op_analgesia_box').show();
        }

    }

    
    $('.ia_opioids').click(function(){
        var ia_opioids = $('.ia_opioids').is(':checked');

        if(ia_opioids == true){
            $('.ia_opioids_box').show();
        }else{
            $('.ia_opioids_box').hide();
        }
    });

    $('.ia_paracetamol').click(function(){
        var ia_paracetamol = $('.ia_paracetamol').is(':checked');

        if(ia_paracetamol == true){
            $('.ia_paracetamol_box').show();
        }else{
            $('.ia_paracetamol_box').hide();
        }
    });

    $('.ia_nsaids').click(function(){
        var ia_nsaids = $('.ia_nsaids').is(':checked');

        if(ia_nsaids == true){
            $('.ia_nsaids_box').show();
        }else{
            $('.ia_nsaids_box').hide();
        }
    });

    $('.ia_ketamine').click(function(){
        var ia_ketamine = $('.ia_ketamine').is(':checked');

        if(ia_ketamine == true){
            $('.ia_ketamine_box').show();
        }else{
            $('.ia_ketamine_box').hide();
        }
    });

    $('.ia_tramadol').click(function(){
        var ia_tramadol = $('.ia_tramadol').is(':checked');

        if(ia_tramadol == true){
            $('.ia_tramadol_box').show();
        }else{
            $('.ia_tramadol_box').hide();
        }
    });

    $('.ia_nerveblock').click(function(){
        var ia_nerveblock = $('.ia_nerveblock').is(':checked');

        if(ia_nerveblock == true){
            $('.ia_nerveblock_box').show();
        }else{
            $('.ia_nerveblock_box').hide();
        }
    });

    $('.ia_others').click(function(){
        var ia_others = $('.ia_others').is(':checked');

        if(ia_others == true){
            $('.ia_others_box').show();
        }else{
            $('.ia_others_box').hide();
        }
    });

</script>

<script>

    var procedure_date = "<?php echo date("d-m-Y",strtotime($info['procedure_date'])); ?>";   
    var procedure_time = "<?php echo $info['time']; ?>";
    
    var supervision = "<?php echo $info['supervision']; ?>";
    var date1 = procedure_date.replaceAll('-', '/');      
    // alert(cnb1);
    var ga1 = "<?php echo $info['ga_done_by1']; ?>";
    var ga2 = "<?php echo $info['ga_done_by2']; ?>";

    // alert(ga1);
    $('#ga_done_by1').val(ga1);
    if(ga1 == 'Trainee'){
        $('#consultant').show();
        $("#ga_done_by2").empty();
        var str = ""
        str += "<option>Junior Trainee</option>";
        str += "<option>Senior Trainee</option>";
           
        $("#ga_done_by2").append(str);
    }
    else{
        $('#consultant').show();
        $("#ga_done_by2").empty();
        var str = "" 
        str += "<option>Junior Consultant</option>";
        str += "<option>Senior Consultant</option>";
        $("#ga_done_by2").append(str);
    }
    $('#ga_done_by2').val(ga2);



    $('.date_time_m').val(date1);
    $('.time_m').val(procedure_time);
    // $('.ga_done_by1').val(ga1);    
    // $('.ga_done_by2').val(ga2);
    $('.supervision').val(supervision);

    var ga_inhalational = "<?php echo $info['ga_inhalational']; ?>";
    var ga_tiva = "<?php echo $info['ga_tiva']; ?>";

    if(ga_inhalational == 'Inhalational'){
        $('#ga_inhalational').attr("checked",true);
    }
    if(ga_tiva == 'Intravenous (TIVA)'){
        $('#ga_tiva').attr("checked",true);
    }

    var airway_management1 = "<?php echo $info['airway_management1']; ?>";
    var gen = "<?php echo $info['airway_management2']; ?>";
    $('.airway_option').val(airway_management1);    
    if(airway_management1 == 'LMA'){
        $('.airway_option').show();
        $('.airway_option').val(airway_management1);    
        $('.gen').show();
        $('.gen').val(gen);        
    }

    var opioids_delivery = "<?php echo $info['opioids_delivery']; ?>";

    if(opioids_delivery == 'Yes'){
        $('#opioids_delivery').attr("checked",true);
    }

    var intra_op_analgesia = "<?php echo $info['intra_op_analgesia']; ?>";

    if(intra_op_analgesia == 'Yes'){
        $('#intra_op_analgesia_box').show();
        $('#intra_op_analgesia').attr("checked",true);
    }

    var ia_opioids = "<?php echo $info['ia_opioids']; ?>";
    var ia_paracetamol = "<?php echo $info['ia_paracetamol']; ?>";
    var ia_nsaids = "<?php echo $info['ia_nsaids']; ?>";
    var ia_ketamine = "<?php echo $info['ia_ketamine']; ?>";
    var ia_tramadol = "<?php echo $info['ia_tramadol']; ?>";
    var ia_nerveblock = "<?php echo $info['ia_nerveblock']; ?>";

    if(ia_opioids == 'Yes'){
        $('.ia_opioids').attr("checked",true);
        $('.ia_opioids_box').show();
    }
    if(ia_paracetamol == 'Yes'){
        $('.ia_paracetamol').attr("checked",true);
        $('.ia_paracetamol_box').show();
    }
    if(ia_nsaids == 'Yes'){
        $('.ia_nsaids').attr("checked",true);
        $('.ia_nsaids_box').show();
    }
    if(ia_ketamine == 'Yes'){
        $('.ia_ketamine').attr("checked",true);
        $('.ia_ketamine_box').show();
    }
    if(ia_tramadol == 'Yes'){
        $('.ia_tramadol').attr("checked",true);
        $('.ia_tramadol_box').show();
    }
    if(ia_nerveblock == 'Yes'){
        $('.ia_nerveblock').attr("checked",true);
        $('.ia_nerveblock_box').show();
    }

    var ia_others1 = "<?php echo $info['ia_others']; ?>";
    var ia_others = ia_others1.split(',');

    if(ia_others[0] == 'Yes'){
        $('.ia_others').attr("checked",true);
        $('.ia_others_input').val(ia_others[1]);
        $('.ia_others_box').show();
    }
    

    var complications = "<?php echo $info['complications']; ?>";

    if(complications == 'Yes'){
        $('#complications_box').show();
        $('#complications').attr("checked",true);
    }
       
    var c_aspiration = "<?php echo $info['c_aspiration']; ?>";
    var c_difficult_intubation = "<?php echo $info['c_difficult_intubation']; ?>";
    var c_failed = "<?php echo $info['c_failed']; ?>";
    var c_bronchospasm = "<?php echo $info['c_bronchospasm']; ?>";
    var c_desaturation = "<?php echo $info['c_desaturation']; ?>";
    var c_awarenese = "<?php echo $info['c_awarenese']; ?>";

    
    if(c_aspiration == 'Yes'){
        $('.c_aspiration').attr("checked",true);
    }
    if(c_difficult_intubation == 'Yes'){
        $('.c_difficult_intubation').attr("checked",true);
    }
    if(c_failed == 'Yes'){
        $('.c_failed').attr("checked",true);
    }
    if(c_bronchospasm == 'Yes'){
        $('.c_bronchospasm').attr("checked",true);
    }
    if(c_desaturation == 'Yes'){
        $('.c_desaturation').attr("checked",true);
    }
    if(c_awarenese == 'Yes'){
        $('.c_awarenese').attr("checked",true);
    }


</script>

<script>
    $(document).ready(function(){
        $('#ga_edit').submit(function(e){
			e.preventDefault();
            // alert('hi');
            var lor_sal = '', air = '';
					
			var xx = $('#ga_inhalational').is(':checked');
			var yy = $('#ga_tiva').is(':checked');
			
			if(xx){
				lor_sal = $('#ga_inhalational').val();
			}
			if(yy){
				air = $('#ga_tiva').val();
			}
			
			var formData = new FormData(this);
			formData.append('ga_inhalational',lor_sal);
			formData.append('ga_tiva',air);										

			$.ajax({
				type : "POST",
				url : '<?php  echo base_url("edit-ga-obstetrics")?>',
				data : formData,
				contentType: false,
				processData: false,
				success:function(response){
					response = jQuery.parseJSON(response);
					if(response.result==1){
						toastr["success"](response.message);
						// $('#ga_edit')[0].reset();		
                        $("#edit-ga").modal("hide");
                        history.go(0); 
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
    echo view('includes/footer-obstetric');    
?>