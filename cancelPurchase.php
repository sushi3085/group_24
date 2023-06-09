<?php
session_start();
if(!isset($_SESSION['mId'])){
    echo "not logged in";
    exit();
}

include "db_conn.php";
$mId = $_SESSION['mId'];
$pName = $_POST['pName'];

$pNo = sqlQry("SELECT `pNo` FROM `product` WHERE `pName` = '$pName'")->fetch_assoc()['pNo'];
$result = sqlQry("DELETE FROM `cart` WHERE `mId` = '$mId' AND `pNo` = '$pNo'");
if($result){
    echo "success";
}else{
    echo "fail";
}
?>