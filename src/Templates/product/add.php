<br>
<br>
<h1 class="text-center pt-3">Thêm hàng hóa</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
    <input type="text" name="table" value="product" style="display: none;">
                <input type="text" name="action" value="add_submit" style="display: none;">
        <div class="form-group">
            <label for="name" class="form-label">Tên hàng hóa:</label>
            <input type="text" class="form-control form-control-lg" id="name" placeholder="Nhập tên hàng hóa" name="Ten_HH">
        </div>
        <div class="form-group">
            <label for="quantity" class="form-label">Số lượng:</label>
            <input type="number" class="form-control form-control-lg" min="1" id="quantity" placeholder="Nhập số lượng" name="So_lg">
        </div>
        <div class="form-group">
            <label for="don_vi_tinh">Đơn vị tính:</label>
            <select class="form-control form-control-lg" id="don_vi_tinh" name="DVT">
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
                placeholder="Nhập ID vị trí" name="ID_VT">
        </div>
        <div class="form-group">
            <label for="ncc" class="form-label">Nhà cung cấp:</label>
            <input type="number" min="1" class="form-control form-control-lg" id="ncc"
                placeholder="Nhập ID nhà cung cấp" name="ID_ncc">
        </div>

        <div class="form__footer_btn">
            <button type="submit" name="add-btn" class="btn btn-primary btn-lg add-btn">Thêm</button>
            <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>