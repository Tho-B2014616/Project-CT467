<?php
    session_start();
    unset($_SESSION['admin']);
    unset($_SESSION['user_name']);
    header('location: login_regis.php');
?>