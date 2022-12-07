<?php
    echo view('includes/flow-header');    
?>

<!-- <section class="speciality-main">
        <div class="row">
            <div class="col-sm-2">
                <div class="speciality-left">
                    <ul>
                        <li><a href="">SPECIALITIES</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-10">
                <div class="speciality-right">
                    <div class="row">
                        <div class="box">
                            <a href="">
                                <div class="speciality-box" id="spec-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/Anaesthesia-2.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Anaesthesia and Acute pain management</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-2.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>ICU/Critical care</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-3.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Chronic Pain</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=""></div>
                    </div>
                    <div class="row pt">
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-4.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>General Medicine</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-5.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Cardiology</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-6.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Endocrinology</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=""></div>
                    </div>
                    <div class="row pt">
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-7.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>General Surgery</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-8.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Orthopaedics</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="box">
                            <a href="">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('assets/images/special-icon-9.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Obstetrics</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>      
</section>  --> 

<section class="spec-main">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left" style="">
                <ul>
                    <li><a href="">SPECIALITIES</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="spec-right">
                <div class="row" style="padding-top: 7%;padding-right: 5%;">
                    <div class="col-sm-4">
                        <div class="box-">
                             <a href="<?php echo base_url('User');?>">
                                 <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/Anaesthesia-2.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p style="color: #C32626;font-size:14px;">Anaesthesia and Acute pain management</p>
                                    </div>
                                </div>
                             </a>
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('ICU');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-2.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>ICU/Critical care</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col-sm-4">
                         <div class="box-">
                            <a href="<?php echo base_url('Chronic-Pain');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-3.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Chronic Pain</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 7%;padding-right: 5%;">
                    <div class="col-sm-4">
                        <div class="box-">
                             <a href="<?php echo base_url('General-Medicine');?>">
                                 <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-4.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>General Medicine</p>
                                    </div>
                                </div>
                             </a>
                        </div>
                    </div>
                     <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('cardiology');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-5.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Cardiology</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                     <div class="col-sm-4">
                         <div class="box-">
                            <a href="<?php echo base_url('endocrinology');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-6.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Endocrinology</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row" style="padding-top: 7%;padding-right: 5%;">
                    <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('General-Surgery');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-7.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>General Surgery</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('orthopaedics');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-8.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Orthopaedics</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box-">
                            <a href="<?php echo base_url('obstetrics');?>">
                                <div class="speciality-box">
                                    <div class="speciality-icon">
                                        <img src="<?php echo base_url('public/assets/images/special-icon-9.png');?>">
                                    </div>
                                    <div class="speciality-txt">
                                        <p>Obstetrics</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function acutepain(){
        
        location.href = '<?php echo base_url('User')?>';

    }
</script>

<?php
    echo view('includes/flow-footer');    
?>
