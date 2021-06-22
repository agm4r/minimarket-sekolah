<?php 
session_start(); 
require 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Minimarket | Keranjang</title>
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

 	<section class="konten">
 		<div class="container">
 			<h3>Keranjang Belanja</h3>
 			<table class="table table-bordered text-center">
 				<thead>
 					<tr>
 						<td class="text-center">No</td>
 						<td class="text-center">Produk</td>
 						<td class="text-center">Harga</td>
 						<td class="text-center">Berat (Gr)</td>
 						<td class="text-center">Deskripsi</td>
 						<td class="text-center">Stok Tersedia</td>
 						<td class="text-center">Jumlah</td>
 						<td class="text-center">Total</td>
 						<td class="text-center">Aksi</td>
 					</tr>
 				</thead>
 				<tbody>
 					<?php
 						$no = 1;
	 					foreach ($_SESSION['keranjang'] as $id => $jumlah) {
	 						$ambil = $Koneksi->query("SELECT * FROM produk where id_produk='$id'");
	 						$pecah = $ambil->fetch_assoc();
	 						$total = $jumlah * $pecah['harga_produk'];

 					?>
	 					<tr>
	 						<td><?php echo $no++ ?></td>
	 						<td><?php echo $pecah['nama_produk']; ?></td>
	 						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
	 						<td><?php echo $pecah['berat_produk']; ?></td>
	 						<td><?php echo $pecah['deskripsi_produk']; ?></td>
	 						<td><?php echo $pecah['stok']; ?></td>
	 						<td><?php echo $jumlah; ?></td>
	 						<td>Rp. <?php echo number_format($total); ?></td>
	 						<td>
	 							<a href="hapus.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-default btn-xs">Hapus</a>
	 							<a href="hapus_semua.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Apakah yakin ingin menghapus produk ini?')">Hapus Semua</a>
	 						</td>
	 					</tr>
 				<?php } ?>
 				</tbody>
 			</table>
 			<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
 			<a href="checkout.php" class="btn btn-success">Checkout</a>
 			</div>
 	</section>
 </body>
 </html>