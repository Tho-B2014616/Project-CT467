<div class="col-md-12">
    <div class="container__content">
        <?php if ($PX) :?>
        <h1 class="text-center">Danh sách phiếu xuất hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID phiếu xuất</th>
                    <th>Ngày xuất</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($PX as $item) : ?>

                <tr>
                    <td><?= htmlspecialchars($item->ID_PX) ?></td>
                    <td><?= htmlspecialchars($item->Ngay_PX->format('Y-m-d')) ?></td>
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

        <!-- Modal cập nhật  -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="editModalLabel">Chỉnh sửa phiếu xuất</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="id_pX">ID phiếu xuất:</label>
                                <input type="number" min="1" class="form-control form-control-lg" id="id_pX">
                            </div>
                            <div class="form-group">
                                <label for="ngay_pX">Ngày xuất:</label>
                                <input type="date" class="form-control form-control-lg" id="ngay_pX">
                            </div>
                            <div class="form-group">
                                <label for="hang_hoa">Hàng Hóa:</label>
                                <div id="hang_hoa">
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control form-control-lg"
                                            placeholder="Tên hàng hóa" required>
                                        <input type="number" class="form-control form-control-lg" placeholder="Số lượng"
                                            required>
                                        <div class="input-group-append">
                                            <button class="btn btn-danger" type="button"
                                                onclick="removeItem(this)">Xóa</button>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-2 btn-lg" type="button" onclick="addItem()">Thêm Hàng
                                    Hóa</button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg"
                                    data-dismiss="modal">Đóng</button>
                                <button type="submit" name="" class="btn btn-primary btn-lg">Lưu thay đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
