<?php
include_once ('../../include/connect.php');
$id_tin = $_GET['id_tin'];

$hienthi = $dbh->query("SELECT * FROM tin_tuc where id_tin = $id_tin ");
$dem = $hienthi->rowCount();
$row = $hienthi->fetch(PDO::FETCH_ASSOC);

 if($row['hot'] == 1){
    $sql = ("UPDATE tin_tuc SET hot = 0 where id_tin = ? ");
    $stm = $dbh->prepare($sql);
    $stm->execute([$id_tin]);
    header("location: ../admin.php?admin=tintuc");
    exit();
 }
 if($row['hot'] == 0){
    $sql = ("UPDATE tin_tuc SET hot = 1 where id_tin = ? ");
    $stm = $dbh->prepare($sql);
    $stm->execute([$id_tin]);
    header("location: ../admin.php?admin=tintuc");
    exit();
 }
?>