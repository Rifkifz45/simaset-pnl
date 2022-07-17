<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
<!--
body,td,th {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size:11px;
}
body {
	margin-top: 1px;
}
-->
</style>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<table class="table-list" width="100" border="0" cellspacing="40" cellpadding="4">
  <tr>
<?php
# JIKA MENEMUKAN CBKODE, salah satu Cekbox dipilih dan klik tombol Cetak Barcode
	if(count($list) == 0) {
		echo "BELUM ADA KODE BARANG YANG DIPILIH";
		echo "<meta http-equiv='refresh' content='1; url=index.php?open=Cetak-Barcode'>";
	}
	else {
		$no = 0; $lebar = 3;
		foreach($list as $key => $value) {
			$db = \Config\Database::connect();
			$kd = $value['idinventaris_peralatan'];
			$query = $db->table('inventaris_peralatan')
					->where(['idinventaris_peralatan' => $kd])->get()->getResultArray();
			foreach ($query as $key => $value2){
				$no++;
			?>
				<td width="201" valign="top" align="center">
				<br>
				<?php $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
				echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value2['kode_barang'] . "." . $value2['nup'], $generator::TYPE_CODE_128)) . '">';
				echo "<br>".$value2['idinventaris_peralatan']."";
				?>
				</td>
			<?php
				// Membuat TR tabel
				if ($no == $lebar) { echo "</tr>"; $lebar = $lebar + 4; }
			
			} // end for
			
		 }  // End foreach
	}
?>
</table>
</body>
</html>