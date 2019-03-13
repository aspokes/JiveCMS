<?php
include SPATH_LIBRARIES.DS."import.Class.php";

    $pages=array();
    global $id,$catname,$itemphoto;

    switch ($viewpage) {
        case 'save':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($catname)){
                    $import = new importClass();
                    if (!empty($_FILES['catphoto']['name'])){
                        $itemphoto = $import->uploadImage($_FILES['catphoto'],SHOST_IMAGES_PRODUCT);
                        //--> new image
                    }else {
                        $itemphoto = $oldphoto;
                        //--> old image
                    }
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_product_category (PRC_NAME,PRC_IMAGE) VALUES (".$sql->Param('a').",".$sql->Param('b').")"),array($catname,$itemphoto));
                    if($stmt == true){
                        $msg = 'Saved successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }else{
                    $msg = 'Please fill all required fields and try again';
                    $status = 'info';
                }
            }
        break;

        case 'update':
        //var_dump($_FILES['catphoto'.$keys]['name']); die();
            $postkey =$engine->validatePostForm($microtime);
            
            if($postkey==true){
        
               $session->set('postkey',$microtime);
                if(!empty($keys)){
                    $import = new importClass();
                    if (!empty($_FILES['catphoto'.$keys]['name'])){
                        $categoryphoto = $import->uploadImage($_FILES['catphoto'.$keys],SHOST_IMAGES_PRODUCT);
                        //--> new image
                    }else {
                        $categoryphoto = ${'oldcatimage'+$keys};
                        //--> old image
                    }
                    $categoryname = ${'catname'.$keys};
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_product_category SET PRC_NAME=".$sql->Param('a').", PRC_IMAGE=".$sql->Param('b')." WHERE PRC_ID=".$sql->Param('b')." "),array($categoryname,$categoryphoto,$keys));
                    if($stmt == true){
                        $msg = 'Updated successfully';
                        $status = 'success';
                        $view ='';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                        $view ='page';
                    }
                }else{
                    $msg = 'Please fill all required fields and try again';
                    $status = 'info';
                    $view ='page';
                }
            }
        break;


        case 'delete':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if($keys){
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_product_category SET PRC_STATUS='0' WHERE PRC_ID = ".$sql->Param('b')." "),array($keys));
                    if($stmt == true){
                        $msg = 'Deleted successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }
            }
        break;

    }


    // GET POSTS
    $listposts = $sql->Execute($sql->Prepare("SELECT PRC_ID,PRC_NAME,PRC_IMAGE,PRC_INPUTED_DATE,PRC_STATUS FROM webmin_product_category WHERE PRC_STATUS !='0' ORDER BY PRC_NAME DESC "));

    
?>