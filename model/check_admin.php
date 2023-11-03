<?php 
function check_user($user_name,$user_pass)  {
    $sql = "SELECT * FROM user WHERE user_name='".$user_name."' AND password='".$user_pass."'";
    
    return get_one($sql);
}

?>