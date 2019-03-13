<?php
include 'controller.php';
    switch ($view) {
        case 'items':
            include 'views/items.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>