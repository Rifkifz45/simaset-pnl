<html>
<head>
<title>:: Cetak Penempatan - Inventory Kantor ( Aset Barang )</title>
<link rel="stylesheet" href="<?= base_url('') ?>/style/style_cetak.css" />
</head>
<body>
<br>
<h2> PENEMPATAN BARANG </h2>
<table width="800" border="0" cellspacing="1" cellpadding="4" class="table-print">
  <tr>
    <td width="181"><b>No. Penempatan </b></td>
    <td width="10"><b>:</b></td>
    <td width="581" valign="top"><strong><?php echo $penempatan['idtransaksi_penempatan']; ?></strong></td>
  </tr>
  <tr>
    <td><b>Tgl. Penempatan </b></td>
    <td><b>:</b></td>
    <td valign="top"><?php echo $penempatan['tgl_penempatan']; ?></td>
  </tr>
  <tr>
    <td><b>Lokasi </b></td>
    <td><b>:</b></td>
    <td valign="top"><?php echo $penempatan['id_lokasi']; ?></td>
  </tr>
  <tr>
    <td><strong>Keterangan</strong></td>
    <td><b>:</b></td>
    <td valign="top"><?php echo $penempatan['keterangan']; ?></td>
  </tr>
  <tr>
    <td><strong>Petugas</strong></td>
    <td><b>:</b></td>
    <td valign="top"><?php echo $penempatan['created_by']; ?></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
</table>
<table class="table-list" width="800" border="0" cellspacing="1" cellpadding="2">
  <tr>
    <td colspan="5"><strong>DAFTAR BARANG</strong></td>
  </tr>
  
  <tr>
    <td width="29" align="center" bgcolor="#F5F5F5"><b>No</b></td>
    <td width="95" bgcolor="#F5F5F5"><strong>Kode </strong></td>
    <td width="348" bgcolor="#F5F5F5"><b>Nama Barang</b></td>
    <td width="196" bgcolor="#F5F5F5"><strong>Kategori</strong></td>
    <td width="106" bgcolor="#F5F5F5"><strong>Status </strong></td>
  </tr>
  
  <?php foreach ($detail as $key => $value): ?>
  <tr>
    <td align="center"><?php echo $key + 1; ?></td>
    <td><?php echo $value->inventaris_peralatan_id; ?></td>
    <td><?php echo $value->nama_barang; ?></td>
    <td><?php echo $value->nup; ?></td>
    <td><?php echo $value->status_penempatan_item; ?></td>
  </tr>
  <?php endforeach ?>
  
</table>
<p>&nbsp;</p>
<p><strong>KETERANGAN</strong></p>
<p>Pada <strong>Status</strong>, jika<strong> Yes (Aktif)</strong> berarti posisi barang masih ditempatkan pada Lokasi tersebut. Sedangkan jika <strong>No (Tidak Aktif)</strong>, maka poisisi barang sudah dipindahkan (mutasi). <br/>
  <img src="" height="20" onClick="javascript:window.print()" />
</p>
</body>
</html>
