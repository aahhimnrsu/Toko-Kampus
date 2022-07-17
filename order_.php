<?php
$page = "order";
include 'backend/koneksi.php';
$data_barang = mysqli_query($db,"SELECT * FROM cart");

$jumlah_barang = mysqli_num_rows($data_barang);

$query = mysqli_query($db, "SELECT max(kode) as kodeTerbesar FROM oncust");
$data = mysqli_fetch_array($query);
$kodeBarang = $data['kodeTerbesar'];
$urutan = (int) substr($kodeBarang, 3, 3);
$urutan++;
$huruf = "TKN";
$kodeBarang = $huruf . sprintf("%03s", $urutan);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">

    <title>Toko.Kampus | Order</title>
</head>

<body>
    <?php include "partials/navbar.php" ?>

    <div class="container-fluid mt-5 p-0">

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
                            include './backend/koneksi.php';
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
                <div class="shadow-lg p-5 m-3 bg-white rounded">
                    <h3 align=center>PEMBELIAN</h3>
                    <form class="mt-5" method="POST" action="backend/cekonline.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="kode" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                                <input type="text" name="kode" class="form-control" required="required" value="<?php echo $kodeBarang ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" required autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                            <div class="col-sm-10">
                                <select class=custom-select name=kota id="kota" required>
                                    <option value="none">--- Pilih Kota ---</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="D.I. Yogyakarta">D.I. Yogyakarta</option>
                                    <option value="Aceh">Aceh</option>
                                    <option value="Medan">Medan</option>
                                    <option value="Padang">Padang</option>
                                    <option value="Bali">Bali</option>
                                    <option value="Surabaya">Surabaya</option>
                                    <option value="Kalimantan">Kalimantan</option>
                                    <option value="Bengkulu">Bengkulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kirim" class="col-sm-2 col-form-label">Metode Kirim</label>
                            <div class="col-sm-10">
                                <select class=custom-select name=kirim id="kirim" required>
                                    <option value="none">--- Pilih Ekspedisi ---</option>
                                    <option value="JNT">JNT</option>
                                    <option value="JNE">JNE</option>
                                    <option value="Ninja Express">Ninja Express</option>
                                    <option value="Gosend">Gosend</option>
                                    <option value="Shopee">Shopee</option>
                                    <option value="Kargo">Kargo</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bayar" class="col-sm-2 col-form-label">Metode Bayar</label>
                            <div class="col-sm-10">
                                <select class=custom-select name=bayar id="bayar" required>
                                    <option value="none">--- Pilih Metode Pembayaran ---</option>
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
                                <input type="hidden" id="total" name="total">
                                <!-- <input type="hidden" id="total-harga"> -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-2 col-form-label">Bukti Bayar</label>
                            <div class="col-sm-10">
                                <input type="file" name="foto" id="foto" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-warning mr-5" onclick="hitung()">Hitung</button>
                            <input class="btn btn-success" type="submit" id="pesan" value="Pesan" name="pesan" onclick="order()">
                    </form>
                    <form action="index.php" method="post">
                        <input class="btn btn-danger ml-5" type="submit" id="cancel" value="Cancel">
                    </form>
                    <script src="./backend/online.js"></script>
                </div>
            </div>
        </div>
        <!-- AKHIR FORM PEMESANAN -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>