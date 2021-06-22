<h3>Edit Data Produk</h3>
<?php

$id = $_GET['id'];
$ambil = $Koneksi->query("SELECT * FROM produk where id_produk='$id'");
$pecah = $ambil->fetch_assoc();

?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk'] ?>">
	</div>		
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'] ?>">
	</div>	
	<div class="form-group">
		<label>Berat (Gr)</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk'] ?>">
	</div>	
	<div class="form-group">
		<img src="../images_produk/<?php echo $pecah['gambar_produk']; ?>" width="200" height="150">
	</div>
	<div class="form-group">
		<label>Ganti Gambar</label>
		<input type="file" name="gambar" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi Produk</label>
		<textarea name="deskripsi" class="form-control" rows="5"><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Stok</label>
		<input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok'] ?>">
	</div>	
	<button class="btn btn-primary" type="submit" name="save">Simpan</button>
	<a href="index.php?halaman=produk" class="btn btn-warning">Kembali</a>
</form>

<?php 
require '../koneksi.php';
if (isset($_POST['save'])) {
	$nama_gambar = $_FILES['gambar']['name'];
	$lokasi = $_FILES['gambar']['tmp_name'];

	$nama = $_POST['nama'];
	$harga = $_POST['harga'];
	$berat = $_POST['berat'];
	$deskripsi = $_POST['deskripsi'];
	$stok = $_POST['stok'];

	if (!empty($lokasi)) {
		move_uploaded_file($lokasi, "../images_produk/".$nama_gambar);

		mysqli_query($Koneksi, "UPDATE produk set nama_produk='$nama', harga_produk='$harga', berat_produk='$berat', gambar_produk='$nama_gambar', deskripsi_produk='$deskripsi', stok='$stok' where id_produk='$id' ");

	}else{
		mysqli_query($Koneksi, "UPDATE produk set nama_produk='$nama', harga_produk='$harga', berat_produk='$berat', deskripsi_produk='$deskripsi', stok='$stok' where id_produk='$id' ");

	}
	
	echo "<script>alert('Data berhasil diubah');</script>";
	echo "<script>location='index.php?halaman=produk'</script>";
}
?>	