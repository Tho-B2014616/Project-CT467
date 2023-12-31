<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý kho</title>
    <!-- Thư viện icon Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Reset CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    
    <!-- Css link -->
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <header class="header">
        <h1 class="header__heading">Quản lý kho</h1>

        <a href="../src/logout.php" class="btn btn-danger header__logout-btn"> Đăng xuất</a>

    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="container__head">
                <div class="col-12">
                    <div class="container__head-navbar">
<<<<<<< HEAD:src/Templates/header.php
                        <form method="POST" action="" class="head__navbar-form">
=======
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" class="head__navbar-form">
>>>>>>> 094bbb29f2796309818dc72c90f97fe04f03d13a:model/header.php
                            <div class="head__navbar-form-table">
                                <h2>Chọn bảng cần thao tác</h2>
                                <div class="form-table-content">

                                    <input type="radio" id="table1" name="table" value="product">
                                    <label for="table1">Hàng Hóa</label>

<<<<<<< HEAD:src/Templates/header.php
                                    <input type="radio" id="table2" name="table" value="supplier">
                                    <label for="table2">Nhà cung cấp</label><br>

                                    <input type="radio" id="table3" name="table" value="location">
                                    <label for="table3">Vị trí</label>

                                    <input type="radio" id="table4" name="table" value="PN">
                                    <label for="table4">Phiếu nhập</label><br>

                                    <input type="radio" id="table5" name="table" value="PX">
=======
                                    <input type="radio" id="table2" name="table" value="ncc">
                                    <label for="table2">Nhà cung cấp</label><br>

                                    <input type="radio" id="table3" name="table" value="vitri">
                                    <label for="table3">Vị trí</label>

                                    <input type="radio" id="table4" name="table" value="pn">
                                    <label for="table4">Phiếu nhập</label><br>

                                    <input type="radio" id="table5" name="table" value="px">
>>>>>>> 094bbb29f2796309818dc72c90f97fe04f03d13a:model/header.php
                                    <label for="table5">Phiếu xuất</label>
                                </div>
                            </div>

                            <div class="head__navbar-form-action">
                                <h2>Chọn thao tác</h2>
                                <div class="form-acction-content">
                                    <input type="radio" id="action1" name="action" value="add">
                                    <label for="action1">Thêm</label>

                                    <input type="radio" id="action4" name="action" value="search">
                                    <label for="action4">Tìm kiếm</label><br>

                                    <input type="radio" id="action5" name="action" value="show">
                                    <label for="action5">Hiển thị</label>

                                    <input type="radio" id="action3" name="action" value="delete">
                                    <label for="action3">Xóa </label>
                                </div>
                            </div>

                            <div class="head__navbar-form-btn ">
                                <input type="submit" name="action-btn" value="Thực hiện" class="btn btn-success btn-lg submit-btn">
                                <input type="reset" value="Hủy bỏ" class="btn btn-warning btn-lg reset-btn">

                            </div>

                        </form>
                    </div>
                </div>