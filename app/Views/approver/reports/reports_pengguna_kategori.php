<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DAFTAR DATA PENGGUNA KATEGORI</title>
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
          <td><img src="<?= base_url('/uploads/gedung/defaultpnl.png') ?>" width="90" height="90"></td>
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
      <h1>LIST DATA PENGGUNA KATEGORI</h1>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th class="text-center"> # </th>
            <th> Nama Kategori </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($pengguna_kategori as $key => $value): ?>
          <tr>
            <td class="text-center"><?= $key+1 ?></td>
            <td><?= $value['nama_kategori_pengguna'] ?></td>
          </tr>
          <?php endforeach ?>
          <?php if ($pengguna_kategori == NULL): ?>
            <tr>
              <td colspan="11" align="center">Data Tidak Tersedia</td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
      <br><br><br><br>
      <table>
       </table>
    </section>
  </body>
</html>