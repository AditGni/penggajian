<div class="col-md-12">
	<h3 class="mb-5 card-header text-center"><i class="fa fa-user"></i> Laporan Pegawai</h3>
	<table class="table table-bordered table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>NIP</th>
				<th>Nama Pegawai</th>
				<th>NPWP</th>
				<th>Tempat/Tgl Lahir</th>
				<th>Golongan</th>
				<th>Jabatan</th>
				<th>Status</th>
				<th>anak</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$query = mysql_query("SELECT * FROM pegawai a, golongan b where a.id_gol=b.id_gol order by 1");
			$no = 1;
			while($data = mysql_fetch_array($query)){?>
			<tr>
				<td><?php echo $no++;?></td>
				<td><?php echo $data['nip'];?></td>
				<td><?php echo $data['nama'];?></td>
				<td><?php echo $data['npwp'];?></td>
				<td><?php echo $data['tmptlhr'].", ".date('d-m-Y',strtotime($data['tgllhr']));?></td>
				<td><?php echo $data['golongan'];?></td>
				<td><?php echo $data['jabatan'];?></td>
				<td>
					<?php if($status='y'){
						echo "Kawin";
					} else {
						echo "Belum Kawin";
					}?>
				</td>
				<td><?php echo $data['anak'];?></td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>