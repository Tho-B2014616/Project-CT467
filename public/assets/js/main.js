// Handle Add Phiếu nhập / Phiếu xuất
function addItem() {
    var newItem = `
        <div class="input-group mb-2">
            <input type="text" name="ten_hh" class="form-control form-control-lg" min="1" placeholder="Tên hàng hóa" required>
            <input type="number" name="sl_hh" class="form-control form-control-lg" min="1" placeholder="Số lượng" required>
            <div class="input-group-append">
                <button class="btn btn-danger" type="button" onclick="removeItem(this)">Xóa</button>
            </div>
        </div>
    `;
    document.getElementById("hang_hoa").insertAdjacentHTML("beforeend", newItem);
}

function removeItem(btn) {
    btn.closest(".input-group").remove();
}