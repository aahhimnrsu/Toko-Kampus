<?php
$page = 'kasir';
include 'backend/koneksi.php';
$query = mysqli_query($db, "SELECT max(kode) as kodeTerbesar FROM ofcust");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "TKF";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko.Kampus | Cashier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
</head>

<body>

    <?php include 'partials/navbaradmin.php' ?>

    <div class="container-fluid p-0 mt-5">
        <!-- TABEL HARGA -->
        <div class="row">
            <div class="col">
                <div class="shadow-lg p-5 m-3 bg-white rounded">
                    <h3 align=center>DAFTAR BARANG</h3>
                    <table class="table mt-5">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-center">No.</th>
                                <th scope="col" class="text-center">Nama Barang</th>
                                <th scope="col" class="text-center">Harga</th>
                                <th scope="col" class="text-center">Kuantitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'backend/koneksi.php';
                            $kode = 1;
                            $data = mysqli_query($db, "select * from barang");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <tr>
                                    <th scope="row" kode="<?= $d['kode']; ?>"><?= $kode++ ?></th>
                                    <td><?= $d['barang']; ?></td>
                                    <td><?= $d['harga']; ?></td>
                                    <td class="d-flex justify-content-center">
                                        <div class="position-relative">
                                            <button class="btn btn-primary position-absolute h-100 p-0 px-2" style="right: 0; top: 0;" onclick="plus(<?= $d['harga']; ?>, 'q-<?= $d['kode']; ?>')">+</button>
                                            <input type="text" class="w-100 px-4" id="q-<?= $d['kode']; ?>" name="<?= $d['barang']; ?>" style="text-align:center;" value="0" disabled>
                                            <button class="btn btn-primary position-absolute h-100 p-0 px-2" style="left: 0; top: 0;" onclick="minus(<?= $d['harga']; ?>, 'q-<?= $d['kode']; ?>')">-</button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- AKHIR TABEL HARGA -->

            <!-- FORM PEMESANAN -->
            <div class="col">
                <div class="container">
                    <div class="shadow-lg p-5 m-3 bg-white rounded">
                        <h3 align=center>PEMBELIAN</h3>
                        <form class="mt-5" method="POST" action="backend/cekoffline.php" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="kode" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode" class="form-control" required="required" value="<?php echo $kodeBarang ?>" readonly autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tanggal" class="col-sm-2 col-form-label">Tanggal Pembelian</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="jam" class="col-sm-2 col-form-label">Jam Pembelian</label>
                                <div class="col-sm-10">
                                    <input type="time" class="form-control" id="jam" name="jam" required autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bayar" class="col-sm-2 col-form-label">Metode Bayar</label>
                                <div class="col-sm-10">
                                    <select class=custom-select name=bayar id="bayar" required autocomplete="off">
                                        <option value="none">--- Pilih Metode Pembayaran ---</option>
                                        <option value="Cash">Cash</option>
                                        <option value="BCA">BCA</option>
                                        <option value="Mandiri">Mandiri</option>
                                        <option value="BNI">BNI</option>
                                        <option value="Dana">Dana</option>
                                        <option value="Gopay">Gopay</option>
                                        <option value="ShopeePay">ShopeePay</option>
                                        <option value="OVO">OVO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="total" class="col-sm-2 col-form-label">Total Bayar</label>
                                <div class="col-sm-10">
                                    <p id="tampiltotal"></p>
                                    <input type="hidden" name="total" id="total">
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-warning mr-5" onclick="hitung()">Hitung</button>
                                <input class="btn btn-success" type="submit" id="bayar" value="Bayar">

                        </form>
                        <script src="backend/offline.js"></script>
                    </div>
                </div>
            </div>
                            
            <!-- AKHIR FORM PEMESANAN -->
        </div>
</body>

</html>