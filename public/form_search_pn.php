<?php 
    include_once "../model/db_connect.php";
    $pdo = connect_db();
   
    if(isset($_GET['search-btn']) && !empty($_GET['keyword'])) {
        $keyword = $_GET['keyword'];
        // Sử dụng PDO để truy vấn CSDL
        $results = find_pn_ID_pn($keyword);
        if(is_array($results) && !empty($results)){
            
            foreach($results as $item){                           
                extract($item);
                $ma_pn = $ID_PN;
                $ngay_pn = $Ngay_PN;
                // $nnc_pn = $ID_NCC;
                
            }
            $display = 'd-block';
            
        } else{
            $ma_pn = '';
            $ngay_pn = '';
            $nnc_pn = '';
            $display = 'd-none';
            $noResult = '<h2 class="text-center text-danger pt-4">Không tìm thấy kết quả !</h2>';

        }

        // if(!empty($results)){
        //     $display = 'd-block';

        // }else {
        //     $display = 'd-none';
            
        // }
        
    }
    
   
    function find_pn_ID_pn($keyword){
        $sql = "SELECT b.ID_PN, a.Ten_SP, a.ID_HH, a.So_lg, b.So_lg_nhap, c.ID_PN,c.Ngay_PN
        FROM hang_hoa a , info_pn b , phieu_nhap c, nha_cung_cap d
        WHERE a.ID_HH = b.ID_HH       
            and b.ID_PN =  c.ID_PN    
            and d.ID_NCC = a.ID_NCC          
            and c.ID_PN LIKE :keyword
        ORDER BY c.ID_PN";
        return  get_one_result_Search($sql);
    }
    

?>
<div class="row">
    <div class="col-md-12">
        <div class="container__search">
            <h1 class="text-center pb-4">Tìm kiếm thông tin phiếu nhập</h1>

            <div class="form__search">
                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg form__search-input" name="keyword"
                            placeholder="Tìm phiếu nhập theo mã">
                        <div class="input-group-append">
                            <button class="btn btn-primary" name="search-btn" type="submit">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
            </div>

            <!--end: form search -->
            <div class="container__search-info d-none <?=$display?>">

                <h1 class="text-center">Thông tin phiếu nhập hàng</h1>
                <div class="row mt-4 ml-1 mr-1">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ma-phieu">Mã phiếu:</label>
                            <input type="number" class="form-control form-control-lg" id="ma-phieu" readonly
                                value="<?=$ma_pn?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ngay-nhap">Ngày nhập:</label>
                            <input type="date" class="form-control form-control-lg" id="ngay-nhap" readonly
                                value="<?=$ngay_pn?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="ngay-nhap">Mã nhà cung cấp:</label>
                            <input type="number" class="form-control form-control-lg" id="ngay-nhap" readonly value="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">ID Hàng hóa</th>
                                    <th scope="col">Tên Hàng hóa</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thao tác</th>
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
                                <td>3</td>
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

                    </div>
                </div>

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
                            <h2 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin phiếu nhập</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="">
                                <div class="form-group">
                                    <label for="id_hh_pn">ID hàng hóa:</label>
                                    <input type="number" min="1" class="form-control form-control-lg" id="id_hh_pn">
                                </div>
                                <div class="form-group">
                                    <label for="name_hh">Tên hàng hóa:</label>
                                    <input type="text" class="form-control form-control-lg" id="name_hh">
                                </div>
                                <div class="form-group">
                                    <label for="sl_hh">Số lượng:</label>
                                    <input type="number" min="1" class="form-control form-control-lg" id="sl_hh">
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

</div>
    