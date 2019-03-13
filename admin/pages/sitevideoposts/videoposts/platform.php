<?php
include 'controller.php';
    switch ($view) {
        case 'posts':
            include 'views/posts.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>