<?php
    echo view('includes/header',$patient, $allcheck, $old_check);    

?>
    <div class="text_list">
        <h2 class="select-pat-mobile">Please Select Patient From List</h2>
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
    echo view('includes/footer',$patient);    

?>