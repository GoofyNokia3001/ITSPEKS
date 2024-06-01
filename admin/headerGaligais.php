<?php
    session_start();
    if (!isset($_SESSION['lietotajvardsKRA'])) {
        header("location:../login.php");
        exit();
    }

    if ($_SESSION['userRole'] == 'admin') {
        require 'headerAdministratoriem.php';
    } elseif ($_SESSION['userRole'] == 'moderator') {
        require 'headerModeratoriem.php';
    } else {
        header("location:../login.php");
        exit();
    }
?>