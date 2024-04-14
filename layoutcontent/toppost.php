<!-- Start top-post Area -->
<?php
include_once ("include/connect.php");
?>
<section class="top-post-area pt-10">

	<div class="container no-padding">

		<div class="row small-gutters">

			<?php
			$dem = 3;
			$hotsql = "SELECT * FROM tin_tuc where hot='1' LIMIT :limit";
			$hots = $dbh->prepare($hotsql);
			$hots->bindParam(":limit", $dem, PDO::PARAM_INT);
			$hots->execute();

			$i = 0;
			foreach ($hots as $hot) {
				if ($i == 0) {
					echo '<div class="col-lg-8 top-post-left">';
				} else if ($i == 1) {
					echo '<div class="col-lg-4 top-post-right">';
					echo '<div class="single-top-post mt-10">';
				} else {
					echo '<div class="single-top-post mt-10">';
				}
				?>
				<div class="feature-image-thumb relative">
					<div class="overlay overlay-bg"></div>
					<img class="img-fluid" src="<?php echo $hot['image'] ?>">
				</div>
				<div class="top-post-details">
					<ul class="tags">
						<li><a href="#">Hot</a></li>
					</ul>
					<a href="<?php echo "https:vnexpress.net/" . $hot['slug'] . "-" . $hot['id_tin'] . ".html" ?>">
						<?php
						if ($i == 0) {
							?>
							<h3><?php echo $hot['title']; ?></h3>
							<?php
						} else {
							?>

							<h4><?php echo $hot['title']; ?></h4>
							<?php
						}
						?>
					</a>
					<ul class="meta">
						<li><a href="#"><span class="lnr lnr-calendar-full"></span><?php echo $hot['datetime']; ?></a>
						</li>
					</ul>
				</div>
				<?php
				if ($i == 0) {
					echo '</div>';
				} else if ($i == 1) {
					echo '</div>';
				} else {
					echo '</div>';
				}
				if ($i == $dem) {
					echo '</div>';
				}
				$i++;
			}
			?>
			<div class="col-lg-12">
			</div>
		</div>
	</div>
</section>
<!-- End top-post Area -->