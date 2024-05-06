<?php 
session_start();
include("include/connect.php");
if(isset($_POST["binh_luan"])){
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
        if($_POST['binh_luan'] != "")
        {
            $bluan = $_POST['binh_luan'];
            $id_tin = $_POST['id_tin'];
            $email = $_SESSION['email'];
            $sql = ("INSERT INTO binh_luan( email,noi_dung_binh_luan, trang_thai, id_tin) values(?,?,?,?)");
            $stm = $dbh->prepare($sql);
            $stm->execute([$email,$bluan,1,$id_tin]);
            header("location: chitiettintuc.php?id=$id_tin");
        }
    };
};

?>