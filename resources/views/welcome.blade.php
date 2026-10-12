<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Sertifikasi</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0;
            color: #0f172a;
        }
    </style>
</head>
<body style="min-height: 100vh; display: flex; flex-direction: column; justify-content: space-between;">

    <!-- Header / Navigasi Pojok Kanan Atas -->
    <header style="width: 100%; padding: 1.5rem 2rem; display: flex; justify-content: space-between; align-items: center; box-sizing: border-box;">
        <div style="font-weight: 800; font-size: 1.25rem; color: #1e1b4b; letter-spacing: -0.5px;">
            SertifikasiApp
        </div>

        <div>
            @if (Route::has('login'))
                <div style="display: flex; gap: 1rem; align-items: center;">
                    @auth
                        <a href="{{ auth()->user()->email === 'admin@gmail.com' ? route('dashboard') : route('user.dashboard') }}" style="text-decoration: none; font-weight: 600; font-size: 0.9rem; color: #4f46e5; background-color: #e0e7ff; padding: 0.5rem 1rem; border-radius: 8px;">
                            Dashboard Saya
                        </a>
                    @else
                        <a href="{{ route('login') }}" style="text-decoration: none; font-weight: 600; font-size: 0.9rem; color: #475569; padding: 0.5rem 1rem;">
                            Masuk
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="text-decoration: none; font-weight: 600; font-size: 0.9rem; color: white; background-color: #4f46e5; padding: 0.5rem 1.25rem; border-radius: 8px; box-shadow: 0 2px 4px rgba(79, 70, 229, 0.2);">
                                Daftar
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!-- Konten Utama di Tengah -->
    <main style="flex: 1; display: flex; align-items: center; justify-content: center; padding: 1rem;">
        <div style="text-align: center; max-width: 600px; padding: 2.5rem; background: white; border-radius: 20px; border: 1px solid #e2e8f0; box-shadow: 0 10px 25px rgba(0,0,0,0.03);">
            <h1 style="font-size: 2rem; font-weight: 800; color: #0f172a; margin-bottom: 1rem; line-height: 1.2;">
                Selamat Datang di Aplikasi Sertifikasi
            </h1>
            <p style="color: #64748b; font-size: 1rem; margin-bottom: 2rem; line-height: 1.5;">
                Platform terpadu untuk mengelola pendaftaran, memantau jadwal, dan mengakses skema sertifikasi kompetensi dengan mudah dan transparan.
            </p>
        </div>
    </main>

    <!-- Footer Sederhana -->
    <footer style="text-align: center; padding: 1.5rem; color: #94a3b8; font-size: 0.85rem;">
        &copy; {{ date('Y') }} Aplikasi Sertifikasi Syifa. All rights reserved.
    </footer>

</body>
</html>
