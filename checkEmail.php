<?php
if(!isset($_POST["email"])) {
    echo "error";
    exit();
}
$email = $_POST["email"];
if($email == $_POST["originEmail"]){
    echo "not exist";
    exit();
}

include "db_conn.php";
$result = sqlQry("SELECT * FROM `member` WHERE `e-mail` = '$email'");
if($row = mysqli_fetch_assoc($result)){
    echo "exist";
}
else{
    echo "not exist";
}
?>