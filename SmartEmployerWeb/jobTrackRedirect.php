<?php

     include 'databaseconnect.php';
       $result = mysqli_query($conn,"SELECT *  FROM jobs WHERE JobID='" . $_POST["jobId"] . "' ");
    while($row = mysqli_fetch_array($result)){
        $_SESSION["JobID"]=$row['JobID'];
    
        }//while end

        if($result){
            if(isset($_SESSION["JobID"])) {
                setcookie("jobId", $_SESSION['JobID'], time()+ 354560,'/','localhost');
echo json_encode(['code'=>200]);
exit;
       }
   
}




?>
