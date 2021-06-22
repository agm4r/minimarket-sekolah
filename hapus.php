<?php
session_start();

$id = $_GET['id'];

if ($_SESSION['keranjang'][$id] <= 1) {
	unset($_SESSION['keranjang'][$id]);
	echo "<script>location='keranjang.php';</script>";
}elseif ($_SESSION['keranjang'][$id] > 0) {
	$_SESSION['keranjang'][$id] -= 1;
	echo "<script>location='keranjang.php';</script>";
}

?>