<?php 
  if(count($_POST)>0) {
    include 'databaseconnect.php';
// Check connection
if($conn === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
else{echo"Connection built<br>";}


$firstName =  $_POST['fname'];
$lastName =  $_POST['lname'];
$email =  $_POST['email'];
$subject =  $_POST['subject'];
$message=  $_POST['message'];


$sql = "INSERT INTO contactforms (FirstName,LastName,Email,Subject,Message)
VALUES('$firstName','$lastName','$email', '$subject','$message')"; 

if (mysqli_query($conn, $sql))
{ 
   header('Location: Response.html');
}
   else 
   { echo "Error: " . $sql . "<br>" . mysqlierror($conn); 
   }

  // Close connection
mysqli_close($conn); 
  }

?>