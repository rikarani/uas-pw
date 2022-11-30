<?php
require "../../src/php/fungsi.php";

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

if (isset($_POST["tambah"])) {
    if (tambahUser($_POST) > 0) {
        echo "<script>
                alert('User Berhasil Ditambahkan');
                window.location.href = 'tambah_user.php';
              </script>";
    } else {
        echo "<script>
                alert('User Gagal Ditambahkan');
                window.location.href = 'tambah_user.php';
              </script>";
    }
}

// if ($_SESSION["login"] == "guest") {
//     header("Location: ../../guest.php");
// }
?>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotelin - Tambah User</title>

    <link rel="shortcut icon" href="../../src/img/logo.png" type="image/x-icon" />

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

<body class="h-full bg-slate-200 flex">
    <!-- Sidebar -->
    <aside class="w-64 h-full" aria-label="Sidebar">
        <div class="h-full overflow-y-auto py-4 px-3 bg-gray-50 dark:bg-gray-800">
            <!-- Salam  -->
            <div class="salam mb-2 px-3">
                <h1 class="text-white text-xl font-bold mb-2">Selamat Datang</h1>
                <h2 class="text-white text-3xl font-bold"><?= $_SESSION["nama"]; ?></h2>
            </div>
            <!-- Salam  -->

            <!-- Side Bar -->
            <ul class="h-5/6 flex flex-col justify-evenly">
                <li>
                    <a href="admin.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Tambah User</span>
                    </a>
                </li>
                <li>
                    <a href="tambah_hotel.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Tambah Hotel</span>
                    </a>
                </li>
                <li>
                    <a href="../../logout.php" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                    </a>
                </li>
            </ul>
            <!-- Side Bar -->
        </div>
    </aside>
    <!-- Sidebar -->

    <main class="w-full py-4 px-3">
        <h5 class="text-center font-bold text-3xl mb-4">Tambah User Baru</h5>

        <div class="form-tambah bg-white box-border py-2 px-4 rounded-lg">
            <form action="" method="POST">
                <!-- Name -->
                <div class="name-inputs mt-3 w-full flex gap-3">
                    <!-- First Name -->
                    <div class="relative first-name w-1/2">
                        <input type="text" name="nama_depan" id="first-name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="first-name" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Depan</label>
                    </div>
                    <!-- First Name -->

                    <!-- Last Name -->
                    <div class="relative last-name w-1/2">
                        <input type="text" name="nama_belakang" id="last-name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                        <label for="last-name" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Belakang</label>
                    </div>
                    <!-- Last Name -->
                </div>
                <!-- Name -->

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

                <!-- Dropdown -->
                <div class="relative role mt-3">
                    <select name="role" id="role">
                        <option value="" disabled selected></option>
                        <option value="admin">Admin</option>
                        <option value="guest">Guest</option>
                    </select>
                    <label for="role" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Pilih Role</label>
                </div>
                <!-- Dropdown -->

                <!-- Tombol Tambah -->
                <button type="submit" name="tambah" class="mt-3 mb-1 w-full py-2 px-4 text-lg text-white rounded bg-blue-500 hover:bg-blue-700">Tambah User Baru</button>
                <!-- Tombol Tambah -->
            </form>
        </div>
    </main>
</body>

</html>