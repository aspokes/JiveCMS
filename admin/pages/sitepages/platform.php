<?php
include 'controller.php';
    switch ($view) {
        case 'pages':
            include 'views/pages.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>