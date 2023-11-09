<?php 
/*(1) Form Thêm Hàng hóa */

$form_add_hang_hoa = '
<h1 class="text-center pt-1">Thêm hàng hóa</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
        <div class="form-group">
            <label for="name" class="form-label">Tên hàng hóa:</label>
            <input type="text" class="form-control form-control-lg" id="name" placeholder="Nhập tên hàng hóa">
        </div>
        <div class="form-group">
            <label for="quantity" class="form-label">Số lượng:</label>
            <input type="number" class="form-control form-control-lg" min="1" id="quantity" placeholder="Nhập số lượng">
        </div>
        <div class="form-group">
            <label for="don_vi_tinh">Đơn vị tính:</label>
            <select class="form-control form-control-lg" id="don_vi_tinh">
            <option value="Bottle">Bottle</option>
            <option value="Kg">Kg</option>
            <option value="piece">piece</option>
            <option value="set">set</option>
            <option value="bag">bag</option>
            <option value="case">case</option>
            <option value="box">box</option>
            <option value="carton">carton</option>
            <option value="bundle">bundle</option>
            <option value="pack">pack</option>
            </select>
        </div>
        <div class="form-group">
            <label for="location" class="form-label">Vị trí:</label>
            <input type="number" min="1" class="form-control form-control-lg" id="location"
                placeholder="Nhập ID vị trí">
        </div>
        <div class="form-group">
            <label for="ncc" class="form-label">Nhà cung cấp:</label>
            <input type="number" min="1" class="form-control form-control-lg" id="ncc"
                placeholder="Nhập ID nhà cung cấp">
        </div>

        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-primary btn-lg add-btn">Thêm</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>';


//(2) Form Thêm Vị Trí

$form_add_vitri = '
<h1 class="text-center pt-1">Thêm vị trí</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
        <div class="form-group">
            <label for="soke" class="form-label">Số kệ:</label>
            <input type="number" min="1" class="form-control form-control-lg" id="soke" placeholder="Nhập số kệ">
        </div>
        <div class="form-group">
            <label for="solo" class="form-label">Số lô:</label>
            <input type="number" class="form-control form-control-lg" min="1" id="solo" placeholder="Nhập số lô">
        </div>
        
        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-primary btn-lg add-btn">Thêm</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>';

//(3) Form Thêm nhà cung cấp
$form_add_ncc = '
<h1 class="text-center pt-1">Thêm nhà cung cấp</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
        <div class="form-group">
            <label for="name" class="form-label">Tên nhà cung cấp:</label>
            <input type="text"  class="form-control form-control-lg" id="name" placeholder="Nhập tên nhà cung cấp">
        </div>
        <div class="form-group">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input type="tel" class="form-control form-control-lg" id="sdt" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control form-control-lg" id="email" placeholder="Nhập email">
        </div>
        
        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-primary btn-lg add-btn">Thêm</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>';

// (4) Form Thêm Phiếu Nhập

$form_add_pn = '
<h1 class="pt-1 text-center">Thêm phiếu Nhập</h1>
<div class="container__form">
    <form class="container__form-content" method="POST">
        <div class="form-group">
            <label for="id_pn">ID Phiếu Nhập:</label>
            <input type="number" min="1" id="id_pn" class="form-control form-control-lg" required>
        </div>

        <div class="form-group">
            <label for="ngay_nhap">Ngày Nhập:</label>
            <input type="date" id="ngay_nhap" class="form-control form-control-lg" required>
        </div>

        <div class="form-group">
            <label for="ma_ncc">ID Nhà Cung Cấp:</label>
            <input type="number" min="1" id="ma_ncc" class="form-control form-control-lg" required>
        </div>

        <div class="form-group">
            <label for="hang_hoa">Hàng Hóa:</label>
            <div id="hang_hoa">
                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="Tên hàng hóa" required>
                    <input type="number" class="form-control form-control-lg" placeholder="Số lượng" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button" onclick="removeItem(this)">Xóa</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2 btn-lg" type="button" onclick="addItem()">Thêm Hàng Hóa</button>
        </div>

        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-success btn-lg add-btn">Lưu</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>';


//(5) Form Thêm Phiếu Xuất
$form_add_px = '
<h1 class="pt-1 text-center">Thêm Phiếu xuất</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
        <div class="form-group">
            <label for="id_px">ID phiếu xuất:</label>
            <input type="number" min="1" id="id_px" class="form-control form-control-lg" required>
        </div>

        <div class="form-group">
            <label for="ngay_nhap">Ngày xuất hàng:</label>
            <input type="date" id="ngay_nhap" class="form-control form-control-lg" required>
        </div>
      
        <div class="form-group">
            <label for="hang_hoa">Hàng Hóa:</label>
            <div id="hang_hoa">
                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="Tên hàng hóa" required>
                    <input type="number" class="form-control form-control-lg" placeholder="Số lượng" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button" onclick="removeItem(this)">Xóa</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2 btn-lg" type="button" onclick="addItem()">Thêm Hàng Hóa</button>
        </div>

        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-success btn-lg add-btn">Lưu</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>';



?>