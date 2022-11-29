// Redirect pas tombol "Mulai Sekarang diklik"
const mulaiSekarang = document.getElementById("letsgo");
mulaiSekarang.addEventListener("click", () => {
  window.location.href = "login.php";
});

// Tampilkan tahun buat copyright
const spanTahun = document.getElementById("tahun");
spanTahun.textContent = new Date().getFullYear();
