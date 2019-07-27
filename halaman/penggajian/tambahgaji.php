<div class="col-md-7 offset-md-3">
	<?php
	if(!empty($_SESSION['error'])){
		echo "<div class='alert alert-danger'>";
		foreach ($_SESSION['error'] as $value) {
			echo $value."<br>";
		}
		echo "</div>";
	}?>
	<div class="card">
		<h5 class="card-header"><i class="fa fa-address-card"></i> Penggajian</h5>
		<div class="card-body">
			<h6 class="text-primary">Gaji bulan <?= bulan(date('m')-1);?></h6>
			<form action="" method="POST">
				<div class="form-group row">
					<label class="col-md-5 text-muted">Pilih</label>
					<span class="col-md-1">:</span>
					<div class="col-md-5 input-group">
						<select class="form-control" name="nip">
							<option value="0">...</option>
							<?php
							$qu = mysql_query("SELECT * FROM pegawai ORDER BY nama asc");
							while($ta = mysql_fetch_assoc($qu)){?>
								<option value="<?php echo $ta['nip'];?>" <?php echo ($_POST['nip']==$ta['nip'] || $_SESSION['nip']==$ta['nip']) ? 'selected' : '';?>><?php echo ucwords($ta['nama']);?></option>
							<?php } ?>
						</select>
						<button type="submit" name="cek" class="btn btn-success"><i class="fa fa-eye"></i> Cek</button>
					</div>
				</div>
			</form>
			<?php if(!empty($_POST['nip']) || !empty($_SESSION['nip'])){
				$nip = $_POST['nip'];
				$_SESSION['nip'] = (empty($_SESSION['nip']) ? $nip : $_SESSION['nip']);
				$nip = (!empty($nip) ? $nip : $_SESSION['nip']);
				$sql = mysql_query("SELECT * FROM pegawai a, golongan b WHERE a.id_gol=b.id_gol and a.nip='$nip'");
				$q = mysql_fetch_assoc($sql);
			?>
			<form action="?pg=proses&mod=salary" method="POST">
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
				<div class="font-weight-normal col-md-6"><?php echo $q['jabatan'];?></div>
			</div>
			<div class="form-group row">
				<label class="col-md-5 text-muted">Tanggal/Tempat Lahir</label>
				<span class="col-md-1">:</span>
				<div class="font-weight-normal col-md-6"><?php echo date('d-m-Y', strtotime($q['tgllhr'])).", ". ucfirst($q['tmptlhr']);?></div>
			</div>
				<!-- <div class="form-group row">
					<label class="col-md-5 <?php echo (!empty($_SESSION['error']['tgl']) || !empty($_SESSION['error']['eksis']) ? 'text-danger' : 'text-muted');?>">Tanggal Absen</label>
					<span class="col-md-1">:</span>
					<input type="date" name="tgl" class="form-control col-md-6" value="<?php echo $_SESSION['value']['tgl'];?>">
				</div> -->
				<input type="hidden" name="nip" value="<?php echo (!empty($nip) ? $nip : $_SESSION['nip']);?>">
				<button class="btn btn-primary btn-block" type="submit" name="gaji"><i class="fa fa-save"></i> Gaji</button>
			</form>
			<a href="?pg=daftar-gaji" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i> Batal</a>
		<?php } ?>
		</div>
	</div>
</div>
<?php
unset($_SESSION['error']);
unset($_SESSION['value']);
?>