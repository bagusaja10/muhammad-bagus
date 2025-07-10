<?php
require_once 'connect.php';
require_once 'header.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID nilai tidak ditemukan'); window.location='daftar_nilai.php';</script>";
    exit;
}

$id = $_GET['id'];

if (isset($_POST['update'])) {
    $nim       = mysqli_real_escape_string($con, $_POST['nim']);
    $id_matkul = mysqli_real_escape_string($con, $_POST['id_matkul']);
    $id_dosen  = mysqli_real_escape_string($con, $_POST['id_dosen']);
    $tugas     = floatval($_POST['tugas']);
    $uts       = floatval($_POST['uts']);
    $uas       = floatval($_POST['uas']);

    // Hitung nilai akhir (misalnya: 20% tugas, 30% UTS, 50% UAS)
    $nilai_akhir = round(($tugas * 0.2) + ($uts * 0.3) + ($uas * 0.5), 2);

    $update = "UPDATE daftar_nilai SET 
        nim = '$nim',
        id_matkul = '$id_matkul',
        id_dosen = '$id_dosen',
        tugas = '$tugas',
        uts = '$uts',
        uas = '$uas',
        nilai_akhir = '$nilai_akhir'
        WHERE id_nilai = '$id'";

    if (mysqli_query($con, $update)) {
        echo "<script>alert('Data nilai berhasil diperbarui'); window.location='daftar_nilai.php';</script>";
        exit;
    } else {
        echo "<div class='alert alert-danger'>Gagal update data: " . mysqli_error($con) . "</div>";
    }
}

// Ambil data lama
$result = mysqli_query($con, "SELECT * FROM daftar_nilai WHERE id_nilai='$id'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "<div class='alert alert-danger'>Data tidak ditemukan</div>";
    exit;
}
?>

<div class="container">
    <h3>Edit Nilai Mahasiswa</h3>
    <form method="post" action="edit_daftar_nilai.php?id=<?= htmlspecialchars($id); ?>">
        <div class="form-group">
            <label>NIM Mahasiswa</label>
            <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($data['nim']); ?>" required>
        </div>
        <div class="form-group">
            <label>ID Mata Kuliah</label>
            <input type="text" name="id_matkul" class="form-control" value="<?= htmlspecialchars($data['id_matkul']); ?>" required>
        </div>
        <div class="form-group">
            <label>ID Dosen</label>
            <input type="text" name="id_dosen" class="form-control" value="<?= htmlspecialchars($data['id_dosen']); ?>" required>
        </div>
        <div class="form-group">
            <label>Nilai Tugas</label>
            <input type="number" name="tugas" class="form-control" value="<?= htmlspecialchars($data['tugas']); ?>" required>
        </div>
        <div class="form-group">
            <label>Nilai UTS</label>
            <input type="number" name="uts" class="form-control" value="<?= htmlspecialchars($data['uts']); ?>" required>
        </div>
        <div class="form-group">
            <label>Nilai UAS</label>
            <input type="number" name="uas" class="form-control" value="<?= htmlspecialchars($data['uas']); ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-success">Simpan Perubahan</button>
        <a href="daftar_nilai.php" class="btn btn-default">Kembali</a>
    </form>
</div>
