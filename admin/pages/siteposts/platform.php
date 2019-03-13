<?php
    switch ($option) {
        case md5('postcategories'):
            include 'postcategories/platform.php';
        break;
        default:
            include 'posts/platform.php';
        break;
    }
?>