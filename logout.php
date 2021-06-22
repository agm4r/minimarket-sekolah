<?php 
session_start();
unset($_SESSION['pelanggan']);
echo "<script>alert('Anda telah keluar dari halaman Minimarket');</script>";
echo "<script>location='login.php';</script>";
?>