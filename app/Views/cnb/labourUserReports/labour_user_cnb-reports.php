<?php
    echo view('includes/user-reports-header');    
?>

    <div class="col-sm-9">
       
        <?php
            echo view('includes/reports-date-header');    
        ?>
    </br>
        <h1>CNB_Reports</h1>
	<div class="consolidated-results">
                    <h3>CNB Consolidated Results</h3>
                    <p class="cons-p"><b>Date range displayed (Start and End date)</b></p>
                    <div class="table-1">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                       <thead>
                                           <tr>
                                               <th>Characteristics</th>
                                               <th>Stats </th>
                                           </tr>
                                       </thead> 
                                       <tbody>
                                           <tr>
                                               <td><p>Total number of cases recorded with minimum data set</p></td>
                                               <td><p>N’</p></td>
                                           </tr>
                                           <tr>
                                               <td><p>Total number of cases with complete entry</p></td>
                                               <td><p>Nc</p></td>
                                           </tr>
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                    <div class="table-cont">
                        <h4><b>N'</b></h4>
                        <p>1) N'  =  Total Number of Cases Recorded includes all the cases which have been uploaded for analysis <span>with a minimum mandated three sections filled including Preop, Procedure and PACU.</span> Ie. this may include records with optional follow up or feedback sections also.</p>
                        <p>2) N' includes following scenarios of data entered by users</p>
                        <ul>
                            <li>Cases with Preop, Procedure and PACU</li>
                            <li>Cases with Preop, Procedure, PACU, Followup</li>
                            <li>Cases with Preop, Procedure, PACU, Feedback</li>
                        </ul>
                        <h4><b>Nc</b></h4>
                        <p>Nc=mandatory sections + Follow-up + feedback <br>  = Total Number of Cases with Complete Data includes cases where in all five sections are completed (Preop, Procedure, PACU, Follow up and Feedback)</p>
                        <p>Nc includes following scenario of data entered by users</p>
                        <ul>
                            <li>Cases with Preop, Procedure, PACU, Followup and Feedback</li>
                            <li>RAD Version – any updated data</li>
                        </ul>
                    </div>
                </div>

        <div class="col-sm-4" >
                <h3>Report Details</h3>
              
                <h5> From Date:<span id="from_date" ></span></h5>
                <h5> To Date:<span id="to_date"></span> </h5>
                <!-- <h5> Report Date:<span id="reported_date"></span></h5> -->
                <h5> Reported BY:<span id="reported_by"></span></h5>
        </div>

        <div class="col-sm-9">
            <h3>The Reports that are availble are</h3>
            <h5>Dates:<span id="reported_date"></span></h5>
        </div>

    </div><!--col-sm-9-->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-ui.js'); ?>"></script>
<script>
    $("button").click(function () {
        var from_date = '', to_date = '';
        from_date = $(".from_date").val();
        to_date = $(".to_date").val();
         // alert(from_date + " , " + to_date);
         $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("z")?>',
            data   : {from_date:from_date,to_date:to_date},  

            success:function(response){
                
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result == 1){

                    // alert(response.result);

                    $("#from_date").html(response.from_date);
                    $("#to_date").html(response.to_date);
                    $("#reported_by").html(response.name);
                       
                       var dates = response.data;
                    dates.forEach(appendDate);

                    function appendDate(date) {
                        console.log(date);
                       $("#reported_date").append(date.DATE+" , ");
                    }

                }else{

                }
            }
         });
      } );
</script>
<?php
    echo view('includes/user-reports-footer');    
?>




