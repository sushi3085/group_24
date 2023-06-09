<?php
session_start();
include "db_conn.php";
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
  <title>Appetite 所有商品</title>

  <?php
  include "color_ramp.php";
  include "header.php";
  ?>
  <script src="js/all_goods.js"></script>

</head>

<body class="body-wrapper">


<section class="page-search" style="background:var(---blue)">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search nice-select-white">
					<form method="GET">
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
</section>
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h1>
                        <?php
                        if(isset($_GET['search'])){
                            $searchName = $_GET['search'];
                            echo "\"$searchName\"的搜尋結果：";
                            $result = sqlQry("SELECT * FROM `product` WHERE pName LIKE '%$searchName%' OR description LIKE '%$searchName%'");
                            if($result->num_rows > 0){
                                echo "共".$result->num_rows."項";
                            }
                            else{
                                echo "沒有結果";
                            }
                        }
                        else if(isset($_GET["category"])){// click on category
                            $arr = array("cat"=>"貓","dog"=>"狗","outdoor"=>"戶外用品","health"=>"衛生用品");
                            $rowCount = sqlQry("SELECT * FROM `product` WHERE category = '".$_GET["category"]."'")->num_rows;
                            echo $arr[$_GET["category"]]." 類別：共 $rowCount 項產品";
                        }
                        else{
                            echo "所有商品";
                        }
                        ?>
                    </h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-4">
				<div class="category-sidebar">
					<div class="widget category-list border">
                        <h4 class="widget-header">所有商品類別</h4>
                        <ul class="category-list">
                            <li><a href="all_goods.php?category=cat">貓<span><?php echo sqlQry("SELECT * FROM `product` WHERE `category`='cat'")->num_rows;?></span></a></li>
                            <li><a href="all_goods.php?category=dog">狗<span><?php echo sqlQry("SELECT * FROM `product` WHERE `category`='dog'")->num_rows;?></span></a></li>
                            <li><a href="all_goods.php?category=outdoor">戶外用品<span><?php echo sqlQry("SELECT * FROM `product` WHERE `category`='outdoor'")->num_rows;?></span></a></li>
                            <li><a href="all_goods.php?category=health">衛生用品<span><?php echo sqlQry("SELECT * FROM `product` WHERE `category`='health'")->num_rows;?></span></a></li>
                        </ul>
                    </div>


                    <!-- <div class="widget price-range w-100">
                        <h4 class="widget-header">Price Range</h4>
                        <div class="block">
                            <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5" data-slider-value="[0,5000]">
                            <div class="d-flex justify-content-between mt-2">
                                <span class="value">$10 - $5000</span>
                            </div>
                        </div>
                    </div> -->
				</div>
			</div>

			<div class="col-lg-9 col-md-8">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6 text-center text-md-left">
							<strong>篩選規則：</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
					</div>
				</div>
				<!-- ad listing list  -->
                <?php
                $arr = array("cat"=>"貓","dog"=>"狗","outdoor"=>"戶外用品","health"=>"衛生用品");
                if(isset($_GET['category'])){ // if category
                    $result = sqlQry("SELECT * FROM `product` WHERE category = '".$_GET["category"]."'");
                }
                else if(isset($_GET['search'])){ // if search
                    $result = sqlQry("SELECT * FROM `product` WHERE pName LIKE '%$searchName%' OR description LIKE '%$searchName%'");
                }
                else{ // not both
                    $result = sqlQry("SELECT * FROM `product`");
                }
                // display filtered products
                while($row = mysqli_fetch_assoc($result)){
                    $pNo = $row['pNo'];
                    $productImagePath = "images/products/$pNo.jpg";// = $row['imagePath'];
                    $productName = $row['pName'];
                    $productCategory = $row['category'];
                    $productDescription = $row['description'];
                    $productPrice = $row['unitPrice'];
                    echo "
                    <div class='ad-listing-list mt-20 border'>
                        <div class='row p-lg-3 p-sm-5 p-4'>
                            <div class='col-lg-4 align-self-center'>
                                <a href='good_detail.php?pNo=$pNo'>
                                    <img src='$productImagePath' class='img-fluid' alt=''>
                                </a>
                            </div>
                            <div class='col-lg-8'>
                                <div class='row'>
                                    <div class='col-lg-6 col-md-12'>
                                        <div class='ad-listing-content'>
                                            <div class='mt-3'>
                                                <a href='good_detail.php?pNo=$pNo' class='font-weight-bold'>$productName</a>
                                            </div>
                                            <ul class='list-inline mt-2 mb-3'>
                                                <li class='list-inline-item'><a href='category.html'> <i class='fa fa-folder-open-o'></i>　".$arr[$productCategory]."</a></li>
                                            </ul>
                                            <div style='height:235px'>
                                                <p class='text-wrap'>$productDescription</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class='col-lg-6 align-self-center'>
                                        <div class='product-ratings float-lg-right pb-3'>
                                            <ul class='list-inline'>
                                                <li class='list-inline-item selected'><i class='fa fa-star'></i></li>
                                                <li class='list-inline-item selected'><i class='fa fa-star'></i></li>
                                                <li class='list-inline-item selected'><i class='fa fa-star'></i></li>
                                                <li class='list-inline-item selected'><i class='fa fa-star'></i></li>
                                                <li class='list-inline-item'><i class='fa fa-star'></i></li>
                                            </ul>
                                        </div>
                                        <br>
                                        <div class='float-lg-right'>
                                            <span class='float-lg-right mt-3'>單價：$productPrice 元</span>
                                            <br>
                                            <span class='float-lg-right mt-3 mb-3 text-right'>選購數量：<input type='number' min=0 class='w-25' value='0'></span>
                                            <br>
                                            <button class='float-lg-right btn btn-primary mt-2' onclick='addToCart(this,".$row['pNo'].")'>加到購物車</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ";
                }
                ?>
				
				
				<!-- ad listing list  -->

				<!-- pagination -->
                <!-- 商品太少應該是不用，反正也只有一個人在做 -->
				<!-- <div class="pagination justify-content-center py-4">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="ad-list-view.html" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="ad-list-view.html">1</a></li>
							<li class="page-item active"><a class="page-link" href="ad-list-view.html">2</a></li>
							<li class="page-item"><a class="page-link" href="ad-list-view.html">3</a></li>
							<li class="page-item">
								<a class="page-link" href="ad-list-view.html" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div> -->
				<!-- pagination -->
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



</body>

</html>