<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotelin - Daftar</title>

    <link rel="shortcut icon" href="../src/img/logo.png" type="image/x-icon">

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

<body class="bg-slate-700 flex h-full items-center justify-center">
    <main class="container max-w-2xl divide-y divide-black sm:rounded-lg bg-white box-border py-2 px-4">
        <!-- Form Title -->
        <div class="form-title mb-3">
            <h1 class="text-xl font-semibold">Daftar Akun Baru</h1>
        </div>
        <!-- Form Title -->

        <!-- Form Input -->
        <form action="" method="POST">
            <!-- Name -->
            <div class="name-inputs mt-3 w-full flex gap-3">
                <!-- First Name -->
                <div class="relative first-name w-1/2">
                    <input type="text" id="first-name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="first-name" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Depan</label>
                </div>
                <!-- First Name -->

                <!-- Last Name -->
                <div class="relative last-name w-1/2">
                    <input type="text" id="last-name" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="last-name" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama Belakang</label>
                </div>
                <!-- Last Name -->
            </div>
            <!-- Name -->

            <!-- Email -->
            <div class="relative email mt-3">
                <input type="email" id="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">E-Mail</label>
            </div>
            <!-- Email -->

            <!-- Password -->
            <div class="relative password mt-3">
                <input type="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
            </div>
            <!-- Password -->

            <!-- Konfirmasi Password -->
            <div class="relative password-confirm mt-3">
                <input type="password" id="password-confirm" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="password-confirm" class="absolute text-base text-slate-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Konfirmasi Password</label>
            </div>
            <!-- Konfirmasi Password -->

            <!-- Tombol Daftar -->
            <button type="submit" class="mt-3 mb-1 rounded text-white text-lg sm:text-xl hover:bg-blue-700 py-2 w-full bg-blue-500">Daftar Sekarang</button>
            <!-- Tombol Daftar -->
        </form>
        <!-- Form Input -->
    </main>
</body>

</html>