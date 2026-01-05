<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            margin:0;
            padding: 0;
            font-family: Arial, sans-serif;
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
            margin: 20px;
        }

        .label{
            display: block;
            color: black;
            font-size: 14px;
            margin-bottom: 10px;
        }

        input[type="text"]{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            border: 1px solid #ccc;
            margin-bottom: 8px;
             margin-bottom: 8px;
        }

        input[type="password"]{
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            border: 1px solid #ccc;
            margin-bottom: 8px;
             margin-bottom: 8px;
        }

        .btn-add{
            width: 100%;
            background-color: #4a90ffff;
            color: white;
            font-size: 15px;
            border-radius: 10px;
            margin-top: 5px;
            border: none;
            padding: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Login</h2>
    <form action="lat_proses_login.php" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" id="">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="">
        </div>

        <center><p>Belum punya akun? <a href="lat_register.php" style="text-decoration: none;">Register</a></p></center>
        <input type="submit" value="Login" class="btn-add">

    </form>
    </div>
</div>

    
</body>
</html>