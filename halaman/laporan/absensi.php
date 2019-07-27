<?php if(!empty($_POST['bulan'])){
	$bulan = $_POST['bulan'];
	$sql = mysql_query("SELECT * FROM pegawai GROUP BY nip");
	$r = mysql_num_rows($sql);
	if($r > 0) {
	?>
<h4 class="text-center text-monospace mb-5"><i class="fa fa-calendar"></i> Laporan Absensi Bulan <?php echo bulan($bulan);?></h4>
<table class="table table-bordered table-hover table-sm">
	<thead>
		<tr class="text-center align-middle">
			<th rowspan="3" class="align-middle">No</th>
			<th rowspan="3" class="align-middle">Tgl Absen</th>
			<th colspan="4">Absensi</th>
		</tr>
		<tr class="text-center">
			<th rowspan="2" class="align-middle">Hadir</th>
			<th colspan="2">Cuti</th>
			<th rowspan="2" class="align-middle">Alpa</th>
		</tr>
		<tr class="text-center">
			<th>Sakit</th>
			<th>Izin</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		while($d = mysql_fetch_assoc($sql)){
		$tgl = date('Y-m-d', strtotime($d['tglabsen']));
		$q = mysql_query("SELECT IFNULL((select count(*) from absen where absen='h' AND MONTH(tglabsen)='$bulan' AND nip='$d[nip]'GROUP BY nip),0) as hadir, IFNULL((select count(*) from absen where absen='s' AND MONTH(tglabsen)='$bulan' AND nip='$d[nip]'GROUP BY nip),0) as sakit, IFNULL((select count(*) from absen where absen='i' AND MONTH(tglabsen)='$bulan' AND nip='$d[nip]'GROUP BY nip),0) as izin, IFNULL((select count(*) from absen where absen='a' AND MONTH(tglabsen)='$bulan' AND nip='$d[nip]'GROUP BY nip),0) as alpa from pegawai");
		$dt = mysql_fetch_assoc($q);
		?>
		<tr class="text-center">
			<td width="50"><?php echo $no++;?></td>
			<td class="text-left"><?php echo $d['nama'];?></td>
			<td><?php echo $dt['hadir'];?></td>
			<td><?php echo $dt['sakit'];?></td>
			<td><?php echo $dt['izin'];?></td>
			<td><?php echo $dt['alpa'];?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<!-- <p class="small">*Berdasakan hari kerja</p> -->
<?php } else {
	echo "<div class='alert alert-danger'>Belum ada data absensi pada bulan ".bulan($bulan)."</div>";
} } ?>