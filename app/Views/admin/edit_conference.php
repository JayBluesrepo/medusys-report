<?php
	//print_r($values);
	//die();
    echo view('includes/admin-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>

<div class="col-sm-10">
	<div class="add-conference-right">
		
		<section class="new-menu">
				<h3 class="conf-tag">Edit Conference</h3>
			<div class="container">
				<div class="row pt-5">
					<div class="col-sm-1"></div>
					<div class="col-sm-11">
						<header class="cf">
							<div class="navigation">
								<nav>
									<a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
									<ul class="mobimenu">
										<li class="conf-act"><a href="<?php echo base_url('/edit-conference?id='.$values['conference_id']); ?>">About</a></li>
										<li><a href="<?php echo base_url('/program-scheduleedit?id='.$values['conference_id']); ?>">Program Schedule</a></li>
										<li><a href="<?php echo base_url('/facultyedit?id='.$values['conference_id']); ?>">Faculty</a></li>
										<li><a href="<?php echo base_url('/edit-registration?id='.$values['conference_id']); ?>">Registration</a></li>
					          <li><a href="<?php echo base_url('/edit-attend?id='.$values['conference_id']); ?>">Attend</a></li>
					          <li><a href="<?php echo base_url('/edit-certificate?id='.$values['conference_id']); ?>">Certificate</a></li>
									</ul>
								</nav>
							</div>
						</header>
					</div>
				</div><!--row-->
			</div>
		</section>
<!-- ----------conference about------------->

			<div class="container">
				<div class="about-conf">
					<form id="conference-about">
						<input type="hidden" name="conference_id" value = "<?php echo $values['conference_id'] ?>">
						<div class="row pt-5">
							<div class="col-sm-1">
								<label><b>Title :</b></label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title_con_e" value = "<?php echo $values['title'] ?>" required>
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1">
								<label><b>From Date</b></label>
							</div>
							<div class="col-sm-4">
						
								<input type="text" id="datepicker" class="form-control" name="dates_con_from_e" value = "<?php echo date('d-m-Y',strtotime($values['date_from'])); ?>" required>
							</div>
							<div class="col-sm-1">
								<label><b>To Date</b></label>
							</div>
							<div class="col-sm-4">
								<input type="text" id="datepicker1" class="form-control" name="dates_con_to_e" value = "<?php echo date('d-m-Y',strtotime($values['date_to'])); ?>" required>
							</div>
							
						</div><!--row-->
						
						<div class="row pt-3">
							<div class="col-sm-1">
								<label><b>Location:</b></label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="location_con_e" value = "<?php echo $values['location'] ?>">
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1">
								<label><b>Theme:</b></label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="theme_con_e" value = "<?php echo $values['theme'] ?>">
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1 p-0">
								<label><b>Introduction</b></label>
							</div>
							<div class="col-sm-10">
								<textarea name="intro_con_e" id="comment1"   class="form-control" onkeydown="limitText(this.form.intro_con_e,this.form.countdown,500);" onkeyup="limitText(this.form.intro_con_e,this.form.countdown,500);" ><?php echo $values['intro'] ?></textarea>
								 <span class="limit">(Maximum characters: <input name="countdown" type="text" value="500" size="1" readonly>)</span>
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1 p-0">
								<label><b>Organizer’s Message:</b></label>
							</div>
							<div class="col-sm-10">
								<textarea name="org_msg_con_e" id="comment" class="form-control"  onkeydown="limitText(this.form.org_msg_con_e,this.form.countdown1,500);" onkeyup="limitText(this.form.org_msg_con_e,this.form.countdown1,500);" ><?php echo $values['org_msg'] ?></textarea>
								 <span class="limit">(Maximum characters: <input name="countdown1" type="text" value="500" size="1" readonly>)</span>
								
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->

							<div class="row pt-3">
								<div class="col-sm-1 p-0">
									<label><b>Upload Brochure</b></label>
								</div>
								<div class="col-sm-10">
									
									<label for="file">File</label>&nbsp;<i onclick="wash()" class="fa fa-times" id="cross" aria-hidden="true" style=" color:#ee6304;cursor: pointer;"></i><span>(kindly use pdfs,jpeg files only)</span><br>
									<input type="file" id="file" name="file" style="display:none;"> 
									<div id="preview"></div>
									
								</div>
								<div class="col-sm-1"></div>
							</div><!--row-->


						
						
						<div class="row pt-5">
							<div class="col-sm-2" style="text-align: end;">
								<button  type="submit" value="submit"  class="btn">Update</button>
							</div>
							<div class="col-sm-10"></div>
						</div><!---->
					</form>
			<!-- 	</div></div>
			</div>
		</div> -->
	</div>
</div>

</div></div>

<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>

<script>
  $( function() {
    $("#datepicker").datepicker({dateFormat: "dd-mm-yy"});
    $("#datepicker1").datepicker({dateFormat: "dd-mm-yy"});
  } );

  	$('#preview').append('<?php echo $values['brochure'] ?>');

  	function wash(){
        $('#file').show();
        $('#preview').empty();
        // $('#cross').hide();
    }
</script>

<!-----------------------------------Mobile-Menu----------------------------------------->
  <script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
	<script type="text/javascript">

		jQuery(document).ready(function($) {
			$('.smobitrigger').smplmnu();
		});

	</script>


  <script>
    $('#conference-about').submit(function(e){  
        e.preventDefault();
		var formdata = new FormData(this);
		$.ajax({
			type   : 'post',
			url    : '<?php echo base_url("update-conference")?>',
			data   : formdata,
			contentType: false,
			processData: false,					  
			success:function(response){
				response = jQuery.parseJSON(response);
				console.log(response);
				if(response.result==1)
				{  
					toastr["success"](response.message);
					// $('#library-table').DataTable().ajax.reload(null, false);
					// $(".edit_conferences").modal("hide");	
	           	window.location = '<?php echo base_url("program-scheduleedit")?>?id='+response.data;       

				}
				else 
				{
					toastr["error"](response.message);			
				}
			}
		});
 });
 

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