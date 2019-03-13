<?php
include 'controller.php';
    switch ($view) {
        case 'advert':
            include 'views/advert.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>