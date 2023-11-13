<?php

<<<<<<< HEAD
use function PHPSTORM_META\type;
try {
  require_once __DIR__ . '/../src/PDOFactory.php';  
} catch (PDOException $e) {
  echo $e->getMessage();
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["table"]) && !empty($_POST["action"])) {
  $selectedtable = $_POST["table"];
  $selectedaction = $_POST["action"];
  $form = null;
  include_once __DIR__ . '/../src/Classes/' . $selectedtable . '.php';
  include_once __DIR__ . '/../src/Controllers/control_'. $selectedtable . '.php';
} else {
  $form = 'Chưa chọn nội dung';
}
=======
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




>>>>>>> 094bbb29f2796309818dc72c90f97fe04f03d13a
?>