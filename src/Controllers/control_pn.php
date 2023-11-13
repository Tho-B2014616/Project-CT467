<?php
$PNModel = new phieu_nhap($pdo);
if ($selectedaction != 'update' && $selectedaction != 'add_submit'&& $selectedaction != 'delete_submit' && !isset($_POST['search-btn'])){
    $PN = $PNModel->Hien_Thi_PN();
    require_once __DIR__ . '/../Templates/PN/'. $selectedaction .'.php';}


    if(isset($_POST['search-btn']) && !empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];

        //Biến results thông tin phiếu nhập ( Nếu tìm được! )
        $PN = $PNModel->Tim_PN_ID( $keyword);
        include_once __DIR__ . '/../Classes/product.php';
        echo $PN[0]->ID_PN;
        $product = new Product($pdo);
        $product = $product ->Tim_HH_PN($PN[0]->ID_PN);
        require_once __DIR__ . '/../Templates/PN/show.php';
        require_once __DIR__ . '/../Templates/product/show.php';

    }
if($selectedaction  == 'delete_submit'){
    $id_pn = $_POST['ID_PN'];
    $PNModel ->Delete_PN($id_pn);
}
?>
