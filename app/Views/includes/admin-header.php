<?php 
	$name = session()->get('name');
	$email = session()->get('email');
	$gamer_id = session()->get('gamer_id');
	$entry_id = session()->get('dr_id');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/flow.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/bootstrap.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/font-awesome.min.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/intlTelInput.css'); ?>"/>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/countrySelect.css'); ?>"/>
	<link rel="stylesheet" type="text/css"  href="<?php echo base_url('public/assets/css/w3.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/jquery-jvectormap-2.0.2.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/jsvectormap.css'); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/simpleMobileMenu-1.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/assets/css/timepicki.css'); ?>"/>
	<!------------------------------JS-------------------------------------->
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-3.6.0.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('public/assets/toastr/toastr.min.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/toastr/toastr.min.css');?>">
	<script src="<?php echo base_url('public/assets/sweet_alert/sweet-alert.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/sweet_alert/sweet-alert.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('public/datatable/css/dataTables.bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('public/datatable/css/dataTables.bootstrap4.min.css');?>">
	<script src="<?php echo base_url('public/datatable/js/jquery.dataTables.min.js');?>"></script>
	<script src="<?php echo base_url('public/datatable/js/dataTables.bootstrap4.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-jvectormap-2.0.2.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-jvectormap-uk-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jquery-jvectormap-world-mill-en.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jvector-maps.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/Chart.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jsvectormap.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/jsvectormap.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/js/world.js'); ?>"></script>
</head>
<body>
	<!----------------------------------------------------------->
	<section class="header">
		<div class="row">
			<div class="col-sm-3">
				<a href=""><img src="<?php echo base_url('public/assets/images/logo-new.jpg'); ?>" id="logo" class="img-fluid d-block"></a>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-7">
				<div class="right-menu">
					<ul>
						<li class="nav-item dropdown open" style="padding-top: 5px;">	
							<input type="hidden" id="entry_id" value="<?php echo $entry_id; ?>" name="entry_id">
							<?php	
							$role_id = session()->get('role_id');
							if($role_id == '1'){ 
							?>	
									<select  name="org" id="orgSelect" >
										<option value="0" selected>select</option>
									
										<?php foreach($org as $key=>$organisation) if(!empty($organisation)) { 
								
									if($organisation['id'] == session()->get('org_id')){ 
										?>
										<option value="<?php echo $organisation['id']?>" selected>
														<?php echo $organisation['organisation_name']?>       
										</option>
										<?php
									}

									else{
									?>
									<option value="<?php echo $organisation['id']?>">
													<?php echo $organisation['organisation_name']?>       
									</option>
									<?php
									}
								}

								?>
								</select>
								<?php
							}
								else{
									?>
									<select  name="org" id="orgSelect" >
										<?php foreach($org as $key=>$organisation) if(!empty($organisation)) { 
								
									if($organisation['id'] == session()->get('org_id')){ 
										?>
										<option value="<?php echo $organisation['id']?>" selected>
														<?php echo $organisation['organisation_name']?>       
										</option>
										<?php
									}
								}
								?>
							</select>	
							<?php
							}
							?>							
						</li>
						<li><a href="<?php echo base_url("Gas")?>" data-toggle="tooltip-1" title="Home"><img src="<?php echo base_url('public/assets/images/Home-Icon.png'); ?>" style=""></a>&nbsp;</li>
						   <li><a href="https://medusys.in/help-center.html" data-toggle="tooltip-1" title="Help center"><img src="<?php echo base_url('public/assets/images/help_center_2.png'); ?>" style=""></a>&nbsp;</li>
                          <li><a href="<?php echo base_url('Super-Admin-Dashboard');?>" data-toggle="tooltip-1" title="Dashboard"><img src="<?php echo base_url('public/assets/images/dashboard_icon.png'); ?>" style="width:40px;"></a></li>
						<div class="w3-dropdown-hover">
							<li><a href="" class="w3-button"><img src="<?php echo base_url('public/assets/images/user.png'); ?>"></a><?php echo $name; ?><i class="fa fa-ellipsis-v" aria-hidden="true"></i></li>
							<div class="w3-dropdown-content w3-bar-block w3-border">
						     	<p><b><?php echo $gamer_id; ?></b></p>
						     	<p><?php echo $email; ?></p>
						     	<a href="<?php echo base_url('flowD/MyAccount');?>">Manage my account</a>
						    </div>
					    </div>
					    <li><a href="<?php echo base_url('log-out');?>"><img src="<?php echo base_url('public/assets/images/logout.png'); ?>"></a>Logout</li>
					</ul>
				</div>
			</div>
		</div><!--row-->

		
	</section>

	<section class="super-admin-dashboard">
	    <div class="row">
	        <div class="col-sm-2" style="padding: 0;">
	            <div class="dashboard-left">
	                <div class="menu-left">
	                    <ul>
							<?php 
								$role_id = session()->get('role_id');
								if($role_id == '1'){
								?>
							<div class="sidenav">
						<!--   <a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Dashboard</a> -->
						<button id="elib-dd" class="dropdown-btn-2" onclick="dashboardlink()">Dashboard</button>

			  			<div class="dropdown-container-2">
			    			
			  			</div>
						  <hr>
						  <a href="<?php echo base_url('user-management'); ?>">User Management</a>
						  <hr>
						  <button id="elib-dd" class="dropdown-btn">e-Library 
						    <i class="fa fa-caret-down"></i>
						  </button>
						  <div class="dropdown-container">
						    <a id="dd-cont" href="<?php echo base_url('Add-Access'); ?>">Add e-Library section</a>
						    <a id="dd-cont" href="<?php echo base_url('Add-Category'); ?>">Add Category</a>
						     <a id="dd-cont" href="<?php echo base_url('Add-Chapters'); ?>">Add Chapters</a>
						    <a id="dd-cont" href="<?php echo base_url('e-Library-Upload-File'); ?>" >Add e-library content</a>
						  </div>
						   <hr>
						 	<button class="dropdown-btn-1">Conference & Workshop
						    	<i class="fa fa-caret-down"></i>
						  	</button>
							  <div class="dropdown-container-1">
							    <a  href="<?php echo base_url('Conference'); ?>">Add Conference</a>
  								<a  href="<?php echo base_url('Conferencelist'); ?>">Conference List</a>
							  </div>
							
						   <hr>
						  <a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Forum</a>
						   <hr>
						   <a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Collaborate</a>
						</div> 
								
						<?php								
							}
							else if($role_id == '2'){ 	
								?>
								<div class="sidenav">
						  			<a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Dashboard</a>
						  			<hr>
						  			<a href="<?php echo base_url('user-management'); ?>">User Management</a>
						  			<hr>
						  			<button id="elib-dd" class="dropdown-btn">e-Library 
						    			<i class="fa fa-caret-down"></i>
						  			</button>
						  			<div class="dropdown-container">
						    			<a id="dd-cont" href="<?php echo base_url('Add-Access'); ?>">Add e-Library section</a>
						    			<a id="dd-cont" href="<?php echo base_url('Add-Category'); ?>">Add Category</a>
						    			<a id="dd-cont" href="<?php echo base_url('Add-Chapters'); ?>">Add Chapters</a>
						    			<a id="dd-cont" href="<?php echo base_url('e-Library-Upload-File'); ?>" >Add e-library content</a>
						  			</div>
						   			<hr>
									<button class="dropdown-btn-1">Conference & Workshop
										<i class="fa fa-caret-down"></i>
									</button>
									<div class="dropdown-container-1">
										<a  href="">Add Conference</a>
									</div>
						   			<hr>
									<a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Forum</a>
									<hr>
									<a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Collaborate</a>
								</div> 
							<?php }
							else if($role_id == '3'){ 	
								?>
								<div class="sidenav">
						  			<a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Dashboard</a>
						  			<hr>
						  			<a href="<?php echo base_url('user-management'); ?>">User Management</a>
						  			<hr>
						  			<button id="elib-dd" class="dropdown-btn">e-Library 
						    			<i class="fa fa-caret-down"></i>
						  			</button>
						  			<div class="dropdown-container">
						    			<a id="dd-cont" href="<?php echo base_url('Add-Access'); ?>">Add e-Library section</a>
						    			<a id="dd-cont" href="<?php echo base_url('Add-Category'); ?>">Add Category</a>
						    			<a id="dd-cont" href="<?php echo base_url('Add-Chapters'); ?>">Add Chapters</a>
						    			<a id="dd-cont" href="<?php echo base_url('e-Library-Upload-File'); ?>" >Add e-library content</a>
						  			</div>
						   			<hr>
									<button class="dropdown-btn-1">Conference & Workshop
										<i class="fa fa-caret-down"></i>
									</button>
									<div class="dropdown-container-1">
										<a  href="">Add Conference</a>
									</div>
						   			<hr>
									<a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Forum</a>
									<hr>
									<a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Collaborate</a>
								</div> 
							<?php }
							
							else if($role_id == '4'){
							?>
 								<div class="sidenav">
						  <a href="<?php echo base_url('Super-Admin-Dashboard'); ?>">Dashboard</a>
						  <hr>
						 
						  <button id="elib-dd" class="dropdown-btn">e-Library 
						    <i class="fa fa-caret-down"></i>
						  </button>
						  <div class="dropdown-container">
						    
						    <a id="dd-cont" href="<?php echo base_url('e-Library-Upload-File'); ?>" >Add e-library content</a>
						  </div>
						   <hr>
						</div> 
						<?php
							}
                            ?>
	                    </ul>
	                </div>
	            </div>
	        </div>
	 <!--    </div>
	</section> -->

	<script>

		// $(document).ready(function() {

		// 	if($("#orgSelect").val() == 0){
		// 		$('.dashboard-left').hide();
		// 	}else{
		// 		$('.dashboard-left').show();
		// 	}
		// });

		$('#orgSelect').change(function(){

			if(this.value == 0){
				// $('.dashboard-left').hide();
				// $(".super-dashboard-right").css("margin-left","-220px");

			}else{

				// $('.dashboard-left').show();
				// $(".super-dashboard-right").css("margin-left","0px");

				var org =  $('#orgSelect').val();
				var entry_id =  $('#entry_id').val();

				// alert(org);

				$.ajax({

					type   : 'post',
					url    : '<?php echo site_url("change-org")?>',
					data   : {org : org,entry_id:entry_id}, 
					
					success:function(response){

						console.log(response);
						response = jQuery.parseJSON(response);
						window.location.href="<?php echo site_url('Super-Admin-Dashboard') ?>"; 					
					}
				});
			}			
		});
	</script>

	<script>
				
				var dropdown = document.getElementsByClassName("dropdown-btn");
				var i;

				for (i = 0; i < dropdown.length; i++) {
				  dropdown[i].addEventListener("click", function() {
				    this.classList.toggle("active");
				    var dropdownContent = this.nextElementSibling;
				    if (dropdownContent.style.display === "block") {
				      dropdownContent.style.display = "none";
				    } else {
				      dropdownContent.style.display = "block";
				    }
				  });
				}
			</script>

			<script>
				
				var dropdown = document.getElementsByClassName("dropdown-btn-1");
				var i;

				for (i = 0; i < dropdown.length; i++) {
				  dropdown[i].addEventListener("click", function() {
				    this.classList.toggle("active");
				    var dropdownContent = this.nextElementSibling;
				    if (dropdownContent.style.display === "block") {
				      dropdownContent.style.display = "none";
				    } else {
				      dropdownContent.style.display = "block";
				    }
				  });
				}
			</script>


			<script>
				
				var dropdown = document.getElementsByClassName("dropdown-btn-2");
				var i;

				for (i = 0; i < dropdown.length; i++) {
				  dropdown[i].addEventListener("click", function() {
				    this.classList.toggle("active");
				    var dropdownContent = this.nextElementSibling;
				    if (dropdownContent.style.display === "block") {
				      dropdownContent.style.display = "none";
				    } else {
				      dropdownContent.style.display = "block";
				    }
				  });
				}


				function dashboardlink(){

					window.location.href="<?php echo site_url('Super-Admin-Dashboard') ?>"; 
				}
			</script>