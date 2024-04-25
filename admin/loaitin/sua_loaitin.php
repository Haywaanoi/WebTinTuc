<?php
include_once ("../../include/connect.php");
include_once ("../encode.php");

if (isset($_POST['btnthem'])) {
    if ($_POST['ten_loaitin'] == "") {
        echo "Xin vui lòng nhập tên loại tin<br />";
    } else {
        $loaitin = $_POST['ten_loaitin'];
        $id_loaitin = $_GET['id_loaitin'];
        $nhomtin_id = $_POST['nhomtin'];
        echo $nhomtin_id;
    }
    if (isset($loaitin)) {
        $sql = ("UPDATE loai_tin SET ten_loaitin = ?, id_nhomtin =? where id_loaitin = ? ");
        $stm = $dbh->prepare($sql);
        $stm->execute([$loaitin, $nhomtin_id, $id_loaitin]);
        echo'
        <script>
        confirm("Sửa thành công");
        window.location.href = "../admin.php?admin=loaitin";
        </script>
        ';
    }
}
$nhomtin = $dbh->query("SELECT * FROM nhom_tin ");
$nhomtin->fetch(PDO::FETCH_ASSOC);
$nhomtin1 = $nhomtin->rowCount();

$sql = "select * from loai_tin join nhom_tin on loai_tin.id_nhomtin = nhom_tin.id_nhomtin where id_loaitin = :id_loaitin";
$query = $dbh->prepare($sql);
$query->bindParam(':id_loaitin', $_GET['id_loaitin']);
$query->execute();

$row = $query->fetch(PDO::FETCH_ASSOC);

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
                        <h3 class="fw-bold fs-4 mb-3">Loại tin</h3>
                        <div class="row">
                            <div class="col-12">
                                <form action="?id_loaitin=<?php echo $row['id_loaitin']; ?>" method="post" name="frm">
                                    <table class="table table-striped">
                                        <tr>
                                            <td colspan=2>Sửa Loại Tin</td>
                                        </tr>
                                        <tr>
                                            <td>Mã loại tin</td>
                                            <td><input type="text" disabled="disabled" name="id_loaitin"
                                                    value="<?php echo $row['id_loaitin']; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên loại tin</td>
                                            <td><input type="text" name="ten_loaitin"
                                                    value="<?php echo $row['ten_loaitin']; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên nhóm tin</td>
                                            <td>
                                                <select class="form-select" aria-label="Default select example"
                                                    name="nhomtin">
                                                    <option selected value="<?php echo $row["id_nhomtin"] ?>">
                                                        <?php echo $row["ten_nhomtin"] ?>
                                                    </option>
                                                    <?php
                                                    foreach ($nhomtin as $nhom) { ?>
                                                        <option value="<?php echo $nhom["id_nhomtin"] ?>">
                                                            <?php echo $nhom["ten_nhomtin"] ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan=2 class="input">
                                                <input type="submit" name="btnthem" value="Update" />
                                                <input type="reset" name="" value="Hủy" />
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
    <script src="../script.js"></script>
</body>

</html>