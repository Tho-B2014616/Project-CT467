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