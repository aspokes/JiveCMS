<?php
    include SPATH_LIBRARIES.DS."import.Class.php";

    switch ($viewpage) {
        case 'saveposts':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($posttitle) && !empty($postpageid)){
                    $import = new importClass();
                    if (!empty($_FILES['photo']['name'])){
                        $postimage = $import->uploadImage($_FILES['photo'],SHOST_IMAGES_ARTICLES);
                        //--> new image
                    }else {
                        $postimage = $oldphoto;
                        //--> old image
                    }
                    $date_added = date('Y-m-d H:i:s');
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_posts (PST_TITLE,PST_SLUG,PST_BODY,PST_PAGE_ID,PST_META_TAGS,PST_STATUS,PST_CATEGORY,PST_PHOTO,PST_DATE_ADDED) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').",".$sql->Param('h').",".$sql->Param('i').")"),array($posttitle,$postslug,$postbody,$postpageid,$postmeta,$pagestate,$postcategory,$postimage,$date_added));
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
                if(!empty($posttitle) && !empty($postpageid) && !empty($keys)){
                    if (!empty($_FILES['photo']['name'])){
                        $postimage = $import->uploadImage($_FILES['photo'],SHOST_IMAGES_ARTICLES);
                        //--> new image
                    }else {
                        $postimage = $oldphoto;
                        //--> old image
                    }
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_posts SET PST_TITLE=".$sql->Param('b').",PST_SLUG=".$sql->Param('c').",PST_BODY=".$sql->Param('e').",PST_PAGE_ID=".$sql->Param('f').",PST_META_TAGS=".$sql->Param('g').",PST_STATUS=".$sql->Param('h').",PST_CATEGORY=".$sql->Param('i').",PST_PHOTO=".$sql->Param('j')." WHERE PST_ID=".$sql->Param('h')." "),array($posttitle,$postslug,$postbody,$postpageid,$postmeta,$pagestate,$postcategory,$postimage,$keys));
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
                    $stmt = $sql->Execute($sql->Prepare("SELECT PST_ID,PST_TITLE,PST_BODY,PST_SLUG,PST_PAGE_ID,PST_CATEGORY,PST_PHOTO,PST_META_TAGS,PST_STATUS FROM webmin_posts WHERE PST_ID = ".$sql->Param('a')." "),array($keys));
                    $vals = $stmt->FetchRow();
                    list($id,$posttitle,$postbody,$postslug,$postpageid,$postcategory,$postphoto,$postmeta,$pagestate)=array_values($vals);

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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_posts SET PST_STATUS='0' WHERE PST_ID = ".$sql->Param('b')." "),array($keys));
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
    $listposts = $sql->Execute($sql->Prepare("SELECT webmin_posts.PST_ID,webmin_posts.PST_TITLE,webmin_posts.PST_BODY,webmin_posts.PST_SLUG,webmin_posts.PST_DATE_ADDED,webmin_posts.PST_CATEGORY,webmin_posts.PST_PHOTO,webmin_posts.PST_STATUS FROM webmin_posts WHERE webmin_posts.PST_STATUS !='0' ORDER BY webmin_posts.PST_DATE_ADDED DESC "));

    // GET PAGES
    $stmt = $sql->Execute($sql->Prepare("SELECT webmin_pages.PG_ID,webmin_pages.PG_TITLE FROM webmin_pages WHERE webmin_pages.PG_STATUS='1' "));
    while($rows = $stmt->FetchNextObject()){
        $pages[]=$rows;
    }
    // GET POSTS CATEGORY
    $stmtcat = $sql->Execute($sql->Prepare("SELECT POC_ID,POC_NAME FROM webmin_posts_category WHERE POC_STATUS !='0' ORDER BY POC_NAME DESC "));
    while($rows = $stmtcat->FetchNextObject()){
        $category[]=$rows;
    }
?>