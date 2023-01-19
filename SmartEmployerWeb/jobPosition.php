
<?php 
  session_start();    
include("databaseconnect.php");   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="images/icon.png" >
<meta name="theme-color" content="#F2F2F2">
<title>Recruitment Details</title>
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



    </head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
*{
    margin:0;
    padding:0;
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
  
 

.image{
    position:relative;
}
.image span {
    height: 80px;
    width: 80px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    background-color: #ccc;
    border: 5px solid #fff;
    position:absolute;
    top:0px;
    left: 0%;
  transform: translateX(-50%);
}
.image span img {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    object-fit: cover
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
      <a class="navbar-brand" href="index.html"><img  src="images/selogo.png" class="logo" alt="Smart Employer Logo"></a>
    
      </div>
      <div class="navbar-collapse collapse" id="myidname">  
      
      <ul class="nav navbar-nav navbar-right">
        <li > <a href="employerDashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="glyphicon glyphicon-user"></span> Me
            <span class="caret"></span>
          </a>
         
          <ul class="dropdown-menu" > 

            <li><a class="dropdown-item" href="employerProfile.html">View Profile</a></li>
         
            <li><a class="dropdown-item" href="FAQs.html">FAQs</a></li>
            <li><a class="dropdown-item" id="logout" href="#">Log Out</a></li>
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


  <?php  
  $todayDate= time();
            
  $result = mysqli_query($conn,"SELECT * FROM jobs WHERE JobID='" .$_COOKIE['jobId']."'");

  while($row = mysqli_fetch_array($result)){
    $datePosted = $row['CurrentDate'];
    $days = round((  $todayDate -  strtotime($datePosted))/86400);
   $hours = round(( $todayDate -  strtoTime($datePosted)) / 24/60);
    $mins = round(( $todayDate -  strtoTime($datePosted))%60);
   $string = $row['Skills'];
   $skill = explode (",", $string); 
    $i= count($skill);

    $string2 = $row['FieldOfStudy'];
    $field = explode (",", $string2); 
     $m= count($field );

     if($row['Phase']=='CV Collection'){
     $range=0;
     }
     elseif($row['Phase']=='CV Sceening'){
     $range=25;
     }
   elseif($row['Phase']=='Interviewing')
   { $range=50;}
   elseif($row['Phase']=='Face-to-Face Interview')
   { $range=75;}
   else{$range=100;}
     ?>
     <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="employerDashboard.php">Home</a></li>
        <li class="breadcrumb-item active">Recruitment Tracking</li>
    </ol>
</nav>


  <div class="progress">

   

  <div class="progress-bar" role="progressbar" style="width:<?php echo $range?>%; background-color:#2B33C0!important;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $range?>%</div>
</div>
     <div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Phase : <?php echo $row['Phase'];?> </div> 
   <button class="accordion"> <div class="h1" style="color: #2C33BF!important;"><?php echo $row['JobTitle'];?></div> 
   
    <div>
    <?php echo $row['OrganizationName'];?></div>
    <span class="h6" style="color: #979797!important;float: left;" > <?php echo 'Status : ' . $row['Status'];?>
    </span>

    <?php if ($days>=1){ ?>
      <span  class="h6" style="color: #979797!important;float: right;" >    <?php echo $days. ' days ago ' ;?>
      </span>
       <?php } else if ($days<1 && $hours>=1){ ?>
        <span  class="h6" style="color: #979797!important;float: right;" >   <?php echo $hours. ' hours ago ' ;?>
        </span>       
        <?php } else if ($hours<=0){ ?>
                  <span  class="h6" style="color: #979797!important;float: right;" >   <?php echo  ' just now ' ;?>
                  </span>
                <?php }

               else{  ?>
          <span  class="h6" style="color: #979797!important;float: right;" >   <?php echo $mins. ' mins ago ' ;?>
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
 
<ul style="list-style: none;">
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
 

<ul style="list-style: none;">
    <?php 
    
    for($n=0;$n<$m;$n++){
    ?>
    <li><?php echo $row['Degree']. ' ( '.$field[$n] .' )';?></li>
  <?php } ?>
  </ul>  

<br>
<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Location</div> 
 

  <p> <?php echo $row['City'] . ', '. $row['Country']  ?></p>

<br>
<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Job Type</div> 
 

  <p> <?php echo $row['RemoteOnsite'] ?></p>

<br>


<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Dated Posted</div> 
 

  <p> <?php echo $row['CurrentDate'];?></p>

<br>

<div class="h5" style=" font-weight: bold;color: #6e83e4!important;">Expected Salary</div> 
 

  <p> <?php echo $row['ExpectedSalary'];?> </p>


<br><br>
</div> 


<?php } ?>




</div> 
</div> 
<div class="col-sm-4"></div>

<div class="col-sm-4">
  <div class="row">
  <button onclick="parent.location='cvAnalysisReport.html'" style="margin:auto;margin-bottom:2%;border-radius:25px;background-color: #2C33BF;color: white;"  id="submit" class="btn btn-secondary btn-lg btn-block"  name="save">Screen CVs</button>
</div>
</div>
<div class="col-sm-4"></div>
     </div>
  
     <center> <h2 class="text mainheadings" style="margin:0px !important;padding:0px !important;">Applicants</h2></center>
     <?php  $result1 = mysqli_query($conn,"SELECT * FROM jobapplications LEFT JOIN candidates ON jobapplications.ApplicantID = candidates.CandidateID WHERE JobID='" .$_COOKIE['jobId']."'");
  $rowcount = mysqli_num_rows( $result1 );
  ?>
  

     <h3 class="text mainheadings" style="color:black !important;" >Total Applicants(<?php echo $rowcount ;?>)</h3>
  <div class="container" >
 
  <div class="row" style="background-color:#2C33BF;color:white;">
      <br>
         
     
          <div class="col-xs-4" style="text-align:center;">
            <h4>Name</h4>
          </div>
        
          <div class="col-xs-4" style="text-align:center; padding: 0px 0px;
          overflow: hidden;">
            <h4>Email</h4>
          </div>
       
          <div class="col-xs-4" style="text-align:center; padding: 0px 0px;
          overflow: hidden;">
            <h4>Location</h4>
          </div>

<br>
</div>

<?php  


 
 while($row1 = mysqli_fetch_array($result1)){

   ?>
    <div class="row" style="background-color:white;">
      <br>
         
     
          <div class="col-xs-4" style="text-align:center;">
            <p><?php echo $row1['FirstName'] . ' '. $row1['LastName']  ;?></p>
          </div>
        
          <div class="col-xs-4" style="text-align:center; padding: 0px 0px;
          overflow: hidden;">
            <p><?php echo $row1['Email']  ;?></p>
          </div>
       
          <div class="col-xs-4" style="text-align:center; padding: 0px 0px;
          overflow: hidden;">
            <p><?php echo $row1['City'] . ', '. $row1['Country']  ;?></p>
          </div>

<br>
</div>
<?php }

if($rowcount==0){
?>
  <h3 class="text mainheadings" style="color:grey !important;" >No Applications have been recieved yet.</h3>
<?php }?>
</div>   </div>
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