<?php
session_start();

require "../src/php/fungsi.php";

// kalau user dah login, tendang dia dari halaman login
if (isset($_SESSION["login"]) == "admin") {
  header("Location: ../public/admin/admin.php");
  exit;
} else if (isset($_SESSION["login"]) == "guest") {
  header("Location: ../public/guest/guest.php");
  exit;
}

if (isset($_POST["login"])) {
  global $koneksi;

  $username = $_POST["username"];
  $password = $_POST["password"];
  $isAdmin = false;

  // kueri username dari database
  $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username'");

  // simpan hasil kueri kedalam data
  $data = mysqli_fetch_assoc($cek);

  // cek apakah username nya ada
  if (mysqli_num_rows($cek) == 1) {
    // cek yang login itu admin atau bukan
    if ($data["role"] == "admin") {
      $isAdmin = true;
    }

    // cek passwordnya
    if (password_verify($password, $data["password"])) {
      if ($isAdmin) {
        $_SESSION["login"] = "admin";
        header("Location: ../public/admin/admin.php");
      } else {
        $_SESSION["login"] = "guest";
        header("Location: ../public/guest/guest.php");
      }
    } else {
      echo "<script>alert('Password Salah');</script>";
    }
  } else {
    echo "<script>alert('Username Tidak Ada');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hotelin - Login</title>

  <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon" />

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
  <!-- Tailwind CDN -->

  <!-- Custom CSS -->
  <style type="text/tailwindcss">
    @layer base {
        html {
          -webkit-tap-highlight-color: transparent;
        }
      }
    </style>
  <!-- Custom CSS -->
</head>

<body class="h-full bg-slate-700 flex items-center justify-center">
  <main class="container max-w-xl bg-white py-2 px-4 divide-y divide-black box-border rounded-lg">
    <!-- Form Title -->
    <div class="form-title mb-3">
      <h1 class="font-semibold text-xl">Login</h1>
    </div>
    <!-- Form Title -->

    <!-- Form Input -->
    <form action="" method="POST">
      <!-- Username -->
      <div class="relative username mt-3">
        <input type="text" name="username" id="username" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="username" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Username</label>
      </div>

      <!-- Username -->

      <!-- Password -->
      <div class="relative password mt-3">
        <input type="password" name="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="password" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
      </div>
      <!-- Password -->

      <!-- Tombol Login -->
      <button type="submit" name="login" class="w-full box-border py-2 px-4 rounded mt-3 mb-1 text-white text-lg bg-blue-500 hover:bg-blue-700">Login</button>
      <!-- Tombol Login -->
    </form>
    <!-- Form Input -->
  </main>
</body>

</html>