<?php
    echo view('includes/header-labour',$patient, $feed, $feedcheck, $preo, $posto, $follo, $proccheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
<!----------------------------------FEEDBACK START----------------------------->
<div role="tabpanel" class="tab-pane" id="contact">
    <section class="feedback-manual">
        <ul class="nav nav-tabs" id="feed-tabs">
            <?php if($sub){ ?>
                <li><button type="button" class="btn btn-secondary" disabled>Manual Feedback already Submitted</button></li>
                    <table class="table table-bordered" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th style="text-align : center;">Patient Name</th>
                                <th style="text-align : center;">Manual Feedback Submitted On</th>
                                <th style="text-align : center;">Manual Feedback View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $info['patient_name']; ?>" style="text-align:center;" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $sub['created_at']; ?>" style="text-align:center;" readonly>
                                </td>
                                <td>
                                    <a href="<?php echo base_url("labour/ManualFeedback/show_manual")?>" target="_blank" style="background-color:transparent!important;color:blue!important;text-align: center;display: block;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a><!--<i class="fa-solid fa-file-pdf"></i>-->
                                </td>
                            </tr>
                        </tbody>
					</table>
            <?php } else{ ?>
                <li id="man"><a href="<?php echo base_url('labour/ManualFeedback'); ?>">Add Feedback Manually</a></li>
            <?php }?>
            <?php if($rsend){ ?>
                <li><button type="button" class="btn btn-secondary" disabled>E-Feedback already Submitted</button></li>
                    <table class="table table-bordered" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th style="text-align : center;">Patient Name</th>
                                <th style="text-align : center;">E-Feedback Submitted On</th>
                                <th style="text-align : center;">E-Feedback View</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $info['patient_name']; ?>" style="text-align:center;" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="<?php echo $rsend['created_at']; ?>" style="text-align:center;" readonly>
                                </td>
                                <td>
                                    <a href="<?php echo base_url("labour/E_Feedback/show_feedback")?>" target="_blank" style="background-color:transparent!important;color:blue!important;text-align: center;display: block;"><i class="fa fa-file-pdf-o fa-2x" aria-hidden="true"></i></a><!--<i class="fa-solid fa-file-pdf"></i>-->
                                </td>
                            </tr>
                        </tbody>
					</table>
            <?php } else{ ?>
                <?php if($mails){ ?>
                    <li><button type="button" id="mail1" class="btn-submit" style="border-radius:0!important;font-weight: 600;">Resend E-Feedback</button></li>
                    &nbsp;&nbsp;<br><p id="show"><b>Email sent to the patient but patient have not submitted form</b></p>
            <?php }else{ ?>
                <li><button type="button" id="mail" class="btn btn-submit" style="font-weight: 600;">Send E-Feedback</button></li>
            <?php }}?>
        </ul>
    </section><!--feedback-manual-->
</div><!---Tab-7--->
<!----------------------------------FEEDBACK END------------------------------->
<script type="text/javascript">
    $('#mail').click(function(){
        $.ajax({
            url : '<?php  echo base_url("labour/E_Feedback")?>',
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr.success('check your e-mail','Email Sent Successfully'); 
                    window.setTimeout(function() {
						history.go(0);
					}, 2000);
                }
                else
                    toastr["error"](response.message);
            }
        });
    });
    $('#mail1').click(function(){
        $.ajax({
            type : "POST",
            url : '<?php  echo base_url("Resend-labour")?>',
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr.success('check your e-mail','Email has been sent again'); 
                    window.setTimeout(function() {
						history.go(0);
					}, 2000);
                }
                else
                    toastr["error"](response.message);
            }
        });
    });
    var abc = "<?php echo $rsend; ?>";
    var def = "<?php echo $sub; ?>";
    if(abc){
        $('#show').hide();
        $('#man').hide();
    }
    if(def){
        $('#mail').hide();
    }
</script>
<?php
    echo view('includes/footer-labour');    
?>