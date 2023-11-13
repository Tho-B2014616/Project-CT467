<?php
session_start();
include_once __DIR__ . '/../src/db_connect.php';
include_once __DIR__ . '/../src/check_admin.php';
/* Handle Login */
$message_login = "";
if (isset($_POST['login-btn']) && $_POST['user-name'] != '' && $_POST['user-pass']) {
    $user_name = $_POST['user-name'];
    $user_pass = $_POST['user-pass'];
    $userOne = check_user($user_name, $user_pass);

    if (is_array($userOne)) {
        extract($userOne);
        $_SESSION['admin'] = 1;
        $_SESSION['user_name'] = $user_name;
        header('location: /../public/index.php');
    } else {
        $message_login = "Tài khoản hoặc mật khẩu chưa chính xác!";
    }
} else {
    $message_login = "";
}

/* Handle Regis */
$message_regis = "";
$message_succes = "";
if (isset($_POST['regis-btn']) && $_POST['username'] != '' && $_POST['pass']) {
    $pdo = connect_db();
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $key = $_POST['key'];
    $userOne = check_user($username, $password);
    if (!$userOne) {
        $sql = "CALL AddUserWithKey(:username, :password, :key);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':key' => $key
        ]);
    
        if ($stmt->fetch()['result'] == 1) {
            $mess_alert = "alert-success";
            $message_regis = 'Đăng ký thành công';
        } else {
            $mess_alert = "alert-danger";
            $message_regis = "Khóa không đúng";
        }
    } else {
        $mess_alert = "alert-danger";
        $message_regis = "Tài khoản này đã tồn tại!";
    }
}
include_once __DIR__ . '/../src/Templates/form_login_out.php';
