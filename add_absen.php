<?php
require_once 'koneksi.php';
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $jam_masuk = date('H:i');
    $hari = $_POST['hari'];

    $tanggal = $_POST['tanggal'];
    
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("INSERT INTO data_absensi ( pegawai_id, hari, tanggal, jam_masuk) VALUES ('$id', '$hari', '$tanggal', '$jam_masuk')");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Absen berhasil ditambahkan'); window.location.href='absensi.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Absen gagal ditambahkan'); window.location.href='absensi.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: absensi.php');
}