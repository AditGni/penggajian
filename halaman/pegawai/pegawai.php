<?php
if(!empty($_GET['mod'])){
	$mod = $_GET['mod'];
	if($mod=='tambah-peg' || $mod=='update-peg'){
		include "halaman/pegawai/tambahedit.php";
	}
} else {
	echo '<div class="col-md-12">';
	$query = mysql_query("SELECT * FROM pegawai a, golongan b WHERE a.id_gol=b.id_gol");
	$row = mysql_num_rows($query);
	if($row > 0){
?>
	<div class="card">
		<h5 class="card-header">Data Pegawai</h5>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover table-sm">
					<thead>
						<tr>
							<th>No</th>
							<th>NIP</th>
							<th>NPWP</th>
							<th>Nama Lengkap</th>
							<th>Jabatan</th>
							<th>Golongan</th>
							<th>Tempat/Tanggal Lahir</th>
							<th>Status</th>
							<th>Anak</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$p = 1;
						while($t = mysql_fetch_assoc($query)){?>
							<tr>
								<td><?php echo $p++;?></td>
								<td><?php echo $t['nip'];?></td>
								<td><?php echo $t['npwp'];?></td>
								<td><?php echo ucwords($t['nama']);?></td>
								<td><?php echo ucfirst($t['jabatan']);?></td>
								<td><?php echo $t['golongan'];?></td>
								<td><?php echo $t['tmptlhr'].', '. date('d-m-Y', strtotime($t['tgllhr']));?></td>
								<td><?php echo ($t['status']=='y') ? 'Kawin' : 'Belum Kawin';?></td>
								<td><?php echo $t['anak'];?></td>
								<td class="btn-group">
									<a href="?pg=daftar-pegawai&mod=update-peg&nip=<?php echo $t['nip'];?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i></a>
									<a href="?pg=proses&mod=del-peg&nip=<?php echo $t['nip'];?>" class="btn btn-danger" onclick='return confirm("Anda yakin ingin menghapus data ini?")'><i class="fa fa-trash"></i></a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<a href="?pg=daftar-pegawai&mod=tambah-peg" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah</a>
		</div>
	</div>
<?php } else {
	echo "<div class='alert alert-danger'><i class='fa fa-exclamation-triangle'></i> Data pegawai masih kosong, input <a href='?pg=daftar-pegawai&mod=tambah-peg'>disini</a>";
} } ?>
</div>