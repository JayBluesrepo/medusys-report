<?php
    echo view('includes/admin-header', $add_library, $org);    
?>


<div class="col-sm-10">
    <div class="row pt-4 pr-2 m-3">
        <div class="col-sm-8">
          <h4 class="user-tag">Add e-Library</h4>
        </div>
        <div class="col-sm-4" id="add-user-right">
            <!-- <button type="button" onclick="goBack()"><i class="fa fa-arrow-left" style="background-color: #00AEFF;" aria-hidden="true"></i>Go Back</button> -->
            <button type="button" class="btn" onclick="add()" style="background-color:#1974A7; color:#fff;">Add e-library</button>
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
                      <th style="color: #fff;">SL</th>
                      <th style="color: #fff;">Section Names</th>
                      <th style="color: #fff;">Created_at</th>                        
                      <th style="color: #fff;">Action</th>
                    </tr>
                  </thead>
                  <tbody> </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>
    </div>     
</div>

<!-- --------------------------------add e-library-------------------------- -->

<div class="modal fade editDisease" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#439bc1;padding:10px;">
        <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Add e-Library</h2>
        <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form id="update-disease-form">
					

					<div class="form-group">
						<label for="">Section Name</label>
						<input type="text" class="form-control section_name" name="section_name" >
					</div>         
					
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success update">Save</button>
					</div>
				</form>
      </div>
    </div>
  </div>
</div>

<!-- --------------------edit e-Library--------------------------------------------- -->

<div class="modal fade editUser" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#439bc1;padding:10px;">
        <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-weight: 600;font-size: 18px;">Edit e-Library</h2>
        <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
				<form id="update-library-form">
					<input type="hidden" name="get_id" id="get_id">
					<div class="form-group">
						<label for="">Section Name</label>
						<input type="text" class="form-control section_name_edit" name="section_name_edit" >
					</div>         
					
					<div class="form-group">
						<button type="submit" class="btn btn-block btn-success update1">Update</button>
					</div>
				</form>
      </div>
    </div>
  </div>
</div>



<script>

  $('.editDisease').on('hidden.bs.modal', function (e) {   
    
    $('#update-disease-form')[0].reset();
  });
 
  $('#library-table').DataTable({
    "processing":true,
    "serverSide":true,
    "ajax":"<?php echo base_url('library-section') ?>",
    "dom":"lBfrtip",
    stateSave:true,
    info:true,
    "bInfo": true,   
    "bPaginate": true,
    "iDisplayLength":10,
    "pageLength":5,
    "aLengthMenu":[[5,10,25,50,-1],[5,10,25,50,"All"]],
    "columnDefs": [
      { "width": "10px", "targets": [0] },
      { "width": "150px", "targets": [1] },
      { "width": "300px", "targets": [2] },
      { "width": "200px", "targets": [3] }          
    ],
    autoWidth:false,
    "fnCreatedRow": function(row, data, index){
      $('td',row).eq(0).html(index+1);
    }

  });

  function add(){    
    $('.editDisease').modal("show");
  }

  $('#update-disease-form').submit(function(e){
    e.preventDefault();

    var name = $('.section_name').val();
    if(name == ''){
      toastr.error('Enter the section name');
    }else{
      var formData = new FormData(this);
      $(".update").text("Updating...");
      $(".update").attr("disabled", true);

      $.ajax({
        type : "POST",
        url : '<?php  echo base_url("add-library-section")?>',
        data : formData,
        contentType: false,
        processData: false,
        success:function(response){
          response = jQuery.parseJSON(response);
          if(response.result==1){
              toastr["success"](response.message);
              $(".editDisease").modal("hide");
              $('.update').removeAttr("disabled");
              $(".update").text("Save");
              history.go(0); 
          }
          else{
              toastr["error"](response.message);
              $('.update').removeAttr("disabled");
              $(".update").text("Update");
          }
        }
      });
    }    
  });

  $(document).on('click', '#deleteCountryBtn', function(){
    var id = $(this).data('id');

    // alert(id);
    // var split_value = split1.split(',');  
    // var user_id = split_value[0];
    // var file = split_value[1];
    swal({   
      title: "Are you sure?",
      text: "You want to delete this?",
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
            url:"<?php echo base_url("delete-e-library")?>",
            type:"POST",
            data:{id:id},
            success:function(response) {
              response = jQuery.parseJSON(response);
              // console.log(response);
              if(response.result == 1){
                  toastr["success"](response.message);
                  $('#library-table').DataTable().ajax.reload(null, false);
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
    var id = $(this).data('id');
	  $.ajax({
			url:"<?php echo base_url("edit-e-library")?>",
			type:"POST",
			data:{id:id},
			success:function(response) {
				response = jQuery.parseJSON(response);
				// console.log(response);
				if(response.result == 1){
					$("#get_id").val(response.message.id);
					$(".section_name_edit").val(response.message.master_name);				
					$(".editUser").modal("show");
				}
			}
		}); 
	});

  $('#update-library-form').submit(function(e){
    e.preventDefault();
    var name = $('.section_name_edit').val();
    
    if(name == ''){
      toastr.error('Enter the section name');
    }else{
      var formData = new FormData(this);
      $(".update1").text("Updating...");
      $(".update1").attr("disabled", true);

      $.ajax({
        type : "POST",
        url : '<?php  echo base_url("edit-e-library-section")?>',
        data : formData,
        contentType: false,
        processData: false,
        success:function(response){
          response = jQuery.parseJSON(response);
          if(response.result==1){

            toastr["success"](response.message);
            $(".editUser").modal("hide");
            $('.update1').removeAttr("disabled");
            $(".update1").text("Save");
            history.go(0); 
          }
          else{

            toastr["error"](response.message);
            $('.update1').removeAttr("disabled");
            $(".update1").text("Update");
          }
        }
      });
    }
    
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
  .next{
    padding: 0;
    width: initial;
    border: none;
    margin: 0;
    background: none;
  }
</style>
