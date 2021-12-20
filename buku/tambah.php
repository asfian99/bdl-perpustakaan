<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body style="background: #004C3F;">
  <div class="card p-4 m-4" style="min-height: 100%; max-width: 50vw;">
    <h3 class="mb-4">Tambah Buku</h3>

    <!-- forms -->
    <form action="" method="post">
      <div class="row">
        <!-- judul -->
        <div class="col mb-3 mx-2">
          <label for="judul" class="form-label">Judul Buku</label>
          <input required type="text" class="form-control" id="judul" name="judul">
        </div>
        <!-- penulis -->
        <div class="col mb-3 mx-2">
          <label for="penulis" class="form-label">Penulis</label>
          <input required type="text" class="form-control" id="penulis" name="penulis">
        </div>
      </div>

      <div class="row">
        <!-- penerbit -->
        <div class="col mb-3 mx-2">
          <label for="penerbit" class="form-label">Penerbit Buku</label>
          <input required type="text" class="form-control" id="penerbit" name="penerbit">
        </div>
        <!-- tahun terbit -->
        <div class="col mb-3 mx-2">
          <label for="tahun" class="form-label">Tahun Terbit</label>
          <input required type="text" maxlength="4" class="form-control" id="tahun" name="tahun">
        </div>
      </div>

      <div class="row">
        <!-- isbn -->
        <div class="col mb-3 mx-2">
          <label for="isbn" class="form-label">ISBN</label>
          <input required type="text" class="form-control" id="isbn" name="isbn">
        </div>
        <!-- nomor Buku -->
        <div class="col mb-3 mx-2">
          <label for="nomor" class="form-label">Nomor Buku</label>
          <input required type="text" maxlength="4" class="form-control" id="nomor" name="nomor">
        </div>
      </div>

      <div class="d-flex flex-row justify-content-end gap-2 mt-2">
        <a href="./index.php" class="text-white btn btn-danger">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    <!-- end forms -->
  </div>

  <?php 
    require('../lib/connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $judul = $_POST['judul'];
      $penulis = $_POST['penulis'];
      $penerbit = $_POST['penerbit'];
      $tahun = $_POST['tahun'];
      $isbn = $_POST['isbn'];
      $nomor = $_POST['nomor'];

      $query = ociparse($conn, "INSERT INTO PERPUSTAKAAN.BUKU VALUES (0, '$judul', '$penulis', '$penerbit', '$tahun', '$isbn', '$nomor')");
      ociexecute($query);

      echo '<script type="text/javascript">
              window.location = "./index.php"
            </script>';
    }
  ?>
</body>
</html>