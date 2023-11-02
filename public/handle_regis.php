<?php
include_once "../model/db_connect.php";
$pdo = connect_db();
    $username = $_GET['username'];
    $password = $_GET['password'];
    // Ktra tinh hợp của input
if(isset($_GET['regis-btn']) ){

    // Ktra có tồn tại trc // if(){}
    $sql = "INSERT INTO user (user_name, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    echo 'Đã đăng ký thành công';
}else {
    echo 'Tên hoặc mật khẩu không hợp lệ';
}