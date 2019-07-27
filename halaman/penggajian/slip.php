<div class="col-md-8 offset-md-2">
	<div class="card">
		<div id="cetakslip" class="mb-3">
			<div class="card-header"><i class="fa fa-envelope"></i> Slip Gaji <?php echo bulan($_POST['bulan']);?></div>
			<div class="card-body">
				<form action="" method="POST">
					<div class="row mb-4">
						<label class="control-label col-md-2">Bulan:</label>
						<div class="input-group col-md-6">
							<select name="bulan" class="form-control">
								<option value="nol">...</option>
							<?php
							$sql = mysql_query("SELECT distinct MONTH(tglgaji) as bul FROM penggajian ORDER BY tglgaji ASC");
							while($c = mysql_fetch_assoc($sql)){?>
								<option value="<?php echo $c['bul'];?>" <?php echo ($_POST['bulan']==$c['bul']) ? 'selected':'';?>><?php echo bulan($c['bul']);?></option>	
							<?php } ?>
							</select>
							<button type="submit" name="cek" value="ada" class="btn btn-primary"><i class="fa fa-eye"></i> Cek</button>
						</div>
					</div>
				</form>
				<?php
				if(!empty($_POST['cek'])){
					$bul = $_POST['bulan'];
					$sql = mysql_query("SELECT * FROM pegawai a, golongan b, penggajian c WHERE a.nip=c.nip and a.id_gol=b.id_gol AND a.nip='$id1' and MONTH(c.tglgaji)='$bul'");
					$q = mysql_fetch_assoc($sql);
					$r = mysql_num_rows($sql);
					if($r > 0){
				?>
				<div class="row">
					<div class="text-muted col-md-3">NIP</div>
					<div class="col-md-1">:</div>
					<div class="col-md-6"><?php echo $q['nip'];?></div>
				</div>
				<div class="row">
					<div class="text-muted col-md-3">Nama</div>
					<div class="col-md-1">:</div>
					<div class="col-md-6"><?php echo $q['nama'];?></div>
				</div>
				<div class="row">
					<div class="text-muted col-md-3">NPWP</div>
					<div class="col-md-1">:</div>
					<div class="col-md-6"><?php echo $q['npwp'];?></div>
				</div>
				<div class="row">
					<div class="text-muted col-md-3">Golongan</div>
					<div class="col-md-1">:</div>
					<div class="col-md-6"><?php echo $q['golongan'];?></div>
				</div>
				<div class="row">
					<div class="text-muted col-md-3">Jabatan</div>
					<div class="col-md-1">:</div>
					<div class="col-md-6"><?php echo $q['jabatan'];?></div>
				</div>
				<div class="row mt-5">
					<div class="col-md-6">
						<div class="card-header text-center">Penghasilan</div>
						<div class="row">
							<div class="col-md-6">Gaji Pokok</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['gaji_pokok']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">Tunjangan Istri</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['tunj_ismi']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">Tunjangan Anak</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['tunj_anak']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">Tunjangan Eselon</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['tunj_eselon']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">Tunjangan Beras</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['tunj_beras']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">Tunjangan BPJS</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['tunj_bpjs']);?></div>
						</div>
						<div class="row font-weight-bold font-italic">
							<?php
							$gaber = $q['gaji_pokok'] + $q['tunj_ismi'] + $q['tunj_anak'] + $q['tunj_eselon'] + $q['tunj_beras'] + $q['tunj_bpjs'];
							?>
							<div class="col-md-6">Gaji Kotor</div>
							<div class="col-md-6">Rp. <?php echo number_format($gaber);?></div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card-header text-center">Potongan</div>
						<div class="row">
							<div class="col-md-6">BPJS</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['pot_bpjs']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">IWP 2%</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['pot_iwp2']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">IWP 8%</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['pot_iwp8']);?></div>
						</div>
						<div class="row">
							<div class="col-md-6">Taperum</div>
							<div class="col-md-6">Rp. <?php echo number_format($q['pot_taperum']);?></div>
						</div>
						<?php
						$o = mysql_query("SELECT count(*) as jml FROM absen WHERE nip='$id1' and absen='a' and MONTH(tglabsen)='$bul'");
						$p = mysql_fetch_assoc($o);
						if($p['jml'] > 0){
						?>
						<div class="row">
							<div class="col-md-6">Alpa: (50000 * <?php echo $p['jml'];?>)</div>
							<div class="col-md-6">Rp. <?php echo number_format($p['jml']*50000);?></div>
						</div>
					<?php } ?>
						<div class="row font-weight-bold font-italic">
							<?php
							$pot = $q['pot_bpjs'] + $q['pot_iwp2'] + $q['pot_iwp8'] + $q['pot_taperum'] + ($p['jml'] > 0 ? 50000*$p['jml'] : 0);
							?>
							<div class="col-md-6">Potongan</div>
							<div class="col-md-6">Rp. <?php echo number_format($pot);?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="card-header">
				<span class="text-muted">Gaji Bersih</span>: <span class="font-italic font-weight-bold">Gaji Kotor - Potongan = Rp. <?php echo number_format($gaber - $pot);?></span>
			</div>
			<div class="col-md-5 offset-md-6 mt-3 font-weight-bold">
				<div class="text-center">Gorontalo,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo bulan(date('m'))." ".date('Y');?></div>
				<div class="text-center mb-5">Pimpinan</div>
				<div class="text-center">Afni</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<button onclick="printContent('cetakslip')" class="btn btn-success"><i class="fa fa-print"></i> Cetak</button>
	<?php } else {
		echo "<div class='alert alert-danger'>";
		if($_POST['bulan']=='nol'){
			echo "<i class='fa fa-close'></i> Data tidak ditemukan!";
		} else {
			echo "<i class='fa fa-exclamation-triangle'></i> Pegawai ini belum di gaji pada bulan ". bulan($_POST['bulan']);
		}
	} } ?>
	</div>
</div>