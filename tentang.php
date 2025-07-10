<?php
require_once 'connect.php';
require_once 'header.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Pembuat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f1f5fc;
            font-family: 'Segoe UI', sans-serif;
        }
        .profile-card {
            background: linear-gradient(to right, #4facfe, #00f2fe);
            color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            max-width: 650px;
            margin: 40px auto;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 12px;
            border: 3px solid white;
        }
        .profile-table th {
            width: 120px;
        }
        .profile-table td {
            color: #f0faff;
        }
        .profile-heading {
            font-weight: bold;
            font-size: 22px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile-card">
        <div class="row">
            <div class="col-sm-4 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/4140/4140048.png" alt="Foto Profil" class="profile-img img-thumbnail">
            </div>
            <div class="col-sm-8">
                <div class="profile-heading">Profil Pembuat</div>
                <table class="table profile-table table-borderless">
                    <tr>
                        <th>Nama</th>
                        <td>: Muhammad Bagus Budiyanto</td>
                    </tr>
                    <tr>
                        <th>Prodi</th>
                        <td>: Teknologi Informasi</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>: muhammadbagus@gmail.com</td>
                    </tr>
                    <tr>
                        <th>Telepon</th>
                        <td>: 085897468267</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
