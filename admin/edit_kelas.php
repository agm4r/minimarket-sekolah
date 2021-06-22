<h3>Edit Kelas</h3>
<?php

$id = $_GET['id'];
$ambil = $Koneksi->query("SELECT * FROM kelas where id_kelas='$id'");
$pecah = $ambil->fetch_assoc();

?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kelas</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_kelas'] ?>">
	</div>
	<button class="btn btn-primary" type="submit" name="save">Simpan</button>
	<a href="index.php?halaman=kelas" class="btn btn-warning">Kembali</a>
</form>

<?php 
require '../koneksi.php';
if (isset($_POST['save'])) {

	$nama = $_POST['nama'];;

	$Koneksi->query("UPDATE kelas set nama_kelas = '$nama' where id_kelas = '$id' ");
	
	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=kelas'</script>";
}
?>	