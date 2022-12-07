<?php
    echo view('includes/header',$patient, $foll, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
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
            <label style="margin-bottom: 0;"><h5><b>Cumulative LA Consumption</b></h5></label>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="lac">
                    <div class="">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" id="day1" onclick="daycheck()" value="">Day 1
                            </label>
                        </div>
                        <div class="followup-box day_add1">
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
            <div id="proced-plus" style="margin-left:100px;">
                <button type="button" class="btn add"><i class="fa fa-plus" aria-hidden="true"></i></button>
            </div>
            <ul class="late" style="padding-left: 0;">
                <li class="pt"><h4>Late Complications</h4></li>
                <li class="pt">
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
							<input type="checkbox" class="form-check-input" value="Yes" name="postdural_puncture">Post-dural puncture headache (PDPH)
                        </label>
                    </div><!--check1-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="backache_epidural">
							<input type="checkbox" class="form-check-input" value="Yes" name="backache_epidural">Backache at epidural site
                        </label>   
                    </div><!--check2-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="perst_motor">
							<input type="checkbox" class="form-check-input" value="Yes" name="perst_motor">Persistent motor deficit
                        </label> 
                    </div><!--check3-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="perst_sensory">
							<input type="checkbox" class="form-check-input" value="Yes" name="perst_sensory">Persistent sensory deficit
                        </label>
                    </div><!--check4-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="asep_meningi">
							<input type="checkbox" class="form-check-input" value="Yes" name="asep_meningi">Aseptic meningitis
                        </label>
                    </div><!--check5-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="bacterial_meningi">
							<input type="checkbox" class="form-check-input" value="Yes" name="bacterial_meningi">Bacterial meningitis
                        </label>
                    </div><!--check6-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="epidural_abs">
							<input type="checkbox" class="form-check-input" value="Yes" name="epidural_abs">Epidural abscess
                        </label>  
                    </div><!--check7-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="perm_neuro_compli">
							<input type="checkbox" class="form-check-input" value="Yes" name="perm_neuro_compli">Permanent Neurological Complication
                        </label>   
                    </div><!--check8-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="catheter">
							<input type="checkbox" class="form-check-input" value="Yes" name="catheter">Catheter related issues (same as PNB)
                        </label>
                    </div><!--check9-->
                    <div class="form-check" style="display:flex;">
                        <label class="form-check-label" style="width:40%;">
                            <input type="hidden" class="form-check-input" value="No" name="epidural_haema">
							<input type="checkbox" class="form-check-input" value="Yes" name="epidural_haema">Epidural Haematoma
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
            <h5 class="pt"><b>Select Follow up Procedure</b></h5>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Direct Interview" name="optradio">Direct Interview
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Telephone" name="optradio">Telephone
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="Notes" name="optradio">Notes
                        </label>
                    </div>
                </div>
                <div class="col-sm-6"></div>
            </div><!--row-->
            <div class="row">
                <div class="col-sm-9"></div>
                <div class="col-sm-3">
                    <button type="submit" class="btn-save">Save</button>
                    <!-- <button type="button" class="btn-close">Reset</button> -->
                </div>
            </div><!--row-->
        </form>
    </section><!--add-follow-up-->
    
</div><!---Tab-6--->
<!-----------------------------------FOLLOW UP END----------------------------->
<script type="text/javascript">
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
            $('.item_list').hide();
        }else{
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
        mode+=      '<div class="followup-box day_add'+j+'" style="display:none;">';
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
    //     alert(key);

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
$(document).ready(function(){
    $('#add-followup').submit(function(e){
		e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type : "POST",
            url : '<?php  echo base_url("followUp/add_follow")?>',
            data : formData,
            contentType: false,
            processData: false,
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){
                    toastr["success"](response.message);
                    $('#add-followup')[0].reset();  
                    window.location = '<?php echo base_url("FollowupDetails")?>?id='+response.msg;     
                }
                else
                    toastr["error"](response.message);
            }
        });
    });
});
</script>
<?php
    echo view('includes/footer');    
?>
