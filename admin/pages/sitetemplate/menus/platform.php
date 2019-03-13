<?php
include 'controller.php';
    switch ($view) {
        case'addpages':
        include'views/addpages.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>