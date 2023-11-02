<?php 
    include_once "../model/header.php";

?>

    <div class="container-fluid">
        <div class="row">
            <div class="container__head">
                <div class="col-12">
                    <div class="container__head-navbar">
                        <form method="POST" action="handle.php" class="head__navbar-form">
                           <div class="head__navbar-form-table">
                                <h2>Chọn bảng cần thao tác</h2>
                                <div class="form-table-content">
                                    
                                <input type="radio" id="table1" name="table" value="Hàng Hóa">
                                <label for="table1">Hàng Hóa</label><br>

                                <input type="radio" id="table2" name="table" value="Nhà cung cấp">
                                <label for="table2">Nhà cung cấp</label><br>

                                <input type="radio" id="table3" name="table" value="Vị trí">
                                <label for="table3">Vị trí</label><br>

                                <input type="radio" id="table4" name="table" value="Phiếu nhập">
                                <label for="table4">Phiếu nhập</label><br>

                                <input type="radio" id="table5" name="table" value="Phiếu xuất">
                                <label for="table5">Phiếu xuất</label><br>
                                </div>
                           </div>

                           <div class="head__navbar-form-action">
                                <h2>Chọn thao tác</h2>
                                <input type="radio" id="action1" name="action" value="Thêm">
                                <label for="action1">Thêm</label><br>

                                <input type="radio" id="action2" name="action" value="Sửa">
                                <label for="action2">Sửa</label><br>

                                <input type="radio" id="action3" name="action" value="Xóa">
                                <label for="action3">Xóa</label><br>

                                <input type="radio" id="action4" name="action" value="Tìm kiếm">
                                <label for="action4">Tìm kiếm</label><br>
                           </div>



                            <div class="head__navbar-form-btn ">
                                <input type="submit" value="Thực hiện" class="btn btn-success btn-lg submit-btn">
                                <input type="reset" value="Hủy bỏ" class="btn btn-warning btn-lg reset-btn">

                            </div>
                           

                           
                        </form>

                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="container__content">

                        </div>
                    </div>
                </div>
            </div>
            <script src="./assets/js/main.js"></script>
</body>

</html>