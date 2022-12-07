<?php
    echo view('includes/flow-header');    
?>

<section class="spec-main">
    <div class="row">
        <div class="col-sm-3">
             <div class="spec-left">
                 <ul>
                    <li><a href="">e-Library</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url("Mels-Cme")?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="e-lib-right">
                <div class="row">
                    <div class="col-sm-5">
                        <a href="">
                            <div class="e-lib-box">
                               <div class="e-lib-img">
                                     <img src="<?php echo base_url('public/assets/images/e-lib-icon-1.png');?>">
                               </div>
                               <div class="e-lib-cont">
                                   <p>Guidelines</p>
                               </div> 
                            </div>
                        </a>
                    </div>
                     <div class="col-sm-5">
                        <a href="">
                            <div class="e-lib-box">
                               <div class="e-lib-img">
                                     <img src="<?php echo base_url('public/assets/images/e-lib-icon-2.png');?>">
                               </div>
                               <div class="e-lib-cont">
                                   <p>Treatment Algorithms</p>
                               </div> 
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-2"></div>
                </div><!--row-->
                <div class="row pt-5">
                    <div class="col-sm-5">
                        <a href="">
                            <div class="e-lib-box">
                               <div class="e-lib-img">
                                     <img src="<?php echo base_url('public/assets/images/e-lib-icon-3.png');?>">
                               </div>
                               <div class="e-lib-cont">
                                   <p>e-Books</p>
                               </div> 
                            </div>
                        </a>
                    </div>
                     <div class="col-sm-5">
                        <a href="">
                            <div class="e-lib-box">
                               <div class="e-lib-img">
                                     <img src="<?php echo base_url('public/assets/images/e-lib-icon-4.png');?>">
                               </div>
                               <div class="e-lib-cont">
                                   <p>Journal Club</p>
                               </div> 
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-2"></div>
                </div><!--row-->
                <div class="row pt-5">
                    <div class="col-sm-5">
                        <a href="">
                            <div class="e-lib-box">
                               <div class="e-lib-img">
                                     <img src="<?php echo base_url('public/assets/images/e-lib-icon-5.png');?>">
                               </div>
                               <div class="e-lib-cont">
                                   <p>Presentations & Posters</p>
                               </div> 
                            </div>
                        </a>
                    </div>
                     <div class="col-sm-5">
                        <a href="">
                            <div class="e-lib-box">
                               <div class="e-lib-img">
                                     <img src="<?php echo base_url('public/assets/images/e-lib-icon-6.png');?>">
                               </div>
                               <div class="e-lib-cont">
                                   <p>Infographics & Media</p>
                               </div> 
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-2"></div>
                </div><!--row-->
            </div>
        </div>
    </div>
</section>


<?php
    echo view('includes/flow-footer');    
?>
