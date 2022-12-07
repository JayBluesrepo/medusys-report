<?php
    echo view('includes/admin-header', $e_library);    
?>


       
<div class="col-sm-10">
    <div class="row">
        <div class="col-sm-10" id="up-tag"><h3>Upload e-Library Files</h3></div>
        <div class="col-sm-2">
            <div class="go-back" style="margin:5% 0;">
                <a href="#" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
            </div>
        </div>
    </div>
    <div class="category">
       
        <label style="color: #313F86;"><b>Field names:</b></label><br>
        <select class="form-control" name="field_name" id="field_name" style="width:20%;" value="<?php echo $val['id']; ?>" onchange="find_sub();table_fill()">
            <option value=''>Select</option>
            <?php 
                foreach($section as $key=>$val){
            ?>
                <option value='<?php echo $val['id']; ?>'><?php echo $val['master_name']; ?></option>
            <?php
                }
            ?>            
        </select><br>
        <div class="create">
            <div class="create1" style="display:none;">
                <label style="color: #313F86;"><b>Select Category / Book:</b></label><br>
                <div style="display:flex;padding-bottom: 12px;">
                    <select class="form-control" name="category" id="category" style="width:20%;" onchange="chapter_show()" required>
                        
                    </select>
                </div>

                 <div class="chapter" style="display:none;">       
                    <label style="color: #313F86;"><b>Select Chapter:</b></label>
                    <select class="form-control" name="chapter" id="chapter" style="width:20%;" onchange="sub()" required>
                        
                    </select>
                </div>

                <div class="files" style="display:none;">       
                    <label style="color: #313F86;"><b>Select Type:</b></label>
                    <select id="select_list" class="form-control mt-2" name="select_list" onchange="select_list()" style="width:20%;">
                        <option value="">Select List</option>
                        <option value="Link">Link</option>
                        <option value="Upload Files">Upload Files</option>
                    </select>


                    <form id="upload_file" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="id" id="id"  required>
                        <input type="text" class="form-control mb-3 mt-3" name="key" id="key" style="width:210px;" placeholder="Enter Key Value">
                        <input type="text" class="form-control mb-3 mt-3" name="title_name" id="title_name" style="width:210px;" placeholder="Enter File Name">
                        <div class="files_submit" style="display:none;">
                            <input type="file" id="file_up" name="file_up"><br>
                            <span style="">(pdfs,word,xls,jpeg,link,..etc)</span>  
                        </div>
                        <div class="link_submit" style="display:none;">
                            <input type="text" class="form-control mb-3" name="link_field" id="link_field" style="width:210px;" placeholder="Enter the link">                            
                        </div>
                                      
                        <button type="submit" class="btn btn-primary center-block update " id = "add" style="float:left;color:white;margin-top:3px;margin-left: 11%;background-color: #218838;">Upload</button>
                    </form>
                </div><!--files ends-->

                <div class="table-responsive">
                    <table class="table table-bordered" id="table_details" style="margin-top:5%;background-color: #fff;">
                        <thead style="background-color: #0065A3;color: #fff;">
                            <th style="text-align:center;">Category Name</th>
                            <th style="text-align:center;">File Created at</th>
                            <th style="text-align:center;">File Updated at</th>
                            <th style="text-align:center;">File Name</th>
                            <!-- <th style="text-align:center;">file Links</th> -->
                            <th style="text-align:center;">Actions</th>
                        </thead>
                        <tbody id="diseases">
                            
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>      
    </div>
</div>

<div class="modal fade editDisease">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#0065A3;padding: 10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="font-size: 18px;font-weight: 600;color: #fff;">Edit e-Library</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form id="update-disease-form" enctype="multipart/form-data">
					<input type="hidden" name="cid" id="cid">
                    <div class="form-group">
						<label for="">Category Name</label>
						<input type="text" class="form-control" name="category_name1" id="category_name1"  readonly>
					</div>
                    <div class="form-group">
						<label for="">Sub Category Name</label>
						<input type="text" class="form-control" name="category_name" id="category_name"  readonly>
					</div>
                    <div class="form-group">
						<label for="">File Name</label>
						<input type="text" class="form-control" name="file_name1" id="file_name1" >
					</div>
					<div class="form-group">
						<label for="">File created at</label>
						<input type="text" class="form-control" name="created_at" id="created_at" readonly>
					</div>
                    <div class="form-group">
                        <label for="file">File</label>&nbsp;<i onclick="wash()" class="fa fa-times" id="cross" aria-hidden="true" style=" color:#ee6304;cursor: pointer;"></i><span>(kindly use pdfs,jpeg files only)</span><br>
                        <input type="file" id="file" name="file">
                    </div>
                    <div id="preview"></div>
					<div class="form-group mt-3">
						<button type="submit" class="btn btn-block btn-success">Update</button>
					</div>
				</form>
            </div>
        </div>
    </div>
</div>


<script> 

    function select_list(){
        var list = $('#select_list').val();
        if(list == 'Link'){
            $('.link_submit').show();
            $('.files_submit').hide();
        }else{
            $('.link_submit').hide();
            $('.files_submit').show();
        }
    }

    function goBack() {
        location.href = '<?php echo base_url("e-Library-Upload-File")?>';
    }

    function find_sub(){
        var category_id = $('#field_name').val();
        // alert(z);
        $('.create1').show();
        $.ajax({
            type : "POST",
            url : '<?php echo base_url('find-sub') ?>',
            data : {id:category_id},
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){ 
                    // toastr["success"](response.message); 
                    
                    console.log(response.message);
                    $('#category').empty();
                    var mode='';
                    mode += '<option value="">Select categories</option>';

                    for(var i=0; i<response.message.length; i++){
                        mode += '<option value='+response.message[i].id+'>'+response.message[i].category_name+'</option>';
                    }
                    $('#category').append(mode);
                   
                }else{
                    toastr["error"](response.message); 
                    $('.create1').hide();
                }
            }
        });
    }

    function chapter_show(){
        var field_name = $('#field_name').val();
        var category = $('#category').val();
        if(field_name == '3'){
            $('.chapter').show();
             $('.create1').show();

                $.ajax({
                    type : "POST",
                    url : '<?php echo base_url('find-chapter') ?>',
                    data : {id:field_name,id1:category},
                    success:function(response){
                        response = jQuery.parseJSON(response);
                        if(response.result==1){ 
                            // toastr["success"](response.message); 
                            
                            console.log(response.message);
                            $('#chapter').empty();
                            var mode='';
                            mode += '<option value="">Select Chapter</option>';

                            for(var i=0; i<response.message.length; i++){
                                mode += '<option value='+response.message[i].id+'>'+response.message[i].chapter_name+'</option>';
                            }
                            $('#chapter').append(mode);
                           
                        }else{
                            toastr["error"](response.message); 
                            $('.create1').hide();
                            $('.chapter').hide();
                        }
                    } 
                });
        }
        else{
             $('.create1').show();
             sub();
        }
    }

    function sub(){
        var sub_categorie_id = $('#category').val();
        // alert(sub_categorie_id);
        $('#id').val(sub_categorie_id);
        $('.files').show();
    }

    $('#upload_file').submit(function(e){  
        e.preventDefault();
        var select_list = $('#select_list').val();
        var chapter = $('#chapter').val();
        var chapter_name = $('#chapter option:selected').text();
        
        var formdata = new FormData(this);
        formdata.append('select_list',select_list);
        formdata.append('chapter',chapter);
        formdata.append('chapter_name',chapter_name);
	
	    $("#add").attr('disabled', 'disabled');
        $("#add").text("Uploading...");

        $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("uploadFile")?>',
            data   : formdata,
            contentType: false,
            processData: false,                       
            success:function(response){
            response = jQuery.parseJSON(response);
            console.log(response);  
 		
                if(response.result==1)
                {  
                    // toastr["success"](response.message);
                    $('#upload_file')[0].reset();
                    $("#add").text("Upload"); 
                    $("#add").removeAttr('disabled'); 
                    swal({

                        title: "success",
                        type: "success",   
                        // confirmButtonColor: "#DD6B55",
                        // confirmButtonText: "OK"
                        timer:3000
                    });
                    window.setTimeout(function() {
                        // history.go(0);
						window.location = '<?php echo base_url("e-Library-Upload-File")?>';
                    }, 1000);
                    
                }
                else if(response.result==2){
                    toastr["error"](response.message); 
                    $('#upload_file')[0].reset();
                }
                else 
                {
                    toastr["error"](response.message);
                }
            }
        });
    });

    function table_fill(){
        var category_id = $('#field_name').val();
        // alert(category_id);
        $('#table_details').show();

        $.ajax({
            type : "POST",
            url : '<?php echo base_url('table-details') ?>',
            data : {id:category_id},
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){ 
                    // toastr["success"](response.message); 
                    $('.files').hide();
                    
                    console.log(response.message);
                    $('#diseases').empty();
                    var mode='';
                    for(var i=0; i<response.message.length; i++){

                        // var z = response.message[i].files;
                        mode += '<tr>';
                        mode += '<td style="text-align:center;"><p style="text-align:center;">'+response.message[i].category_name+'</p></td>';
                        mode += '<td style="text-align:center;"><p style="text-align:center;">uploaded by Dr.'+response.message[i].created_by+' on '+response.message[i].created_at+'</p></td>';
                        mode += '<td style="text-align:center;"><p style="text-align:center;">'+response.message[i].uploaded_at+'</p></td>';
                        mode += '<td style="text-align:center;"><p style="text-align:center;">'+response.message[i].name+'</p></td>';                       
                        // mode += '<td style="text-align:center;"><input type="text" class="form-control" value="'+response.message[i].link+'" style="text-align:center;" readonly></td>';
                        if(response.message[i].link){
                            // mode +=  '<td style="text-align:center;"><p style="text-align:center;">no files</p></td>';
                            mode += '<td style="text-align:center;"><button class="btn btn-sm btn-primary"  value="'+response.message[i].files+','+response.message[i].link+'" onclick="viewFile(this.value)" id="updateCountryBtn">View</button>&nbsp;<button class="btn btn-sm btn-danger"  value="'+response.msg[i].id+'" onclick="deleteFile(this.value)" id="deleteCountryBtn">Delete</button></td>';
                        }else{
                            // mode +=  '<td style="text-align:center;"><p style="text-align:center;">files</p></td>';
                            mode += '<td style="text-align:center;"><button class="btn btn-sm btn-primary"  value="'+response.message[i].files+','+response.message[i].link+'" onclick="viewFile(this.value)" id="updateCountryBtn">View</button>&nbsp;<button class="btn btn-sm btn-danger"  value="'+response.msg[i].id+'" onclick="deleteFile(this.value)" id="deleteCountryBtn">Delete</button>&nbsp;<button class="btn btn-sm btn-success" value="'+response.message[i].files+'" onclick="downloadFile(this.value)" id="downloadCountryBtn">Download</button>&nbsp;<button class="btn btn-sm btn-info"  value="'+response.message[i].id+','+response.message[i].files+'" onclick="updateFile(this.value)" id="changeCountryBtn">Update</button></td>';
                        }
                        mode += '</tr>';
                    }
                    $('#diseases').append(mode);
                   
                }else{
                    // toastr["info"](response.message); 
                    $('#table_details').hide();
                }
            }
        });
    }

    function viewFile(e){
        // var files = e;
        // alert(files);
        var files = e.split(',');         
        if(files[0] == ''){
            window.open(files[1]);
        }else{            
            window.open("<?php echo base_url('') ?>/public/uploads/"+files[0]);
        }
        
    }
    function deleteFile(e){
        // alert(e);
        var file = e;        
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
                    url:"<?php echo base_url("Delete-File")?>",
                    type:"POST",
                    data:{file:file},
                    success:function(response) {
                        response = jQuery.parseJSON(response);
                        console.log(response);
                        if(response.result == 1){
                            toastr["success"](response.message);
                            // $('#diseases').DataTable().ajax.reload(null, false);
                            history.go(0);
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
    }
    function downloadFile(e){
        var files = e;      
        
        var filePath = "<?php echo base_url('') ?>/public/uploads/"+files;
        var link = document.createElement('a');
        link.href = filePath;
        link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
        link.click();
        
    }

    function wash(){
        $('#file').show();
        $('#preview').empty();
        $('#cross').hide();
    }
    $('.editDisease').on('hidden.bs.modal', function (e) {
        $('#cross').show();
    });

  
    function updateFile(e){
        var split1 = e;
        var split_value = split1.split(',');  
        var user_id = split_value[0];
        var file = split_value[1];
        
        $.ajax({
            url:"<?php echo base_url("edit-file")?>",
            type:"POST",
            data:{id:user_id,file_name:file},
            success:function(response) {
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result == 1) 
                {
                    $("#cid").val(response.msg.id);
                    $("#category_name").val(response.message.category_name);
                    $("#category_name1").val(response.message.fields);
                    $("#created_at").val(response.msg.created_at);
                    $("#file_name1").val(response.msg.name)
                    $('#file').hide();
                    $("#preview").append(response.msg.files);
                    $(".editDisease").modal("show");
                    $("#clos").click(function(){
                        $('#preview').empty();
                    });
                }
            }
        });        
    }

    $('#update-disease-form').submit(function(e){  
        e.preventDefault();
        formdata = new FormData($(this)[0]);
        $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("edit-elibrary")?>',
            data   : formdata,
            contentType: false,
            processData: false,					  
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                {  
                    toastr["success"](response.message);
                    // $(".editDisease").modal("hide");	
                    window.setTimeout(function() {
                        history.go(0);
                    }, 1000);		
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


<style type="text/css">
    @media only screen and (max-width:600px){
        .category select{
            width: 80%!important;
        }
    }
</style>

