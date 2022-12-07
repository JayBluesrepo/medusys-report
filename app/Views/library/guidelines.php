<?php
    echo view('includes/flow-header');    
?>

<section class="guidelines">
    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left">
                <ul>
                    <li><a href=""><?php echo $subpart[0]['fields']; ?></a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('e-library'); ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="guide-right">
                <div class="row bt">
                    <div class="col-sm-3 p-0">
                        <h3><?php echo $subpart[0]['fields']; ?></h3>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 pb-3">
                        <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                        <input type="text" class="form-control" name="" onkeyup="search(<?php echo $subpart[0]['field_names']; ?>)" id="search" placeholder="Search">
                    </div>
                </div>

                <div id="search_field1">


                </div>
                
                
                <div class="row" id="search_field">

                    <?php 
                        foreach($subpart as $key=>$val){
                    ?>

                        <div class="col-sm-5" style="margin-top:25px;">
                            <a  onclick="suboption(<?php echo $val['id']; ?>)" style="cursor:pointer;">
                                <div class="e-lib-box">
                                    <div class="e-lib-img">
                                            <!-- <img src="<?php //echo base_url('assets/images/e-lib-icon-1.png');?>"> -->
                                    </div>
                                    <div class="e-lib-cont">
                                        <p><?php echo $val['category_name']; ?></p>
                                    </div> 
                                </div>
                            </a>
                        </div>
                        <!-- <div class="col-sm-2"></div> -->


                    <?php 
                        }
                    ?>                  
                </div><!--row-->
               
            </div>
        </div>
    </div>
</section>


<script>

    // console.log(<?php //print_r($subpart); ?>);

    // <div class="col-sm-5" style="margin-top:25px;"><a  onclick="suboption('+response[i].id+')" style="cursor:pointer;"><div class="e-lib-box"><div class="e-lib-img"></div><div class="e-lib-cont"><p>'+response[i].category_name+'</p></div></div></a></div>

    function search(key){
        var field = $('#search').val();
        var id = key;
        // alert(id);
        if(field == ''){
            $('#search_field').show();           
            $('#search_field1').hide();
        }else{
            $('#search_field').hide();           
            $('#search_field1').show();

            $.ajax({
                type : "POST",
                url : '<?php echo base_url('search-details') ?>',
                data : {field:field,id:id},
                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    $('#search_field1').empty();
                    for(var i=0; i<response.length; i++){
                        // console.log(response[i]);
                        mode1 +=    '<div class="search-result">';
                        mode1 +=         '<div class="row">';
                        mode1 +=              '<div class="col-sm-10">';
                        mode1 +=                    '<div class="search-box">';
                        mode1 +=                         '<h4>'+response[i].fields+' <span>- '+response[i].category_name+'</span></h4>';
                        if(response[i].link){
                        mode1 +=                         '<p>'+response[i].name+'<span class="e-lib-icon"><i class="fa fa-eye" onclick="viewFile(\''+response[i].files+'\',\''+response[i].link+'\')"></i></span></p>';

                        }else{
                        mode1 +=                         '<p>'+response[i].name+'<span class="e-lib-icon"><i class="fa fa-download" aria-hidden="true" style="display:none;" onclick="downloadFile(\''+response[i].files+'\',\''+response[i].link+'\')"></i><i class="fa fa-eye" onclick="viewFile(\''+response[i].files+'\',\''+response[i].link+'\')"></i></span></p>';

                        }
                        mode1 +=                     '</div>';
                        mode1 +=              '</div>';
                        mode1 +=                 '<div class="col-sm-2">';
                        mode1 +=                 '</div>';
                        mode1 +=         '</div>';
                        mode1 +=     '</div>';
                    }
                    $('#search_field1').append(mode1);
                }
            });
        }
        
    }

    function suboption(key){
        var id = key;
        // alert(id);

        $.ajax({
            type : "POST",
            url : '<?php echo base_url('find-details') ?>',
            data : {id:id},
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){ 
                    // toastr["success"](response.message); 
                    window.location = '<?php echo base_url("sub-categories-type")?>?id='+id;
                }else{
                    toastr["error"](response.message); 
                }
            }
        });
         
    }

    function viewFile(key,key1){
        var files = key;
        var links = key1;

        if(files == ''){
            window.open(links);
        }else{
            
            window.open("<?php echo base_url('') ?>/public/uploads/"+files);
        }   
       
    }

    function downloadFile(e){
        var files = e;
       
        var filePath = '<?php echo base_url('uploads') ?>/'+files;
        var link = document.createElement('a');
        link.href = filePath;
        link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
        link.click();
        
    }

</script>

<?php
    echo view('includes/flow-footer1');    
?>
