<?php
require_once 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $jam_keluar = date('H:i');
    $hari = $_POST['hari'];

    $tanggal = $_POST['tanggal'];
    
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("UPDATE data_absensi SET jam_keluar = '$jam_keluar'  WHERE id = '$id'");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Absen Keluar berhasil ditambahkan'); window.location.href='absensi.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Absen Keluar gagal ditambahkan'); window.location.href='absensi.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: absensi.php');
}