<?php
session_start();
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
  <title>Appetite 寵物用品店</title>

  
  <?php
  include "color_ramp.php";
  ?>

</head>

<?php
include 'header.php';
?>
<body class="body-wrapper">



<!--===============================
=            Hero Area            =
================================-->

<section class="hero-area bg-1 text-center overly" style="background-image: url('images/home/hero.png');">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>歡迎光臨 <h1 style="color: var(---yellow)">A牌<h1> 寵物用品店</h1>
					<p>找到專屬於自己毛寶貝的用品<br>貓砂？餐具？我們不只這些！</p>
					<div class="short-popular-category-list text-center">
						<h2>💛超受歡迎的商品類別💛</h2>
						<ul class="list-inline">
							<li class="list-inline-item">
								<a href="all_goods.php?category=cat" style="color:white; border:white 2px solid"><i class="fa fa-bed"></i> 貓貓</a></li>
							<li class="list-inline-item">
								<a href="all_goods.php?category=dog" style="color:white; border:white 2px solid"><i class="fa fa-grav"></i> 狗狗</a>
							</li>
							<li class="list-inline-item">
								<a href="all_goods.php?category=outdoor" style="color:white; border:white 2px solid"><i class="fa fa-car"></i> 戶外用品</a>
							</li>
							<li class="list-inline-item">
								<a href="all_goods.php?category=health" style="color:white; border:white 2px solid"><i class="fa fa-cutlery"></i> 衛生用品</a>
							</li>
						</ul>
					</div>

				</div>
				<!-- Advance Search -->
				<div class="advance-search">
					<div class="container">
						<div class="row justify-content-center">
							<div class="col-lg-12 col-md-12 align-content-center">
								<form method="GET" action="all_goods.php">
									<div class="form-row align-items-center">
										<div class="form-group col-xl-10 col-lg-9 col-md-8">
											<input type="text" class="form-control my-2 my-lg-1" id="inputtext4" name="search" placeholder="在這裡輸入您想找的東西！貓貓會幫您找！">
										</div>
										<!-- <div class="form-group col-lg-4 col-md-6">
											<select class="w-100 form-control mt-lg-1 mt-md-2">
												<option>排序規則</option>
												<option value="1">超~好評</option>
												<option value="2">價位低至高</option>
												<option value="4">價位高至低</option>
											</select>
										</div> -->
										<!-- <div class="form-group col-lg-3 col-md-6">
											<input type="text" class="form-control my-2 my-lg-1" id="inputLocation4" placeholder="Location">
										</div> -->
										<div class="form-group col-xl-2 col-lg-3 col-md-4 align-self-center">
											<button type="submit" class="btn active w-100" style="background-color:var(---lightblue)">貓貓幫您找！</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>


<!--===========================================
=            Popular deals section            =
============================================-->

<section class="popular-deals section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title">
					<h2>最近大流行！正夯的🎉</h2>
					<p>只有不打扮的小孩，沒有醜小孩！想讓自己的毛小孩跟上流行嗎？看看這裡就對了！</p>
				</div>
			</div>
		</div>
		<div class="row">
			<!-- offer 01 -->
			<div class="col-lg-12">
				<div class="trending-ads-slide" data-interval="5000">
					<?php
					include "db_conn.php";
					// select first 5 popular goods from db
					$sql = "SELECT pNo, COUNT(*) FROM `cart` WHERE 1 GROUP BY `pNo` ORDER BY COUNT(*) DESC LIMIT 5";
					$result = sqlQry($sql);
					$arr = array("cat"=>"貓","dog"=>"狗","outdoor"=>"戶外用品","health"=>"衛生用品");
					while($row = mysqli_fetch_assoc($result)){
						$pNo = $row['pNo'];
						$goodsRow = sqlQry("SELECT * FROM `product` WHERE pNo = '$pNo'")->fetch_assoc();
						$productName = $goodsRow['pName'];
						$category = $goodsRow['category'];
						$description = $goodsRow['description'];

						echo "
						<div class='col-sm-12 col-lg-4'>
							<!-- product card -->
							<div class='product-item bg-light'>
								<div class='card'>
									<div class='thumb-content'>
										<!-- <div class='price'>$200</div> -->
										<a href='all_goods.php?search=$productName'>
											<img class='card-img-top img-fluid' src='images/products/$pNo.jpg' style='height:340px;'>
										</a>
									</div>
									<div class='card-body'>
										<h4 class='card-title'><a href='all_goods.php?search=$productName'>$productName</a></h4>
										<ul class='list-inline product-meta'>
											<li class='list-inline-item'>
												<a href='all_goods.php?category=$category'><i class='fa fa-folder-open-o'></i>".$arr[$category]."</a>
											</li>
										</ul>
										<p class='card-text' style='height:100px'>$description</p>
										<div class='product-ratings'>
											<ul class='list-inline'>
												<li class='list-inline-item selected'><i class='fa fa-star'></i></li>
												<li class='list-inline-item selected'><i class='fa fa-star'></i></li>
												<li class='list-inline-item selected'><i class='fa fa-star'></i></li>
												<li class='list-inline-item selected'><i class='fa fa-star'></i></li>
												<li class='list-inline-item'><i class='fa fa-star'></i></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>";
					}
					?>

				</div>
			</div>
		</div>
	</div>
</section>



<!--==========================================
=            All Category Section            =
===========================================-->

<section class="section">
	<div class="container">
		<div class="col-12">
			<div class="section-title">
				<h2>在找所有商品嗎？按<a href="all_goods.php"><u>這裡</u></a>前往所有商品！</h2>
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



