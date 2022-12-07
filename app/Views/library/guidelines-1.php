<?php
    echo view('includes/flow-header');    
?>




<section class="guidelines-inner">
    

    <div class="row">
        <div class="col-sm-3">
            <div class="spec-left">
                <ul>
                    <li><a href=""><?php echo $category_name['fields']; ?></a></li>
                </ul>
                <div class="go-back">
                    <a href="<?php echo base_url('Types-Of-Categories').'?id='.$subpart[0]['field_name']; ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i>Go Back</a>
                </div>
            </div>
        </div>
         <div class="col-sm-9">
            <div id="mydiv" class="row bt" style="display:none;"  bgcolor="#FFFFFF" onload="disableContextMenu();" oncontextmenu="return false" >
                <!-- <iframe id="frame" src="" width="100%" height="1000">
                </iframe> -->
                <iframe  id="frame" src = "" title="PDF in an i-Frame" frameborder="0"
                 scrolling="auto" width="100%" height="1000"> 
                </iframe>  
            </div>
            <div class="guide-right" id = "table_id">
                 <div class="row bt">
                    <div class="col-sm-3 p-0">
                        <h3><?php echo $category_name['fields']; ?></h3>

                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 pb-3">
                        <!-- <i class="fa fa-search" aria-hidden="true"></i> -->
                        <input type="text" class="form-control" placeholder="Search" onkeyup="search(<?php echo $subpart[0]['categories_id']; ?>)" id="search1" name="">
                    </div>
                </div>
                <!---------------------------------------------->
                <!-- <div class="row pt-4" id="guid">
                    <div class="col-sm-3 p-0">
                        <div class="form-group">
                             <select class="form-control" id="">
                                <option>Select Categories</option>
                                <option>Category 1</option>
                                <option>Category 2</option>
                                <option>Category 3</option>
                              </select>
                        </div>
                    </div>
                    <div class="col-sm-9"></div>
                </div> -->
                  <!---------------------------------------------->
                  <!-- <div class="row pt-4" id="upl">
                        <div class="col-sm-3 p-0">
                          <input type="file" class="form-control" name="">
                        </div>
                        <div class="col-sm-4">
                          <button type="button" class="btn">Upload</button> <span>(pdf,word,xls,link,jpeg)</span>
                      </div>
                      <div class="col-sm-5"></div>
                  </div> -->
                <!---------------------------------------------->
                <h3><b><?php echo $category_name['category_name']; ?></b></h3>
                <div class="category-sub" id="sub_category">
                    <?php 
                        foreach($subpart as $key=>$val){
                    ?>
                    <div class="row" id="guide-text">
                        <?php if($val['chapter_name'] != ''  && $val['chapter_name'] != '') {
                            ?>
                            <div class="col-sm-5 p-0" id="c-sub">
                                <h5><?php echo $val['chapter_name']; ?></h5>
                                <h5><?php echo $val['name']; ?></h5>
                            </div>
                            <?php
                        }
                        else{
                            ?>
                            <div class="col-sm-5 p-0" id="c-sub">
                                <h5><?php echo $val['name']; ?></h5>
                            </div>
                            <?php
                        }
                        ?>
                       
                        <div class="col-sm-6" id="guide-mob-txt">
                             <p>Uploaded by Dr.<?php echo $val['created_by']; ?> on <?php echo $val['created_at']; ?></p>
                        </div>
                        <?php if($val['link']){ ?>
                        <div class="col-sm-1 p-0">
                            <button type="button" class="btn" id="vie" value="<?php echo $val['files']; ?>,<?php echo $val['link']; ?>" onclick="viewfile(this.value)">VIEW</button>
                            <!-- <button type="button" class="btn" id="del" value="<?php echo $val['files']; ?>" onclick="downloadFile(this.value)">Download</button>  -->
                        </div>
                        <?php }
                        else{
                                $pos = strpos($val['files'],".pdf");
                                if($pos != ''){
                                        $googleDocs = "https://docs.google.com/viewer?url=";
                                    ?> 
                                    <div class="col-sm-1 p-0">
                                        <!-- <button type="button" class="btn" id="vie" value="<?php echo $val['files']; ?>,<?php echo $val['link']; ?>" onclick="viewfile(this.value)">VIEW</button> --> 

                                        <a href = "<?php echo $googleDocs.base_url('').'/public/uploads/'.$val['files']; ?>">VIEW</a>
                                        <!-- <button type="button" class="btn" id="del" value="<?php echo $val['files']; ?>" onclick="downloadFile(this.value)">Download</button>  -->
                                    </div>
                                    <?php
                                }
                                else{
                                    ?>

                                     <div class="col-sm-1 p-0">
                                        <a href = "<?php echo base_url('').'/public/uploads/'.$val['files']; ?>">VIEW</a> 
                                    </div>

                                    <?php
                                }
                        }
                        ?>    
                    </div><!--row-->
                    <?php
                        }
                    ?>
                    
                </div>
            </div>
        </div>

    </div>
</section>

<script>


    // console.log(<?php //print_r($subpart); ?>);
 
   

    function search(key1){
        var id = key1;
        var filed_input = $('#search1').val();
        // alert(id);
        $.ajax({
            type : "POST",
            url : '<?php echo base_url('search-sub-details') ?>',
            data : {filed_input:filed_input,id:id},
            success:function(response){
                response=jQuery.parseJSON(response);
                var mode1='';
                $('#sub_category').empty();
                for(var i=0; i<response.length; i++){
                    // console.log(response[i]);
                    mode1 +='<div class="row" id="guide-text">';
                    mode1 +=    '<div class="col-sm-5 p-0" id="c-sub">';
                    mode1 +=        '<h5>'+response[i].name+'</h5>';
                    mode1 +=    '</div>';
                    mode1 +=    '<div class="col-sm-6">';
                    mode1 +=        '<p>uploaded by Dr.'+response[i].created_by+' on '+response[i].created_at+'</p>';
                    mode1 +=    '</div>';
                    mode1 +=    '<div class="col-sm-1 p-0">';
                    if(response[i].link){
                        mode1 +=        '<button type="button" class="btn" id="vie" value="'+response[i].files+','+response[i].link+'" onclick="viewfile(this.value)">VIEW</button>&nbsp;';
                        // mode1 +=        '<button type="button" class="btn" id="del" value="'+response[i].files+'" onclick="downloadFile(this.value)">Download</button>';
                    }else{
                        mode1 +=        '<button type="button" class="btn" id="vie" value="'+response[i].files+','+response[i].link+'" onclick="viewfile(this.value)">VIEW</button>&nbsp;';
                        //mode1 +=        '<button type="button" class="btn" id="del" value="'+response[i].files+'" onclick="downloadFile(this.value)">Download</button>';
                    }                   
                    mode1 +=    '</div>';
                    mode1 +='</div>';
                }
                $('#sub_category').append(mode1);
            }
        });
    }

    function viewfile(key){
        var files = key;
        // alert(files); 
        var files = key.split(',');         
        if(files[0] == ''){
           window.open(files[1]);
        }
        else{
                
            
             $('#table_id').hide();
             $('#mydiv').show();
             $("#frame").attr("src", "<?php echo base_url('') ?>/public/uploads/"+files[0]+'#toolbar=0');

           // webView.loadUrl("http://docs.google.com/viewerng/viewer?url="+ url);

            // window.open("<?php echo base_url('') ?>/public/uploads/"+files[0]);
            //window.open("<?php echo base_url('') ?>/public/uploads/"+files[0]);
        }
    }
     function disableContextMenu()
      {
        //window.frames["frame"].document.oncontextmenu = function(){alert("No way!"); return false;};   
        // Or use this
         document.getElementById("frame").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;    
      }  
    function downloadFile(key1){
        // alert(key1);
        var files = key1;
       
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

<style>
    #guide-text h5{
        font-size:14px!important;
    }
    #guide-text p{
        font-size:14px!important;
    }
    #guide-text button{
        padding: 3px 12px!important;
    }
</style>