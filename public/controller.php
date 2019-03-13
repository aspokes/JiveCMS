<?php
/* 
 * Auther Reggie Gyan
 * Root Controller
 * List of Template Hooks
*/ 
global $wm_title,$wm_body,$wm_tempname,$wm_tags,$wm_dateadded,$team,$menu,$footermenu,$photos,$sitedetails;

switch ($cg) {
    case 'load':
        $stmt = $sql->Execute($sql->Prepare("SELECT webmin_pages.PG_TITLE,webmin_pages.PG_BODY,webmin_pages.PG_TEMPLATE_NAME,webmin_pages.PG_META,webmin_pages.PG_DATE_ADDED,webmin_pages.PG_SHORT_DISCRIPTION FROM webmin_pages WHERE webmin_pages.PG_STATUS = '1' AND webmin_pages.PG_TYPE ='page' AND webmin_pages.PG_SLUG = ".$sql->Param('a')." "),array($site));
        $page = $stmt->FetchRow();
        list($wm_title,$wm_body,$wm_tempname,$wm_tags,$wm_dateadded,$wm_shortdiscription)=array_values($page);
    break;
    
}

//Main menu generator
$stmt = $sql->Execute($sql->Prepare("SELECT webmin_menu_pages.MENP_PAGE_SLUG, webmin_menu_pages.MENP_PAGE_NAME, webmin_pages.PG_TEMPLATE_NAME FROM webmin_menus INNER JOIN webmin_menu_pages ON webmin_menus.MENU_ID = webmin_menu_pages.MENP_MENU_ID INNER JOIN webmin_pages ON webmin_menu_pages.MENP_PAGE_SLUG = webmin_pages.PG_SLUG WHERE webmin_menus.MENU_STATUS = '1'AND webmin_menus.MENU_ID='1' ORDER BY webmin_menu_pages.MENP_MENU_ORDER ASC
"));
$menu=array();
while($row = $stmt->FetchNextObject()){
    $menu[]=$row;
};


// Executives
$stmt = $sql->Execute($sql->Prepare("SELECT webmin_team.TEAM_ID, webmin_team.TEAM_FIRSTNAME, webmin_team.TEAM_LASTNAME, webmin_team.TEAM_ROLE, webmin_team.TEAM_PHOTO, webmin_team.TEAM_DETAILS FROM webmin_team WHERE webmin_team.TEAM_STATUS ='1' "));
$team=array();
while($objs= $stmt->FetchNextObject()){
    $team[]=$objs;
};
   
//Home Gallery Images
$stmtt = $sql->Execute($sql->Prepare("SELECT GAL_ID,GAL_TITLE,GAL_DISCRPTION,GAL_PHOTO_SMALL,GAL_PHOTO_LARGE,GAL_CATERGORY FROM webmin_gallery WHERE GAL_STATUS='1' ORDER BY GAL_ID DESC LIMIT 8  "));
$photos = $stmtt->GetAll();

//Footer menu generator
$stmt = $sql->Execute($sql->Prepare("SELECT webmin_menu_pages.MENP_PAGE_SLUG, webmin_menu_pages.MENP_PAGE_NAME, webmin_pages.PG_TEMPLATE_NAME FROM webmin_menus INNER JOIN webmin_menu_pages ON webmin_menus.MENU_ID = webmin_menu_pages.MENP_MENU_ID INNER JOIN webmin_pages ON webmin_menu_pages.MENP_PAGE_SLUG = webmin_pages.PG_SLUG WHERE webmin_menus.MENU_STATUS = '1'AND webmin_menus.MENU_ID='2' ORDER BY webmin_menu_pages.MENP_MENU_ORDER ASC
"));
$footermenu=array();
while($row = $stmt->FetchNextObject()){
    $footermenu[]=$row;
};

//SLIDES
$stmtsld = $sql->Prepare($sql->Execute("SELECT webmin_slider.SL_ID, webmin_slider.SL_MAIN_TITLE, webmin_slider.SL_SUB_TITLE, webmin_slider.SL_SU_TITLE_TWO, webmin_slider.SL_IMAGE, webmin_slider.SL_IMAGE_ORDER, webmin_slider.SL_DATE_ADDED FROM webmin_slider WHERE webmin_slider.SL_STATUS='1' ORDER BY webmin_slider.SL_IMAGE_ORDER ASC"));
$sliders = array();
while($data = $stmtsld->FetchNextObject()){
    $sliders[]=$data;
};

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
//var_dump($sitecontact); die;


?>