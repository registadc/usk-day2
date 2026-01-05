<?php
session_start();
include '../koneksi.php';

if(!isset($_SESSION['id_user'])){
    header("location:lat_login.php?logindulu");
    exit;
}

$id_user = $_SESSION['id_user'];

if(isset($_GET['fav'])){
    $id = $_GET['fav'];
    if(!isset($_SESSION['favorit'][$id])){
        $_SESSION['favorit'][$id] = 1;
    }else{
        $_SESSION['favorit'][$id] = $_SESSION['favorit'][$id] == 1 ? 0 : 1;
    }
    header("location:lat_index.php");
    exit();
}

$favorit = isset($_GET['favorit']) && $_GET['favorit'] == 1;

$where = "WHERE id_user = '$id_user'";

if(isset($_GET['category']) && $_GET['category'] != ""){
    $id_kategori = $_GET['category'];
    $where .= "AND todo.id_category = '$id_kategori'";
}

if(isset($_GET['status']) && $_GET['status'] != ""){
    $status = $_GET['status'];
    $where .= "AND todo.status = '$status'";
}

$sql = "SELECT todo.*, category.category FROM todo 
        LEFT JOIN category ON category.id_category = todo.id_category
        $where ORDER BY todo.id_todo DESC";
$query = mysqli_query($koneksi,$sql);

$kategori = mysqli_query($koneksi, query: "SELECT * FROM category");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            font-family: arial, sans-serif;
            margin-top: 100px;
            background: #dcdcdcff;
        }

       .todo-wrapper{
           display: grid;
           grid-template-columns: repeat(3,1fr);
           gap: 18px;
           max-width: 1000px;
           margin: 30px auto;
           padding: 0 20px;

        }

        .todo-card{
            height: 100%;
            border-radius: 10px;
            /* border: 1px solid #8f8f8fff; */
            color: black;  
            margin-bottom: 15px;      
        }


        .todo-card.pending{
            background-color: white;
            color: black;
        }

        .todo-card.done{
            background-color: black;
            color: white;
        }

        .todo-card.done h2
        .todo-card.done p{
            text-decoration: line-through;
        }
        
        .todo-card h2{
            margin-left: 15px;
            margin-bottom: 5px;
            margin-top: 5px;
        }

        .todo-card .small{
            margin-left: 15px;
            font-size: 13px;
            color: #808080ff;
            margin-bottom: 5px;
        }

        .todo-card p{
            margin-left: 15px;
            margin-bottom: 5px;
        }

        .button{
            margin-top: 15px;
            margin-left: 15px;
        }


    </style>
</head>
<body>

<?php include 'lat_navbar.php';?>

<center>
<div class="header">
    <h2>Todolist</h2>

    <div class="top-bar">
        <form action="" method="get">
            <label for="">Filter Kategori</label>
            <select name="category" id="category" onchange = "this.form.submit()">
                <option value="">Semua</option>
                <?php while($k = mysqli_fetch_assoc($kategori)){?>
                    <option value="<?= $k['id_category']; ?>">
                        <?= isset($_GET['category']) && $_GET['category'] == $k['id_category'] ? '' : '' ?>
                        <?= $k['category']; ?>
                    </option>
                <?php } ?>
            </select>
        </form>

        

        <form action="" method="get">
            <label for="">Filter Status</label>
            <select name="status" id="status" onchange = "this.form.submit()">
                <option value="">Semua</option>
                <option value="pending" <?= (isset($_GET['status']) && $_GET['status']) ? 'selected' : '' ?>>Pending</option>
                <option value="done" <?= (isset($_GET['status']) && $_GET['status']) ? 'selected' : '' ?>>Done</option>
            </select>
        </form>

         <form action="" method="get">
            <label for="">Filter Bookmark</label>
            <select name="favorit" id="favorit" onchange = "this.form.submit()">
                <option value="">Semua</option>
                <option value="1" <?= @$_GET['favorit'] == '1' ? 'selected' : '' ?>>Favorit</option>
            </select>
        </form>

        <button onclick="window.print()">Print</button>
        <a href="lat_tambah.php" class="btn btn-add">Tambah</a>  
    </div>
</div>
</center>

<div class="todo-wrapper">
    <?php while($todo = mysqli_fetch_assoc($query)){ ?>
        <?php
        $inifavorit = $_SESSION['favorit'][$todo['id_todo']] ?? 0;
        if($favorit && $inifavorit != 1) continue;
        ?>
        <div class="todo-card <?= strtolower($todo['status']) == 'done' ? 'done' : 'pending' ?>">
            <h2 style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['title']; ?></h2>
            <p class="small" style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>" class="small"><?= $todo['description']; ?></p>
            <p style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['category']; ?></p>
            <p style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration : line-through' : 'pending' ?>"><?= $todo['status']; ?></p>

            <div class="button">
                <a href="lat_edit.php?id_todo=<?= $todo['id_todo']; ?>div>">Edit</a>
                <a href="lat_hapus.php?id_todo=<?= $todo['id_todo']; ?>div>">Hapus</a>
                <a href="?fav=<?= $todo['id_todo'] ?>">
                    <?= $inifavorit == 1 ? '❤️' : 'favorit'; ?>
                </a>
            </div>
        </div>
    <?php } ?>
</div>
    
</body>
</html>