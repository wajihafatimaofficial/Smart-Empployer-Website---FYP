<?php 

    include 'databaseconnect.php';
    $msg="";
$about=  $_POST['abouttxt'];

$sql = "UPDATE candidateprofiles SET About='$about' WHERE CandidateID='" .$_COOKIE['id']."' "; 

if (mysqli_query($conn, $sql))
{ $msg="added";
    echo json_encode(['code'=>200, 'msg'=>$msg]);
    exit;
    
}
  
?>