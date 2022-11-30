<?php
// Koneksi ke Database
$koneksi = mysqli_connect("localhost", "root", "", "uas_pw");
// $koneksi = mysqli_connect("sql110.byetcluster.com", "epiz_33081789", "hWnxDEg1I0p", "epiz_33081789_uas_pw");

// Fungsi buat get semua row yang ada di tabel
function getRows(String $namaTabel)
{
    global $koneksi;

    $kueri = mysqli_query($koneksi, "SELECT * FROM $namaTabel");

    return mysqli_num_rows($kueri);
}

// Fungsi buat cek ketersediaan username
function cekUsername($username)
{
    global $koneksi;

    $kueri = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

    return mysqli_num_rows($kueri);
}

// Fungsi buat cek password dan konfirmasi password
function cekPassword($data)
{
    return $data["password"] == $data["konfirmasi_password"] ? true : false;
}

// Function Buat Upload Gambar
function uploadGambar()
{
    $root = $_SERVER["DOCUMENT_ROOT"];
    $namaFile = $_FILES["gambar"]["name"];
    $dariSini = $_FILES["gambar"]["tmp_name"];
    $ukuran = $_FILES["gambar"]["size"];

    // hanya izinkan upload gambar
    $allowedExt = ['jpg', 'jpeg', 'png'];
    $fileExt = explode('.', $namaFile);
    $fileExt = end($fileExt);
    $fileExt = strtolower($fileExt);

    if (!in_array($fileExt, $allowedExt)) {
        echo "<script>
                alert('Yang anda Upload bukan Gambar');
                window.location.href = 'tambah_hotel.php';
              </script>";

        return false;
    }

    // max upload 3 mb
    if ($ukuran > 3145728) {
        echo "<script>
                alert('Max Ukuran Gambar 3 MB');
                window.location.href = 'tambah_hotel.php';
              </script>";

        return false;
    }

    // Generate nama file random
    $namaFileBaru = uniqid();
    $namaFileBaru .= ".";
    $namaFileBaru .= $fileExt;

    move_uploaded_file($dariSini, $root . '/uas/src/img/hotel/' . $namaFileBaru);

    return $namaFileBaru;
}

function fetch(String $sql)
{
    global $koneksi;

    $kueri = mysqli_query($koneksi, $sql);

    $results = [];

    while ($data = mysqli_fetch_assoc($kueri)) {
        $results[] = $data;
    }

    return $results;
}

// CRUD Related Function
// Fungsi buat tambah user baru
function tambahUser($data)
{
    global $koneksi;

    $namaDepan = htmlspecialchars($data["nama_depan"]);
    $namaBelakang = htmlspecialchars($data["nama_belakang"]);
    $username = str_replace(' ', '', strtolower(htmlspecialchars($data["username"])));
    $password = password_hash(htmlspecialchars($data["password"]), PASSWORD_DEFAULT);
    $role = $data["role"];

    mysqli_query($koneksi, "INSERT INTO users VALUES ('', '$namaDepan', '$namaBelakang', '$username', '$password', '$role')");

    return mysqli_affected_rows($koneksi);
}

// Fungsi buat tambah hotel baru
function tambahHotel($data)
{
    global $koneksi;

    $namaHotel = $data["nama_hotel"];
    $alamatHotel = $data["alamat"];
    $hargaHotel = $data["harga"];
    $lokasi = $data["lokasi"];

    // Upload Gambar Dulu
    $gambar = uploadGambar();
    if (!$gambar) {
        return false;
    }

    mysqli_query($koneksi, "INSERT INTO hotels VALUES ('', '$namaHotel', '$alamatHotel', '$hargaHotel', '$lokasi', '$gambar')");

    return mysqli_affected_rows($koneksi);
}
