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
<table class="table-list" width="900" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="8" style="text-align: center"><strong><h3>REKAP DAFTAR BARANG RUANGAN</h3></strong></td>
  </tr>
  
  <tr>
    <td rowspan="2">&nbsp;No</td>
    <td rowspan="2">NUP&nbsp;&nbsp;</td>
    <td rowspan="2">Nama Barang&nbsp;&nbsp;</td>
    <td colspan="3" style="text-align: center; font-weight: bold">&nbsp;&nbsp;Identitas Barang&nbsp;</td>
    <td rowspan="2">Qty&nbsp;&nbsp;</td>
    <td rowspan="2">Keterangan&nbsp;&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;Merk / Type</td>
    <td>&nbsp;Kode Barang</td>
    <td>Th Perolehan&nbsp;</td>
  </tr>

  
  <?php foreach ($list as $key => $value): ?>
  <tr>
    <td><?= $key + 1 ?></td>
    <td><?= $value['nup'] ?></td>
    <td><?= $value['nama_barang'] ?></td>
    <td><?= $value['merk'] ?></td>
    <td><?= $value['kode_barang'] ?></td>
    <td><?= date("d-m-Y", strtotime($value['tgl_perolehan'])) ?></td>
    <td><?= $value['kuantitas'] ?></td>
    <td><?= $value['uraian_hak'] ?></td>
  </tr>
  <?php endforeach ?>
  
</table>
</body>
</html>