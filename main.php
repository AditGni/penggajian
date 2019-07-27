<?php
if(!empty($_GET['pg'])){
	$pg = $_GET['pg'];
	if($pg=='home'){
		$call = "halaman/home.php";
	} else if($pg=='daftar-pegawai'){
		$call = "halaman/pegawai/pegawai.php";
	} else if($pg=='proses'){
		$call = "halaman/proses.php";
	} else if($pg=='golongan'){
		$call = "halaman/golongan/golongan.php";
	} else if($pg=='absen'){
		$call = "halaman/absen/absenpeg2.php";
	} else if($pg=='login'){
		$call = "halaman/login/login.php";
	} else if($pg=='absen-admin'){
		$call = "halaman/absen/absenadm2.php";
	} else if($pg=='absenedit'){
		$call = "halaman/absen/absenedit.php";
	} else if($pg=='daftar-gaji'){
		$call = "halaman/penggajian/gaji.php";
	} else if($pg=='tambah-gaji'){
		$call = "halaman/penggajian/tambahgaji.php";
	} else if($pg=='laporan'){
		$call = "halaman/laporan/laporan.php";
	} else if($pg=='slip-gaji'){
		$call = "halaman/penggajian/slip.php";
	}
} else {
	$call = "halaman/login/login.php";
}