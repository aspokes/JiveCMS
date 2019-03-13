<?php
    global $id,$pagetitle,$pagetype,$pagesbody,$pageslug,$pageshortdesc,$pagetempname,$pagemeta,$pagestate;
    $pagetype = "page";

    switch ($viewpage) {
        case 'savepage':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($pagetitle) && !empty($pageslug)){
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_pages (PG_TYPE,PG_TITLE,PG_SLUG,PG_SHORT_DISCRIPTION,PG_BODY,PG_TEMPLATE_NAME,PG_META,PG_STATUS) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').",".$sql->Param('h').")"),array($pagetype,$pagetitle,$pageslug,$pageshortdesc,$pagesbody,$pagetempname,$pagemeta,$pagestate));
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

        case 'updatepage':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($keys)){
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_pages SET PG_TYPE=".$sql->Param('a').",PG_TITLE=".$sql->Param('b').",PG_SLUG=".$sql->Param('c').",PG_SHORT_DISCRIPTION=".$sql->Param('d').",PG_BODY=".$sql->Param('e').",PG_TEMPLATE_NAME=".$sql->Param('f').",PG_META=".$sql->Param('g').",PG_STATUS=".$sql->Param('h')." WHERE PG_ID=".$sql->Param('h')." "),array($pagetype,$pagetitle,$pageslug,$pageshortdesc,$pagesbody,$pagetempname,$pagemeta,$pagestate,$keys));
                    if($stmt == true){
                        $msg = 'Updated successfully';
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

        case 'edit':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if($keys){
                $stmt = $sql->Execute($sql->Prepare("SELECT webmin_pages.PG_ID,webmin_pages.PG_TITLE,webmin_pages.PG_BODY,webmin_pages.PG_SLUG,webmin_pages.PG_SHORT_DISCRIPTION,webmin_pages.PG_TEMPLATE_NAME,webmin_pages.PG_META,webmin_pages.PG_STATUS FROM webmin_pages WHERE webmin_pages.PG_ID = ".$sql->Param('a')." "),array($keys));
                $vals = $stmt->FetchRow();
                list($id,$pagetitle,$pagesbody,$pageslug,$pageshortdesc,$pagetempname,$pagemeta,$pagestate)=array_values($vals);

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
                $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_pages SET webmin_pages.PG_STATUS='0' WHERE webmin_pages.PG_ID = ".$sql->Param('b')." "),array($keys));
                if($stmt == true){
                    $msg = 'Deleted successfully';
                    $status = 'success';
                }else{
                    $msg = $sql->errorMsg();
                    $status = 'error';
                }
            }
        break;

    }


    // GET PAGES
    $listpages = $sql->Execute($sql->Prepare("SELECT webmin_pages.PG_ID,webmin_pages.PG_TITLE,webmin_pages.PG_BODY,webmin_pages.PG_SLUG,webmin_pages.PG_DATE_ADDED,webmin_pages.PG_SHORT_DISCRIPTION,webmin_pages.PG_STATUS FROM webmin_pages WHERE webmin_pages.PG_TYPE ='page' AND webmin_pages.PG_STATUS !='0' "));
    
?>