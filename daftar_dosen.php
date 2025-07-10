<?php
require_once 'connect.php';
require_once 'header.php';
?>

<style>
    body {
        background-color: #fdfaf6;
        font-family: 'Segoe UI', sans-serif;
    }
    .container {
        margin-top: 40px;
    }
    .panel-kamar {
        background-color: #fff;
        border-radius: 10px;
        padding: 25px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        font-weight: 600;
        color: #5a4d41;
        margin-bottom: 30px;
    }
    .btn-primary, .btn-info {
        background-color: #8b5e3c;
        border-color: #7a4f30;
    }
    .btn-primary:hover, .btn-info:hover {
        background-color: #7a4f30;
    }
    .btn-danger {
        background-color: #b23b3b;
    }
    .table th {
        background-color: #8b5e3c;
        color: #fff;
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
    <div class="panel-kamar">
        <h2>Data Daftar Dosen</h2>
        <div class="text-right" style="margin-bottom: 20px;">
            <a href="inserttb_kamar.php" class="btn btn-primary">+ Tambah dosen</a>
        </div>

        <?php
        // Proses Hapus
        if (isset($_POST['delete'])) {
            $id_dosen = $_POST['id_dosen'];
            $stmt = $con->prepare("DELETE FROM daftar_dosen WHERE id_dosen = ?");
            $stmt->bind_param("s", $id_dosen);
            if ($stmt->execute()) {
                echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
            } else {
                echo "<div class='alert alert-danger'>Gagal menghapus data: {$stmt->error}</div>";
            }
        }

        // Tampilkan Data
        $result = $con->query("SELECT * FROM tb_kamar");

        if ($result->num_rows > 0) {
        ?>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID Dosen</th>
                        <th>Nama Dosen</th>
                        <th>Fakultas</th>
                        <th>Prodi</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id_dosen']); ?></td>
                            <td>Rp<?= number_format($row['harga'], 0, ',', '.'); ?></td>
                            <td class="text-center">
                                <a href="editdaftar_dosen.php?id_dosen=<?= urlencode($row['id_dosen']); ?>" class="btn btn-info btn-sm">Edit</a>
                                <form method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kamar ini?');">
                                    <input type="hidden" name="id_dosen" value="<?= $row['id_dosen']; ?>">
                                    <button type="submit" name="delete" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php
        } else {
            echo "<div class='alert alert-warning'>Belum ada data kamar.</div>";
        }
        ?>
    </div>
</div>
