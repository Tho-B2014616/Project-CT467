<<<<<<< HEAD
<?php
//khóa đăng ký: @123thn
session_start();
ob_start();
=======
<?php 
    // Mọi người tạo thêm table user gồm (id, user_name và password) vào csdl qlkho và tạo một tài khoản để đăng nhập
    // Có ảnh minh họa lưu tại: Project-CT467\public\assets\img  
    // Nếu đã tạo xong thì mở các comments bên dưới

    session_start();
    ob_start();

    if(!isset($_SESSION['admin'])){
        header('location: login_regis.php');
    }
    include_once "../model/header.php";

    

    // include_once "../model/content.php";
   
    // include_once "../public/form_search_vitri.php";
    // include_once "../public/form_search_ncc.php";
    // include_once "../public/form_search_pn.php";
    if (isset($_POST['action-btn'])  && !empty($_POST["table"]) && !empty($_POST["action"]) ) {
        $selectedTable = $_POST["table"];
        $selectedAction = $_POST["action"];
        if($selectedTable =="product"){
            if($selectedAction == "search"){
                include_once __DIR__ . "/../public/form_search_hh.php";
            
            }elseif ($selectedAction == "show"){
                include_once "../public/form_show.php";               
                $showItem = $show_ds_hh;
                include_once "../model/content.php";
            }else{

            }
        }
        elseif($selectedTable =="ncc"){
            if($selectedAction == "search"){
                include_once __DIR__ . "/../public/form_search_ncc.php";
            
            }elseif ($selectedAction == "show"){
                include_once "../public/form_show.php";               
                $showItem = $show_ds_ncc;
                include_once "../model/content.php";
            }else{
                
            }
        } elseif($selectedTable =="vitri"){
            if($selectedAction == "search"){
                include_once __DIR__ . "/../public/form_search_hh.php";
            
            }elseif ($selectedAction == "show"){
                include_once "../public/form_show.php";               
                $showItem = $show_ds_vitri;
                include_once "../model/content.php";
            }else{
                
            }
        } elseif($selectedTable =="pn"){
            if($selectedAction == "search"){
                include_once __DIR__ . "/../public/form_search_hh.php";
            
            }elseif ($selectedAction == "show"){
                include_once "../public/form_show.php";               
                $showItem = $show_ds_pn;
                include_once "../model/content.php";
            }else{
                
            }
        }elseif($selectedTable =="px"){
            if($selectedAction == "search"){
                include_once __DIR__ . "/../public/form_search_hh.php";
            
            }elseif ($selectedAction == "show"){
                include_once "../public/form_show.php";               
                $showItem = $show_ds_px;
                include_once "../model/content.php";
            }else{
                
            }
      }
      else {
        
        //   echo "Chưa chọn giá trị";
        
      }
    }




    
    include_once "../model/footer.php";            
?>

>>>>>>> 094bbb29f2796309818dc72c90f97fe04f03d13a

if (!isset($_SESSION['admin'])) {
    header('location: /../src/login_regis.php');
} else {
    include_once __DIR__ . "/../src/Templates/header.php";
    include_once __DIR__ . "/../public/handle.php";
    include_once __DIR__ . "/../src/Templates/footer.php";
}
