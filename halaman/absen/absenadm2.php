<?php
if(!empty($_GET['mod'])){
	$mod = $_GET['mod'];
	$hal = $_GET['hal'];
	if($mod=='absen-harian'){
		include "halaman/absen/detail.php";
	} else if($mod=='absenedit'){
		include "halaman/absen/absenedit.php";
	} else if($hal=='proses'){
		include "halaman/proses.php";
	}
} else {
?>
<div class="col-md-12">
	<?php
	$l = mysql_query("SELECT distinct MONTH(tglabsen) as bul FROM absen ORDER BY tglabsen ASC");
	$r = mysql_num_rows($l);
	if($r > 0){?>
	<form action="" method="POST">
	<div class="form-group row">
		<label class="col-md-2">Pilih Bulan</label>
		<div class="input-group col-md-10">
			<select class="form-control" name="bulan">
				<option value="not">...</option>
				<?php
				while($d = mysql_fetch_assoc($l)){
					if($_POST['bulan']=='not'){
						$_SESSION['link'] = '';
					}
					$b = $d['bul'];
					if($b==1){
						$bul = 'Januari';
					} else if($b==2){
						$bul = 'Februari';
					} else if($b==3){
						$bul = 'Maret';
					} else if($b==4){
						$bul = 'April';
					} else if($b==5){
						$bul = 'Mei';
					} else if($b==6){
						$bul = 'Juni';
					} else if($b==7){
						$bul = 'Juli';
					} else if($b==8){
						$bul = 'Agustus';
					} else if($b==9){
						$bul = 'September';
					} else if($b==10){
						$bul = 'Oktober';
					} else if($b==11){
						$bul = 'November';
					} else if($b==12){
						$bul = 'Desember';
					}
				?>
				<option value="<?php echo $b;?>" <?php echo ($_POST['bulan']==$b || $_SESSION['link']==$b) ? 'selected' : '';?>><?php echo $bul;?></option>
			<?php } ?>
			</select>
			<button type="submit" name="cek" class="btn btn-primary" value="cek"><i class="fa fa-eye"></i> Cek</button>
		</div>
	</div>
	</form>
	<?php
	if(!empty($_POST['cek']) || !empty($_SESSION['link'])){
	$k = $_POST['bulan'];
	$_SESSION['link'] = (!empty($k) ? $k:$_SESSION['link']);
	$k = (!empty($k)? $k:$_SESSION['link']);
	$sql = mysql_query("SELECT DISTINCT tglabsen FROM absen WHERE month(tglabsen)='$k'");
	$r = mysql_num_rows($sql);
	if($r > 0){
	?>
	<!-- <div class="badge badge-warning"><?php echo tanggal();?></div> -->
	<div class="card">
		<h5 class="card-header"><i class="fa fa-book"></i> Data Absensi Pegawai</h5>
		<div class="card-body">
			<span class="text-muted">Data Bulan: </span> <div class="badge badge-secondary"><?php echo bulan($k);?></div>
			<div class="table-responsive">
				<table class="table table-bordered table-sm">
						<tr class="text-center">
							<td rowspan="3" class="align-middle">No</td>
							<td rowspan="3" class="align-middle">Tgl Absen</td>
							<td colspan="4">Absensi</td>
						</tr>
						<tr class="text-center">
							<td rowspan="2" class="align-middle">Hadir</td>
							<td colspan="2">Cuti</td>
							<td rowspan="2" class="align-middle">Alpa</td>
						</tr>
						<tr class="text-center">
							<td>Sakit</td>
							<td>Izin</td>
						</tr>
						<?php
						$i = 1;
						while($d = mysql_fetch_assoc($sql)){
							$tgl = date('Y-m-d', strtotime($d['tglabsen']));
							$q = mysql_query("SELECT tglabsen, IFNULL((select count(*) from absen where tglabsen='$tgl' and absen='h'),0) as hadir, IFNULL((select count(*) from absen where tglabsen='$tgl' and absen='s'),0) as sakit, IFNULL((select count(*) from absen where tglabsen='$tgl' and absen='i'),0) as izin, IFNULL((select count(*) from absen where tglabsen='$tgl' and absen='a'),0) as alpa from absen where tglabsen='$tgl' group by tglabsen");
							$dt = mysql_fetch_assoc($q);
							?>
						<tr class="text-center">
							<td><?php echo $i++;?></td>
							<td><a href="?pg=absen-admin&mod=absen-harian&mon=<?php echo $dt['tglabsen'];?>"><?php echo hari($d['tglabsen']).", ".date('d-m-Y',strtotime($dt['tglabsen']));?></a></td>
							<td><?php echo $dt['hadir'];?></td>
							<td><?php echo $dt['sakit'];?></td>
							<td><?php echo $dt['izin'];?></td>
							<td><?php echo $dt['alpa'];?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- <p class="text-muted">
				Total
			</p> -->
		</div>
	</div>
<?php } else {
	echo "<div class='alert alert-danger'>";
	if($_POST['bulan']=='not'){
		echo "<i class='fa fa-close'></i> Data tidak ditemukan!";
	} else {
		echo "<i class='fa fa-exclamation-triangle'></i> Belum ada absen pada bulan ini.";
	}
	echo "</div>";
} } } else {
	echo "<div class='alert alert-warning'><i class='fa fa-exclamation'></i> Pilihan bulan absensi belum dapat ditampilkan karna belum ada data absensi pegawai.</div>";
}
	?>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['value']);
unset($_SESSION['pesan']);
unset($_SESSION['alert']);
}?>