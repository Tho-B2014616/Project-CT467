
<div class="col-md-12">
    <div class="container__content">
        <h1 class="text-center">Danh sách hàng hóa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Hàng hóa</th>
                    <th>Tên SP</th>
                    <th>Số lượng</th>
                    <th>Vi trí</th>
                    <th>Đơn vị tính</th>
                    <th>Nhà cung cấp</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
            <tbody id="data-container"></tbody>
        </table>

        <!-- Pagination -->
        <ul class="pagination" id="pagination-container"></ul>
        <!-- Modal cập nhật  -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="editModalLabel">Chỉnh sửa hàng hóa</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <input type="text" name="table" value="product" style="display: none;">
                            <input type="text" name="action" value="update" style="display: none;">
                            <div class="form-group">
                                <label for="productID">ID hàng hóa:</label>
                                <input type="number" min="1" class="form-control form-control-lg" id="productID" name="ID_HH">
                            </div>
                            <div class="form-group">
                                <label for="productName">Tên hàng hóa:</label>
                                <input type="text" class="form-control form-control-lg" id="productName" name="Ten_HH">
                            </div>
                            <div class="form-group">
                                <label for="productqnt">Số lượng:</label>
                                <input type="number" min="0" class="form-control form-control-lg" id="productqnt" name="So_lg">
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
                                <label for="productVT">ID_VT:</label>
                                <input type="number" min="1" class="form-control form-control-lg" id="productVT" name="ID_VT">
                            </div>
                            <div class="form-group">
                                <label for="productncc">Nhà cung cấp:</label>
                                <input type="number" min="1" class="form-control form-control-lg" id="productncc" name="ten_ncc">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                                <button type="submit" class="btn btn-primary btn-lg">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Dữ liệu mẫu
    const products = <?= json_encode($product) ?>;
    // Số lượng mục trên mỗi trang
    const itemsPerPage = 30;

    // Hàm hiển thị dữ liệu trên trang
    function displayData(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageData = products.slice(start, end);

        const dataContainer = document.getElementById('data-container');
        dataContainer.innerHTML = '';

        if (pageData.length === 0) {
            const noDataMessage = document.createElement('tr');
            noDataMessage.innerHTML = '<td colspan="7">Không có sản phẩm trùng khớp</td>';
            dataContainer.appendChild(noDataMessage);
        } else {
            pageData.forEach(item => {
                const row = document.createElement('tr');
                row.setAttribute('data-so-lg', item.So_lg);

                row.innerHTML = `
                    <td>${(item.ID_HH)}</td>
                    <td>${(item.Ten_SP)}</td>
                    <td>${(item.So_lg)}</td>
                    <td>${(item.ID_VT)}</td>
                    <td>${(item.DVT)}</td>
                    <td>${(item.NCC)}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
                            Cập nhật
                        </button>
                    </td>
                `;

                dataContainer.appendChild(row);
            });
        }
    }

    // Lấy các phần tử HTML cần sử dụng
    const editModal = document.getElementById('editModal');
    const productIDInput = document.getElementById('productID');
    const productNameInput = document.getElementById('productName');
    const productqntInput = document.getElementById('productqnt');
    const donViTinhSelect = document.getElementById('don_vi_tinh');
    const productVTInput = document.getElementById('productVT');
    const productNCCInput = document.getElementById('productncc');
    const saveChangesButton = document.querySelector('#editModal button[type="submit"]');

    // Xác định sản phẩm đang được cập nhật và giữ giá trị đã chọn
    let currentProductID;
    let selectedUnit;

    // Bắt sự kiện khi nút "Cập nhật" được bấm
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-primary')) {
            // Lấy thông tin sản phẩm từ hàng tương ứng
            const row = event.target.closest('tr');
            currentProductID = row.querySelector('td:first-child').textContent;

            // Hiển thị thông tin sản phẩm trong form cập nhật
            productIDInput.value = currentProductID;
            productNameInput.value = row.querySelector('td:nth-child(2)').textContent;
            productqntInput.value = row.querySelector('td:nth-child(3)').textContent;

            // Lưu giá trị đã chọn từ bảng
            selectedUnit = row.querySelector('td:nth-child(5)').textContent;

            donViTinhSelect.value = selectedUnit;
            productVTInput.value = row.querySelector('td:nth-child(4)').textContent;
            productNCCInput.value = '';


            // Mở modal cập nhật
            editModal.style.display = 'block';
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-danger')) {
            const hhID = event.target.getAttribute('data-hh-id');
            $('#hhIDInput').val(hhID);
            $('#confirmDeleteModal').modal('show');
        }
    });
</script>