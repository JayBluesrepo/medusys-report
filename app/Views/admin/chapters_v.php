<?php
    echo view('includes/admin-header', $e_library);    
?>


       
<div class="col-sm-10">
    <div class="row">
        <div class="col-sm-10" id="up-tag"><h3>Add Chapter</h3></div>
        <div class="col-sm-2">
            <div class="go-back" style="margin:5% 0;">
                <a href="#" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
            </div> 
        </div>
    </div>
    <div class="category">
        <form id="categories">
        <label style="color: #313F86;"><b>Field names:</b></label><br>
        <select class="form-control" name="field_name" id="field_name" style="width:20%;" value="<?php echo $val['id']; ?>" onchange="find_sub();">
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
                <label style="color: #313F86;"><b>Select Category:</b></label><br>
                <div style="display:flex;padding-bottom: 12px;">
                    <select class="form-control" name="category" id="category" style="width:20%;" onchange="sub();list_data();"> 
                        
                    </select>
                </div>

                
                <div class="files" style="display:none;">       
                     <label style="color: #313F86;"><b>Enter Chapter Name :</b></label>
                    <input type="text" class="form-control" name="chapter" required style="width: 21%;height: 32px;">&nbsp; &nbsp;&nbsp; &nbsp;
                            <button type="submit" style="background-color:#218838; color:#fff;margin-top: 0;" class="btn mt-4">Submit</button>


                </div><!--files ends-->

            </div>            
        </div> 
        </form>     
    </div>

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
                                <th style="color:#fff;">Chapter Name</th>
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


<div class="modal fade editDisease" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#439BC1;padding: 10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="font-size:18px;font-weight: 600;color: #fff;">Edit Chapter</h2>
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
                        <input type="text" class="form-control" name="category" id="category1" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Chapter Name</label>
                        <input type="text" class="form-control" name="chapter" id="chapter1" placeholder="Enter category">
                    </div>


                    <div class="form-group">
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
    function list_data(){

        var category = $('#field_name').val();
        // alert(category);
        $('.create').show();

        $('#user-table').DataTable({
            "processing":true,
            "serverSide":true,
            ajax: {
                url: '<?php echo base_url('list-chapters') ?>',
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

    function sub(){ 
        //var sub_categorie_id = $('#category').val();
        //alert(sub_categorie_id);
        //$('#id').val(sub_categorie_id);
        $('.files').show();
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
                    url:"<?php echo base_url("remove-chapter")?>",
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
        alert(user_id);
        $.ajax({
            url:"<?php echo base_url("edit-chapter")?>",
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
                    $("#category1").val(response.message.category_name);
                    $("#chapter1").val(response.message.chapter_name);
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
            url    : '<?php echo base_url("update-chapter-data")?>',
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

    $(document).ready(function(){ 


        $('#categories').submit(function(e){  
            e.preventDefault();
            var field = $('#field_name option:selected').text();
            var field1 = $('#category option:selected').text();
            formdata = new FormData($(this)[0]);
            formdata.append('fields',field);
            formdata.append('field1',field1);
            $.ajax({
                type   : 'post',
                url    : '<?php echo base_url("saveChapter")?>',
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
    .next{
        padding: 0;
        width: initial;
        border: none;
        margin: 0;
        background: none;
    }
    @media only screen and (max-width:600px){
        .category input,select{
            width: 80%!important;
        }
    }
</style>


