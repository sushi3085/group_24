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
    $phone = $_POST["phone"];
    // $address = $_POST["address"];
    $birthday = $_POST["birthday"];

    $result = sqlQry("UPDATE member SET name='$name', `e-mail`='$mail', phone='$phone', birth='$birthday' WHERE mId='$id'");
    if($result) echo "success";
    else echo "fail";
}

if($editType == "goods"){
    $goodsId = $_POST["goodsId"];
    $goodsName = $_POST["goodsName"];
    $goodsPrice = $_POST["goodsPrice"];
    $goodsCategory = $_POST["goodsCategory"];
    $goodsImgPath = $_POST["goodsImgPath"];
    $goodsState = $_POST["goodsState"];
    $goodsDescription = $_POST["goodsDescription"];
    
    // $result = sqlQry("UPDATE products SET pName='$goodsName', price='$goodsPrice', category='$goodsCategory', imgPath='$goodsImgPath', state='$goodsState', description='$goodsDescription' WHERE pId='$goodsId'");
}
?>