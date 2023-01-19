<?php 

/* INCLUDING DB */
include 'databaseconnect.php';
$errorMSG = "";
$msg = "";
/* INITIALIZATION */
$organizationID =  1254;
$firstName =  $_POST['fname'];
$lastName =  $_POST['lname'];
$email =  $_POST['email'];
$country=  $_POST['country'];
$city=  $_POST['city'];
$industry=  $_POST['industry'];
$companySize=  $_POST['companySize'];
$companyWeb=  $_POST['companywebsite'];
$password=  $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM employers WHERE Email='" . $_POST['email']. "' ");
while($row1 = mysqli_fetch_array($result)){

   $rowcount = mysqli_num_rows($result);}

if($rowcount==0)
{
/* INSERTION START */

$sql = "INSERT INTO employers (OrganizationID,FirstName,LastName,Email,Country,City,Industry,CompanySize,CompanyWeb,AccountPassword)
VALUES('$organizationID','$firstName','$lastName','$email','$country','$city','$industry','$companySize','$companyWeb','$password')"; 


if (mysqli_query($conn, $sql))
{ 
   
   $msg="redirect";
    
}
else 
{ echo "Error: " . $sql . "<br>" . mysqlierror($conn); 
}



/* INSERTION END */
}

else{

   $errorMSG = "Email already exists";   
 
}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);
?>