<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.min.css');?>"/>
    	<!------------------------------JS-------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body><br>
    <div class="row">
       <div class="col-sm-9"></div>
       <div class="col-sm-3"> <button type="button" class="btn-close btn-primary" onclick="generatePDF()" >PDF download</button></div>
    </div>
<section class="edit-feedback" id="view-id">
    <h3>E-Feedback View</h3>
    <h5><b>During or after the procedure,did you experience</b></h5>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Drowsiness</td>
                        <td><?php echo $info['drowsiness']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Pain at the Site of Surgery</td>
                        <td><?php echo $info['pain_at_surgery']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Thirst</td>
                        <td><?php echo $info['thirst']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Hoarseness</td>
                        <td><?php echo $info['hoarseness']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Sore Throat</td>
                        <td><?php echo $info['sore_throat']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Nausea or vomiting</td>
                        <td><?php echo $info['nausea_vomiting']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Feeling Cold</td>
                        <td><?php echo $info['feeling_cold']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Confusion or disorientation</td>
                        <td><?php echo $info['confusion_disorientation']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Backpain(pain at the site of the anaesthetic injection)</td>
                        <td><?php echo $info['backpain']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Shivering</td>
                        <td><?php echo $info['shivering']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <h5 class="pt"><b>Satisfaction with Anaesthesia care</b></h5>
    <div class="pat-table2">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td class="bg-pat2">Did you had pain before surgery ?</td>
                        <td><?php echo $info['pain_before_surgery']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">Was your anaesthetist involved in managing your pain before surgery ?</td>
                        <td><?php echo $info['anaesthesist_involved']; ?></td>
                    </tr>
                    <tr>
                        <td class="bg-pat2">How well was it managed ?</td>
                        <td><?php echo $info['well_managed']; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!--pat-table2-->
    <div class="questions">
        <div class="card">
            <div class="card-header">
                <h5>Did you feel you had time to ask your anaesthetist,questions before your surgery?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['anaesthesist_time']; ?></p>
            </div>
        </div><!--card-->
        <div class="card">
            <div class="card-header">
                <h5>How satisfied were you with the information on Regional anaesthesia provided by your anaesthetist?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['regional_anaesthesia_info']; ?></p>
            </div>
        </div><!--card-->
        <div class="html2pdf__page-break"></div>
        <div class="card">
            <div class="card-header">
                <h5>How satisfied were you from anaesthesia ?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['anaesthesia_satisfaction']; ?></p>
            </div>
        </div><!--card-->
        <div class="card">
            <div class="card-header">
                <h5>How satisfied have you been with pain theraphy after surgery ?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['pain_therapy_satisfaction']; ?></p>
            </div>
        </div><!--card-->
        <div class="card">
            <div class="card-header">
                <h5>How satisfied were you with treatment of nausea and vomiting after the operation ?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['nausea_vomit_satisfaction']; ?></p>
            </div>
        </div><!--card-->
        <div class="html2pdf__page-break"></div>
        <div class="card">
            <div class="card-header">
                <h5>To what degree after the operation,did numbness or heaviness of the anaesthetised limb or body part bother you?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['numbness_limb_bothering']; ?></p>
            </div>
        </div><!--card-->
        <div class="card">
            <div class="card-header">
                <h5>When the numbness/heaviness related to the regional anaesthesia wore off,how much pain did you experience?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['numbness_pain_experience']; ?></p>
            </div>
        </div><!--card-->
        <div class="card">
            <div class="card-header">
                <h5>Were you to require a similar operation again,would you be happy to have the same type of regional anaesthetic again?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['similar_op_again']; ?></p>
            </div>
        </div><!--card-->
        <div class="html2pdf__page-break"></div>
        <div class="card">
            <div class="card-header">
                <h5>Overall satisfaction score(1:Least satisfied to 10:most satisfied)</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['overall_satisfaction']; ?></p>
            </div>
        </div><!--card-->
        <div class="card">
            <div class="card-header">
                <h5>Is there any suggestion you would like to make to improve the quality of anaesthesia care ?</h5>
            </div>
            <div class="card-body">
                <p><?php echo $info['any_suggestions']; ?></p>
            </div>
        </div><!--card-->
    </div><!--questions-->
</section><!--edit-feedback-->
</body>
</html>
<script>
    function generatePDF(){
        const PDF = document.getElementById("view-id");
        var opt = {
            margin:       1,
            filename:     'e-feedbackview.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 3 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'landscape' }
        };
        html2pdf().from(PDF).set(opt).save();
    }
</script>
<style>
 .edit-feedback{
     width:900px;
     margin: 0 auto;
 }  
   .pat-table2 {
    box-shadow: 0px 0px 3px lightgrey;
    margin-top: 15px;
}
.bg-pat2 {
    background-color: #D7F0FF;
    width: 40%;
}
.card-header {
    background-color: #D6EFFE!important;
}
.card {
    background: #FFF none repeat scroll 0% 0%;
    box-shadow: 0px 1px 3px rgb(0 0 0 / 30%);
    margin-bottom: 30px;
}
.edit-feedback h3{
    font-weight: 600;
    text-align: center;      
    padding-bottom: 8px;
    margin-bottom: 12px;
    position: relative;
}
.edit-feedback h3::after{
    position: absolute;
    content: '';
    border-bottom: 2px solid #379FFF;
    width: 250px;
    top: 35px;
    left: 0;
    right: 0;
    margin: 0 auto;
}
</style>