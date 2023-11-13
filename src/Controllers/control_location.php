<?php
$locationModel = new ViTri($pdo);
if ($selectedaction != 'update' && $selectedaction != 'add_submit'&& $selectedaction != 'delete_submit'){
    $locations = $locationModel->Hien_thi_VT();
    require_once __DIR__ . '/../Templates/location/'. $selectedaction .'.php';}

if( isset($_POST['search-btn']) ) {
    if(!empty($_POST['ten_hh'])){
        $ten_hh = $_POST['ten_hh'];
        $locations = $locationModel ->Tim_VT($ten_hh);
    }
    require_once __DIR__ . '/../Templates/location/show.php';
}


if($selectedaction  == 'update'){
    $id_VT = $_POST['id_VT'];
    $So_lo = $_POST['so_lo'];
    $So_ke = $_POST['so_ke'];
    $succes = $locationModel->Update_Ke($id_VT,$So_ke,$So_lo);
    if($succes){echo '<script>alert("Vị trí đã được cập nhật thành công!");</script>';}
}

if($selectedaction  == 'add_submit'){
    $so_lo = $_POST['so_lo'];
    $so_ke = $_POST['so_ke'];
    $succes = $locationModel->Them_VT($so_ke,$so_lo);
    if($succes){echo '<script>alert("Vị trí đã được thêm thành công!");</script>';}
    else {echo '<script>alert("Vị trí được thêm không thành công!");</script>';}
}

if($selectedaction  == 'delete_submit'){
    $ID_VT = $_POST['ID_VT'];
    $succes = $locationModel ->Delete_VT($ID_VT);
    
    if($succes){echo '<script>alert("Vị trí đã được xóa thành công!");</script>';}
    else {echo '<script>alert("Vị trí xóa không thành công vì đang còn hàng hóa!");</script>';}
}
?>
