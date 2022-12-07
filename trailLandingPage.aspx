<%@ Page Language="C#" AutoEventWireup="true" Inherits="trailLandingPage" CodeBehind="trailLandingPage.aspx.cs" CodeFile="~/trailLandingPage.aspx.cs" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- Favicons -->
    <%--<link rel="shortcut icon" href="assets/">
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">--%>
    <link rel="shortcut icon" href="assets/">
    <link rel="apple-touch-icon" href="assets/medusys_banglore.png">

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/fonts/Material-Design-Iconic-Font.woff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- Stylesheet -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="page-home">

    <!-- Preloader -->
    <div class="preloader bg-white" id="preloader">
        <div class="spinner-wrap">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- HEADER
  ============================================== -->
    <header class="header header-1" id="header">
    <nav class="navbar navbar-default navbar-fixed-top" style="  background: linear-gradient(to right, #eaecc6,#2bc0e4); " id ="navbar" >

      <!-- navbar -->
      <div class="container">
        <div class="navbar-header ">
          <button class="navbar-toggle nav-icon">
            <i class="material-icons">menu</i>
          </button>
          <a href="index.html"  title="Home">
           <%-- <img class="logo-light" src="assets/img/112%20x%20100-01.png" alt="medusys anasthesia  "/>
            <img class="logo-dark" src="assets/112%20x%20100_only_logo_Artboard%204.png" alt="medusys"/>--%>
              <img class="logo-light" src="assets/Medusys_bengaluru.png" alt="medusys anasthesia Bengaluru  ">
                    <img class="logo-dark" src="assets/medusys_banglore.png" alt="medusys">
          </a>
          <ul class="nav navbar-nav navbar-right navbar-icons">
          
           
          </ul>
        </div>
        <div class="navbar-sider">
          <ul class="nav navbar-nav navbar-menu">
            <%--<li><a href="#header">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#product">Product</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#clients">Clients</a></li>
            <li><a href="#work">Contact</a></li>--%>
           
          </ul>
        </div>
      </div>
      <div class="sidenav-overlay"></div>
    </nav>
	 
  </header>

    <!-- CONTENT
  ============================================== -->

    <main class="page-content">      
     
      
    <!-- Counters Section -->

<section class="bg-white" id="">
   <div class="container">          
        <div class="section-header text-center" style="margin-bottom:0%;" id="StatusOk" runat="server">
			<span style="color:#0bc114"><%--<i class="fa fa-check fa-4x"></i>--%></span> <h1 style="color:black;text-align:center">Thank You For Registering</h1>
        <%--<p class="description">Details Have Been Mailed to The Registered Mail ID</p>--%>
            <p style="color:black;text-align:center"><b>Download and Login Details</b> Have Been Mailed to The Registered Mail ID</p>
        </div>
          <%--<div class="section-header text-center" id="StatusCancel" runat="server">
			<span style="color:#0bc114"></span> <h1 style="color:black">Transcation was not Successfull</h1>
         <p class="description"><a href="UserRegistrationForm.aspx" title="Go to Registration">Go to Registration From </a></p>
        </div>--%>

     <div class="row"  id="hidestatus" runat ="server"> 
         <div class="col-xs-12">          
          
              <form class="clearfix"> 
                  <div class="well col-md-6 col-md-offset-3 " >
             
                 <p style="font-size:larger; text-align:center;"> Your trial usage of RAD 
                      begins now and you can enter upto<br />
                      <b>25 cases</b> in trial version.</p>
                  <p style="font-size:larger; text-align:center;">You can use the <b>upgrade</b> option <br />
                     from menu in the App
                     for unlimited access.</p>                                                              
                             
                  <%--  <div class="col-sm-6">     
                        <img src="assets/img/logo/Radimage.png" style="height: 465px;width: 750px;"/>
                    </div>--%>   </div>           
                           
              </form>  </div>
              <%--  <div style="padding-left: 480px;padding-top:12px;">
                      <a href="<%=RegisteredLink %>"><img alt="Login" title="Login" src="assets/img/logo/weblogin.png"/></a> 
                               <a href="https://play.google.com/store/apps/details?id=vngt.medusys.rad.android"><img alt="Play Store Link" title="Play Store" src="assets/img/logo/palystore.png"/></a>
                               <a href="https://itunes.apple.com/in/app/regional-anaesthesia-database/id1231377668?mt=8"><img alt="App Store Link" title="App Store"  src="assets/img/logo/apple%20icon.png" /></a>
            
                  </div> --%>
                 <form class="clearfix">     
                     <p  style="color:black;font-size:16px;text-align:center"><b>Download App into your Mobile Phone or Tablet</b></p>
                     <div class="container">
                         <div class="row">
                      <div class="col-sm-7 " style="text-align:right;" >                  
                       <img src="assets/paymtimages/Rad2.png" style="padding-left:45%;" align="left" />                   
                     </div>
                             <div class="col-sm-4 ">

                             </div>
                     <div class="col-sm-5" style="text-align:left; ">
                         <a href="https://play.google.com/store/apps/details?id=vngt.medusys.rad.android" target="_blank"><img src="assets/paymtimages/googleplay.png"  alt="Play Store Link" title="Play Store" align="middle" style="height: 70px;"/></a><br />
                         <a href="https://itunes.apple.com/in/app/regional-anaesthesia-database/id1231377668?mt=8" target="_blank"><img src="assets/paymtimages/App_store.png" alt="App Store Link" title="App Store" style="height: 50px;padding-left: 2%;"/></a>

                     </div>

                         </div>
                     </div>
                 
                     <br />  <br />  <br />
                       <div style="padding-left:25%;">
                           <img style="padding-left:12%; style="top: 70%; "  src="assets/paymtimages/Raddesg.png" /><span style="font-weight:bold;color:black;left: 38%; top: 80%; position: absolute;">
                               Go to<a href="index.html"> <span  style="text-decoration:underline;">Members</span></a> Section in the Home Page for web login</span>
                       </div>   
                 </form>
                
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
            
          <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-0 col-sm-3 col-sm-offset-1">
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
              <li><a href="PDF/Terms%20and%20Conditions-RAD.pdf" target="_blank">Terms and Policies </a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-4 col-md-offset-0 col-sm-12">
            <h5 class="title text-white mg-b-30"></h5>
         <a href="#header"><img src="assets/112%20x%20100_white_text.png"></a>
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
              <li><a href="PDF/Website_Terms_and_Privacy.pdf" target="_blank">Terms of Use</a></li>
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

    <!-- Scrolltop -->
    <button class="btn btn-default btn-fab btn-fab-mini btn-scrolltop" id="scrollTop">
   <%--    <i class="material-icons">keyboard_arrow_up</i>--%>
         <i class="fa fa-arrow-up"></i>
    </button>
  

    <!-- SCRIPTS
  ============================================== -->
    <script src="assets/js/core/jquery.min.js"></script>
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
   <%-- <script src="assets/js/plugins/ripples.js"></script>--%>
    <script src="assets/js/hans.js"></script>


    <script src="assets/js/thumbnail-slider.js" type="text/javascript"></script>


    <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <!-- stats.js lib -->
    <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
</body>
</html>
