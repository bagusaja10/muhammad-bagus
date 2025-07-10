<?php
require_once 'connect.php';
require_once 'header.php';
?>

<div class="container">
    <?php
    if (isset($_POST['add'])) {
        $nim             = $_POST['nim'];
        $nama_mahasiswa  = $_POST['nama_mahasiswa'];
        $prodi           = $_POST['prodi'];

        if (empty($nim) || empty($nama_mahasiswa) || empty($prodi)) {
            echo "<div class='alert alert-warning'>Semua field harus diisi.</div>";
        } else {
            // Cek apakah NIM sudah ada
            $cek = $con->prepare("SELECT * FROM daftar_mahasiswa WHERE nim = ?");
            $cek->bind_param("s", $nim);
            $cek->execute();
            $result = $cek->get_result();
            
            if ($result->num_rows > 0) {
                echo "<div class='alert alert-danger'>NIM sudah terdaftar.</div>";
            } else {
                $sql = "INSERT INTO daftar_mahasiswa (nim, nama_mahasiswa, prodi) VALUES (?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("sss", $nim, $nama_mahasiswa, $prodi);
                if ($stmt->execute()) {
                    header("Location: daftar_mahasiswa.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan data.</div>";
                }
            }
        }
    }
    ?>

    <div class="box">
        <h3><i class="glyphicon glyphicon-plus"></i> Tambah Mahasiswa</h3>
        <form method="POST">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" required><br>
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" class="form-control" required><br>
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" required><br>
            <input type="submit" name="add" value="Tambah" class="btn btn-success">
            <a href="daftar_mahasiswa.php" class="btn btn-info">Batal</a>
        </form>
    </div>
</div>
