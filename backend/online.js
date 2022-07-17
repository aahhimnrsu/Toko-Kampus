var totalHarga = 0;
var totalKuantitas = 0;
// var tampilKuantitas = document.getElementById('tampilkuantitas');
// var kuantitas = document.getElementById('kuantitas');

function plus(harga, e) {
    var el = document.getElementById(e);
    if ((Number(el.value) + 1) <= 30) {
        el.value = Number(el.value) + 1;
        totalHarga += harga;
        totalKuantitas++;
        // kuantitas.value = Number(totalKuantitas);
        // tampilKuantitas.innerHTML = Number(totalKuantitas);
    }
}



function minus(harga, e) {
    var el = document.getElementById(e);
    if ((Number(el.value) - 1) >= 0) {
        el.value = Number(el.value) - 1;
        totalHarga -= harga;
        totalKuantitas--;
        // kuantitas.value = Number(totalKuantitas);
        // tampilKuantitas.innerHTML = Number(totalKuantitas);
    }
}



var ekspedisi = document.getElementById('kirim');
var ongkir;

if (ekspedisi == 'JNT') {
    ongkir = 10000;
} else if (ekspedisi == 'JNE') {
    ongkir = 12000;
} else if (ekspedisi == 'Ninja Express') {
    ongkir = 14000;
} else if (ekspedisi == 'Gosend') {
    ongkir = 16000;
} else if (ekspedisi == 'Shopee') {
    ongkir = 18000;
} else if (ekspedisi == 'Kargo') {
    ongkir = 20000;
}

function hitung() {
    var hargabayar;
    var total = document.getElementById('total');
    var tampilTotal = document.getElementById('tampiltotal');

    hargabayar = totalHarga - ongkir;

    Swal.fire(
        'Total Pembayaran anda Rp.' + totalHarga
    )

    total.value = Number(totalHarga);
    tampilTotal.innerHTML = Number(totalHarga);
}


var order = document.getElementById('pesan');
