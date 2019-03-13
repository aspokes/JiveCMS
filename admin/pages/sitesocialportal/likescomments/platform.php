<?php
include 'controller.php';
    switch ($view) {
        case 'likecomments':
            include 'likecomments/pages.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>