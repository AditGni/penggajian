<div class="col-md-12">
	<?php
	$l = mysql_query("SELECT distinct MONTH(tglgaji) as bul FROM penggajian ORDER BY tglgaji ASC");
	$rw = mysql_num_rows($l);
	if($rw > 0){
	?>
	<form action="" method="POST">
	<div class="form-group row">
		<label class="col-md-2">Pilih Bulan</label>
		<div class="input-group col-md-10">
			<select class="form-control" name="bulan">
				<option value="not">...</option>
				<?php
				while($d = mysql_fetch_assoc($l)){
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
				<option value="<?php echo $b;?>" <?php echo ($_POST['bulan']==$b) ? 'selected' : '';?>><?php echo $bul;?></option>
			<?php } ?>
			</select>
			<button type="submit" name="cek" class="btn btn-primary" value='ada'><i class="fa fa-eye"></i> Cek</button>
		</div>
	</div>
	</form>
	<?php
	if(!empty($_POST['cek'])){
		$t = $_POST['bulan'];
		$sql = mysql_query("SELECT a.tglgaji,b.nip,b.nama,b.npwp,c.golongan,b.jabatan,a.gajipokok,a.potongan,a.gaji_bersih FROM penggajian a, pegawai b, golongan c WHERE a.nip=b.nip and c.id_gol=b.id_gol and MONTH(a.tglgaji)='$t'");
		$r = mysql_num_rows($sql);
		if($r > 0){
		?>
	<div class="card">
		<h5 class="card-header"><i class="fa fa-book"></i>Penggajian</h5>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-sm table-bordered">
					<thead>
						<tr>
							<td>No</td>
							<td>Tgl Gaji</td>
							<td>NIP</td>
							<td>Nama Pegawai</td>
							<td>NPWP</td>
							<td>Golongan</td>
							<td>Jabatan</td>
							<td>Gaji Pokok</td>
							<td>Potongan</td>
							<td>Gaji Bersih</td>
						</tr>
						<?php
						$i = 1;
						while($d = mysql_fetch_assoc($sql)){?>
						<tr>
							<td><?php echo $i++;?></td>
							<td><?php echo date('d-m-Y', strtotime($d['tglgaji']));?></td>
							<td><?php echo $d['nip'];?></td>
							<td><?php echo ucwords($d['nama']);?></td>
							<td><?php echo $d['npwp'];?></td>
							<td><?php echo $d['golongan'];?></td>
							<td><?php echo $d['jabatan'];?></td>
							<td>Rp. <?php echo number_format($d['gajipokok']);?></td>
							<td>Rp. <?php echo number_format($d['potongan']);?></td>
							<td>Rp. <?php echo number_format($d['gaji_bersih']);?></td>
						</tr>
					<?php } ?>
					</thead>
				</table>
			</div>
			<div class="float-right">
				<a href="?pg=tambah-gaji" class="btn btn-warning"><i class="fa fa-plus"></i> Input Gaji</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php } else {
	echo "<div class='alert alert-danger'>";
	if($_POST['bulan']=='not'){
		echo "<i class='fa fa-exclamation-triangle'></i> Data tidak ditemukan!";
	} else {
		echo "<i classs='fa fa-exlcmation-triangle'></i> Data tidak ditemukan!";
	}
} } } else {
	echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Data penggajian belum ada. silahkan di <a href='?pg=tambah-gaji'><i class='fa fa-plus'></i> Input</a>";
} ?>
</div>