<?php
include_once ('../../include/connect.php');

    $delete = "DELETE FROM user WHERE email = :email";
    $query = $dbh->prepare($delete);
    $query->bindParam(':email', $_GET['email']);
    $query->execute();

header('location: ../admin.php?admin=taikhoan');
?>