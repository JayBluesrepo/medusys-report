<?php
    echo view('includes/admin-header', $user_management, $org);    
	$role_id = session()->get('role_id');

?>

		
    <div class="col-sm-10" style="padding:3%;">
        
           <div class="row" id="mobile-div">
               <div class="col-sm-4">
                    <h4 class="user-tag">User Management</h4>
               </div>
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="background-color:#0065A3;margin-left:14%;padding: 8px 15px;border-radius: 8px;">
                     Add New User
                    </button>
                    <button type="button" id="btnExport" class="btn-excel" onclick="usermanagement_excel()">Export to Excel</button>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title" style="color:#0065A3;font-weight: 600;">Add User</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body" style="background-color: #EFF3FC;">
                           <div class="add-user-form">
                               <form id="add_user_manually">
                                   <div class="row">
                                       <div class="col-sm-6">
                                           <label>First Name</label>
                                           <div class="form-group">
                                               <input type="text" class="form-control" name="f_name" required>
                                           </div>
                                       </div>
                                        <div class="col-sm-6">
                                           <label>Last Name</label>
                                           <div class="form-group">
                                               <input type="text" class="form-control" name="l_name">
                                           </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                        <div class="col-sm-6">
                                            <label>Mobile</label><br>
                                            <input type="text" class="form-control" name="mobile" required>
                                        </div>
                                        <div class="col-sm-6">
                                             <label>Email</label>
                                            <input type="email" class="form-control"  name="email">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label>Hospital</label>
                                            <input type="text" class="form-control" name="hospital" >
                                        </div>
                                        <div class="col-sm-6">
                                             <label>City</label>
                                            <input type="text" class="form-control" name="city">
                                        </div>
                                    </div>
                                     <div class="row">
                                        <div class="col-sm-6">
                                            <label>Country</label><br>
                                            <input type="text" class="form-control" id="" name="country" value="">
                                        </div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                      <button type="submit" class="btn-update">Submit</button>
                               </form>
                           </div>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!---------------------Modal-end----------------->

                </div>
           </div>

            <div id="jaytab3" style="margin-top:6%;" >

                <div class="grid_div"></div>
                    <div id="list2">
                        <table id="list3">

                        </table>
			            <div style="display:none;">

                            <table  border="1" style="border-spacing: 0px !important;" id="user_excel" class="user_excel"></table>

                        </div>
                    </div>
                <div id="pager3"></div>
            </div>
        </div>
    </div><!--col-10-->

    <div class="modal fade editDisease" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header" style="background-color:#439bc1;padding:10px;">
                <h2 class="modal-title" id="exampleModalLabel" style="color:white;font-size:18px;font-weight: 600;">Role</h2>
                <button type="button" class="close" id="clos" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form id="update-disease-form">
                        <input type="hidden" id="idc" name="id">

                        <div class="form-group">
                            <label for="">Section Name</label>
                            <!-- <input type="text" class="form-control section_name" name="section_name" > -->
                            <select name="section_name" class="form-control section_name" >
                                <option>Select</option>
                                <option value="0">Not Define</option>
                                <?php if($role_id == 1){?>
                                    <option value="1">Super Admin</option>
                                    <option value="2">Organisation Admin</option>
                                    <option value="3">Modular Admin</option>
                                    <option value="4">Faculty</option>
                                <?php }else if($role_id == 2){?>
                                    <!-- <option value="1">Super Admin</option> -->
                                    <!-- <option value="2">Organisation Admin</option> -->
                                    <option value="3">Modular Admin</option>
                                    <option value="4">Faculty</option>
                                <?php } else{?>
                                    <!-- <option value="1">Super Admin</option> -->
                                    <!-- <option value="2">Organisation Admin</option> -->
                                    <!-- <option value="3">Modular Admin</option> -->
                                    <option value="4">Faculty</option>
                                <?php } ?>
                                
                            </select>
                        </div>         
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-success update">Save</button>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>

    <script type="text/ecmascript" src="<?php echo base_url('public/jqgrid/js/jquery.jqGrid.min.js'); ?>"></script>
    <!-- This is the localization file of the grid controlling messages, labels, etc.-->
    <!-- We support more than 40 localizations -->
    <script type="text/ecmascript" src="<?php echo base_url('public/jqgrid/js/i18n/grid.locale-en.js'); ?>"></script>
    <!-- A link to a jQuery UI ThemeRoller theme, more than 22 built-in and many more custom -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>" /> 
    <!-- The link to the CSS that the grid needs -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('public/jqgrid/css/ui.jqgrid.css'); ?>" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('public/jqgrid/css/ui.jqgrid-bootstrap.css'); ?>" />
    <script src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>" type="text/javascript"></script>
    <script type="text/ecmascript" src="<?php echo base_url('public/jqgrid/js/jquery.table2excel.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/jquery.table2excel.js');?>"></script>
    <script>

        $(document).ready(function(){
        //     var pickup_date   = '1';
        //     var sales_person  = '1';
        //     var lastSelection = "";

            jQuery("#list3").jqGrid({

                url:"<?php echo site_url('show-all-user-data');?>",
                datatype: "json", 

                colNames:['Sl','First Name','Last Name','Hospital','Gamer_id','Role','Action'],

                colModel:[

                    {name:'id',index:'id',hidden:true, width:50, editable:false},
                    // {name:'booking_date',index:'booking_date',width:100, editable:false, formatter: 'date', formatoptions: { newformat: 'd-m-Y' }},
                    {name:'f_name',index:'f_name', width:140, editable:false },
                    {name:'l_name',index:'l_name', width:130, editable:false},  
		            {name:'hospital',index:'hospital',width:150, editable:false},                  
                    {name:'gamer_id',index:'gamer_id', width:120, editable:false },
                    {name:'role_id',index:'role_id', width:140, editable:false},
                    //   {name:'mobile_number',index:'mobile_number', width:90, editable:false},
                    //   {name:'seva_price',index:'seva_price', width:70, editable:false},
                    //   {name:'booking_pnr',index:'booking_pnr', width:90, editable:false},
                    //   // {name:'payment_mode',index:'payment_mode', width:100, editable:false},
                    //   {name:'crb',index:'crb', width:80, editable:false},           
                    {name:'',index:'',search:false, 
                        width:50, editable:false,formatter: function (cellvalue, options, rowObject) {
                        var retVal = "";
                            var retVal = ' <a data-toggle="tooltip" title="Edit" class="" href="javascript:void(0);"><span class="fa fa-pencil" onclick="fun_edit($(this))"  style="color:blue;"></span></a';
                            return retVal;
                        

                    }},
                    // {name:'',index:'',search:false, 
                    // width:50, editable:false, align:'center',formatter: function (cellvalue, options, rowObject) {
                    
                    // var retVal = "";
                    // var retVal = '';
                    // return retVal;           

                    // }},
                    //   {name:'',index:'',search:false, 
                    //               width:30, editable:false,formatter: function (cellvalue, options, rowObject) {
                    //                   var retVal = "";
                    //                   var retVal = ' <a data-toggle="tooltip" title="View"><span class="fa fa-eye" onclick="view('+rowObject.id+')" style="color:#ee6304;"></span></a>';
                    //                     return retVal;
                                    

                    //   }},
                

                ],

                rowNum:20,
                rowList:[20,30,50,100,200,300],
                rownumbers: true,
                pager: '#pager3', 
                sortname:'id', 
                autowidth: true,
                height: '100%',
                // width: '100%',
                viewrecords: true, 
                loadonce:true,
                gridview: true,
                sortorder:"desc", 
                shrinkToFit: true,
                caption:"Members List",
                loadComplete: function () {
                  
                    var rows = $("#list3").getDataIDs(); 
                
                    for (var i = 0; i < rows.length; i++){
                        
                        var rowData = $('#list3').jqGrid('getRowData', rows[i]);
                        
                        var enable = $("#list3").getCell(rows[i],"role_id");
                        
                        // alert(enable);
                        if(enable == "1")
                            rowData.role_id = 'Super Admin';
                        else if(enable == "2")
                            rowData.role_id = 'Organisation Admin';
                        else if(enable == "3")
                            rowData.role_id = 'Modular Admin';
                        else if(enable == "4")
                            rowData.role_id = 'Faculty';
                        else if(enable == "0")
                            rowData.role_id = 'Not Define';
                        $('#list3').jqGrid('setRowData', rows[i], rowData);
                        
                        // var booking_open = $("#list3").getCell(rows[i],"booking_open");
                        //  console.log(booking_open);
                    }
                    
                },
                subGrid: true,

                subGridRowExpanded: function(subgrid_id, row_id) {
                    var subgrid_table_id;
                    swan_id=row_id;                

                    subgrid_table_id = subgrid_id+"_t";
                    jQuery("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table>");

                    jQuery("#"+subgrid_table_id).jqGrid({

                        url:"<?php echo site_url('show-row-details');?>?id="+swan_id,
                        type : "GET", 
                        datatype: "json", 
                        colNames:['Sl','e-mail','Mobile','City','Country'],
                        colModel:[

                        {name:'id',index:'id',hidden:true, width:50, editable:false},
                        {name:'email',index:'email', width:150, editable:false},
                        {name:'mobile',index:'mobile', width:120, editable:false},                              
                        
                        {name:'city',index:'city', width:150, editable:false},                              
                        {name:'contry',index:'contry', width:150, editable:false}
                        // {name:'purpose',index:'purpose', width:150, editable:false}    

                        ],

                        height: 'auto',
                        autowidth: true,
                        shrinkToFit: true,
                        rowNum:20,
                        sortname: 'num',
                        sortorder: "asc",
                        pager:subgrid_table_id,
                        loadonce: true,
                        footerrow: true,
                        userDataOnFooter: true,  

                    });

                }            

            });            

            $("#list3").jqGrid("setLabel", "rn", "SL");
            $("#list3").jqGrid('filterToolbar',{stringResult: true,searchOperators : true}); //for multisearch code,remove if not required

            $("#list3").jqGrid('navGrid','#pager3',
                {edit:false,add:false,del:false,search:true,refresh:true},
                { },
                { },
                { }, 
                {
                sopt:['eq', 'ne', 'lt', 'gt', 'cn', 'bw', 'ew'],
                closeOnEscape: true, 
                multipleSearch: true, 
                closeAfterSearch: true }
            );
        });

        function fun_edit(rowId){

            var id = rowId.closest('tr').attr('id');
            // alert(id);
            $.ajax({

                url:"<?php echo site_url("change-action")?>",
                type:"POST",
                data:{id:id},
                success:function(response) {
                    response = jQuery.parseJSON(response);
                    // console.log(response);

                    if(response.result == 1){

                        $(".editDisease").modal("show");
                        $("#idc").val(response.message.id);
                        $(".section_name").val(response.message.role_id);
                    }
                }
            }); 
        }

	 function fun_excel(){

           

            $.ajax({

                url:"<?php echo site_url('show-all-user-data');?>",
                type:"GET",
              
                success:function(response) {
                    // response = jQuery.parseJSON(response);
                    // console.log(response[0]);
                        $('.user_excel').empty();

                var con = '';


                

                con +='<thead><tr><th>First Name</th><th>Last Name</th><th>Hospital</th><th>Gamer_id</th><th>Role</th><th>Mobile Number</th><th>E-mail</th></tr></thead>';
                 $.each( response, function( key, value ) {   
                  con += '<tr>';                
                  con += '<td>'+value.f_name+'</td>';
                  con += '<td>'+value.l_name+'</td>';
                  con += '<td>'+value.hospital+'</td>';
                  con += '<td>'+value.gamer_id+'</td>';
                  if(value.role_id == '0'){
                    con += '<td>Not Define</td>';
                  }else if(value.role_id == '1'){
                    con += '<td>Super Admin</td>';
                  }else if(value.role_id == '2'){
                    con += '<td>Organization Admin</td>';
                  }else if(value.role_id == '3'){
                    con += '<td>Modular Admin</td>';
                  }else if(value.role_id == '4'){
                    con += '<td>Faculty</td>';
                  }
                //   con += '<td>'+value.role_id+'</td>';
                  con += '<td>'+value.mobile+'</td>';
                  con += '<td>'+value.email+'</td>';
                  con += '</tr>';

                });

                $('.user_excel').append(con);   
                }
            }); 
        }

        $('#update-disease-form').submit(function(e){
            e.preventDefault();
            var id = $('.section_name').val();           

            // alert(id);
            var formData = new FormData(this);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("edit-change-action")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);
                    $(".editDisease").modal("hide");                   
                    history.go(0); 
                }
                else{
                    toastr["error"](response.message);                    
                }
                }
            });           
        });
fun_excel();
    </script>

    <script>    
    $('#add_user_manually').submit(function(e){
        e.preventDefault(); 
        var formData = new FormData(this); 
        $(".btn-update").text("Updating...");
        $(".btn-update").attr("disabled", true);
        
        $.ajax({
            type : 'POST',
            url : '<?php  echo base_url("add-user-manually")?>',
            data : formData,
            contentType: false,
            processData: false,
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);
                    $("#add_user_manually").modal("hide");
                    $('.btn-update').removeAttr("disabled");
                    $(".btn-update").text("Save");
                    history.go(0); 
                }
                else{
                    toastr["error"](response.message);
                    $('.btn-update').removeAttr("disabled");
                    $(".btn-update").text("Update");
                }
            }
        });
        
    });
</script>
     <script type="text/javascript">
        function usermanagement_excel(){

            $(".user_excel").table2excel({

                exclude: ".noExl",
                name: "Excel Document Name",
                filename: "User Management Report",
                fileext: ".xls",
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true
            });                        

        }
    </script>
    <style>
        .ui-jqgrid-sdiv{
            display : none !important;
        }
    	.ui-jqgrid-titlebar {
    		background-color:#0065A3;
    	}
    	.ui-jqgrid-title{
    		color:#fff;
            font-weight: 600;
            font-size: 18px;
    	}
        .user-tag{
            color: #0065A3;
            font-weight: 600;
            font-size: 24px;
        }
        .soptclass{
            display : none;
        }
        @media only screen and (max-width:600px){
            #mobile-div{
                padding: 20px;
            }
        }
    </style>


<?php
    echo view('includes/admin-footer');    
?>
