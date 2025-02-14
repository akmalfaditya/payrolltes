<?php
// panggil koneksinya
require_once 'koneksi.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hari</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Tambah Hari</h1>

                        <center>
                            <a href="index.php" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Home
                            </a>
                        </center>
                        <form method="post" action="add_hari.php">

                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>
                                <input type="text" class="form-control" id="hari" name="hari" placeholder="Hari">
                            </div>
                            <div class="mb-3">
                                <label for="jam_masuk" class=" form-label">Jam Masuk</label>
                                <input type="time" class="form-control" id="jam_masuk" name="jam_masuk">
                            </div>
                            <div class="mb-3">
                                <label for="jam_keluar" class=" form-label">Jam Keluar</label>
                                <input type="time" class="form-control" id="jam_keluar" name="jam_keluar">
                            </div>


                            <button type="submit" class="btn btn-primary w-100" name="submit">Tambah Hari</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>