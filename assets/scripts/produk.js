// //! deklarasi variabel untuk popup 
// const cardProduk = document.querySelectorAll(".card-produk");
// const cardAddOns = document.querySelectorAll(".card-addOns");
// const popUp = document.querySelector(".container-popUp");
// const popUpClose = document.querySelector(".close");
// const popUpImg = document.querySelector(".container-popUp .foto img");
// const popUpNamaProduk = document.querySelector(".container-popUp .nama-produk p");
// const popUpHargaProduk = document.querySelector(".container-popUp .harga-produk p");
// const jumlahPembelian = document.querySelector(".jumlah-pembelian");
// const jumlahText = jumlahPembelian.querySelector("p");
// const plusButton = jumlahPembelian.querySelector(".plus");
// const minusButton = jumlahPembelian.querySelector(".minus");
// let jumlah = 1; //? Jumlah awal pembelian

// //! event untuk menampilkan popUp setelah card produk di klik
// cardProduk.forEach(function (card) {
//     card.addEventListener("click", function () {
//         //? Mengambil value saat card di klik
//         let imgSrc = card.querySelector(".gambar-produk img").getAttribute("src");
//         let namaProduk = card.querySelector(".nama-produk p").textContent;
//         let hargaProduk = card.querySelector(".harga-produk p").textContent;

//         //? set value yang di dapat dari card ke popup
//         popUpImg.src = imgSrc;
//         popUpNamaProduk.innerHTML = namaProduk;
//         popUpHargaProduk.innerHTML = hargaProduk;

//         //? menampilkan popUp
//         popUp.style.display = 'block';
//     });
// });

// //! event untuk menampilkan popUp setelah card addOns di klik
// cardAddOns.forEach(function (card) {
//     card.addEventListener("click", function () {
//         //? Mengambil value saat card di klik
//         let imgSrc = card.querySelector(".gambar-addOns img").getAttribute("src");
//         let namaProduk = card.querySelector(".nama-addOns p").textContent;
//         let hargaProduk = card.querySelector(".harga-addOns p").textContent;

//         //? set value yang di dapat dari card ke popup
//         popUpImg.src = imgSrc;
//         popUpNamaProduk.innerHTML = namaProduk;
//         popUpHargaProduk.innerHTML = hargaProduk;

//         //? menampilkan popUp
//         popUp.style.display = 'block';
//     });
// });

// //! Event listener untuk menutup popup
// popUpClose.addEventListener('click', function () {
//     // Sembunyikan popup
//     popUp.style.display = 'none';
// });


// 
// function updateJumlah() {
//     jumlahText.textContent = jumlah;
// }

// //! Event listener untuk tombol plus
// plusButton.addEventListener("click", function () {
//     jumlah++; //? Menambah jumlah
//     updateJumlah(); //? Memperbarui tampilan jumlah
// });

// //! Event listener untuk tombol minus
// minusButton.addEventListener("click", function () {
//     if (jumlah > 1) {
//         jumlah--; //? Mengurangi jumlah jika lebih dari 1
//         updateJumlah(); //? Memperbarui tampilan jumlah
//     }
// });

// //? Memanggil fungsi awal untuk menampilkan jumlah awal
// updateJumlah();



const cardProduk = document.querySelectorAll(".card-produk, .card-addOns");
const popUp = document.querySelector(".container-popUp");
const popUpClose = document.querySelector(".close");
const okButton = document.querySelector(".container-popUp button");
const popUpImg = document.querySelector(".container-popUp .foto img");
const popUpNamaProduk = document.querySelector(".container-popUp .nama-produk p");
const popUpHargaProduk = document.querySelector(".container-popUp .harga-produk p");
const jumlahPembelian = document.querySelector(".jumlah-pembelian");
const jumlahText = jumlahPembelian.querySelector("p");
const plusButton = jumlahPembelian.querySelector(".plus");
const minusButton = jumlahPembelian.querySelector(".minus");
let jumlah = 1;

//! Fungsi untuk menampilkan popUp
function tampilkanPopUp(imgSrc, namaProduk, hargaProduk) {
    popUpImg.src = imgSrc;
    popUpNamaProduk.innerHTML = namaProduk;
    popUpHargaProduk.innerHTML = hargaProduk;
    popUp.style.display = 'block';
}

//! Fungsi untuk menampilkan jumlah pembelian
function updateJumlah() {
    jumlahText.textContent = jumlah;
}

//! Fungsi untuk menampilkan popup ketika cards di klik
function tambahCardEventListener(cards) {
    cards.forEach(function (card) {
        card.addEventListener("click", function () {
            let imgSrc = card.querySelector(".gambar-produk img, .gambar-addOns img").getAttribute("src");
            let namaProduk = card.querySelector(".nama-produk p, .nama-addOns p").textContent;
            let hargaProduk = card.querySelector(".harga-produk p, .harga-addOns p").textContent;
            tampilkanPopUp(imgSrc, namaProduk, hargaProduk);
        });
    });
}

tambahCardEventListener(cardProduk);

popUpClose.addEventListener('click', function () {
    popUp.style.display = 'none';
    jumlah = 1;
    jumlahText.textContent = jumlah;
});

okButton.addEventListener('click', function () {
    popUp.style.display = 'none';
    jumlah = 1;
    jumlahText.textContent = jumlah;
});

plusButton.addEventListener("click", function () {
    jumlah++;
    updateJumlah();
});

minusButton.addEventListener("click", function () {
    if (jumlah > 1) {
        jumlah--;
        updateJumlah();
    }
});

updateJumlah();