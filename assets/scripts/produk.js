const cardProduk = document.querySelectorAll(".card-produk");

cardProduk.forEach(function (card) {
    card.addEventListener("click", function () {
        //? Mengambil value saat card di klik
        let imgSrc = card.querySelector(".gambar-produk img").getAttribute("src");
        let namaProduk = card.querySelector(".nama-produk p").textContent;
        let hargaProduk = card.querySelector(".harga-produk p").textContent;

        // Lakukan sesuatu dengan nilai yang diambil
        console.log(imgSrc);
        console.log(namaProduk);
        console.log(hargaProduk);
    });
});