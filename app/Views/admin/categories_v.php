<?php
    echo view('includes/admin-header', $create_library);    
?>

<!-- <section class="spec-main"> -->
     <!-- <div class="row"> -->
        <!-- <div class="col-sm-3">
            <div class="spec-left">
                 <ul>
                    <li><a href="#" onclick="xyz()">XYZ</a></li> -->
                    <!-- <li><a href="">ABC</a></li> -->
                <!-- </ul>
                <div class="go-back">
                    <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div> -->
        <div class="col-sm-10">
             <h4 class="user-tag p-3">Add Category</h4>
            <div class="category">
                <form id="categories">
                    <label style="color: #313F86;"><b>Field Names:</b></label><br>
                    <select class="form-control" name="field_name" id="field_name"  onchange="list_data()">
                        <option value=''>Select</option>
                        <?php 
                            foreach($section as $key=>$val){
                        ?>
                            <option value='<?php echo $val['id']; ?>'><?php echo $val['master_name']; ?></option>
                        <?php
                            }
                        ?> 
                    </select><br><br>
                    <div class="create">
                         <label style="color: #313F86;"><b>Create Category:</b></label><br>
                        <div class="mobile-category">
                            <input type="text" class="form-control" name="category" required style="width: 21%;height: 32px;">&nbsp; &nbsp;&nbsp; &nbsp;
                            <button type="submit" style="background-color:#218838; color:#fff;margin-top: 0;" class="btn">Submit</button>
                        </div><br>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="list-users">
                                    <div class="table-responsive" style="">
                                        <table class="table table-hover" id="user-table" style="width:95%!important;background-color: #fff;">
                                            <thead style="background-color:#0065A3;color:#fff;">
                                                <tr>
                                                    <th style="color:#fff;">SL</th>
                                                    <!-- <th>field names</th> -->
                                                    <th style="color:#fff;">Fields</th>
                                                    <th style="color:#fff;">Category Name</th>
                                                    <th style="color:#fff;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody style="background-color:#fff!important;"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>   
            </div><!--category ends-->
        </div>
    <!-- </div> -->
<!-- </section> -->
<div class="modal fade editDisease" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439BC1;padding: 10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="font-size:18px;font-weight: 600;color: #fff;">Edit Category</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="update-disease-form">
					<input type="hidden" name="cid" id="cid">
					<div class="form-group" style="display:none;">
						<label for="">Field name</label>
						<input type="text" class="form-control" name="field_names" id="field_names" placeholder="Enter field name" readonly>
					</div>
                    <div class="form-group">
						<label for="">Field</label>
						<input type="text" class="form-control" name="fields" id="fields" placeholder="Enter field" readonly>
					</div>
					<div class="form-group">
						<label for="">Category Name</label>
						<input type="text" class="form-control" name="category" id="category" placeholder="Enter category">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success">Update</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $(".create").hide();
    });
    // function add() {
    // 	location.href = '<?php echo base_url("admin/Uploads")?>';
    // }

    function list_data(){

        var category = $('#field_name').val();
        // alert(category);
        $('.create').show();

        $('#user-table').DataTable({
            "processing":true,
            "serverSide":true,
            ajax: {
                url: '<?php echo base_url('list-datas') ?>',
                data: {"cat":category}
            },
            "dom":"lBfrtip",
            stateSave:true,
            destroy: true,
            // "scrollX": true,
            info:true,
            "iDisplayLength":5,
            "pageLength":5,
            "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
            "fnCreatedRow": function(row, data, index){
                $('td',row).eq(0).html(index+1);
            }
        });

    }


    $(document).on('click', '#deleteCountryBtn', function(){
        var user_id = $(this).data('id');
        swal({   
            title: "Are you sure?",
            text: "You want to delete this sub category?",
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
                    url:"<?php echo base_url("remove-disease")?>",
                    type:"POST",
                    data:{id:user_id},
                    success:function(response) {
                        response = jQuery.parseJSON(response);
                        console.log(response);
                        if(response.result == 1){
                            toastr["success"](response.message);
                            $('#user-table').DataTable().ajax.reload(null, false);
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
            url:"<?php echo base_url("edit-disease")?>",
            type:"POST",
            data:{id:user_id},
            success:function(response) {
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result == 1) 
                {
                    $("#cid").val(response.message.id);
                    $("#field_names").val(response.message.field_names);
                    $("#fields").val(response.message.fields);
                    $("#category").val(response.message.category_name);
                    $(".editDisease").modal("show");
                }
            }
        }); 
    });

    $('#update-disease-form').submit(function(e){  
        e.preventDefault();
        formdata = new FormData($(this)[0]);
        $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("update-disease-data")?>',
            data   : formdata,
            contentType: false,
            processData: false,					  
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                {  
                    toastr["success"](response.message);
                    $('#user-table').DataTable().ajax.reload(null, false);
                    $(".editDisease").modal("hide");			
                }
                else 
                {
                    toastr["error"](response.message);			
                }
            }
        });
    });

</script>

<script type="text/javascript">

	$(document).ready(function(){	
		$('#categories').submit(function(e){  
			e.preventDefault();
            var field = $('#field_name option:selected').text();
			formdata = new FormData($(this)[0]);
            formdata.append('fields',field);
			$.ajax({
				type   : 'post',
				url    : '<?php echo base_url("saveCategories")?>',
				data   : formdata, 
				contentType: false,
				processData: false,
				success:function(response){
		  			console.log(response);
					response = jQuery.parseJSON(response);
					if(response.result==1){	 
						toastr["success"](response.message);
						$('#categories')[0].reset();
                        $('#user-table').DataTable().ajax.reload(null, false);
					}
					else 
                    {    
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


<style type="text/css">
    .user-tag {
    color: #0065A3;
    font-weight: 600;
    font-size: 24px;
}
#categories select{
    width: 50%;
}
 .next{
    padding: 0;
    width: initial;
    border: none;
    margin: 0;
    background: none;
  }
  .mobile-category{
    display: flex;
  }
@media only screen and (max-width:600px){
    #categories select{
        width: 100%;
    }
    .mobile-category{
        display: initial;
    }
    .mobile-category input{
        width: 80%!important;
    }
    .mobile-category button{
        text-align: left;
        display: block;
    }
}
</style>

