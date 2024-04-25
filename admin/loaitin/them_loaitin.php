<?php 

include_once ('../../include/connect.php');
include_once ('../encode.php');

$nhomtin = $_POST["nhomtin"];
$ten_loaitin = $_POST["ten_loaitin"];
$en_id = str_replace(" ", "-", $ten_loaitin); 
$id = cleanNonAsciiCharactersInString($en_id);

if($nhomtin != '' && $ten_loaitin != '')
{
   $sql = ("INSERT INTO loai_tin( id_loaitin,ten_loaitin, id_nhomtin) values(?,?,?)");
   $stm = $dbh->prepare($sql);
   $stm->execute([$id,$ten_loaitin, $nhomtin]);
   echo'
   <script>
   confirm("Thêm thành công");
   window.location.href = "../admin.php?admin=loaitin";
   </script>
   ';
}
?>