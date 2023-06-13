<?php
session_start();
include "db_conn.php";

$mId = $_SESSION['mId'];
$pName = $_POST['pName'];
$pNo = sqlQry("SELECT `pNo` FROM `product` WHERE `pName` = '$pName'")->fetch_assoc()['pNo'];
$amount = $_POST['amount'];

$result = sqlQry("UPDATE `cart` SET `amount` = '$amount'
                  WHERE `mId` = '$mId' AND `pNo` = $pNo AND `orderId` = '0'"
);

if($result){
    echo "success update $pName to $amount";
}
else{
    echo "fail. mId is $mId, pName is $pName, amount is $amount";
}
?>