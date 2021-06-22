<?php 
session_start();
require 'koneksi.php';
?>
 <!-- Agmar Putra
XI RPL B -->
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Minimarket | Beranda</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="admin/LTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
 <body>
 	<!-- Navbar -->
 	<nav class="navbar navbar-default">
 		<div class="container">
 			<ul class="nav navbar-nav">
 				<li><a href="index.php">Home</a></li>
 				<li><a href="keranjang.php">Keranjang</a></li>
 				<!-- Jika sudah login (ada session pelanggan) -->
 				<?php if (isset($_SESSION['pelanggan'])) : ?>
 					<li><a href="logout.php" onclick="return confirm('Apakah anda yakin untuk logout?')">Logout</a></li>

 				<!-- Jika belum login (belum ada session pelanggan) -->
 				<?php else: ?>
 					<li><a href="login.php">Login</a></li>
 				<?php endif ?>
 				<li><a href="checkout.php">Checkout</a></li>
 			</ul>
 		</div>						
 	</nav>

 	<!-- content -->
 	<section class="konten">
 		<div class="container">
 			<h3>Produk Minimarket</h3>
 			<div class="row">
 				<?php 
 				$ambil = $Koneksi->query("SELECT * FROM produk where stok > 0");
 				while ($produk = $ambil->fetch_assoc()) {
 				?>
 				<div class="col-md-4">
 					<div class="thumbnail">
 						<img src="images_produk/<?php echo $produk['gambar_produk'] ?>" width="400" height="200">
 						<div class="caption text-center">
 							<h4><?php echo $produk['nama_produk'] ?></h4>
 							<h6><?php echo "Rp. ". number_format($produk['harga_produk']) ?></h6>
 							<a href="beli.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-success">Beli Sekarang</a>
 							<a href="tambah.php?id=<?php echo $produk['id_produk']; ?>" class="btn btn-default">Tambahkan ke keranjang</a>
 						</div>
 					</div>
 				</div>
 			<?php } ?>
 			</div>
 		</div>
 	</section>
</body>
</html>