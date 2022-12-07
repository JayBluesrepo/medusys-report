<?php
    echo view('includes/admin-header',$dash_a);    
?>
    
<div class="col-sm-10">
    <div class="dashboard-right">
        <h3><b>Dashboard</b></h3>
        <div class="row dashboard-box">
             <div class="col-sm-3">
                <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                    <h5>Total Module Admins</h5>
                    <h5><?php echo count($moduler_role) ?></h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true"><?php echo $crnt_date ?></i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/dashboard-2-icon-1.png');?>">
                    <h5>Total Faculties</h5>
                    <h5><?php echo count($faculty_role) ?></h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true"><?php echo $crnt_date ?></i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                 <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                    <h5>Total Users</h5>
                    <h5><?php echo count($totaluser_role) ?></h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true"><?php echo $crnt_date ?></i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/dashboard-2-icon-2.png');?>">
                    <h5>Total Active Users</h5>
                    <h5><?php echo count($active_valid) ?></h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true"><?php echo $crnt_date ?></i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-sm-3">
               <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/dashboard-2-icon-3.png');?>">
                    <h5>Registrations last month</h5>
                    <h5><?php echo count($lastmonth_user) ?></h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true"><?php echo $crnt_date ?></i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div> 
            </div>
             <div class="col-sm-3">
               
            </div>
            <div class="col-sm-6"></div>
        </div>
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

                  
                      <div class="tab-content">
                        <div id="home" class="container tab-pane active"><br>
                            <h3>Patient Management System</h3>  
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
                          <h3>Clinical Database</h3>
                          <div class="row">
                               <div class="col-sm-3">
                                  <div class="tabs-1">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-1.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Users</span></p>
                                        <h5><?php echo count($totaluser_role) ?></h5>
                                        <p><span>Total Records</span></p>
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
                                        <p><span>Total PNB Records</span></p>
                                        <h5>0</h5>
                                        <p><span>Total Reports Downloads</span></p>
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
                                        <p><span>Total CNB Records</span></p>
                                        <h5>0</h5>
                                        <p><span>Last Record Update</span></p>
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
                                        <p><span>Total Labor Records</span></p>
                                        <h5>0</h5>
                                        <p><span>Total Log Book Users </span></p>
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
                                        <p><span>Total Obstetrics Records</span></p>
                                        <h5>0</h5>
                                        <p><span></span></p>
                                        <h5>0</h5>
                                      </div>
                                  </div> 
                               </div><!--col-3-->
                               
                           </div>
                        </div>
                         <div id="menu2" class="container tab-pane fade"><br>
                          <h3>Mels</h3>
                           <div class="row">
                               <div class="col-sm-3">
                                  <div class="tabs-1">
                                      <div class="tabs-img">
                                           <img src="<?php echo base_url('public/assets/images/tabs-img-1.png');?>"> 
                                      </div>
                                      <div class="tab-cont">
                                        <p><span>Total Users</span></p>
                                        <h5><?php echo count($totaluser_role) ?></h5>
                                        <p><span>Total Collabrations</span></p>
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
                                        <p><span>Total Forum Records</span></p>
                                        <h5>0</h5>
                                        <p><span>Total Videos</span></p>
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
                                        <p><span>Total Conferences</span></p>
                                        <h5><?php echo count($total_conference) ?></h5>
                                        <p><span>Total Guidelines</span></p>
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
                                        <p><span>Total e-Library</span></p>
                                        <h5><?php echo count($total_elibrary) ?></h5>
                                        <p><span>Last Record Update</span></p>
                                        <h5>0</h5>
                                      </div>
                                    </div> 
                               </div><!--col-3-->
                           </div>
                        </div>
                      </div>

                </div>
    </div>
</div>




<?php
    echo view('includes/admin-footer');    
?>
