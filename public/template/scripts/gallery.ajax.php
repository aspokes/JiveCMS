<?php
header("Content-Type:application/json");
include "../../../config.php"; 
    $response = array();
    $stmtxx = $sql->Execute($sql->Prepare("SELECT GAL_ID,GAL_TITLE,GAL_DISCRPTION,GAL_PHOTO_SMALL,GAL_PHOTO_LARGE,GAL_CATERGORY FROM webmin_gallery WHERE GAL_STATUS='1' LIMIT ".$recordCount.",12 ")); 

    while($obj= $stmtxx->FetchNextObject()){
        $response[] = $obj;
    };

    $recordCount+=12;
    $data= array('data'=>$response,'count'=>$recordCount);

    echo json_encode($data);
 
?>