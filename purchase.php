<?php
session_start();
// access data from ajax .serialize()
include "db_conn.php";

$mId = $_SESSION['mId'];
$orderTime = date("Y-m-d H:i:s");
$receiver = $_POST['name'];// sqlQry("SELECT * FROM `member` WHERE `mId` = '$mId'")->fetch_assoc()['name'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// insert new order in the `order` table
// mId, orderTime, reciever, address, 
$result = sqlQry("INSERT INTO `order`
                    (`mId`, `orderTime`, `receiver`, `address`) VALUES
                    ('$mId', '$orderTime', '$receiver', '$address')");

// update all user cart orderId to the new orderId
if($result){
    $orderId = sqlQry("SELECT * FROM `order` WHERE `mId` = '$mId' AND `orderTime` = '$orderTime'")->fetch_assoc()['orderId'];
    sqlQry("UPDATE `cart` SET `orderId` = '$orderId' WHERE `mId` = '$mId' AND `orderId` = '0'");
    echo "success";
    exit();
}
echo "fail";
exit();
?>