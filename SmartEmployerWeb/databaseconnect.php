<?php 


$conn = mysqli_connect("localhost", "root", "", "se");
// Check connection
if($conn === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>