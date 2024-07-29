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
    <title>Update Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Update Pegawai</h1>
                        <center>
                            <a href="index.php" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Home
                            </a>
                        </center>
                        <form method="post" action="proses_update_pegawai.php">
                            <input type="hidden" name="id" value="<?= $dt['id'] ?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Pegawai</label>
                                <input type="text" class="form-control" id="Nama" name="nama" placeholder="Nama Pegawai"
                                    value="<?= $dt['nama'] ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="alamat" class=" form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat"
                                    placeholder="Alamat"><?= $dt['alamat'] ?></textarea>
                            </div>
                            <div class=" mb-3">
                                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                                <input type="number" class="form-control" id="no_telepon" name="no_telepon"
                                    placeholder="Nomor Telepon" value="<?= $dt['no_telepon'] ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="example@email.com" value="<?= $dt['email'] ?>">
                            </div>
                            <div class=" mb-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan"
                                    placeholder="Jabatan" value="<?= $dt['jabatan'] ?>">
                            </div>


                            <button type=" submit" class="btn btn-primary w-100" name="submit">Update Pegawai</button>
                        </form>
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