<?php
$user = $_POST['mail'];

include "db_conn.php";

// 送出查詢的SQL指令
if ( $result = sqlQry("SELECT * FROM `member` WHERE `e-mail`='$user'") ) {
    if( $row = mysqli_fetch_assoc($result) ) echo "exist";
    else echo "not exist";
    mysqli_free_result($result); // 釋放佔用的記憶體
}
mysqli_close($link); // 關閉資料庫連結
?>