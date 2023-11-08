<?php 
    // include_once "../model/header.php";
    include_once "../model/db_connect.php";
    $pdo = connect_db();
    $results = "";
    if( !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        
        // Sử dụng PDO để truy vấn CSDL
        $stmt = $pdo->prepare(" SELECT a.ID_HH, a.Ten_SP, a.So_lg, a.DVT, b.So_lo, b.So_ke, c.Ten_NCC
                                FROM hang_hoa a , vi_tri b , nha_cung_cap c
                                WHERE a.ID_VT = b.ID_VT 
                                    and a.ID_NCC=c.ID_NCC  
                                    and a.Ten_SP LIKE :keyword
                                ORDER BY a.ID_HH "   
                            );
                                
        $stmt->execute(['keyword' => '%' . $keyword . '%']);
        $results = $stmt->fetchAll();
        $no_reult = '';
        if(!empty($results)){
            $display = 'd-block';
        }else {
            $display = 'd-none';
            $no_reult = '<h1>Khong tim thay</h1>';
        }
        
    }
    

?>
<div class="row">
    <div class="col-md-12">
        <div class="container__search">
            <h1 class="text-center pb-4">Tìm kiếm sản phẩm</h1>

            <div class="form__search">
                <form method="GET" >
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg form__search-input" name="keyword"
                            placeholder="Tìm kiếm sản phẩm">
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="search-btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--end: form search -->
            <div class="container__search-info d-none <?=$display?>">
                <h1 class="text-center">Thông tin hàng hóa</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID hàng hóa</th>
                            <th>Tên hàng hóa</th>
                            <th>Số lượng</th>
                            <th>Đơn vị tính</th>
                            <th>Số lô</th>
                            <th>Số kệ</th>
                            <th>Nhà cung cấp</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if(is_array($results)){
                            $i=1;
                            foreach($results as $item){
                                
                                extract($item);
                                echo '
                                <tr>
                                    <td>'.$i.'</td>
                                    <td>'.$ID_HH.'</td>
                                    <td>'.$Ten_SP.'</td>
                                    <td>'.$So_lg.'</td>
                                    <td>'.$DVT.'</td>
                                    <td>'.$So_lo.'</td>
                                    <td>'.$So_ke.'</td>
                                    <td>'.$Ten_NCC.'</td>
                                    <td>
                                        <button type="button" class="btn btn-primary " data-toggle="modal"
                                            data-target="#editModal">
                                            Cập nhật
                                        </button>
                                        <button type="button" class="btn btn-danger " data-toggle="modal"
                                            data-target="#confirmDeleteModal">Xóa</button>
                                    </td>
                                </tr>';
                                $i++;
                            }
                        }
                        
                     
                        ?>


                </table>
                <!-- Modal xác nhận xóa -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa hàng hóa</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xóa hàng hóa này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary " data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-danger ">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal cập nhật  -->
                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
                    aria-hidden="true">
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
                                    <div class="form-group">
                                        <label for="productID">ID hàng hóa:</label>
                                        <input type="number" min="1" class="form-control form-control-lg"
                                            id="productID">
                                    </div>
                                    <div class="form-group">
                                        <label for="productName">Tên hàng hóa:</label>
                                        <input type="text" class="form-control form-control-lg" id="productName">
                                    </div>
                                    <div class="form-group">
                                        <label for="productqnt">Số lượng:</label>
                                        <input type="number" min="0" class="form-control form-control-lg"
                                            id="productqnt">
                                    </div>
                                    <div class="form-group">
                                        <label for="don_vi_tinh">Đơn vị tính:</label>
                                        <select class="form-control form-control-lg" id="don_vi_tinh">
                                            <option value="Bottle">Bottle</option>
                                            <option value="Kg">Kg</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="productsolo">Số lô:</label>
                                        <input type="number" min="1" max="5" class="form-control form-control-lg"
                                            id="productsolo">
                                    </div>
                                    <div class="form-group">
                                        <label for="productsoke">Số kệ:</label>
                                        <input type="number" min="1" max="5" class="form-control form-control-lg"
                                            id="productsoke">
                                    </div>
                                    <div class="form-group">
                                        <label for="productncc">Nhà cung cấp:</label>
                                        <input type="text" class="form-control form-control-lg" id="productncc">
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
            <?php 
                if(isset($_GET['search-btn']) && empty($results)){
                    echo '<h2 class="text-center text-danger pt-4">Không tìm thấy kết quả !</h2>';
                }
            ?>


        </div>

    </div>

</div>
<?php 
    include_once "../model/footer.php";

?>