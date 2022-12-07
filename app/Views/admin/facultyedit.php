<?php
    echo view('includes/admin-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">

<div class="col-sm-10">
<div class="add-conference-right">

<section class="new-menu">
            <div class="container">
                <h3 class="conf-tag">Edit Faculty</h3>
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
                                        <li class="conf-act"><a href="<?php echo base_url('/facultyedit?id='.$conference_id); ?>">Faculty</a></li>
                                        <li><a href="<?php echo base_url('/edit-registration?id='.$conference_id); ?>">Registration</a></li>
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
   <section>    
        <div class="container">
            
                <div class="row pt-5" id="edit-faculty">
                    <div class="col-sm-2">
                        <label><b>Title</b>:</label>
			
                    </div>
                    <div class="col-sm-10">
                        <h3 ><?php echo $title_con[0]['title']; ?></h3>    
                    </div>
                </div><!--row-->
                <div class="vertical-tabs">
                    <div class="row pt-5">
                        <div class="col-sm-4">
                            <h4>Click on the Faculty Name for details</h4>
                             <ul class="nav nav-tabs" role="tablist">
                                <?php 
                                $i = 1;
                                    foreach($speaker  as $s){
                                    if($i == 1){
                                        ?>
                                <li>
                                <button id = "<?php echo 'button'.$i; ?>" class="nav-link" onclick = "change_details('<?php echo $s['ps_id'] ?>',<?php echo $i ?>)"><?php echo $s['speaker']; ?>
                                </button>
                                </li>
                                <?php
                                    $i++;
                                }
                                else{        
                               ?>
                                <li>
                                <button id = "<?php echo 'button'.$i; ?>" class="nav-link" onclick = "change_details('<?php echo $s['ps_id'] ?>',<?php echo $i ?>)"><?php echo $s['speaker']; ?>
                                </button>
                                </li>
                                <input type = "hidden" id = "total_num" value = "<?php echo $i; ?>" name = "total_num"/>
                                <?php
                                    $i++;
                                    } 
                                
                                  }
                                ?>
                                
                                </ul>
                                
                            </div>
<!-- --------------------moderater list----------- -->
                            <div class="col-sm-8">
                                <form id="faculty" enctype="multipart/form-data" >
                                    <input type="hidden" name ="conference_id"  value = "<?php echo $faculty11[0]['conference_id']; ?>">

                                <div class="col-sm-8">

                                    <div class="tab-content"  id="add_form_div" style = "display:none;">
                                        <div class="tab-pane active" id="pag1" role="tabpanel">
                                        <?php
                                        $j = 0; 
                                        foreach($faculty11  as $f){
                                            if($j == 0){

                                                $j++;
                                            ?> 
                                                
                                                       
                                        <div class="sv-tab-panel">
                                            <p><b>Add Profile Picture below</b></p>
                                            <div class="profile-pic">
                                                
                                               
                                                <input name="profile_pic_fac" type="file"  class="form-control" onchange="readURL2(this)" accept="image/*" value="<?php echo $f['profile_pic']; ?>" >
                                                 <img  class="img-fluid"  name = "profile" alt="preview image" id="profile" />

                                            </div>
                                            
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                    
                                                    <input type="hidden" name = "faculty_id" id = "faculty_id" value="<?php echo $f['id']; ?>"/> 
                                                <!--     <input  type = "text" name = "conferene_id"  value = "<?php echo $f['conference_id']; ?>" > -->
                                                    
                                                <input type = "hidden" name = "update_id"  id = "update_id" >
                                                        
                                                        <tr>
                                                            <td>Name</td>
                                                            <td><input type="text" class="form-control" name="name_fac" placeholder="Enter Full Name" id="name" value="<?php echo $f['name']; ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Present Designation</td>
                                                            <td><input type="text" class="form-control" id="present_des" name="present_des_fac" placeholder="Enter Present Designation" value="<?php echo $f['present_des']; ?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Qualifications </td>
                                                            <td><input type="text" id = "qualification" class="form-control" name="qualification_fac" placeholder="Enter Qualifications" value="<?php echo $f['qualification']; ?>"></td>
                                                        </tr>

                                                        <tr>
                                                            <td>Special Interests</td>
                                                            <td><textarea name="special_int_fac" id = "special_int" class="form-control" onkeydown="limitText(this.form.special_int_fac,this.form.countdown,500);" onkeyup="limitText(this.form.special_int_fac,this.form.countdown,500);" placeholder="Enter the Theme of Conference"><?php echo $f['special_int']; ?></textarea>
                                                        <span class="limit">(Maximum characters: <input name="countdown" type="text" value="500" size="1" readonly>)</span></td>
                                                        </tr>
                                                        <tr>
                                                        <td>Publications</td>
                                                        <td><textarea name="publication_fac" id = "publication" class="form-control" onkeydown="limitText(this.form.publication_fac,this.form.countdown1,500);" onkeyup="limitText(this.form.publication_fac,this.form.countdown1,500);" placeholder="Enter the Theme of Conference"><?php echo $f['publication']; ?></textarea>
                                                        <span class="limit">(Maximum characters: <input name="countdown1" type="text" value="500" size="1" readonly>)</span>
                                                        </td>
                                                        </tr>                           
                                                    </tbody>
                                                    
                                                </table>
                                            </div>
                                         </div>
                                        <?php }  } ?> 
                                    </div><!------1--->
                                       
                                        <button  type="submit" class="btn" id="up-btn">Update</button>
                                       
                                        

                                </div><!--tab-content-->

                                </div><!--tab-content-->
                              </form>
<!-- for add -->
                                
                             
                            </div>
                        </div>
                    </div>
               
            </div>
            </section>
        </div><!--col--9-->

    </div>   
 

<!----------------------------Mobile-Menu----------------------------->
<script type="text/javascript" src="<?php echo base_url('public/assets/js/simpleMobileMenu-1.js');?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.smobitrigger').smplmnu();
    });

</script>



<script>
    function readURL2(input) {
    if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#profile').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#profile_pic_fac').hide();
  }
}
</script>

<script>
function change_details(id,selectedbutton){

    var total_num = $('#total_num').val(id);
    var i = 0;
    for(i = 1; i < total_num; i++){
        var button = "button"+i;
        var element = document.getElementById(button);
        element.classList.add("active");
        $('#add_form_div').show();

    }
        var button = "button"+selectedbutton;
        var element = document.getElementById(button);
        element.classList.remove("active"); 
        $('#add_form_div').show();
        
        $.ajax({

            type   : 'post',
            url    : '<?php echo base_url("get-facultly-details")?>',
            data   : { 'ps_id' : id },
                                  
            success:function(response){
                response = jQuery.parseJSON(response);
                // console.log(response.data);

                // console.log(response.data['ps_id']);
                if(response.result==1)
                {  
                    toastr["success"](response.message);
                         // window.location.reload();
                    $('#name').val(response.data['name']);
                    $('#present_des').val(response.data['present_des']);
                    $('#qualification').val(response.data['qualification']);
                    $('#special_int').val(response.data['special_int']);
                    $('#publication').val(response.data['publication']);
                    $('#update_id').val('1');
                    $('#faculty_id').val(response.data['id']);

console.log($('#faculty_id').val());

                    var edit_save = document.getElementById("profile");

                     edit_save.src = '/images/faculty_profile/'+response.data['profile_pic'];
                   
                        

                }

                else if(response.result==0)
                {  
                     toastr["success"](response.message);
                         // window.location.reload();
                    $('#name').val('');
                    $('#present_des').val('');
                    $('#qualification').val('');
                    $('#special_int').val('');
                    $('#publication').val('');
                    $('#faculty_id'). val(response.ps_id);
                    $('#update_id').val('0');

			var edit_save = document.getElementById("profile");
                     edit_save.src = '';
                 
                        

                }
                else 
                {
                    toastr["error"](response.message);          
                }
            }
        });
   }





</script>
<script>
    $(document).on("submit", "#faculty", function (e) {
            e.preventDefault(); 

               
            var formData = new FormData(this);
            $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("update-faculty")?>',
            data   : formData,
            contentType: false,
            processData: false,                   
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                {  
                    toastr["success"](response.message);
                   
                         

                }
                else 
                {
                    toastr["error"](response.message);          
                }
            }
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
    echo view('includes/flow-footer');    
?>


<style type="text/css">
        .sv-tab-panel .table-responsive{
            margin-top: 30%;
        }
        @media only screen and (max-width:600px){
            .sv-tab-panel .table-responsive{
                margin-top: 30%;
            }
        }
</style>