<?php
$conn = oci_connect('SYS', 'oracle', '//localhost/orcl', null, OCI_SYSDBA);

if (!$conn) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
} 
?>
