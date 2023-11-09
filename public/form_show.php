<?php 
  include_once __DIR__ . '/../model/db_connect.php';
  $ds_hh = get_hh();
  

/* Hiển thị danh sách */
//(1) Show ds hh

$show_ds_hh = '
<h1 class="text-center">Danh sách hàng hóa</h1>
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
    <tr>
      <td>1</td>
      <td>3</td>
      <td>name1</td>
      <td>10</td>
      <td>Kg</td>
      <td>1</td>
      <td>3</td>
      <td>Dibbert and Sons</td>
      <td>
        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
            Cập nhật
        </button>
        <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>
      </td>
    </tr>
    <tr>
      <td>2</td>
      <td>5</td>
      <td>name2</td>
      <td>20</td>
      <td>Bottle</td>
      <td>5</td>
      <td>5</td>
      <td>Friesen Inc</td>
      <td>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
            Cập nhật
        </button>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>
      </td>
    </tr>
    
</table>    
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
  </div>

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
            <div class="form-group">
                <label  for="productID">ID hàng hóa:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="productID">
            </div>
            <div class="form-group">
                <label  for="productName">Tên hàng hóa:</label>
                <input type="text" class="form-control form-control-lg" id="productName">
            </div>
            <div class="form-group">
                <label for="productqnt">Số lượng:</label>
                <input type="number" min="0" class="form-control form-control-lg" id="productqnt">
            </div>
            <div class="form-group">
              <label for="don_vi_tinh">Đơn vị tính:</label>
              <select class="form-control form-control-lg" id="don_vi_tinh">
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
                <label for="productsolo">Số lô:</label>
                <input type="number" min="1" max="5" class="form-control form-control-lg" id="productsolo">
            </div>
            <div class="form-group">
                <label for="productsoke">Số kệ:</label>
                <input type="number" min="1" max="5" class="form-control form-control-lg" id="productsoke">
            </div>
            <div class="form-group">
                <label for="productncc">Nhà cung cấp:</label>
                <input type="text" class="form-control form-control-lg" id="productncc">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>  ';

    

//(2) show ds vitri
$show_ds_vitri = '
<h1 class="text-center">Danh sách vị trí</h1>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID vị trí</th>
            <th>Số kệ</th>
            <th>Số lô</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>3</td>
            <td>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
                </button>    
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>1</td>
            <td>1</td>
            <td>3</td>
            <td>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
                </button>     
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>
            </td>
        </tr>
</table> 
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa vị trí</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Bạn có chắc chắn muốn xóa vị trí này?</p>
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
            <div class="form-group">
                <label  for="product_vitri">ID vị trí:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="product_vitri">
            </div>
                     
            <div class="form-group">
                <label for="productsoke">Số kệ:</label>
                <input type="number" min="1" max="5" class="form-control form-control-lg" id="productsoke">
            </div>
            <div class="form-group">
                <label for="productsolo">Số lô:</label>
                <input type="number" min="1" max="5" class="form-control form-control-lg" id="productsolo">
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>  ';
       

//(3) show ds ncc
$show_ds_ncc = '
<h1 class="text-center">Danh sách nhà cung cấp</h1>
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>ID nhà cung cấp</th>
            <th>Tên nhà cung cấp</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <tr>  
            <td>1</td>
            <td>1</td>
            <td>Dibbert and Sons</td>
            <td>680-527-18</td>
            <td>ccoyne0@joomla.org</td>
            <td>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
                </button> 
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>2</td>
            <td>Kris and Sons</td>
            <td>468-345-99</td>
            <td>tablett1@sciencedirect.com</td>
            <td>
                <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
                </button> 
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

            </td>
        </tr>
</table>
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <label  for="id_ncc">ID nhà cung cấp:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="id_ncc">
            </div>
            <div class="form-group">
                <label  for="name_ncc">Tên nhà cung cấp:</label>
                <input type="text" class="form-control form-control-lg" id="name_ncc">
            </div>
            <div class="form-group">
                <label for="sdt_ncc">Số điện thoại:</label>
                <input type="text"  class="form-control form-control-lg" id="sdt_ncc">
            </div>
           <div class="form-group">
                <label for="email_ncc">Email:</label>
                <input type="email"  class="form-control form-control-lg" id="email_ncc">
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div> ';


//(4) show ds phiếu nhập
$show_ds_pn ='
<h1 class="text-center">Danh sách phiếu nhập hàng</h1>
<table class="table">
  <thead>
    <tr>     
        <th>STT</th>
        <th>ID phiếu nhập</th>
        <th>Ngày nhập</th>
        <th>ID nhà cung cấp</th>
        <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>1</td>
        <td>001</td>
        <td>2020-09-01</td>
        <td>001</td>
        <td>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
            </button> 
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>002</td>
        <td>2020-09-05</td>
        <td>002</td>
        <td>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
              </button> 
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

        </td>
    </tr>
    <!-- Thêm các dòng khác tương tự -->
  </tbody>
</table>
</div>
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa phiếu nhập</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Bạn có chắc chắn muốn xóa phiếu nhập này?</p>
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <label  for="id_pn">ID phiếu nhập:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="id_pn">
            </div>
            <div class="form-group">
                <label  for="ngay_pn">Ngày nhập:</label>
                <input type="date" class="form-control form-control-lg" id="ngay_pn">
            </div>
            <div class="form-group">
                <label for="id_ncc">ID nhà cung cấp:</label>
                <input type="number" min="1"  class="form-control form-control-lg" id="id_ncc">
            </div>
            <div class="form-group">
            <label for="hang_hoa">Hàng Hóa:</label>
            <div id="hang_hoa">
                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="Tên hàng hóa" required>
                    <input type="number" class="form-control form-control-lg" placeholder="Số lượng" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button" onclick="removeItem(this)">Xóa</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2 btn-lg" type="button" onclick="addItem()">Thêm Hàng Hóa</button>
        </div>           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" name="" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>';








//(5) show ds phiếu xuất

$show_ds_px ='
<h1 class="text-center">Danh sách phiếu xuất hàng</h1>
<table class="table">
  <thead>
    <tr>     
        <th>STT</th>
        <th>ID phiếu xuất</th>
        <th>Ngày xuất</th>
        <th>Thao tác</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td>1</td>
        <td>001</td>
        <td>2020-09-01</td>
        <td>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
            </button> 
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>002</td>
        <td>2020-09-05</td>
        <td>
            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                  Cập nhật
            </button> 
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button
        </td>
    </tr>
    <!-- Thêm các dòng khác tương tự -->
  </tbody>
</table>
</div>
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa phiếu xuất</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Bạn có chắc chắn muốn xóa phiếu xuất này?</p>
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <label  for="id_px">ID phiếu xuất:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="id_px">
            </div>
            <div class="form-group">
                <label  for="ngay_px">Ngày xuất:</label>
                <input type="date" class="form-control form-control-lg" id="ngay_px">
            </div>         
            <div class="form-group">
            <label for="hang_hoa">Hàng Hóa:</label>
            <div id="hang_hoa">
                <div class="input-group mb-2">
                    <input type="text" class="form-control form-control-lg" placeholder="Tên hàng hóa" required>
                    <input type="number" class="form-control form-control-lg" placeholder="Số lượng" required>
                    <div class="input-group-append">
                        <button class="btn btn-danger" type="button" onclick="removeItem(this)">Xóa</button>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-2 btn-lg" type="button" onclick="addItem()">Thêm Hàng Hóa</button>
        </div>           
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" name="" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>';

  










/* Hiển thị thông tin từng bảng */
//(1) Show thông tin phiếu nhập
// Lấy dữ liệu truyền vào các biến
$id_pn='4';
$ngay_pn ='2023-07-16';
$ma_ncc = '42';


$show_tt_pn ='
<h1 class="text-center">Thông tin phiếu nhập hàng</h1>     
<div class="row mt-4 ml-1 mr-1">
    <div class="col-md-6">
        <div class="form-group">
            <label for="ma-phieu">Mã phiếu:</label>
            <input type="number"  class="form-control form-control-lg" id="ma-phieu" readonly value="'.$id_pn.'">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="ngay-nhap">Ngày nhập:</label>
            <input type="date" class="form-control form-control-lg" id="ngay-nhap" readonly value="'.$ngay_pn.'">
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
                <tr>
                    <th scope="row">1</th>
                    <td>001</td>
                    <td>Hàng hóa 1</td>
                    <td>10</td>
                    <td>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                          Cập nhật
                        </button> 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>002</td>
                    <td>Hàng hóa 2</td>
                    <td>5</td>
                    <td>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                          Cập nhật
                        </button> 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
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
                <label  for="id_hh_pn">ID hàng hóa:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="id_hh_pn">
            </div>
            <div class="form-group">
                <label  for="name_hh">Tên hàng hóa:</label>
                <input type="text" class="form-control form-control-lg" id="name_hh">
            </div>
            <div class="form-group">
                <label for="sl_hh">Số lượng:</label>
                <input type="number" min="1"  class="form-control form-control-lg" id="sl_hh">
            </div>
                      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" name="" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>';   

//(2) Show thông tin phiếu xuất
$show_tt_px = '<h1 class="text-center">Thông tin phiếu xuất hàng</h1>
        
<div class="row mt-4 ml-1 mr-1">
    <div class="col-md-6">
        <div class="form-group">
            <label for="ma-phieu">Mã phiếu:</label>
            <input type="number"  class="form-control form-control-lg" id="ma-phieu" readonly value="'.$id_pn.'">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="ngay-xuất">Ngày xuất:</label>
            <input type="date" class="form-control form-control-lg" id="ngay-xuất" readonly value="'.$ngay_pn.'">
        </div>
    </div>
    
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID hàng hóa</th>
                    <th scope="col">Tên hàng hóa</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>SP001</td>
                    <td>Hàng hóa 1</td>
                    <td>10</td>
                    <td>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                          Cập nhật
                        </button> 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>SP002</td>
                    <td>Hàng hóa 2</td>
                    <td>5</td>
                    <td>
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#editModal">
                          Cập nhật
                        </button> 
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal">Xóa</button>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal xác nhận xóa -->
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
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
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin phiếu xuất</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="">
            <div class="form-group">
                <label  for="id_hh_px">ID hàng hóa:</label>
                <input type="number" min="1" class="form-control form-control-lg" id="id_hh_px">
            </div>
            <div class="form-group">
                <label  for="name_hh">Tên hàng hóa:</label>
                <input type="text" class="form-control form-control-lg" id="name_hh">
            </div>
            <div class="form-group">
                <label for="sl_hh">Số lượng:</label>
                <input type="number" min="1"  class="form-control form-control-lg" id="sl_hh">
            </div>
                      
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Đóng</button>
                <button type="submit" name="" class="btn btn-primary btn-lg">Lưu thay đổi</button>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
  ';



?>




