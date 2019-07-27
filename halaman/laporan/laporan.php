<div class="col-md-12">
	<div class="card">
		<h2 class="card-header">LAPORAN</h2>
		<div class="card-body">
			<div class="form-group">
				<label class="control-label form-text semibold-text">Pilih Laporan:</label>
				<div class="btn-group">
					<a href="?pg=laporan&page=pegawai" class="btn btn-outline-primary">Pegawai</a>
					<a href="?pg=laporan&page=gaji" class="btn btn-outline-primary">Penggajian</a>
					<a href="?pg=laporan&page=absensi" class="btn btn-outline-primary">Absensi</a>
					<a href="?pg=laporan&page=jurnal" class="btn btn-outline-primary">Jurnal Penggajian</a>
				</div>
				<div class="btn-group"></div>
			</div>
			<?php if(!empty($_GET['page']) && ($_GET['page']=='gaji' || $_GET['page']=='absensi' || $_GET['page']=='jurnal')){?>
			<div class="col-md-3">
				<form action="" method="POST">
					<div class="form-group">
						<label>Pilih Bulan:</label>
						<div class="input-group">
							<select class="form-control" name="bulan">
								<?php
								$field = ($_GET['page']=='gaji') ? 'tglgaji' : 'tglabsen';
								$tabel = ($_GET['page']=='gaji') ? 'penggajian' : 'absen';
								$query = mysql_query("SELECT distinct MONTH($field) as bulan FROM $tabel ORDER BY $field ASC");
								if($_GET['page']=='jurnal'){
									$query = mysql_query("SELECT MONTH(tglgaji) as bulan FROM penggajian GROUP BY MONTH(tglgaji) ORDER BY tglgaji ASC");
								}
								while($data = mysql_fetch_array($query)){
									$j = $data['bulan'];
									if($data['bulan']==1){
										$bulan = 'Januari';
									} else if($data['bulan']==2){
										$bulan = 'Februari';
									} else if($data['bulan']==3){
										$bulan = 'Maret';
									} else if($data['bulan']==4){
										$bulan = 'April';
									} else if($data['bulan']==5){
										$bulan = 'Mei';
									} else if($data['bulan']==6){
										$bulan = 'Juni';
									} else if($data['bulan']==7){
										$bulan = 'Juli';
									} else if($data['bulan']==8){
										$bulan = 'Agustus';
									} else if($data['bulan']==9){
										$bulan = 'September';
									} else if($data['bulan']==10){
										$bulan = 'Oktober';
									} else if($data['bulan']==11){
										$bulan = 'November';
									} else if($data['bulan']==12){
										$bulan = 'Desember';
									} else{
										// $bulan = 
									}
								?>
								<option value="<?php echo $j;?>" <?php echo ($_POST['bulan']==$j) ? 'selected':'';?>><?php echo $bulan;?></option>
							<?php } ?>
							</select>
							<button class="btn btn-primary" <?= ($_GET['page']=='jurnal') ? "name='cek' value='ada'":'';?>><i class="fa fa-eye"></i> Lihat</button>
						</div>
					</div>
				</form>
			</div>
		<?php } ?>
		</div>
		<?php if(!empty($_GET['page'])){?>
		<div class="card-body">
			<div id="pkary">
				<?php
				$pg = $_GET['page'];
				if($pg=='gaji'){
					include "halaman/laporan/penggajian.php";
				} else if($pg=='pegawai'){
					include "halaman/laporan/pegawai.php";
				} else if($pg=='absensi'){
					include "halaman/laporan/absensi.php";
				} else if($pg=='jurnal'){
					include "halaman/laporan/jurnal.php";
				}
				?>
				<div class="row mt-5">
					<div class="col-md-3 offset-md-8">
						<div class="semibold-text mb-5 text-center">Mengetahui</div>
						<div class="font-weight-light mt-5 text-center"><?php echo $_SESSION['nama'];?></div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<button class="btn btn-primary" onclick="printContent('pkary')">Print</button>
		</div>
		<?php } else {?>
		<div class="card">
			<h1 class="card-body text-center"><i class="fa fa-file-text fa-lg"></i></h1>
		</div>
		<?php } ?>
	</div>
</div>