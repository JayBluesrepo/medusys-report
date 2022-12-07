<?php
    echo view('includes/header',$patient, $pat, $pcheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    

?>
<!--  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script> -->


<div class="tab-content">

    <!------------------------------------------------EDIT-PATIENT-START-------------------------------->

    <section class="edit-patient">
        <div class="modal fade" id="myModal1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    <!-- Modal Header -->
                    <div class="modal-header" id="add-header">
                        <h4 class="modal-title">Edit Patient</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="edit_patient">
                            <div class="row">
                                <div class="col-sm-2"><label>Name</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name_m" name="name_m">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Patient Email-ID</label></div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email_id_m" name="email_id_m">
                                    </div>
                                </div>
                                <div class="col-sm-4"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Patient ID<!--  <a href="#" class="tip" data-toggle="tooltip"  title="Enter Hospital Patient-Id here"><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="patient_id_m" name="patient_id_m">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Gender</label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="gender_m" name="gender_m">
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
                                        <input type="number" class="form-control" id="age_m" name="age_m">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Weight(kg)</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="weight_m" name="weight_m">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row heigh">
                                <div class="col-sm-2"><label>Height</label></div>
                                <div class="col-sm-10">
                                    <ul>
                                        <li><input type="text" class="form-control feet_m" name="feet_m" id="hieght"><label>Feet</label></li>
                                        <li><input type="text" class="form-control inche_m" name="inche_m" id="hieght"><label>Inches &nbsp;&nbsp;or</label></li>
                                        <li><input type="text" class="form-control cm_m" name="cm_m" id="hieght"><label>cms</label></li>
                                    </ul>
                                </div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>BMI</label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="bmi_m" name="bmi_m" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Block Procedure Date and Time<span class="mandat">*</span></label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <!-- <input type="text" class="form-control" id="from_date" name=""> -->
                                        <input type="text" class="form-control date_time_m" id='datetimepicker1' name="date_time_m" placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"></div>
                                <div class="col-sm-4">
                                        <!-- <div class="form-group">
                                        <input type="text" class="form-control" id='mytimeicker' name="">
                                        </div> -->
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2">
                                   <!--  <label style="width: 115px;">CNB done by<span class="mandat">*</span><a href="#" class="tip" data-toggle="tooltip" data-placement="bottom"  title="Junior Consultant < 5 years experience , Senior  Consultant > 5 years experience , Junior Trainee < 2 years experience , Senior Trainee > 2 years experience"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label> -->
                                   <label>CNB done by
                                    <div class="tooltip" id="tip">
                                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <div class="right">
                                            <div class="text-content">
                                                <h6>Junior Consultant < 5 years experience , Senior  Consultant > 5 years experience , Junior Trainee < 2 years experience , Senior Trainee > 2 years experience.</h6>
                                                <i></i>
                                            </div>
                                        </div>
                                    </div>
                                    </label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="cnb_done_by1_m" name="cnb_done_by1_m">
                                        <option value="">Select</option>
                                        <option value="Consultant">Consultant</option>
                                        <option value="Trainee">Trainee</option>
                                    </select>
                                    <select class="form-control" id="cnb_done_by2_m" name="cnb_done_by2_m" style="margin: 15px 0;">
                                        <option value="Junior Consultant">Junior Consultant</option>
                                        <option value="Senior Consultant">Senior Consultant</option>
                                        <option value="Junior Trainee">Junior Trainee</option>
                                        <option value="Senior Trianee">Senior Trianee</option>	
                                    </select>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Supervision<span class="mandat">*</span></label></div>
                                <div class="col-sm-4">
                                    <select class="form-control" id="supervision_m" name="supervision_m">
                                        <option value="">Select</option>
                                        <option value="Direct Supervision">Direct Supervision</option>
                                        <option value="Independent Supervision">Independent Supervision</option>
                                    </select>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row" style="padding-top:15px;">
                                <div class="col-sm-2"><label>Hospital</label></div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="hospital_m" name="hospital_m">
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-7"></div>
                                <div class="col-sm-5 pt">
                                    <button type="submit" class="btn-save">Update</button>
                                    <button type="button" class="btn-close">Close</button>
                                </div>
                            </div><!--row-->
                        </form>
                    </div><!--modal-body-->
                    
                </div><!--modal-content-->
            </div>
        </div>
    </section><!--edit-patient-->
    <!------------------------------------------------EDIT-PATIENT-END---------------------------------->
    <!--------------------------------HISTORY START-------------------------------->
    <section class="history">
        <!-- The Modal -->
        <div class="modal fade" id="history">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            
                <!-- Modal Header -->
                <div class="modal-header" id="add-header" style="background-color:#E2E2E2;justify-content: center;">
                <h4 class="modal-title" style="font-weight: 600;">Patient History</h4>
                <button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
                </div>
                
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <th>Doctor Name</th>
                        <th>Edited Section</th>
                        <th>Updated Date & Time</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        
                        <?php if($info['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>Patient Details</td>
                                <td><?php echo $info['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>Patient Details</td>
                                <td><?php echo $info['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($econ['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>E-Consent</td>
                                <td><?php echo $econ['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>E-Consent</td>
                                <td><?php echo $econ['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($preo['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>Pre-op</td>
                                <td><?php echo $preo['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>Pre-op</td>
                                <td><?php echo $preo['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($econ['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>Procedure</td>
                                <td><?php echo $econ['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>Procedure</td>
                                <td><?php echo $econ['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($posto['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>PACU</td>
                                <td><?php echo $posto['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>PACU</td>
                                <td><?php echo $posto['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($follo['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>Follow Up</td>
                                <td><?php echo $follo['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>Follow Up</td>
                                <td><?php echo $follo['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        
                        <?php if($mf['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>Manually-Feedback</td>
                                <td><?php echo $mf['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>Manually-Feedback</td>
                                <td><?php echo $mf['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>
                        <?php if($ef['created_at'] != ''){ ?>
                            <tr>
                                <td>Patient Name</td>
                                <td>E-Feedback</td>
                                <td><?php echo $ef['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php }else{ ?>
                            <tr style="display:none;">
                                <td>Patient Name</td>
                                <td>E-Feedback</td>
                                <td><?php echo $ef['created_at']; ?></td>
                                <td>add</td>
                            </tr>
                        <?php } ?>

                        </tbody>
                    </table>
                    </div>
                </div><!--modal-body-->
                
            </div>
            </div>
        </div>
    </section><!--history-->
    <!-------------------------------HISTORY END---------------------------------->
    <!---------------------------------PATIENT-DETAILS-START data-toggle="modal" data-target="#myModal1"-------------------------->
    <div role="tabpanel" class="tab-pane active" id="home">
        <section class="patient-details">
                <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-8" style="text-align: end;">
                    <button type="button" class="btn btn-primary history" data-toggle="modal" data-target="#history"><i class="fa fa-clock-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn-edit edit" style="margin:5px;">Edit</button>
                    <!-- <button type="button" class="btn-upload"style="margin:5px;">Upload Patient Record</button> -->
                    <button type="button" class="btn-close" id="del">Delete Patient</button>
                </div>
                </div><!--row-->
                <h5><b>Patient details</b></h5>
                <div class="pat-table">
                <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th id="patid">Name</th>
                                    <th id="patid1">Patient ID</th>
                                    <th id="patid2">Patient Email-ID</th>
                                    <th id="patid3">RADUID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $info['patient_name']; ?></td>
                                    <td><?php echo $info['patient_id']; ?></td>
                                    <td><?php echo $info['patient_email_id']; ?></td>
                                    <td><?php echo $info['rad_id']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div><!--pat-table-->
                <div class="pat-table">
                <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th id="patid">Gender</th>
                                    <th id="patid">Age</th>
                                    <th id="patid2">Weight(Kg)</th>
                                    <th id="patid">Height (ft.inch) / cms</th>
                                    <th style="padding-left: 12%;">BMI</th> 
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $info['gender']; ?></td>
                                    <td><?php echo $info['age']; ?></td>
                                    <td><?php echo $info['weight_kg']; ?></td>
                                    <td><?php echo $info['hight']; ?> / <?php echo $info['cm']; ?></td>
                                    <td style="padding-left: 12%;"><?php echo $info['bmi']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div><!--pat-table-->
                <h5><b>Hospital and scheduled date details</b></h5>
                <div class="pat-table2">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td class="bg-pat2">Procedure <br> Date and Time</td>
                                <td><?php echo $info['procedure_time']; ?></td>
                            </tr>
                            <tr>
                                <td class="bg-pat2">CNB Done By</td>
                                <td><?php echo $info['cnb_done_by1']; ?> - <?php echo $info['cnb_done_by2']; ?></td>
                            </tr>
                            <tr>
                                <td class="bg-pat2">Supervision</td>
                                <td><?php echo $info['supervision']; ?></td>
                            </tr>
                            <tr>
                                <td class="bg-pat2">Hospital Name</td>
                                <td><?php echo $info['hospital']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div><!--pat-table2-->
        </section>
    </div><!---Tab1--->
    <!---------------------------------PATIENT-DETAILS-END-------------------------->
</div>

<script>

    // $('.history').click(function(){
    //     // alert('work');
    //     $.ajax({
    //         type : "POST",
    //         url : "<?php echo base_url("patientDetails/history")?>",
    //         // data : {id:id},
    //     });
    // });

    $(document).ready(function(){
        $('.edit').click(function(){
            
            var id = <?php echo $info['id'] ?>;
            // alert(id);
            $.ajax({
                type : "POST",
                url : "<?php echo base_url("patientDetails/edit_patient_fetch")?>",
                data : {id:id},
                success:function(response) {
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){

                        $("#myModal1").modal("show");   
                        $('#name_m').val(response.message.patient_name);
                        $('#email_id_m').val(response.message.patient_email_id);
                        $('#patient_id_m').val(response.message.patient_id);
                        $('#gender_m').val(response.message.gender);
                        $('#age_m').val(response.message.age);
                        $('#weight_m').val(response.message.weight_kg);
                        $('#bmi_m').val(response.message.bmi);
                        $('.date_time_m').val(response.message.procedure_time);
                        $('#cnb_done_by1_m').val(response.message.cnb_done_by1);
                        $('#cnb_done_by2_m').val(response.message.cnb_done_by2);                        
                        $('#supervision_m').val(response.message.supervision);
                        $('#hospital_m').val(response.message.hospital);
                        $('.cm_m').val(response.message.cm);          

                        var height = response.message.hight;                        
                        var height_split = height.split('.');             
                        // alert(height_split[0]);

                        $('.feet_m').val(height_split[0]);
                        $('.inche_m').val(height_split[1]);     
                        
                        // ------------------------------------bmi_calculation (start)------------------------------

                        $('.feet_m').keyup(function(){
                            var feet = $('.feet_m').val();
                            var feet_cm = feet*30.48;
                            var inch = $('.inche_m').val();
                            var inch_cm = inch*2.54;
                            var total = feet_cm+inch_cm;
                            $('.cm_m').val(total);

                            var weight =  response.message.weight_kg;
                            var cm_m = $('.cm_m').val();
                            var cm_m1 = cm_m*0.01;
                            var total_sqr = cm_m1*cm_m1;
                            var bmi_calculation = (weight/total_sqr);
                            var bmi_calculation_fix = bmi_calculation.toFixed(2);

                            $('#bmi_m').val(bmi_calculation_fix);
                        });
                        $('.inche_m').keyup(function(){
                            var feet = $('.feet_m').val();
                            var feet_cm = feet*30.48;
                            var inch = $('.inche_m').val();
                            var inch_cm = inch*2.54;
                            var total = feet_cm+inch_cm;
                            $('.cm_m').val(total);

                            var weight =  response.message.weight_kg;
                            var cm_m = $('.cm_m').val();
                            var cm_m1 = cm_m*0.01;
                            var total_sqr = cm_m1*cm_m1;
                            var bmi_calculation = (weight/total_sqr);
                            var bmi_calculation_fix = bmi_calculation.toFixed(2);

                            $('#bmi_m').val(bmi_calculation_fix);
                        });
                        $('.cm_m').keyup(function(){
                            var cm = $('.cm_m').val();
                            var total = cm/2.54;       
                            var cm_feet = (total/12);
                            var cm_feet_round = Math.trunc(cm_feet);
                            $('.feet_m').val(cm_feet_round);
                            var cm_inch = total-(12*cm_feet_round);
                            var cm_inch_round = Math.trunc(cm_inch);
                            $('.inche_m').val(cm_inch_round);

                            var weight =  response.message.weight_kg;
                            var cm_m = $('.cm_m').val();
                            var cm_m1 = cm_m*0.01;
                            var total_sqr = cm_m1*cm_m1;
                            var bmi_calculation = (weight/total_sqr);
                            var bmi_calculation_fix = bmi_calculation.toFixed(2);

                            $('#bmi_m').val(bmi_calculation_fix);      
                        });

                        // ------------------------------------------bmi_calculation(end)--------------------------------------


                    }else{

                    }
                }

            });
        });

        $('#del').click(function(){
            var patient_id = '<?php echo $info['id']; ?>';
            swal({   
                title: "Are you sure?",
                text: "You want to delete this?",
                type: "warning",   showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: false 
            },
            function(isConfirm){   
                if(isConfirm){ 
                    $(".sweet-alert").hide();
                    $(".sweet-overlay").hide();
                    $.ajax({
                        url : '<?php  echo base_url("patientDetails/delete_patient")?>',
                        data : {patient_id:patient_id},
                        success:function(response){
                            response = jQuery.parseJSON(response);
                            if(response.result==1){
                                toastr["success"](response.message);
                                window.setTimeout(function() {
                                    window.location = '<?php echo base_url("Dashboard")?>';
                                }, 2000);
                            }
                            else
                                toastr["error"](response.message);
                        }
                    });
                }
                else 
                {
                    $(".sweet-alert").hide();
                    $(".sweet-overlay").hide();
                }
            });
        });
        
        $('#edit_patient').submit(function(e){
            e.preventDefault();
            
            var formData= new FormData(this);


            $.ajax({
                type : 'POST',
                url : '<?php echo base_url("patientDetails/edit_patient_details") ?>',
                data : formData,
                contentType: false,
                processData: false,

                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){

                        toastr["success"](response.message);
					    $("#myModal1").modal("hide");
                        // history.go(0); 
                        window.setTimeout(function() {
                                history.go(0);
                        }, 1000);

                    }else{

                        toastr["error"](response.message);
                    }
                }
            });
                
        });
    });

    

   

    

</script>



<?php
    echo view('includes/footer');    

?>