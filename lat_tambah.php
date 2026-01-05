<?php
include '../koneksi.php';

$kategori = mysqli_query($koneksi, "SELECT * FROM category");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
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

<?php include 'lat_navbar.php'; ?>

<div class="container">
    <div class="card">
        <h2>Tambah Data</h2>

        <form action="lat_proses_tambah.php" method="POST">
            <div class="form-group">
                <label for="">Judul</label>
                <input type="text" name="title" id="">
            </div>

            <div class="form-group">
                <label for="">Deskripsi</label>
                <textarea name="description" id=""></textarea>
            </div>

            <label for="">Filter Kategori</label>
            <select name="id_category" >
                <?php while($k = mysqli_fetch_assoc($kategori)){?>
                    <option value="<?= $k['id_category']; ?>"><?= $k['category']; ?></option>
                <?php } ?>
            </select>

            <label for="">Filter Status</label>
            <select name="status" id="">
                <option value="pending">Pending</option>
                <option value="done">Done</option>
            </select>

            <input type="submit" value="Tambah" class="btn-add">
        </form>
    </div>
</div>
    
</body>
</html>