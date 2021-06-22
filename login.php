<?php 
session_start();
require 'koneksi.php';
?>
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
 				<li><a href="login.php">Login</a></li>
 				<li><a href="checkout.php">Checkout</a></li>
 			</ul>
 		</div>						
 	</nav>

 	<div class="container">
 		<div class="row">
 			<div class="col-md-4 col-md-offset-4">
 				<div class="panel panel-default">
 					<div class="panel-heading">
 						<div class="panel-title text-center">
 							<label>Minimarket | Login</label>
 						</div>
 					</div>
 					<div class="panel-body">
 						<form method="post" action="">
 							<div class="form-group">
 								<label>Email</label>
 								<input type="email" name="email" class="form-control">
 							</div>
 							<div class="form-group">
 								<label>Password</label>
 								<input type="password" name="password" class="form-control">
 							</div>
 							<button class="btn btn-primary btn-lg btn-block" name="login">Login</button>
 							<div class="form-group">
 							</div>
 						</form>
 						<p>Daftar sebagai pelanggan? <a href="daftar.php" style="text-decoration: none;"><b>Daftar</b></a></p>
 						<?php 
 						if (isset($_POST['login'])) {
 							$email = $_POST['email'];
 							$password = $_POST['password'];

 							$ambil = $Koneksi->query("SELECT * FROM pelanggan where email_pelanggan = '$email' AND password_pelanggan = '$password' ");
 							$akun_cocok = $ambil->num_rows;

 							if ($akun_cocok == 1) {
 								$akun = $ambil->fetch_assoc();

 								$_SESSION['pelanggan'] = $akun;

 								if (isset($_SESSION['keranjang'])) {
 									echo "<div class='alert alert-success text-center'>Login berhasil ...</div>";
 									echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";

 								}else{
 								echo "<div class='alert alert-success text-center'>Login berhasil ...</div>";
 								echo "<meta http-equiv='refresh' content='1;url=index.php'>";
 								}
 								
 							}else {
 								echo "<div class='alert alert-danger text-center'>Login gagal. Silahkan cek kembali akun anda! </div>";
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