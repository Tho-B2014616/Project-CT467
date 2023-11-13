<div class="col-md-12 ">
        <div class="container__content">
            <?php if ($locations) :?>
            <h1 class="text-center">Danh sách vị trí</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID vị trí</th>
                        <th>Số kệ</th>
                        <th>Số lô</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($locations as $item) : ?>

                    <tr>
                        <td><?= htmlspecialchars($item->ID_VT) ?></td>
                        <td><?= htmlspecialchars($item->So_ke) ?></td>
                        <td><?= htmlspecialchars($item->So_lo) ?></td>
                        <td>
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                                Cập nhật
                            </button>
                        </td>
                    </tr>
                    <?php endforeach;
          endif; ?>
                    </tr>
            </table>
            </div>
            <!-- Modal cập nhật  -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="modal-title" id="editModalLabel">Chỉnh sửa vị trí</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                            <input type="text" name="table" value="location" style="display: none;">
                             <input type="text" name="action" value="update" style="display: none;">
                                <div class="form-group">
                                    <label for="locations_vitri">ID vị trí:</label>
                                    <input type="number" min="1" class="form-control form-control-lg"
                                        id="locations_vitri" name="id_VT">
                                </div>

                                <div class="form-group">
                                    <label for="locationssoke">Số kệ:</label>
                                    <input type="number" min="1" max="5" class="form-control form-control-lg"
                                        id="locationssoke" name="so_ke">
                                </div>
                                <div class="form-group">
                                    <label for="locationssolo">Số lô:</label>
                                    <input type="number" min="1" class="form-control form-control-lg"
                                        id="locationssolo" name="so_lo">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-lg"
                                        data-dismiss="modal">Đóng</button>
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
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('btn-primary')) {
            // Lấy thông tin vị trí từ hàng tương ứng
            const row = event.target.closest('tr');

            // Lấy giá trị của các ô trong hàng
            const id_vt = row.querySelector('td:first-child').textContent;
            const so_ke = row.querySelector('td:nth-child(2)').textContent;
            const so_lo = row.querySelector('td:nth-child(3)').textContent;

            // Hiển thị thông tin vị trí trong form cập nhật
            document.getElementById('locations_vitri').value = id_vt;
            document.getElementById('locationssoke').value = so_ke;
            document.getElementById('locationssolo').value = so_lo;

            // Mở modal cập nhật
            $('#editModal').modal('show');
        }
    });
</script>