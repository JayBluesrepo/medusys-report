
<?php
    echo view('dashboard/includes/dashboard-header');    
?>
        <div class="col-sm-10" style="padding: 0;">
            <div class="dashboard-right">
                <h3><b>Dashboard</b></h3>
                <div class="row dashboard-box">
                    <div class="col-sm-3">
                        <div class="box-1">
                            <img src="<?php echo base_url('public/assets/images/box-img-1.png');?>">
                            <h5>Total Organizations</h5>
                            <h5>10,000</h5>
                            <div class="bottom">
                                <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                                <a href="">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="box-2">
                            <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                            <h5>Total Module Admins</h5>
                            <h5>5,000</h5>
                            <div class="bottom">
                                <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                                <a href="">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-3">
                         <div class="box-3">
                            <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                            <h5>Total Faculties</h5>
                            <h5>5,000</h5>
                            <div class="bottom">
                                <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                                <a href="">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-3">
                        <div class="box-4">
                            <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                            <h5>Total Users</h5>
                            <h5>5,000</h5>
                            <div class="bottom">
                                <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                                <a href="">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                </div><!--row dashboard-box-->
                <div class="row pt-4">
                    <div class="col-sm-3">
                       <div class="box-5">
                            <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                            <h5>Total Active Users</h5>
                            <h5>10,000</h5>
                            <div class="bottom">
                                <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                                <a href="">VIEW ALL</a>
                            </div>
                        </div> 
                    </div>
                     <div class="col-sm-3">
                         <div class="box-6">
                            <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                            <h5 style="font-size: 17px;">Registrations last month</h5>
                            <h5>5,000</h5>
                            <div class="bottom">
                                <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                                <a href="">VIEW ALL</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                </div><!--row-->

                <div class="dashboard-tabs">
                     <ul class="nav nav-tabs" role="tablist" id="nav-tabs-dashboard">
                        <li class="nav-item">
                          <a class="nav-link active" data-toggle="tab" href="#home">PMS Module</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu1">Clinical Database Module</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-toggle="tab" href="#menu2">MeLS Module</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                      <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                           <div class="row">
                               <div class="col-sm-3">
                                  <div class="tabs-1">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-1.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Users</span></p>
                                        <h5>12.5K</h5>
                                        <p><span>Total Patients</span></p>
                                        <h5>12.5K</h5>
                                      </div>
                                  </div> 
                               </div><!--col-3-->
                                <div class="col-sm-3">
                                    <div class="tabs-2">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total ePHQs Sent</span></p>
                                        <h5>12.5K</h5>
                                        <p><span>Total ePHQs Received</span></p>
                                        <h5>12.5K</h5>
                                      </div>
                                  </div> 
                                </div><!--col-3-->
                                <div class="col-sm-3">
                                    <div class="tabs-3">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-3.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Consent Sent</span></p>
                                        <h5>12.5K</h5>
                                        <p><span>Total Consent Received</span></p>
                                        <h5>12.5K</h5>
                                      </div>
                                  </div> 
                               </div><!--col-3-->
                               <div class="col-sm-3">
                                    <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-4.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total ePCOM Sent</span></p>
                                        <h5>12.5K</h5>
                                        <p><span>Total ePCOM Received</span></p>
                                        <h5>12.5K</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                           </div><!--row--> 
                        </div><!--tab-->
                        <div id="menu1" class="container tab-pane fade"><br>
                          <h3>Menu 1</h3>
                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                          <h3>Menu 2</h3>
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                      </div>

                </div><!--tabs-->

              <div class="row">
                  <div class="col-sm-8"><h5><b>Current Users around the world</b></h5></div>
                  <div class="col-sm-4"></div>
              </div>
                <div class="row">
                    <div class="col-sm-8">
                         <div id="worldMarket" style="width: 100%; height: 350px"></div>
                     <!--    <div id="worldMap" style="width: 750px; height: 400px; margin: auto; border: 1px solid #EEE" class="jsvmap-container"></div> -->
                    </div>
                    <div class="col-sm-4">
                       <div class="users">
                           <div class="country-users">
                                <img src="<?php echo base_url('public/assets/images/marker.png');?>">
                                <h5>25% India</h5>
                           </div>
                           <div class="country-users">
                                <img src="<?php echo base_url('public/assets/images/marker.png');?>">
                                <h5>30% South East Asia</h5>
                           </div>
                           <div class="country-users">
                                <img src="<?php echo base_url('public/assets/images/marker.png');?>">
                                <h5>20% Australia NZ Pacific</h5>
                           </div>
                           <div class="country-users">
                                <img src="<?php echo base_url('public/assets/images/marker.png');?>">
                                <h5>20% United Kingdom</h5>
                           </div>
                            <div class="country-users">
                                <img src="<?php echo base_url('public/assets/images/marker.png');?>">
                                <h5>20% Europe</h5>
                           </div>
                       </div> 
                    </div>
                </div><!--row-map-->
                 
                <div class="row">
                    <div class="col-sm-6">
                         <div id="curve_chart" style="width: 900px; height: 500px;margin-top: 20px;"></div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="logins">
                                     <img src="<?php echo base_url('public/assets/images/App-icon.png');?>">
                                     <h4>App Logins</h4>
                                     <h5>862 <span>-18%</span></h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="logins-1">
                                     <img src="<?php echo base_url('public/assets/images/App-icon-1.png');?>">
                                     <h4>Website Logins</h4>
                                     <h5>862 <span>-18%</span></h5>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="logins-2">
                                     <img src="<?php echo base_url('public/assets/images/App-icon-2.png');?>">
                                     <h4>Total sold</h4>
                                     <h5>862 <span>-18%</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--row--> 

                <div class="row">
                    <div class="col-sm-4">
                       <div class="scatter">
                            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
                       </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="line-chart">
                            <canvas id="myChart1" style="width:100%;max-width:600px"></canvas>
                       </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div><!--row-->

                <div class="row">
                    <div class="col-sm-4">
                       <div class="scatter">
                            <canvas id="myChart2" style="width:100%;max-width:700px"></canvas>
                       </div>
                    </div>
                    <div class="col-sm-4">
                       <div class="line-chart">
                            <canvas id="myChart3" style="width:100%;max-width:600px"></canvas>
                       </div>
                    </div>
                    <div class="col-sm-4"></div>
                </div><!--row-->

            </div><!--dashboard-right-->
        </div><!--col-10-->
   <!--  </div>
</section> -->


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2004',  1000,      400],
          ['2005',  1170,      460],
          ['2006',  660,       1120],
          ['2007',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
        var xyValues = [
          {x:50, y:7},
          {x:60, y:8},
          {x:70, y:8},
          {x:80, y:9},
          {x:90, y:9},
          {x:100, y:9},
          {x:110, y:10},
          {x:120, y:11},
          {x:130, y:14},
          {x:140, y:14},
          {x:150, y:15}
        ];

        new Chart("myChart", {
          type: "scatter",
          data: {
            datasets: [{
              pointRadius: 4,
              pointBackgroundColor: "rgb(0,0,255)",
              data: xyValues
            }]
          },
          options: {
            legend: {display: false},
            scales: {
              xAxes: [{ticks: {min: 40, max:160}}],
              yAxes: [{ticks: {min: 6, max:16}}],
            }
          }
        });
    </script>

    <script>
        var xValues = [50,60,70,80,90,100,110,120,130,140,150];
        var yValues = [7,8,8,9,9,9,10,11,14,14,15];

        new Chart("myChart1", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{
              fill: false,
              lineTension: 0,
              backgroundColor: "rgba(0,0,255,1.0)",
              borderColor: "rgba(0,0,255,0.1)",
              data: yValues
            }]
          },
          options: {
            legend: {display: false},
            scales: {
              yAxes: [{ticks: {min: 6, max:16}}],
            }
          }
        });


        var xValues = ["Australia", "India", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
          "#b91d47",
          "#00aba9",
          "#2b5797",
          "#e8c3b9",
          "#1e7145"
        ];

        new Chart("myChart2", {
          type: "doughnut",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Total Visits"
            }
          }
        });        

</script>


<script type="text/javascript">
var xValues = [];
var yValues = [];
generateData("x * 2 + 7", 0, 10, 0.5);

new Chart("myChart3", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      pointRadius: 1,
      borderColor: "rgba(255,0,0,0.5)",
      data: yValues
    }]
  },    
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Total Profit",
      fontSize: 16
    }
  }
});
function generateData(value, i1, i2, step = 1) {
  for (let x = i1; x <= i2; x += step) {
    yValues.push(eval(value));
    xValues.push(x);
  }
}
</script>


<script type="text/javascript">
    var map = new JsVectorMap({
    map: 'world',
    backgroundColor: 'tranparent',
    draggable: true,
    zoomButtons: true,
    zoomOnScroll: true,
    zoomOnScrollSpeed: 3,
    zoomMax: 12,
    zoomMin: 1,
    zoomAnimate: true,
    showTooltip: true,
    zoomStep: 1.5,
    bindTouchEvents: true,
    focusOn: {}, // focus on regions on page load
    /**
     * Markers options
     */
    markers: null, // Set of markers to add to the map during initialization
    markersSelectable: false,
    markersSelectableOne: false,
    markerStyle: {
      // Marker style
      initial: {
        r: 7,
        fill: 'black',
        fillOpacity: 1,
        stroke: '#FFF',
        strokeWidth: 5,
        strokeOpacity: .65
      },
      hover: {
        fill: '#3cc0ff',
        stroke: '#5cc0ff',
        cursor: 'pointer',
        strokeWidth: 2
      },
      selected: {
        fill: 'blue'
      },
      selectedHover: {}
    },
    // Marker Label style
    markerLabelStyle: {
      initial: {
        fontFamily: 'Verdana',
        fontSize: 12,
        fontWeight: 'bold',
        cursor: 'default',
        fill: 'black'
      },
      hover: {
        cursor: 'pointer'
      }
    },
    /**
     * Region styles
     */
    labels: { // add a label for a specific region
      regions: {
        render(code) {
          return ['EG', 'KZ', 'CN'].indexOf(code) > -1 ? 'Hello ' + code : ''
        },
      }
    }
    regionsSelectable: false,
    regionsSelectableOne: false,
    regionStyle: {
      // Region style
      initial: {
        fill: '#e3eaef',
        fillOpacity: 1,
        stroke: 'none',
        strokeWidth: 0,
        strokeOpacity: 1
      },
      hover: {
        fillOpacity: .7,
        cursor: 'pointer'
      },
      selected: {
        fill: '#000'
      },
      selectedHover: {}
    },
    // Region label style
    regionLabelStyle: {
      initial: {
        fontFamily: 'Verdana',
        fontSize: '12',
        fontWeight: 'bold',
        cursor: 'default',
        fill: '#35373e'
      },
      hover: {
        cursor: 'pointer'
      }
    },
    series: {
      markers: [
        // You can add one or more objects to create series for markers.
      ]
      regions: [
        // You can add one or more objects to create series for regions.
      ]
    }
})
</script>


<script type="text/javascript">
    $('#worldMap').vectorMap({
  map: 'world_en',
  backgroundColor: '#a5bfdd',
  color: '#f4f3f0',
  hoverColor: '#0000ff',
  hoverOpacity: null,
  selectedColor: '#666666',                
  attribute: 'fill',
  enableZoom: true,
  showTooltip: true, 
  values: sample_data,                 
  scaleColors: ['#ffffff', '#a00000'],
  normalizeFunction: 'polynomial',             
  onRegionClick: function(element,code,region) {
    displayInfo(code,region);    
  }
});

function updateMap() {         
  $.getJSON('docs/testdata.json',function(data) {
    var map=$("#worldMap").vectorMap('get','mapObject');
    map.series.region[0].setValues(data);
  });
}

</script>

<?php
    echo view('dashboard/includes/dashboard-footer');    
?>

<style type="text/css">
    [data-index=22]{
        cx="656.325"
    }
</style>

