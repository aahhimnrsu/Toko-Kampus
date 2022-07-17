<?php
include 'koneksi.php';

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$bayar = $_POST['bayar'];
$total = $_POST['total'];

mysqli_query($db,"insert into ofcust values('$kode', '$nama', '$tanggal', '$jam','$bayar', '$total')");

?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>Toko.Kampus | Invoice</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<style>
    body {
        margin-top: 20px;
    }
</style>

<body>
    <div bgcolor="#f6f6f6" class="p-3" style="color: #333; height: 100%; width: 100%;" height="auto" width="auto">
        <div class="d-flex justify-content-between">
            <a href="../kasir.php" class="btn btn-outline-primary"> Kasir </a>
            <button class="btn btn-outline-success" onclick="print()"> Print </button>
        </div>
        <table class="p-5" cellspacing="0" style="border-collapse: collapse; padding: 100px; width: auto;" width="auto" align="center">
            <tbody class="p-5">
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="padding: 0;">
                                        <h1>Toko.Kampus</h1>
                                    </td>
                                    <td style="color: #999; font-size: 12px; padding: 0; text-align: right;" align="right">
                                        Toko.Kampus<br />
                                        Invoice #<?= $kode ?> <br>
                                        <?= $tanggal ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>

                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                            <tbody>
                                <tr>
                                    <td width="50%" style="padding: 20px;"><strong style="color: #333; font-size: 24px;"><?="Rp.". $total ;?></strong> Total</td>
                                    <td align="right" width="50%" style="padding: 20px;">Terima Kasih Telah Berbelanja</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="padding: 0;"></td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding: 20px;">
                                        <h3 style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        ">
                                            Summary
                                        </h3>
                                        <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 5px 0;">Nama</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $nama ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Tanggal</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $tanggal ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Jam</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $jam ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 0;">Pembayaran</td>
                                                    <td align="right" style="padding: 5px 0;"><?= $bayar ;?></td>
                                                </tr>
                                                <tr>
                                                    <td style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;">Total</td>
                                                    <td align="right" style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 0;"><?= "Rp.". $total ;?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>

                <tr style="color: #666; font-size: 12px;">
                    <td width="5px" style="padding: 10px 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;">Pertanyaan?</h4>
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            Kunjungi Instagram kami
                                            <a href="#" style="color: #666;" target="_blank">
                                                @toko.kampus
                                            </a>
                                            berikan pertanyaan anda.
                                        </p>
                                    </td>
                                    <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;">Toko.Kampus</h4>
                                        <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">Jl. Srijaya Negara Bukit Besar, Bukit Lama, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30139</p>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>