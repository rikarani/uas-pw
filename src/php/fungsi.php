<?php
// Koneksi ke Database
$koneksi = mysqli_connect("localhost", "root", "", "uas_pw");

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
    if ($data["password"] == $data["konfirmasi_password"]) {
        return true;
    } else {
        return false;
    }
}

// CRUD Related Function
// Fungsi buat tambah user baru
function tambahUser($data)
{
    global $koneksi;

    $namaDepan = $data["nama_depan"];
    $namaBelakang = $data["nama_belakang"];
    $username = str_replace(' ', '', strtolower(htmlspecialchars($data["username"])));
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    $role = $data["role"];

    mysqli_query($koneksi, "INSERT INTO users VALUES ('', '$namaDepan', '$namaBelakang', '$username', '$password', '$role')");

    return mysqli_affected_rows($koneksi);
}
