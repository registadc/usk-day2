<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header('location:login.php?logindulu');
    exit;
}

$kategori = mysqli_query($koneksi, "SELECT * FROM category");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
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
            margin-left: 130px;
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
    <h2>Tambah </h2>
    <form action="proses_tambah.php" class="form-add" method="POST">
    
    <div class="form-group">
        <label for="" class="label">Judul</label>
        <input type="text" name="title" id="" style="border-radius: 5px; width: 98%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
    </div>
    
    <div class="form-group">
        <label for="" class="label">Deskripsi</label>
        <input type="text" name="description" id="" style="border-radius: 5px; width: 90%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
    </div>

    <div class="form-group">
        <label for="" class="label">Kategori</label>
        <select name="id_category" id="" 
        style="border-radius: 5px; width: 90%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
            <?php while($k = mysqli_fetch_assoc($kategori)){ ?>
                <option value="<?= $k['id_category']; ?>"><?= $k['category']; ?></option>
            <?php } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="" class="label">Status</label>
        <select name="status" id="" style="border-radius: 5px; width: 90%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
            <option value="pending">Pending</option>
            <option value="done">Done</option>
        </select>
    </div>            
    
    <input type="submit" value="Tambah" class="btn">
</form>
</div>

    
</body>
</html>