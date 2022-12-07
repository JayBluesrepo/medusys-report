<?php
    echo view('includes/flow-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">

<section class="attend-flow">
    <div class="row">
        <div class="col-sm-3">
             <div class="conference-left">
                <ul>
                    <li><a href="">Conferences & Workshops</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('conference-workshops');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
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
                    <!--    <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="search" name="">
                        </div> -->
                    </div><!----->
                 </div>
                 <div class="next d-sm-none">
                     <a href="<?php echo base_url('/Feedback?id='.$val['conference_id']); ?>">Next</a>
                 </div>
                <header class="cf pt-4">
                    <div class="navigation">
                        <nav>
                            <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                            <ul class="mobimenu">
                                <li><a href="<?php echo base_url('/Conference-Details?id='.$val['conference_id']); ?>">About</a></li>
                                <li><a href="<?php echo base_url('/Programs?id='.$val['conference_id']); ?>">Program Schedule</a></li>
                                <li><a href="<?php echo base_url('/Faculty-Details?id='.$val['conference_id']); ?>">Faculty</a></li>
                                <li ><a href="<?php echo base_url('/Registration-Details?id='.$val['conference_id']); ?>">Registration</a></li>
                                <li class="conf-act"><a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Attend</a></li>
                                <li><a href="<?php echo base_url('/Feedback?id='.$val['conference_id']); ?>">Feedback</a></li>
                                <li><a href="">Certificate</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
            </div><!--conference-right--->
             <div class="container">
               <div class="row pt-5">
                  <div class="col-sm-3" id="mobile-tag-confer">
                      <h4>Title</h4>
			         <h4>Date:</h4>     
                  </div>
                  <div class="col-sm-9">
                      <h4><b><?php echo $val['title']; ?></b></h4>
			     <?php
                            if($val['date_from'] == $val['date_to']){
                                ?>
                                    <h4><b><?php echo date('F j, Y',strtotime($val['date_from'])); ?></b></h4>
                                <?php
                            }
                            else{
                                ?>
                                    <h4><b><?php echo date('F j, Y',strtotime($val['date_from'])). '  To '.date('F j, Y',strtotime($val['date_to']));?></b></h4>

                                <?php
                            }
                        ?>
                  </div>  
               </div><!---->
               <div class="table-responsive pt-5">
                    <table class="table table-striped">
                        <thead>
                            <tr>
				<th>Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Topic</th>
                                <th>Speaker / Faculty</th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
			<?php 
			foreach ($attend_link as $attend){
				?>
                            <tr>
				<td><p><?php echo date('d-m-Y',strtotime($attend['date'])); ?></p></td>
                                <td><p><?php echo $attend['start_time']; ?></p></td>
                                <td><p><?php echo $attend['end_time']; ?></p></td>
 				<td><p><?php echo $attend['topic']; ?></p></td>
                                <td><p><?php echo $attend['speaker']; ?></p></td>
                                <td><p>Zoom link : <span id="zoom_link">
                                    <a href="<?php echo $attend['zoom_link']; ?>" target="_blank"> <?php echo $attend['zoom_link']; ?></a>
                                </p>
				    <p>Zoom Id : <span id="zoom_membership_id"> <?php echo $attend['zoom_membership_id']; ?></p>
				    <p>Zoom Password : <span id="zoom_passcode"> <?php echo $attend['zoom_passcode']; ?></p>
				    <p>Youtube Link :<span id="youtube"><a href="<?php echo $attend['youtube_link']; ?>" target="_blank"><?php echo $attend['youtube_link']; ?></a></span></p>
				    <p>Googlemeet Link : <span id="googlemeet"><a href="<?php echo $attend['googlemeet_link']; ?>" target="_blank"> <?php echo $attend['googlemeet_link']; ?></a></span> </p>
					
				</td>
                            </tr>
				<?php
			}
			?>
                             
                        </tbody>
                    </table>
                </div><!--table-responsive--> 
            </div>
        </div><!--col--9--->
    </div>
   
</section>

<script>
	$('#zoom_link').click(function(){
		var z = '<?php echo $attend['zoom_link']; ?>';		
		window.open(z);
	});
	$('#zoom_membership_id').click(function(){
		var z = '<?php echo $attend['zoom_membership_id']; ?>';		
		window.open(z);
	});
	$('#zoom_passcode').click(function(){
		var z = '<?php echo $attend['zoom_passcode']; ?>';		
		window.open(z);
	});
	$('#youtube').click(function(){
		var z = '<?php echo $attend['youtube_link']; ?>';		
		window.open(z);
	});
	$('#googlemeet_link').click(function(){
		var z = '<?php echo $attend['googlemeet_link']; ?>';		
		window.open(z);
	});

</script>


<?php
    echo view('includes/flow-footer');    
?>