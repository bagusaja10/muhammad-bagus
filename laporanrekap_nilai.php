<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Laporan Rekap Nilai</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #fdfaf6;
            font-family: 'Segoe UI', sans-serif;
            color: #4b2e2e;
        }

        h3 {
            color: #5a3c2e;
            font-weight: bold;
        }

        .panel {
            border-color: #b2885a;
        }

        .panel-heading {
            background-color: #d2b48c !important;
            color: #4b2e2e !important;
        }

        .btn-primary {
            background-color: #8b5e3c;
            border-color: #8b5e3c;
        }

        .btn-primary:hover {
            background-color: #6f4c2b;
        }

        .table > thead > tr {
            background-color: #f0e1c0;
        }
    </style>
</head>
<body>
<div class="container" style="padding-top: 30px;">
    <h2>Laporan Rekap Nilai Mahasiswa</h2>
    <hr>

    <form method="get" action="laporanrekap_nilai.php">
        <div class="row">
            <div class="col-md-5">
                <label>Filter Nilai Akhir</label>
                <div class="input-group">
                    <input type="number" name="nilai_awal" value="<?= @$_GET['nilai_awal'] ?>" class="form-control" placeholder="Nilai Minimum">
                    <span class="input-group-addon">s/d</span>
                    <input type="number" name="nilai_akhir" value="<?= @$_GET['nilai_akhir'] ?>" class="form-control" placeholder="Nilai Maksimum">
                </div>
            </div>
            <div class="col-md-7" style="margin-top: 25px;">
                <button type="submit" name="filter" value="true" class="btn btn-primary">Tampilkan</button>
                <?php if (isset($_GET['filter'])): ?>
                    <a href="laporanrekap_nilai.php" class="btn btn-default">Reset</a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <br>

    <?php
    include "connect.php";

    $nilai_awal  = @$_GET['nilai_awal'];
    $nilai_akhir = @$_GET['nilai_akhir'];

    if (empty($nilai_awal) || empty($nilai_akhir)) {
        $query = "SELECT * FROM daftar_nilai";
        $url_cetak = "printrekap_nilai.php";
        $label = "Semua Data Nilai Mahasiswa";
    } else {
        $query = "SELECT * FROM daftar_nilai 
                  WHERE nilai_akhir BETWEEN $nilai_awal AND $nilai_akhir";
        $url_cetak = "printrekap_nilai.php?nilai_awal=$nilai_awal&nilai_akhir=$nilai_akhir&filter=true";
        $label = "Filter Nilai Akhir $nilai_awal s/d $nilai_akhir";
    }
    ?>

    <h4><b><?= $label ?></b></h4>
    <div style="margin: 10px 0;">
        <a href="<?= $url_cetak ?>" class="btn btn-success" target="_blank">Cetak PDF</a>
        <a href="daftar_nilai.php" class="btn btn-danger" style="margin-left: 10px;">Kembali</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID Nilai</th>
                <th>NIM</th>
                <th>ID Mata Kuliah</th>
                <th>ID Dosen</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Nilai Akhir</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = mysqli_query($con, $query);
            if (mysqli_num_rows($sql) > 0) {
                while ($data = mysqli_fetch_array($sql)) {
                    echo "<tr>";
                    echo "<td>" . $data['id_nilai'] . "</td>";
                    echo "<td>" . $data['nim'] . "</td>";
                    echo "<td>" . $data['id_matkul'] . "</td>";
                    echo "<td>" . $data['id_dosen'] . "</td>";
                    echo "<td>" . $data['tugas'] . "</td>";
                    echo "<td>" . $data['uts'] . "</td>";
                    echo "<td>" . $data['uas'] . "</td>";
                    echo "<td>" . $data['nilai_akhir'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
