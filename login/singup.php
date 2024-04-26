<?php 
include("../include/connect.php");
$email = $_POST['Email'];
$password =md5( $_POST['password']);
$name = $_POST['Name'];


$hienthi = $dbh->query("SELECT * FROM user where email = '$email' ");
$dem = $hienthi->rowCount();
$row = $hienthi->fetch(PDO::FETCH_ASSOC);

if($dem != 0){
    echo'
    <script>
    confirm("Tài khoản đã tồn tại");
    window.location.href = "../index.php";
    </script>
    ';
}
else{
    $sql = ("INSERT INTO user( email, password, name, role) values(?,?,?,?)");
   $stm = $dbh->prepare($sql);
   $stm->execute([$email,$password, $name, 'user']);
   echo'
    <script>
    confirm("Đăng ký thành công");
    window.location.href = "../index.php";
    </script>
    ';
}
echo $email . "," . $password .",". $name ;
?>