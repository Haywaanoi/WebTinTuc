<?php
include_once ('../../include/connect.php');
$binhluan = $_GET['id_binhluan'];
echo $binhluan;
$delete = "DELETE FROM binh_luan WHERE id_binhluan = :id_binhluan";
$query = $dbh->prepare($delete);
$query->bindParam(':id_binhluan', $binhluan);
$query->execute();

header('location: ../admin.php?admin=binhluan');
?>
