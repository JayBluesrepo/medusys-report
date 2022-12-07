<?php
    echo view('includes/header-obstetric',$patient);    

?>

<section class="add-patient">

    <!-- Modal Header -->
    <div class="modal-header" id="add-header">
            <h4 class="modal-title">Add New Patient1</h4>
            <!-- <button type="button"  >&times;</button> -->
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
            <form id="add_patient">
                <div class="row">
                    <div class="col-sm-2"><label>Name</label></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div><!--row-->
                <div class="row">
                    <div class="col-sm-2"><label>Patient Email-ID</label></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="patient_email_id">
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div><!--row-->
                <div class="row">
                    <div class="col-sm-2"><label>Patient ID <a href="#" data-toggle="tooltip"  title="Enter Hospital Patient-Id here"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label></div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <input type="text" class="form-control" name="patient_id">
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
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
                            <input type="number" class="form-control age" name="age" onfocusout="checkage()" >
                            <small class="age1" style="color:red; display:none;">specify your age</small>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div><!--row-->
                <div class="row">
                    <div class="col-sm-2"><label>Weight(kg)</label></div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" class="form-control weight" name="weight">
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
                        <div class="form-group">
                            <!-- <input type="text" class="form-control" id="from_date" name=""> -->
                            <input type="text" class="form-control" id='datetimepicker1' name="date_time" onfocusout="checkdatetime()">
                            <small class="date_time1" style="color:red; display:none;">specify the date</small>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div><!--row-->
                <div class="row">
                    <div class="col-sm-2"><label>CNB done by<span class="mandat">*</span><a href="#" data-toggle="tooltip"  title="Junior Consultant < 5 years experience , Senior  Consultant > 5 years experience , Junior Trainee < 2 years experience , Senior Trainee > 2 years experience"><i class="fa fa-info-circle" aria-hidden="true"></i></a></label></div>
                    <div class="col-sm-4">
                        <select class="form-control cnb_done_by1" id="cnb_done_by1" name="cnb_done_by1" onfocusout="selectcnb()">
                            <option value="Select" selected="selected">Select</option>
                            <!-- <option value="Consultant">Consultant</option>
                            <option value="Trainee">Trainee</option> -->
                        </select>
                        
                        <select class="form-control cnb_done_by2" id="cnb_done_by2"  style="margin: 15px 0;"  name="cnb_done_by2">
                            <option value="Select" selected="selected">Select</option>                            
                            <!-- <option value="Junior Consultant">Junior Consultant</option>
                            <option value="Senior Consultant">Senior Consultant</option>
                            <option value="Junior Trainee">Junior Trainee</option>
                            <option value="Senior Trianee">Senior Trianee</option>	 -->
                        </select>
                     
                    </div>
                    <div class="col-sm-6">
                        <small class="cnbdone" style="color:red; display:none;">select the option</small>
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
                        <button type="button" class="btn-close">Close</button>
                    </div>
                </div><!--row-->
            </form>
        </div><!--Modal body-->
</section>

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
        
        var subjectSel = document.getElementById("cnb_done_by1");
        var topicSel = document.getElementById("cnb_done_by2");
        

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


    function checkage(){

        var age = $('.age').val();
        if(age != ''){
            $('.age1').hide();
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

    $(".inche").keyup(function(){
        var inche = $('.inche').val();
        var conversion_to_cm = inche*2.54;
        var conversion_to_cm_fix = conversion_to_cm.toFixed(2);
        // alert(conversion);
        $('.cm').val(conversion_to_cm_fix);

        var weight = $('.weight').val();
        var feet = $('.feet').val();
        var convert_feet_m = feet*0.3048;
        var convert_inc_m = inche*0.0254;
        var total_m = convert_feet_m + convert_inc_m;
        var total_sqr = total_m*total_m;

        var bmi_calculation = (weight/total_sqr);
        var bmi_calculation_fix = bmi_calculation.toFixed(2);

        $('.bmi').val(bmi_calculation_fix);

        // alert(total_m);
    });

    $(".cm").keyup(function(){
        var cm = $('.cm').val();
        var conversion_to_inche = cm*0.39370;
        var conversion_to_inche_fix = conversion_to_inche.toFixed(2);
        
        $('.inche').val(conversion_to_inche_fix);

        var weight = $('.weight').val();
        var inche = $('.inche').val();
        var feet = $('.feet').val();
        var convert_feet_m = feet*0.3048;
        var convert_inc_m = inche*0.0254;
        var total_m = convert_feet_m + convert_inc_m;
        var total_sqr = total_m*total_m;

        var bmi_calculation = (weight/total_sqr);
        var bmi_calculation_fix = bmi_calculation.toFixed(2);

        $('.bmi').val(bmi_calculation_fix);
    });

    // ------------------------------------------bmi_calculation(end)--------------------------------------

    $('#add_patient').submit(function(e){
        e.preventDefault();

        var age1 = '', date_time1 ='', cnbdone = '', supervision2 = '';
        var age = $('.age').val();
        var date_time = $('#datetimepicker1').val();
        var cnb_done = $('.cnb_done_by1').val();
        var supervision = $('.supervision').val();

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

        if(age1 && date_time1 && cnbdone && supervision2){
            var formData= new FormData(this);
            $.ajax({

                type : "POST",
                data : formData,
                url : "<?php echo base_url("addPatient/adding_new_patient") ?>",

                contentType: false,
                processData: false,

                success:function(response){

                    response = jQuery.parseJSON(response);

                    if(response.result==1){ 

                        toastr["success"](response.message);   


                    }else{

                        toastr["error"](response.message);            


                    }

                }
            });
        }  

    });

</script>

<?php
    echo view('includes/footer-obstetric');    

?>