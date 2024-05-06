<?php 
session_start();
include("../include/connect.php");
$email = $_POST["email"];
$password = md5($_POST["password"]);

$query = "SELECT * FROM user WHERE email = :email AND password = :password";
$stmt = $dbh->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

if($result) {
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $result['name'];
    $_SESSION['role'] = $result['role'];
    if($result['role'] == 'admin') {
        header('location: ../admin');
        exit();
    }else{
        header('location: ../index.php');
        exit();
    }

} else {
    echo $email. " ". $password ;
    echo "Đăng nhập thất bại!";
}
?>
