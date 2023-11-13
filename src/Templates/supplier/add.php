<br>
<br>
<h1 class="text-center pt-1">Thêm nhà cung cấp</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
        <input type="text" name="table" value="supplier" style="display: none;">
        <input type="text" name="action" value="add_submit" style="display: none;">
        <div class="form-group">
            <label for="name" class="form-label">Tên nhà cung cấp:</label>
            <input type="text" class="form-control form-control-lg" id="name" placeholder="Nhập tên nhà cung cấp"
                name="ten_ncc">
        </div>
        <div class="form-group">
            <label for="sdt" class="form-label">Số điện thoại:</label>
            <input type="text" class="form-control form-control-lg" id="sdt" placeholder="Nhập số điện thoại"
                name="sdt">
        </div>
        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control form-control-lg" id="email" placeholder="Nhập email" name="email">
        </div>

        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-primary btn-lg add-btn">Thêm</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>