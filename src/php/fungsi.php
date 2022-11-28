<?php
// Koneksi ke Database
$koneksi = mysqli_connect("localhost", "root", "", "uas_pw");

// Fungsi buat tambah user baru
function tambahUser($data)
{
    global $koneksi;

    $username = str_replace(' ', '', strtolower(htmlspecialchars($data["username"])));
    $password = password_hash($data["password"], PASSWORD_DEFAULT);
    $role = $data["role"];

    mysqli_query($koneksi, "INSERT INTO users VALUES ('', '$username', '$password', '$role')");

    return mysqli_affected_rows($koneksi);
}
