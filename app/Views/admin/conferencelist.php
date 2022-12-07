<?php
    echo view('includes/admin-header');    
?>

<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">


<div class="col-sm-10">
    <div class="add-conference-right">
        
        

            <div class="container">
		      <h3 class="conf-tag">Conference List</h3>
                <div class="prog-schedule">
                   <form id="conferencelist">
                        <input type="hidden" class="form-control insert_id" id="insert_id" name="insert_id" value = '0'>
                        
                        <div class="table-responsive pt-5">
                            <!-- hide the id -->
                            
                            <table class="table table-bordered" >
                                <thead>
                                    <tr >
                                        <th>Title</th>
                                        <th>From date</th>
                                        <th>To date</th>
                                        <th>Link</th>
                                        </tr>
                                </thead>
                                <tbody id="ps">

                                </tbody>  
                            </table>
                        </div><!--table-responsive-->
                        <!-- <button type="button" class="submit" >+ Add Program Event</button> -->
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
<script>
  $( function() {
    $("#datepicker").datepicker();
  } );
  </script>
<!-- for time picker -->


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
    
      
        // var title = "title"+insert_id;
        var moderator = "moderator"+insert_id;
        var speaker = "speaker"+insert_id;
        var datepicker1 = "datepicker1"+insert_id;
        var datepicker = "datepicker"+insert_id;
        var ps = "ps"+insert_id;
        var edit = "edit"+insert_id;
        var userview = "userview"+insert_id;
        var feedback = "feedback"+insert_id;
        var mode = '';
    
        mode += '<tr class='+ps+'>'; 
        mode += ' <input name="" id="conf_edit_id" value="<?php echo $conference_id;  ?>">';
        mode += '<?php foreach($title_con as $values) { ?>';
        mode += '<td><?php echo $values['title'] ?></td>';
        mode += '<td><?php echo date("d-m-Y",strtotime($values['date_from'])) ?></td>';
        mode += '<td><?php echo date("d-m-Y",strtotime($values['date_to'])) ?></td>'; 
        <?php
        if($values['reg_fee'] == 0){
        ?>
            mode += '<td><button id='+edit+' onclick="myfun('+<?php echo $values['conference_id'] ?>+')" type="button" class="submit">Edit</button> <button id='+userview+' type="button" onclick="userview('+<?php echo $values['conference_id'] ?>+')" >User Viewed</button> <button id='+feedback+' type="button" onclick="feedback('+<?php echo $values['conference_id'] ?>+')" >Feedback</button> </td>';
        <?php
        }
        else{
            ?>
             mode += '<td><button id='+edit+' onclick="myfun('+<?php echo $values['conference_id'] ?>+')" type="button" class="submit">Edit</button> <button id='+userview+' type="button" onclick="userview('+<?php echo $values['conference_id'] ?>+')" >User-Paid</button> <button id='+feedback+' type="button" onclick="feedback('+<?php echo $values['conference_id'] ?>+')" >Feedback</button></td>';
             <?php
        }
        ?>


        mode += '</tr>';
        mode += '<?php } ?>';
        $("#ps").append(mode).fadeIn('slow');
        $("#"+datepicker).datepicker();
        $("#"+datepicker1).datepicker();



}

function myfun(key){
    // alert(key);
    window.location = '<?php echo base_url("edit-conference")?>?id='+key;
}

function userview(key){
   
    window.location.href = '<?php echo base_url("user-view-page")?>?id='+key;
}

function feedback(id){
    // alert(id);
    window.location.href = '<?php echo base_url("feedBack-details")?>?id='+id;

}



$(document).ready(function () {
   $(".select1").select2();
   $(".select11").select2();
});

function remove(key){

    var z = key;
    
    var x = "ps"+z;
    $('.'+x+'').remove(); 

}
</script>



<!-- <script>
    $(document).ready(function(){
        $('#conferencelist').submit(function(e){
            e.preventDefault(); 

        
            var formData = new FormData(this);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("conferencelist")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                               
                       
                        // window.location = '<?php echo base_url("Faculty")?>?id='+response.data;       
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            });
        });
    });
</script> -->

<?php
    echo view('includes/admin-footer');    
?>       