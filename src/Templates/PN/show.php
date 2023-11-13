<div class="col-md-12">
    <div class="container__content">
        <?php if ($PN) :?>
        <h1 class="text-center">Danh sách phiếu nhập hàng</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID phiếu nhập</th>
                    <th>Ngày nhập</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($PN as $item) : ?>

                <tr>
                    <td><?= htmlspecialchars($item->ID_PN) ?></td>
                    <td><?= htmlspecialchars($item->Ngay_PN->format('Y-m-d')) ?></td>
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
                        <h2 class="modal-title" id="editModalLabel">Chỉnh sửa phiếu nhập</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="id_pn">ID phiếu nhập:</label>
                                <input type="number" min="1" class="form-control form-control-lg" id="id_pn">
                            </div>
                            <div class="form-group">
                                <label for="ngay_pn">Ngày nhập:</label>
                                <input type="date" class="form-control form-control-lg" id="ngay_pn">
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
