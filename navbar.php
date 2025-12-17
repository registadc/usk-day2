<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <style>
      *{
        margin : 0;
        padding: 0;
        font-family: arial, sans-serif;
      }

      .header-2{
        display: flex;
        justify-content: space-between;
        flex-direction: row;
        width: 100%;
        background: black;
        padding: 12px 24px;
        box-shadow: 0 12px 10px rgba(0,0,0,,0.1);
        position: fixed;
        left: 0;
        top: 0;
        z-index: 999;
      }

      .header-2 .flex{
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: auto;
        background: black;
        margin-top: 40px;
        flex-direction: row;
      }

      .navbar{
        display: flex;
        margin-right: 35px;
        gap: 10px;
      }

      .navbar a{
        text-decoration: none;
        color: white;
        font-weight: 500;
        
      }

      .judul {
        text-decoration: none;
        font-weight: 600;
        color: white;
        
      } */
    </style>
</head>
<body>

<div class="header-2">
    <a href="index.php" class="judul">Todolist</a>

    <nav class="navbar">
        <a href="profil.php">Profil</a>
        <a href="logout.php">Logout</a>
    </nav>
</div>
    
</body>
</html>