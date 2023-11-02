<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["table"]) && !empty($_POST["action"])) {
  $selectedtable = $_POST["table"];
  $selectedaction = $_POST["action"];
  echo "Bạn đã chọn bảng: ". "<strong>$selectedtable</strong>" ." và chọn thao tác: ". "<strong>$selectedaction</strong>";
}
else {
    header('location: index.php');
   
}



?>