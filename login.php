<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
         body{
            margin: 0;
            padding: 0;
            margin-top: 100px;
            font-family: arial, sans-serif;
        }

        .form{
            margin: auto;
            justify-content: center;
            align-items: center;
            width: 350px;
            max-width: 500px;
            border: 1px solid #b5b5b5ff;
            border-radius: 5px;
        }

        .form h2{
            margin-left: 150px;
            margin-top: 25px;
            margin-bottom: 15px;
        }

        .form-add{
            margin-left: 20px;
        }

        .form-group{
            margin-bottom: 15px;
        }

        .btn{
             background: #3f94c9ff;
            color: white;
            font-size: 15px;
            padding: 6px 12px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: none;
            width: 90%;
        }
    </style>
</head>
<body>

<div class="form">
    <h2>Login</h2>
    <form action="proses_login.php" method="POST" class="form-add">

        <div class="form-group">
            <label for="">Username</label>
            <input type="text" name="username" id="" style="border-radius: 5px; width: 90%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" style="border-radius: 5px; width: 90%; font-size: 10px; height: 30px; font-size: 13px; border: 1px solid #cacacaff;">
        </div>

        <input type="submit" value="Login" class="btn">

        <p style="justify-content: center; align-item: center; margin-left: 50px;">Pengguna baru?<a href="register.php" style="text-decoration: none; color: #3f94c9ff; "> Sign Up</a></p>
    </form>
</div>

    
</body>
</html>