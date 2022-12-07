

<?php
    echo view('includes/flow-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">


<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">

<section class="feedback-flow">
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
                      <!--  <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="search" name="">
                        </div> -->
                    </div><!----->
                 </div>
                 <div class="next d-sm-none">
                     <a href="<?php echo base_url('/Certificate?id='.$val['conference_id']); ?>">Next</a>
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
                                <li  class="conf-act"> <a href="">Feedback</a></li>
                                <li><a href="<?php echo base_url('/Certificate?id='.$val['conference_id']); ?>">Certificate</a></li>
                            </ul>
                        </nav>
                    </div>
                </header>
            </div><!--conference-right--->
             <div class="container">
                <div class="row pt-5">
                    <div class="col-sm-2" id="mobile-tag-confer">
                        <h4>Title</h4>
			             <h4>Date:</h4>
                    </div>
                    <div class="col-sm-10">
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
                </div><!--row-->
                <form id = "update-feedback-form">
		    <input type = "hidden" value = "<?php echo $val['conference_id']; ?>" name = "conference_id">
                    <p class="pt-5">Please rate the sessions on the scale:<br>Enter 1: Poor 2: OK 3: Normal 4: Good 5: Excellent</p>
                    <div class="table-responsive">
                        <table class="table table-striped" id="feed-input">
                            <thead>
                                <tr>
				    <th>Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Topic</th>
                                    <th>Speaker / Faculty</th>
                                    <th>1</th>
                                    <th>2</th>
                                    <th>3</th>
                                    <th>4</th>
                                    <th>5</th>
                                </tr>
                            </thead>
                            <tbody>
				
				<?php 
					$i = 1;
					foreach($programs as $p){
				?>
                                <tr>
				    <td><?php echo date('d-m-Y',strtotime($p['date'])); ?></td>
                                    <td><?php echo $p['start_time']; ?></td>
                                    <td><?php echo $p['end_time']; ?></td>
                                    <td><?php echo $p['topic']; ?></td>
                                    <td><?php echo $p['speaker']; ?></td>
                                    <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="<?php echo 'optradio'.$i;?>" value = "1">
                                          </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="<?php echo 'optradio'.$i;?>" value = "2">
                                          </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="<?php echo 'optradio'.$i;?>" value = "3" checked>
                                          </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="<?php echo 'optradio'.$i;?>" value = "4">
                                          </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="<?php echo 'optradio'.$i;?>" value = "5">
                                          </label>
                                        </div>
                                    </td>
                                </tr>
				<?php
					$i++;
				}
			    ?>
                                
                            </tbody>
                        </table>
                    </div><!------------Table-responsive-------------->
                    <p class="pt-2">Please give comments on what went well & what could be improved for this day. If your comments relate to a specific lecture please note which one.</p>
                    <div class="form-group">
                      <textarea class="form-control" rows="5" name = "comment" id="comment" required></textarea>
                    </div> 
                    <button type="submit" class="btn">Submit</button>
                </form>
            </div>
        </div><!--col--9-->
    </div>
   
</section>
<script>
 $('#update-feedback-form').submit(function(e){  
     e.preventDefault();
     formdata = new FormData($(this)[0]);
     $.ajax({
        type   : 'post',
        url    : '<?php echo base_url("update-feedback")?>',
         data   : formdata,
         contentType: false,
         processData: false,					  
         success:function(response){
             response = jQuery.parseJSON(response); 
             console.log(response);
             if(response.result==1)
             {  
                 toastr["success"](response.message);
                 $('#library-table').DataTable().ajax.reload(null, false);
                 $(".editDisease").modal("hide");			
             }
             else 
             { 
                 toastr["error"](response.message);			
             }
         }
     });
 });
</script>
<?php
    echo view('includes/flow-footer');    
?>