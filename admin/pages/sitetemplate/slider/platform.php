<?php
include 'controller.php';
    switch ($view) {
        case'slides':
        include'views/slides.php';
        break;
        default:
            include 'views/list.php';
        break;
    }
?>