<?php
if(!isset($_POST["editType"])){
    echo "fail";
    die("Not supported edit type");
}

include "db_conn.php";

$editType = $_POST["editType"];
if($editType == "member"){
    $id = $_POST["id"];
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $birthday = $_POST["birthday"];

    $result = sqlQry("UPDATE member SET name='$name', `e-mail`='$mail', birth='$birthday' WHERE mId='$id'");
    if($result) echo "success";
    else echo "fail";
}

if($editType == "goods"){
    $goodsId = $_POST["goodsId"];
    $goodsName = $_POST["goodsName"];
    $goodsPrice = $_POST["goodsPrice"];
    $goodsCategory = $_POST["goodsCategory"];
    $goodsImgPath = $_POST["goodsImgPath"];
    if($goodsImgPath == "") $goodsImgPath = mysqli_fetch_assoc(sqlQry("SELECT `imgPath` FROM product WHERE pNo='$goodsId'"))["imgPath"];
    $goodsDescription = $_POST["goodsDescription"];
    
    $result = sqlQry("UPDATE products SET pName='$goodsName', price='$goodsPrice', category='$goodsCategory', imgPath='$goodsImgPath', description='$goodsDescription' WHERE pId='$goodsId'");
    if($result) echo "success";
    else echo "fail";
}

if($editType == "qryOrder"){
    $orderId = $_POST["orderId"];
    $orderState = $_POST["orderState"];
    $result = sqlQry("SELECT * FROM `order` WHERE oId='$orderId'");
    if($result) echo json_encode($result);
    else echo "fail";
}

if($editType == "deleteUser"){
    $mId = $_POST["mId"];
    $result = sqlQry("DELETE FROM member WHERE mId='$mId'");
    if($result) echo "success";
    else echo "fail";
}
if($editType == "deleteGoods"){
    $pNo = $_POST["pNo"];
    $result = sqlQry("DELETE FROM products WHERE pNo='$pNo'");
    if($result) echo "success";
    else echo "fail";
}
if($editType == "deleteOrder"){
    $orderId = $_POST["orderId"];
    $result = sqlQry("DELETE FROM `order` WHERE orderId = '$orderId'");
    if($result) echo "success";
    else echo "fail";
}

if($editType == "addUser"){
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $birthday = $_POST["birthday"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $result = sqlQry("INSERT INTO member (name, `e-mail`, birth, pswd) VALUES ('$name', '$mail', '$birthday', '$password')");
    if($result) echo "success";
    else echo "fail";
}
?>