<?php
    session_start();

    unset($_SESSION['login']);
    unset($_SESSION['user']);
    unset($_SESSION['userid']);
    unset($_SESSION['firstname']);
    unset($_SESSION['lastname']);

    session_destroy();

    header("location:../index.php");
?>