<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body style="background: #004C3F;">
  <div class="card p-4 m-4" style="min-height: 100%; max-width: 50vw;">
    <h3 class="mb-4">Tambah Mahasiswa</h3>

    <!-- forms -->
    <form action="" method="post">
      <div class="row">
        <!-- Nama Mahasiswa -->
        <div class="col mb-3 mx-2">
          <label for="nama" class="form-label">Nama Mahasiswa</label>
          <input required type="text" class="form-control" id="nama" name="nama">
        </div>
        <!-- NRP -->
        <div class="col mb-3 mx-2">
          <label for="nrp" class="form-label">NRP</label>
          <input required type="text" class="form-control" id="nrp" name="nrp">
        </div>
      </div>

      <div class="row">
        <!-- Angakatan -->
        <div class="col mb-3 mx-2">
          <label for="angkatan" class="form-label">Angkatan</label>
          <input required maxlength="4" type="text" class="form-control" id="angkatan" name="angkatan">
        </div>
        <!-- Kelas -->
        <div class="col mb-3 mx-2">
          <label for="kelas" class="form-label">Kelas</label>
          <input required type="text" class="form-control" id="kelas" name="kelas">
        </div>
      </div>

      <div class="row">
        <!-- Nomer Telefon -->
        <div class="col mb-3 mx-2">
          <label for="notlp" class="form-label">Nomer Telefon</label>
          <input required type="text" class="form-control" id="notlp" name="notlp">
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
      $nama = $_POST['nama'];
      $nrp = $_POST['nrp'];
      $angkatan = $_POST['angkatan'];
      $kelas = $_POST['kelas'];
      $notlp = $_POST['notlp'];

      $query = ociparse($conn, "INSERT INTO PERPUSTAKAAN.MAHASISWA VALUES (0, '$nama', '$nrp', '$angkatan', '$kelas', '$notlp')");
      ociexecute($query);

      echo '<script type="text/javascript">
              window.location = "./index.php"
            </script>';
    }
  ?>
</body>
</html>