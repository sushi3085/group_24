<?php
session_start();
include "db_conn.php";

$mId = $_SESSION['mId'];
$orderid = $_GET['orderid'];
echo $orderid;
//$result = sqlQry("DELETE * FROM `order` WHERE `orderId` = '$orderid'");
//header("Location: orderState.php");
?>
