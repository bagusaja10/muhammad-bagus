<!DOCTYPE html>
<html>

<head>
    <title>Nilai Mahasiswa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background: #f4f1ea;
            font-family: 'Segoe UI', sans-serif;
        }

        .navbar-custom {
            background-color: #5a4635;
            border: none;
            border-radius: 0;
        }

        .navbar-custom .navbar-brand {
            color: #f1e3c2 !important;
            font-weight: bold;
            font-size: 22px;
        }

        .navbar-custom .navbar-nav > li > a {
            color: #f1e3c2 !important;
            font-weight: bold;
        }

        .navbar-custom .navbar-nav > .active > a,
        .navbar-custom .navbar-nav > li > a:hover {
            background-color: #7e6651 !important;
            color: #fff !important;
        }

        .box {
            background: #fff;
            padding: 30px;
            margin-top: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-left: 6px solid #bfa177;
        }

        .box h3 {
            color: #5a4635;
            font-weight: bold;
        }

        .box p {
            color: #7e6651;
        }

        .dropdown-menu > li > a {
            color: #5a4635;
        }

        .dropdown-menu > li > a:hover {
            background-color: #eee;
            color: #3b2a1a;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Nilai Mahasiswa </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Beranda</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Daftar Dosen <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="daftar_dosen.php">Dosen</a></li>
                            <li><a href="daftar_mahasiswa.php">Mahasiswa</a></li>
                            <li><a href="daftar_matkul.php">Nilai</a></li>

                        </ul>
                    </li>


                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Data Nilai <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="id_matkul.php">Data Nilai</a></li>
                        </ul>
                    </li>

                    <li><a href="tentang.php">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="box">
            <h3>Selamat Datang di Aplikasi Nilai Mahasiswa</h3>
            <p>Gunakan menu di atas untuk melihat nilai mahasiswa.</p>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>
