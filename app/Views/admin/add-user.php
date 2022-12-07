<?php
    echo view('includes/admin-header', $add_user);    
?>


<!-- <section class="add-user"> -->
	<!-- <div class="row"> -->
		<!-- <div class="col-sm-2" style="padding:0;">
			 <div class="dashboard-left">
                <div class="menu-left">
                    <ul>
                        <li><a href="" class="active">Add Users</a></li> 
                    </ul>
                </div>
            </div>
		</div> --><!--col-2-->
		<div class="col-sm-10" style="padding:0;">
			<div class="add-user-right">
				<div class="row">
					<div class="col-sm-2"><h4><b>Add User</b></h4></div>
					<div class="col-sm-8"></div>
					<div class="col-sm-2" id="add-user-right"><button type="button" onclick="goBack()"  style="background-color: #00AEFF;color: #fff;padding: 5px 13px;border-radius: 12px;margin-left: 12px;"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</button></div>
				</div><!--row-->
				<div class="row">
					<div class="col-sm-4">
						<div class="create-user">
							<form id='createUser'>
								<label>Organization</label>
								<div class="form-group">
									<input type="text" class="form-control" name="organisation">
								</div>
								<label>Role</label>
								<div class="form-group">
								  <select class="form-control" name="role">
								  <option value=''>Select</option>
								    <option>Organisation Admin</option>
								    <option>Modular Admin</option>
								    <option>Faculty</option>
								  </select>
								</div>
								<label>User Id</label>
								<input type="text" class="form-control" name="userid" required>
								<label>Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
								<div class="input-group-append" style="margin-top: -30px;margin-left: 345px;">
									<span onclick="password_show_hide();">
										<i class="fa fa-eye d-none" id="hide_eye"></i>
										<i class="fa fa-eye-slash" id="show_eye"></i>
									</span>
								</div>
								<div style="display:flex; justify-content: space-between;">
									<button type="submit" class="btn-create submit">CREATE</button>
									<button type="button" class="btn-create" onclick="showUser()">Back</button>
								</div>
							</form>
						</div><!--create-user-->
					</div><!--col-4-->
					<div class="col-sm-8"></div>
				</div><!--row-->
			</div>
		</div><!--col-10-->
<!-- 	</div>
</section> -->
<script type="text/javascript">
	function goBack() {
		location.href = '<?php echo base_url("")?>';
	}

	function showUser() {
		location.href = '<?php echo base_url("Add-Edit-User")?>';
	}

	function password_show_hide() {
		var x = document.getElementById("password");
		var show_eye = document.getElementById("show_eye");
		var hide_eye = document.getElementById("hide_eye");
		hide_eye.classList.remove("d-none");
		if (x.type === "password") {
			x.type = "text";
			show_eye.style.display = "none";
			hide_eye.style.display = "block";
		} else {
			x.type = "password";
			show_eye.style.display = "block";
			hide_eye.style.display = "none";
		}
	}

</script>
<script type="text/javascript">
	$(document).ready(function(){	
		$('#createUser').submit(function(e){  
			e.preventDefault();
			formdata = new FormData($(this)[0]);
			$(".submit").text("Creating...");
			$(".submit").attr('disabled','disabled');
			$.ajax({
				type   : 'post',
				url    : '<?php echo base_url("create-user")?>',
				data   : formdata, 
				contentType: false,
				processData: false,
				success:function(response){
		  			console.log(response);
					response = jQuery.parseJSON(response);
					if(response.result==1){	 
						toastr["success"](response.message);
						$(".submit").removeAttr('disabled');
						$(".submit").text("CREATE");
						// $('#createUser')[0].reset();
						window.setTimeout(function() {
							window.location = '<?php echo base_url("admin/EditUser")?>';
						}, 2000);
					}
					else 
                    {    
                        toastr["error"](response.message);
                        $('.submit').removeAttr("disabled");
                        $(".submit").text("CREATE");                                        
                    }
	  			}
			});
	   	});   
	});  
</script>
<?php
    echo view('includes/admin-footer');    
?>
