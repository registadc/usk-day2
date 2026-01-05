<?php
include '../koneksi.php';

$id_todo = $_POST['id_todo'];

$title = $_POST['title'];
$description = $_POST['description'];
$id_category = $_POST['id_category'];
$status = $_POST['status'];

$sql = "UPDATE todo SET title = '$title', description = '$description', id_category = '$id_category', status = '$status'
        WHERE id_todo = '$id_todo'";
$query = mysqli_query ($koneksi, $sql);

if($query){
    header("location:lat_index.php?edit=sukses");
}else{
     header("location:lat_edit.php?edit=gagal");
}




?>