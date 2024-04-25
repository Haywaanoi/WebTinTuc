<?php
$idnhomtin = $_GET['id_nhomtin'];
$limit = 10;
$sql = "SELECT * FROM tin_tuc join loai_tin on tin_tuc.id_loaitin = loai_tin.id_loaitin Where id_nhomtin=:id_nhomtin order by datetime LIMIT :limit";
$sqls = $dbh->prepare($sql);
$sqls->bindParam(":id_nhomtin", $idnhomtin, PDO::PARAM_STR);
$sqls->bindParam(":limit", $limit, PDO::PARAM_INT);
$sqls->execute();
$name = "select ten_nhomtin from nhom_tin where id_nhomtin=:id_nhomtin";
$names = $dbh->prepare($name);
$names->bindParam(":id_nhomtin", $idnhomtin, PDO::PARAM_STR);
$names->execute();
$ten_nhomtin = $names->fetchColumn();
?>

<section class="latest-post-area pb-120">

    <div class="container no-padding">

        <div class="row">

            <div class="col-lg-12 post-list">

                <!-- START LATEST POST -->
                <div class="latest-post-wrap">
                    <h4 class="cat-title"><?php echo $ten_nhomtin ?></h4>
                    <?php
                    foreach ($sqls as $row) {
                        ?>
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="<?php echo $row['image'] ?>">
                                </div>
                                <ul class="tags">
                                    <!-- <li><a href="#">Tin mới nhất</a></li> -->
                                </ul>
                            </div>
                            <div class="col-lg-7">
                                <a
                                    href="<?php echo "https:vnexpress.net/" . $row['slug'] . "-" . $row['id_tin'] . ".html" ?>">
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
                                    <?php echo $row['sub_title'] ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <!-- END LATEST POST -->
            </div>
        </div>
    </div>
    </div>
</section>