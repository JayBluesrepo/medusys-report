<?php
    echo view('includes/flow-header');    
?>

<!-- <section class="speciality-main">
        <div class="row">
            <div class="col-sm-2">
                <div class="speciality-left">
                    <ul>
                        <li><a href="" id="pat-system">PATIENT MANAGEMENT SYSTEM</a></li>
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
                                    <div class="speciality-box">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('assets/images/pat-new-3.png');?>">
                                        </div>
                                        <div class="speciality-txt-pat-new">
                                            <p>e-PHQ</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="box">
                                <a href="">
                                    <div class="speciality-box">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('assets/images/pat-new-2.png');?>">
                                        </div>
                                        <div class="speciality-txt-pat-new">
                                            <p>Tele-health</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="row">
                         <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('assets/images/pat-new-1.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p>e-Consent</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('assets/images/pat-new-4.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p style="font-size: 17px;">e-PCOM(e-feedback)</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-sm-2"></div>
                       <div class="col-sm-10">
                            <div class="box">
                                <a href="">
                                    <div class="speciality-box">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('assets/images/pat-new-5.png');?>">
                                        </div>
                                        <div class="speciality-txt-pat-new">
                                            <p>Patient e-care and education</p>
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
                    <li><a href="" id="pat-system">PATIENT MANAGEMENT SYSTEM</a></li>
                </ul>
                <div class="go-back">
                     <a href="<?php echo base_url('Gas');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="pat-right">
                <div class="row">
                    <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('e-PHQ');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/pat-new-3.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p>e-PHQ</p>
                                    </div>
                                </div>
                            </a>
                        </div> 
                    </div>
                   <div class="col-sm-1"></div>
                     <div class="col-sm-5">
                        <div class="box-">
                            <a href="<?php echo base_url('tele-health');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/pat-new-2.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p>Tele-health</p>
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
                            <a href="<?php echo base_url('e-consent');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/pat-new-1.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p>e-Consent</p>
                                    </div>
                                </div>
                            </a>
                        </div> 
                    </div>
                   <div class="col-sm-1"></div>
                     <div class="col-sm-5">
                        <div class="box-">
                            <a href="<?php echo base_url('e-com');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/pat-new-4.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p style="font-size: 17px;">e-PCOM(e-feedback)</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div><!--row-->
                <div class="row pt">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                         <div class="box-">
                            <a href="<?php echo base_url('patient-ecare');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/pat-new-5.png');?>">
                                    </div>
                                    <div class="speciality-txt-pat-new">
                                        <p>Patient e-care and education</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div><!--row-->
            </div>
        </div>
    </div>
</section>

<?php
    echo view('includes/flow-footer');    
?>
