(() => {
  const arrayHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
  const arrayBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

  function addZero(waktu) {
    return waktu < 10 ? `0${waktu}` : waktu;
  }

  setInterval(() => {
    const elemenHari = document.getElementById("hari");
    const elemenJam = document.getElementById("jam");

    // bikin objek tanggal
    const tanggal = new Date();

    // Tempelin
    elemenHari.textContent = `${arrayHari[tanggal.getDay()]}, ${tanggal.getDate()} ${arrayBulan[tanggal.getMonth()]} ${tanggal.getFullYear()}`;

    // apalah
    elemenJam.textContent = `${addZero(tanggal.getHours())} : ${addZero(tanggal.getMinutes())} : ${addZero(tanggal.getSeconds())}`;
  }, 1000);
})();
