<?php
include 'koneksi.php';

$kode = $_POST['kode'];
$barang = $_POST['barang'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];
$foto = $_POST['foto'];
  
mysqli_query($db, "update barang set kode='$kode', barang='$barang', deskripsi='$deskripsi', harga='$harga', foto='$foto' where kode='$kode'");
header('location:../databarang.php');
?>