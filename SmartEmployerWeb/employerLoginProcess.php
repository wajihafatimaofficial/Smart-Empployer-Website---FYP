<?php
$errorMSG = "";
$not="";

include 'databaseconnect.php';


/* INVALID EMAIL */
if (empty($_POST["email"] && $_POST["password"]    )) {
    $errorMSG .= "Email is required";
} else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $errorMSG .= "Invalid email format";
}else {
    $email = $_POST["email"];
}



/* NO PASSWORD */
if (empty($_POST["password"]  || $_POST["email"]  )) {
    $errorMSG .= "Password is required";
} else {
    $password = $_POST["password"];
}


if(empty($errorMSG)){



       $result = mysqli_query($conn,"SELECT *  FROM employers WHERE Email='" . $_POST["email"] . "' and AccountPassword = '". $_POST["password"]."'");
       
        
     while($row = mysqli_fetch_array($result)){

            $_SESSION["Email"]= $row['Email'];
            $AccountPassword= $row['AccountPassword'];
            $_SESSION["AccountPassword"]= $row['AccountPassword'];
            $_SESSION['employerID']= $row['employerID'];
        }//while end

       

        if($result){
            if(isset($_SESSION["Email"])) {

                
               
$msg ="Email: ".$email.", Password:".$password;
	
setcookie("id", $_SESSION['employerID'], time()+ 354560,'/','localhost');
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