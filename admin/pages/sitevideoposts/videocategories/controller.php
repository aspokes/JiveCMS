<?php
    $pages=array();
    global $id,$catname;
    $pagetype = "posts";

    switch ($viewpage) {
        case 'saveposts':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($catname)){
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_videos_category (VIC_NAME) VALUES (".$sql->Param('a').")"),array($catname));
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
            $postkey =$engine->validatePostForm($microtime);
            
            if($postkey==true){
        
               $session->set('postkey',$microtime);
                if(!empty($keys)){
                    $categoryname = ${'catname'.$keys};
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_videos_category SET VIC_NAME=".$sql->Param('a')." WHERE VIC_ID=".$sql->Param('b')." "),array($categoryname,$keys));
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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_videos_category SET VIC_STATUS='0' WHERE VIC_ID = ".$sql->Param('b')." "),array($keys));
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
    $listposts = $sql->Execute($sql->Prepare("SELECT VIC_ID,VIC_NAME,VIC_INPUTED_DATE,VIC_STATUS FROM webmin_videos_category WHERE VIC_STATUS !='0' ORDER BY VIC_NAME DESC "));

    
?>