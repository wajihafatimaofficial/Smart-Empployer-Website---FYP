
<?php 
   
include("databaseconnect.php");   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="shortcut icon" href="images/icon.png" >
  <meta name="theme-color" content="#F2F2F2">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

   
   
    </head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
*{
    margin:0;
    padding:0;
}

.container{
font-family: Arial, Helvetica, sans-serif;

}

 
.accordion {
      background-color: rgb(255, 255, 255);
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 0.4s;
    }
    .text{
    color: rgb(97, 93, 93);
    
    }
    .accordion:hover {
      background-color: rgb(243, 243, 243);
    }
    
  
    
    .panel {
      padding: 0 18px;
      background-color: rgb(248, 248, 248);
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.2s ease-out;

      
    }

 </style>
   <nav class="navbar navbar-inverse" id="navbar"  role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myidname">    
          <span class="icon-bar"></span>    
          <span class="icon-bar"></span>    
          <span class="icon-bar"></span>    
      </button>    
      <a class="navbar-brand" href="jobFeed.php"><img  src="images/selogo.png" class="logo"></a>
      </div>
      <div class="navbar-collapse collapse" id="myidname">  
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="jobFeed.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="glyphicon glyphicon-user"></span> Me
            <span class="caret"></span>
          </a>
         
          <ul class="dropdown-menu" > 

            <li><a class="dropdown-item" href="candidateProfile.html">View Profile</a></li>
            <li><a class="dropdown-item" href="myJobs.php">My Jobs</a></li>
            <li><a class="dropdown-item" href="FAQs.html">FAQs</a></li>
            <li><a class="dropdown-item"  id="logout" href="#">Log Out</a></li>
          </ul>
        </li>
        
      </ul>
    </div>   
    </div>
  </nav>

 <body style="  background-color: #F2F2F2;">

  <div  style="background-color: #F2F2F2;" class=" intro" style="padding-top: 0%;">
    <div class="sectiontext align-content-md-center">
    <div  class="intro-heading  animate__animated animate__backInRight " style="margin-left: 0%; margin-left:3%; width:80%; "   >
      <h1 class="heading">Your Jobs</h1>
<br>
      <p class="intro-text">Let's keep track of your applied jobs.</p>
   
    </div></div><div class="image">
    <div class="animate__animated animate__backInLeft" style="margin-left: 0%;" ><img src="images/header.png" width="100%"></div>

  
      </div>

  </div>


<div class="container" style="padding: 0 !important;">
  <ul class="nav nav-tabs" >
  
    <li class="active" ><a data-toggle="tab" href="#applied">Applied</a></li>
    <li><a data-toggle="tab" href="#interviews">Interviews</a></li>
    <li><a data-toggle="tab" href="#qualified">Qualified</a></li>
  </ul>

  <div class="tab-content">

    <div class="container " style="background-color:transparent;">
    <div id="applied" class="tab-pane active">
      
  <?php  
  $todayDate= time();

  $result = mysqli_query($conn,"SELECT * FROM jobapplications LEFT JOIN jobs ON jobapplications.JobID = jobs.JobID WHERE ApplicantID='" . $_COOKIE["id"] . "' ORDER BY CurrentDate DESC ");

 while($row = mysqli_fetch_array($result)){
  $datePosted = $row['CurrentDate'];
 
  $days = round((  $todayDate -  strtotime($datePosted))/86400);
  $hours = round(( $todayDate -  strtoTime($datePosted)) /3600);
  $mins = round(( $todayDate -  strtoTime($datePosted)) /60);
  $string = $row['Skills'];
  $skill = explode (",", $string); 
   $i= count($skill);

   $string2 = $row['FieldOfStudy'];
   $field = explode (",", $string2); 
    $m= count($field );
    ?>
  <button class="accordion"> <div class="h1" style="color: #2C33BF!important;"><?php echo $row['JobTitle'];?></div> 
  
   <div>
   <?php echo $row['OrganizationName'];?></div>
   <span class="h6" style="color: #979797!important;float: left;" > <?php echo $row['City'] . ', '. $row['Country'] . ' ('.$row['RemoteOnsite'] . ')' ;?>
   </span>
   <?php if ($days>1){ ?>
   <span  class="h6" style="color: #979797!important;float: right;" >    <?php echo $days. ' days ago ' ;?>
</span>
<?php } else if ($hours<24 && $hours>=1){ ?>
   <span  class="h6" style="color: #979797!important;float: right;" >    <?php echo $hours. ' hours ago ' ;?>
</span>
<?php }else  if ($hours<=0){ ?>
   <span  class="h6" style="color: #979797!important;float: right;" >    <?php echo ' just now ' ;?>
</span>
<?php }

          else{  ?>
              <span  class="h6" style="color: #979797!important;float: right;" >    <?php $mins. ' mins ago ' ;?>
</span>
<?php 
           } ?>
</button>
<div class="panel">
   <br>
   <div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Job Description</div> 


 <p> <?php echo $row['JobDescription'];?>
</p>

<br>

   <div class="h5" style=" font-weight: bold;color: #6e83e4!important;">About Company</div> 


 <p> <?php echo $row['AboutOrganization'];?>
</p>
<br>

<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Required Skills</div> 

<ul style="padding-left:15px !important;">
   <?php 
   
   for($j=0;$j<$i;$j++){
   ?>
   <li><?php echo $skill[$j];?></li>
 <?php } ?>
 </ul>  


<br>
<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Required Experience</div> 


 <p> <?php echo $row['ExperienceRange'];?></p>

<br>
<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Required Qualification</div> 


<ul style="padding-left:15px !important;">
   <?php 
   
   for($n=0;$n<$m;$n++){
   ?>
   <li ><?php echo $row['Degree']. ' ('.$field[$n] .')';?></li>
 <?php } ?>
 </ul>  

<br>
<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Expected Salary</div> 


 <p> <?php echo $row['ExpectedSalary'];?> </p>

<br><br>


</div> 
<div id="modalRegister" class="modal fade" role="dialog">
 <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title" style="text-align-last: center">Application Submitted!</h4>
         </div>
         <div class="modal-body">
<p>You have applied successfully.</p>
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
     </div>
 </div>
</div>

<?php } ?>
</div> 
<?php 
  $result1 = mysqli_query($conn,"SELECT COUNT(JobID) FROM jobapplications LEFT JOIN jobs ON jobapplications.JobID = jobs.JobID WHERE ApplicantID='" . $_COOKIE["id"] . "'");

if($result1=0){ ?>
      <h3>No applications yet</h3>
      <p>Keep track of job applications here.</p>
<?php } ?>
    </div>
    <div id="interviews" class="tab-pane hidden" >
      <h3>No interviews yet</h3>
      <p>Scheduled interviews appear here.</p>
    </div>
    <div id="qualified" class="tab-pane hidden" >
      <h3>No jobs winned yet</h3>
      <p>Cleared jobs appear here.</p>
    </div>
  </div>
</div>
</div>

<button onclick="topFunction()" id="scrollBtn"><span class="glyphicon glyphicon-chevron-up"></span></button>
  
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
      

<script>
var x = localStorage.getItem("email");
    var y = localStorage.getItem("password");
    var z = localStorage.getItem("role");

var link;
if (z=='candidate'){

link='candidateLogin.html';
}
else{
link='employerLogin.html';

}

if (window.localStorage) {
$("#logout").on("click", function() {

localStorage.setItem("email", "");
localStorage.setItem("password", "");
localStorage.setItem("role", "");
localStorage.setItem("id", "");

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
        

      $(".nav-tabs li").on("click", function() {
        if($(this).index()==0){
         $("#applied").show();
  }

  else{
    $("#applied").hide();

  }

  if($(this).index()==1){
         $("#interviews").show();
         $("#interviews").removeClass("hidden");
  }

  else{
    $("#interviews").hide();

  }

  if($(this).index()==2){
         $("#qualified").show();
  }

  else{
    $("#qualified").hide();
    $("#qualified").removeClass("hidden")
  }
  if($(this).index()==3){
         $("#New").show();
  }

  else{
      $("#New").hide();
    $("#New").removeClass("hidden")
  }



    });


    var acc = document.getElementsByClassName("accordion");
    var i;
    
    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + "px";
        } 
      });
    }

   
  </script>
      <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
      <script src="scripting.js"></script>
       <script src="scrollScript.js"></script>
        
      </body>
    </html>