<?php
session_start();
// include "cookie.php";

// if($mId = getCookieOrDefault("stayLogin", false)){
//   $_SESSION['mId'] = $mId;
//   echo "<script>alert('登入成功！$mId');</script>";
// }

// check if user is logged in, if so, redirect to member_page.php
if ( isset($_SESSION['mId']) ) {
    header("Location: member_page.php");
    exit();
}

// check if user is trying to log in
if( isset($_POST["mail"]) && isset($_POST["pswd"])){
  include "db_conn.php";
  $mail = $_POST["mail"];
  $pswd = $_POST["pswd"];
  $row = sqlQry("SELECT * FROM `member` WHERE `e-mail` = '$mail'")->fetch_assoc();
  $hashed_pswd = $row["pswd"];
  $mId = $row["mId"];

  if(password_verify($pswd, $hashed_pswd)){
    // if(isset($_POST["keepLogin"])) setcookie("stayLogin", $mId, time()+60*60*24*14);// 兩個禮拜
    $row = sqlQry("SELECT * FROM `member` WHERE `e-mail` = '$mail'")->fetch_assoc();
    echo "<script>alert('登入成功！');</script>";
    $_SESSION["mId"] = $row["mId"];
    $_SESSION["isAdmin"] = $_POST["mail"] == "admin@appetite.com";
    header("Location: member_page.php");
    exit();
  }else{// log in failed
    echo "<script>alert('登入失敗\\n請確認帳號密碼輸入正確\\n或先註冊！');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php
include "header.php";
?>
<head>
  <?php
  include "color_ramp.php";
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script src="js/login_validation.js"></script>

</head>

<body class="body-wrapper">


<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border">
          <h3 class="bg-gray p-4">歡迎來到 Appetite 寵物用品店</h3>
          <form action="login.php" id="form" method="POST">
            <fieldset class="p-4">
              <label id="mail-error" class="error" for="mail"></label>
              <label for="mail">電子郵件</label>
              <input class="form-control mb-3" type="text" placeholder="電子郵件(必填)" name="mail" required>

              <label id="pswd-error" class="error" for="pswd"></label>
              <label for="mail">密碼</label>
              <input class="form-control mb-3" type="password" placeholder="密碼(必填)" name="pswd" required>
              <div class="loggedin-forgot">
                <input type="checkbox" id="keep-me-logged-in">
                <label for="keep-me-logged-in" class="pt-3 pb-2" name="keepLogin">保持登入狀態</label>
              </div>
              <div style="text-align:center;">
                <input type="submit" class="btn btn-primary font-weight-bold mt-3 btn-wide" value="登入喵">
                <!-- <a class="mt-3 d-block text-primary" href="#!">汪記密碼喵？</a> -->
                <a class="mt-3 d-block text-primary" href="register.php">還沒註冊喵？</a>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<!--============================
=            Footer            =
=============================-->

<?php
include "footer.php";
?>

<!-- 
Essential Scripts
=====================================-->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/popper.min.js"></script>
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<script src="plugins/bootstrap/bootstrap-slider.js"></script>
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<script src="plugins/google-map/map.js" defer></script>

<script src="js/script.js"></script>

</body>

</html>