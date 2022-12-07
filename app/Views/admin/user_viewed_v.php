<?php
    echo view('includes/admin-header');    
?>


<div class="col-sm-10" style="padding:3%;">

    <div class="row" id="mobile-div">
        <div class="col-sm-12">
            <h4 class="user-tag"><?php echo $title1['title']; ?></h4>
        </div>
        
        
    </div>
    <div class="row mt-4" id="mobile-div">
        <div class="col-sm-8">
            
        </div>
        
        <div class="col-sm-4">   
            <button type="button" id="btnExport" class="btn-excel" onclick="usermanagement_excel()">Export to Excel</button>
            <button type="button" class="btn btn-primary back" style="background-color:#0065A3;border-radius: 8px;">Back</button>         
        </div>
    </div>
    <div id="jaytab3" style="margin-top:6%;" >

        <input type="hidden" id='conf_id' value="<?php echo $conf_id; ?>">

        <div class="grid_div"></div>
        <div id="list2">
            <table id="list3">

            </table>
            <div style="display:none;">

                <table  border="1" style="border-spacing: 0px !important;" id="user_excel" class="user_excel">
                
                </table>

            </div>
        </div>
        <div id="pager3"></div>
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

    $('.back').click(function(){
        window.location.href = '<?php echo base_url("Conferencelist")?>';
    });

    $(document).ready(function(){

        var conf_id = $('#conf_id').val();

        jQuery("#list3").jqGrid({

            url:'<?php echo site_url('see-user-viewed-data');?>?id='+conf_id,
            datatype: "json", 

            colNames:['Sl','First Name','Last Name','Gamer ID','E-mail','Mobile-no'],

            colModel:[

                {name:'id',index:'id',hidden:true, width:50, editable:false},
                {name:'f_name',index:'f_name', width:140, editable:false },
                {name:'l_name',index:'l_name', width:140, editable:false },
                {name:'gamer_id',index:'gamer_id', width:130, editable:false},  
                {name:'email',index:'email',width:150, editable:false},                  
                {name:'mobile',index:'mobile', width:120, editable:false },
                // {name:'role_id',index:'role_id', width:140, editable:false}
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
            caption:"User Viewed List",
            
            subGrid: false,

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

    function fun_excel(){       
        
        var conf_id = $('#conf_id').val();

        $.ajax({
            url:'<?php echo site_url('see-user-viewed-data');?>?id='+conf_id,
            type:"GET",
        
            success:function(response) {
                // response = jQuery.parseJSON(response);
                console.log(response[0]);
                $('.user_excel').empty();

                var con = '';           

                con +='<thead><tr><th>First Name</th><th>Last Name</th><th>Gamer ID</th><th>E-mail</th><th>Mobile-no</th></tr></thead>';
                $.each(response, function( key, value ) {   
                    con += '<tr>';                
                    con += '<td>'+value.f_name+'</td>';
                    con += '<td>'+value.l_name+'</td>';
                    con += '<td>'+value.gamer_id+'</td>';
                    con += '<td>'+value.email+'</td>';
                    con += '<td>'+value.mobile+'</td>';
                    con += '</tr>';
                });

                $('.user_excel').append(con);   
            }
        }); 
    }

    fun_excel();

</script>

<script type="text/javascript">

    function usermanagement_excel(){

        $(".user_excel").table2excel({

            exclude: ".noExl",
            name: "Excel Document Name",
            filename: "User Viewed Report",
            fileext: ".xls",
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });                        

    }
</script>

<style>
    .ui-search-oper{
        display: none;
    }
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