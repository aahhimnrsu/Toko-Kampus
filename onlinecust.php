<?php
$page = "online";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko.Kampus | Online Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
</head>

<body>

    <?php
    include "partials/navbaradmin.php";
    ?>

    <div class="container p-1 mt-5">
        <div class="shadow-lg p-3 mt-3 bg-white rounded">
            <h3 align=center>DATA PEMBELIAN ONLINE</h3>
            <table class="table mt-5">
                <thead class="thead-dark">
                    <tr style="text-align:center;">
                        <th scope="col" align="center">ID</th>
                        <th scope="col" align="center">Nama Lengkap</th>
                        <th scope="col" align="center">Alamat</th>
                        <th scope="col" align="center">Kota</th>
                        <th scope="col" align="center">Ekspedisi</th>
                        <th scope="col" align="center">Metode Pembayaran</th>
                        <th scope="col" align="center">Total</th>
                        <th scope="col" align="center">Bukti</th>
                        <th scope="col" align="center">Status</th>
                        <th scope="col" align="center">Opsi</th>
                    </tr>
                </thead>
                <?php
                include 'backend/koneksi.php';
                $data = mysqli_query($db, "select * from oncust");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tbody>
                        <tr>
                            <td id="<?php echo $d['kode']; ?>"><?php echo $d['kode'] ?></td>
                            <td><?php echo $d['nama']; ?></td>
                            <td><?php echo $d['alamat']; ?></td>
                            <td align="center"><?php echo $d['kota']; ?></td>
                            <td align="center"><?php echo $d['kirim']; ?></td>
                            <td align="center"><?php echo $d['bayar']; ?></td>
                            <td align="center"><?php echo $d['total']; ?></td>
                            <td align="center"><img src="<?php echo "backend/" . $d['buktibayar']; ?>" width=100px></td>
                            <td align="center">status</td>
                            <td class="d-flex justify-content-between">
                                <a href="backend/hapus.php?kode=<?php echo $d['kode']; ?>"><button class="btn btn-sm btn-outline-success" onclick="sukses()">Pesanan Telah Diterima</button></a>
                            </td>
                        </tr>
                    <?php
                }
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
    <script>
        function sukses() {
           alert('Satu Pesanan Telah Selesai');
        }
    </script>
</body>

</html>