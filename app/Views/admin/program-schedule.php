<?php
    echo view('includes/admin-header',$programschedule);    
?>

<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">


<div class="col-sm-10">
    <div class="add-conference-right">
        
        <section class="new-menu">
            <div class="container">
                <h3 class="conf-tag">Add Program Schedule</h3>
                <div class="row pt-5">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <header class="cf">
                            <div class="navigation">
                                <nav>
                                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                                    <ul class="mobimenu">
                                        <li><a href="Conference">About</a></li>
                                        <li class="conf-act"><a href="Program-schedule">Program Schedule</a></li>
                                        <li><a href="">Faculty</a></li>
                                        <li><a href="">Registration</a></li>
                                        <li><a href="">Attend</a></li>
                                        <li><a href="">Certificate</a></li>
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

                        <div class="row pt-5">
                            <div class="col-sm-2">
                                <label><b>Title</b>:</label>
                            </div>
                            <div class="col-sm-10">
                                <h3><?php echo $title_con[0]['title']; ?></h3>
                            </div>
                        </div><!--row-->
                        <div class="table-responsive pt-5">
                            <!-- hide the id -->
                            <input id="id1" type = "text" name = "conferene_id" value = "<?php echo $conference_id; ?>"> 
                            <table class="table table-bordered" id="ps">
                                <thead>
                                    <tr >
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Topic</th>
                                        <th>Moderator</th>
                                        <th>Speaker / Faculty</th>
                                        <th>Pre-reading material</th>
                                        <th></th>
                                        </tr>
                                </thead>
                                
                            </table>
                        </div><!--table-responsive-->
                        <button type="button" class="submit" >+ Add Program Event</button>
                        <button  type="submit" value="submit"  class="btn">Save</button>
                   </form>
                </div><!--prog-schedule-->
            </div>
     
     </div><!--add-conference-right--->
</div><!---->


<!----------------------Mobile-Menu------------------------>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.smobitrigger').smplmnu();
    });

</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<!-- for date picker -->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>

<!-- for time picker -->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/timepicki.js'); ?>"></script>
  <!-- <script type='text/javascript'> 
    $(function() {
    $('#timepicker').timepicki(); 
    $('#timepicker1').timepicki();
    } ); 
</script> -->
<!-- hiding id of conference id -->
<script>
    $(document).ready(function(){
        $('#id1').hide();
    });
</script>

<!-- for add progrm event row -->
<script>

    $(document).ready(function(){
        let count = Number(localStorage.getItem('count')) || 0;
        // alert(`count ${count}`);
        localStorage.setItem('count', count + 1);
        addrow();
    });

    $(".submit").click(function(){
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

        var select_moderator = 'select_moderator'+insert_id;
        var select_faculty = 'select_faculty'+insert_id;
        var ps = "ps"+insert_id;
        var minus = "minus"+insert_id;
        var mode = '';

        mode += '<tr class='+ps+'>';
        mode += '<td ><input class="form-control z" name="datename[]" id='+datepicker+' required/></td>';
        mode += '<td ><input type="text" class="form-control" name="start_time[]" id='+timepicker+'   style="width:100px;" /></td>';
        mode += '<td ><input class="form-control" id='+timepicker1+' type="text" name="end_time[]" style="width:100px;"/></td>';
        mode += '<td><input type="text" class="form-control"  placeholder="Enter the Topic" name="topic[]"></td>';
 
   

        mode +='<td><input list="ice-cream-flavors" class= "form-control" name="moderator_con_sub[]" id='+moderator+' required>';

         mode +='<datalist id="ice-cream-flavors">';
         mode +='<option value="">Select</option>';

        mode +='<?php
                    foreach($dr_name as $key=>$val){
                    if($val['f_name'] != ''){                                     
                ?>';
             mode +='<option ><?php echo $val['f_name'] ;?> <?php echo $val['l_name'] ;?> </option>';

        mode +='<?php }} ?> </datalist></td>';

   

        mode +='<td><input list="ice-cream-flavors" class= "form-control" name="speaker_con_sub[]" mutiple id='+speaker+' required >';
        // mode +='<datalist id="+speaker_con_sub2+">';
        mode +='<datalist id="ice-cream-flavors">';
        mode +='<option value="">Select</option>';

        mode +='<?php
                    foreach($dr_name as $key=>$val){
                    if($val['f_name'] != ''){                                     
                ?>';
             mode +='<option ><?php echo $val['f_name'] ;?> <?php echo $val['l_name'] ;?> </option>';

        mode +='<?php }} ?> </datalist></td>';


       mode += '<td><input type="text" class="form-control" placeholder="Enter link" name="upload_file[]" ></td>';
       mode += '<td><button id='+minus+' onclick="remove('+insert_id+')" type="button" class="glyphicon glyphicon-minus submit"><i class="fa fa-minus certify" aria-hidden="true"></i></button></td>';
    
     mode += '</tr>';
        

    $("#ps").append(mode).fadeIn('slow');
   

    $("#"+datepicker).datepicker({dateFormat: "dd-mm-yy"});
    

    $(function() {
        $("#"+timepicker).timepicki(); 
        $("#"+timepicker1).timepicki();
    } );
 
   $("#"+moderator).select2();
   $("#"+speaker).select2();


}


$(document).ready(function () {
//change selectboxes to selectize mode to be searchable
   //$(".select1").select2();
   //$(".select11").select2();
});

function remove(key){

    var z = key;
    
    var x = "ps"+z;
    $('.'+x+'').remove(); 

}
</script>

<script>
$(document).ready(function(){
        $('#programschedule').submit(function(e){
            e.preventDefault(); 

        
            var formData = new FormData(this);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("program-schedule")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                        // $(".add_conferences").modal("hide");        
                       
                        window.location = '<?php echo base_url("Faculty")?>?id='+response.data;       
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            });
        });
        //for removing te event
    // $("#minus").click(function(){
    //   $(this).closest('tr').remove();       
    // });
    });
</script>
<!-- <script>
    $(document).ready(function(){
    $("button").click(function(){
            $('#minus').remove();
        });
});
</script> -->


<?php
    echo view('includes/admin-footer');    
?>       