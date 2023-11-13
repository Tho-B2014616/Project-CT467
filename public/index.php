<?php
//khóa đăng ký: @123thn
session_start();
ob_start();

if (!isset($_SESSION['admin'])) {
    header('location: /../src/login_regis.php');
} else {
    include_once __DIR__ . "/../src/Templates/header.php";
    include_once __DIR__ . "/../public/handle.php";
    include_once __DIR__ . "/../src/Templates/footer.php";
}
