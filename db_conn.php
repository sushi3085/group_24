<?php

$link = mysqli_connect('localhost','root','root123456','group_24');

if ( !$link ) {
    echo "連結錯誤代碼: ".mysqli_connect_errno()."<br>";//顯示錯誤代碼
    echo "連結錯誤訊息: ".mysqli_connect_error()."<br>";//顯示錯誤訊息
    exit();
}

// mysqli_set_charset($link,'utf8');
mysqli_query($link,'SET CHARACTER SET utf8');
mysqli_query($link,"SET collation_connection = 'utf8_unicode_ci'");

// handy function
function sqlQry($sql){
    global $link;
    $result = mysqli_query($link,$sql);
    return $result;
}

$result = mysqli_query($link,"SELECT * FROM `cart` WHERE `quantity` = 3");
?>