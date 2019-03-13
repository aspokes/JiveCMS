<?php

    switch ($viewpage) {
        case 'saveuser':
        $postkey =$engine->validatePostForm($microtime);
        $crypt = new cryptCls();
            if($postkey==true){
                if($keys){
                    $session->set('postkey',$microtime);
                    $usersurnamex=${'usersurname'.$keys};
                    $userothernamex=${'userothername'.$keys};
                    $usernamex=${'username'.$keys};
                    $userpasswordx=${'userpassword'.$keys};
                    $useremailx=${'useremail'.$keys};
                    $userlevelx=${'userlevel'.$keys};
                    $photox=${'photo'.$keys};
                    $newpassword = $crypt->loginPassword($usernamex,$userpasswordx);
                    
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_users SET USR_SURNAME=".$sql->Param('a').",USR_OTHERNAME=".$sql->Param('b').",USR_USERNAME=".$sql->Param('c').",USR_PASSWORD=".$sql->Param('d').",USR_EMAIL=".$sql->Param('e').",USR_ACCESS_LEVEL=".$sql->Param('f').",USR_PHOTO=".$sql->Param('g')." WHERE USR_ID =".$sql->Param('h').""),array($usersurnamex,$userothernamex,$usernamex,$newpassword,$useremailx,$userlevelx,$photox,$keys));
                    if($stmt == true){
                        $msg = 'Upated successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }else{
                    $genpassword = $crypt->loginPassword($usernames,$userpasswords);
                    if(!empty($usernames) && !empty($userpasswords)){
                        $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_users (USR_SURNAME,USR_OTHERNAME,USR_USERNAME,USR_PASSWORD,USR_EMAIL,USR_ACCESS_LEVEL,USR_PHOTO) VALUES(".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').")"),array($usersurnames,$userothernames,$usernames,$genpasswords,$useremails,$userlevels,$photos));
                        if($stmt == true){
                            $msg = 'Saved successfully';
                            $status = 'success';
                        }else{
                            $msg = $sql->errorMsg();
                            $status = 'error';
                        }
                    }else{
                        $msg = 'Please fill in your user name and password to continue...';
                        $status = 'info'; 
                    }
                }
            }
        break;


        case 'deleteuser':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_users SET USR_STATUS='0' WHERE USR_ID = ".$sql->Param('b')." "),array($keys));
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
     $listusers = $sql->Execute($sql->Prepare("SELECT USR_ID,USR_SURNAME,USR_OTHERNAME,USR_USERNAME,USR_PASSWORD,USR_EMAIL,USR_ACCESS_LEVEL,USR_LASTLOGIN_DATE,USR_STATUS,USR_PHOTO FROM webmin_users WHERE USR_STATUS !='0' "));
?>