<?php
$page = "offline";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Toko.Kampus | Offline Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Caveat">
</head>
<body>

<?php
include "partials/navbaradmin.php";
?>

    <div class="container p-1 mt-5">
        <div class="shadow-lg p-4 mt-3 bg-white rounded">
            <h3 align=center>DATA PEMBELIAN OFFLINE</h3>
            <table class="table mt-5">
                <thead class="thead-dark">
                    <tr style="text-align:center;">
                        <th scope="col">ID</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tanggal Pembelian</th>
                        <th scope="col">Jam Pembelian</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Total</th>
                        <th scope="col">Opsi</th>
                    </tr>
                </thead>
                <?php
                    include 'backend/koneksi.php';
                    $data = mysqli_query($db,"select * from ofcust");
                    while($d = mysqli_fetch_array($data)){
                ?>
                <tbody>
                    <tr style="text-align:center;">
                        <td id="<?php echo $d['kode'];?>"><?php echo $d['kode'] ?></td>
                        <td><?php echo $d['nama'];?></td>
                        <td><?php echo $d['tanggal'];?></td>
                        <td><?php echo $d['jam'];?></td>
                        <td><?php echo $d['bayar'];?></td>
                        <td><?php echo $d['total'];?></td>
                        <td class="d-flex justify-content-center">
                            <a href="backend/hapusoffline.php?kode=<?php echo $d['kode']; ?>"><button class="btn btn-sm btn-outline-success">Pesanan Telah Diterima</button></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>