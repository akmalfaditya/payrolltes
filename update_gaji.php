<?php
// panggil koneksinya
require_once 'koneksi.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM master_gaji WHERE id = '$id'");
    foreach ($q as $dt) :
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Gaji Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>



<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Update Gaji Pegawai</h1>

                        <form method="post" action="proses_update_gaji.php">

                            <input type="hidden" name="id" value="<?= $dt['id'] ?>">




                            <div class="mb-3">
                                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok"
                                    placeholder="Gaji Pokok" value="<?= $dt['gaji_pokok'] ?>">
                            </div>

                            <div class="mb-3">
                                <label for="denda_keterlambatan" class="form-label">Denda Keterlambatan</label>
                                <input type="number" class="form-control" id="denda_keterlambatan"
                                    name="denda_keterlambatan" placeholder="Denda Keterlambatan"
                                    value="<?= $dt['denda_keterlambatan'] ?>">
                            </div>



                            <button type="submit" class="btn btn-primary w-100" name="submit">Update Gaji
                                Pegawai</button>
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