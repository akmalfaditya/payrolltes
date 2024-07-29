<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $jabatan = $_POST['jabatan'];
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("INSERT INTO master_pegawai ( nama, alamat, no_telepon, email, jabatan) VALUES ('$nama', '$alamat', '$no_telepon', '$email', '$jabatan')");
    
    if ($q) {
        // pesan jika data tersimpan
        
        echo "<script>alert('Pegawai berhasil ditambahkan'); window.location.href='index.php'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Pegawai gagal ditambahkan'); window.location.href='index.php'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: index.php');
}