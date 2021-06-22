<?php
session_start();
unset($_SESSION['admin']);

echo "<script>alert('Anda telah keluar dari halaman Admin');</script>
";
echo "<script>location='login.php'</script>";
?>