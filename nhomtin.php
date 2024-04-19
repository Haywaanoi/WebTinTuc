<?php
include_once ("include/connect.php");
if (isset($_GET['id_nhomtin'])) {
    $idnhomtin = $_GET['id_nhomtin'];
    $limit = 10;
    $sql = "SELECT * FROM tin_tuc join loai_tin on tin_tuc.id_loaitin = loai_tin.id_loaitin Where id_nhomtin=:id_nhomtin order by datetime LIMIT :limit";
    $sqls = $dbh->prepare($sql);
    $sqls->bindParam(":id_nhomtin", $idnhomtin, PDO::PARAM_STR);
    $sqls->bindParam(":limit", $limit, PDO::PARAM_INT);
    $sqls->execute();
} else {
    header("location:index.php");
}
foreach ($sqls as $row) {
    ?>
    <div class="single-latest-post row align-items-center">
        <div class="col-lg-5 post-left">
            <div class="feature-img relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="<?php echo $row['image'] ?>">
            </div>
            <ul class="tags">
                <li><a href="#">Tin mới nhất</a></li>
            </ul>
        </div>
        <div class="col-lg-7 post-right">
            <a href="<?php echo "https:vnexpress.net/" . $row['slug'] . "-" . $row['id_tin'] . ".html" ?>">
                <h4>
                    <?php echo $row['title'] ?>
                </h4>
            </a>
            <ul class="meta">
                <!-- <li><a href="#"><span class="lnr lnr-user"></span>Mark wiens</a></li> -->
                <li><a href="#"><span class="lnr lnr-calendar-full"></span>
                        <?php echo $row['datetime'] ?>
                    </a></li>
                <!-- <li><a href="#"><span class="lnr lnr-bubble"></span>Comments</a></li> -->
            </ul>
            <p class="excert">
                <?php echo $row['title'] ?>
            </p>
        </div>
    </div>
    <?php
}
?>
