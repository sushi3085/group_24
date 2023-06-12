<?php
session_start();
session_unset();
setcookie("stayLogin", "", time()-3600);
header("Location: login.php");
?>