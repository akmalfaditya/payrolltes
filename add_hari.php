<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $hari = $_POST['hari'];
    $jam_masuk = $_POST['jam_masuk'];
    $jam_keluar = $_POST['jam_keluar'];
    
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("INSERT INTO master_hari_kerja ( hari, jam_masuk, jam_keluar) VALUES ('$hari', '$jam_masuk', '$jam_keluar')");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Hari berhasil ditambahkan'); window.location.href='index.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Hari gagal ditambahkan'); window.location.href='index.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}