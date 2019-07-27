<?php
$bul = $_POST['bulan'];
$sql = mysql_query("SELECT a.tglgaji,b.nip,b.nama,b.npwp,b.jabatan,c.golongan,a.gajipokok,a.potongan,a.gaji_bersih FROM penggajian a, pegawai b, golongan c WHERE a.nip=b.nip and b.id_gol=c.id_gol and MONTH(a.tglgaji)='$bul'");
$r = mysql_num_rows($sql);
if($r){
?>
<h2 class="text-center text-monospace mb-5"><i class="fa fa-envelope-open-o"></i> Laporan Penggajian</h2>
<table class="table table-bordered table-striped table-hover table-sm">
	<thead>
		<tr>
			<th>No</th>
			<th>Tgl Gaji</th>
			<th>NIP</th>
			<th>Nama Pegawai</th>
			<th>NPWP</th>
			<th>Golongan</th>
			<th>Jabatan</th>
			<th>Gaji Pokok</th>
			<th>Potongan</th>
			<th>Gaji Bersih</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 1;
		while($d = mysql_fetch_assoc($sql)){?>
		<tr>
			<td><?php echo $i++;?></td>
			<td><?php echo $d['tglgaji'];?></td>
			<td><?php echo $d['nip'];?></td>
			<td><?php echo $d['nama'];?></td>
			<td><?php echo $d['npwp'];?></td>
			<td><?php echo $d['golongan'];?></td>
			<td><?php echo $d['jabatan'];?></td>
			<td>Rp.<?php echo number_format($d['gajipokok']);?></td>
			<td>Rp.<?php echo number_format($d['potongan']);?></td>
			<td>Rp.<?php echo number_format($d['gaji_bersih']);?></td>
		</tr>
	<?php } ?>
	</tbody>
</table>
<?php } ?>