<?php
// panggil koneksinya
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body class="bg-light">
    <div class="container py-5">
        <h1 class="text-center mb-5">PAYROLL</h1>

        <div class="row mb-5">
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Daftar Page</h2>
                        <a href="index.php" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Home
                        </a>
                        <a href="absensi.php" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Absensi
                        </a>

                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Hari Kerja</h2>
                        <a href="tambah_hari.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Tambah Hari
                        </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Hari</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $search = $_POST['nama_barang'];
                                    $q = $conn->query("SELECT * FROM master_hari_kerja");
                                    $no = 1;
                                    while ($dt = $q->fetch_assoc()) :
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt['hari'] ?></td>
                                        <td><?= $dt['jam_masuk'] ?></td>
                                        <td><?= $dt['jam_keluar'] ?></td>

                                        <td>
                                            <a href="update_hari.php?id=<?= $dt['id'] ?>"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>
                                            <a href="delete_hari.php?id=<?= $dt['id'] ?>" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Data Karyawan</h2>
                        <a href="tambah_pegawai.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Tambah Pegawai
                        </a>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $search = $_POST['nama_barang'];
                                    $q = $conn->query("SELECT * FROM master_pegawai");
                                    $no = 1;
                                    while ($dt = $q->fetch_assoc()) :
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt['nama'] ?></td>
                                        <td><?= $dt['alamat'] ?></td>
                                        <td><?= $dt['no_telepon'] ?></td>
                                        <td><?= $dt['email'] ?></td>
                                        <td><?= $dt['jabatan'] ?></td>
                                        <td>
                                            <a href="gaji.php?id=<?= $dt['id'] ?>" class="btn btn-primary btn-sm">
                                                <i class="fas fa-edit"></i> Gaji
                                            </a>
                                            <a href="update_pegawai.php?id=<?= $dt['id'] ?>"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>
                                            <a href="delete_pegawai.php?id=<?= $dt['id'] ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Anda yakin akan menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">


            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-2">Absensi Semua Karyawan Bulan Ini</h2>
                        <!-- <a href="tambah_pegawai.php" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Tambah Pegawai
                        </a> -->
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Hari</th>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <!-- <th>Email</th>
                                        <th>Jabatan</th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $search = $_POST['nama_barang'];
                                    $q = $conn->query("SELECT data_absensi.id, master_pegawai.nama, data_absensi.hari, data_absensi.tanggal, data_absensi.jam_masuk, data_absensi.jam_keluar  FROM data_absensi  JOIN master_pegawai ON data_absensi.pegawai_id = master_pegawai.id  where MONTH(data_absensi.tanggal)=MONTH(now())");
                                    $no = 1;
                                    while ($dt = $q->fetch_assoc()) :
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt['nama'] ?></td>
                                        <td><?= $dt['hari'] ?></td>
                                        <td><?= $dt['tanggal'] ?></td>
                                        <td><?= $dt['jam_masuk'] ?></td>
                                        <td><?= $dt['jam_keluar'] ?></td>

                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <div class="row">


            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Data Gaji Pegawai</h2>

                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Gaji Pokok</th>
                                        <th>Denda Keterlambatan</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $search = $_POST['nama_barang'];
                                    $q = $conn->query("SELECT master_gaji.id, master_pegawai.id, master_pegawai.nama, master_gaji.gaji_pokok, master_gaji.denda_keterlambatan  FROM master_gaji  JOIN master_pegawai ON master_gaji.pegawai_id = master_pegawai.id ");
                                    $no = 1;
                                    while ($dt = $q->fetch_assoc()) :
                                    ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt['nama'] ?></td>
                                        <td><?= number_format($dt['gaji_pokok'])  ?></td>
                                        <td><?= number_format($dt['denda_keterlambatan']) ?></td>


                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>