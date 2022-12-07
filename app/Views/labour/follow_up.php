<?php
    echo view('includes/header-labour',$patient, $foll, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

<!-----------------------------------FOLLOW UP START----------------------------->
<div role="tabpanel" class="tab-pane" id="about">
    <section class="add-follow-up">
        <h3>Add Follow up</h3>
        <form id="add-followup">
            <div class="row">
                <div class="col-sm-2"><label>Duration of stay in hospital (days)</label></div>
                <div class="col-sm-4">
                    <input type="number" class="form-control" name="duration">
                </div>
                <div class="col-sm-6"></div>
            </div><!--row-->
            <label style="margin-bottom: 0;"><h4><b>Cumulative LA Consumption</b></h4></label>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="lac">
                    <div class="">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="day1" onclick="daycheck()" value="">Day 1
                            </label>
                        </div>
                        <div class="followup-box day_add1" style="margin:20px 0;">
                            <label>LA &nbsp;&nbsp;
                             <div class="tooltip-16">
                                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                                    <div class="right-16">
                                        <div class="text-content-16">
                                            <h6>mg=(Concentration*volume in ml*10)</h6>
                                            <i></i>
                                        </div>
                                    </div>
                                </div>     
                            </label>
                            <input type="hidden" class="form-control" name="days[]" value="Day1">
                            <ul>
                                <li>Ropivacaine</li>
                                <li><input type="number" class="form-control" name="la_ropivacaine[]"></li>
                                <li><span>mg</span></li>
                            </ul>
                            <ul>
                                <li>Bupivacaine</li>
                                <li><input type="number" class="form-control" name="la_bupivacaine[]"></li>
                                <li><span>mg</span></li>
                            </ul>
                            <ul>
                                <li>Levobupivacaine</li>
                                <li><input type="number" class="form-control" name="la_levobupivacaine[]"></li>
                                <li><span>mg</span></li>
                            </ul>
                            <ul>
                                <li>Lignocaine</li>
                                <li><input type="number" class="form-control" name="la_lignocaine[]"></li>
                                <li><span>mg</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                    <!-- <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Day 2
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="">Day 3
                        </label>
                    </div> -->
                    <!-- <div id="appendfun"></div> -->
                    <!-- <div class="col-sm-4"></div> -->
            </div><!--row-->
            <div id="proced-plus" style="margin-left:100px;margin-top: 20px;">
                <button type="button" class="btn add"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
            <ul class="late pt-3">
                <li><h4>Late Complications
                <div class="tooltip-23">
                   <i class="fa fa-info-circle" aria-hidden="true"></i>
                    <div class="right-23">
                        <div class="text-content-23">
                            <h6>All options need to be unchecked <br> to make selection No.</h6>
                            <i></i>
                        </div>
                    </div>
                </div>    
                </h4></li>
                <li>
                    <div class= "box_1">
                        <input type="checkbox" class="switch_1" id="compli" onclick="complicationcheck()">
                    </div>
                </li>
            </ul>
            <div class="row item_list" >
                <div class="col-sm-2"></div>
                <div class="col-sm-10" id="follow-up-late">
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="postdural_puncture">
							<input type="checkbox" class="form-check-input" value="Yes" name="postdural_puncture" id = "postdural_puncture">Post-Dural Puncture Headache (PDPH)
                        </label>
                    </div><!--check1-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="backache_epidural">
							<input type="checkbox" class="form-check-input" value="Yes" name="backache_epidural" id = "backache_epidural">Backache at Epidural Site
                        </label>   
                    </div><!--check2-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="perst_motor">
							<input type="checkbox" class="form-check-input" value="Yes" name="perst_motor" id = "perst_motor">Persistent Motor Deficit <2 Weeks
                        </label> 
                    </div><!--check3-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="perst_sensory">
							<input type="checkbox" class="form-check-input" value="Yes" name="perst_sensory" id = "perst_sensory">Persistent Sensory Deficit <2 Weeks
                        </label>
                    </div><!--check4-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="asep_meningi">
							<input type="checkbox" class="form-check-input" value="Yes" name="asep_meningi" id = "asep_meningi">Aseptic Meningitis
                        </label>
                    </div><!--check5-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="bacterial_meningi">
							<input type="checkbox" class="form-check-input" value="Yes" name="bacterial_meningi" id = "bacterial_meningi">Bacterial Meningitis
                        </label>
                    </div><!--check6-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="epidural_abs">
							<input type="checkbox" class="form-check-input" value="Yes" name="epidural_abs" id = "epidural_abs">Epidural Abscess
                        </label>  
                    </div><!--check7-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="perm_neuro_compli">
							<input type="checkbox" class="form-check-input" value="Yes" name="perm_neuro_compli" id = "perm_neuro_compli">Permanent Neurological Complication
                        </label>   
                    </div><!--check8-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="catheter">
							<input type="checkbox" class="form-check-input" value="Yes" name="catheter" id = "catheter">Catheter Related Issues 
                        </label>
                    </div><!--check9-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="epidural_haema">
							<input type="checkbox" class="form-check-input" value="Yes" name="epidural_haema" id = "epidural_haema">Epidural Haematoma
                        </label>
                    </div><!--check10-->
                    <div class="form-check">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="others">
							<input type="checkbox" class="form-check-input" value="Yes" name="others" id="oth" onclick="other1()">Other
                        </label>
                        <div class="other1">
                            <div class="row pt">
                                <div class="col-sm-6" id="proced-plus" style="display:flex;">
                                    <input type="text" class="form-control" name="other[]"> <button type="button" class="btn add1"><i class="fa fa-plus" aria-hidden="true"></i></button>    
                                </div>
                                <div class="col-sm-6"></div>
                            </div>
                        </div><!--other1 ends-->
                    </div><!--check11-->
                </div>
            </div><!--row-->
            <h5 class="mt-3"><b>Follow up Procedure</b><span class="mandat">*</span></h5>
            &nbsp;<small class="succes" style="color:red; display:none;">please choose follow up procedure</small>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input Interview" value="Direct Interview" name="optradio">Direct Interview
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input Telephone" value="Telephone" name="optradio">Telephone
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input Notes" value="Notes" name="optradio">Notes
                        </label>
                    </div>
                </div>
                <div class="col-sm-6"></div>
            </div><!--row-->
            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <button type="submit" class="btn-save Save">Save</button>
                    <!-- <button type="button" class="btn-close">Reset</button> -->
                </div>
            </div><!--row-->
        </form>
    </section><!--add-follow-up-->
    
</div><!---Tab-6--->
<!-----------------------------------FOLLOW UP END----------------------------->
<script type="text/javascript">

    $("input[name='optradio']").change(function(){
		$('.succes').hide();
	});

$(document).ready(function(){
    $('.item_list').hide();
    $('.other1').hide();
    $('.day_add1').hide();
    // $('.day_add2').hide();
});
$(document).ready(function(){
    var i=1;
    $(".add1").click(function(){
        if(i<3){
            i++;
		    $(".other1").append('<div class="row pt"><div class="col-sm-6" id="proced-plus" style="display:flex;"><input type="text" class="form-control" name="other[]"> <button type="button" class="btn remove1"><i class="fa fa-times" aria-hidden="true"></i></button></div><div class="col-sm-6"></div></div>');
        }
    });
    $(document).on('click','.remove1',function(){
        i--;
        $(this).closest('.row').remove();
    });
});
</script>
<script>

    function daycheck(){
        var day = $("#day1").is(':checked');
        if(!day){
            $('.day_add1').hide();
        }else{
            $('.day_add1').show();
        }
    }
    function complicationcheck(){
        var complication = $('#compli').is(':checked');
        if(!complication){

            var postdural_puncture = $('#postdural_puncture').is(':checked');

            var backache_epidural = $('#backache_epidural').is(':checked');

            var perst_motor = $('#perst_motor').is(':checked');

            var perst_sensory = $('#perst_sensory').is(':checked');

            var asep_meningi = $('#asep_meningi').is(':checked');

            var bacterial_meningi = $('#bacterial_meningi').is(':checked');

            var epidural_abs = $('#epidural_abs').is(':checked');

            var perm_neuro_compli = $('#perm_neuro_compli').is(':checked');
            var catheter = $('#catheter').is(':checked');
            var epidural_haema = $('#epidural_haema').is(':checked');
            var oth = $('#oth').is(':checked'); 

            if(postdural_puncture){
                toastr.error('Please remove Postdural Puncture..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(backache_epidural){
                toastr.error('Please remove Backache Epidural..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(perst_motor){
                toastr.error('Please remove Perst Motor..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(perst_sensory){
                toastr.error('Please remove Perst Sensory..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(asep_meningi){
                toastr.error('Please remove Asep Meningi..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(bacterial_meningi){
                toastr.error('Please remove Bacterial Meningi..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(epidural_abs){
                toastr.error('Please remove Epidural Abs..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(perm_neuro_compli){
                toastr.error('Please remove Perm Neuro Compli..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(catheter){
                toastr.error('Please remove Perm Catheter..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(epidural_haema){
                toastr.error('Please remove Epidural Haema..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(oth){
                toastr.error('Please remove other..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }

            else{
                $('.item_list').hide();
            }
        }
        else{
            $('.item_list').show();

        }
    }
    function other1(){
        var oth = $('#oth').is(':checked');
        if(!oth){
            $('.other1').hide();
        }
        else{
            $(".other1").show();
        }
    }

    var j = 1;

    $('.add').click(function(){
        j++;
        var mode = '';
        var mode1 = '';
        mode+= '<div class="row2">';
        mode+=   '<div class="form-check" id="proced-plus">';
        mode+=         '<label class="form-check-label">';
        mode+=             '<input type="checkbox" class="form-check-input days'+j+'"  value="">Day'+j+'';
        mode+=             '<button type="button" class="btn remove2'+j+'"><i class="fa fa-times" aria-hidden="true"></i></button>';
        mode+=         '</label>';
        mode+=    '</div>'; 
        mode+=      '<div class="followup-box day_add'+j+'" style="display:none;margin-top:20px;">';
        mode+=          '<label>LA &nbsp;&nbsp; <div class="tooltip-16"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="right-16"><div class="text-content-16"><h6>mg=(Concentration*volume in ml*10)</h6><i></i></div></div></div> </label>';
        mode+=          '<input type="hidden" class="form-control" name="days[]" value="Day'+j+'">';
        mode+=          '<ul>';
        mode+=              '<li>Ropivacaine</li>';
        mode+=              '<li><input type="number" class="form-control" name="la_ropivacaine[]"></li>';
        mode+=              '<li><span>mg</span></li>';
        mode+=          '</ul>';
        mode+=          '<ul>';
        mode+=              '<li>Bupivacaine</li>';
        mode+=              '<li><input type="number" class="form-control" name="la_bupivacaine[]"></li>';
        mode+=              '<li><span>mg</span></li>';
        mode+=           '</ul>';
        mode+=          '<ul>';
        mode+=              '<li>Levobupivacaine</li>';
        mode+=              '<li><input type="number" class="form-control" name="la_levobupivacaine[]"></li>';
        mode+=              '<li><span>mg</span></li>';
        mode+=          '</ul>';
        mode+=          '<ul>';
        mode+=              '<li>Lignocaine</li>';
        mode+=              '<li><input type="number" class="form-control" name="la_lignocaine[]"></li>';
        mode+=              '<li><span>mg</span></li>';
        mode+=          '</ul>';
        mode+=      '</div>';
        mode+= '</div>';
        $(".lac").append(mode).fadeIn('slow');
        
        $(".remove2"+j+"").click(function(){
            $(this).closest('.row2').remove();
            j--;
            // alert(j);
        });
        // var flag=0;
        $(".days"+j+"").click(function(){
            // alert(".days"+j+"");
            var dya = $('.days'+j+'').is(':checked');
            if(dya){
                $('.day_add'+j).show();
            }
            else{
                $('.day_add'+j).hide();
            }      
        });
    });

    // function test(key){
    //     toastr.error(key);

    //     console.log('.day_add'+key);
    //     var day = $('#days'+key).is(':checked');
    //     // alert(day);
    //     if(!day){
    //         $('.day_add'+key).hide();
    //     }else{
    //         $('.day_add'+key).show();
    //     }
    // }
    

</script>
<script type="text/javascript">
// $(document).ready(function(){
    $('#add-followup').submit(function(e){
		e.preventDefault();
        var ii = '';
        
        if (!document.querySelector('.Notes').checked && !document.querySelector('.Telephone').checked && !document.querySelector('.Interview').checked) { 
            $('.succes').show();
            toastr.error('please choose success status'); 
        }
        else{
            ii = true;
        }

        if(ii){
            var formData = new FormData(this);
            $(".Save").text("Submitting...");
            $(".Save").attr("disabled", true);
            $.ajax({
                type : "POST",
                url : '<?php  echo base_url("labour-addFollow")?>',
                data : formData,
                contentType: false,
                processData: false,
                success:function(response){
                    response = jQuery.parseJSON(response);
                    if(response.result==1){
                        toastr["success"](response.message);
                        $('#add-followup')[0].reset();  
                        window.location = '<?php echo base_url("labour/FollowupDetails")?>?id='+response.msg;     
                    }
                    else{
                        toastr["error"](response.message);
                    }
                }
            });
        }
        
    });
// });
</script>
<?php
    echo view('includes/footer-labour');    
?>

<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
	}
</style>