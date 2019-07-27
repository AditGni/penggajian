<?php
function tanggal(){
	$tgl = date('w');
	if($tgl==0){
		$hari = 'Minggu';
	} else if($tgl==1){
		$hari = 'Senin';
	} else if($tgl==2){
		$hari = 'Selasa';
	} else if($tgl==3){
		$hari = 'Rabu';
	} else if($tgl==4){
		$hari = 'Kamis';
	} else if ($tgl==5){
		$hari = 'Jumat';
	} else if($tgl==6){
		$hari = 'Sabtu';
	}

	$mon = (int) date('m');
	if($mon==1){
		$bul = 'Januari';
	} else if($mon==2){
		$bul = 'Februari';
	} else if($mon==3){
		$bul = 'Maret';
	} else if($mon==4){
		$bul = 'April';
	} else if($mon==5){
		$bul = 'Mei';
	} else if($mon==6){
		$bul = 'Juni';
	} else if($mon==7){
		$bul = 'Juli';
	} else if($mon==8){
		$bul = 'Agustus';
	} else if($mon==9){
		$bul = 'September';
	} else if($mon==10){
		$bul = 'Oktober';
	} else if($mon==11){
		$bul = 'November';
	} else if($mon==12){
		$bul = 'Desember';
	}

	$jadi = $hari.", ".date('d')." ".$bul." ".date('Y');
	return $jadi;
}

function bulan($a){
	$mon = $a;
	if($mon==1){
		$bul = 'Januari';
	} else if($mon==2){
		$bul = 'Februari';
	} else if($mon==3){
		$bul = 'Maret';
	} else if($mon==4){
		$bul = 'April';
	} else if($mon==5){
		$bul = 'Mei';
	} else if($mon==6){
		$bul = 'Juni';
	} else if($mon==7){
		$bul = 'Juli';
	} else if($mon==8){
		$bul = 'Agustus';
	} else if($mon==9){
		$bul = 'September';
	} else if($mon==10){
		$bul = 'Oktober';
	} else if($mon==11){
		$bul = 'November';
	} else if($mon==12){
		$bul = 'Desember';
	}

	return $bul;
}

function hari($a){
	$a = date('D', strtotime($a));
	switch ($a) {
		case 'Sun' : $b = 'Minggu';break;
		case 'Mon' : $b = 'Senin';break;
		case 'Tue' : $b = 'Selasa';break;
		case 'Wed' : $b = 'Rabu';break;
		case 'Thu' : $b = 'Kamis';break;
		case 'Fri' : $b = 'Jumat';break;
		case 'Sat' : $b = 'Sabtu';break;
	}
	return $b;
}