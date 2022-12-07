<?php
    echo view('dashboard/includes/dashboard-header');    
?>
    
<div class="col-sm-10">
    <div class="dashboard-right">
        <h3><b>Dashboard</b></h3>
        <div class="row dashboard-box">
             <div class="col-sm-3">
                <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                    <h5>Total Module Admins</h5>
                    <h5>10,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/dashboard-2-icon-1.png');?>">
                    <h5>Total Faculties</h5>
                    <h5>5,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                 <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/box-img-2.png');?>">
                    <h5>Total Users</h5>
                    <h5>5,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
                        <a href="">VIEW ALL</a>
                    </div>
                </div>
            </div>
             <div class="col-sm-3">
                <div class="box-1-">
                    <img src="<?php echo base_url('public/assets/images/dashboard-2-icon-2.png');?>">
                    <h5>Total Active Users</h5>
                    <h5>5,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
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
                    <h5>10,000</h5>
                    <div class="bottom">
                        <i class="fa fa-calendar-o" aria-hidden="true">20-04-2022</i>
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
                               </div>
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
                                </div>
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
                               </div>
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
                               </div>
                           </div>
                        </div>
                        <div id="menu1" class="container tab-pane fade"><br>
                          <h3>Menu 1</h3>
                          <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                        <div id="menu2" class="container tab-pane fade"><br>
                          <h3>Menu 2</h3>
                          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                      </div>

                </div>
    </div>
</div>




<?php
    echo view('dashboard/includes/dashboard-footer');    
?>
