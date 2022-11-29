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
