<?php
    echo view('includes/reports-header');    
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">  


<!-- <link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/css/simpleMobileMenu-2.css'); ?>"/> -->


	 
         <div class="col-sm-9" id="reports-pdf">
        
            <div class="reports-right pt-4">
		<input id="save-pdf" type="button" value="Save as PDF"  />
		<div id="chart_div"></div> <br />
                <h3>Patient Characteristics - Demography</h3>
					
		<br/>
						<div class="row">
       							<div class="col-sm-5">
        						<div class="report-detail-tag">
          						<h4 class="mb-4">Report Details</h4>

          						<h5>From Date : <span id="from_date"><?php echo session()->get('from_date'); ?></span></h5>
          						<h5>To Date : <span id="to_date"><?php echo session()->get('to_date'); ?></span></h5>
          						<h5>Reported By : Dr. <span id="reported_by"><?php echo session()->get('name'); ?></span></h5>
        						</div>
      							</div>
      						    <div class="col-sm-7"></div>
						</div>
		
					
                        </div>
		<div class="row" id="demo-table">
			<div class="col-sm-5">
				<h4>Total Cases,<?php echo $total_n;?></h4>
				<div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Characteristics</th>
                        <th>Stats</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="report-td-bg"><p>Age(year,mean ± SD),Min,Max</p></td>
                        <td><p>(<?php echo $average;?> ± <?php echo $std;?>),<?php echo $min_age;?> ,<?php echo $max_age;?></p></td>
                      </tr>
                      <tr>
                        <td id="report-td-bg"><p>Weight(kg,mean ± SD),Min,Max</p></td>
                        <td><p>(<?php echo $weight_average;?> ± <?php echo $weight_std;?>),<?php echo $minweight;?> ,<?php echo $maxweight;?></p></td>
                      </tr>
                      <tr>
                        <td id="report-td-bg"><p>Gender(M/F)</p></td>
                        <td><p><?php echo $male;?> / <?php echo $female;?></p></td>
                      </tr>
                    </tbody>
                  </table>
                </div></div>
			</div>
			<div class="col-sm-5">
				<div id="GooglePieChart" style="height: 400px; width: 100%"></div>
			</div>
		
		<div class="row" id="demo-table">
              <div class="col-sm-5">
                <h4>Total Cases with data,<?php echo ($bmi1 + $bmi2 + $bmi3);?></h4>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>BMI Range</th>
                        <th style="text-align: center;">n</th>
                        <th style="text-align: center;">% of total cases</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td id="report-td-bg"><p>Class I obese(BMI 30-34.99)</p></td>
                        <td><p><?php echo $bmi1;?></p></td>
                        <td><p><?php
														 $number = (($bmi1/($bmi1 + $bmi2 + $bmi3))*100);
														 
														echo number_format((float)$number, 1, '.', '')."%";?></p></td>
                      </tr>
                      <tr>
                        <td id="report-td-bg"><p>Class II obese(BMI 35-39.99)</p></td>
                        <td><p><?php echo $bmi2;?></p></td>
                        <td><p><?php
														 $number = (($bmi2/($bmi1 + $bmi2 + $bmi3))*100);
														 
														echo number_format((float)$number, 1, '.', '')."%";?></p></td>
                      </tr>
                      <tr>
                        <td id="report-td-bg"><p>Class III obese(BMI>40)</p></td>
                        <td><p><?php echo $bmi3;?></p></td>
                        <td><p><?php
														 $number = (($bmi3/($bmi1 + $bmi2 + $bmi3))*100);
														 
														echo number_format((float)$number, 1, '.', '')."%";?></p></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
		  </div><!--row--->
              <div class="col-sm-5">
                <div id="bmiGooglePieChart" style="height: 400px; width: 100%"></div>
              </div>
              <div class="col-sm-2"></div>
		
          
		<br/>
            
	    </div>
        </div>
    </div>
</section>


<!---------------- Menu Drodown --------------------->
<script type = "text/javascript">
</script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.mobimenu li.dropdown').hover(function() {
              $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }, function() {
              $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            });         
        });
    </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script  src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
		
		<script>

			google.load('visualization', '1.0', {'packages':['corechart']});


		    google.charts.load('current', {'packages':['corechart', 'bar','table']});

			google.charts.setOnLoadCallback(drawChart);
            // Line Chart
			function drawChart() {

				var data = google.visualization.arrayToDataTable([
					['Characteristics', 'Stats'],
						<?php 
							foreach ($products as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'Demography Classification',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				}; 

				

				var pie_chart = new google.visualization.PieChart(document.getElementById('GooglePieChart'));
				pie_chart.draw(data, options);


				var data1 = google.visualization.arrayToDataTable([
					['Characteristics', 'Stats'],
						<?php 
							foreach ($bmi as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options1 = {
					title: 'Demography Classification',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				}; 

				

				var pie_chart1 = new google.visualization.PieChart(document.getElementById('bmiGooglePieChart'));
				pie_chart1.draw(data1, options1);



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
						pdfDoc.save('Patient_demography.pdf');
					});
    					//doc.addImage(pie_chart.getImageURI(),0,0);
						//doc.addImage(column_chart.getImageURI(),0,0);
    					//doc.save('Patient_demography.pdf');
  				}, false);

			}
			
			
			
		</script>


<!---------------- Menu Drodown --------------------->


<?php
    echo view('includes/reports-footer');    
?>
