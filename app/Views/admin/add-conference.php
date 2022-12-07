<?php
    echo view('includes/admin-header', $conference);    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">
<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>

<div class="col-sm-10">
	<div class="add-conference-right">
		
		<section class="new-menu">
			<div class="container">
				<h3 class="conf-tag">Add Conference</h3>
				<div class="row pt-5">
					<div class="col-sm-1"></div>
					<div class="col-sm-11">
						<header class="cf">
							<div class="navigation">
								<nav>
									<a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
									<ul class="mobimenu">
										<li class="conf-act"><a href="">About</a></li>
										<li><a href="">Program Schedule</a></li>
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
<!-- ----------conference about------------->

			<div class="container">
				<div class="about-conf">
					<form id="conference-about" enctype="multipart/form-data">
						<div class="row pt-5">
							<div class="col-sm-1">
								<label><b>Title :</b></label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="title_con" placeholder="Enter Name of the Conference" required>
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1">
								<label><b>From Date</b></label>
							</div>
							<div class="col-sm-4">
								<input type="text" id="datepicker" class="form-control" name="dates_con_from" placeholder="" required>
							</div>
							<div class="col-sm-1">
								<label><b>To Date</b></label>
							</div>
							<div class="col-sm-4">
								<input type="text" id="datepicker1" class="form-control" name="dates_con_to" placeholder="" required>
							</div>
							
						</div><!--row-->
						
						<div class="row pt-3">
							<div class="col-sm-1">
								<label><b>Location:</b></label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="location_con" placeholder="Type your address here...">
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1">
								<label><b>Theme:</b></label>
							</div>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="theme_con" placeholder="Enter the Theme of Conference">
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1 p-0">
								<label><b>Introduction</b></label>
							</div>
							<div class="col-sm-10">
								<textarea name="intro_con"  class="form-control" onkeydown="limitText(this.form.intro_con,this.form.countdown,500);" onkeyup="limitText(this.form.intro_con,this.form.countdown,500);" placeholder="Enter the Theme of Conference"><?=$_REQUEST['intro_con'];?></textarea>
								 <span class="limit">(Maximum characters: <input name="countdown" type="text" value="500" size="1" readonly>)</span>
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1 p-0">
								<label><b>Organizer’s Message:</b></label>
							</div>
							<div class="col-sm-10">
								<textarea name="org_msg_con" class="form-control"  onkeydown="limitText(this.form.org_msg_con,this.form.countdown1,500);" onkeyup="limitText(this.form.org_msg_con,this.form.countdown1,500);" placeholder="Enter the Theme of Conference"><?=$_REQUEST['org_msg_con'];?></textarea>
								 <span class="limit">(Maximum characters: <input name="countdown1" type="text" value="500" size="1" readonly>)</span>
								
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-3">
							<div class="col-sm-1 p-0">
								<label><b>Upload Brochure</b></label>
							</div>
							<div class="col-sm-10">
								
								<input type="file" id="file_up" name="file_up"><br>
								<span style="">(pdfs,word,xls,jpeg)</span>  
								
							</div>
							<div class="col-sm-1"></div>
						</div><!--row-->
						<div class="row pt-5">
							<div class="col-sm-2" style="text-align: end;">
								<button  type="submit" value="submit"  class="btn">Submit</button>
								<!-- <button  type="submit" value="submit"  class="btn">Edit</button> -->
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
  </script>

  <!----------------------------Mobile-Menu-------------------------------->
  	<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
	<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.smobitrigger').smplmnu();
        });

    </script>


  <script>
  // 	function add(){
		// $(".add_conferences").modal("show");        
  //   }
$(document).ready(function(){
	
        $('#conference-about').submit(function(e){
            e.preventDefault(); 
            var intro = $("#comment1").val();
            var org_msg = $("#comment").val();
            var formData = new FormData(this);
            formData.append("intro",intro);
            formData.append("org_msg",org_msg);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("add-conference")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                        // $('.container-edit').show();
                        // $('.container').hide();

                        // $(".add_conferences").modal("hide");  
                        // $('#conference-about')[0].reset();      
                       
                       	window.location = '<?php echo base_url("Program-schedule")?>?id='+response.data;       
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            }); 
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