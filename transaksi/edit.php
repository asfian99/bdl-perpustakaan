<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body style="background: #004C3F;">
  <?php 
    require('../lib/connection.php'); 
    require('./queries.php');
    $id = $_GET['id'];

    $sql = ociparse($conn, "SELECT *
                            FROM PERPUSTAKAAN.TRANSAKSI
                            WHERE ID = $id");
    ociexecute($sql);

    $sqlBuku = ociparse($conn, $getBukuOption);
    ociexecute($sqlBuku);
    
    $sqlMhs = ociparse($conn, $getMahasiswaOption);
    ociexecute($sqlMhs);

    $row = oci_fetch_array($sql, OCI_RETURN_NULLS + OCI_ASSOC);
  ?>
  <div class="card p-4 m-4" style="min-height: 100%; max-width: 50vw;">
    <h3 class="mb-4">Edit Transaksi</h3>

    <!-- forms -->
    <form action="" method="post">
      <div class="row">
        <!-- waktu pinjam -->
        <div class="col mb-3 mx-2">
          <label for="pinjam" class="form-label">Waktu Pinjam</label>
          <input required type="date" value="<?= date_format(date_create($row['WAKTU_PINJAM']), "Y-m-d") ?>" class="form-control" id="pinjam" name="pinjam">
        </div>
        <!-- waktu kembali -->
        <div class="col mb-3 mx-2">
          <label for="kembali" class="form-label">Waktu Kembali</label>
          <input required type="date" value="<?= date_format(date_create($row['WAKTU_KEMBALI']), "Y-m-d") ?>" class="form-control" id="kembali" name="kembali">
        </div>
      </div>

      <div class="row">
        <!-- mahasiswa -->
        <div class="col mb-3 mx-2">
          <label for="mahasiswa" class="form-label">Mahasiswa</label>
          <select class="form-select" name="mahasiswa" id="mahasiswa">
            <?php while ($rowMhs = oci_fetch_array($sqlMhs, OCI_RETURN_NULLS + OCI_ASSOC)) { ?>
              <option <?= $rowMhs['ID'] == $row['MAHASISWA_ID'] ? 'selected' : '' ?> value="<?= $rowMhs['ID'] ?>"> <?= $rowMhs['NAMA'] ?> </option>
            <?php } ?>
          </select>
        </div>
        <!-- buku -->
        <div class="col mb-3 mx-2">
        <label for="buku" class="form-label">Buku</label>
          <select class="form-select" name="buku" id="buku">
            <?php while ($rowBuku = oci_fetch_array($sqlBuku, OCI_RETURN_NULLS + OCI_ASSOC)) { ?>
              <option <?= $rowBuku['ID'] == $row['BUKU_ID'] ?'selected' : '' ?> value="<?= $rowBuku['ID'] ?>"> <?= $rowBuku['JUDUL'] ?> </option>
            <?php } ?>
          </select>
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
      $pinjam = $_POST['pinjam'];
      $kembali = $_POST['kembali'];
      $mahasiswa = $_POST['mahasiswa'];
      $buku = $_POST['buku'];

      echo "$id, $pinjam, $kembali, $mahasiswa, $buku";
      $query = ociparse($conn, "UPDATE PERPUSTAKAAN.TRANSAKSI 
                                SET BUKU_ID = $buku, 
                                    MAHASISWA_ID = $mahasiswa, 
                                    WAKTU_PINJAM = TO_DATE('$pinjam', 'YYYY-MM-DD'), 
                                    WAKTU_KEMBALI = TO_DATE('$kembali', 'YYYY-MM-DD'), 
                                WHERE PERPUSTAKAAN.TRANSAKSI.ID = $id");
      ociexecute($query);

      echo '<script type="text/javascript">
              window.location = "./index.php"
            </script>';
    }
  ?>
</body>
</html>