<?php
    echo view('dashboard/includes/dashboard-header');    
?>

<div class="col-sm-10">
    <div class="dashboard-right">
        <h3><b>Dashboard</b></h3>
        <div class="row dashboard-box">
             <div class="col-sm-3">
                <div class="box-2-">
                    <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                    <h5>Last Logged in</h5>
                    <h4> <i class="fa fa-calendar-o " aria-hidden="true">&nbsp;<span class="date"><?php echo $last_date; ?></span></i></h4>
                    <h5><?php echo $last_time; ?></h5>
                    <div class="bottom">
                    </div>
                </div>
            </div>
             <!-- <div class="col-sm-3">
                <div class="box-2-">
                    <img src="< echo base_url('public/assets/images/dashboard-2-icon1.png');?>">
                    <h5>Open Records</h5>
                    <h5>15,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">&nbsp;20-04-2022</i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div> -->
             <!-- <div class="col-sm-3">
                 <div class="box-2-">
                    <img src=" echo base_url('public/assets/images/dashboard-2-icon2.png');?>">
                    <h5>Notifications</h5>
                    <h5>5,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">&nbsp;20-04-2022</i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div> -->
            </div>
             <div class="col-sm-3"></div>  
        </div><!--dashboard-box-->
        <div class="row pt-4">
            <div class="col-sm-3">
               <!-- <div class="box-2-">
                    <img src=" echo base_url('public/assets/images/dashboard-2-icon-3.png');?>">
                    <h5>Registrations last month</h5>
                    <h5>10,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>  -->
            </div>
             <div class="col-sm-3">
                
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
                                        <h5>0</h5>
                                        <p><span>Total Patients</span></p>
                                        <h5>0</h5>
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
                                        <h5>0</h5>
                                        <p><span>Total ePHQs Received</span></p>
                                        <h5>0</h5>
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
                                        <h5>0</h5>
                                        <p><span>Total Consent Received</span></p>
                                        <h5>0</h5>
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
                                        <h5>0</h5>
                                        <p><span>Total ePCOM Received</span></p>
                                        <h5>0</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                           </div><!--row--> 
                        </div><!--tab-->
                        <div id="menu1" class="container tab-pane fade"><br>
                          <div class="row" >

                          <div class="col-sm-3">
                                    <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-3.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Records</span></p>
                                        <h5><?php echo ($c_old_check + $c_patient + $l_old_check +  $l_patient + $o_old_check + $o_patient); ?></h5>
                                        <p class="mb-0"><span>Total Record Update
                                          <div class="tooltip-3">
                                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                <div class="right-3">
                                                    <div class="text-content-3">
                                                        <h6>Total Number of Cases Recorded includes all the cases which have been uploaded for analysis</h6>
                                                        <i></i>
                                                    </div>
                                                </div>
                                            </div>      
                                        </span></p>
                                        <h5><?php echo ($c_old_check + $l_old_check + $o_old_check); ?></h5>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                               <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total PNB Records</span></p>
                                        <h6 style="color:black;">Report analysed: NA</h6>
                                         <h6 style="color:black;">Incompleted: NA</h6>
                                        <p><span>Total CNB Records</span></p>
                                        <h6 style="color:black;">Report analysed: <?php  echo $c_old_check;?></h6>
                                         <h6 style="color:black;">Incompleted: <?php  echo ($c_patient);?></h6>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                               <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div> 
                                      <div class="tab-cont">
                                        <p><span>Total Labour Records</span></p>
                                        <h6 style="color:black;">Report analysed: <?php  echo $l_old_check;?></h6>
                                        <h6 style="color:black;">Incompleted: <?php  echo ($l_patient);?></h6>
                                        <p><span>Total Obstetrics Records</span></p>
                                        <h6 style="color:black;">Report analysed: <?php  echo $o_old_check;?></h6>
                                        <h6 style="color:black;">Incompleted: <?php  echo ($o_patient);?></h6>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                               <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Reports Downloads</span></p>
                                        <h5>0</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3-->

                          </div>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                          <div class="row">

                          <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Forum Records</span></p>
                                        <h5>0</h5>
                                        <p><span>Total Guidelines</span></p>
                                        <h5 style="color:black;"><?php  echo $guidelines;?></h5>
                                      </div>
                                    </div> 
                               </div><!--col-3--> <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Conference</span></p>
                                        <h5 style="color:black;"><?php  echo $conf_count;?></h5>
                                        <p><span>Total Collaboration</span></p>
                                        <h5>0</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3--> <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total e-library</span></p>
                                        <h5 style="color:black;"><?php  echo $library_count;?></h5>
                                        <p><span>Total Record Update</span></p>
                                        <h5>0</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3--> <div class="col-sm-3">
                               <div class="tabs-4">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-2.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Videos</span></p>
                                        <h5>0</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                          </div>
                        </div>
                      </div>

                </div><!--tabs-->
    </div>
</div>

<script>


const today = new Date();
const yyyy = today.getFullYear();
let mm = today.getMonth() + 1; // Months start at 0!
let dd = today.getDate();

if (dd < 10) dd = '0' + dd;
if (mm < 10) mm = '0' + mm;

const formattedToday = dd + '-' + mm + '-' + yyyy;

  $(".date").html(formattedToday);
  </script>

<?php
    echo view('dashboard/includes/dashboard-footer');    
?>
