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

</head>

<body class="body-wrapper">


<section class="page-search" style="background:var(---blue)">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Advance Search -->
				<div class="advance-search nice-select-white">
					<form method="POST">
						<div class="form-row align-items-center">
							<div class="form-group col-xl-6 col-lg-5 col-md-6">
								<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" name="search" placeholder="在這裡輸入您想找的東西！貓貓會幫您找！">
							</div>
							<div class="form-group col-lg-4 col-md-6">
								<select class="w-100 form-control my-2 my-lg-0">
                                    <option>排序規則</option>
                                    <option value="1">超~好評</option>
                                    <option value="2">價位低至高</option>
                                    <option value="4">價位高至低</option>
								</select>
							</div>
							<!-- <div class="form-group col-lg-3 col-md-6">
								<input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Location">
							</div> -->
							<div class="form-group col-xl-2 col-lg-3 col-md-6">
								<input type="submit" class="btn btn-primary active w-100" value="貓貓幫您找！">
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
                        if(isset($_POST['search'])){
                            $searchName = $_POST['search'];
                            echo "\"$searchName\"的搜尋結果：";
                            $result = sqlQry("SELECT * FROM `product` WHERE pName LIKE '%$searchName%' OR description LIKE '%$searchName%'");
                            if($result->num_rows > 0){
                                echo "共".$result->num_rows."項";
                            }
                            else{
                                echo "沒有結果";
                            }
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
					<div class="widget category-list">
                        <h4 class="widget-header">All Category</h4>
                        <ul class="category-list">
                            <li><a href="category.html">Laptops <span>93</span></a></li>
                            <li><a href="category.html">Iphone <span>233</span></a></li>
                            <li><a href="category.html">Microsoft  <span>183</span></a></li>
                            <li><a href="category.html">Monitors <span>343</span></a></li>
                        </ul>
                    </div>


                    <div class="widget price-range w-100">
                        <h4 class="widget-header">Price Range</h4>
                        <div class="block">
                            <input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5" data-slider-value="[0,5000]">
                            <div class="d-flex justify-content-between mt-2">
                                <span class="value">$10 - $5000</span>
                            </div>
                        </div>
                    </div>
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
                // if not searching, display all goods
                if(!isset($_POST['search'])){
                    $result = sqlQry("SELECT * FROM `product`");
                    while($row = mysqli_fetch_assoc($result)){
                        $productImagePath = "images/products/products-1.jpg";// = $row['imagePath'];
                        $productName = $row['pName'];
                        $productCategory = $row['category'];
                        $productDescription = $row['description'];
                        echo "
                        <div class='ad-listing-list mt-20'>
                            <div class='row p-lg-3 p-sm-5 p-4'>
                                <div class='col-lg-4 align-self-center'>
                                    <a href='single.html'>
                                        <img src='$productImagePath' class='img-fluid' alt=''>
                                    </a>
                                </div>
                                <div class='col-lg-8'>
                                    <div class='row'>
                                        <div class='col-lg-6 col-md-10'>
                                            <div class='ad-listing-content'>
                                                <div>
                                                    <a href='single.html' class='font-weight-bold'>$productName</a>
                                                </div>
                                                <ul class='list-inline mt-2 mb-3'>
                                                    <li class='list-inline-item'><a href='category.html'> <i class='fa fa-folder-open-o'></i>$productCategory</a></li>
                                                </ul>
                                                <div style='height:235px'>
                                                    <p class='pr-5 text-wrap'>$productDescription</p>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }
                else{
                    $result = sqlQry("SELECT * FROM `product` WHERE pName LIKE '%$searchName%' OR description LIKE '%$searchName%'");
                    while($row = mysqli_fetch_assoc($result)){
                        $productImagePath = "images/products/products-1.jpg";// = $row['imagePath'];
                        $productName = $row['pName'];
                        $productCategory = $row['category'];
                        $productDescription = $row['description'];
                        echo "
                        <div class='ad-listing-list mt-20'>
                            <div class='row p-lg-3 p-sm-5 p-4'>
                                <div class='col-lg-4 align-self-center'>
                                    <a href='single.html'>
                                        <img src='$productImagePath' class='img-fluid' alt=''>
                                    </a>
                                </div>
                                <div class='col-lg-8'>
                                    <div class='row'>
                                        <div class='col-lg-6 col-md-10'>
                                            <div class='ad-listing-content'>
                                                <div>
                                                    <a href='single.html' class='font-weight-bold'>$productName</a>
                                                </div>
                                                <ul class='list-inline mt-2 mb-3'>
                                                    <li class='list-inline-item'><a href='category.html'> <i class='fa fa-folder-open-o'></i>$productCategory</a></li>
                                                </ul>
                                                <div style='height:235px'>
                                                    <p class='pr-5 text-wrap'>$productDescription</p>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        ";
                    }
                }
                ?>
				
				
				<!-- ad listing list  -->

				<!-- pagination -->
				<div class="pagination justify-content-center py-4">
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
				</div>
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