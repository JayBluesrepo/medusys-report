


<?php
    echo view('includes/flow-header');    
?>


<section class="reports-home">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left">
                 <ul>
                    <li><a href="">REPORTS</a></li>
                </ul>
                <div class="go-back">
                     <a href="<?php echo base_url('Gas');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div><!--col--3-->
        <div class="col-sm-9 pt-5">
            <div class="">
                <div class="row">
                    <div class="col-sm-5">
                         <div class="r-box">
                            <a href="">
                                <div class="reports-box">
                                    <div class="reports-icon">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-1.png');?>">
                                    </div>
                                    <div class="reports-info">
                                        <p>PNB Reports</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- href="<?php echo base_url('cnb-reports');?>" -->
                    <div class="col-sm-1"></div> 
                    <div class="col-sm-5">
                        <div class="r-box">
                            <a href="">
                                <div class="reports-box">
                                    <div class="reports-icon">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-2.png');?>">
                                    </div>
                                    <div class="reports-info">
                                        <p>CNB Reports</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
                <div class="row pt-5">
                    <div class="col-sm-5">
                         <div class="r-box">
                            <a href="">
                                <div class="reports-box">
                                    <div class="reports-icon">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-6.png');?>">
                                    </div>
                                    <div class="reports-info">
                                        <p>Labour Analgesia Reports</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                         <div class="r-box">
                            <a href="">
                                <div class="reports-box">
                                    <div class="reports-icon">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-3.png');?>">
                                    </div>
                                    <div class="reports-info">
                                        <p>Obstetrics  Anaesthesia Reports</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
        </div>
    </div>
</section>







<?php
    echo view('includes/flow-footer');    
?>