<?php
require_once 'connect.php';
require_once 'header.php';
?>

<div class="container">
    <?php
    $nim = $_GET['nim'];
    $sql = "SELECT * FROM daftar_mahasiswa WHERE nim = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $nim);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows < 1) {
        header("Location: daftar_mahasiswa.php");
        exit();
    }
    $data = $result->fetch_assoc();

    if (isset($_POST['update'])) {
        $nim_baru = $_POST['nim'];
        $nama_mahasiswa = $_POST['nama_mahasiswa'];
        $prodi = $_POST['prodi'];

        if (empty($nim_baru) || empty($nama_mahasiswa) || empty($prodi)) {
            echo "<div class='alert alert-warning'>Semua field harus diisi.</div>";
        } else {
            $sql = "UPDATE daftar_mahasiswa SET nim=?, nama_mahasiswa=?, prodi=? WHERE nim=?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("ssss", $nim_baru, $nama_mahasiswa, $prodi, $nim);
            if ($stmt->execute()) {
                header("Location: daftar_mahasiswa.php");
                exit();
            } else {
                echo "<div class='alert alert-danger'>Gagal mengupdate data.</div>";
            }
        }
    }
    ?>

    <div class="box">
        <h3><i class="glyphicon glyphicon-edit"></i> Edit Data Mahasiswa</h3>
        <form method="POST">
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($data['nim']); ?>"><br>
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" class="form-control" value="<?= htmlspecialchars($data['nama_mahasiswa']); ?>"><br>
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($data['prodi']); ?>"><br>
            <input type="submit" name="update" value="Simpan" class="btn btn-success">
            <a href="daftar_mahasiswa.php" class="btn btn-info">Batal</a>
        </form>
    </div>
</div>
