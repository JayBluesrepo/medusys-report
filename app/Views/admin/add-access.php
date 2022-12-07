<?php
    echo view('includes/admin-header', $add_access);    
?>

<!-- <section class="add-access">
    <div class="row"> -->
       <!--  <div class="col-sm-2" style="padding:0;">
             <div class="dashboard-left">
                <div class="menu-left">
                    <ul>
                        <li><a href="" class="active">Add Access</a></li> 
                    </ul>
                </div>
            </div>
        </div> --><!--col-2-->
        <div class="col-sm-10" style="padding:0;">
            <div class="add-user-right">
                <div class="row">
                    <div class="col-sm-5"></div>
                    <div class="col-sm-2">
                        <label style="font-weight: 600;"><b>Role</b></label>
                        <select class="form-control" name="role" id="role">
							<option value=''>Select</option>
                            <option value='1'>Organisation Admin</option>
                            <option value='2'>Modular Admin</option>
                            <option value='3'>Faculty</option>
						</select>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-2" id="add-user-right"><button type="button" onclick="goBack()"><i class="fa fa-arrow-left" aria-hidden="true"></i>Back</button></div>
                </div><!--row--><br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="list-users">
                            <div class="table-responsive">
                                <table class="table" id="access" style="display:none;">
                                    <tbody>
                                        <form id='mels-save'>
                                            <!-- <tr> -->
                                                <!-- <td> -->
                                                    <!-- <div class="form-check">
                                                        <label class="form-check-label">
                                                            Specialities<input type="checkbox" class="form-check-input" id="specialitys" onclick="specialities()" value="">
                                                        </label>
                                                    </div><br>
                                                    <div class="specialities">
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Anaesthesia and Acute pain management<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    ICU/Critical care<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Chronic Pain<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    General Medicine<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Cardiology<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Endocrinology<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    General Surgery<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Orthopaedics<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Obstetrics<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>    
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            Organization<input type="checkbox" class="form-check-input" id="organize" onclick="organization()" value="">
                                                        </label>
                                                    </div><br>
                                                    <div class="organization">
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    GAS<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>    
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            Patient Management System<input type="checkbox" class="form-check-input" id="patient_mgt_sm" onclick="pms()" value="">
                                                        </label>
                                                    </div><br>
                                                    <div class="pms">
                                                        <div class="col-sm-11">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    e-PHQ<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                Tele-health<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                e-Consent<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                e-PCOM(e-feedback)<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                e-Care<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>-->
                                            <tr>
                                                <!-- <td>    
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            Clinical Database<input type="checkbox" class="form-check-input" id="clinical_db" onclick="cd()" value="">
                                                        </label>
                                                    </div><br>
                                                    <div class="cd">
                                                        <div class="col-sm-11">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    PNB<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    CNB<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Labour & Obstetrics<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Anaesthesia Logbook<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    Reports & Analytics<input type="checkbox" class="form-check-input" value="">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>  -->
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="hidden" class="form-check-input" value="0" name="mels_cme">
                                                            MeLS-CME<input type="checkbox" class="form-check-input" id="mels_cme" onclick="cme()" name="mels_cme" value="1">
                                                        </label>
                                                    </div><br>
                                                    <div class="cme">
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="hidden" class="form-check-input" value="0" name="gas_forum">
                                                                    GAS Forum<input type="checkbox" class="form-check-input" name="gas_forum" value="1">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="hidden" class="form-check-input" value="0" name="gas_conference_workshop">
                                                                    GAS Conferences & Workshops<input type="checkbox" class="form-check-input" name="gas_conference_workshop" value="1">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="hidden" class="form-check-input" value="0" name="gas_e_library">
                                                                    GAS e-Library<input type="checkbox" class="form-check-input" name="gas_e_library" value="1">
                                                                </label>
                                                            </div><br>
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input type="hidden" class="form-check-input" value="0" name="gas_collaborate">
                                                                    GAS Collaborate<input type="checkbox" class="form-check-input" name="gas_collaborate" value="1">
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><button type="submit" class="btn">Submit</button></td>
                                            </tr>
                                        </form>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!--row-->
            </div>
        </div><!--col-10-->
  <!--   </div>
</section>
 -->
<script type="text/javascript">
	function goBack() {
		location.href = '<?php echo base_url("")?>';
	}
    $('#role').click(function(){ 
        if($(this).val() === '1'){
            $('#access').show();
        }
        if($(this).val() === '2'){
            $('#access').show();
        }
        if($(this).val() === '3'){
            $('#access').show();
        }
        if($(this).val() === ''){
            $('#access').hide();
        }
    }); 
    $(document).ready(function(){
        $('.pms').hide();
        $('.cd').hide();
        $('.cme').hide();
        $('.specialities').hide();
        $('.organization').hide();
    });
function pms(){
    var patient_mgt_sm = $('#patient_mgt_sm').is(':checked');
    if(!patient_mgt_sm){
        $('.pms').hide();
    }
    else{
        $('.pms').show();
    }
}
function cd(){
    var clinical_db = $('#clinical_db').is(':checked');
    if(!clinical_db){
        $('.cd').hide();
    }
    else{
        $('.cd').show();
    }
}
function cme(){
    var mels_cme = $('#mels_cme').is(':checked');
    if(!mels_cme){
        $('.cme').hide();
    }
    else{
        $('.cme').show();
    }
}
function specialities(){
    var specialitys = $('#specialitys').is(':checked');
    if(!specialitys){
        $('.specialities').hide();
    }
    else{
        $('.specialities').show();
    }
}
function organization(){
    var organize = $('#organize').is(':checked');
    if(!organize){
        $('.organization').hide();
    }
    else{
        $('.organization').show();
    }
}
</script>
<script type="text/javascript">
	$(document).ready(function(){	
		$('#mels-save').submit(function(e){  
			e.preventDefault();
            var role = $('#role').val();
			formdata = new FormData($(this)[0]);
            formdata.append('role_id',role);
			$.ajax({
				type   : 'post',
				url    : '<?php echo base_url("saveMels")?>',
				data   : formdata, 
				contentType: false,
				processData: false,
				success:function(response){
		  			console.log(response);
					response = jQuery.parseJSON(response);
					if(response.result==1){	 
						toastr["success"](response.message);
						$('#mels-save')[0].reset();
						window.setTimeout(function() {
							history.go(0);
						}, 1000);
					}
					else 
                    {    
                        toastr["error"](response.message);                                       
                    }
	  			}
			});
	   	});   
	});  
</script>
<?php
    echo view('includes/admin-footer');    
?>


<style type="text/css">
    
</style>