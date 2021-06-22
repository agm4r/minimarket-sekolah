<?php require 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Minimarket | Daftar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="admin/LTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
 <body>
 	<div class="container" style="margin-top: 100px;">
 		<div class="row">
 			<div class="col-md-8 col-md-offset-2">
 				<div class="panel panel-default">
 					<div class="panel-heading">
 						<h3 class="panel-title text-center"><b>Minimarket | Daftar Pelanggan</b></h3>
 					</div>
 					<div class="panel-body">
 						<form method="post" class="form-horizontal" action="">
 							<div class="form-group">
 								<label class="col-md-3 control-label">Nama</label>
 								<div class="col-md-6">
 									<input type="text" class="form-control" name="nama" required>
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-md-3 control-label">Email</label>
 								<div class="col-md-6">
 									<input type="email" class="form-control" name="email" required>
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-md-3 control-label">Password</label>
 								<div class="col-md-6">
 									<input type="password" class="form-control" name="password" required>
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-md-3 control-label">Konfirmasi Password</label>
 								<div class="col-md-6">
 									<input type="password" class="form-control" name="password2" required>
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-md-3 control-label">Kelas</label>
 								<div class="col-md-6">
 									<select class="form-control" name="kelas" required>
 										<?php
 										$ambil = $Koneksi->query("SELECT * FROM kelas");
 										while ($d = $ambil->fetch_assoc()) { ?>
 										<option><?php echo $d['nama_kelas']; ?></option>
 									<?php } ?>
 									</select>
 								</div>
 							</div>
 							<div class="form-group">
 								<label class="col-md-3 control-label">Telepon</label>
 								<div class="col-md-6">
 									<input type="text" class="form-control" name="telepon" required>
 								</div>
 							</div>
 							<div class="form-group">
 								<div class="col-md-6 col-md-offset-3">
 									<button class="btn btn-primary btn-block btn-lg" type="submit" name="daftar">Daftar</button>
 								</div>
 							</div>
 						</form>
 						<?php 
 						if (isset($_POST['daftar'])) {
 							$nama = $_POST['nama'];
 							$email = $_POST['email'];
 							$password = $_POST['password'];
 							$password2 = $_POST['password2'];
 							$kelas = $_POST['kelas'];
 							$telepon = $_POST['telepon'];

 							$ambil = $Koneksi->query("SELECT * FROM kelas where nama_kelas = '$kelas' ");
 							$d = $ambil->fetch_assoc();

 							$id_kelas = $d['id_kelas'];

 							//cek apakah email sudah digunakan atau belum
 							$data = $Koneksi->query("SELECT * FROM pelanggan where email_pelanggan = '$email' ");
 							$cocok = $data->num_rows;

 							if ($cocok == 1){
 								echo "<script>alert('Pendaftaran Gagal! Email Sudah Digunakan');</script>";
 								echo "<script>location = 'daftar.php';</script>";
 							}elseif ($password != $password2) {
 								echo "<script>alert('Password Tidak Cocok!');</script>";
 								echo "<script>location = 'daftar.php';</script>";
 							}else{
 								$Koneksi->query("INSERT INTO pelanggan values ('', '$email', '$password', '$nama', '$telepon', '$id_kelas' )");

 								echo "<div class='alert alert-success text-center'>Pendaftaran Berhasil. Silahkan Login!</div>";
 								echo "<meta http-equiv='refresh' content='1;url=login.php'>";
 							}
 						}
 						?>
 					</div>
 				</div>
 			</div>
 		</div>
 	</div>
 </body>
 </html>