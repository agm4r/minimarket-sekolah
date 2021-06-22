<?php

$id = $_GET['id'];
$ambil = $Koneksi->query("SELECT * FROM produk where id_produk = '$id' ");
$pecah = $ambil->fetch_assoc();
$gambar_produk = $pecah['gambar_produk'];

if (file_exists("../images_produk/$gambar_produk")) {
	unlink("../images_produk/$gambar_produk");
}

$Koneksi->query("DELETE FROM produk where id_produk = '$id'");
echo "<script>location='index.php?halaman=produk';</script>";
?>