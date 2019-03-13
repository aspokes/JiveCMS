<?php
    include SPATH_LIBRARIES.DS."import.Class.php";

    switch ($viewpage) {
        case 'saveposts':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($advtitle)){
                    $import = new importClass();
                    if (!empty($_FILES['photo']['name'])){
                        $advimage = $import->uploadImage($_FILES['photo'],SHOST_IMAGES_ADVERTS);
                        //--> new image
                    }else {
                        $advimage = $oldphoto;
                        //--> old image
                    }
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_adverts (ADV_TITLE,ADV_IMAGE,ADV_URL,ADV_DISCRIPTION,ADV_STATUS) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').")"),array($advtitle,$advimage,$advurl,$advdescription,$advstatus));
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

        case 'updatepost':
            $import = new importClass();
            $postkey =$engine->validatePostForm($microtime);
            
            if($postkey==true){
        
               $session->set('postkey',$microtime);
                if(!empty($advtitle) && !empty($keys)){
                    if (!empty($_FILES['photo']['name'])){
                        $advimage = $import->uploadImage($_FILES['photo'],SHOST_IMAGES_ADVERTS);
                        //--> new image
                    }else {
                        $advimage = $oldphoto;
                        //--> old image
                    }
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_adverts SET ADV_TITLE=".$sql->Param('b').",ADV_IMAGE=".$sql->Param('c').",ADV_URL=".$sql->Param('e').",ADV_DISCRIPTION=".$sql->Param('f').",ADV_STATUS=".$sql->Param('g')." WHERE ADV_ID=".$sql->Param('h')." "),array($advtitle,$advimage,$advurl,$advdescription,$advstatus,$keys));
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

        case 'edit':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if($keys){
                    $stmt = $sql->Execute($sql->Prepare("SELECT ADV_ID,ADV_TITLE,ADV_IMAGE,ADV_URL,ADV_DISCRIPTION,ADV_STATUS FROM webmin_adverts WHERE ADV_ID = ".$sql->Param('a')." "),array($keys));
                    $vals = $stmt->FetchRow();
                    list($id,$advtitle,$advimage,$advurl,$advdescription,$advstatus)=array_values($vals);

                }else{
                    $msg = 'Error fetching this page...try again.';
                    $status = 'info';
                }
            }
        break;

        case 'delete':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if($keys){
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_adverts SET ADV_STATUS='0' WHERE ADV_ID = ".$sql->Param('b')." "),array($keys));
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
    $listdata = $sql->Execute($sql->Prepare("SELECT ADV_ID,ADV_TITLE,ADV_IMAGE,ADV_URL,ADV_DISCRIPTION,ADV_INPUTED_DATE,ADV_STATUS FROM webmin_adverts WHERE ADV_STATUS !='0' ORDER BY ADV_INPUTED_DATE DESC "));

    
?>