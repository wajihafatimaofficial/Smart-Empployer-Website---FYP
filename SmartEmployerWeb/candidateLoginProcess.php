<?php
$errorMSG = "";
$not="";


/* EMAIL */
if (empty($_POST["email"] && $_POST["password"]    )) {
    $errorMSG .= "Email is required";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Invalid email format";
}else {
    $email = $_POST["email"];
}



/* MESSAGE */
if (empty($_POST["password"]  || $_POST["email"]  )) {
    $errorMSG .= "Password is required";
} else {
    $password = $_POST["password"];
}


if(empty($errorMSG)){
	$msg ="Email: ".$email.", Password:".$password;
	
     include 'databaseconnect.php';
    

       $result = mysqli_query($conn,"SELECT *  FROM candidates WHERE Email='" . $_POST["email"] . "' and Password = '". $_POST["password"]."'");
       
        
     while($row = mysqli_fetch_array($result)){

            $_SESSION["Email"]= $row['Email'];
            $Password= $row['Password'];
            $_SESSION['CandidateID']= $row['CandidateID'];
        }//while end

       

        if($result){
            if(isset($_SESSION["Email"])) {
                $cid=$_SESSION['CandidateID'];
                setcookie("id", $cid , time()+ 354560,'/','localhost');
echo json_encode(['code'=>200, 'msg'=>$msg]);
exit;
     

       }



else{
    $errorMSG.= "No user found with this email and password";

}
        
}


}

echo json_encode(['code'=>404, 'msg'=>$errorMSG]);


?>
