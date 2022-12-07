<?php

    echo view('includes/admin-header',$faculty);    
?>
<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">


<div class="col-sm-10">
    <div class="add-conference-right">
        
        <section class="new-menu">
            <div class="container">
                    <h3 class="conf-tag">Add Faculty</h3>
                <div class="row pt-5">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <header class="cf">
                            <div class="navigation">
                                <nav>
                                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                                    <ul class="mobimenu">
                                        <li><a href="<?php echo base_url('Conference'); ?>">About</a></li>
                                        <li><a href="<?php echo base_url('Programschedule'); ?>">Program Schedule</a></li>
                                        <li class="conf-act"><a href="<?php echo base_url('Faculty'); ?>">Faculty</a></li>
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

           <form id="faculty" enctype="multipart/form-data" >

            <div class="container">
            	<div class="faculty-conf">
            			<div class="row pt-5">
                            <div class="col-sm-2">
                                <label><b>Title</b>:</label>
                            </div>
                            <div class="col-sm-10">
                                <h3><?php echo $title_con[0]['title']; ?></h3>
                            </div>
                        </div><!--row-->
                         
                        <div class="vertical-tabs">
                        	<input type="hidden" name="" id="conf_next_id" value="<?php echo $speaker[0]['conference_id'];  ?>">
                        	<div class="row pt-5">

                        		<div class="col-sm-4">
                                    <button type="button" class="submit" id="next">Registration</button>
                        			<h4>Click on the Faculty Name to enter profile</h4>
                        			<ul class="nav nav-tabs" role="tablist">
                        				<?php foreach($speaker as $key=>$val){
                        					?>
	 										<li class="nav-item">
									          <button class="nav-link active" data-toggle="tab"onclick= "select_speaker(this.value)" value = "<?php echo $val['ps_id']; ?>" role="tab" aria-controls="home"><?php echo $val['speaker']; ?></button>
									        </li>
                        					<?php
                        				}
								       ?>
								      </ul>

                        		</div>

                        		<div class="col-sm-8">

                        			<div class="tab-content"  id="add_form_div" style = "display:none;">
								        <div class="tab-pane active" role="tabpanel">
								          <div class="sv-tab-panel">
								          	<p><b>Add Profile Picture below</b></p>
								           	<div class="profile-pic">
								           
								           		<input name="profile_pic_fac" type="file" class="form-control" onchange="readURL2(this)" accept="image/*" >
								           		 <img src="" class="img-fluid"  name = "profile" alt="preview image" id="blah" />

								           	</div>
								           	
								           	<input id ="speaker_id" type = "hidden" name = "speaker_id" value = ""> 
								           	 <input id="id1" type = "text" name = "conferene_id" value = "<?php echo $conference_id; ?>">
								           	<div class="table-responsive">
								           		<table class="table table-striped">
								           			<tbody>
								           				<tr>
								           					<td>Name</td>
								           					<td><input type="text" class="form-control" name="name_fac" placeholder="Enter Full Name"></td>
								           				</tr>
								           				<tr>
								           					<td>Present Designation</td>
								           					<td><input type="text" class="form-control" name="present_des_fac" placeholder="Enter Present Designation"></td>
								           				</tr>
								           				<tr>
								           					<td>Qualifications </td>
								           					<td><input type="text" class="form-control" name="qualification_fac" placeholder="Enter Qualifications"></td>
								           				</tr>

								           				<tr>
								           					<td>Special Interests</td>
								           					<td><textarea name="special_int_fac" class="form-control" onkeydown="limitText(this.form.special_int_fac,this.form.countdown,500);" onkeyup="limitText(this.form.special_int_fac,this.form.countdown,500);" placeholder="Enter the Theme of Conference"></textarea>
                                 <span class="limit">(Maximum characters: <input name="countdown" type="text" value="500" size="1" readonly>)</td>
								           				</tr>
								           				<tr>
								           					<td>Publications</td>
								           					<td><textarea name="publication_fac" class="form-control" onkeydown="limitText(this.form.publication_fac,this.form.countdown1,500);" onkeyup="limitText(this.form.publication_fac,this.form.countdown1,500);" placeholder="Enter the Theme of Conference"></textarea>
                                 <span class="limit">(Maximum characters: <input name="countdown1" type="text" value="500" size="1" readonly>)
                                                                </td>
								           				</tr>							
								           			</tbody>
								           			
								           		</table>
								           	</div>
								          </div>
								        </div><!------1--->
								       
                        				<button  type="submit" class="btn" id="up-btn">Save</button>
                        				
								        

								      </div><!--tab-content-->

                        		</div>

                        	</div>
                        </div>
            	</div>
            </div>
         </form>	
     	

     </div><!--add-conference-right--->
</div><!---->      

<!-----------------------------Mobile-Menu---------------------------->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.smobitrigger').smplmnu();
    });

</script>


<script>
    $(document).ready(function(){
        $('#id1').hide();
    });
</script>
<script>
	
        $("#next").click(function(){
        	var next = $('#conf_next_id').val();
       		// alert('hi');
       		window.location = '<?php echo base_url("conference-registration")?>?id='+next;

        }); 
    
</script>
<script>
   function select_speaker(id){
   	// alert(id);
   	$('#speaker_id').val(id);
   	$('#add_form_div').show();
   	// alert($('#speaker_id').val());
   }

   function readURL2(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#blah').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#profile_pic_fac').hide();
  }
}


</script>



<script>
	// $(document).ready(function(){
       	$(document).on("submit", "#faculty", function (e) {
            e.preventDefault(); 

        		// alert('hi');
            var formData = new FormData(this);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("faculty-add")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                         window.location.reload();
                        // $('#profile_pic_fac').show();
                           // $('#blah').attr('src', '/faculty_profile');
                        // $(".add_conferences").modal("hide"); 
                        // $('#faculty')[0].reset();
                        
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                    // else{
                    // 	toastr["button"](response.message);
                    // 	$("#next").click(function(){
                    //        


                }
                    
            });
        });
    // });

   
</script>
<script language="javascript" type="text/javascript">
            function limitText(limitField, limitCount, limitNum) {
                if (limitField.value.length > limitNum) {
                    limitField.value = limitField.value.substring(0, limitNum);
                } else {
                    limitCount.value = limitNum - limitField.value.length;
                }
            }
            </script>



<?php
    echo view('includes/admin-footer');    
?>   