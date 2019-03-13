<?php
include "controller.php";
switch ($pg) {

    case 'page':
        include "template/template-page.php";
    break;
    case 'home':
        include "template/template-home.php";
    break;

}

?>