<?php
    echo view('includes/admin-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<div class="col-sm-10">
    <div class="add-conference-right">
        
       <section class="new-menu">
            <div class="container">
                    <h3 class="conf-tag">Edit Registration</h3>
                <div class="row pt-5">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <header class="cf">
                            <div class="navigation">
                                <nav>
                                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                                    <ul class="mobimenu">
                                        <li><a href="<?php echo base_url('/edit-conference?id='.$conference_id); ?>">About</a></li>
                                       <li><a href="<?php echo base_url('/program-scheduleedit?id='.$conference_id); ?>">Program Schedule</a></li>
                                        <li><a href="<?php echo base_url('/facultyedit?id='.$conference_id); ?>">Faculty</a></li>
                                        <li class="conf-act"><a href="<?php echo base_url('/edit-registration?id='.$conference_id); ?>">Registration</a></li>
                                        <li><a href="<?php echo base_url('/edit-attend?id='.$conference_id); ?>">Attend</a></li>
                                        <li><a href="<?php echo base_url('/edit-certificate?id='.$conference_id); ?>">Certificate</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </header>
                    </div>
                </div><!--row-->
            </div>
        </section>

            <div class="container">
                <div class="regis">
                    <form id="regist">
                        <div class="row pt-5">
                            <div class="col-sm-2">
                                <label><b>Title</b>:</label>
                            </div>
                            <div class="col-sm-10">
                                <h3><?php echo $title_con_e[0]['title']; ?></h3>
                            </div>
                        </div><!--row-->
                        <?php foreach($registr  as $values) { ?>
                        <input id="id1" type = "text" name = "conferene_id" value = "<?php echo $conference_id; ?>">
                        <input type="hidden" name="conference_id" value = "<?php echo $values['conference_id'] ?>">
                        <div class="table-responsive pt-5">
                            <table class="table table-striped">
                                <tbody>
                                    
                                    <tr>
                                        <td>Name</td>
                                        <td><?php echo $title_con_e[0]['title']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Registration Fee</td>
                                        <td>
                                            <input type="number" class="form-control" placeholder="Enter the Conference Registration Fee" name="reg_fee_reg_e" value = "<?php echo $values['reg_fee'] ?>">
                                        </td>
                                    </tr>
                                    <tr>

                                        <td>Enter the Conference Registration Details</td>
                                        <td>
                                             <textarea name="reg_details_reg_e" id="comment" class="form-control" onkeydown="limitText(this.form.reg_details_reg_e,this.form.countdown,500);" onkeyup="limitText(this.form.reg_details_reg_e,this.form.countdown,500);" placeholder="Enter the Conference Registration Details"><?php echo $values['reg_details'] ?>
                                             </textarea>
                                 <span class="limit">(Maximum characters: <input name="countdown" type="text" value="500" size="1" readonly>)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><button  type="submit" class="btn-reg">Update</button></td>
                                    </tr>
                                  
                                </tbody>
                            
                            </table>
                        <?php } ?>
                        </div>
                    </form>
                </div>
            </div>

     </div><!--add-conference-right--->
</div><!---->       


<!------------------------------Mobile-Menu------------------------------>
<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
<script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.smobitrigger').smplmnu();
        });

    </script>


<script>
    $(document).ready(function(){
        $('#id1').hide();
    });
</script>
</script>
<script>
$(document).ready(function(){
    
        $('#regist').submit(function(e){
            e.preventDefault(); 
            // alert("hii");
            var reg_details_reg_e = $("#comment").val();
            var formData = new FormData(this);
            formData.append("reg_details_reg_e",reg_details_reg_e);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("update-registration")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);

                        // $(".add_conferences").modal("hide");        
                       
                        window.location = '<?php echo base_url("edit-attend")?>?id='+response.data;       
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            }); 
        });
    });

</script>

<script language="javascript" type="text/javascript">
            function limitText(limitField, limitCount, limitNum) {
                if (limitField.value.length > limitNum) {
                    limitField.value = limitField.value.substring(0, limitNum);
                } else {
                    limitCount.value = limitNum - limitField.value.length;
                }
            }
            </script>




<?php
    echo view('includes/admin-footer');    
?>           