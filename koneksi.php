<?php 

	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'minimarket';
	
	$Koneksi = mysqli_connect($host,$user,$pass,$database);

	if(mysqli_connect_errno()){
		echo "Koneksi database error :".mysqli_connect_error();
	}

?>