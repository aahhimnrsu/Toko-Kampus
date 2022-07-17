<?php
    $page = "tambahbarang";
    include 'backend/koneksi.php';
    $query = mysqli_query($db, "SELECT max(kode) as kodeTerbesar FROM barang");
    $data = mysqli_fetch_array($query);
    $kodeBarang = $data['kodeTerbesar'];
    $urutan = (int) substr($kodeBarang, 3, 3);
    $urutan++;
    $huruf = "BRG";
    $kodeBarang = $huruf . sprintf("%03s", $urutan);
?>

<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">

    <title>Toko.Kampus | Add Products</title>
</head>

<body>
    <?php include "partials/navbaradmin.php" ?>

    <div class="container-fluid mt-5 p-2">
        <div class="shadow-lg p-5 m-5 bg-white rounded">
            <h3 align=center>TAMBAH BARANG</h3>
            <form class="mt-5" method="POST" action="backend/cektambahbarang.php" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="kode" class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode" class="form-control" required="required" value="<?php echo $kodeBarang ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="barang" class="col-sm-2 col-form-label">Nama Barang</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="barang" name="barang" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="harga" name="harga" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto Barang</label>
                    <div class="col-sm-10">
                        <input type="file" name="foto" id="foto" required>
                    </div>
                </div>  
                <div class="d-flex justify-content-around">
                    <input class="btn btn-success" type="submit" id="tambah" value="Tambah">
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>