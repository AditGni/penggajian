<div class="col-md-12">
	<?php
	$_SESSION['mon'] = $_GET['mon'];
	$bln = date('Y-m-d',strtotime($_GET['mon']));
	$sql = mysql_query("SELECT a.nip,a.nama,a.jabatan,b.golongan,c.absen,c.tglabsen FROM pegawai a, golongan b, absen c WHERE a.nip=c.nip and a.id_gol=b.id_gol and c.tglabsen='$bln'");
	$r = mysql_num_rows($sql);
	if($r > 0){
		$b = $bln;
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
	<div class="badge badge-warning">Bulan: <?php echo bulan(date('m', strtotime($_SESSION['mon'])));?></div>
	<div class="card">
		<h5 class="card-header"><i class="fa fa-book"></i> Data Absensi Pegawai</h5>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-sm">
						<tr class="text-center">
							<td>No</td>
							<td>NIP</td>
							<td>Nama</td>
							<td>Golongan</td>
							<td>Jabatan</td>
							<td>Absensi</td>
						</tr>
						<?php
						$i = 1;
						while($d = mysql_fetch_assoc($sql)){
							if($d['absen']=='h'){
								$abs = 'Hadir';
							} else if($d['absen']=='s'){
								$abs = 'Sakit';
							} else if($d['absen']=='i'){
								$abs = 'Izin';
							} else if($d['absen']=='a'){
								$abs = 'Alpa';
							}
							?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><a href="?pg=absen-admin&mod=absenedit&nip=<?php echo $d['nip'];?>&tgl=<?php echo $d['tglabsen'];?>"><?php echo $d['nip'];?></td>
							<td><?php echo $d['nama'];?></td>
							<td><?php echo $d['golongan'];?></td>
							<td><?php echo $d['jabatan'];?></td>
							<td><?php echo $abs;?></td>
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

} ?>
<a href="?pg=absen-admin" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['value']);
unset($_SESSION['pesan']);
unset($_SESSION['alert']);
?>