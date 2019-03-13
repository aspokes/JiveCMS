<?php
    include SPATH_LIBRARIES.DS."import.Class.php";

    switch ($viewpage) {
        case 'save':
            $postkey =$engine->validatePostForm($microtime);
            if($postkey==true){
        
                $session->set('postkey',$microtime);
                if(!empty($prodname) && !empty($proddescipt) && !empty($prodamount)){
                    $import = new importClass();
                    if (!empty($_FILES['prodimg']['name'])){
                        $prodimage = $import->uploadImage($_FILES['prodimg'],SHOST_IMAGES_PRODUCT);
                        //--> new image
                    }else {
                        $prodimage = $oldphoto;
                        //--> old image
                    }
                    if (!empty($_FILES['prodfile']['name'])){
                        $prodfilename = $import->uploadPdf($_FILES['prodfile'],SHOST_IMAGES_MAGAZINE);
                        //--> new image
                    }else {
                        $prodfilename = $oldfile;
                        //--> old image
                    }
                    $taxid = explode('@@',$prodtaxid);
                    $proddateadded = date('Y-m-d H:i:s');
                    $stmt = $sql->Execute($sql->Prepare("INSERT INTO webmin_products (PROD_CODE,PROD_TYPE,PROD_ISBN_CODE,PROD_CATEGORY_CODE,PROD_NAME,PROD_DISCRIPTION,PROD_IMAGE,PROD_MADE_DATE,PROD_COST,PROD_AMOUNT,PROD_FINAL_AMOUNT,PROD_DISCOUNT,PROD_TAX_ID,PROD_TAX_PERCENTAGE,PROD_FILE_NAME,PROD_TOTAL_QUANTITY,PROD_DATE_ADDED) VALUES (".$sql->Param('a').",".$sql->Param('b').",".$sql->Param('c').",".$sql->Param('d').",".$sql->Param('e').",".$sql->Param('f').",".$sql->Param('g').",".$sql->Param('h').",".$sql->Param('i').",".$sql->Param('j').",".$sql->Param('k').",".$sql->Param('l').",".$sql->Param('m').",".$sql->Param('n').",".$sql->Param('o').",".$sql->Param('p').",".$sql->Param('q').")"),array($prodcode,$prodtype,$prodisbn,$prodcatcode,$prodname,$proddescipt,$prodimage,$prodmadedate,$prodcost,$prodamount,$prodfinalamount,$proddiscount,$taxid[0],$prodtaxpercent,$prodfilename,$prodquantity,$proddateadded));
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
            $import = new importClass();
            $postkey =$engine->validatePostForm($microtime);
            
            if($postkey==true){
        
               $session->set('postkey',$microtime);
                if(!empty($prodname) && !empty($proddescipt) && !empty($prodamount) && !empty($keys)){
                    if (!empty($_FILES['prodimg']['name'])){
                        $prodimage = $import->uploadImage($_FILES['prodimg'],SHOST_IMAGES_PRODUCT);
                        //--> new image
                    }else {
                        $prodimage = $oldphoto;
                        //--> old image
                    }
                    if (!empty($_FILES['prodfile']['name'])){
                        $prodfilename = $import->uploadPdf($_FILES['prodfile'],SHOST_IMAGES_MAGAZINE);
                        //--> new image
                    }else {
                        $prodfilename = $oldfile;
                        //--> old image
                    }
                    $taxid = explode('@@',$prodtaxid);
                    $stmt = $sql->Execute($sql->Prepare("UPDATE webmin_products SET PROD_TYPE=".$sql->Param('a').",PROD_ISBN_CODE=".$sql->Param('b').",PROD_CATEGORY_CODE=".$sql->Param('c').",PROD_NAME=".$sql->Param('d').",PROD_DISCRIPTION=".$sql->Param('e').",PROD_IMAGE=".$sql->Param('f').",PROD_MADE_DATE=".$sql->Param('g').",PROD_COST=".$sql->Param('h').",PROD_AMOUNT=".$sql->Param('i').",PROD_FINAL_AMOUNT=".$sql->Param('j').",PROD_DISCOUNT=".$sql->Param('k').",PROD_TAX_ID=".$sql->Param('l').",PROD_TAX_PERCENTAGE=".$sql->Param('m').",PROD_FILE_NAME=".$sql->Param('n').",PROD_TOTAL_QUANTITY=".$sql->Param('o')." WHERE PROD_CODE=".$sql->Param('p')." "),array($prodtype,$prodisbn,$prodcatcode,$prodname,$proddescipt,$prodimage,$prodmadedate,$prodcost,$prodamount,$prodfinalamount,$proddiscount,$taxid[0],$prodtaxpercent,$prodfilename,$prodquantity,$keys));
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
                    $view ='items';
                }
            }
        break;

        case 'edit':
                if($keys){
                    $stmt = $sql->Execute($sql->Prepare("SELECT PROD_CODE,PROD_TYPE,PROD_ISBN_CODE,PROD_CATEGORY_CODE,PROD_NAME,PROD_DISCRIPTION,PROD_IMAGE,PROD_MADE_DATE,PROD_COST,PROD_AMOUNT,PROD_FINAL_AMOUNT,PROD_DISCOUNT,PROD_TAX_ID,PROD_TAX_PERCENTAGE,PROD_FILE_NAME,PROD_TOTAL_QUANTITY FROM webmin_products WHERE PROD_STATUS='1' AND PROD_CODE= ".$sql->Param('a')." "),array($keys));
                    $vals = $stmt->FetchRow();
                    list($prodcode,$prodtype,$prodisbn,$prodcatcode,$prodname,$proddescipt,$prodimage,$prodmadedate,$prodcost,$prodamount,$prodfinalamount,$proddiscount,$prodtaxid,$prodtaxpercent,$prodfilename,$prodquantity)=array_values($vals);

                }else{
                    $msg = 'Error fetching this page...try again.';
                    $status = 'info';
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


    // GET PRODUCTS
    $blockdata = $sql->Execute($sql->Prepare("SELECT webmin_products.PROD_CODE, webmin_products.PROD_TYPE, webmin_products.PROD_CATEGORY_CODE, webmin_products.PROD_NAME, webmin_products.PROD_DISCRIPTION, webmin_products.PROD_IMAGE, webmin_products.PROD_FINAL_AMOUNT, webmin_products.PROD_DOWNLOAD_COUNT, webmin_products.PROD_TOTAL_QUANTITY,webmin_products.PROD_STATUS,webmin_products.PROD_DATE_ADDED FROM webmin_products WHERE webmin_products.PROD_STATUS='1' ORDER BY webmin_products.PROD_DATE_ADDED DESC"));

    // GET PRODUCT CATEGORY 
    $stmtc = $sql->Execute($sql->Prepare("SELECT webmin_product_category.PRC_ID, webmin_product_category.PRC_NAME FROM webmin_product_category WHERE webmin_product_category.PRC_STATUS='1'"));
    while($rows = $stmtc->FetchNextObject()){
        $catdata[]=$rows;
    }

    // GET TAX 
    $stmtx = $sql->Execute($sql->Prepare("SELECT webmin_tax.TAX_ID, webmin_tax.TAX_NAME, webmin_tax.TAX_PERCENTAGE FROM webmin_tax WHERE webmin_tax.TAX_STATUS='1'"));
    while($rows = $stmtx->FetchNextObject()){
        $taxs[]=$rows;
    }
?>