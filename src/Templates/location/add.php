<br>
<br>
<h1 class="text-center pt-1">Thêm vị trí</h1>
<div class="container__form">
    <form class="container__form-content" method="POST" action="">
    <input type="text" name="table" value="location" style="display: none;">
        <input type="text" name="action" value="add_submit" style="display: none;">
        <div class="form-group">
            <label for="soke" class="form-label">Số kệ:</label>
            <input type="number" min="1" class="form-control form-control-lg" id="soke" placeholder="Nhập số kệ" name="so_ke">
        </div>
        <div class="form-group">
            <label for="solo" class="form-label">Số lô:</label>
            <input type="number" class="form-control form-control-lg" min="1" id="solo" placeholder="Nhập số lô" name="so_lo">
        </div>
        
        <div class="form__footer_btn">
        <button type="submit" name="add-btn" class="btn btn-primary btn-lg add-btn">Thêm</button>
        <button type="reset" name="reset-btn" class="btn btn-danger btn-lg form__footer_btn-reset">Hủy bỏ</button>
        </div>
    </form>
</div>