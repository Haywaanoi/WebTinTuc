<?php
include_once ('../../include/connect.php');

$select = "SELECT * FROM tin_tuc where id_loaitin = :id_loaitin";
$queryselect = $dbh->prepare($select);
$queryselect->bindParam(':id_loaitin', $_GET['id_loaitin']);
$queryselect->execute();
$row = $queryselect->rowCount();
if ($row == 0) {
    $delete = "DELETE FROM loai_tin WHERE id_loaitin = :id_loaitin";
    $query = $dbh->prepare($delete);
    $query->bindParam(':id_loaitin', $_GET['id_loaitin']);
    $query->execute();
    echo'
    <script>
    confirm("Xóa thành công");
    window.location.href = "../admin.php?admin=loaitin";
    </script>
    ';
} else {
    echo'
    <script>
    confirm("Xóa thất bại vì có tin trong loại tin này");
    window.location.href = "../admin.php?admin=loaitin";
    </script>
    ';
}
?>