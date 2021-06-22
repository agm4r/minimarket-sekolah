<h2 class="text-center">Detail Pembelian</h2>
<?php 
require '../koneksi.php';
$ambil = $Koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
		on pembelian.id_pelanggan = pelanggan.id_pelanggan 
		where pembelian.id_pembelian = '$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['nama_pelanggan']; ?></strong><p>

<p>
	Telepon : <?php echo $detail['telepon_pelanggan']; ?> <br>
	Email &nbsp;&nbsp;&nbsp; : <?php echo $detail['email_pelanggan']; ?>
</p>
<p>
	Tanggal : <?php echo date("d F Y", strtotime($detail['tanggal_pembelian'])); ?> <br>
	Total &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo "Rp. ". number_format($detail['total_pembelian']); ?>
</p>

<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Produk</th>
			<th>Harga Produk</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
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