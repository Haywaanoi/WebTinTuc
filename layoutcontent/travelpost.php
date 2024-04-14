<div class="popular-post-wrap">
	<h4 class="title">Du lịch</h4>

	<?php
	include_once ("include/connect.php");

	$dem = 3;
	$dulich = 'du-lich';
	$travelsql = "SELECT * FROM tin_tuc WHERE id_loaitin = :dulich LIMIT :limit";
	$travels = $dbh->prepare($travelsql);
	$travels->bindParam(":dulich", $dulich, PDO::PARAM_STR);
	$travels->bindParam(":limit", $dem, PDO::PARAM_INT);
	$travels->execute();

	$i = 0;
	while ($row = $travels->fetch(PDO::FETCH_ASSOC)) {
		if ($i == 0) {
			?>
			<div class="feature-post relative">
				<div class="feature-img relative">
					<div class="overlay overlay-bg">
					</div>
					<img class="img-fluid" src="<?php echo $row['image']; ?>">
				</div>
				<div class="details">
					<ul class="tags">
						<li><a href="#">Du lịch</a></li>
					</ul>
					<a href="<?php echo "https:vnexpress.net/" . $hot['slug'] . "-" . $hot['id_tin'] . ".html" ?>">
						<h3><?php echo $row['title']; ?></h3>
					</a>
					<ul class="meta">
						<li>
							<a href="#">
								<span class="lnr lnr-calendar-full"></span>
								<?php echo $row['datetime']; ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<?php
		} else {
			if ($i == 1) {
				?>
				<div class="row mt-20 medium-gutters">
					<?php
			}
			?>
				<div class="col-lg-6 single-popular-post">
					<div class="feature-img-wrap relative">
						<div class="feature-img relative">
							<div class="overlay overlay-bg">
							</div>
							<img class="img-fluid" src="<?php echo $row['image']; ?>">
						</div>
						<ul class="tags">
							<li><a href="#">Du lịch</a></li>
						</ul>
					</div>
					<div class="details">
						<a href="<?php echo "https:vnexpress.net/" . $hot['slug'] . "-" . $hot['id_tin'] . ".html" ?>">
							<h4><?php echo $row['title']; ?></h4>
						</a>
						<ul class="meta">
							<li>
								<a href="#">
									<span class="lnr lnr-calendar-full"></span>
									<?php echo $row['datetime']; ?>
								</a>
							</li>
						</ul>
						<p class="excert">
							<?php echo $row['sub_title']; ?>
						</p>
					</div>
				</div>
				<?php
				if ($i == $dem) {
					?>
				</div>
				<?php
				}
		}
		$i++;
	}
	?>

</div>
