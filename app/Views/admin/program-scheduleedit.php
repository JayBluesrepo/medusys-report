<?php
    echo view('includes/admin-header');    
?>

<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">


<div class="col-sm-10">
    <div class="add-conference-right">
       
        <section class="new-menu">
            <div class="container">
                <h3 class="conf-tag">Edit Program Schedule </h3>
                <div class="row pt-5">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <header class="cf">
                            <div class="navigation">
                                <nav>
                                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                                    <ul class="mobimenu">
                                        <li><a href="<?php echo base_url('/edit-conference?id='.$conference_id); ?>">About</a></li>
                                       <li class="conf-act"><a href="<?php echo base_url('/program-scheduleedit?id='.$conference_id); ?>">Program Schedule</a></li>
                                        <li><a href="<?php echo base_url('/facultyedit?id='.$conference_id); ?>">Faculty</a></li>
                                        <li><a href="<?php echo base_url('/edit-registration?id='.$conference_id); ?>">Registration</a></li>
                                        <li><a href="<?php echo base_url('/edit-attend?id='.$conference_id); ?>">Attend</a></li>
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
                <div class="prog-schedule">
                   <form id="programschedule">
              
                        <input type="hidden" class="form-control insert_id" id="insert_id" name="insert_id" value = '0'>

                        <!-- hide the id -->
            <input type="hidden" name ="conferene_id" id="conferene_id" value = "<?php echo $programs[0]['conference_id']; ?>"> 


                        <div class="row pt-5">
                            <div class="col-sm-2">
                                <label><b>Title</b>:</label>
                            </div>
                            <div class="col-sm-10">
                                <h3 ><?php echo $title_con_e[0]['title']; ?></h3>    
                            </div>
                        </div><!--row-->
                        <div class="table-responsive pt-5">
                            
                            <table class="table table-bordered" id="change">
                                <thead>
                                    <tr >
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Topic</th>
                                        <th>Moderator</th>
                                        <th>Speaker / Faculty</th>
                                        <th>Pre-reading material</th>
                                        <th>Pre-reading material Upload files</th>
                                        <th></th>
                                        </tr>
                                </thead>
                                <tbody>
                                 
                                    <?php 
                                      
                                    foreach ($programs as $key => $values) 
                                    {
                                    ?>
                              
                                    <tr>
                                        
                                        <input id ="ps_id" type="hidden"  name = "ps_id[]" value = "<?php echo $values['ps_id']; ?>">
                                        <td>
                                        <input class="form-control" id='+datepicker+' name="datename_e[]" value = "<?php echo date('d-m-Y',strtotime($values['date'])); ?>" /></td>
                                        <td><input type="text" class="form-control" id='+timepicker+' name="start_time_e[]"  style="width:100px;" value = "<?php echo $values['start_time'] ?>" /></td>
                                        <td ><input class="form-control" name="end_time_e[]"  type="text" id='+timepicker1+'  style="width:100px;" value = "<?php echo $values['end_time'] ?>" /></td>
                                        <td><input type="text" name="topic_e[]" class="form-control" placeholder="Enter the Topic" value = "<?php echo $values['topic'] ?>"></td>



                                        <td><input type="text" class="form-control select11" name="moderator_con_sub_e[]" value="<?php echo $values['moderator'] ?>" list="ice-cream-flavors"  id='+moderator+' >
					<datalist id="ice-cream-flavors">
                                        <option value="">Select</option>
						<?php
                    					foreach($dr_name as $key=>$val){
                   					                                    
               					 ?>
                                           
                                                <option ><?php echo $val['f_name'] ;?> <?php echo $val['l_name'] ;?> </option>
                                            <?php } ?> </datalist>
                                        </td>


                                        <td><input type="text"  class="form-control select1"  list="ice-cream-flavors" value="<?php echo $values['speaker'] ?>" id='+speaker+' name="speaker_con_sub_e[]"  >
					<datalist id="ice-cream-flavors">;
					<option value="">Select</option>
                                         
							<?php
                    					foreach($dr_name as $key=>$val){
                   					                                    
               					 ?>
						
                                           
                                                                                        
                                          <option><?php echo $val['f_name'] ;?> <?php echo $val['l_name'] ;?></option>
                                                <?php } ?></datalist>
                                        </td>


                                        <td><input type="text" class="form-control" name="upload_file_e[]" placeholder="Enter link"  value = "<?php echo $values['upload_file'] ?>" ></td>
                                        <td><input type="file" class="form-control" name="upload_data_e[]" placeholder="Upload file"  value = "<?php echo $values['upload_data_files'] ?>" ></td>

                                         </td>
                                         <td>
                                         <button type="button" class="btn" onclick="delete_id(this.value)" value="<?php echo $values['ps_id']; ?>" id="delete">Delete</button></td>
                                       <!--  <td>
                                        <button onclick="document.getElementById('id01').style.display='block'" id="ps_id" class="form-control">Delete</button></td> -->
                                    </tr>

                                    <?php
                                        } 
                                    ?>
                           
                                </tbody>
                                
                            </table>
                        </div><!--table-responsive-->
                                        

  
  
                       

                        <button  type="button" class="glyphicon glyphicon-plus add_more_button1"><i class="fa fa-plus certify" aria-hidden="true"></i></button>
                        <button  type="submit" class="btn">update & Save</button>
                        <!-- <button  type="button" id="upd class="submit"></button> -->
                        
                    <!-- <button  type="submit" value="submit"  class="btn">Save</button> -->
                   </form>
                </div><!--prog-schedule-->

                        
            </div>


       
     </div><!--add-conference-right--->
</div><!---->


     




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- for date picker -->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>
<!-- <script>
  $( function() {
    $("#datepicker").datepicker({dateFormat: "dd-mm-yy"});
  } );
  </script> -->
<!-- for time picker -->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/timepicki.js'); ?>"></script>

<script>
    $(document).ready(function(){
        $('#id1').hide();
    });
</script>

<!-------------------------------------Mobile-Menu---------------------------->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.smobitrigger').smplmnu();
        });

    </script>


<!-- <script>
    
        $("#delete").click(function(){
            var next = $('#conf_next_id').val();
            // alert('hi');
            window.location = '<?php echo base_url("del-programschedule")?>?id='+next;

        }); 
</script>
<script>

         $("#update").click(function(){
            var nextttt = $('#conf_next_id').val();
            window.location = '<?php echo base_url("upd-programschedule")?>?id='+nextttt;

        }); 
    
</script> -->

<!-- for add progrm event row -->
<script>


    $(".add_more_button1").click(function(){
        addrow();
    });

    function addrow(){

        var insert_id = $('#insert_id').val();   
        insert_id = parseFloat(insert_id) + 1;

        $("#insert_id").val(insert_id);
    
        var moderator = "moderator"+insert_id;
        var speaker = "speaker"+insert_id;
        var timepicker = "timepicker"+insert_id;
        var timepicker1 = "timepicker1"+insert_id;
        var datepicker = "datepicker"+insert_id;
        var ps_id = "ps_id"+insert_id;
        var ps = "ps"+insert_id;
        var minus = "minus"+insert_id;
    var mode = '';
    
    mode += '<tr>';

    mode += '<input type="hidden" class="form-control" name="ps_id[]" value="new" id='+ps_id+' >';
    mode += '<td ><input class="form-control z" id='+datepicker+' name="datename_e[]"   /></td>';

    mode += '<td ><input type="text" class="form-control" id='+timepicker+' name="start_time_e[]"   style="width:100px;"  /></td>';
    mode += '<td ><input class="form-control" type="text" id='+timepicker1+' name="end_time_e[]" style="width:100px;"  /></td>';
    mode += '<td><input type="text" class="form-control"  placeholder="Enter the Topic" name="topic_e[]"></td>';

        mode +='<td><input list="ice-cream-flavors" class= "form-control" name="moderator_con_sub_e[]"  required>';

         mode +='<datalist id="ice-cream-flavors">';
         mode +='<option value="">Select</option>';

        mode +='<?php
                    foreach($dr_name as $key=>$val){
                                                      
                ?>';
             mode +='<option ><?php echo $val['f_name'] ;?> <?php echo $val['l_name'] ;?> </option>';

        mode +='<?php }?> </datalist></td>';

   

        mode +='<td><input list="ice-cream-flavors" class= "form-control" name="speaker_con_sub_e[]"   required >';
        // mode +='<datalist id="ice-cream-flavors">';
        mode +='<datalist id="ice-cream-flavors">';
        mode +='<option value="">Select</option>';

        mode +='<?php
                    foreach($dr_name as $key=>$val){
                                                         
                ?>';
        mode +='<option ><?php echo $val['f_name'] ;?> <?php echo $val['l_name'] ;?> </option>';

        mode +='<?php }  ?> </datalist></td>';


   mode += '<td><input type="text" class="form-control" placeholder="Enter link or file" name="upload_file_e[]"></td>';

   mode += '<td><button  type="button" class="glyphicon glyphicon-minus remove submit"><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';
    // mode += '<td><button  type="submit" value="submit"  class="btn">Save</button></td>';
     mode += '</tr>';
   
     
     // mode += '<button  type="submit" value="submit"  class="btn">Save</button>';

    $("#change").append(mode).fadeIn('slow');
    $("#"+datepicker).datepicker({dateFormat: "dd-mm-yy"});
    
    // $('.z').datepicker({dateFormat: "dd-mm-yy"});
    $('.z').datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd-mm-yy",
      onSelect: function (dateString, txtDate) {
        var id_get = $(this).attr('id');
        var id_string = id_get.slice(-1);
            myFun1(dateString,id_string);
           
          } 
    });

    $(function() {
    $("#"+timepicker).timepicki(); 
    $("#"+timepicker1).timepicki();
    } ); 

        $(".remove").click(function(){
        $(this).closest('tr').remove();
    });


}


$(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   $(".select1").select2();
   $(".select11").select2();
});

// function remove(key){

//     var z = key;
    
//     // var x = "ps"+z;
//     // $('.'+x+'').remove(); 

// }

</script>

<script>
    $(".remove").click(function(){
        $(this).closest('tr').remove();
    });
</script>


<script>
 $('#programschedule').submit(function(e){  
        e.preventDefault();
        var formdata = new FormData(this);
         // $(".update").text("Updating...");
         // $(".update").attr("disabled", true);
        $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("update-programschedule")?>',
            data   : formdata,
            contentType: false,
            processData: false,                   
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                {  
                    toastr["success"](response.message);
                    // window.location.reload();
                    // $('.update').removeAttr("disabled");
                    //     $(".update").text("Update");  
                        // window.setTimeout(function() {
                           window.location = '<?php echo base_url("facultyedit")?>?id='+response.data
                    // }
                       

                }
                else 
                {
                    // toastr["error"](response.message);   
                     toastr["error"](response.message);
                        // $('.update').removeAttr("disabled");
                        // $(".update").text("Update");         
                }
            }
        });
 });

 function delete_id(ps_id){
    // alert(ps_id);
    $con_id = $("#conferene_id").val();
     if (confirm("Are you sure?")) {
    // alert($con_id);
    $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("delete-programschedule")?>',
            data   : {ps_id:ps_id, con_id : $con_id},                   
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                { 
                       
                    toastr["success"](response.message);
                    window.location.reload();


                }
                else 
                {
                    toastr["error"](response.message);
                         
                }

            }

           }); 
}

 }

 
</script>


<?php
    echo view('includes/admin-footer');    
?>       