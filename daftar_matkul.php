<?php 
require_once 'connect.php';
require_once 'header.php';
?>

<style>
    body {
        background-color: #f8f4f0;
        font-family: 'Segoe UI', sans-serif;
    }

    .container {
        background-color: #fffaf5;
        padding: 30px;
        border-radius: 10px;
        border: 1px solid #d1bfa3;
        box-shadow: 0 0 10px rgba(139, 69, 19, 0.1);
        margin-top: 30px;
    }

    h2 {
        color: #5a3e1b;
        font-weight: bold;
        border-bottom: 2px solid #c9a97e;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }

    .table th {
        background-color: #a67c52;
        color: white;
        text-align: center;
    }

    .table td {
        background-color: #fffdf9;
    }

    .btn-info {
        background-color: #b27d42;
        border-color: #b27d42;
    }

    .btn-info:hover {
        background-color: #8c6239;
        border-color: #8c6239;
    }

    .btn-primary {
        background-color: #6b4c27;
        border-color: #6b4c27;
    }

    .btn-primary:hover {
        background-color: #563a1f;
        border-color: #563a1f;
    }

    .btn-success {
        background-color: #8c7b6a;
        border-color: #8c7b6a;
    }

    .btn-default {
        background-color: #ddd0c4;
        color: #000;
    }

    .form-inline .form-group {
        margin-right: 15px;
    }
</style>

<div class="container">
<?php
// Proses hapus
if (isset($_POST['delete'])) {
    $id = $_POST['id']; 
    $sql = "DELETE FROM daftar_matkul WHERE id_matkul = '$id'";
    if ($con->query($sql) === TRUE) {
        header("Location: daftar_matkul.php");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Gagal menghapus data</div>";
    }
}

$search_nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$sql = "SELECT * FROM daftar_matkul WHERE 1=1";
if (!empty($search_nama)) {
    $sql .= " AND nama_mahasiswa LIKE '%$search_nama%'";
}
$result = $con->query($sql);
?>

<h2>Data mahasiswa</h2>

<!-- Filter Form -->
<form method="GET" class="form-inline">
    <div class="form-group">
        <label for="nama">Nama Mahasiswa:</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo htmlspecialchars($search_nama); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
    <a href="daftar_matkul.php" class="btn btn-default">Reset</a>
</form>

<br>
<a href="insertdaftar_matkul.php" class="btn btn-info">Tambah Data</a>
<a href="laporandaftar_matkul.php" class="btn btn-success" target="_blank">Cetak PDF</a>
<br><br>

<?php if ($result->num_rows > 0) { ?>
<table class="table table-bordered table-striped">
    <tr>
        <th>ID Matkul</th>
        <th>Nama Matkul</th>
        <th>SKS</th>
        <th colspan="2">Aksi</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id_matkul']; ?></td>
            <td><?php echo $row['nama_mahasiswa']; ?></td>
            <td><?php echo $row['sks']; ?></td>
            <td>
                <a href="editdaftar_matkul.php?id=<?php echo $row['id_matkul']; ?>" class="btn btn-info btn-sm">Ubah</a>
                <form method="post" action="" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                    <input type="hidden" name="id" value="<?php echo $row['id_matkul']; ?>">
                    <input type="submit" name="delete" value="Hapus" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<?php
} else {
    echo "<br><div class='alert alert-warning'>Tidak ada data rekap ditemukan.</div>";
}
?>
</div>
