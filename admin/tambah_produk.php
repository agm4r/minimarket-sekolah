<h3 class="text-center">Tambah Produk</h3>
<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<div class="form-group">
		<label for="harga">Harga (Rp)</label>
		<input type="number" name="harga" class="form-control">
	</div>
	<div class="form-group">
		<label for="berat">Berat (Gr)</label>
		<input type="number" name="berat" class="form-control">
	</div>
	<div class="form-group">
		<label for="deskripsi">Deskripsi</label>
		<textarea type="text" name="deskripsi" cols="3" rows="5" class="form-control"></textarea>
	</div>
	<div class="form-group">
		<label for="stok">Stok</label>
		<input type="number" name="stok" class="form-control">
	</div>
	<div class="form-group">
		<label for="gambar">Gambar</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<button class="btn btn-primary" type="submit" name="submit"> Simpan</button>
	<a href="index.php?halaman=produk" class="btn btn-warning">Kembali</a>
</form>

<?php 
require '../koneksi.php';
if (isset($_POST['submit'])) {
	$nama_gambar = $_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];
	move_uploaded_file($lokasi, "../images_produk/". $nama_gambar);

	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$berat = $_POST['berat'];
	$deskripsi = $_POST['deskripsi'];
	$stok = $_POST['stok'];

	$Koneksi->query("INSERT INTO produk values('', '$nama', '$harga', '$berat', '$nama_gambar', '$deskripsi', '$stok') ");

	echo "<br><div class='alert alert-success text-center'>Data berhasil disimpan</div>
";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>