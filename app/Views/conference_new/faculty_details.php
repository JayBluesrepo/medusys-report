<?php
    echo view('includes/flow-header');    
?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/conference.css'); ?>">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,300;0,400;0,500;1,400&family=Montserrat&family=Ms+Madi&family=My+Soul&family=Open+Sans&family=Poppins:wght@200;400&family=Roboto:ital,wght@0,300;0,500;1,300&family=Updock&display=swap" rel="stylesheet">


<section class="faculty-flow">
    <div class="row">
        <div class="col-sm-3">
             <div class="conference-left">
                <ul>
                    <li><a href="">Conferences & Workshops</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('conference-workshops');?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="conference-right">
                 <div class="con-head">
                    <div class="row" id="conf-bt">
                        <div class="col-sm-5">
                            <div class="conf-left-text">
                                <h5>Conferences & Workshops</h5>
                            </div>
                        </div>
                        <!-- <div class="col-sm-7">
                            <input type="text" class="form-control" placeholder="search" name="">
                        </div> -->
                    </div><!----->
                 </div>
                 <div class="next d-sm-none">
                     <a href="<?php echo base_url('/Registration-Details?id='.$val['conference_id']); ?>">Next</a>
                 </div>
                <header class="cf pt-4">
                    <div class="navigation">
                        <nav>
                            <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span>Menu</span></a>
                           <ul class="mobimenu">
                                <li><a href="<?php echo base_url('/Conference-Details?id='.$val['conference_id']); ?>">About</a></li>
                                <li ><a href="<?php echo base_url('/Programs?id='.$val['conference_id']); ?>">Program Schedule</a></li>
                                <li class="conf-act"><a href="<?php echo base_url('/Faculty-Details?id='.$val['conference_id']); ?>">Faculty</a></li>
                                <li ><a href="<?php echo base_url('/Registration-Details?id='.$val['conference_id']); ?>">Registration</a></li>
                                <li ><a href="<?php echo base_url('/Attend-Conference?id='.$val['conference_id']); ?>">Attend</a></li>
                                <li><a href="<?php echo base_url('/Feedback?id='.$val['conference_id']); ?>">Feedback</a></li>
                                <li><a href="<?php echo base_url('/Certificate?id='.$val['conference_id']); ?>">Certificate</a></li> 
                            </ul>
                        </nav>
                    </div>
                </header>
            </div><!--conference-right--->
            <div class="container">
               
                     <div class="row pt-5">
                        <div class="col-sm-2" id="mobile-tag-confer">
                            <h4>Title</h4>
                                <h4>Date:</h4>
                        </div>
                        <div class="col-sm-10">
                            <h4><b><?php echo $val['title']; ?></b></h4>
			     <?php
                            if($val['date_from'] == $val['date_to']){
                                ?>
                                    <h4><b><?php echo date('F j, Y',strtotime($val['date_from'])); ?></b></h4>
                                <?php
                            }
                            else{
                                ?>
                                    <h4><b><?php echo date('F j, Y',strtotime($val['date_from'])). '  To '.date('F j, Y',strtotime($val['date_to']));?></b></h4>

                                <?php
                            }
                        ?>
                        </div>
                    </div><!--row-->
                      <div class="vertical-tabs">
                        <div class="row pt-5">
                            <div class="col-sm-4">
                                <h4>Click on the Faculty Name for details</h4>
                                <ul class="nav nav-tabs" role="tablist">
                                <?php 
                                $i = 1;
                                    foreach($speaker  as $s){
                                    if($i == 1){
                                        ?>
                                <li>
                                <button id = "<?php echo 'button'.$i; ?>" class="nav-link" onclick = "change_details('<?php echo $s['ps_id'] ?>',<?php echo $i ?>)"><?php echo $s['speaker']; ?>
                                </button>
                                </li>
                                <?php
                                    $i++;
                                }
                                else{        
                               ?>
                                <li>
                                <button id = "<?php echo 'button'.$i; ?>" class="nav-link" onclick = "change_details('<?php echo $s['ps_id'] ?>',<?php echo $i ?>)"><?php echo $s['speaker']; ?>
                                </button>
                                </li>
                                <input type = "hidden" id = "total_num" value = "<?php echo $i; ?>" name = "total_num"/>
                                <?php
                                    $i++;
                                    } 
                                
                                  }
                                ?>
                                
                                </ul>                            </div>
                            <div class="col-sm-8">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="pag1" role="tabpanel">
                         <?php
                        $j = 0; 
                        foreach($faculty  as $f){
                            if($j == 0){
                                $j++;
                            ?>
                              <div class="sv-tab-panel">
                                <p><b>Profile Picture</b></p>
                                <div>
                   
				    <img id = "profile" src="<?php echo base_url('images/faculty_profile/'.$f['profile_pic']); ?>" alt="PROFILE PIC" width="200" height="200">
                                </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>Name</td>
                                                    <td><p id = "name"><?php echo $f['name']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td>Present Designation</td>
                                                    <td><p id = "present_des" ><?php echo $f['present_des']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td>Qualifications </td>
                                                    <td><p id = "qualification" ><?php echo $f['qualification']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td>Special Interests</td>
                                                    <td><p id = "special_int"><?php echo $f['special_int']; ?></p></td>
                                                </tr>
                                                <tr>
                                                    <td>Publications</td>
                                                    <td><p id = "publication"><?php echo $f['publication']; ?></p></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                      </div>
                                      <?php
                                  }
                                  }
                                  ?>
                                    </div><!------1--->
                                    
                                    
                                    

                                    

                                    

                                    

                                  </div><!--tab-content-->
                            </div>
                        </div>
                    </div>
               
            </div>
        </div><!--col--9-->
    </div>
    
</section>

<script>
function change_details(id,selectedbutton){

    var total_num = $('#total_num').val(id);
    var i = 0;
    for(i = 1; i < total_num; i++){
        var button = "button"+i;
        var element = document.getElementById(button);
        element.classList.add("active");
        $('#add_form_div').show();

    }
        var button = "button"+selectedbutton;
        var element = document.getElementById(button);
        element.classList.remove("active"); 
        $('#add_form_div').show();

        
        $.ajax({

            type   : 'post',
            url    : '<?php echo base_url("get-facultly-details")?>',
            data   : { 'ps_id' : id },
                                  
            success:function(response){
                response = jQuery.parseJSON(response);
                // console.log(response.data);

                // console.log(response.data['ps_id']);
                if(response.result==1)
                {  
                 
                         // window.location.reload();
                    $('#name').html(response.data['name']);
                    $('#present_des').html(response.data['present_des']);
                    $('#qualification').html(response.data['qualification']);
                    $('#special_int').html(response.data['special_int']);
                    $('#publication').html(response.data['publication']);
                    $('#update_id').val('1');
                     $('#faculty_id').val(response.data['id']);

                    var edit_save = document.getElementById("profile");

                     edit_save.src = '/images/faculty_profile/'+response.data['profile_pic'];
                   
                        

                }
                else{
                    $('#name').html('');
                    $('#present_des').html('');
                    $('#qualification').html('');
                    $('#special_int').html('');
                    $('#publication').html('');
                    $('#update_id').val('');
                     $('#faculty_id').val('');

                    var edit_save = document.getElementById("profile");

                     edit_save.src = '';
                }

               
               
            }
        });
   }


</script>

<?php
    echo view('includes/flow-footer');    
?>