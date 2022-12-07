<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
	<!-------------------------------------------PROCEDURE START----------------------->
<br><h4><b>Please select the procedure done on the patient to enter details.</b></h4>
<div role="tabpanel" class="tab-pane" id="messages">
    <div class="procedure-buttons">
        <div class="row">
            <a href="<?php echo base_url('cnb/combinedSpinalEpidural'); ?>" class="btn-procedure" id="a">Combined Spinal Epidural</a>
        </div>
        <div class="row pt">
            <a href="<?php echo base_url('cnb/Epidural'); ?>" class="btn-procedure" id="b"> Epidural</a>
        </div>
        <div class="row pt">
            <a href="<?php echo base_url('cnb/Spinal'); ?>" class="btn-procedure" id="c">Spinal</a>
        </div>
        <div class="row pt">
            <a href="<?php echo base_url('cnb/CSA_add'); ?>" class="btn-procedure" id="d">CSA - Continous Spinal Anaesthesia</a>
        </div>
    </div><!--procedure-buttons-->

        <!---------------------------------modal-spinal-------------------------->
</div><!--Tab4-->
<!----------------------------------------PROCEDURE END---------------------------->
<script>
    var epid = '<?php echo $epid['dr_id']; ?>';
    if(epid != ''){ 
        $('#epi').hide();
        // $('#epi'). prop('disabled', true); 
        $("#d").removeAttr("href");       
        $( "#d" ).removeClass('btn-procedure');
        $( "#d" ).addClass('btn-procedure1');

        $("#c").removeAttr("href");       
        $( "#c" ).removeClass('btn-procedure');
        $( "#c" ).addClass('btn-procedure1');

        $("#a").removeAttr("href");       
        $( "#a" ).removeClass('btn-procedure');
        $( "#a" ).addClass('btn-procedure1');
    }

    var spin = '<?php echo $spin['dr_id']; ?>';
    if(spin != ''){ 
        // $('#spin').hide();
        $("#d").removeAttr("href");       
        $( "#d" ).removeClass('btn-procedure');
        $( "#d" ).addClass('btn-procedure1');

        $("#b").removeAttr("href");       
        $( "#b" ).removeClass('btn-procedure');
        $( "#b" ).addClass('btn-procedure1');

        $("#a").removeAttr("href");       
        $( "#a" ).removeClass('btn-procedure');
        $( "#a" ).addClass('btn-procedure1');
    }

    var cse = '<?php echo $cse['dr_id']; ?>';
    if(cse != ''){ 
        // $('#cse').hide();
        $("#d").removeAttr("href");       
        $( "#d" ).removeClass('btn-procedure');
        $( "#d" ).addClass('btn-procedure1');

        $("#b").removeAttr("href");       
        $( "#b" ).removeClass('btn-procedure');
        $( "#b" ).addClass('btn-procedure1');

        $("#c").removeAttr("href");       
        $( "#c" ).removeClass('btn-procedure');
        $( "#c" ).addClass('btn-procedure1');
    }

    var csa = '<?php echo $csa['dr_id']; ?>';   
    if(csa != '' ){ 
        // $('#csa').hide();
        $("#a").removeAttr("href");       
        $( "#a" ).removeClass('btn-procedure');
        $( "#a" ).addClass('btn-procedure1');

        $("#b").removeAttr("href");       
        $( "#b" ).removeClass('btn-procedure');
        $( "#b" ).addClass('btn-procedure1');

        $("#c").removeAttr("href");       
        $( "#c" ).removeClass('btn-procedure');
        $( "#c" ).addClass('btn-procedure1');
     
    }
</script>
<?php
    echo view('includes/footer');    
?>