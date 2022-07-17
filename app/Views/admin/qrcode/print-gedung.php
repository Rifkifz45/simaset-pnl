<?php
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
?>

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
	<h1>QR CODE</h1>
	<table class="table-list" border="1" cellspacing="0" cellpadding="4">
		<tr>
	<?php
# JIKA MENEMUKAN CBKODE, salah satu Cekbox dipilih dan klik tombol Cetak Barcode
if(isset($_POST['cbKode'])) {
	$cbKode = $_POST['cbKode'];
	$jum  = count($cbKode);
	if($jum==0) {
		echo "BELUM ADA KODE BARANG YANG DIPILIH";
		echo "<meta http-equiv='refresh' content='1; url=index.php?open=Cetak-Barcode'>";
	}
	else {
		$no = 0; $lebar = 2;
		foreach ($_POST['cbKode'] as $key => $value) {
			$db = \Config\Database::connect();
			$query = $db->table('inventaris_gedung')->where(['idinventaris_gedung' => $value])->get()->getResultArray();

			foreach ($query as $key => $value2) {
				$result = Builder::create()
			    ->writer(new PngWriter())
			    ->writerOptions([])
			    ->data($value2['kode_barang'])
			    ->encoding(new Encoding('UTF-8'))
			    ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
			    ->size(300)
			    ->margin(10)
			    ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
			    ->labelText('')
			    ->labelFont(new NotoSans(10))
			    ->labelAlignment(new LabelAlignmentCenter())
			    ->build();

				header("Content-Type: " . $result->getMimeType());
				$no++;
				echo "<tr><td colspan=\"2\"><b>Politeknik Negeri Lhokseumawe</b></td><td style=\"border-color:black;border-style:solid;border-width:1px;\" align=\"center\" rowspan=\"5\"><img width='60' src='{$result->getDataUri()}'/></td></tr>";
				echo "<tr><td rowspan=\"4\" style=\"border-color:black;border-style:solid;border-width:1px;\" align=\"center\"><img width=\"60\" src='".base_url('uploads/gedung/defaultpnl.png')."'/></td><td align=\"center\">".$value2['nama_barang']."</td></tr>";
				echo "<tr><td align=\"center\">".$value2['merk']."</td></tr>";
				echo "<tr><td align=\"center\">".date("d/m/Y", strtotime($value2['tgl_perolehan']))."</td></tr><tr><td align=\"center\">".number_format($value2['nup'])."</td></tr>";
				echo "<tr><td style=\"border-top: 0px solid white; border-right: 1px solid black; border-bottom: 0px solid white; border-left: 1px solid black;\"></td></tr>";
				if ($no == $lebar) { echo "</tr>"; $lebar = $lebar + 1; }
			}
		}
	}
}
else {
	echo "BELUM ADA KODE BARANG YANG DIPILIH";
	echo "<meta http-equiv='refresh' content='1; url=index.php?open=Cetak-Barcode'>";
}?>
</body>
</html>