<?php
$page = "order";
include 'backend/koneksi.php';

$data_barang = mysqli_query($db, "SELECT SUM(jumlah) as total FROM cart");

$jumlah_barang = mysqli_fetch_array($data_barang);

$query = mysqli_query($db, "SELECT max(kode) as kodeTerbesar FROM cart");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "BRN";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">

    <title>Toko.Kampus | Products</title>
</head>

<body>
    <?php include "partials/navbar.php" ?>

    <div class="container mt-5 p-5">
        <div class="row row-cols-1 row-cols-md-3">
            <?php
            include './backend/koneksi.php';
            $data = mysqli_query($db, "select * from barang");
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <form class="mt-5" method="POST" action="backend/cekcart.php" enctype="multipart/form-data">
                    <div class="col mb-4">
                        <div class="card">
                            <img src="<?= "backend/" . $d['foto']; ?>" class="card-img-top" alt="<?= $d['barang']; ?>" name="foto">
                            <input type="hidden" class="form-control" id="foto" name="foto" value="<?= "backend/" . $d['foto']; ?>">
                            <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $kodeBarang; ?>">
                            <div class="card-body">
                                <h5 class="card-title" name="nama"><?= $d['barang']; ?></h5>
                                <input type="hidden" class="form-control" id="nama" name="nama" value="<?= $d['barang']; ?>">
                                <p class="card-text"><?= $d['deskripsi']; ?></p>
                                <p class="card-text" name="harga"><?= "Rp." . $d['harga']; ?></p>
                                <input type="hidden" class="form-control" id="harga" name="harga" value="<?= $d['harga']; ?>">
                                <input type="hidden" class="form-control" id="total" name="total" value="0">
                                <div class="row">
                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="0" max="30" placeholder="Kuantitas" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <input class="btn btn-success" type="submit" id="add" value="Add To Cart" name="add">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            <?php
            }
            ?>
        </div>
    </div>
    </div>

    <script src="./backend/online.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>