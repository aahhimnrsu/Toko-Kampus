<?php
include 'koneksi.php';

$kode = $_POST['kode'];
$foto = $_POST['foto'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];
$total = $_POST['total'];

$total = $harga * $jumlah;

    mysqli_query($db,"insert into cart values('$kode', '$foto', '$nama','$harga', '$jumlah', '$total')");
    header('location:../order.php');
?>