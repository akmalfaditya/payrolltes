<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];

    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $jabatan = $_POST['jabatan'];
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("UPDATE master_pegawai SET nama = '$nama', alamat = '$alamat', no_telepon = '$no_telepon', email = '$email', jabatan = '$jabatan'  WHERE id = '$id'");
    if ($q) {
        // pesan jika data tersimpan
        echo "<script>alert('Pegawai berhasil diubah'); window.location.href='index.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Pegawai gagal diubah'); window.location.href='index.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}