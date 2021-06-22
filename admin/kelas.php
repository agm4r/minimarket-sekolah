<h3 class="text-center">Data Kelas</h3>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Kelas</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
				$no = 1;
				$data = mysqli_query($Koneksi, "SELECT * FROM kelas");
				while ($d = mysqli_fetch_array($data)) {
			 ?>	
			<td><?php echo $no; ?></td>
			<td><?php echo $d['nama_kelas']; ?></td>
			<td>
				<a href="index.php?halaman=edit_kelas&id=<?php echo $d['id_kelas']; ?>" class="btn btn-success">Edit</a>
				<a href="index.php?halaman=hapus_kelas&id=<?php echo $d['id_kelas']; ?>" onclick="return confirm('Apakah anda yakin ingin mengahapus data <?php echo $d['nama_produk']; ?>')" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php $no++ ?>
		<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambah_kelas" class="btn btn-primary">[+] Tambah Kelas</a>