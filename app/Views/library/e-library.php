<?php
    echo view('includes/flow-header');    
?>

<section class="spec-main">
    <div class="row">
        <div class="col-sm-3">
             <div class="spec-left">
                 <ul>
                    <li><a href="">e-Library</a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url("Mels-Cme")?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="guide-right">
                <div class="row bt">
                    <div class="col-sm-3 p-0" style="margin-top:10px;">
                        <h3>e-Library</h3>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 mt-3 mb-4">
                        <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                        <input type="text" class="form-control" name="" id="search" placeholder="Search" onkeyup="search()">
                    </div>
                    
                </div>
                <div class="e-lib-right" id="e_library_search1">

                </div>
                <div class="e-lib-right" id="e_library_search">

                    <div class="row" style="margin-top:-50px;">

                        <?php 
                            foreach($section as $key=>$val){
                        ?>

                        <div class="col-sm-5 mt-5">
                            <a  onclick="subcategories(<?php echo $val['id']; ?>)" style="cursor:pointer;">
                                <div class="e-lib-box">
                                <div class="e-lib-img">
                                        <!-- <img src="<?php echo base_url('assets/images/e-lib-icon-1.png');?>"> -->
                                </div>
                                <div class="e-lib-cont">
                                    <p><?php echo $val['master_name']; ?></p>
                                </div> 
                                </div>
                            </a>
                        </div>

                        <?php
                            }
                        ?>
                        
                    </div>
                    
                    <!-- <div class="row">
                        <div class="col-sm-5">
                            <a  onclick="subcategories(1)" style="cursor:pointer;">
                                <div class="e-lib-box">
                                <div class="e-lib-img">
                                        <img src="<?php echo base_url('assets/images/e-lib-icon-1.png');?>">
                                </div>
                                <div class="e-lib-cont">
                                    <p>Guidelines</p>
                                </div> 
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-5">
                            <a onclick="subcategories(2)" style="cursor:pointer;">
                                <div class="e-lib-box">
                                <div class="e-lib-img">
                                        <img src="<?php echo base_url('assets/images/e-lib-icon-2.png');?>">
                                </div>
                                <div class="e-lib-cont">
                                    <p>Treatment Algorithms</p>
                                </div> 
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-2"></div>
                    </div> -->
                    
                
                </div>
            </div>
        </div>
    </div>
</section>


<script>

    function subcategories(key){
       
        var id = key;
        // alert(value);
        // window.location = '<?php echo base_url("Types-Of-Categories")?>?id='+id;  
        $.ajax({
            type : "POST",
            url : '<?php echo base_url('find-sub-categories') ?>',
            data : {id:id},
            success:function(response){
                response = jQuery.parseJSON(response);
                if(response.result==1){ 
                    // toastr["success"](response.message); 
                    window.location = '<?php echo base_url("Types-Of-Categories")?>?id='+id; 
                }else{
                    toastr["error"](response.message); 
                }
            }
        });       
    }

    // mode1 += '<div class="search-result"><div class="row"><div class="col-sm-10"><a onclick="suboption('+response[i].id+')" style="cursor:pointer;"><div class="search-box"><h4>'+response[i].fields+' <span>- '+response[i].category_name+'</span></h4><p>'+response[i].files+'</p></div></a></div><div class="col-sm-2"></div></div></div>';

	function search(){
        var field_input = $('#search').val();
        if(field_input == ''){
            $('#e_library_search').show();           
            $('#e_library_search1').hide();

        }else{
            $('#e_library_search').hide();
            $('#e_library_search1').show();

            $.ajax({
                type : "POST",
                url : '<?php echo base_url('search-all-details') ?>',
                data : {field_input:field_input},
                success:function(response){
                    response=jQuery.parseJSON(response);
                    var mode1='';
                    $('#e_library_search1').empty();
                    for(var i=0; i<response.length; i++){
                        console.log(response[i]);
                        
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
                    $('#e_library_search1').append(mode1);
                }
            });
        }
        
    }

    function viewFile(key,key1){
        var files = key;
        var links = key1;

        if(files == ''){
            window.open(links);
        }else{
            window.open("<?php echo base_url('uploads') ?>/"+files);
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
    // function suboption(key){
    //     var id = key;
    //     // alert(id);

    //     $.ajax({
    //         type : "POST",
    //         url : '<?php echo base_url('find-details') ?>',
    //         data : {id:id},
    //         success:function(response){
    //             response = jQuery.parseJSON(response);
    //             if(response.result==1){ 
    //                 // toastr["success"](response.message); 
    //                 window.location = '<?php echo base_url("sub-categories-type")?>?id='+id;
    //             }else{
    //                 toastr["error"](response.message); 
    //             }
    //         }
    //     });
        
    // }

</script>


<?php
    echo view('includes/flow-footer1');    
?>
