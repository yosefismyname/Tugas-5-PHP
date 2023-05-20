<?php
require 'function.php';
session_start();

$datatambah = query("SELECT * FROM datatambah");

if (isset($_POST["submit"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>
    <!-- Add Bootstrap CSS link here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="index.js"></script>
    <style>
        footer {
            font-family: cursive;
            background-color: #139ebd;
        }

        .logout-btn {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <a href="logout.php" class="btn btn-secondary logout-btn">Logout</a>
        <div class="row">
            <div class="col mb-3">
                <h1>Selamat Datang, Admin</h1>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-8 mb-3">
                    <input type="text" name="tambah" id="tambah" class="form-control" placeholder="Text to do" required>
                </div>
                <div class="col-sm-4 mb-3">
                    <button type="submit" name="submit" class="btn btn-primary btn-block">Tambah</button>
                </div>
            </div>
            <div id="data">
                <?php $i = 1; ?>
                <?php foreach ($datatambah as $row): ?>
                    <div class="mt-3">
                        <div class="input-group">
                            <input type="text" id="input_<?= $row["id"]; ?>" value="<?= $row["tambah"]; ?>"
                                class="form-control" readonly>
                        </div>
                        <div class="input-group mt-2">
                            <button type="button" onclick="hapusData(<?= $row["id"]; ?>)"
                                class="btn btn-danger mr-2">Hapus</button>
                            <button type="button" onclick="editData(<?= $row["id"]; ?>)"
                                class="btn btn-info mr-2">Edit</button>
                            <button type="button" onclick="coretData(<?= $row["id"]; ?>)"
                                class="btn btn-warning mr-2">Selesai</button>
                        </div>
                    </div>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </div>
        </form>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#139ebd" fill-opacity="1"
            d="M0,224L60,229.3C120,235,240,245,360,234.7C480,224,600,192,720,176C840,160,960,160,1080,160C1200,160,1320,160,1380,160L1440,160L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
        </path>
    </svg>
    <footer class="text-center text-white pb-3">
        <p>Created with <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-balloon-heart-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M8.49 10.92C19.412 3.382 11.28-2.387 8 .986 4.719-2.387-3.413 3.382 7.51 10.92l-.234.468a.25.25 0 1 0 .448.224l.04-.08c.009.17.024.315.051.45.068.344.208.622.448 1.102l.013.028c.212.422.182.85.05 1.246-.135.402-.366.751-.534 1.003a.25.25 0 0 0 .416.278l.004-.007c.166-.248.431-.646.588-1.115.16-.479.212-1.051-.076-1.629-.258-.515-.365-.732-.419-1.004a2.376 2.376 0 0 1-.037-.289l.008.017a.25.25 0 1 0 .448-.224l-.235-.468ZM6.726 1.269c-1.167-.61-2.8-.142-3.454 1.135-.237.463-.36 1.08-.202 1.85.055.27.467.197.527-.071.285-1.256 1.177-2.462 2.989-2.528.234-.008.348-.278.14-.386Z" />
            </svg> by Yosef</p>
    </footer>
    <!-- Add Bootstrap JS link here -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>