<?php
    echo view('includes/admin-header',$certificate);    
?>

<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<div class="col-sm-10">
    <div class="add-conference-right">
        <section class="new-menu">
            <div class="container">
                <h3 class="conf-tag">Add Certificate</h3>
                <div class="row pt-5">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11">
                        <header class="cf">
                            <div class="navigation">
                                <nav>
                                    <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                                    <ul class="mobimenu">
                                        <li><a href="<?php echo base_url('add-conference'); ?>">About</a></li>
                                        <li><a href="<?php echo base_url('program-schedule'); ?>">Program Schedule</a></li>
                                        <li><a href="<?php echo base_url('Faculty'); ?>">Faculty</a></li>
                                        <li><a href="<?php echo base_url('conference-registration'); ?>">Registration</a></li>
                                        <li ><a href="<?php echo base_url('Attend'); ?>" >Attend</a></li>
                                        <li class="conf-act"><a href="<?php echo base_url('Certificate'); ?>">Certificate</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </header>
                    </div>
                </div><!--row-->
            </div>
        </section>
            <div class="container">
                <div class="certificate-new">
                    <form id="certificate" enctype="multipart/form-data"> 
                        <div class="row pt-5">
                            <div class="col-sm-2">
                                <label><b>Title</b>:</label>
                            </div>
                            <div class="col-sm-10">
                                <h3><?php echo $title_con[0]['title']; ?></h3>
                            </div>
                        </div><!--row-->
                        <div class="row pt-5">
                            <input id="id1" type = "text" name = "conferene_id" value = "<?php echo $conference_id; ?>">
                            <div class="col-sm-9">
                                <label>Add Logo 1 (left)</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo1" placeholder="file image size 180*180 pixel" style="width:40%;" onchange="readURL1(this)" accept="image/*">

                                    <img src="" class="img-fluid"  name = "profile1"  id="image1" />
                                </div>
                                <label>Add Logo 2 (Center)</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo2" onchange="readURL2(this)" accept="image/*" style="width:40%;">
                                    <img src="" class="img-fluid"  name = "profile2"  id="image2" />
                                </div>
                                <label>Add Logo 3 (Right)</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo3" style="width:40%;" onchange="readURL3(this)" accept="image/*">
                                    <img src="" class="img-fluid"  name = "profile3"  id="image3" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="accredited_by" placeholder="Accredited by">
                                </div>
                                <label>Add Signature 1 JPEG</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="signature1" style="width:40%;" onchange="readURL4(this)" accept="image/*">
                                    <img src="" class="img-fluid"  name = "signature_img1"  id="image4" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="sign1" placeholder="Add Name and Designation of Signature 1">
                                </div>
                                <label>Add Signature 2 JPEG</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="signature2" style="width:40%;" onchange="readURL5(this)" accept="image/*">
                                    <img src="" class="img-fluid"  name = "signature_img2"  id="image5" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="sign2" placeholder="Add Name and Designation of Signature 2">
                                </div>
                                <div>
                                <button  type="submit" class="btn" id="upload-certify-btn">Submit</button>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div><!---->
                    </form>
                </div>
            </div>
                   

     </div><!--add-conference-right--->
</div><!---->       

<!------------------------------------Mobile-Menu--------------------------------->
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
<script>
    
function readURL1(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image1').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#logo1').hide();
  }
}

function readURL2(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image2').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#logo2').hide();
  }
}
function readURL3(input) {
  if(input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#image3').attr('src', e.target.result).width(80).height(80);
    };
    reader.readAsDataURL(input.files[0]);
    $('#logo3').hide();
  }
}
// function readURL2(input) {
//  if(input.files && input.files[0]) {
//     var reader1 = new FileReader();
//     reader1.onload = function (e) {
//       $('#image2').attr('src', e.target.result).width(80).height(80);
//     };
//     reader.readAsDataURL(input.files[0]);
//     $('#logo2').hide();
//   }
// }

</script>
<script>
// $(document).ready(function(){
    $(document).on("submit", "#certificate", function (e) {
       
            e.preventDefault(); 
            var formData = new FormData(this);
            // formData.append("reg_details_reg",reg_details_reg);

            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("certificateupload-add")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);
  
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            }); 
        });
    // });

</script>



<?php
    echo view('includes/admin-footer');    
?>                 