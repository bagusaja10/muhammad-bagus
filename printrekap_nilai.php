<?php
include "connect.php";

$nilai_awal  = @$_GET['nilai_awal'];
$nilai_akhir = @$_GET['nilai_akhir'];

if (empty($nilai_awal) || empty($nilai_akhir)) {
    $query = "SELECT * FROM daftar_nilai";
    $label = "Semua Data Rekap Nilai Mahasiswa";
} else {
    $query = "SELECT * FROM daftar_nilai 
              WHERE nilai_akhir BETWEEN $nilai_awal AND $nilai_akhir";
    $label = 'Filter Nilai Akhir: ' . $nilai_awal . ' s/d ' . $nilai_akhir;
}

$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Cetak PDF Rekap Nilai</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <style>
    body {
      font-family: 'Georgia', serif;
      color: #333;
    }

    .table {
      border-collapse: collapse;
      width: 100%;
      font-size: 13px;
    }

    .table th {
      background-color: #a67c52;
      color: white;
      padding: 8px;
      text-align: center;
    }

    .table td {
      padding: 7px;
      border: 1px solid #ccc;
    }

    h2 {
      color: #5a3e1b;
    }
  </style>
</head>
<body>

<div id="print-area">
  <!-- Header -->
  <div style="text-align: center; margin-bottom: 10px;">
    <h1>LAPORAN REKAP NILAI MAHASISWA</h1>
    <p style="margin: 0; font-size: 14px;">Universitas ABC</p>
    <p style="margin: 0; font-size: 13px;"><?= $label ?></p>
  </div>

  <hr style="border-top: 2px solid #a67c52; margin-bottom: 25px;">

  <!-- Tabel Data -->
  <table class="table">
    <thead>
      <tr>
        <th>ID Nilai</th>
        <th>NIM</th>
        <th>ID Mata Kuliah</th>
        <th>ID Dosen</th>
        <th>Tugas</th>
        <th>UTS</th>
        <th>UAS</th>
        <th>Nilai Akhir</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($data = mysqli_fetch_array($result)): ?>
        <tr>
          <td><?= $data['id_nilai'] ?></td>
          <td><?= $data['nim'] ?></td>
          <td><?= $data['id_matkul'] ?></td>
          <td><?= $data['id_dosen'] ?></td>
          <td><?= $data['tugas'] ?></td>
          <td><?= $data['uts'] ?></td>
          <td><?= $data['uas'] ?></td>
          <td><?= number_format($data['nilai_akhir'], 2) ?></td>
        </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="8" style="text-align: center;">Data tidak tersedia</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Footer -->
  <br><br>
  <div style="width: 100%; display: flex; justify-content: space-between; font-size: 14px;">
    <div>
        Dicetak pada: <?= date('d-m-Y') ?>
    </div>
    <div style="text-align: center;">
        Hormat Kami,<br><br><br>
        <strong>(Dekan Fakultas)</strong>
    </div>
  </div>
</div>

<br>
<button onclick="printPDF()">CETAK PDF</button>

<script>
  function printPDF() {
    const element = document.getElementById('print-area');

    const opt = {
      margin:       [15, 15, 15, 15],
      filename:     'Rekap_Nilai_Mahasiswa.pdf',
      image:        { type: 'jpeg', quality: 0.98 },
      html2canvas:  { scale: 2 },
      jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' }
    };

    html2pdf().set(opt).from(element).save();
  }
</script>

</body>
</html>
