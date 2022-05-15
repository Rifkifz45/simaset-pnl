<?php
if(isset($_POST['btnTambah']) or isset($_POST['txtKodeInventaris'])){
		# Baca variabel
	$txtKodeInventaris	= $_POST['txtKodeInventaris'];
	$txtKodeInventaris	= str_replace("'","&acute;",$txtKodeInventaris);
	
	// Validasi form
	$pesanError = array();
	if (trim($txtKodeInventaris) !="") {
		// Jika Kode Inv Barang tidak kosong, maka periksa keberadaan kode dalam database (tabel barang_inventaris)
		# Periksa Database 1, apakah Kode Inventaris yang dimasukkan ada di dalam Database
		$cekSql	= "SELECT * FROM `tabel-master-plm` WHERE idmasterplm='$txtKodeInventaris'";
		$cekQry = $db->query($cekSql);
		if($cekQry->getNumRows() < 1) {
			$pesanError[] = "Kode Barang <b>$txtKodeInventaris</b> tidak ditemukan dalam database!";
		}
		else {
			// Jika kode barang ditemukan di tabel barang_inventaris, maka periksa status-nya 
			$cekData = $cekQry->getResultArray();
			
			if($cekData[0]['status']=="Terdistribusi") {
				$pesanError[] = "Kode Barang <b>$txtKodeInventaris</b> tidak dapat dipakai, karna <b> sudah Ditempatkan/ dipakai</b>!";
			}
		}
	
		# Periksa Database 2, apakah Kode Inventaris sudah diinput atau belum
		$cek2Sql	= "SELECT * FROM `tmp-penempatan` WHERE kode_inventaris='$txtKodeInventaris'";
		$cek2Qry = $db->query($cek2Sql);
		if($cek2Qry->getNumRows() >= 1) {
			$pesanError[] = "Kode Barang <b>$txtKodeInventaris</b> sudah di-Input, ganti dengan yang lain !";
		}
	}
			
	# JIKA ADA PESAN ERROR DARI VALIDASI
	if (count($pesanError)>=1 ){
		echo "<div class='mssgBox'>";
		echo "<img src='../images/attention.png'> <br><hr>";
			$noPesan=0;
			foreach ($pesanError as $indeks=>$pesan_tampil) { 
			$noPesan++;
				echo "&nbsp;&nbsp; $noPesan. $pesan_tampil<br>";	
			} 
		echo "</div> <br>"; 
	}
	else {
		# JIKA TIDAK MENEMUKAN ERROR
		$bacaQry = $db->query("SELECT * FROM `tabel-master-plm` WHERE idmasterplm='$txtKodeInventaris'");
		if($bacaQry->getNumRows() >= 1) {
			$bacaData = $bacaQry->getResultArray();
			
			$kodeInventaris	= $bacaData[0]['idmasterplm'];
				
			// Menyimpan data ke Keranjang (TMP)
			$data = [
				'kode_inventaris'	=> $kodeInventaris,
				'tmp_id'			=> $_POST['kode_penempatan']
			];
	
			$db->table('tmp-penempatan')->insert($data);
		}
	}
	}

?>