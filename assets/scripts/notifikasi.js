//! Menampilkan notifikasi (berhasil)
setTimeout(function() {
    const notifBerhasil = document.querySelector('.notif-berhasil');
    notifBerhasil.classList.remove('show');
}, 6000);

window.addEventListener('load', function() {
    const notifBerhasil = document.querySelector('.notif-berhasil');
    notifBerhasil.classList.add('show');
});

//! Menampilkan notifikasi (gagal)
setTimeout(function() {
    const notifGagal = document.querySelector('.notif-gagal');
    notifGagal.classList.remove('show');
}, 6000);

window.addEventListener('load', function() {
    const notifGagal = document.querySelector('.notif-gagal');
    notifGagal.classList.add('show');
});