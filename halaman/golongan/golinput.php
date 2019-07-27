<?php
if($mod=='update-gol'){
	$id = $_GET['id'];
	$q = mysql_query("SELECT * FROM golongan WHERE id_gol='$id'");
	$d = mysql_fetch_assoc($q);
	$gol = $d['golongan'];
	$gaji = $d['gaji_pokok'];
	$ismi = $d['tunj_ismi'];
	$anak = $d['tunj_anak'];
	$eselon = $d['tunj_eselon'];
	$beras = $d['tunj_beras'];
	$bpjs = $d['tunj_bpjs'];
	$bulat = $d['pembulatan'];
	$potbpjs = $d['pot_bpjs'];
	$iwp2 = $d['pot_iwp2'];
	$iwp8 = $d['pot_iwp8'];
	$tap = $d['pot_taperum'];
	$action = 'update-gol';
	$title = '<i class="fa fa-pencil"></i> Update Golongan';
} else {
	$action = 'tambah-gol';
	$title = '<i class="fa fa-plus"></i> Input Golongan';
}
?>
<div class="col-md-8 offset-md-2">
	<?php if(!empty($_SESSION['pesan'])){
		echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Inputan tidak boleh kosong!</div>";
	}?>
	<div class="card">
		<h5 class="card-header"><?php echo $title;?></h5>
		<div class="card-body">
			<form action="?pg=proses&mod=<?php echo $action;?>" method="POST">
				<div class="row">
					<input type="hidden" name="id_gol" value="<?php echo $_GET['id'];?>">
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['gol']) ? 'text-danger' : '');?>">Golongan</label>
						<input type="text" name="gol" class="form-control" value="<?php echo (!empty($_SESSION['value']['gol']) ? $_SESSION['value']['gol'] : $gol);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['gaji']) ? 'text-danger' : '');?>">Gaji Pokok</label>
						<input type="text" name="gaji" class="form-control" value="<?php echo (!empty($_SESSION['value']['gaji']) ? $_SESSION['value']['gaji'] : $gaji);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['ismi']) ? 'text-danger' : '');?>">Tunjangan Istri/Suami</label>
						<input type="text" name="ismi" class="form-control" value="<?php echo (!empty($_SESSION['value']['ismi']) ? $_SESSION['value']['ismi'] : $ismi);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['anak']) ? 'text-danger' : '');?>">Tunjangan Anak</label>
						<input type="text" name="anak" class="form-control" value="<?php echo (!empty($_SESSION['value']['anak']) ? $_SESSION['value']['anak'] : $ismi);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['eselon']) ? 'text-danger' : '');?>">Tunjangan Eselon</label>
						<input type="text" name="eselon" class="form-control" value="<?php echo (!empty($_SESSION['value']['eselon']) ? $_SESSION['value']['eselon'] : $eselon);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['beras']) ? 'text-danger' : '');?>">Tunjangan Beras</label>
						<input type="text" name="beras" class="form-control" value="<?php echo (!empty($_SESSION['value']['beras']) ? $_SESSION['value']['beras'] : $beras);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['bpjs']) ? 'text-danger' : '');?>">Tunjangan BPJS</label>
						<input type="text" name="bpjs" class="form-control" value="<?php echo (!empty($_SESSION['value']['bpjs']) ? $_SESSION['value']['bpjs'] : $bpjs);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['bulat']) ? 'text-danger' : '');?>">Pembulatan</label>
						<input type="text" name="bulat" class="form-control" value="<?php echo (!empty($_SESSION['value']['bulat']) ? $_SESSION['value']['bulat'] : $bulat);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['potbpjs']) ? 'text-danger' : '');?>">Potongan BPJS</label>
						<input type="text" name="potbpjs" class="form-control" value="<?php echo (!empty($_SESSION['value']['potbpjs']) ? $_SESSION['value']['potbpjs'] : $potbpjs);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['iwp2']) ? 'text-danger' : '');?>">Potongan IWP 2%</label>
						<input type="text" name="iwp2" class="form-control" value="<?php echo (!empty($_SESSION['value']['iwp2']) ? $_SESSION['value']['iwp2'] : $ismi);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['iwp8']) ? 'text-danger' : '');?>">Potongan IWP 8%</label>
						<input type="text" name="iwp8" class="form-control" value="<?php echo (!empty($_SESSION['value']['iwp8']) ? $_SESSION['value']['iwp8'] : $iwp8);?>">
					</div>
					<div class="form-group col-md-6">
						<label class="<?php echo (!empty($_SESSION['pesan']['tap']) ? 'text-danger' : '');?>">Potongan Taperum</label>
						<input type="text" name="tap" class="form-control" value="<?php echo (!empty($_SESSION['value']['tap']) ? $_SESSION['value']['tap'] : $tap);?>">
					</div>
					<div class="col-md-6">
						<button class="btn btn-primary btn-block" type="submit" name="simpan" value="simpan"><i class="fa fa-save"></i> Simpan</button>
					</div>
					<div class="col-md-6">
						<a href="?pg=golongan" class="btn btn-danger btn-block"><i class="fa fa-sign-out"></i> Kembali</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
unset($_SESSION['pesan']);
unset($_SESSION['value']);
?>