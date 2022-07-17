<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko.Kampus | Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'open sans', sans-serif;
        }

        body {
            background-image: url(assets/slider1.jpg);
            background-repeat: no-repeat;
        }


        .logo {
            top: 50%;
            width: 100%;
        }

        .container {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 25px;
            width: 300px;
            background-color: #ffffff;
            box-shadow: 7px 7px 5px rgba(0, 0, 0, 0.5);
            border-radius: 30px;
        }

        .container h1 {
            text-align: left;
            color: #000000;
            margin-bottom: 30px;
            text-transform: uppercase;
            border-bottom: 4px solid white;
        }

        .container label {
            text-align: left;
            color: rgb(0, 0, 0);
        }

        .container form input {
            width: 90%;
            padding: 10px;
            border: 1px solid rgb(102, 117, 255);
            border-radius: 5px;
            margin-bottom: 30px;
        }

        .container form button {
            width: 100%;
            padding: 5px 0;
            border: none;
            background-color: black;
            font-size: 18px;
            color: white;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="backend/ceklogin.php" method="post">
            <p align=center>
            <h1>TOKO.KAMPUS</h1> <br>
            </p>
            <label placeholder="user">Username</label><br>
            <input type="text" name="username" autocomplete="off" required><br>
            <label>Password</label><br>
            <input type="password" name="password" autocomplete="off" required><br>
            <button type="submit" name="submit">Log in</button>
        </form>
    </div>
</body>

</html>