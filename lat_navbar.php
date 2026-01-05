<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            font-family: arial, sans-serif;
        }

        .header-2{
            width: 100%;
            background-color: black;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            padding: 12px 24px;
            left: 0;
            top: 0;
            z-index: 999;
        }

        .header-2 .flex{
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1000px;
            margin: auto;
        }

        .navbar{
            display: flex;
            gap: 18px;
        }

        .navbar a{
            text-decoration: none;
            color: white;
            font-weight: 500px;
        }

        .judul{
            text-decoration: none;
            color: white;
            font-weight: 600px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="header-2">
        <div class="flex">
            <h2 class="judul">Todolist</h2>

            <nav class="navbar">
                <a href="lat_profil.php">Profil</a>
                <a href="lat_logout.php">Logout</a>
            </nav>
        </div>
    </div>
</body>
</html>