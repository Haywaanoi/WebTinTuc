<div class="single-sidebar-widget editors-pick-widget">
	<h6 class="title">Giải trí</h6>
	<div class="editors-pick-post">
		<?php
		$dem = 4;
		$thethaosql = "SELECT * FROM tin_tuc JOIN loai_tin on tin_tuc.id_loaitin = loai_tin.id_loaitin WHERE loai_tin.id_nhomtin = 'giai-tri' ORDER BY datetime LIMIT :limit";
		$thethaos = $dbh->prepare($thethaosql);
		$thethaos->bindParam(":limit", $dem, PDO::PARAM_INT);
		$thethaos->execute();
		$i = 0;
		foreach ($thethaos as $row) {
			if ($i == 0) {
				?>
				<div class="feature-img-wrap relative">
					<div class="feature-img relative">
						<div class="overlay overlay-bg"></div>
						<img class="img-fluid" src="<?php echo $row['image'] ?>">
					</div>
					<ul class="tags">
						<li><a href="#">Giải trí</a></li>
					</ul>
				</div>

				<div class="details">
					<a href="chitiettintuc.php?id=<?php echo $row['id_tin']; ?>">
						<h4 class="mt-20"><?php echo $row['title']; ?></h4>
					</a>
					<ul class="meta">
						<li>
							<a href="#"><span class="lnr lnr-calendar-full"></span>
								<?php echo $row['datetime'] ?>
							</a>
						</li>
					</ul>
					<p class="excert">
						<?php echo $row['sub_title'] ?>
					</p>
				</div>
				<div class="post-lists">
				<?php
				$i++;
			} else {
				?>

					<?php

					?>
					<div class="single-post d-flex flex-row">
						<div class="thumb">
							<img class="img-fluid" src="<?php echo $row['image'] ?>">
						</div>
						<div class="detail">
							<a href="<?php echo "https:vnexpress.net/" . $row['slug'] . "-" . $row['id_tin'] . ".html"; ?>">
								<h6><?php echo $row['title']; ?></h6>
							</a>
							<ul class="meta">
								<li>
									<a href="#"><span class="lnr lnr-calendar-full"></span>
										<?php echo $row['datetime'] ?>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<?php
			}
			if($i == $dem) {
				echo '</div>';
			}
		}
		?>
	</div>
</div>