<h3 class="text-center">Data Pelanggan</h3>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Pelanggan</th>
			<th>Telepon</th>
			<th>Kelas</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
				$no = 1;
				$ambil = $Koneksi->query("SELECT * FROM pelanggan join kelas on pelanggan.id_kelas = kelas.id_kelas ");
				while ($pecah = $ambil->fetch_assoc()) {
			 ?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td><?php echo $pecah['nama_kelas']; ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>