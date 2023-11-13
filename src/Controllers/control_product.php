<?php
$productModel = new Product($pdo);
if ($selectedaction != 'update' && $selectedaction != 'add_submit'&& $selectedaction != 'delete_submit'){
    $product = $productModel->Hien_thi_HH();
    require_once __DIR__ . '/../Templates/product/'. $selectedaction .'.php';}

if( isset($_POST['search-btn']) ) {
    if(!empty($_POST['tensp'])){
        $tensp = $_POST['tensp'];
        $product = $productModel ->Tim_HH_TEN($tensp);
    }
    if(!empty($_POST['ten_ncc'])){
        $ten_ncc = $_POST['ten_ncc'];
        $product = $productModel ->Tim_HH_NCC($ten_ncc);
    }if(!empty($_POST['so_lo'])){
        $so_lo = $_POST['so_lo'];
        $product = $productModel ->Tim_HH_Lo($so_lo);
    }
    require_once __DIR__ . '/../Templates/product/show.php';
}


if($selectedaction  == 'update'){
    $id_hh = $_POST['ID_HH'];
    $ten_hh = $_POST['Ten_HH'];
    $So_lg = $_POST['So_lg'];
    $DVT = $_POST['DVT'];
    $ID_VT = $_POST['ID_VT'];
    $ID_ncc = isset($_POST['ten_ncc']) ? intval($_POST['ten_ncc']) : 0;
        $product = $productModel->update_HH($id_hh,$ten_hh,$So_lg,$DVT,$ID_VT,$ID_ncc);
        require_once __DIR__ . '/../Templates/product/show.php';
        //$succes = $productModel->Them_HH($id_hh,$ten_hh,$So_lg,$DVT,$ID_VT,$ID_ncc);
        if($succes){echo '<script>alert("Hàng hóa đã được thêm thành công!");</script>';}
}

if($selectedaction  == 'add_submit'){
    $ten_hh = $_POST['Ten_HH'];
    $So_lg = $_POST['So_lg'];
    $DVT = $_POST['DVT'];
    $ID_VT = $_POST['ID_VT'];
    $ID_ncc = $_POST['ID_ncc'];
    $succes = $productModel->Them_HH($ten_hh,$So_lg,$DVT,$ID_VT,$ID_ncc);
    if($succes){echo '<script>alert("Hàng hóa đã được thêm thành công!");</script>';}
    else {echo '<script>alert("Hàng hóa được thêm không thành công!");</script>';}
}

if($selectedaction  == 'delete_submit'){
    $id_hh = $_POST['ID_HH'];
    $productModel ->delete_hh($id_hh);
}
?>
