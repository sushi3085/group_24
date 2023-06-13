<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <!-- ** Basic Page Needs ** -->
  <meta charset="utf-8">
  <title>Appetite 購物車</title>
  <link rel="stylesheet" href="css/cart.css">

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
    $mId = $_SESSION['mId'];
    $result = sqlQry("SELECT * FROM `cart` WHERE `mId` = '$mId' AND `orderId` = '0'");

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
              總共<input type='number' class='amount' min='0' style='width: 40px;' value='$amount' onchange='updateCost(this)'>份<br>
              小記 <span class='font-weight-bolder text-monospace'>".$price*$amount ."</span> 元<br>
              <button class='btn btn-warning btn-sm' style='align-self: center' onclick='cancelPurchase(this);'>取消購買</button>
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
    <button class="btn btn-danger" onclick="removeWholeCart();">全數移出購物車</button>
    <button class="btn btn-success" onclick="showPurchaseModal();">購買全部</button>
  </div>
</div>
</div>


<!-- Modal, showing cart item using table, confirm and cancel button at the bottom -->
<?php
$result = sqlQry("SELECT * FROM `member` WHERE `mId` = '$_SESSION[mId]'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$phone = $row['phone'];
?>
<dialog close class="text-center" style="height: 80%;">
  <form id="modalForm" method="POST"> <!-- 他不會真的 submit 出去任何地方 -->
      <h2>確認購物車內容</h2><br>
      <table class="table">
        <thead>
          <tr>
            <th>商品名稱</th>
            <th>單價</th>
            <th>數量</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody id="modalTableBody">
        </tbody>
      </table>
      <h3>總計：<span id="modalTotalCost"></span>元</h3>

      <!-- customer profile table -->
      <h1 class="mt-5">個人資料</h1>
      <table class="mx-auto table profileTable w-75">
        <tr>
          <label style="display:none;" id="mId"><?php echo $_SESSION['mId'];?></label>
          <td>收貨人姓名<label id="name-error" class="error"></label></td>
          <td><input class="modalTableInput" disabled type="text" name="name" value="<?php echo $name;?>"></td>
        </tr>
        <tr>
          <td>電話<label id="phone-error" class="error"></label></td>
          <td><input class="modalTableInput" type="text" name="phone" value="" required></td>
        </tr>
        <tr>
          <td>地址<label id="address-error" class="error"></label></td>
          <td><input class="modalTableInput" type="text" name="address" required></td>
        </tr>
        <tr>
          <td>付款方式</td>
          <td>
            目前僅支援貨到付款
          </td>
        </tr>
      </table>
      <input type="submit" class="btn btn-success" value="✨買單✨">
      <input type="button" class="btn btn-danger" onclick="closeModal()" value="退出介面">
  </form>
</dialog>


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

<script src="js/script.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
<script src="js/cart.js"></script>
</body>
</html>