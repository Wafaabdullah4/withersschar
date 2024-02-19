<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-image: url('bg.png'); /* Mengatur gambar latar belakang */
            background-size: cover; /* Menyesuaikan ukuran gambar agar sesuai dengan ukuran jendela browser */
            background-position: center; /* Posisi gambar lata
            /* Menambahkan padding untuk memberikan ruang di sekitar konten */
            padding: 20px;
        }

        /* Gaya untuk tautan */
        a {
            text-decoration: none;
            color: white; /* Warna teks tautan */
            font-weight: bold; /* Menambahkan ketebalan font */
            transition: color 0.3s; /* Efek transisi ketika mengubah warna */
        }

        /* Gaya untuk tautan saat dihover */
        a:hover {
            color: lightblue; /* Warna teks tautan saat dihover */
        }

        /* Gaya untuk judul */
        h2 {
            margin-bottom: 20px; /* Menambahkan margin bawah untuk judul */
            color: white; /* Warna teks Quantum Read */
            font-size: 36px; /* Memperbesar ukuran teks */
        }
        /* Gaya untuk judul */
        h2 {
            margin-bottom: 20px; /* Menambahkan margin bawah untuk judul */
        }

        /* Gaya untuk kotak konten utama */
        .content-box {
            background-color: white; /* Warna latar belakang */
            border-radius: 10px; /* Membuat sudut border melengkung */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            padding: 20px; /* Menambahkan padding */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div>
            <!-- Tautan ke halaman utama -->
            <a href="/">
                <h2>Quantum Read</h2>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 content-box">
            <!-- Isi konten Anda di sini -->
            {{ $slot }}
        </div>
    </div>
</body>
</html>
