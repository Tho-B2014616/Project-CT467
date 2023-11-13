<?php
$PXModel = new phieu_xuat($pdo);
if ($selectedaction != 'update' && $selectedaction != 'add_submit'&& $selectedaction != 'delete_submit'){
    $PX = $PXModel->Hien_Thi_PX();
    require_once __DIR__ . '/../Templates/PX/'. $selectedaction .'.php';}

    if(isset($_POST['search-btn']) && !empty($_POST['keyword'])) {
        $keyword = $_POST['keyword'];

        //Biến results thông tin phiếu nhập ( Nếu tìm được! )
        $PX = $PXModel->Tim_PX_ID( $keyword);
        include_once __DIR__ . '/../Classes/product.php';
        echo $PX[0]->ID_PX;
        $product = new Product($pdo);
        $product = $product ->Tim_HH_PX($PX[0]->ID_PX);
        require_once __DIR__ . '/../Templates/PX/show.php';
        require_once __DIR__ . '/../Templates/product/show.php';

    }

if($selectedaction  == 'delete_submit'){
    $id_px = $_POST['ID_PX'];
    $PXModel ->Delete_PX($id_px);
}
?>
