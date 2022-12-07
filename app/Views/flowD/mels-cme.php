<?php
    echo view('includes/flow-header');    
?>

<!-- <section class="speciality-main">
        <div class="row">
            <div class="col-sm-2">
                <div class="speciality-left">
                    <ul>
                        <li><a href="">MeLS-CME</a></li>
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
                                    <div class="speciality-box-clinic" style="height: 120px;">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('assets/images/cme-img-1.png');?>">
                                        </div>
                                        <div class="speciality-txt-clinic-new">
                                            <p>Forum</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="box">
                                <a href="">
                                    <div class="speciality-box-clinic" style="height: 120px;">
                                        <div class="speciality-icon-pat">
                                            <img src="<?php echo base_url('assets/images/cme-img-2.png');?>">
                                        </div>
                                        <div class="speciality-txt-clinic-new">
                                            <p>Conferences & Workshops</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="row">
                        <div class="box">
                            <a href="">
                                <div class="speciality-box-clinic" style="height: 120px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('assets/images/cme-img-3.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>e-Library</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box-clinic" style="height: 120px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('assets/images/cme-img-4.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Collaborate</p>
                                    </div>
                                </div>
                            </a>
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
                    <li><a href="">MeLS-CME</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('Gas');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="cme-right">
                <div class="row">
                    <div class="col-sm-5">
                       <div class="box-">
                            <a href="<?php echo base_url('forum');?>">
                                <div class="speciality-box-clinic" style="height: 110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/cme-img-1.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Forum</p>
                                    </div>
                                </div>
                            </a>
                        </div> 
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                         <div class="box-">
                            <a href="<?php echo base_url('conference-workshops');?>">
                                <div class="speciality-box-clinic" style="height: 110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/cme-img-2.png');?>" id="conf-img">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Conferences & Workshops</p>
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
                            <a href="<?php echo base_url('e-library');?>">
                                <div class="speciality-box-clinic" style="height: 110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/cme-img-3.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>e-Library</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5">
                        <div class="box-">
                            <a href="<?php echo base_url('collaborate');?>">
                                <div class="speciality-box-clinic" style="height: 110px;">
                                    <div class="speciality-icon-pat">
                                        <img src="<?php echo base_url('public/assets/images/cme-img-4.png');?>">
                                    </div>
                                    <div class="speciality-txt-clinic-new">
                                        <p>Collaborate</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                </div><!--row-->
            </div>
        </div>
    </div><!--row-->
</section>

<?php
    echo view('includes/flow-footer1');    
?>



<!-- <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script> -->
