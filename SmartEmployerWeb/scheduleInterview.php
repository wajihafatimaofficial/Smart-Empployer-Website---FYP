
<?php 
    
    include("databaseconnect.php");   
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Schedule Interview</title>
    <link rel="shortcut icon" href="images/icon.png" >
    <meta name="theme-color" content="#F2F2F2">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css" >
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
    
    
        <script>
    function disableBack() { window.history.forward(); }
            setTimeout("disableBack()", 0);
            window.onunload = function () { null };
    
          $(document).ready(function() {
            var x = localStorage.getItem("email");
        var y = localStorage.getItem("password");
        var z = localStorage.getItem("role");
        
    var link;
    if (z=='candidate'){
    
    link='candidateLogin.html';
    }
    if (z=='employer'){
    
    link='employerLogin.html';
    }
    else{
    link='index.html';
    
    }
    
            if (window.localStorage) {
    $("#logout").on("click", function() {
    
    localStorage.setItem("email", "");
    localStorage.setItem("password", "");
    localStorage.setItem("role", "");
    
    localStorage.setItem("event-logout", 'logout-' + Math.random());
                        window.location.replace(link);
                        return true;
    
    });  
    }
    window.addEventListener('storage', function (event) {
                if (event.key == "event-logout") {
                    window.location.replace(link);
                }
            }, false);
          });
          
            </script>
    
        </head>
 
     <nav class="navbar navbar-inverse" id="navbar"  role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myidname">    
              <span class="icon-bar"></span>    
              <span class="icon-bar"></span>    
              <span class="icon-bar"></span>    
          </button>    
          <a class="navbar-brand" href="index.html"><img  src="images/selogo.png" class="logo"></a>
          </div>
          <div class="navbar-collapse collapse" id="myidname">  
          
          <ul class="nav navbar-nav navbar-right">
            <li ><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="glyphicon glyphicon-user"></span> Me
                <span class="caret"></span>
              </a>
             
              <ul class="dropdown-menu" > 
    
                <li><a class="dropdown-item" href="candidateProfile.html">View Profile</a></li>
             
                <li><a class="dropdown-item" href="FAQs.html">FAQs</a></li>
                <li><a class="dropdown-item" id="#logout" href="#">Log Out</a></li>
              </ul>
            </li>
            
          </ul>
        </div>   
        </div>
      </nav>
    
     <body style="  background-color: #F2F2F2;">
    
      <div class="container gy-0" >
        <div class="row gy-0 ">
            <div class="col-lg-12 col-md-12">

      <center> <h2 class="text mainheadings" >Interview Scheduling</h2></center>



   
      
           </div> 
         </div>
    </div>
    <br>
    
 <!-- Footer -->

 <footer class="text-center text-white subfooter" id="subfooter">
        <!-- Grid container -->
        <div class="container p-4 ">
          <!-- Section: Text -->
          <section class="mb-4">
          <!-- Section: Text -->
          <!-- Section: Links -->
          <section class="">
            <!--Grid row-->
            <div class="row">
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0 col-xs-6 col-sm-6 ">
                <h4 class="text-uppercase">Quick Links</h4>
      
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="about.html" class="text-white">About Us</a>
                  </li>
                  <li>
                    <a href="contact.html" class="text-white">Contact Us</a>
                  </li>
                  <li>
                    <a href="Pricing.html" class="text-white">Pricing</a>
                  </li>
                  <li>
                    <a href="FAQs.html" class="text-white">FAQs</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
      
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0 col-xs-6 col-sm-6">
                <h4 class="text-uppercase">Explore More</h4>
      
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="Blog.html" class="text-white">Blog</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Hire Candidates</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Hiring Glossary</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Latest Jobs</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
      
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0 col-xs-6 col-sm-6">
                <h4 class="text-uppercase">Policies</h4>
      
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Cookies</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Terms and Conditions</a>
                  </li>
                  <li>
                    <a href="PrivacyPolicy.html" class="text-white">Privacy Policy</a>
                  </li>
                  <li>
                    <a href="TermsofUse.html" class="text-white">Terms of Use</a>
                  </li>
                </ul>
              </div>
              <!--Grid column-->
      
              <!--Grid column-->
              <div class="col-lg-3 col-md-6 mb-4 mb-md-0 col-xs-6 col-sm-6">
                <h4 class="text-uppercase">Find Us On</h4>
      
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#!" class="text-white">Facebook</a>
                  </li>
                  <li>
                    <a href="#!" class="text-white">Instagram</a>
                  </li>
                  <li>
                    <a href="https://twitter.com/smart_employer?s=20&t=_5xA0h_j3rWeNsDPNsv3cQ" class="text-white">Twitter</a>
                  </li>

                </ul>
              </div>
              <!--Grid column-->
             
            </div>
            <!--Grid row-->
                <!--Grid row new-->
       
              
                <div class="row" style=" display: flex; justify-content: center;">
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                   <h4 class="text-uppercase">Download Now</h4>
         
                   <ul class="list-unstyled mb-0">
                     <li>
                       <div> <a href='https://play.google.com/store/apps/details?id=com.stagescycling.stages'>
                         <img 
                           class="android" 
                           alt='Get it on Google Play' 
                           src='https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png' />
                       </a>
                     </div>
                   </div>
   
                     </li>
                   </ul>
                 </div>
                  <!--Grid row new end-->
             <!--Grid row new-->
            <div class="row" id="tselect" style=" display: flex; justify-content: center;" >
            
              <div   id="google_translate_element"></div>
              </div>
               <!--Grid row new end-->
              
          </section>
          <!-- Section: Links -->
   

         
 
        </div>
        <!-- Grid container -->
     
   
          <!-- Copyright -->
          <div class="text-center p-3 copyrightfooter" id="copyrightfooter" style="background-color: #2C33BF !important;">
            Copyright &copy; <script>document.write(new Date().getFullYear())</script>
            <a class="text-white" href="about.html">SmartEmployer</a>
          </div>
          <!-- Copyright -->
       </footer>
      <!-- Footer -->
          
    
          
          </body>
        </html>