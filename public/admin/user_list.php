<?php
require "../../src/php/fungsi.php";
session_start();

// kalo blom login, tendang balik ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

// kalo login sebagai guest, lempar ke halaman guest
if ($_SESSION["login"] == "guest") {
    header("Location: ../guest/guest.php");
    exit;
}

$nomor = 1;

$users = fetch("SELECT * FROM users WHERE role = 'guest'");
?>

<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotelin - Admin Dashboard</title>

    <link rel="shortcut icon" href="../../src/img/logo.png" type="image/x-icon" />

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
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
        <div class="h-full overflow-y-auto py-4 px-3 bg-gray-800">
            <!-- Salam  -->
            <div class="salam mb-2 px-3">
                <h1 class="text-white text-xl font-bold mb-2">Selamat Datang</h1>
                <h2 class="text-white text-3xl font-bold"><?= $_SESSION["nama"]; ?></h2>
            </div>
            <!-- Salam  -->

            <!-- Side Bar -->
            <ul class="h-5/6 flex flex-col justify-between">
                <div class="mt-8 flex flex-col gap-8">
                    <li>
                        <a href="admin.php" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg aria-hidden="true" class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                                <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                            </svg>
                            <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="tambah_user.php" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Tambah User</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Manage User</span>
                        </a>
                    </li>
                    <li>
                        <a href="tambah_hotel.php" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Tambah Hotel</span>
                        </a>
                    </li>
                    <li>
                        <a href="hotel_list.php" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Manage Hotel</span>
                        </a>
                    </li>
                </div>
                <li>
                    <a href="../../logout.php" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white">
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

    <main class="container py-4 px-3">
        <h3 class="font-semibold text-4xl">Daftar User</h3>

        <table class="bg-white text-center w-full rounded-lg mt-4">
            <thead>
                <tr>
                    <th class="py-2">No.</th>
                    <th>Aksi</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr class="even:bg-slate-100 odd:bg-slate-300">
                        <td><?= $nomor; ?></td>
                        <td class="flex gap-4 justify-center py-2">
                            <a href="../../src/php/hapus_user.php?id=<?= $user["id_user"] ?>" onclick="return confirm('Apakah Ingin Menghapus Data User?');" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700">Hapus User</a>
                        </td>
                        <td><?= $user["nama_depan"] ?></td>
                        <td><?= $user["nama_belakang"] ?></td>
                        <td><?= $user["username"] ?></td>
                    </tr>
                    <?php $nomor++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </main>

    <script src="../../src/js/adminController.js" type="module"></script>
</body>

</html>