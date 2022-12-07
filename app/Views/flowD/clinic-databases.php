<?php
    echo view('includes/flow-header');    
?>

<!-- <section class="speciality-main">
        <div class="row">
            <div class="col-sm-2">
                <div class="speciality-left">
                    <ul>
                        <li><a href="">CLINICAL DATABASES</a></li>
                    </ul>
                    <div class="go-back">
                         <a href=""><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="speciality-right" id="spec-right" style="padding: 5% 0 0 5%!important;">
                      <div class="row">
                            <div class="box">
                                <a href="">
                                    <div class="speciality-box-clinic" style="height:120px;">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('public/assets/images/clinic-icon-new-1.png');?>">
                                        </div>
                                        <div class="speciality-txt-clinic-new">
                                            <p>PNB</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="box">
                                <a href="">
                                    <div class="speciality-box-clinic" style="height:120px;">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('public/assets/images/clinic-icon-new-2.png');?>">
                                        </div>
                                        <div class="speciality-txt-clinic-new">
                                            <p>CNB</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="row">
                         <div class="box">
                            <a href="">
                                <div class="speciality-box-clinic" style="height:120px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-6.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Labour Analgesia</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                         <div class="box">
                            <a href="">
                                <div class="speciality-box-clinic" style="height:120px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-3.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Obstetrics & Anaesthesia</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                             <div class="box">
                                <a href="">
                                    <div class="speciality-box-clinic" style="height:120px;">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('public/assets/images/clinic-icon-new-4.png');?>">
                                        </div>
                                        <div class="speciality-txt-clinic-new">
                                            <p>Anaesthesia Logbook</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="box">
                                <a href="">
                                    <div class="speciality-box-clinic" style="height:120px;">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('public/assets/images/clinic-icon-new-5.png');?>">
                                        </div>
                                        <div class="speciality-txt-clinic-new">
                                            <p>Reports & Analytics</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
        </div>      
</section>  -->

<section class="spec-main">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left">
                 <ul>
                    <li><a href="">CLINICAL DATABASES</a></li>
                </ul>
                <div class="go-back">
                     <a href="<?php echo base_url('Gas');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
           <div class="data-right">
               <div class="row">
                   <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('pnb');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-1.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>PNB</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('cnb/Dashboard');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-2.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p style="color: #C32626;">CNB</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
               </div><!--row-->
               <div class="row pt">
                   <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('labour/Dashboard');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-6-labour.png');?>" style="width: 77px;">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p style="color: #C32626;">Labour Analgesia</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <div class="box-">
                            <a href="<?php echo base_url('obstetrics/Dashboard');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/Obstetrics-new-icon.png');?>"  style="width: 77px;">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p style="color: #C32626;">Obstetrics Anaesthesia</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
               </div><!--row-->
               <div class="row pt">
                   <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('anaesthesia-logbook');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat" id="new-icon">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-audits.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Clinincal Audits</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('anaesthesia-logbook');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat" id="new-icon">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-gas-cirs.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>GAS-CIRS:<span style="font-size: 19px;">critical incident reporting system</span></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
               </div><!--row-->
               <div class="row pt">
                   <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('anaesthesia-logbook');?>">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-4.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Anaesthesia Logbook</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                       <div class="box-">
                            <a href="#">
                                <div class="speciality-box-clinic" style="height:110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/clinic-icon-new-5.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Reports & Analytics</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                   </div>
                   <div class="col-sm-1"></div>
               </div><!--row-->
           </div> 
        </div>
    </div>
</section>

<?php
    echo view('includes/flow-footer');    
?>

<style type="text/css">
    #new-icon img{
        width: 77px;
    }
</style>