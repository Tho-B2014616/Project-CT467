 <div class="col-md-12">
     <div class="container__content">
         <?php if ($suppliers) :?>
         <h1 class="text-center">Danh sách nhà cung cấp</h1>
         <table class="table">
             <thead>
                 <tr>
                     <th>ID nhà cung cấp</th>
                     <th>Tên nhà cung cấp</th>
                     <th>Số điện thoại</th>
                     <th>Email</th>
                     <th>Tên hàng hóa</th>
                 </tr>
             </thead>
             <tbody>
                 <?php foreach ($suppliers as $item) : ?>
                 <tr>
                     <td><?= htmlspecialchars($item->ID_NCC) ?></td>
                     <td><?= htmlspecialchars($item->Ten_NCC) ?></td>
                     <td><?= htmlspecialchars($item->SDT) ?></td>
                     <td><?= htmlspecialchars($item->Email) ?></td>
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
                         <h2 class="modal-title" id="editModalLabel">Chỉnh sửa nhà cung cấp</h2>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <form method="POST" action="">
                             <input type="text" name="table" value="supplier" style="display: none;">
                             <input type="text" name="action" value="update" style="display: none;">
                             <div class="form-group">
                                 <label for="id_ncc">ID nhà cung cấp:</label>
                                 <input type="number" min="1" class="form-control form-control-lg" id="id_ncc" name="id_ncc">
                             </div>
                             <div class="form-group">
                                 <label for="name_ncc">Tên nhà cung cấp:</label>
                                 <input type="text" class="form-control form-control-lg" id="name_ncc" name="ten_ncc">
                             </div>
                             <div class="form-group">
                                 <label for="sdt_ncc">Số điện thoại:</label>
                                 <input type="text" class="form-control form-control-lg" id="sdt_ncc" name="sdt">
                             </div>
                             <div class="form-group">
                                 <label for="email_ncc">Email:</label>
                                 <input type="email" class="form-control form-control-lg" id="email_ncc" name="email">
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
            // Lấy thông tin nhà cung cấp từ hàng tương ứng
            const row = event.target.closest('tr');

            // Lấy giá trị của các ô trong hàng
            const id_ncc = row.querySelector('td:first-child').textContent;
            const name_ncc = row.querySelector('td:nth-child(2)').textContent;
            const sdt_ncc = row.querySelector('td:nth-child(3)').textContent;
            const email_ncc = row.querySelector('td:nth-child(4)').textContent;

            // Hiển thị thông tin nhà cung cấp trong form cập nhật
            document.getElementById('id_ncc').value = id_ncc;
            document.getElementById('name_ncc').value = name_ncc;
            document.getElementById('sdt_ncc').value = sdt_ncc;
            document.getElementById('email_ncc').value = email_ncc;

            // Mở modal cập nhật
            $('#editModal').modal('show');
        }
    });
</script>
