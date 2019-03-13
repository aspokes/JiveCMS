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
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_posts_category (POC_NAME) VALUES (".$sql->Param('a').")"),array($catname));
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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_posts_category SET POC_NAME=".$sql->Param('a')." WHERE POC_ID=".$sql->Param('b')." "),array($categoryname,$keys));
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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_posts_category SET POC_STATUS='0' WHERE POC_ID = ".$sql->Param('b')." "),array($keys));
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
    $listposts = $sql->Execute($sql->Prepare("SELECT POC_ID,POC_NAME,POC_INPUTED_DATE,POC_STATUS FROM webmin_posts_category WHERE POC_STATUS !='0' ORDER BY POC_NAME DESC "));

    
?>