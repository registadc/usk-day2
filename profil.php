<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header('location:login.php?logindulu');
    exit;
}

$id_user = $_SESSION['id_user'];

$sql = "SELECT * FROM user WHERE id_user = '$id_user'";
$query = mysqli_query($koneksi, $sql);

while($user = mysqli_fetch_assoc($query)){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil User</title>
</head>
<body>

<h1>Profil</h1>

<div class="profil">
    <p><b>Nama Lengkap : </b><?= $user['name']; ?></p>
    <p><b>Email : </b><?= $user['email']; ?></p>
    <p><b>Username : </b><?= $user['username']; ?></p>
    <p><b>Password : </b><?= $user['password']; ?></p>
    <p><b>Tanggal Lahir : </b><?= $user['birth_date']; ?></p>
</div>
    
</body>
</html>



<?php } ?>