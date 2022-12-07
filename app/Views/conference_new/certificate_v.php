<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title></title>
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,400;0,500;1,300&family=Updock&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" ></script>
</head>
<body>
<div id="editor"></div>
<div class=" col-sm-4"><button onclick="generate()" >Export PDF</button></div>

	<section class="cert-container" id = "pdf">
		<div id="content2" class="cert">
			<img src="<?php echo base_url('images/certificate/'.'bg-new.png'); ?>" style="height: 700px;">
			<div class="cert-content">
				<div class="header-logo_s">
					
					<div class="logo-1">
						<?php
						if($certificate['logo1'] != ''){
						?>
						<img src="<?php echo base_url('images/certificate/'.$certificate['logo1']); ?>"><?php
						}
						?>
					</div>
					
					<div class="logo-2">
						<img src="<?php echo base_url('images/certificate/'.$certificate['logo2']);?>">
					</div>
					<div class="logo-3">
						<img src="<?php echo base_url('images/certificate/'.$certificate['logo3']); ?>">
					</div>
				</div>
				<div class="" style="padding-left:25%;margin-top: -1%;text-align:center;">
					<P style="margin-bottom:-10px;font-size: 25px;">CERTIFICATE OF ATTENDANCE</P>
					<p style="margin: 20px 0;">IS HEREBY GRANTED TO</p>
					<!-- <p class="mt-0"></p> -->
					<h2 style="margin-top:-15px;font-size: 30px;">DR. <?php echo strtoupper($user_details['f_name']." ".$user_details['l_name']); ?></h2>
					<p style="margin-top:-10px;">ATTENDED <b> <?php echo "'".strtoupper($val['title'])."'";?></b></p>
					<p style="margin-top:-5px;">
			     <?php
                            if($val['date_from'] == $val['date_to']){
                                ?>
                                    <p><?php echo date('F j, Y',strtotime($val['date_from'])); ?></p>
                                <?php
                            }
                            else{
                                ?>
                                    <p><?php echo date('F j, Y',strtotime($val['date_from'])). '  To '.date('F j, Y',strtotime($val['date_to']));?></p>

                                <?php
                            }
                        ?></p>
					<p style="margin-top:-5px;font-size: 15px;"><?php echo $certificate['accredited_by'] ?></p>
				</div>
				<div class="bottom">
					<div class="bottom-1">
						<p style="margin-bottom:0;width:180px;margin-top: 50%;">Issued On <?php echo date("jS  F Y"); ?></p>
						<!-- <p>Date</p> -->
					</div>
					<div class="bottom-1">
						<img src="<?php echo base_url('images/certificate/'.$certificate['signature1']);?>" style="width:100px;">
						<p style="font-size: 13px;width: 175px;"><?php echo $certificate['sign1']; ?></p> 
					</div>
					<div class="bottom-1">
						<img src="<?php echo base_url('images/certificate/'.$certificate['signature2']);?>" style="width:100px;height: 75px;">
						<p style="font-size: 13px;width: 175px;"><?php echo $certificate['sign2']; ?></p> 
					</div>
				</div>
				<div class="footer">
					<img src="<?php echo base_url('images/certificate/'.'footer-logo.png');?>" style="width:75%;">
				</div>
			</div>
		</div>
	</section>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script type="text/javascript" src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

<script>
function generate(){

	var element = document.getElementById('pdf');
     var opt = {
     			filename:     'Certificate.pdf',
             	jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
           };
        
        // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
         html2pdf().set(opt).from(element).save();
        // html2pdf().from(element).save();
}
</script>

<script>
    $( document ).ready(function() {
		//generate();
	});
 </script>

<style type="text/css">
	.cert-container{
	   /* margin: 65px 0 10px 0;*/
	   /* width: 100%;*/
	   width: 95%;
	    display: flex;
	    justify-content: center;
	    font-family: 'Roboto', sans-serif;
	}
	.cert{
	    width: 1000px;
	    height: 650px;
	  /*  padding: 15px 20px;*/
	    text-align: center;
	    position: relative;
	   /* z-index: -1;*/
	}
	.cert-content {
	    width: 750px;
	    height: 470px;
	   /* padding: 70px 60px 0px 60px;*/
	    text-align: center;
	    position: absolute;
	   	top: 0px;
    	left: 60px;
	}
	.header-logo_s{
		display: flex;
		margin-left:27%;
	}
	.logo-1{
		width: 33%;
	}
	.logo-2{
		width: 33%;
	}
	.logo-3{
		width: 33%;
	}
	.header-logo_s img{
		width:150px;
	}
	.mb-0{
		margin-bottom: 0;
	}
	.mt-0{
		margin-top: 0;
	}
	.bottom{
		display: flex;
		justify-content: space-between;
		padding-top: 3%;
	}
	.footer{
		float: left;
		margin-top:3%;
	}
</style>