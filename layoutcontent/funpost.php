<div class="single-sidebar-widget most-popular-widget">
	<h6 class="title">Thư giãn</h6>
	<?php
		$dem = 3;
		$thethaosql = "SELECT * FROM tin_tuc JOIN loai_tin on tin_tuc.id_loaitin = loai_tin.id_loaitin WHERE loai_tin.id_nhomtin = 'thu-gian' ORDER BY datetime LIMIT :limit";
		$thethaos = $dbh->prepare($thethaosql);
		$thethaos->bindParam(":limit", $dem, PDO::PARAM_INT);
		$thethaos->execute();
		foreach ($thethaos as $row) {
	?>
			<div class="single-list flex-row d-flex">
				<div class="thumb">
					<img class="img-fluid" src="<?php echo $row['image'] ?>" alt="">
				</div>
				<div class="details">
					<a href="chitiettintuc.php?id=<?php echo $row['id_tin']; ?>">
						<h6><?php echo $row['title'] ?></h6>
					</a>
					<ul class="meta">
						<li>
							<a href="#">
								<span class="lnr lnr-calendar-full"></span>
								<?php echo $row['datetime'] ?>
							</a>
						</li>
					</ul>
				</div>
			</div>
            <?php } ?>
</div>