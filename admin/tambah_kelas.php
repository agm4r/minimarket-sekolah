<h3 class="text-center">Tambah Kelas</h3>
<form method="post" action="" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nama">Nama</label>
		<input type="text" name="nama" class="form-control">
	</div>
	<button class="btn btn-primary" type="submit" name="submit"> Simpan</button>
	<a href="index.php?halaman=kelas" class="btn btn-warning">Kembali</a>
</form>

<?php 
require '../koneksi.php';
if (isset($_POST['submit'])) {

	$nama = $_POST['nama'];
	
	$Koneksi->query("INSERT INTO kelas values('', '$nama') ");

	echo "<br><div class='alert alert-success text-center'>Data berhasil disimpan</div>
";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kelas'>";
}
?>