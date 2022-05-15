<?php
$CI_INSTANCE = [];  # It keeps a ref to global CI instance

function register_ci_instance(\App\Controllers\BaseController &$_ci)
{
    global $CI_INSTANCE;
    $CI_INSTANCE[0] = &$_ci;
}


function &get_instance(): \App\Controllers\BaseController
{
    global $CI_INSTANCE;
    return $CI_INSTANCE[0];
}

function getCount($id,$tabel)
	{	
		$ci = &get_instance();
		return $ci->db->table($tabel)->countAllResults();
	}

function getCountUang($id,$tabel){
		
	}

function buatKode($tabel, $inisial){
	$ci = &get_instance();
	$struktur	= $ci->db->query("SELECT * FROM `$tabel`");

	if ($struktur->getNumRows() == 0) {
		return $inisial. "000001";
	}

	foreach ($struktur->getFieldNames() as $field) {
		$field = $field;
		break;
	}

	# MEMBACA PANJANG KOLOM KUNCI (PRIMARY) - CARA 1
	//$panjang	= mysqli_field_len($struktur,0);
	
	# MEMBACA PANJANG KOLOM KUNCI (PRIMARY) - CARA 2 
	foreach ($struktur->getFieldData() as $hasil) {
		$hasil = $hasil;
		break;
	}
	$panjang = $hasil->max_length;

 	$qry	= $ci->db->query("SELECT MAX($field) FROM `$tabel`");
 	$row	= $qry->getResultArray();
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka	= substr(implode(" ",$row["0"]), strlen($inisial), 8);
 	}
 	$angka++;
 	$angka = strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
	}
 	return $inisial.$tmp.$angka;
}

function buatKode2($tabel, $inisial){
	$ci = &get_instance();
	$struktur	= $ci->db->query("SELECT * FROM `$tabel`");

	if ($struktur->getNumRows() == 0) {
		return $inisial. "1";
	}

	foreach ($struktur->getFieldNames() as $field) {
		$field = $field;
		break;
	}

	# MEMBACA PANJANG KOLOM KUNCI (PRIMARY) - CARA 1
	//$panjang	= mysqli_field_len($struktur,0);
	
	# MEMBACA PANJANG KOLOM KUNCI (PRIMARY) - CARA 2 
	foreach ($struktur->getFieldData() as $hasil) {
		$hasil = $hasil;
		break;
	}
	$panjang = $hasil->max_length;

 	$qry	= $ci->db->query("SELECT MAX($field) FROM `$tabel`");
 	$row	= $qry->getResultArray();
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka	= substr(implode(" ",$row["0"]), strlen($inisial), 8);
 	}
 	$angka++;
 	$angka = strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
	}
 	return $inisial.$tmp.$angka;
}

function buatKode3($tabel, $inisial){
	$ci = &get_instance();
	$struktur	= $ci->db->query("SELECT * FROM `$tabel`");

	if ($struktur->getNumRows() == 0) {
		return $inisial. "0001";
	}

	foreach ($struktur->getFieldNames() as $field) {
		$field = $field;
		break;
	}

	# MEMBACA PANJANG KOLOM KUNCI (PRIMARY) - CARA 1
	//$panjang	= mysqli_field_len($struktur,0);
	
	# MEMBACA PANJANG KOLOM KUNCI (PRIMARY) - CARA 2 
	foreach ($struktur->getFieldData() as $hasil) {
		$hasil = $hasil;
		break;
	}
	$panjang = $hasil->max_length;

 	$qry	= $ci->db->query("SELECT MAX($field) FROM `$tabel`");
 	$row	= $qry->getResultArray();
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka	= substr(implode(" ",$row["0"]), strlen($inisial), 8);
 	}
 	$angka++;
 	$angka = strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";
	}
 	return $inisial.$tmp.$angka;
}