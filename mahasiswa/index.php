<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body style="background: #004C3F;">

  <?php 
    require('../lib/connection.php');
    require('./queries.php');

    $sql = ociparse($conn, $getMahasiswa);
    ociexecute($sql);
    $cols = oci_num_fields($sql);
  ?>

  <div class="row m-0" style="max-width: 100vw;">
    <?php require('../layout/sidebar.php') ?>
    <div class="col-10 py-4">
      <div class="card p-4" style="min-height: 100%;">
        
      <div class="my-2 d-flex flex-row justify-content-between">
        <h3>Mahasiswa</h3>
        <a class="btn btn-dark text-white rounded" href="./tambah.php">Tambah Mahasiswa</a>
      </div>
        <!-- table -->
        <table class="table mt-4 text-center" >
          <thead>
            <tr>
              <th scope="col">Nama</th>
              <th scope="col">NRP</th>
              <th scope="col">Angakatan</th>
              <th scope="col">Kelas</th>
              <th scope="col">No Telepon</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while ($row = oci_fetch_array($sql, OCI_RETURN_NULLS + OCI_ASSOC)) {
                echo '<tr>';
                foreach ($row as $item) {
                  if ($item !== $row['ID']) {
                    echo '<td>' . ($item !== null ? 
                    htmlentities($item, ENT_QUOTES) : '(null)') . '</td>';
                  }
                } ?>
                <!-- edit & hapus dengan url parameter: id -->
                <td>
                  <a class="btn btn-success btn-sm text-white" href="./edit.php?id=<?= $row['ID'] ?>">Edit</a>
                  <a class="btn btn-danger btn-sm text-white" href="./hapus.php?id=<?= $row['ID'] ?>">Hapus</a>
                </td>
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