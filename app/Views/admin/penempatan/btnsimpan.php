<?php

if(isset($_POST['btnSimpan'])){
	// Baca variabel from
	$txtTanggal 	= $_POST['placement_date'];
	$cmbLokasi		= $_POST['placement_location'];
	$txtKeterangan	= $_POST['keterangan'];

	// Validasi form
	$pesanError = array();
	if (trim($txtTanggal)=="") {
		$pesanError[] = "Data <b>Tanggal Transaksi</b> belum diisi, pilih pada combo !";		
	}
	if (trim($cmbLokasi)=="Kosong") {
		$pesanError[] = "Data <b>Lokasi / Ruang</b> belum diisi, pilih pada combo !";		
	}
	
	# Periksa apakah sudah ada barang yang dimasukkan
	$tmpSql = $db->query("SELECT COUNT(*) FROM `tmp-penempatan` WHERE tmp_id='$txtTanggal'");
	if ($tmpSql->getNumRows() < 1) {
		$pesanError[] = "<b>BELUM MENG-INPUT DATA BARANG</b>, minimal 1 Barang.";
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
		# SIMPAN DATA KE DATABASE
		# Jika jumlah error pesanError tidak ada
		$kodeBaru = $_POST['kode_penempatan'];
		$data = [
			'placement_id'			=> $kodeBaru,
			'placement_date'		=> $txtTanggal,
			'placement_location'	=> $cmbLokasi,
			'keterangan'			=> $txtKeterangan
		];		
		$myQry = $db->table('table-placement')->insert($data);
		if($myQry){
			# …LANJUTAN, SIMPAN DATA
			# Ambil semua data barang yang dipilih, berdasarkan Petugas yg login
			$tmpSql ="SELECT * FROM `tmp-penempatan` WHERE tmp_id='$kodeBaru'";
			$tmpQry = $db->query($tmpSql)->getResult();

			foreach ($tmpQry as $key => $value) {
			// Baca data dari tabel Inventaris Barang
			$dataKode 	= $value->kode_inventaris;
			
			// MEMINDAH DATA, Masukkan semua dari TMP_Mutasi ke dalam tabel Penempatan_Item
			$data = [
				'placement_id'		=> $kodeBaru,
				'kode_inventaris'	=> $dataKode,
				'pengguna_aset'		=>	"MAUNG"
			];
			$myQry = $db->table('table-placement-detail')->insert($data);
			
			// Skrip Update status barang (used=keluar/dipakai)
			$data = [
				'status'	=> "Terdistribusi"
			];
			$myQry = $db->table('tabel-master-plm')->where('idmasterplm', $dataKode)->update($data);
			}
			
			# Kosongkan Tmp jika datanya sudah dipindah
			$db->table('tmp-penempatan')->where('tmp_id', $kodeBaru)->delete();
			
			// Refresh form
			echo "<script>alert(Berhasil Simpan)</script>";
		}
	}	
}

?>