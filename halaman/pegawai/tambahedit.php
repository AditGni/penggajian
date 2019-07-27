<?php
if($mod=='update-peg'){
	$nip = $_GET['nip'];
	$query = mysql_query("SELECT * FROM pegawai a, login b WHERE a.nip=b.idl and a.nip='$nip'");
	$k = mysql_fetch_assoc($query);
	$nama = $k['nama'];
	$tmpt = $k['tmptlhr'];
	$jabatan = $k['jabatan'];
	$tgl = date('Y-m-d',strtotime($k['tgllhr']));
	$status = $k['status'];
	$anak = $k['anak'];
	$npwp = $k['npwp'];
	$gol = $k['id_gol'];
	$user = $k['username'];
	$pass = $k['password'];
	$action = 'update-peg';
	$title = '<i class="fa fa-pencil"></i> Edit Pegawai';
} else {
	$action = 'tambah-peg';
	$title = '<i class="fa fa-user-plus"></i> Input Pegawai';
}
?>
<div class="col-md-6 offset-md-3">
	<div class="card border-secondary">
		<h5 class="card-header"><?php echo $title;?></h5>
		<div class="card-body">
			<?php
			if(!empty($_SESSION['pesan'])){
				echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Yang berwarna merah tidak boleh kosong</div>";
			}
			?>
			<form action="?pg=proses&mod=<?php echo $action;?>" method="POST">
				<div class="row">
					<input type="hidden" name="lama" value="<?php echo $nip;?>">
					<div class="form-group col-md-12">
						<label class="<?php echo (!empty($_SESSION['pesan']['nip']) ? 'text-danger' : '');?>">NIP</label>
						<input type="text" name="nip" class="form-control" value="<?php echo (!empty($_SESSION['value']['nip']) ? $_SESSION['value']['nip'] : $nip);?>">
					</div>
					<div class="form-group col-md-12">
						<label class="<?php echo (!empty($_SESSION['pesan']['nama']) ? 'text-danger' : '');?>">Nama Lengkap</label>
						<input type="text" name="nama" class="form-control" value="<?php echo (!empty($_SESSION['value']['nama']) ? $_SESSION['value']['nama'] : $nama);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['npwp']) ? 'text-danger' : '');?>">NPWP</label>
						<input type="text" name="npwp" class="form-control" value="<?php echo (!empty($_SESSION['value']['npwp']) ? $_SESSION['value']['npwp'] : $npwp);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['jab']) ? 'text-danger' : '');?>">Jabatan</label>
						<input type="text" name="jab" class="form-control" value="<?php echo (!empty($_SESSION['value']['jab']) ? $_SESSION['value']['jab'] : $jabatan);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['gol']) ? 'text-danger' : '');?>">Golongan</label>
						<select class="form-control" name="gol">
							<option value="0">...</option>
							<?php
							$sql = mysql_query("SELECT * FROM golongan");
							while($data = mysql_fetch_assoc($sql)){
								$cek = (!empty($_SESSION['value']['gol']) ? $_SESSION['value']['gol'] : $_POST['gol']);
								?>
								<option value="<?php echo $data['id_gol'];?>" <?php echo ($cek==$data['id_gol'] || $gol==$data['id_gol']) ? 'selected' : '';?>><?php echo $data['golongan'];?></option>
							<?php
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['tmpt']) ? 'text-danger' : '');?>">Tempat Lahir</label>
						<input type="text" name="tempat" class="form-control" value="<?php echo (!empty($_SESSION['value']['tmpt']) ? $_SESSION['value']['tmpt'] : $tmpt);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['tgl']) ? 'text-danger' : '');?>">Tanggal Lahir</label>
						<input type="date" name="tgl" class="form-control" value="<?php echo (!empty($_SESSION['value']['tgl']) ? $_SESSION['value']['tgl'] : $tgl);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['stat']) ? 'text-danger' : '');?>">Status</label>
						<div class="form-check">
							<label class="form-check-label"><input type="radio" name="kawin" class="form-check-input" value="y" <?php echo ($_SESSION['value']['stat']=='y' || $status=='y') ? 'checked' : '';?>> Kawin</label>
						</div>
						<div class="form-check">
							<label class="form-check-label"><input type="radio" name="kawin" class="form-check-input" value="n"  <?php echo ($_SESSION['value']['stat']=='n' || $status=='n') ? 'checked' : '';?>> Belum Kawin</label>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label class="<?php echo (!empty($_SESSION['pesan']['anak']) ? 'text-danger' : '');?>">Anak</label>
						<input type="text" name="anak" class="form-control" value="<?php echo (!empty($_SESSION['pesan']['anak']) ? $_SESSION['value']['anak'] : $anak);?>">
					</div>

					<div class="form-group col-md-12">
						<p class="<?php echo (!empty($_SESSION['pesan']['user']) || !empty($_SESSION['pesan']['pass']) ? 'text-danger' : '');?>"><i class="fa fa-unlock-alt"></i> Data Login</p>
						<input type="text" name="user" class="form-control" placeholder="Username" value="<?php echo (!empty($_SESSION['pesan']['user']) ? $_SESSION['value']['user'] : $user);?>">
						<input type="password" name="pass" class="form-control" placeholder="Password" value="<?php echo (!empty($_SESSION['pesan']['pass']) ? $_SESSION['value']['pass'] : $pass);?>">
					</div>
				</div>
				<button class="btn btn-outline-primary"><i class="fa fa-check"></i> Simpan</button>
				<a href="?pg=daftar-pegawai" class="btn btn-outline-danger"><i class="fa fa-close"></i> Batal</a>
			</form>
		</div>
	</div>
</div>
<?php
unset($_SESSION['pesan']);
unset($_SESSION['value']);
?>