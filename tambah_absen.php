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
    <title>Absen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Absen</h1>
                        <center>
                            <a href="index.php" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Home
                            </a>
                        </center>
                        <form method="post" action="add_absen.php">
                            <input type="hidden" name="id" value="<?= $dt['id'] ?>">

                            <div class="mb-3">
                                <label for="hari" class="form-label">Hari</label>

                                <select class="form-control" id="hari" name="hari">
                                    <?php
                                            $q = $conn->query("SELECT * FROM master_hari_kerja");
                                            $no = 1;
                                            while ($dt = $q->fetch_assoc()) :
                                            ?>

                                    <option><?= $dt['hari'] ?></option>

                                    <?php endwhile; ?>
                                </select>
                                <div class=" mb-3">
                                    <label for="tanggal" class="form-label">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>

                            </div>



                            <button type="submit" class="btn btn-primary w-100" name="submit">Absen</button>
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