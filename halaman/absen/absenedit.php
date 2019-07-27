<?php
$nip = $_GET['nip'];
$tgl = $_GET['tgl'];
$que = mysql_query("SELECT * FROM absen WHERE nip='$nip' and tglabsen='$tgl'");
$aks = mysql_fetch_assoc($que);
$sql = mysql_query("SELECT * FROM pegawai a, golongan b WHERE a.id_gol=b.id_gol and a.nip='$nip'");
$q = mysql_fetch_assoc($sql);
?>
<div class="col-md-7 offset-md-3">
	<?php
	if(!empty($_SESSION['error'])){
		echo "<div class='alert alert-danger'>";
		foreach ($_SESSION['error'] as $value) {
			echo $value."<br>";
		}
		echo "</div>";
	}
	if(!empty($_SESSION['pesan'])){
		echo "<div class='alert alert-".(!empty($_SESSION['alert']) ? $_SESSION['alert'] : '')."'>".$_SESSION['pesan']."</div>";
	}
	?>
	<div class="card">
		<h5 class="card-header"><i class="fa fa-address-card"></i> Edit Absensi Pegawai</h5>
		<div class="card-body">
			<div class="form-group row">
				<label class="col-md-5 text-muted">NIP</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo $q['nip'];?></div>
			</div>
			<div class="form-group row">
				<label class="col-md-5 text-muted">Nama</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo ucwords($q['nama']);?></div>
			</div>
			<div class="form-group row">
				<label class="col-md-5 text-muted">NPWP</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo $q['npwp'];?></div>
			</div>
			<div class="form-group row">
				<label class="col-md-5 text-muted">Golongan</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo $q['golongan'];?></div>
			</div>
			<div class="form-group row">
				<label class="col-md-5 text-muted">Jabatan</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo ucfirst($q['jabatan']);?></div>
			</div>
			<div class="form-group row">
				<label class="col-md-5 text-muted">Tanggal/Tempat Lahir</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo date('d-m-Y', strtotime($q['tgllhr'])).", ". ucfirst($q['tmptlhr']);?></div>
			</div>
			<form action="?pg=absen-admin&hal=proses&mod=update-absensi" method="POST">
				<input type="hidden" name="nip" value="<?php echo $nip;?>">
				<div class="form-group row">
					<label class="col-md-5 <?php echo (!empty($_SESSION['error']['absen']) ? 'text-danger' : 'text-muted');?>">Absensi</label>
					<span class="col-md-1">:</span>
					<div class="font-weight-normal col-md-6">
						<div class="form-group">
							<label class="form-check-label"><input type="radio" name="absen" class="form-check-control" value="h" <?php echo ($_SESSION['value']['absen']=='h' || $aks['absen']=='h') ? 'checked' : '';?>> Hadir</label>
							<label class="form-check-label"><input type="radio" name="absen" class="form-check-control" value="i" <?php echo ($_SESSION['value']['absen']=='i' || $aks['absen']=='i') ? 'checked' : '';?>> Izin</label>
							<label class="form-check-label"><input type="radio" name="absen" class="form-check-control" value="s" <?php echo ($_SESSION['value']['absen']=='s' || $aks['absen']=='s') ? 'checked' : '';?>> Sakit</label>
							<label class="form-check-label"><input type="radio" name="absen" class="form-check-control" value="a" <?php echo ($_SESSION['value']['absen']=='a' || $aks['absen']=='a') ? 'checked' : '';?>> Alpa</label>
						</div>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-md-5 <?php echo (!empty($_SESSION['error']['tgl']) ? 'text-danger' : 'text-muted');?>">Tanggal Absen</label>
					<span class="col-md-1">:</span>
					<input type="date" name="tgl" class="form-control col-md-6" value="<?php echo $aks['tglabsen'];?>" readonly>
					<div class="btn-group-vertical col-md-12 mt-2">
						<button class="btn btn-primary btn-block" name="klik" type="submit"><i class="fa fa-cog"></i> Update</button>
						<a href="?pg=absen-admin&mod=absen-harian&mon=<?php echo $_SESSION['mon'];?>" class="btn btn-danger btn-block"><i class="fa fa-arrow-left"></i> Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['value']);
unset($_SESSION['pesan']);
unset($_SESSION['alert']);
?>