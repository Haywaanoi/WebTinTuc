<?php
include_once ("../../include/connect.php");
include_once ("../encode.php");

if (isset($_POST['btnthem'])) {
    if ($_POST['ten_nhomtin'] == "") {
        echo "Xin vui lòng nhập tên nhóm tin<br />";
    } else {
        $m = $_POST['ten_nhomtin'];
        $id_nhomtin = $_GET['id_nhomtin'];
    }
    if (isset($m)) {
        $sql = "UPDATE nhom_tin SET ten_nhomtin = :ten_nhomtin WHERE id_nhomtin = :id_nhomtin";
        $query = $dbh->prepare($sql);
        $query->bindParam(':ten_nhomtin', $m);
        $query->bindParam(':id_nhomtin', $id_nhomtin);
        $query->execute();
        echo'
        <script>
        confirm("Sửa thành công");
        window.location.href = "../admin.php?admin=nhomtin";
        </script>
        ';
        exit();
    }
}

$sql = "select * from nhom_tin where id_nhomtin = :id_nhomtin";
$query = $dbh->prepare($sql);
$query->bindParam(':id_nhomtin', $_GET['id_nhomtin']);
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
        <?php
        include_once ("../home_include/sidebar.php");
        ?>
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
                        <h3 class="fw-bold fs-4 mb-3">Nhóm tin</h3>
                        <div class="row">
                            <div class="col-12">
                                <form action="?id_nhomtin=<?php echo $row['id_nhomtin']; ?>" method="post" name="frm">
                                    <table class="table table-striped">
                                        <tr>
                                            <td colspan=2>Sửa Nhóm Tin</td>
                                        </tr>
                                        <tr>
                                            <td>Mã nhóm tin</td>
                                            <td><input type="text" disabled="disabled" name="id_nhomtin"
                                                    value="<?php echo $row['id_nhomtin']; ?>" />
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tên nhóm tin</td>
                                            <td><input type="text" name="ten_nhomtin"
                                                    value="<?php echo $row['ten_nhomtin']; ?>" />
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
    <script src="../js/script.js"></script>
</body>

</html>