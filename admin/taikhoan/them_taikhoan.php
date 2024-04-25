<?php 
include("../../include/connect.php");
$email = $_POST["Email"];
$password = md5($_POST["password"]);
$name = $_POST["Name"];
$role = $_POST["role"];

echo "$email, $password, $name, $role";

if($email != '' && $password != '' &&$name !='' && $role !='')
{
   $sql = ("INSERT INTO user( email,password, name, role) values(?,?,?,?)");
   $stm = $dbh->prepare($sql);
   $stm->execute([$email,$password,$name,$role]);
}
header('location: ../admin.php?admin=taikhoan');



?>