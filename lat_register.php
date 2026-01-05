<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body{
            margin:0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container{
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        .card{
            width: 360px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .card h2{
            text-align: center;
            margin-bottom: 20px;
        }

        .label{
            display: block;
            color: black;
            font-size: 14px;
            margin-bottom: 8px;
        }

        input[type="text"]{
            width: 100%;
            border-radius: 5px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 8px;
        }

        input[type="email"]{
            width: 100%;
            border-radius: 5px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 8px;
        }

        input[type="password"]{
            width: 100%;
            border-radius: 5px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 8px;
        }

        input[type="date"]{
            width: 100%;
            border-radius: 5px;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .btn-add{
            width: 100%;
            background-color: #4a90ffff;
            padding: 10px;
            border-radius: 10px;
            border: none;
            color: white;
            font-size: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Register</h2>
    <form action="lat_proses_register.php" method="post">
        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" id="">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="">
        </div>

        <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" name="name" id="">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" id="">
        </div>

        <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" name="birth_date" id="">
        </div>

        <center><p>Sudah punya akun? <a href="lat_login.php" style="text-decoration: none;">Login</a></p></center>
        <input type="submit" value="Register" class="btn-add">

    </form>
    </div>
</div>

    
</body>
</html>