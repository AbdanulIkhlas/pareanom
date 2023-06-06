const cardProduk = document.querySelectorAll(".card-produk");
const cardAddOns = document.querySelectorAll(".card-addOns");

cardProduk.forEach(function (card) {
    let containerPopUpProduk = card.querySelector(".container-popUp-produk");
    let closeProduk = containerPopUpProduk.querySelector(".close-produk");

    card.addEventListener("click", function () {
        containerPopUpProduk.style.display = 'block';
    });

    closeProduk.addEventListener('click', function () {
        containerPopUpProduk.style.display = 'none';
    });

    //? Ambil elemen-elemen yang dibutuhkan di dalam setiap card-produk
    let deleteButton = containerPopUpProduk.querySelector('#delete');
    let popUpDelete = containerPopUpProduk.querySelector('#popUp-delete');
    let tidakButton = containerPopUpProduk.querySelector('.tidak');

    //? Tambahkan event listener untuk tombol delete
    deleteButton.addEventListener('click', function() {
        popUpDelete.style.display = 'block';
    });

    //? Tambahkan event listener untuk tombol tidak
    tidakButton.addEventListener('click', function() {
        popUpDelete.style.display = 'none';
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

    //? Ambil elemen-elemen yang dibutuhkan di dalam setiap card-add-ons
    let deleteButton = containerPopUpAddOns.querySelector('#delete');
    let popUpDelete = containerPopUpAddOns.querySelector('#popUp-delete');
    let tidakButton = containerPopUpAddOns.querySelector('.tidak');

    //? Tambahkan event listener untuk tombol delete
    deleteButton.addEventListener('click', function() {
    popUpDelete.style.display = 'block';
    });

    //? Tambahkan event listener untuk tombol tidak
    tidakButton.addEventListener('click', function() {
    popUpDelete.style.display = 'none';
    });
});

//! Menampilkan notifikasi (berhasil)
setTimeout(function() {
    const notifBerhasil = document.querySelector('.notif-berhasil');
    notifBerhasil.classList.remove('show');
}, 8000);

window.addEventListener('load', function() {
    const notifBerhasil = document.querySelector('.notif-berhasil');
    notifBerhasil.classList.add('show');
});

//! Menampilkan notifikasi (gagal)
setTimeout(function() {
    const notifGagal = document.querySelector('.notif-gagal');
    notifGagal.classList.remove('show');
}, 8000);

window.addEventListener('load', function() {
    const notifGagal = document.querySelector('.notif-gagal');
    notifGagal.classList.add('show');
});
