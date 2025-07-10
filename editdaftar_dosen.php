<?php
require_once 'connect.php';
require_once 'header.php';

// Cek apakah ID dosen tersedia di URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID dosen tidak ditemukan'); window.location='daftar_dosen.php';</script>";
    exit;
}

$id = $_GET['id'];

// Jika tombol update ditekan
if (isset($_POST['update'])) {
    $nama_dosen = mysqli_real_escape_string($con, $_POST['nama_dosen']);
    $fakultas   = mysqli_real_escape_string($con, $_POST['fakultas']);
    $prodi      = mysqli_real_escape_string($con, $_POST['prodi']);

    // Validasi
    if (empty($nama_dosen) || empty($fakultas) || empty($prodi)) {
        echo "<div class='alert alert-warning'>Semua field harus diisi.</div>";
    } else {
        $sql = "UPDATE daftar_dosen SET 
                    nama_dosen = '$nama_dosen',
                    fakultas = '$fakultas',
                    prodi = '$prodi'
                WHERE id_dosen = '$id'";

        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Data dosen berhasil diperbarui'); window.location='daftar_dosen.php';</script>";
            exit;
        } else {
            echo "<div class='alert alert-danger'>Gagal update data: " . mysqli_error($con) . "</div>";
        }
    }
}

// Ambil data lama
$result = mysqli_query($con, "SELECT * FROM daftar_dosen WHERE id_dosen='$id'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<div class='alert alert-danger'>Data dosen tidak ditemukan.</div>";
    exit;
}
?>

<div class="container">
    <h3>Edit Data Dosen</h3>
    <form method="post" action="edit_daftar_dosen.php?id=<?= htmlspecialchars($id); ?>">
        <div class="form-group">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" value="<?= htmlspecialchars($data['nama_dosen']); ?>" required>
        </div>
        <div class="form-group">
            <label>Fakultas</label>
            <input type="text" name="fakultas" class="form-control" value="<?= htmlspecialchars($data['fakultas']); ?>" required>
        </div>
        <div class="form-group">
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($data['prodi']); ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
        <a href="daftar_dosen.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
