<?php
    switch ($option) {
        
        case md5('editcodes'):
            include 'editor/platform.php';
        break;
        case md5('menus'):
            include 'menus/platform.php';
        break;
        case md5('slider'):
            include 'slider/platform.php';
        break;

        default:
            include 'theme/platform.php';
        break;
    }
?>