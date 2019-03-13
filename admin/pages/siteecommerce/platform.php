<?php
    switch ($option) {
        case md5('tax'):
            include 'tax/platform.php';
        break;
        case md5('items'):
            include 'items/platform.php';
        break;
        case md5('itemcategories'):
            include 'itemcategories/platform.php';
        break;
        case md5('sales'):
            include 'sales/platform.php';
        break;
        case md5('orders'):
            include 'orders/platform.php';
        break;
    }
?>