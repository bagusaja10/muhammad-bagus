<?php
require_once 'connect.php';
require_once 'header.php';
?>

<style>
    body {
        background-color: #f8f4ee;
        font-family: 'Segoe UI', sans-serif;
    }
    .container {
        margin-top: 40px;
    }
    .panel-reservasi {
        background-color: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.08);
    }
    h2 {
        text-align: center;
        font-weight: 600;
        color: #534741;
        margin-bottom: 30px;
    }
    .btn-success {
        background-color: #6d9773;
        border: none;
    }
    .btn-success:hover {
        background-color: #5a8362;
    }
    .btn-warning {
        background-color: #d8a34e;
        border: none;
    }
    .btn-warning:hover {
        background-color: #c79135;
    }
    .btn-danger {
        background-color: #c94c4c;
        border: none;
    }
    .btn-danger:hover {
        background-color: #b93838;
    }
    .table th {
        background-color: #6d9773;
        color: white;
        text-align: center;
    }
    .table td {
        vertical-align: middle;
    }
    .alert {
        text-align: center;
    }
</style>

<div class="container">
    <div class="panel-reservasi">
        <h2>Data Nilai</h2>
        <div class="text-right" style="margin-bottom: 20px;">
            <a href="insertdaftar_nilai.php" class="btn btn-success">+ Tambah Reservasi</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID Nilai</th>
                    <th>NIM</th>
                    <th>ID Matkul</th>
                    <th>ID Dosen</th>
                    <th>Tugas</th>
                    <th>UTS</th>
                    <th>UAS</th>
                    <th>Nilai Akhir</th>
                    <th style="text-align:center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $con->query("SELECT * FROM daftar_nilai ORDER BY id_nilai DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id_nilai']}</td>
                        <td>{$row['nim']}</td>
                        <td>{$row['id_matkul']}</td>
                        <td>{$row['id_dosen']}</td>
                        <td>{$row['tugas']}</td>
                        <td>{$row['uts']}</td>
                        <td>{$row['uas']}</td>
                        <td>{$row['nilai_akhir']}</td>
                        <td class='text-center'>
                            <a href='daftar_nilai.php?id={$row['id_nilai']}' class='btn btn-warning btn-sm'>Edit</a>
                            <form method='POST' action='' style='display:inline-block;' onsubmit=\"return confirm('Hapus data ini?')\">
                                <input type='hidden' name='delete_id' value='{$row['id_nilai']}'>
                                <button type='submit' name='delete' class='btn btn-danger btn-sm'>Hapus</button>
                            </form>
                        </td>
                    </tr>";
                }

                if (isset($_POST['delete'])) {
                    $id = $_POST['delete_id'];
                    $con->query("DELETE FROM daftar_nilai WHERE id_nilai = '$id'");
                    echo "<script>window.location.href='daftar_nilai.php';</script>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
