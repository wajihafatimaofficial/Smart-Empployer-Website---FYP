<?php 
session_start();
    include 'databaseconnect.php';
// Check connection
if($conn === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{echo"Connection built<br>";}


$jobId =  $_POST['jobId'];
$applicantId=  $_COOKIE['id'];


$sql = "INSERT INTO jobapplications (JobID,ApplicantID)
VALUES('$jobId','$applicantId')"; 

if (mysqli_query($conn, $sql))
{ 

 

}
   else 
   { echo "Error: " . $sql . "<br>" . mysqlierror($conn); 
   }

  // Close connection

mysqli_close($conn); 
  




?>