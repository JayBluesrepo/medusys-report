<?php
    echo view('includes/header-obstetric',$patient , $eco, $preo, $posto, $follo, $proccheck, $feedcheck, $ecocheck, $focus, $allcheck, $old_check, $old_check);    
?>

<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6" style="padding-top: 10%;">
        <img src="<?php echo base_url('public/assets/images/email-img.png'); ?>" class="img-fluid d-block mx-auto">
    </div>
    <div class="col-sm-3"></div>
</div>

<?php
    echo view('includes/footer-obstetric');    
?>