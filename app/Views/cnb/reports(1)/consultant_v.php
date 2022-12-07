<?php
    echo view('includes/flow-header');    
?>

<!-- <link rel="stylesheet" type="text/css"  href="<?php echo base_url('assets/css/simpleMobileMenu-2.css'); ?>"/> -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<section class="reports-main">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left">
                <div class="reports-menu">
                    <ul class="mobimenu">
                        <li class="act"><a href="">Patient Characteristics</a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">Procedure<i class="fa fa-angle-double-down pl-2" aria-hidden="true"></i></a>
                             <ul class="dropdown-menu" id="drop">
                                <li><a href="">Clinical Safety Standards</a></li>
                                <li><a href="">Surgery Details</a></li>
                                <li><a href="">Techniques</a></li>
                                <li><a href="">Epidural Technique</a></li>
                                <li><a href="">Needle Details</a></li> 
                                <li><a href="">LA Utilisation</a></li>
                                <li><a href="">Adjuvant Usage</a></li>
                                <li><a href="">Sensory & Motor Block</a></li>
                            </ul>
                        </li>
                        <li><a href="">Outcomes</a></li>
                        <li><a href="">Follow-Up</a></li>
                        <li><a href="">Feedback</a></li>
                    </ul>
                </div>
                <div class="go-back">
                         <a href="<?php echo base_url('User');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                    </div>   
            </div>
        </div>
	 
         <div class="col-sm-9" id = "reports">
            <div class="reports-right">
		<input id="save-pdf" type="button" value="Save as PDF" disabled />
		<div id="chart_div"></div>
                <h3>PROCEDURE CHARACTERISTICS - Surgical location</h3>
		<form action = "" method = "POST">
		<div class="row">
			<div class="col-sm-4">
				<lable>From Date:</label>
				<input type="date" id="from_date" name="from_date">
			</div>
			<div class="col-sm-4">
				<lable>To Date:</label>
				<input type="date" id="to_date" name="to_date">
			</div>
			<div class="col-sm-4">
				<button type= "submit" name = "submit">Filter</button>
			</div>	
		</div>
		</form>

			
		<br/>
		<div class="row" id="demo-table">
		        	<div class="col-sm-5">
		        		<h4>Total Cases,<?php echo $total_n;?></h4>
		        		<div class="table-responsive">
		        			<table class="table table-bordered">
		        				<thead>
		        					<tr>
		        						<th>Experience of Anaesthetist/Anaesthesiologist</th>
		        						<th>n</th>
		        						<th>percentage</th>
		        					</tr>
		        				</thead>
		        				<tbody>
		        					
									<?php foreach($products as $row){
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
											 $number = (($row['sell']/$total_n)*100);
											 
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
		        	<div class="col-sm-5">
		        		
				<div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
		        	</div>
		        	<div class="col-sm-2"></div>
		        </div><!--row--->

		        <div class="row" id="demo-table">
		        	<div class="col-sm-5">
		        		<h4>Total Cases,<?php echo $total_n;?></h4>
		        		<div class="table-responsive">
		        			<table class="table table-bordered">
		        				<thead>
		        					<tr>
		        						<th>Supervision</th>
		        						<th>n</th>
		        						<th>percentage</th>
		        					</tr>
		        				</thead>
		        				<tbody>
		        					
									<?php foreach($supervision as $row){
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
											 $number = (($row['sell']/$total_n)*100);
											 
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
		        	<div class="col-sm-5">
		        		
				<div id="SupervisionGooglepieChart" style="height: 400px; width: 100%"></div>
		        	</div>
		        	<div class="col-sm-2"></div>
		        </div><!--row--->
		<br/>
		<div class="row">
			<div class="col-sm-12">
				
			</div>
		</div>
		<!-------------------------------------------------------------------->
				
		        <!-------------------------------------------------------------------->
		         <!-------------------------------------------------------------------->

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
		
		<script>

			google.load('visualization', '1.0', {'packages':['corechart']});


		        google.charts.load('current', {'packages':['corechart', 'bar','table']});

			google.charts.setOnLoadCallback(drawChart);
            // Line Chart
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['ASA', 'Count'],
						<?php 
							foreach ($products as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options = {
					title: 'Consultant',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				};
				var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart'));
				pie_chart.draw(data, options);

				var data1 = google.visualization.arrayToDataTable([
					['ASA', 'Count'],
						<?php 
							foreach ($supervision as $row){
							   echo "['".$row['day']."',".$row['sell']."],";
						} ?>
				]);
				var options1 = {
					title: 'Supervision',
					curveType: 'function',
					legend: {
						position: 'top'
					}
				};
				var pie_chart1 = new google.visualization.PieChart(document.getElementById('SupervisionGooglepieChart'));
				pie_chart1.draw(data1, options1);

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


<!---------------- Menu Drodown --------------------->


<?php
    echo view('includes/flow-footer');    
?>
