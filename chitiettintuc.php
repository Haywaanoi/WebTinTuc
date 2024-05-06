
<?php
session_start();
include("include/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Web Tin Tuc</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
		CSS
		============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/main.css">
    <style>
        textarea{
            width: 100%;
            max-width: 100%;
            resize: vertical;
            margin: 5pt;
        }
    </style>
</head>

<body>

    <?php
    include 'layout/header.php';
    ?>

    <div class="container-fluid pt-50 bg-white ">
        <?php
        if (isset($_GET['id'])) {
            $id_tin = $_GET['id'];

            // Truy vấn cơ sở dữ liệu để lấy tin tức có ID tương ứng
            $query = $dbh->prepare("SELECT * FROM tin_tuc WHERE id_tin = :id");
            $query->bindParam(":id", $id_tin);
            $query->execute();
            $tin_tuc = $query->fetch(PDO::FETCH_ASSOC);


            


            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true && $_SESSION['role'] == 'admin') {  
                    $hienthi = $dbh->query("SELECT * FROM binh_luan join user on binh_luan.email = user.email where id_tin = $id_tin");
                    $dem = $hienthi->rowCount();
                 
            } else {
                
                $hienthi = $dbh->query("SELECT * FROM binh_luan join user on binh_luan.email = user.email where id_tin = $id_tin and trang_thai = 1");
                $dem = $hienthi->rowCount();
              
            }
            
            
            // Kiểm tra xem tin tức có tồn tại không
            if ($tin_tuc) {
                // Hiển thị nội dung chi tiết của tin tức
        ?>
                <div class="container ">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="content">
                                <div class="header-content">
                                    <ul>
                                        <li><a href=""></a></li>
                                    </ul>
                                    <span><?php echo $tin_tuc['datetime'] ?></span>
                                </div>
                                <h1 class="pt-2"><?php echo $tin_tuc['title'] ?></h1>
                                <div class="pt-4" style="max-width: 730px">
                                    <strong>
                                    <?php
                                    echo $tin_tuc['noi_dung'] ?>
                                </div>
                                    </strong>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sidebar-2">
                                <?php include "layoutcontent/entertainment.php" ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php

            } else {
                echo "Không tìm thấy tin tức";
            }
        } else {
            echo "ID tin tức không hợp lệ";
        }
        ?>
    </div>
    <div class="container pt-20">
        <div class="comment ">
            <h3>Ý Kiến</h1>
                <div class="pt-20 mb-10">
                    <form action="test_bluan.php" method="POST">
                        <div class="pb-10">
                            <textarea name="binh_luan" id="" placeholder="Chia sẻ ý kiến của bạn"></textarea>
                        </div>
                        <input type="text" hidden name="id_tin" value="<?php echo $tin_tuc['id_tin']?>">
                            
                        </input>
                        <?php
                             if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
                                echo '<button class="btn-primary">Gửi</button>';
                             }else{
                                echo '<button disabled class="btn-primary">Đăng nhập để bình luận</button>';
                             }
                        ?>
                        
                    </form>
                </div>
        </div>
        <div class="w-100 ">
            <?php
            foreach($hienthi as $bluan)
            {
                ?>
                <div>
                    <p class="font-weight-bold text-dark fs-5">
                        <?php echo $bluan['name']." " ;
                        if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin')
                        {
                            if($bluan['trang_thai'] == 0)
                            {
                               ?>
                               <a href="duyet_bluan.php?id_bluan=<?php echo $bluan['id_binhluan'] ?>&id=<?php echo $tin_tuc['id_tin'] ?>">Hien Thi</a>
                               <?php 
                            }
                            else
                            {
                                ?>
                               <a href="duyet_bluan.php?id_bluan=<?php echo $bluan['id_binhluan'] ?>&id=<?php echo $tin_tuc['id_tin'] ?>">Ẩn bình luận</a>
                               <?php 
                            }
                        }                       
                        ?>

                    </p>
                </div>
                <div>
                <p class=" text-dark fs-5">
                        <?php echo $bluan['noi_dung_binh_luan'] ?>
                    </p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
    include 'layout/footer.php';
    ?>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/hoverIntent.js"></script>
    <script src="js/superfish.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/mn-accordion.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/mail-script.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
