<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body style="background: #004C3F;">
  <?php 
    require('../lib/connection.php'); 
    $id = $_GET['id'];

    $sql = ociparse($conn, "SELECT *
                            FROM PERPUSTAKAAN.MAHASISWA
                            WHERE ID = $id");
    ociexecute($sql);
    $row = oci_fetch_array($sql, OCI_RETURN_NULLS + OCI_ASSOC);
  ?>
  <div class="card p-4 m-4" style="min-height: 100%; max-width: 50vw;">
    <h3 class="mb-4">Edit Mahasiswa</h3>

    <!-- forms -->
    <form action="" method="post">
      <div class="row">
        <!-- Nama -->
        <div class="col mb-3 mx-2">
          <label for="nama" class="form-label">Nama Mahasiswa</label>
          <input required value="<?= $row['NAMA'] ?>" type="text" class="form-control" id="nama" name="nama">
        </div>
        <!-- NRP -->
        <div class="col mb-3 mx-2">
          <label for="nrp" class="form-label">NRP</label>
          <input required value="<?= $row['NRP'] ?>" type="text" class="form-control" id="nrp" name="nrp">
        </div>
      </div>

      <div class="row">
        <!-- Angkatan -->
        <div class="col mb-3 mx-2">
          <label for="angkatan" class="form-label">Angkatan</label>
          <input required value="<?= $row['ANGKATAN'] ?>" type="text" class="form-control" id="angkatan" name="angkatan">
        </div>
        <!-- Kelas -->
        <div class="col mb-3 mx-2">
          <label for="kelas" class="form-label">Kelas</label>
          <input required value="<?= $row['KELAS'] ?>" type="text" class="form-control" id="kelas" name="kelas">
        </div>
      </div>

      <div class="row">
        <!-- No telepon -->
        <div class="col mb-3 mx-2">
          <label for="notlp" class="form-label">No Telepon</label>
          <input required value="<?= $row['NO_TELP'] ?>" type="text" class="form-control" id="notlp" name="notlp">
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
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $nama = $_POST['nama'];
      $nrp = $_POST['nrp'];
      $angkatan = $_POST['angkatan'];
      $kelas = $_POST['kelas'];
      $notlp = $_POST['notlp'];

      $query = ociparse($conn, "UPDATE PERPUSTAKAAN.MAHASISWA 
                                SET NAMA = '$nama', 
                                    NRP = '$nrp', 
                                    ANGKATAN = '$angkatan', 
                                    KELAS = '$kelas', 
                                    NO_TELP = '$notlp'
                                WHERE ID = $id");
      ociexecute($query);

      echo '<script type="text/javascript">
              window.location = "./index.php"
            </script>';
    }
  ?>
</body>
</html>