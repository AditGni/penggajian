<?php
if(!empty($_GET['mod'])){
	$mod = $_GET['mod'];
	if($mod=='tambah-gol' || $mod=='update-gol'){
		include "halaman/golongan/golinput.php";
	}
} else {
	echo '<div class="col-md-12">';
	$query = mysql_query("SELECT * FROM golongan");
	$row = mysql_num_rows($query);
	if($row > 0){?>
	<div class="card" id="gol">
		<h5 class="card-header">Golongan</h5>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-sm">
					<thead>
						<tr>
							<th>No</th>
							<th>Golongan</th>
							<th>Gaji Pokok</th>
							<th>Tunj. Suami/Istri</th>
							<th>Tunj. Anak</th>
							<th>Tunj. Eselon</th>
							<th>Tunj. Beras</th>
							<th>Tunj. BPJS</th>
							<th>Pembulatan</th>
							<th>Potongan BPJS</th>
							<th>Potongan IWP 2%</th>
							<th>Potongan IWP 8%</th>
							<th>Potongan Taperum</th>
							<th>Gaji Bersih</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$tot = 0;
						while($d = mysql_fetch_assoc($query)){?>
						<tr>
							<td><?php echo $no++;?></td>
							<td><?php echo $d['golongan'];?></td>
							<td><?php echo number_format($d['gaji_pokok']);?></td>
							<td><?php echo number_format($d['tunj_ismi']);?></td>
							<td><?php echo number_format($d['tunj_anak']);?></td>
							<td><?php echo number_format($d['tunj_eselon']);?></td>
							<td><?php echo number_format($d['tunj_beras']);?></td>
							<td><?php echo number_format($d['tunj_bpjs']);?></td>
							<td><?php echo $d['pembulatan'];?></td>
							<td><?php echo number_format($d['pot_bpjs']);?></td>
							<td><?php echo number_format($d['pot_iwp2']);?></td>
							<td><?php echo number_format($d['pot_iwp8']);?></td>
							<td><?php echo number_format($d['pot_taperum']);?></td>
							<?php
							$gaji = $d['gaji_pokok'] + $d['tunj_ismi'] + $d['tunj_anak'] + $d['tunj_eselon'] + $d['tunj_beras'] + $d['tunj_bpjs'] + $d['pembulatan'];
							$pot = $d['pot_bpjs'] + $d['pot_iwp2'] + $d['pot_iwp8'] + $d['taperum'];
							$tot += $gaji+$pot;
							?>
							<td><?php echo number_format($gaji+$pot);?></td>
							<td class="btn-group">
								<a href="?pg=golongan&mod=update-gol&id=<?php echo $d['id_gol'];?>" class="btn btn-primary">Edit</a>
								<a href="?pg=proses&mod=hapus-gol&id=<?php echo $d['id_gol'];?>" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapusnya?')">Hapus</a></td>
						</tr>
						<?php } ?>
						<tr>
							<td colspan="12" class="text-center font-weight-bold">Total</td>
							<td colspan="2" class="text-right font-weight-bold">Rp. <?php echo number_format($tot);?></td>
						</tr>
					</tbody>
				</table>
			</div>
			<a href="?pg=golongan&mod=tambah-gol" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
			<button class="btn btn-danger" onclick="printContent('printed')"><i class="fa fa-print"></i> Cetak</button>
		</div>
	</div>
<?php } else { ?>
	<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Data golongan masih kosong, Input <a href="?pg=golongan&mod=tambah-gol">disini</a></div>
<?php } } ?>
</div>

<div id="printed">
	<?php
	$query = mysql_query("SELECT * FROM golongan");
	$row = mysql_num_rows($query);?>
	<div class="card">
		<div class="h3 text-monospace text-center"><i class="fa fa-microchip"></i> Golongan</div>
		<div class="card-body">
			<table class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th>No</th>
						<th>Golongan</th>
						<th>Gaji Pokok</th>
						<th>Tunj. Suami/Istri</th>
						<th>Tunj. Anak</th>
						<th>Tunj. Eselon</th>
						<th>Tunj. Beras</th>
						<th>Tunj. BPJS</th>
						<th>Pembulatan</th>
						<th>Potongan BPJS</th>
						<th>Potongan IWP 2%</th>
						<th>Potongan IWP 8%</th>
						<th>Potongan Taperum</th>
						<th>Gaji Bersih</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					$tot = 0;
					while($d = mysql_fetch_assoc($query)){?>
					<tr>
						<td><?php echo $no++;?></td>
						<td><?php echo $d['golongan'];?></td>
						<td><?php echo number_format($d['gaji_pokok']);?></td>
						<td><?php echo number_format($d['tunj_ismi']);?></td>
						<td><?php echo number_format($d['tunj_anak']);?></td>
						<td><?php echo number_format($d['tunj_eselon']);?></td>
						<td><?php echo number_format($d['tunj_beras']);?></td>
						<td><?php echo number_format($d['tunj_bpjs']);?></td>
						<td><?php echo $d['pembulatan'];?></td>
						<td><?php echo number_format($d['pot_bpjs']);?></td>
						<td><?php echo number_format($d['pot_iwp2']);?></td>
						<td><?php echo number_format($d['pot_iwp8']);?></td>
						<td><?php echo number_format($d['pot_taperum']);?></td>
						<?php
						$gaji = $d['gaji_pokok'] + $d['tunj_ismi'] + $d['tunj_anak'] + $d['tunj_eselon'] + $d['tunj_beras'] + $d['tunj_bpjs'] + $d['pembulatan'];
						$pot = $d['pot_bpjs'] + $d['pot_iwp2'] + $d['pot_iwp8'] + $d['taperum'];
						$tot += $gaji+$pot;
						?>
						<td><?php echo number_format($gaji+$pot);?></td>
					</tr>
					<?php } ?>
					<tr>
						<td colspan="12" class="text-center font-weight-bold">Total</td>
						<td colspan="2" class="text-right font-weight-bold">Rp. <?php echo number_format($tot);?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>