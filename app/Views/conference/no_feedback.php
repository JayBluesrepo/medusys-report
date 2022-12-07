<?php
    echo view('includes/flow-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">


<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">

<section class="certificate-flow">
    <div class="row">
        <div class="col-sm-3">
            <div class="conference-left">
                <ul>
                    <li><a href="">Conferences & Workshops</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('Gas');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="conference-right">
                 <div class="con-head">
                    <div class="row" id="conf-bt">
                        <div class="col-sm-5">
                            <div class="conf-left-text">
                                <h5>Conferences & Workshops</h5>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="search" name="">
                        </div>
                    </div><!----->
                 </div>
                <header class="cf pt-4">
                    <div class="navigation">
                        <nav>
                            <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                            <ul class="mobimenu">
                                 <li><a href="<?php echo base_url('/Conference-Details?id='.$val['conference_id']); ?>">About</a></li>
                                <li><a href="<?php echo base_url('/Programs?id='.$val['conference_id']); ?>">Program Schedule</a></li>
                                <li><a href="<?php echo base_url('/Faculty-Details?id='.$val['conference_id']); ?>">Faculty</a></li>
                                <li><a href="<?php echo base_url('/Registration-Details?id='.$val['conference_id']); ?>">Registration</a></li>
                                <li><a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Attend</a></li>
                                <li  class="conf-act"> <a href="<?php echo base_url('/Feedback?id='.$val['conference_id']); ?>">Feedback</a></li>
                                <li><a href="<?php echo base_url('/Certificate?id='.$val['conference_id']); ?>">Certificate</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
            </div><!--conference-right--->
            <div class="container">
                <div class="row pt-5" id="certificate-view-button">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-10">
                   
                        <h3 class="mt-4 mb-5">Please submit your feedback first...</h3>
                       
                    </div>
                </div><!--row--> 
            </div>
        </div>
    </div>
</section>


<?php
    echo view('includes/flow-footer');    
?>