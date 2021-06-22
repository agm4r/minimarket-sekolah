<?php 
session_start(); 
require 'koneksi.php';

if (!isset($_SESSION['pelanggan'])) {
	echo "<script> var confirm = confirm('Login untuk melanjutkan checkout');
			if(confirm == 1) {
				location='login.php';
				}else{
					location='keranjang.php'
				}
		</script>";
	echo "<script></script>";
}
?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Minimarket | Checkout</title>
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
 						<td class="text-center">Jumlah</td>
 						<td class="text-center">Total</td>
 					</tr>
 				</thead>
 				<tbody>
 					<?php
 					$no = 1;
 					$total_belanja = 0;
 					foreach ($_SESSION['keranjang'] as $id => $jumlah) {
 						$ambil = $Koneksi->query("SELECT * FROM produk where id_produk='$id'");
 						$pecah = $ambil->fetch_assoc();
 						$total = $jumlah * $pecah['harga_produk'];
 					?>	
 					<tr>
 						<td><?php echo $no ?></td>
 						<td><?php echo $pecah['nama_produk']; ?></td>
 						<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
 						<td><?php echo $pecah['berat_produk']; ?></td>
	 					<td><?php echo $pecah['deskripsi_produk']; ?></td>
 						<td><?php echo $jumlah; ?></td>
 						<td>Rp. <?php echo number_format($total); ?></td>
 					</tr>
 				<?php $no++ ?>
 				<?php $total_belanja += $total ?>
 				<?php } ?>
 				</tbody>
 				<tfoot>
 					<th class="text-center" colspan="6">Total</th>
 					<th class="text-center">Rp. <?php echo number_format($total_belanja + 2000); ?> (Termasuk Ongkir)</th>
 				</tfoot>
 			</table>

 			<label>Info pelanggan</label>
 			<form method="post" action="">
 				<div class="row">
 					<div class="col-md-4">
 						<div class="form-group">
 							<input type="text" name="nama" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['nama_pelanggan'] ?>">
 						</div>
 					</div>
 					<div class="col-md-4">
 						<div class="form-group">
 							<?php
 							$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
 							$kelas = $Koneksi->query("SELECT * FROM pelanggan join kelas on pelanggan.id_kelas = kelas.id_kelas where pelanggan.id_pelanggan='$id_pelanggan' ");
 							$d = $kelas->fetch_assoc();
 							?>
 							<input type="text" name="nama" readonly class="form-control text-center" value="<?php echo $d['nama_kelas']; ?>">
 						</div>
 					</div>
 					<div class="col-md-4">
 						<div class="form-group">
 							<input type="text" name="nama" readonly class="form-control text-center" value="<?php echo $_SESSION['pelanggan']['telepon_pelanggan'] ?>">
 						</div>
 					</div>
 				</div>
 				<button class="btn btn-success" name="checkout">Beli</button>
 			</form>
 			<?php
 			if (isset($_POST['checkout'])) {
 				$tanggal_pembelian = date("Y-m-d");
 				$total_pembelian = $total_belanja + 2000;

 				//Menyimpan ke table pembelian
 				$Koneksi->query("INSERT INTO pembelian values('','$id_pelanggan', '$tanggal_pembelian', '$total_pembelian') ");

 				$id_pembelian = $Koneksi->insert_id;

 				foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
 					$Koneksi->query("INSERT INTO pembelian_produk values('', '$id_pembelian', '$id_produk', '$jumlah') ");

 					//mengedit stok data
 					$data = $Koneksi->query("SELECT * FROM produk where id_produk = '$id_produk' ");
 					while ($d = $data->fetch_assoc()) {
 					$Koneksi->query("UPDATE produk set stok = stok - $jumlah where id_produk = $d[id_produk]");
 						
 					}
 				}

 				header("location: nota.php?id=$id_pembelian");
 			}
 			?>
 		</div>
 	</section>
 </body>
 </html>