<?php
include '../koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);
$name = $_POST['name'];
$email = $_POST['email'];
$birth_date = $_POST['birth_date'];

$sql = "INSERT INTO user(username, password, name, email, birth_date) VALUES
        ('$username','$password','$name','$email','$birth_date')";
$query = mysqli_query($koneksi, $sql);

if($query){
    header("location:lat_login.php?register=sukses");
    exit;
}else{
     header("location:lat_register.php?register=gagal");
    exit;
}


?>