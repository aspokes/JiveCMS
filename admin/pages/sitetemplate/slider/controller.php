<?php
    include SPATH_LIBRARIES.DS."import.Class.php";
    global $pageadded;

    $upload = new importClass();
    $engine = new engineClass();
    $crypt = new cryptCls();

    switch ($viewpage) {
        case 'saveslider':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
                $session->set('postkey',$microtime);
                if($keys){

                    if (!empty($_FILES['sliderimage']['name'])){
                        $sliderimages = $upload->uploadImage($_FILES['sliderimage'],SHOST_IMAGES_SLIDES);
                        //--> new image
                    }else {
                        $sliderimages = $sliderimageold;
                        //--> old image
                    }
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_slider SET SL_MAIN_TITLE=".$sql->Param('c').",SL_SUB_TITLE=".$sql->Param('c').",SL_SU_TITLE_TWO=".$sql->Param('c').",SL_IMAGE=".$sql->Param('c').",SL_IMAGE_ORDER=".$sql->Param('c')." WHERE SL_ID=".$sql->Param('c')." "),array($slidertitle,$slidersubtitle,$slidertitlecrumbs,$sliderimages,$sliderorder,$keys));
                    if($stmt == true){
                        $msg = 'Updated successfully';
                        $status = 'success';
                    }else{
                        $msg = $sql->errorMsg();
                        $status = 'error';
                    }

                }else{
                    if(!empty($slidertitle) && !empty($slidersubtitle) && !empty($sliderorder)){
                        
                        $sliderimages = $upload->uploadImage($_FILES['sliderimage'],SHOST_IMAGES_SLIDES);
                        
                        $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_slider (SL_MAIN_TITLE,SL_SUB_TITLE,SL_SU_TITLE_TWO,SL_IMAGE,SL_IMAGE_ORDER) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').")"),array($slidertitle,$slidersubtitle,$slidertitlecrumbs,$sliderimages,$sliderorder));
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
            }
        break;

        case 'edit':
            if($keys){
                $stmt = $sql->Execute($sql->Prepare("SELECT SL_MAIN_TITLE,SL_SUB_TITLE,SL_SU_TITLE_TWO,SL_IMAGE,SL_IMAGE_ORDER FROM  webmin_slider WHERE SL_ID = ".$sql->Param('a')." "),array($keys));
                $slidedata = $stmt->FetchRow();
            }
        break;

        case 'delete':
        $postkey =$engine->validatePostForm($microtime);
        if($postkey==true){
            $session->set('postkey',$microtime);
            if($keys){
                $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_slider SET SL_STATUS=".$sql->Param('a')." WHERE SL_ID=".$sql->Param('b')." "),array('0',$keys));
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

   //GET SLIDES
   $stmtsld = $sql->Prepare($sql->Execute("SELECT webmin_slider.SL_ID, webmin_slider.SL_MAIN_TITLE, webmin_slider.SL_SUB_TITLE, webmin_slider.SL_SU_TITLE_TWO, webmin_slider.SL_IMAGE, webmin_slider.SL_IMAGE_ORDER, webmin_slider.SL_DATE_ADDED FROM webmin_slider WHERE webmin_slider.SL_STATUS='1' ORDER BY webmin_slider.SL_IMAGE_ORDER ASC"));
   $sliders = array();
   while($data = $stmtsld->FetchRow()){
       $sliders[]=$data;
   };


    
?>