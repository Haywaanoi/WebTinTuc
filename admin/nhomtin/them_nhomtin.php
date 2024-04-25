<?php 

include_once ('../../include/connect.php');
include_once ('../encode.php');

$ten_nhomtin = $_POST["ten_nhomtin"];
$en_id = str_replace(" ", "-", $ten_nhomtin); 
$id = cleanNonAsciiCharactersInString($en_id);

if($ten_nhomtin != '')
{
   $sql = ("INSERT INTO nhom_tin(id_nhomtin,ten_nhomtin) values(?,?)");
   $stm = $dbh->prepare($sql);
   $stm->execute([$id,$ten_nhomtin]);
   echo'
    <script>
    confirm("Thêm thành công");
    window.location.href = "../admin.php?admin=nhomtin";
    </script>
    ';
}

?>