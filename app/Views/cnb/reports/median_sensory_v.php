<?php
    echo view('includes/reports-header');    
?>



	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

	 
		<div class="col-sm-9" id="reports-pdf">

	         <div class="reports-right pt-4" >
				<input id="save-pdf" type="button" value="Save as PDF" />
				<div id="chart_div"></div>
                	<h3 class="mt-4">Sensory & Motor Block - Median Sensory & Motor Level</h3>
		
						<br/>
						<div class="row">
							<div class=" col-sm-5 table-responsive" id="demo-table">
<h4>Total Cases,<?php echo $total;?></h4>
        			<table class="table table-bordered" style="height: 200px; width: 100%" id="mytable">
        				<thead>
        					<tr>
        						<th>Characteristics</th>
        						<th>n</th>
        						<th>percentage</th>
        					</tr>
        				</thead>
        				<tbody>
        					
							<?php foreach($motor_level as $row){
							?>
								<tr>
								<td id="report-td-bg"><p>
									<?php echo $row['day']; ?></p>
								</td>
								<td><p>
									<?php echo $row['sell']; ?></p>
								</td>
								<td><p>
									<?php
									 $number = (($row['sell']/$total)*100);
									 
									echo number_format((float)$number, 2, '.', '')."%";?>
									
									</p></td>
								</tr>
							<?php
							}
							?>
        					
        				</tbody>
        			</table>
        		</div>
							<div class="col-sm-5">
<h3>Report Details</h3>

    									<h5>From Date:<span id="from_date"><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span></h5>
    									<h5>To Date:<span id="to_date"><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span></h5>
    									<h5>Reported BY:<span id="reported_by"><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span></h5>
								</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleBarChart" style="height: 400px; width: 100%"></div>
							</div>	
							<div class="col-sm-5">
								<div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
							</div>
						</div>
					<br/>  
       		 </div>
  			<div class="col-sm-9">
       

	         <div class="reports-right pt-4">
				
				<div id="chart_div"></div>
                	<h3 class="mt-4">Sensory & Motor Block - Onset Of Surgical Anesthesia</h3>
		
						<br/>
						<div class="row">
							<div class=" col-sm-5 table-responsive" id="demo-table">
<h4>Total Cases,<?php echo $total_n;?></h4>
        			<table class="table table-bordered" style="height: 200px; width: 100%" id="mytable">
        				<thead>
        					<tr>
        						<th>Characteristics</th>
        						<th>n</th>
        						<th>percentage</th>
        					</tr>
        				</thead>
        				<tbody>
        					
							<?php foreach($onset as $row){
							?>
								<tr>
								<td id="report-td-bg"><p>
									<?php echo $row['day']; ?></p>
								</td>
								<td><p>
									<?php echo $row['sell']; ?></p>
								</td>
								<td><p>
									<?php
									 $number = (($row['sell']/$total)*100);
									 
									echo number_format((float)$number, 2, '.', '')."%";?>
									
									</p></td>
								</tr>
							<?php
							}
							?>
        					
        				</tbody>
        			</table>
        		</div>
							
						</div>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleBarChart1" style="height: 400px; width: 100%"></div>
							</div>	
							<div class="col-sm-5">
								<div id="GoogleLineChart1" style="height: 400px; width: 100%"></div>
							</div>
						</div>
					<br/>  
       		 </div>

	    </div>    



         
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
							foreach ($motor_level as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'Median Sensory & Motor Level Classification',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				}; 

		

				var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart'));
				pie_chart.draw(data, options);

				var column_chart = new google.visualization.ColumnChart(document.getElementById('GoogleBarChart'));
				column_chart.draw(data, options);

				



				

				

			}
			
			
			
		</script>
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
							foreach ($onset as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'Onset Of Surgical Anesthesia Classification',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				}; 

				

				var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart1'));
				pie_chart.draw(data, options);

				var column_chart = new google.visualization.ColumnChart(document.getElementById('GoogleBarChart1'));
				column_chart.draw(data, options);

				



				

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
						pdfDoc.save('mediansenory.pdf');
					});
    					//doc.addImage(pie_chart.getImageURI(),0,0);
						//doc.addImage(column_chart.getImageURI(),0,0);
    					//doc.save('Surgical_location.pdf');
  				}, false);


			}
			
			
			
		</script>




<?php
    echo view('includes/reports-footer');    
?>