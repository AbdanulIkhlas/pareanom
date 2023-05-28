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
const containerPembelian = document.querySelector(".produk-dibeli");
let jumlah = 1;
let itemPembelian = []; //? Array untuk menyimpan objek cardProduk yang dipilih

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
            //? Mengambil value saat card di klik
            let imgSrc = card.querySelector(".gambar-produk img, .gambar-addOns img").getAttribute("src");
            let namaProduk = card.querySelector(".nama-produk p, .nama-addOns p").textContent;
            let hargaProduk = card.querySelector(".harga-produk p, .harga-addOns p").textContent;

            //? menampilkan value yang di dapat dari card ke popup
            tampilkanPopUp(imgSrc, namaProduk, hargaProduk);
        });
    });
}

//! memanggil fungsi tambahCard dengan parameterValue card-produk/card-addOns
tambahCardEventListener(cardProduk);

//! event ketika tombol close di klik untuk menutup popUp
popUpClose.addEventListener('click', function () {
    jumlah = 1;
    jumlahText.textContent = jumlah;
    console.log("ini dari function close");
    popUp.style.display = 'none';
});


//! Fungsi menampilkan card pembelian
function tampilkanCardPembelian(imgSrcProduk, namaProduk, jumlahPembelian) {
    const cardPembelianProduk = document.createElement("div");
    cardPembelianProduk.classList.add("card-produk-dibeli");
    // ! Belum selesai , masih bingung
    cardPembelianProduk.innerHTML = `
        <div class="foto">
        <img src="${imgSrcProduk}">
        </div>
        <div class="nama-produk">
            <input type="hidden" name="namaProduk" value="${namaProduk}">
            <p>${namaProduk}</p>
        </div>
        <div class="jumlah">
            <input type="hidden" name="jumlahPembelian" value="${jumlahPembelian}">
            <p>1</p>
        </div>
        <div class="tombol-delete">
            <div class="minus">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="white"
                    class="bi bi-dash-circle" viewBox="0 0 16 16">
                    <path
                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                </svg>
            </div>
        </div>
    `;

    containerPembelian.appendChild(cardPembelianProduk);
}


//! event ketika tombol ok di klik untuk confirm produk yang di beli
okButton.addEventListener('click', function () {
    //? Mengambil value pada container-popUp
    const popUpImgSrcValue = popUpImg.getAttribute("src");
    const popUpNamaProdukValue = popUpNamaProduk.textContent
    const popUpJumlahProdukValue = jumlahPembelian.querySelector("p").textContent

    //? membuat object pembelian dan memasukkan value dari container-popUp
    const pembelian = {
        imgSrcProduk: popUpImgSrcValue,
        namaProduk: popUpNamaProdukValue,
        jumlahPembelian: popUpJumlahProdukValue
    }

    //? memasukkan object ke array itemPembelian
    itemPembelian.push(pembelian);

    //? membuat element card pembelian
    tampilkanCardPembelian(popUpImgSrcValue, popUpNamaProdukValue, popUpJumlahProdukValue);

    popUp.style.display = 'none';
    jumlah = 1;
    jumlahText.textContent = jumlah;
});

//! event ketika tombol plus di klik untuk menambah jumlah produk yang di beli
plusButton.addEventListener("click", function () {
    jumlah++;
    updateJumlah();
});

//! event ketika tombol minus di klik untuk mengurangi jumlah produk yang di beli
minusButton.addEventListener("click", function () {
    if (jumlah > 1) {
        jumlah--;
        updateJumlah();
    }
});

//! memanggil funsi updateJumlah untuk update jumlah produk yang di beli
updateJumlah();