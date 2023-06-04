//! Mendapatkan elemen form
const formTanggal = document.getElementById('form-tanggal');

//! Fungsi untuk mengirimkan form secara otomatis
function kirimForm() {
  formTanggal.submit();
}

//! Fungsi untuk mengubah nilai $tanggalDB berdasarkan tanggal yang dipilih
function ubahTanggalDB() {
  const tanggal = inputTanggal.value;

  //! Mengubah format tanggal menjadi YYYY-MM-DD
  const tanggalDB = tanggal.split('-').reverse().join('-');

  //! Mengubah nilai $tanggalDB pada input tersembunyi
  document.getElementById('tanggalDB').value = tanggalDB;

  //! Mengirimkan form secara otomatis
  kirimForm();
}

//! Menambahkan event listener untuk perubahan nilai pada input tanggal
inputTanggal.addEventListener('change', ubahTanggalDB);

//! Menjalankan fungsi ubahTanggalDB saat halaman dimuat
ubahTanggalDB();