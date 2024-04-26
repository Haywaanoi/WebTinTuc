<?php
include_once ("include/connect.php");
$menusql = "SELECT * FROM nhom_tin";
$menus = $dbh->prepare($menusql);
$menus->execute();
$dem = $menus->rowCount();
$menus->fetch(PDO::FETCH_ASSOC);
?>
<header>
	<div class="header-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
					<ul>
						<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="https://www.behance.net/"><i class="fa fa-behance"></i></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
					<ul>
						<li>
							<?php
							if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
								echo '<li><a href="#"><p> Hello: ' . $_SESSION['name'] . '</p></a></li>';
								echo '<li><a href="login/logout.php">Đăng Xuất</a></li>';
								if ($_SESSION['role'] == 'admin') {
									echo '
									<li><a href="admin"><p>ADMIN PAGE</p></a></li>
									';
								}
							} else {
								include("modal_singup.php");
								include("modal_login.php");

							}
							?>

						</li>
						<li>
							<a href="tel:+440 012 3654 896">
								<span class="lnr lnr-phone-handset"></span>
								<span>+84 969 732 701</span>
							</a>
						</li>
						<li>
							<a href="mailto:ttnanh.18it5@sict.udn.vn">
								<span class="lnr lnr-envelope"></span>
								<span>ttnanh.18it5@sict.udn.vn</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="logo-wrap">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
					<a href="./index.php">
						<img class="img-fluid" src="img/logo.png" alt="">
					</a>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
					<img class="img-fluid" src="img/banner.png" alt="">
				</div>
			</div>
		</div>
	</div>

	<div class="container main-menu" id="main-menu">
		<div class="row align-items-center justify-content-between">
			<nav id="nav-menu-container">
				<ul class="nav-menu">

					<li class="menu-active">
						<a href="index.php">Trang Chủ</a>
					</li>
					<?php
					foreach ($menus as $menu) {
						?>
						<li class="menu-has-children">
							<a href="./index.php?id_nhomtin=<?php echo $menu['id_nhomtin'] ?>">
								<?php echo $menu['ten_nhomtin'] ?>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</nav><!-- #nav-menu-container -->
			<!-- <div class="navbar-right">
				<form class="Search">
					<input type="text" class="form-control Search-box" name="Search-box" id="Search-box"
						placeholder="Search">
					<label for="Search-box" class="Search-box-label">
						<span class="lnr lnr-magnifier"></span>
					</label>
					<span class="Search-close">
						<span class="lnr lnr-cross"></span>
					</span>
				</form>
			</div> -->
		</div>
	</div>
</header>
