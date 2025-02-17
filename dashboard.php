<?php
require_once('function/helper.php');

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : false;
$process = isset($_GET['process']) ? $_GET['process'] : false;

if ($_SESSION['id'] == null) {
    header("location: " . BASE_URL);
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet"> <!-- Custom CSS file -->

    <title>Dashboard</title>
    <style>
        .alert-success {
            background-color: #dff0d8;
            color: #3c763d;
            border: none;
            border-radius: 0;
            margin-bottom: 0;
            padding: 15px;
        }

        .content {
            margin-top: 0px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="avatar-3814049_640.webp" alt="Logo" class="logo"> <!-- Tambahkan elemen gambar -->
                Data Pegawai</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link action" aria-current="page" href="<?= BASE_URL . 'dashboard.php?page=home' ?>">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link action" href="<?= BASE_URL . 'dashboard.php?page=create' ?>">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link action" href="<?= BASE_URL . 'process/process_logout.php' ?>">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="bg-primary text-white text-center py-5">
        <div class="container">
            <h1>Selamat Datang di Dashboard</h1>
            <p class="lead">Manajemen Data Pegawai dengan Mudah</p>
        </div>
    </header>

    <?php if ($process == 'login') : ?>
        <div class="alert alert-success text-center">
            Anda sudah login
        </div>
    <?php elseif ($process == 'logout') : ?>
        <div class="alert alert-success text-center">
            Anda telah berhasil logout
        </div>
    <?php elseif ($process == 'edit') : ?>
        <div class="alert alert-success text-center">
            Data berhasil diubah
        </div>
    <?php endif; ?>

    <div class="content">
        <div class="container">
            <div class="sub-content mt-5">
                <?php
                $filename = "page/$page.php";

                if (file_exists($filename)) {
                    include_once($filename);
                } else {
                    echo "404 - Halaman Tidak Ditemukan";
                }
                ?>
            </div>
        </div>
    </div>

    <footer style="background-color: transparent; text-align: center; padding: 20px;">
        <div>
            <br>
            <br>© 2024 Data Pegawai.
        </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>
