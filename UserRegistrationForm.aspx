<%@ Page Language="C#" AutoEventWireup="true" CodeFile="UserRegistrationForm.aspx.cs" Inherits="UserRegistrationForm" %>

<%@ Register Assembly="AjaxControlToolkit" Namespace="AjaxControlToolkit" TagPrefix="cc1" %>


<!DOCTYPE html>

<html class="no-js" lang="en">

<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">

    <!-- Stylesheet -->

    <link href="assets/metro/css/metro.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="assets/css/jquery.dialogbox.css" rel="stylesheet" />
    <%--<link href="assets/css/app.css" rel="stylesheet" />--%>
    <%--<link href="assets/css/modal.css" rel="stylesheet" />--%>
    <%--<link href="assets/css/jBox.css" rel="stylesheet" />--%>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .holder {
            width: 100%;
            display: block;
        }

        .content {
            background: #fff;
            padding: 28px 26px 33px 25px;
        }

        .popup {
            border-radius: 7px;
            background: #6b6a63;
            margin: 30px auto 0;
            padding: 6px;
            position: absolute;
            width: 800px;
            top: 50%;
            left: 50%;
            margin-left: -400px;
            margin-top: -40px;
        }



        table, th, td {
            border: 1px solid black;
            padding: 0 80px 0 80px;
            border-top: 1px solid black !important;
            align-content: center !important;
            text-align: center !important;
        }
    </style>
</head>

<body class="page-home" style="color: black;">
    <%-- <form id="form1" runat="server">--%>
    <!-- Preloader -->
     
    <div class="preloader bg-white" id="preloader">
        <div class="spinner-wrap">
            <div class="spinner"></div>
           
        </div>
    </div>

    <!-- HEADER
  ============================================== -->
    <header class="header header-1" id="header">
        <nav class="navbar navbar-default navbar-fixed-top" style="background: linear-gradient(to right, #eaecc6,#2bc0e4);" id="navbar">

            <!-- navbar -->
            <div class="container">
                <div class="navbar-header ">
                  <%--  <button class="navbar-toggle nav-icon">
                        <i class="material-icons">menu</i>
                    </button>--%>
                    <a href="index.html" title="Home">
                        <%--<img class="logo-light" src="assets/img/112%20x%20100-01.png" alt="medusys anasthesia">--%>
                        <img class="logo-light" src="assets/Medusys_bengaluru.png" alt="medusys anasthesia" />
                        <%--<img class="logo-dark" src="assets/112%20x%20100_only_logo_Artboard%204.png" alt="medusys">--%>
                        <img class="logo-dark" src="assets/medusys_banglore.png" alt="medusys" />
                    </a>
                    <ul class="nav navbar-nav navbar-right navbar-icons">
                    </ul>
                </div>
                <!-- <div class="navbar-sider">
          <ul class="nav navbar-nav navbar-menu">
            <li><a href="#header">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#product">Product</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#clients">Clients</a></li>
            <li><a href="#work">Contact</a></li>
           
          </ul>
        </div>-->
            </div>
            <div class="sidenav-overlay"></div>
        </nav>

    </header>

    <!-- CONTENT
  ============================================== -->





    <main class="page-content"  >       
    <!-- Counters Section -->     
    <section class="" id="focu" style="font-size:14px; ">
              
 <div class="container" >
    <div class="row" >
        <div  class="col-md-3"></div>
          <%--<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">--%>
        <div class="col-xs-12 col-lg-6">
			 <%-- <center><h5><span style="color:#1767e8;">SIGN UP</span> for Single User Subscription </h5></center>  --%>            
           <%-- <div class="well well-lg col-md-10 col-md-offset-1 contact-section-form " style="height:auto;">--%>   
               <div class="contact-section-form " style="height:auto;">        
              <form class="" id="registrationform1"  >
                 
                  <div class="col-xs-12 col-sm-12" style="padding:0px">
                      <div class="form-group">
                          <div class="col-xs-12 col-sm-12 ">
                              <div class="form-group label-floating" style="color:black;display:none;">
					              Registration  <select id="ddldomainlist" class="control-label" required >                          
                                      <%-- <option value="Select">Select your group</option>--%>						  
					              </select>                   
                              </div>
                         </div>                  
				    </div>                 
                </div>
                  <h3  style="text-decoration: underline; text-align: center; font-weight:bold;color:black;">Registration</h3> 
                  <div class="col-xs-12">
				  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group label-floating">
                            <input  id="ChkSingleUser" type="checkbox" onchange="OnChkSingleUser();"  tabindex="10" checked  disabled/>                           
                            <span  style="color:black" class="control-label">Single User</span>
                          </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group label-floating">
                             <input  id="ChkMultiuser" type="checkbox" onchange="OncChkMultiUser();"  tabindex="10"/>                         
                                 <span  style="color:black" class="control-label">Multi User</span>                      
                                  <select disabled id="SelectMultiUser" class="control-label" for="inputSite" required runat="server">
                                  <option value="0">0</option>
						   	      <option value="5">5</option>
  							      <option value="10">10</option>
  							      <option value="15">15</option>
						   	      <option value="20">20</option>
                                  <option value="30">30</option>
					             </select>                        
                          </div>
                      </div>
				  </div>
                </div>

				  <div class="col-xs-12 col-sm-12 ">
                      <div class="form-group label-floating" style="color:black">
					       <select id="ddtitle" class="control-label" for="inputSite" required runat="server">
						   	    <option value="Mr.">Mr.</option>
  							    <option value="Mrs.">Mrs.</option>
  							    <option value="Dr.">Dr.</option>
						   	    <option value="Ms">Ms.</option>
					      </select>                    
                      </div>                  
                </div>
				  
                <div class="col-xs-12">
				  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group label-floating">
                            <label class="control-label" for="inputName" style="color:black">First-Name</label>
                            <input class="form-control"  required type="text" id="txtfirstname" name="fname"  tabindex="1" maxlength="50" autocomplete="off" style="text-transform:capitalize" value="<%=FirstName %>">
                          </div>
                      </div>
                      <div class="col-md-6">
                         <div class="form-group label-floating">
                            <label class="control-label" for="inputName" style="color:black">Last-Name</label>
                            <input class="form-control" id="txtlastname" required type="text" name="lname"  tabindex="2" maxlength="50" autocomplete="off" style="text-transform:capitalize" value="<%=LastName %>">
                         </div>
                      </div>
				  </div>
                </div>
                 <div class="col-xs-12">
				      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group label-floating">
					             <label class="control-label" for="inputSite" style="color:black">Designation	</label>
                                 <input class="form-control" id="txtdesignation" required type="text" name="designation"  tabindex="3" maxlength="50" autocomplete="off" style="text-transform:capitalize" value="<%=Designation %>">  
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group label-floating">
					            <label class="control-label" for="inputSite" style="color:black">Department	</label>
                                <input class="form-control" id="txtdepartment" required type="text" name="department"  tabindex="4" maxlength="50" autocomplete="off" style="text-transform:capitalize" value="<%=Department %>">
                            </div>
                          </div>
				      </div>
                 </div>
                 <div class="col-xs-12">
                           <div class="row">
                                   <div class="col-md-6">
                                       <div class="form-group label-floating">
					                        <select id="country" name="country"  onchange="populateStates(this.id,'state')"  style="width:100%"></select>
                                            <span id="error-country" style="color:red"></span>
                                       </div>
                                   </div>

                                 <div class="col-md-6">
                                     <div class="form-group label-floating">
					                     <select name="state" id="state" style="width:100%">
                                              <option value="">Select State</option>
					                     </select>
                                         <span id="error-State" style="color:red"></span>
                                     </div>
                                 </div>
                            </div>
                  </div> 				  
                   <div class="col-xs-12 col-sm-12 ">
                      <div class="form-group label-floating">
					     <label class="control-label" for="inputSite" style="color:black">Hospital</label>
                          <input class="form-control" id="txthospital" required type="text" name="hospital"  tabindex="5"maxlength="50" autocomplete="off" value="<%=Hospital %>">
					   </div>
                       <div class="form-group label-floating">
					          <label class="control-label" for="inputEmail" style="color:black">Email-Id</label>
                              <input class="form-control" id="txtusername" required type="email" name="email" tabindex="6"maxlength="50" autocomplete="off" readonly value="<%=emailid %>">
                       </div>
                   </div>
				   <div class="col-xs-12 col-sm-12">
                     <div class="form-group label-floating">
					   <label class="control-label" for="inputPhone" style="color:black">Mobile number</label>
                       <input class="form-control" title="Mobile Number"  pattern="[789][0-9]{9}" required id="txtcontactnumber" type="number" name="mobile"  tabindex="7" maxlength="20" autocomplete="off" value="<%=MobileNo %>">
                     </div>                  
                   </div>
				  <div class="col-xs-12 col-sm-12 ">
                      <div class="form-group label-floating">
                         <%-- <label class="control-label" for="inputSite" style="color:black">Password &nbsp;&nbsp;&nbsp; (minimum 5 alpha-numeric characters)</label>--%> 
                           <label class="control-label" for="inputSite" style="color:black">Password&nbsp; (minimum 5 alpha-numeric characters)</label>
                          <input class="form-control" id="txtpassword" onkeypress="validpass();" required  type="text" name="password"  tabindex="8" title="" maxlength="20" pattern="^[a-zA-Z0-9]{5,20}" autocomplete="off" value="<%=Password %>">  <%--onclick="validate()"   pattern="^[a-zA-Z0-9]{5,20}"--%>
                          <span id="error_msg" style="color:red"></span>
                      </div>
                  </div>
				  <div class="col-xs-12 col-sm-12 ">
                      <div class="form-group label-floating">
                            <label class="control-label" for="inputSite" style="color:black">Confirm Password </label>
                            <input class="form-control" id="txtcpassword"  required type="text" name="cpassword"  tabindex="9" maxlength="20" autocomplete="off" value="<%=ConfirmPassword %>">
                      </div>
				      <div>
                          <input id="chkedTerms" type="checkbox" onchange="chkTerms_cond();"  tabindex="10"/>                           
                          <a href="PDF/Terms and Conditions-RAD.pdf" target="_blank" style="text-decoration:underline;">Agree with terms & conditions</a>
				      </div>

                </div>
                <div class="col-xs-12 col-sm-12 ">
                  <div class="form-group label-floating">
                   <%--<button type="submit" class="btn btn-raised btn-lg btn-primary" id="btnregister">
                      Register<i class="material-icons right hidden-xxs"></i>
                    </button>--%>
					  <button type="submit" class="btn btn-raised btn-lg btn-primary" id="btnmakepayment" disabled="disabled"  tabindex="11">
                      Register<i class="material-icons right hidden-xxs"></i>
                    </button> 
                  </div>
                </div>
             
				<%--<input type="hidden" value="<%=Domain%>" id="ddldomainlist"/>--%>
              </form>
            </div>
              <div class="col-xs-12 col-sm-12">
               
                  <h6  style="text-decoration: underline; color:black;"><b>User Terms</b></h6>
                   <ul>
                         <%-- Insert Links --%>
                        <li><a href="PDF/Subscription_Details.pdf" target="_blank">Subscription Details</a></li>
                         <li><a href="PDF/Terms and Conditions-RAD.pdf" target="_blank">Terms & Conditions Document</a></li>
                         <li><a href="PDF/Privacy Policy-RAD.pdf" target="_blank">Privacy Policy Document</a></li>
                         <li><a href="PDF/End User License Agreement-RAD.pdf" target="_blank">End User License Agreement (EULA)</a></li>
                        
                     </ul>
              </div>                
        </div>
     </div>
  </div>
</section>

  </main>

    <!-- FOOTER
  ============================================== -->
    <footer class="bg-dark" id="page-footer">
        <section class="footer-blog padding-sm">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <h5 class="title text-white mg-b-30 no-mg-t">About Medusys</h5>
                        <p class="mg-b-50">The nature of our business activities includes Research, Problem Solving, Consultancy and Product Development. We plan to develop products in analytics for medical community.</p>
                    </div>

                    <%--<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-0 col-sm-3 col-sm-offset-1">
           <h5 class="title text-white mg-b-30">Sitemap</h5>
            <ul class="list-unstyled mg-b-50">
              <li><a href="#">About</a></li>
              <li><a href="#">product</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">videos</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
              
              
              
          </div>
          <div class="col-lg-2 col-lg-offset-0 col-md-2 col-md-offset-0 col-sm-2">
            <h5 class="title text-white mg-b-30">Useful Links</h5>
            <ul class="list-unstyled mg-b-50">
              <li><a href="#">Our Works</a></li>
            <li><a href="#">Tech partners </a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">Terms and Policies </a></li>
            </ul>
          </div>--%>
                    <div class="col-lg-3 col-md-4 col-md-offset-0 col-sm-12">
                        <h5 class="title text-white mg-b-30"></h5>
                        <a href="#header">
                            <%--<img src="assets/112%20x%20100_white_text.png">--%>
                            <img src="assets/medusys_footer.png" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer-copyright padding-xs">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 text-left text-xs-center">
                        <p class="no-mg">©www.Medusys.in 2017 </p>
                    </div>
                    <div class="col-sm-6 hidden-xxs">
                        <ul class="list-inline text-right text-xs-center no-mg">
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="PDF/Privacy%20Policy-RAD.pdf" target="_blank">Privacy Policy</a></li>
                            <li><a href="PDF/Terms%20and%20Conditions-RAD.pdf" target="_blank">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </footer>

    <!-- Search -->
    <div class="search-overlay hidden" id="search">
        <div class="search-bg"></div>
        <div class="search-form">
            <div class="container">
                <div class="row">
                    <form class="hidden" id="searchForm">
                        <div class="form-group">
                            <input type="text" placeholder="Type and press enter.." class="form-control">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <i class="material-icons closer">close</i>
    </div>

    

    <%--<div data-role="dialog" data-overlay-click-close="true" data-width="1000px" data-type="default" data-close-button="false" id="subscriptionDailog" data-overlay="true" data-overlay-color="op-dark" style="border-radius: 8px;">
            <div class='dialog-content'>
                <div class="row">
                    ojtb tjmbotmbormbormtbjmtjbmtjbm  t om tr o ombo5
                </div>
            </div>
        </div>--%>

    <%--<div class="modal-overlay" id="modal_window">

        <div class="modal-content" id="modal_holder">

            <h1 id="modal_title">Modal Title</h1>

            Modal Content ...

    <button class="btn-close" id="modal_close" type="button" aria-label="close">
        &times;
    </button>

        </div>

    </div>

    <button class="btn" type="button" id="modal_open">Open the Modal</button>--%>
   <button id="modalbtn" type="button" class="btn btn-raised btn-lg btn-primary" data-toggle="modal" data-target="#myModal" style="display:none">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" >
  <div class="modal-dialog" id="modalBody">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button><p>Select your type of subscription</p>
      </div>
         
         <div text-align:" left" class="modal-body-center;"  style="width:50%;display:inline;">
             <button type="button" id="btnPaid" onclick="Paiddata()"; style="border: solid thin lightblue;border-radius: 20px;height: 80px;left: 100px;margin-left: 10px;margin-right: 10px;" class="btn btn-default" data-dismiss="modal">
            Subscribe for<br><b style="font-size:larger"> Paid</b><br> version</button>
      </div>
         
        <div class="modal-body-center"  style="width:50%;display:inline;">   
            <%-- <a href="trailLandingPage.aspx">--%>
             <button type="button" id="btnTrial" onclick="TrialPeriod()"; style="border: solid thin lightblue;border-radius:20px;height: 80px;left: 100px;margin-left: 10px;margin-right: 10px;" class="btn btn-default">
                 Subscribe for<br><b style="font-size:larger">trial</b><br> version </button>
           <%--  </a> --%>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
  </div>
</div>
    </div>
   


    <!-- Scrolltop -->
    <button class="btn btn-default btn-fab btn-fab-mini btn-scrolltop" id="scrollTop">
        <i class="fa fa-arrow-up"></i>
    </button>




    <!-- SCRIPTS
  ============================================== -->
    <script src="assets/js/core/jquery.min.js"></script>
    <%--<script src="assets/js/core/bootstrap.js"></script>--%>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/core/material.min.js"></script>
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <script src="assets/js/plugins/countto.min.js"></script>
    <script src="assets/js/plugins/ekkolightbox.min.js"></script>
    <script src="assets/js/plugins/wow.min.js"></script>
    <script src="assets/js/plugins/owlcarousel.min.js"></script>
    <script src="assets/js/plugins/device.min.js"></script>
    <script src="assets/js/plugins/mb.YTPlayer.min.js"></script>
    <script src="assets/js/plugins/masonry.min.js"></script>
    <script src="assets/js/plugins/isotope.min.js"></script>
    <script src="assets/js/plugins/ripples.js"></script>
    <script src="assets/js/hans.js"></script>
    <script src="Scripts/jquery-1.8.2.min.js"></script>
    <script src="Scripts/jquery.validate.min.js"></script>
    <script src="Scripts/jquery.validate.unobtrusive.js"></script>

    <script src="assets/js/thumbnail-slider.js" type="text/javascript"></script>


    <%--<script src="assets/metro/metro-ui/metro.js"></script>--%>
    <%--<script src="assets/js/plugins/jBox.js"></script>--%>
    <%--<script src="assets/js/plugins/popModal.js"></script>--%>
    <%--<script src="assets/js/a11y.modal.js"></script>--%>
    <script src="assets/js/jquery.dialogBox.js"></script>

    <script src="Scripts/countries.js"></script>


    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- stats.js lib -->
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
    <script type="text/javascript">

        $(function () {
            var y = "<%=ConfigurationManager.AppSettings["DomainList"] %>";
            var x = y.split(',');
            var select = document.getElementById('ddldomainlist');
            for (var i = 0; i < x.length; i++) {
                var opt = new Option(x[i], x[i]);
                select.appendChild(opt);
            }

            //$('#contenttt').dialogModal({
            //    onOkBut: function () { },
            //    onCancelBut: function () { },
            //    onLoad: function () { },
            //    onClose: function () { },
            //});

            $('#btnDialog').click(function () {
                $('#dialog11').dialogBox({
                    hasClose: true,
                    hasBtn: true,
                    confirmValue: 'I am sure',
                    confirm: function () {
                        alert('this is callback function');
                    },
                    cancelValue: 'I will cancel',
                    title: 'title text',
                    content: 'dialog content text,image,html file'
                })
            })

        })

        var isAlresdyRegisteredChecked = 0;
        var registeredUID = 0;

        $("#btnmakepayment").on('touchstart click', function (e) {
            //$('#myModal').modal({ show: true });

            document.getElementById("error_msg").textContent = "";

            // alert($("#registrationform1").valid())

            if ($("#registrationform1").valid()) {
                e.preventDefault();
                var inputStr = $("#txtpassword").val();
                if (inputStr.length < 5) {
                    document.getElementById("error_msg").textContent = "Enter the 5 alpha-numeric characters...!";
                    document.getElementById("txtpassword").focus();
                }
                else {
                    var regularExpression = /^[a-z0-9]+$/i;
                    if (!regularExpression.test(inputStr)) {
                        document.getElementById("error_msg").textContent = "*Enter alphabets and numbers only......!";
                        document.getElementById("txtpassword").focus();
                    }
                    else {
                        document.getElementById("error_msg").textContent = "";
                        if (CheckForPasswordMatch() == true) {
                            var ddldomain = document.getElementById("ddldomainlist").value;
                            if (ddldomain == "Select") {
                                alert("Please select an Registration option!");
                                document.getElementById("ddldomainlist").focus();
                            }
                            else {
                                //document.getElementById("mainModal").style.display = 'block'
                                // $("#modalbtn").click();
                                //RegisterUser();

                                //naveen
                                var inputCountry = $("#country").val();
                                var inputstate = $("#state").val();
                                if (inputCountry == -1 || inputCountry == "") {
                                    document.getElementById("error-country").textContent = "Please Select Country";
                                    document.getElementById("error-State").textContent = "Please Select State";
                                    document.getElementById("country").focus();
                                }
                                else {
                                    if (inputstate == "") {
                                        document.getElementById("state").focus();
                                        document.getElementById("error-State").textContent = "Please Select State";
                                        document.getElementById("error-country").textContent = "";

                                    }
                                    else {
                                        //  $("#modalbtn").click();
                                        Paiddata()
                                    }
                                }
                                //naveen
                            }
                        }
                        else {
                            alert("Password didn't match")
                        }
                    }
                }
            }
        })
        function CheckForPasswordMatch() {

            if (document.getElementById('txtpassword').value != document.getElementById('txtcpassword').value)
                return false;
            return true;
        }

        function Paiddata() {

            //alert("Paid Version");
            // RegisterUser();
            var domain = "Paid" //document.getElementById("ddldomainlist").value;
            var name = document.getElementById("txtusername").value;
            //alert(domain, name)
            $.ajax({
                type: "POST",
                url: "UserRegistrationForm.aspx/CheckIfUserWithSameNameExists",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({ username: name, domain: domain }),
                success: function (response) {
                    if (response.d != 0) {
                        if (response.d == -1)
                            alert("You have already registered for single user subscription.")
                        else if (response.d == -2)
                            alert("You have already registered for multi user subscription.")
                        else if (response.d == -3)
                            //alert("You subscription validity has expired .Please contact administrator.")
                            RegisterUser();
                        else if (response.d == -4)
                            RegisterUser();

                    }
                    else {
                        RegisterUser();
                    }
                },
                failure: function (response) {
                    alert("Error Paid version");
                }
            });
        }

        function TrialPeriod() {
            //window.location.href = "trailLandingPage.aspx";
            var domain = "Trial" //document.getElementById("ddldomainlist").value;
            var name = document.getElementById("txtusername").value;
            //alert(domain, name)
            $.ajax({
                type: "POST",
                url: "UserRegistrationForm.aspx/CheckIfUserWithSameNameExists",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({ username: name, domain: domain }),
                success: function (response) {
                    if (response.d != 0) {
                        if (response.d == -1)
                            alert("You have already registered for single user subscription.")
                        else if (response.d == -3)
                            alert("You subscription validity has expired .Please contact administrator.")


                    }
                    else {
                        RegisterTrialPeriodUser();
                    }
                },
                failure: function (response) {
                    alert("Error Trial");
                }
            });
        }


        function RegisterUser() {
            var title, firstname, middlename, lastname, username, password, designation, department, hospital, domain, contactnumber, country, state, multiusermode, isadmin, maxusers;
            title = document.getElementById('ddtitle').value;
            firstname = document.getElementById('txtfirstname').value
            middlename = "";
            lastname = document.getElementById('txtlastname').value
            username = document.getElementById('txtusername').value
            password = document.getElementById('txtpassword').value
            designation = document.getElementById('txtdesignation').value
            department = document.getElementById('txtdepartment').value
            hospital = document.getElementById('txthospital').value
            domain = document.getElementById('ddldomainlist').value

            if (document.getElementById("SelectMultiUser").value != 0) {
                multiusermode = true
                isadmin = true
                maxusers = parseInt(document.getElementById("SelectMultiUser").value)
            }
            else {
                multiusermode = false
                isadmin = false
                maxusers = 0
            }
            contactnumber = document.getElementById('txtcontactnumber').value

            country = document.getElementById('country').value
            state = document.getElementById('state').value

            $("#btnmakepayment").attr("disabled", true); //disable button to prevent multiple clicks

            $.ajax({
                type: "POST",
                url: "UserRegistrationForm.aspx/RegisterUser",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({ title: title, firstname: firstname, middlename: middlename, lastname: lastname, username: username, password: password, designation: designation, department: department, hospital: hospital, domain: domain, contactnumber: contactnumber, country: country, state: state, multiusermode: multiusermode, isadmin: isadmin, maxusers: maxusers }),
                success: function (response) {
                    if (response.d != 0) {
                        //alert("User Registered Successfully")
                        $("#btnmakepayment").attr("disabled", false);
                        $("#btnregister").attr("disabled", true);

                        registeredUID = response.d;

                        LoadPaymentCheckoutForm();
                    }
                    else {
                        $("#btnmakepayment").attr("disabled", false); //Enable button
                    }
                },
                failure: function (response) {
                    $("#btnmakepayment").attr("disabled", false); //Enable button
                    alert("An error occurred. Please try again");
                },
                error: function () {
                    $("#btnmakepayment").attr("disabled", false); //Enable button
                    alert("An error occurred. Please try again");
                }
            });
        }

        function RegisterTrialPeriodUser() {
            var title, firstname, middlename, lastname, username, password, designation, department, hospital, domain, contactnumber, country, state;
            title = document.getElementById('ddtitle').value;
            firstname = document.getElementById('txtfirstname').value
            middlename = "";
            lastname = document.getElementById('txtlastname').value
            username = document.getElementById('txtusername').value
            password = document.getElementById('txtpassword').value
            designation = document.getElementById('txtdesignation').value
            department = document.getElementById('txtdepartment').value
            hospital = document.getElementById('txthospital').value
            domain = document.getElementById('ddldomainlist').value

            contactnumber = document.getElementById('txtcontactnumber').value

            country = document.getElementById('country').value
            state = document.getElementById('state').value

            $("#btnmakepayment").attr("disabled", true); //disable button to prevent multiple clicks

            $.ajax({
                type: "POST",
                url: "UserRegistrationForm.aspx/RegisterTrialUser",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: JSON.stringify({ title: title, firstname: firstname, middlename: middlename, lastname: lastname, username: username, password: password, designation: designation, department: department, hospital: hospital, domain: domain, contactnumber: contactnumber, country: country, state: state }),
                success: function (response) {
                    if (response.d != 0) {
                        //alert("User Registered Successfully")
                        $("#btnmakepayment").attr("disabled", false);
                        $("#btnregister").attr("disabled", true);

                        registeredUID = response.d;
                        //LoadPaymentCheckoutForm();
                        window.location.href = "trailLandingPage.aspx";
                    }
                    else {
                        $("#btnmakepayment").attr("disabled", false); //Enable button
                        window.location.href = "trailLandingPage.aspx";
                    }
                },
                failure: function (response) {
                    $("#btnmakepayment").attr("disabled", false); //Enable button
                    alert("An error occurred. Please try again");
                },
                error: function () {
                    $("#btnmakepayment").attr("disabled", false); //Enable button
                    alert("An error occurred. Please try again");
                }
            });
        }

        function DisableAllFields() {
            if (document.getElementById("chkregistered").checked) {
                document.getElementById("txtusername").focus();
                isAlresdyRegisteredChecked = 1;
                $("#registrationform1 :input").attr('disabled', true);
                $("#txtusername").attr('disabled', false);
                $("#chkregistered").attr('disabled', false);
                $("#btnmakepayment").attr('disabled', false);


            }
            else {
                isAlresdyRegisteredChecked = 0;
                $("#registrationform1 :input").attr('disabled', false);
            }
        }

        function chkTerms_cond() {
            if (document.getElementById("chkedTerms").checked) {
                isAlresdyRegisteredChecked = 0;
                $("#registrationform1 :input").attr('disabled', false);
                $("#txtusername").attr('disabled', false);
                OnChkSingleUser();
                OncChkMultiUser();
            }
            else {
                isAlresdyRegisteredChecked = 1;
                $("#txtusername").attr('disabled', false);
                $("#chkregistered").attr('disabled', true);
                $("#btnmakepayment").attr('disabled', true);
            }
        }



        function OnChkSingleUser() {
            if (document.getElementById("ChkSingleUser").checked) {
                $("#ChkMultiuser").removeAttr("checked");
                document.getElementById("SelectMultiUser").disabled = true;
                document.getElementById("SelectMultiUser").value = "0";
                document.getElementById("ChkSingleUser").disabled = true;
                document.getElementById("ChkMultiuser").disabled = false;

            }
            else {
                $("#ChkSingleUser").removeAttr("checked");
                document.getElementById("SelectMultiUser").disabled = false;

                document.getElementById("ChkSingleUser").disabled = false;
                document.getElementById("ChkMultiuser").disabled = true;

            }
        }

        function OncChkMultiUser() {
            if (document.getElementById("ChkMultiuser").checked) {
                $("#ChkSingleUser").removeAttr("checked");
                document.getElementById("SelectMultiUser").disabled = false;
                document.getElementById("ChkSingleUser").disabled = false;
                document.getElementById("ChkMultiuser").disabled = true;
                document.getElementById("SelectMultiUser").value = "5";
            }
            else {
                $("#ChkMultiuser").removeAttr("checked");

                document.getElementById("SelectMultiUser").disabled = true;
                document.getElementById("SelectMultiUser").value = "0";
                document.getElementById("ChkSingleUser").disabled = true;
                document.getElementById("ChkMultiuser").disabled = false;
            }
        }



        function MakePayment() {
            if (isAlresdyRegisteredChecked == 0) {
                LoadPaymentCheckoutForm();
            }
            else {
                var domain = document.getElementById("ddldomainlist").value;
                var name = document.getElementById("txtusername").value;
                // alert(domain, name)
                $.ajax({
                    type: "POST",
                    url: "UserRegistrationForm.aspx/CheckIfUserWithSameNameExists",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    data: JSON.stringify({ username: name, domain: domain }),
                    success: function (response) {
                        if (response.d != 0) {

                            registeredUID = response.d;

                            LoadPaymentCheckoutForm();
                        }
                        else {
                            $("#btnmakepayment").attr("disabled", false);
                            alert("User not registered")
                        }
                    },
                    failure: function (response) {
                        alert("Error");
                    }
                });
            }
        }

        function LoadPaymentCheckoutForm() {

            // alert("DDDDD")



            var url = "ccavResponseHandler.aspx?UserId=" + registeredUID;
            window.location.href = url;






            //$.ajax({
            //    type: "POST",
            //    url: "ccavResponseHandler.aspx/InsertPaymentDetails",
            //    contentType: "application/json; charset=utf-8",
            //    dataType: "json",
            //    data: JSON.stringify({ UserId: registeredUID }),
            //    success: function (response) {
            //        if (response.d != 0) {

            //           // registeredUID = response.d;

            //           // LoadPaymentCheckoutForm();
            //        }
            //        else {
            //            $("#btnmakepayment").attr("disabled", false);
            //            alert("User not registered")
            //        }
            //    },
            //    failure: function (response) {
            //        alert("Error");
            //    }
            //});


            //var dropdown = document.getElementById("SelectMultiUser");
            ////var strUser = dropdown.options[e.selectedIndex].value;
            //var strUser = document.getElementById("SelectMultiUser").value;
            //var link = " ~/../PaymentCheckoutForm.aspx?UserID=" + registeredUID + "&Domain=" + $("#ddldomainlist").val() + "&MultiUserSlectedItem=" + strUser;
            //var iframe = document.createElement('iframe');
            //iframe.frameBorder = 0;
            //iframe.width = "500px"; //1550px : Changed to disable two scrolls for span daily activity report :Sanjay 09/04/17
            //iframe.height = "500px";
            //iframe.scrolling = "no";
            //iframe.id = "myiframe1";
            //window.location.hash = '#focu';
            //iframe.setAttribute("src", link);
            //$("#registrationform1").html(iframe);
        }

        function validpass() {
            var newPassword = document.getElementById('txtpassword').value;
            document.getElementById("error_msg").textContent = "";
            var minNumberofChars = 4;
            var maxNumberofChars = 16;
            var regularExpression = /^[a-z0-9]+$/i; // /^([a-zA-Z0-9_-]){3,5}$/;//  /^[a-z0-9]+$/i;// /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{5,16}$/;
            if (newPassword.length < minNumberofChars) {
                document.getElementById("error_msg").textContent = "*Enter the 5 alpha-numeric characters";
                // return false;
            }
            else {
                if (!regularExpression.test(newPassword)) {
                    document.getElementById("error_msg").textContent = "*Enter only numbers and alphabets";
                }
                else {
                    document.getElementById("error_msg").textContent = "";
                }
            }
        }

        $(document).ready(function () {
            populateCountries("country");
        })

    </script>
</body>
</html>
