<!DOCTYPE html>
<html lang="en">
<?php require('./layout/head.php') ?>
<body class="bg-light">
  <?php 
    include('./lib/connection.php') ;

    $sql = ociparse($conn, "SELECT JUDUL, PENULIS, PENERBIT, TAHUN_TERBIT, ISBN, NO_BUKU 
                            FROM PERPUSTAKAAN.BUKU");
    ociexecute($sql);
    $cols = oci_num_fields($sql);
  ?>
  <div class="row" style="max-width: 100vw;">
    <?php require('./layout/sidebar.php') ?>
    <div class="col-10 p-4">
      <div class="card p-4" style="min-height: 100%;">
        <h3>Buku</h3>  
        <div class="my-2">
          <a class="py-2 px-4 bg-main text-white rounded" href="./buku/tambah.php">Tambah Buku</a>
        </div>
        <!-- table -->
        <table class="table mt-4">
          <thead>
            <tr>
              <th scope="col">Judul</th>
              <th scope="col">Penulis</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Tahun</th>
              <th scope="col">ISBN</th>
              <th scope="col">No Buku</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = oci_fetch_array($sql, OCI_RETURN_NULLS + OCI_ASSOC)) {
                echo '<tr>';
                foreach ($row as $item) {
                  echo '<td>' . ($item !== null ? 
                  htmlentities($item, ENT_QUOTES) : '(null)') . '</td>';
                }
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