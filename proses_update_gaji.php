<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $gaji_pokok = $_POST['gaji_pokok'];
    $denda_keterlambatan = $_POST['denda_keterlambatan'];

    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("UPDATE master_gaji SET gaji_pokok = '$gaji_pokok', denda_keterlambatan = '$denda_keterlambatan' WHERE id = '$id'");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Gaji berhasil diubah'); window.location.href='index.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Gaji gagal diubah'); window.location.href='index.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}