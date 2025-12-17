<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['id_user'])){
    header('location:login.php?logindulu');
    exit;
}

if (isset($_GET['fav'])) {
    $id = $_GET['fav'];
    if (!isset($_SESSION['favorite'][$id])) {
        $_SESSION['favorite'][$id] = 1;
    } else {
        $_SESSION['favorite'][$id] = $_SESSION['favorite'][$id] == 1 ? 0 : 1;
    }
    header("Location: index.php");  
    exit();
}

$id_user = $_SESSION['id_user'];

$favorit = isset($_GET['favorite']) && $_GET['favorite'] == 1;
$where = "WHERE id_user='$id_user'";

if(isset($_GET['category']) && $_GET['category'] != ""){
    $id_kategori = $_GET['category'];
    $where .= "AND todo.id_category =  '$id_kategori'";
}

if(isset($_GET['status']) && $_GET['status'] != ""){
    $status = $_GET['status'];
    $where .= "AND todo.status = '$status'";
}
         
$sql = "SELECT todo.*, category.category 
    FROM todo LEFT JOIN category ON category.id_category = todo.id_category
   $where ORDER BY todo.id_todo DESC";  
$query = mysqli_query($koneksi, $sql);




$kategori = mysqli_query($koneksi, "SELECT * FROM category");


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            margin-top: 90px;
            background : #ecebebff;
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

        .todo-card a{
            text-decoration: none;
        }

        .todo-card h2{
            margin-top: 15px;
            margin-left: 10px;
            margin-bottom: 5px;
        }

        .todo-card .small{
            margin-left: 10px;
            margin-bottom: 5px;
            color: #4c4c4cff;
            font-size: 15px;
        }

        .todo-card .status{
            margin-left: 10px;
            margin-bottom: 5px;
        }

        .todo-card p{
            margin-left: 10px;
            margin-bottom: 5px;
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


        .button{
            margin-top: 20px;
            margin-left: 15px;
            border-radius: 10px;
        }

        .button .edit{
            background: #3791ffff;
            color: white;
            font-size: 15px;
            padding: 6px 12px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .button .hapus{
            background: #a92424ff;
            color: white;
            font-size: 15px;
            padding: 6px 12px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .header{
            margin: auto;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar{
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-form{
            border-radius: 15px;
        }

                /* .btn{
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 15px;
            border: none;
            margin-top: 10px;
        } */

        .btn-add{
            background: blue;
            color: white;
            text-decoration:none;
            margin-top: 10px;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 15px;
            border: none;
            margin-top: 15px
        }


    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

<center><div clas="header">
    <h2 style="justify-content: center; align-items: center; font-size: 40px; ">Todolist</h2>

    <div class="top-bar">
        <form method="GET" class="filter-form">
            <label for="">Filter Kategori</label>
            <select name="category" id="category" onchange="this.form.submit()" style="border-radius: 5px; width: 150px; height: 25px; margin-bottom: 15px; margin-top: 10px;">
                <option value="">Semua</option>
                <?php while($k = mysqli_fetch_assoc($kategori)) { ?>
                    <option value="<?= $k['id_category'];?>">
                        <?= isset($_GET['category']) && $_GET['category'] == $k['id_category'] ? '' : ''?>
                        <?= $k['category'];?>
                    </option>
                <?php } ?>
            </select>
        </form>
        
         <form method="GET" class="filter-form">
            <label for="">Filter status</label>
            <select name="status" id="status" onchange="this.form.submit()" style="border-radius: 5px; width: 150px; height: 25px; margin-bottom: 20px;">
                <option value="">Semua status</option>
                <option value="pending" <?= (isset($_GET['status']) && $_GET['status']) ? 'selected' : '' ?>>Pending</option>
                <option value="done" <?= (isset($_GET['status']) && $_GET['status']) ? 'selected' : '' ?>>Done</option>
            </select>
        </form>

        <button onclick="window.print()" class="btn btn-add" style="background: #a381e7ff;">Print</button>
        <a href="tambah.php" class="btn btn-add" style="margin-top: 15px; background: #49b859ff;">(+)Tambah</a>
    </div>
</div>
</center>

<div class="todo-wrapper">
    <?php while($todo = mysqli_fetch_assoc($query)){ ?>
        <?php
            $iniFavorit = $_SESSION['favorite'][$todo['id_todo']] ?? 0;
            if ($favorit && $iniFavorit != 1) continue;
        ?>
        <div class="todo-card <?= strtolower($todo['status']) == 'done' ? 'done' : 'pending' ?>">
            <h2 style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration: line-through;' : '' ?>"><?= $todo['title']?></h2>
            <p class="small" style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration: line-through;' : '' ?>"><?= $todo['description'];?></p>
            <p style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration: line-through;' : '' ?>"><b>Kategori :</b><?= $todo['category'];?></p>
            <p class="status" style="<?= strtolower($todo['status']) == 'done' ? 'text-decoration: line-through;' : '' ?>"><b>Status :</b><?= $todo['status'];?></p>

            <div class="button">
                <a class="edit" href="edit.php?id_todo=<?= $todo['id_todo'];?>">Edit</a>
                <a class="hapus" href="hapus.php?id_todo=<?= $todo['id_todo'];?>">Hapus</a>
                <a href="?fav=<?= $todo['id_todo'] ?>" style="color: #e91e63;">
                    <?= $iniFavorit == 1 ? '❤️' : 'Favorit' ?>
                </a>
            </div>
        </div>

    <?php } ?>
</div>

</body>
</html>