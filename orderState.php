<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<!-- ** Basic Page Needs ** -->
	<meta charset="utf-8">
	<title>Appetite 訂單查詢</title>
	<link rel="stylesheet" href="css/cart.css">

	<?php
  include "color_ramp.php";
  ?>

</head>
<?php
include "header.php";
?>

<body>

	<div class="text-center">
		<br><br>
	<h2>訂單資訊</h2>
	<?php
		
	
	include "db_conn.php";
	$mId = $_SESSION['mId'];
	$result1 = sqlQry("SELECT * FROM `order` WHERE `mId` = '$mId'");

	while ($row = mysqli_fetch_assoc($result1)) {
		$orderid = $row['orderId'];
		$result2 = sqlQry("SELECT * FROM `cart` WHERE `orderId` = '$orderid'");
		$address = $row['address'];
		$orderTime = $row['orderTime'];
		// 宣告一個空陣列來存放商品資訊
		$products = array();

		while ($cartRow = mysqli_fetch_assoc($result2)) {
			$pNo = $cartRow['pNo'];
			$amount = $cartRow['amount'];
			$result3 = sqlQry("SELECT * FROM `product` WHERE `pNo` = '$pNo'");
			$productRow = mysqli_fetch_assoc($result3);
			$name = $productRow['pName'];
			$unitPrice = $productRow['unitPrice'];

			$subTotal = $amount * $unitPrice;
			$totalPrice = 0;

			// 將商品資訊添加到 $products 陣列
			$products[] = array(
				'name' => $name,
				'unitPrice' => $unitPrice,
				'amount' => $amount,
				'subTotal' => $subTotal
			);
		}

		echo "
			<div class='text-center'>
				
				<br><br>
				<table class='table'>
					<thead>
						<th>訂單編號</th>
						<th>下單時間</th>
						<th>商品名稱</th>
						<th>單價</th>
						<th>數量</th>
						<th>小計</th>
					</thead>
					<tbody id='modalTableBody'>";

		foreach ($products as $product) {
			$name = $product['name'];
			$unitPrice = $product['unitPrice'];
			$amount = $product['amount'];
			$subTotal = $product['subTotal'];
			$totalPrice += $unitPrice*$amount ;
			echo "
				<tr>
					<td>$orderid</td>
					<td>$orderTime</td>
					<td>$name</td>
					<td>$unitPrice</td>
					<td>$amount</td>
					<td>$subTotal</td>
				</tr>";
		}

		echo "
					</tbody>
				</table>
				<h3>收件地址 : <span>$address</span></h3>
				<h3>總計：<span>$totalPrice</span>元</h3>
				<table class='table'>
					<thead><th></th></thead>
				</table>
			</div>";
	}
	?>


	</div>
	



	

	<!--
	<div class="text-center" >
	<br><br>
	<h2>訂單資訊</h2>
	<br><br>
	<table class="table">
		<thead>
			<th>訂單編號</th>
			<th>商品名稱</th>
			<th>單價</th>
			<th>數量</th>
			<th>小計</th>
		</thead>
		<tbody id="modalTableBody">
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</tbody>

	</table>
	</div>
	-->



	

	


	<?php
		include "footer.php";
	?>
	<!-- Essential Scripts =====================================-->
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