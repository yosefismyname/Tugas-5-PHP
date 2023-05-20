<?php
require 'function.php';

session_start();

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sanitized_username = mysqli_real_escape_string($conn, $username);

    $query = "SELECT * FROM login WHERE username='$sanitized_username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION["submit"] = true;
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
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

        .error {
            color: red;
        }

        .center-text {
            text-align: center;
        }

        .center-text a {
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary btn-block">Login</button>
            <?php if (isset($error)): ?>
                <p class="error">Username or Password invalid</p>
            <?php endif; ?>
        </form>
        <p class="center-text">Tidak punya akun? <a href="regis.php">Buat akun</a></p>
    </div>

    <!-- Add Bootstrap JS link here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>