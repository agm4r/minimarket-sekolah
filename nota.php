<?php 
session_start();
require 'koneksi.php';

if (!isset($_SESSION['keranjang'])) {
	echo "<script>alert('Tidak ada data checkout. Lakukan pembelian produk dan coba lagi!');
		location='index.php';
		</script>";
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
<h2 class="text-center">Nota Pembelian</h2>
<!-- Agmar Putra
XI RPL B -->
<section class="konten">
	<div class="container">
		<?php
		$ambil = $Koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
		on pembelian.id_pelanggan = pelanggan.id_pelanggan 
		where pembelian.id_pembelian = '$_GET[id]'");
		$detail = $ambil->fetch_assoc();

		$data = $Koneksi->query("SELECT * from pelanggan join kelas on pelanggan.id_kelas = kelas.id_kelas where id_pelanggan = '$detail[id_pelanggan]' ");
		$kelas = $data->fetch_assoc();
		?>

		<strong><?php echo $detail['nama_pelanggan']; ?></strong><p>

		<p>
			Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
			Email &nbsp;&nbsp;&nbsp; : <?php echo $detail['email_pelanggan']; ?><br>
			Kelas &nbsp;&nbsp;&nbsp; : 	<?php echo $kelas['nama_kelas']; ?>
		</p>
		<p>
			Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_pembelian'])); ?> <br>
			Total &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo "Rp. ". number_format($detail['total_pembelian']); ?>
		</p>

		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th class="text-center">No.</th>
					<th class="text-center">Nama Produk</th>
					<th class="text-center">Harga Produk</th>
					<th class="text-center">Jumlah</th>
					<th class="text-center">Subtotal</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					$data = $Koneksi->query("SELECT * FROM pembelian_produk 
							join produk on pembelian_produk.id_produk = produk.id_produk 
							where pembelian_produk.id_pembelian = '$_GET[id]'");
					while ($pecah = $data->fetch_assoc()) { 
				?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $pecah['nama_produk']; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
					<td><?php echo $pecah['jumlah']; ?></td>
					<td>Rp. <?php echo number_format($pecah['harga_produk'] * $pecah['jumlah']); ?></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-6 alert alert-success">
				<h4>Berhasil Membeli Produk</h4>
				<p>Petugas Minimarket akan segera datang ke kelas anda. Tunggu dan lakukan pembayaran.</p>
			</div>
		</div>
		<a href="hapus_keranjang.php">back</a>
	</div>
</section>


</table>
</body>
</html>