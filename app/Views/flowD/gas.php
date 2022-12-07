<?php
    echo view('includes/flow-header');    
?>

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">



<section class="spec-main">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left" id="add-mobile-new" style="width:305px;">
                <ul>
                    <li><a href="">GAS</a></li>
                </ul>

                <div class="box" id="box-mob" style="width:initial!important;">
                        
                    <div class="search">
                            <h4 class="add-new-a"><button class="btn btn-primary add_new" data-toggle="modal">Add New Patient</button></h4>
                        <div class="form-group" id="input-mob" style="width:50%;">
                            <input type="text" class="form-control" id="usr" placeholder="Search Patient" onkeyup="fun()" style="width:180%;border-radius: 20px;">
                        </div>
                            
                        <!-- <div class="add">
                            <a data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Add Patient">Add New<i class="fa fa-plus ml-2" aria-hidden="true" style=""></i></a>
                        </div> --> 
                    </div>
                    <h5 id="pat-mob"><b> Patient List </b>( UIN )</h5>
                    <div class="patient-list" id="patients" style="overflow-y: scroll;">
                    
                        <?php                                                             
                            foreach($patient as $key=>$val){
                            
                        ?>          
                            <p style="color:red;"><?php echo $val['rad_id']?></p> 

                        <?php 
                            }                             
                        ?>                              
                    </div><!--patient-list-->
                </div><!--box-->

                <div class="d-sm-none" id="accordion" role="tablist" aria-multiselectable="true" style="margin-right:10px;">
                    <div class="card">
                        <div class="card-header" role="tab" id="headingOne">
                            <div class="mb-0">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                <p class="mb-0" style="color:#000;"><b>Click here to view patient list</b></p>
                            </a>
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </div>
                        </div>

                        <div id="collapseOne" class="collapse p-3" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="">
                            <div class="card-block">
                                <?php                                                             
                                foreach($patient as $key=>$val){
                                
                            ?>          
                                <p style="color:red;"><?php echo $val['rad_id']?></p> 

                            <?php 
                                }                             
                            ?>      
                            </div>
                        </div>
                        </div>
                    </div>

            </div>
        </div>
        <div class="col-sm-9">
         
            <div class="spec-right" style="padding: 2% 5% 0 0;">
                <div class="row">
                    <div class="col-sm-12 mb-5">
                          <div class="go-back" style="margin-top:0!important;">
                         <a href="<?php echo base_url('User');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                        </div>   
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('Patient-Management-System');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-gas">
                                        <img src="<?php echo base_url('public/assets/images/gas-icon-new-1.png');?>">
                                    </div>
                                    <div class="speciality-txt-gas-new">
                                        <p style="font-size: 17px;" id="app-req-p">Patient Management System</p>
                                    </div>
                                </div>
                            </a>
                            <ul class="app-req">
                                <!-- <li></li> -->
                                <li>e-PHQ</li>
                                <li>Tele-health</li>
                                <li>e-Consent</li>
                                <li>e-PCOM(e-feedback)</li>
                                <li>e-Care</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('Clinic-Databases');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-gas">
                                        <img src="<?php echo base_url('public/assets/images/gas-icon-new-2.png');?>">
                                    </div>
                                    <div class="speciality-txt-gas-new">
                                        <p>Clinical Databases & Audits</p>
                                    </div>
                                </div>
                            </a>
                            <ul class="app-req">
                                <li>PNB</li>
                                <li>CNB</li>
                                <li>Labour Analgesia</li>
                                <li>Obstetrics Anaesthesia</li>
                                <li>Anaesthesia Logbook</li>
                                <li>Reports & Analytics</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('Mels-Cme');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-gas">
                                        <img src="<?php echo base_url('public/assets/images/gas-icon-new-3.png');?>">
                                    </div>
                                    <div class="speciality-txt-gas-new">
                                        <p>MeLS-CME</p>
                                    </div>
                                </div>
                            </a>
                            <ul class="app-req">
                                <li>GAS Forum</li>
                                <li>GAS Conferences & Workshops</li>
                                <li>GAS e-Library</li>
                                <li>GAS Collaborate</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-----------------------------------------------ADD_NEW--------------------------------------------->
<!-- The Modal -->
<div class="modal fade" id="add-new-pat">
  <div class="modal-dialog modal-md" style="max-width:700px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" id="add-header">
        <h4 class="modal-title">Add New Patient</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
           <!--col--4-->
            <div class="col-sm-12">
                 <div class="add-patient">
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
                            <div class="col-sm-2"><label>Patient ID <!-- <a href="#" data-toggle="tooltip"  title="Enter Hospital Patient-Id here"><i class="fa fa-info-circle" aria-hidden="true"></i></a> --></label></div>
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
                            <div class="col-sm-2"><label>Age <span style="color:red;">*</span></label></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="number" class="form-control age" name="age" onfocusout="checkage()" >
                                    <small class="age1" style="color:red; display:none;">specify your age</small>
                                    <small class="age2" style="color:red; display:none;">enterd value should be greater then 1</small>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-2"><label>Weight(kg) <span style="color:red;">*</span>
                             <div class="tooltip-3">
                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <div class="right-3">
                                    <div class="text-content-3">
                                        <h6>Please enter approximate values if exact weight is not known.</h6>
                                        <i></i>
                                    </div>
                                </div>
                            </div>   
                            </label></div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <input type="number" class="form-control weight" name="weight" step="any" onchange="checkweight()">
                                    <small class="weigh1" style="color:red; display:none;">specify your weight</small>
                                    <small class="weigh2" style="color:red; display:none;">enterd weight should be greater then 1</small>
                                </div>
                                <!-- <input type="number" class='weight_hide'> -->
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <div class="row heigh">
                            <div class="col-sm-2"><label>Height</label></div>
                            <div class="col-sm-10">
                                <ul>
                                    <li><input type="number" class="form-control feet" name="feet" id="hieght" step="any" readonly><label>Feet</label></li>
                                    <li><input type="number" class="form-control inche" name="inche" id="hieght" step="any" readonly><label>Inches &nbsp;&nbsp;or</label></li>
                                    <li><input type="number" class="form-control cm" name="cm" id="hieght" step="any" readonly><label>cms</label></li>
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
                                <button type="submit" class="btn-save Save">Save</button>
                                <button type="button" class="btn-close" id="cls" >Close</button>
                            </div>
                        </div><!--row-->
                    </form>
               </div><!--add-patient--> 
            </div><!--col--9-->
        </div><!--row-->
      </div><!--modal--body-->


    </div>
  </div>
</div>

<script>

    $('#cls').click(function(){
        $("#add-new-pat").modal("hide");
    });

    // --------------------------------------------- PATIENT SEARCH ------------------------------------------

    function fun(){
        var user = $('#usr').val();
      
        $.ajax({ 
            type : "POST",
            url : '<?php echo base_url("searchPatients") ?>',
            data : {user:user},
            success:function(response){
                response=jQuery.parseJSON(response);
                var mode1='';
                // var k = [];
                $('#patients').empty();
                for(var i=0; i<response.message.length; i++){
                    // console.log(response.message[i].rad_id);
                   
                    mode1 += '<p onclick = "myfun('+response.message[i].id+')" style="color:red;">'+response.message[i].rad_id+'</p>';
                    
                }
                $('#patients').append(mode1);
            }
        });      
    }

    $('.add_new').click(function(){
        $('#add-new-pat').modal('show');
    });

    // ------------------------------------ BMI_Calculation ------------------------------

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
       
    });

    // ------------------------- Check AGE --------------------------------------

    function checkage(){          

        var age = $('.age').val();

        if(age >= 120){
            toastr.warning('are you sure');
        }
        


        // if(age != '' && age <= 120){
        //     $('.age1').hide();
        //     // $('.age3').hide();          
        // }
        // else {
        //     // $('.age3').show(); 
        //     $('.age1').hide();
        //     toastr.warning('are you sure');
        // }         
    }

    // ------------------------- Check WEIGHT --------------------------------------

    function checkweight(){
        var weight = $('.weight').val();
        // $('.weight_hide').val(weight);
        // var weight100 = $('.weight_hide').val();
        $('.feet').val('');
        $('.inche').val('');
        $('.cm').val('');
        $('.bmi').val('');


        if(weight == '' || weight <= 0){
            toastr.warning('please enter the values to calculate BMI');
            $('.age1').hide();
            $('.age2').hide();  
            $('.weigh1').hide();
            $('.weigh2').hide(); 
            $('.feet').val('');
            $('.inche').val('');
            $('.cm').val('');
            $(".feet").attr("readonly", true); 
            $(".inche").attr("readonly", true); 
            $(".cm").attr("readonly", true);  
        }else{
            $(".feet").attr("readonly", false); 
            $(".inche").attr("readonly", false); 
            $(".cm").attr("readonly", false); 
            $('.age1').hide();
            $('.age2').hide();  
            $('.weigh1').hide();
            $('.weigh2').hide();  
        }
    }

    // -------------------------------------- ADD - NEW --------------------------------------------

    $('#add_patient').submit(function(e){
        e.preventDefault();

        var age1 = '', weight1 ='' ;
        var age = $('.age').val();
        var weight = $('.weight').val();


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
            $(".Save").text("Submitting...");
            $(".Save").attr("disabled", true);

            $.ajax({

                type : "POST",
                data : formData,
                url : "<?php echo base_url("adding-new-patient-gas-page") ?>",
            
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

</script>








<?php
    echo view('includes/flow-footer');    
?>


<style type="text/css">

input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
	}

	
.box{
  box-shadow: 0px 0px 10px lightgrey;
  padding: 15px;
  border-radius: 8px;
  background-color: #fff;
}
.box h5{
    color:#E34520;
    font-size: 15px;
    font-weight: normal;
}
.search{
 /* display: flex;*/
}
.patient-list {
    border: 1px solid lightgrey;
    height: 400px;
    border-radius: 8px;
    margin-top: 15px;
    padding: 12px;
}
    #add-header {
        border-bottom: 2px solid #379FFF;
    }
    #add-new-pat .modal-lg{
        max-width: 1200px!important;
    } 
    .add-new-a{
        padding: 12px;
    }
    .add-new-a a{
        background-color:#1E5B92;
        color: #fff;
        padding: 8px 20px;
        border-radius: 12px;
      /*  margin-left: -50px;*/
      position: initial!important;
    }
    .add-new-a:after{
        border-bottom: 0!important;
    }
    .add-patient .form-control{
      border-radius: 15px;
      width: 80%;
    }
    .add-patient label {
        color: #303030;
        font-weight: 600;
        font-family: 'Lato', sans-serif!important;
    }
    #hieght {
        width: 60%;
        margin-right: 8px;
    }
    .heigh ul {
        list-style-type: none;
        display: flex;
        padding-left: 0;
    }
    .heigh li {
        display: inline-block;
        display: flex;
    }
    .btn-save{
      background-color: #2499DB!important;
      padding: 5px 45px!important;
      color: #fff!important;
      border-radius: 20px;
      border: 0;
      cursor: pointer;
    }
    .btn-close{
      background-color: #0B5077!important;
      padding: 5px 45px!important;
      color: #fff!important;
      border-radius: 20px;
      border: 0;
      cursor: pointer;
    }

    /*----------------------------------*/
    .tooltip-3 {
        display:inline-block;
        position:relative;
        text-align:justify;
        opacity: initial!important;
    }

    .tooltip-3 .right-3 {
        min-width:210px;
        max-width:400px;
        top:160%;
        left:100%;
        margin-left:20px;
        transform:translate(0, -50%);
        padding:0;
      /*  color:#fff;
        background-color:lightgrey;*/
        color: #fff;
        background-color: #1974A7;
        font-weight:normal;
        font-size:13px;
        border-radius:8px;
        position:absolute;
        z-index:99999999;
        box-sizing:border-box;
      /*  box-shadow:0 1px 8px rgba(0,0,0,0.5);*/
        visibility:hidden; opacity:0; transition:opacity 0.8s;
    }

    .tooltip-3:hover .right-3 {
        visibility:visible; opacity:1;
    }
    .tooltip-3 .text-content-3 {
        padding:10px 20px;
    }
    .tooltip-3 i{
        color: #007BFF!important;
        font-size: 15px;
        padding-left: 5px;
    }

    .tooltip-3 .right-3 i {
        position:absolute;
        top:25%;
        right:100%;
        margin-top:-12px;
        width:12px;
        height:24px;
        overflow:hidden;
    }
    .tooltip-3 .right-3 i::after {
        content:'';
        position:absolute;
        width:12px;
        height:12px;
        left:0;
        top:50%;
        transform:translate(50%,-50%) rotate(-45deg);
        background-color:#1974A7;
       /* box-shadow:0 1px 8px rgba(0,0,0,0.5);*/
    }
    .tooltip-3 h6{
        text-align: justify!important;
        font-size: 15px;
    }

    @media only screen and (min-width:320px) and (max-width:640px){
        .tooltip-3 .right-3{
            top: 69px;
            left: -810%;
            min-width: 250px;
        }
        .tooltip-3 .right-3 i{
            top: -8%;
            bottom: 100%;
            left: 57%;
            margin-left:-18px;
            width:36px;
            height:18px;
        }
        .tooltip-3 .right-3 i::after{
            top: 95%;
        }
        .tooltip-3 h6{
            font-size: 11px;
        }
     } 

</style>