<?php
include_once ("../../include/connect.php");
include_once ("../encode.php");

if (isset($_POST['btnthem'])) {
    if ($_POST['title'] == "") {
        echo "Xin vui lòng nhập title<br />";
    } else {

        $title = $_POST['title'];
        $sub_title = $_POST['Sub_title'];
        $loaitin_id = $_POST['loaitin'];
        $noidung = $_POST['noi_dung'];
        $en_id = str_replace(" ", "-", $title);
        $slug = cleanNonAsciiCharactersInString($en_id);
       
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_save="assets/img" . $img_name;
        $img_destination = "../assets/img" . $img_name;
        move_uploaded_file($img_tmp, $img_destination);

        $sql = ("INSERT INTO tin_tuc (slug, title, sub_title,image,noi_dung, datetime, id_loaitin) VALUES(?,?,?,?,?,now(),?)");
        $stm = $dbh->prepare($sql);
        $stm->execute([$slug, $title, $sub_title, $img_save, $noidung, $loaitin_id]);
        echo '
        <script>
        confirm("Thêm thành công");
        window.location.href = "../admin.php?admin=tintuc";
        </script>
        ';
    }
} elseif (isset($_POST["btnreset"])) {
    header("location:/WebTinTuc/admin/admin.php?admin=tintuc");
}

$loaitin = $dbh->query("SELECT * FROM loai_tin ");
$loaitin->fetch(PDO::FETCH_ASSOC);
$loaitin1 = $loaitin->rowCount();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar With Bootstrap</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
</head>


<body>
    <div class="wrapper">

        <div class="main">
            <nav class="navbar navbar-expand px-4 py-3">
                <form action="#" class="d-none d-sm-inline-block">

                </form>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="/account.png" class="avatar img-fluid" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end rounded">

                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-4">
                <div class="container-fluid">
                    <div class="mb">
                        <h3 class="fw-bold fs-4 mb-3">Tin tức</h3>
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="post" name="frm" enctype="multipart/form-data">
                                    <table class="table table-striped">
                                        <tr>
                                            <td colspan=2>Thêm tin tức</td>
                                        </tr>
                                        <tr>
                                            <td>Loại tin</td>
                                            <td>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="loaitin">
                                                    <?php
                                                    foreach ($loaitin as $nhom) { ?>
                                                        <option value="<?php echo $nhom["id_loaitin"] ?>">
                                                            <?php echo $nhom["ten_loaitin"] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td><input type="text" name="title" style="width:100%" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sub Title</td>
                                            <td><input type="text" name="Sub_title" style="width:100%" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Image_url:</td>
                                            <td>
                                                <div class="">
                                                    <label for="recipient-name" class="col-form-label">img:</label>
                                                    <input type="file" class="form-control" id="recipient-name"
                                                        accept=".jpg,.png,.jpeg" name="img">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nội dung</td>
                                            <td>
                                                <textarea id="editor" name="noi_dung">

                                                </textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=2 class="input">
                                                <input type="submit" name="btnthem" value="Update" />
                                                <input type="submit" name="btnreset" value="Hủy" />
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-body-secondary">
                        <div class="col-6 text-start ">
                            <a class="text-body-secondary" href=" #">
                                <strong>CodzSwod</strong>
                            </a>
                        </div>
                        <div class="col-6 text-end text-body-secondary d-none d-md-block">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">Contact</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">About Us</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="text-body-secondary" href="#">Terms & Conditions</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>

</html>