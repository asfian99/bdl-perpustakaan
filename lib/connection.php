<?php
$conn = oci_connect('system', 'admin', 'localhost');

if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
?>
