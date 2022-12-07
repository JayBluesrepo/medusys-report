<?php
    echo view('includes/admin-header', $conference);    
?>


<div class="col-sm-10">
    <div class="row pt-4 pr-2 m-3">
        <div class="col-sm-8"></div>
        <div class="col-sm-4" id="add-user-right">
            <!-- <button type="button" onclick="goBack()"><i class="fa fa-arrow-left" style="background-color: #00AEFF;" aria-hidden="true"></i>Go Back</button> -->
            <button type="button" class="btn" onclick="add()" style="background-color: #E44A24; color:#fff;">Add Conference</button>
        </div>
    </div>
    <div class="create" id="create-elib">
        <div class="row">
            <div class="col-sm-12">
                <div class="list-users">
                    <div class="table-responsive">
                        <table class="table table-hover" id="library-table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Conference Name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>     
</div>

<!-- ---------------------------------Add - Conference------------------------------------------- -->

<div class="modal fade add_conferences">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;color:white;">
                <h2 class="modal-title" id="exampleModalLabel">Add Conference</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="update-disease-form">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Conference Name</label>
                                <input type="text" class="form-control" name="conference_name" id="conference_name" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="date_con" id="date_con">
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" name="time_con" id="time_con">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" class="form-control" name="link_con" id="link_con">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" name="time_con" id="time_con">
                            </div> -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <!-- <input type="text" class="form-control" name="link_con" id="link_con"> -->
                                <select class="form-control" name="status_con" id="status_con">
                                    <option value="enable">enable</option>
                                    <option value="disable">disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success">Save</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<!-- ---------------------------------------edit-conference------------------------------------------------ -->

<div class="modal fade edit_conferences">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;color:white;">
                <h2 class="modal-title" id="exampleModalLabel">Edit Conference</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="edit-disease-form">
                    <input type="hidden" id="cid" name="cid">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Conference Name</label>
                                <input type="text" class="form-control" name="conference_name_e" id="conference_name_e" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" name="date_con_e" id="date_con_e">
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" name="time_con_e" id="time_con_e">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Link</label>
                                <input type="text" class="form-control" name="link_con_e" id="link_con_e">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" name="time_con" id="time_con">
                            </div> -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <!-- <input type="text" class="form-control" name="link_con" id="link_con"> -->
                                <select class="form-control" name="status_con_e" id="status_con_e">
                                    <option value="enable">enable</option>
                                    <option value="disable">disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success">Save changes</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<script>
   

    function add(){
		$(".add_conferences").modal("show");        
    }

    $(document).ready(function(){
        $('#update-disease-form').submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("add-conference")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){
                        toastr["success"](response.message);
		                $(".add_conferences").modal("hide");        
                        $('#update-disease-form')[0].reset();
                        window.setTimeout(function() {
                            history.go(0);
                        }, 1000);                     
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            });
        });
    });
    
    $(document).on('click', '#updateCountryBtn', function(){
       	var user_id = $(this).data('id');
	   	$.ajax({
			url:"<?php echo base_url("edit-conference")?>",
			type:"POST",
			data:{id:user_id},
			success:function(response) {
				response = jQuery.parseJSON(response);
				console.log(response);
				if(response.result == 1){
					$("#cid").val(response.message.id);
					$("#conference_name_e").val(response.message.conference_name);
					$("#date_con_e").val(response.message.date);
					$("#time_con_e").val(response.message.time);
					$("#link_con_e").val(response.message.link);
					$("#status_con_e").val(response.message.status);
					$(".edit_conferences").modal("show");
				}
			}
		}); 
	});

    $('#library-table').DataTable({    
        "processing":true,
        "serverSide":true,
        "ajax":"<?php echo base_url('conference-data') ?>",
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


    $('#edit-disease-form').submit(function(e){  
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
					$('#library-table').DataTable().ajax.reload(null, false);
					$(".edit_conferences").modal("hide");			
				}
				else 
				{
					toastr["error"](response.message);			
				}
			}
		});
	});
</script>

<?php
    echo view('includes/admin-footer');    
?>




