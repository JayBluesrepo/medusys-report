<?php
    echo view('includes/header-labour',$patient, $foll, $follcheck, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
<!-------------------------------FOLLOW UP DETAILS START--------------------------->
<section class="followup-details">
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
            <button type="button" class="btn-edit" data-toggle="modal" id="edi_follow">Edit</button>
            <!-- <button type="button" class="btn-close">Delete</button> -->
        </div>
    </div><!--row-->
    <h5><b>Duration of stay in hospital (days)</b></h5>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Duration of stay in hospital</td>
                        <td><?php echo $info['duration']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h5 class="pt"><b>Cumulative LA Consumption</b></h5>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                <?php
                    foreach($info1 as $key=>$val){
                        $kt = $key+1;
                ?>    
                        <tr>
                            <td class="bg-pat2" style="font-weight:bold;">Day <?php echo $kt; ?></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Ropivacaine</td>
                            <td><?php echo $val['la_ropivacaine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Bupivacaine</td>
                            <td><?php echo $val['la_bupivacaine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Levobupivacaine</td>
                            <td><?php echo $val['la_levobupivacaine']; ?></td>
                        </tr>
                        <tr>
                            <td class="bg-pat2">Lignocaine</td>
                            <td><?php echo $val['la_lignocaine']; ?></td>
                        </tr>
                <?php
                    }; 
                ?>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h5 class="pt"><b>Late complications</b></h5>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Post-Dural Puncture Headache (PDPH)</td>
                        <td><?php echo $info['postdural_puncture']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Backache at Epidural Site</td>
                        <td><?php echo $info['backache_epidural']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Persistent Motor Deficit <2 weeks</td>
                        <td><?php echo $info['perst_motor']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Persistent Sensory Deficit <2 weeks</td>
                        <td><?php echo $info['perst_sensory']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Aseptic Meningitis</td>
                        <td><?php echo $info['asep_meningi']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Bacterial Meningitis</td>
                        <td><?php echo $info['bacterial_meningi']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Epidural Abscess</td>
                        <td><?php echo $info['epidural_abs']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Permanent Neurological Complication</td>
                        <td><?php echo $info['perm_neuro_compli']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Catheter Related Issues</td>
                        <td><?php echo $info['catheter']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Epidural Haematoma</td>
                        <td><?php echo $info['epidural_haema']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2" style="font-weight:bold;">Others</td>
                    </tr>
                    <?php
                        $others = $info['others'];
                        if($others == 'Yes'){
                            $w = $info['other'];
                            $other = explode(",",$w);
                            foreach($other as $val){  
                    ?>
                        <tr>
                            <td class="bg-pat2" style="border:0;"><?php echo $val; ?></td>
                            <td style="border:0;">Yes</td>
                        </tr>
                    <?php
                            }
                        }else{
                    ?>
                        <tr>
                            <td class="bg-pat2">Other</td>
                            <td>No</td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h5 class="pt"><b>Follow up Procedure</b></h5>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Follow up Procedure</td>
                        <td><?php echo $info['followup_proc']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->							
</section>
<!--------------------------------EDIT-FOLLOW UP START---------------------------->
<section class="edit-followup">
    <!-- The Modal -->
    <div class="modal fade" id="follow-details">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header" id="add-header">
                    <h4 class="modal-title">Edit FollowUp</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
            
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="edit-followup">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $info['id']; ?>" required>
                        <div class="row">
                            <div class="col-sm-2"><label><b>Duration of stay in hospital (days)</b></label></div>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" name="duration" value="<?php echo $info['duration']; ?>">
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <label style="margin-bottom: 0;"><b>Cumulative LA Consumption</b></label>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="lac">
                                <div class="">
                                <?php
                                    foreach($info1 as $key=>$val){
                                    $kts = $key+1;
                                ?>      
                                        <div class="row3">
                                            <div class="form-check">
                                                <label class="form-check-label" id="proced-plus">
                                                <input type="checkbox" class="form-check-input day<?php echo $kts; ?>" value="" checked>Day <?php echo $kts; ?>
                                                <button type="button" class="btn remove<?php echo $kts; ?>"><i class="fa fa-times" aria-hidden="true"></i></button>
                                                </label>
                                            </div>
                                            <div class="followup-box day_add1<?php echo $kts; ?>">
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
                                                <input type="hidden" class="form-control" name="days[]" value="<?php echo $val['days']; ?>">
                                                <ul>
                                                    <li>Ropivacaine</li>
                                                    <li><input type="number" class="form-control" value="<?php echo $val['la_ropivacaine']; ?>" name="la_ropivacaine[]"></li>
                                                    <li><span>mg</span></li>
                                                </ul>
                                                <ul>
                                                    <li>Bupivacaine</li>
                                                    <li><input type="number" class="form-control" value="<?php echo $val['la_bupivacaine']; ?>" name="la_bupivacaine[]"></li>
                                                    <li><span>mg</span></li>
                                                </ul>
                                                <ul>
                                                    <li>Levobupivacaine</li>
                                                    <li><input type="number" class="form-control" value="<?php echo $val['la_levobupivacaine']; ?>" name="la_levobupivacaine[]"></li>
                                                    <li><span>mg</span></li>
                                                </ul>
                                                <ul>
                                                    <li>Lignocaine</li>
                                                    <li><input type="number" class="form-control" value="<?php echo $val['la_lignocaine']; ?>" name="la_lignocaine[]"></li>
                                                    <li><span>mg</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <script>
                                                var ss = '<?php echo $kts; ?>';
                                                var dyas = $('.day'+<?php echo $kts; ?>+'').is(':checked');
                                                if(dyas){
                                                    $('.day_add1'+<?php echo $kts; ?>).show();
                                                }
                                                $(".day"+<?php echo $kts; ?>+"").click(function(){ 
                                                    var dys = $('.day'+<?php echo $kts; ?>+'').is(':checked');
                                                    if(!dys){
                                                        $('.day_add1'+<?php echo $kts; ?>).hide();
                                                    }else{
                                                        $('.day_add1'+<?php echo $kts; ?>).show();
                                                    }
                                                });
                                                $(".remove"+<?php echo $kts; ?>+"").click(function(){
                                                    $(this).closest('.row3').remove();
                                                    // ss--;
                                                });
                                        </script> 
                                    <?php
                                        };
                                    ?>
                                </div>
                            </div>  
                        </div><!--row-->
                        <div id="proced-plus" style="margin-left:100px;">
                            <button type="button" class="btn add"><i class="fa fa-plus" aria-hidden="true"></i></button>
                        </div>
                        <ul class="late" style="padding-left: 0;padding-top: 20px;">
                            <li><label><b>Late Complications</b>
                            <div class="tooltip-23">
                               <i class="fa fa-info-circle" aria-hidden="true"></i>
                                <div class="right-23">
                                    <div class="text-content-23">
                                        <h6>All options need to be unchecked <br> to make selection No.</h6>
                                        <i></i>
                                    </div>
                                </div>
                            </div>    
                            </label></li>
                            <li>
                                <div class= "box_1" style="padding-top:15px;">
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
                                        <input type="checkbox" class="form-check-input" value="Yes" id="postdural_puncture" name="postdural_puncture">Post-Dural Puncture Headache (PDPH)
                                    </label>
                                </div><!--check1-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="backache_epidural">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="backache_epidural" name="backache_epidural">Backache at Epidural Site
                                    </label>   
                                </div><!--check2-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="perst_motor">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="perst_motor" name="perst_motor">Persistent Motor Deficit <2 weeks
                                    </label> 
                                </div><!--check3-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="perst_sensory">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="perst_sensory" name="perst_sensory">Persistent Sensory Deficit <2 weeks
                                    </label>
                                </div><!--check4-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="asep_meningi">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="asep_meningi" name="asep_meningi">Aseptic Meningitis
                                    </label>
                                </div><!--check5-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="bacterial_meningi">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="bacterial_meningi" name="bacterial_meningi">Bacterial Meningitis
                                    </label>
                                </div><!--check6-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="epidural_abs">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="epidural_abs" name="epidural_abs">Epidural Abscess
                                    </label>  
                                </div><!--check7-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="perm_neuro_compli">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="perm_neuro_compli" name="perm_neuro_compli">Permanent Neurological Complication
                                    </label>   
                                </div><!--check8-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="catheter">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="catheter" name="catheter">Catheter Related Issues
                                    </label>
                                </div><!--check9-->
                                <div class="form-check" style="display:flex;">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="epidural_haema">
                                        <input type="checkbox" class="form-check-input" value="Yes" id="epidural_haema" name="epidural_haema">Epidural Haematoma
                                    </label>
                                </div><!--check10-->
                                <div class="form-check">
                                    <label class="form-check-label" style="width:40%;">
                                        <input type="hidden" class="form-check-input" value="No" name="others">
                                        <input type="checkbox" class="form-check-input" value="Yes" name="others" id="oth" onclick="other1()">Other
                                    </label>
                                    <span class="plus1" id="proced-plus"><button type="button" class="btn add1" style="margin-left:-200px;"><i class="fa fa-plus" aria-hidden="true"></i></button></span>
                                    <div class="other1">
                                    <?php 
                                        $z = $info['other'];
                                        $k = explode(",",$z);
                                        foreach($k as $val){
                                    ?> 
                                            <div class="row1 pt">
                                                <div class="col-sm-6" id="proced-plus" style="display:flex;">
                                                    <input type="text" class="form-control" name="other[]" value="<?php echo $val; ?>"> <button type="button" class="btn remove11"><i class="fa fa-times" aria-hidden="true"></i></button>    
                                                </div>
                                                <div class="col-sm-6"></div>
                                            </div>
                                    <?php
                                        } 
                                    ?>
                                    </div><!--other1 ends-->
                                </div><!--check11-->
                            </div>
                        </div><!--row-->
                        <label><b>Follow up Procedure</b></label>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="Direct Interview" id="option-1" name="optradio">Direct Interview
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="Telephone" id="option-2" name="optradio">Telephone
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="Notes" id="option-3" name="optradio">Notes
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6"></div>
                        </div><!--row-->
                        <div class="row">
                            <div class="col-sm-7"></div>
                            <div class="col-sm-5">
                                <button type="submit" class="btn-save update">Update</button>
                                <button type="button" class="btn-close" id="clos">Close</button>
                            </div>
                        </div><!--row-->
                    </form>
                </div><!--modal-body-->
            </div><!--modal-content-->
        </div>
    </div>
</section><!--edit-followup-->
<!--------------------------------EDIT-FOLLOW UP END------------------------------>
<!-------------------------------FOLLOW UP DETAILS END--------------------------->
<script type="text/javascript">
    $("#clos").click(function(){
        $("#follow-details").modal("hide");
    });
$(document).ready(function(){
    $('.day_add1').hide();
    $('.item_list').hide();
    $('.other1').hide();
    var gq = "<?php echo $info['postdural_puncture']; ?>";
    var ccc = "<?php echo $info['backache_epidural']; ?>";
    var qqq = "<?php echo $info['perst_motor']; ?>";
    var vcs = "<?php echo $info['perst_sensory']; ?>";
    var qrq = "<?php echo $info['asep_meningi']; ?>";
    var mm = "<?php echo $info['bacterial_meningi']; ?>";
    var mu = "<?php echo $info['epidural_abs']; ?>";
    var qvc = "<?php echo $info['perm_neuro_compli']; ?>";
    var qtq = "<?php echo $info['catheter']; ?>";
    var gc = "<?php echo $info['epidural_haema']; ?>";
    var gs = "<?php echo $info['others']; ?>";
    if((gq == "Yes")||(ccc == "Yes")||(qqq == "Yes")||(vcs == "Yes")||(qrq == "Yes")||(mm == "Yes")||(mu == "Yes")||(qvc == "Yes")||(qtq == "Yes")||(gc == "Yes")||(gs == "Yes")){
        $('#compli').attr("checked",true);
        $('.item_list').show();
    }
    if(gq == "Yes"){
        $('#postdural_puncture').attr("checked",true);
    }
    if(ccc == "Yes"){
        $('#backache_epidural').attr("checked",true);
    }
    if(qqq == "Yes"){
        $('#perst_motor').attr("checked",true);
    }
    if(vcs == "Yes"){
        $('#perst_sensory').attr("checked",true);
    }
    if(qrq == "Yes"){
        $('#asep_meningi').attr("checked",true);
    }
    if(mm == "Yes"){
        $('#bacterial_meningi').attr("checked",true);
    }
    if(mu == "Yes"){
        $('#epidural_abs').attr("checked",true);
    }
    if(qvc == "Yes"){
        $('#perm_neuro_compli').attr("checked",true);
    }
    if(qtq == "Yes"){
        $('#catheter').attr("checked",true);
    }
    if(gc == "Yes"){
        $('#epidural_haema').attr("checked",true);
    }
    if(gs == "Yes"){
        $('#oth').attr("checked",true);
        $('.other1').show();
    }
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
    $(document).on('click','.remove11',function(){
        $(this).closest('.row1').remove();
    });
});
$("#cls").click(function(){
    $("#edit-followup").modal("hide");
});
var tt = "<?php echo $info['followup_proc']; ?>";
if(tt=="Direct Interview"){
    $('#option-1')[0].checked = true;
}else if(tt=="Telephone"){
    $('#option-2')[0].checked = true;
}else{
    $('#option-3')[0].checked = true;
}
$('#edi_follow').click(function(){
    $("#follow-details").modal("show");
}); 
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
                alert('Please remove Postdural Puncture..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(backache_epidural){
                alert('Please remove Backache Epidural..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(perst_motor){
                alert('Please remove Perst Motor..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(perst_sensory){
                alert('Please remove Perst Sensory..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(asep_meningi){
                alert('Please remove Asep Meningi..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(bacterial_meningi){
                alert('Please remove Bacterial Meningi..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(epidural_abs){
                alert('Please remove Epidural Abs..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(perm_neuro_compli){
                alert('Please remove Perm Neuro Compli..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(catheter){
                alert('Please remove Perm Catheter..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(epidural_haema){
                alert('Please remove Epidural Haema..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }
            else if(oth){
                alert('Please remove other..');
                $('#compli').attr("checked",true);
                document.getElementById("compli").checked = true;
            }

            else{
                $('.item_list').hide();
            }
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
// function daycheck(){
//     var day = $("#day1").is(':checked');
//     if(!day){
//         $('.day_add1').hide();
//     }else{
//         $('.day_add1').show();
//     }
// }
    
    var j = '<?php echo $kts; ?>';
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
        mode+=          '<label>LA &nbsp;&nbsp;<div class="tooltip-16"><i class="fa fa-info-circle" aria-hidden="true"></i><div class="right-16"><div class="text-content-16"><h6>mg=(Concentration*volume in ml*10)</h6><i></i></div></div></div></label>';
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
        });
        $(".days"+j+"").click(function(){
            var dya = $('.days'+j+'').is(':checked');
            if(dya){
                $('.day_add'+j).show();
            }
            else{
                $('.day_add'+j).hide();
            }      
        });
    });
</script>
<script type="text/javascript">
$('#edit-followup').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    $(".update").text("Updating...");
    $(".update").attr("disabled", true);
    $.ajax({
        type : "POST",
        url : '<?php  echo base_url("labour-editFollowup")?>',
        data : formData,
        contentType: false,
        processData: false,
        success:function(response){
            response = jQuery.parseJSON(response);
            if(response.result==1){
                toastr["success"](response.message);
                $("#edit-followup").modal("hide");
                $('.update').removeAttr("disabled");
                $(".update").text("Save");
                history.go(0); 
            }
            else{
                toastr["error"](response.message);
                $('.update').removeAttr("disabled");
                $(".update").text("Update");
            }
        }
    });
});
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