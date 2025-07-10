<?php
require_once 'connect.php';
require_once 'header.php';

// Jika form disubmit
if (isset($_POST['simpan'])) {
    $id_dosen   = mysqli_real_escape_string($con, $_POST['id_dosen']);
    $nama_dosen = mysqli_real_escape_string($con, $_POST['nama_dosen']);
    $fakultas   = mysqli_real_escape_string($con, $_POST['fakultas']);
    $prodi      = mysqli_real_escape_string($con, $_POST['prodi']);

    // Validasi input
    if (empty($id_dosen) || empty($nama_dosen) || empty($fakultas) || empty($prodi)) {
        echo "<div class='alert alert-warning'>Semua field wajib diisi.</div>";
    } else {
        // Cek apakah ID dosen sudah ada
        $cek = mysqli_query($con, "SELECT * FROM daftar_dosen WHERE id_dosen = '$id_dosen'");
        if (mysqli_num_rows($cek) > 0) {
            echo "<div class='alert alert-danger'>ID dosen sudah terdaftar!</div>";
        } else {
            // Insert ke database
            $insert = "INSERT INTO daftar_dosen (id_dosen, nama_dosen, fakultas, prodi) 
                       VALUES ('$id_dosen', '$nama_dosen', '$fakultas', '$prodi')";
            if (mysqli_query($con, $insert)) {
                echo "<script>alert('Data dosen berhasil disimpan'); window.location='daftar_dosen.php';</script>";
                exit;
            } else {
                echo "<div class='alert alert-danger'>Gagal menyimpan data: " . mysqli_error($con) . "</div>";
            }
        }
    }
}
?>

<div class="container">
    <h3>Tambah Data Dosen</h3>
    <form method="post" action="insertdaftar_dosen.php">
        <div class="form-group">
            <label>ID Dosen</label>
            <input type="text" name="id_dosen" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Dosen</label>
            <input type="text" name="nama_dosen" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Fakultas</label>
            <input type="text" name="fakultas" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" required>
        </div>
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <a href="daftar_dosen.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
