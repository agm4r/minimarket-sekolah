<!-- Agmar Putra
XI RPL B -->
<?php include 'header.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">

      <?php 
        if (isset($_GET['halaman'])) {
          if($_GET['halaman'] == "produk") {
            include 'produk.php';
          }elseif ($_GET['halaman'] == "pelanggan") {
            include 'pelanggan.php';
          }elseif ($_GET['halaman'] == "pembelian") {
            include 'pembelian.php';
          }elseif ($_GET['halaman'] == "logout") {
            include 'logout.php';
          }elseif ($_GET['halaman'] == "detail") {
            include 'detail.php';
          }elseif ($_GET['halaman'] == "tambah_produk") {
            include 'tambah_produk.php';
          }elseif ($_GET['halaman'] == "hapus_produk") {
            include 'hapus_produk.php';
          }elseif ($_GET['halaman'] == "edit_produk") {
            include 'edit_produk.php';
          }elseif ($_GET['halaman'] == "kelas") {
            include 'kelas.php';
          }elseif ($_GET['halaman'] == "edit_kelas") {
            include 'edit_kelas.php';
          }elseif ($_GET['halaman'] == "hapus_kelas") {
            include 'hapus_kelas.php';
          }elseif ($_GET['halaman'] == "tambah_kelas") {
            include 'tambah_kelas.php';
          }
        }
        else{
          include 'pembelian.php';
        }
      ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include 'footer.php'; ?>