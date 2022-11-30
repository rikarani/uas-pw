<?php
require "../../src/php/fungsi.php";
session_start();

// Set Default Timezone

// kalau belom login, tendang balik ke halaman login
if (!isset($_SESSION["login"])) {
    header("Location: ../login.php");
    exit;
}

// kalo admin mau nerobos ke halaman guest, tendang balik
if ($_SESSION["login"] == "admin") {
    header("Location: ../admin/admin.php");
}

// Fetch semua data Hotel
$hotels = fetch("SELECT * FROM hotels");
?>

<!DOCTYPE html>
<html lang="en" class="min-h-screen">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hotelin - Dashboard</title>

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

<body class="min-h-full relative bg-slate-200 flex">
    <!-- Sidebar -->
    <aside class="w-[250px] h-screen">
        <div class="h-full fixed overflow-y-auto py-4 px-3 bg-gray-800">
            <!-- Salam  -->
            <div class="salam mb-2 px-3">
                <h1 class="text-white text-xl font-bold mb-2">Selamat Datang</h1>
                <h2 class="text-white text-3xl font-bold"><?= $_SESSION["nama"]; ?></h2>
            </div>
            <!-- Salam  -->

            <!-- Side Bar -->
            <ul class="h-5/6 justify-between flex flex-col">
                <div class="flex flex-col gap-8 mt-10">
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>
                            <span class="ml-3">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" stroke-width="1.5" stroke="currentColor" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Riwayat Pemesanan</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
                            <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
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

    <!-- Konten -->
    <main class="container w-full h-full">
        <div class="w-full h-1/6 bg-white py-4 px-3 box-border">
            <div class="jam-wrapper">
                <h5 id="hari" class="text-2xl font-semibold"></h5>
                <h5 id="jam" class="text-2xl font-semibold"></h5>
            </div>
        </div>

        <h5 class="text-3xl font-semibold mt-4 ml-3">Cari Hotel? disini lah</h5>

        <!-- Card Wrapper -->
        <div class="card-container grid grid-cols-3 gap-x-6 grid-flow-row w-full py-4 px-3 box-border">
            <?php foreach ($hotels as $hotel) : ?>
                <!-- Card Hotel -->
                <div class="hotel-wrapper h-3/4 mt-4 w-full p-4 box-border rounded-lg bg-white overflow-hidden">
                    <!-- Gambar Hotel -->
                    <figure class="w-full h-1/2 flex-shrink-0 flex-grow-0 rounded overflow-hidden">
                        <img src="../../src/img/hotel/<?= $hotel["gambar"] ?>" alt="Hotel 1" class="w-full max-h-full" />
                    </figure>
                    <!-- Gambar Hotel -->

                    <!-- Detail Hotel -->
                    <div class="hotel-detail mt-2 w-full flex flex-col justify-between">
                        <div class="teks flex flex-col gap-3">
                            <h5 class="font-bold text-2xl"><?= $hotel["nama_hotel"]; ?></h5>
                            <h5 class="font-semibold text-base"><?= $hotel["alamat_hotel"]; ?>, <?= $hotel["lokasi"]; ?></h5>
                            <h5 class="font-semibold text-base">Harga Mulai Rp <?= $hotel["harga"]; ?></h5>
                        </div>

                        <a href="pesan.php?id_hotel=<?= $hotel["id_hotel"]; ?>" class="bg-blue-500 hover:bg-blue-700 mt-4 text-white text-center py-2 px-4 rounded text-lg font-semibold">Pesan Kamar</a>
                    </div>
                    <!-- Detail Hotel -->
                </div>
                <!-- Card Hotel -->
            <?php endforeach ?>

        </div>
        <!-- Card Wrapper -->
    </main>
    <!-- Konten -->

    <script src="../../src/js/dateController.js" type="module"></script>
</body>

</html>