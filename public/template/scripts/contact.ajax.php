<?php
header("Content-Type:application/json");
include "../../../config.php"; 
    if(!empty($name) && !empty($email) && !empty($phonenumber) && !empty($message)){
        $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_contacts (PERSON_NAME,PERSON_EMAIL,PERSON_PHONE,PERSON_LOCATION,PERSON_DESCRIPTION) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').") "),array($name,$email,$phonenumber,$location,$message)); 

        if($stmt==true){
            $msg = "Message Sent";
        }else{
            $msg = $sql->ErrorMsg();
        }
    }else{
        $msg = "Fill all fields to proceed";
    }

    echo json_encode($msg);
 
?>