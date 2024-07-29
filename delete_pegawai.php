<?php
require_once 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // perintah hapus data berdasarkan id yang dikirimkan
    $o = $conn->query("DELETE FROM data_absensi WHERE pegawai_id = '$id'");
    $p = $conn->query("DELETE FROM master_gaji WHERE pegawai_id = '$id'");
    $q = $conn->query("DELETE FROM master_pegawai WHERE id = '$id'");
    // cek perintah
    if ($q && $o && $p) {
        // pesan apabila hapus berhasil
        echo "<script>alert('Data berhasil dihapus'); window.location.href='index.php'</script>";
    } else {
        // pesan apabila hapus gagal
        echo "<script>alert('Data gagal dihapus'); window.location.href='index.php'</script>";
    }
} else {
    // jika mencoba akses langsung ke file ini akan diredirect ke halaman index
    header('Location:index.php');
}