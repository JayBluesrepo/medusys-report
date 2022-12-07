<?php
    echo view('includes/admin-header', $add_user);    
?>

<!-- <section class="edit-user">
     <div class="row"> -->
       <!--  <div class="col-sm-2" style="padding:0;">
             <div class="dashboard-left">
                <div class="menu-left">
                    <ul>
                        <li><a href="" class="active">Edit User</a></li> 
                    </ul>
                </div>
            </div>
        </div> --><!--col-2-->
        <div class="col-sm-10" style="padding:0;">
            <div class="add-user-right">
                <div class="row">
                    <div class="col-sm-2"><h4><b>Users</b></h4></div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-4" id="add-user-right">
                        <button type="button" onclick="goBack()" style="background-color: #00AEFF;color: #fff;padding: 5px 13px;border-radius: 12px;margin-left: 12px;"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</button>
                        <button type="button" class="btn" onclick="add()" id="add-u" style="color:#fff;">Add User</button>
                    </div>
                </div><!--row-->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="list-users">
                            <div class="table-responsive">
                                <table class="table table-hover" id="users-table" style="width:95%!important">
                                    <thead>
                                        <tr>
                                            <th style="color:#fff;">SL</th>
											<th style="color:#fff;">Organization</th>
											<th style="color:#fff;">Role</th>
											<th style="color:#fff;">User ID</th>
											<th style="color:#fff;">Password</th>
											<th style="color:#fff;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--row-->
            </div>
        </div><!--col-10-->
 <!--    </div>
</section> -->
<div class="modal fade editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F39309;">
                <h2 class="modal-title" id="exampleModalLabel">Edit User</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="update-user-form">
					<input type="hidden" name="uid" id="uid">
					<div class="form-group">
						<label for="">Organization</label>
						<input type="text" class="form-control" name="organisation" id="organisation" placeholder="Enter organisation name">
					</div>
					<label>Role</label>
					<div class="form-group">
						<select class="form-control" id="role" name="role">
							<option value=''>Select</option>
							<option>Organisation Admin</option>
							<option>Modular Admin</option>
							<option>Faculty</option>
						</select> 
					</div>
					<div class="form-group">
						<label for="">User Id</label>
						<input type="text" class="form-control" name="userid" id="userid" placeholder="Enter userid">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
						<div class="input-group-append" style="margin-top: -30px;margin-left: 445px;">
							<span onclick="password_show_hide();">
								<i class="fa fa-eye d-none" id="hide_eye"></i>
								<i class="fa fa-eye-slash" id="show_eye"></i>
							</span>
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success">Save Changes</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	function goBack() {
		location.href = '<?php echo base_url("")?>';
	}
    function add() {
		location.href = '<?php echo base_url("Add-User")?>';
	}

	$(document).on('click', '#deleteCountryBtn', function(){
       var user_id = $(this).data('id');
       swal({   
			title: "Are you sure?",
			text: "You want to delete this user?",
			type: "warning", 
			showCloseButton: true,
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			cancelButtonColor:'#d33',
			confirmButtonText: "Yes, Delete",
			cancelButtonText: "No",
			closeOnConfirm: false,
			closeOnCancel: false 
			},
  			function(isConfirm){   
			if(isConfirm){ 
				$(".sweet-alert").hide();
				$(".sweet-overlay").hide();
				$.ajax({
					url:"<?php echo site_url("remove-user")?>",
					type:"POST",
					data:{id:user_id},
					success:function(response) {
						response = jQuery.parseJSON(response);
						console.log(response);
						if(response.result == 1){
							toastr["success"](response.message);
							$('#users-table').DataTable().ajax.reload(null, false);
						}else{
							toastr["error"](response.message);
						}
					}   
				});
			}
			else 
			{
				$(".sweet-alert").hide();
				$(".sweet-overlay").hide();
			}
  		});
   	});

	$(document).on('click', '#updateCountryBtn', function(){
       	var user_id = $(this).data('id');
	   	$.ajax({
			url:"<?php echo base_url("edit-user")?>",
			type:"POST",
			data:{id:user_id},
			success:function(response) {
				response = jQuery.parseJSON(response);
				console.log(response);
				if(response.result == 1) 
          		{
					$("#uid").val(response.message.id);
					$("#organisation").val(response.message.organization);
					$("#role").val(response.message.role);
					$("#userid").val(response.message.user_id);
					$("#password").val(response.message.password);
					$(".editUser").modal("show");
				}
			}
		}); 
	});
	
    $('#users-table').DataTable({
        "processing":true,
        "serverSide":true,
        "ajax":"<?php echo base_url('list-data') ?>",
        "dom":"lBfrtip",
        stateSave:true,
        info:true,
		"iDisplayLength":5,
       "pageLength":5,
	   "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
	   "fnCreatedRow": function(row, data, index){
           $('td',row).eq(0).html(index+1);
       }
    });

	$('#update-user-form').submit(function(e){  
        e.preventDefault();
		formdata = new FormData($(this)[0]);
		$.ajax({
			type   : 'post',
			url    : '<?php echo base_url("update-user")?>',
			data   : formdata,
			contentType: false,
			processData: false,					  
			success:function(response){
				response = jQuery.parseJSON(response);
				console.log(response);
				if(response.result==1)
				{  
					toastr["success"](response.message);
					$('#users-table').DataTable().ajax.reload(null, false);
					$(".editUser").modal("hide");			
				}
				else 
				{
					toastr["error"](response.message);			
				}
			}
		});
	});

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
<?php
    echo view('includes/admin-footer');    
?>
