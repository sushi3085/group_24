<?php
session_start();
include "db_conn.php";

if(!isset($_POST['pNo'])) exit(-1);
if(!isset($_SESSION['mId'])){
    echo "user_not_login";
    exit(-2);
}

$mId = $_SESSION['mId'];
$pNo = $_POST['pNo'];
$amount = $_POST['amount'];

if(sqlQry("SELECT * FROM cart WHERE mId = '$mId' AND pNo = '$pNo' AND `orderId` = 0")->num_rows > 0){
    if(sqlQry("UPDATE cart SET amount = amount + '$amount' WHERE mId = '$mId' AND pNo = '$pNo' AND `orderId` = 0")){
        echo "success";
        exit(0);
    }
    else{
        echo "fail";
        exit(-3);
    }
}

// goods not in cart
$result = sqlQry("INSERT INTO cart (mId, pNo, amount, orderId) VALUES ('$mId', '$pNo', '$amount', 0)");

if($result) echo 'success';
else echo 'fail';
?>