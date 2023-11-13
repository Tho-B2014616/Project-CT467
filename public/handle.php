<?php

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
?>