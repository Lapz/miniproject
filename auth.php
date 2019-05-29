<?php

    header("Content-Type: application/json; charset=UTF-8");

    session_start();
    if($_SESSION['admin']) {
        echo "{ \"admin\":true}";
    }else {
        echo "{ \"admin\":false }";
    }
?>