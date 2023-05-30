<?php
session_start();
// check if user is registering, if so, insert into database
// and redirect to login page
if ( isset($_POST['registering']) ) {
    include "db_conn.php";
    // first check if the email is already registered
    $result = sqlQry("SELECT * FROM `member` WHERE `e-mail` = '$_POST[mail]'");
    if ( mysqli_num_rows($result) > 0 ) {
        echo "<script>alert('此信箱已註冊過，請使用其他信箱註冊'); location.href = 'register.php';</script>";
        exit();
    }
    // if not, insert into database
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $pswd = $_POST['pswd'];
    $birth = $_POST['birthday'];
    $sql = "INSERT INTO `member` (`name`, `e-mail`, `pswd`, `birth`, `phone`) VALUES ('$name', '$mail', '$pswd', '$birth', 123213123)";
    sqlQry($sql);
    // echo "<script>alert('註冊成功，請重新登入');</script>";
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Appetite 註冊頁面</title>
  

  <?php
  include "color_ramp.php";
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
  <script src="js/form_validation.js"></script>

</head>

<?php
include "header.php";
?>
<body class="body-wrapper">



<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border border">
          <h3 class="bg-gray p-4">註冊表單</h3>
          <form action="register.php" id="form" method="POST">
            <fieldset class="p-4">
              <label style="color:black;" for="name"><b>姓名</b></label>
              <label id="name-error" class="error" for="name"></label>
              <input name="name"class="form-control mb-3" type="text" placeholder="使用者名稱(必填)" required>

              <label style="color:black;" for="mail"><b>電子郵件</b></label>
              <label id="mail-error" class="error" for="mail"></label>
              <label id="msg_show" class="error"></label>
              <input name="mail"class="form-control mb-3" type="email" placeholder="電子郵件(必填)" required>

              <label style="color:black;" for="pswd"><b>密碼</b></label>
              <label id="pswd-error" class="error" for="pswd"></label>
              <input name="pswd" class="form-control mb-3" type="password" placeholder="密碼(必填)" id="pswd" required>
              
              <label style="color:black;" for="checkpswd"><b>確認密碼</b></label>
              <label id="checkpswd-error" class="error" for="checkpswd"></label>
              <input name="checkpswd" class="form-control mb-3" type="password" placeholder="密碼確認(必填)" required>
              
              <label style="color:black;" for="birthday"><b>生日</b></label>
              <label id="birthday-error" class="error" for="birthday"></label>
              <input name="birthday" class="form-control mb-3" type="date" required>
              
              <div class="loggedin-forgot d-inline-flex my-3">
                <input type="checkbox" id="registering" class="mt-1" name="registering">
                <label style="color:black; margin: 0;" for="registering" class="px-2">您同意您是一位喜歡毛小孩的善心人士。</label>
              </div>
              <label id="registering-error" class="error" for="registering"></label>
              <br>
              <input type="submit" class="btn btn-primary font-weight-bold mt-3" value="送出表單並註冊">
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