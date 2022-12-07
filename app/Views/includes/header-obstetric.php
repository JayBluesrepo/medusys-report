<?php 
$name = session()->get('name');
$email = session()->get('email');
$gamer_id = session()->get('gamer_id');
$patient_name = session()->get('pa_name');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/main.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/font-awesome.min.css');?>"/>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
	<link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url('public/assets/images/fav_icon.jpg');?>'/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/jquery-ui.css');?>"/>
    <!-- 	<link rel="stylesheet" type="text/css" href="css/timepicker.css" /> -->
	<link rel="stylesheet" href="<?php echo base_url('public/assets/css/bootstrap-datetimepicker.css');?>"/>
    <link rel='shortcut icon' type='image/x-icon' href='<?php echo base_url('public/assets/images/fav_icon_new.jpg');?>'/>
      <link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/w3.css'); ?>"/>
	<!------------------------------JS-------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/timepicker.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/moment.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/sweet_alert/sweet-alert.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/sweet_alert/sweet-alert.css');?>">
    <script src="<?php echo base_url('public/assets/toastr/toastr.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css');?>">

	
	<!-- <script type="text/javascript" src="js/jquery-time-picker.js"></script> -->
    
</head>
<body>

    <!------------------------------header-------------------------------->
    <section class="header">
        <div class="row">
            <div class="col-sm-3">
               
                <a href=""><img src="<?php echo base_url('public/assets/images/logo-new.jpg'); ?>" id="logo" class="img-fluid d-block"></a>

            </div>
            <div class="col-sm-4">
               <h4 style="float:right;margin: 28px -32px 0 0; color:#0b5077;font-weight: 600;font-size: 25px;" id="new-head">Obstetrics Anaesthesia</h4>
            </div>
            <div class="col-sm-5">
                <div class="right-menu">
                    <ul>
                        <li><a href="<?php echo base_url("Gas")?>" data-toggle="tooltip-1" title="Home"><img src="<?php echo base_url('public/assets/images/Home-Icon.png'); ?>" style=""></a>&nbsp;</li>
                        <li><a href="https://medusys.in/help-center.html" data-toggle="tooltip-1" title="Help center"><img src="<?php echo base_url('public/assets/images/help_center_2.png'); ?>" style=""></a>&nbsp;</li>
                          <li><a href="<?php echo base_url('dashboard');?>" data-toggle="tooltip-1" title="Dashboard"><img src="<?php echo base_url('public/assets/images/dashboard_icon.png'); ?>" style="width:40px;"></a></li>
                       <!--  <li><a href=""><img src="<?php echo base_url('public/assets/images/user.png'); ?>" style="padding-right:10px;"></a><span><?php echo $name; ?></span></li> -->
                       <div class="w3-dropdown-hover">
                        <li><a href="" class="w3-button"><img src="<?php echo base_url('public/assets/images/user.png'); ?>" style="padding-right:10px;"></a><?php echo $name; ?><i class="fa fa-ellipsis-v pl-2" aria-hidden="true"></i></li>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <p><b><?php echo $gamer_id; ?></b></p>
                                <p><?php echo $email; ?></p>
                                <a href="<?php echo base_url('My-Account'); ?>">Manage my account</a>
                            </div>
                        </div>
                         <li><a href="<?php echo base_url('log-out');?>"><img src="<?php echo base_url('public/assets/images/logout.png'); ?>"></a>Logout</li>
                       <!--  <div class="w3-dropdown-hover">
                            <li><a href="" class="w3-button"><img src="<?php echo base_url('public/assets/images/user.png'); ?>"></a><?php echo $name; ?><i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <p><b><?php echo $gamer_id; ?></b></p>
                                <p><?php echo $email; ?></p>
                                <a  href="<?php echo base_url('My-Account');?>">Manage my account</a>
                            </div>
                        </div> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
	<!------------------------------header-------------------------------->
    <!-- -----------------------------home-Left------------------------------- -->
    <section class="main">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="box">
                            <p style="font-size: 15px;"><b>Select Patient from the list</b></p>
                        <div class="search">
                            <div class="form-group" style="width:50%;">
                                <input type="text" class="form-control" id="usr" placeholder="Search Patient" onkeyup="fun()" style="width:120%;border-radius: 20px;">
                            </div>
                            <div class="add" style="display: none;">
                                <a data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Add Patient"><!-- <img src="<?php echo base_url('public/assets/images/Add.png'); ?>"> -->Add New<i class="fa fa-plus ml-2" aria-hidden="true" style=""></i></a>
                            </div> 
                        </div>
                        <h5><b>Incomplete Patient List </b>( UIN )&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-unlock-alt new-Modal" style="color:black;" data-toggle="modal" data-target="#new-Modal" onclick='see(<?php echo $id; ?>)' aria-hidden="true"></i></h5>
                         <!------------------------Mobile-View-Start----------------------------------------->
                        <div class="d-sm-none" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                  <div class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        <p class="mb-0"><b>Click here to view patient list</b></p>
                                    </a>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                  </div>
                                </div>

                                <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                                  <div class="card-block">
                                    <?php if($patient_name == 1){ ?>

                                        <div class="patient-list" id="patients1" style="overflow-y: scroll;">
                                            <?php
                                                $check_r = session()->get('check');
                                                if($check_r == 'true'){
                                                    foreach($old_check as $keys=>$vals){
                                                        $flag1 = $vals['id'];
                                                        foreach($allcheck as $rows){
                                                            if($flag1 == $rows['id']){
                                                                $k = $rows['id'];
                                            ?>
                                                    <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#1974A7;"><?php echo $vals['patient_name']?></p>
                                                    <?php 
                                                        }}if(($flag1 == $focus['id']) && ($flag1 != $k)){ 
                                                    ?>
                                                        <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $vals['patient_name']?></p>
                                                    <?php 
                                                        }elseif($flag1 != $k){                     
                                                    ?>
                                                        <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:red;"><?php echo $vals['patient_name']?></p>
                                                    <?php 
                                                        }}}else{                               
                                                    foreach($patient as $key=>$val){
                                                    $id = $val['id'];
                                                        foreach($allcheck as $row){
                                                            if($id == $row['id']){
                                                                $flag = $row['id'];
                                                    ?>          
                                                        <p onclick = "myfun(<?php echo $id; ?>)" style="color:#1974A7; display:none;"><?php echo $val['patient_name']?></p>
                                                <?php 
                                                    }}if(($id == $focus['id']) && ($id != $flag)){ 
                                                ?>
                                                        <p onclick = "myfun(<?php echo $id; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $val['patient_name']?></p>
                                                <?php 
                                                    }elseif($id != $flag){                     
                                                ?>
                                                        <p onclick = "myfun(<?php echo $id; ?>)" style="color:red;"><?php echo $val['patient_name']?></p> 
                                            <?php 
                                                }}}                              
                                            ?>                              
                                        </div>

                                    <?php }else{ ?>

                                        <div class="patient-list" id="patients1" style="overflow-y: scroll;">
                                            <?php
                                                $check_r = session()->get('check');
                                                if($check_r == 'true'){
                                                    foreach($old_check as $keys=>$vals){
                                                        $flag1 = $vals['id'];
                                                        foreach($allcheck as $rows){
                                                            if($flag1 == $rows['id']){
                                                                $k = $rows['id'];
                                            ?>
                                                    <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#1974A7;"><?php echo $vals['rad_id']?></p>
                                                    <?php 
                                                        }}if(($flag1 == $focus['id']) && ($flag1 != $k)){ 
                                                    ?>
                                                        <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $vals['rad_id']?></p>
                                                    <?php 
                                                        }elseif($flag1 != $k){                     
                                                    ?>
                                                        <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:red;"><?php echo $vals['rad_id']?></p>
                                                    <?php 
                                                        }}}else{                               
                                                    foreach($patient as $key=>$val){
                                                    $id = $val['id'];
                                                        foreach($allcheck as $row){
                                                            if($id == $row['id']){
                                                                $flag = $row['id'];
                                                    ?>          
                                                        <p onclick = "myfun(<?php echo $id; ?>)" style="color:#1974A7; display:none;"><?php echo $val['rad_id']?></p>
                                                <?php 
                                                    }}if(($id == $focus['id']) && ($id != $flag)){ 
                                                ?>
                                                        <p onclick = "myfun(<?php echo $id; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $val['rad_id']?></p>
                                                <?php 
                                                    }elseif($id != $flag){                     
                                                ?>
                                                        <p onclick = "myfun(<?php echo $id; ?>)" style="color:red;"><?php echo $val['rad_id']?></p> 
                                            <?php 
                                                }}}                              
                                            ?>                              
                                        </div>

                                    <?php } ?>
                                   
                                        <div class="form-check">
                                            <label class="form-check-label" for="check3">                               
                                                <input type="checkbox" class="form-check-input" id="check3" name="option2" onclick="upload_patient1()">Old Patients Record
                                            </label>
                                        </div>
                                         <div class="patient-summary">                             
                                            <p>Total Patients<span><?php echo count($patient); ?></span></p>
                                            <p>Completed Patient Records<span><?php echo count($old_check); ?></span></p>
                                            <p>Incompleted Patient Records<span class='incomplete'></span></p>
                                        </div>
                                  </div><!--card-block--->
                                </div>
                              </div>
                         </div><!--accordion-->
                        <!-----------------------------------Mobile-View-End-----------------------> 

                        <?php if( $patient_name == 1){ ?>

                            <div class="patient-list d-none d-sm-block" id="patients" style="overflow-y: scroll;">
                                <?php
                                    $check_r = session()->get('check');
                                    if($check_r == 'true'){
                                        foreach($old_check as $keys=>$vals){
                                            $flag1 = $vals['id'];
                                            foreach($allcheck as $rows){
                                                if($flag1 == $rows['id']){
                                                    $k = $rows['id'];
                                ?>
                                        <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#1974A7;"><?php echo $vals['patient_name']?></p>
                                        <?php 
                                            }}if(($flag1 == $focus['id']) && ($flag1 != $k)){ 
                                        ?>
                                            <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $vals['patient_name']?></p>
                                        <?php 
                                            }elseif($flag1 != $k){                     
                                        ?>
                                            <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:red;"><?php echo $vals['patient_name']?></p>
                                        <?php 
                                            }}}else{                               
                                        foreach($patient as $key=>$val){
                                        $id = $val['id'];
                                            foreach($allcheck as $row){
                                                if($id == $row['id']){
                                                    $flag = $row['id'];
                                        ?>          
                                            <p onclick = "myfun(<?php echo $id; ?>)" style="color:#1974A7; display:none;"><?php echo $val['patient_name']?></p>
                                    <?php 
                                        }}if(($id == $focus['id']) && ($id != $flag)){ 
                                    ?>
                                            <p onclick = "myfun(<?php echo $id; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $val['patient_name']?></p>
                                    <?php 
                                        }elseif($id != $flag){                     
                                    ?>
                                            <p onclick = "myfun(<?php echo $id; ?>)" style="color:red;"><?php echo $val['patient_name']?></p> 
                                <?php 
                                    }}}                              
                                ?>                              
                            </div><!--patient-list-->

                        <?php }else{ ?>

                            <div class="patient-list d-none d-sm-block" id="patients" style="overflow-y: scroll;">
                                <?php
                                    $check_r = session()->get('check');
                                    if($check_r == 'true'){
                                        foreach($old_check as $keys=>$vals){
                                            $flag1 = $vals['id'];
                                            foreach($allcheck as $rows){
                                                if($flag1 == $rows['id']){
                                                    $k = $rows['id'];
                                ?>
                                        <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#1974A7;"><?php echo $vals['rad_id']?></p>
                                        <?php 
                                            }}if(($flag1 == $focus['id']) && ($flag1 != $k)){ 
                                        ?>
                                            <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $vals['rad_id']?></p>
                                        <?php 
                                            }elseif($flag1 != $k){                     
                                        ?>
                                            <p onclick = "myfun(<?php echo $flag1; ?>)" style="color:red;"><?php echo $vals['rad_id']?></p>
                                        <?php 
                                            }}}else{                               
                                        foreach($patient as $key=>$val){
                                        $id = $val['id'];
                                            foreach($allcheck as $row){
                                                if($id == $row['id']){
                                                    $flag = $row['id'];
                                        ?>          
                                            <p onclick = "myfun(<?php echo $id; ?>)" style="color:#1974A7; display:none;"><?php echo $val['rad_id']?></p>
                                    <?php 
                                        }}if(($id == $focus['id']) && ($id != $flag)){ 
                                    ?>
                                            <p onclick = "myfun(<?php echo $id; ?>)" style="color:#000;background-color:lightgrey;border-radius:8px;padding:5px;"><?php echo $val['rad_id']?></p>
                                    <?php 
                                        }elseif($id != $flag){                     
                                    ?>
                                            <p onclick = "myfun(<?php echo $id; ?>)" style="color:red;"><?php echo $val['rad_id']?></p> 
                                <?php 
                                    }}}                              
                                ?>                              
                            </div><!--patient-list-->

                        <?php } ?>
                        
                        <div class="form-check d-none d-sm-block">
                            <label class="form-check-label" for="check2">							    
                                <input type="checkbox" class="form-check-input" id="check2" name="option2" onclick="upload_patient()">Old Patients Record
                            <!-- <div class="tooltip-17">
                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <div class="right-17">
                                    <div class="text-content-17">
                                        <h6>Content here....</h6>
                                        <i></i>
                                    </div>
                                </div>
                            </div> -->
                            </label>
                        </div>
                        <div class="patient-summary d-none d-sm-block">                             
                            <p>Total Patients<span><?php echo count($patient); ?></span></p>
                            <p>Completed Patient Records<span><?php echo count($old_check); ?></span></p>
                            <p>Incompleted Patient Records<span class='incomplete'></span></p>
                        </div>
                    </div><!--box-->
                </div>

                <section class="add-patient">

                <div class="modal fade" id="myModal">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header" id="add-header">
                        <h4 class="modal-title">Add New Patient</h4>
                        <button type="button" class="close" onclick="resetfun()" data-dismiss="modal">&times;</button>
                    </div>
                        
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="add_patient">
                            <div class="row">
                                <div class="col-sm-2"><label>Name</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Patient Email-ID</label></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control patient_email_id" name="patient_email_id" onfocusout="checkemail()">
                                        <small class="email" style="color:red;display:none; ">enter correct email-Id</small>
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Patient ID</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control patient_id" name="patient_id" onfocusout="check_id()">
                                        <!-- <input type="hidden" class="patient_id_index"> -->
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Gender</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="gender">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row" style="padding-top: 15px;">
                                <div class="col-sm-2"><label>Age<span class="mandat">*</span></label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="number" class="form-control age" name="age" onfocusout="checkage()">
                                        <small class="age1" style="color:red; display:none;">specify your age</small>
                                        <small class="age3" style="color:red; display:none;">are you sure</small>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Weight(kg)</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control weight" name="weight" onfocusout="checkweight()">
                                        <small class="weight1" style="color:red; display:none;">are you sure</small>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row heigh">
                                <div class="col-sm-2"><label>Height</label></div>
                                <div class="col-sm-10">
                                    <ul>
                                        <li><input type="text" class="form-control feet" name="feet" id="hieght"><label>Feet</label></li>
                                        <li><input type="text" class="form-control inche" name="inche" id="hieght"><label>Inches &nbsp;&nbsp;or</label></li>
                                        <li><input type="text" class="form-control cm" name="cm" id="hieght"><label>cms</label></li>
                                    </ul>
                                </div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>BMI</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control bmi" name="bmi" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Procedure Date and Time<span class="mandat">*</span></label></div>
                                <div class="col-sm-4">
                                    <!-- <div class="form-group">
                                        
                                        <input type="text" class="form-control" id='datetimepicker1' name="date_time" onfocusout="checkdatetime()">
                                        <small class="date_time1" style="color:red; display:none;">specify the date</small>
                                    </div> -->
                                    <div class="form-group">                                       
                                        <div class="input-group date" id="datePicker">
                                            <input type="text" class="form-control" style="border-radius: 15px;" id='datetimepicker1' name="date_time" onfocusout="checkdatetime()" >
                                            <span class="input-group-addon" style="margin-left: 20px;"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                                        </div>
                                        <div class="col-sm-6">
                                            <small class="date_time1" style="color:red; display:none;">specify the date</small>
                                        </div>
                                        <div class="input-group date" id="timePicker">
                                            <input type="text" class="form-control" style="border-radius: 15px;margin-top: 12px;" name="time">
                                            <span class="input-group-addon" style="margin-left: 20px;margin-top: 12px;"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                    <!--  <div class="form-group">
                                        <input type="text" class="form-control" id='mytimeicker' name="">
                                        </div> -->
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2">
                                   <!--  <label style="width:115px;">CNB done by<span class="mandat">*</span>
                                        <div class="tooltip1"><a href="" style="color: #fff;padding: 0 6px;font-size: 12px;"><i class="fa fa-info" aria-hidden="true"></i></a>
                                          <span class="tooltiptext">Junior Consultant < 5 years experience , Senior  Consultant > 5 years experience , Junior Trainee < 2 years experience , Senior Trainee > 2 years experience</span>
                                        </div>
                                    </label> -->
                                    <label style="width:115px;">CNB done by<span class="mandat">*</span>
                                    <div class="tooltip" id="tip">
                                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <div class="right">
                                            <div class="text-content">
                                                <h6>Junior Consultant < 5 years experience , Senior  Consultant > 5 years experience , Junior Trainee < 2 years experience , <br>Senior Trainee > 2 years experience.</h6>
                                                <i></i>
                                            </div>
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control cnb_done_by1" id="cnb_done_by11" name="cnb_done_by1" onfocusout="selectcnb()">
                                        <option value="Select" selected="selected">Select</option>
                                        <!-- <option value="Consultant">Consultant</option>
                                        <option value="Trainee">Trainee</option> -->
                                    </select>
                                    <div class="col-sm-6">
                                        <small class="cnbdone" style="color:red; display:none;">select the option</small>
                                    </div>
                                    <select class="form-control cnb_done_by2" id="cnb_done_by21"  style="margin: 15px 0;"  name="cnb_done_by2">
                                        <option value="Select" selected="selected">Select</option>                            
                                        <!-- <option value="Junior Consultant">Junior Consultant</option>
                                        <option value="Senior Consultant">Senior Consultant</option>
                                        <option value="Junior Trainee">Junior Trainee</option>
                                        <option value="Senior Trianee">Senior Trianee</option>	 -->
                                    </select>                                
                                </div>                           
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Supervision<span class="mandat">*</span></label></div>
                                <div class="col-sm-4">
                                    <select class="form-control supervision" name="supervision" onfocusout='checksupervision()'>
                                        <option value="Select">Select</option>
                                        <option value="Direct Supervision">Direct Supervision</option>
                                        <option value="Independent Supervision">Independent Supervision</option>
                                    </select>
                                    <small class="supervision1" style="color:red; display:none; margin-left:20px;">select the option</small>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-2"><label>Hospital</label></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="hospital">
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 pt">
                                    <button type="submit" class="btn-save">Save</button>
                                    <button type="button" onclick="resetfun()" class="btn-close">Close</button>
                                </div>
                            </div><!--row-->
                        </form>
                    </div><!--Modal body-->
                            </div>
                            </div>
                            </div>

                </section>
                

                <div class="col-sm-9">
                    <div class="home-right">
                        <ul class="nav nav-tabs" role="tablist">
                        <?php if(($pat) && ($pcheck)){ ?>
                                <li role="presentation" class="active"><a href="<?php echo base_url('obstetrics/patientDetails'); ?>" aria-controls="home">Patient Details<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php 
                                }elseif(($pat)){  
                            ?>
                                <li role="presentation" class="active"><a href="<?php echo base_url('obstetrics/patientDetails'); ?>" aria-controls="home">Patient Details</a></li>
                            <?php
                                }else{
                            ?>
                                <li role="presentation" ><a href="<?php echo base_url('obstetrics/patientDetails'); ?>" aria-controls="home">Patient Details<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php
                                } 
                            ?>
                            <?php if(($eco) && ($ecocheck)){ ?>
                                <li role="presentation" class="active"><a href="<?php echo base_url('obstetrics/E_consent'); ?>" aria-controls="consent" role="tab" >E-Consent<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php 
                                }elseif(($eco)){  
                            ?>
                                <li role="presentation" class="active"><a href="<?php echo base_url('obstetrics/E_consent'); ?>" aria-controls="consent" role="tab" >E-Consent</a></li>
                            <?php
                                }else{
                            ?>
                                <li role="presentation" ><a href="<?php echo base_url('obstetrics/E_consent'); ?>" aria-controls="consent" >E-Consent<i class="fa fa-check-circle-o" aria-hidden="true" id="ecocheck" style="color:green;margin-left:5px;"></i></a></li>
                            <?php
                                } 
                            ?>
                            <?php if(($pre) && ($precheck)){ ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Preop'); ?>" aria-controls="profile" role="tab" >Pre Op<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php 
                                }elseif(($pre)){  
                            ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Preop'); ?>" aria-controls="profile" role="tab" >Pre Op</a></li>
                            <?php
                                }else{
                            ?>
                                <li role="presentation"><a class="test1" href="<?php echo base_url('obstetrics/Preop'); ?>" aria-controls="profile">Pre Op<i class="fa fa-check-circle-o" aria-hidden="true" id="precheck" style="color:green;margin-left:5px;"></i></a></li>
                            <?php
                                } 
                            ?>
                            <?php if($preo['anaesthesia_administered']  != 'GA') {?>
                                <?php if(($procs) && ($proccheck)){ ?>
                                    <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Proc'); ?>" aria-controls="messages" role="tab" >Procedure<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                                <?php 
                                    }elseif(($procs)){  
                                ?>
                                    <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Proc'); ?>" aria-controls="messages" role="tab" >Procedure</a></li>
                                <?php
                                    }else{ 
                                ?>
                                    <li role="presentation"><a class="test1" href="<?php echo base_url('obstetrics/Proc'); ?>" aria-controls="messages" role="tab" >Procedure<i class="fa fa-check-circle-o" aria-hidden="true" id="proccheck" style="color:green;margin-left:5px;"></i></a></li>
                                <?php
                                    } 
                                ?>
                            <?php }else{?>

                                <?php if(($procs) && ($proccheck)){ ?>
                                    <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/GaDetails'); ?>" aria-controls="messages" role="tab" >Procedure<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                                <?php 
                                    }elseif(($procs)){  
                                ?>
                                    <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/GaDetails'); ?>" aria-controls="messages" role="tab" >Procedure</a></li>
                                <?php
                                    }else{ 
                                ?>
                                    <li role="presentation"><a class="test1" href="<?php echo base_url('obstetrics/GaDetails'); ?>" aria-controls="messages" role="tab" >Procedure<i class="fa fa-check-circle-o" aria-hidden="true" id="proccheck" style="color:green;margin-left:5px;"></i></a></li>
                                <?php
                                    } 
                                ?>

                            <?php } ?>    
                            

                            <?php if(($post) && ($postcheck)){ ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Pacu'); ?>" aria-controls="settings" role="tab" >PACU<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php 
                                }elseif(($post)){  
                            ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Pacu'); ?>" aria-controls="settings" role="tab" >PACU</a></li>
                            <?php
                                } else{
                            ?>
                                <li role="presentation"><a class="test1" href="<?php echo base_url('obstetrics/Pacu'); ?>" aria-controls="settings">PACU<i class="fa fa-check-circle-o" aria-hidden="true" id="postcheck" style="color:green;margin-left:5px;"></i></a></li>
                            <?php
                                } 
                            ?>    
                            <?php if(($foll) && ($follcheck)){ ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/followUp'); ?>" aria-controls="about" role="tab" >Follow Up<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php 
                                }elseif(($foll)){  
                            ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/followUp'); ?>" aria-controls="about" role="tab" >Follow Up</a></li>
                            <?php
                                } else{
                            ?>
                                <li role="presentation"><a class="test1" href="<?php echo base_url('obstetrics/followUp'); ?>" aria-controls="about">Follow Up<i class="fa fa-check-circle-o" aria-hidden="true" id="follcheck" style="color:green;margin-left:5px;"></i></a></li>
                            <?php
                                } 
                            ?>
                            <?php if(($feed) && ($feedcheck)){ ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Feedback'); ?>" aria-controls="contact" role="tab" >Feedback<i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;margin-left:5px;"></i></a></li>
                            <?php 
                                }elseif(($feed)){  
                            ?>
                                <li role="presentation" class="active"><a class="test1" href="<?php echo base_url('obstetrics/Feedback'); ?>" aria-controls="contact" role="tab" >Feedback</a></li>
                            <?php
                                } else{
                            ?>
                                <li role="presentation"><a class="test1" href="<?php echo base_url('obstetrics/Feedback'); ?>" aria-controls="contact" >Feedback<i class="fa fa-check-circle-o" aria-hidden="true" id="feedcheck" style="color:green;margin-left:5px;"></i></a></li>
                            <?php
                                } 
                            ?>
                        </ul>
                    </div>
                    <div>

                    <!-- Modal -->
                    <div id="new-Modal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content" >
                                <div class="modal-header" id="add-header">
                                    <h4 class="modal-title">Name Identification</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body" id="passw_m">
                                    <input type="hidden" id="patient_id">
                                    <div class="row pt">
                                        <div class="col-sm-2"><label style="font-size:13px;">Password</label></div>
                                        <div class="col-sm-8">
                                            <input type="text" id="pass_m" placeholder="Password" class="form-control">
                                            <!-- <div class="input-group-append" id="eye-login101" style="margin-top: -25px;margin-left: 270px;">
												<span onclick="password_show_hide101();">
													<i class="fa fa-eye d-none101" id="hide_eye101"></i>
													<i class="fa fa-eye-slash" id="show_eye101"></i>
												</span>
											</div> -->
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div><!--row-->
                                </div>
                                <!-- <div class="modal-body" id="p_name_m" style="display:none;">
                                    
                                    <div class="row pt">
                                        <div class="col-sm-2"><label style="font-size:13px;">user name</label></div>
                                        <div class="col-sm-8">
                                            <input type="text" id="puname" class="form-control">
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                </div> -->
                                <div class="modal-footer">
                                    <button type="submit" id="password_see" class="btn-close">Submit</button>
                                </div>
                            </div>

                        </div>
                    </div>


                    
                    <!-- </div>
                </div>  
            </div>
        </div>
    </section>
</body>
</html> -->

<script>

    function see(key){

        $('#patient_id').val(key);

        // console.log('key_value :--',key);
       

    }

    $('#password_see').click(function(){


        var pass = $('#pass_m').val();
        var patient_id = $('#patient_id').val();

        $.ajax({
            type: 'POST',
            url : '<?php echo base_url('see-password-obstetric') ?>',
            data :{pass:pass,patient_id:patient_id},

            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);                

                    var p_name1 = '<?php echo $patient_name; ?>';

                    console.log(p_name1);
                    $("#new-Modal").modal("hide");                    
                    history.go(0); 
                }
                else{
                    toastr["error"](response.message);                   
                }
            }
        });

    });


</script>

<script>

    var total_patient = '<?php echo count($patient); ?>';
    var close_patient = '<?php echo count($old_check); ?>';
    var incomplete_patient = total_patient - close_patient;
    $('.incomplete').text(incomplete_patient);


      /*----------------------------*/
    function upload_patient1(){
        var z = $('#check3').prop('checked');

        if(z == true){
            // alert(1);
            $.ajax({
                type : 'POST',
                url  : '<?php echo base_url("upload-patient-record-obstetrics")?>',
                data : {z:z},
                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    var k = [];
                    $('#patients1').empty();
                    for(var i=0; i<response.message.length; i++){
                        console.log(response.message[i].rad_id);
                        for(var j=0; j<response.msg.length; j++){
                            if(response.message[i].id == response.msg[j].id){
                                k = response.msg[j].id;
                                mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:#1974A7;">'+response.message[i].rad_id+'</p>';
                            }
                        }
                        if(response.message[i].id != k){
                            mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                        }
                    }
                    $('#patients1').append(mode1);
                }
            });
            
        }else if(z == false){
            
            $.ajax({
                type : 'POST',
                url  : '<?php echo base_url("upload-patient-record-obstetrics")?>',
                data : {z:z},

                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    var k = [];
                    $('#patients1').empty();
                    for(var i=0; i<response.message.length; i++){
                        console.log(response.message[i].rad_id);
                        for(var j=0; j<response.msg.length; j++){
                            if(response.message[i].id == response.msg[j].id){
                                k = response.msg[j].id;
                                mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:#1974A7;display:none;">'+response.message[i].rad_id+'</p>';
                            }
                        }
                        if(response.message[i].id != k){
                            mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                        }
                    }
                    $('#patients1').append(mode1);
                }
            });

           
        }

    }



    function upload_patient(){
      
        var z = $('#check2').prop('checked');
     
        if(z == true){
            // alert(1);
            $.ajax({
                type : 'POST',
                url  : '<?php echo base_url("upload-patient-record-obstetrics")?>',
                data : {z:z},
                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    var k = [];
                    $('#patients').empty();
                    for(var i=0; i<response.message.length; i++){
                        console.log(response.message[i].rad_id);
                        for(var j=0; j<response.msg.length; j++){
                            if(response.message[i].id == response.msg[j].id){
                                k = response.msg[j].id;
                                mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:#1974A7;">'+response.message[i].rad_id+'</p>';
                            }
                        }
                        if(response.message[i].id != k){
                            mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                        }
                    }
                    $('#patients').append(mode1);
                }
            });
        }else if(z == false){
            
            $.ajax({
                type : 'POST',
                url  : '<?php echo base_url("upload-patient-record-obstetrics")?>',
                data : {z:z},

                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    var k = [];
                    $('#patients').empty();
                    for(var i=0; i<response.message.length; i++){
                        console.log(response.message[i].rad_id);
                        for(var j=0; j<response.msg.length; j++){
                            if(response.message[i].id == response.msg[j].id){
                                k = response.msg[j].id;
                                mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:#1974A7;display:none;">'+response.message[i].rad_id+'</p>';
                            }
                        }
                        if(response.message[i].id != k){
                            mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                        }
                    }
                    $('#patients').append(mode1);
                }
            });
        }
    }
    var ss = '<?php echo $check_r ?>';
    if(ss == 'true'){
        $('#check2').attr("checked",true);
    }
    function check_id(){

        var id_patient = $('.patient_id').val();
        
        $.ajax({
            type : 'POST',
            url  : '<?php echo base_url("check-patient-id")?>',
            data : {id_patient:id_patient},           

            success:function(response){

                response = jQuery.parseJSON(response);
                if(response.result==1){
                    // toastr["error"](response.message);
                    document.querySelector(".patient_id").style.borderColor = "red";
                    document.querySelector(".patient_id").style.backgroundColor  = "#ffe6e6";                    
                    // $('.patient_id_index').val(0);                     
                }
                else{
                    // toastr["success"](response.message);
                    document.querySelector(".patient_id").style.borderColor = "green";
                    document.querySelector(".patient_id").style.backgroundColor  = "#e6ffe6";  
                    // $('.patient_id_index').val(1);               
                } 

            }
        });
    }
</script>
<script src="<?php echo base_url('public/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script type="text/javascript">
    var today = new Date();
    var minDate = today.setDate(today.getDate() );

    $('#datePicker').datetimepicker({
    useCurrent: false,
    format: "DD/MM/YYYY",
    minDate: 0
    });

    var firstOpen = true;
    var time;

    $('#timePicker').datetimepicker({useCurrent: false,format: "hh:mm A"}).on('dp.show', function() {
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
    function myfun(key){
        var id = key;
        // alert(id);
        // $('#a').val(id);
        window.location = '<?php echo base_url("selectPatient-obstetrics")?>?id='+id;
    }
    function resetfun(){
        $('#add_patient')[0].reset();
        $('#myModal').modal('hide');
        $('.email').hide();
        $('.age1').hide();
        $(".date_time1").hide();
        $('.cnbdone').hide();
        $('.supervision1').hide();		
    }
    $('#myModal').on('hidden.bs.modal', function (e) {
        $('.email').hide();
        $('.age1').hide();
        $(".date_time1").hide();
        $('.cnbdone').hide();
        $('.supervision1').hide();
        $('#add_patient')[0].reset();
    });
    
</script>

<script>

    var subjectObject = {
        "Consultant": {
            "Junior Consultant" : ["Junior Consultant", "Senior Consultant"],
            "Senior Consultant" : ["Junior Consultant", "Senior Consultant"]
        }, 
        "Trainee" : {
            "Junior Trainee" : ["Junior Trainee", "Senior Trianee"],
            "Senior Trianee" : ["Junior Trainee", "Senior Trianee"]
        } 
    }
    window.onload = function(){
        
        var subjectSel = document.getElementById("cnb_done_by11");
        var topicSel = document.getElementById("cnb_done_by21");
        

        for (var x in subjectObject) {
            subjectSel.options[subjectSel.options.length] = new Option(x, x);
        }
        subjectSel.onchange = function() {
            
            topicSel.length = 1;
           
            for (var y in subjectObject[this.value]) {
            topicSel.options[topicSel.options.length] = new Option(y, y);
            }
        }
        
    }
</script>

<script>

    // function fun(){
    //     var user = $('#usr').val();
    //     $.ajax({ 
    //         type : "POST",
    //         url : '<?php echo base_url("addPatient/search_patients") ?>',
    //         data : {user:user},
    //         success:function(response){
    //             response=jQuery.parseJSON(response);
    //             var mode1='';
    //             $('#patients').empty();
    //             for(var i=0; i<response.length; i++){
    //                 console.log(response[i].patient_id);
    //                 mode1 += '<p onclick = "myfun('+response[i].id+')" style="color:red;">'+response[i].patient_id+'</p>';
    //             }
    //             $('#patients').append(mode1);
    //         }
    //     });
    // }

    function fun(){
        var user = $('#usr').val();
        var check = $('#check2').is(':checked');
        if(check){
            $.ajax({ 
                type : "POST",
                url : '<?php echo base_url("searchPatients-obstetrics") ?>',
                data : {user:user,check:check},
                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    var k = [];
                    $('#patients').empty();
                     $('#patients1').empty();
                    for(var i=0; i<response.message.length; i++){
                        console.log(response.message[i].rad_id);
                        for(var j=0; j<response.msg.length; j++){
                            if(response.message[i].id == response.msg[j].id){
                                k = response.msg[j].id;
                                mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:#1974A7;">'+response.message[i].rad_id+'</p>';
                            }
                        }
                        if(response.message[i].id != k){
                            mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                        }
                    }
                    $('#patients').append(mode1);
                     $('#patients1').append(mode1);
                }
            }); 
        }else{
            $.ajax({ 
                type : "POST",
                url : '<?php echo base_url("searchPatients-obstetrics") ?>',
                data : {user:user},
                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    var k = [];
                    $('#patients').empty();
                     $('#patients1').empty();
                    for(var i=0; i<response.message.length; i++){
                        console.log(response.message[i].rad_id);
                        for(var j=0; j<response.msg.length; j++){
                            if(response.message[i].id == response.msg[j].id){
                                k = response.msg[j].id;
                                mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:#1974A7;">'+response.message[i].rad_id+'</p>';
                            }
                        }
                        if(response.message[i].id != k){
                            mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                        }
                    }
                    $('#patients').append(mode1);
                     $('#patients1').append(mode1);
                }
            });
        }
    }

    function checkemail(){
        var email = $('.patient_email_id').val();
        
        // alert(email);
        if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
            // alert('work');
            $('.email').hide();
        }else{
            $('.email').show();
            
        }
    }

    function checkage(){          

        var age = $('.age').val();
        if(age != '' && age <= 120){
            $('.age1').hide();
            $('.age3').hide();          
        }
        else {
            $('.age3').show(); 
            $('.age1').hide();
            toastr.warning('are you sure');
        }         
    }

    function checkweight(){
        var weight = $('.weight').val();
        if(weight <= 250){
            $('.weight1').hide();
        }else{
            $('.weight1').show();
			toastr.warning('are you sure');
        }
    }

    function checkdatetime(){
        var dateTime = $('#datetimepicker1').val();
        if(dateTime != ''){
            $('.date_time1').hide();
        }
    }
    function selectcnb(){
        var cnbdone = $('.cnb_done_by1').val();
        if(cnbdone != 'Select'){
            $('.cnbdone').hide();
        }
    }
    function checksupervision(){
        var supervision = $('.supervision').val();
        if(supervision != 'Select'){
            $('.supervision1').hide();
        }
    }


    // ------------------------------------bmi_calculation (start)------------------------------

    $('.feet').keyup(function(){
        var feet = $('.feet').val();
        var feet_cm = feet*30.48;
        var inch = $('.inche').val();
        var inch_cm = inch*2.54;
        var total = feet_cm+inch_cm;
        $('.cm').val(total);

        var weight = $('.weight').val();
        var cm_m = $('.cm').val();
        var cm_m1 = cm_m*0.01;
        var total_sqr = cm_m1*cm_m1;
        var bmi_calculation = (weight/total_sqr);
        var bmi_calculation_fix = bmi_calculation.toFixed(2);

        $('.bmi').val(bmi_calculation_fix);

    });
    $('.inche').keyup(function(){
        var feet = $('.feet').val();
        var feet_cm = feet*30.48;
        var inch = $('.inche').val();
        var inch_cm = inch*2.54;
        var total = feet_cm+inch_cm;
        $('.cm').val(total);

        var weight = $('.weight').val();
        var cm_m = $('.cm').val();
        var cm_m1 = cm_m*0.01;
        var total_sqr = cm_m1*cm_m1;
        var bmi_calculation = (weight/total_sqr);
        var bmi_calculation_fix = bmi_calculation.toFixed(2);

        $('.bmi').val(bmi_calculation_fix);
    });
    $('.cm').keyup(function(){
        var cm = $('.cm').val();
        var total = cm/2.54;       
        var cm_feet = (total/12);
        var cm_feet_round = Math.trunc(cm_feet);
        $('.feet').val(cm_feet_round);
        var cm_inch = total-(12*cm_feet_round);
        var cm_inch_round = Math.trunc(cm_inch);
        $('.inche').val(cm_inch_round);

        var weight = $('.weight').val();
        var cm_m = $('.cm').val();
        var cm_m1 = cm_m*0.01;
        var total_sqr = cm_m1*cm_m1;
        var bmi_calculation = (weight/total_sqr);
        var bmi_calculation_fix = bmi_calculation.toFixed(2);

        $('.bmi').val(bmi_calculation_fix);
        
        // alert(cm_feet_pa); 
    });

    // ------------------------------------------bmi_calculation(end)--------------------------------------

    $('#add_patient').submit(function(e){
        e.preventDefault();

        var age1 = '', date_time1 ='', cnbdone = '', supervision2 = '';
        var age = $('.age').val();
        var date_time = $('#datetimepicker1').val();
        var cnb_done = $('.cnb_done_by1').val();
        var supervision = $('.supervision').val();
        // var email = $('.patient_email_id').val();
        // var patient_in = $('.patient_id_index').val();


        if(age != ''){
            age1 = true;            
        }else{
            $('.age1').show();
			toastr.error('specify your age');
        }
        if(date_time != ''){
            date_time1 = true;            
        }else{
            $('.date_time1').show();
			toastr.error('specify the date');
        }
        if(cnb_done != 'Select'){
            cnbdone = true;            
        }else{
            $('.cnbdone').show();
			toastr.error('select the option');
        }

        if(supervision != 'Select'){
            supervision2 = true;            
        }else{
            $('.supervision1').show();
			toastr.error('select the option');
        }
        // if(email != ''){
        //     email2 = true;            
        // }else{
        //     $('.email').show();
		// 	toastr.error('enter correct email-Id');
        // }
        // if(patient_in == 1){
        //     patient_index1 =true;
        // }else{
		// 	toastr.error('Patient Id already exist...');
        // }

        if(age1 && date_time1 && cnbdone && supervision2){
            var formData= new FormData(this);
            $.ajax({

                type : "POST",
                data : formData,
                url : "<?php echo base_url("adding-new-patient") ?>",
            
                contentType: false,
                processData: false,

                success:function(response){

                    response = jQuery.parseJSON(response);

                    if(response.result==1){ 

                        toastr["success"](response.message);   
                        $("#myModal").modal("hide");
                        history.go(0); 

                    }else{

                        toastr["error"](response.message);            


                    }

                }
            });
        }  

    });
    var pre = '<?php echo $preo; ?>';
    if(pre == ''){ 
        $('#precheck').hide();
    }
    var post = '<?php echo $posto; ?>';
    if(post == ''){ 
        $('#postcheck').hide();
    }
    var foll = '<?php echo $follo; ?>';
    if(foll == ''){ 
        $('#follcheck').hide();
    }
    var proccheck = '<?php echo $proccheck; ?>';
    if(proccheck == ''){ 
        $('#proccheck').hide();
    }
    var feedcheck = '<?php echo $feedcheck; ?>';
    if(feedcheck == ''){ 
        $('#feedcheck').hide();
    }
    var ecocheck = '<?php echo $ecocheck; ?>';
    if(ecocheck == ''){ 
        $('#ecocheck').hide();
    }
    
</script>


<style>
    #logo{
         width: 70%;
    }
    .right-menu{
        text-align:end;
        padding-top: 20px;
    }
</style>

