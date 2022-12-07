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

<div class="col-sm-9">
  <div class="reports-right pt-4">
    <input id="save-pdf" type="button" value="Save as PDF" disabled />
    <!-- ---------------------------OPIOID ADJUVANT---------------------- -->
    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Opioid Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
      <div class="col-sm-5">
        <div id="GoogleTableChart" style="height: 200px; width: 100%"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div id="GoogleLineChart" style="height: 400px; width: 100%"></div>
      </div>
    </div>
    <br />

    <!-- ---------------------------CLONIDE ADJUVANT---------------------- -->

    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Clonide Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
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
              <th>percentage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p>YES</p>
              </td>
              <td>
                <p><?php echo $total22; ?></p>
              </td>
              <td>
                <p><?php echo $c_perc2; ?></p>
              </td>
            </tr>
            <tr>
              <td>
                <p>NO</p>
              </td>

              <td>
                <p><?php echo $total21; ?></p>
              </td>
              <td>
                <p><?php echo $c_perc1; ?></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div
          id="clonidina_GoogleLineChart"
          style="height: 400px; width: 100%"
        ></div>
      </div>
    </div>
    <br />

    <!-- ---------------------------Dexmeditomidine ADJUVANT---------------------- -->

    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Dexmeditomidine Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
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
              <th>percentage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p>YES</p>
              </td>
              <td>
                <p><?php echo $total32; ?></p>
              </td>
              <td>
                <p><?php echo $de_perc2; ?></p>
              </td>
            </tr>
            <tr>
              <td>
                <p>NO</p>
              </td>

              <td>
                <p><?php echo $total31; ?></p>
              </td>
              <td>
                <p><?php echo $de_perc1; ?></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div
          id="dexmeditomidine_GoogleLineChart"
          style="height: 400px; width: 100%"
        ></div>
      </div>
    </div>
    <br />

    <!-- ---------------------------Dexmeditomidine ADJUVANT---------------------- -->

    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Dexamephasone Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
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
              <th>percentage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p>YES</p>
              </td>
              <td>
                <p><?php echo $total42; ?></p>
              </td>
              <td>
                <p><?php echo $da_perc2; ?></p>
              </td>
            </tr>
            <tr>
              <td>
                <p>NO</p>
              </td>

              <td>
                <p><?php echo $total41; ?></p>
              </td>
              <td>
                <p><?php echo $da_perc1; ?></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div
          id="dexamephasone_GoogleLineChart"
          style="height: 400px; width: 100%"
        ></div>
      </div>
    </div>
    <br />

    <!-- ---------------------------Dexmeditomidine ADJUVANT---------------------- -->

    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Tramadol Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
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
              <th>percentage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p>YES</p>
              </td>
              <td>
                <p><?php echo $total52; ?></p>
              </td>
              <td>
                <p><?php echo $t_perc2; ?></p>
              </td>
            </tr>
            <tr>
              <td>
                <p>NO</p>
              </td>

              <td>
                <p><?php echo $total51; ?></p>
              </td>
              <td>
                <p><?php echo $t_perc1; ?></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div
          id="tramadol_GoogleLineChart"
          style="height: 400px; width: 100%"
        ></div>
      </div>
    </div>
    <br />

    <!-- ---------------------------adrenaline ADJUVANT---------------------- -->
    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Adrenaline Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
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
              <th>percentage</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <p>YES</p>
              </td>
              <td>
                <p><?php echo $total92; ?></p>
              </td>
              <td>
                <p><?php echo $a_perc2; ?></p>
              </td>
            </tr>
            <tr>
              <td>
                <p>NO</p>
              </td>

              <td>
                <p><?php echo $total91; ?></p>
              </td>
              <td>
                <p><?php echo $a_perc1; ?></p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div
          id="adrenaline_GoogleLineChart"
          style="height: 400px; width: 100%"
        ></div>
      </div>
    </div>
    <br />

    <!-- ---------------------------other ADJUVANT---------------------- -->
    <div id="chart_div"></div>
    <h3 class="mt-4">Spinal Component Adjuvant - Other Adjuvant</h3>

    <br />
    <div class="row">
      <div class="col-sm-5">
        <h3>Report Details</h3>

        <h5>
          From Date:<span id="from_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('from_date'))); ?></span
          >
        </h5>
        <h5>
          To Date:<span id="to_date"
            ><?php echo date('d-m-Y',strtotime(session()->get('to_date'))); ?></span
          >
        </h5>
        <h5>
          Reported BY:<span id="reported_by"
            ><?php $name =  session()->get('name');  
							if(substr($name, 0, 3) === "Dr. " || substr($name, 0, 3) === "Dr "){
							 echo	session()->get('name');
							}else{
								echo "Dr. ".session()->get('name');
							} ?></span
          >
        </h5>
      </div>
      <div class="col-sm-5 table-responsive" id="demo-table">
        <div
          id="other_GoogleTableChart"
          style="height: 200px; width: 100%"
        ></div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-5">
        <div
          id="other_GoogleLineChart"
          style="height: 400px; width: 100%"
        ></div>
      </div>
    </div>
    <br />
  </div>
</div>

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

  	var opioid_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var opioid_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($opioide as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var opioid_options = {
  		title: 'Spinal Component Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('GoogleTableChart1'));
  	// table_chart.draw(opioid_data1, opioid_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('GoogleLineChart'));
  	pie_chart.draw(opioid_data, opioid_options);

  	var table_chart = new google.visualization.Table(document.getElementById('GoogleTableChart'));
  	table_chart.draw(opioid_data, opioid_options);


               //  ---------------------------CLONIDE ADJUVANT----------------------


               var clonidina_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var clonidina_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($clonidina as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var clonidina_options = {
  		title: 'Clonide Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('clonidina_GoogleTableChart1'));
  	// table_chart.draw(clonidina_data1, clonidina_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('clonidina_GoogleLineChart'));
  	pie_chart.draw(clonidina_data, clonidina_options);

  	// var table_chart = new google.visualization.Table(document.getElementById('clonidina_GoogleTableChart'));
  	// table_chart.draw(clonidina_data, clonidina_options);


               //  ---------------------------dexmeditomidine ADJUVANT----------------------


               var dexmeditomidine_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var dexmeditomidine_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($dexmeditomidine as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var dexmeditomidine_options = {
  		title: 'Dexmeditomidine Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('dexmeditomidine_GoogleTableChart1'));
  	// table_chart.draw(dexmeditomidine_data1, dexmeditomidine_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('dexmeditomidine_GoogleLineChart'));
  	pie_chart.draw(dexmeditomidine_data, dexmeditomidine_options);

  	// var table_chart = new google.visualization.Table(document.getElementById('dexmeditomidine_GoogleTableChart'));
  	// table_chart.draw(dexmeditomidine_data, dexmeditomidine_options);



               //  ---------------------------dexamephasone ADJUVANT----------------------


               var dexamephasone_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var dexamephasone_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($dexamephasone as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var dexamephasone_options = {
  		title: 'Dexamephasone Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('dexamephasone_GoogleTableChart1'));
  	// table_chart.draw(dexamephasone_data1, dexamephasone_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('dexamephasone_GoogleLineChart'));
  	pie_chart.draw(dexamephasone_data, dexamephasone_options);

  	// var table_chart = new google.visualization.Table(document.getElementById('dexamephasone_GoogleTableChart'));
  	// table_chart.draw(dexamephasone_data, dexamephasone_options);

               //  ---------------------------tramadol ADJUVANT----------------------


               var tramadol_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var tramadol_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($tramadol as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var tramadol_options = {
  		title: 'Tramadol Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('tramadol_GoogleTableChart1'));
  	// table_chart.draw(tramadol_data1, tramadol_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('tramadol_GoogleLineChart'));
  	pie_chart.draw(tramadol_data, tramadol_options);

  	// var table_chart = new google.visualization.Table(document.getElementById('tramadol_GoogleTableChart'));
  	// table_chart.draw(tramadol_data, tramadol_options);


                //  ---------------------------midazolam ADJUVANT----------------------

                var adrenaline_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var adrenaline_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($adrenaline as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var adrenaline_options = {
  		title: 'Adrenaline Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('adrenaline_GoogleTableChart1'));
  	// table_chart.draw(adrenaline_data1, adrenaline_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('adrenaline_GoogleLineChart'));
  	pie_chart.draw(adrenaline_data, adrenaline_options);

  	// var table_chart = new google.visualization.Table(document.getElementById('adrenaline_GoogleTableChart'));
  	// table_chart.draw(adrenaline_data, adrenaline_options);

                   //  ---------------------------other ADJUVANT----------------------

                   var other_data1 = google.visualization.arrayToDataTable([
  		['Characteristics', 'Stats'],
  			<?php

  				   echo "['Total number of cases recorded with minimum data set','N’'],";
  				   echo "['Total number of cases with complete entry','Nc'],";

  			 ?>
  	]);
  	var other_data = google.visualization.arrayToDataTable([
  		['Characteristics', 'Count'],
  			<?php
  				foreach ($other as $row){
  				   echo "['".$row['day']."',".$row['sell']."],";
  			} ?>
  	]);
  	var other_options = {
  		title: 'Other Adjuvant',
  		curveType: 'function',
  		legend: {
  			position: 'top'
  		}
  	};

  	// var table_chart = new google.visualization.Table(document.getElementById('other_GoogleTableChart1'));
  	// table_chart.draw(other_data1, other_options);

  	var pie_chart = new google.visualization.PieChart(document.getElementById('other_GoogleLineChart'));
  	pie_chart.draw(other_data, other_options);

  	// var table_chart = new google.visualization.Table(document.getElementById('other_GoogleTableChart'));
  	// table_chart.draw(other_data, other_options);





               // ---------------PDF----------------

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
						pdfDoc.save('spinalcomponentadjuvant.pdf');
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
