<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>REPORT DAFTAR BARANG RUANGAN</title>
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
      <h1>DAFTAR BARANG RUANGAN</h1>
      <table>
        <tr class="text2">
          <td>Kode Ruangan</td>
          <td>: <?= $ruangan['id_lokasi'] ?></td>
        </tr>
        <tr>
          <td>Lokasi</td>
          <td>: <?= $ruangan['nama_gedung'] . " Lantai " . $ruangan['lantai']  ?></td>
        </tr>
        <tr>
          <td>Nama Ruangan</td>
          <td>: <?= $ruangan['nama_lokasi'] ?></td>
        </tr>
      </table>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th> # </th>
            <th> Uraian Akun </th>
            <th> Kode Barang </th>
            <th> NUP </th>
            <th> Nama Barang </th>
            <th> Tanggal Perolehan </th>
            <th> Merk / Type </th>
            <th> Qty </th>
            <th> Pengguna </th>
          </tr>
          <tr>
            <td class="text-center"> 1 </td>
            <td class="text-center"> 2 </td>
            <td class="text-center"> 3 </td>
            <td class="text-center"> 4 </td>
            <td class="text-center"> 5 </td>
            <td class="text-center"> 6 </td>
            <td class="text-center"> 7 </td>
            <td class="text-center"> 8 </td>
            <td class="text-center"> 9 </td>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($item as $key => $value): ?>
          <tr>
            <td class="center"><?= $key+1 ?></td>
            <td class="center">
              <?php
              if (substr($value->kode_barang, 0, 1) == "2") {
                echo "Tanah";
              }else if (substr($value->kode_barang, 0, 1) == "3") {
                echo "Peralatan dan Mesin";
              }else{
                echo "None";
              }
              ?>
            </td>
             <td><?= $value->kode_barang ?></td>
             <td><?= $value->nup ?></td>
             <td><?= $value->nama_barang ?></td>
             <td><?= date('d-m-Y', strtotime($value->tgl_perolehan)) ?></td>
             <td><?= $value->merk ?></td>
             <td><?= $value->kuantitas ?></td>
             <td><?= $value->nama_pengguna ?></td>
          </tr>
          <?php endforeach ?>
          <?php if ($item == NULL): ?>
            <tr>
              <td colspan="11" align="center">Data Tidak Tersedia</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
      <br><br><br><br>
      <table>
      <tr>
        <td style="width:50%" align="center">Penanggung Jawab<br><br><br><br><?= $ruangan['nama_pengguna'] != NULL ? $ruangan['nama_pengguna'] : "<i>NULL</i>"?></td>
        <td style="width:50%" align="center">WADIR II<br><br><br><br><i>NULL</i></td>
      </tr>
       </table>
    </section>
  </body>
</html>