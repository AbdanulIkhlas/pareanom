const containerPopUpProduk = document.querySelector(".container-popUp-produk");
const containerPopUpAddOns = document.querySelector(".container-popUp-addOns");
const closeProduk = containerPopUpProduk.querySelector(".close-produk");
const closeAddOns = containerPopUpAddOns.querySelector(".close-addOns");
const cardProduk = document.querySelectorAll(".card-produk");
const cardAddOns = document.querySelectorAll(".card-addOns");

//! Fungsi untuk menampilkan popup ketika cards produk di klik
cardProduk.forEach(function (card) {
    card.addEventListener("click", function () {
        containerPopUpProduk.style.display = 'block';
    });
});


//! event ketika tombol close produk di klik untuk menutup popUp
closeProduk.addEventListener('click', function () {
    containerPopUpProduk.style.display = 'none';
    console.log("ini dari close produk");
});

//! Fungsi untuk menampilkan popup ketika cards addOns di klik
cardAddOns.forEach(function (card) {
    card.addEventListener("click", function () {
        containerPopUpAddOns.style.display = 'block';
    });
});


//! event ketika tombol close addons di klik untuk menutup popUp
closeAddOns.addEventListener('click', function () {
    containerPopUpAddOns.style.display = 'none';
    console.log("ini dari close addons");

});