<?php
include_once ('../../include/connect.php');
$binhluan = $_GET['id_binhluan'];
echo $binhluan;
$hienthi = $dbh->query("SELECT * FROM binh_luan where id_binhluan = $binhluan");
$dem = $hienthi->rowCount();
$row = $hienthi->fetch(PDO::FETCH_ASSOC);

 if($row['trang_thai'] == 1){
    $sql = ("UPDATE binh_luan SET trang_thai = 0 where id_binhluan = ? ");
    $stm = $dbh->prepare($sql);
    $stm->execute([$binhluan]);
    header("location: ../admin.php?admin=binhluan");
    exit();
 }
 if($row['trang_thai'] == 0){
    $sql = ("UPDATE binh_luan SET trang_thai = 1 where id_binhluan = ? ");
    $stm = $dbh->prepare($sql);
    $stm->execute([$binhluan]);
    header("location: ../admin.php?admin=binhluan");
    exit();
 }
?>