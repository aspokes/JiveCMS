<?php
include 'controller.php';
    switch ($view) {
        case 'add':
            include 'views/add.php';
        break;
		
        case 'edit':
            include 'views/edit.php';
        break;

        case 'preview':
            include 'views/preview.php';
        break;

        default:
            include 'views/list.php';
        break;
    }
?>