<?php
    echo view('includes/admin-header', $e_library);    
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
            <div class="row pt-2 pr-2 m-3">
                <div class="col-sm-8"><h4 class="user-tag">Add e-library content</h4></div>
                <div class="col-sm-4" id="add-user-right">
                    <!-- <button type="button" onclick="goBack()"style="background-color:#00AEFF;color:#fff; padding:5px 13px;border-radius: 12px;margin-left: 20px;"><i class="fa fa-arrow-left"aria-hidden="true" style="color: #fff;"></i>Go Back</button> -->
                    <button type="button" class="btn" onclick="add()" style="background-color:#218838; color:#fff;">Upload File</button>
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
                                            <th style="color:#fff;">SL</th>
                                            <th style="color:#fff;">Fields</th>
                                            <th style="color:#fff;">Category Name</th>
                                            <th style="color:#fff;">File Name</th>
                                            <th style="display:none;">Link</th>
                                            <th style="display:none;">files</th>
                                            <th style="color:#fff;">Action</th>
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
    <!-- </div> -->
<!-- </section> -->
<div class="modal fade editDisease" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#F39309;">
                <h2 class="modal-title" id="exampleModalLabel">Edit Disease</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="update-disease-form" enctype="multipart/form-data">
					<input type="hidden" name="cid" id="cid">
					<div class="form-group">
						<label for="">field name</label>
						<input type="text" class="form-control" name="field_names" id="field_names" placeholder="Enter field name" readonly>
					</div>
                    <div class="form-group">
						<label for="">field</label>
						<input type="text" class="form-control" name="fields" id="fields" placeholder="Enter field" readonly>
					</div>
					<div class="form-group">
						<label for="">category name</label>
						<input type="text" class="form-control" name="category" id="category" placeholder="Enter category">
					</div>
                    <div class="form-group">
                        <label for="file_up">File</label>&nbsp;<i onclick="wash()" class="fa fa-times" id="cross" aria-hidden="true" style=" color:#ee6304;cursor: pointer;"></i><span>(kindly use pdfs,jpeg files only)</span><br>
                        <input type="file" id="file_up" name="file_up">
                    </div>
                    <div id="preview"></div>
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success">Save Changes</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function add() {
	location.href = '<?php echo base_url("admin/Uploads")?>';
}
// function goBack() {
// 	location.href = '<?php //echo base_url("")?>';
// }
$('#library-table').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":"<?php echo base_url('library-data') ?>",
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

var dt = $('#library-table').DataTable();
//hide the first column
dt.column(4).visible(false);
dt.column(5).visible(false);

$(document).on('click', '#deleteCountryBtn', function(){
    var split1 = $(this).data('id');
    var split_value = split1.split(',');  
    var user_id = split_value[0];
    var file = split_value[1];
    // alert(split1);
    swal({   
        title: "Are you sure?",
        text: "You want to delete this file?",
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
                url:"<?php echo base_url("delete-disease-data")?>",
                type:"POST",
                data:{id:user_id,file_name:file},
                success:function(response) {
                    response = jQuery.parseJSON(response);
                    console.log(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
                        $('#library-table').DataTable().ajax.reload(null, false);
                    }
                    else if(response.result==2){
                        toastr["error"](response.message);                
                    }
                    else{
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

$(document).on('click', '#viewCountryBtn', function(){
    var split1 = $(this).data('id');
    var split_value = split1.split(',');  
    var user_id = split_value[0];
    var file = split_value[1];
    var link = split_value[2];
    
    // alert(file);
    if(link){
        window.open(link);
    }else{       
        window.open("<?php echo base_url('') ?>/public/uploads/"+file);
    }
    
});

$(document).on('click', '#updateCountryBtn', function(){
    var split1 = $(this).data('id');
    var split_value = split1.split(',');  
    var user_id = split_value[0];
    var files = split_value[1];
    
    var filePath = '<?php echo base_url('') ?>/public/uploads/'+files;
    var link = document.createElement('a');
    link.href = filePath;
    link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
    link.click();
   
});

// $(document).on('click', '#updateCountryBtn', function(){
//     var split1 = $(this).data('id');
//     var split_value = split1.split(',');  
//     var user_id = split_value[0];
//     var file = split_value[1];
//     $.ajax({
//         url:"<?php echo base_url("edit-disease")?>",
//         type:"POST",
//         data:{id:user_id,file_name:file},
//         success:function(response) {
//             response = jQuery.parseJSON(response);
//             console.log(response);
//             if(response.result == 1) 
//             {
//                 // var doc = response.msg.files;
//                 // alert(doc);
//                 $("#cid").val(response.message.id);
//                 $("#field_names").val(response.message.field_names);
//                 $("#fields").val(response.message.fields);
//                 $("#category").val(response.message.category_name);
//                 $('#file_up').hide();
//                 $("#preview").append(response.msg.files);
//                 $(".editDisease").modal("show");
//                 $("#clos").click(function(){
//                     $('#preview').empty();
//                 });
//             }
//         }
//     }); 
// });
// function wash(){
//   $('#file_up').show();
//   $('#preview').empty();
//   $('#cross').hide();
// }
// $('.editDisease').on('hidden.bs.modal', function (e) {
//     $('#cross').show();
// });
// $("#file_up").on('change', function(event) {
//     var file = event.target.files[0];
//     if(!file.type.match('image/jp.*') && !file.type.match('.pdf')) {
//         toastr.error('only JPG images and pdf files');
//         return;
//     }
// });
// $('#update-disease-form').submit(function(e){  
//     e.preventDefault();
//     formdata = new FormData($(this)[0]);
//     $.ajax({
//         type   : 'post',
//         url    : '<?php echo base_url("update-disease")?>',
//         data   : formdata,
//         contentType: false,
//         processData: false,					  
//         success:function(response){
//             response = jQuery.parseJSON(response);
//             console.log(response);
//             if(response.result==1)
//             {  
//                 toastr["success"](response.message);
//                 $('#library-table').DataTable().ajax.reload(null, false);
//                 $(".editDisease").modal("hide");			
//             }
//             else 
//             {
//                 toastr["error"](response.message);			
//             }
//         }
//     });
// });
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
.next{
    padding: 0;
    width: initial;
    border: none;
    margin: 0;
    background: none;
  }
</style>


