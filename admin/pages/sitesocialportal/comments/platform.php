<?php
include 'controller.php';
    switch ($view) {
        case 'comments':
            include 'views/comments.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>