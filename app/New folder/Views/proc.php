<?php
    echo view('includes/header',$patient, $procs, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus);    
?>
	<!-------------------------------------------PROCEDURE START----------------------->
<div role="tabpanel" class="tab-pane" id="messages">
    <div class="procedure-buttons">
        <div class="row">
            <a href="<?php echo base_url('combinedSpinalEpidural'); ?>" class="btn-procedure">Combined Spinal Epidural</a><i class="fa fa-check-circle-o" aria-hidden="true" id="cse" style="color:green;margin-left:5px;"></i>
        </div>
        <div class="row pt">
            <a href="<?php echo base_url('Epidural'); ?>" class="btn-procedure"> Epidural</a><i class="fa fa-check-circle-o" aria-hidden="true" id="epi" style="color:green;margin-left:5px;"></i>
        </div>
        <div class="row pt">
            <a href="<?php echo base_url('Spinal'); ?>" class="btn-procedure">Spinal</a><i class="fa fa-check-circle-o" aria-hidden="true" id="spin" style="color:green;margin-left:5px;"></i>
        </div>
        <div class="row pt">
            <a href="<?php echo base_url('CSA_add'); ?>" class="btn-procedure">CSA - Continous Spinal Anaesthesia</a><i class="fa fa-check-circle-o" aria-hidden="true" id="csa" style="color:green;margin-left:5px;"></i>
        </div>
    </div><!--procedure-buttons-->

        <!---------------------------------modal-spinal-------------------------->
</div><!--Tab4-->
<!----------------------------------------PROCEDURE END---------------------------->
<script>
    var epid = '<?php echo $epid; ?>';
    if(epid == ''){ 
        $('#epi').hide();
    }
    var spin = '<?php echo $spin; ?>';
    if(spin == ''){ 
        $('#spin').hide();
    }
    var cse = '<?php echo $cse; ?>';
    if(cse == ''){ 
        $('#cse').hide();
    }
    var csa = '<?php echo $csa; ?>';
    if(csa == ''){ 
        $('#csa').hide();
    }
</script>
<?php
    echo view('includes/footer');    
?>