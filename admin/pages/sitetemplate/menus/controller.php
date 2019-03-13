<?php
    global $pageadded;
    $menuopt = array();
    switch ($viewpage) {
        case 'add_menu':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($menuname)){
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_menus (MENU_NAME,MENU_STATUS) VALUES (".$sql->Param('a').",".$sql->Param('b').")"),array($menuname,'1'));

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

        case 'add_pages_to_menu':
            # code...
            //var_dump(($_POST));die;
            $selectpage= unserialize($selectpage);
            foreach($_POST['pageadded'] as $page){
                $page=explode("@@", $page);
                if(!in_array( $page[0],array_column($selectpage,'MENP_PAGE_SLUG'))){
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_menu_pages (MENP_MENU_ID,MENP_PAGE_SLUG,MENP_PAGE_NAME) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('a').")"),array($keys,$page[0],$page[1]));
                    echo $sql->errorMsg();
                    if($stmt == true){
                        $msg = 'Saved successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }
                }else{
                    $msg = 'No new pages were added to the menue...';
                    $status = 'info';
                }
            }
        break;

        case 'viewpages':
            $stmts = $sql->Execute($sql->Prepare("SELECT webmin_pages.PG_SLUG,webmin_pages.PG_TITLE FROM webmin_pages WHERE webmin_pages.PG_STATUS='1' "));
            $pages= $stmts->GetAll();
            
            $stmt = $sql->Execute($sql->Prepare("SELECT webmin_menu_pages.MENP_ID,webmin_menu_pages.MENP_PAGE_NAME,webmin_menu_pages.MENP_PAGE_SLUG FROM webmin_menu_pages WHERE  webmin_menu_pages.MENP_MENU_ID=".$sql->Param('a')." AND webmin_menu_pages.MENP_STATUS='1' "),array($keys));
            $selectedpages= $stmt->GetAll(); 
            // var_dump($selectedpages);die;
        break;

        case 'delete':
            # code...
        break;
        
    }

    // GET MENU LIST
    $stmt = $sql->Execute($sql->Prepare("SELECT webmin_menus.MENU_ID,webmin_menus.MENU_NAME FROM webmin_menus WHERE webmin_menus.MENU_STATUS='1' "));
    while($rows = $stmt->FetchRow()){
        $menuopt[]=$rows;
    } 

    
?>