<?php

function connect_db(){
    $servername = 'localhost';
    $dbname = 'qlkho';
    $username = 'root';
    $password = '';


    try {
        $pdo = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = 'Không thể kết nối đến CSDL';
        $reason = $e->getMessage();
        include 'show_error.php';
        exit();
    }

    return $pdo;
}

/* Trả về nhiều mảng đơn */
function get_all($sql){
    $pdo = connect_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);  // Đặt kq trả về là 1 mảng   
    $arr = $stmt->fetchAll();
    $pdo = NULL;
    return $arr;
}


/* Trả về một mảng đơn */
function get_one($sql){
    $pdo = connect_db();
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);  // Đặt kq trả về là 1 mảng   
    $Product = $stmt->fetch();
    $pdo = NULL;
    return $Product;
}

// Có thể sử dụng các hàm ở trên cho ngắn gọn 
// Đây chỉ là minh họa, mọi người có thể viết theo cách của mình. 
// Vd: lấy tất cả hàng hóa của table hang_hoa
function get_hh(){  
    $sql = "SELECT * FROM hang_hoa ORDER BY id_hh DESC"; 
    return get_all($sql);
}