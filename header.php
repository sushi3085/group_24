<?php
echo"
<!-- ** Mobile Specific Metas ** -->
<head>
  <meta http-equiv='X-UA-Compatible' content='IE=edge'>
  <meta name='description' content='Agency HTML Template'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=5.0'>
  <meta name='author' content='Themefisher'>
  <meta name='generator' content='Themefisher Classified Marketplace Template v1.0'>
  
  <!-- theme meta -->
  <meta name='theme-name' content='classimax' />

  <!-- favicon -->
  <link href='images/favicon.png' rel='shortcut icon'>

  <!-- 
  Essential stylesheets
  =====================================-->
  <link href='plugins/bootstrap/bootstrap.min.css' rel='stylesheet'>
  <link href='plugins/bootstrap/bootstrap-slider.css' rel='stylesheet'>
  <link href='plugins/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
  <link href='plugins/slick/slick.css' rel='stylesheet'>
  <link href='plugins/slick/slick-theme.css' rel='stylesheet'>
  <link href='plugins/jquery-nice-select/css/nice-select.css' rel='stylesheet'>
  
  <link href='css/style.css' rel='stylesheet'>
</head>
";

echo"
<header style='background-color: var(---lightyellow)'>
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<nav class='navbar navbar-expand-lg navbar-light navigation'>
					<a class='navbar-brand' href='index.php'>
						<img src='images/logo.png' alt=''>
					</a>
					<button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent'
					 aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
						<span class='navbar-toggler-icon'></span>
					</button>
					<div class='collapse navbar-collapse' id='navbarSupportedContent'>
						<ul class='navbar-nav ml-auto main-nav '>
							<li class='nav-item active'>
								<a style='color:black;' class='nav-link' href='index.php'><b>首頁</b></a>
							</li>
							
							<li class='nav-item'>
								<a style='color:black;' class='nav-link' href='all_goods.php'><b>所有商品</b></a>
							</li>
							<li class='nav-item'>
								<a style='color:black;' class='nav-link' href='community.php'><b>社群討論</b></a>
							</li>
						</ul>
						<ul class='navbar-nav ml-auto mt-10'>
							<li class='nav-item'>";
								if(!isset($_SESSION['mId'])) echo "<a class='nav-link login-button' href='login.php' style='border: solid black 2px; color:black;'>登入</a>";
								else if($_SESSION['isAdmin'] != 1) echo "<a class='nav-link login-button' href='member_page.php' style='border: solid black 2px; color:black;'>個人主頁</a>";
							echo "
							</li>";
							if(isset($_SESSION['mId'])){
								if($_SESSION['isAdmin']==1)
									echo "<li class='nav-item'><a class='nav-link login-button' href='admin.php' style='border: solid black 2px; color:black;'>管理頁</a></li>";
								else
									echo "<li class='nav-item'><a class='nav-link login-button' href='cart.php' style='border: solid black 2px; color:black;'>購物車</a></li>";
							}
							if(!isset($_SESSION['mId']))echo "<li class='nav-item'><a class='nav-link text-white add-button' href='register.php'><i class='fa fa-plus-circle'></i> 加入會員</a></li>";
							else echo "<li class='nav-item'><a class='nav-link text-white minus-button' href='logout.php'><i class='fa fa-minus-circle'></i> 登出</a></li>";
						echo "
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>";
?>