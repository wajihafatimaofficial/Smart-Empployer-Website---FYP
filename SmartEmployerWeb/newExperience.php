<?php 

    include 'databaseconnect.php';
    $msg="";
$experience =  $_POST['experience'];


$sql = "UPDATE candidateprofiles SET Experience='$experience' WHERE CandidateID='" .$_COOKIE['id']."' "; 

if (mysqli_query($conn, $sql))
{ $msg="added";
    echo json_encode(['code'=>200, 'msg'=>$msg]);
    exit;
    
}
  

?>