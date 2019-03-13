<?php

    switch ($viewpage) {
        case 'saveposts':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($posttitle) && !empty($postpageid)){
                    $date_added = date('Y-m-d H:i:s');
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_videos (VID_TITLE,VID_SLUG,VID_BODY,VID_PAGE_ID,VID_META_TAGS,VID_STATUS,VID_CATEGORY,VID_VIDEO_URL,VID_VIDEO_CODE,VID_DATE_ADDED) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').",".$sql->Param('h').",".$sql->Param('i').",".$sql->Param('i').")"),array($posttitle,$postslug,$postbody,$postpageid,$postmeta,$pagestate,$postcategory,$postvideourl,$postvideoid,$date_added));
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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_videos SET VID_TITLE=".$sql->Param('b').",VID_SLUG=".$sql->Param('c').",VID_BODY=".$sql->Param('e').",VID_PAGE_ID=".$sql->Param('f').",VID_META_TAGS=".$sql->Param('g').",VID_STATUS=".$sql->Param('h').",VID_CATEGORY=".$sql->Param('i').",VID_VIDEO_CODE=".$sql->Param('j').",VID_VIDEO_URL=".$sql->Param('k')." WHERE VID_ID=".$sql->Param('l')." "),array($posttitle,$postslug,$postbody,$postpageid,$postmeta,$pagestate,$postcategory,$postvideoid,$postvideourl,$keys));
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
                    $stmt = $sql->Execute($sql->Prepare("SELECT VID_ID,VID_TITLE,VID_BODY,VID_SLUG,VID_PAGE_ID,VID_CATEGORY,VID_VIDEO_CODE,VID_META_TAGS,VID_STATUS,VID_VIDEO_URL FROM webmin_videos WHERE VID_ID = ".$sql->Param('a')." "),array($keys));
                    $vals = $stmt->FetchRow();
                    list($id,$posttitle,$postbody,$postslug,$postpageid,$postcategory,$postvideoid,$postmeta,$pagestate,$postvideourl)=array_values($vals);

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
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_videos SET VID_STATUS='0' WHERE VID_ID = ".$sql->Param('b')." "),array($keys));
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
    $listposts = $sql->Execute($sql->Prepare("SELECT webmin_videos.VID_ID,webmin_videos.VID_TITLE,webmin_videos.VID_BODY,webmin_videos.VID_SLUG,webmin_videos.VID_DATE_ADDED,webmin_videos.VID_VIDEO_CODE,webmin_videos.VID_VIDEO_URL,webmin_videos.VID_STATUS FROM webmin_videos WHERE webmin_videos.VID_STATUS !='0' ORDER BY webmin_videos.VID_DATE_ADDED DESC "));

    // GET PAGES
    $stmt = $sql->Execute($sql->Prepare("SELECT webmin_pages.PG_ID,webmin_pages.PG_TITLE FROM webmin_pages WHERE webmin_pages.PG_STATUS='1' "));
    while($rows = $stmt->FetchNextObject()){
        $pages[]=$rows;
    }
    // GET POSTS CATEGORY
    $stmtcat = $sql->Execute($sql->Prepare("SELECT VIC_ID,VIC_NAME FROM webmin_videos_category WHERE VIC_STATUS !='0' ORDER BY VIC_NAME DESC "));
    while($rows = $stmtcat->FetchNextObject()){
        $category[]=$rows;
    }
?>