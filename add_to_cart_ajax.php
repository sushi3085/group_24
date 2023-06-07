<?php
session_start();
include "db_conn.php";

if(!isset($_POST['pNo'])) exit(-1);

$mId = $_SESSION['mId'];
$pNo = $_POST['pNo'];
$amount = $_POST['amount'];

$result = sqlQry("INSERT INTO cart (mId, pNo, amount) VALUES ('$mId', '$pNo', '$amount')");

if($result) echo 'success';
else echo 'fail';
?>