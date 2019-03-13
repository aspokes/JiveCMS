<?php
    switch ($viewpage) {
        case 'settings':
        $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if($keys){
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_settings SET SETT_SITE_TITLE=".$sql->Param('a').",SETT_SITE_META=".$sql->Param('b').",SETT_DISCRIPTION=".$sql->Param('c').",SETT_LOCATION=".$sql->Param('d').",SETT_ADDRESS=".$sql->Param('e').",SETT_WEBSITE_URL=".$sql->Param('f').",SETT_CONTACT_EMAIL=".$sql->Param('g').",SETT_CONTACT_NUMBER=".$sql->Param('h')." WHERE SETT_ID =".$sql->Param('i').""),array($sitetitle,$sitemeta,$siteshortdesc,$sitelocation,$sitepostaddress,$siteurl,$siteemil,$sitecontact,$keys));
                    if($stmt == true){
                        $msg = 'Upated successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }else{
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_settings (SETT_SITE_TITLE,SETT_SITE_META,SETT_DISCRIPTION,SETT_LOCATION,SETT_ADDRESS,SETT_WEBSITE_URL,SETT_CONTACT_EMAIL,SETT_CONTACT_NUMBER) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').",".$sql->Param('h').")"),array($sitetitle,$sitemeta,$siteshortdesc,$sitelocation,$sitepostaddress,$siteurl,$siteemil,$sitecontact));
                    if($stmt == true){
                        $msg = 'Saved successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }
            }
        break;
    }

    $stmts= $sql->Execute($sql->Prepare("SELECT SETT_ID,SETT_SITE_TITLE,SETT_SITE_META,SETT_DISCRIPTION,SETT_LOCATION,SETT_ADDRESS,SETT_WEBSITE_URL,SETT_CONTACT_EMAIL,SETT_CONTACT_NUMBER FROM webmin_settings"));
    $obj = $stmts->FetchRow();
    
    $siteid=$obj['SETT_ID'];
    $sitetitle=$obj['SETT_SITE_TITLE'];
    $sitemeta=$obj['SETT_SITE_META'];
    $siteshortdesc=$obj['SETT_DISCRIPTION'];
    $sitelocation=$obj['SETT_LOCATION'];
    $sitepostaddress=$obj['SETT_ADDRESS'];
    $siteurl=$obj['SETT_WEBSITE_URL'];
    $siteemil=$obj['SETT_CONTACT_EMAIL'];
    $sitecontact=$obj['SETT_CONTACT_NUMBER'];
?>