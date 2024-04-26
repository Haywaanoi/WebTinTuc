<!-- Start latest-post Area -->
<div class="latest-post-wrap">
	<h4 class="cat-title">Tin Mới Nhất</h4>
	<?php
	$dem = 5;
	$lastsql = "SELECT * FROM tin_tuc ORDER BY datetime LIMIT :limit";
	$lasts = $dbh->prepare($lastsql);
	$lasts->bindParam(":limit", $dem, PDO::PARAM_INT);
	$lasts->execute();
	foreach ($lasts as $moi) {
	?>
		<div class="single-latest-post row align-items-center">
			<div class="col-lg-5 post-left">
				<div class="feature-img relative">
					<div class="overlay overlay-bg"></div>
					<img class="img-fluid" src="<?php echo $moi['image'] ?>">
				</div>
				<ul class="tags">
					<li><a href="#">Tin mới nhất</a></li>
				</ul>
			</div>
			<div class="col-lg-7 post-right">
				<a href="chitiettintuc.php?id=<?php echo $moi['id_tin']; ?>">
					<h4>
						<?php echo $moi['title'] ?>
					</h4>
				</a>
				<ul class="meta">
					<!-- <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li> -->
					<li><a href="#"><span class="lnr lnr-calendar-full"></span>
							<?php echo $moi['datetime'] ?>
						</a></li>
					<!-- <li><a href="#"><span class="lnr lnr-bubble"></span>Comments</a></li> -->
				</ul>
				<p class="excert">
					<?php echo $moi['title'] ?>
				</p>
			</div>
		</div>
	<?php
	}
	?>
</div>
<!-- End latest-post Area -->