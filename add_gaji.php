<?php
require_once 'koneksi.php';
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $gaji_pokok = $_POST['gaji_pokok'];
    $denda_keterlambatan = $_POST['denda_keterlambatan'];
   
    // id_produk bernilai '' karena kita set auto increment
    $q = $conn->query("INSERT INTO master_gaji ( pegawai_id, gaji_pokok, denda_keterlambatan) VALUES ('$id', '$gaji_pokok', '$denda_keterlambatan')");
    
    if ($q) {
        // pesan jika data tersimpan
        
        echo "<script>alert('Gaji Pegawai berhasil ditambahkan'); window.location.href='gaji.php?id=$id'</script>";
    } else {
        // pesan jika data gagal disimpan
        echo "<script>alert('Gaji Pegawai gagal ditambahkan'); window.location.href='gaji.php?id=$id'</script>";
    }
} else {
    // jika coba akses langsung halaman ini akan diredirect ke halaman index
    header('Location: gaji.php?id=$id');
}