80% of storage used … You can clean up space or get more storage for Drive, Gmail, and Google Photos.
<?php 
       session_start();
include("databaseconnect.php");   
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <link rel="shortcut icon" href="images/icon.png" >
  <meta name="theme-color" content="#F2F2F2">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css" >
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@600&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <script>
  
  let cookie = {};
  document.cookie.split(';').forEach(function(el) {
    let [key,value] = el.split('=');
    cookie[key.trim()] = value;
    localStorage.setItem("id", cookie['id']);
    
  })
    src="email-validation.js"
    
    
    
     $(document).ready(function(){
    
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
document.cookie = "id= ";
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

      function countryChange(country) {
            var selectedText = country.options[country.selectedIndex].innerHTML;
            var selectedValue = country.value;
            alert("Selected Text: " + selectedText + " Value: " + selectedValue);
        }
     
    
    function printError(elemId, hintMsg) {
        document.getElementById(elemId).innerHTML = hintMsg;
        
    }
    
    
    var lookup = {
   'Australia': ['Sydney', 'Melbourne', 'Brisbane','	Perth','	Adelaide','Gold Coast – Tweed Heads','Newcastle – Maitland','Canberra – Queanbeyan','Central Coast','Sunshine Coast','	Wollongong','Geelong','Hobart','Townsville','Cairns','	Toowoomba','Darwin','Ballarat','Bendigo','Albury – Wodonga','Launceston','	Mackay','Rockhampton','	Bunbury','Coffs Harbour'],
   'Canada': ['Toronto', 'Montreal','	Vancouver','Ottawa','Edmonton','Calgary','Quebéc','Manitoba','British Columbia','New Brunswick','Newfoundland and Labrador','Nova Scotia','Ontario','Prince Edward Island','Saskatchewan','Northwest Territories','Nunavut','Yukon'],
   'Pakistan': ['	Nowshera','Dadu','	Charsada','Swabi','Tando Allahyar','Nawabshah','Jhelum','Khanewal','	Kohat','Jacobabad','Abbottabad','Dera Ismail Khan','Vehari','Karachi','Lahore','Faisalabad','Rawalpindi','Multan','Gujranwala','Hyderabad','Peshawar','Islamabad','Quetta','Sargodha','Sialkot','Bahawalpur','Sukkur','Mardan','Larkana'],
   'United Kingdom':['London','Birmingham','Manchester','Leeds','Newcastle','Sheffield','Sunderland','Bradford','Liverpool','Wolverhampton'],
};
    // When an option is changed, search the above for matching choices
    $('#country').on('change', function() {
       // Set selected option as variable
       var selectValue = $(this).val();
    
       // Empty the target field
       $('#city').empty();
       
       // For each chocie in the selected option
       for (i = 0; i < lookup[selectValue].length; i++) {
          // Output choice in the target field
          $('#city').append("<option value='" + lookup[selectValue][i] + "'>" + lookup[selectValue][i] + "</option>");
       }
    });
    
    
    
    
      var $mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      $('#email').on('keypress keydown keyup',function(){
                    var eme=document.getElementById("email");
                 if (!$(email).val().match($mailformat)) {
                  // there is a mismatch, hence show the error message
                    
                      
                 }
               else{
                    // else, do not display message
                   
                   }
             });
    
            
    
      $('#search').click(function(e){
      
            e.preventDefault();
            //saving data
            $("#search").attr("disabled", false);
            var role = $("#role").val();
            var lname = $("#lname").val();
           
            var subject = $("#subject").val();
            var email = $("#email").val();
            var message = $("#message").val();
          
            var idEmp= localStorage.getItem("id");
           var subjectindex = document.getElementById("subject").selectedIndex;
    
           if(role=="" || lname==""   ||  subjectindex==0 || email=="" || message=="" 
          ){
            
            printError("error", "All fields are required");
          }
          else{
           
    
    
    
      //email pattern & password check
      var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
      var check=document.getElementById("email");
      
    
      if(check.value.match(mailformat)){
        
          $("#search").attr("disabled", true);
          
    
          
            $.ajax({
                type: "POST",	
                url: "newContactEntry.php",
                dataType: "json",
                data: {role:role,lname:lname,subject:subject,email:email,message:message},
                
                
                success : function(data){
                  var data = JSON.parse(data);
                    if (data.code == "200"){
                      
                      $("#search").removeAttr("disabled");
                      
                                  
                                
                      
                    }//if end
                }//function end    
               }//ajax  end 
               );//ajax end
               alert("Your Form has been Submitted Successfully!");
               location.reload();
    }//if end                        
    }
      //paswword unmatched alert    
    if (confirmpassword!=password ) {
        
        printError("error", "Password doesn't match");
     
           
    }
    
     
    
      //invalid email alert
      var a=check.value;
      if(!a.match(mailformat))
      {
        printError("error", "Please enter a valid email");
                  
      } 
    //if end   
    
    //empty fields alert
    
    
    
    });
      
      
     
     // Initialize Tooltip
     $('[data-toggle="tooltip"]').tooltip(); 
      
      // Add smooth scrolling to all links in navbar + footer link
      $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
    
          // Prevent default anchor click behavior
          event.preventDefault();
    
          // Store hash
          var hash = this.hash;
    
          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 900, function(){
       
            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        } // End if
      });
    });
    
    
    
    </script>

<style>


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


    </head>
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
          <li class="active"> <a href="jobFeed.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="glyphicon glyphicon-user"></span> Me
              <span class="caret"></span>
            </a>
           
            <ul class="dropdown-menu" > 
  
              <li><a class="dropdown-item" href="candidateProfile.html">View Profile</a></li>
              <li><a class="dropdown-item" href="myJobs.php">My Jobs</a></li>
              <li><a class="dropdown-item" href="FAQs.html">FAQs</a></li>
              <li><a class="dropdown-item" id="logout" href="#">Log Out</a></li>
            </ul>
          </li>
          
        </ul>
      </div>   
      </div>
    </nav>


  <body id="myPage" data-spy="scroll" data-offset="50" style="margin-top: 10%!important;;">
  <button onclick="topFunction()" id="scrollBtn"><span class="glyphicon glyphicon-chevron-up"></span></button>
  
    <div class="container gy-0" >
    

       
    
      <form action="newEmployerSignup.php" method="POST" name="signup"  id="signup">
        <div class="row gy-0 ">
   
            <div class="col-lg-8 col-md-8">

    <div id="alert"></div>  
    <div class="errormessage" id="error"></div>
        <div class="form-group">
          <div class="controls">
         
            <input   type="text" id="role" name="role"  class="form-control" placeholder="Search by Title...">
            
          </div>
        </div>
    

    </div>
    <div class="col-lg-2 col-md-2"> 

        <div class="form-group">
            <div class="controls">
           
              <select   id="experienceLevel" name="experienceLevel"  class="form-control" placeholder="experienceLevel">
              <option value="" selected disabled hidden>Experience</option>        
                <option>Internship</option>
                <option>Entry Level</option>
                <option>Associate</option>
                <option>Mid Level</option>
                <option>Director</option>
                <option>Executive</option>
             </select>
          
            </div>
          </div>
    
    </div>

    <div class="col-lg-2 col-md-2"> 
        <div class="form-group">
            <div class="controls">
           
              <select   id="jobType" name="jobType"  class="form-control" placeholder="jobType">
              <option value="" selected disabled hidden>Job Type</option>        
                <option>Internship</option>
                <option>Full Time</option>
                <option>Contract</option>
               
             </select>
          
            </div>
          </div>
    </div>

</div>

<div class="row gy-0 ">
   


<div class="col-lg-3 col-md-3 ">
 
   
        <div class="form-group">
            <div class="controls">
          
              
               <select   id="country" name="country"  class="form-control" placeholder="country" >
                <option  value="" >Country</option>        
                <option value="Australia" > Australia</option>
                <option value="Canada" > Canada</option>
                <option value="Pakistan" >Pakistan</option>
               <option value="United Kingdom"  >United Kingdom</option>
              </select>
       
            </div>
          </div>
</div>
          <div class="col-lg-3 col-md-3">        
      <div class="form-group">
            <div class="controls">
             
              <select   id="city" name="city"  class="form-control" placeholder="city">
       <option  value="" selected disabled hidden>City</option>       
              </select>
      
            </div>
          </div>
       
        </div>
        <div class="col-lg-3 col-md-3">  
          <div class="form-group">
            <div class="controls">
           
              <select   id="remote/onsite" name="remote/onsite"  class="form-control" placeholder="remote/onsite">
              <option value="" selected disabled hidden>Remote/On-Site</option>        
                <option>On-Site</option>
                <option>Remote</option>
    
               
             </select>
          
            </div>
          </div>
    
    </div>
    
   
    
    <div class="col-lg-3 col-md-3">
      <div class="row">
      <button  style="height:38px;width:190px;margin:auto;background-color: #2C33BF;color: white;" type="search" id="search" class="btn btn-secondary btn-lg btn-block" value="save" name="save">Search</button>
    </div>
 
    <br>
    </div>

    
</div>
     
</div>    
</form>
    
</div> 
    
<div class="container gy-0" >

    <div class="row gy-0 ">
   
        <div class="col-lg-12 col-md-12">

  <center> <h2 class="text mainheadings" >Recent Jobs</h2></center>
  <?php  
   $todayDate= time();
  $result = mysqli_query($conn,"SELECT * FROM jobs WHERE LastDate> NOW() ORDER BY CurrentDate DESC");

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

<a href="#" data-toggle="modal" data-target="#modalRegister" class="btn  btn-go btn-primary">Apply Now</a>
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

</div> 
</div> 
     </div>

<script>
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
</body>    

         <!-- Footer -->

         <footer class="text-center text-white subfooter">
            <!-- Grid container -->
            <div class="container p-4">
             
              
          
              <!-- Section: Text -->
              <section class="mb-4">
               
              <!-- Section: Text -->
          
              <!-- Section: Links -->
              <section class="">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0 ">
                    <h5 class="text-uppercase">Quick Links</h5>
          
                    <ul class="list-unstyled mb-0">
                      <li>
                        <a href="about.html" class="text-white">About Smart Employer</a>
                      </li>
                      <li>
                        <a href="contact.html" class="text-white">Contact US</a>
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
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Explore More</h5>
          
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
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Policies</h5>
          
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
                  <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Find Us on</h5>
          
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
                <div class="row" style=" display: flex; justify-content: center;">
          
          <div   id="google_translate_element"></div>
          </div>
              </section>
              <!-- Section: Links -->
            </div>
            <!-- Grid container -->
          
            <!-- Copyright -->
            <div class="text-center p-3 copyrightfooter" style="background-color: #2C33BF !important;">
              Copyright &copy; <script>document.write(new Date().getFullYear())</script>
              <a class="text-white" href="about.html">SmartEmployer</a>
            </div>
            <!-- Copyright -->
          </footer>
          <!-- Footer -->
         
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
 <script src="scripting.js"></script>
  <script src="scrollScript.js"></script>
  </body>
    </html>