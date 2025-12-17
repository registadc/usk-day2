<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header('location:login.php?logindulu');
    exit;
}

$id_todo = $_GET['id_todo'];

$sql = "SELECT * FROM todo WHERE id_todo = '$id_todo'";
$query = mysqli_query($koneksi, $sql);

$kategori = mysqli_query($koneksi, "SELECT * FROM category");

while($todo = mysqli_fetch_assoc($query)) {


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            margin-top: 100px;
        }

        .form{
            margin: auto;
            justify-content: center;
            align-items: center;
            width: 350px;
            max-width: 500px;
            border: 1px solid #b5b5b5ff;
            border-radius: 10px;
        }

        .form h2{
            margin-left: 150px;
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .form-add{
            margin-left: 20px;
        }

        .form-group{
            margin-bottom: 15px;
        }

        .btn{
             background: #3aa762ff;
            color: white;
            font-size: 15px;
            padding: 6px 12px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            width: 95%;
        }
       
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="form">
    <h2>Edit</h2>
    <form action="proses_edit.php" method="POST" class="form-add">
        <input type="hidden" name="id_todo" value="<?= $todo['id_todo']; ?>">

        <div class="form-group">
            <label for="">Judul</label>
            <input type="text" name="title" id="" value="<?= $todo['title']; ?>" style="border-radius: 5px; width: 95%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
        </div>

        <div class="form-group">
            <label for="">Deskripsi</label>
            <input type="text" name="description" id="" value="<?= $todo['description']; ?>" style="border-radius: 5px; width: 95%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
        </div>

        <div class="form-group">
            <label for="">Kategori</label>
            <select name="id_category" id="" style="border-radius: 5px; width: 95%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
                <?php while($k = mysqli_fetch_assoc($kategori)) {
                    $selected = ($k['category'] == $todo['category']) ? 'selected' : '';
                    echo "<option value='{$k['id_category']}' $selected > {$k['category']} </option>";
                } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="">Status</label>
            <select name="status" style="border-radius: 5px; width: 95%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
                <option value="pending" <?= $todo['status'] == 'pending' ? 'selected' : ''?>>Pending</option>
                <option value="done" <?= $todo['status'] == 'done' ? 'selected' : '' ?>>Done</option>
            </select>
        </div>


        <input type="submit" value="Edit" class="btn">

        <input type="hidden" name="id_user" value="<?= $todo['id_user']; ?>" >

</form>
</div>

    
</body>
</html>



<?php } ?>