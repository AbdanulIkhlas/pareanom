const cardProduk = document.querySelectorAll(".card-produk");
const cardAddOns = document.querySelectorAll(".card-addOns");

cardProduk.forEach(function (card) {
    const containerPopUpProduk = card.querySelector(".container-popUp-produk");
    const closeProduk = containerPopUpProduk.querySelector(".close-produk");

    card.addEventListener("click", function () {
        containerPopUpProduk.style.display = 'block';
    });

    closeProduk.addEventListener('click', function () {
        containerPopUpProduk.style.display = 'none';
    });
});

cardAddOns.forEach(function (card) {
    const containerPopUpAddOns = card.querySelector(".container-popUp-addOns");
    const closeAddOns = containerPopUpAddOns.querySelector(".close-addOns");

    card.addEventListener("click", function () {
        containerPopUpAddOns.style.display = 'block';
    });

    closeAddOns.addEventListener('click', function () {
        containerPopUpAddOns.style.display = 'none';
    });
});

//! Menampilkan notifikasi (berhasil)
setTimeout(function() {
    const notifBerhasil = document.querySelector('.notif-berhasil');
    notifBerhasil.classList.remove('show');
}, 7000);

window.addEventListener('load', function() {
    const notifBerhasil = document.querySelector('.notif-berhasil');
    notifBerhasil.classList.add('show');
});

//! Menampilkan notifikasi (gagal)
setTimeout(function() {
    const notifGagal = document.querySelector('.notif-gagal');
    notifGagal.classList.remove('show');
}, 7000);

window.addEventListener('load', function() {
    const notifGagal = document.querySelector('.notif-gagal');
    notifGagal.classList.add('show');
});