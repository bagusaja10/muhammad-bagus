<?php
require_once 'connect.php';
require_once 'header.php';
?>

<div class="container">
    <?php
    if (isset($_POST['add'])) {
        $id_nilai  = $_POST['id_nilai'];
        $nim       = $_POST['nim'];
        $id_matkul = $_POST['id_matkul'];
        $id_dosen  = $_POST['id_dosen'];
        $tugas     = floatval($_POST['tugas']);
        $uts       = floatval($_POST['uts']);
        $uas       = floatval($_POST['uas']);

        // Hitung nilai akhir (misalnya bobot: tugas 20%, UTS 30%, UAS 50%)
        $nilai_akhir = round(($tugas * 0.2) + ($uts * 0.3) + ($uas * 0.5), 2);

        if (empty($id_nilai) || empty($nim) || empty($id_matkul) || empty($id_dosen)) {
            echo "<div class='alert alert-warning'>Semua field harus diisi.</div>";
        } else {
            // Cek apakah ID sudah ada
            $cek = $con->prepare("SELECT * FROM daftar_nilai WHERE id_nilai = ?");
            $cek->bind_param("s", $id_nilai);
            $cek->execute();
            $result = $cek->get_result();

            if ($result->num_rows > 0) {
                echo "<div class='alert alert-danger'>ID nilai sudah terdaftar.</div>";
            } else {
                $sql = "INSERT INTO daftar_nilai (id_nilai, nim, id_matkul, id_dosen, tugas, uts, uas, nilai_akhir)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssssdddd", $id_nilai, $nim, $id_matkul, $id_dosen, $tugas, $uts, $uas, $nilai_akhir);

                if ($stmt->execute()) {
                    header("Location: daftar_nilai.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>Gagal menambahkan data nilai.</div>";
                }
            }
        }
    }
    ?>

    <div class="box">
        <h3><i class="glyphicon glyphicon-plus"></i> Tambah Nilai Mahasiswa</h3>
        <form method="POST">
            <label>ID Nilai</label>
            <input type="text" name="id_nilai" class="form-control" required><br>
            <label>NIM</label>
            <input type="text" name="nim" class="form-control" required><br>
            <label>ID Mata Kuliah</label>
            <input type="text" name="id_matkul" class="form-control" required><br>
            <label>ID Dosen</label>
            <input type="text" name="id_dosen" class="form-control" required><br>
            <label>Nilai Tugas</label>
            <input type="number" step="0.01" name="tugas" class="form-control" required><br>
            <label>Nilai UTS</label>
            <input type="number" step="0.01" name="uts" class="form-control" required><br>
            <label>Nilai UAS</label>
            <input type="number" step="0.01" name="uas" class="form-control" required><br>
            <input type="submit" name="add" value="Tambah" class="btn btn-success">
            <a href="daftar_nilai.php" class="btn btn-info">Batal</a>
        </form>
    </div>
</div>
