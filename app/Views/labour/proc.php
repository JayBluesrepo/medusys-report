<?php
    echo view('includes/header-labour',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>
	<!-------------------------------------------PROCEDURE START----------------------->
<br><h4><b>Please select the procedure done on the patient to enter details.</b></h4>
<div role="tabpanel" class="tab-pane" id="messages">

    <?php if($preo['cnb']  == 'Yes') {?>
        <div class="procedure-buttons">
            <div class="row">
                <a href="<?php echo base_url('labour/combinedSpinalEpidural'); ?>" class="btn-procedure" id="a">Combined Spinal Epidural</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('labour/Epidural'); ?>" class="btn-procedure" id="b"> Epidural</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('labour/Spinal'); ?>" class="btn-procedure" id="c">Spinal</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('labour/CSA_add'); ?>" class="btn-procedure" id="d">CSA - Continous Spinal Anaesthesia</a>
            </div>
        </div><!--procedure-buttons-->
    <?php } else{?>
        <div class="procedure-buttons">
            <div class="row">
                <a href="<?php echo base_url('labour/combinedSpinalEpidural'); ?>" class="btn-procedure zx" id="a">Combined Spinal Epidural</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('labour/Epidural'); ?>" class="btn-procedure zx" id="b"> Epidural</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('labour/Spinal'); ?>" class="btn-procedure zx" id="c">Spinal</a>
            </div>
            <div class="row pt">
                <a href="<?php echo base_url('labour/CSA_add'); ?>" class="btn-procedure zx" id="d">CSA - Continous Spinal Anaesthesia</a>
            </div>
        </div><!--procedure-buttons-->

        <h5 style="color:red;"><b>Since Central Neuraxial Block hasn't choosen in type of Labour Analgesia in Pre-procedure. So, there is no data to enter here</b></h5>
    <?php } ?>
   

        <!---------------------------------modal-spinal-------------------------->
</div><!--Tab4-->
<!----------------------------------------PROCEDURE END---------------------------->
<script>
    $(".zx").removeAttr("href");   
    // $(".zx").css({'color': '#000!important','background-color': 'lightgrey!important'});   
    $('.zx').addClass('btn-procedure1');

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

<script src="<?php echo base_url('public/assets/js/bootstrap-datetimepicker.min.js'); ?>"></script>

<script type="text/javascript">
    var today = new Date();
    var minDate = today.setDate(today.getDate());

    $('#datePicker5').datetimepicker({
    useCurrent: false,
    format: "DD/MM/YYYY",
    minDate: minDate
    });

    var firstOpen = true;
    var time;

    $('#timePicker5').datetimepicker({useCurrent: false,format: "hh:mm A"}).on('dp.show', function() {
    if(firstOpen) {
        time = moment().startOf('day');
        firstOpen = false;
    } else {
        time = "01:00 PM"
    }
    
    $(this).data('DateTimePicker').date(time);
    });
</script>


<?php
    echo view('includes/footer-labour');    
?>