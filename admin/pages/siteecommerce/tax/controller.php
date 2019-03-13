<?php

    $pages=array();
    global $id,$taxname,$taxpercent;

    switch ($viewpage) {
        case 'save':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($taxname)){
                    
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_tax (TAX_NAME,TAX_PERCENTAGE) VALUES (".$sql->Param('a').",".$sql->Param('b').")"),array($taxname,$taxpercent));
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
            $postkey =$engine->validatePostForm($microtime);
            
            if($postkey==true){
        
               $session->set('postkey',$microtime);
                if(!empty($keys)){
                    
                    $taxnamex = ${'taxname'.$keys};
                    $taxpercentage = ${'taxpercent'.$keys};
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_tax SET TAX_NAME=".$sql->Param('a').", TAX_PERCENTAGE=".$sql->Param('b')." WHERE TAX_ID=".$sql->Param('b')." "),array($taxnamex,$taxpercentage,$keys));
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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_tax SET TAX_STATUS='0' WHERE TAX_ID = ".$sql->Param('b')." "),array($keys));
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
    $listposts = $sql->Execute($sql->Prepare("SELECT TAX_ID, TAX_NAME, TAX_PERCENTAGE, TAX_INPUTED_DATE, TAX_STATUS FROM webmin_tax WHERE TAX_STATUS='1' "));

    
?>