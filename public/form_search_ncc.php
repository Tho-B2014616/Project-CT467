<?php 
    //ghi chú: đã thay đổi tên hàm tìm kiếm và thêm mới 1 số hàm
    include_once "../model/header.php";
    include_once "../model/db_connect.php";
    $pdo = connect_db();
    $results = "";
    if(isset($_GET['search-btn']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        
        //Biến results thông tin ncc ( Nếu tìm được! )
        $results = find_Ncc_NameSP($keyword);
        if(!empty($results)){
            $display = 'd-block';
        }else {
            $display = 'd-none';
        }
        
    }
    
    //(1)Tìm ncc theo tên SP
    function find_Ncc_NameSP($keyword){
        $sql = "SELECT a.Ten_SP, b.ID_NCC, b.Ten_NCC, b.SDT, b.Email
        FROM hang_hoa a , nha_cung_cap b 
        WHERE a.ID_NCC = b.ID_NCC                          
            and a.Ten_SP LIKE :keyword
        ORDER BY b.ID_NCC";
        return  get_result_Search($sql);        
                                                 
    }
    //(2)Tìm ncc theo ID NCC
    function find_Ncc_IDNcc($keyword){
        $sql = "SELECT a.Ten_SP, b.ID_NCC, b.Ten_NCC, b.SDT, b.Email
        FROM hang_hoa a , nha_cung_cap b 
        WHERE a.ID_NCC = b.ID_NCC                          
            and b.ID_NCC LIKE :keyword
        ORDER BY b.ID_NCC";
        return  get_one_result_Search($sql);        
                                                 
    }
    //(3)Tìm ncc theo tên NCC
    function find_Ncc_NameNcc($keyword){
        $sql = "SELECT a.Ten_SP, b.ID_NCC, b.Ten_NCC, b.SDT, b.Email
        FROM hang_hoa a , nha_cung_cap b 
        WHERE a.ID_NCC = b.ID_NCC                          
            and b.Ten_NCC LIKE :keyword
        ORDER BY b.ID_NCC";
        return  get_result_Search($sql);        
                                                 
    }
    

?>
<div class="row">
    <div class="col-md-12">
        <div class="container__search">
            <h1 class="text-center pb-4">Tìm kiếm nhà cung cấp</h1>

            <div class="form__search">
                <form method="GET" action="">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg form__search-input" name="keyword"
                            placeholder="Tìm nhà cung cấp theo tên SP">
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="search-btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!--end: form search -->
            <div class="container__search-info d-none <?=$display?>">
                <h1 class="text-center">Thông tin vi trí hàng hóa</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>ID nhà cung cấp</th>
                            <th>Tên nhà cung cấp</th>
                            <th>SĐT</th>
                            <th>Email</th>
                            <th>Tên hàng hóa</th>
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
                                        <td>'.$ID_NCC.'</td>
                                        <td>'.$Ten_NCC.'</td>
                                        <td>'.$SDT.'</td>
                                        <td>'.$Email.'</td>
                                        <td>'.$Ten_SP.'</td>
                                        <td>
                                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                                            Cập nhật
                                            </button> 
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

                                        </td>
                                    </tr>';
                                    $i++;
                                }
                            }
                        
                     
                        ?>
                    </tbody>

                </table>
                <!-- Modal xác nhận xóa -->
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
                    aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa nhà cung cấp</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Bạn có chắc chắn muốn xóa nhà cung cấp này?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Hủy</button>
                                <button type="button" class="btn btn-danger btn-lg">Xóa</button>
                            </div>
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
                            <h2 class="modal-title" id="editModalLabel">Chỉnh sửa nhà cung cấp</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="id_ncc">ID nhà cung cấp:</label>
                                    <input type="number" min="1" class="form-control form-control-lg" id="id_ncc">
                                </div>
                                <div class="form-group">
                                    <label for="name_ncc">Tên nhà cung cấp:</label>
                                    <input type="text" class="form-control form-control-lg" id="name_ncc">
                                </div>
                                <div class="form-group">
                                    <label for="sdt_ncc">Số điện thoại:</label>
                                    <input type="text" class="form-control form-control-lg" id="sdt_ncc">
                                </div>
                                <div class="form-group">
                                    <label for="email_ncc">Email:</label>
                                    <input type="email" class="form-control form-control-lg" id="email_ncc">
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