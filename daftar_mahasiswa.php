<?php 
require_once 'connect.php';
require_once 'header.php';
?>

<style>
    body {
        background-color: #f9f6f2;
        font-family: 'Segoe UI', sans-serif;
    }
    .container {
        margin-top: 40px;
    }
    .panel-hotel {
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        color: #444;
        font-weight: bold;
        margin-bottom: 25px;
    }
    .btn-primary {
        background-color: #a97442;
        border-color: #926b39;
    }
    .btn-primary:hover {
        background-color: #926b39;
    }
    .btn-danger {
        background-color: #d63031;
        border-color: #c0392b;
    }
    .table th {
        background-color: #a97442;
        color: white;
        text-align: center;
    }
    .table td {
        vertical-align: middle;
    }
</style>

<div class="container">
    <div class="panel-hotel">
        <?php
        // Proses penghapusan
        if (isset($_POST['delete'])) {
            $nim = $_POST['nim']; 
            $sql = "DELETE FROM daftar_mahasiswa WHERE nim = '$nim'";
            if ($con->query($sql) === TRUE) {
                header("Location: daftar_mahasiswa.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Gagal menghapus data</div>";
            }
        }

        // Ambil data pelanggan
        $sql = "SELECT * FROM daftar_mahasiswa";
        $result = $con->query($sql);
        ?>

        <h2>Data Mahasiswa</h2>
        <div class="text-right" style="margin-bottom: 20px;">
            <a href="insertdaftar_mahasiswa.php" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <?php if ($result->num_rows > 0) { ?>
            <table class="table table-bordered table-hover">
                <tr>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th style="text-align:center;" colspan="2">Aksi</th>
                </tr>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['nim']; ?></td>
                        <td><?= $row['nama_mahasiswa']; ?></td>
                        <td><?= $row['prodi']; ?></td>
                        <td class="text-center">
                            <a href="editdaftar_mahasiswa.php?id=<?= $row['nim']; ?>" class="btn btn-primary btn-sm">Ubah</a>
                        </td>
                        <td class="text-center">
                            <form method="post" action="" onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display:inline;">
                                <input type="hidden" name="nim" value="<?= $row['nim']; ?>">
                                <input type="submit" name="delete" value="Hapus" class="btn btn-danger btn-sm">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <div class="alert alert-warning text-center">Tidak ada data pelanggan.</div>
        <?php } ?>
    </div>
</div>
