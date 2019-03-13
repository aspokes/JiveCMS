<?php
    switch ($option) {
        case md5('videocategories'):
            include 'videocategories/platform.php';
        break;
        default:
            include 'videoposts/platform.php';
        break;
    }
?>