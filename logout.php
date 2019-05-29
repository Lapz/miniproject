<?php
/**
 * Created by IntelliJ IDEA.
 * User: lenardpratt
 * Date: 2019-03-14
 * Time: 19:51
 */
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['admin']);
    $_SESSION = array();
    session_destroy();
    echo "<script type='text/javascript'>window.location = 'index.php'</script>";

?>