<?php 
/* INCLUDING DB */
include 'databaseconnect.php';
$errorMSG = "";
$msg = "";
   
$firstName =  $_POST['fname'];
$lastName =  $_POST['lname'];
$email =  $_POST['email'];
$phone =  $_POST['phone'];
$country=  $_POST['country'];
$city=  $_POST['city'];
$password=  $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM candidates WHERE Email='" . $_POST['email']. "' ");

while($row1 = mysqli_fetch_array($result)){

   $rowcount = mysqli_num_rows($result);
  }

if($rowcount==0)
{

/* INSERTION START */
$sql = "INSERT INTO candidates (FirstName,LastName,Email,Phone,Country,City,Password)
VALUES('$firstName','$lastName','$email', '$phone','$country','$city','$password')"; 

if (mysqli_query($conn, $sql)){ 

  $result2 = mysqli_query($conn,"SELECT * FROM candidates WHERE Email='" . $_POST["email"] . "'");
  
  while($row2 = mysqli_fetch_array($result2)){
    $CandidateID= $row2['CandidateID'];
    $sql2 = mysqli_query($conn,"INSERT INTO candidateprofiles (CandidateID) VALUES($CandidateID) ");
    $msg = "created";   
  
    echo json_encode(['code'=>200, 'msg'=>$msg]);
    exit;
}

    }//if (mysqli_query($conn, $sql)) end
   }//if not zero end

else{

   $errorMSG = "Email already exists";   
 
}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);




?>