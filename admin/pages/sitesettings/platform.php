<?php
    switch ($option) {
        
        case md5('manageuserlevels'):
            include 'manageuserlevels/platform.php';
        break;
        case md5('manageusers'):
            include 'manageusers/platform.php';
        break;

        default:
            include 'general/platform.php';
        break;
    }
?>