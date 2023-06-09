<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Appetite 購物車</title>

  <?php
  include "color_ramp.php";
  ?>

</head>
<?php
include "header.php";
?>
<body>

<div class="col-md-10" style="margin:auto; background-color:#FCFCFC; padding:20px;">
  <h1>您的購物車</h1>
  <div style="display:flex; flex-wrap: wrap; align-items: flex-start;">
    <!-- 購物車裡面的單個產品會長這樣 -->
    <?php
    // extract cart data from database
    include "db_conn.php";
    $result = sqlQry("SELECT * FROM `cart` WHERE `mId` = '$_SESSION[mId]'");

    while($row = mysqli_fetch_assoc($result)){
      $pNo = $row['pNo'];
      $amount = $row['amount'];
      // query the product table to get product info
      $result2 = sqlQry("SELECT * FROM `product` WHERE `pNo` = '$pNo'");
      $productRow = mysqli_fetch_assoc($result2);
      $name = $productRow['pName'];
      $price = $productRow['unitPrice'];
      $desc = $productRow['description'];
      // $rating = $row['rating'];
      echo
      "
        <div class='card col-lg-3 col-md-4 col-sm-6'>
          <div class='thumb-content mt-3'>
            <a href='all_goods.php?search=$name'>
              <img class='card-img-top img-fluid' src='images/products/$pNo.jpg' style='aspect-ratio: 1/1;'>
            </a>
          </div>
          <div class='card-body'>
            <h4 class='card-title'><a href='all_goods.php?search=$name'>$name</a></h4>
            <p class='card-text text-truncate'>$desc</p>
            <div style='text-align: center;'>
              <div class='product-ratings'>
                <ul class='list-inline'>
                <li class='list-inline-item'><i class='fa fa-star'></i></li>
                <li class='list-inline-item'><i class='fa fa-star'></i></li>
                <li class='list-inline-item'><i class='fa fa-star'></i></li>
                <li class='list-inline-item'><i class='fa fa-star'></i></li>
                <li class='list-inline-item'><i class='fa fa-star'></i></li>
                </ul>
              </div>
              單價 <span class='font-weight-bolder text-monospace'>$price</span> 元<br>
              總共<input type='number' min='0' style='width: 40px;' value='$amount' onchange='updateCost(this)'>份<br>
              小記 <span class='font-weight-bolder text-monospace'>".$price*$amount ."</span> 元<br>
              <button class='btn btn-warning btn-sm' style='align-self: center'>取消購買</button>
            </div>
          </div>
        </div>
      ";
    }
    ?>
  </div>
  <!-- 總結一些數據 -->
  <br><br><br>
  <h1 class="d-flex justify-content-center">總計共：<span id="totalCost"></span>元</h1>
  <!-- 立即購買 -->
  <div style="width: 50%; margin:auto; display: flex; justify-content: space-around;">
    <button class="btn btn-danger">全數移出購物車</button>
    <button class="btn btn-success">購買全部</button>
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

<script src="js/cart.js"></script>
</body>
</html>