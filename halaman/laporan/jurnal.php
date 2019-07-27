
<div class="col-md-12">
	<!-- <label class="label">Bulan:</label>
	<form action="" method="POST">
		<select class="form-control col-md-2 d-inline" name="bulan">
			<?php
			$pop = mysql_query("SELECT * FROM penggajian GROUP BY MONTH(tglgaji)");
			while($d = mysql_fetch_array($pop)){
				$tgl = (int) date('m', strtotime($d['tglgaji']));
			?>
				<option value="<?= $tgl;?>" <?= ($_POST['bulan']==$tgl) ? 'selected' : '';?>><?= bulan($tgl);?></option>
			<?php } ?>
		</select>
		<button type="submit" name="cek" value="ada" class="btn btn-primary"><i class="fa fa-eye"></i> Cek</button>
	</form> -->
	<?php
	if(!empty($_POST['cek'])){
		$bul = $_POST['bulan'];
		$sql = mysql_query("SELECT SUM(a.tunj_ismi) as istri, SUM(a.tunj_anak) as anak,SUM(a.tunj_eselon) as ese, SUM(a.tunj_beras) as beras, SUM(a.tunj_bpjs) as bpjs, SUM(a.pembulatan) as bulat, SUM(a.gaji_pokok) as gaji FROM golongan a, pegawai b, penggajian c WHERE a.id_gol=b.id_gol AND b.nip=c.nip AND MONTH(c.tglgaji)='$bul'");
		$r = mysql_num_rows($sql);
		$d = mysql_fetch_array($sql);
		$tunjangan = $d['istri'] + $d['anak'] + $d['ese'] + $d['beras'] + $d['bpjs'] + $d['bulat'];
		$gaji = $d['gaji'];

		// cari jumlah potongan
		$sql = mysql_query("SELECT SUM(potongan) as pot FROM penggajian WHERE MONTH(tglgaji)='$bul'");
		$dt = mysql_fetch_array($sql);
		if($r > 0){
	?>
	<h3 class="mb-5 card-header text-center"><i class="fa fa-credit-card"></i> Jurnal Penggajian</h3>
	<p>Periode: <?= ucfirst(bulan($bul))." ".date('Y');?></p>
	<table class="table table-bordered">
		<thead>
			<tr class="border">
				<th>No Perkiraan</th>
				<th>Nama Perkiraan</th>
				<th>Debit</th>
				<th>Kredit</th>
			</tr>
			<tr>
				<th colspan="4">Gorontalo</th>
			</tr>
		</thead>
		<tbody>
			<tr class="border">
				<td>10011</td>
				<td>Gaji</td>
				<td><?= number_format($gaji);?></td>
				<td>0</td>
			</tr>
				<td>10013</td>
				<td>Tunjangan PPh 21</td>
				<td><?= number_format($tunjangan);?></td>
				<td>0</td>
			</tr>
				<td>10014</td>
				<td>PPh 21 Seluruh Penghasilan</td>
				<td>0</td>
				<td><?= number_format($dt['pot']);?></td>
			</tr>
				<td>1101</td>
				<td>Bank BCA</td>
				<td>0</td>
				<td><?= number_format(($gaji + $tunjangan) - $dt['pot']);?></td>
			</tr>
			<tr>
				<td colspan="2">Total</td>
				<td><?= number_format($gaji + $tunjangan);?></td>
				<td><?= number_format($gaji + $tunjangan);?></td>
			</tr>
		</tbody>
	</table>
<?php } };?>
</div>