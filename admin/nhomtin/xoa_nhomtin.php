<?php
include_once ('../../include/connect.php');

$select = "SELECT * FROM loai_tin where id_nhomtin = :id_nhomtin";
$queryselect = $dbh->prepare($select);
$queryselect->bindParam(':id_nhomtin', $_GET['id_nhomtin']);
$queryselect->execute();
$row = $queryselect->rowCount();
if ($row == 0) {
    $delete = "DELETE FROM nhom_tin WHERE id_nhomtin = :id_nhomtin";
    $query = $dbh->prepare($delete);
    $query->bindParam(':id_nhomtin', $_GET['id_nhomtin']);
    $query->execute();
    echo'
    <script>
    confirm("Xóa thành công");
    window.location.href = "../admin.php?admin=nhomtin";
    </script>
    ';
} else {
    echo 'Không thể xóa';
    echo'
    <script>
    confirm("Xóa thất bại");
    window.location.href = "../admin.php?admin=nhomtin";
    </script>
    ';
}

?>