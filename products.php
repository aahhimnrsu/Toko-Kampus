<?php
$page = "products";

include 'backend/koneksi.php';
    
$data_barang = mysqli_query($db,"SELECT * FROM cart");

$jumlah_barang = mysqli_num_rows($data_barang);

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
                <div class="col mb-4">
                    <div class="card">
                        <img src="<?= "backend/".$d['foto']; ?>" class="card-img-top" alt="<?= $d['barang']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $d['barang']; ?></h5>
                            <p class="card-text"><?= $d['deskripsi']; ?></p>
                            <p class="card-text"><?= "Rp." . $d['harga']; ?></p>
                            <div class="position-relative">
                                <a href="order.php" class="btn btn-primary">Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <script src="./backend/online.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>