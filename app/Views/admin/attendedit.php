<?php
    echo view('includes/admin-header');    
?>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<div class="col-sm-10">
    <div class="add-conference-right">
        <section class="new-menu">
            <div class="container">
                    <h3 class="conf-tag">Edit Attend </h3>
                <div class="row pt-5">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <header class="cf">
                            <div class="navigation">
                                <nav>
                                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                                    <ul class="mobimenu">
                                        <li><a href="<?php echo base_url('/edit-conference?id='.$conference_id); ?>">About</a></li>
                                       <li><a href="<?php echo base_url('/program-scheduleedit?id='.$conference_id); ?>">Program Schedule</a></li>
                                        <li><a href="<?php echo base_url('/facultyedit?id='.$conference_id); ?>">Faculty</a></li>
                                        <li><a href="<?php echo base_url('/edit-registration?id='.$conference_id); ?>">Registration</a></li>
                                        <li class="conf-act"><a href="<?php echo base_url('/edit-attend?id='.$conference_id); ?>">Attend</a></li>
                                        <li><a href="<?php echo base_url('/edit-certificate?id='.$conference_id); ?>">Certificate</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </header>
                    </div>
                </div><!--row-->
            </div>
        </section>

            <div class="container">
                <div class="attend-conf"> 
                  
                         <div class="row pt-5">
                            <div class="col-sm-2">
                                <label><b>Title</b>:</label>
                            </div>
                            <div class="col-sm-10">
                                <h3><?php echo $title_con_e[0]['title']; ?></h3>
                            </div>
                        </div><!--row-->
                       
                        <div class="link-tabs">
                            <div class="row pt-5">
                                <div class="col-sm-12">

                                    <input type="hidden" name="" id="conf_next_id" value="<?php echo $ps_ids[0]['conference_id'];  ?>">
                                    
                                     <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Enter Single Link For Whole Day</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Enter Links Program Wise</a>
                                        </div>
                                    </nav>
                                    <form id="attend_for_date">
                                    <input id="id1" type = "text" name = "conferene_id" value = "<?php echo $conference_id; ?>">
                                    

                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                           <div class="row" >
                                               <div class="col-sm-9">
                                                 <?php
                                $j = 0; 
                                foreach($attend  as $b){
                                    if($j == 0){

                                        $j++;
                                    ?> 
                                                   <div class="form-group" >
                                                       <input type="text" class="form-control" id='datepicker1' placeholder="Date" name="datename_e" style="width:40%;" value ="<?php echo date('d-m-Y',strtotime($b['date'])); ?>">
                                                   </div>
                                                   <div class="form-group">
                                                       <input type="text" class="form-control" id='' placeholder="Enter Zoom Link" name="zoom_link_e" value = "<?php echo $b['zoom_link'] ?>">
                                                   </div>
                                                   <div class="form-group">
                                                       <input type="text" class="form-control" id='' placeholder="Enter Zoom Membership id" name="zoom_membership_id_e" style="width:40%;" value = "<?php echo $b['zoom_membership_id'] ?>">
                                                   </div>
                                                   <div class="form-group">
                                                       <input type="text" class="form-control" id='' placeholder="Enter Zoom passcode" name="zoom_passcode_e" style="width:40%;" value = "<?php echo $b['zoom_passcode'] ?>">
                                                   </div>
                                                   <div class="form-group">
                                                       <input type="text" class="form-control" id='' placeholder="Enter YouTube Link" name="youtube_link_e" value = "<?php echo $b['youtube_link'] ?>">
                                                   </div>
                                                   <div class="form-group">
                                                       <input type="text" class="form-control" id='' placeholder="Enter Google Meet Link" name="googlemeet_link_e" value = "<?php echo $b['googlemeet_link'] ?>">
                                                   </div>
                                            
                                                </div>
                                               <div class="col-sm-3">
                                               </div>
                                           </div>
                                           <button  type="submit" class="btn">Submit</button>
                                           <?php } } ?>
                                        </div>
                                        </form>
                                        <!---------------------------->
                                         <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="row">
                                                <div class="col-sm-2">
                                                    <h4>Title:</h4>
                                                  <!--   <h4>Date:</h4>
                                                    <h4>Time:</h4> -->
                                                </div>
                                                <div class="col-sm-10">
                                                     <h4><?php echo $title_con_e[0]['title']; ?></h4>
                                                   <!--   <h4><?php echo $dates ?></h4>
                                                     <h4></h4> -->
                                                </div>
                                            </div>
                                            <div class="table-responsive">

                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Start Time </th>
                                                            <th>End Time </th>
                                                            <th>Topic</th>
                                                            <th>Moderator</th>
                                                            <th>Speaker / Faculty</th>
                                                            <th>Links To Attend The Session</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($ps_ids as $value) 
                                                        { 
                                                            ?>

                                                        <tr>
                                                            <td><?php echo date('d-m-Y',strtotime($value['date'])); 
                                                        ?></td>
                                                            <td><?php echo $value['start_time']; ?></td>
                                                            <td><?php echo $value['end_time']; ?></td>
                                                            <td><?php echo $value['topic']; ?></td>
                                                            <td><?php echo $value['moderator']; ?></td>
                                                            <td><?php echo $value['speaker']; ?></td> 
                                                            <td><button class="nav-link active" data-toggle="tab"  onclick= "select_attend(this.value)" value = "<?php echo $value['ps_id']; ?>" role="tab" aria-controls="home">Attend link<?php echo $value['attend_link']; ?></button></td>
                                                           <!--  <td><button type="button" class="submit" id="attend_link">Attend link</button></td> -->
                                                        </tr>      <?php } ?>                 </tbody>
                                                </table>
                                            </div>
                                        </div> 
                                    </div><!--tab--content-->
                                </div>
                            </div>
                            <div class="row pt-5">
                                <div class="col-sm-2" style="">
                                     <!-- <button  type="submit" class="btn">Submit</button> -->
                                    </div> 
                                    <!-- <button type="button" class="btn">
                                    Submit</button></div> -->
                                <div class="col-sm-10"></div>
                            </div><!---->
                             <!-- model-start -->
                             <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">For Single Link</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      
                                    </div>
                                    <div class="modal-body">
                                        <form id="attend_for_date1">
                                        <div class="row" >
                                           <div class="col-sm-9">
                                                <div class="form-group">
                                                    <input id ="ps_id" type="hidden"  name = "ps_id"  id = "ps_id" value = ""> 
                                                </div>
                                                <div class="form-group">
                                                   <input type="text" class="form-control" id='zoom_link' placeholder="Enter Zoom Link" name="zoom_link_se" value = "">
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" id='zoom_membership_id' placeholder="Enter Zoom Membership id" name="zoom_membership_id_se" style="width:40%;" value = "">
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" id='zoom_passcode' placeholder="Enter Zoom passcode" name="zoom_passcode_se" style="width:40%;" value = "">
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" id='youtube_link' placeholder="Enter YouTube Link" name="youtube_link_se" value = "">
                                               </div>
                                               <div class="form-group">
                                                   <input type="text" class="form-control" id='googlemeet_link' placeholder="Enter Google Meet Link" name="googlemeet_link_se" value = "">
                                               </div>
                                          
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
                                                  <button  type="submit" class="btn">Submit</button>
                                                </div> 
                                        </div>
                                    </div>
                                           </form>
                                           </div>
                                           <!-- <div class="col-sm-3"></div> -->
                                  
                                   
                                  </div> <!--  model-end -->

                                </div>
                                
                              </div> 

                        </div>

                  
                </div>
            </div>

    </div><!--add-conference-right--->
</div><!---->      

<!------------------------------------Mobile-Menu--------------------------->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.smobitrigger').smplmnu();
        });

    </script>



<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>
<script>
  $( function() {
    $( "#datepicker1" ).datepicker({dateFormat: "dd-mm-yy"});
  } );
</script>
<script>
    $(document).ready(function(){
        $('#id1').hide();
    });
</script>

<script>
   function select_attend(id){
    $('#ps_id').val(id);
        $.ajax({
                type : "POST",
                url : '<?php  echo base_url("get-ps-details")?>',
                data : {ps_id:id},
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){ 
                        $('#zoom_link').val(response.message['zoom_link']);
                        $('#zoom_membership_id').val(response.message['zoom_membership_id']);
                        $('#zoom_passcode').val(response.message['zoom_passcode']);
                        $('#youtube_link').val(response.message['youtube_link']);
                        $('#googlemeet_link').val(response.message['googlemeet_link']);
                        $('#myModal').modal('show');   
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            });

   }
</script>
<!-- <script>
    
        $("#attend_link").click(function(){
            // var next = $('#nav-profile').val();
            alert('hi');
            $('#lnk').show();

        }); 
    
</script> -->
<script>
$(document).ready(function(){
    
        $('#attend_for_date').submit(function(e){
            e.preventDefault(); 
            // alert('hiii');
            var formData = new FormData(this);
            // formData.append("reg_details_reg",reg_details_reg);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("update-attend")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                        window.location.reload();
                        // $(".add_conferences").modal("hide");        
                       
                        // window.location = '<?php echo base_url("attend")?>?id='+response.data;       
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            }); 
        });
    });

$(document).ready(function(){
    
        $('#attend_for_date1').submit(function(e){
            e.preventDefault(); 
            var formData = new FormData(this);
            // formData.append("reg_details_reg",reg_details_reg);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("update-attend-single")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                         window.location.reload();
                        // $(".add_conferences").modal("hide");        
                       
                        // window.location = '<?php echo base_url("attend")?>?id='+response.data;       
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
    echo view('includes/admin-footer');    
?>          