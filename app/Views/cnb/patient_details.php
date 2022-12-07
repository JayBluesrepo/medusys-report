<?php
    echo view('includes/header',$patient, $pat, $pcheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check);    
?>
<!--  <script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.bundle.min.js'); ?>"></script> -->


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
                                        <input type="number" class="form-control" id="age_m" name="age_m" onfocusout="checkage()">
                                        <small class="age1" style="color:red; display:none;">specify your age</small>
                                        <small class="age2" style="color:red; display:none;">enterd value should be greater then 1</small>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                            </div><!--row-->
                            <div class="row">
                                <div class="col-sm-2"><label>Weight(kg)<span style="color:red;">*</span>
                                    <div class="tooltip-24">
                                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <div class="right-24">
                                            <div class="text-content-24">
                                                <h6>Please enter approximate values if exact weight is not known.</h6>
                                                <i></i>
                                            </div>
                                        </div>
                                    </div>
                                </label></div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="weight_m" name="weight_m" onchange="checkweight()">
                                        <small class="weigh1" style="color:red; display:none;">specify your weight</small>
                                        <small class="weigh2" style="color:red; display:none;">enterd weight should be greater then 1</small>
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
                                        <input type="text" class="form-control" id="bmi_m1" name="bmi_m" readonly>
                                    </div>
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
                                    <button type="button" class="btn-close" id="cls">Close</button>
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
                                <th>Created Date & Time</th>
                                <th>Updated Date & Time</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td id="dr_name"></td>
                                    <td id="content">Patient Details</td>
                                    <td id="create_date"></td>
                                    <td id="update_date"></td>
                                    <td id="action"></td>
                                </tr>
                                <tr class="e_consent" style="display:none;">
                                    <td id="dr_name1"></td>
                                    <td id="content1">E-Consent</td>
                                    <td id="create_date1"></td>
                                    <td id="update_date1"></td>
                                    <td id="action1"></td>
                                </tr>
                                <tr class="pre_op" style="display:none;">
                                    <td id="dr_name2"></td>
                                    <td id="content2">Pre-op</td>
                                    <td id="create_date2"></td>
                                    <td id="update_date2"></td>
                                    <td id="action2"></td>
                                </tr>
                                <tr class="cse" style="display:none;">
                                    <td id="dr_name3"></td>
                                    <td id="content3">Procedure - CSE</td>
                                    <td id="create_date3"></td>
                                    <td id="update_date3"></td>
                                    <td id="action3"></td>
                                </tr>
                                <tr class="epidural1" style="display:none;">
                                    <td id="dr_name8"></td>
                                    <td id="content8">Procedure - Epidural</td>
                                    <td id="create_date8"></td>
                                    <td id="update_date8"></td>
                                    <td id="action8"></td>
                                </tr>
                                <tr class="spinal1" style="display:none;">
                                    <td id="dr_name9"></td>
                                    <td id="content9">Procedure - Spinal</td>
                                    <td id="create_date9"></td>
                                    <td id="update_date9"></td>
                                    <td id="action9"></td>
                                </tr>
                                <tr class="csa" style="display:none;">
                                    <td id="dr_name10"></td>
                                    <td id="content10">Procedure - CSA</td>
                                    <td id="create_date10"></td>
                                    <td id="update_date10"></td>
                                    <td id="action10"></td>
                                </tr>
                                <tr class="pacu" style="display:none;">
                                    <td id="dr_name4"></td>
                                    <td id="content4">PACU</td>
                                    <td id="create_date4"></td>
                                    <td id="update_date4"></td>
                                    <td id="action4"></td>
                                </tr>
                                <tr class="follow_up" style="display:none;">
                                    <td id="dr_name5"></td>
                                    <td id="content5">Follow Up</td>
                                    <td id="create_date5"></td>
                                    <td id="update_date5"></td>
                                    <td id="action5"></td>
                                </tr>
                                <tr class="e_feedback" style="display:none;">
                                    <td id="dr_name6"></td>
                                    <td id="content6">E-Feedback</td>
                                    <td id="create_date6"></td>
                                    <td id="update_date6"></td>
                                    <td id="action6"></td>
                                </tr>
                                <tr class="m_feedback" style="display:none;">
                                    <td id="dr_name7"></td>
                                    <td id="content7">M-Feedback</td>
                                    <td id="create_date7"></td>
                                    <td id="update_date7"></td>
                                    <td id="action7"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--modal-body-->
               
                <div class="row mb-3">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">                        
                        <button type="button" class="btn-close" data-dismiss="modal">Close</button>
                    </div>
                </div><!--row-->
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
                    <button type="button" class="btn btn-primary history" data-toggle="modal" ><i class="fa fa-clock-o" aria-hidden="true"></i></button>
                    <button type="button" class="btn-edit edit" style="margin:5px;">Edit</button>
                    <?php 
                        if($upload){
                    ?>
                        <!-- <button type="button" class="btn-upload"style="margin:5px;">Upload Patient Record</button> -->
                    <?php 
                        }                        
                    ?>
                    <button type="button" id="del" class="btn-close">Delete Patient Record</button>  <!---- id="del" ------>
                </div>
                </div><!--row-->
                <h5><b>Patient details</b></h5>
                <!---------------------------Mobile-View-Only----------------------------->
                <div class="row d-block d-sm-none">
                    <div class="col-sm-4">
                        <div class="pat-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th id="patid">Name</th>
                                            <th id="patid1">Patient ID</th>
                                            <th id="patid2">Patient Email-ID</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if(!empty(session()->get('pa_name'))){?>
                                                <td><?php echo $info['patient_name']; ?></td>
                                            <?php }else{ ?>
                                                <td>****</td>
                                            <?php } ?>
                                            <td><?php echo $info['patient_id']; ?></td>
                                            <td><?php echo $info['patient_email_id']; ?></td>
                                          
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                         <div class="pat-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th id="patid3">UIN</th>
                                            <th id="patid">Gender</th>
                                            <th id="patid">Age</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $info['rad_id']; ?></td>
                                            <td><?php echo $info['gender']; ?></td>
                                            <td><?php echo $info['age']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="pat-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th id="patid2">Weight(Kg)</th>
                                            <th id="patid" style="width:30%;">Height <br> (ft.inch) / cms</th>
                                            <th style="padding-left: 12%;">BMI</th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $info['weight_kg']; ?></td>
                                            <td><?php echo $info['hight']; ?> / <?php echo $info['cm']; ?></td>
                                            <td style="padding-left: 12%;"><?php echo $info['bmi']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                 <!---------------------------Mobile-View-Only-End----------------------------->
                <div class="pat-table d-none d-sm-block">
                <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th id="patid">Name</th>
                                    <th id="patid1">Patient ID</th>
                                    <th id="patid2">Patient Email-ID</th>
                                    <th id="patid3">UIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if(!empty(session()->get('pa_name'))){?>
                                        <td><?php echo $info['patient_name']; ?></td>
                                    <?php }else{ ?>
                                        <td>****</td>
                                    <?php } ?>
                                    <td><?php echo $info['patient_id']; ?></td>
                                    <td><?php echo $info['patient_email_id']; ?></td>
                                    <td><?php echo $info['rad_id']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!--table-responsive-->
                </div><!--pat-table-->
                <div class="pat-table d-none d-sm-block">
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
                <h5><b>Hospital Name</b></h5>
                <div class="pat-table2">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>                            
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

<script src="<?php echo base_url('public/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script>

    function checkweight(){
        var weight = $('.weight').val();
        // $('.weight_hide').val(weight);
        // var weight100 = $('.weight_hide').val();
        $('.feet_m').val('');
        $('.inche_m').val('');
        $('.cm_m').val('');
        $('#bmi_m').val('');


        // if(weight == '' || weight <= 0){
        //     toastr.warning('please enter the values to calculate BMI');
        //     $('.age1').hide();
        //     $('.age2').hide();  
        //     $('.weigh1').hide();
        //     $('.weigh2').hide(); 
        //     $('.feet_m').val('');
        //     $('.inche_m').val('');
        //     $('.cm_m').val('');
        //     $(".feet_m").attr("readonly", true); 
        //     $(".inche_m").attr("readonly", true); 
        //     $(".cm_m").attr("readonly", true);  
        // }else{
        //     $(".feet_m").attr("readonly", false); 
        //     $(".inche_m").attr("readonly", false); 
        //     $(".cm_m").attr("readonly", false); 
        //     $('.age1').hide();
        //     $('.age2').hide();  
        //     $('.weigh1').hide();
        //     $('.weigh2').hide();  
        // }
    }

</script>

<script type="text/javascript">
    var today = new Date();
    var minDate = today.setDate(today.getDate());

    $('#datePicker5').datetimepicker({
    useCurrent: false,
    format: "DD/MM/YYYY",
    minDate: minDate
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
    function checkage(){          

        var age = $('#age_m').val();

        if(age >= 120){
            toastr.warning('are you sure');
        }        
    }
</script>

<script>

    $('.history').click(function(){
        // alert('work');
        $('#history').modal("show");
        
        $.ajax({
            type : "POST",
            url : "<?php echo base_url("History")?>",
            // data : {id:id},
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result == 1){

                    $('#dr_name').html(response.drname);
                    $('#dr_name1').html(response.drname);
                    $('#dr_name2').html(response.drname);
                    $('#dr_name3').html(response.drname);
                    $('#dr_name4').html(response.drname);
                    $('#dr_name5').html(response.drname);
                    $('#dr_name6').html(response.drname);
                    $('#dr_name7').html(response.drname);
                    $('#dr_name3').html(response.drname);
                    $('#dr_name8').html(response.drname);
                    $('#dr_name9').html(response.drname);
                    $('#dr_name10').html(response.drname);


                    // const changeDateFormatTo = date => {
                    // const [yy, mm, dd] = date.split(/-/g);
                    // return `${dd}/${mm}/${yy}`;
                    // };

                    $('#create_date').html(response.patient['created_at']);
                    $('#update_date').html(response.patient['updated_at']);                 

                    var action = response.patient['created_at'];
                    var action1 = response.patient['updated_at'];
 
                    if(action && action1){
                        $('#action').html('Edit');
                    }else{
                        $('#action').html('Add');
                    }

                    var patient_id = response.patient['id'];                   
                    
                    if(response.e_consent != null){
                        
                        if(patient_id == response.e_consent['patient_id']){
                            $('.e_consent').show();

                            $('#create_date1').html(response.e_consent['created_at']);
                            $('#update_date1').html(response.e_consent['updated_at']);                 

                            var action2 = response.e_consent['created_at'];
                            var action3 = response.e_consent['updated_at'];
        
                            if(action2 && action3){
                                $('#action1').html('Edit');
                            }else{
                                $('#action1').html('Add');
                            }
                        }
                    }
                    
                    if(response.preop != null){

                        if(patient_id == response.preop['patient_id']){
                            $('.pre_op').show();                      

                            $('#create_date2').html(response.preop['created_at']);
                            $('#update_date2').html(response.preop['updated_at']);                 

                            var action4 = response.preop['created_at'];
                            var action5 = response.preop['updated_at'];
        
                            if(action4 && action5){
                                $('#action2').html('Edit');
                            }else{
                                $('#action2').html('Add');
                            }

                        }
                    }

                    if(response.pacu != null){

                        if(patient_id == response.pacu['patient_id']){
                            $('.pacu').show();                      

                            $('#create_date4').html(response.pacu['created_at']);
                            $('#update_date4').html(response.pacu['updated_at']);                 

                            var action6 = response.pacu['created_at'];
                            var action7 = response.pacu['updated_at'];

                            if(action6 && action7){
                                $('#action4').html('Edit');
                            }else{
                                $('#action4').html('Add');
                            }

                        }
                    }
                    
                    if(response.cse != null){

                        if(patient_id == response.cse['patient_id']){
                            $('.cse').show();                      

                            $('#create_date3').html(response.cse['created_at']);
                            $('#update_date3').html(response.cse['updated_at']);                 

                            var action8 = response.cse['created_at'];
                            var action9 = response.cse['updated_at'];

                            if(action8 && action9){
                                $('#action3').html('Edit');
                            }else{
                                $('#action3').html('Add');
                            }

                        }
                    }

                    if(response.epidural != null){

                        if(patient_id == response.epidural['patient_id']){
                            $('.epidural1').show();                      

                            $('#create_date8').html(response.epidural['created_at']);
                            $('#update_date8').html(response.epidural['updated_at']);                 

                            var action8 = response.epidural['created_at'];
                            var action9 = response.epidural['updated_at'];

                            if(action8 && action9){
                                $('#action8').html('Edit');
                            }else{
                                $('#action8').html('Add');
                            }

                        }
                    }

                    if(response.spinal != null){

                        if(patient_id == response.spinal['patient_id']){
                            $('.spinal1').show();                      

                            $('#create_date9').html(response.spinal['created_at']);
                            $('#update_date9').html(response.spinal['updated_at']);                 

                            var action8 = response.spinal['created_at'];
                            var action9 = response.spinal['updated_at'];

                            if(action8 && action9){
                                $('#action9').html('Edit');
                            }else{
                                $('#action9').html('Add');
                            }

                        }
                    }

                    if(response.csa != null){

                        if(patient_id == response.csa['patient_id']){
                            $('.csa').show();                      

                            $('#create_date10').html(response.csa['created_at']);
                            $('#update_date10').html(response.csa['updated_at']);                 

                            var action8 = response.csa['created_at'];
                            var action9 = response.csa['updated_at'];

                            if(action8 && action9){
                                $('#action10').html('Edit');
                            }else{
                                $('#action10').html('Add');
                            }

                        }
                    }
                     
                    if(response.follow_up != null){

                        if(patient_id == response.follow_up['patient_id']){
                            $('.follow_up').show();                      

                            $('#create_date5').html(response.follow_up['created_at']);
                            $('#update_date5').html(response.follow_up['updated_at']);                 

                            var action10 = response.follow_up['created_at'];
                            var action11 = response.follow_up['updated_at'];

                            if(action10 && action11){
                                $('#action5').html('Edit');
                            }else{
                                $('#action5').html('Add');
                            }

                        }
                    }
                    if(response.m_feedback != null){

                        if(patient_id == response.m_feedback['patient_id']){
                            $('.m_feedback').show();                      

                            $('#create_date7').html(response.m_feedback['created_at']);
                            $('#update_date7').html(response.m_feedback['updated_at']);                 

                            var action12 = response.m_feedback['created_at'];
                            var action13 = response.m_feedback['updated_at'];

                            if(action12 && action13){
                                $('#action7').html('Edit');
                            }else{
                                $('#action7').html('Add');
                            }

                        }
                    }

                    if(response.e_feedback != null){

                        if(patient_id == response.e_feedback['patient_id']){
                            $('.e_feedback').show();                      

                            $('#create_date6').html(response.e_feedback['created_at']);
                            $('#update_date6').html(response.e_feedback['updated_at']);                 

                            var action14 = response.e_feedback['created_at'];
                            var action15 = response.e_feedback['updated_at'];

                            if(action14 && action15){
                                $('#action6').html('Edit');
                            }else{
                                $('#action6').html('Add');
                            }

                        }
                    }
                    
                   
                    

                }
            }
        });
    });

    $(document).ready(function(){
        $('.edit').click(function(){
            
            var id = <?php echo $info['id'] ?>;
            // alert(id);
            $.ajax({
                type : "POST",
                url : "<?php echo base_url("edit-patient-fetch")?>",
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
                        $('#bmi_m1').val(response.message.bmi);
                        $('.date_time_m').val(response.message.procedure_time);
                        $('.time_m').val(response.message.time);
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

                            var weight =  $('#weight_m').val();
                            var cm_m = $('.cm_m').val();
                            var cm_m1 = cm_m*0.01;
                            var total_sqr = cm_m1*cm_m1;
                            var bmi_calculation = (weight/total_sqr);
                            var bmi_calculation_fix = bmi_calculation.toFixed(2);

                            $('#bmi_m1').val(bmi_calculation_fix);
                        });
                        $('.inche_m').keyup(function(){
                            var feet = $('.feet_m').val();
                            var feet_cm = feet*30.48;
                            var inch = $('.inche_m').val();
                            var inch_cm = inch*2.54;
                            var total = feet_cm+inch_cm;
                            $('.cm_m').val(total);

                            var weight =  $('#weight_m').val();
                            var cm_m = $('.cm_m').val();
                            var cm_m1 = cm_m*0.01;
                            var total_sqr = cm_m1*cm_m1;
                            var bmi_calculation = (weight/total_sqr);
                            var bmi_calculation_fix = bmi_calculation.toFixed(2);

                            $('#bmi_m1').val(bmi_calculation_fix);
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

                            var weight =  $('#weight_m').val();
                            var cm_m = $('.cm_m').val();
                            var cm_m1 = cm_m*0.01;
                            var total_sqr = cm_m1*cm_m1;
                            var bmi_calculation = (weight/total_sqr);
                            var bmi_calculation_fix = bmi_calculation.toFixed(2);

                        
                            // var z = 

                            // console.log(z);

                            $('#bmi_m1').val(bmi_calculation_fix);      
                        });

                        // ------------------------------------------bmi_calculation(end)--------------------------------------


                    }else{

                    }
                }

            });
        });
        $('#cls').click(function(){
            $("#myModal1").modal("hide");
        });
        $('#del').click(function(){
            var patient_id = '<?php echo $info['id']; ?>';
            swal({   
                title: "Are you sure?",
                text: "Patient record will be deleted from CNB",
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
                        type : "POST",
                        url : '<?php  echo base_url("delete-patient")?>',
                        data : {patient_id:patient_id},
                        success:function(response){
                            response = jQuery.parseJSON(response);
                            if(response.result==1){
                                toastr["success"](response.message);
                                window.setTimeout(function() {
                                    window.location = '<?php echo base_url("cnb/Dashboard")?>';
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

            var age1 = '', weight1 ='' ;
            var age = $('#age_m').val();
            var weight = $('#weight_m').val();


            if(age != '' && age >=1){
                age1 = true;      
                $('.age1').hide();
                $('.age2').hide();      
            }else if(age == ''){
                $('.age1').show();
                $('.age2').hide();
                toastr.error('specify your age');
            }else if (age <1 ){
                $('.age2').show();
                $('.age1').hide();
                toastr.error('Enterd value should be greater then 1');
            } 

            if(weight != '' && weight >= 1){
                weight1 = true;    
                $('.weigh1').hide();
                $('.weigh2').hide();        
            }else if(weight == ''){
                $('.weigh1').show();
                $('.weigh2').hide();
                toastr.error('specify your weight');
            }else if(weight <1){
                $('.weigh2').show();
                $('.weigh1').hide();
                toastr.error('enterd weight should be greater then 1');
            }  
           
            if(age1 && weight1){
                var formData= new FormData(this);
                $.ajax({
                    type : 'POST',
                    url : '<?php echo base_url("edit-patient-details") ?>',
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
            }                
        });
    });    

</script>


<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
    -webkit-appearance: none; 
    margin: 0; 
    }
</style>


<?php
    echo view('includes/footer');    

?>



