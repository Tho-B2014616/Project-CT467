<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["table"]) && !empty($_POST["action"]) ) {
  $selectedTable = $_POST["table"];
  $selectedAction = $_POST["action"];
  if($selectedTable == "product"){
      if($selectedAction == "show"){
        include_once "../public/form_search_hh.php";
        
      }
  }
}
else {
  
    echo "Chưa chọn giá trị";
  
}




?>