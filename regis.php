<?php
require 'function.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('User baru berhasil ditambahkan!');
            window.location.href = 'login.php';
            </script>";
    } else {
        echo mysqli_error($conn);
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 40px;
            margin-top: 100px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .center-text {
            text-align: center;
        }

        .center-text a {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
    <title>Halaman Registrasi</title>
</head>

<body>
    <div class="container">
        <h1>Registrasi</h1>

        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password2">Konfirmasi Password:</label>
                <input type="password" name="password2" id="password2" class="form-control">
            </div>
            <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
        </form>
        <p class="center-text">Punya akun? <a href="login.php">Masuk</a></p>
    </div>

    <!-- Add Bootstrap JS link here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>