<html>
<head>
<title>:: Cetak Group Barang - SIMASET PNL </title>
<link rel="stylesheet" href="<?= base_url('') ?>/style/style_cetak.css" />
<link rel="stylesheet" href="<?= base_url('') ?>/template/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
</head>
<body>
<br>
<h2> KEMENTRIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI<br>POLITEKNIK NEGERI LHOKSEUMAWE </h2>
<table class="table-list">
  <tr>
    <td>Kode Lokasi</td>
    <td>:</td>
    <td><?= $lokasi['id_lokasi'] ?></td>
  </tr>
  <tr>
    <td>Nama Lokasi</td>
    <td>:</td>
    <td><?= $lokasi['nama_lokasi'] ?></td>
  </tr>
  <tr>
    <td>Luas Lokasi</td>
    <td>:</td>
    <td><?= $lokasi['luas_lokasi'] ?> M<sup>2</sup></td>
  </tr>
</table>
<br>
<table class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="7" style="text-align: center"><strong><h3>REKAP DAFTAR BARANG RUANGAN</h3></strong></td>
  </tr>
  
  <tr>
    <td width="29" align="center" bgcolor="#F5F5F5"><b>No</b></td>
    <td width="95" bgcolor="#F5F5F5"><strong>Kode Barang </strong></td>
    <td width="186" bgcolor="#F5F5F5"><strong>Nama Barang </strong></td>
    <td width="50" bgcolor="#F5F5F5"><strong>Qty </strong></td>
    <td width="100" bgcolor="#F5F5F5"><b>Satuan</b></td>
  </tr>
  
  <?php foreach ($group as $key => $value): ?>
  <tr>
    <td align="center"><?= $key + 1 ?></td>
    <td><?= $value->kode_barang ?></td>
    <td>
      <?php
        $db = \Config\Database::connect();
        $nama_barang = $db->table('inventaris_peralatan')->where(['kode_barang' => $value->kode_barang])->get()->getRow();
        echo $nama_barang->nama_barang;
      ?>
    </td>
    <td><?= $value->total_barang ?></td>
    <td>Buah</td>
   
  </tr>
  <?php endforeach ?>
  
</table>
</body>
</html>