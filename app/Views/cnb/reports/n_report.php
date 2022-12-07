<?php

    echo view('includes/reports-header');    
?>

<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
/>
<link
  rel="stylesheet"
  href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css"
/>

<div class="col-sm-9" >
 
    <div class="row pt-5">
    <div class="col-sm-3">
    <label><b>From Date:</b></label>
    <input type="date"   class="form-control from_date"  name="from_date" value="<?php echo session()->get('from_date'); ?>" >
    </div>
    <div class="col-sm-3">
    <label><b>To Date:</b></label>
    <input type="date"   class="form-control to_date"  name="to_date"  value="<?php echo session()->get('to_date'); ?>">
    </div>
    <div class="col-sm-6" style="margin-top: 30px;">
    <button type="button" class="btn btn-primary" >Apply</button>
    </div>
    </div>

  <div class="reports-right pt-4"    >
    <input id="save-pdf" type="button" value="Save as PDF"  />
    <div id="chart_div"></div>
<div class="col-sm-9" id="reports-pdf"  >
    <h3 class="mt-4 pt-5">Audit Result</h3>

    <br />
    <!------------------------------------------->
    <div class="row">
      <div class="col-sm-5">
        <div class="report-detail-tag">
          <h4 class="mb-4">Report Details</h4>

          <h5>From Date : <span id="from_date"><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span></h5>
          <h5>To Date : <span id="to_date"><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span></h5>
          <h5>Reported by :<span id="reported_by"><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span></h5>
        </div>
      </div>
      <div class="col-sm-7"></div>
    </div>
    <!----------------------------------------->
    <div class="row">
      <div class="col-sm-5 table-responsive" id="demo-table">
      <table
      class="table table-bordered"
      style="height: 200px; width: 100%"
      id="mytable"
      >
      <thead>
        <tr>
        <th>Characteristics</th>
        <th>n</th>
    
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>
          <p>Cases recorded with minimum data set - <strong>N<sub>`</sub></strong></p>
        </td>
        <td>
          <p><?php echo $total; ?></p>
        </td>
        </tr>
        <tr>
        <td>
          <p>Cases with complete entry - <strong>N<sub>c</sub></strong></p>
        </td>
        <td>
          <p><?php echo $total_nc; ?></p>
        </td>
      </tr>
      </tbody>
      </table>
    </div>
</div>
    <!-- <br /> -->

      <!-- <div class="col-sm-5">
        <div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
      </div> -->
    

  <div class="reports-right pt-4">
  
    <div id="chart_div"></div>
    <h3 class="mt-4">Procedure</h3>

    <br />
    <div class="row">
    <div class="col-sm-5" id="demo-table">
      <table
      class="table table-bordered"
      style="height: 200px; width: 100%"
      id="mytable"
      >
      <thead>
        <tr>
        <th>Characteristics</th>
        <th>n</th>
        <th>Percentage</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>
          <p>Combined Spinal Epidural <strong>N<sub>cse</sub></strong></p>
        </td>
        <td>
          <p><?php echo $cse_total; ?></p>
        </td>
        <td>
          <p><?php echo $cse_perc; ?></p>
        </td>
        </tr>
        <tr>
        <td>
          <p>Epidural alone <strong>N<sub>e</sub></strong></p>
        </td>
        <td>
          <p><?php echo $e_total; ?></p>
        </td>
        <td>
          <p><?php echo $e_perc; ?></p>
        </td>
        </tr>
        <tr>
        <td>
          <p>Spinal alone <strong>N<sub>s</sub></strong></p>
        </td>
        <td>
          <p><?php echo $s_total; ?></p>
        </td>
        <td>
          <p><?php echo $s_perc; ?></p>
        </td>
        </tr>
        <tr>
        <td>
          <p>CSA - Continuous Spinal Anaesthesia <strong>N<sub>csa</sub></strong></p>
        </td>
        <td>
          <p><?php echo $csa_total; ?></p>
        </td>
        <td>
          <p><?php echo $csa_perc; ?></p>
        </td>
        </tr>
      </tbody>
      </table>
    </div>
    <div class="col-sm-7">
        <div id="procedureGoogleTableChart"style="height: 200px; width: 100%"></div>
    </div>
    
    </div>
    <br />

 </div>


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
                  <th>Stats</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <p>Total number of cases recorded with minimum data set</p>
                  </td>
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
</div>
    <div class="table-cont">
      <h4><b>N'</b></h4>
      <p>
        1) N' = Total Number of Cases Recorded includes all the cases which have
        been uploaded for analysis
        <span
          >with a minimum mandated three sections filled including Preop,
          Procedure and PACU.</span
        >
        Ie. this may include records with optional follow up or feedback
        sections also.
      </p>
      <p>2) N' includes following scenarios of data entered by users</p>
      <ul>
        <li>Cases with Preop, Procedure and PACU</li>
        <li>Cases with Preop, Procedure, PACU, Followup</li>
        <li>Cases with Preop, Procedure, PACU, Feedback</li>
      </ul>
      <h4><b>Nc</b></h4>
      <p>
        Nc=mandatory sections + Follow-up + feedback <br />
        = Total Number of Cases with Complete Data includes cases where in all
        five sections are completed (Preop, Procedure, PACU, Follow up and
        Feedback)
      </p>
      <p>Nc includes following scenario of data entered by users</p>
      <ul>
        <li>Cases with Preop, Procedure, PACU, Followup and Feedback</li>
        <li>RAD Version – any updated data</li>
      </ul>
    </div>
</div>
 
</div>
        
   </script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script
  type="text/javascript"
  src="https://www.gstatic.com/charts/loader.js"
></script>
<script  src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>

  google.load('visualization', '1.0', {'packages':['corechart']});


         google.charts.load('current', {'packages':['corechart', 'bar','table']});

  google.charts.setOnLoadCallback(drawChart);
           // Line Chart
  function drawChart() {

    var data1 = google.visualization.arrayToDataTable([
      ['Characteristics', 'Stats'],
        <?php

             echo "['Total number of cases recorded with minimum data set','N’'],";
             echo "['Total number of cases with complete entry','Nc'],";

         ?>
    ]);
    var data = google.visualization.arrayToDataTable([
      ['Characteristics', 'Count'],
        <?php
          foreach ($products as $row){
             echo "['".$row['day']."',".$row['sell']."],";
        } ?>
    ]);
    var options = {
      title: 'Audit Classification',
      curveType: 'function',
      legend: {
        position: 'top'
      }
    };

    
    // var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart'));
    // pie_chart.draw(data, options);

    
    



    // ------------------------PROCEDURE--------------------------


    var data1 = google.visualization.arrayToDataTable([
      ['Characteristics', 'Stats'],
        <?php

             echo "['Total number of cases recorded with minimum data set','N’'],";
             echo "['Total number of cases with complete entry','Nc'],";

         ?>
    ]);
    var procedure_data = google.visualization.arrayToDataTable([
      ['Characteristics', 'Count'],
        <?php
          foreach ($cse_products as $row){
          echo "['".$row['day']."',".$row['sell']."],";}

          foreach ($e_products as $row){
          echo "['".$row['day']."',".$row['sell']."],";}

          foreach ($s_products as $row){
          echo "['".$row['day']."',".$row['sell']."],";}

          foreach ($csa_products as $row){
          echo "['".$row['day']."',".$row['sell']."],";}
        ?>
    ]);
    var procedure_options = {
      title: 'Procedure',
      curveType: 'function',
      legend: {
        position: 'top'
      }
    };

    var pie_chart = new google.visualization.PieChart(document.getElementById('procedureGoogleTableChart'));
    pie_chart.draw(procedure_data, procedure_options);

     
        var btnSave = document.getElementById('save-pdf');
        
            btnSave.disabled = false;
        
          btnSave.addEventListener('click', function () {
                var doc = new jsPDF();
          html2canvas($('#reports-pdf').get(0)).then(function(canvas) {
            // export pdf
            var pdfDoc = new jsPDF({
            orientation: 'potrait',
            unit: 'px',
            format: [canvas.width, canvas.height]
            });
            pdfDoc.addImage(canvas.toDataURL('image/png'), 0, 0);
            pdfDoc.save('Audit.pdf');
          });
              //doc.addImage(pie_chart.getImageURI(),0,0);
            //doc.addImage(column_chart.getImageURI(),0,0);
              //doc.save('Audit.pdf');
          }, false);

      }

</script>


<script>
  $("button").click(function () {
    var from_date = "",
      to_date = "";
    from_date = $(".from_date").val();
    to_date = $(".to_date").val();
    // alert(from_date + " , " + to_date);
    $.ajax({
      type: "post",
      url: '<?php echo base_url("z")?>',
      data: { from_date: from_date, to_date: to_date },

      success: function (response) {
        response = jQuery.parseJSON(response);
        console.log(response);
        if (response.result == 1) {
          // alert(response.result);

          $("#from_date").html(response.from_date);
          $("#to_date").html(response.to_date);
          $("#reported_by").html(response.name);

    	  window.location.reload();

          var dates = response.data;
          dates.forEach(appendDate);

          function appendDate(date) {
            console.log(date);
            $("#reported_date").append(date.DATE + " , ");
          }
        } else {
      
        }
      },
    });
  });
</script>


<script>

console.log(<?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?>);


<?php if(session()->get('from_date')  &&  session('to_date')){ ?>

$('#reports-pdf').css('display', 'block');

<?php }else{  ?>

$('#reports-pdf').css('display', 'none');

<?php }; ?>



</script>

<?php
    echo view('includes/reports-footer');    
?>
