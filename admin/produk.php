<h3 class="text-center">Data produk</h3>
<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Gambar</th>
			<th>Deskripsi</th>
			<th>stok</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
				$no = 1;
				$ambil = $Koneksi->query("SELECT * FROM produk");
				while ($pecah = $ambil->fetch_assoc()) {
			 ?>
			<td><?php echo $no++; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo "Rp. ". number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['berat_produk']. "(Gr)"; ?></td>
			<td>
				<img src="../images_produk/<?php echo $pecah['gambar_produk']; ?>" width="150" height="100">
			</td>
			<td><?php echo $pecah['deskripsi_produk']; ?></td>
			<td><?php echo $pecah['stok']; ?></td>
			<td>
				<a href="index.php?halaman=edit_produk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-primary">Edit</a>
				<a href="index.php?halaman=hapus_produk&id=<?php echo $pecah['id_produk']; ?>" onclick="return confirm('Apakah anda yakin ingin mengahpus data <?php echo $pecah['nama_produk']; ?>')" class="btn btn-danger">Hapus</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<a href="index.php?halaman=tambah_produk" class="btn btn-primary">[+] Tambah Produk</a>