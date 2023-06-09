<?php
session_start();
$mId = $_SESSION['mId'];

include "db_conn.php";

// get all goods in the cart of the member
$result = sqlQry("SELECT * FROM `cart` WHERE `mId` = '$mId'");
while($row = mysqli_fetch_assoc($result)){
    sqlQry("INSERT INTO `order`
    (`mId`, `gId`, `quantity`, `totalCost`, `status`) VALUES
    ('$mId', '$row[gId]', '$row[quantity]', '$row[totalCost]', '0')");
}
?>