<?php
    echo view('includes/reports-header');    
?>



	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

	 
		<div class="col-sm-9">
       
	        <?php
	            echo view('includes/reports-date-header');    
	        ?>

	         <div class="reports-right pt-4">
				<input id="save-pdf" type="button" value="Save as PDF" disabled />
				<div id="chart_div"></div>
                	<h3 class="mt-4">Procedure Outcomes - Other Outcome Characteristics(Time to surgical anaesthesia)</h3>
		
						<br/>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleTableChart1" style="height: 200px; width: 100%"></div>
							</div>
							<div class="col-sm-5">
								<div id="GoogleTableChart" style="height: 200px; width: 100%"></div>
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
       
	        <?php
	            echo view('includes/reports-date-header');    
	        ?>

	         <div class="reports-right pt-4">
				<input id="save-pdf" type="button" value="Save as PDF" disabled />
				<div id="chart_div"></div>
                	<h3 class="mt-4">Procedure Outcomes - Other Outcome Characteristics(Duration of surgery)</h3>
		
						<br/>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleTableChart2" style="height: 200px; width: 100%"></div>
							</div>
							<div class="col-sm-5">
								<div id="GoogleTableChart3" style="height: 200px; width: 100%"></div>
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
	    <div class="col-sm-9">
       
	        <?php
	            echo view('includes/reports-date-header');    
	        ?>

	         <div class="reports-right pt-4">
				<input id="save-pdf" type="button" value="Save as PDF" disabled />
				<div id="chart_div"></div>
                	<h3 class="mt-4">Procedure Outcomes - Other Outcome Characteristics(Blood loss ml)</h3>
		
						<br/>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleTableChart4" style="height: 200px; width: 100%"></div>
							</div>
							<div class="col-sm-5">
								<div id="GoogleTableChart5" style="height: 200px; width: 100%"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleBarChart3" style="height: 400px; width: 100%"></div>
							</div>	
							<div class="col-sm-5">
								<div id="GoogleLineChart3" style="height: 400px; width: 100%"></div>
							</div>
						</div>
					<br/>  
       		 </div>

	    </div>  
	    <div class="col-sm-9">
       
	        <?php
	            echo view('includes/reports-date-header');    
	        ?>

	         <div class="reports-right pt-4">
				<input id="save-pdf" type="button" value="Save as PDF" disabled />
				<div id="chart_div"></div>
                	<h3 class="mt-4">Procedure Outcomes - Other Outcome Characteristics(Vasopressor use)</h3>
		
						<br/>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleTableChart6" style="height: 200px; width: 100%"></div>
							</div>
							<div class="col-sm-5">
								<div id="GoogleTableChart7" style="height: 200px; width: 100%"></div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-5">
								<div id="GoogleBarChart4" style="height: 400px; width: 100%"></div>
							</div>	
							<div class="col-sm-5">
								<div id="GoogleLineChart4" style="height: 400px; width: 100%"></div>
							</div>
						</div>
					<br/>  
       		 </div>

	    </div>  

	    </div>    



         
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		
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
							foreach ($other19 as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'ASA Classification',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				}; 

				var table_chart = new google.visualization.Table(document.getElementById('GoogleTableChart6'));
				table_chart.draw(data1, options);

				var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart4'));
				pie_chart.draw(data, options);

				var column_chart = new google.visualization.ColumnChart(document.getElementById('GoogleBarChart4'));
				column_chart.draw(data, options);

				var table_chart = new google.visualization.Table(document.getElementById('GoogleTableChart7'));
				table_chart.draw(data, options);



				

				var btnSave = document.getElementById('save-pdf');
				
    				btnSave.disabled = false;
  			
  				btnSave.addEventListener('click', function () {
    					var doc = new jsPDF();
    					doc.addImage(pie_chart.getImageURI(),0,0);
					doc.addImage(column_chart.getImageURI(),0,0);
    					doc.save('asa.pdf');
  				}, false);

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
							foreach ($total21 as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'ASA Classification',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				}; 

				var table_chart = new google.visualization.Table(document.getElementById('GoogleTableChart1'));
				table_chart.draw(data1, options);

				var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart'));
				pie_chart.draw(data, options);

				var column_chart = new google.visualization.ColumnChart(document.getElementById('GoogleBarChart'));
				column_chart.draw(data, options);

				var table_chart = new google.visualization.Table(document.getElementById('GoogleTableChart'));
				table_chart.draw(data, options);



				

				var btnSave = document.getElementById('save-pdf');
				
    				btnSave.disabled = false;
  			
  				btnSave.addEventListener('click', function () {
    					var doc = new jsPDF();
    					doc.addImage(pie_chart.getImageURI(),0,0);
					doc.addImage(column_chart.getImageURI(),0,0);
    					doc.save('asa.pdf');
  				}, false);

			}
			
			
			
		</script>


<?php
    echo view('includes/reports-footer');    
?>