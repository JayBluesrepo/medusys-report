<?php
    echo view('includes/header-labour',$patient, $allcheck, $old_check);    

?>
    <div class="text_list" id="labour-txt">
        <h2>Please Select Patient From List</h2>
    </div>
<script>
    $(document).ready(function(){
        $('.home-right').hide();  
    });
</script>

<style>
    .text_list{
        text-align:center;
        padding-top:25%;
    }
</style>

<?php
    echo view('includes/footer-labour',$patient); 

?>