<?php require_once 'header.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda | Aplikasi Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f4f1ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .jumbotron {
            background: linear-gradient(to right, #7d5a4f, #a1866f);
            color: #fff;
            padding: 50px 30px;
            border-radius: 15px;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.15);
        }

        .btn-main {
            background-color: #f1e3c2;
            color: #5a4635;
            border: none;
            margin-top: 20px;
            transition: 0.3s;
            font-weight: bold;
        }

        .btn-main:hover {
            background-color: #e7d3a8;
            color: #3a2c22;
        }

        .feature-box {
            text-align: center;
            margin-top: 40px;
        }

        .feature-box img {
            margin-bottom: 15px;
        }

        .feature-box h4 {
            font-weight: 600;
            color: #5a4635;
        }

        .feature-box p {
            color: #6f5846;
        }

        .btn-default {
            margin-top: 10px;
            background-color: #fff8f0;
            color: #5a4635;
            border: 1px solid #d2b48c;
            font-weight: bold;
        }

        .btn-default:hover {
            background-color: #f0e6d6;
            color: #3b2a1a;
        }

        footer {
            text-align: center;
            margin-top: 60px;
            color: #9e8b7a;
            padding: 15px;
        }
    </style>
</head>
<body>

<div class="container" style="margin-top: 40px;">
    <div class="jumbotron text-center">
        <h1 class="display-4"><strong>Aplikasi Nilai Mahasiswa</strong></h1>
        <p class="lead">Nikmati kemudahan reservasi hotel yang cepat, aman, dan berkelas.</p>
        <a href="tb_reservasi.php" class="btn btn-lg btn-main">Mulai Reservasi</a>
    </div>

    <div class="row">
        <div class="col-md-4 feature-box">
            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" width="60" alt="Icon Pelanggan">
            <h4>Data Pelanggan</h4>
            <p>Informasi pelanggan hotel yang melakukan Reservasi.</p>
            <a href="tb_pelanggan.php" class="btn btn-default">Lihat</a>
        </div>
        <div class="col-md-4 feature-box">
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" width="60" alt="Icon Staf">
            <h4>Data Staf</h4>
            <p>Kelola staf hotel yang bertugas melayani tamu.</p>
            <a href="tb_staf.php" class="btn btn-default">Lihat</a>
        </div>
        <div class="col-md-4 feature-box">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828884.png" width="60" alt="Icon Reservasi">
            <h4>Data Reservasi</h4>
            <p>Lihat dan kelola semua data reservasi yang masuk.</p>
            <a href="tb_reservasi.php" class="btn btn-default">Lihat</a>
        </div>
    </div>
</div>

<footer>
    <p>&copy; <?= date("Y"); ?> Aplikasi Reservasi Hotel | Dibuat oleh Aflan Mu'afa Dzulfiqar</p>
</footer>

</body>
</html>
