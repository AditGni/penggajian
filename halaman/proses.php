<?php
if(!empty($_GET['mod'])){
	$mod = $_GET['mod'];
	if($mod=='tambah-peg'){
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$npwp = $_POST['npwp'];
		$jab = $_POST['jab'];
		$stat = $_POST['kawin'];
		$tmpt = $_POST['tempat'];
		$tgl = date('Y-m-d', strtotime($_POST['tgl']));
		$anak = $_POST['anak'];
		$gol = $_POST['gol'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if(trim($nip)==''){
			$_SESSION['pesan']['nip'] = true;
		}
		if(trim($nama)==''){
			$_SESSION['pesan']['nama'] = true;
		}
		if(trim($npwp)==''){
			$_SESSION['pesan']['npwp'] = true;
		}
		if(trim($jab)==''){
			$_SESSION['pesan']['jab'] = true;
		}
		if(trim($stat)==''){
			$_SESSION['pesan']['stat'] = true;
		}
		if(trim($tmpt)==''){
			$_SESSION['pesan']['tmpt'] = true;
		}
		if(trim($_POST['tgl'])==''){
			$_SESSION['pesan']['tgl'] = true;
		}
		if(trim($anak)==''){
			$_SESSION['pesan']['anak'] = true;
		}
		if($gol=='0'){
			$_SESSION['pesan']['gol'] = true;
		}
		if(trim($user)==''){
			$_SESSION['pesan']['user'] = true;
		}
		if(trim($pass)==''){
			$_SESSION['pesan']['pass'] = true;
		}

		if(!empty($_SESSION['pesan'])){
			$_SESSION['value']['nip'] = $nip;
			$_SESSION['value']['nama'] = $nama;
			$_SESSION['value']['npwp'] = $npwp;
			$_SESSION['value']['jab'] = $jab;
			$_SESSION['value']['stat'] = $stat;
			$_SESSION['value']['tmpt'] = $tmpt;
			$_SESSION['value']['tgl'] = (!empty($_POST['tgl']) ? $tgl : $_POST['tgl']);
			$_SESSION['value']['anak'] = $anak;
			$_SESSION['value']['gol'] = $gol;
			$_SESSION['value']['user'] = $user;
			$_SESSION['value']['pass'] = $pass;
			header("location:?pg=daftar-pegawai&mod=tambah-peg");
		} else {
			mysql_query("INSERT INTO pegawai VALUES('$nip','$nama','$tmpt','$tgl','$jab','$stat','$anak','$npwp','$gol')");
			mysql_query("INSERT INTO login VALUES ('','$user','$pass','pegawai','$nip')");
			header("location:?pg=daftar-pegawai");
		}
	} else if($mod=='update-peg'){
		$id = $_POST['lama'];
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$npwp = $_POST['npwp'];
		$jab = $_POST['jab'];
		$stat = $_POST['kawin'];
		$tmpt = $_POST['tempat'];
		$tgl = date('Y-m-d', strtotime($_POST['tgl']));
		$anak = $_POST['anak'];
		$gol = $_POST['gol'];
		$user = $_POST['user'];
		$pass = $_POST['pass'];


		if(trim($nip)==''){
			$_SESSION['pesan']['nip'] = true;
		}
		if(trim($nama)==''){
			$_SESSION['pesan']['nama'] = true;
		}
		if(trim($npwp)==''){
			$_SESSION['pesan']['npwp'] = true;
		}
		if(trim($jab)==''){
			$_SESSION['pesan']['jab'] = true;
		}
		if(trim($stat)==''){
			$_SESSION['pesan']['stat'] = true;
		}
		if(trim($tmpt)==''){
			$_SESSION['pesan']['tmpt'] = true;
		}
		if(trim($_POST['tgl'])==''){
			$_SESSION['pesan']['tgl'] = true;
		}
		if(trim($anak)==''){
			$_SESSION['pesan']['anak'] = true;
		}
		if($gol=='0'){
			$_SESSION['pesan']['gol'] = true;
		}
		if(trim($user)==''){
			$_SESSION['pesan']['user'] = true;
		}
		if(trim($pass)==''){
			$_SESSION['pesan']['pass'] = true;
		}

		if(!empty($_SESSION['pesan'])){
			$_SESSION['value']['nip'] = $nip;
			$_SESSION['value']['nama'] = $nama;
			$_SESSION['value']['npwp'] = $npwp;
			$_SESSION['value']['jab'] = $jab;
			$_SESSION['value']['stat'] = $stat;
			$_SESSION['value']['tmpt'] = $tmpt;
			$_SESSION['value']['tgl'] = (!empty($_POST['tgl']) ? $tgl : $_POST['tgl']);
			$_SESSION['value']['anak'] = $anak;
			$_SESSION['value']['gol'] = $gol;
			$_SESSION['value']['user'] = $user;
			$_SESSION['value']['pass'] = $pass;
			header("location:?pg=daftar-pegawai&mod=update-peg");
		} else {
			mysql_query("UPDATE pegawai SET nip='$nip',nama='$nama',tmptlhr='$tmpt',tgllhr='$tgl',jabatan='$jab',status='$stat',anak='$anak',npwp='$npwp',id_gol='$gol' WHERE nip='$id'");
			mysql_query("UPDATE login SET username='$user', password='$pass' WHERE idl='$nip'");
			header("location:?pg=daftar-pegawai");
		}
	} else if($mod=='del-peg'){
		$nip = $_GET['nip'];
		mysql_query("DELETE FROM pegawai WHERE nip='$nip'");
		mysql_query("DELETE FROM login WHERE idl='$nip'");
		header("location:?pg=daftar-pegawai");
	} else if($mod=='tambah-gol'){
		$gol = $_POST['gol'];
		$gaji = $_POST['gaji'];
		$ismi = $_POST['ismi'];
		$anak = $_POST['anak'];
		$ese = $_POST['eselon'];
		$beras = $_POST['beras'];
		$bpjs = $_POST['bpjs'];
		$bulat = $_POST['bulat'];
		$potbpjs = $_POST['potbpjs'];
		$iwp2 = $_POST['iwp2'];
		$iwp8 = $_POST['iwp8'];
		$tap = $_POST['tap'];

		if(trim($gol)==''){
			$_SESSION['pesan']['gol'] = true;
		}
		if(trim($gaji)==''){
			$_SESSION['pesan']['gaji'] = true;
		}
		if(trim($ismi)==''){
			$_SESSION['pesan']['ismi'] = true;
		}
		if(trim($anak)==''){
			$_SESSION['pesan']['anak'] = true;
		}
		if(trim($ese)==''){
			$_SESSION['pesan']['eselon'] = true;
		}
		if(trim($beras)==''){
			$_SESSION['pesan']['beras'] = true;
		}
		if(trim($bpjs)==''){
			$_SESSION['pesan']['bpjs'] = true;
		}
		if(trim($bulat)==''){
			$_SESSION['pesan']['bulat'] = true;
		}
		if(trim($potbpjs)==''){
			$_SESSION['pesan']['potbpjs'] = true;
		}
		if(trim($iwp2)==''){
			$_SESSION['pesan']['iwp2'] = true;
		}
		if(trim($iwp8)==''){
			$_SESSION['pesan']['iwp8'] = true;
		}
		if(trim($tap)==''){
			$_SESSION['pesan']['tap'] = true;
		}

		if(!empty($_SESSION['pesan'])){
			$_SESSION['value']['gol'] = $gol;
			$_SESSION['value']['gaji'] = $gaji;
			$_SESSION['value']['ismi'] = $ismi;
			$_SESSION['value']['anak'] = $anak;
			$_SESSION['value']['eselon'] = $ese;
			$_SESSION['value']['beras'] = $beras;
			$_SESSION['value']['bpjs'] = $bpjs;
			$_SESSION['value']['bulat'] = $bulat;
			$_SESSION['value']['potbpjs'] = $potbpjs;
			$_SESSION['value']['iwp2'] = $iwp2;
			$_SESSION['value']['iwp8'] = $iwp8;
			$_SESSION['value']['tap'] = $tap;
			header("location:?pg=golongan&mod=tambah-gol");
		} else {
			mysql_query("INSERT INTO golongan VALUES('','$gol','$gaji','$ismi','$anak','$ese','$beras','$bpjs','$bulat','$potbpjs','$iwp2','$iwp8','$tap')");
			header("location:?pg=golongan");
		}
	}  else if($mod=='update-gol'){
		$id = $_POST['id_gol'];
		$gol = $_POST['gol'];
		$gaji = $_POST['gaji'];
		$ismi = $_POST['ismi'];
		$anak = $_POST['anak'];
		$ese = $_POST['eselon'];
		$beras = $_POST['beras'];
		$bpjs = $_POST['bpjs'];
		$bulat = $_POST['bulat'];
		$potbpjs = $_POST['potbpjs'];
		$iwp2 = $_POST['iwp2'];
		$iwp8 = $_POST['iwp8'];
		$tap = $_POST['tap'];

		if(trim($gol)==''){
			$_SESSION['pesan']['gol'] = true;
		}
		if(trim($gaji)==''){
			$_SESSION['pesan']['gaji'] = true;
		}
		if(trim($ismi)==''){
			$_SESSION['pesan']['ismi'] = true;
		}
		if(trim($anak)==''){
			$_SESSION['pesan']['anak'] = true;
		}
		if(trim($ese)==''){
			$_SESSION['pesan']['eselon'] = true;
		}
		if(trim($beras)==''){
			$_SESSION['pesan']['beras'] = true;
		}
		if(trim($bpjs)==''){
			$_SESSION['pesan']['bpjs'] = true;
		}
		if(trim($bulat)==''){
			$_SESSION['pesan']['bulat'] = true;
		}
		if(trim($potbpjs)==''){
			$_SESSION['pesan']['potbpjs'] = true;
		}
		if(trim($iwp2)==''){
			$_SESSION['pesan']['iwp2'] = true;
		}
		if(trim($iwp8)==''){
			$_SESSION['pesan']['iwp8'] = true;
		}
		if(trim($tap)==''){
			$_SESSION['pesan']['tap'] = true;
		}

		if(!empty($_SESSION['pesan'])){
			$_SESSION['value']['gol'] = $gol;
			$_SESSION['value']['gaji'] = $gaji;
			$_SESSION['value']['ismi'] = $ismi;
			$_SESSION['value']['anak'] = $anak;
			$_SESSION['value']['eselon'] = $ese;
			$_SESSION['value']['beras'] = $beras;
			$_SESSION['value']['bpjs'] = $bpjs;
			$_SESSION['value']['bulat'] = $bulat;
			$_SESSION['value']['potbpjs'] = $potbpjs;
			$_SESSION['value']['iwp2'] = $iwp2;
			$_SESSION['value']['iwp8'] = $iwp8;
			$_SESSION['value']['tap'] = $tap;
			header("location:?pg=golongan&mod=tambah-gol");
		} else {
			mysql_query("UPDATE golongan SET golongan='$gol',gaji_pokok='$gaji',tunj_ismi='$ismi',tunj_anak='$anak',tunj_eselon='$ese',tunj_beras='$beras',tunj_bpjs='$bpjs',pembulatan='$bulat',pot_bpjs='$potbpjs',pot_iwp2='$iwp2',pot_iwp8='$iwp8',pot_taperum='$tap' WHERE id_gol='$id'");
			header("location:?pg=golongan");
		}
	} else if($mod=='hapus-gol'){
		$id = $_GET['id'];
		mysql_query("DELETE FROM golongan WHERE id_gol='$id'");
		header("location:?pg=golongan");
	} else if($mod=='login'){
		$user = $_POST['user'];
		$pass = $_POST['pass'];

		if(trim($user)==''){
			$_SESSION['pesan']['user'] = true;
		}

		if(trim($pass)==''){
			$_SESSION['pesan']['pass'] = true;
		}

		if(!empty($_SESSION['pesan'])){
			$_SESSION['value']['user'] = $user;
			$_SESSION['value']['pass'] = $pass;
			header('location:?pg=login');
		} else {
			$q = mysql_query("SELECT * FROM login WHERE username='$user' and password='$pass'");
			$r = mysql_num_rows($q);
			if($r > 0){
				$d = mysql_fetch_assoc($q);
				$id = $d['idl'];
				if($d['akses']=='admin' || $d['akses']=='pimpinan'){
					$q = mysql_query("SELECT * FROM user WHERE id_user='$id'");
					$c = mysql_fetch_assoc($q);
					if($d['akses']=='admin'){
						$otw = 'absen-admin';
					} else {
						$otw = 'laporan';
					}
				} else if($d['akses']=='pegawai') {
					$q = mysql_query("SELECT * FROM pegawai WHERE nip='$id'");
					$c = mysql_fetch_assoc($q);
					$otw = 'absen';
				}

				$_SESSION['login'] = true;
				$_SESSION['nama'] = $c['nama'];
				$_SESSION['akses'] = $d['akses'];
				$_SESSION['idl'] = $d['idl'];
				header("location:?pg=".$otw);
			} else {
				$_SESSION['error'] = '<i class="fa fa-exclamation-triangle"></i> Username dan Password salah';
				header("location:?pg=login");
			}
		}
	} else if($mod=='logout'){
		session_destroy();
		header("location:?pg=login");
	} else if($mod=='absensi'){
		$nip = $id1;
		$tgl = $_POST['tgl'];
		$absen = $_POST['absen'];
		if(trim($tgl)==''){
			$_SESSION['error']['tgl'] = '<i class="fa fa-exclamation-triangle"></i> Tanggal harus diisi!';

		} else {
			if(date('Y-m-d',strtotime($tgl)) < date('Y-m-d')){
				$_SESSION['error']['tgl'] = '<i class="fa fa-calendar"></i> Tanggal harus valid!';
			}
		}
		if(trim($absen)==''){
			$_SESSION['error']['absen'] = '<i class="fa fa-exclamation-triangle"></i> Absensi harus dipilih!';
		}

		$t = date('Y-m-d', strtotime($tgl));
		$sql = mysql_query("SELECT * FROM absen WHERE nip='$nip' and tglabsen='$t'");
		$r = mysql_num_rows($sql);
		if($r > 0){
			$_SESSION['error']['tgl_eksis'] = '<i class="fa fa-close"></i> Anda sudah mengisi Absen pada tanggal '. date('d-m-Y', strtotime($tgl));
		}

		if(!empty($_SESSION['error'])){
			$_SESSION['value']['tgl'] = $tgl;
			$_SESSION['value']['absen'] = $absen;
		} else {
			$tgl = date('Y-m-d',strtotime($tgl));
			mysql_query("INSERT INTO absen VALUES('','$nip','$tgl','$absen','')");
			if($absen=='h'){
				$_SESSION['pesan'] = '<i class="fa fa-check"></i> Anda telah absen. Semangat untuk hari ini!';
				$_SESSION['alert'] = 'success';
			} else if($absen=='s'){
				$_SESSION['pesan'] = '<i class="fa fa-h-square"></i> Yah, Semoga cepat sembuh ya dan bisa beraktivitas seperti biasa';
				$_SESSION['alert'] = 'warning';
			} else if($absen=='i'){
				$_SESSION['pesan'] = '<i class="fa fa-paper-plane"></i> Diharapkan untuk menginformasikan kehadiran anda ke admin. Terima kasih';
				$_SESSION['alert'] = 'warning';
			} else if($absen=='a'){
				$_SESSION['pesan'] = '<i class="fa fa-frown-o"></i> Yah, anda tidak masuk tanpa kabar';
				$_SESSION['alert'] = 'info';
			}
		}
		header("location:?pg=absen");
	} else if($mod=='update-absensi'){
		$nip = $_POST['nip'];
		$tgl = $_POST['tgl'];
		$absen = $_POST['absen'];
		if(trim($absen)==''){
			$_SESSION['error']['absen'] = '<i class="fa fa-exclamation-triangle"></i> Absensi harus dipilih!';
		}

		if(!empty($_SESSION['error'])){
			$_SESSION['value']['tgl'] = $tgl;
			$_SESSION['value']['absen'] = $absen;
		} else {
			$tgl = date('Y-m-d',strtotime($tgl));
			mysql_query("UPDATE absen SET absen='$absen' WHERE nip='$nip' and tglabsen='$tgl'");
			if($absen=='h'){
				$_SESSION['pesan'] = '<i class="fa fa-check"></i> Anda telah absen. Semangat untuk hari ini!';
				$_SESSION['alert'] = 'success';
			} else if($absen=='s'){
				$_SESSION['pesan'] = '<i class="fa fa-h-square"></i> Yah, Semoga cepat sembuh ya dan bisa beraktivitas seperti biasa';
				$_SESSION['alert'] = 'warning';
			} else if($absen=='i'){
				$_SESSION['pesan'] = '<i class="fa fa-paper-plane"></i> Diharapkan untuk menginformasikan kehadiran anda ke admin. Terima kasih';
				$_SESSION['alert'] = 'warning';
			} else if($absen=='a'){
				$_SESSION['pesan'] = '<i class="fa fa-frown-o"></i> Yah, anda tidak masuk tanpa kabar';
				$_SESSION['alert'] = 'info';
			}
		}
		header("location:?pg=absen-admin&mod=absen-harian&mon=".$_SESSION['mon']);

	} else if($mod=='salary'){
		$nip = $_POST['nip'];
		$tgl = date('Y-m-d');
		

		$d = (int) date('m', strtotime($tgl));
		$de = $d - 1;
		$sql = mysql_query("SELECT * FROM penggajian WHERE nip='$nip' AND MONTH(tglgaji)='$de'");
		$r = mysql_num_rows($sql);
		if($r > 0){
			$_SESSION['error']['gaji_eksis'] = '<i class="fa fa-exclamation-triangle"></i> Pegawai ini telah di gaji pada bulan '. bulan($de);
		} else if(trim($tgl)==''){
			$_SESSION['error']['tgl'] = '<i class="fa fa-exclamation-triangle"></i> Tanggal harus diisi!';
		} else {
			if($tgl < date('Y-m-d')){
				$_SESSION['error']['tgl'] = '<i class="fa fa-calendar"></i> Tanggal harus valid!';
			}
		}

		if(!empty($_SESSION['error'])){
			$_SESSION['value']['tgl'] = $tgl;
			header("location:?pg=tambah-gaji");
		} else {
			$que = mysql_query("SELECT count(*) as jml FROM absen WHERE nip='$nip' and absen='a' and MONTH(tglabsen)='$de'");
			$sq = mysql_fetch_assoc($que);
			if($sq['jml'] > 0){
				$jml = $sq['jml'];
			} else {
				$jml = 0;
			}
			$sql = mysql_query("SELECT * FROM pegawai a, golongan b WHERE a.id_gol=b.id_gol and a.nip='$nip'");
			$dt = mysql_fetch_assoc($sql);
			$gapok = $dt['gaji_pokok'] + $dt['tunj_ismi'] + $dt['tunj_anak'] + $dt['tunj_eselon'] + $dt['tunj_beras'] + $dt['tunj_bpjs'] + $dt['pembulatan'];
			$pot = $dt['pot_bpjs'] + $dt['pot_iwp2'] + $dt['pot_iwp8'] + $dt['pot_taperum'] + ($jml*50000);
			$tgl = date('Y',strtotime($tgl))."-".$de."-".date('d',strtotime($tgl));
			$gaji = $gapok - $pot;
			mysql_query("INSERT INTO penggajian VALUES('','$nip','$tgl','$gapok','$pot','$gaji')");
			header("location:?pg=daftar-gaji");
		}
	}
}