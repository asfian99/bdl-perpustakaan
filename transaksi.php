<!DOCTYPE html>
<html lang="en">
<?php require('./layout/head.php') ?>
<body>

  <?php 
    include('./lib/connection.php') ;

    $sql = ociparse($conn, "SELECT BUKU_ID, MAHASISWA_ID, WAKTU_PINJAM, WAKTU_KEMBALI FROM PERPUSTAKAAN.TRANSAKSI");
    ociexecute($sql);
    $cols = oci_num_fields($sql);
  ?>

  <div class="row" style="max-width: 100vw;">
    <?php require('./layout/sidebar.php') ?>
    <div class="col-10 p-4">
      <div class="card p-4" style="min-height: 100%;">
        <h3>Transaksi</h3>
  
        <div class="my-2">
          <a class="py-2 px-4 bg-main text-white rounded" href="./buku/tambah.php">Tambah Transaksi</a>
        </div>
        <!-- table -->
        <table class="table mt-4 text-center" >
          <thead>
            <tr>
              <th scope="col">Buku ID</th>
              <th scope="col">Mahasiswa ID</th>
              <th scope="col">Tanggal Pinjam</th>
              <th scope="col">Tanggal Kembali</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = oci_fetch_array($sql, OCI_RETURN_NULLS + OCI_ASSOC)) {
                echo '<tr>';
                foreach ($row as $item) {
                  echo '<td>' . ($item !== null ? 
                  htmlentities($item, ENT_QUOTES) : '(null)') . '</td>';
                } ?>
                <td><button class="btn btn-warning btn-sm"><a href="./buku/edit.php">Edit</a></button>
                <button class="btn btn-danger btn-sm"><a href="#">Hapus</a></button></td>
                <?php
                echo '</tr>';
              }
            ?>
          </tbody>
        </table>
        <!-- end table -->
      </div>
    </div>
  </div>
</body>
</html>