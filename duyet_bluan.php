<?php 
include("include/connect.php");
$id_bluan = $_GET['id_bluan'];
$id_tin = $_GET['id'];

$hienthi = $dbh->query("SELECT * FROM binh_luan where id_binhluan = $id_bluan");
$dem = $hienthi->rowCount();
$row = $hienthi->fetch(PDO::FETCH_ASSOC);

 if($row['trang_thai'] == 1){
    $sql = ("UPDATE binh_luan SET trang_thai = 0 where id_binhluan = ? ");
    $stm = $dbh->prepare($sql);
    $stm->execute([$id_bluan]);
    header("location: chitiettintuc.php?id=$id_tin");
    exit();
 }
 if($row['trang_thai'] == 0){
    $sql = ("UPDATE binh_luan SET trang_thai = 1 where id_binhluan = ? ");
    $stm = $dbh->prepare($sql);
    $stm->execute([$id_bluan]);
    header("location: chitiettintuc.php?id=$id_tin");
    exit();
 }
?>