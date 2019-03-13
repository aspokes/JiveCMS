<?php

switch ($option) {
    case md5('members'):
        include 'members/platform.php';
    break;

    case md5('comments'):
        include 'comments/platform.php';
    break;

    case md5('likescomments'):
        include 'likescomments/platform.php';
    break;

    case md5('thirdpartyadverts'):
        include 'thirdpartyadverts/platform.php';
    break;
}

?>