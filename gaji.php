<?php
// panggil koneksinya
require_once 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM master_pegawai WHERE id = '$id'");
    foreach ($q as $dt) :

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Data Pegawai</h1>

                        <form method="post" action="proses_update_pegawai.php">
                            <input type="hidden" name="id" value="<?= $dt['id'] ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="Nama" name="nama" placeholder="Nama Pegawai"
                                    value="<?= $dt['nama'] ?>" disabled>
                            </div>
                            <div class=" mb-3">
                                <label for="alamat" class=" form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat"
                                    disabled><?= $dt['alamat'] ?></textarea>
                            </div>
                            <div class=" mb-3">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                    placeholder="Nomor Telepon" value="<?= $dt['no_telepon'] ?>" disabled>
                            </div>
                            <div class=" mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="example@email.com" value="<?= $dt['email'] ?>" disabled>
                            </div>
                            <div class=" mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    placeholder="Jabatan" value="<?= $dt['jabatan'] ?>" disabled>
                            </div>


                            <!-- <button type=" submit" class="btn btn-primary w-100" name="submit">Update Pegawai</button> -->
                        </form>
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
                        <a href="tambah_gaji.php?id=<?= $dt['id'] ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-edit"></i> Tambah Data Gaji Pegawai
                        </a>
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

                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                            // $search = $_POST['nama_barang'];
                                            $q = $conn->query("SELECT master_gaji.id, master_pegawai.id as pegawai_id, master_pegawai.nama, master_gaji.gaji_pokok, master_gaji.denda_keterlambatan  FROM master_gaji  JOIN master_pegawai ON master_gaji.pegawai_id = master_pegawai.id WHERE master_pegawai.id = $id");
                                            $no = 1;
                                            while ($dt = $q->fetch_assoc()) :
                                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $dt['nama'] ?></td>
                                        <td><?= number_format($dt['gaji_pokok'])  ?></td>
                                        <td><?= number_format($dt['denda_keterlambatan'])?></td>

                                        <td>

                                            <a href="update_gaji.php?id=<?= $dt['id'] ?>"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Ubah
                                            </a>
                                            <a href="delete_gaji.php?id=<?= $dt['id'] ?>" class="btn btn-danger btn-sm"
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
                        <h2 class="card-title mb-2">Absensi Bulan Ini</h2>
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
                                            $q = $conn->query("SELECT data_absensi.id, master_pegawai.nama, data_absensi.hari, data_absensi.tanggal, data_absensi.jam_masuk, data_absensi.jam_keluar  FROM data_absensi  JOIN master_pegawai ON data_absensi.pegawai_id = master_pegawai.id  where MONTH(data_absensi.tanggal)=MONTH(now()) AND master_pegawai.id = $id");
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php endforeach;
}