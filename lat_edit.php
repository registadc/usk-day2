<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:lat_login.php?logindulu");
    exit;
}

$id_todo = $_GET['id_todo'];

$sql = "SELECT * FROM todo WHERE id_todo = '$id_todo'";
$query = mysqli_query ($koneksi, $sql);

$kategori = mysqli_query($koneksi, "SELECT * FROM category");

while ($todo = mysqli_fetch_assoc($query)){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body {
            margin: 0;
            padding :0;
            font-family: arial, sans-serif;
        }

        .container{
            margin-top: 100px;
            display: flex;
            justify-content: center;
        }

        .card{
            width: 360px;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .card h2{
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        textarea,
        select{
            width: 100%;
            font-size : 14px;
            padding : 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .btn-add{
            width: 100%;
            background: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-top: 10px;
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Edit</h2>

        <form action="lat_proses_edit.php" method="post">
            <input type="hidden" name="id_todo" value="<?= $todo['id_todo']; ?>">

            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="title" id="" value="<?= $todo['title']; ?>">
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <input type="text" name="description" id="" value="<?= $todo['description']; ?>">
            </div>

            <label for="">Kategori</label>
            <select name="id_category" id="">
                <?php while($k = mysqli_fetch_assoc($kategori)){
                    $selected = ($k['category'] == $todo['category']) ? 'selected' : '';
                    echo "<option value='{$k['id_category']}' $selected > {$k['category']} </option>";
                }?>
            </select>

            <label for="">Status</label>
            <select name="status" id="">
                <option value="pending" <?= $todo['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                <option value="done" <?= $todo['status'] == 'done' ? 'selected' : '' ?>>Done</option>
            </select>

            <input type="submit" value="Edit" class="btn-add">
        </form>
    </div>
</div>
    
</body>
</html>





<?php } ?>