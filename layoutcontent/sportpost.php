<div class="relavent-story-post-wrap mt-30">
	<h4 class="title">Thể Thao</h4>
	<div class="relavent-story-list-wrap">
		<?php
			$dem = 3;
			$thethaosql = "SELECT * FROM tin_tuc JOIN loai_tin on tin_tuc.id_loaitin = loai_tin.id_loaitin WHERE loai_tin.id_nhomtin = 'the-thao' ORDER BY datetime LIMIT :limit";
			$thethaos = $dbh->prepare($thethaosql);
			$thethaos->bindParam(":limit", $dem, PDO::PARAM_INT);
			$thethaos->execute();
			foreach ($thethaos as $row) {
		?>
		<div class="single-relavent-post row align-items-center">
			<div class="col-lg-5 post-left">
				<div class="feature-img relative">
					<div class="overlay overlay-bg"></div>
					<img class="img-fluid" src="<?php echo $row['image'] ?>" >
				</div>
				<ul class="tags">
					<li><a href="#">Thể thao</a></li>
				</ul>
			</div>
			<div class="col-lg-7 post-right">
				<a href="chitiettintuc.php?id=<?php echo $row['id_tin'] ?>">
					<h4><?php echo $row['title'] ?></h4>
				</a>
				<ul class="meta">
					<li>
						<a href="#">
							<span class="lnr lnr-calendar-full"></span>
                			<?php echo $row['datetime'] ?>
                		</a>
                	</li>
				</ul>
				<p class="excert">
					<?php echo $row['sub_title'] ?>
				</p>
			</div>
		</div>
        <?php
			}
        ?>
	</div>
</div>