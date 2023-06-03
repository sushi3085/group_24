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
?>