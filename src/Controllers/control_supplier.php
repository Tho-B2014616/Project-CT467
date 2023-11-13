<?php
$supplierModel = new NhaCungCap($pdo);
if ($selectedaction != 'update' && $selectedaction != 'add_submit'&& $selectedaction != 'delete_submit'){
    $suppliers = $supplierModel->Hien_thi_NCC();
    require_once __DIR__ . '/../Templates/supplier/'. $selectedaction .'.php';}

if( isset($_POST['search-btn']) ) {
    if(!empty($_POST['ten_ncc'])){
        $ten_ncc = $_POST['ten_ncc'];
        $suppliers = $supplierModel ->Tim_ncc_TEN($ten_ncc);
    }
    require_once __DIR__ . '/../Templates/supplier/show.php';
}


if($selectedaction  == 'update'){
    $id_ncc = $_POST['id_ncc'];
    $ten_ncc = $_POST['ten_ncc'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
        $succes = $supplierModel->Update_NCC($id_ncc,$ten_ncc,$sdt,$email);
        if($succes){echo '<script>alert("Nhà cung cấp đã được cập nhật thành công!");</script>';}
}

if($selectedaction  == 'add_submit'){
    $ten_ncc = $_POST['ten_ncc'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $succes = $supplierModel->Them_NCC($ten_ncc,$sdt,$email);
    if($succes){echo '<script>alert("Nhà cung cấp đã được thêm thành công!");</script>';}
    else {echo '<script>alert("Nhà cung cấp được thêm không thành công!");</script>';}
}

if($selectedaction  == 'delete_submit'){
    $id_ncc = $_POST['ID_NCC'];
    $supplierModel ->delete_ncc($id_ncc);
}
?>
