<?php

$id = $_GET['id'];

$Koneksi->query("DELETE FROM kelas where id_kelas = '$id'");
echo "<script>location='index.php?halaman=kelas';</script>";
?>