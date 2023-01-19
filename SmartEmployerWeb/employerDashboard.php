<?php 
    session_start();
    include("databaseconnect.php");   
  
?>

<!DOCTYPE html>
<head>
<title>Home</title>
<link rel="shortcut icon" href="images/icon.png" >
  <meta name="theme-color" content="#F2F2F2">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    </head>

<style>
    
*{
    margin:0;
    padding:0;
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 86%;
  left: 0;
  right: 0;
  
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

.container{
font-family: Arial, Helvetica, sans-serif;

}


.card{
    height:350px;
    width:320px;
    background-color:#fff;
    border-radius:10px;
    position:relative;
    overflow:hidden;
    font-family: 'Poppins', sans-serif;
    cursor:pointer;
    
}


.text{
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    margin-top:5%;
}
.text p{
    font: size 2em;;
}


section { 
  display: block;
  margin: 3%;

}

span{display:inline-block ;

}

.cardsection{background-color: #ffffff;   border: 2px solid #d9d9dd;; border-radius: 25px;}

.i{  padding-right: 0%;
    right:  50%;
  transform: translateX(50%);
  }

.i a {color: #2C33BF;}
 


html,
body {
	padding: 0;
	margin: 0;


	height: 100vh;

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
        <li class="active"> <a href="employerDashboard.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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

  <div  style="background-color: #F2F2F2;" class=" intro" style="padding-top: 0%;">
    <div class="sectiontext align-content-md-center">

<br><br>
<div class="container" style="padding: 0 !important;">
  <ul class="nav nav-tabs " style="background-color:#dedede;">

    <li class="active" ><a data-toggle="tab" href="#post">Add New Job</a></li>
    <li><a data-toggle="tab" href="allrecruitments">All Recruitments</a></li>
    <li><a data-toggle="tab" href="#schedule">Schedule Interview</a></li>
    <li><a data-toggle="tab" href="#pool">Talent Poll</a></li>
  </ul>

  <div class="tab-content ">

    <div class="container jumbotron" style="background-color:#F2F2F2;">
    <div id="post" class="tab-pane active">
      <div class="container gy-0" >

        <div class="row gy-0 ">
         <h4 style="text-align:center;color:black;">Create New Job Post</h4> 
      <hr ></hr>
      <div id="alert"></div>  
      <div class="errormessage text-center" id="error"></div>
          <div class="col-sm-6">
         
      
        <form autocomplete="off" action="newJobAddition.php" method="POST" name="newJob"  id="newJob">
      
     
          <div class="form-group">
            <div class="controls">
              <label>Job Title</label>
              <input  style="border-radius:25px;" type="text" id="jobTitle" name="jobTitle"  class="form-control" placeholder="Job Title">
              
            </div>
          </div>
      
          <div class="form-group">
            <div class="controls">
              <label>Job Description</label>
              <textarea   rows="5" cols="10" type="text" id="jobDescription"  name="jobDescription" class="form-control" placeholder="Type the job description here..." ></textarea>
            </div>
           
          </div>   
      <div class="form-group">
            <div class="controls">
              <label>Country</label>
              
               <select  style="border-radius:25px;" id="country" name="country"  class="form-control" placeholder="country" >
                <option  value="" >Please select country</option>        
                <option value="Australia" > Australia</option>
                <option value="Canada" > Canada</option>
                <option value="Pakistan" >Pakistan</option>
               <option value="United Kingdom"  >United Kingdom</option>
              </select>
       
            </div>
          </div>
          <div class="form-group">
            <div class="controls">
              <label>City</label>
              <select  style="border-radius:25px;" id="city" name="city"  class="form-control" placeholder="city">
       <option  value="" selected disabled hidden>Please select country first</option>       
              </select>
      
            </div>
          </div>

          
      

          
            <div class="form-group">
                <div class="controls">
                  <label>Job Type</label>
                  <select  style="border-radius:25px;"  id="jobType" name="jobType"  class="form-control" placeholder="jobType">
                  <option value="" selected disabled hidden>Please select Job Type</option>        
                    <option>Internship</option>
                    <option>Full Time</option>
                    <option>Contract</option>
                   
                 </select>
              
                </div>
              </div>      
              <div class="form-group">
                <div class="controls">
                  <label>Degree</label>
                  
                   <select  style="border-radius:25px;" id="degree" name="degree"  class="form-control" placeholder="Degree" >
                    <option  value="" >Please select degree</option>        
                    <option value="BS" > BS</option>
                    <option value="BSc" > BSc</option>
                    <option value="MS" > MS</option>
                    <option value="MSc" > MSc</option>
                    <option value="MPhil" > MPhil</option>
                    <option value="PhD" > PhD</option>
                  
                  </select>
           
                </div>
              </div>

              <div class="form-group">
                <div class="controls ">
                  <div class="autocomplete" >
                  <label>Field of Study</label>
                  <input style="border-radius:25px;" id="fieldOfStudy" type="text" name="fieldOfStudy"  class="form-control" placeholder="Field Of Study">
                </div>
                </div>
              </div>

              <div class="form-group">
                <div class="controls">
     
                  <textarea  disabled rows="3" cols="10" type="text" id="field"  name="field" class="form-control" placeholder="" ></textarea>
                </div>
          
              </div>
              <div class="form-group">
                <div class="controls">
     
                 
                 <label>No. of Positions</label>
                  <select  style="border-radius:25px;"  id="tpositions" name="tpositions"  class="form-control" placeholder="tpositions">
                  <option value="" selected disabled hidden>Please select no. of positions</option>        
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                 </select>
              </div>
              </div>

      </div>
    
      <div class="col-sm-6">

        <div class="form-group">
          <div class="controls">
            <label>Organization Name</label>
            <input  style="border-radius:25px;" type="text" id="organizationName" name="organizationName"  class="form-control" placeholder="Organization Name">
           
            </div>
        </div>

        <div class="form-group">
          <div class="controls">
            <label>About Organization</label>
            <textarea rows="5" cols="10" type="text" id="aboutOrganization"  name="aboutOrganization" class="form-control" placeholder="Type about the organization here..." ></textarea>
          </div>
         
        </div>

        <div class="form-group">
          <div class="controls">
            <label>Experience Level</label>
            <select  style="border-radius:25px;" id="experienceLevel" name="experienceLevel"  class="form-control" placeholder="experienceLevel">
            <option value="" selected disabled hidden>Please select experience level</option>        
            <option>Internship</option>
            <option>Entry Level</option>
            <option>Associate</option>
            <option>Mid Level</option>
            <option>Director</option>
            <option>Executive</option>
           </select>
         
          </div>
        </div>  
  
  
      <div class="form-group">
            <div class="controls">
              <label>Experience Range</label>
              <select  style="border-radius:25px;" id="experienceRange" name="experienceRange"  class="form-control" placeholder="Experience Range">
              <option value="" selected disabled hidden>Please select years of experience</option>        
                <option>0 - 1</option>
                <option>1 - 2</option>
                <option>3 - 6</option>
                <option>8 - 10</option>
                <option>10- 15</option>
        
             </select>
          
            </div>
          </div>
          <div class="form-group">
            <div class="controls">
              <label>Remote/On-Site</label>
              <select  style="border-radius:25px;" id="remoteOnsite" name="remoteOnsite"  class="form-control" placeholder="remoteOnsite">
              <option value="" selected disabled hidden>Select Remote or On-Site</option>        
                <option>On-Site</option>
                <option>Remote</option>
    
               
             </select>
          
            </div>
          </div>
          
          
          <div class="form-group">
            <div class="controls">
              <label>Expected Salary</label>
              <input  style="border-radius:25px;" type="text" id="expectedSalary" name="expectedSalary"  class="form-control" placeholder="70,000 - 90,000">
              
            </div>
          </div>

          <div class="form-group">
            <div class="controls ">
              <div class="autocomplete" >
              <label>Required Skills</label>
              <input style="border-radius:25px;" id="requiredSkills" type="text" name="requiredSkills"  class="form-control" placeholder="Required Skills">
            </div>
            </div>
          </div>

          <div class="form-group">
            <div class="controls">
 
              <textarea  disabled  rows="3" cols="10" type="text" id="skills"  name="skills" class="form-control" placeholder="" ></textarea>
            </div>
 
            
              
          </div>


          <div class="form-group">
                <div class="controls">
     
                <label>Last Date of Application</label>
 
                 <input style="border-radius:25px;" type="date"  id="lastdate" name="lastdate"  class="form-control" placeholder="lastdate">

              </div>
              </div>
      </div>
      
      <div class="col-sm-4"></div>
      
      
      <br>
      </div>
      <div class="col-sm-4"></div>
      <div class="col-sm-4">
        <div class="row">
        <button  style="margin:auto;margin-bottom:2%;border-radius:25px;background-color: #2C33BF;color: white;" type="submit" id="submit" class="btn btn-secondary btn-lg btn-block" value="save" name="save">Post</button>
      </div>
  
      </form>
      
       
      
      
      </div>
       
      </div>
         
      
          
    </div>
    <div id="allrecruitments" class="tab-pane hidden text-center" >
    <h3 class="text mainheadings" style="color:black !important;" >All Recruitments</h3>
    <br>
      <?php  
            $todayDate= time();
            
               $result = mysqli_query($conn,"SELECT * FROM jobs WHERE postedBy ='" . $_COOKIE["id"] . "' ORDER BY CurrentDate DESC");
               $rowcount = mysqli_num_rows( $result );
               if( $rowcount !=0){
               while($row = mysqli_fetch_array($result)){
              
                 $id=$row['JobID'];
                $datePosted = $row['CurrentDate'];
                $days = round((  $todayDate -  strtotime($datePosted))/86400);
               $hours = round(( $todayDate -  strtoTime($datePosted)) / 24/60);
                $mins = round(( $todayDate -  strtoTime($datePosted))%60);
                  ?>

        <span class="card card1" style="width: 30rem;margin-bottom:1%;">
            <div class="card-body">
               <h5 class="card-title" style="font-size:18px !important;font-weight: bold !important; "><?php echo $row['JobTitle'];?></h5>
               <br>
               <p class="card-text"  style="color: black !important;font-size:15px !important;font-weight: bold !important; "><?php echo 'Job ID : '. $row['JobID'];?></p>
               <p class="card-text" style="color: black !important;font-size:10px !important;font-weight: bold !important; "><?php echo $row['OrganizationName'];?></p>
               <p class="card-text" style="color: black !important;font-size:10px !important;font-weight: bold !important; "><?php echo $row['City'] . ' , '. $row['Country'];?></p>
               <?php if ($days>=1){ ?>
               <p class="card-text" style="color: black !important;font-size:10px !important;font-weight: bold !important; "> <?php echo $days. ' days ago ' ;?></p>
               <?php } else if ($days<1 && $hours>=1){ ?>
                <p class="card-text"><?php echo $hours. ' hours ago ' ;?></p>
                <?php } else if ($hours<=0){ ?>
                <p class="card-text"><?php echo  ' just now ' ;?></p>
                <?php }

               else{  ?>
               <p class="card-text"><?php echo $mins. ' mins ago ' ;?></p>
               <?php 
            } ?>
               <p class="card-text" style="color: blue !important;font-size:18px !important;"><?php echo $row['Status'];?></p>
               <a id="<?php echo $id ;?>" class="btn  btn-go btn-primary track" >View</a>
               
            </div>
        
          </span>
          &nbsp;
          <?php } 
    }
          else{ ?>
            
            <h2>No Recruitments!</h2>
            <p>You haven't started recruitment yet! Once you start recruitment, all your initiated recruitments will appear here.</p>
            <?php
            
            }


          ?>
         

         
          
    </div>
    <div id="schedule" class="tab-pane hidden" >
      

    <h3 class="text mainheadings" style="color:black !important;" >Schedule</h3>
 
    </div>
    <div id="pool" class="tab-pane hidden" >
     
     <?php  $result1 = mysqli_query($conn,"SELECT * FROM jobapplications LEFT JOIN candidates ON jobapplications.ApplicantID = candidates.CandidateID 
     LEFT JOIN jobs ON jobapplications.JobID = jobs.JobID WHERE postedBy='" . $_COOKIE["id"] . "'      ");
  $rowcount = mysqli_num_rows( $result1 );
  ?>
     <h3 class="text mainheadings" style="color:black !important;" >Pool Count (<?php echo $rowcount ;?>)</h3>
     <p align="center">All applicants you have come across so far.</p>
  <div class="container" >
 
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
  <h3 class="text mainheadings" style="color:grey !important;" >No pool to show.</h3>
<?php }?></div></div>


  </div>
</div>
</div>


<br>
</div></div>

<script>


  let cookie = {};
  document.cookie.split(';').forEach(function(el) {
    let [key,value] = el.split('=');
    cookie[key.trim()] = value;
    localStorage.setItem("id", cookie['id']);
    
  })
  


    $(document).ready(function() {
      $(".track").on("click", function() {
        var jobId=event.target.id;
        localStorage.setItem("jobId", jobId);

    $.ajax({
                type: "POST",
                url: "jobTrackRedirect.php",
                dataType: "json",
                data: {jobId:jobId},
                success : function(data){
                    if (data.code == "200"){
                          window.location.replace("jobPosition.php");
                      }
                    }
    
     });//ajax end
    
});  


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


      var skills=[]; 
      var fields=[]; 
      
      function autocomplete(inp, arr) {
/*the autocomplete function takes two arguments,
the text field element and an array of possible autocompleted values:*/
var currentFocus;
/*execute a function when someone writes in the text field:*/
inp.addEventListener("input", function(e) {
    var a, b, i, val = this.value;
    /*close any already open lists of autocompleted values*/
    closeAllLists();
    if (!val) { return false;}
    currentFocus = -1;
    /*create a DIV element that will contain the items (values):*/
    a = document.createElement("DIV");
    a.setAttribute("id", this.id + "autocomplete-list");
    a.setAttribute("class", "autocomplete-items");
    /*append the DIV element as a child of the autocomplete container:*/
    this.parentNode.appendChild(a);
    /*for each item in the array...*/
    for (i = 0; i < arr.length; i++) {
      /*check if the item starts with the same letters as the text field value:*/
      if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
        b.innerHTML += arr[i].substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", function(e) {
            /*insert the value for the autocomplete text field:*/
            inp.value = this.getElementsByTagName("input")[0].value;
 
var GetValue=$("#fieldOfStudy").val();
if(countries.includes(GetValue))  {   

 fields.push(GetValue);
 let ffields = fields.toString();
 $("#field").val(ffields);
 document.getElementById('fieldOfStudy').value=null;
        }

var skillValue=$("#requiredSkills").val();   
if(allskills.includes(skillValue))  {  
 
 skills.push(skillValue);
 let sskills = skills.toString();
 $("#skills").val(sskills);
 
 document.getElementById('requiredSkills').value=null;
        }
            /*close the list of autocompleted values,
            (or any other open lists of autocompleted values:*/
            closeAllLists();
        });
        
        a.appendChild(b);
      }
    }
});
/*execute a function presses a key on the keyboard:*/
inp.addEventListener("keydown", function(e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
      increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) { //up
      /*If the arrow UP key is pressed,
      decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
});
function addActive(x) {
  /*a function to classify an item as "active":*/
  if (!x) return false;
  /*start by removing the "active" class on all items:*/
  removeActive(x);
  if (currentFocus >= x.length) currentFocus = 0;
  if (currentFocus < 0) currentFocus = (x.length - 1);
  /*add class "autocomplete-active":*/
  x[currentFocus].classList.add("autocomplete-active");
}
function removeActive(x) {
  /*a function to remove the "active" class from all autocomplete items:*/
  for (var i = 0; i < x.length; i++) {
    x[i].classList.remove("autocomplete-active");
  }
}
function closeAllLists(elmnt) {
  /*close all autocomplete lists in the document,
  except the one passed as an argument:*/
  var x = document.getElementsByClassName("autocomplete-items");
  for (var i = 0; i < x.length; i++) {
    if (elmnt != x[i] && elmnt != inp) {
      x[i].parentNode.removeChild(x[i]);
    }
  }
}
/*execute a function when someone clicks in the document:*/
document.addEventListener("click", function (e) {
    closeAllLists(e.target);
});
}

/*An array containing all the country names in the world:*/
var countries = ['Architecture', 'Arts', 'Business','Business Administration',
 'Computer Science','Software Engineering','Criminal Justice',
'Education','Wireless Engineering','Agricultural Engineering',
 'Biological Systems','Biosystems and Agricultural',
 'Biological Engineering','Biomedical Engineering',
 'Chemical Engineering','Chemical and Biomolecular Engineering','Civil Engineering',
 'Computer Engineering', 'Computer Science and Engineering','Electrical Engineering',
 'Mechanical Engineering','Computer Engineering Technology','Fine Arts',
 'Forestry','Forest Research','Journalism','Laws','Literature',
'Marine Science','Nursing','Pharmacy',
'Philosophy','Sciencce','Chemistry','Technology','Accountancy','Advanced Study',
'Agricultural Economics','Applied Finance','Applied Science',
'Architecture','Special Education.','Teaching','Bioethics','Business, Entrepreneurship and Technology',
'Business Engineering','Business Informatics',
'Commerce','Computational Finance','Computer Applications','Data Science','Economics',
'Engineering Management','Financial Economics','Financial Mathematics','Health Science',
'Humanities','Industrial and Labor Relations','International Affairs','International Business','International Economics',
'Information and Cybersecurity','Information and Data Science','Information Management','Information System Management','Journalism','Mass Communication',
'Library and Information Science','Marketing','Medical Science','Mathematics','Medicine','Physics',
'Political Science','Psychology','Public Administration','Public Affairs','Public Health','Administration','Bioinformatics',
'Cyber Security','Finance','Health Informatics','Information Systems','Information Technology',
'Management','Project Management','Supply Chain Management','Social Science'
];
var allskills = [".NET Framework","A++",'Accounting','Acount Management','Adobe After Effect','Adobe Creative Suit','Adobe InDesign','Adobe Photoshop','Advertising',
'Agile Methodologies','Ajax','Analytical skills','Angular JS','AutoCAD','Banking','Blogging','Brand Development','Budgeting','Business Analysis',
'Business Development','Business Intelligence','Business Planning','Business Process Development','Business Strategy','C (Programming Language)','C#',
'C++','Change Management','Communication skills','Construction Management','Content Writing','Contract Management','Cross-functional Team Leadership',
'CSS','Customer Relationship Management','Data Analysis','Data Entry','Database','E-Commerce','Editing','Email Marketing','ERP'
,'Event Management','Event Planning','Figma','Financial Accounting','Financial Management','Forecasting','Git','Graphic Designing',
'HR Consulting','HTML','Java','Adobe llustrator','Java','JavaScript','JavaServer Pages (JSP)','Jira','Joomla','JSON','Kaizen','Kanban','Keyword Research',
'Lead Generation','Leadership Skills','Lean Manufacturing','Legal Writing','Linux','Microsoft Excel','Microsoft Office','Microsoft PowerPoint','MYSQL','Network Security',
'Networking','Neywork Administration','Node JS','Online Advertising','Oracle Dataase','PHP','Presentation Skills','Problem-solving Skills',
'Product Development','Python','React Native','Requirements Analysis','Research and Development','Ruby','Slack','Social Media Management','Social Media Marketing','Software as a Service (SaaS)',
'Software Development Life Cycle (SDLC)','SQL','Supply Change Management','Team Building','Technical Skills','Technical Writing','User Experience (UX)',
'User Interface (UI)','Visual Design','Web Design','Web Development'

];
/*initiate the autocomplete function on the "fieldOfStudy" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("fieldOfStudy"), countries);
autocomplete(document.getElementById("requiredSkills"), allskills);


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


// When an option is changed, search the above for matching choices
$('#degree').on('change', function() {
 // Set selected option as variable
 var selectValue = $(this).val();


});






    $(".nav-tabs li").on("click", function() {
        if($(this).index()==0){
         $("#post").show();
  }

  else{
    $("#post").hide();

  }

  if($(this).index()==1){
         $("#allrecruitments").show();
         $("#allrecruitments").removeClass("hidden");
  }

  else{
    $("#allrecruitments").hide();

  }

  if($(this).index()==2){
         $("#schedule").show();
         $("#schedule").removeClass("hidden")
  }

  else{
    $("#schedule").hide();

  }
  if($(this).index()==3){
         $("#pool").show();
         $("#pool").removeClass("hidden")
  }

  else{
      $("#pool").hide();

  }

  

    });

    
$('#submit').click(function(e){

e.preventDefault();
//saving data
$("#submit").attr("disabled", false);
var jobTitle = $("#jobTitle").val();
var jobDescription = $("#jobDescription").val();
var organizationName = $("#organizationName").val();
var aboutOrganization = $("#aboutOrganization").val();
var country = $("#country").val();
var city = $("#city").val();
var experienceLevel = $("#experienceLevel").val();
var experienceRange = $("#experienceRange").val();
var jobType = $("#jobType").val();
var degree = $("#degree").val();
var expectedSalary = $("#expectedSalary").val();
var remoteOnsite = $("#remoteOnsite").val();
var field = $("#field").val();
var skills = $("#skills").val();
var lastdate = $("#lastdate").val();
var tpositions = $("#tpositions").val();

var countryindex = document.getElementById("country").selectedIndex;
var cityindex = document.getElementById("city").selectedIndex;
var expLevelindex = document.getElementById("experienceLevel").selectedIndex;
var expRangeindex = document.getElementById("experienceRange").selectedIndex;
var jobTypeindex = document.getElementById("jobType").selectedIndex;
var remoteindex = document.getElementById("remoteOnsite").selectedIndex;
var degreeindex = document.getElementById("degree").selectedIndex;
var  totalpositions = document.getElementById("tpositions").selectedIndex;
var idEmp= localStorage.getItem("id");

const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();
let hours = date.getHours();
let minutes =date.getMinutes();


// date's format 
let dDate = `${year}-${month}-${day}`;
let hHour = `${hours}:${minutes}`;

let currentDate= String(dDate).concat(" ", String(hHour));

if(jobTitle=="" || jobDescription=="" || lastdate=="" || organizationName=="" || aboutOrganization==""   || countryindex==0 || totalpositions==0 ||   cityindex==0   ||   expLevelindex==0   ||  expRangeindex==0 ||  jobTypeindex==0 ||remoteindex==0 || degreeindex==0 || field=="" || skills==""|| expectedSalary==""
){

  
Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'All fields are required!',

})
}
else{


$.ajax({
    type: "POST",	
    url: "newJobAddition.php",
    dataType: "json",
    data: {lastdate:lastdate,tpositions:tpositions,idEmp:idEmp,currentDate:currentDate,jobTitle:jobTitle, jobDescription:jobDescription,organizationName:organizationName,experienceRange:experienceRange,country:country,city:city,experienceLevel:experienceLevel,aboutOrganization: aboutOrganization,experienceRange: experienceRange,jobType: jobType,degree : degree,expectedSalary:expectedSalary,remoteOnsite :remoteOnsite,field:field,expectedSalary:expectedSalary,skills:skills},
    
    
    success : function(data){
      var data = JSON.parse(data);
     
        if (data.code == "200"){
          
     
        }//if end
    
    }//function end    
    
   }//ajax  end 
   );//ajax end
   Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'Job has been posted successfully!',
  showConfirmButton: true,
  timer: 1500
})

     
   document.getElementById('jobTitle').value=null;
   document.getElementById('jobDescription').value=null;
   document.getElementById('organizationName').value=null;
   document.getElementById('aboutOrganization').value=null;
   document.getElementById('country').selectedIndex=0;
   $('#city').empty();

   document.getElementById('experienceLevel').selectedIndex=0;
   document.getElementById('experienceRange').selectedIndex=0;
   document.getElementById('jobType').selectedIndex=0;
   document.getElementById('expectedSalary').value=null;
   document.getElementById('degree').selectedIndex=0;
   document.getElementById('remoteOnsite').selectedIndex=0;
   document.getElementById('field').value=null;
   document.getElementById('skills').value=null;
 
   window.setTimeout(function () {
        location.href = "employerDashboard.php";
    }, 5000);

  }


 


});

    });
    
      </script>

</body>
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

      
     
    </html>