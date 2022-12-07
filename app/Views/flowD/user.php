<?php
    echo view('includes/flow-header');    
?>

<section class="speciality-main">
        <div class="row">
            <div class="col-sm-3">
                <div class="spec-left">
                    <ul>
                        <!-- <li><a href="" id="individual">Individual User</a></li> -->
                        <li><a href="">Organisational User</a></li>
                    </ul>
                    <div class="go-back">
                         <a href="<?php echo base_url('Speciality');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="speciality-right">
                      <div class="row">
                            <div class="box">
                                <a href="<?php echo base_url('Gas');?>">
                                    <div class="speciality-box">
                                        <div class="speciality-icon">
                                            <img src="<?php echo base_url('public/assets/images/Gas-1.png');?>">
                                        </div>
                                        <div class="speciality-txt">
                                            <p class="gas-txt">GAS</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    </div><!--row-->
                </div><!--speciality-right-->
            </div>
        </div>      
</section> 

<?php
    echo view('includes/flow-footer');    
?>