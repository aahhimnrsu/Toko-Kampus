<?php
$page = "cart";
include 'backend/koneksi.php';

$data_barang = mysqli_query($db, "SELECT SUM(jumlah) as total FROM cart");

    $jumlah_barang = mysqli_fetch_array($data_barang);





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
                    <h3 align=center class="mb-5">KERANJANG</h3>
                    <?php
                    include './backend/koneksi.php';
                    $data = mysqli_query($db, "select * from cart");
                    while ($d = mysqli_fetch_array($data)) {
                    ?>
                        <div class="card mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img class="p-3 ml-4" src="<?= $d['foto']; ?>" alt="..." width="100px">
                                </div>
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $d['nama']; ?></h5>
                                        <p class="card-text">Rp.<?= $d['harga']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 p-2">
                                    <div class="p-3 badge badge-primary text-wrap d-flex align-middle align-items-center mt-4 ml-5  justify-content-center" id="jumlah" name="jumlah" style="width: 1.5rem; height:1.4rem; text-align:justify;"><?= $d['jumlah']; ?>x</div>
                                </div>
                                <div class="col-md-2 p-2">
                                <a href="backend/hapuscart.php?kode=<?php echo $d['kode']; ?>"><button class="mt-4 btn btn-sm btn-outline-danger">Hapus</button></a>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
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
                                <?php
                                include 'backend/koneksi.php';
                                $data = mysqli_query($db, "select sum(total) as total from cart");
                                $d = mysqli_fetch_array($data);
                                ?>
                                <p><?= "Rp.".$d['total'];?></p>
                                <input type="hidden" id="total" name="total" value="<?= $d['total'];?>">
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
                            <input class="btn btn-success" type="submit" id="pesan" value="Pesan" name="pesan" onclick="order()">
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