<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $hari = $_POST['hari'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_keluar = $_POST['jam_keluar'];
    
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("UPDATE master_hari_kerja SET hari = '$hari', jam_masuk = '$jam_masuk', jam_keluar = '$jam_keluar' WHERE id = '$id'");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Hari berhasil diubah'); window.location.href='index.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Hari gagal diubah'); window.location.href='index.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}