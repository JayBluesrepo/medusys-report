<?php
    echo view('includes/admin-header');    
?>

<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/jquery-ui.css'); ?>"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<div class="col-sm-10">
    <div class="add-conference-right">
        <section class="new-menu">
            <div class="container">
                <h3 class="conf-tag">Edit Certificate</h3>
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
                                        <li><a href="<?php echo base_url('/edit-registration?id='.$conference_id); ?>">Registration</a></li>
                                        <li><a href="<?php echo base_url('/edit-attend?id='.$conference_id); ?>">Attend</a></li>
                                        <li class="conf-act"><a href="<?php echo base_url('/edit-certificate?id='.$conference_id); ?>">Certificate</a></li>
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
                                <h3><?php echo $title_con_e[0]['title']; ?></h3>
                            </div>
                        </div><!--row-->
                        <div class="row pt-5">
                            
                            
                            
                            <div class="col-sm-9">
                                <?php  $j = 0; 
                                foreach($certifi  as $values){
                                    if($j == 0){

                                        $j++; 
                                                 ?>
                                <input id="conferene_id" type="hidden" type = "text" name = "con_id" value = "<?php echo $conference_id; ?>">
                                <input id ="id" type="hidden"  name = "id" value = "<?php echo $values['id']; ?>">
                                <label>Add Logo 1(Left) Image size: 160px * 160px</label>
                                <div class="form-group" id="wr1">
                                    <input type="file"  class="form-control" name="logo1_e" style="width:40%;" onchange="readURL1(this)" accept="image/*" value = "<?php echo $values['logo1'] ?>">
                    <!-- <span><i class="fa fa-times" aria-hidden="true" onclick="wrong()" ></i></span> -->
                    <button type="button" class="btn"  onclick="wrong(this.value)" value="logo1" id="delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                                    <img  src="<?php echo base_url('images/certificate/'.$values['logo1']); ?>" class="img-fluid"  name = "profile1"   id="image1" />
                    
                            
                                </div>
                                <label>Add Logo 2 (Center) Image size: 160px * 160px</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo2_e" onchange="readURL2(this)" accept="image/*" style="width:40%;" value = "<?php echo $values['logo2'] ?>">
                                    <!-- <span><i class="fa fa-times" aria-hidden="true" onclick="wrong1()" ></i></span> -->
                                    <button type="button" class="btn" onclick="wrong(this.value)" value="logo2" id="delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <img src="<?php echo base_url('images/certificate/'.$values['logo2']); ?>" class="img-fluid"  name = "profile2"  id="image2" />
                                </div>
                                <label>Add Logo 3 (Right) Image size: 160px * 160px</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="logo3_e" style="width:40%;" onchange="readURL3(this)" accept="image/*" value = "<?php echo $values['logo3'] ?>">
                                    <!-- <span><i class="fa fa-times" aria-hidden="true" onclick="wrong2()" ></i></span> -->
                                    <button type="button" class="btn" onclick="wrong(this.value)" value="logo3" id="delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <img src="<?php echo base_url('images/certificate/'.$values['logo3']); ?>" class="img-fluid"  name = "profile3"  id="image3" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="accredited_by_e" placeholder="Accredited by" value = "<?php echo $values['accredited_by'] ?>">
                                </div>
                                <label>Add Signature 1 JPEG(Image size: 50px)</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="signature1_e" style="width:40%;" onchange="readURL4(this)" accept="image/*" value = "<?php echo $values['signature1'] ?>">
                                    <!-- <span><i class="fa fa-times" aria-hidden="true" onclick="wrong3()" ></i></span> -->
                                    <button type="button" class="btn" onclick="wrong(this.value)" value="signature1" id="delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <img src="<?php echo base_url('images/certificate/'.$values['signature1']); ?>" class="img-fluid"  name = "signature_img1"  id="image4" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="sign1_e" placeholder="Add Name and Designation of Signature 1" value = "<?php echo $values['sign1'] ?>">
                                </div>
                                <label>Add Signature 2 JPEG(Image size: 50px)</label>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="signature2_e" style="width:40%;" onchange="readURL5(this)" accept="image/*" value = "<?php echo $values['signature2'] ?>">
                                    <!-- <span><i class="fa fa-times" aria-hidden="true" onclick="wrong4()" ></i></span> -->
                                    <button type="button" class="btn" onclick="wrong(this.value)" value="signature2" id="delete"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <img src="<?php echo base_url('images/certificate/'.$values['signature2']); ?>" class="img-fluid"  name = "signature_img2"  id="image5" />
                                </div>
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="sign2_e" placeholder="Add Name and Designation of Signature 2" value = "<?php echo $values['sign2'] ?>">
                                </div>
                                <div>
                                <button  type="submit" class="btn-certify">Submit</button>
                                </div>
                                <?php } 
                            } ?>
                            </div>
                      
                            <div class="col-sm-3"></div>
                        </div><!---->
                    </form>
                </div>
            </div>
                   

     </div><!--add-conference-right--->
</div><!---->       

<!----------------------------Mobile-Menu--------------------------------->
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
<!-- <script>
 function wrong(){
    
     $("#image1").remove();
}
 function wrong1(){

    $("#image2").remove();
}
 function wrong2(){

    $("#image3").remove();
}
 function wrong3(){

    $("#image4").remove();  
}
 function wrong4(){

    $("#image5").remove();

    
}
</script> -->
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
                url : '<?php  echo base_url("update-certificate")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result == 1){
                        toastr["success"](response.message);    
			            window.location.reload(); 
                    }
                    else{
                        toastr["error"](response.message);                        
                    }
                }
            }); 
        });
    // });

    function wrong(col_name){
    alert(col_name);
    $con_id = $("#conferene_id").val();
    $id = $("#id").val();
    alert($id);
    // $logo1 = $("image1").val();
    // $image1 = $("#image1").val();
     if (confirm("Are you sure?")) {
    // alert($con_id);
    $.ajax({
            type   : 'post',
            url    : '<?php echo base_url("delete-certificate")?>',
            data   : {col_name: col_name, con_id : $con_id, id: $id},                   
            success:function(response){
                response = jQuery.parseJSON(response);
                console.log(response);
                if(response.result==1)
                { 
                       
                    toastr["success"](response.message);
                    window.location.reload();


                }
                else 
                {
                    toastr["error"](response.message);
                         
                }

            }

           }); 
}

 }

</script>



<?php
    echo view('includes/admin-footer');    
?>                 
