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
  <title>Classimax | Classified Marketplace Template</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">

  <!-- favicon -->
  <link href="images/favicon.png" rel="shortcut icon">

  <!-- 
  Essential stylesheets
  =====================================-->
  <link href="plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="plugins/bootstrap/bootstrap-slider.css" rel="stylesheet">
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="plugins/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick/slick-theme.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
  <?php
  include "color_ramp.php";
  ?>

</head>

<body class="body-wrapper">


<?php
include "header.php";
?>

<section class="login py-5 border-top-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-8 align-item-center">
        <div class="border border">
          <h3 class="bg-gray p-4">註冊表單</h3>
          <form action="#" id="form">
            <fieldset class="p-4">
              <label style="color:black;" for="mail"><b>電子郵件</b></label>
              <input name="mail"class="form-control mb-3" type="email" placeholder="電子郵件(必填)" required>
              <label style="color:black;" for="pswd"><b>密碼</b></label>
              <input name="pswd" class="form-control mb-3" type="password" placeholder="密碼(必填)" required>
              <label style="color:black;" for="checkpswd"><b>確認密碼</b></label>
              <input name="checkpswd" class="form-control mb-3" type="password" placeholder="密碼確認(必填)" required>
              <div class="loggedin-forgot d-inline-flex my-3">
                <input type="checkbox" id="registering" class="mt-1">
                <label style="color:black;" for="registering" class="px-2" style="margin: 0;">註冊即代表您同意您是一位喜歡毛小孩的善心人士。</label>
              </div>
              <button type="submit" class="btn btn-primary font-weight-bold mt-3">送出表單並註冊</button>
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