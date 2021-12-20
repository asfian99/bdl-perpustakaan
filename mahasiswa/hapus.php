<!DOCTYPE html>
<html lang="en">
<?php require('../layout/head.php') ?>
<body>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Berhasil Menghapus Data Mahasiswa</h4>
        <hr>
        <button type="button" class="btn btn-primary"><a href="./index.php" class="text-white">Kembali</a></button>
    </div>
</body>
</html>

<?php require('../lib/connection.php'); 
$id = $_GET['id'];

$query = "DELETE FROM PERPUSTAKAAN.MAHASISWA WHERE id = '$id'";
$sql = ociparse($conn, $query);
$hasil = ociexecute($sql);

if ($hasil == true) {
    
} else
    echo ("Gagal Mengahapus Data Mahasiswa");
?>