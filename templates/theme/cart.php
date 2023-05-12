<!DOCTYPE html>
<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Appetite 購物車</title>

  <!-- ** Mobile Specific Metas ** -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Agency HTML Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Classified Marketplace Template v1.0">
  
  <!-- theme meta -->
  <meta name="theme-name" content="classimax" />

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
<body>
<?php
include "header.php";
?>

<div class="col-md-10" style="margin:auto; background-color:#FCFCFC; padding:20px;">
  <h1>您的購物車</h1>
  <div style="display:flex; flex-wrap: wrap; align-items: flex-start;">
    <!-- 購物車裡面的單個產品會長這樣 -->
    <?php
    for($i=0; $i<5; $i++)
    echo
    '
      <div class="card col-lg-3 col-md-4 col-sm-6">
        <div class="thumb-content">
          <a href="single.html">
            <img class="card-img-top img-fluid" src="images/products/products-3.jpg" alt="Card image cap">
          </a>
        </div>
        <div class="card-body">
          <h4 class="card-title"><a href="single.html">這是一張商品名稱</a></h4>
          <p class="card-text">商品簡述blablabla</p>
          <div style="text-align: center;">
            <div class="product-ratings">
              <ul class="list-inline">
              <li class="list-inline-item"><i class="fa fa-star"></i></li>
              <li class="list-inline-item"><i class="fa fa-star"></i></li>
              <li class="list-inline-item"><i class="fa fa-star"></i></li>
              <li class="list-inline-item"><i class="fa fa-star"></i></li>
              <li class="list-inline-item"><i class="fa fa-star"></i></li>
              </ul>
            </div>
            單價 <span class="font-weight-bolder text-monospace">N</span> 元<br>
            總共<input type="number" min="0" style="width: 40px;">份<br>
            小記 <span class="font-weight-bolder text-monospace">N</span> 元<br>
            <button class="btn btn-warning btn-sm" style="align-self: center">取消購買</button>
          </div>
        </div>
      </div>
    ';
    ?>
  </div>
  <!-- 總結一些數據 -->
  <br><br><br>
  <h1 class="d-flex justify-content-center">總計共：[多少]元</h1>
  <!-- 立即購買 -->
  <div style="width: 50%; margin:auto; display: flex; justify-content: space-around;">
    <button class="btn btn-danger">全數移出購物車</button>
    <button class="btn btn-success" disabled>購買全部</button>
  </div>
</div>
</div>

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