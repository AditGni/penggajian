<div class="col-md-12">
	<?php
	$tgl = date('Y-m-d');
	$sql = mysql_query("SELECT a.nip,a.nama,a.npwp,a.jabatan,b.golongan, IFNULL((SELECT COUNT(c.absen) FROM absen c WHERE a.nip=c.nip AND c.absen='h' and c.tglabsen='$tgl'),0) as hadir, IFNULL((SELECT COUNT(c.absen) FROM absen c WHERE a.nip=c.nip AND c.absen='i' and c.tglabsen='$tgl'), 0) as izin, IFNULL((SELECT COUNT(c.absen) FROM absen c WHERE a.nip=c.nip AND c.absen='s' and c.tglabsen='$tgl'),0) as sakit, IFNULL((SELECT COUNT(c.absen) FROM absen c WHERE a.nip=c.nip AND c.absen='a' and c.tglabsen='$tgl'),0) as alpa FROM pegawai a, golongan b WHERE a.id_gol=b.id_gol GROUP BY a.nip ORDER BY a.nama ASC");
	$r = mysql_num_rows($sql);
	if($r > 0){
	?>
	<div class="badge badge-warning"><?php echo tanggal();?></div>
	<div class="card">
		<h5 class="card-header"><i class="fa fa-book"></i> Data Absensi Pegawai</h5>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead>
						<tr>
							<td>No</td>
							<td>NIP</td>
							<td>Nama Pegawai</td>
							<td>NPWP</td>
							<td>Golongan</td>
							<td>Jabatan</td>
							<td>Absen</td>
							<td>Menu</td>
						</tr>
						<?php
						$i = 1;
						while($d = mysql_fetch_assoc($sql)){
							if($d['hadir']==1){
								$absen = 'Hadir';
							} else if($d['izin']==1){
								$absen = 'Izin';
							} else if($d['sakit']==1){
								$absen = 'Sakit';
							} else if($d['alpa']==1){
								$absen = 'Alpa';
							} else {
								$absen = 'Belum Absen';
							}
							?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo $d['nip'];?></td>
							<td><?php echo ucwords($d['nama']);?></td>
							<td><?php echo $d['npwp'];?></td>
							<td><?php echo $d['golongan'];?></td>
							<td><?php echo $d['jabatan'];?></td>
							<td><?php echo $absen;?></td>
							<td><a href="?pg=absenedit&nip=<?php echo $d['nip'];?>&tgl=<?php echo $tgl;?>" class="btn btn-warning"><i class="fa fa-pencil"></i></a></td>
						</tr>
					<?php } ?>
					</thead>
				</table>
			</div>
			<!-- <p class="text-muted">
				Total
			</p> -->
		</div>
	</div>
<?php } else {?>
	<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Belum ada absensi pada hari ini, Tanggal <?php echo date('d-m-Y');?></div>
<?php } ?>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['value']);
unset($_SESSION['pesan']);
unset($_SESSION['alert']);
?>