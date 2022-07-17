var totalHarga = 0;
var totalKuantitas = 0;

function plus(harga, e) {
    var el = document.getElementById(e);
    if ((Number(el.value) + 1) <= 30) {
        el.value = Number(el.value) + 1;
        totalHarga += harga;
        totalKuantitas++;
    }
}

function minus(harga, e) {
    var el = document.getElementById(e);
    if ((Number(el.value) - 1) >= 0) {
        el.value = Number(el.value) - 1;
        totalHarga -= harga;
        totalKuantitas--;
    }
}

function hitung() {
    var total = document.getElementById('total');
    var tampilTotal = document.getElementById('tampiltotal');
    total.value = Number(totalHarga);
    tampilTotal.innerHTML = Number(totalHarga);
}