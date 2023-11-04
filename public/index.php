<?php 
    // Mọi người tạo thêm table user gồm (id, user_name và password) vào csdl qlkho và tạo một tài khoản để đăng nhập
    // Có ảnh minh họa lưu tại: Project-CT467\public\assets\img  
    // Nếu đã tạo xong thì mở các comments bên dưới

    session_start();
    ob_start();

    if(!isset($_SESSION['admin'])){
        header('location: login_regis.php');
    }

    include_once "../model/header.php";
    include_once "../model/content.php";
    
           
?>


