<?php 
$errorMSG="";
include 'databaseconnect.php';
// Check connection
if($conn === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{echo"Connection built<br>";}

$ttpositions = $_POST['tpositions'] ;
$lastdate = $_POST['lastdate'] ;
$idEmp = $_POST['idEmp'] ;
$currentDate = $_POST['currentDate'] ;
$jobTitle =  $_POST['jobTitle'];
$jobDescription =  $_POST['jobDescription'];
$organizationName =  $_POST['organizationName'];
$aboutOrganization =  $_POST['aboutOrganization'];
$country=  $_POST['country'];
$city=  $_POST['city'];
$experienceLevel=  $_POST['experienceLevel'];
$experienceRange=  $_POST['experienceRange'];
$jobType=  $_POST['jobType'];
$degree=  $_POST['degree'];
$expectedSalary=  $_POST['expectedSalary'];
$remoteOnsite=  $_POST['remoteOnsite'];
$field=  $_POST['field'];
$skills=  $_POST['skills'];
$sql = "INSERT INTO jobs (TotalPositions,LastDate,postedBy,CurrentDate,JobTitle,JobDescription,OrganizationName,AboutOrganization,Country,City,ExperienceLevel,ExperienceRange,JobType,Degree,ExpectedSalary,RemoteOnsite,FieldOfStudy,Skills)
VALUES('$ttpositions','$lastdate','$idEmp','$currentDate','$jobTitle','$jobDescription','$organizationName','$aboutOrganization','$country','$city','$experienceLevel','$experienceRange','$jobType','$degree','$expectedSalary','$remoteOnsite','$field','$skills')"; 

if (mysqli_query($conn, $sql))
{ 
   
}
   
  // Close connection
mysqli_close($conn); 
?>