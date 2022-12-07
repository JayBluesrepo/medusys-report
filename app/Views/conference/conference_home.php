<?php
    //print_r($con_upcoming);
	//die();
    echo view('includes/flow-header',$conference); 
   
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">

<section class="confernce-home">
    <div class="row">
        <div class="col-sm-3">
            <div class="conference-left">
                <ul>
                    <li><a href="">Conferences & Workshops</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('Mels-Cme');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="conf-head">
                <div class="row" id="conf-bt">
                    <div class="col-sm-5">
                        <div class="conf-left-text">
                            <h5>Conferences & Workshops</h5>
                        </div>
                    </div>
                   
                </div><!----->
                <div class="row pt-4">
                    <div class="col-sm-6">
                        <div class="conf-cont">
                            <p>e-Conference section of Medusys e-Learning System (MeLS) is essentially a very helpful platform designed to manage and collaborate online learning in the field of medicine.</p>
                            <p>It is an all-in-one platform, where you can attend, organize instructor led training sessions, have discussion forums, and get certifications.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                         <img src="<?php echo base_url('public/assets/images/gas-conference-banner1.jpg');?>" class="img-fluid d-block mx-auto">
                    </div>
                </div><!----->
                <div class="conf-table">
                     <h3>Upcoming / Current Conferences</h3>
                    
			   <?php
				 
				foreach($con_upcoming  as $key=>$val){
				$today = strtotime("today midnight");
				$con_time = strtotime($val['date_from']);
				if($con_time >= $today){
		
				?>
					<div class="row">
                        		<div class="col-sm-7">
						<a href="<?php echo base_url('/Conference-Details?id='.$val['conference_id']); ?>"><?php echo  $val['title'];?></a>
					</div>	
					<div class="col-sm-5">
						<?php
							if($val['date_from'] == $val['date_to']){
								?>
									<p><?php echo date('F j, Y',strtotime($val['date_from'])); ?></p>
								<?php
							}
                            				else{
							      ?>
								<p><?php echo date('F j, Y',strtotime($val['date_from'])). '  To '.date('F j, Y',strtotime($val['date_to']));?></p>
								 
								<?php
							}
						?>
                        		</div>
					</div><!--row--->
				<?php
				}
				}
			   ?>
            
                        
                    
                    <div class="row" id="empty-row"></div>
                </div><!--conf-table-->
                <!---------------------------------------------------------------->
                <div class="conf-table">
                     <h3>Previous Conferences</h3>
                    <?php
				 
				foreach($con_upcoming  as $key=>$val){
				$today = strtotime("today midnight");
				$con_time = strtotime($val['date_from']);
				if($con_time < $today){
		
				?>
					<div class="row">
                        		<div class="col-sm-7">
						<a href="<?php echo base_url('/Conference-Details?id='.$val['conference_id']); ?>"><?php echo  $val['title'];?></a>
					</div>	
					<div class="col-sm-5">
						<?php
							if($val['date_from'] == $val['date_to']){
								?>
									<p><?php echo date('F j, Y',strtotime($val['date_from'])); ?></p>
								<?php
							}
                            				else{
							      ?>
								<p><?php echo date('F j, Y',strtotime($val['date_from'])). '  To '.date('F j, Y',strtotime($val['date_to']));?></p>
								 
								<?php
							}
						?>
                        		</div>
					</div><!--row--->
				<?php
				}
				}
			   ?>
                    <div class="row" id="empty-row"></div>
                </div><!--conf-table-->
                 <!---------------------------------------------------------------->
                  <div class="conf-table">
                     <h3>Events Calendar</h3>
                </div><!--conf-table-->
            </div>
        </div>
    </div>
</section>


<?php
    echo view('includes/flow-footer');    
?>

<style type="text/css">
    @media only screen and (min-width:320px) and (max-width:640px){
       .conference-left{
            width: auto;
       }
       .conf-head{
        padding-left: 5%;
       } 
    }
</style>