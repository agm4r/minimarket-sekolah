<h3 class="text-center">Data Pembelian</h3>

<form action="" method="post">
	<input class="form-group has-feedback" type="text" size="30" name="keyword" autofocus placeholder=" cari.." autocomplete="off">
	<button class="btn btn-primary" type="submit" name="cari">Cari</button>	
</form>

<br><br>

<table class="table table-bordered text-center">
	<thead>
		<tr>
			<th>No.</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php 
				$no = 1;
				$data = mysqli_query($Koneksi, "SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan order by id_pembelian desc" );

				if (isset($_POST['cari'])) {
					$data = $Koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan = pelanggan.id_pelanggan where nama_pelanggan = '$_POST[keyword]' order by id_pembelian desc");
				}
				
				while ($d = mysqli_fetch_array($data)) {
			 ?>	
			<td><?php echo $no; ?></td>
			<td><?php echo $d['nama_pelanggan']; ?></td>
			<td><?php echo date("d F Y", strtotime($d['tanggal_pembelian'])); ?></td>
			<td><?php echo "Rp. ". number_format($d['total_pembelian']); ?></td>
			<td><a href="index.php?halaman=detail&id=<?php echo $d['id_pembelian']; ?>" class="btn btn-success">Detail</a></td>
		</tr>
		<?php $no++ ?>
		<?php } ?>
	</tbody>
</table>