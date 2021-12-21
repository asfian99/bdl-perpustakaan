<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body style="background: #004C3F;">
  <div class="card p-4 m-4" style="min-height: 100%; max-width: 50vw;">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Berhasil Menghapus Data Transaksi Peminjaman</h4>
      <hr>
      <button type="button" class="btn btn-primary"><a href="./index.php" class="text-white">Kembali</a></button>
    </div>
  </div>
</body>
</html>

<?php 
    require('../lib/connection.php'); 
    $id = $_GET['id'];

    $query = "DELETE FROM PERPUSTAKAAN.TRANSAKSI WHERE id = '$id'";
    $sql = ociparse($conn, $query);
    $hasil = ociexecute($sql);

    if ($hasil != true) {   
        echo ("Gagal Mengahapus Data Transaksi Peminjaman");
    }
?>