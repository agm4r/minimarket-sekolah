<?php 
session_start();

//mendapatkan id barang dari URL
$id = $_GET['id'];

//jika barang sudah ada di keranjang, maka barang ditambah 1.
if (isset($_SESSION['keranjang'][$id])) {
	$_SESSION['keranjang'][$id] += 1;
}else {
//selain itu (belum ada dikeranjang), maka produk dianggap dibeli 1
	$_SESSION['keranjang'][$id] = 1;
}

// Hubungkan ke keranjang.php
echo "<script>alert('Produk telah masuk kedalam keranjang Belanja');</script>";
echo "<script>location='index.php';</script>";

?>