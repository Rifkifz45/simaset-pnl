<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Report Bangunan Gedung</title>
    <style>
      h1 {
      font-weight: bold;
      font-size: 16pt;
      text-align: center;
      }
      table {
      border-collapse: collapse;
      width: 100%;
      }
      .table th {
      padding: 8px 8px;
      border:1px solid #000000;
      text-align: center;
      }
      .table td {
      padding: 3px 3px;
      border:1px solid #000000;
      }
      .text-center {
      text-align: center;
      }
    </style>
    <link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
  </head>
  <body class="A4">
    <section class="sheet padding-10mm">
      <table>
        <tr>
          <td><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Logo_Politeknik_Negeri_Lhokseumawe.png/618px-Logo_Politeknik_Negeri_Lhokseumawe.png" width="90" height="90"></td>
          <td>
            <center>
              <font size="4">KEMENTRIAN PENDIDIKAN, KEBUDAYAAN,RISET, DAN TEKNOLOGI</font><br>
              <font size="5"><b>POLITEKNIK NEGERI LHOKSEUMAWE</b></font><br>
              <font size="2">Jalan Banda Aceh – Medan Km 280.3 Buketrata, Lhokseumawe, 24301 P.O BOX 90</font><br>
              <font size="2"><i>Telepon (0645) 42670 Fax : 42785. Laman: www.pnl.ac.id</i></font>
            </center>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <hr>
          </td>
        </tr>
      </table>
      <h1>KIB Bangunan Gedung</h1>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th> # </th>
            <th>Kode Barang</th>
            <th>NUP</th>
            <th class="text-center"> Nama / Jenis Barang </th>
            <th> Luas Bangunan </th>
            <th> Lt </th>
            <th class="text-center"> Tgl Perolehan </th>
            <th>Penggunaan</th>
            <th>Asal Usul</th>
            <th>Nilai Aset</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($bangunangedung as $key => $value): ?>
          <tr>
            <td class="text-center"><?= $key + 1 ?></td>
            <td><?= $value['kode_barang'] ?></td>
            <td class="text-center"><?= $value['nup'] ?></td>
            <td><?= $value['nama_barang'] . "<br><i>" . $value['merk'] . "</i>"  ?></td>
            <td><?= number_format($value['luas_bangunan']) ?> M<sup>2</sup></td>
            <td class="text-center"><?= $value['jumlah_lantai'] ?></td>
            <td><?= date("d-m-Y", strtotime($value['tgl_perolehan'])) ?></td>
            <td><?= $value['status_penggunaan'] ?></td>
            <td><?= $value['id_perolehan'] ?></td>
            <td><?= "Rp. " . number_format($value['nilai_perolehan_pertama']) ?></td>
          </tr>
          <?php endforeach ?>
          <?php if (count($bangunangedung) == NULL): ?>
            <tr>
              <td colspan="9" align="center">Data Tidak Tersedia</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
      <br><br><br><br>
    </section>
  </body>
</html>