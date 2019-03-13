<?php
    global $id,$pagetitle,$pagetype,$pagesbody,$pageslug,$pageshortdesc,$pagetempname,$pagemeta,$pagestate;
    $pagetype = "page";

    switch ($viewpage) {

        case 'delete':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_contacts SET webmin_contacts.PERSON_STATUS='0' WHERE webmin_contacts.PERSON_ID = ".$sql->Param('b')." "),array($keys));
                if($stmt == true){
                    $msg = 'Deleted successfully';
                    $status = 'success';
                }else{
                    $msg = $sql->errorMsg();
                    $status = 'error';
                }
            }
        break;

        case 'markasread':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_contacts SET webmin_contacts.PERSON_STATUS='2' WHERE webmin_contacts.PERSON_ID = ".$sql->Param('b')." "),array($keys));
            }
        break;

    }


    // GET PAGES
    $listpages = $sql->Execute($sql->Prepare("SELECT webmin_contacts.PERSON_ID, webmin_contacts.PERSON_NAME, webmin_contacts.PERSON_EMAIL, webmin_contacts.PERSON_PHONE, webmin_contacts.PERSON_LOCATION, webmin_contacts.PERSON_DESCRIPTION, webmin_contacts.PERSON_DATE_ADDED, webmin_contacts.PERSON_STATUS FROM webmin_contacts WHERE webmin_contacts.PERSON_STATUS !='0'  ORDER BY webmin_contacts.PERSON_DATE_ADDED DESC"));
    
?>