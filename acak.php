<?php
error_reporting(0);
mysql_connect('localhost','root','');
mysql_select_db('db_penggajian');
$sql = mysql_query("SELECT * FROM pegawai");
while($k = mysql_fetch_array($sql)){
	$d = 1;
	while($d <= 31){
		$a = array(1 =>'h',2=>'i',3=>'s',4=>'a');
		$b = rand(1,4);
		$c = $a[$b];
		$tgl = '2018-8-'.$d;
		if(date('D', strtotime($tgl))!='Sun' && date('D',strtotime($tgl))!='Sat'){
			mysql_query("INSERT INTO absen VALUES('','$k[nip]','$tgl','$b','')");
		}
		$d++;
	}
}
echo "Absensi pada bulan ".date('m', strtotime($tgl))." telah berhasil";